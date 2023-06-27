@include('BO/header') 

@include('BO/nav')

<link rel="stylesheet" href="{{ asset('css/BO/asset/category.css') }}">
<div class="contenu">
    <form action="{{ route('insert')}}" method="post">
        @csrf
        <h2>{{$ref}}</h2>
        <h3>Listes des etats d'abonnement existant</h3>
        <table border="1">
            <tr>
                <th>Nom Etat</th>
            </tr>
            @foreach ($all as $crud)
            <tr>
                <td>{{ $crud->getSubscription_state() }}</td>
                <td>
                    <a href= "{{ route('update' , ['variable' => $ref,'id' => $crud->getId_subscription_state()])}}"><input type="button" value="Modifier"></a>
                    <a href= "{{ route('delete' , ['variable' => $ref,'id' => $crud->getId_subscription_state()])}}"><input type="button" value="Supprimer"></a>
                </td>
            </tr>
            @endforeach
        </table>
        <input type="hidden" name="variable" value="{{ $ref }}">
        <p>Ajouter un etat : <input type="text" name="subscription_state">
        <input type="submit" value="Ajouter">
    </form>
</div>
</body>
</html>
