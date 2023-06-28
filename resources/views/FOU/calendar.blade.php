<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<script src="{{ asset('js/dist/index.global.js') }}"></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialDate: '{{ date('Y-m-d') }}',
      initialView: 'timeGridWeek',
      nowIndicator: false,
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      navLinks: false, // can click day/week names to navigate views
      editable: false,
      selectable: false,
      selectMirror: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        {
          title: 'Disponibilité du terrain',
          start: '2023-01-01',
        },
        @foreach ($field->getUsersReservations() as $reservation)
        {
            color: 'green',
            title: 'Votre réservation',
            start: "{{ $reservation->getReservationDate()->format('Y-m-d') }}T{{ $reservation->getStartTime()->format('H:i:s') }}",
            end: "{{ $reservation->getReservationDate()->format('Y-m-d') }}T{{ $reservation->getEndTime()->format('H:i:s') }}"
        },
        @endforeach
        @foreach ($field->getOthersReservations() as $reservation)
        {
            color: 'red',
            title: 'Reserved',
            start: "{{ $reservation->getReservationDate()->format('Y-m-d') }}T{{ $reservation->getStartTime()->format('H:i:s') }}",
            end: "{{ $reservation->getReservationDate()->format('Y-m-d') }}T{{ $reservation->getEndTime()->format('H:i:s') }}"
        },
        @endforeach
        @foreach ($field->getDirectReservations() as $reservation)
        {
            color: 'red',
            title: 'Reserved',
            start: "{{ $reservation->getReservationDate()->format('Y-m-d') }}T{{ $reservation->getStartTime()->format('H:i:s') }}",
            end: "{{ $reservation->getReservationDate()->format('Y-m-d') }}T{{ $reservation->getEndTime()->format('H:i:s') }}"
        },
        @endforeach
      ]
    });

    calendar.render();
  });
    function renduEvenement(event, element) {
        if (event.nonUtilise) {
            element.addClass('fc-non-utilise');
        }
    }
</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 1100px;
    margin: 0 auto;
  }
</style>
</head>
<body>
    <h1>{{ date('Y-m-d') }}</h1>
   {{ var_dump($field->getDirectReservations()); }}

    <div id='calendar'></div>
    <h1>Tiavina Malalaniaina</h1>
    <form action="{{ route('reserve') }}" method="POST">
        @csrf
        <input type="hidden" name="id_field" value="{{ $field->getIdField() }}">
        <div>
            <label for="day">Date de la réservation</label>
            <input type="date" name="reservation_date" id="">
        </div>
        <div>
            <label for="start_time">Début</label>
            <input type="time" name="start_time" id="">
        </div>
        <div>
            <label for="duration">Fin</label>
            <input type="number" name="duration" id="">
        </div>
        <input type="submit" value="Valider">
    </form>
</body>
</html>
