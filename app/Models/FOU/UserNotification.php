<?php
namespace App\Models\FOU;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class UserNotification
{
    public $idUserNotification;
    public $idUser;
    public $idField;
    public $nameField;
    public $idTypeNotification;
    public $dateNotification;
    public $etat;
    public $start_time;

    public function __construct($idUserNotification, $idUser, $idField, $nameField, $idTypeNotification, $dateNotification, $etat, $start_time=null)
    {
        $this->idUserNotification = $idUserNotification;
        $this->idUser = $idUser;
        $this->idField = $idField;
        $this->nameField = $nameField;
        $this->idTypeNotification = $idTypeNotification;
        $this->dateNotification = $dateNotification;
        $this->etat = $etat;
        $this->start_time = $start_time;
    }

    public function save() {
        $sql = "INSERT INTO user_notification (id_user, id_field, id_type_notification, date_notification, etat) VALUES (%s, %s, %s, '%s', %s)";
        $sql = sprintf($sql, $this->idUser, $this->idField, $this->idTypeNotification, $this->dateNotification.' '.$this->start_time, $this->etat);
        DB::insert($sql);

        $field = new FieldDetailled();
        $field->findById($this->idField);
        $sql = "INSERT INTO client_notification (id_client, id_type_notification, etat) VALUES (%s, %s, %s) RETURNING id_client_notification";
        $sql = sprintf($sql,$field->getClient()->getIdClient(), 12, 0);
        $db = DB::selectOne($sql);
        $id_client_notification = $db->id_client_notification;

        $idUser = Session::get("user")->getIdUsers();

        $sql = "INSERT INTO field_reservation_notification (id_client_notification, id_user, id_field) VALUES (%s, %s, %s)";
        $sql = sprintf($sql, $id_client_notification, $idUser, $field->getIdField());
        DB::insert($sql);


    }


    // Changer l'état du notification
    public static function updateState($idUserNotification)
    {
        $sql = "UPDATE user_notification SET ETAT = 1 WHERE id_user_notification = %d";
        $sql = sprintf($sql, $idUserNotification);
        DB::insert($sql);
    }


    // Calcul la durée en minute du
    public function calculDuree()
    {
        $now = Carbon::now();
        // $now->addHours(2);      // Réglage du fuseau horaire à remédier;
        $notification = Carbon::parse($this->dateNotification);

        $interval = $now->diff($notification);

        $minutes = $interval->days * 24 * 60;
        $minutes += $interval->h * 60;
        $minutes += $interval->i;

        return $minutes;
    }


    // Fonction pour préparer le contenue du notification
    public function getContent()
    {
        switch ($this->idTypeNotification) {
            case 1:         // Rappel de réservation ou retard de réservation
                $now = Carbon::now();
                $now->addHours(2);      // Réglage du fuseau horaire à remédier;

                if ($now->isBefore($this->dateNotification)) {
                    $contenue = "Votre réservation du terrain <span class='fieldName'> %s </span> aura lieu dans <span class='time-prevision'> %d min </span>";
                    $contenue = sprintf($contenue, $this->nameField, $this->calculDuree());
                    return $contenue;
                } else {
                    $contenue = "Votre réservation du terrain <span class='fieldName'> %s </span> est en retard de <span class='time-last'> %d min </span>";
                    $contenue = sprintf($contenue, $this->nameField, $this->calculDuree());
                    return $contenue;
                }
                break;

            case 2:
                $contenue = "Vous avez manqué votre réservation du terrain <span class='fieldName'> %s </span>";
                $contenue = sprintf($contenue, $this->nameField);
                return $contenue;
                break;

            default:
                # code...
                break;
        }
    }


    // Fonction pour prendre les notifications de rappel de réservation ou de retard de l'utilisateur
    public static function getAllRappelNotification($idUser)
    {
        // Requete pour prendre les notifications de rappel de réservation qui aura lieu dans 30 min
        $sql = "SELECT * FROM v_near_user_notification WHERE id_user = %d and etat = 0 and id_type_notification = 1";
        $sql = sprintf($sql, $idUser);

        $userNotifications = DB::select($sql);

        $notifications = [];

        foreach ($userNotifications as $notification) {
            $userNotification = new UserNotification(
                $notification->id_user_notification,
                $notification->id_user,
                $notification->id_field,
                $notification->name,
                $notification->id_type_notification,
                $notification->date_notification,
                $notification->etat
            );

            $notifications[] = $userNotification;
        }

        return $notifications;
    }

    public static function getAllMissingNotification($idUser)
    {
        // Requete pour prendre les notifications de rappel de réservation qui aura lieu dans 30 min
        $sql = "SELECT * FROM v_missing_user_notification WHERE id_user = %d and etat = 0 and id_type_notification = 1";
        $sql = sprintf($sql, $idUser);

        $userNotifications = DB::select($sql);

        $notifications = [];

        foreach ($userNotifications as $notification) {
            $userNotification = new UserNotification(
                $notification->id_user_notification,
                $notification->id_user,
                $notification->id_field,
                $notification->name,
                2,
                $notification->date_notification,
                $notification->etat
            );

            $notifications[] = $userNotification;
        }

        return $notifications;
    }

    public static function getAllUserNotification($idUser)
    {
        $rappels = UserNotification::getAllRappelNotification($idUser);
        $missings = UserNotification::getAllMissingNotification($idUser);

        $result = [];
        foreach ($rappels as $rappel) {
            $result[] = $rappel;
        }

        foreach ($missings as $missing) {
            $result[] = $missing;
        }

        return $result;
    }
}
