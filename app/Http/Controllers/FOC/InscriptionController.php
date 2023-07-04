<?php
namespace App\Http\Controllers\FOC;

use App\Models\FOC\GestionClient\Client;
use App\Models\FOC\GestionClient\Cin;
use App\Models\FOC\GestionClient\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class InscriptionController extends Controller
{

    
    //Inserer cin
    public function insertCIN(Request $request)
    {
        
        $cinNumber = $request->input('cinNumber');
        $picRecto = $this->upload($request, 'recto', 'image/CIN');
        $picVerso = $this->upload($request, 'verso', 'image/CIN');

        echo $picRecto;
        try {
            //echo $picRecto;

            if ($picRecto && $picVerso) {
                $cin = new Cin('default', $cinNumber, $picRecto, $picVerso);
                $cin->create();

                $lastCin = $cin->lastCinId();
                $client = $request->session()->get('client');
                $client->setCin($lastCin);
                $client->create();

                $request->session()->put('cin', $lastCin);

                //return redirect('/selectAllReservation');
                return redirect('/getClient');
                
            } else {
                // Gérer l'erreur de téléchargement des fichiers ici
                $error = 'Erreur lors du téléchargement des fichiers CIN.';
                return redirect()->back()->withErrors([$error])->withInput();
            }
        } catch (\Exception $e) {
            $error = $e->getMessage();
            return redirect()->back()->withErrors([$error])->withInput();
        }
    }
    public function getClient(Request $request){

        $client = $request->session()->get('client');
        $cin = $request->session()->get('cin');
        $idclient = $client->lastClientId();
        $clients = $client->findById($idclient);
        $request->session()->put('clientConnected', $clients);

        return view('FOC/compteClient', ['client' => $client, 'cin' => $cin]);
    }
    
    //Uploaedr un fichier
    public function upload(Request $request, $name, $cheminDestination)
    {
        try {
            if ($request->hasFile($name)) {
                $file = $request->file($name);
                $imageName = "";

                if ($file->isValid()) {
                    $extension = $file->getClientOriginalExtension();
                    $allowedExtensions = ['png', 'gif', 'jpg', 'jpeg', 'pdf'];

                    if (in_array($extension, $allowedExtensions)) {
                        $path = public_path($cheminDestination);
                        $imageName = $file->getClientOriginalName();
                        $imageName = preg_replace('/([^.a-z0-9]+)/i', '-', $imageName);

                        $file->move($path, $imageName);
                    } else {
                        $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg ou pdf.';
                        echo $erreur;
                    }
                }
                return $imageName;
            } else {
                $erreur = 'Le fichier ' . $name . ' n\'a pas été soumis.';
                return redirect()->back()->withErrors([$erreur])->withInput();
            }

        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()])->withInput();
        }
    }

    //Inserer client
    public function insertClient(Request $request)
    {
        $firstname = $request->input('name');
        $lastname = $request->input('lastname');
        $phone_number = $request->input('phoneNumber');
        $email = $request->input('email');
        $address = $request->input('address');
        $birth_date = $request->input('birth_date');
        $password = $request->input('password');
        $confirmed_password = $request->input('confirmed_password');
        $customer_profile = $this->upload($request, 'profilPicture', 'image/Client');
        $status = new Status(2, "En attente");
        //$id_cin = null;

        try {
            //$id_client, $first_name, $last_name, $phone_number, $mail, $address, $birth_date, $pwd, $status, $cin ,$customer_picture
            $client = new Client('default', $firstname, $lastname, $phone_number, $email, $address, $birth_date, $password, $status, 'default', 0, $customer_profile);
            $request->session()->put('client', $client);
            if ($password == $confirmed_password) {
                return view('FOC/signUpCin');
            } else {
                $error = "Veuillez Confirmer votre mot de passe";
                return redirect()->back()->withErrors([$error])->withInput();
            }
        } catch (\Exception $e) {
            $error = $e->getMessage();
            return redirect()->back()->withErrors([$error])->withInput();
        }
    }
}
?>