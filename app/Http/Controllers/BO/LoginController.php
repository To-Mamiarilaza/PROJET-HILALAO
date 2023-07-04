<?php
namespace App\Http\Controllers\BO;

use Exception;
use App\Http\Controllers\Controller;
use App\Models\BO\AccountAdmin;
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

    public function checkAccount()
    {
        try {
            $model = new AccountAdmin();
            $mail = $_POST['mail'];
            $password = $_POST['password'];
            $account = $model->getAccountAdminConnected($mail,$password);
            Session::put('id_account_admin', $account->getId_account_admin());
            Session::put('account_admin', $account);
            Session::save();
            $statistiqueController = app(StatistiqueController::class);
            return $statistiqueController->statistique('statistique');
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            return view('BO/login', ['error'=>$errorMessage]);
            // Passer le message d'erreur à la vue
        }
    }

    
    
    public function saveAll()
    {
        $model = new AccountAdmin();

        $model -> setFirst_name($_POST['nom']);
        $model ->setLast_name($_POST['prenom']);
        $model ->setPhone_number($_POST['tel']);
        $model->setMail($_POST['mail']);
        $model->setPwd($_POST['pwd']);

        $model-> save();
        
        return view('BO/login');
    }
}
?>