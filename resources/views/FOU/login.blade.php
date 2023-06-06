<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FOU/login.css') }}">
    <title>HILALAO | LOGIN</title>
</head>
<body>
    <div class="container box">
        <div class="row">
            <div class="col-md-12">

                <h1 class="box__title">Log <span class="box__title--span">in</span></h1>
                <form action="{{ route('log-user-treat') }}" method="POST" class="form-content">
                    @csrf
                    @if($error=='username')
                    <input name="username" class="form-content__input form-content__input--log form-content__input--error" type="text" placeholder="Nom d'utilisateur" aria-label=".form-control-lg" value="Utilisateur inconnue">
                    @else
                    <input name="username" class="form-content__input form-content__input--log" type="text" placeholder="Nom d'utilisateur" aria-label=".form-control-lg">
                    @endif

                    @if($error=='mdp')
                    <input name="password" class="form-content__input form-content__input--error" type="text" placeholder="Mot de passe" aria-label=".form-control-lg" id="password" value="Mot de passe érroné">
                    @else
                    <input name="password" class="form-content__input form-content__input--log" type="password" placeholder="Mot de passe" aria-label=".form-control-lg" id="password">
                    @endif
                    <div class="form-content__checkbox">
                        <input type="checkbox" class="form-content__input form-content__input--showing-password" onclick="showPassword()">
                        <label for="form-content__label--showing-password">Show Password</label>
                    </div>
                    <button type="submit" class="form-content__input--submit">SIGN IN</button>
                </form>

            </div>
            <p>Don't have a account? <a href="{{ route('sign-user') }}">Sign up</a></p>
        </div>
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
    }
</script>
</html>
