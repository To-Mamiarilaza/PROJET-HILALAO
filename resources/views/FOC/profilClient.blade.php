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
	@include('FOC/header');

	<section>
		<div class="container box">
			<div class="row justify-content-center">
				<h1 class="box__title">Profil <span class="box__title--span">Client</span></h1>
			</div><br>
			<div class="row">
				<div class="col-md-3 client-picture profil">
					<h5 class="card-title">Picture Profil</h5>
					<div class="image-place">
						<img src="{{ asset('image/profile-picture.png') }}" alt="Upload image">
						<input type="file" id="image-upload" style="display: none;">
						<label for="image-upload" class="btn btn-primary btn-block">Upload picture</label>
					</div>
				</div>
				<div class="col-md-9 client-info">
					<div class="row">
						<div class="form-group infoProfil">
							<label for="nom">Nom :</label>
							<input type="text" name="nom" id="nom" class="form-control" value="To" disabled>
						</div>
					</div>
					<div class="row">
						<div class="form-group infoProfil">
							<label for="prenom">Prenom :</label>
							<input type="text" name="prenom" id="prenom" class="form-control" value="Namana" disabled>
						</div>
					</div>
					<div class="row">
						<div class="form-group infoProfil">
							<label for="phone">Numero Telephone :</label>
							<input type="tel" name="phone" id="phone" class="form-control" value="0345510234" disabled>
						</div>
					</div>
					<div class="row">
						<div class="form-group infoProfil">
							<label for="email">Email :</label>
							<input type="email" name="email" id="email" class="form-control" value="ToMamiarilaza@gmail.com" disabled>
						</div>
					</div>
					<div class="row">
						<div class="form-group infoProfil">
							<label for="adresse">Adresse :</label>
							<input type="text" name="adresse" id="adresse" class="form-control" value="Ambohimanambola, Analamanga, Province d’Antananarivo, Madagascar" disabled>
						</div>
					</div>
					<div class="row">
						<div class="form-group infoProfil">
							<label for="cin">Numero CIN :</label>
							<input type="number" name="cin" id="cin" class="form-control" value="101348477166" disabled>
						</div>
					</div>
					<div class="row">
						<div class="col-6-md image-place-cin">
							<img src="{{ asset('image/CIN-recto.png') }}" alt="Upload image">
						</div>
						<div class="col-6-md image-place-cin">
							<img src="{{ asset('image/CIN-verso.png') }}" alt="Upload image">
						</div>
					</div>
					<h5 class="card-title">Photo de profil</h5>
					<img src="{{ asset('image/Client/'.$client->getCustomerPicture()) }}" width="120" height="100">
				</div>
				{{-- <div class="col-md-8 champ-CIN"> --}}
					<div class="col-md-4 cinPdp">
						<h5 class="card-title">CIN recto</h5>
						<a href="#" class="thumbnail">
							<img src="{{ asset('image/CIN/'.$cin->getFirstPicture()) }}" width="120" height="100">
						</a>
					</div>
					<div class="col-md-4 cinPdp">
						<h5 class="card-title">CIN verso</h5>
						<a href="#" class="thumbnail">
							<img src="{{ asset('image/CIN/'.$cin->getSecondPicture()) }}" width="120" height="100">
						</a>
					</div>
				{{-- </div> --}}
			</div>
			<div class="card mt-5">
				<div class="form-group infoProfil">
					<label for="nom">First Name :</label>
					<input type="text" id="nom" class="form-control" value="{{$client -> getFirstName()}}" disabled>
				</div>
				<div class="form-group infoProfil">
					<label for="tel">Last Name :</label>
					<input type="text" class="form-control" name="tel" id="tel" value="{{$client -> getLastName()}}" disabled>
				</div>
				<div class="form-group infoProfil">
					<label for="tel">Phone number :</label>
					<input type="number" class="form-control" name="tel" id="tel" value="{{$client -> getPhoneNumber()}}" disabled>
				</div>
				<div class="form-group infoProfil">
					<label for="email">Email :</label>
					<input type="email" id="email" class="form-control" value="{{$client -> getMail()}}" disabled>
				</div>
				<div class="form-group infoProfil">
					<label for="adresse">Adresse :</label>
					<input type="text" class="form-control" name="adresse" id="adresse" value="{{$client -> getAdress()}}" disabled>
				</div>
				<div class="form-group infoProfil">
					<label for="adresse">CIN number :</label>
					<input type="number" class="form-control" name="adresse" id="adresse" value="{{$cin -> getCinNumber()}}" disabled>
				</div>
			</div>
		</div>
	</section>
</body>
</html>