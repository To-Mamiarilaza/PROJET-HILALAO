@include('BO/header') 
@include('BO/nav')

<link rel="stylesheet" href="{{ asset('css/BO/asset/attente.css') }}">

<section class="content p-4">
    <div class="en-tete mt-2">
        LISTES D'ATTENTES
    </div>

    <div class="row mt-3 width-reduction">
        <div class="col-md-6 p-3">
            <div class="attentes-client">
                <h2>Listes des clients en attentes</h2>
                <div class="listes-client">
                @foreach ($all as $abonnement)
                    <a href="{{ route('detailClient_admin', ['id_client' => $abonnement->getId_client() ]) }}">
                        <div class="client">
                            <img src="{{ asset('css/BO/asset/client.png')}}" alt="Image du client">
                                <p class="nom">{{ $abonnement->getFirst_name() }}</p>
                                <p class="date">{{ $abonnement->getLast_name() }}</p>
                        </div>
                        <hr>
                    </a>
                @endforeach
                </div>
            </div>
        </div>

                <div class="col-md-6 p-3">
                    <div class="attentes-client">
                        <h2>Listes des terrains en attentes</h2>
                        <div class="listes-client">
                        @foreach ($terrains as $terrain)

                            <a href="{{ route('detailTerrain_admin', ['id_terrain' => $terrain->getId_terrain() ]) }}">
                                <div class="terrain">
                                    <img src="{{ asset('css/BO/asset/elgeco.jpg') }}" alt="Image du terrain">
                                    <div class="detail-terrain">
                                        <p class="nom">{{ $terrain->getName()}}</p>
                                        <p class="categorie">{{ $terrain->getCategory() }}</p>
                                    </div>
                                    <p class="date">{{ $terrain->getInsert_date()}}</p>
                                </div>
                                <hr>
                            </a>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <script src="{{ asset('css/BO/asset/bootstrap.bundle.min.js')}}"></script>
</body>

</html>
