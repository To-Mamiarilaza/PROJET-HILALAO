<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/FOC/home.css') }}">
	<link rel="stylesheet" href="{{ asset('css/FOC/add-field.css') }}">
	<title>HILALAO | CLIENT - TERRAIN</title>
</head>
<body>
	@include('FOC/header');

	<section>
		<div class="container mt-5">
			<div class="row">
				<div class="col-md-6 image-place">
					<img src="{{ asset('image/add-terrain.png') }}" alt="Image terrain" srcset="">
				</div>
				<div class="col-md-6">
					<h1>Ajouter vos terrains dans la liste</h1>
					<p class="mt-4">
						Vous pouvez bien sûr ajouter votre terrain ainsi que d'autres informations nécessaires 
						afin que les utilisateurs puissent mieux voir les merveilles sur le terrain où ils jouent.
					</p>
					<a href="" class="btn btn-warning mt-3">Voir les statisitques</a>
				</div>
			</div><br>
			<div class="row justify-content-center fonction-list">
                <h1>Formulaire d'ajout de terrain</h1>
				<div class="col-md-12 contenu-terrain">
					<form action="{{ route('addField') }}" method="POST" class="col-md-12 form-content">
					@csrf	
						<div class="row info-terrain">
							<div class="col-md-2">
								<label for="nom" class="control-label"><b>Nom</b></label>
							</div>
							<div class="col-md-8">
								<input class="form-content__input form-content__input--log form-control" type="text" placeholder="nom de votre terrain" aria-label=".form-control-lg" id="nom" name="nameField" value="nomTerrain">
							</div>
						</div>
						<div class="row info-terrain">
							<div class="col-md-2">
								<label for="categories" class="control-label"><b>Catégories</b></label>
							</div>
							<div class="col-md-8">
								<select id="categories" class="form-control" name="category">
									<option value="">Sélectionnez une catégorie</option>
									@foreach ($category as $item)
									<option value="{{ $item->getIdCategory() }}">{{ $item->getCategory() }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="row info-terrain">
							<div class="col-md-2">
								<label for="surface" class="control-label"><b>Surface</b></label>
							</div>
							<div class="col-md-8">
								<select id="surface" class="form-control" name="surface">
									<option value="">Sélectionnez une type de surface</option>
									@foreach ($fieldType as $item)
									<option value="{{ $item->getIdFieldType() }}">{{ $item->getFieldType() }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="row info-terrain">
							<div class="col-md-2">
								<label for="infrastructure" class="cotrol-label"><b>Infrastructure</b></label>
							</div>
							<div class="col-md-8">
								<div class="radio">
								@foreach ($infrastructure as $item)
									<label>
									{{ $item->getInfrastructure() }}
										<input type="radio" name="infrastructure" id="" value="{{ $item->getIdInfrastructure() }}">
									</label>
									@endforeach
								</div>
							</div>
						</div>
						<div class="row info-terrain">
							<div class="col-md-2">
								<label for="eclairage" class="control-label"><b>Eclairage</b></label>
							</div>
							<div class="col-md-8">
								<div class="radio">
									@foreach ($light as $item)
									<label>
										{{ $item->getLight() }}
										<input type="radio" name="light" id="" value="{{ $item->getIdLight() }}">										
									</label>
									@endforeach
								</div>
							</div>
						</div>
						<input class="btn btn-success" type="submit" value="Ajouter">
					</div>
				</form>
			</div>
		</div>
	</section>
</body>
</html>
