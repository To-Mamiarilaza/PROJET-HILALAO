<!-- resources/views/list-field/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/FOU/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FOU/assets/css/list-terrain.css') }} ">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>HILALAO | TERRAIN</title>
</head>
<body>
    <content class="container content">
        <div class="row">
            <div class="col-md-6 field">
                <h1>Réservation de terrain de foot à 7</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
                <hr>
                <nav class="filtre row">
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <a href="" class="filtre__button--activation">Filtres</a>
                        </button>
                    </div>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">Fenêtre modale</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Ceci est le contenu de la fenêtre modale.</p>
                                    <form>
                                    <!-- Votre formulaire ici -->
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    <button type="button" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="" class="filtre__button--type"></a>
                    </div>
                    <div class="col-md-2">

                    </div>
                </nav>
                <hr>
                <!-- Liste des terrains affichés -->
                <div class="field__list">
                    @foreach ($listFields as $listField)
                    <div class="field__box container">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="assets/image/{{ $listField->picture }}" class="field__box--image" alt="" srcset="">
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h3 class="field__box--label-name">{{ $listField->name }}</h3>
                                        <h5>{{ $listField->address }}</h5>
                                        <hr style="width: 80px;">
                                    </div>
                                    <div class="col-md-4">
                                        <a href="/calendar/{{$listField->id_field}}" class=""><button class="field__box--button-dispo">Voir les disponibilités</button></a>
                                        <br>
                                        <br>
                                        <br>
                                        <a href="/info-field/{{$listField->id_field}}" class=""><button class="field__box--button-dispo">information sur le terrain</button></a>
                                    </div>
                                </div>
                                <p class="field__box--description">
                                 {{ $listField->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- END listes des terrains affichés -->

            </div>
            <div class="col-md-6 ">
            </div>
        </div>
    </content>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
