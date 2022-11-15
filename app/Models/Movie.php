<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Movie extends Model
{
    use HasFactory, Sortable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'movies';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public $sortable = ['startDate', 'averageRating'];

    /**
     * The genres that belong to the movie.
     */
    public function genre()
    {
        return $this->belongsToMany(Genres::class, 'movies_genres', 'movie_id', 'genre_id');
    }
}
