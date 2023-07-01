<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/FOU/bootstrap/css/bootstrap.min.css') }}">
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
@include('FOU.header-notification')
<div class="container">
    <div class="row contenu">
        <div class="col-md-7 list">
            <div class="row list-titre">
                <div class="col-md-10 firstTitle">
                    Réservation de Terrains
                </div>
            </div>
            <hr>
            <div class="row list-filtre">
                <div class="col-md-10 list-filtre-category">
                    <nav class="navbar navbar-expand-lg navbar-light custom-navbar">
                        <div class="container">
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav me-auto ms-lg-0">
                                @foreach ($categories as $category)
                                <li class="nav-item">
                                    <a class="nav-link" href="/list-field/{{ $category->getIdCategory() }}">{{ $category->getCategory() }}</a>
                                </li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-md-2 list-filtre-filtrer">
                    <button type="button" class="animated-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Filtrer
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Filtres</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('filter') }}" method="post">
                        @csrf
                            <input type="hidden" name="id_category" value="{{ $id_category }}">
                            @foreach ($filters as $filter)
                            <h5>{{ $filter['name'] }}</h5><br>
                                @foreach ($filter['value'] as $cat)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{ $cat->getIdFilter() }}" name="{{ $cat->getNameFilter() }}[]">
                                    <label class="form-check-label" for="inlineCheckbox1">{{ $cat->getValue() }}</label>
                                </div>
                                @endforeach
                                <br>
                            @endforeach
                            <h5>Prix</h5>
                            <input type="date" name="date_reservation" id="">
                            <input type="time" name="time" id="">
                            <div>
                                <input type="radio" name="tri" id="" value="asc">
                                <label for="">Ascendant</label>
                            </div>
                            <div>
                                <input type="radio" name="tri" id="" value="desc">
                                <label for="">Descendant</label>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-primary">Reset</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Valider</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>


            </div>
            <hr>
            <div class="allTerrain">
                @foreach ($fields as $field)
                <div class="row list-terrain" style="margin-top:2%" >
                    <div class="col-md-4 list-terrain-image">
                        <img src="{{ asset('css/FOU/assets/image/profil2.jpg') }}">
                    </div>
                    <div class="col-md-8 list-terrain-info">
                        <div class="row list-terrain-info-head">
                            <div class="col-md-10">
                                <h4> {{ $field->getName() }} </h4>
                                <h6 style="color:gray"> {{ $field->getAddress() }} </h6>
                            </div>
                            <div class="col-md-2">
                                <a href="/field/detail/{{ $field->getIdField() }}"><button class="animated-button-dispo">Dispo</button></a>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <p> {{ $field->getDescription() }} </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-5 col-offset-7 sig">
            <div id="map"></div>
        </div>
    </div>
</div>
@include('Template.Footer')
<script>
    var map = L.map('map').setView([-18.879190, 47.507905], 10);

    var Stadia_OSMBright = L.tileLayer('https://tiles.stadiamaps.com/tiles/osm_bright/{z}/{x}/{y}{r}.png', {
        maxZoom: 20,
        attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
    });

    // marker


    Stadia_OSMBright.addTo(map);

    var terrainData = [
        @foreach($fields as $field)
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
        @endforeach
    ];

    // Exemple d'utilisation des données générées
    terrainData.forEach(function(terrain) {
        // Effectuez d'autres actions spécifiques à chaque terrain
        var marker = L.marker([terrain.latitude, terrain.longitude]).addTo(map);
        marker.bindPopup(terrain.name).openPopup();

    });
</script>
<script src="{{ asset('css/FOU/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
