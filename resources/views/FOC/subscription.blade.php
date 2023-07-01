<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FOC/subscription.css') }}">
    <title>Abonnement du terrain</title>
</head>

<body>
    @include('FOC/header')
    <div class="container mt-3">
        <h2 class="title my-4">Abonnement du terrain</h2>
        <div class="alert alert-danger my-3">
            <i class="fas fa-clock mx-4"></i> Votre abonnement sera expiré dans <span class="date-rappel">3 jour et 15 heure</span> 
        </div>
        <div class="row">
            <div class="col-md-4">
                <h4 class="histo-title my-3">HISTORIQUE DE PAYEMENT</h4>

                <div class="row calendrier">
                    <div class="col-md-4 p-1">
                        <div class="normal"> Janvier </div>
                    </div>
                    <div class="col-md-4 p-1">
                        <div class="normal"> Février </div>
                    </div>
                    <div class="col-md-4 p-1">
                        <div class="paye"> Mars </div>
                    </div>
                    <div class="col-md-4 p-1">
                        <div class="paye"> Avril </div>
                    </div>
                    <div class="col-md-4 p-1">
                        <div class="paye"> Mai </div>
                    </div>
                    <div class="col-md-4 p-1">
                        <div class="paye"> Juin </div>
                    </div>
                    <div class="col-md-4 p-1">
                        <div class="non-paye"> Juillet </div>
                    </div>
                    <div class="col-md-4 p-1">
                        <div class="normal"> Aout </div>
                    </div>
                    <div class="col-md-4 p-1">
                        <div class="normal"> Septembre </div>
                    </div>
                    <div class="col-md-4 p-1">
                        <div class="normal"> Octobre </div>
                    </div>
                    <div class="col-md-4 p-1">
                        <div class="normal"> Novembre </div>
                    </div>
                    <div class="col-md-4 p-1">
                        <div class="normal">Decembre</div>
                    </div>
                </div>
                <form action="" class="form my-5">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="number" placeholder="Annee" value="2023" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="submit" class="btn btn-success" value="Valider">
                        </div>
                    </div>
                </form>

                <div class="regle my-5">
                    <p class="regle-title"><i class="fas fa-info-circle mx-3"></i> Quelques règles régissant le payement</p>
                    <ul>
                        <li>Vous devez payer l'abonnement le premier du mois</li>
                        <li>Si votre abonnement est en retard de plus de 5 jour, votre terrain serai suspendue.</li>
                    </ul>
                </div>


            </div>
            <div class="col-md-7">
                <h4 class="histo-title my-3">FORMULAIRE DE PAYEMENT</h4>
                <form action="" class="form px-3">
                    <div class="mt-4">
                        <label for="mois" class="form-label">Mois</label>
                        <select name="" id="mois" class="form-select mt-1">
                            <option value="">Janvier</option>
                            <option value="">Fevrier</option>
                            <option value="">Mars</option>
                            <option value="">Avril</option>
                            <option value="">Mai</option>
                            <option value="">Juin</option>
                            <option value="">Juillet</option>
                            <option value="">Aout</option>
                            <option value="">Septembre</option>
                            <option value="">Octobre</option>
                            <option value="">Novembre</option>
                            <option value="">Decembre</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <label for="annee" class="form-label">Annee</label>
                        <input type="number" class="form-control" name="" id="annee" value="2023">
                    </div>
                    <div class="mt-4">
                        <label for="montant" class="form-label">Montant</label>
                        <input type="text" class="form-control" name="" id="montant" value="75 000 AR" readonly>
                    </div>
                    <div class="mt-4">
                        <p class="erreur"> <i class="fas fa-info-circle mx-3"></i> Afficher l'erreur de payement ici</p>
                        <input type="submit" class="btn btn-success px-5" value="Valider">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>