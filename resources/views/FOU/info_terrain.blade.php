<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/FOU/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FOU/assets/css/list-terrain.css') }} ">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Information Terrain</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Information du terrain</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @foreach($infos as $info)
                    <p>Nom du terrain : {{$info->name}}</p>
                    <p>Catégorie : {{$info->category}}</p>
                    <p>Type de terrain : {{$info->field_type}}</p>
                    <p>infrastructure : {{$info->infrastructure}}</p>
                    <p>L'intensité de la lumière : {{$info->light}}</p>
                    <p>Adresse : {{$info->address}}</p>
                    <p>Coordonnée Géographique : longitude : {{$info->longitude}} et latitude : {{$info->latitude}}</p>
                    <p>Description : {{$info->description}}</p>
                    <a href="/calendar/{{ $info->id_field }}">Reserver</a>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>


