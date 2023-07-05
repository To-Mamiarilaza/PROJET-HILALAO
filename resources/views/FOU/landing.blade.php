<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('./bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FOU/assets/css/accueil.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.min.css') }}">
    <title>Page d'accueil</title>
</head>

<body>

    @include('FOU.header-notification')
    <div class="first-row p-1">
        <div class="container p-5 mt-3">
            <div class="row">
                <div class="col-md-6 px-4 accueil-text mt-5">
                    <h2 class="">Trouver et réserver plus facilement</h2>
                    <p class="mt-3 bienvenue">
                        <strong>Bienvenue dans HILALAO</strong>,
                        une application web pour faciliter la recherche de terrain de sport.
                        Puis nous facilitons la réservation et le payement d'avance.
                    </p>
                    <a href="{{ route('list-field-all-fou') }}" class="btn btn-warning">Chercher des terrains</a>
                    <br>
                    <a href="{{ route('firstPage') }}" class="passage mt-4"> <i class="fas fa-hand-point-right"></i> Je veux gérer mon terrain</a>
                </div>
                <div class="col-md-6 px-5">
                    <div class="row">
                        <div class="col-md-6 px-2">
                            <img src="{{ asset('image/landing-image.png') }}" alt="" class="image-left">
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('./image/basket.jpg') }}" alt="" class="image-right image-right-up pb-2">
                            <br>
                            <img src="{{ asset('./image/foot.jpg') }}" alt="" class="image-right image-right-down pt-2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="second-row">
        <div class="container mt-4">
            <div class="row">
                @foreach ($categories as $categorie)

                <div class="col-md-3 categorie">
                    <a href="{{ route('list-field-fou', ["id_category" => $categorie->getIdCategory()]) }}">
                        <div class="categorie-type">
                            <div class="entete"></div>
                            <div class="detail">
                                <img src="{{ asset('./image/foot-icon.jpg') }}" alt="">
                                <span>{{ $categorie->getCategory() }}</span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="third-row p-1">
        <div class="container mt-4">
            <h2>Nos service</h2>
            <p class="service-text mt-3">
                Que vous soyez à la recherche d'un terrain pour une partie de football entre amis, un match <br> de
                basket
                compétitif ou un événement sportif professionnel, notre site web met à votre <br>
                disposition des fonctionnalités destinées à répondre à vos besoins.
            </p>
        </div>
    </div>

    <div class="quad-row mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4 p-3">
                    <div class="box p-3">
                        <i class="fas fa-search-location"></i>
                        <h4>Recherche de terrain</h4>
                        <p>Trouvez facilement le terrain idéal grâce à notre moteur de recherche avancé. Filtrez les
                            résultats par localisation, taille, équipements, etc., et consultez les photos et détail
                            pour prendre une décision éclairée.</p>
                    </div>
                </div>

                <div class="col-md-4 p-3">
                    <div class="box p-3">
                        <i class="fas fa-calendar-check"></i>
                        <h4>Réservation de terrain</h4>
                        <p>Réservez votre terrain en ligne en quelques clics. Choisissez la date, l'heure et la durée
                            souhaitées, puis nous chargerons de votre réservation.</p>
                    </div>
                </div>

                <div class="col-md-4 p-3">
                    <div class="box p-3">
                        <i class="fas fa-donate"></i>
                        <h4>Paiement du réservation</h4>
                        <p>Après avoir sélectionné les détails de votre réservation, vous serez redirigé vers notre page
                            de paiement sécurisée. Une fois le paiement effectué avec succès,
                            votre réservation sera confirmée.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('Template.Footer')

</body>

</html>
