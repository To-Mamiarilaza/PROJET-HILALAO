<?php
namespace App\Http\Controllers\FOC;

use App\Models\FOC\GestionClient\Client;
use App\Models\FOC\GestionTerrain\Field;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Exceptions\ClientExceptionHandler;
use App\Models\FOC\GestionTerrain\Category;
use App\Models\FOC\GestionTerrain\DispoAndPrice;
use App\Models\FOC\GestionTerrain\FieldType;
use App\Models\FOC\GestionTerrain\Infrastructure;
use App\Models\FOC\GestionTerrain\Light;
use App\Models\FOC\GestionTerrain\PictureField;
use App\Models\FOC\GestionTerrain\Day;
use App\Models\FOC\GestionTerrain\Discount;
use App\Models\FOC\GestionTerrain\Unavailability;
use App\Models\FOC\ClientNotification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class FieldController extends Controller
{
    public function listField()
    {
        $clientConnected = session()->get('clientConnected');
        $fields = Field::getFieldsClientConnectedById($clientConnected->getIdClient());
        $profilePictureField = PictureField::getPictureProfileField($fields);
        $fields = Field::getPicProfileEachField($fields, $profilePictureField);
       
        //Charger toutes les categories du terrain
        $categoryField = Category::getAll();
        $notifications = ClientNotification::getAllClientNotification($clientConnected->getIdClient());

        return view('FOC/list-field')->with([
            'fields' => $fields,
            'category' => $categoryField,
            'notifications' => $notifications,
        ]);
    }

    //Profil du terrain
    public function profileField( $idField)
    {
        $clientConnected = session()->get('clientConnected');
        $error = null;
        if(isset($_GET['error'])) {
            $error = isset($_GET['error']);
        }
        $field = Field::findById($idField);
        $profilePictureField = PictureField::getPictureProfile($field);
        $secondPicture = PictureField::getSecondPictureField($field);
        $dispo = DispoAndPrice::getAllDispoField($field);
        $indispo = Unavailability::getAllIndispoField($field);
        $discount = Discount::getAllDiscountField($field);
        $allDispo=DispoAndPrice::getAllDispoField($field);

        $notifications = ClientNotification::getAllClientNotification($clientConnected->getIdClient());
        Session::put('field', $field);

        return view('FOC/profile-field')->with([
            'field' => $field,
            'profilePicture' => $profilePictureField,
            'secondPictures' => $secondPicture,
            'dispo' => $dispo,
            'indispo' => $indispo,
            'discount' => $discount,
            'error' => $error,
            'notifications' => $notifications,
            'dispoAndPrice' => $allDispo,
        ]);
    }

    //Charger l'insertion terrain
    public function loadAddField($error="") {
        $clientConnected = session()->get('clientConnected');
        //Charger toutes les categories du terrain
        $categoryField = Category::getAll();

        //Les type de terrain
        $fieldType = FieldType::getAll();

        //Les infrastructures
        $infrastructure = Infrastructure::getAll();

        //Lumiere
        $light = Light::getAll();

        $notifications = ClientNotification::getAllClientNotification($clientConnected->getIdClient());


        return view('FOC/add-field')->with([
            'category' => $categoryField,
            'fieldType' => $fieldType,
            'infrastructure' => $infrastructure,
            'light' => $light,
            'error' => $error,
            'notifications' => $notifications,
        ]);
    }

    //Inserer le terrain
    public function addField(Request $request) {
        try {
            $clientConnected = session()->get('clientConnected');
            $notifications = ClientNotification::getAllClientNotification($clientConnected->getIdClient());
            if($request->input('latitude') != null && $request->input('longitude') != null && $request->input('adresseResult') != null) {
            
                $name = $request->input('nameField');
                $category = $request->input('category');
                $surface = $request->input('surface');
                $infrastructure = $request->input('infrastructure');
                $light = $request->input('light');
        
                $latitude = $request->input('latitude');
                $longitude = $request->input('longitude');
                $adresseResult = $request->input('adresseResult');

                $data = [
                    'name' => $name,
                    'category' => $category,
                    'surface' => $surface,
                    'infrastructure' => $infrastructure,
                    'light' => $light,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'adresse' => $adresseResult,
                ];
            
                Session::put('field', $data);

                return view('FOC/addFieldFile')->with([
                    'notifications' => $notifications,
                ]);
            }
            else {
                throw new Exception("Veuillez saisir en premier votre adresse");
            }
            
        } catch(Exception $e) {
           echo $e->getMessage();
        } 
    }


    //Inserer le dossier du terrain
    public function addFieldFile(Request $request) {
        $file = $this->uploadImage($request, 'fileField', 'imageFileField', 'image/fileField/',);
        $data = Session::get('field');
        //Le client
        $clientConnected = session()->get('clientConnected');

        $name = $data['name'];

        //Categorie du terrain
        $categoryId = $data['category'];
        $category = Category::findById($categoryId);

        //Surface du terrain
        $surfaceId = $data['surface'];
        $surface = FieldType::findById($surfaceId);

        //Infrastructure
        $infrastructureId = $data['infrastructure'];
        $infrastructure = Infrastructure::findById($infrastructureId);

        //lumiere
        $lightId = $data['light'];
        $light = Light::findById($lightId);

        //supprimer les donnees de la session field
        Session::forget('field');

        //La date d'insertion
        $dateActuelle = Carbon::now();
        $dateFormatee = $dateActuelle->format('Y-m-d H:i:s');

        //Les coordonnees et information geographique
        $latitude = $data['latitude'];
        $longitude = $data['longitude'];
        $adresse = $data['adresse'];

        $field = new Field('default',$category,$clientConnected,$name,$surface,$infrastructure,$light,'',$adresse, $latitude, $longitude, $dateFormatee, $file, 1);
        $field->create($clientConnected);

        return redirect()->route('list-fieldFoc');
    }

      
    public function uploader(Request $request, $name, $cheminDestination, $nameFile)
    {
        try{
            $imageName = "";
            if ($request->hasFile($name)) {
                $file = $request->file($name);
                $extension = $file->getClientOriginalExtension();
                $allowedExtensions = ['png', 'gif', 'jpg', 'jpeg', 'pdf'];
        
                if (in_array($extension, $allowedExtensions)) {
                    $newFileName = $nameFile .''. $this->generateUniqueSequence($cheminDestination) . '.' . $extension;                   
                    $file->move(public_path($cheminDestination), $newFileName);

                    //echo "tafiditra";
                    $imageName = $newFileName;
                } else {
                    // Gérer l'erreur d'extension de fichier ici
                    $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg ou pdf.';
                }
            }
        
            return $imageName;
        }
        catch(\Exception $e){
            //throw $e;
            return redirect()->back()->withErrors([$e->getMessage()])->withInput();            
        }
    }

    //Fonction pour uploader une image
    public function uploadImage(Request $request, $name, $nameFile, $cheminDestination)
    {
       /* $name = 'image'; // Nom du champ de fichier dans le formulaire
        $nameFile = 'picField'; // Nom de fichier de base
        $cheminDestination = 'image/pictureField/'; // Répertoire de destination
*/
        $imageName = "";
        if ($request->hasFile($name)) {
            $file = $request->file($name);
            $extension = $file->getClientOriginalExtension();
            $allowedExtensions = ['png', 'gif', 'jpg', 'jpeg', 'pdf'];

            if (in_array($extension, $allowedExtensions)) {
                $newFileName = $nameFile . '_' . time() . '.' . $extension;
                $destinationPath = public_path($cheminDestination);

                while (file_exists($destinationPath . '/' . $newFileName)) {
                    $newFileName = $nameFile . '_' . time() . '.' . $extension;
                }

                $file->move($destinationPath, $newFileName);
                $imageName = $newFileName;
            } else {
                // Gérer l'erreur d'extension de fichier ici
                $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg ou pdf.';
            }
        }

        return $imageName;
    }

    private function generateUniqueSequence($pathName)
    {
        $files = Storage::disk('public')->allFiles($pathName);
        $count = count($files);

        return $count + 1;
    }

    public function searchField(Request $request) {
        $clientConnected = session()->get('clientConnected');
        $notifications = ClientNotification::getAllClientNotification($clientConnected->getIdClient());
        $nom = $request->input('nameField');
        $category = $request->input('category');
        $fields = Field::searchMultiCritere($nom, $category);
        $profilePictureField = PictureField::getPictureProfileField($fields);
        $fields = Field::getPicProfileEachField($fields, $profilePictureField);
       
        //Charger toutes les categories du terrain
        $categoryField = Category::getAll();

        return view('FOC/list-field')->with([
            'fields' => $fields,
            'category' => $categoryField,
            'notifications' => $notifications,
        ]);
    }

    //Modifier une image
    public function editImage(Request $request) {
        $file = $this->uploadImage($request, 'image', 'picField', 'image/pictureField/');
        echo "io";
        echo $request->input('idImage');
        //Avoir sa photo actuel
        $pictureNow = PictureField::findById($request->input('idImage'));

        //Appliquer la nouvelle modification
        $pictureNow->setPicture($file);

        //Enregistrer dans la base
        $pictureNow->update();

        return redirect()->route('profile-field', ['idField' => $pictureNow->getField()->getIdField()]);
       }

    //Charger la page de disponibilite et prix
    public function loadPageDispoAndPrice($error = null) {
        $clientConnected = session()->get('clientConnected');
        $notifications = ClientNotification::getAllClientNotification($clientConnected->getIdClient());
        $field = Session::get('field');
        if(isset($_GET['error'])) {
            $allDispo=DispoAndPrice::getAllDispoField($field);
            return view('FOC/disponibility')->with([
                'dispoAndPrice' => $allDispo,
                'errorInsert' =>  $_GET['error'],
                'notifications' => $notifications,
            ]);
        }
        else {
            $allDispo=DispoAndPrice::getAllDispoField($field);
            return view('FOC/disponibility')->with([
                'dispoAndPrice' => $allDispo,
                'notifications' => $notifications,
            ]);
        }
    }

    //Inserer les disponibilites et prix
    public function insertDiposAndPrice(Request $request) {
        try{
            $error = null;
            $field = Session::get('field');
            $jour = $request->input("jour");
            $starTime = $request->input("star-time");
            $endTime = $request->input("end-time");
            $price = $request->input("price");
            $allDisposAndPrice = DispoAndPrice::getAllDispoField($field);
            for($i = 0; $i < count($jour); $i++) {
                $dispoAndPrice = new DispoAndPrice('default',Day::findById($jour[$i]),$starTime[0],$endTime[0],$field,$price[0]);
                if(DispoAndPrice::checkInsert($allDisposAndPrice,$dispoAndPrice)) {
                    $dispoAndPrice->create();
                }
                else {
                    throw new Exception("L'emploi du temps pour la disponibilite choisie existe deja");
                }
            }
        }
        catch(\Exception $e){  
            $error= $e->getMessage();         
        }
        return redirect()->route('loadPageDispoAndPriceGet', ['error' =>  $error]);
    }

    //Supprimer une disponibilite
    public function deleteDisponibility() {
        try{
            $error = null;
            $disposSame = DispoAndPrice::getDisposSame($_GET['start'], $_GET['end'], $_GET['price']);
            if($disposSame != null) {
                foreach($disposSame as $item) {
                    $item->delete();
                }
                return redirect()->route('loadPageDispoAndPriceGet');
            }
            else {
                throw new Exception("Erreur : disponibilite est null");
            }
        }
        catch(\Exception $e){
            $error = $e->getMessage();
        }

        return redirect()->route('loadPageDispoAndPriceGet', ['error' =>  $error]);
    }

    //Inserer une indisponibilite
    public function insertIndispo(Request $request) {
        $field = Session::get('field');
        try {
            $error = null;
            if($request->input('date-debut') != null && $request->input("date-fin") != null) {
    
                $dateDebut = $request->input('date-debut');
                $dateFin = $request->input('date-fin');
                $date1 = Carbon::parse($dateDebut);
                $date2 = Carbon::parse($dateFin);
                
                while($date1->lessThanOrEqualTo($date2)) {
                    $unavaibility = new Unavailability("default",$field,$dateDebut, '08:00:00', '19:00:00');
                    $unavaibility->create();
                    $dateDebut = Carbon::parse($dateDebut)->addDay();
                    $date1 = Carbon::parse($dateDebut);
                }
            }
            else if ($request->input("date-debut") != null &&  $request->input("heure-debut") != null &&  $request->input("heure-fin") != null){
                $date = $request->input("date-debut");
                $starTime = $request->input("heure-debut");
                $endTime = $request->input("heure-fin");
        
                $unavaibility = new Unavailability("default",$field,$date, $starTime, $endTime);
                $unavaibility->create();
            }
            else {
                throw new Exception("Completer les champs correctement");
            }
        } catch(Exception $e) {
            $error = $e->getMessage();
        }
       
        return redirect()->route('profile-field', ['idField' => $field->getIdField(), 'error' => $error]);    
    }

    //Ajouter une remise
    public function addRemise(Request $request) {
        try {
            $error = null;
            $field = Session::get('field');
            $startDate = $request->input("date-debut");
            $endDate = $request->input("date-fin");
            $discount = $request->input("remise");
            $discount = new Discount('default', $field, $startDate, $endDate, $discount);
            $discount->create();
        } catch(Exception $e) {
            $error = $e->getMessage();
        }
       
        return redirect()->route('profile-field', ['idField' => $field->getIdField(), 'error' => $error]);    
    }

    //Supprimer une indisponibilite
    public function deleteIndispo() {
        try{
            $error = null;
            $field = Session::get('field');
            if(isset($_GET['idIndispo'])) {
                $indispo = Unavailability::findById($_GET['idIndispo']);
                echo $indispo->getIdUnavailability();
                $indispo->delete();
            } 
            else {
                throw new Exception("Requete invalide");
            }
        }
        catch(\Exception $e){
            $error = $e->getMessage();
        }

        return redirect()->route('profile-field', ['idField' => $field->getIdField(), 'error' => $error]);    
    }

    //Supprimer une remise
     public function deleteDiscount() {
        try{
            $error = null;
            $field = Session::get('field');
            if(isset($_GET['idDiscount'])) {
                $discount = Discount::findById($_GET['idDiscount']);
                $discount->delete();
            } 
            else {
                throw new Exception("Requete invalide");
            }
        }
        catch(\Exception $e){
            $error = $e->getMessage();
        }

        return redirect()->route('profile-field', ['idField' => $field->getIdField(), 'error' => $error]);    
    }

    //Supprimer un terrain
    public function deleteField() {
        $field = Session::get('field');
        $field->setState(3);
        $field->deleteField();

        //supprimer les donnees de la session
        Session::forget('field');

        return redirect()->route('list-fieldFoc'); 
    }
}
?>