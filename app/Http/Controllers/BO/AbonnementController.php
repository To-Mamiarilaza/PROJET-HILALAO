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
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // Vérifier la présence de la session 'id'
            if (!Session::has('id_account_admin')) {
                // Rediriger vers une page ou retourner une réponse selon vos besoins
                return redirect()->route('log'); // Exemple de redirection vers une page de connexion
            }
            
            return $next($request);
        });
    }
    public function abonnement(Request $request,$ref) {
        $model = new Abonnement();
        $categoryModel = new Category();
        $all = $model->getAllAbonnenent();
        $categories = $categoryModel->getAllCategory();
        
        // return view('BO.abonnement', ['all' => $all, 'categories' => $categories]);
        
        $selectedCategorie = $request->input('categorie');
        $selectedMonth = $request->input('mois');
        $selectedYear = $request->input('annee');
        $selectedPayed = $request->input('etat');
        $donnee_de_paiement = $model->paiementrecue($selectedYear,$selectedCategorie);
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
            'selectedPayed' => $selectedPayed,
            'donnee' => json_encode($model->avoir_label($donnee_de_paiement)),
            'ref' => $ref
        ]);
    }
}
?>