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
    <!-- Script pour le pie en donate -->
    <script>
        drawPie();

        function drawPie() {
            const labels = ["Terrain A", "Terrain B", "Terrain C", "Terrain D"];
            const data = {
                labels: labels,
                datasets: [{
                    data: [25, 35, 20, 20], // Valeurs représentant la proportion en pourcentage
                    backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0"] // Couleurs des secteurs
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
        drawChart();

        function drawChart() {
            // Chart pour le courbe de variation
            // Données de variation de salaire
            const labels = ["Jan", "Fév", "Mar", "Avr", "Mai", "Jun"];
            const dataset1 = {
                label: "Nombre de réservation",
                data: [40, 20, 35, 23, 50, 63],
                backgroundColor: "rgba(54, 162, 235, 0.5)",
                borderColor: "rgba(54, 162, 235, 1)",
                borderWidth: 1
            };
            const dataset2 = {
                label: "Montant obtenue",
                data: [1800, 2100, 2300, 2200, 2400, 2600],
                backgroundColor: "rgba(255, 99, 132, 0.5)",
                borderColor: "rgba(255, 99, 132, 1)",
                borderWidth: 1
            };

            // Configuration du graphique
            const config = {
                type: "line",
                data: {
                    labels: labels,
                    datasets: [dataset1, dataset2]
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