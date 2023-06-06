<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FOC/css/login.css') }}">
    <title>HILALAO | LOGIN</title>
</head>
<body>
    <div class="container box">
        <div class="row">
            <h1 class="box__title">Log <span class="box__title--span">in</span></h1>
            <h5><i>Client login</i></h5>
            <form action="{{ route('SignIn') }}" method="POST" class="col-md-12 form-content">
            @csrf  
            <input class="form-content__input form-content__input--log" type="text" placeholder="Email" aria-label=".form-control-lg"  name="email" value="chal@gmail.com">
                <input class="form-content__input form-content__input--log" type="password" placeholder="Mot de passe" aria-label=".form-control-lg" id="password"  name="password" value="chalman">
                <div class="form-content__checkbox">
                    <input type="checkbox" class="form-content__input form-content__input--showing-password" onclick="showPassword()">
                    <label for="form-content__label--showing-password">Show Password</label>
                </div>
                <button type="submit" class="form-content__input--submit">LOG IN</button>
            </form>
                
        </div>
        <p>Don't have an account? <a href="{{ route('SignInAccount') }}">Sign up</a></p>
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