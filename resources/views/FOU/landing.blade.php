<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FOU/assets/css/accueil.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.min.css') }}">
    <title>Page d'accueil</title>
</head>

<body>
    @include('FOU.headerNotification')
    <div class="container px-3">
        <div class="row mt-3">
            <div class="col-md-6 px-3 accueil-text mt-5">
                <h2 class="">Trouver et réserver plus facilement</h2>
                <p class="mt-3">
                    <strong>Bienvenue dans HILALAO</strong>,
                    une application web pour faciliter la recherche de terrain de sport.
                    Puis nous facilitons la réservation et le payement d'avance.
                </p>
                <a href="{{ route('list-field-all-fou') }}" class="btn btn-warning">Chercher des terrains</a>
            </div>
            <div class="col-md-6 p-2 accueil-img">
                <img src="{{ asset('images/outils-sport.png') }}" alt="">
            </div>
        </div>

        <div class="row mt-3">
            <h3 class="cat-text">Liste des catégories</h3>
            <div class="row categories">
                @foreach ($categories as $category)

                <div class="col-md-3 p-2">
                    <div>
                        <h4>{{ $category->getCategory() }}</h4>
                        <p class="cat-desc">{{ $category->getDescription() }}</p>
                        <a href="{{ route('list-field-fou', ["id_category" => $category->getIdCategory()]) }}" class="btn btn-warning">Voir les terrains</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="row mt-3">
            <h3 class="cat-text">Communauté sportive en ligne</h3>
            <div class="row communaute">
                <div class="col-md-6 px-4 py-2">
                    <div class="row">
                        <div class="col-md-3 icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="col-md-8 fonction">
                            <h4 class="">Intégration dans une équipe</h4>
                            <p>
                                Vous pouvez s'intégrer dans une équipe et évoluez avec votre équipe.
                                Jouer ensemble et progresser ensemble en formant une belle équipe.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-4 py-2">
                    <div class="row">
                        <div class="col-md-3 icon">
                            <i class="fas fa-money-bill"></i>
                        </div>
                        <div class="col-md-8 fonction">
                            <h4 class="">Parier contre d'autre équipe</h4>
                            <p>
                                On vous offre aussi la possibilité de parier contre d'autre équipe.
                                Ce qui va permettre à votre équipe de gagner quelque argent tout se renforçant.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-4 py-2">
                    <div class="row">
                        <div class="col-md-3 icon">
                            <i class="fas fa-broadcast-tower"></i>
                        </div>
                        <div class="col-md-8 fonction">
                            <h4 class="">Renforcer votre votre communication</h4>
                            <p>
                                Dans la communauté ,  renforcer votre communication avec d'autre joueur avec une même passion que vous.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 px-4 py-2">
                    <div class="row">
                        <div class="col-md-3 icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="col-md-8 fonction">
                            <h4 class="">Trouver des adversaires ou joueur</h4>
                            <p>
                                Nous vous proposons des adversaires digne de vos compétences.
                                Et la recherche d'adversaires sera plus pratique et satisfaisant.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
