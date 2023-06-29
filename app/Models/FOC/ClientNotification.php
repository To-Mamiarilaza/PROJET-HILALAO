<?php

namespace App\Models\FOC;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;

class ClientNotification
{
    public $idClientNotification;
    public $idClient;
    public $idTypeNotification;
    public $dateNotification;
    public $idField;
    public $nameField;
    public $idUser;
    public $userName;
    public $month;
    public $etat;
    public $resultat;       // Résultat du demande d'adhesion de terrain

    public function __construct($idClientNotification, $idClient, $idTypeNotification, $dateNotification, $etat)
    {
        $this->idClientNotification = $idClientNotification;
        $this->idClient = $idClient;
        $this->idTypeNotification = $idTypeNotification;
        $this->dateNotification = $dateNotification;
        $this->etat = $etat;
    }

    // Changer l'état du notification 
    public static function updateState($idClientNotification)
    {
        $sql = "UPDATE client_notification SET ETAT = 1 WHERE id_client_notification = %d";
        $sql = sprintf($sql, $idClientNotification);
        DB::insert($sql);
    }


    public function calculDureeDay()
    {
        $now = Carbon::now();
        $now->addHours(2); // Réglage du fuseau horaire à remédier
        $notification = Carbon::parse($this->dateNotification);

        $interval = $now->diff($notification);

        if ($interval->days >= 1) {
            $days = $interval->days;
            $hours = $interval->h;
            $minutes = $interval->i;

            $formattedDuration = $days . ' jour(s), ' . $hours . ' heure(s) et ' . $minutes . ' minute(s)';
        } else {
            $hours = $interval->h;
            $minutes = $interval->i;

            $formattedDuration = $hours . ' heure(s) et ' . $minutes . ' minute(s)';
        }

        return $formattedDuration;
    }


    // Fonction pour préparer le contenue du notification
    public function getContent()
    {
        switch ($this->idTypeNotification) {
            case 10:         // NOtification validation demande d'adhesion
                $date = Carbon::parse($this->dateNotification)->format('Y-m-j');
                if ($this->resultat == 0) {
                    $contenue = "Votre demande d'adhésion du <span class='time-prevision'> $date </span> a été refusé";
                    return $contenue;
                } else {
                    $contenue = "Votre demande d'adhésion du  <span class='time-prevision'> $date </span> a été accepté";
                    return $contenue;
                }
                break;

            case 11:
                $date = Carbon::parse($this->dateNotification)->format('Y-m-j');
                if ($this->resultat == 0) {
                    $contenue = "Votre demande d'ajout du terrain <span class='fieldName'> $this->nameField </span> le <span class='time-prevision'> $date </span> a été refusé";
                    return $contenue;
                } else {
                    $contenue = "Votre demande d'ajout du terrain <span class='fieldName'> $this->nameField </span> le <span class='time-prevision'> $date </span> a été accepté";
                    return $contenue;
                }
                break;

            case 12:
                $date = Carbon::parse($this->dateNotification)->format('Y-m-j H:i:s');
                $contenue = "L' utilisateur <span class='fieldName'> $this->userName </span> réserve votre terrain <span class='fieldName'> $this->nameField </span> le <span class='time-prevision'> $date </span> ";
                return $contenue;
                break;

            case 13:
                $mois = Carbon::create(null, $this->month, 1)->format('F');
                $contenue = "Votre abonnement du mois <span class='fieldName'>" . $mois . " </span> sera expiré dans <span class='time-last'>  " .  $this->calculDureeDay() . " </span>";
                return $contenue;
                break;

            default:
                # code...
                break;
        }
    }


    // Prends les notifications de rappel de payement d'abonnement
    // Il y a une analyse appelé par le back office est insert dans cette notification pour rappelé le payment
    // des abonnements
    public static function getSubscriptionNotification($idClient)
    {
        // Requete pour prendre les notifications de rappel de réservation qui aura lieu dans 30 min
        $sql = "SELECT * FROM v_field_subscription_notification WHERE id_client = %d and etat = 0 and id_type_notification = 13";
        $sql = sprintf($sql, $idClient);

        $userNotifications = DB::select($sql);

        $notifications = [];

        foreach ($userNotifications as $notification) {
            $userNotification = new ClientNotification(
                $notification->id_client_notification,
                $notification->id_client,
                $notification->id_type_notification,
                $notification->date_notification,
                $notification->etat
            );
            $userNotification->idField = $notification->id_field;
            $userNotification->nameField = $notification->name;
            $userNotification->month = $notification->month;

            $notifications[] = $userNotification;
        }

        return $notifications;
    }

