<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FOC/sign.css') }}">
	<title>HILALAO | CLIENT - PROFIL</title>
</head>
<body>
	<div class="container box">
		<div class="row justify-content-center">
			<h1 class="box__title">Profil <span class="box__title--span">Client</span></h1>
			<div class="row">
				<div class="col-md-3 client-picture profil">
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
	</div>
</body>
</html>