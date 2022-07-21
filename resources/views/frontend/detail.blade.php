@extends('frontend.layout')
@section('content')
<!-- Section 1 -->
<section class="flex items-center justify-center py-10 text-white bg-white sm:py-16 md:py-24 lg:py-32">
    <div class="relative container px-10 text-center text-white auto lg:px-0">
        <div class="flex flex-col w-full md:flex-row">

            <!-- Top Text -->
            <div class="flex justify-between">
                <h1 class="relative flex flex-col text-6xl font-extrabold text-left text-black">
                    {{ $data['title'] }}
                    <span>{{ $data['tagline'] }}</span>
                </h1>
            </div>
            <!-- Right Image -->
            <div class="relative mx-auto top-0 right-0 h-64 mt-12 md:-mt-16 md:absolute md:h-96">
                <img src="https://www.themoviedb.org/t/p/w220_and_h330_face/{{ $data['poster_path'] }}"
                    class="object-cover mt-3 mr-5 h-full lg:h-60 rounded">
                <span class="px-1 py-1.5 bg-green-500 rounded text-sm">{{ \Str::upper($data['status']) }}</span>
            </div>
        </div>

        <!-- Separator -->
        <div class="my-16 border-b border-gray-300 lg:my-24"></div>

        <!-- Bottom Text -->
        <h2 class="text-left text-gray-500 xl:text-xl mb-4">
            {{ $data['overview'] }}
        </h2>

        <p class="text-left text-gray-600">
            <span class="font-semibold">Genre :</span>
            @foreach($data['genres'] as $genre)
            {{ \Str::replace('"', '', json_encode($genre['name'])) }}
            @if(!$loop->last)
            |
            @endif
            @endforeach
        </p>
        <p class="text-left text-gray-600">
            <span class="font-semibold">Duration :</span>
            {{ $data['runtime'] }} Minutes
        </p>
        <p class="text-left text-gray-600">
            <span class="font-semibold">Release Date :</span>
            {{ $data['release_date'] }}
        </p>
        <p class="text-left text-gray-600">
            <span class="font-semibold">Budget :</span>
            ${{ number_format($data['budget']) }}
        </p>
        <p class="text-left text-gray-600">
            <span class="font-semibold">Revenue :</span>
            ${{ number_format($data['revenue']) }}
        </p>
        <p class="text-left text-gray-600">
            <span class="font-semibold">Vote :</span>
            {{ $data['vote_average'] }} / {{ number_format($data['vote_count']) }} Votes
        </p>
    </div>
</section>
@endsection
