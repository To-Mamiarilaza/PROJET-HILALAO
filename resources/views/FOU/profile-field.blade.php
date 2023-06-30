<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FOU/assets/css/header.css ') }}">
    <link rel="stylesheet" href="{{ asset('css/FOU/assets/css/profil-terrain.css ') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/FOU/assets/css/disponibility.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <title>Profil du terrain</title>
</head>

<script src="{{ asset('js/dist/index.global.js') }}"></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialDate: '{{ date('Y-m-d') }}',
      initialView: 'timeGridWeek',
      nowIndicator: false,
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'timeGridWeek'
      },
      navLinks: false, // can click day/week names to navigate views
      editable: false,
      selectable: false,
      selectMirror: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        @foreach ($field->getUsersReservations() as $reservation)
        {
            color: 'green',
            title: 'Votre réservation',
            start: "{{ $reservation->getReservationDate()->format('Y-m-d') }}T{{ $reservation->getStartTime()->format('H:i:s') }}",
            end: "{{ $reservation->getReservationDate()->format('Y-m-d') }}T{{ $reservation->getEndTime()->format('H:i:s') }}"
        },
        @endforeach
        @foreach ($field->getOthersReservations() as $reservation)
        {
            color: 'red',
            title: 'Reserved',
            start: "{{ $reservation->getReservationDate()->format('Y-m-d') }}T{{ $reservation->getStartTime()->format('H:i:s') }}",
            end: "{{ $reservation->getReservationDate()->format('Y-m-d') }}T{{ $reservation->getEndTime()->format('H:i:s') }}"
        },
        @endforeach
        @foreach ($field->getDirectReservations() as $reservation)
        {
            color: 'red',
            title: 'Reserved',
            start: "{{ $reservation->getReservationDate()->format('Y-m-d') }}T{{ $reservation->getStartTime()->format('H:i:s') }}",
            end: "{{ $reservation->getReservationDate()->format('Y-m-d') }}T{{ $reservation->getEndTime()->format('H:i:s') }}"
        },
        @endforeach
      ]
    });

    calendar.render();
  });
    function renduEvenement(event, element) {
        if (event.nonUtilise) {
            element.addClass('fc-non-utilise');
        }
    }
