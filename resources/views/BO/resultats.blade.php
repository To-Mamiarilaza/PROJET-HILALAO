<!DOCTYPE html>
<html>
    <head>
        <title>All</title>
    </head>
    <body>
    <h1>Compte Back Office</h1>
    <ul>
        <li><a href="{{ route('crud', ['variable' => 'category']) }}"> Category</a> </li>
        <li><a href="{{ route('crud', ['variable' => 'subscription_state']) }}"> Subscription_state</a> </li>
        <li><a href="{{ route('crud', ['variable' => 'field_type']) }}"> Field Type</a> </li>
    </ul>
        <ul>
            <li>{{ $account->first_name }} {{ $account->last_name }}</li>
        </ul>
    </body>
</html>
