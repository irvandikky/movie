@php $editing = isset($movie) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full lg:w-6/12">
        <div
            x-data="imageViewer('{{ $editing && $movie->backdrop_path ? \Storage::url($movie->backdrop_path) : '' }}')"
        >
            <x-inputs.partials.label
                name="backdrop_path"
                label="Backdrop Path"
            ></x-inputs.partials.label
            ><br />

            <!-- Show the image -->
            <template x-if="imageUrl">
                <img
                    :src="imageUrl"
                    class="object-cover rounded border border-gray-200"
                    style="width: 100px; height: 100px;"
                />
            </template>

            <!-- Show the gray box when image is not available -->
            <template x-if="!imageUrl">
                <div
                    class="border rounded border-gray-200 bg-gray-100"
                    style="width: 100px; height: 100px;"
                ></div>
            </template>

            <div class="mt-2">
                <input
                    type="file"
                    name="backdrop_path"
                    id="backdrop_path"
                    @change="fileChosen"
                />
            </div>

            @error('backdrop_path') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <div
            x-data="imageViewer('{{ $editing && $movie->poster_path ? \Storage::url($movie->poster_path) : '' }}')"
        >
            <x-inputs.partials.label
                name="poster_path"
                label="Poster Path"
            ></x-inputs.partials.label
            ><br />

            <!-- Show the image -->
            <template x-if="imageUrl">
                <img
                    :src="imageUrl"
                    class="object-cover rounded border border-gray-200"
                    style="width: 100px; height: 100px;"
                />
            </template>

            <!-- Show the gray box when image is not available -->
            <template x-if="!imageUrl">
                <div
                    class="border rounded border-gray-200 bg-gray-100"
                    style="width: 100px; height: 100px;"
                ></div>
            </template>

            <div class="mt-2">
                <input
                    type="file"
                    name="poster_path"
                    id="poster_path"
                    @change="fileChosen"
                />
            </div>

            @error('poster_path') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.textarea
            name="overview"
            label="Overview"
            maxlength="255"
            required
            >{{ old('overview', ($editing ? $movie->overview : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.date
            name="release_date"
            label="Release Date"
            value="{{ old('release_date', ($editing ? optional($movie->release_date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.text
            name="title"
            label="Title"
            value="{{ old('title', ($editing ? $movie->title : '')) }}"
            maxlength="255"
            placeholder="Title"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.text
            name="original_title"
            label="Original Title"
            value="{{ old('original_title', ($editing ? $movie->original_title : '')) }}"
            maxlength="255"
            placeholder="Original Title"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.text
            name="original_language"
            label="Original Language"
            value="{{ old('original_language', ($editing ? $movie->original_language : '')) }}"
            maxlength="255"
            placeholder="Original Language"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-4/12">
        <x-inputs.number
            name="popularity"
            label="Popularity"
            value="{{ old('popularity', ($editing ? $movie->popularity : '0')) }}"
            max="255"
            step="0.01"
            placeholder="Popularity"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-4/12">
        <x-inputs.number
            name="vote_count"
            label="Vote Count"
            value="{{ old('vote_count', ($editing ? $movie->vote_count : '0')) }}"
            max="255"
            placeholder="Vote Count"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-4/12">
        <x-inputs.number
            name="vote_average"
            label="Vote Average"
            value="{{ old('vote_average', ($editing ? $movie->vote_average : '0')) }}"
            max="255"
            step="0.01"
            placeholder="Vote Average"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.checkbox
            name="adult"
            label="Adult"
            :checked="old('adult', ($editing ? $movie->adult : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>

    <x-inputs.group class="w-full lg:w-6/12">
        <x-inputs.checkbox
            name="video"
            label="Video"
            :checked="old('video', ($editing ? $movie->video : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>
</div>
