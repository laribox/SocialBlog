@extends('partials.dashboard.main')

@section('content')
<div class="   mt-8 p-6 bg-white rounded-lg shadow-md  overflow-y-scroll  mx-auto h-[750px] ">
    <h1 class="text-3xl font-bold mb-6 text-center col-span-2">Create a New Post</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST"  enctype="multipart/form-data" class="grid grid-cols-4 gap-4">
        @csrf
        @method('PUT')
        <div class="mb-6 col-span-4">
            <label for="title" class="block text-sm font-semibold mb-2">Title</label>
            <input id="title" name="title" type="text" placeholder="Enter title" required value="{{ $post->title }}"
                class="w-full px-4 py-2 rounded-lg shadow-md focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-6 col-span-2">
            <label for="body" class="block text-sm font-semibold mb-2">Body</label>
            <textarea id="body" name="body" rows="10" placeholder="Enter body" required
                class="w-full px-4 py-2 rounded-lg shadow-md focus:outline-none focus:shadow-outline" >{{ $post->body }}</textarea>
        </div>
        <div class="mb-6 col-span-2 content-center">
            <label for="image" class="block text-sm font-semibold mb-2 mx-auto">Current Image</label>
            <img src="{{ $post->image }}" alt="image" class=" px-4 py-2 rounded-lg shadow-md focus:outline-none focus:shadow-outline h-64">
        </div>
        <div class="mb-6 col-span-4">
            <label for="image" class="block text-sm font-semibold mb-2">Image</label>
            <input id="image" name="image" type="file" accept="image/*"
                class="w-full px-4 py-2 rounded-lg shadow-md focus:outline-none focus:shadow-outline">
        </div>

        <div class="col-span-4 flex justify-center">
            <button type="submit"
                    class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:shadow-outline">
                Update Post
            </button>
        </div>
    </form>
</div>
@endsection

