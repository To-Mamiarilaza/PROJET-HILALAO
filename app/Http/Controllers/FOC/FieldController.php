<?php
namespace App\Http\Controllers\FOC;

use App\Models\FOC\GestionClient\Client;
use App\Models\FOC\GestionTerrain\Field;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Exceptions\ClientExceptionHandler;
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

    public function profileField(Request $request)
    {
        echo $request->get('idField');
    }
}
?>