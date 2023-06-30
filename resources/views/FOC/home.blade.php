<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FOC/home.css') }}">
    <title>Client Home</title>
</head>

<body>
    @include('FOC/header');

    <section>
        <div class="container mt-5">
            <div class="row home-text">
                <div class="col-md-6">
                    <h1>
                        Bienvenue dans votre espace <br> Back Office.
                    </h1>
                    <p class="mt-4">
                        Ici, vous avez un contrôle total sur la gestion de vos terrains.
                        Vous pourrez parcourir rapidement et facilement l'ensemble de vos terrains.
                        Nous vous permettons de mieux gérer votre terrain. Commençons par voir tous vos terrains.
                    </p>
                    <a href="{{ route('list-field') }}" class="btn btn-warning mt-3">Voir les terrains</a>
                </div>
                <div class="col-md-6 image-place">
                    <img src="{{ asset('image/home-client.jpg') }}" alt="Image d'accueil">
                </div>
            </div>
            <div class="fonction-list">
                <h1>Nos services</h1>
                <div class="container px-4">
                    <div class="row mt-4 gx-5">
                        <div class="col-md-4 service">
                            <div class="border p-4">
                                <div class="image-service">
                                    <img src="{{ asset('image/publicité.jpg') }}" alt="Image de publicité">
                                </div>
                                <h3 class="mt-2">Ameliorer la visibilité de votre terrain</h3>
                                <p>
                                    Vous bénéficiez d'une exposition optimale pour votre terrain.
                                    Grâce à notre site fréquenté par de nombreux utilisateurs, vous avez la garantie de
                                    toucher une audience étendue et qualifiée.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-4 service">
                            <div class="border p-4">
                                <div class="image-service">
                                    <img src="{{ asset('image/gestion.jpg') }}" alt="Image de publicité">
                                </div>
                                <h3 class="mt-2">Meilleur gestion du réservation</h3>
                                <p>
                                    Nous nous engageons à vous offrir la meilleure gestion des réservations possible,
                                    vous permettant ainsi de gérer efficacement et sans tracas toutes les réservations liées à votre terrain.
                                </p>
                            </div>
                        </div>

                        <div class="col-md-4 service">
                            <div class="border p-4">
                                <div class="image-service">
                                    <img src="{{ asset('image/meilleur_prix.jpg') }}" alt="Image de publicité">
                                </div>
                                <h3 class="mt-2">Abonnement abordable</h3>
                                <p>
                                    L'abonnement est conçu pour ne pas causé des frustrations. Par rapport au bénéfice obtenue
                                    ce n'est rien du tout.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>
