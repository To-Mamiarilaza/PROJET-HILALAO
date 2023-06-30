@php
    use App\Models\BO\AccountAdmin;
    $accountAdmin = null;
    if(session()->has('account_admin')) {
        $accountAdmin = session('account_admin');
    }
@endphp



<div class="reference">
    <section class="sidebar">
        <div class="profile-name">
            <p class="nom">{{ $accountAdmin->getFirst_name() }} {{ $accountAdmin->getLast_name() }}</p>
            <p class="profile">{{ $accountAdmin->getMail() }}</p>
            <p class="profile">Admin</p>
        </div>

            <hr>
            <div class="lien">
        <ul>
            <li class="{{ $ref === 'statistique' ? 'checked' : '' }}">
                <a href="{{ route('statistique_admin', ['ref' => 'statistique']) }}">
                    <i class="fas fa-chart-bar"></i> Statistique
                </a>
            </li>
            <li class="{{ $ref === 'abonnement' ? 'checked' : '' }}">
                <a href="{{ route('abonnement_admin', ['ref' => 'abonnement']) }}">
                    <i class="fas fa-credit-card"></i> Abonnement
                </a>
            </li>
            <li class="{{ $ref === 'validationClient' ? 'checked' : '' }}">
                <a href="{{ route('validationClient_admin', ['ref' => 'validationClient']) }}">
                    <i class="fas fa-clock"></i> Listes d'attentes
                </a>
            </li>
            <li type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                aria-expanded="false" aria-controls="flush-collapseOne"
                @if(!isset($ref) || empty($ref)) class="checked" @endif>
                <a href=""><i class="fas fa-cogs"></i> Caractéristique</a>
            </li>





            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul>
                                <li><a href="{{ route('crud_admin', ['variable' => 'category']) }}">Catégories</a></li>
                                <li><a href="{{ route('crud_admin', ['variable' => 'subscription_state']) }}">Etat abonnement</a></li>
                                <li><a href="{{ route('crud_admin', ['variable' => 'field_type']) }}">Type de terrain</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </ul>
    </div>
    </section>


    <script src="{{ asset('css/BO/asset/bootstrap.bundle.min.js') }}"></script>
    <script>
       
    </script>
