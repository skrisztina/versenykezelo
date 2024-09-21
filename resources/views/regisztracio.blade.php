<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('build\assets\app-BawOEPvA.css') }}">
    <title>Regisztráció</title>
</head>
<body>
    <h1 class="cim">Versenykezelő</h1>
    <h2 class="alcim">Regisztráció<h2>

    <div id="toLoginDiv">
        <a href="{{route ('bejelentkezes')}}">
            <button type="button">Vissza a bejelentkezésre</button>
        </a>
    </div>

    <div>
        <form action="{{route ('register')}}" method="POST" class="userForm">
            @csrf
            <label for="name">Név:</label><br>
            <input type="text" name="nev" id="name" required><br><br>
            <label for="email">Email:</label><br>
            <input type="email" name="email" id="email" required><br><br>
            <label for="phone">Telefonszám:</label><br>
            <input type="text" name="phone" id="phone"><br><br>
            <label for="szul">Születési idő:</label><br>
            <input type="date" name="szul" id="szul" required><br><br>
            <label for="passwd">Jelszó: (min. 8 karakter)</label><br>
            <input type="password" name="password" id="passwd" required><br><br>
            <label for="passwd_ag">Jelszó megerősítése:</label><br>
            <input type="password" name="password_confirmation" id="passwd_ag" required><br><br>
            <button type="submit">Regisztráció</button>
        </form>
    </div>
    
    @if (session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif

    @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
    @endif
</body>
</html>