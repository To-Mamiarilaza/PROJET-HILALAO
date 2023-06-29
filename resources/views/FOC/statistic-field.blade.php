<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FOC/statfield.css') }}">
    <title>Statistique du terrain</title>
</head>

<body>
    @include('FOC/header')
    <div class="container">
        <h1 class="reservation-title my-4">Statistiques de réservations du terrain</h1>
        <div class="row">
            <div class="col-md-5">
                <div class="stat-number">
                    <ul>
                        <li>Nombre de réservations : <span class="important">28</span></li>
                        <li>Montant d'argent reçue : <span class="important">1 820 000 Ar</span></li>
                    </ul>
                </div>
                <form action="" class="form mt-3">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <select name="" id="" class="form-select">
                                <option value="">Tous les mois</option>
                                <option value="">Janvier</option>
                                <option value="">Février</option>
                                <option value="">Mars</option>
                                <option value="">Avril</option>
                                <option value="">Mai</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select name="" id="" class="form-select">
                                <option value="">Tous les années</option>
                                <option value="">2023</option>
                                <option value="">2022</option>
                                <option value="">2021</option>
                                <option value="">2020</option>
                                <option value="">2019</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-info px-4">Valider</button>
                        </div>
                    </div>
                </form>
                <div class="p-3 border chart-container mt-5">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
    
            <div class="col-md-7 historique">
                <h5>Historique de réservations</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Utilisateur</th>
                            <th>Date</th>
                            <th>Durée</th>
                            <th>Montant</th>
                            <th>Etat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="user">To Mamiarilaza</td>
                            <td>10/02/23</td>
                            <td>10:00 H <span class="espacement mx-3"> à </span> 12:00 H</td>
                            <td class="montant">120 000 Ar</td>
                            <td class="retard">Retard</td>
                        </tr>
                        <tr>
                            <td class="user">Avaha Mino</td>
                            <td>11/02/23</td>
                            <td>07:00 H <span class="espacement mx-3"> à </span> 08:00 H</td>
                            <td class="montant">65 000 Ar</td>
                            <td class="normal">Normal</td>
                        </tr>
                        <tr>
                            <td class="user">Ben</td>
                            <td>10/02/23</td>
                            <td>10:00 H <span class="espacement mx-3"> à </span> 12:00 H</td>
                            <td class="montant">120 000 Ar</td>
                            <td class="retard">Retard</td>
                        </tr>
                        <tr>
                            <td class="user">Tiavina Malalaniaina</td>
                            <td>11/02/23</td>
                            <td>07:00 H <span class="espacement mx-3"> à </span> 08:00 H</td>
                            <td class="montant">65 000 Ar</td>
                            <td class="normal">Normal</td>
                        </tr>
                        <tr>
                            <td class="user">Ben</td>
                            <td>10/02/23</td>
                            <td>10:00 H <span class="espacement mx-3"> à </span> 12:00 H</td>
                            <td class="montant">120 000 Ar</td>
                            <td class="retard">Retard</td>
                        </tr>
                        <tr>
                            <td class="user">Tiavina Malalaniaina</td>
                            <td>11/02/23</td>
                            <td>07:00 H <span class="espacement mx-3"> à </span> 08:00 H</td>
                            <td class="montant">65 000 Ar</td>
                            <td class="normal">Normal</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="{{ asset('chartJS/chart.js') }}"></script>
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