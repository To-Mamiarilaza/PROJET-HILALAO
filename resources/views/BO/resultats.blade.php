<!DOCTYPE html>
<html>
    <head>
        <title>All</title>
    </head>
    <body>
    <h1>Compte Back Office</h1>

        <ul>
            <li>{{ $account->first_name }} {{ $account->last_name }}</li>
        </ul>
    
        <form action="{{ route('crud') }}" method="POST">
            @csrf
            <select name="crud">
                <option value="category">Category</option>
                <option value="field_type">Field Type</option>
                <option value="subscription_state">Subscription State</option>
            </select>
            <button type="submit">Soumettre</button></form>
    </body>
</html>
