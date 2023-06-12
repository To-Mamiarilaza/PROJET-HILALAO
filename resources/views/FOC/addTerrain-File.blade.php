<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                    <h1>Uploader ici les fichiers necessaires</h1>
                    <p class="mt-4">
                        Pour nous aider à confirmer votre terrain, veuillez remplir ces dossiers 
                        enzipper dans un fichier. L'uploade de fichier est 
                    </p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>