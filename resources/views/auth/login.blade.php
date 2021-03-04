<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inloggen</title>
</head>
<body>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="post">
    @csrf

    <ul>
        <li>
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </li>
        <li>
            <label for="password">Wachtwoord</label>
            <input type="password" name="password">
        </li>
    </ul>

    <button type="submit">Inloggen</button>
</form>
</body>
</html>
