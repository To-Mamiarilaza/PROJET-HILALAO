<?php
namespace App\Http\Controllers\BO;

use App\Models\BO\Abonnement;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AbonnementController extends Controller
{
    public function abonnement(){
        $model = new Abonnement();
        $all = $model->getAllAbonnenent();
        return view('BO.abonnement', ['all' => $all]);
    }

    // public function update(Request $request){
    //     try {
            
    //     } catch (\Throwable $th) {
    //         dd($th->getMessage());
    //     }
    // }

    // public function getViewUpdate($selected,$id){
    //     try {

    //     } catch (\Throwable $th) {
    //         dd($th->getMessage());
    //     }
    // }

    // public function all($variable)
    // {
    //     try {
    //         $result = $this->getSelected($variable);
    //         return $result; // Renvoyer la valeur retournée par la méthode getSelected()
    //     } catch (\Throwable $th) {
    //         dd($th->getMessage());
    //     }
    // }

    // public function save(Request $request)
    // {
    //     try {
            
    //     } catch (\Throwable $th) {
    //         dd($th->getMessage());
    //     }
    // }

    // public function abonnement(){
    //     if (Session::has('id_account_admin')) {
    //         // La variable existe dans la session
    //         return view('BO.abonnement');
    //     } 
        
    // }
}
?>