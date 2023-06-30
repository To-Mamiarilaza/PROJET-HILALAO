<?php
namespace App\Http\Controllers\BO;

use App\Models\BO\Abonnement;
use App\Models\BO\Category;
use App\Models\BO\DetailTerrain;
use App\Models\BO\ValidationClient;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ValidationClientController extends Controller
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
    public function validationClient($ref='')
    {
        $validation = new ValidationClient();
        $all = $validation->getPendingClient();
        $terrain = new DetailTerrain();
        $terrains = $terrain->getDetailTerrains();

        return view('BO.validationClient', [
            'all' => $all,'terrains' => $terrains,
            'ref' => $ref
        ]);
    }
}