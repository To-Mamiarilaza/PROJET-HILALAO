
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/BO/asset/category.css') }}">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Mon site</h1>
    </header>

    <nav>
        <ul>
            <li><a href="#">Statistique</a></li>
            <li><a href="#">Abonnement</a></li>
            <li><a href="#">Publicitaire</a></li>
            <li><a href="#">Caracteristique</a></li>
        </ul>
    </nav>

    <form action="" method="post">
        <h2>{{$ref}}</h2>
        <h3>Listes des etats d'abonnement existant</h3>
        <table border="1">
            <tr>
                <th>Nom Etat</th>
            </tr>
            @foreach ($all as $crud)
            <tr>
                <td>{{ $crud->subscription_state }}</td>
                <td>
                    <input type="button" value="Modifier">
                    <input type="button" value="Supprimer">
                </td>
            </tr>
            @endforeach
        </table>
        <p>Ajouter un etat : <input type="text" name="subscription_state">
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
