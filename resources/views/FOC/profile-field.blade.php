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
    @include('FOC/headerNotification')

    <div class="container mt-4">
        <div class="row gx-5">
            <div class="col-md-4">
                <div class="principale">
                    <a href="" data-bs-toggle="modal" data-bs-target="#updatePhoto" data-photo="{{ $profilePicture->getIdPicture() }}" onclick="updatePhoto(this)">
                        <img class="principale__img img" src="{{ asset('image/pictureField/'.$profilePicture->getPicture()) }}" alt="Image du terrain principale">
                    </a>
                </div>
                <div class="second-list mt-3">
                    <div class="row">
                        @foreach ($secondPictures as $secondPicture)
                        <div class="col-md-4 second">
                            <a href="" data-bs-toggle="modal" data-bs-target="#updatePhoto" data-photo="{{ $secondPicture->getIdPicture() }}" onclick="updatePhoto(this)">
                                <img class="second-list__second__img img" src="{{ asset('image/pictureField/'.$secondPicture->getPicture()) }}" alt="">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="hidden-form" id="hidden-form">
                    <div class="group-input">
                        <input class="jour" type="number" value="1">
                        <input class="star-time" type="time" value="05:00">
                        <input class="end-time" type="time" value="18:00">
                        <input class="price" type="number" value="50000">
                    </div>
                    <div class="group-input">
                        <input class="jour" type="number" value="2">
                        <input class="star-time" type="time" value="05:00">
                        <input class="end-time" type="time" value="18:00">
                        <input class="price" type="number" value="50000">
                    </div>
                    <div class="group-input">
                        <input class="jour" type="number" value="3">
                        <input class="star-time" type="time" value="05:00">
                        <input class="end-time" type="time" value="18:00">
                        <input class="price" type="number" value="50000">
                    </div>
                    <div class="group-input">
                        <input class="jour" type="number" value="4">
                        <input class="star-time" type="time" value="05:00">
                        <input class="end-time" type="time" value="18:00">
                        <input class="price" type="number" value="50000">
                    </div>
                    <div class="group-input">
                        <input class="jour" type="number" value="5">
                        <input class="star-time" type="time" value="05:00">
                        <input class="end-time" type="time" value="18:00">
                        <input class="price" type="number" value="50000">
                    </div>
                    <div class="group-input">
                        <input class="jour" type="number" value="6">
                        <input class="star-time" type="time" value="05:00">
                        <input class="end-time" type="time" value="21:00">
                        <input class="price" type="number" value="65000">
                    </div>
                    <div class="group-input">
                        <input class="jour" type="number" value="7">
                        <input class="star-time" type="time" value="05:00">
                        <input class="end-time" type="time" value="21:00">
                        <input class="price" type="number" value="65000">
                    </div>
                </div>

                <div class="dispo">
                    <h3 class="dispo__titre mt-3"> DISPONIBILITE ET PRIX</h3>
                    <p class="dispo_text">Liste de vos paramètrage du terrains. Les disponibilités et prix sont affichée dessus : </p>
                    
                    <div class="list-parametre listes-parametres tarif-detail" id="listes-parametres">

                    </div>
                    <a href="{{ route('loadPageDispoAndPriceGet') }}" class="btn btn-warning mt-3">Paramétrer disponibilité et prix</a>
                    <a href="" class="btn btn-warning my-3" data-bs-toggle="modal" data-bs-target="#new-indisponible">Marquer des indisponibilités</a> <br>
                </div>
            </div>
            <div class="terrain col-md-8">
                <h1 class="terrain__nom">{{ $field->getName() }}</h1>
                <ul class="list-carac">
                    <li class="carac">Catégorie : <span>{{ $field->getCategory()->getCategory() }}</span></li>
                    <li class="carac">Infrastructure : <span>{{ $field->getInfrastructure()->getInfrastructure() }}</span></li>
                    <li class="carac">Surface : <span>{{ $field->getFieldType()->getFieldType() }}</span></li>
                    <li class="carac">Lumière : <span>{{ $field->getLight()->getLight() }}</span></li>
                </ul>
                <h3 class="terrain__desc__titre">DESCRIPTION</h3>
                <p class="terrain__desc__content">{{ $field->getDescription() }}</p>

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
                            <a href ="{{ route('selectReservation') }}">
                                <i class="fas fa-calendar-alt mx-3"></i>
                                Suivie de réservation
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5 my-2">
                        <div class="border p-3">
                            <a href="{{ route('subscriptionPage') }}">
                                <i class="fas fa-credit-card mx-3"></i>
                                Abonnement
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5 my-2">
                        <div class="border p-3">
                            <a href="/filtre">
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
                        <a href="{{ route('deleteField') }}" class="btn btn-danger px-3 mx-2">OUI</a>
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
    <form enctype="multipart/form-data" id="updatePhotoForm" action="{{ route('editImageProfile') }}" method="POST" class="updatePhoto">
        @csrf
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
                                <input type="file" id="file" class="form-control" name="image">

                                <input type="hidden" name="idImage"/>
                                @isset($error)
                                <p class="error"> <i class="fas fa-info-circle mx-3"></i>{{ $error }}</p>
                                @endisset

                                <input type="hidden" name="idImage" />
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Valider</button>
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
                        @foreach ($indispo as $item)
                        <li class="list-group-item"> <span>{{ $item->getUnavailabilityDate() }}</span> de <span>{{ $item->getStartTime() }} H </span> à <span>{{ $item->getEndTime() }} H</span> <a href="/deleteIndispo?idIndispo={{ $item->getIdUnavailability() }}"><i class="fas fa-times"></i></a> </li>
                        @endforeach
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
                        @foreach ($discount as $item)
                        <li class="list-group-item"> <span>{{ $item->getStart() }}</span> à <span>{{ $item->getEnd() }}</span> : <span>{{ $item->getDiscount() }} %</span> <a href="/deleteDiscount?idDiscount={{ $item->getIdDiscount() }}"><i class="fas fa-times"></i></a> </li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal pour Insertion indisponibilités à longue durée -->
    <form action="{{ route('insertIndispo') }}" method="POST">
        @csrf
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
                                <input type="date" class="form-control" id="date-debut" name="date-debut">
                            </div>

                            <div class="form-group mt-3">
                                <label for="new-date" class="form-label">Date Fin</label>
                                <input type="date" class="form-control" id="date-fin" name="date-fin">
                            </div>
                            @isset($error)
                                <p class="error"> <i class="fas fa-info-circle mx-3"></i>{{ $error }}</p>
                            @endisset
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
    <form action="{{ route('addRemise') }}" class="form" method="POST">
        @csrf
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
                                        <input type="date" class="form-control" id="heure-debut" name="date-debut">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="heure-fin" class="form-label">Date fin</label>
                                        <input type="date" class="form-control" id="heure-fin" name="date-fin">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="new-date" class="form-label">Remise</label>
                                <input type="number" class="form-control" id="new-date" placeholder="Remise" name="remise">
                            </div>
                            @isset($error)
                                <p class="error"> <i class="fas fa-info-circle mx-3"></i>{{ $error }}</p>
                            @endisset
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
    <form action="{{ route('insertIndispo') }}" class="form" method="POST">
        @csrf
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
                                <input type="date" class="form-control" id="new-date" name="date-debut">
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="heure-debut" class="form-label">Heure début</label>
                                        <input type="time" class="form-control" id="heure-debut" name="heure-debut">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="heure-fin" class="form-label">Heure fin</label>
                                        <input type="time" class="form-control" id="heure-fin" name="heure-fin">
                                    </div>
                                </div>
                            </div>
                            @isset($error)
                                <p class="error"> <i class="fas fa-info-circle mx-3"></i>{{ $error }}</p>
                            @endisset
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
    <script src="{{ asset('js/FOC/disponibility2.js') }}"></script>
    <script>
        // Fonction pour mettre à jour l'image à modifier
        function updatePhoto(element) {
            var image = element.getElementsByClassName("img")[0];
            var imageContainer = document.getElementById("recentPhoto");
            imageContainer.src = image.src;


            //Recuperer la valeur de data-photo depuis le lien du photo
            var idImage = element.getAttribute('data-photo');
            console.log(idImage);
            //Recuperer le formulaire cible
            var form = document.getElementById('updatePhotoForm');
            //Recuperer la valeur de l'input correspondant au name
            var inputField = form.querySelector('input[name="idImage"]');

            // Mettre à jour la valeur de l'input avec la photo
            inputField.value = idImage;

        }
    </script>
</body>

</html>