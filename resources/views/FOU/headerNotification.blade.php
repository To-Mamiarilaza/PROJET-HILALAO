<link rel="stylesheet" href="{{ asset('css/FOU/assets/css/header.css') }}">
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
                                <?php
                                $condition = true;
                                if (count($notifications) == 0) {
                                    $condition = false;
                                }
                                ?>
                                <a class="nav-link active position-relative" aria-current="page" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="{{ $condition ? 'dropdown' : '' }}" aria-expanded="false">
                                    <i class="fas fa-bell"></i>
                                    @if(count($notifications) != 0)
                                    <span id="rond-rouge" class="position-absolute top-5 start-70 translate-middle p-1 bg-danger border border-light rounded-circle">
                                        <span class="visually-hidden">New alerts</span>
                                    </span>
                                    @endif
                                </a>

                                <ul class="dropdown-menu dropdown-list" id="notification-list" aria-labelledby="dropdownMenuLink">
                                    @foreach($notifications as $notification)
                                    <li><a class="dropdown-item" href="#" data-notification-id="{{ $notification->idUserNotification }}" onclick="changeNotificationState(this)">{!! $notification->getContent() !!}</a></li>
                                    @endforeach
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
<script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>
<script>
    function changeNotificationState(element) {
        var container = element.closest('li');
        container.remove();

        var notifContainer = document.getElementById('notification-list');
        var nombre = notifContainer.getElementsByTagName('li').length;
        if (nombre == 0) {
            document.getElementById('rond-rouge').remove();
            notifContainer.classList.remove('dropdown-menu');
        }

        var notificationId = element.getAttribute('data-notification-id');

        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Traitement de la réponse ici
                var response = xhr.responseText;
                console.log(response);
            }
        };

        xhr.open('GET', 'http://127.0.0.1:8000/changeUserNotificationState/' + notificationId, true);

        xhr.send();
    }
</script>