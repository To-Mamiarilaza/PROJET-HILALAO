<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/FOC/home.css') }}">
	<link rel="stylesheet" href="{{ asset('css/FOC/profil.css') }}">
	<title>HILALAO | CLIENT - PROFIL</title>
</head>
<body>
	@if($client->getStatus()->getIdStatus() != 2)
		@include('FOC/header');
	@endif

	<section>
		<div class="container box">
			<div class="row justify-content-center">
				<h1 class="box__title">Profil <span class="box__title--span">Client</span></h1>
			</div><br>
			<div class="row">
				<div class="col-md-3 client-picture profil">
					<h5 class="card-title">Photo de profil</h5>
					<div class="image-place">
						<img src="{{ asset('image/Client/'.$client->getCustomerPicture()) }}" alt="Upload image">
						<input type="file" id="image-upload" style="display: none;">
						<label for="image-upload" class="btn btn-primary btn-block">Upload picture</label>
					</div>
				</div>
				<div class="col-md-9 client-info">
					<div class="row">
						<div class="form-group infoProfil">
							<label for="nom">Nom :</label>
							<input type="text" name="nom" id="nom" class="form-control" value="{{$client -> getFirstName()}}" disabled>
						</div>
					</div>
					<div class="row">
						<div class="form-group infoProfil">
							<label for="prenom">Prenom :</label>
							<input type="text" name="prenom" id="prenom" class="form-control" value="{{$client -> getLastName()}}" disabled>
						</div>
					</div>
					<div class="row">
						<div class="form-group infoProfil">
							<label for="phone">Numero Telephone :</label>
							<input type="tel" name="phone" id="phone" class="form-control" value="{{$client -> getPhoneNumber()}}" disabled>
						</div>
					</div>
					<div class="row">
						<div class="form-group infoProfil">
							<label for="email">Email :</label>
							<input type="email" name="email" id="email" class="form-control" value="{{$client -> getMail()}}" disabled>
						</div>
					</div>
					<div class="row">
						<div class="form-group infoProfil">
							<label for="adresse">Adresse :</label>
							<input type="text" name="adresse" id="adresse" class="form-control" value="{{$client -> getAdress()}}" disabled>
						</div>
					</div>
					<div class="row">
						<div class="form-group infoProfil">
							<label for="cin">Numero CIN :</label>
							<input type="number" name="cin" id="cin" class="form-control" value="{{$cin -> getCinNumber()}}" disabled>
						</div>
					</div>
					<div class="row">
						<div class="col-6-md image-place-cin">
							<img src="{{ asset('image/CIN/'.$cin->getFirstPicture()) }}">
						</div>
						<div class="col-6-md image-place-cin">
							<img src="{{ asset('image/CIN/'.$cin->getSecondPicture()) }}">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@include('FOC/scriptPicture');
</body>
</html>
