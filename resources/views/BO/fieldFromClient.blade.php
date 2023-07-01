@include('BO/header')
@include('BO/nav')

<link rel="stylesheet" href="{{ asset('css/BO/asset/profile_client.css') }}">

<section class="content p-4">
    <div class="en-tete mt-2">
        PROFILE DU CLIENT
    </div>

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-7 p-3">
                <div class="client-profile">
                    <div class="detail-client">
                        <div class="image">
                            <img src="{{ asset('css/BO/asset/client.png') }}" alt="Image du profile du client">
                            <hr>
                            <div class="cin-image mt-3">
                                <img src="{{ asset('css/BO/image/' . $client->getFirst_picture()) }}" alt="Photo du CIN avant">
                                <img src="{{ asset('css/BO/image/' . $client->getSecond_picture()) }}" alt="Photo du CIN arrière">
                            </div>
                        </div>
                        <div class="information">
                            <ul>
                                <li><span>Nom :</span> {{ $client->getFirst_name() }} </li> 
                                <li><span>Prenom :</span> {{ $client->getLast_name() }} </li>
                                <li><span>Adresse :</span> {{ $client->getAdress() }} </li>
                                <li><span>Mail :</span> {{ $client->getMail() }} </li>
                                <li><span>Contact :</span> {{ $client->getPhone_number() }} </li>
                                <li><span>N° CIN :</span> {{ $client->getCin_number() }} </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 p-3">
                <div class="attentes-client">
                    <h2>Liste des terrains du client</h2>
                    <div class="listes-client">
                        @if($fields != null)
                        @foreach ($fields as $terrain)
                            <a href="{{ route('detail_field_admin', ['id_terrain' => $terrain->getId_terrain(), 'annee' => 2023, 'ref' => 'statistique']) }}">
                                <div class="terrain">
                                    <img src="{{ asset('css/BO/image/' . $terrain->getPicture()) }}" alt="Image du terrain">
                                    <div class="detail-terrain">
                                        <p class="nom">{{ $terrain->getName() }}</p>
                                        <p class="categorie">{{ $terrain->getCategory() }}</p>
                                    </div>
                                    <p class="date">{{ $terrain->getInsert_date() }}</p>
                                </div>
                                <hr>
                            </a>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
