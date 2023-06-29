<div class="reference">
    <section class="sidebar">
        <div class="profile-name">
            <p class="nom">Benjamina</p>
            <p class="profile">Admin</p>
        </div>

        <hr>

        <div class="lien">
            <ul>
                <li class=""><a href="{{ route('statistique') }}"><i class="fas fa-chart-bar"></i> Statistique</a></li>
                <li><a href="{{ route('abonnement') }}"><i class="fas fa-credit-card"></i> Abonnement</a></li>
                <li><a href="{{ route('validationClient') }}"><i class="fas fa-clock"></i> Listes d'attentes</a></li>
                <li class="checked" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                    aria-expanded="false" aria-controls="flush-collapseOne">
                    <a href=""><i class="fas fa-cogs"></i> Caractéristique</a>
                </li>

                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul>
                                    <li><a href="{{ route('crud', ['variable' => 'category']) }}">Catégories</a></li>
                                    <li><a href="{{ route('crud', ['variable' => 'subscription_state']) }}">Etat abonnement</a></li>
                                    <li><a href="{{ route('crud', ['variable' => 'field_type']) }}">Type de terrain</a></li>
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
       // Sélectionnez tous les éléments li contenant des liens
        const listeLiens = document.querySelectorAll('.lien li');

        // Parcourez chaque élément li
        listeLiens.forEach(lien => {
        // Ajoutez un gestionnaire d'événements de clic à chaque lien
        lien.addEventListener('click', () => {
            // Supprimez la classe "checked" de tous les éléments li
            listeLiens.forEach(li => li.classList.remove('checked'));
            // Ajoutez la classe "checked" à l'élément li cliqué
            lien.classList.add('checked');
        });
        });


    </script>
