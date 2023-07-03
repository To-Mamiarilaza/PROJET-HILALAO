@include('BO/header') 
@include('BO/nav')

<link rel="stylesheet" href="{{ asset('css/BO/asset/profile_terrain.css') }}">

<section class="content p-4">
            <div class="en-tete mt-2">
                PROFILE DU TERRAIN
            </div>

            <div class="detail-terrain mt-3">
                <div class="row">
                    <div class="col-md-4 images p-3">
                        <div class="profil-image">
                            <img src="{{ asset('css/BO/asset/elgeco.jpg') }}" alt="Image principale du terrain">
                        </div>
                        <div class="secondar-image mt-2">
                            <img src="{{ asset('css/BO/asset/elgeco.jpg') }}" alt="Image secondaire du terrain">
                            <img src="{{ asset('css/BO/asset/elgeco.jpg') }}" alt="Image secondaire du terrain">
                            <img src="{{ asset('css/BO/asset/elgeco.jpg') }}" alt="Image secondaire du terrain">
                        </div>
                    </div>
    
                    <div class="col-md-7 description px-5">
                        <h2>{{ $all->getName() }}</h2>
                        <ul>
                            <li><span>Catégorie: </span> {{ $all->getCategory() }}</li>
                            <li><span>Propriétaire: </span> {{ $all->getFirst_name() }}</li>
                            <li><span>Adresse: </span> {{ $all->getAdress() }}</li>
                        </ul>

                        <div class="desc-text">
                            <h3>DESCRIPTION</h3>
                            <p class="text">
                                {{ $all->getDescription() }}
                            </p>
                        </div>
                        <div class="buttons">
                        @if (isset($etat))
                            @if ($etat == 1)
                                <p class="accepted-text">Terrain accepté</p>
                            @else 
                                <p class="refused-text">Terrain refusé</p>
                            @endif
                        @elseif (isset($validation))
                            <a href = "{{ asset('image/fileField/' . $all->getField_files()) }}" class= "btn btn-primary download ">Telecharger les dossiers</a>
                            <a href="{{ route('update_status_admin', ['variable' => 1,'id_terrain' => $all->getId_terrain(),'ref' => 'validationClient']) }}" class="btn btn-warning">Valider</a>
                            <a href="{{ route('update_status_admin', ['variable' => 3,'id_terrain' => $all->getId_terrain(),'ref' => 'validationClient']) }}" class="btn btn-danger mx-4">Refuser</a>
                        @endif
                        </div>
                    </div>

                </div>
            </div>
            
            @if (isset($month))
            <div class="abonnement mt-3">
                <h2>Etat d'abonnement</h2>
                <div class="mt-2">
                    <form action="{{ route('detail_field_admin',['ref' => 'validationClient'])}}" class="form" method="GET">
                        <div class="mt-3 px-4">
                            <div class="row">
                                <input type="hidden" value="{{  $all->getId_terrain() }}" name="id_terrain"/>
                                <input type="hidden" value="statistique" name="ref"/>
                                <div class="col-md-8">
                                    <select name="annee" id="annee" class="form-select annee">
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="submit" class="btn btn-warning" value="Valider">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="etats mt-3">
                <ul>
                @php
                    $mois = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
                    $m = $month ?? null;
                @endphp

                @foreach ($mois as $index => $nomMois)
                    @php
                        $classe = ($m === null || in_array($index + 1, $m)) ? "" : "non-payé";
                        $classe = $m === null ? "non-payé" : $classe;
                    @endphp
                    <li class="{{ $classe }}">{{ $nomMois }}</li>
                @endforeach

                </ul>
                </div>
            </div>
            @endif

        </section>
    </div>

    <script src="{{ asset('css/BO/asset/bootstrap.bundle.min.js') }}"></script>
</body>

</html>