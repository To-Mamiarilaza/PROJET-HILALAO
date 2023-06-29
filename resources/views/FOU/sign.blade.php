<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FOU/assets/css/sign.css') }}">
    <title>HILALAO | SIGN</title>
</head>
<body>
    <div class="container box">
        <div class="row">
            <h1 class="box__title">Sign <span class="box__title--span">up</span></h1>
            <form class="col-md-12 form-content" action="{{ route('sign-user-treat') }}" method="post">
                @csrf
                <div class="row">

                    <div class="col-md-6">
                        <input name="name" class="form-content__input form-content__input--log" type="text" placeholder="Nom d'utilisateur" aria-label=".form-control-lg" required>
                        <input name="email" class="form-content__input form-content__input--log" type="text" placeholder="Email de l'utilisateur" aria-label=".form-control-lg">
                        <input name="dtn" class="form-content__input form-content__input--log" type="text" placeholder="Date de naissance" aria-label=".form-control-lg" id="date" onmouseover="showDate()" required>
                    </div>
                    <div class="col-md-6">
                        <input name="contact" class="form-content__input form-content__input--log" type="contact" placeholder="Téléphone" aria-label=".form-control-lg" id="date" onmouseover="showDate()" required>
                        <select name="idgenre" id="" class="form-content__input form-content__input--log">
                            <option value="1">Homme</option>
                            <option value="2">Femme</option>
                        </select>
                        <input name="mdp" class="form-content__input form-content__input--log" type="password" placeholder="Mot de passe" aria-label=".form-control-lg" id="password" required>
                    </div>
                </div>
                <button type="submit" class="form-content__input--submit">SIGN IN</button>
            </form>

        </div>
        <p>Already have an account? <a href="{{ route('log-user') }}">Sign in</a> </p>
    </div>
</body>
<script>
    function showDate() {
        var date = document.getElementById("date");
        date.type = "date";
    }
    function hideDate() {
        var date = document.getElementById("date");
        if (date.value == "") {
            date.type = "text";
        }
    }

</script>

</html>
