<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Series;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('q');

        // Search in the title and body columns from the posts table
        $serie = Series::query()
            ->where('originalTitle', 'LIKE', "%{$search}%")
            ->get();
        $movie = Movie::query()
            ->where('originalTitle', 'LIKE', "%{$search}%")
            ->get();

        // Return the search view with the resluts compacted
        return view('search', ['series' => $serie, 'movies' => $movie]);
    }
}
