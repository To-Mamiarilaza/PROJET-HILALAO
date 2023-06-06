<form action="{{ route('SignIn') }}" method="POST">
    @csrf
    <label for="email">Email :</label>
    <input type="email" name="email" value="chal@gmail.com">

    <label for="password">Password:</label>
    <input type="password" name="password" value="chalman">

    <button type="submit">Envoyer</button>
</form>
