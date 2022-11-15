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
    
    <div class="container">
        <h1>{{ $movie->originalTitle }}</h1>
        <div class="single_wrapper">
            <div class="content">
                <img src="{{ $movie->poster }}" alt="{{ $movie->primaryTitle }}">
                <div class="data">
                    <h4>Date de parution : {{ $movie->startYear }}</h4>
                    <h4>Evaluation : {{ $movie->averageRating }} / 10</h4>
                </div>
                <h2>Résumé :</h2>
                <p>{{$movie->plot}}</p>
                <div class="genres">
                    @foreach ($movie->genre as $genre)
                        <div class="genre">
                            {{$genre->label}} 
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>
