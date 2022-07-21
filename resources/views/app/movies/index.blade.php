<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.movies.index_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <div class="mb-5 mt-4">
                    <div class="flex flex-wrap justify-between">
                        <div class="md:w-1/2">
                            <form>
                                <div class="flex items-center w-full">
                                    <x-inputs.text
                                        name="search"
                                        value="{{ $search ?? '' }}"
                                        placeholder="{{ __('crud.common.search') }}"
                                        autocomplete="off"
                                    ></x-inputs.text>

                                    <div class="ml-1">
                                        <button
                                            type="submit"
                                            class="button button-primary"
                                        >
                                            <i class="icon ion-md-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="md:w-1/2 text-right">
                            @can('create', App\Models\Movie::class)
                            <a
                                href="{{ route('movies.create') }}"
                                class="button button-primary"
                            >
                                <i class="mr-1 icon ion-md-add"></i>
                                @lang('crud.common.create')
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="block w-full overflow-auto scrolling-touch">
                    <table class="w-full max-w-full mb-4 bg-transparent">
                        <thead class="text-gray-700">
                            <tr>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.movies.inputs.backdrop_path')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.movies.inputs.poster_path')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.movies.inputs.overview')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.movies.inputs.release_date')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.movies.inputs.title')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.movies.inputs.original_title')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.movies.inputs.original_language')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.movies.inputs.genre_ids')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.movies.inputs.popularity')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.movies.inputs.vote_count')
                                </th>
                                <th class="px-4 py-3 text-right">
                                    @lang('crud.movies.inputs.vote_average')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.movies.inputs.adult')
                                </th>
                                <th class="px-4 py-3 text-left">
                                    @lang('crud.movies.inputs.video')
                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @forelse($movies as $movie)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-left">
                                    <x-partials.thumbnail
                                        src="{{ $movie->backdrop_path ? \Storage::url($movie->backdrop_path) : '' }}"
                                    />
                                </td>
                                <td class="px-4 py-3 text-left">
                                    <x-partials.thumbnail
                                        src="{{ $movie->poster_path ? \Storage::url($movie->poster_path) : '' }}"
                                    />
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $movie->overview ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $movie->release_date ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $movie->title ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $movie->original_title ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $movie->original_language ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $item->genres->id }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $movie->popularity ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $movie->vote_count ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-right">
                                    {{ $movie->vote_average ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $movie->adult ?? '-' }}
                                </td>
                                <td class="px-4 py-3 text-left">
                                    {{ $movie->video ?? '-' }}
                                </td>
                                <td
                                    class="px-4 py-3 text-center"
                                    style="width: 134px;"
                                >
                                    <div
                                        role="group"
                                        aria-label="Row Actions"
                                        class="
                                            relative
                                            inline-flex
                                            align-middle
                                        "
                                    >
                                        @can('update', $movie)
                                        <a
                                            href="{{ route('movies.edit', $movie) }}"
                                            class="mr-1"
                                        >
                                            <button
                                                type="button"
                                                class="button"
                                            >
                                                <i
                                                    class="icon ion-md-create"
                                                ></i>
                                            </button>
                                        </a>
                                        @endcan @can('view', $movie)
                                        <a
                                            href="{{ route('movies.show', $movie) }}"
                                            class="mr-1"
                                        >
                                            <button
                                                type="button"
                                                class="button"
                                            >
                                                <i class="icon ion-md-eye"></i>
                                            </button>
                                        </a>
                                        @endcan @can('delete', $movie)
                                        <form
                                            action="{{ route('movies.destroy', $movie) }}"
                                            method="POST"
                                            onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                                        >
                                            @csrf @method('DELETE')
                                            <button
                                                type="submit"
                                                class="button"
                                            >
                                                <i
                                                    class="
                                                        icon
                                                        ion-md-trash
                                                        text-red-600
                                                    "
                                                ></i>
                                            </button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="14">
                                    @lang('crud.common.no_items_found')
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="14">
                                    <div class="mt-10 px-4">
                                        {!! $movies->render() !!}
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>
