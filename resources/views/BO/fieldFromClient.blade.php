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
                                @foreach ($all as $personne)
                                @endforeach
                                <img src="{{ asset('css/BO/image/' . $personne->getFirst_picture()) }}" alt="Photo du CIN avant">
                                <img src="{{ asset('css/BO/image/' . $personne->getSecond_picture()) }}" alt="Photo du CIN arrière">
                            </div>

                        </div>
                        <div class="information">
                                <ul>
                                    <li><span>Nom :</span> {{ $personne->getFirst_name() }} </li>
                                    <li><span>Prenom :</span> {{ $personne->getLast_name() }} </li>
                                    <li><span>Adresse :</span> {{ $personne->getAdress() }} </li>
                                    <li><span>Mail :</span> {{ $personne->getMail() }} </li>
                                    <li><span>Contact :</span> {{ $personne->getPhone_number() }} </li>
                                    <li><span>N° CIN :</span> {{ $personne->getCin() }} </li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 p-3">
                <div class="attentes-client">
                    <h2>Listes des terrains du client</h2>
                    <div class="listes-client">
                        @foreach ($all as $terrain)

                        <a href="">
                            <div class="terrain">
                                <img src="{{ asset('css/BO/image/' . $terrain->getPicture()) }}" alt="Image du terrain">
                                <div class="detail-terrain">
                                    <p class="nom"> {{ $terrain->getName() }} </p>
                                    <p class="categorie"> {{ $terrain->getCategory() }} </p>
                                </div>
                                <p class="date"> {{ $terrain->getSign() }} </p>
                            </div>
                            <hr>
                        </a>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>

</section>