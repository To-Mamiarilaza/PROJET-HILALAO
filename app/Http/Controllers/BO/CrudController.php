<?php
namespace App\Http\Controllers\BO;

use Exception;
use App\Models\BO\SubscriptionState;
use App\Http\Controllers\Controller;
use App\Models\BO\Category;
use App\Models\BO\FieldType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CrudController extends Controller
{
    private function getSelected($selected){
        if($selected == 'category'){
            $model = new Category();
            $all = $model->getAllCategory();
            return view('BO.crudCategory', ['all' => $all,'ref' => $selected]);
        }else if($selected == "subscription_state"){
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

    public function update(Request $request){
        try {
            $selected = $request->input('variable');
            if($selected == "category"){
                $model = new Category();
                $model->setId_category($request->input('id_category'));
                $model->setCategory($request->input('category'));
                $model->setSubscribing_price($request->input('subscribing_price'));
                $model->update();   
            }else if($selected == "subscription_state"){
                $model = new SubscriptionState();
                $model->setId_subscription_state($request->input('id_subscription_state'));
                $model->setSubscription_state($request->input('subscription_state'));
                $model->update(); 
            }else{
                $model = new FieldType();
                $model->setId_field_type($request->input('id_field_type'));
                $model->setField_type($request->input('field_type'));
                $model->update();
            }
            return $this->all($selected);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function getViewUpdate($selected,$id){
        try {

            if($selected == "category"){
                $model = new Category();
                $model = $model->getCategoryById($id);
                return view('BO.crudUpdateCategory', ['model'=>$model,'ref' => $selected]);    
            }else if($selected == "subscription_state"){
                $model = new SubscriptionState();
                $model = $model->getSubscriptionStateById($id);
                return view('BO.crudUpdateSubscription', ['model'=>$model,'ref' => $selected]);   
            }else{
                $model = new FieldType();
                $model = $model->getFieldTypeById($id);
                return view('BO.crudUpdateFieldType', ['model'=>$model,'ref' => $selected]);   
            }
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
            $ref = $request->input('variable');
            
            if ($ref == "category") {
                $model = new Category();
                $model->setCategory($request->input('category'));
                $model->setSubscribing_price($request->input('subscribing_price'));
                $model->save();
            } elseif ($ref == "subscription_state") {
                $model = new SubscriptionState();
                $model->setSubscription_state($request->input('subscription_state'));
                $model->save();
            } else {
                $model = new FieldType();
                $model->setField_type($request->input('field_type'));
                $model->save();
            }
            
            return $this->all($ref);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

}
?>