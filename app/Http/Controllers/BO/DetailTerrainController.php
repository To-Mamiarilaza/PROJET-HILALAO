<?php
namespace App\Http\Controllers\BO;

use App\Models\BO\DetailTerrain;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class DetailTerrainController extends Controller
{
    public function detailTerrain($id_terrain)
    {
        $detail = new DetailTerrain();
        $all = $detail->getDetailTerrain($id_terrain);

        return view('BO.detailTerrain', [
            'all' => $all,
            'validation' => 1
        ]);
    }

    public function all()
    {
        $detail = new DetailTerrain();
        $all = $detail->getAllField();

        return view('BO.listField', [
            'all' => $all
        ]);
    }

    public function update($variable,$id_terrain){
        $detail = new DetailTerrain();
        $detail->update_status($variable,$id_terrain);// Appeler la fonction detailTerrain avec la variable d'état
        $etat = $variable; // Valeur de l'état à passer à la fonction detailTerrain
        return $this->detailTerrainWithEtat($id_terrain, $etat);
    }
    
    public function detailTerrainWithEtat($id_terrain, $etat) {
        $detail = new DetailTerrain();
        $all = $detail->getDetailTerrain($id_terrain);
        $month = $detail->getMonthTerrain($id_terrain,2023);
    
        return view('BO.detailTerrain', [
            'all' => $all,
            'etat' => $etat
        ]);
    }

    public function detailFieldById() {
        $detail = new DetailTerrain();
        $id_terrain = $_GET['id_terrain'];
        $annee = $_GET['annee'];
        $all = $detail->getDetailTerrain($id_terrain);
        $month = $detail->getMonthTerrain($id_terrain,$annee);
    
        return view('BO.detailTerrain', [
            'all' => $all,
            'month' => $month ? $month->getMonths() : []
        ]);
    }
}