<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FOC/board.css') }}">
    <title>Tableau de bord</title>
</head>

<body>
    @include('FOC/header');

    <div class="container mt-3">
        <div class="div">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="div__h1">Tableau de bord</h1>
                    <form class="form div__form" action="">
                        <p class="div__form__p">Choix du mois</p>
                        <div class="row">
                            <div class="col-md-5">
                                <input type="number" value="1" min="1" max="12" name="mois" class="form-control" placeholder="Mois">
                            </div>
                            <div class="col-md-5">
                                <input type="number" value="2023" min="2020" max="2030" name="mois" class="form-control" placeholder="Année">
                            </div>
                            <div class="col-md-2">
                                <input type="submit" value="Valider" class="btn btn-warning">
                            </div>
                        </div>
                        <a href="" class="btn btn-warning mt-3">Statistique globale</a>
                    </form>
                </div>

                <div class="row gx-4 mt-3">
                    <div class="col-md-4">
                        <div class="p-3 border">
                            <span class="div__ul__li__span div__ul__li__span--titre">Total d'argent reçu : </span>
                            <span class="div__ul_li_span div__ul__li__span--argent">11 800 000 Ar</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 border">
                            <span class="div__ul__li__span div__ul__li__span--titre">Nombre de réservation : </span>
                            <span class="div__ul_li_span div__ul__li__span--argent">37</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 border">
                            <span class="div__ul__li__span div__ul__li__span--titre">Nombre de terrain : </span>
                            <span class="div__ul_li_span div__ul__li__span--argent">4</span>
                        </div>
                    </div>
                </div>

                <div class="row gx-5 mt-5">
                    <div class="col-md-6">
                        <div class="p-3 border chart-container">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 border chart-container">
                            <canvas id="pie"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('chartJS/chart.js') }}"></script>
    <script src="{{ asset('js/chartParameter.js') }}"></script>
    <script src="{{ asset('js/pieParameter.js') }}"></script>
</body>

</html>