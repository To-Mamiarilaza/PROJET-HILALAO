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
use App\Models\FOC\GestionTerrain\FieldType;
use App\Models\FOC\GestionTerrain\Infrastructure;
use App\Models\FOC\GestionTerrain\Light;
use App\Models\FOC\GestionTerrain\PictureField;

class FieldController extends Controller
{
    public function listField()
    {
        $clientConnected = session()->get('clientConnected');
        $fields = Field::getFieldsClientConnectedById($clientConnected->getIdClient());
        $profilePictureField = PictureField::getPictureProfileField($fields);
        $profilePicture = null;
        if(count($profilePictureField) != 0) {
            $profilePicture = $profilePictureField[0]->getPicture();
        }
        else {
            $profilePicture = "terrainInconnu.jpg";
        }
        return view('FOC/list-field')->with([
            'fields' => $fields,
            'profilePicture' => $profilePicture,
        ]);
    }

    //Profil du terrain
    public function profileField( $idField)
    {
        $field = Field::findById($idField);
        $fieldPicture = PictureField::getPictureField($field);
        $profilePicture = null;
        if(count($fieldPicture) != 0) {
            $profilePicture = $fieldPicture[0]->getPicture();
        }
        else {
            $profilePicture = "terrainInconnu.jpg";
        }

        return view('FOC/profile-field')->with([
            'field' => $field,
            'profilePicture' => $profilePicture,
        ]);
    }

    //Charger l'insertion terrain
    public function loadAddField() {
        //Le client
        $clientConnected = session()->get('clientConnected');

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
        ]);
    }

    //Inserer le terrain
    public function addField(Request $request) {
        $name = $request->input('nameField');
        $category = $request->input('category');
        $surface = $request->input('surface');
        $infrastructure = $request->input('infrastructure');
        $light = $request->input('light');

        $data = [
            'name' => $name,
            'category' => $category,
            'surface' => $surface,
            'infrastructure' => $infrastructure,
            'light' => $light
        ];
    
        Session::put('field', $data);
    }
}
?>