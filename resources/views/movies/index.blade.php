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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
        <h1>{{ config('app.name') }}</h1>

        @sortablelink('startYear', 'Année de parution')<br>
        @sortablelink('averageRating', 'Note moyenne')

        <form action="" method="get">
            <select name="genre" onchange="this.form.submit()">
                @foreach ($genres as $genre)
                    <option value="{{$genre->label}}">{{$genre->label}}</option>                    
                @endforeach
            </select>
        </form>

        <div class="wrapper">
            @foreach ($movies as $movie)
            <div class="content">
                <h1>{{$movie->originalTitle}}</h1>
                <img src="{{ $movie->poster }}" alt="{{ $movie->primaryTitle }}">
                <div class="data">
                    <h4>Date de parution : {{ $movie->startYear }}</h4>
                    <h4>Evaluation : {{ $movie->averageRating }} / 10</h4>
                </div>
                <a href="/movies/{{ $movie->id }}">En savoir plus</a>
            </div>
            @endforeach
        </div>
        <div class="paginator">
            {!! $movies->links() !!}
        </div>
    </div>
</body>
</html>
