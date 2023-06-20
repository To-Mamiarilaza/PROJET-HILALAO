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
        <td>{{ $all->first_name }}</td>
        <td>{{ $all->last_name }}</td>
        <td>{{ $all->phone_number }}</td>
        <td>{{ $all->mail }}</td>
        <td>{{ $all->address }}</td>
        <td>{{ $all->cin_number }}</td>
        <td>{{ $all->first_picture }}</td>
        <td>{{ $all->second_picture }}</td>
      </tr>

    </tbody>
</table>

<a href="#"><input type="button" value="Refusé"></a>
<a href="#"><input type="button" value="Validé"></a>