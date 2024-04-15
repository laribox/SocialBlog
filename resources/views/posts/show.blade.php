@extends('partials.dashboard.main')

@section('content')
<div class="   mt-8 p-6 bg-white rounded-lg shadow-md  overflow-y-scroll ">

<div class="max-w-screen-lg mx-auto px-4 py-16">
    <h1 class="text-4xl mb-8 font-bold">{{ $post->title }}</h1>

    <div class="flex items-center mb-4">
        <img src="https://picsum.photos/50" class="w-12 h-12 rounded-full mr-4">
        <div>
            <h2 class="text-xl font-bold mb-2">{{ $post->user->name }}</h2>
            <p>{{ $post->created_at->format('d M Y') }}</p>
        </div>
    </div>

    <p class="text-xl leading-loose">{{ $post->body }}</p>
</div>
</div>
@endsection
