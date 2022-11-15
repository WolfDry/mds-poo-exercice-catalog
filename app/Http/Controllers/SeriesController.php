<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;
use App\Models\Episode;
use Illuminate\Database\Eloquent\Builder;

class SeriesController extends Controller
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
        // $movie = Series::find($id);

        // return view('movies/movie', ['movie' => $movie]);
    }

    public function list()
    {

        if (request('page')) {
            if (request('orderBy') || request('order'))
                $list = Series::orderBy(request('orderBy'), request('order'))->simplePaginate(20);
            else
                $list = Series::simplePaginate(20);
        } elseif (request('orderBy') || request('order'))
            $list = Series::orderBy(request('orderBy'), request('order'))->simplePaginate(20);
        else
            $list = Series::simplePaginate(20);

        // if ($request->getRequestUri() == "/movies")
        //     $movies = Movie::orderBy('primaryTitle')->paginate(20);
        // else
        //     $movies = Movie::sortable()->paginate(20);

        // $genres = Genres::orderBy('label')->get();

        // if (request('genre')) {

        //     $genre = Genres::where('label', request('genre'))->first();
        //     $genre_id = $genre->id;
        //     $movies = Movie::whereHas('genre', function (Builder $movieQuery) use ($genre_id) {
        //         $movieQuery->where('genre_id', $genre_id);
        //     })->orderBy('originalTitle')->simplePaginate(20);
        // }

        return view('series/index', ['series' => $list]);
    }

    public function random()
    {
        $serie = Series::inRandomOrder()->first();

        return view('series/random', ['serie' => $serie]);
    }
}
