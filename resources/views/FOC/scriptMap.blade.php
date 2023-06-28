<script>
	var map = L.map('map').setView([-18.986092 , 47.532949], 13);
	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: 'Map data © <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
		maxZoom: 18
	}).addTo(map);

	var marker;
	var info = document.getElementById("info");

	map.on('click', function(e) {
		var latitude = e.latlng.lat;
		var longitude = e.latlng.lng;

		// Supprimer le marqueur précédent s'il existe
		if (marker) {
			marker.remove();
		}

		marker = L.marker([latitude, longitude]).addTo(map).bindPopup('<b>Coordonnées:</b><br>Latitude: ' + latitude + '<br>Longitude: ' + longitude).openPopup();
		updateInfo(latitude, longitude);
	});

	document.getElementById("formMap").addEventListener("submit", function(event) {
		event.preventDefault(); // Empêche le rechargement de la page lors de la soumission du formulaire

		var positionInput = document.getElementById("adresse").value;

		// Supprimer le marqueur précédent s'il existe
		if (marker) {
			marker.remove();
		}

		if (positionInput) {
			fetch('https://nominatim.openstreetmap.org/search?format=json&q=' + positionInput)
			.then(function(response) {
				return response.json();
			})
			.then(function(data) {
				if (data.length > 0) {
				var latitude = parseFloat(data[0].lat);
				var longitude = parseFloat(data[0].lon);

				if (!isNaN(latitude) && !isNaN(longitude)) {
					map.setView([latitude, longitude], 13);
					marker = L.marker([latitude, longitude]).addTo(map).bindPopup('<b>Coordonnées:</b><br>Latitude: ' + latitude + '<br>Longitude: ' + longitude).openPopup();
					updateInfo(latitude, longitude);
				} else {
					info.innerHTML = 'Impossible de trouver la position pour l\'adresse saisie.';
				}
				} else {
				info.innerHTML = 'Aucun résultat trouvé pour l\'adresse saisie.';
				}
			})
			.catch(function(error) {
				console.log('Une erreur s\'est produite :', error);
			});
		}
	});

	function updateInfo(latitude, longitude) {
	fetch('https://nominatim.openstreetmap.org/reverse?format=json&lat=' + latitude + '&lon=' + longitude)
		.then(function(response) {
		return response.json();
		})
		.then(function(data) {
		var address = data.display_name;
		info.innerHTML = '<br>Adresse: ' + address;
		})
		.catch(function(error) {
		console.log('Une erreur s\'est produite :', error);
		});
	}

</script>
