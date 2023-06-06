<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/FOC/sign.css') }}">
	<title>HILALAO | SIGNIN</title>
</head>
<body>
	<div class="container box">
		<div class="row sign_box">
			<h1 class="box__title">Sign <span class="box__title--span">up</span></h1>
			<form enctype="multipart/form-data" action="{{ route('signinnext') }}" method="POST" class="col-md-12 form-content">
				@csrf
				<div class="row">
					<div class="col-md-3">
						<label for="email" class="control-label"><b>First name</b></label>
					</div>
					<div class="col-md-9">
						<input class="form-content__input form-content__input--log" type="text" aria-label=".form-control-lg" name="name">
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for="lastname" class="control-label"><b>Last name</b></label>
					</div>
					<div class="col-md-9">
						<input class="form-content__input form-content__input--log" type="text" aria-label=".form-control-lg" name="lastname">
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for="phoneNumber" class="control-label"><b>Phone number</b></label>
					</div>
					<div class="col-md-9">
						<input class="form-content__input form-content__input--log" type="tel" aria-label=".form-control-lg" name="phoneNumber">
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for="email" class="control-label"><b>Email</b></label>
					</div>
					<div class="col-md-9">
						<input class="form-content__input form-content__input--log" type="email" aria-label=".form-control-lg" name="email">
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for="address" class="control-label"><b>Local address</b></label>
					</div>
					<div class="col-md-9">
						<input class="form-content__input form-content__input--log" type="text" aria-label=".form-control-lg" name="address">
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for="password" class="control-label"><b>Password</b></label>
					</div>
					<div class="col-md-9">
						<input class="form-content__input form-content__input--log" type="password" aria-label=".form-control-lg" id="password" name="password">
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for="password" class="control-label"><b>Confirm your password</b></label>
					</div>
					<div class="col-md-9">
						<input class="form-content__input form-content__input--log" type="password" aria-label=".form-control-lg" id="password" name="password">
					</div>
				</div>
				{{-- <div class="form-content__checkbox">
					<input type="checkbox" class="form-content__input form-content__input--showing-password" onclick="showPassword()">
					<label for="form-content__label--showing-password">Show Password</label>
				</div> --}}
				<button type="submit" class="form-content__input--submit">NEXT</button>
			</form>
		</div>
	<p>Already have an account? <a href="{{ route('login') }}">Log in</a></p>
	</div>
</body>

<script>
	function showPassword() {
		var password = document.getElementById("password");
		if (password.checked) {
			password.type = "password";
			password.checked = false;
		} else {
			password.type = "text";
			password.checked = true;
		}
		console.log(password.checked);
	}
</script>
</html>