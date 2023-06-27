<nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
    <div class="container-fluid px-5 mx-5">
        <a class="navbar-brand logo" href="{{ route('landing') }}">HILALAO</a>
        <div class="collapse navbar-collapse mx-5" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 liens">
                <li class="nav-item mx-2">
                    <a class="nav-link active" aria-current="page" href="{{ route('landing') }}">Accueil</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="{{ route('list-field-all') }}">Terrains</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="">Mes réservations</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="#">Communauté</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="">Mon Compte</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="{{ route('log-user') }}">Se Connecter</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
