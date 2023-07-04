<?php

namespace App\Models\BO;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;

class BackOfficeNotification
{
    public $idAdminNotification;
    public $idTypeNotification;
    public $dateNotification;
    public $idField;
    public $nameField;
    public $idClient;
    public $clientName;
    public $month;
    public $etat;

    public function __construct($idAdminNotification, $idTypeNotification, $dateNotification, $etat)
    {
        $this->idAdminNotification = $idAdminNotification;
        $this->idTypeNotification = $idTypeNotification;
        $this->dateNotification = $dateNotification;
        $this->etat = $etat;
    }

    // Changer l'état du notification 
    public static function updateState($idAdminNotification)
    {
        $sql = "UPDATE admin_notification SET ETAT = 1 WHERE id_admin_notification = %d";
        $sql = sprintf($sql, $idAdminNotification);
        DB::insert($sql);
    }


    // Fonction pour préparer le contenue du notification
    public function getContent()
    {
        switch ($this->idTypeNotification) {
            case 20:         // Notification validation demande d'adhésion
                $date = Carbon::parse($this->dateNotification)->format('Y-m-j');
                $contenue = "<a href=\"" . route('detailClient_admin', ['id_client' => $this->idClient,'ref' => 'validationClient' ]) . "\">Le client <span class='fieldName'> $this->clientName </span> a fait une demande d'adhésion le <span class='time-prevision'> $date </span> </a>";
                return $contenue;
                break;
    
            case 21:         // Notification validation demande d'adhésion
                $date = Carbon::parse($this->dateNotification)->format('Y-m-j');
                $contenue = "<a href=\"" . route('detail_field_admin', ['id_terrain' => $this->idField,'ref' => 'validationClient' ]) . "\">Le client <span class='fieldName'> $this->clientName </span> demande l'ajout du terrain <span class='fieldName'> $this->nameField </span> le <span class='time-prevision'> $date </span></a>";
                return $contenue;
                break;
    
            case 22:         // Notification validation demande d'adhésion
                $mois = Carbon::create(null, $this->month, 1)->format('F');
                $date = Carbon::parse($this->dateNotification)->format('Y-m-j');
                $contenue = "<a href=\"\">Le client <span class='fieldName'> $this->clientName </span> a payé l'abonnement du mois <span class='fieldName'>$mois</span> du terrain <span class='fieldName'> $this->nameField </span> le <span class='time-prevision'> $date </span></a>";
                return $contenue;
                break;
        }
    }
    


    // Fonction pour prendre les notification de demande d'ajout de terrain
    public static function getSubscriptionNotification()
    {
        // Requete pour prendre les notifications de rappel de réservation qui aura lieu dans 30 min
        $sql = "SELECT * FROM v_subscription_notification WHERE etat = 0 and id_type_notification = 22";

        $userNotifications = DB::select($sql);

        $notifications = [];

        foreach ($userNotifications as $notification) {
            $userNotification = new BackOfficeNotification(
                $notification->id_admin_notification,
                $notification->id_type_notification,
                $notification->date_notification,
                $notification->etat
            );
            $userNotification->clientName = $notification->first_name;
            $userNotification->idClient = $notification->id_client;
            $userNotification->idField = $notification->id_field;
            $userNotification->nameField = $notification->name;
            $userNotification->month = $notification->month;

            $notifications[] = $userNotification;
        }

        return $notifications;
    }


    // Notification d'ajout notification
    public static function getFieldAdhesionNotification()
    {
        // Requete pour prendre les notifications de rappel de réservation qui aura lieu dans 30 min
        $sql = "SELECT * FROM v_field_adhesion_notification WHERE etat = 0 and id_type_notification = 21";

        $userNotifications = DB::select($sql);

        $notifications = [];

        foreach ($userNotifications as $notification) {
            $userNotification = new BackOfficeNotification(
                $notification->id_admin_notification,
                $notification->id_type_notification,
                $notification->date_notification,
                $notification->etat
            );
            $userNotification->clientName = $notification->first_name;
            $userNotification->idClient = $notification->id_client;
            $userNotification->idField = $notification->id_field;
            $userNotification->nameField = $notification->name;

            $notifications[] = $userNotification;
        }

        return $notifications;
    }

    // Fonction pour prendre les notifications de rappel de réservation ou de retard de l'utilisateur 
    public static function getClientAdhesionNotification()
    {
        // Requete pour prendre les notifications de rappel de réservation qui aura lieu dans 30 min
        $sql = "SELECT * FROM v_client_adhesion_notification WHERE etat = 0 and id_type_notification = 20";

        $userNotifications = DB::select($sql);

        $notifications = [];

        foreach ($userNotifications as $notification) {
            $userNotification = new BackOfficeNotification(
                $notification->id_admin_notification,
                $notification->id_type_notification,
                $notification->date_notification,
                $notification->etat
            );
            $userNotification->clientName = $notification->first_name;
            $userNotification->idClient = $notification->id_client;

            $notifications[] = $userNotification;
        }

        return $notifications;
    }


    public static function getAllBackOfficeNotification()
    {
        $clientAdhesion = BackOfficeNotification::getClientAdhesionNotification();
        $fieldAdhesion = BackOfficeNotification::getFieldAdhesionNotification();
        $subscriptionNotification = BackOfficeNotification::getSubscriptionNotification();

        $result = [];
        foreach ($clientAdhesion as $temp) {
            $result[] = $temp;
        }

        foreach ($fieldAdhesion as $temp) {
            $result[] = $temp;
        }

        foreach ($subscriptionNotification as $temp) {
            $result[] = $temp;
        }

        usort($result, function ($a, $b) {
            return strtotime($b->dateNotification) - strtotime($a->dateNotification);
        });

        return $result;
    }
}
