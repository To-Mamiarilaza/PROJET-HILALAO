<nav>

    <div id="user">
        <i class="fa fa-user-circle fa-2x"> </i>
        <p>USER</p>
    </div>
    
    <div id="list">
        <h3> <i class="fa fa-chart-area fa-2x"></i> <a href="{{ route('statistique') }}">Statistique</a></h3>
        <h3> <i class="fa fa-dollar-sign fa-2x"></i> <a href="{{ route('abonnement') }}">Abonnement</a></h3>
        <h3> <i class="fa fa-bullhorn fa-2x"></i> <a href="#">Publicitaire</a></h3>
        <h3> <a href="#" id="toggleList">Caracteristique <i class="fa fa-angle-down fa-2x"></i> </a></h3>
            <ul id="maListe" style="display: none;">
                <li><p><a href="{{ route('crud', ['variable' => 'category']) }}"><i class="fa fa-folder-open"></i> Category</a></p></li>
                <li><p><a href="{{ route('crud', ['variable' => 'subscription_state']) }}"><i class="fa fa-check-square"></i> Subscription_state</a></p></li>
                <li><p><a href="{{ route('crud', ['variable' => 'field_type']) }}"><i class="fa fa-tags"></i> Field Type</a></p></li>
            </ul>
    </div>
    
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