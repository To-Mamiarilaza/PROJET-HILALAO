<nav>

    <div>

    </div>

    <p><a href="#">Statistique</a></p>
    <p><a href="#">Abonnement</a></p>
    <p><a href="#">Publicitaire</a></p>

    <a href="#" id="toggleList">Caracteristique x</a>
    <ul id="maListe" style="display: none">
        <li><a href="{{ route('crud', ['variable' => 'category']) }}"> Category</a></li>
        <li><a href="{{ route('crud', ['variable' => 'subscription_state']) }}"> Subscription state</a></li>
        <li><a href="{{ route('crud', ['variable' => 'field_type']) }}"> Field Type</a></li>
    </ul>

    <script>
        document.getElementById('toggleList').addEventListener('click', function() {
            var liste = document.getElementById('maListe');
            if(liste.style.display === 'none') {
                liste.style.display = 'block';
            } else {
                liste.style.display = 'none';
            }
        });
    </script>
</nav>