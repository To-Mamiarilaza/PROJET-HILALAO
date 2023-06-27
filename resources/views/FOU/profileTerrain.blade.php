@include('template.Header')
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
