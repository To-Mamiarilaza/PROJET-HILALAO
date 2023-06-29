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
                <h3>{{ $field->getName() }}</h3>
            </div>
            <div class="row info-texte-creation">
                <p> Creer le : {{ $field->getInsertDate()->format('j F Y'); }} </p>
            </div>
            <div class="row info-texte-description">
                <p>
                    {{ $field->getDescription(); }}
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
                            {{-- <li class="active">Ven 26 Juin</li> --}}
                            @foreach ($field->getAvailability() as $item)
                            <a href="/field/detail/{{ $field->getIdField() }}/{{ $item->getDay()->format('Y-m-d') }}"> <li>{{ $item->getDay()->format('j F Y') }}</li></a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @if (isset($availability))
            <div class="col-md-6 booking-date-creneau">
                <div class="row booking-date-creneau-title">
                    <h7>{{ $availability[0]->getDay()->format('l j F Y') }}</h7>
                </div>
                <div class="row booking-date-creneau-horraire">
                    @foreach ($availability as $item)
                    <div class="row booking-date-creneau-horraire-plageHorrairePrice">
                        <a href="/field/calendar/{{ $field->getIdField() }}/{{ $item->getDay()->format('Y-m-d') }}">
                            <div class="col-md-6 plageHorraire">{{ $item->getStartTime()->format('H') }}h{{ $item->getStartTime()->format('i') }} - {{ $item->getEndTime()->format('H') }}h{{ $item->getEndTime()->format('i') }}</div>
                        </a>
                        <div class="col-md-6 price"> {{ $item->getPrice() }} Ar</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

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
