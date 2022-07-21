@extends('frontend.layout')
@section('content')

<!-- Section 2 -->
<section class="py-12 sm:py-16 bg-white">
    <div class="max-w-7xl px-10 mx-auto sm:text-center">
        <h2 class="font-bold text-3xl sm:text-4xl lg:text-5xl mt-3">{{ $data->name }}</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 my-12 sm:my-16">
            @foreach ($data->movies as $key => $value)
            <a href="{{ route('detail', [$data->id, $value->id]) }}"  class="rounded-lg py-10 flex flex-col items-center justify-center shadow-lg border border-gray-100">
                <img src="https://www.themoviedb.org/t/p/w220_and_h330_face/{{ $value->poster_path }}" alt="">
                <p class="font-bold mt-4">{{ $value->title }}</p>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endsection
