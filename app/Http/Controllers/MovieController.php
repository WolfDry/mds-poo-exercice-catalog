<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

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

        return view('movie', ['movie' => $movie]);
    }

    public function list(?Request $request)
    {

        if ($request->getRequestUri() == "/movies")
            $movies = Movie::orderBy('primaryTitle')->simplePaginate(20);
        else
            $movies = Movie::sortable()->paginate(20);

        return view('movies/index', ['movies' => $movies]);
    }
}
