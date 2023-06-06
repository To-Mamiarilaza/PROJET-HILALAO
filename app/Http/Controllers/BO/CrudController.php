<?php
namespace App\Http\Controllers\BO;

use Exception;
use App\Models\BO\SubscriptionState;
use App\Http\Controllers\Controller;
use App\Models\BO\Category;
use App\Models\BO\FieldType;
use Illuminate\Http\Request;


class CrudController extends Controller
{
    private function getSelected($selected){
        if($selected == 'category'){
            $model = new Category();
            $all = $model->getAllCategory();
            return view('BO.crudCategory', ['all' => $all,'ref' => $selected]);
        }
        if($selected == "subscription_state"){
            $model = new SubscriptionState();
            $all = $model->getAllSubscriptionState();
            return view('BO.crudSubscriptionState', ['all' => $all,'ref' => $selected]);
        }else{
            $model = new FieldType();
            $all = $model->getAllFieldType();
            return view('BO.crudFieldType', ['all' => $all,'ref' => $selected]);
        }
        return null;
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

    
    // public function saveAll(Request $request)
    // {
    //     $model = new AccountAdmin();

    //     $model -> setName($request->input('nom'));
    //     $model ->setFirstname($request->input('prenom'));
    //     $model ->setTelephoneNumber($request->input('tel'));
    //     $model->setMail($request->input('mail'));
    //     $model->setPassword($request->input('pwd'));

    //     $model-> save();
        
    //     return view('BO/login');
    // }
}
?>