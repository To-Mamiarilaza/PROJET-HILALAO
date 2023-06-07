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
		<div class="row">
            <h1 class="box__title">Profil <span class="box__title--span">Client</span></h1>
			<form action="" method="get">
				<div class="row">
					<div class="col-md-3 input_pictures profil">
						<h5 class="card-title">Picture Profil</h5>
						<input type="file" id="image-upload" style="display: none;">
						<label for="image-upload" class="btn btn-primary btn-block">Upload picture</label>
					</div>
					<div class="col-md-4 cinPdp">
						<h5 class="card-title">CIN recto</h5>
						<a href="#" class="thumbnail">
							<img src="..." alt="...">
						</a>
					</div>
					<div class="col-md-4 cinPdp">
						<h5 class="card-title">CIN verso</h5>
						<a href="#" class="thumbnail">
							<img src="..." alt="...">
						</a>
					</div>		
				</div>
			</form>
		</div>
	</div>
</body>
</html>