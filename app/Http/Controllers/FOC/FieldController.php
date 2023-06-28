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
        Session::put('field', $field);
        return view('FOC/profile-field')->with([
            'field' => $field,
            'profilePicture' => $profilePictureField,
            'secondPictures' => $secondPicture,
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

        //supprimer les donnees de la session
        Session::forget('field');

        //La date d'insertion
        $dateActuelle = Carbon::now();
        $dateFormatee = $dateActuelle->format('Y-m-d H:i:s');

        //Les coordonnees et information geographique
        $latitude = $data['latitude'];
        $longitude = $data['longitude'];
        $adresse = $data['adresse'];

        $field = new Field('default',$category,$clientConnected,$name,$surface,$infrastructure,$light,'',$adresse, $latitude, $longitude, $dateFormatee, $file);
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
    public function loadPageDispoAndPrice() {
        $allDispo=DispoAndPrice::getAll();

        /*foreach($allDispo as $item) {
            echo "day : ".$item->getDay()->getIdDay();
            echo "StartTime : ".$item->getStartTime();
            echo "EndTime : ".$item->getEndTime();
            echo "Price : ".$item->getPrice();
        }
      */
       return view('FOC/disponibility')->with([
            'dispoAndPrice' => $allDispo,
        ]);
    }
    public function insertDiposAndPrice(Request $request) {
        $field = Session::get('field');
        $jour = $request->input("jour");
        $starTime = $request->input("star-time");
        $endTime = $request->input("end-time");
        $price = $request->input("price");
        for($i = 0; $i < count($jour); $i++) {
            $dispoAndPrice = new DispoAndPrice('default',Day::findById($jour[$i]),$starTime[0],$endTime[0],$field,$price[0]);
            $dispoAndPrice->create();
        }

        //supprimer les donnees de la session
        //Session::forget('field');
        
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
}
?>