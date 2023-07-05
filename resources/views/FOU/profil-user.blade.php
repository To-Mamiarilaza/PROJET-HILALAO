<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/FOU/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/FOU/assets/css/profileUtilisateur.css') }}">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <title>Document</title>
</head>
<html>
<body>
@include('FOU.header-notification')
<div class="container contenu">
    <div class="row profile">
        <div class="col-md-3 profile-falseSidebar">
            <div class="row profile-falseSidebar-photo ">
                <img src="{{ asset('css/FOU/assets/image/lalaina.jpg') }}">
            </div>
            <div class="row profile-falseSidebar-sport">
                <div class="row profile-falseSidebar-sport-title">
                    <div class="col-md-3 profile-falseSidebar-sport-title-texte"><p>SPORT</p></div>
                    <div class="col-md-9"><hr></div>
                </div>
                <div class="row profile-falseSidebar-sport-activite">

                </div>

            </div>

        </div>
        <div class="col-md-8 profile-texte">
            <div class="row profile-texte-biography">
                <div class="row profile-texte-biography-name">
                    <div class="col-md-4 profile-texte-biography-name-prenom">
                        <h4>{{ $user->getFirstName() }} {{ $user->getLastName() }}</h4>
                    </div>
                    <div class="col-md-4 profile-texte-biography-name-localisation">
                        <i class="fa fa-map-marker"></i>
                        <p>Ivato</p>
                    </div>
                    <div class="col-md-4 profile-texte-biography-name-authentifie">
                        <i class="fa fa-check-circle"></i>
                    </div>
                </div>
                <div class="row profile-texte-biography-specialite">
                    <p>Football Player</p>
                </div>
                <div class="row profile-texte-biography-ranking">
                    <p>RANKINGS</p>
                    <div class="row profile-texte-biography-ranking-star">
                        <span class="fa fa-star checked"> </span>
                        <span class="fa fa-star checked"> </span>
                        <span class="fa fa-star checked"> </span>
                        <span class="fa fa-star"> </span>
                        <span class="fa fa-star"> </span>
                    </div>
                </div>
            </div>
            <div class="row profile-texte-reservation">
                <div class="row  profile-texte-reservation-title">
                    <p>LISTE DES RESERVATIONS</p>
                </div>
                <div class="profile-texte-reservation-liste">
                    <table>
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Lieu</th>
                                <th>Sport</th>
                                <th>début</th>
                                <th>fin</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user->getReservations() as $reservation)

                            <tr>
                                <td>{{ $reservation->getReservationDate()->format('d F Y') }}</td>
                                <td>
                                <!-- <img src="lieu1.jpg" alt="Lieu 1"> -->
                                <span>{{ $reservation->getField()->getName() }}</span>
                                </td>
                                <td>Sport 1</td>
                                <td>{{ $reservation->getStartTime()->format('H:i') }}</td>
                                <td>{{ $reservation->getEndTime()->format('H:i') }}</td>
                                @if (!$reservation->getIsPast())
                                <td><div class="detail-icon"><i class="fas fa-eye"></i></div></td>
                                <td><a href="{{ route('cancel-reservation', ['id_reservation'=>$reservation->getIdReservation()]) }}"><div class="cancel-icon"><i class="fas fa-times"></i></div></td>
                                @endif
                            </tr>
                            @endforeach
                            <!-- Ajoutez ici d'autres lignes de réservation -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('template.Footer')
</body>
</html>
