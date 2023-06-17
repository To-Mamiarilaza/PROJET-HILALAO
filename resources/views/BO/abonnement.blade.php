@include('BO/header') 
@include('BO/nav')


<link rel="stylesheet" href="{{ asset('css/BO/asset/category.css') }}">
    <div class="contenu">
        <h1>Abonnement</h1>

        <div id="sort-selectors">
            <p><label for="sort-column">Categorie :</label>
              <select id="sort-column">
                  <option value="nom">Nom</option>
                  <option value="age">Âge</option>
                  <option value="profession">Profession</option>
              </select>
            </p>
    
            <p>
              <label for="sort-direction">Mois :</label>
              <select id="sort-direction">
                  <option value="asc">Croissant</option>
                  <option value="desc">Décroissant</option>
              </select>

              <label for="sort-direction">Annee :</label>
              <select id="sort-direction">
                  <option value="asc">Croissant</option>
                  <option value="desc">Décroissant</option>
              </select>
            </p>

            <p>
              <label for="sort-direction">Payé :</label>
              <select id="sort-direction">
                  <option value="asc">Croissant</option>
                  <option value="desc">Décroissant</option>
              </select>

              <label for="sort-direction">Non payé :</label>
              <select id="sort-direction">
                  <option value="asc">Croissant</option>
                  <option value="desc">Décroissant</option>
              </select>
            </p>

            <input type="button" value="Valider les filtres">
        </div>
        
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
</body>
</html>
