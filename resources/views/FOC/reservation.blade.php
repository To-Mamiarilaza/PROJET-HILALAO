<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FOC/reservation.css') }}">
    <script src="{{ asset('js/dist/index.global.js') }}"></script>
    <title>Réservations</title>
</head>

<body>
    @include('FOC/header')
    <div class="container">
        <h1 class="reservation-title my-3">Réservations du terrain</h1>
        @if (isset($reservationFields) && count($reservationFields) >0 )          
        <div class="direct-reservation">
            <button class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#reservation-directe "> <i class="fas fa-pen mx-2"></i> Réservation directe</button>
            <a href="{{ route('selectByWeek') }}" class="btn btn-info text-white"> Filtre par semaines </a>
            <a href="{{ route('selectAll') }}" class="btn btn-info text-white"> Toutes les reservations </a>
        </div>
        <div class="row mt-3">
            <div class="col-md-4 list-reservation">
                <h5>Les réservations le plus proches</h5>
                <div class="liste-display mt-3">
                    @foreach ($reservationFields as $reservation)
                    <div class="row reservation-element my-4">
                            <div class="col-md-3">
                                <img class="user-picture" src="{{ asset('image/user.jpg') }}" alt="Image de l'utilisateur">
                            </div>
                            <!-- 0.5 veut dire 50% -->
                            <div class="col-md-8 reservation-detail">
                                <ul>
                                    <li>Le <span class="important">{{ date('d F Y', strtotime($reservation->getReservationDate())) }}</span>
                                    de <span class="important">{{ date('H:i', strtotime($reservation->getStart())) }}</span> à <span class="important">{{ $reservation->getEnd() }}</span></li>
                                    <li>Payé : <span class="important">{{ $reservation->getPrice()*(0.5) }} Ar</span> Reste : <span class="important">{{ $reservation->getPrice() - $reservation->getPrice()*(0.5) }} Ar</span> </li>
                                    <li>Par <span class="important">{{ $reservation->getFirstName() }} {{ $reservation->getLastName() }}</span> </br> Références : <span class="important"> {{ $reservation->getReference() }} </span> </br> 
                                    <span> Statue : </span> <span class="important"> {{ $reservation->getEtatLettre() }} </span> </br> <a href="/gererReservation/{{ $reservation->getIdReservation() }}"> ## </a> </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <div class="col-md-8 calendrier">
                <h5>Calendrier de réservation</h5>
                <div id="calendar" class="mt-3">
                    
                </div>
            </div>
            
        </div>
    </div>
    @endisset
    @if (count($reservationFields) < 0) 
        <h5>Vous n'avez aucune réservation</h5>
    @endif
    
    <!-- Modal pour insérer une réservation en directe -->
    <form action=" {{ route('insert') }} " method="GET" class="form">
        <div class="modal fade" id="reservation-directe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Réservation en directe</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="client-name" class="form-label"> Nom du client : </label>
                            <input type="text" class="form-control" name="nom_client" id="client-name">
                        </div>
                        <div class="mb-3">
                            <label for="client-phone" class="form-label"> N° Téléphone : </label>
                            <input type="text" class="form-control" name="telephone_client" id="client-phone">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="client-phone" class="form-label"> Date du réservation : </label>
                                <input type="date" class="form-control" name="date_reservation" id="client-phone">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="client-phone" class="form-label"> Heure début : </label>
                                <input type="time" class="form-control" name="heure_debut" id="client-phone">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="client-phone" class="form-label"> Duration : </label>
                            <input type="number" class="form-control" name="duration" id="client-phone" value="1">
                        </div>
                        @if (isset($error)) 
                            <p class="error mx-1"><i class="fas fa-info-circle   mx-3"></i> {{ $error }}</p>
                        @endisset
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        // Pour paramétrer le calendrier
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'timeGridWeek'
                },
                initialView: 'timeGridWeek',
                editable: false,
                eventColor: 'rgb(35, 160, 35)',
                allDaySlot: false,
                viewRender: function(view, element) {
                    var headerContainer = element.find('.fc-header-toolbar .fc-day-header-container');
                    headerContainer.addClass('custom-day-header');
                },
                events: [
                    @foreach ($reservationFields as $reservation)
                    {
                        title: '{{ $reservation->getFirstName() }} {{ $reservation->getLastName() }}',
                        start: new Date('{{ $reservation->getReservationDate() }}' + 'T{{ $reservation->getStart() }}'),
                        end: new Date('{{ $reservation->getReservationDate() }}' + 'T{{ $reservation->getEnd() }}'),
                    },
                    @endforeach
                ]
            });
            calendar.render();
        });
    </script>
    
    
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>