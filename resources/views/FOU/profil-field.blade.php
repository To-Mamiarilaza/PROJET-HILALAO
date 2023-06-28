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
                <p> Creer le : {{ $field->getInsertDate() }}</p>
            </div>
            <div class="row info-texte-description">
                <p>
                    {{ $field->getDescription() }}
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
            <div class="col-md-12 ">
                <h3>Reservation</h3>
                <hr style="margin-top: -5px;">
            </div>
        </div>
        <div class="row booking-date">
            <div class="col-6 col-md-3 mt-5">
                <div class="custom-div" onclick="toggleColor(this)">
                    <h5 class="mb-0">Lun</h5>
                    <p class="mb-0">1</p>
                    <footer class="mt-1">Juin</footer>
                </div>
            </div>
            <div class="col-6 col-md-3 mt-5 calendrier">
                <div class="custom-div" onclick="toggleColor(this)">
                    <h5 class="mb-0">Mar</h5>
                    <p class="mb-0">2</p>
                    <footer class="mt-1">Juin</footer>
                </div>
            </div>
            <div class="col-6 col-md-3 mt-5 calendrier">
                <div class="custom-div" onclick="toggleColor(this)">
                    <h5 class="mb-0">Mer</h5>
                    <p class="mb-0">3</p>
                    <footer class="mt-1">Juin</footer>
                </div>
            </div>
            <div class="col-6 col-md-3 mt-5 calendrier">
                <div class="custom-div" onclick="toggleColor(this)">
                    <h5 class="mb-0">Jeu</h5>
                    <p class="mb-0">4</p>
                    <footer class="mt-1">Juin</footer>
                </div>
            </div>
            <div class="col-6 col-md-3 mt-5 calendrier">
                <div class="custom-div" onclick="toggleColor(this)">
                    <h5 class="mb-0">Ven</h5>
                    <p class="mb-0">5</p>
                    <footer class="mt-1">Juin</footer>
                </div>
            </div>
            <div class="col-6 col-md-3 mt-5 calendrier">
                <div class="custom-div" onclick="toggleColor(this)">
                    <h5 class="mb-0">Sam</h5>
                    <p class="mb-0">6</p>
                    <footer class="mt-1">Juin</footer>
                </div>
            </div>
            <div class="col-6 col-md-3 mt-5 calendrier">
                <div class="custom-div" onclick="toggleColor(this)">
                    <h5 class="mb-0">Dim</h5>
                    <p class="mb-0">7</p>
                    <footer class="mt-1">Juin</footer>
                </div>
            </div>
            <div class="col-6 col-md-3 mt-5 calendrier">
                <div class="custom-div" onclick="toggleColor(this)">
                    <h5 class="mb-0">Lun</h5>
                    <p class="mb-0">8</p>
                    <footer class="mt-1">Juin</footer>
                </div>
            </div>
            <div class="col-6 col-md-3 mt-5 calendrier">
                <div class="custom-div" onclick="toggleColor(this)">
                    <h5 class="mb-0">Mar</h5>
                    <p class="mb-0">9</p>
                    <footer class="mt-1">Juin</footer>
                </div>
            </div>
            <div class="col-6 col-md-3 mt-5 calendrier">
                <div class="custom-div" onclick="toggleColor(this)">
                    <h5 class="mb-0">Mer</h5>
                    <p class="mb-0">10</p>
                    <footer class="mt-1">Juin</footer>
                </div>
            </div>
            <div class="col-6 col-md-3 mt-5 calendrier">
                <div class="custom-div" onclick="toggleColor(this)">
                    <h5 class="mb-0">Jeu</h5>
                    <p class="mb-0">11</p>
                    <footer class="mt-1">Juin</footer>
                </div>
            </div>
            <div class="col-6 col-md-3 mt-5 calendrier">
                <div class="custom-div" onclick="toggleColor(this)">
                    <h5 class="mb-0">Ven</h5>
                    <p class="mb-0">12</p>
                    <footer class="mt-1">Juin</footer>
                </div>
            </div>
            <div class="col-6 col-md-3 mt-5 calendrier">
                <div class="custom-div" onclick="toggleColor(this)">
                    <h5 class="mb-0">Sam</h5>
                    <p class="mb-0">13</p>
                    <footer class="mt-1">Juin</footer>
                </div>
            </div>
            <div class="col-6 col-md-3 mt-5 calendrier">
                <div class="custom-div" onclick="toggleColor(this)">
                    <h5 class="mb-0">Dim</h5>
                    <p class="mb-0">14</p>
                    <footer class="mt-1">Juin</footer>
                </div>
            </div>
            <div class="col-6 col-md-3 mt-5 calendrier">
                <div class="custom-div" onclick="toggleColor(this)">
                    <h5 class="mb-0">Lun</h5>
                    <p class="mb-0">15</p>
                    <footer class="mt-1">Juin</footer>
                </div>
            </div>
            <div class="col-6 col-md-3 mt-5 calendrier">
                <div class="custom-div" onclick="toggleColor(this)">
                    <h5 class="mb-0">Mar</h5>
                    <p class="mb-0">16</p>
                    <footer class="mt-1">Juin</footer>
                </div>
            </div>
            <div class="col-6 col-md-3 mt-5 calendrier">
                <div class="custom-div" onclick="toggleColor(this)">
                    <h5 class="mb-0">Mer</h5>
                    <p class="mb-0">17</p>
                    <footer class="mt-1">Juin</footer>
                </div>
            </div>
            <div class="col-6 col-md-3 mt-5 calendrier">
                <div class="custom-div" onclick="toggleColor(this)">
                    <h5 class="mb-0">Jeu</h5>
                    <p class="mb-0">18</p>
                    <footer class="mt-1">Juin</footer>
                </div>
            </div>
            <div class="col-6 col-md-3 mt-5 calendrier">
                <div class="custom-div" onclick="toggleColor(this)">
                    <h5 class="mb-0">Ven</h5>
                    <p class="mb-0">19</p>
                    <footer class="mt-1">Juin</footer>
                </div>
            </div>
            <div class="col-6 col-md-3 mt-5 calendrier">
                <div class="custom-div" onclick="toggleColor(this)">
                    <h5 class="mb-0">Sam</h5>
                    <p class="mb-0">20</p>
                    <footer class="mt-1">Juin</footer>
                </div>
            </div>
            <div class="col-6 col-md-3 mt-5 calendrier">
                <div class="custom-div" onclick="toggleColor(this)">
                    <h5 class="mb-0">Dim</h5>
                    <p class="mb-0">21</p>
                    <footer class="mt-1">Juin</footer>
                </div>
            </div>

        </div>
        <hr class="hrSpecifique">
        <div class="row creneau">
            <div class="col-md-2 creneau-title">
                <h5>Creneau Possible</h5>
            </div>
            <div class="col-md-10 creneau-horraire">
                <div class="horraire-div" onclick="toggleColor(this)">11:00</div>
                <div class="horraire-div" onclick="toggleColor(this)">12:00</div>
                <div class="horraire-div" onclick="toggleColor(this)">13:00</div>
                <div class="horraire-div" onclick="toggleColor(this)">14:00</div>
                <div class="horraire-div" onclick="toggleColor(this)">15:00</div>
                <div class="horraire-div" onclick="toggleColor(this)">16:00</div>
                <div class="horraire-div" onclick="toggleColor(this)">17:00</div>
                <div class="horraire-div" onclick="toggleColor(this)">18:00</div>
                <div class="horraire-div" onclick="toggleColor(this)">19:00</div>
                <div class="horraire-div" onclick="toggleColor(this)">20:00</div>
                <div class="horraire-div" onclick="toggleColor(this)">21:00</div>
                <div class="horraire-div" onclick="toggleColor(this)">22:00</div>
                <div class="horraire-div" onclick="toggleColor(this)">23:00</div>
                <div class="horraire-div" onclick="toggleColor(this)">24:00</div>
            </div>
        </div>
        <hr style="margin-left: 1%;width: 96%;">
        <!-- <div class="row confirmation">
            <button class="bouton-confirmation">Confirmer</button>
        </div> -->
        <div class="row confirmation">
    <button class="bouton-confirmation" data-bs-toggle="modal" data-bs-target="#exampleModal">Confirmer</button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Formulaire de confirmation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Votre contenu de formulaire ici -->
          <form>
            <div class="mb-3">
              <label for="nom" class="form-label">Nom</label>
              <input type="text" class="form-control" id="nom">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email">
            </div>
            <!-- Ajoutez d'autres champs de formulaire selon vos besoins -->
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="button" class="btn btn-primary">Confirmer</button>
        </div>
      </div>
    </div>
  </div>
    </div>
</div>
<script>
    function toggleColor(element) {
      element.classList.toggle('active');
    }

</script>
<script>
    src="{{ asset('css/FOU/bootstrap/js/bootstrap.bundle.min.js')}}"
</script>
</body>
</html>
