@include('BO/header') 
@include('BO/nav')


<link rel="stylesheet" href="{{ asset('css/BO/asset/category.css') }}">
    <div class="contenu">
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
