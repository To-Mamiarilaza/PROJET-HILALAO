@include('BO/header') 

@include('BO/nav')

<link rel="stylesheet" href="{{ asset('css/BO/asset/category.css') }}">
<div class="contenu">
    <form action="{{ route('insert')}}" method="post">
        @csrf
        <h2>{{$ref}}</h2>
        <h3>Listes des types de terrain existant</h3>
        <table border="1">
            <tr>
                <th>Type de terrain</th>
            </tr>
            @foreach ($all as $crud)
            <tr>
                <td>{{ $crud->field_type }}</td>
                <td>
                    <a href= "{{ route('update' , ['variable' => $ref,'id' => $crud->id_field_type])}}"><input type="button" value="Modifier"></a>
                    <a href= "{{ route('delete' , ['variable' => $ref,'id' => $crud->id_field_type])}}"><input type="button" value="Supprimer"></a>
                </td>
            </tr>
            @endforeach
        </table>
        <input type="hidden" name="variable" value="{{ $ref }}">
        <p>Ajouter un type de terrain : <input type="text" name="field_type">
        <input type="submit" value="Ajouter">
    </form>
</div>
</body>
</html>
