@include('BO/header')
@include('BO/nav')

<link rel="stylesheet" href="{{ asset('css/BO/asset/crud.css') }}">
<section class="content p-4">
    <div class="en-tete mt-2">
        CATEGORIE DE TERRAIN
    </div>
    <div class="contenue mt-3 px-5">
        <h2 class="mt-2">Listes des catégories de terrain</h2>
        <a href="" class="ajout btn btn-warning mt-2" data-bs-toggle="modal" data-bs-target="#createModal"><i class="fas fa-plus"></i> Nouvelle catégorie</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all as $crud)
                <tr>
                    <td>{{ $crud->getId_category() }}</td>
                    <td>{{ $crud->getCategory() }}</td>
                    <td>{{ $crud->getSubscribing_price() }}</td>
                    <td><a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#updateModal{{ $crud->getId_category() }}" data-id="{{ $crud->getId_category() }}" data-category="{{ $crud->getCategory() }}" data-price="{{ $crud->getSubscribing_price() }}"><i class="fas fa-cog"></i></a></td>
                    <td><a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $crud->getId_category() }}" data-category="{{ $crud->getCategory() }}"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
                <!-- Modal pour modifier une catégorie -->
                <form action="{{ route('updateByid') }}" method="post">
                    @csrf
                    <div class="modal fade" id="updateModal{{ $crud->getId_category() }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modifier une catégorie</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mt-2">
                                        <input type="hidden" name="variable" id="variable" class="form-control" value="category">
                                        <input type="hidden" class="form-control" readonly id="updateId" name="id_category" value="{{ $crud->getId_category() }}">
                                    </div>
                                    <div class="mt-2">
                                        <label for="category" class="form-label">Catégorie</label>
                                        <input type="text" class="form-control" id="updateCategory" name="category" value="{{ $crud->getCategory() }}">
                                    </div>
                                    <div class="mt-2">
                                        <label for="subscribing_price" class="form-label">Prix</label>
                                        <input type="text" class="form-control" id="updatePrice" name="subscribing_price" value="{{ $crud->getSubscribing_price() }}">
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
                <!-- Modal pour supprimer une catégorie -->
                <form action="{{ route('delete', ['variable' => 'category', 'id' => $crud->getId_category()])}}" method="get">
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
                                        <input type="text" class="form-control" readonly id="deleteId" name="id_category" value="{{ $crud->getId_category() }}">
                                    </div>
                                    <div class="mt-2">
                                        <label for="category" class="form-label">Catégorie</label>
                                        <input type="text" class="form-control" readonly id="deleteCategory" name="category" value="{{ $crud->getCategory() }}">
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
<!-- Modal pour ajouter une nouvelle catégorie -->
<form action="{{ route('insert')}}" method="post">
    @csrf
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une nouvelle catégorie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2">
                        <input type="hidden" name="variable" value="category">
                        <label for="category" class="form-label">Catégorie</label>
                        <input type="text" class="form-control" name="category">
                    </div>
                    <div class="mt-2">
                        <label for="subscribing_price" class="form-label">Prix</label>
                        <input type="number" class="form-control" name="subscribing_price">
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
<script src="{{ asset('css/BO/asset/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
