@php  
    use App\Models\BO\Statistique;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/BO/asset/category.css') }}">
    <link rel="stylesheet" href="{{ asset('css/BO/asset/statistique.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.min.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Page Admin</title>
</head>
<body>
<header>
    <div id="Logo">
        <h1>H I L A L A O</h1>
    </div>

    <div id="list">
        <a href="{{ route('statistique') }}">Statistique</a>
        <a href="{{ route('abonnement') }}">Abonnement</a>
        <a href="#">Publicitaire</a>
        <a href="#" id="toggleList">Caracteristique<i class="fa fa-angle-down fa-2x"></i></a>
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
    <div id="user">
        <i class="fa fa-bell fa-2x"> </i>
        <i class="fa fa-user-circle fa-2x"> </i>
    </div>
</header>