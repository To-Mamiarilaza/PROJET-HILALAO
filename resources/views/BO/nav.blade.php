<nav>
    <div class="nav">
        <div class="nav_account">
            <div class="profil">
                <i class="fa fa-user-circle fa-5x">  </i>
                <p>Admin</p>
            </div>
            <div class="info">
                 <text>Nom: RAKOTO</text></br>
                 <text>Tel: 034 05 050 05</text></br>
                 <text>Mail: mail@gmail.com</text></br>
            </div>
        </div>
        <div id="list">
            <div class="list_nav">
                <a href="{{ route('statistique') }}">Statistique  <i class="fa fa-chart-line "></i>  </a>
            </div>
            <div class="list_nav">
                <a href="{{ route('abonnement') }}">Abonnement   <i class="fa fa-paperclip "></i></a>
            </div>
            <div class="list_nav">
                <a href="#">Publicitaire  <i class="fa fa-share-square "></i></a>
            </div>
            <div class="list_nav">
                <a href="#" id="toggleList">Caracteristique <i class="fa fa-angle-down fa"></i></a>
            </div>
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
    </div>
    
</nav>