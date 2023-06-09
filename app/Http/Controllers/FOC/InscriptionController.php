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
            try{
                $cinNumber = $request->input('cinNumber');
                $picRecto = $this->upload($request, 'picRecto', 'recto', 'upload/CIN/');
                $picVerso = $this->upload($request, 'picVerso', 'verso', 'upload/CIN/');
            
                if ($picRecto && $picVerso) {
                    //echo $picRecto;
                    //echo $picVerso;
                    $cin = new Cin($cinNumber, $picRecto, $picVerso);
                    $cin->create();
            
                    $lastId = $cin->lastCinId();
                    //echo $lastId;
                    $formData = $request->session()->get('formData');
                    $firstname = $formData['firstname'];
                    $lastname = $formData['lastname'];
                    $phone_numbers = $formData['phoneNumber'];
                    $email = $formData['email'];
                    $address = $formData['address'];
                    $birth_date = $formData['birth_date'];
                    $password = $formData['password'];
                    $confirmed_password = $formData['confirmed_password'];
                    $id_status = $formData['id_status'];

                    if ($password == $confirmed_password) {
                        $client = new Client($firstname, $lastname, $phone_numbers, $email, $address, $birth_date, $password, $id_status, $lastId);
                        $client->create();
                        return view('FOC/ProfilClient',['client' => $client , 'cin' => $cin]);
                    }
                } else {
                    // Gérer l'erreur de téléchargement des fichiers ici
                    $erreur = 'Erreur lors du téléchargement des fichiers CIN.';
                }
            }
            catch(\Exception $e){
                //throw $e;
                return redirect()->back()->withErrors([$e->getMessage()])->withInput();
            }
        }
        
        public function upload(Request $request, $name, $nomDuFichier, $cheminDestination)
        {
            try{
                $imageName = "";
                if ($request->hasFile($name)) {
                    $file = $request->file($name);
                    $extension = $file->getClientOriginalExtension();
                    $allowedExtensions = ['png', 'gif', 'jpg', 'jpeg', 'pdf'];
            
                    if (in_array($extension, $allowedExtensions)) {
                        $sequence = 1;
                        $newFileName = $nomDuFichier . $sequence . '.' . $extension;
            
                        while (Storage::exists($cheminDestination . $newFileName)) {
                            $sequence++;
                            $newFileName = $nomDuFichier . $sequence . '.' . $extension;
                        }
                        $path = $file->storeAs($cheminDestination, $newFileName, 'public');
            
                        $file->move($path,$newFileName);

                        $imageName = $newFileName;
                    } else {
                        // Gérer l'erreur d'extension de fichier ici
                        $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg ou pdf.';
                    }
                }
            
                return $imageName;
            }
            catch(\Exception $e){
                //throw $e;
                return redirect()->back()->withErrors([$e->getMessage()])->withInput();            
            }
        }
        public function insertClient(Request $request)
        {
            try{
                $firstname = $request->input('firstname');
                $lastname = $request->input('lastname');
                $phone_number = $request->input('phoneNumber');
                $email = $request->input('email');
                $address = $request->input('address');
                $birth_date = $request->input('birth_date');
                $password = $request->input('password');
                $confirmed_password = $request->input('confirmed_password');
                // $card_number = $request->input('idCard');
                $id_status = 2;
                //$id_cin = null;

                    $request->session()->put('formData', [
                        'firstname' => $firstname,
                        'lastname' => $lastname,
                        'phoneNumber' => $phone_number,
                        'email' => $email,
                        'address' => $address,
                        'birth_date' => $birth_date,
                        'password' => $password,
                        'confirmed_password' => $confirmed_password,
                        'id_status' => $id_status,
                    ]);
                    if($password == $confirmed_password){
                        return view('FOC/sign_next_CIN');
                    }
                    else{
                        $error = "Veuillez Confirmer votre mot de passe";
                        return redirect()->back()->withErrors([$error])->withInput();
                    }
            }
            catch(\Exception $e){
                throw $e;
                return view('FOC/sign',['error' , $e->getMessage()]);
            }
        }
    }
?>