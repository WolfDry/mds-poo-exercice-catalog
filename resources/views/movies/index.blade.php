<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        *{
            margin: 0;
            padding: 0;
            /* border: red 1px solid; */
        }
        .container {
            margin: auto;
            max-width: 80vw;
        }

        .wrapper {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            justify-content: center;
        }

        .content{
            display: flex;
            flex-direction: column;
            /* justify-content: space-between; */
            align-items: center;
            width: 30vw;
            height: 70vh;
            margin: 20px;
        }
        
        .content p{
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ config('app.name') }}</h1>

        <div class="wrapper">
            @foreach ($movies as $movie)
            <div class="content">
                <h1>{{$movie->originalTitle}}</h1>
                <a href="/movie/{{ $movie->id }}">
                    <img src="{{ $movie->poster }}" alt="{{ $movie->primaryTitle }}">
                </a>
                <h2>Résumé :</h2>
                <p>{{$movie->plot}}</p>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
