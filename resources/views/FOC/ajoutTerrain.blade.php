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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css">
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
					<form action="" method="get" id="formMap">
						<div class="row">
							<div class="col-md-6">
								<div class="row info-terrain">
									<div class="col-md-3">
										<label for="nom" class="control-label mt-2"><b>Nom</b></label>
									</div>
									<div class="col-md-7">
										<input class="form-content__input form-content__input--log form-control" type="text" aria-label=".form-control-lg" id="nom" name="nom" placeholder="nom du terrain">
									</div>
								</div>
								<div class="row info-terrain">
									<div class="col-md-3">
										<label for="categories" class="control-label mt-2"><b>Catégories</b></label>
									</div>
									<div class="col-md-7">
										<select id="categories" class="form-control" required>
											<option value="">Sélectionnez une catégorie</option>
											<option value="football">Foot à 11</option>
											<option value="basketball">Foot à 7</option>
											<option value="tennis">Basket</option>
										</select>
									</div>
								</div>
								<div class="row info-terrain">
									<div class="col-md-3">
										<label for="surface" class="control-label mt-2"><b>Surface</b></label>
									</div>
									<div class="col-md-7">
										<select id="surface" class="form-control" required>
											<option value="">Sélectionnez une type de surface</option>
											<option value="Goudron">Goudron</option>
											<option value="Synthétique">Synthétique</option>
											<option value="Gazon">Gazon</option>
											<option value="Terre">Terre</option>
											<option value="Tapis">Tapis</option>
											<option value="Parquet">Parquet</option>
										</select>
									</div>
								</div>
								<div class="row info-terrain">
									<div class="col-md-3">
										<label for="infrastructure" class="cotrol-label mt-2"><b>Infrastructure</b></label>
									</div>
									<div class="col-md-9">
										<div class="radio">
											<label class="label-for-radio">
												<input type="radio" name="optionsRadios" id="" value="">
												Intérieur
											</label>
											<label class="label-for-radio">
												<input type="radio" name="optionsRadios" id="" value="">
												Extérieur
											</label>
										</div>
									</div>
								</div>
								<div class="row info-terrain">
									<div class="col-md-3">
										<label for="eclairage" class="control-label mt-2"><b>Eclairage</b></label>
									</div>
									<div class="col-md-9">
										<div class="radio">
											<label class="label-for-radio">
												<input type="radio" name="optionsRadios" id="" value="">
												Eclairé
											</label>
											<label class="label-for-radio">
												<input type="radio" name="optionsRadios" id="" value="">
												Non Eclairé
											</label>
										</div>
									</div>
								</div>
						</div>
						<div class="col-md-6">
							<div class="row sig-map">
								<div class="col-md-4">
									<label for="adresse" class="control-label mt-2"><b>Adresse</b></label>
								</div>
								<div class="col-md-6">
									<input class="form-content__input form-content__input--log form-control" type="text" placeholder="adresse terrain" aria-label=".form-control-lg" id="adresse" name="adresse">
								</div>
							</div>
							<div class="row sig-map">
								<div id="map"></div>
							</div>
						</div>
					</div>
					<input class="btn btn-success" type="submit" value="Ajouter">
					</form>
				</div>

			</div>
		</div>
	</section>

	<script>
		var map = L.map('map').setView([-18.986092 , 47.532949], 13);
		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
		maxZoom: 18
		}).addTo(map);

		var marker;

		document.getElementById("formMap").addEventListener("submit", function(event) {
		event.preventDefault(); // Empêche le rechargement de la page lors de la soumission du formulaire

		var positionInput = document.getElementById("adresse").value;

		// Supprimer le marqueur précédent s'il existe
		if (marker) {
			marker.remove();
		}

		var coordinates = positionInput.split(",");
		var latitude = parseFloat(coordinates[0].trim());
		var longitude = parseFloat(coordinates[1].trim());

		if (!isNaN(latitude) && !isNaN(longitude)) {
			map.setView([latitude, longitude], 13);
			marker = L.marker([latitude, longitude]).addTo(map);
		} else {
			alert("Les coordonnées saisies ne sont pas valides. Veuillez utiliser le format 'latitude, longitude'.");
		}
		});
	</script>

<script src="{{ asset('css/FOU/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>