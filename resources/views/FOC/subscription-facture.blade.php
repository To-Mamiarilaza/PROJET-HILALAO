<?php
	// Parcourir le tableau des mois
	function printMonth() {
	$mois = array(
		"Janvier", "Février", "Mars", "Avril",
		"Mai", "Juin", "Juillet", "Août",
		"Septembre", "Octobre", "Novembre", "Décembre"
	);
	for ($i = 0; $i < count($mois); $i++) {
			echo "<td>" . $mois[$i] . "</td>";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('fontawesome-5/css/all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/FOC/home.css') }}">
	<link rel="stylesheet" href="{{ asset('css/FOC/sub-fact.css') }}">
	<title>HILALAO | CLIENT - ABONNEMENT</title>
</head>
<body>
	@include('FOC/header');

	<section>
		<div class="container mt-5">
			<div class="row justify-content-center fonction-list">
				<h1>Abonnement et payement</h1>
				<div class="row sub-fact-annee">
					<form>
						<div class="col-md-4 btn-group" role="group">
							<div class="col-md-2">
								<label for="annee" class="control-label"><b>Annee</b></label>
							</div>
							<div class="col-md-6">
								<select id="annee" class="form-control" required>
									<option value="">Selectionner l'annee</option>
									<option value="1">2020</option>
									<option value="2">2021</option>
									<option value="3">2022</option>
									<option value="4">2023</option>
								</select>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Valider</button>
					</form>
				</div>
				<div class="col-md-12">
					<table class="table table-bordered">
						{{-- ATAO BOUCLE LE MOIS --}}
						<tr>
							<?php
								printMonth();
							?>
						</tr>
						{{-- LE RESULTAT KO ATAO BOUCLE --}}
						<tr>
							<td><div class="alert alert-info" role="alert">de</div></td>
							<td><div class="alert alert-danger" role="alert">fa</div></td>
							<td><div class="alert alert-default" role="alert">ult</div></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="row sub-fact-annee info-stat">
					<div class="col-md-3">
						<p class="mt-3">Fin de votre abonnement dans</p>
					</div>
					<div class="col-md-1 info-limite-sub alert alert-danger" role="alert"><b>20 jours</b></div>
					<div class="col-md-6 to-stat">
						<p class="mt-3">
							Les terrains sont toujours parametrable selon leurs changements.<br>
							Vous pouvez consulter ainsi les statistique ci-dessous</p>
						<a href="" class="btn btn-warning mt-3">Voir les statisitques</a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="alert alert-warning" role="alert">
								<p class="mt-3">Apres 5 jours de retard, les informations sur tous vos terrains ne seront plus visible</p>
							</div>
						</div>
						<div class="row payement-sub-fact justify-content-center fonction-list">
							<h1>Payement</h1>
							<div class="col-md-10 contenu-sub-fact">
								<form action="" method="get" class="col-md-12 form-content">
									<div class="row info-payement">
										<div class="col-md-4">
											<label for="mois" class="mt-2 control-label"><b>Mois</b></label>
										</div>
										<div class="col-md-8">
											<select id="mois" class="form-control" required>
												<option value="">Sélectionnez le mois</option>
												<option value="1">Jan</option>
												<option value="2">Fev</option>
												<option value="3">Mar</option>
											</select>
										</div>
									</div>
									<div class="row info-payement">
										<div class="col-md-4">
											<label for="montant" class="mt-2 control-label"><b>Montants</b></label>
										</div>
										<div class="col-md-8">
											<input type="number" aria-label=".form-control-lg" class="form-content__input form-content__input--log form-control" name="montant" id="montant">
										</div>
									</div>
									<div class="row info-payement">
										<div class="col-md-4">
											<label for="tel" class="mt-2 control-label"><b>Numero tel</b></label>
										</div>
										<div class="col-md-8">
											<input type="tel" aria-label=".form-control-lg" class="form-content__input form-content__input--log form-control" name="tel" id="tel">
										</div>
									</div>
									<input class="btn btn-to-sub-fact btn-success" type="submit" value="Valider">
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-6 image-place">
						<img src="{{ asset('image/pocket-money.png') }}" alt="Upload file" srcset="">
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>