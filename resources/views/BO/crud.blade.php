
<!DOCTYPE html>
<html>
    <head>
        <title>CRUD</title>
    </head>
    <body>
    <h1>Liste des {{ $ref }} </h1>
        <ul>
            @foreach ($all as $cat)
                <li>{{ $cat->category }} {{ $cat->subscribing_price }}</li>
            @endforeach
        </ul>
    </body>
</html>
