@php  
    use App\Models\BO\Statistique;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/BO/asset/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/BO/asset/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.min.css') }}"> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Page Admin</title>
</head>
<body>
<header>
    <div class="header">
        <div id="Logo">
            <h1>H I L A L A O</h1>
        </div>
        
        <div id="user">
            <a href="#"><i class="fa fa-bell fa-2x"> </i></a>
            <a href="#"><i class="fa fa-user-circle fa-2x"></i></a>
            <a href="{{ route('view_sign') }}"><i class="fa fa-user-plus  fa-2x"> </i></a>
        </div>
    </div>
</header>