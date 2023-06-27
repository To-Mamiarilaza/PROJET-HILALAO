@php  
    use App\Models\BO\Statistique;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.min.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/BO/asset/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/BO/asset/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/BO/asset/bootstrap.min.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Page Admin</title>
</head>
<body>
    <section class="menu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand mx-5 titre" href="#">HILALAO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbar-links" id="navbarSupportedContent">
                    <div class="option-block d-flex mx-5">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#"><i class="fas fa-bell"></i></a>
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