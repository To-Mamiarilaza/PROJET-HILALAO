@include('BO/header') 
@include('BO/nav')

<link rel="stylesheet" href="{{ asset('css/BO/asset/category.css') }}">
<h1>Liste d'attente</h1>
<table>
    <thead>
      <tr>
        <th>Prenom</th>
        <th>Nom</th>
        <th>Telephone</th>
        <th>E-mail</th>
        <th>Adresse</th>
        <th>Numero CIN</th>
        <th>Premiere photo</th>
        <th>Deuxieme photo</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ $all->getFirst_name() }}</td>
        <td>{{ $all->getLast_name() }}</td>
        <td>{{ $all->getPhone_number() }}</td>
        <td>{{ $all->getMail() }}</td>
        <td>{{ $all->getAdress() }}</td>
        <td>{{ $all->getCin_number() }}</td>
        <td>{{ $all->getFirst_picture() }}</td>
        <td>{{ $all->getSecond_picture() }}</td>
      </tr>

    </tbody>
</table>

<a href="{{ route('') }}"><input type="button" value="Refusé"></a>
<a href="{{ route('') }}"><input type="button" value="Validé"></a>