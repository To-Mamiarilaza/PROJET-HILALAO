<?php
    namespace App\Http\Controllers\FOC;

    use App\Models\FOC\GestionClient\Customer;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;

    class InscriptionController extends Controller
    {
        public function insertCustomer(Request $request)
        {
            $profile_picture = "";
            if ($request->hasFile('fichier')) {
                $file = $request->file('fichier');
                $extension = $file->getClientOriginalExtension();
                $allowedExtensions = ['png', 'gif', 'jpg', 'jpeg', 'pdf'];
                
                if (in_array($extension, $allowedExtensions)) {
                    $sequence = 1;
                    $newFileName = 'profile' . $sequence . '.' . $extension;
                    
                    while (Storage::exists('public/upload/profil_photo/' . $newFileName)) {
                        $sequence++;
                        $newFileName = 'profile' . $sequence . '.' . $extension;
                    }
                    
                    $path = $file->storeAs('public/upload/profil_photo/', $newFileName);
                    
                    $imageName = $newFileName;
                } else {
                    $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg ou pdf';
                }
            }

            echo $profile_picture;
            
            $name = $request->input('name');
            $email = $request->input('email');
            $adress = $request->input('address');
            $phone_numbers = $request->input('phoneNumber');
            $password = $request->input('password');
            $confirmed_password = $request->input('confirmed_password');
            $card_number = $request->input('idCard');

            if($name != "" && $email != "" && $adress != "" && $phone_numbers != "" && $password != "" && $confirmed_password != "" && $card_number != ""){
                if($password == $confirmed_password){
                    $customer = new Customer(null,$name, $card_number, $profile_picture, $adress, $phone_numbers, $email, $password);
                    //$customer->create();
                    //return view('FOC/acceuil');
                }
            }
            else{
                //return view('FOC/sign');
            }
        }
    }
?>