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
                        text: "Salaire (en euros)"
                    }
                }
            }
        }
    };
    // Création du graphique
    const myChart = new Chart(document.getElementById("myChart"), config);
}
