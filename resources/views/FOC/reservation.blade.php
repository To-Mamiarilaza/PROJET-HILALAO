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
        <div class="direct-reservation">
            <button class="btn btn-info text-white" data-bs-toggle="modal" data-bs-target="#reservation-directe "> <i class="fas fa-pen mx-2"></i> Réservation directe</button>
        </div>
        <div class="row mt-3">
            <div class="col-md-4 list-reservation">
                <h5>Les réservations le plus proches</h5>
                <div class="liste-display mt-3">
                    <div class="row reservation-element my-4">
                        <div class="col-md-3">
                            <img class="user-picture" src="{{ asset('image/user.jpg') }}" alt="Image de l'utilisateur">
                        </div>
                        <div class="col-md-8 reservation-detail">
                            <ul>
                                <li>Le <span class="important">10/11/23</span> de <span class="important">10:00</span> à <span class="important">11:30</span></li>
                                <li>Payé : <span class="important">10 000 Ar</span> Reste : <span class="important">50 000 Ar</span> </li>
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
                                <li>Le <span class="important">10/11/23</span> de <span class="important">10:00</span> à <span class="important">11:30</span></li>
                                <li>Payé : <span class="important">10 000 Ar</span> Reste : <span class="important">50 000 Ar</span> </li>
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
                                <li>Le <span class="important">10/11/23</span> de <span class="important">10:00</span> à <span class="important">11:30</span></li>
                                <li>Payé : <span class="important">10 000 Ar</span> Reste : <span class="important">50 000 Ar</span> </li>
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
                                <li>Le <span class="important">10/11/23</span> de <span class="important">10:00</span> à <span class="important">11:30</span></li>
                                <li>Payé : <span class="important">10 000 Ar</span> Reste : <span class="important">50 000 Ar</span> </li>
                                <li>Par <span class="important">Rakotonjarasoa George</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-8 calendrier">
                <h5>Calendrier de réservation</h5>
                <div id="calendar" class="mt-3">

                </div>
            </div>

        </div>
    </div>

    <!-- Modal pour insérer une réservation en directe -->
    <form action="" method="POST" class="form">
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
                            <input type="text" class="form-control" name="" id="client-name">
                        </div>
                        <div class="mb-3">
                            <label for="client-phone" class="form-label"> N° Téléphone : </label>
                            <input type="text" class="form-control" name="" id="client-phone">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="client-phone" class="form-label"> Date du réservation : </label>
                                <input type="date" class="form-control" name="" id="client-phone">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="client-phone" class="form-label"> Heure début : </label>
                                <input type="time" class="form-control" name="" id="client-phone">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="client-phone" class="form-label"> Duration : </label>
                            <input type="number" class="form-control" name="" id="client-phone" value="1">
                        </div>
                        <p class="error mx-1"><i class="fas fa-info-circle   mx-3"></i> Afficher les érreurs ici</p>
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
        // Pour parametrer le calendrier
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

                events: [{
                        title: 'Anjarasoa Fleuris',
                        start: new Date(2023, 5, 14, 9, 0),
                        end: new Date(2023, 5, 14, 11, 0)
                    },
                    {
                        title: 'Rakoto Feno',
                        start: new Date(2023, 5, 15, 14, 0),
                        end: new Date(2023, 5, 15, 16, 0)
                    },
                    {
                        title: 'To Mamiarilaza',
                        start: new Date(2023, 5, 16, 10, 30),
                        end: new Date(2023, 5, 16, 12, 30)
                    },
                ]
            });

            calendar.render();
        });
    </script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>