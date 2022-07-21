<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\MovieStoreRequest;
use App\Http\Requests\MovieUpdateRequest;

class MovieController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Movie::class);

        $search = $request->get('search', '');

        $movies = Movie::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.movies.index', compact('movies', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Movie::class);

        return view('app.movies.create');
    }

    /**
     * @param \App\Http\Requests\MovieStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieStoreRequest $request)
    {
        $this->authorize('create', Movie::class);

        $validated = $request->validated();
        if ($request->hasFile('backdrop_path')) {
            $validated['backdrop_path'] = $request
                ->file('backdrop_path')
                ->store('public');
        }

        if ($request->hasFile('poster_path')) {
            $validated['poster_path'] = $request
                ->file('poster_path')
                ->store('public');
        }

        $movie = Movie::create($validated);

        return redirect()
            ->route('movies.edit', $movie)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Movie $movie)
    {
        $this->authorize('view', $movie);

        return view('app.movies.show', compact('movie'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Movie $movie)
    {
        $this->authorize('update', $movie);

        return view('app.movies.edit', compact('movie'));
    }

    /**
     * @param \App\Http\Requests\MovieUpdateRequest $request
     * @param \App\Models\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function update(MovieUpdateRequest $request, Movie $movie)
    {
        $this->authorize('update', $movie);

        $validated = $request->validated();
        if ($request->hasFile('backdrop_path')) {
            if ($movie->backdrop_path) {
                Storage::delete($movie->backdrop_path);
            }

            $validated['backdrop_path'] = $request
                ->file('backdrop_path')
                ->store('public');
        }

        if ($request->hasFile('poster_path')) {
            if ($movie->poster_path) {
                Storage::delete($movie->poster_path);
            }

            $validated['poster_path'] = $request
                ->file('poster_path')
                ->store('public');
        }

        $movie->update($validated);

        return redirect()
            ->route('movies.edit', $movie)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Movie $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Movie $movie)
    {
        $this->authorize('delete', $movie);

        if ($movie->backdrop_path) {
            Storage::delete($movie->backdrop_path);
        }

        if ($movie->poster_path) {
            Storage::delete($movie->poster_path);
        }

        $movie->delete();

        return redirect()
            ->route('movies.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
