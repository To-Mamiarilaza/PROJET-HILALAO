
<script>
	// Fonction appelée lors du chargement de la page
	window.onload = function() {
		// Récupérer les éléments d'upload
		var uploadInput1 = document.getElementById('image-upload-recto');
		var uploadInput2 = document.getElementById('image-upload-verso');
		var uploadContainer1 = uploadInput1.parentElement.parentElement;
		var uploadContainer2 = uploadInput2.parentElement.parentElement;

		// Écouter l'événement de changement de l'upload 1
		uploadInput1.addEventListener('change', function() {
			handleUploadChange(uploadInput1, uploadContainer1);
		});

		// Écouter l'événement de changement de l'upload 2
		uploadInput2.addEventListener('change', function() {
			handleUploadChange(uploadInput2, uploadContainer2);
		});
	};

	// Fonction pour gérer le changement d'upload
	function handleUploadChange(uploadInput, uploadContainer) {
		// Vérifier si des fichiers ont été sélectionnés
		if (uploadInput.files && uploadInput.files.length > 0) {
			var file = uploadInput.files[0];
			var reader = new FileReader();

			// Lorsque la lecture du fichier est terminée
			reader.onload = function(e) {
				// Créer un élément d'image pour l'aperçu
				var img = document.createElement('img');
				img.classList.add('preview-image');
				img.src = e.target.result;

				// Remplacer le contenu du conteneur d'upload par l'image
				uploadContainer.innerHTML = '';
				uploadContainer.appendChild(img);
			};

			// Lire le contenu du fichier en tant que URL de données
			reader.readAsDataURL(file);
		}
	}
</script>
