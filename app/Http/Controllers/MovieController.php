<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Builder;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::find($id);

        return view('movies/movie', ['movie' => $movie]);
    }

    public function list(?Request $request)
    {

        if ($request->getRequestUri() == "/movies")
            $movies = Movie::orderBy('primaryTitle')->paginate(20);
        else
            $movies = Movie::sortable()->paginate(20);

        $genres = Genres::orderBy('label')->get();

        if (request('genre')) {

            $genre = Genres::where('label', request('genre'))->first();
            $genre_id = $genre->id;
            $movies = Movie::whereHas('genre', function (Builder $movieQuery) use ($genre_id) {
                $movieQuery->where('genre_id', $genre_id);
            })->orderBy('originalTitle')->simplePaginate(20);
        }

        return view('movies/index', ['movies' => $movies, 'genres' => $genres]);
    }

    public function random()
    {
        $movie = Movie::inRandomOrder()->first();

        return view('movies/random', ['movie' => $movie]);
    }
}
