@php $editing = isset($category) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $category->name : '')) }}"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    @if($editing)
    <div class="px-4 my-4">
        <h4 class="font-bold text-lg text-gray-700">
            Assign @lang('crud.movies.name')
        </h4>

        <div class="py-2">
            @foreach ($movies as $movie)
            <div>
                <x-inputs.checkbox
                    id="movie{{ $movie->id }}"
                    name="movies[]"
                    label="{{ ucfirst($movie->title) }}"
                    value="{{ $movie->id }}"
                    :checked="isset($category) ? $category->movies()->where('id', $movie->id)->exists() : false"
                    :add-hidden-value="false"
                ></x-inputs.checkbox>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
