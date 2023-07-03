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
                                <select name="mois" id="" class="form-select">
                                    <option value="">Tous les mois</option>
                                    <option value="1">Janvier</option>
                                    <option value="2">Fevrier</option>
                                    <option value="3">Mars</option>
                                    <option value="4">Avril</option>
                                    <option value="5">Mai</option>
                                    <option value="6">Juin</option>
                                    <option value="7">Juillet</option>
                                    <option value="8">Aout</option>
                                    <option value="9">Septembre</option>
                                    <option value="10">Octobre</option>
                                    <option value="11">Novembre</option>
                                    <option value="12">Decembre</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <select name="annee" id="" class="form-select">
                                    <option value="">Tous les années</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                </select>                            </div>
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
                            <span class="div__ul_li_span div__ul__li__span--argent">{{ number_format(array_sum($prices), 0, ',', ' ') }} Ar</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 border">
                            <span class="div__ul__li__span div__ul__li__span--titre">Nombre de réservation : </span>
                            <span class="div__ul_li_span div__ul__li__span--argent">{{ count($nombreReservation) }}</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 border">
                            <span class="div__ul__li__span div__ul__li__span--titre">Nombre de terrain : </span>
                            <span class="div__ul_li_span div__ul__li__span--argent">{{ count($nombreTerrain) }}</span>
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
    <!-- Script pour le pie en donate -->
    <script>
        var dataProp = [];
        @foreach ($proportion as $p)
            dataProp.push('{{ $p }}');
        @endforeach
        var dataNom = [];
        @foreach ($nomTerrain as $n)
            dataNom.push('{{ $n }}');
        @endforeach
    
        drawPie(dataProp,dataNom);
    
        function drawPie(proportion,nomField) {
            var proportionArray = proportion.map(function(price) {
                return parseInt(price.replace(/ /g, ''));
            });
    
            const labels = nomField;
            const data = {
                labels: labels,
                datasets: [{
                    data: proportionArray,
                    backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0"]
                }]
            };
    
            // Configuration du graphique
            const config = {
                type: "pie",
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            };
    
            // Création du graphique
            const myChart = new Chart(document.getElementById("pie"), config);
        }
    </script>
    

    <!-- Script pour le chart  -->
    <script>
        var dataPrices = [];
        @foreach ($prices as $p)
            dataPrices.push('{{ $p }}');
        @endforeach
    
        // Appel de la fonction drawChart en passant les données nécessaires
        drawChart(dataPrices);

        function drawChart(price) {
            var pricesArray = price.map(function(price) {
                return parseInt(price.replace(/ /g, ''));
            });
            // Chart pour le courbe de variation
            // Données de variation de salaire
            const labels = ["Jan", "Fév", "Mar", "Avr", "Mai", "Jun", "jul", "Aou", "sept", "oct", "nov", "dec"];
            // const dataset1 = {
            //     label: "Nombre de réservation",
            //     data: [40, 20, 35, 23, 50, 63],
            //     backgroundColor: "rgba(54, 162, 235, 0.5)",
            //     borderColor: "rgba(54, 162, 235, 1)",
            //     borderWidth: 1
            // };
            const dataset2 = {
                label: "Montant obtenue",
                data: pricesArray,
                backgroundColor: "rgba(255, 99, 132, 0.5)",
                borderColor: "rgba(255, 99, 132, 1)",
                borderWidth: 1
            };

            // Configuration du graphique
            const config = {
                type: "line",
                data: {
                    labels: labels,
                    datasets: [dataset2]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: "Réservations et montant obtenues"
                            }
                        }
                    }
                }
            };
            // Création du graphique
            const myChart = new Chart(document.getElementById("myChart"), config);
        }
    </script>
</body>

</html>