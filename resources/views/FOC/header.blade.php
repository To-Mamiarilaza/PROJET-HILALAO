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
                        <a class="nav-link" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tableau de Bord</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mes Terrains</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mon compte</a>
                    </li>
                </ul>
                <div class="option-block d-flex mx-5">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <div class="dropdown dropdown-notification">

                                <a class="nav-link active position-relative" aria-current="page" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-bell"></i>
                                    <span class="position-absolute top-5 start-70 translate-middle p-1 bg-danger border border-light rounded-circle">
                                        <span class="visually-hidden">New alerts</span>
                                    </span>
                                </a>

                                <ul class="dropdown-menu dropdown-list" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="#">Votre réservation du terrain <span class="fieldName">Barea Mahamasina</span> aura lieu dans <span class="time-last">5 min</span></a></li>
                                    <li><a class="dropdown-item" href="#">Vous avez manqué votre réservation du terrain <span class="fieldName">Complex Betongolo</span></a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-power-off"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</section>