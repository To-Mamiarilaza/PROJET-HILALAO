<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/FOC/home.css') }}">
	<link rel="stylesheet" href="{{ asset('css/FOC/compte.css') }}">
	<title>Profil du client</title>
</head>

<body>
	@include('FOC/header');


	<div class="container mt-4 content">
		<h4 class="entete"><i class="fas fa-star mx-3"></i> Profile</h4>

		<div class="row mt-5">
			<div class="col-md-4 image p-1">
				<img src="{{ asset('image/Client/'.$client->getCustomerPicture()) }}" alt="Image du client">
			</div>
			<div class="offset-md-1 col-md-5 detail">
				<div class="mt-2">
					<label for="first" class="form-label">First Name</label>
					<p>{{$client -> getFirstName()}}</p>
				</div>
				<div class="mt-2">
					<label for="first" class="form-label">Last Name</label>
					<p>{{$client -> getLastName()}}</p>
				</div>
				<div class="mt-2">
					<label for="first" class="form-label">Mail</label>
					<p>{{$client -> getMail()}}</p>
				</div>
				<div class="mt-2">
					<label for="first" class="form-label">Phone Number</label>
					<p>{{$client -> getPhoneNumber()}}</p>
				</div>
				<div class="mt-2">
					<label for="first" class="form-label">Adresse</label>
					<p>{{$client -> getAdress()}}</p>
				</div>
				<div class="mt-2">
					<label for="first" class="form-label">Birthdate</label>
					<p>{{ $client -> getBirthDate() }}</p>
				</div>
				@if ($client -> getStatus() -> getIdStatus() == 1)
					<div class="alert alert-success"><i class="fas fa-user-check mx-3"></i> Client validé</div>
				@endif
				@if ($client -> getStatus() -> getIdStatus() == 2)
					<div class="alert alert-warning"><i class="fas fa-user-check mx-3"></i> Client en attente</div>
				@endif
			</div>
		</div>

		<div class="cin mt-5">
			<h4>PHOTO DU CIN</h4>
			<hr>
			<div class="cin-photos row my-4">
				<div class="col-md-6">
					<img src="{{ asset('image/CIN/'.$cin->getFirstPicture()) }}" alt="Photo du CIN verso">
				</div>
				<div class="col-md-6">
					<img src="{{ asset('image/CIN/'.$cin->getSecondPicture()) }}" alt="Photo du CIN recto">
				</div>
			</div>
		</div>
	</div>


</body>

</html>