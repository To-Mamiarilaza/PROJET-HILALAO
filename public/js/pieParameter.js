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
