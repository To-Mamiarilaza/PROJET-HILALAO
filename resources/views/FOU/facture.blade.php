<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/FOU/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FOU/assets/css/factureUtililsateur.css') }}">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <title>Document</title>
</head>
<div class="container content">
    <div class="row content-facturation">
        <div class="row head">
            <div class="col-md-5 head-us">
                <div class="row head-us-logo">
                    <div class="col-md-2 head-us-logo-photo">
                        <h1>H</h1>
                    </div>
                    <div class="col-md-4 head-us-logo-title">
                        <h3>Hilalao</h3>
                    </div>
                </div>
                <div class="row head-us-mail">
                    <p><a href="#">tiavinaramia@gmail.com</a></p>
                </div>
                <div class="row head-us-numero">
                    <p>+261 34 18 237 12</p>
                </div>
            </div>
            <div class="col-md-5 head-client">
                <h5>{{ $field->getName() }}</h5>
                <p> ADRESSE : <span class="head-client-styleP">{{ $field->getClient()->getAddress() }}</p>
                <p> TELEPHONE : <span class="head-client-styleP">{{ $field->getClient()->getPhoneNumber() }}</p>
                <p> MAIL : <span class="head-client-styleP"><a href="#">{{ $field->getClient()->getMail() }}</a></p>
            </div>
            <hr>
        </div>
        <div class="row detailFacture">
            <div class="col-md-4 detailFacture-utilisateur">
                <p class="detailFacture-utilisateur-P">FACTURE POUR</p>
                <p>{{ $reservation->getUsers()->getFirstName() }} {{ $reservation->getUsers()->getLastName() }}</p>
                <p class="detailFacture-utilisateur-mail">{{ $reservation->getUsers()->getMail() }}</p>
            </div>
            <div class="col-md-6 detailFacture-reservation">
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-5 detailFacture-reservation-label">
                        <p>N_Reservation :</p>
                        <p>Categorie :</p>
                        <p>Date :</p>
                        <p>Horraire : </p>
                    </div>
                    <div class="col-md-4 detailFacture-reservation-value">
                        <p>{{ $reservation->getReference() }}</p>
                        <p>{{ $reservation->getField()->getCategory() }}</p>
                        <p>{{ $reservation->getReservationDate()->format('d F Y') }}</p>
                        <p>{{ $reservation->getStartTime()->format('H:i') }}h - {{ $reservation->getEndTime()->format('H:i') }}h</p>
                    </div>
                    <hr>
                </div>
                <div class="row detailFacture-reservation-payement">
                    <div class="col-md-5">
                        <p>Total a Payer :</p>
                        <p>Paye :</p>
                        <p>Reste a Payer :</p>
                    </div>
                    <div class="col-md-5 detailFacture-reservation-payement-prix">
                        <p>{{ $reservation->getMontant() * 2 }}</p>
                        <p>{{ $reservation->getMontant() }}</p>
                        <p>{{ $reservation->getMontant() }}</p>
                    </div>
                    <div class="col-md-2 detailFacture-reservation-payement-Ar">
                        <p>Ar</p>
                        <p>Ar</p>
                        <p>Ar</p>
                    </div>
                </div>
            </div>
        </div>
        <hr style="
    margin-top: -16%;
">
    </div>
</div>
</body>
</html>
