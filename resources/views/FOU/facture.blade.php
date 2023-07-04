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
@include('template.Header')
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
                    <p><a href="#">hilalaomdg@gmail.com</a></p>
                </div>
                <div class="row head-us-numero">
                    <p>+261 34 18 237 12</p>
                </div>                
            </div>
            <div class="col-md-5 head-client">
                <h5>URBAN Futsal Andraharo</h5>
                <p> ADRESSE : <span class="head-client-styleP">Andraharo Ivandry</p> 
                <p> TELEPHONE : <span class="head-client-styleP">+261 33 478 12</p>
                <p> MAIL : <span class="head-client-styleP"><a href="#">futsalandr@gmail.com</a></p>     
            </div>
            <hr>  
        </div>  
        <div class="row detailFacture">
            <div class="col-md-4 detailFacture-utilisateur">
                <p class="detailFacture-utilisateur-P">FACTURE POUR</p>
                <p>To Mamiarilaza</p>
                <p class="detailFacture-utilisateur-mail">tomamy@gmail.com</p>
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
                        <p>RES001789</p>
                        <p>Foot 7x7</p>
                        <p>7 Aout 2023</p>
                        <p>14h - 16h</p>
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
                        <p>120.000</p>
                        <p>60.000</p>
                        <p>60.000</p>
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