<!-- resources/views/list-field/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>List Fields</title>
</head>
<body>
    <h1>List Fields</h1>

    <ul>
        @foreach ($listFields as $listField)
            <li>{{ $listField->name }}</li>
        @endforeach
    </ul>
</body>
</html>
