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
                                  <img src="{{ asset('css/BO/image/' . $all->getFirst_picture()) }}" alt="Photo du CIN avant">
                                  <img src="{{ asset('css/BO/image/' . $all->getSecond_picture()) }}" alt="Photo du CIN arrière">
                              </div>
                          </div>
                          <div class="information">
                              <ul>
                                  <li><span>Nom :</span> {{ $all->getLast_name() }} </li>
                                  <li><span>Prenom :</span> {{ $all->getFirst_name() }} </li>
                                  <li><span>Adresse :</span> {{ $all->getAdress() }} </li>
                                  <li><span>Mail :</span> {{ $all->getMail() }} </li>
                                  <li><span>Contact :</span> {{ $all->getPhone_number() }} </li>
                                  <li><span>N° CIN :</span> {{ $all->getCin_number() }} </li>
                              </ul>
                              <div class="decision mt-4"> 
                                  <a href="{{ route('DetailCLient_admin', ['value' => 1 ,'id_client' => $all->getId_client(),'ref' => 'validationClient' ]) }}" class="btn btn-warning">Valider</a>
                                  <a href="{{ route('DetailCLient_admin', ['value' => 3 ,'id_client' => $all->getId_client(),'ref' => 'validationClient' ]) }}" class="btn btn-danger mx-2">Refuser</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

            </div>
        </div>

        </section>

    <script src="{{ asset('css/BO/asset/bootstrap.bundle.min.js') }}"></script>
