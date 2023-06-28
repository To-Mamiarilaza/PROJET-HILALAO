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
                    <a href="{{ route('detailClient', ['id_client' => $abonnement->getId_client() ]) }}">
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

                    <a href="{{ route('detailClient', ['id_client' => $abonnement->getId_client() ]) }}">
                        <div class="terrain">
                            <img src="{{ asset('css/BO/asset/elgeco.jpg') }}" alt="Image du terrain">
                            <div class="detail-terrain">
                                <p class="nom">Elgeco Plus</p>
                                <p class="categorie">Foot à 11</p>
                            </div>
                            <p class="date">12/08/23</p>
                        </div>
                        <hr>
                    </a>
                </div>
            </div>
        </div>
            </div>

        </section>
    </div>

    <script src="{{ asset('css/BO/asset/bootstrap.bundle.min.js')}}"></script>
</body>

</html>
<!-- <h1>Liste d'attente</h1>
<table>
    <thead>
      <tr>
        <th>Id client</th>
        <th>Prenom</th>
        <th>Nom</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($all as $abonnement)
      <tr>
        <td>{{ $abonnement->getId_client() }}</td>
        <td>{{ $abonnement->getFirst_name() }}</td>
        <td>{{ $abonnement->getLast_name() }}</td>
        <td><a href="{{ route('detailClient', ['id_client' => $abonnement->getId_client() ]) }}"><input type="button" value="Detail"></a></td>
      </tr>
      @endforeach

    </tbody>
</table> -->