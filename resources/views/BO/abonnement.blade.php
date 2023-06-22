@include('BO/header') 
@include('BO/nav')


<link rel="stylesheet" href="{{ asset('css/BO/asset/category.css') }}">
    <div class="contenu">
      <div id="form">
      <form action="{{ route('abonnement') }}" method="get">
        <h1>Abonnement</h1>
        <div id="sort-selectors">
            <p><label for="categorie">Categorie :</label>
              <select id="categorie" name="categorie">
                <option value="all">Tous les categories</option>
                @foreach($categories as $categorie)
                  <option value="{{ $categorie->category }}">{{ $categorie->category }}</option>
                @endforeach
              </select>
            </p>
    
            <p>
              <label for="mois">Mois :</label>
              <select id="mois"  name="mois">
                  <option value="00">Tous les mois</option>
                  <option value="01">Janvier</option>
                  <option value="02">Fevrier</option>
                  <option value="03">Mars</option>
                  <option value="04">Avril</option>
                  <option value="05">Mai</option>
                  <option value="06">Juin</option>
                  <option value="07">Juillet</option>
                  <option value="08">Aout</option>
                  <option value="09">Septembre</option>
                  <option value="10">Octobre</option>
                  <option value="11">Novembre</option>
                  <option value="12">Decembre</option>
              </select>

              <label for="annee">Annee :</label>
              <select id="annee" name="annee">
                @for($annee = 2023; $annee <= 2033; $annee++)
                  <option value="{{ $annee }}">{{ $annee }}</option>
                @endfor   
              </select>
            </p>

            <p>
              <label for="annee">Etat de payement :</label>
              <select name="etat">
                <option value="paid">Paye</option>
                <option value="unpaid">Non paye</option>
              </select>
            </p>
            
            <input type="submit" value="Valider les filtres" >
          </div>
        </form>
        </div>
        
        <div id = "graphe">
          <canvas id="myChart" width="30"></canvas>
        </div> 
        <div id="table"> 
        <table>
            <thead>
              <tr>
                <th>Nom terrain</th>
                <th>Categorie</th>
                <th>Client</th>
                <th>Prix</th>
                <th>Date debut</th>
                <th>Date fin</th>
                <th>Duree abonnement</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($all as $abonnement)
              <tr>
                <td>{{ $abonnement->name }}</td>
                <td>{{ $abonnement->category }}</td>
                <td>{{ $abonnement->client }}</td>
                <td>{{ $abonnement->price }}</td>
                <td>{{ $abonnement->start_date }}</td>
                <td>{{ $abonnement->end_date }}</td>
                <td>{{ $abonnement->duration }}</td>
              </tr>
              @endforeach

            </tbody>
            </table>
        </div>
        <script>
          var ctx = document.getElementById('myChart').getContext('2d');
          var prix_mois = {!! $donnee !!};
          console.log(prix_mois);
          var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Fev', 'Mars', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'RRIX',
                    data: prix_mois,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>  
    </div>   
</body>
</html>
