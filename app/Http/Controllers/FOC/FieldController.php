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

        return view('FOC/list-field')->with([
            'fields' => $fields,
            'category' => $categoryField,
        ]);
    }

    //Profil du terrain
    public function profileField( $idField)
    {
        $field = Field::findById($idField);
        $profilePictureField = PictureField::getPictureProfile($field);
        $secondPicture = PictureField::getSecondPictureField($field);
        $dispo = DispoAndPrice::getAllDispoField($field);
        $indispo = Unavailability::getAllIndispoField($field);
        $discount = Discount::getAllDiscountField($field);
        Session::put('field', $field);
        return view('FOC/profile-field')->with([
            'field' => $field,
            'profilePicture' => $profilePictureField,
            'secondPictures' => $secondPicture,
            'dispo' => $dispo,
            'indispo' => $indispo,
            'discount' => $discount,
        ]);
    }

    //Charger l'insertion terrain
    public function loadAddField($error="") {
        //Charger toutes les categories du terrain
        $categoryField = Category::getAll();

        //Les type de terrain
        $fieldType = FieldType::getAll();

        //Les infrastructures
        $infrastructure = Infrastructure::getAll();

        //Lumiere
        $light = Light::getAll();

        return view('FOC/add-field')->with([
            'category' => $categoryField,
            'fieldType' => $fieldType,
            'infrastructure' => $infrastructure,
            'light' => $light,
            'error' => $error,
        ]);
    }

    //Inserer le terrain
    public function addField(Request $request) {
        try {
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

                return view('FOC/addFieldFile');
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

        return redirect()->route('list-field');
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
                $newFileName = $nameFile . '_' . time() . '_' . $extension;
                $destinationPath = public_path($cheminDestination);

                while (file_exists($destinationPath . '/' . $newFileName)) {
                    $newFileName = $nameFile . '_' . time() . '' . $extension;
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
        ]);
    }

    //Modifier une image
    public function editImage(Request $request) {
        $file = $this->uploadImage($request, 'image', 'picField', 'image/pictureField/');

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
        $field = Session::get('field');
        if(isset($_GET['error'])) {
            $allDispo=DispoAndPrice::getAllDispoField($field);
            return view('FOC/disponibility')->with([
                'dispoAndPrice' => $allDispo,
                'errorInsert' =>  $_GET['error'],
            ]);
        }
        else {
            $allDispo=DispoAndPrice::getAllDispoField($field);
            return view('FOC/disponibility')->with([
                'dispoAndPrice' => $allDispo,
            ]);
        }
    }

    //Inserer les disponibilites et prix
    public function insertDiposAndPrice(Request $request) {
        try{
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
            return redirect()->route('loadPageDispoAndPriceGet', ['error' =>  $e->getMessage()]);
        }
        return redirect()->route('loadPageDispoAndPriceGet');
    }

    //Supprimer une disponibilite
    public function deleteDisponibility() {
        try{
           
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
            echo $e->getMessage();           
        }
    }

    //Inserer une indisponibilite
    public function insertIndispo(Request $request) {
        $field = Session::get('field');

        if($request->input("date-fin") != null) {
    
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
        else {
            $date = $request->input("date-debut");
            $starTime = $request->input("heure-debut");
            $endTime = $request->input("heure-fin");
    
            $unavaibility = new Unavailability("default",$field,$date, $starTime, $endTime);
            $unavaibility->create();
        }
       
        return redirect()->route('profile-field', ['idField' => $field->getIdField()]);    
    }

    //Ajouter une remise
    public function addRemise(Request $request) {
        $field = Session::get('field');
        $startDate = $request->input("date-debut");
        $endDate = $request->input("date-fin");
        $discount = $request->input("remise");
        $discount = new Discount('default', $field, $startDate, $endDate, $discount);
        $discount->create();
        return redirect()->route('profile-field', ['idField' => $field->getIdField()]);  
    }

    //Supprimer une indisponibilite
    public function deleteIndispo() {
        try{
            $field = Session::get('field');
            if(isset($_GET['idIndispo'])) {
                $indispo = Unavailability::findById($_GET['idIndispo']);
                echo $indispo->getIdUnavailability();
                $indispo->delete();
                return redirect()->route('profile-field', ['idField' => $field->getIdField()]); 
            } 
            else {
                throw new Exception("Requete invalide");
            }
        }
        catch(\Exception $e){
            echo $e->getMessage();           
        }
    }

    //Supprimer une remise
     public function deleteDiscount() {
        try{
            $field = Session::get('field');
            if(isset($_GET['idDiscount'])) {
                $discount = Discount::findById($_GET['idDiscount']);
                $discount->delete();
                return redirect()->route('profile-field', ['idField' => $field->getIdField()]); 
            } 
            else {
                throw new Exception("Requete invalide");
            }
        }
        catch(\Exception $e){
            echo $e->getMessage();           
        }
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