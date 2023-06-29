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
                            <img src="./asset/client.png" alt="Image du profile du client">
                            <hr>
                            <div class="cin-image mt-3">
                                <img src="./asset/carte-identite.jpg" alt="Photo du CIN avant">
                                <img src="./asset/carte-identite.jpg" alt="Photo du CIN arrière">
                            </div>

                        </div>
                        <div class="information">
                            <ul>
                                <li><span>Nom :</span>MAMIARILAZA</li>
                                <li><span>Prenom :</span>To Niasimandimby</li>
                                <li><span>Adresse :</span>Iavoloha 238 bis</li>
                                <li><span>Mail :</span>mamiarilaza.to@gmail.com</li>
                                <li><span>Contact :</span>034 14 517 43</li>
                                <li><span>N° CIN :</span>117 125 432 156</li>
                            </ul>
                            <div class="decision mt-4"> 
                                <a href="" class="btn btn-warning">Valider</a>
                                <a href="" class="btn btn-danger mx-2">Refuser</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 p-3">
                <div class="attentes-client">
                    <h2>Listes des terrains du client</h2>
                    <div class="listes-client">

                        <a href="">
                            <div class="terrain">
                                <img src="./asset/elgeco.jpg" alt="Image du terrain">
                                <div class="detail-terrain">
                                    <p class="nom">Elgeco Plus</p>
                                    <p class="categorie">Foot à 11</p>
                                </div>
                                <p class="date">12/08/23</p>
                            </div>
                            <hr>
                        </a>

                        <a href="">
                            <div class="terrain">
                                <img src="./asset/elgeco.jpg" alt="Image du terrain">
                                <div class="detail-terrain">
                                    <p class="nom">Stade de bevalala</p>
                                    <p class="categorie">Foot à 11</p>
                                </div>
                                <p class="date">27/05/23</p>
                            </div>
                            <hr>
                        </a>

                    </div>
                </div>
            </div>

        </div>
    </div>

</section>