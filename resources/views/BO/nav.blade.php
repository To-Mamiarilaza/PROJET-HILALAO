<nav>
    <ul>
        <li><a href="{{ route('statistique') }}">Statistique</a></li>
        <li><a href="#">Abonnement</a></li>
        <li><a href="#">Publicitaire</a></li>
        <li>
            <ul><a href="#">Caracteristique</a>
                <li><a href="{{ route('crud', ['variable' => 'category']) }}"> Category</a> </li>
                <li><a href="{{ route('crud', ['variable' => 'subscription_state']) }}"> Subscription_state</a> </li>
                <li><a href="{{ route('crud', ['variable' => 'field_type']) }}"> Field Type</a> </li>
            </ul>

        </li>
    </ul>
</nav>