</script>
<body>
    <section class="menu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
            <div class="container-fluid px-5 mx-5">
                <a class="navbar-brand logo titre" href="#">HILALAO</a>
                <div class="collapse navbar-collapse mx-5 navbar-links" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 liens">
                        <li class="nav-item mx-2">
                            <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#">Terrains</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="">Mes réservations</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="#">Communauté</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="">Mon Compte</a>
                        </li>
                    </ul>
                    <div class="option-block mx-5">
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

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 p-3">
                <div class="image">
                    <img src="{{ asset('./images/terrain.jpg') }}" alt="Image principale du terrain">
                </div>
            </div>
            <div class="col-md-6 p-3">
                <div class="nom-terrain">
                    <img src="{{ asset('./images/foot_ball_icon.jpg') }}" alt="Icone terrain de foot">
                    <h1>{{ $field->getName() }}</h1>
                </div>
                <div class="images mt-3">
                    <img src="{{ asset('./images/elgeco.jpg') }}" alt="Image secondaire du terrain">
                    <img src="{{ asset('./images/elgeco.jpg') }}" alt="Image secondaire du terrain">
                    <img src="{{ asset('./images/elgeco.jpg') }}" alt="Image secondaire du terrain">
                </div>
                <div class="note p-3">
                    <p>Note du terrain <span class="reserver"><a href="#reservation"><i class="fas fa-edit"></i>
                                Réserver le terrain</a> </span></p>
                    <div class="liste">
                        <p><i class="fas fa-star"></i></p>
                        <p><i class="fas fa-star"></i></p>
                        <p><i class="fas fa-star"></i></p>
                        <p><i class="fas fa-star-half-alt"></i></p>
                        <p><i class="far fa-star"></i></p>
                    </div>
                </div>
                <div class="description">
                    {{ $field->getDescription() }}
                </div>
            </div>
        </div>

        <hr>
        <div class="caracteristique mx-1">
            <table class="table">
                <thead>
                    <tr>
                        <td>Nom</td>
                        <td>Catégorie</td>
                        <td>Adresse</td>
                        <td>Infrastructure</td>
                        <td>Sol</td>
                        <td>Lumière</td>
                        <td>Téléphone</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $field->getName() }}</td>
                        <td>{{ $field->getCategory() }}</td>
                        <td>{{ $field->getAddress() }}</td>
                        <td>{{ $field->getInfrastructure() }}</td>
                        <td>{{ $field->getFieldType() }}</td>
                        <td>{{ $field->getLight() }}</td>
                        <td>{{ $field->getClient()->getPhoneNumber() }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="row my-4">
            <div class="col-md-6 localisation px-4">
                <h2>Localisation du terrain</h2>
                <div class="map mt-3" id="map"></div>
            </div>
            <div class="col-md-6 tarif px-4">
                <div class="hidden-form" id="hidden-form">
                    @foreach ($field->getAvailability() as $availability)
                    <div class="group-input">
                        <input class="jour" type="number" value="{{ $availability->getDayOfWeek() }}">
                        <input class="star-time" type="time" value="{{ $availability->getStartTime()->format('H:i') }}">
                        <input class="end-time" type="time" value="{{ $availability->getEndTime()->format('H:i') }}">
                        <input class="price" type="number" value="{{ $availability->getPrice() }}">
                    </div>
                    @endforeach
                </div>

                <h2>Tarif du terrain</h2>
                <div class="listes-parametres tarif-detail mt-3" id="listes-parametres">

                </div>
            </div>
        </div>
        <hr class="my-4">
        <div class="reservation" id="reservation">
            <h2>RESERVATION DU TERRAIN</h2>
            <div class="row mt-5 mb-4">
                <div class="col-md-4">
                    <h3>Votre réservation</h3>
                    <form action="" class="form px-3">
                        <div class="mt-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" id="date" class="form-control" name="reservation_date">
                        </div>
                        <div class="mt-3">
                            <label for="debut" class="form-label">Début</label>
                            <input type="time" id="debut" class="form-control" name="start_time">
                        </div>
                        <div class="mt-3">
                            <label for="fin" class="form-label">Durée</label>
                            <input type="number" id="fin" class="form-control" name="duration">
                        </div>
                        <p class="erreur">Votre date de réservation est déja prise !</p>
                        <div class="valider mt-3">
                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">Valider</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-8 calendar px-4">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal de validation du réservation-->
    <form action="" class="form">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Validation du réservation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body validation-reservation">
                        <p><span class="little-title">Utilisateur :</span> To MAMIARILAZA</p>
                        <p><span class="little-title">Réservation du terrain :</span> Elgeco plus</p>
                        <p class="temp">Du <span class="date">07-11-23</span> de <span class="date">09:00 H</span> à <span class="date">10:00 H</span></p>
                        <div class="montant">
                            <label for="montant" class="form-label">Montant</label>
                            <input type="text" value="50 000 AR" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="{{ asset('css/FOU/assets/js/disponibility.js') }}"></script>
    <script src="{{ asset('css/FOU/assets/js/bootstrap.bundle.min.js') }}"></script>

<script>
    var map = L.map('map').setView([{{ $field->getLatitude() }}, {{ $field->getLongitude() }}], 15);

    var Stadia_OSMBright = L.tileLayer('https://tiles.stadiamaps.com/tiles/osm_bright/{z}/{x}/{y}{r}.png', {
        maxZoom: 20,
        attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
    });

    // marker


    Stadia_OSMBright.addTo(map);

    var terrainData = [
        {
            name: "{{ $field->getName() }}",
            category: "{{ $field->getCategory() }}",
            fieldType: "{{ $field->getFieldType() }}",
            infrastructure: "{{ $field->getInfrastructure() }}",
            light: "{{ $field->getLight() }}",
            address: "{{ $field->getAddress() }}",
            longitude: {{ $field->getLongitude() }},
            latitude: {{ $field->getLatitude() }},
            description: "{{ $field->getDescription() }}"
        },
    ];

    // Exemple d'utilisation des données générées
    terrainData.forEach(function(terrain) {
        // Effectuez d'autres actions spécifiques à chaque terrain
        var marker = L.marker([terrain.latitude, terrain.longitude]).addTo(map);
        marker.bindPopup(terrain.name).openPopup();

    });
</script>
</body>

</html>
