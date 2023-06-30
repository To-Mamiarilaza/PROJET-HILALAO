
<!DOCTYPE html>
<html>
    <head>
        <title>All</title>
    </head>
    <body>
    <h1>Liste des comptes Back Office</h1>
        <ul>
            @foreach ($all as $account)
                <li>{{ $account->getFirst_name() }} {{ $account->getName() }}</li>
                <li>{{ $account->firstname }} {{ $account->name }}</li>
            @endforeach
        </ul>
    </body>
</html>
