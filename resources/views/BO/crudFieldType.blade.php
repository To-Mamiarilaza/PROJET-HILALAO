@include('BO/header')
@include('BO/nav')

<link rel="stylesheet" href="{{ asset('css/BO/asset/crud.css') }}">
<section class="content p-4">
    <div class="en-tete mt-2">
        TYPE DE TERRAIN
    </div>

    <div class="contenue mt-3 px-5">
        <h2 class="mt-2">Listes des types de terrains</h2>
        <a href="" class="ajout btn btn-warning mt-2" data-bs-toggle="modal" data-bs-target="#createModal"><i class="fas fa-plus"></i> Nouvelle état</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Type de terrain</td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($all as $crud)
                <tr>
                    <td>{{ $crud->getId_field_type() }}</td>
                    <td>{{ $crud->getField_type() }}</td>
                    <td><a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal{{ $crud->getId_field_type() }}" data-id="{{ $crud->getId_field_type() }}" data-field_type="{{ $crud->getField_type() }}"><i class="fas fa-cog"></i></a></td>
                    <td><a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $crud->getId_field_type() }}" data-field_type="{{ $crud->getField_type() }}"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
                <!-- Modal pour modifier une catégorie -->
                <form action="{{ route('updateByid_admin') }}" method="post">
                    @csrf
                    <div class="modal fade" id="updateModal{{ $crud->getId_field_type() }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modifier un type de terrain</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mt-2">
                                        <input type="hidden" name="variable" id="variable" class="form-control" value="field_type">
                                        <input type="hidden" class="form-control" readonly id="updateId" name="id_field_type" value="{{ $crud->getId_field_type() }}">
                                    </div>
                                    <div class="mt-2">
                                        <label for="etat" class="form-label">Type de terrain</label>
                                        <input type="text" class="form-control" id="updateField_type" name="field_type" value="{{ $crud->getField_type() }}">
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
                <form action="{{ route('delete_admin' , ['variable' => 'field_type','id' => $crud->getId_field_type()])}}" method="get">
                    @csrf
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Supprimer un type de terrain</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mt-2">
                                        <label for="id" class="form-label">ID</label>
                                        <input type="text" class="form-control" readonly id="deleteId" name="id_field_type" value="{{ $crud->getId_field_type() }}">
                                    </div>
                                    <div class="mt-2">
                                        <label for="field_type" class="form-label">Etat</label>
                                        <input type="text" class="form-control" readonly id="deleteField_type" name="field_type" value="{{ $crud->getField_type() }}">
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
<form action="{{ route('insert_admin')}}" method="post">
    @csrf
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter nouveau type de terrain</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2">
                        <input type="hidden" name="variable" value="field_type">
                        <label for="etat" class="form-label">Type</label>
                        <input type="text" class="form-control" name="field_type">
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
