<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FOC/profil-terrain.css') }}">
    <title>Profil du terrain</title>
</head>

<body>
    @include('FOC/header')

    <div class="container mt-4">
        <div class="row gx-5">
            <div class="col-md-4">
                <div class="principale">
                    <a href="" data-bs-toggle="modal" data-bs-target="#updatePhoto" onclick="updatePhoto(this)">
                        <img class="principale__img img" src="{{ asset('image/elgeco.jpg') }}" alt="Image du terrain principale">
                    </a>
                </div>
                <div class="second-list mt-3">
                    <div class="row">
                        <div class="col-md-4 second">
                            <a href="" data-bs-toggle="modal" data-bs-target="#updatePhoto" onclick="updatePhoto(this)">
                                <img class="second-list__second__img img" src="{{ asset('image/elgeco-plus.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="col-md-4 second">
                            <a href="" data-bs-toggle="modal" data-bs-target="#updatePhoto" onclick="updatePhoto(this)">
                                <img class="second-list__second__img img" src="{{ asset('image/elgeco-plus.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="col-md-4 second">
                            <a href="" data-bs-toggle="modal" data-bs-target="#updatePhoto" onclick="updatePhoto(this)">
                                <img class="second-list__second__img img" src="{{ asset('image/elgeco-plus.jpg') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="dispo">
                    <h3 class="dispo__titre mt-3"> DISPONIBILITE ET PRIX</h3>
                    <p class="dispo_text">Liste de vos paramètrage du terrains. Les disponibilités et prix sont affichée dessus : </p>
                    <div class="list-parametre">

                        <div class="parametre">
                            <ul>
                                <li class="jour jour--checked">L</li>
                                <li class="jour jour--checked">M</li>
                                <li class="jour jour--checked">M</li>
                                <li class="jour jour--checked">J</li>
                                <li class="jour jour--checked">V</li>
                                <li class="jour">S</li>
                                <li class="jour">D</li>
                            </ul>
                            <p class="parameter-hour">10:00 H à 13:00 H <span class="parameter-price">50 000 Ar</span> </p>
                        </div>

                        <div class="parametre">
                            <ul>
                                <li class="jour">L</li>
                                <li class="jour">M</li>
                                <li class="jour">M</li>
                                <li class="jour">J</li>
                                <li class="jour">V</li>
                                <li class="jour jour--checked">S</li>
                                <li class="jour jour--checked">D</li>
                            </ul>
                            <p class="parameter-hour">08:00 H à 13:00 H <span class="parameter-price">80 000 Ar</span> </p>
                        </div>

                        <div class="parametre">
                            <ul>
                                <li class="jour jour--checked">L</li>
                                <li class="jour jour--checked">M</li>
                                <li class="jour jour--checked">M</li>
                                <li class="jour jour--checked">J</li>
                                <li class="jour jour--checked">V</li>
                                <li class="jour">S</li>
                                <li class="jour">D</li>
                            </ul>
                            <p class="parameter-hour">10:00 H à 13:00 H <span class="parameter-price">50 000 Ar</span> </p>
                        </div>
                    </div>
                    <a href="" class="btn btn-warning mt-3">Paramétrer disponibilité et prix</a>
                    <a href="" class="btn btn-warning my-3" data-bs-toggle="modal" data-bs-target="#new-indisponible">Marquer des indisponibilités</a> <br>
                </div>
            </div>
            <div class="terrain col-md-8">
                <h1 class="terrain__nom">Stade de Mahamasina</h1>
                <ul class="list-carac">
                    <li class="carac">Catégorie : <span>Foot à 11</span></li>
                    <li class="carac">Infrastructure : <span>Intérieur</span></li>
                    <li class="carac">Surface : <span>Synthétique</span></li>
                    <li class="carac">Lumière : <span>Eclairé</span></li>
                </ul>
                <h3 class="terrain__desc__titre">DESCRIPTION</h3>
                <p class="terrain__desc__content">
                    Le terrain de Barea de Mahamasina est un stade de football situé à Antananarivo,
                    la capitale de Madagascar. Il est principalement utilisé pour les matches de football,
                    mais il peut également accueillir d'autres événements sportifs et culturels.
                </p>

                <div class="row parametrage mb-4">
                    <div class="col-md-5 my-2">
                        <div class="border p-3">
                            <a href="">
                                <i class="fas fa-cog mx-3"></i>
                                Paraméter les informations
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5 my-2">
                        <div class="border p-3">
                            <a href="">
                                <i class="fas fa-calendar-alt mx-3"></i>
                                Suivie de réservation
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5 my-2">
                        <div class="border p-3">
                            <a href="">
                                <i class="fas fa-credit-card mx-3"></i>
                                Abonnement
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5 my-2">
                        <div class="border p-3">
                            <a href="">
                                <i class="fas fa-chart-line mx-3"></i>
                                Statistique
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5 my-2">
                        <div class="border p-3">
                            <a href="" data-bs-toggle="modal" data-bs-target="#add-remise">
                                <i class="fas fa-donate mx-3"></i>
                                Ajouter une remise
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5 my-2">
                        <div class="border p-3">
                            <a href="" data-bs-toggle="modal" data-bs-target="#list-unavailability">
                                <i class="fas fa-calendar-times mx-3"></i>
                                Indisponibilité
                            </a>
                        </div>
                    </div>
                </div>

                <p class="supprimer__label mt-3 text-danger">
                    Effacer le terrain de l'application : <br>
                    <a class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#suppression"> Supprimer le terrain</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Modal pour valider la suppression d'un terrain -->
    <div class="modal fade" id="suppression" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Suppression d'un terrain</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Voulez vous vraiment supprimé votre terrain ?</p>
                    <div class="choix d-flex">
                        <a href="" class="btn btn-danger px-3 mx-2">OUI</a>
                        <a href="" class="btn btn-info px-3 mx-2">NON</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pour changer les photos du terrain -->
    <form action="" method="" class="updatePhoto">
        <div class="modal fade" id="updatePhoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Changer les photos du terrain</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5">
                                <img id="recentPhoto" src="{{ asset('image/elgeco.jpg') }}" alt="Image à changer">
                            </div>
                            <div class="col-md-7">
                                <label for="file" class="form-label">Choisir l'image pour remplacer l'existant</label>
                                <input type="file" id="file" class="form-control">
                                <p class="error"><i class="fas fa-info-circle mx-2"></i> Afficher l'erreur ici</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal pour afficher les unavailability -->
    <div class="modal fade" id="list-unavailability" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Date indisponible</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group list-unavailability mb-3">
                        <li class="list-group-item"> <span>01/10/23</span> de <span> 10:00 H </span> à <span>14:00 H</span> <a href=""><i class="fas fa-times"></i></a> </li>
                        <li class="list-group-item"> <span>24/06/23</span> de <span> 00:00 H </span> à <span>24:00 H</span> <a href=""><i class="fas fa-times"></i></a> </li>
                        <li class="list-group-item"> <span>25/06/23</span> de <span> 00:00 H </span> à <span>24:00 H</span> <a href=""><i class="fas fa-times"></i></a> </li>
                        <li class="list-group-item"> <span>26/06/23</span> de <span> 00:00 H </span> à <span>24:00 H</span> <a href=""><i class="fas fa-times"></i></a> </li>
                        <li class="list-group-item"> <span>27/06/23</span> de <span> 04:00 H </span> à <span>12:00 H</span> <a href=""><i class="fas fa-times"></i></a> </li>
                    </ul>
                    <a href="" class="link my-4" data-bs-toggle="modal" data-bs-target="#new-indisponible" data-bs-dismiss="modal">Marquer des indisponibilités</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pour afficher les remises -->
    <div class="modal fade" id="list-remise" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Remise</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group list-unavailability mb-3">
                        <li class="list-group-item"> <span>01/10/23</span> à <span> 05/10/23 </span> : <span> 20 %</span> <a href=""><i class="fas fa-times"></i></a> </li>
                        <li class="list-group-item"> <span>10/10/23</span> à <span> 20/10/23 </span> : <span> 10 %</span> <a href=""><i class="fas fa-times"></i></a> </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal pour Insertion indisponibilités à longue durée -->
    <form action="" method="">
        <div class="modal fade" id="long-unavailability" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Marquer une indisponibilité à longue durée</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="unavailability-p">Les indisponibilités doit être établie 2 semaines avant au moins</p>
                        <div class="insertion">
                            <div class="form-group mt-3">
                                <label for="new-date" class="form-label">Date Début</label>
                                <input type="date" class="form-control" id="date-debut">
                            </div>

                            <div class="form-group mt-3">
                                <label for="new-date" class="form-label">Date Fin</label>
                                <input type="date" class="form-control" id="date-fin">
                            </div>
                            <p class="error"><i class="fas fa-info-circle mx-2"></i> Afficher l'erreur ici</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal pour marquer des remises -->
    <form action="" class="form">
        <div class="modal fade" id="add-remise" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajout de remise</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="insertion">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="heure-debut" class="form-label">Date début</label>
                                        <input type="date" class="form-control" id="heure-debut" name="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="heure-fin" class="form-label">Date fin</label>
                                        <input type="date" class="form-control" id="heure-fin" name="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="new-date" class="form-label">Remise</label>
                                <input type="number" class="form-control" id="new-date" placeholder="Remise">
                            </div>
                            <p class="error"><i class="fas fa-info-circle mx-2"></i> Afficher l'erreur ici</p>
                            <div class="my-3">
                                <a href="" class="link my-3" data-bs-toggle="modal" data-bs-target="#list-remise" data-bs-dismiss="modal">Voir listes des remises</a>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal pour ajouter une nouvelle indisponibilité -->
    <form action="" class="form">
        <div class="modal fade" id="new-indisponible" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Marquer une indisponibilité</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="unavailability-p">Les indisponibilités doit être établie 2 semaines avant au moins</p>
                        <div class="insertion">
                            <div class="form-group">
                                <label for="new-date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="new-date">
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="heure-debut" class="form-label">Heure début</label>
                                        <input type="time" class="form-control" id="heure-debut">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="heure-fin" class="form-label">Heure fin</label>
                                        <input type="time" class="form-control" id="heure-fin">
                                    </div>
                                </div>
                            </div>
                            <p class="error"><i class="fas fa-info-circle mx-2"></i> Afficher l'erreur ici</p>
                            <div class="my-3">
                                <a href="" class="link my-3" data-bs-toggle="modal" data-bs-target="#long-unavailability" data-bs-dismiss="modal">Indisponibilités à longue durée</a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script>
        // Fonction pour mettre à jour l'image à modifier
        function updatePhoto(element) {
            var image = element.getElementsByClassName("img")[0];
            var imageContainer = document.getElementById("recentPhoto");
            imageContainer.src = image.src;
        }
    </script>
</body>

</html>