<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Requests\GenreStoreRequest;
use App\Http\Requests\GenreUpdateRequest;

class GenreController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Genre::class);

        $search = $request->get('search', '');

        $genres = Genre::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.genres.index', compact('genres', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Genre::class);

        return view('app.genres.create');
    }

    /**
     * @param \App\Http\Requests\GenreStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenreStoreRequest $request)
    {
        $this->authorize('create', Genre::class);

        $validated = $request->validated();

        $genre = Genre::create($validated);

        return redirect()
            ->route('genres.edit', $genre)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Genre $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Genre $genre)
    {
        $this->authorize('view', $genre);

        return view('app.genres.show', compact('genre'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Genre $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Genre $genre)
    {
        $this->authorize('update', $genre);

        return view('app.genres.edit', compact('genre'));
    }

    /**
     * @param \App\Http\Requests\GenreUpdateRequest $request
     * @param \App\Models\Genre $genre
     * @return \Illuminate\Http\Response
     */
    public function update(GenreUpdateRequest $request, Genre $genre)
    {
        $this->authorize('update', $genre);

        $validated = $request->validated();

        $genre->update($validated);

        return redirect()
            ->route('genres.edit', $genre)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Genre $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Genre $genre)
    {
        $this->authorize('delete', $genre);

        $genre->delete();

        return redirect()
            ->route('genres.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
