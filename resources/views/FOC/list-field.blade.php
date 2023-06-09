<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/FOC/list-field.css') }}">
    <title>Listes des terrains</title>
</head>
<body>
@include('FOC/headerNotification');
    <div class="container">
        <h1 class="accueil-text mt-4">Listes des terrains</h1>
        <p>Voila la liste de vos terrain, vous pouvez les gérer ici</p>
        <a href="{{ route('loadAddField') }}" class="btn btn-info text-white"><i class="fas fa-plus-circle mx-2"></i> Ajouter un nouveau Terrain</a>
        <hr>
        <h4 class="filtre-text">Filtre multicritère</h4>
        <form class="form" action="{{ route('searchField') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <label for="nom" class="form-label">Nom du terrain</label>
                    <input type="text" class="form-control" name="nameField" id="nom">
                </div>
                <div class="col-md-3">
                    <label for="categorie" class="form-label">Catégorie</label>
                    <select name="category" id="categorie" class="form-control">
                    @foreach ($category as $item)
                        <option value="{{ $item->getIdCategory() }}">{{ $item->getCategory() }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="col-md-3 valider-button">
                    <input type="submit" class="btn btn-warning px-4" value="Valider">
                </div>
            </div>
        </form>
        <div class="list-field mt-3">
            <div class="row g-4">
            @foreach ($fields as $field)
                <div class="col-md-3">
                    <a href="{{ route('profile-field', ['idField' => $field->getIdField()]) }}" class="lien-terrain">
                        <div class="terrain border p-3">
                            <img src="{{ asset('image/pictureField/'.$field->getPictureProfile()) }}" alt="Image du terrain" class="terrain__img">
                            <h6 class="mt-2 terrain__h6">{{ $field->getName() }}</h6>
                            <p class="terrain__categorie">{{ $field->getCategory()->getCategory() }}</p>
                            <p>{{ $field->getDescription() }}</p>
                            <div class="star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            </div>
        </div>

    </div>
</body>
</html>