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
        <a href=""></a>
    </nav>

    <div class="container">
        <h1>{{ config('app.name') }}</h1>

        <div class="wrapper">
            @foreach ($genres as $genre)
            <a class="links genre" href="movies?genre={{$genre->label}}">
                <div class="content genre">
                    <h1>{{$genre->label}}</h1>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</body>
</html>