    // Prends les notification de validation d'ajout terrain du client
    public static function getReservationNotification($idClient)
    {
        // Requete pour prendre les notifications de rappel de réservation qui aura lieu dans 30 min
        $sql = "SELECT * FROM v_field_reservation_notification WHERE id_client = %d and etat = 0 and id_type_notification = 12";
        $sql = sprintf($sql, $idClient);

        $userNotifications = DB::select($sql);

        $notifications = [];

        foreach ($userNotifications as $notification) {
            $userNotification = new ClientNotification(
                $notification->id_client_notification,
                $notification->id_client,
                $notification->id_type_notification,
                $notification->date_notification,
                $notification->etat
            );
            $userNotification->idUser = $notification->id_user;
            $userNotification->idField = $notification->id_field;
            $userNotification->userName = $notification->first_name;
            $userNotification->nameField = $notification->name;

            $notifications[] = $userNotification;
        }

        return $notifications;
    }

    // Prends les notification de validation d'ajout terrain du client
    public static function getFieldValidation($idClient)
    {
        // Requete pour prendre les notifications de rappel de réservation qui aura lieu dans 30 min
        $sql = "SELECT * FROM v_field_validation_notification WHERE id_client = %d and etat = 0 and id_type_notification = 11";
        $sql = sprintf($sql, $idClient);

        $userNotifications = DB::select($sql);

        $notifications = [];

        foreach ($userNotifications as $notification) {
            $userNotification = new ClientNotification(
                $notification->id_client_notification,
                $notification->id_client,
                $notification->id_type_notification,
                $notification->date_notification,
                $notification->etat
            );
            $userNotification->resultat = $notification->resultat;
            $userNotification->idField = $notification->id_field;
            $userNotification->nameField = $notification->name;

            $notifications[] = $userNotification;
        }

        return $notifications;
    }


    // Fonction pour prendre les notifications de rappel de réservation ou de retard de l'utilisateur 
    public static function getClientValidation($idClient)
    {
        // Requete pour prendre les notifications de rappel de réservation qui aura lieu dans 30 min
        $sql = "SELECT * FROM v_client_validation_notification WHERE id_client = %d and etat = 0 and id_type_notification = 10";
        $sql = sprintf($sql, $idClient);

        $userNotifications = DB::select($sql);

        $notifications = [];

        foreach ($userNotifications as $notification) {
            $userNotification = new ClientNotification(
                $notification->id_client_notification,
                $notification->id_client,
                $notification->id_type_notification,
                $notification->date_notification,
                $notification->etat
            );
            $userNotification->resultat = $notification->resultat;

            $notifications[] = $userNotification;
        }

        return $notifications;
    }


    public static function getAllClientNotification($idUser)
    {
        $clientValidations = ClientNotification::getClientValidation($idUser);
        $fieldValidations = ClientNotification::getFieldValidation($idUser);
        $fieldReservations = ClientNotification::getReservationNotification($idUser);
        $fieldSubscriptions = ClientNotification::getSubscriptionNotification($idUser);

        $result = [];
        foreach ($clientValidations as $clientValidation) {
            $result[] = $clientValidation;
        }

        foreach ($fieldValidations as $fieldValidation) {
            $result[] = $fieldValidation;
        }

        foreach ($fieldReservations as $fieldReservation) {
            $result[] = $fieldReservation;
        }

        foreach ($fieldSubscriptions as $fieldSubscription) {
            $result[] = $fieldSubscription;
        }

        usort($result, function ($a, $b) {
            return strtotime($b->dateNotification) - strtotime($a->dateNotification);
        });

        return $result;
    }
}
