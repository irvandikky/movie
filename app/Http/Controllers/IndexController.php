<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IndexController extends Controller
{
    public function index()
    {
        $now = Category::with('movies')->findOrFail(1);
        $popular = Category::with('movies')->findOrFail(2);
        $top = Category::with('movies')->findOrFail(3);
        $upcoming = Category::with('movies')->findOrFail(4);
        return view('frontend.index', ['now' => $now, 'popular' => $popular, 'top' => $top, 'upcoming' => $upcoming]);
    }

    public function category($category, $movie = null)
    {
        $cat = Category::with('movies')->findOrFail($category);
        if (!is_null($movie)) {
            $data = $cat->movies->where('id', $movie)->firstOrFail();
            $req = Http::get(env('TMDB_HOST') . '/movie/' . $data->movie_id, [
                'api_key' => env('TMDB_KEY'),
            ]);
            if ($req->successful()) {
                $data = $req->json();
            }
            return view('frontend.detail', ['data' => $data]);
        }
        return view('frontend.category', ['data' => $cat]);
    }
}
