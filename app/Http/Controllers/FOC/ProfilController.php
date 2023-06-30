<?php
    namespace App\Http\Controllers\FOC;

    use App\Models\FOC\GestionClient\V_ClientCin;
    use App\Models\FOC\GestionClient\Cin;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\Storage;
    
    class ProfilController extends Controller
    {
        public function getProfilInformation(){
            $Cin = new Cin();
            $last_id = $Cin->lastidCin();
            
            $clientCin = new V_ClientCin();
            $ClientSelected = $clientCin->findById($clientCin);
            $first_name = $ClientSelected->$first_name;
            $last_name = $ClientSelected->$last_name;
            $address = $ClientSelected->$address;
            $phone_number = $ClientSelected->$phone_number;
            $mail = $ClientSelected->$mail;
            $birth_date = $ClientSelected->$birth_date;
            $cin_number = $ClientSelected->$cin_number;
            $first_picture = $ClientSelected->$first_picture;
            $second_picture = $ClientSelectedsecond_picture;
        
            return view('FOC/ProfilClient', ['first_name' => $first_name,'last_name' => $last_name,'address' => $address,'phone_number' => $phone_number,'mail' => $mail,'birth_date' => $birth_date , 'cin_number' => $cin_number,'first_picture' => $first_picture,'second_picture' => $second_picture]);
        }
    }
