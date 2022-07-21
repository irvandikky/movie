@extends('frontend.layout')
@section('content')

<!-- Section 2 -->
<section class="py-12 sm:py-16 bg-white">
    <div class="max-w-7xl px-10 mx-auto sm:text-center">
        <h2 class="font-bold text-3xl sm:text-4xl lg:text-5xl mt-3">Now Playing</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 my-12 sm:my-16">
            @foreach ($now->movies->take(10) as $key => $value)
            <a href="{{ route('detail', [$now->id, $value->id]) }}"  class="rounded-lg py-10 flex flex-col items-center justify-center shadow-lg border border-gray-100">
                <img src="https://www.themoviedb.org/t/p/w220_and_h330_face/{{ $value->poster_path }}" alt="">
                <p class="font-bold mt-4">{{ $value->title }}</p>
            </a>
            @endforeach
        </div>
        <a href="/1"
            class="px-8 py-4 sm:w-auto w-full text-center text-base font-medium inline-block rounded text-white hover:bg-blue-600 bg-blue-500">Browse All</a>
    </div>
</section>
<section class="py-12 sm:py-16 bg-white">
    <div class="max-w-7xl px-10 mx-auto sm:text-center">
        <h2 class="font-bold text-3xl sm:text-4xl lg:text-5xl mt-3">Popular</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 my-12 sm:my-16">
            @foreach ($popular->movies->take(8) as $key => $value)
            <a href="{{ route('detail', [$popular->id, $value->id]) }}"  class="rounded-lg py-10 flex flex-col items-center justify-center shadow-lg border border-gray-100">
                <img src="https://www.themoviedb.org/t/p/w220_and_h330_face/{{ $value->poster_path }}" alt="">
                <p class="font-bold mt-4">{{ $value->title }}</p>
            </a>
            @endforeach
        </div>
        <a href="/2"
            class="px-8 py-4 sm:w-auto w-full text-center text-base font-medium inline-block rounded text-white hover:bg-blue-600 bg-blue-500">Browse All</a>
    </div>
</section>
<section class="py-12 sm:py-16 bg-white">
    <div class="max-w-7xl px-10 mx-auto sm:text-center">
        <h2 class="font-bold text-3xl sm:text-4xl lg:text-5xl mt-3">Top Rated</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 my-12 sm:my-16">
            @foreach ($top->movies->take(8) as $key => $value)
            <a href="{{ route('detail', [$top->id, $value->id]) }}"  class="rounded-lg py-10 flex flex-col items-center justify-center shadow-lg border border-gray-100">
                <img src="https://www.themoviedb.org/t/p/w220_and_h330_face/{{ $value->poster_path }}" alt="">
                <p class="font-bold mt-4">{{ $value->title }}</p>
            </a>
            @endforeach
        </div>
        <a href="/3"
            class="px-8 py-4 sm:w-auto w-full text-center text-base font-medium inline-block rounded text-white hover:bg-blue-600 bg-blue-500">Browse All</a>
    </div>
</section>
<section class="py-12 sm:py-16 bg-white">
    <div class="max-w-7xl px-10 mx-auto sm:text-center">
        <h2 class="font-bold text-3xl sm:text-4xl lg:text-5xl mt-3">Up Coming</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 my-12 sm:my-16">
            @foreach ($upcoming->movies->take(8) as $key => $value)
            <a href="{{ route('detail', [$upcoming->id, $value->id]) }}"  class="rounded-lg py-10 flex flex-col items-center justify-center shadow-lg border border-gray-100">
                <img src="https://www.themoviedb.org/t/p/w220_and_h330_face/{{ $value->poster_path }}" alt="">
                <p class="font-bold mt-4">{{ $value->title }}</p>
            </a>
            @endforeach
        </div>
        <a href="/4"
            class="px-8 py-4 sm:w-auto w-full text-center text-base font-medium inline-block rounded text-white hover:bg-blue-600 bg-blue-500">Browse All</a>
    </div>
</section>
@endsection
