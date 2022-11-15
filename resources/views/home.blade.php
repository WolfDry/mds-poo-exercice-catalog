<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css" >

</head>
<body>
    <nav>
        <a href="/">Accueil</a>
        <a href="genres">Genres</a>
        <a href="movies">Movies</a>
        <a href="movies/random">Random movie</a>
    </nav>

    <h1>{{ config('app.name') }}</h1>
    
    <div class="container">
        <div class="content">
            <h1>Random movie</h1>
            <h1>{{ $random->originalTitle }}</h1>
            <img src="{{ $random->poster }}" alt="{{ $random->primaryTitle }}">
        </div>
        <div class="wrapper">
            @foreach ($movies as $movie)
            <div class="content">
            <h1>{{$movie->originalTitle}}</h1>
            <img src="{{ $movie->poster }}" alt="{{ $movie->primaryTitle }}">
            <h2>Résumé :</h2>
            <p>{{$movie->plot}}</p>
            <a href="/movie/{{ $movie->id }}">En savoir plus</a>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
