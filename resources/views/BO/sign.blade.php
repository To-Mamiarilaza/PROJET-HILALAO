<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/BO/assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/BO/assets/css/login.css') }}">
    <title>HILALAO | LOGIN</title>
</head>
<body>
    <form class="container box" action="{{ route('Sign_admin') }}" method="POST">
    @csrf    
        <div class="row">
            <h1 class="box__title">Sign <span class="box__title--span">up </span></h1>
            <div class="col-md-12 form-content">
                <input class="form-content__input form-content__input--log" type="text" placeholder="Name" aria-label=".form-control-lg" name="nom">
                <input class="form-content__input form-content__input--log" type="text" placeholder="First name" aria-label=".form-control-lg" name="prenom">
                <input class="form-content__input form-content__input--log" type="text" placeholder="Phone number" aria-label=".form-control-lg" name="tel">
                <input class="form-content__input form-content__input--log" type="mail" placeholder="E-mail" aria-label=".form-control-lg" name="mail">
                <input class="form-content__input form-content__input--log" type="password" placeholder="Password" aria-label=".form-control-lg" id="password" name="pwd">
                <div class="form-content__checkbox">
                    <input type="checkbox" class="form-content__input form-content__input--showing-password" onclick="showPassword()">
                    <label for="form-content__label--showing-password">Show Password</label>
                </div>
                <button type="submit" class="form-content__input--submit">SIGN UP</button>
            </div>
                
        </div>
    </form>
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




