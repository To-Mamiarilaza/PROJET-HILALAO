<?php
namespace App\Http\Controllers\FOC;

use App\Models\FOC\GestionClient\Client;
use App\Models\FOC\GestionClient\Cin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class InscriptionController extends Controller
{
    public function insertCIN(Request $request)
    {
        $cinNumber = $request->input('cinNumber');
        $picRecto = $this->upload($request, 'picRecto', 'image/CIN');
        $picVerso = $this->upload($request, 'picVerso', 'image/CIN');
        //echo $picRecto;

        if ($picRecto && $picVerso) {
            //echo $picRecto;
            //echo $picVerso;
            try {
                $cin = new Cin($cinNumber, $picRecto, $picVerso);
                $cin->create();
                //echo $cin->getFirstPicture();

                $lastId = $cin->lastCinId();
                $client = $request->session()->get('client');
                $client->setCin($lastId);
                $client->create();
                return view('FOC/ProfilClient', ['client' => $client, 'cin' => $cin]);
            } catch (\Exception $e) {
                $error = $e->getMessage();
                return redirect()->back()->withErrors([$error])->withInput();
            }
        } else {
            // Gérer l'erreur de téléchargement des fichiers ici
            $error = 'Erreur lors du téléchargement des fichiers CIN.';
            return redirect()->back()->withErrors([$error])->withInput();
        }
    }

    public function upload(Request $request, $name, $cheminDestination)
    {
        try {
            if ($request->hasFile($name)) {
                echo 'j';
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
    
                        $imageName = $imageName;
                    } else {
                        $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg ou pdf.';
                        echo $erreur;
                    }
                }
                return $imageName;
            } else {
                $erreur = 'Le fichier ' . $name . ' n\'a pas été soumis.';
                echo $erreur;
            }
    
        } catch (\Exception $e) {
            throw $e;
            //return redirect()->back()->withErrors([$e->getMessage()])->withInput();            
        }
    }
    
    
    public function insertClient(Request $request)
    {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $phone_number = $request->input('phoneNumber');
        $email = $request->input('email');
        $address = $request->input('address');
        $birth_date = $request->input('birth_date');
        $password = $request->input('password');
        $confirmed_password = $request->input('confirmed_password');
        // $customer_profile = $request->input('profilPicture');
        // echo $customer_profile;
        //dd($request->all());
        $customer_profile = $this->upload($request, 'profilPicture', 'image/Client');
        //echo $customer_profile;
        // $card_number = $request->input('idCard');
        $id_status = 2;
        //$id_cin = null;

        try {
            $client = new Client($firstname, $lastname, $phone_number, $email, $address, $birth_date, $password, $id_status, 0, $customer_profile);
            $request->session()->put('client', $client);
            if ($password == $confirmed_password) {
                return view('FOC/sign_next_CIN');
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