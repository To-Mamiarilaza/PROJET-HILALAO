<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FOC/reservation.css') }}">
    <title>Réservations</title>
</head>

<body>
    @include('FOC/header')
    <div class="container">
        <h1 class="reservation-title my-4">Réservations du terrain</h1>
        <div class="row mt-3">
            <div class="col-md-4 list-reservation">
                <h5>Les réservations le plus proches</h5>

                <div class="liste-display">
                    <div class="row reservation-element my-4">
                        <div class="col-md-3">
                            <img class="user-picture" src="{{ asset('image/user.jpg') }}" alt="Image de l'utilisateur">
                        </div>
                        <div class="col-md-8 reservation-detail">
                            <ul>
                                <li>Le <span class="important">10/11/23</span>  de <span class="important">10:00</span>  à <span class="important">11:30</span></li>
                                <li>Payé : <span class="important">10 000 Ar</span>  Reste : <span class="important">50 000 Ar</span> </li>
                                <li>Par <span class="important">Rakotonjarasoa George</span></li>
                            </ul>
                        </div>
                    </div>
    
                    <div class="row reservation-element my-4">
                        <div class="col-md-3">
                            <img class="user-picture" src="{{ asset('image/user.jpg') }}" alt="Image de l'utilisateur">
                        </div>
                        <div class="col-md-8 reservation-detail">
                            <ul>
                                <li>Le <span class="important">10/11/23</span>  de <span class="important">10:00</span>  à <span class="important">11:30</span></li>
                                <li>Payé : <span class="important">10 000 Ar</span>  Reste : <span class="important">50 000 Ar</span> </li>
                                <li>Par <span class="important">Rakotonjarasoa George</span></li>
                            </ul>
                        </div>
                    </div>
    
                    <div class="row reservation-element my-4">
                        <div class="col-md-3">
                            <img class="user-picture" src="{{ asset('image/user.jpg') }}" alt="Image de l'utilisateur">
                        </div>
                        <div class="col-md-8 reservation-detail">
                            <ul>
                                <li>Le <span class="important">10/11/23</span>  de <span class="important">10:00</span>  à <span class="important">11:30</span></li>
                                <li>Payé : <span class="important">10 000 Ar</span>  Reste : <span class="important">50 000 Ar</span> </li>
                                <li>Par <span class="important">Rakotonjarasoa George</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="row reservation-element my-4">
                        <div class="col-md-3">
                            <img class="user-picture" src="{{ asset('image/user.jpg') }}" alt="Image de l'utilisateur">
                        </div>
                        <div class="col-md-8 reservation-detail">
                            <ul>
                                <li>Le <span class="important">10/11/23</span>  de <span class="important">10:00</span>  à <span class="important">11:30</span></li>
                                <li>Payé : <span class="important">10 000 Ar</span>  Reste : <span class="important">50 000 Ar</span> </li>
                                <li>Par <span class="important">Rakotonjarasoa George</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-8 calendrier">
                <h5>Calendrier de réservation</h5>
            </div>

        </div>
    </div>
</body>

</html>