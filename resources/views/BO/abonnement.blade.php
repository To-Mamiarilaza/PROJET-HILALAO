@include('BO/header') 
@include('BO/nav')

    <div class="contenu">
        <h1>Bienvenue dans la page abonnement</h1>

        <div id="sort-selectors">
            <label for="sort-column">Trier par colonne :</label>
            <select id="sort-column">
                <option value="nom">Nom</option>
                <option value="age">Âge</option>
                <option value="profession">Profession</option>
            </select>
    
            <label for="sort-direction">Direction de tri :</label>
            <select id="sort-direction">
                <option value="asc">Croissant</option>
                <option value="desc">Décroissant</option>
            </select>
        </div>
        
        <table>
            <thead>
              <tr>
                <th>Nom</th>
                <th>Âge</th>
                <th>Profession</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>John Doe</td>
                <td>30</td>
                <td>Ingénieur</td>
              </tr>
              <tr>
                <td>Jane Smith</td>
                <td>35</td>
                <td>Avocate</td>
              </tr>
              <tr>
                <td>Mark Johnson</td>
                <td>28</td>
                <td>Designer</td>
              </tr>
            </tbody>
          </table>
          
    </div>   
</body>
</html>
