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
            $nbUsers = Statistique::getDataClientsYear($currentYear); 
            $nb = Statistique::getDonneeNb($nbUsers);
            // print($nbUsers[0]);
            return view('BO.statistique',['allCategories' => $allCategories]);
        } 
    }



}
?>