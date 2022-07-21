<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Movie;
use App\Models\Genre;

class TMDB
{
    protected $host;
    protected $key;

    public function __construct()
    {
        $this->host = env('TMDB_HOST');
        $this->key = env('TMDB_KEY');
    }

    public function generate($page = 10) {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Movie::truncate();
        $this->getGenre();
        $this->getNowPlaying($page);
        $this->getPopular($page);
        $this->getTopRated($page);
        $this->getUpComing($page);
    }

    public function getGenre()
    {
        $request = Http::get($this->host . '/genre/movie/list', [
            'api_key' => $this->key,
        ]);
        if ($request->successful()) {
            $data = $request->json();
            try {
                DB::beginTransaction();
                Genre::insert($data['genres']);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
            }
        }
    }

    public function getNowPlaying($page)
    {
        for ($i = 0; $i < $page; $i++) {
            $request = Http::get($this->host . '/movie/now_playing', [
                'api_key' => $this->key,
                'page' => $i + 1
            ]);

            if ($request->successful()) {
                $data = $request->json();
                try {
                    DB::beginTransaction();
                    for ($j = 0; $j < count($data['results']); $j++) {
                        $data['results'][$j]['movie_id'] = $data['results'][$j]['id'];
                        $data['results'][$j]['genre_ids'] = json_encode($data['results'][$j]['genre_ids']);
                        $data['results'][$j]['created_at'] = now();
                        $data['results'][$j]['updated_at'] = now();
                        $movie = Movie::create($data['results'][$j]);
                        $movie->categories()->attach(1);
                    }
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                }
            }
        }
    }

    public function getPopular($page)
    {
        for ($i = 0; $i < $page; $i++) {
            $request = Http::get($this->host . '/movie/popular', [
                'api_key' => $this->key,
                'page' => $i + 1
            ]);

            if ($request->successful()) {
                $data = $request->json();
                try {
                    DB::beginTransaction();
                    for ($j = 0; $j < count($data['results']); $j++) {
                        $data['results'][$j]['movie_id'] = $data['results'][$j]['id'];
                        $data['results'][$j]['genre_ids'] = json_encode($data['results'][$j]['genre_ids']);
                        $data['results'][$j]['created_at'] = now();
                        $data['results'][$j]['updated_at'] = now();
                        $movie = Movie::create($data['results'][$j]);
                        $movie->categories()->attach(2);
                    }
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                }
            }
        }
    }

    public function getTopRated($page)
    {
        for ($i = 0; $i < $page; $i++) {
            $request = Http::get($this->host . '/movie/top_rated', [
                'api_key' => $this->key,
                'page' => $i + 1
            ]);

            if ($request->successful()) {
                $data = $request->json();
                try {
                    DB::beginTransaction();
                    for ($j = 0; $j < count($data['results']); $j++) {
                        $data['results'][$j]['movie_id'] = $data['results'][$j]['id'];
                        $data['results'][$j]['genre_ids'] = json_encode($data['results'][$j]['genre_ids']);
                        $data['results'][$j]['created_at'] = now();
                        $data['results'][$j]['updated_at'] = now();
                        $movie = Movie::create($data['results'][$j]);
                        $movie->categories()->attach(3);
                    }
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                }
            }
        }
    }

    public function getUpComing($page)
    {
        for ($i = 0; $i < $page; $i++) {
            $request = Http::get($this->host . '/movie/upcoming', [
                'api_key' => $this->key,
                'page' => $i + 1
            ]);

            if ($request->successful()) {
                $data = $request->json();
                try {
                    DB::beginTransaction();
                    for ($j = 0; $j < count($data['results']); $j++) {
                        $data['results'][$j]['movie_id'] = $data['results'][$j]['id'];
                        $data['results'][$j]['genre_ids'] = json_encode($data['results'][$j]['genre_ids']);
                        $data['results'][$j]['created_at'] = now();
                        $data['results'][$j]['updated_at'] = now();
                        $movie = Movie::create($data['results'][$j]);
                        $movie->categories()->attach(4);
                    }
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                }
            }
        }
    }

}
