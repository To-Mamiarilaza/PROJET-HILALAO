<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/FOC/login.css') }}">
	<title>HILALAO | LOGIN</title>
</head>
<body>
	<div class="container box">
		<div class="row">
			<h1 class="box__title">Log <span class="box__title--span">in</span></h1>
			{{-- 		{{ route('name') }}		 --}}
			<form action="" method="POST" class="col-md-12 form-content">
				@csrf
				<div class="row">
					<div class="col-md-3">
						<label for="email" class="control-label"><b>Email</b></label>
					</div>
					<div class="col-md-9">
						<input class="form-content__input form-content__input--log form-control" type="email" placeholder="exemple@gmail.com" aria-label=".form-control-lg" id="email" name="email">
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label for="password" class="control-label"><b>Password</b></label>
					</div>
					<div class="col-md-9">
						<input class="form-content__input form-content__input--log form-control" type="password" placeholder="Mot de passe" aria-label=".form-control-lg" id="password"  name="password">
						<div class="form-content__checkbox">
							<input type="checkbox" class="form-content__input form-content__input--showing-password" onclick="showPassword()">
							<label for="form-content__label--showing-password">Show Password</label>
						</div>
					</div>
				</div>
				<button type="submit" class="form-content__input--submit">LOG IN</button>
			</form>
				
		</div>
		<p>Don't have an account? <a href="{{ route('SignIn') }}">Sign up</a></p>
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