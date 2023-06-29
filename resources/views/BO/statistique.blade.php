@include('BO/header') 
@include('BO/nav') 
    
<link rel="stylesheet" href="{{ asset('css/BO/asset/statistique.css') }}">
<link rel="stylesheet" href="{{asset('js/chart.js')}}">
    <script src="{{asset('js/chart.js')}}"></script>
<body>
    
        <section class="content p-4">
            <div class="en-tete mt-2">
                STATISTIQUE
            </div>

            <div class="row partie-number mt-2">
                <div class="col-md-4 p-3">
                    <div class="number-display">
                        <p class="title">Nombre de client</p>
                        <p class="number">{{ $NbClients }}</p>
                    </div>
                </div>
                <div class="col-md-4 p-3">
                    <div class="number-display">
                        <p class="title">Nombre de terrain</p>
                        <p class="number">{{ $NbTerrains }}</p>
                    </div>
                </div>
                <div class="col-md-4 p-3">
                    <div class="number-display">
                        <p class="title">Nombre d'utilisateur</p>
                        <p class="number">{{ $NbUsers }}</p>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-8 p-3">
                    <div class="chart">
                        <h2>Courbe représentative</h2>
                        <div class="filtre">
                            <select onchange="updateSelectedFields()" name="category" id="category" class="form-select form-control form-control-sm" id="category" value="0">
                                <option value="0">Toutes type de category</option>
                                @foreach($allCategories as $category)
                                    <option value="{{ $category->getId_category() }}">{{ $category->getCategory() }}</option>
                                @endforeach
                            </select>
                            <select onchange="updateSelectedFields()" class="form-select" name="mois" id="mois" value="00">
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
                            <select onchange="updateSelectedFields()" class="form-select" name="annee" id="annee" value="2023">
                            @for($annee = 2023; $annee <= 2033; $annee++)
                                <option value="{{ $annee }}">{{ $annee }}</option>
                            @endfor   
                            </select>
                        </div>
                        <canvas id="myChart" width="150" height="50"></canvas>
                        <div id="selectedFields" ></div>
                    </div>
                </div>
                <div class="col-md-4 p-3">
                    <div class="list-client">
                        <h2>Listes des clients</h2>
                        <div class="list-container">
                            @foreach($clients as $client)
                                <a href="{{ route('fieldByClient', ['id_client' => $client->getId_client() ]) }}">
                                    <div class="client mt-2">
                                        <div class="image">
                                            <img src="{{ asset('css/BO/asset/client.png') }}" alt="Image du client">
                                        </div>
                                        <div class="detail-client">
                                            <p class="name">{{ $client->getFirst_name() }}</p>
                                            <p class="terrain">Nombre de terrain : <span class="number">{{ $client->getNombre_terrains()}}</span></p>
                                            
                                        </div>
                                    </div>
                                </a>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>

    <script src="{{ asset('css/BO/asset/bootstrap.bundle.min.js') }}"></script>
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
                                        borderColor: '#FF0C64',
                                        borderWidth: 2.5
                                    },
                                    {
                                        label: 'Utilisateurs',
                                        data: utilisateursData,
                                        borderColor: '#FFA70C',
                                        borderWidth: 2
                                    },
                                    {
                                        label: 'Terrains',
                                        data: terrainsData,
                                        borderColor: '#0CDEFF',
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

</body>

</html>

