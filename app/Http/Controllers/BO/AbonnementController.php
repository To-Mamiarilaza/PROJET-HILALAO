<?php
namespace App\Http\Controllers\BO;

use App\Models\BO\Abonnement;
use App\Models\BO\Category;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AbonnementController extends Controller
{
    public function abonnement(Request $request) {
        
        $model = new Abonnement();
        $categoryModel = new Category();
        
        $all = $model->getAllAbonnenent();
        $categories = $categoryModel->getAllCategory();
        
        // return view('BO.abonnement', ['all' => $all, 'categories' => $categories]);
        
        $selectedCategorie = $request->input('categorie');
        $selectedMonth = $request->input('mois');
        $selectedYear = $request->input('annee');
        $selectedPayed = $request->input('etat');
        
        if ($selectedCategorie != null || $selectedMonth != null || $selectedYear != null || $selectedPayed != null) {
            try {
            $all = $model->getAbonnementSort($selectedCategorie, $selectedMonth, $selectedYear, $selectedPayed);
            } catch (Exception $e) {
                return redirect()->back()->with('error', 'Une erreur s\'est produite lors du tri des abonnements.');
            }
        }
        
        return view('BO.abonnement', [
            'all' => $all,
            'categories' => $categories,
            'selectedCategorie' => $selectedCategorie,
            'selectedMonth' => $selectedMonth,
            'selectedYear' => $selectedYear,
            'selectedPayed' => $selectedPayed
        ]);
    }
}
?>