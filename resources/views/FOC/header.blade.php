<link rel="stylesheet" href="{{ asset('css/FOC/header.css') }}">
<section class="menu">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand mx-5 titre" href="#">HILALAO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-links" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/home">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/filtreBoard">Tableau de Bord</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('list-fieldFOC') }}">Mes Terrains</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mon compte</a>
                    </li>
                </ul>
                <div class="option-block d-flex mx-5">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#"><i class="fas fa-bell"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('deconnect') }}"><i class="fas fa-power-off"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</section>