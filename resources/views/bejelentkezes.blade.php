<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('build\assets\app-BawOEPvA.css') }}">
    <title>Versenykezelo</title>
</head>
<body>
    <h1 class="cim">Versenykezelő</h1>
    <h2 class="alcim" >Bejelentkezés</h2>

    <div>
        <form action="{{ route('login')}}" method="POST" class="userForm">
            @csrf
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            <label for="passwd">Jelszó:</label><br>
            <input type="password" id="passwd" name="password" required><br><br>
            <button type="submit">Bejelentkezés</button>
        </form>
    </div>

    @if (session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif

    <div id="registerDiv">
        <p>Regisztrálj itt:</p>
        <a href="{{ route('regisztracio')}}">
            <button type="button">Regisztrálok</button>
        </a>
    </div>
</body>
</html>