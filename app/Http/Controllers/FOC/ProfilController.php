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
            $Cin = new Cin('1230354','r.png','v.png');
            $last_id = $Cin->lastCinid();

            $clientCin = new V_ClientCin(1,"koto","lala",0320511410,"email@gmail.com","itaosy","10-05-2022",1,117031003744,"r.png","second.png");
            $ClientSelected = $clientCin->findById($last_id);
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
