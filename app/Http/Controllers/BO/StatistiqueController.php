<?php
namespace App\Http\Controllers\BO;

use Exception;
use App\Http\Controllers\Controller;
use App\Models\BO\Category;
use App\Models\BO\Statistique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class StatistiqueController extends Controller
{

    public function statistique(){
        if (Session::has('id_account_admin')) {
            $category = new Category();
            $allCategories = $category->getAllCategory();
            $currentYear = date("Y");
            $nbUsers = Statistique::getDataUsersYear($currentYear); 
            $nbClients = Statistique::getDataClientsYear($currentYear); 
            $nbTerrains = Statistique::getDataTerrainsYear($currentYear, 0); 
            
            // Convertir les tableaux en chaînes JSON
            $nbUsers = json_encode($nbUsers);
            $nbClients = json_encode($nbClients);
            $nbTerrains = json_encode($nbTerrains);
            
            return view('BO.statistique', [
                'allCategories' => $allCategories,
                'NbUsers' => $nbUsers,
                'NbClients' => $nbClients,
                'NbTerrains' => $nbTerrains
            ]);
        }
        
    }
    



}
?>