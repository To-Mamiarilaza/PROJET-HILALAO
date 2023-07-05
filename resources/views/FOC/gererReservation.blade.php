<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/FOC/board.css') }}">
        <title> Gerer les reservations </title>
    </head>
    <body>
        @include('FOC/header');
        <div class="container mt-3">
            <div class="div">
                <h1 class="div__h1"> Gerer les reservations </h1>
                <form class="form div__form" action="/updateReservation" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <select name="etatReservation" id="" class="form-select">
                                <option value="1"> Valider </option>
                                <option value="2"> En retard </option>
                                <option value="3"> Annuler </option>
                            </select>
                        </div>
                        <input type="hidden" name="idReservation" value="{{ $idReservation }}">
                        <div class="col-md-2">
                            <input type="submit" value="Valider" class="btn btn-warning">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>