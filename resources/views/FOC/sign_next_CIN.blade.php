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
        <div class="row sign_box">
            <h1 class="box__title">Next  <span class="box__title--span">Sign up</span></h1>
            <form enctype="multipart/form-data" action="{{ route('profilClient') }}" method="post" class="col-md-12 form-content">
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
                    <div class="thumbnail">
                        <div class="caption">
                            <h3>CIN pictures</h3>
                        </div>
                        <div class="input_pictures">
                            <input type="file" name="profile_picture">
                        </div>
                    </div>
                </div>
                <button type="submit" class="form-content__input--submit">SIGN IN</button>
            </form>
        </div>
    </div>
</body>
</html>