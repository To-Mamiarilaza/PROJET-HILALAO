<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FOC/disponibility.css') }}">
    <title>Disponibilité et prix</title>
</head>

<body>
    <form action="" class="hidden-form" id="hidden-form">
        <div class="group-input">
            <input class="jour" type="number" value="1" name="jour[]">
            <input class="star-time" type="time" value="07:00" name="star-time[]">
            <input class="end-time" type="time" value="18:00" name="end-time[]">
            <input class="price" type="number" value="50000" name="price[]">
        </div>
        <div class="group-input">
            <input class="jour" type="number" value="2" name="jour[]">
            <input class="star-time" type="time" value="07:00" name="star-time[]">
            <input class="end-time" type="time" value="18:00" name="end-time[]">
            <input class="price" type="number" value="50000" name="price[]">
        </div>
        <div class="group-input">
            <input class="jour" type="number" value="3" name="jour[]">
            <input class="star-time" type="time" value="07:00" name="star-time[]">
            <input class="end-time" type="time" value="18:00" name="end-time[]">
            <input class="price" type="number" value="50000" name="price[]">
        </div>
        <div class="group-input">
            <input class="jour" type="number" value="4" name="jour[]">
            <input class="star-time" type="time" value="07:00" name="star-time[]">
            <input class="end-time" type="time" value="18:00" name="end-time[]">
            <input class="price" type="number" value="50000" name="price[]">
        </div>
        <div class="group-input">
            <input class="jour" type="number" value="5" name="jour[]">
            <input class="star-time" type="time" value="07:00" name="star-time[]">
            <input class="end-time" type="time" value="18:00" name="end-time[]">
            <input class="price" type="number" value="50000" name="price[]">
        </div>
        <div class="group-input">
            <input class="jour" type="number" value="6" name="jour[]">
            <input class="star-time" type="time" value="07:00" name="star-time[]">
            <input class="end-time" type="time" value="21:00" name="end-time[]">
            <input class="price" type="number" value="65000" name="price[]">
        </div>
        <div class="group-input">
            <input class="jour" type="number" value="7" name="jour[]">
            <input class="star-time" type="time" value="07:00" name="star-time[]">
            <input class="end-time" type="time" value="21:00" name="end-time[]">
            <input class="price" type="number" value="65000" name="price[]">
        </div>
    </form>

    @include('FOC/header')
    <div class="container mt-4">
        <h1 class="dispo-titre">Disponibilité et prix</h1>
        <p class="dispo-p">Listes des paramètres grouper par heure début et fin par jour</p>
        <div class="listes-parametres mb-2" id="listes-parametres">

        </div>
        <div class="parameter-insert mt-5" id="parameter-insert">
            <p class="parameter-title">Choisir les jours concernées</p>
            <div class="row">
                <div class="col-md-4">
                    <ul>
                        <li class="jour jour--checked" onclick="changeState(this)">L</li>
                        <li class="jour jour--checked" onclick="changeState(this)">M</li>
                        <li class="jour" onclick="changeState(this)">M</li>
                        <li class="jour" onclick="changeState(this)">J</li>
                        <li class="jour" onclick="changeState(this)">V</li>
                        <li class="jour" onclick="changeState(this)">S</li>
                        <li class="jour" onclick="changeState(this)">D</li>
                    </ul>
                </div>
            </div>
            <div class="row form formulaire">
                <div class="input-group mt-2">
                    <input type="number" placeholder="Prix" class="form-control prix" value="20000">
                </div>
                <div class="row mt-2">
                    <div class="col-md-5">
                        <label for="start" class="form-label">Heure début</label>
                        <input type="time" placeholder="Heure début" class="form-control start" value="05:00">
                    </div>
                    <div class="col-md-5">
                        <label for="end" class="form-label">Heure Fin</label>
                        <input type="time" placeholder="Heure Fin" class="form-control end" value="07:00">
                    </div>
                </div>
                <button class="btn btn-info ajout-button mt-4" onclick="addNewParameter()"> <i class="fas fa-plus"></i> Ajouter paramètre </button>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/disponibility.js') }}"></script>
</body>

</html>