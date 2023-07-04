<?php
namespace App\Http\Controllers\BO;

use App\Models\BO\DetailTerrain;
use App\Models\BO\BackOfficeNotification;
use App\Http\Controllers\Controller;
use App\Models\BO\DetailClient;
use Illuminate\Support\Facades\Session;


class DetailTerrainController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // Vérifier la présence de la session 'id'
            if (!Session::has('id_account_admin')) {
                // Rediriger vers une page ou retourner une réponse selon vos besoins
                return redirect()->route('log_admin'); // Exemple de redirection vers une page de connexion
            }
            
            return $next($request);
        });
    }
    public function detailTerrain($id_terrain,$ref)
    {
        $detail = new DetailTerrain();
        $all = $detail->getDetailTerrain($id_terrain);
        
        $notification = BackOfficeNotification::getAllBackOfficeNotification();
        return view('BO.detailTerrain', [
            'all' => $all,
            'validation' => 1,
            'ref' => $ref,
            'notifications' => $notification
        ]);
    }

    public function all()
    {
        $detail = new DetailTerrain();
        $all = $detail->getAllField();
        
        $notification = BackOfficeNotification::getAllBackOfficeNotification();

        return view('BO.listField', [
            'all' => $all,
            'notifications' => $notification
        ]);
    }

    public function update($variable,$id_terrain,$ref){
        $detail = new DetailTerrain();
        $detail->update_status($variable,$id_terrain);// Appeler la fonction detailTerrain avec la variable d'état
        $etat = $variable; // Valeur de l'état à passer à la fonction detailTerrain
        $terrain = new DetailTerrain();
        $id_client = $terrain->getDetailTerrain($id_terrain)->getId_client();
        BackOfficeNotification::insert_client_notification($id_client,11);
        if($variable !=1){
            $variable = 0;
        }
        BackOfficeNotification::insert_field_validation($id_terrain,$variable);
        return $this->detailTerrainWithEtat($id_terrain, $etat,$ref);
    }
    
    public function detailTerrainWithEtat($id_terrain, $etat,$ref) {
        $detail = new DetailTerrain();
        $all = $detail->getDetailTerrain($id_terrain);
        $month = $detail->getMonthTerrain($id_terrain,2023);
        $notification = BackOfficeNotification::getAllBackOfficeNotification();
        return view('BO.detailTerrain', [
            'all' => $all,
            'etat' => $etat,
            'ref' => $ref,
            'notifications' => $notification
        ]);
    }

    public function detailFieldById() {
        $detail = new DetailTerrain();
        $id_terrain = $_GET['id_terrain'];
        $annee = $_GET['annee'];
        $ref = $_GET['ref'];
        $all = $detail->getDetailTerrain($id_terrain);
        $month = $detail->getMonthTerrain($id_terrain,$annee);
        
        $notification = BackOfficeNotification::getAllBackOfficeNotification();
        return view('BO.detailTerrain', [
            'all' => $all,
            'month' => $month ? $month->getMonths() : [],
            'ref' => $ref,
            'notifications' => $notification
        ]);
    }

    public function fieldByClient($id_client,$ref){
        $field = new DetailTerrain();
        $client = new DetailClient();
        $fields = $field->findByClient($id_client);
        $clients = $client->getDetailClient($id_client);
        
        $notification = BackOfficeNotification::getAllBackOfficeNotification();
        return view('BO.fieldFromClient', [
            'client' => $clients,
            'fields' => $fields,
            'ref' => $ref,
            'notifications' => $notification
        ]);
    }
}