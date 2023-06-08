<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FOC/sign.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FOC/profil.css') }}">
	<title>HILALAO | CLIENT - PROFIL</title>
</head>
<body>
	<div class="container box">
		<div class="row justify-content-center">
			<div class="row">
				<div class="card mt-5">
					<h1 class="box__title">Profil <span class="box__title--span">Client</span></h1>
					<div class="row">
						<div class="col-md-3 input_pictures profil">
							<h5 class="card-title">Picture Profil</h5>
							<input type="file" id="image-upload" style="display: none;">
							<label for="image-upload" class="btn btn-primary btn-block">Upload picture</label>
						</div>
						<div class="col-md-3 cinPdp">
							<h5 class="card-title">CIN recto</h5>
							<a href="#" class="thumbnail">
								<img src="..." alt="...">
							</a>
						</div>
						<div class="col-md-3 cinPdp">
							<h5 class="card-title">CIN verso</h5>
							<a href="#" class="thumbnail">
								<img src="..." alt="...">
							</a>
						</div>
					</div>
					<div class="form-group infoProfil">
						<label for="nom">First Name :</label>
						<input type="text" id="nom" class="form-control" value="John" disabled>
					</div>
					<div class="form-group infoProfil">
						<label for="tel">Last Name :</label>
						<input type="text" class="form-control" name="tel" id="tel" value="Doe" disabled>
					</div>
					<div class="form-group infoProfil">
						<label for="tel">Phone number :</label>
						<input type="number" class="form-control" name="tel" id="tel" value="0345510234" disabled>
					</div>
					<div class="form-group infoProfil">
						<label for="email">Email :</label>
						<input type="email" id="email" class="form-control" value="johndoe@example.com" disabled>
					</div>
					<div class="form-group infoProfil">
						<label for="adresse">Adresse :</label>
						<input type="text" class="form-control" name="adresse" id="adresse" value="123 Rue du Client, Ville, Pays" disabled>
					</div>
					<div class="form-group infoProfil">
						<label for="adresse">CIN number :</label>
						<input type="number" class="form-control" name="adresse" id="adresse" value="101348477166" disabled>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>