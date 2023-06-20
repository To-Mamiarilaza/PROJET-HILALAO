<?php
namespace App\Http\Controllers\BO;

use Exception;
use App\Http\Controllers\Controller;
use App\Models\BO\AccountAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    public function all()
    {
        try {
            $model = new AccountAdmin();
            $all = $model->getAllAccountAdmin();
            return view('BO.all', ['all' => $all]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function checkAccount(Request $request)
    {
        try {
            $model = new AccountAdmin();
            $mail = $request->input('mail');
            $password = $request->input('password');
            $account = $model->getAccountAdminConnected($mail,$password);
            Session::put('account_admin', $account);
            Session::save();
            $statistiqueController = app(StatistiqueController::class);
            return $statistiqueController->statistique();
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            return view('BO/login', ['error'=>$errorMessage]);
            // Passer le message d'erreur à la vue
        }
    }

    
    
    public function saveAll(Request $request)
    {
        $model = new AccountAdmin();

        $model -> setFirst_name($request->input('nom'));
        $model ->setLast_name($request->input('prenom'));
        $model ->setPhone_number($request->input('tel'));
        $model->setMail($request->input('mail'));
        $model->setPwd($request->input('pwd'));

        $model-> save();
        
        return view('BO/login');
    }
}
?>