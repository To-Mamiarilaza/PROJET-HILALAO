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
    private function getSelected($selected){
        
    }

    public function update(Request $request){
        try {
            
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function getViewUpdate($selected,$id){
        try {

        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function all($variable)
    {
        try {
            $result = $this->getSelected($variable);
            return $result; // Renvoyer la valeur retournée par la méthode getSelected()
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function save(Request $request)
    {
        try {
            
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function statistique(){
        if (Session::has('id_account_admin')) {
            $category = new Category();
            $allCategories = $category->getAllCategory();
            $currentYear = date("Y");
            $nbClients = Statistique::countClientsMonth($currentYear);  
            // La variable existe dans la session
            return view('BO.statistique',['allCategories' => $allCategories,'nbClients' => $nbClients]);
        } 
    }

    public function getClientsData(Request $request)
    {
        $category = $request->input('category');
        $mois = $request->input('mois');
        $annee = $request->input('annee');
        // Logique pour récupérer les données des clients
        // Retourner les données sous forme de tableau JSON
        if ($mois == "00") {
            $data =[];
            foreach ($category as $item) {
                $data = [$data,$item['nb']];
            }
        } else {
            $data = [10, 1, 3, 13, 6, 3, 7, 5, 12];
        }
        return response()->json($data);
    }

// Répétez le processus pour les autres courbes (utilisateurs, terrains)


    // function getClientData($category, $mois, $annee) {
    //     $data = array();
    //     if ($mois == "00") {
    //         foreach ($category as $item) {
    //             $data[] = $item['nb'];
    //         }
    //     } else {
    //         $data = [10, 1, 3, 13, 6, 3, 7, 5, 12];
    //     }
    //     return $data;
    // }


    // public function m1(Request $request)
    // {
    //     $category = $request->input('category');
    //     $mois = $request->input('mois');
    //     $annee = $request->input('annee');

    //     // Effectuez votre traitement et renvoyez les données au format JSON
    //     $data = getClientsData($category, $mois, $annee);

    //     return response()->json($data);
    // }



}
?>