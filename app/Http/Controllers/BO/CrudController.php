<?php
namespace App\Http\Controllers\BO;

use Exception;
use App\Models\BO\SubscriptionState;
use App\Http\Controllers\Controller;
use App\Models\BO\Category;
use App\Models\BO\FieldType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\BO\BackOfficeNotification;

class CrudController extends Controller
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
    private function getSelected($selected){
        $c = new CrudController();
        $notification = BackOfficeNotification::getAllBackOfficeNotification();
        if($selected == 'category'){
            $model = new Category();
            $all = $model->getAllCategory();
            return view('BO.crudCategory', ['all' => $all,'ref' => $selected, 'notifications' => $notification]);
        }else if($selected == "subscription_state"){
            $model = new SubscriptionState();
            $all = $model->getAllSubscriptionState();
            return view('BO.crudSubscriptionState', ['all' => $all,'ref' => $selected, 'notifications' => $notification]);
        }else{
            $model = new FieldType();
            $all = $model->getAllFieldType();
            return view('BO.crudFieldType', ['all' => $all,'ref' => $selected, 'notifications' => $notification]);
        }
        return null;
    }

    public function delete(Request $request){
        $c = new CrudController();
        try {
            $selected = $request->input('variable');
            $id = $request->input('id');
            if($selected == "category"){
                $model = new Category();
                $model->setId_category($id);
                $model->delete();   
            }else if($selected == "subscription_state") {
                $model = new SubscriptionState();
                $model->setId_subscription_state($id);
                $model->delete(); 
            }else{
                $model = new FieldType();
                $model->setId_field_type($id);
                $model->delete();
            }
            return $this->all($selected);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function update(Request $request){
        $c = new CrudController();
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
        $c = new CrudController();
        $notification = BackOfficeNotification::getAllBackOfficeNotification();
        try {

            if($selected == "category"){
                $model = new Category();
                $model = $model->getCategoryById($id);
                return view('BO.crudUpdateCategory', ['model'=>$model,'ref' => $selected, 'notifications' => $notification]);    
            }else if($selected == "subscription_state"){
                $model = new SubscriptionState();
                $model = $model->getSubscriptionStateById($id);
                return view('BO.crudUpdateSubscription', ['model'=>$model,'ref' => $selected, 'notifications' => $notification]);   
            }else{
                $model = new FieldType();
                $model = $model->getFieldTypeById($id);
                return view('BO.crudUpdateFieldType', ['model'=>$model,'ref' => $selected, 'notifications' => $notification]);   
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