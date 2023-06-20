<?php
namespace App\Http\Controllers\BO;

use App\Models\BO\Abonnement;
use App\Models\BO\Category;
use App\Models\BO\DetailClient;
use App\Models\BO\ValidationClient;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ValidationClientController extends Controller
{
    public function validationClient(Request $request)
    {
        $validation = new ValidationClient();
        $all = $validation->getPendingClient();

        return view('BO.validationClient', [
            'all' => $all
        ]);
    }
}