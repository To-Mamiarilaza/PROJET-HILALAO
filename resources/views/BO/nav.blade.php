<nav>

    <ul>
        <li><a href="{{ route('statistique') }}">Statistique</a></li>
        <li><a href="#">Abonnement</a></li>
        <li><a href="#">Publicitaire</a></li>
        <li> <a href="#" id="toggleList">Caracteristique</a></li>
            <ul id="maListe" style="display: none;">
                <li><a href="{{ route('crud', ['variable' => 'category']) }}"> Category</a> </li>
                <li><a href="{{ route('crud', ['variable' => 'subscription_state']) }}"> Subscription_state</a> </li>
                <li><a href="{{ route('crud', ['variable' => 'field_type']) }}"> Field Type</a> </li>
            </ul>
    </ul>
    <script>
        document.getElementById('toggleList').addEventListener('click', function() {
        var liste = document.getElementById('maListe');
        if (liste.style.display === 'none') {
            liste.style.display = 'block';
        } else {
            liste.style.display = 'none';
        }
        });
    </script>
</nav>