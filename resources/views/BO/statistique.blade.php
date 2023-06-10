@include('BO/header') 
@include('BO/nav')

<link rel="stylesheet" href="{{asset('js/chart.js')}}">
    <script src="{{asset('js/chart.js')}}"></script>

<div class="contenu">

    <h1>Statistique</h1>
    <form action="/filtrer" method="GET">
        <div class="form-group">
            <label for="categorie">Catégorie :</label>
            <select onchange="updateSelectedFields()" class="form-control form-control-sm" name="category" id="category" value="Toutes les categories">
                @foreach($allCategories as $category)
                    <option value="{{ $category->id_category }}">{{ $category->category }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="mois">Mois :</label>
            <select onchange="updateSelectedFields()" class="form-control form-control-sm" name="mois" id="mois" value="00">
                <option value="00">tout les mois</option>
                <option value="01">Janvier</option>
                <option value="02">Février</option>
                <option value="03">Mars</option>
                <option value="04">Avril</option>
                <option value="05">Mai</option>
                <option value="06">Juin</option>
                <option value="07">Juillet</option>
                <option value="08">Aout</option>
                <option value="09">Septembre</option>
                <option value="10">Octobre</option>
                <option value="11">Novembre</option>
                <option value="12">Décembre</option>
            </select>
        </div>
        <div class="form-group">
            <label for="annee">Année :</label>
            <select onchange="updateSelectedFields()" class="form-control form-control-sm" name="annee" id="annee" value="2023">
                @for($annee = 2020; $annee < 2030; $annee++)
                    <option value="{{ $annee }}">{{ $annee }}</option>
                @endfor   
            </select>
        </div>
    </form>
    <div id="Statistique">
        <div class="par">
            <h3> <a href="#"> Clients </a> </h3>
        </div>
        <div class="par">
            <h3> <a href="#"> Utilisateurs </a> </h3>
        </div>
        <div class="par">
            <h3> <a href="#"> Terrains </a> </h3>
        </div>
    </div>
    <div id="selectedFields">  </div>
    <canvas id="myChart" width="150" height="50"></canvas>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart;

    function updateSelectedFields() {
        var selectElementAnnee = document.getElementById("annee");
        var selectedValueAnnee = selectElementAnnee.value;
        var selectElementMois = document.getElementById("mois");
        var selectedValueMois = selectElementMois.value;
        var selectElementCategory = document.getElementById("category");
        var selectedValueCategory = selectElementCategory.value;
        var selectedFieldsElement = document.getElementById("selectedFields");
        
        selectedFieldsElement.innerHTML = "";
        // Ajouter le champ sélectionné
        if (selectedValueCategory) {
            var selectedField = document.createElement("p");
            selectedField.textContent = "Graphique de la catégorie: " + selectedValueCategory + " Mois: " + selectedValueMois + " Année: " + selectedValueAnnee;
            selectedFieldsElement.appendChild(selectedField);
        }
        
        // Mettre à jour le graphique
        updateChart(selectedValueCategory, selectedValueMois, selectedValueAnnee);
    }

    function updateChart(category, mois, annee) {
        if (myChart) {
            myChart.destroy(); // Supprimer l'instance du graphique précédent
        }

        var labels = getLabels(mois);
        var clientsData = getClientsData(category, mois, annee);
        var utilisateursData = getUtilisateursData(category, mois, annee);
        var terrainsData = getTerrainsData(category, mois, annee);
        
        myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Clients',
                        data: clientsData,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Utilisateurs',
                        data: utilisateursData,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Terrains',
                        data: terrainsData,
                        borderColor: 'green',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    function getLabels(mois) {
        var defaultLabels = [1, 3, 5, 7, 9, 11, 13, 15, 17, 19, 21, 23, 25, 27, 29, 31];
        
        if (mois === '00') {
            // Retourner des labels personnalisés pour le mois sélectionné
            return ['Jan', 'Fev', 'Mars','Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        } else {
            // Utiliser les labels par défaut
            return defaultLabels;
        }
    }

    function getClientsData(category, mois, annee) {
        return new Promise(function(resolve, reject) {
            $.ajax({
                url: "/clients",
                method: "GET",
                data: {
                    category: category,
                    mois: mois,
                    annee: annee
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    print(data);
                    resolve(data); // Résoudre la promesse avec les nouvelles données
                },
                error: function(xhr, status, error) {
                    reject(error); // Rejeter la promesse en cas d'erreur
                }
            });
        });
    }


    function getUtilisateursData(category, mois, annee) {
        // Obtenir les données des utilisateurs en fonction des sélections
        // Retourner les données appropriées sous forme de tableau
        // Remplacez cette partie avec votre logique de récupération des données des utilisateurs
        return [5, 2, 8, 4, 9, 11, 6, 3, 7];
    }

    function getTerrainsData(category, mois, annee) {
        // Obtenir les données des terrains en fonction des sélections
        // Retourner les données appropriées sous forme de tableau
        // Remplacez cette partie avec votre logique de récupération des données des terrains
        return [2, 7, 9, 12, 5, 1, 7, 13, 7];
    }

    $(document).ready(function() {
  // Événement de changement de la sélection de catégorie
  $("#category").change(function() {
    var selectedCategory = $(this).val();
    var selectedMonth = $("#mois").val();
    var selectedYear = $("#annee").val();

    getClientsData(selectedCategory, selectedMonth, selectedYear)
      .then(function(data) {
        // Mettez à jour les données du graphique avec les nouvelles données
        updateChartData(data);
      })
      .catch(function(error) {
        // Gestion des erreurs
        console.error(error);
      });
  });

  // Événement de changement de la sélection de mois
  $("#mois").change(function() {
    var selectedCategory = $("#category").val();
    var selectedMonth = $(this).val();
    var selectedYear = $("#annee").val();

    getClientsData(selectedCategory, selectedMonth, selectedYear)
      .then(function(data) {
        // Mettez à jour les données du graphique avec les nouvelles données
        updateChartData(data);
      })
      .catch(function(error) {
        // Gestion des erreurs
        console.error(error);
      });
  });

  // Événement de changement de la sélection d'année
  $("#annee").change(function() {
    var selectedCategory = $("#category").val();
    var selectedMonth = $("#mois").val();
    var selectedYear = $(this).val();

    getClientsData(selectedCategory, selectedMonth, selectedYear)
      .then(function(data) {
        // Mettez à jour les données du graphique avec les nouvelles données
        updateChartData(data);
      })
      .catch(function(error) {
        // Gestion des erreurs
        console.error(error);
      });
  });
});

</script>

<div id="graphe">

</div>
</body>
</html>
