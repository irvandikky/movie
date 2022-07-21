<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'movie_id',
        'poster_path',
        'backdrop_path',
        'adult',
        'overview',
        'release_date',
        'original_title',
        'original_language',
        'title',
        'genre_ids',
        'popularity',
        'vote_count',
        'video',
        'vote_average',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'adult' => 'boolean',
        'release_date' => 'date',
        'genre_ids' => 'array',
        'video' => 'boolean',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
