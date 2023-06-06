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
    <section class="menu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand mx-5 titre" href="#">HILALAO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbar-links" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tableau de Bord</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Mes Terrains</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Mon compte</a>
                        </li>
                    </ul>
                    <div class="option-block d-flex mx-5">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#"><i class="fas fa-bell"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-power-off"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </section>

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
                    <a href="" class="btn btn-warning mt-3">Voir les terrains</a>
                </div>
                <div class="col-md-6 image-place">
                    <img src="{{ asset('image/home-client.jpg') }}" alt="Image d'accueil">
                </div>
            </div>
            <div class="fonction-list">
                <h1>Nos services</h1>
                <div class="row mt-3">
                    <div class="col-md-4 service">
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

                    <div class="col-md-4 service">
                        <div class="image-service">
                            <img src="{{ asset('image/gestion.jpg') }}" alt="Image de publicité">
                        </div>
                        <h3 class="mt-2">Meilleur gestion du réservation</h3>
                        <p>
                            Nous nous engageons à vous offrir la meilleure gestion des réservations possible,
                            vous permettant ainsi de gérer efficacement et sans tracas toutes les réservations liées à votre terrain.
                        </p>
                    </div>

                    <div class="col-md-4 service">
                        <div class="image-service">
                            <img src="{{ asset('image/gestion.jpg') }}" alt="Image de publicité">
                        </div>
                        <h3 class="mt-2">Abonnement abordable</h3>
                        <p>
                            Nous nous engageons à vous offrir la meilleure gestion des réservations possible,
                            vous permettant ainsi de gérer efficacement et sans tracas toutes les réservations liées à votre terrain.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>