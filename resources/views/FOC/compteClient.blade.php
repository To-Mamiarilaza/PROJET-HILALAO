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
				<img src="{{ asset('image/user.jpg') }}" alt="Image du client">
			</div>
			<div class="offset-md-1 col-md-5 detail">
				<div class="mt-2">
					<label for="first" class="form-label">First Name</label>
					<p>To</p>
				</div>
				<div class="mt-2">
					<label for="first" class="form-label">Last Name</label>
					<p>MAMIARILAZA</p>
				</div>
				<div class="mt-2">
					<label for="first" class="form-label">Mail</label>
					<p>mamiarilaza.to@gmail.com</p>
				</div>
				<div class="mt-2">
					<label for="first" class="form-label">Phone Number</label>
					<p>034 14 517 43</p>
				</div>
				<div class="mt-2">
					<label for="first" class="form-label">Adresse</label>
					<p>Lot 238 bis Iavoloha</p>
				</div>
				<div class="mt-2">
					<label for="first" class="form-label">Birthdate</label>
					<p>07 juillet 2004</p>
				</div>
				<div class="alert alert-success"><i class="fas fa-user-check mx-3"></i> Client validé</div>
				<!-- Si client en attente décoché ceci -->
				<!-- <div class="alert alert-warning"><i class="fas fa-user-check mx-3"></i> Client en attente</div> -->
			</div>
		</div>

		<div class="cin mt-5">
			<h4>PHOTO DU CIN</h4>
			<hr>
			<div class="cin-photos row my-4">
				<div class="col-md-6">
					<img src="{{asset('image/cin-photo.jpg')}}" alt="Photo du CIN verso">
				</div>
				<div class="col-md-6">
					<img src="{{asset('image/cin-photo.jpg')}}" alt="Photo du CIN recto">
				</div>
			</div>
		</div>
	</div>


</body>

</html>