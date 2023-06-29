<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/FOU/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FOU/assets/css/Template/newHeader.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/FOU/assets/css/SpecifiedCss/specified.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/FOU/assets/css/listTerrainModif.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/FOU/assets/css/profileTerrain.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/FOU/assets/css/carte.css')}}">
    <link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.min.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <title>Document</title>
</head>
<body>
@include('template.Header')
<link rel="stylesheet" href="{{ asset('css/FOU/assets/css/profileTerrain.css') }} ">
<link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.min.css')}}">
<link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.min.css')}}">
<div class="container">
    <div class="row info">
        <div class="col-md-5 info-photo">
            <img src="{{ asset('css/FOU/assets/image/futsalAndraharo.jpg') }}">
        </div>
        <div class="col-md-7 info-texte">
            <div class="row info-texte-title">
                <h3>Urban Futsal Andraharo</h3>
            </div>
            <div class="row info-texte-creation">
                <p> Creer le : 12 Decembre 2014 </p>
            </div>
            <div class="row info-texte-description">
                <p>Ouvert depuis mi-septembre, l’Urban Futsal à Andraharo est le premier centre de loisir où l’on peut jouer au football en salle ou futsal. Dans ces matchs de ballon rond sur miniterrain,
                    il n’est pas besoin d’être un bon dribbleur ou un buteur à la Ronaldo pour s’imposer. Le plaisir de jouer suffit.
                    Ce centre créé par trois amis amoureux du ballon rond, met à la disposition de ses clients quatre terrains synthétiques : deux grands de 30 x 18 mètres et deux petits de 22 x 16 mètres. « Ces terrains sont conçus pour les jeux de cinq contre cinq. Mais à six contre six, cela reste très confortable », explique Freddy Benjamin, le responsable de la société. D’ores et déjà,
                    il est clair que le futsal intéresse beaucoup les Tananariviens.
                    Ce n’est pas si anodin que ça si l’on sait qu’au Brésil, les grands joueurs comme Pelé, Zibo, Socrate, Bebeto ou Ronaldinho sont tous issus du futsal. Ses liens avec le football classique sont d’ailleurs très étroits puisque
                    le futsal est aujourd’hui une discipline sportive indépendante placée sous l’égide de la Fifa.
                </p>
            </div>
            <div class="row info-texte-rating">
                <span class="fa fa-star checked"> </span>
                <span class="fa fa-star checked"> </span>
                <span class="fa fa-star checked"> </span>
                <span class="fa fa-star"> </span>
                <span class="fa fa-star"> </span>
            </div>
        </div>
    </div>
    <div class="row booking">
        <div class="row booking-title">
            <h5>Reservation</h5>
        </div>
        <hr style="
            margin-left: 12px;
            height:2px;
            width: 80%;
        ">
        <div class="row booking-date">
            <div class="col-md-6 booking-date-disponibilite">
                <div class="row booking-date-disponibilite-title">
                    <h7>Choisir la Date</h7>
                </div>
                <div class="row booking-date-disponibilite-allDate">
                    <div class="name-list">
                        <ul>
                            <li class="active">Ven 26 Juin</li>
                            <li>Sam 27 Juin</li>
                            <li>Dim 28 Juin</li>
                            <li>Lun 29 Juin</li>
                            <li>Mar 30 Juin</li>
                            <li>Mer 01  Juin </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 booking-date-creneau">
                <div class="row booking-date-creneau-title">
                    <h7>Vendredi 26 Juin</h7>
                </div>
                <div class="row booking-date-creneau-horraire">
                    <div class="row booking-date-creneau-horraire-plageHorrairePrice">
                        <div class="col-md-6 plageHorraire">12h - 13h30</div>
                        <div class="col-md-6 price"><i class="fas fa-dollar-sign"></i> 50.000Ar</div>
                    </div>
                    <div class="row booking-date-creneau-horraire-plageHorrairePrice">
                        <div class="col-md-6 plageHorraire">15h - 16h</div>
                        <div class="col-md-6 price">
                            <i class="fas fa-dollar-sign"></i>
                            25.000Ar
                        </div>
                    </div>
                    <div class="row booking-date-creneau-horraire-plageHorrairePrice">
                        <div class="col-md-6 plageHorraire">15h - 16h</div>
                        <div class="col-md-6 price">
                            <i class="fas fa-dollar-sign"></i>
                            120.000Ar
                        </div>
                    </div>
                    <div class="row booking-date-creneau-horraire-plageHorrairePrice">
                        <div class="col-md-6 plageHorraire">15h - 16h</div>
                        <div class="col-md-6 price">
                            <i class="fas fa-dollar-sign"></i>
                            140.000Ar
                        </div>
                    </div>
                    <div class="row booking-date-creneau-horraire-plageHorrairePrice">
                        <div class="col-md-6 plageHorraire">15h - 16h</div>
                        <div class="col-md-6 price">
                            <i class="fas fa-dollar-sign"></i>
                            50.000Ar
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="row booking">
        <div class="row confirmation">
            <button class="bouton-confirmation" data-bs-toggle="modal" data-bs-target="#exampleModal">Confirmer</button>
        </div>
    </div> -->
</div>
<script>
    function toggleColor(element) {
      element.classList.toggle('active');
    }
    function toggleButton(button) {
      button.classList.toggle('active');
    }

</script>
<script>
    src="{{ asset('css/FOU/bootstrap/js/bootstrap.bundle.min.js')}}"
</script>
<script>
     // Sélectionne tous les éléments li de la liste
     const liItems = document.querySelectorAll('.name-list li');

// Fonction pour gérer les clics sur les éléments li
function handleClick(event) {
    // Retire la classe "active" de l'élément li actuellement actif
    const activeLi = document.querySelector('.name-list li.active');
    activeLi.classList.remove('active');

    // Ajoute la classe "active" à l'élément li cliqué
    event.target.classList.add('active');
}

// Attache un gestionnaire d'événement de clic à chaque élément li
liItems.forEach(function(li) {
    li.addEventListener('click', handleClick);
});

// Active l'effet hover sur le premier élément li au chargement de la page
window.addEventListener('DOMContentLoaded', function() {
    const firstLi = document.querySelector('.name-list li:first-child');
    firstLi.classList.add('active');
});
</script>
</body>
</html>
