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
    @include('FOC/headerNotification');
    <div class="container mt-3">
        <h2 class="title my-4">Abonnement du terrain</h2>
        <div class="alert alert-danger my-3">
        @if($lastSubscription != null)
            <i class="fas fa-clock mx-4"></i> Votre abonnement sera expiré dans <span class="date-rappel">{{ $lastSubscription->getDayRest() }} jours</span> 
        @else
            <i class="fas fa-clock mx-4"></i> Effectuez votre premiere abonnement <span class="date-rappel"></span> 
        @endif
        </div>
        <div class="row">
            <div class="col-md-4">
                <h4 class="histo-title my-3">HISTORIQUE DE PAYEMENT</h4>

                <div class="row calendrier">
                    @foreach ($vueAbo as $item)
                    <div class="col-md-4 p-1">
                        <div class="{{ $item->getColor() }}"> {{ $item->getMonth()->getValue()}} </div>
                    </div>
                    @endforeach
                </div>
                <div class="row indication mt-3">
                    <div class="col-md-4 px-2">
                        <div class="non-paye">
                            Non payé
                        </div>
                    </div>
                    <div class="col-md-4 px-2">
                        <div class="normal">
                            Normal
                        </div>
                    </div>
                    <div class="col-md-4 px-2">
                        <div class="paye">
                            Payé
                        </div>
                    </div>
                </div>
                <form action="{{ route('searchByYear') }}" class="form my-4" method="POST">
                @csrf    
                    <div class="row">
                        <div class="col-md-6">
                            <input type="number" placeholder="Annee" value="{{ $year }}" class="form-control" name="year">
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
                <form action="{{ route('insertSubscription') }}" method="POST" class="form px-3">
                @csrf    
                    <div class="mt-4">
                        <label for="mois" class="form-label">Mois</label>
                        <select name="month" id="mois" class="form-select mt-1">
                            @foreach ($allMonth as $item)
                                <option value="{{ $item->getIdMonth() }}">{{ $item->getValue() }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <label for="annee" class="form-label">Annee</label>
                        <input type="number" class="form-control" name="year" id="annee" value="2023">
                    </div>
                    <div class="mt-4">
                        <label for="montant" class="form-label">Montant</label>
                        <input type="text" class="form-control" name="montant" id="montant" value="{{ $field->getCategory()->getSubscribing_price() }} ariary" readonly>
                    </div>
                    <div class="mt-4">
                        @if(isset($error))
                        <p class="erreur"> <i class="fas fa-info-circle mx-3"></i>{{ $error }}</p>
                        @endif
                        <input type="submit" class="btn btn-success px-5" value="Valider">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>