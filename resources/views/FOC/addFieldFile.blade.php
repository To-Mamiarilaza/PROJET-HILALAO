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
    <title>HILALAO | TERRAIN - UPLOAD FILE</title>
</head>
<body>
    @include('FOC/header');

    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 image-place">
					<img src="{{ asset('image/documents.png') }}" alt="Upload file" srcset="">
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <h1>Uploader ici les fichiers necessaires</h1>
                        <p class="mt-4">
                            Pour nous aider à confirmer votre terrain, veuillez remplir ces dossiers 
                            enzipper dans un fichier. <br>L'uploade de fichier est necessaire et indispensable
                            a la creation ou l'ajout de votre terrain.
                        </p>
                    </div>
                    <div class="row">
                        <h3>Importer les documents ici</h3>
                        <div class="col-md-12 contenu-terrain">
                            <form enctype="multipart/form-data" action="{{ route('addFieldFile') }}" method="POST" class="col-md-12 form-content">
                                @csrf
                                <div class="row info-terrain">
                                    <div class="col-md-6">
                                        <label for="dossierTerrain" class="control-label"><b>Dossier a fournir</b></label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="file" id="image-upload" style="display: none;" name="fileField">
                                        <label for="image-upload" class="btn btn-primary btn-block btn-edited">Dossier</label>
                                    </div>
                                </div><br>
                                <input class="btn btn-success" type="submit" value="Ajouter">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row justify-content-center fonction-list">
                <h1>Importer les documents ici</h1>
                <div class="col-md-8 contenu-terrain">
                    <form action="" method="get" class="col-md-12 form-content">
                        <div class="row info-terrain">
                            <div class="col-md-4">
                                <label for="dossierTerrain" class="control-label"><b>Dossier a fournir</b></label>
                            </div>
                            <div class="col-md-4">
                                <input type="file" id="image-upload" style="display: none;">
                                <label for="image-upload" class="btn btn-primary btn-block btn-edited">Dossier</label>
                            </div>
                        </div><br>
						<input class="btn btn-success" type="submit" value="Ajouter">
                    </form>
                </div>
            </div> --}}
        </div>
    </section>
</body>
</html>