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
                        <li>Nombre de réservations : <span class="important">{{ count($historiques) }}</span></li>
                        <li>Montant d'argent reçue : <span class="important">{{ number_format(array_sum($prices)*1000, 0, ',', ' ') }}Ar</span></li>
                    </ul>
                </div>
                <form action="{{ route('filtre') }}" class="form mt-3" method="GET">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
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
                        <div class="col-md-4">
                            <select name="annee" id="" class="form-select">
                                <option value="">Tous les années</option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
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
            
            @if(isset($historiques) && count($historiques) > 0)
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
                        @foreach ($historiques as $histoReservation)
                            <tr>
                                <td class="user">{{ $histoReservation->getFirstName() }} {{ $histoReservation->getLastName() }}</td>
                                <td> {{ $histoReservation->getReservationDate() }} </td>
                                <td>{{ $histoReservation->getStart() }} H <span class="espacement mx-3"> à </span> {{ $histoReservation->getEnd() }} H</td>
                                <td class="montant"> {{ $histoReservation->getPrice() }} Ar</td>
                                <td class="{{ $histoReservation->getEtatLettre() }}"> {{ $histoReservation->getEtatLettre() }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        
            {{-- @if(count($historiques) < 0)
                    <h5> Vous n'avez aucun reservations </h5>
            @endisset --}}
        </div>
    </div>

    <script src="{{ asset('chartJS/chart.js') }}"></script>
    <script>
        var dataPrices = [];
        @foreach ($prices as $p)
            dataPrices.push('{{ $p }}');
        @endforeach
    
        // Appel de la fonction drawChart en passant les données nécessaires
        drawChart(dataPrices);
    
        function drawChart(dataPrices) {
            // Convertir les prix en tableau de nombres
            var pricesArray = dataPrices.map(function(price) {
                return parseInt(price.replace(/ /g, ''));
            });
    
            // Labels pour les mois
            const labels = ["Jan", "Fév", "Mar", "Avr", "Mai", "Jun", "jul", "aout", "sept", "oct", "nov", "dec"];
    
            // Dataset pour le nombre de réservations
            const dataset1 = {
                label: "Nombre de réservation",
                data: pricesArray,
                backgroundColor: "rgba(54, 162, 235, 0.5)",
                borderColor: "rgba(54, 162, 235, 1)",
                borderWidth: 1
            };
    
            // Configuration du graphique
            const config = {
                type: "line",
                data: {
                    labels: labels,
                    datasets: [dataset1]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: "Montant obtenus"
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