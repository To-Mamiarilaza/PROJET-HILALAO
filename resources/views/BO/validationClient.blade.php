@include('BO/header') 
@include('BO/nav')

<link rel="stylesheet" href="{{ asset('css/BO/asset/category.css') }}">
<h1>Liste d'attente</h1>
<table>
    <thead>
      <tr>
        <th>Id client</th>
        <th>Prenom</th>
        <th>Nom</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($all as $abonnement)
      <tr>
        <td>{{ $abonnement->getId_client() }}</td>
        <td>{{ $abonnement->getFirst_name() }}</td>
        <td>{{ $abonnement->getLast_name() }}</td>
        <td><a href="{{ route('detailClient', ['id_client' => $abonnement->getId_client() ]) }}"><input type="button" value="Detail"></a></td>
      </tr>
      @endforeach

    </tbody>
</table>