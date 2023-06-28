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


class DetailClientController extends Controller
{
    public function detailClient(Request $request, $id_client)
    {
        $detail = new DetailClient();
        $all = $detail->getDetailClient($id_client);

        return view('BO.detailClient', [
            'all' => $all
        ]);
    }

    public function modifierStatus($value, $id_client){
        $modifier = new DetailClient();
        $all = $modifier->update_status($value, $id_client);

        return redirect('/ValidationClient');
    }
}