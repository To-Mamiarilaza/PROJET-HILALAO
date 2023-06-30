<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FOU/assets/css/header.css ') }}">
    <link rel="stylesheet" href="{{ asset('css/FOU/assets/css/profil-terrain.css ') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-5/cs s/all.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/FOU/assets/css/disponibility.css') }}">
    <title>Profil du terrain</title>
</head>

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
                    <img src="./image/terrain.jpg" alt="Image principale du terrain">
                </div>
            </div>
            <div class="col-md-6 p-3">
                <div class="nom-terrain">
                    <img src="./image/foot_ball_icon.jpg" alt="Icone terrain de foot">
                    <h1>Elgeco Plus</h1>
                </div>
                <div class="images mt-3">
                    <img src="./image/elgeco.jpg" alt="Image secondaire du terrain">
                    <img src="./image/elgeco.jpg" alt="Image secondaire du terrain">
                    <img src="./image/elgeco.jpg" alt="Image secondaire du terrain">
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
                    Le Kianja Barea (en français : stade Barea) est un stade
                    de football et d'athlétisme dans l'arrondissement de Mahamasina
                    à Antananarivo, la capitale de Madagascar. Ses
                    40 260 places assises font de lui le plus grand stade
                    de la Grande île. Son architecture s'inspire de la forme
                    des ravinala et des collines de l'Imerina.
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
                        <td>Elgeco Plus</td>
                        <td>Foot à 11</td>
                        <td>Analamanga, mahamasina</td>
                        <td>Extérieur</td>
                        <td>Goudron</td>
                        <td>Eclairé</td>
                        <td>034 14 517 46</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="row my-4">
            <div class="col-md-6 localisation px-4">
                <h2>Localisation du terrain</h2>
                <div class="map mt-3">
                    <img src="image/terrain.jfif" alt="">
                </div>
            </div>
            <div class="col-md-6 tarif px-4">
                <div class="hidden-form" id="hidden-form">
                    <div class="group-input">
                        <input class="jour" type="number" value="1">
                        <input class="star-time" type="time" value="07:00">
                        <input class="end-time" type="time" value="18:00">
                        <input class="price" type="number" value="50000">
                    </div>
                    <div class="group-input">
                        <input class="jour" type="number" value="2">
                        <input class="star-time" type="time" value="07:00">
                        <input class="end-time" type="time" value="18:00">
                        <input class="price" type="number" value="50000">
                    </div>
                    <div class="group-input">
                        <input class="jour" type="number" value="3">
                        <input class="star-time" type="time" value="07:00">
                        <input class="end-time" type="time" value="18:00">
                        <input class="price" type="number" value="50000">
                    </div>
                    <div class="group-input">
                        <input class="jour" type="number" value="4">
                        <input class="star-time" type="time" value="07:00">
                        <input class="end-time" type="time" value="18:00">
                        <input class="price" type="number" value="50000">
                    </div>
                    <div class="group-input">
                        <input class="jour" type="number" value="5">
                        <input class="star-time" type="time" value="07:00">
                        <input class="end-time" type="time" value="18:00">
                        <input class="price" type="number" value="50000">
                    </div>
                    <div class="group-input">
                        <input class="jour" type="number" value="6">
                        <input class="star-time" type="time" value="07:00">
                        <input class="end-time" type="time" value="21:00">
                        <input class="price" type="number" value="65000">
                    </div>
                    <div class="group-input">
                        <input class="jour" type="number" value="7">
                        <input class="star-time" type="time" value="07:00">
                        <input class="end-time" type="time" value="21:00">
                        <input class="price" type="number" value="65000">
                    </div>
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
                            <input type="date" id="date" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="debut" class="form-label">Début</label>
                            <input type="time" id="debut" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="fin" class="form-label">Fin</label>
                            <input type="time" id="fin" class="form-control">
                        </div>
                        <p class="erreur">Votre date de réservation est déja prise !</p>
                        <div class="valider mt-3">
                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">Valider</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-8 calendar px-4">
                    <img src="image/calendar.webp" alt="">
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

    <script src="asset/disponibility.js"></script>
    <script src="asset/bootstrap.bundle.min.js"></script>
</body>

</html>
