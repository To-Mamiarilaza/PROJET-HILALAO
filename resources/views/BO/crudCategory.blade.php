
    @include('BO/header') 

    @include('BO/nav')

    <form action="{{ route('insert')}}" method="post">
        @csrf
        <h2>{{$ref}}</h2>
        <h3>Listes des categories</h3>
        <table border="1">
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
            @foreach ($all as $crud)
            <tr>
                <td>{{ $crud->category }}</td>
                <td>{{ $crud->subscribing_price }}</td>
                <td>
                    <a href= "{{ route('update' , ['variable' => $ref,'id' => $crud->id_category])}}"><input type="button" value="Modifier"></a>
                    <a href= "{{ route('delete' , ['variable' => $ref,'id' => $crud->id_category])}}"><input type="button" value="Supprimer"></a>
                </td>
            </tr>
            @endforeach
        </table>
        <input type="hidden" name="variable" value="{{ $ref }}">
        <p>Ajouter une catégorie : <input type="text" name="category">
        Ajouter le prix de l'abonnement : <input type="number" name="subscribing_price"> Ar</p>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>

