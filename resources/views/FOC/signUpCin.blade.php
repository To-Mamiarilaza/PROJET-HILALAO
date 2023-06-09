<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/FOC/sign.css') }}">
	<title>HILALAO | SIGNIN - NEXT</title>
</head>
<body>
	<div class="container box">
		@if($errors->any())
    	<div class="alert alert-danger">
        	<ul>
            	@foreach($errors->all() as $error)
                	<li>{{ $error }}</li>
            	@endforeach
        	</ul>
    	</div>
	@endif
		<div class="row sign_box">
			<h1 class="box__title">Next  <span class="box__title--span">Sign up</span></h1>
			<form enctype="multipart/form-data" action="{{ route('signinnext') }}" method="post" class="col-md-12 form-content">
				@csrf
				<div class="row">
					<div class="col-md-3">
						<label for="cinNumber" class="control-label"><b>CIN Number</b></label>
					</div>
					<div class="col-md-9">
						<input class="form-content__input form-content__input--log" type="number" aria-label=".form-control-lg" name="cinNumber" placeholder="000 000 000 000">
					</div>
				</div><br>
				<div class="row">
					<div class="col-md-12 caption">
						<h3>CIN pictures</h3>
					</div>
				</div>
				<div class="row CIN_pictures">
					<div class="col-md-4 input_pictures">
						<div id="upload-container">
							<h5 class="card-title">CIN recto</h5>
							<label for="image-upload-recto" class="btn btn-primary btn-block" style="cursor: pointer;">Sélectionner une image</label>
							<input type="file" id="image-upload-recto" name="recto" style="display: none;">
						</div>
					</div>
					<div class="col-md-4 input_pictures">
						<div id="upload-container mt-4">
							<h5 class="card-title">CIN verso</h5>
							<label for="image-upload-verso" class="btn btn-primary btn-block" style="cursor: pointer;">Sélectionner une image</label>
							<input type="file" id="image-upload-verso" name="verso" style="display: none;">
						</div>
					</div>
				</div>
				<button type="submit" class="form-content__input--submit">SIGN IN</button>
			</form>
		</div>
	</div>
</body>
</html>