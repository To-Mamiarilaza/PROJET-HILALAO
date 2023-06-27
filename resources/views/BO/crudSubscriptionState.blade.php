@include('BO/header')
@include('BO/nav')

<link rel="stylesheet" href="{{ asset('css/BO/asset/crud.css') }}">
<section class="content p-4">
    <div class="en-tete mt-2">
        ETAT D'ABONNEMENT
    </div>

    <div class="contenue mt-3 px-5">
        <h2 class="mt-2">Listes des états d'abonnement</h2>
        <a href="" class="ajout btn btn-warning mt-2" data-bs-toggle="modal" data-bs-target="#createModal"><i class="fas fa-plus"></i> Nouvelle état</a>
        <table class="table mt-3">
            <thead>
                <tr>
                            <td>ID</td>
                            <td>Etat</td>
                            <td></td>
                            <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($all as $crud)
                <tr>
                    <td>{{ $crud->getId_subscription_state() }}</td>
                    <td>{{ $crud->getSubscription_state() }}</td>
                    <td><a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal{{ $crud->getId_subscription_state() }}" data-id="{{ $crud->getId_subscription_state() }}" data-subscription_state="{{ $crud->getSubscription_state() }}"><i class="fas fa-cog"></i></a></td>
                    <td><a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $crud->getId_subscription_state() }}" data-subscription_state="{{ $crud->getSubscription_state() }}"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
                <!-- Modal pour modifier une catégorie -->
                <form action="{{ route('updateByid') }}" method="post">
                    @csrf
                    <div class="modal fade" id="updateModal{{ $crud->getId_subscription_state() }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modifier un état</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mt-2">
                                        <input type="hidden" name="variable" id="variable" class="form-control" value="subscription_state">
                                        <input type="hidden" class="form-control" readonly id="updateId" name="id_subscription_state" value="{{ $crud->getId_subscription_state() }}">
                                    </div>
                                    <div class="mt-2">
                                        <label for="etat" class="form-label">Etat</label>
                                        <input type="text" class="form-control" id="updateSubscription_state" name="subscription_state" value="{{ $crud->getSubscription_state() }}">
                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-primary">Valider</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Modal pour supprimer une catégorie -->
                <form action="{{ route('delete' , ['variable' => 'subscription_state','id' => $crud->getId_subscription_state()])}}" method="get">
                    @csrf
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Supprimer une catégorie</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mt-2">
                                        <label for="id" class="form-label">ID</label>
                                        <input type="text" class="form-control" readonly id="deleteId" name="id_subscription_state" value="{{ $crud->getId_subscription_state() }}">
                                    </div>
                                    <div class="mt-2">
                                        <label for="category" class="form-label">Etat</label>
                                        <input type="text" class="form-control" readonly id="deleteubscription_state" name="subscription_state" value="{{ $crud->getSubscription_state() }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
</div>
<form action="{{ route('insert')}}" method="post">
    @csrf
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un nouvel etat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2">
                        <input type="hidden" name="variable" value="subscription_state">
                        <label for="etat" class="form-label">Etat</label>
                        <input type="text" class="form-control" name="subscription_state">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Valider</button>
                </div>
            </div>
        </div>
    </div>
</form>
