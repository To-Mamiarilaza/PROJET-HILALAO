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
            $nbUsers = Statistique::getDataClientsYear($currentYear); 
            $nb = Statistique::nombre(Statistique::getDonneeNb($nbUsers)) ;
            return view('BO.statistique',['allCategories' => $allCategories,'NbUsers' => $nb]);
        } 
    }



}
?>