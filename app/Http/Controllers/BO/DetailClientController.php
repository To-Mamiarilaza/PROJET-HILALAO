<?php
namespace App\Http\Controllers\BO;

use App\Models\BO\Abonnement;
use App\Models\BO\Category;
use App\Models\BO\DetailClient;
use App\Models\BO\ValidationClient;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class DetailClientController extends Controller
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
    public function detailClient( $id_client,$ref)
    {
        $detail = new DetailClient();
        $all = $detail->getDetailClient($id_client);

        return view('BO.detailClient', [
            'all' => $all,
            'ref' => $ref
        ]);
    }

    public function modifierStatus($value, $id_client){
        $modifier = new DetailClient();
        $all = $modifier->update_status($value, $id_client);

        return redirect('/ValidationClient');
    }
}