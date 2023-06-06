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
        if($selected == "category"){
            $model = new Category();
            return $model->getAllCategory();
        }
        if($selected == "subscription_state"){
            $model = new SubscriptionState();
            return $model->getAllSubscriptionState();
        }else{
            $model = new FieldType();
            return $model->getAllFieldType();
        }
        return null;
    }

    public function all(Request $request)
    {
        try {
            $selected = $request->input('crud');
            $all = $this->getSelected($selected);
            return view('BO.crud', ['all' => $all,'ref' => $selected]);
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