@include('BO/header') 
@include('BO/nav')
    
<link rel="stylesheet" href="{{ asset('css/BO/asset/statistique.css') }}">
<link rel="stylesheet" href="{{asset('js/chart.js')}}">
    <script src="{{asset('js/chart.js')}}"></script>

<div class="contenu">
    
    <h1>Statistique</h1>
    <form action="/filtrer" method="GET">
        <div class="form-group">
            <label for="categorie">Catégorie :</label>
            <select onchange="updateSelectedFields()" class="form-control form-control-sm" name="category" id="category" value="0">
                <option value="0">Toutes type de category</option>
                @foreach($allCategories as $category)
                    <option value="{{ $category->id_category }}">{{ $category->category }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="mois">Mois :</label>
            <select onchange="updateSelectedFields()" class="form-control form-control-sm" name="mois" id="mois" value="00">
                <option value="00">Tout les mois</option>
                <option value="00">Toutes les mois</option>
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
                @for($annee = 2023; $annee <= 2033; $annee++)
                    <option value="{{ $annee }}">{{ $annee }}</option>
                @endfor   
            </select>
        </div>
    </form>
    <div id="Statistique">
        <div id="Nombreclient" class="par">
        <h3> {{ $NbClients }} Clients  </h3>
        </div>
        <div id="Nombreutilisateur" class="par">
            <h3> {{ $NbUsers }} Utilisateurs </h3>
        </div>
        <div id="Nombreterrain" class="par">
            <h3> {{ $NbTerrains }} Terrains  </h3>
        </div>
    </div>
    <div id="selectedFields">  </div>
    <canvas id="myChart" width="150" height="50"></canvas>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var clientsData;
    var usersData ;
    var terrainsData ;
    // Appel initial de la fonction pour afficher les courbes par défaut
    updateChart('0', '00', '2023');

    // Utilisez les variables clientsData, usersData et terrainsData dans votre script
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: getLabels('00'),
            datasets: [
                {
                    label: 'Clients',
                    data: clientsData,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Utilisateurs',
                    data: usersData,
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
            if(selectedValueMois === "00" ){
                selectedField.textContent = "Graphique de la catégorie: " + selectedValueCategory + " tout les mois  de l'Année: " + selectedValueAnnee;
            }
            selectedField.textContent = "Graphique de la catégorie: " + selectedValueCategory + " Mois: " + selectedValueMois + "/ Année: " + selectedValueAnnee;
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

        getUtilisateursData(category, mois, annee)
            .then(function(dataU) {
                getClientsData(category, mois, annee)
                    .then(function(dataC) {
                        getTerrainsData(category, mois, annee)
                            .then(function(dataT) {
                        clientsData = dataC;
                        utilisateursData = dataU;
                        terrainsData = dataT;
                        console.log(terrainsData);

                        myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [
                                    {
                                        label: 'Clients',
                                        data: clientsData,
                                        borderColor: 'blue',
                                        borderWidth: 2.5
                                    },
                                    {
                                        label: 'Utilisateurs',
                                        data: utilisateursData,
                                        borderColor: 'red',
                                        borderWidth: 2
                                    },
                                    {
                                        label: 'Terrains',
                                        data: terrainsData,
                                        borderColor: 'green',
                                        borderWidth: 1.5,
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
                    });
                });
            })
            .catch(function(error) {
                console.error(error);
            });
            getNombreclient(utilisateursData);
    }

    function getLabels(mois) {
        var defaultLabels = [1,2, 3,4, 5,6, 7,8, 9,10, 11,12, 13,14, 15,16, 17,18, 19,20, 21,22, 23,24, 25,26, 27,28 ,29,30, 31];

        if (mois === '00') {
            // Retourner des labels personnalisés pour le mois sélectionné
            return ['Jan', 'Fev', 'Mars', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        } else {
            // Utiliser les labels par défaut
            return defaultLabels;
        }
    }

    function getUtilisateursData(category, mois, annee) {
        return new Promise(function(resolve, reject) {
            $.ajax({
                url: "/users?annee="+annee+"&mois="+mois+"&category="+category, // URL de votre endpoint pour récupérer les données des clients
                method: "GET",
                success: function(response) {
                    clientsData = response;
                    resolve(response);
                },
                error: function(xhr, status, error) {
                    reject(error); // Rejeter la promesse en cas d'erreur
                }
            });
        });
    }

    function getClientsData(category, mois, annee) {
        return new Promise(function(resolve, reject) {
            $.ajax({
                url: "/clients?annee="+annee+"&mois="+mois+"&category="+category, // URL de votre endpoint pour récupérer les données des clients
                method: "GET",
                success: function(response) {
                    clientsData = response;
                    resolve(response);
                },
                error: function(xhr, status, error) {
                    reject(error); // Rejeter la promesse en cas d'erreur
                }
            });
        });
    }

    function getTerrainsData(category, mois, annee) {
        return new Promise(function(resolve, reject) {
            $.ajax({
                url: "/terrains?annee="+annee+"&mois="+mois+"&category="+category, // URL de votre endpoint pour récupérer les données des clients
                method: "GET",
                success: function(response) {
                    clientsData = response;
                    resolve(response);
                },
                error: function(xhr, status, error) {
                    reject(error); // Rejeter la promesse en cas d'erreur
                }
            });
        });
    }
</script>
</div>
</body>
</html>
