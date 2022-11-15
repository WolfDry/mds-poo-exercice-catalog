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
        <a href="/genres">Genres</a>
        <a href="/movies">Movies</a>
        <a href="/movies/random">Random movie</a>
        <a href="/series">Series</a>
        <a href="/series/random">Random serie</a>
    </nav>
    
    <div class="container">
        <h1>{{ $serie->originalTitle }}</h1>
        <div class="single_wrapper">
            <div class="content">
                @if ($episode->poster)
                    <img src="{{ $episode->poster }}" alt="{{ $episode->primaryTitle }}">
                @endif
                <div class="data">
                    <h4>Date de parution : {{ $episode->startYear }}</h4>
                    <h4>Evaluation : {{ $episode->averageRating }} / 10</h4>
                </div>
                <h2>Résumé :</h2>
                <p>{{$episode->plot}}</p>
            </div>
        </div>
    </div>
</body>
</html>
