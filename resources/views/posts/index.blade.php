@extends('partials.dashboard.main')

@section('content')
<div class=" p-6 bg-white rounded-lg shadow-md   overflow-y-scroll  mx-auto h-[750px]"  >
    <h1 class="text-3xl font-bold mb-6 text-center">All Posts</h1>
    <span class="text-gray-400 font-bold"><a href="{{ route('posts.create') }}"> <i class="material-icons text-green-600 ">add</i></a></span>


    <div class="overflow-x-auto min-w-max">
        <form action="{{ route('posts.index') }}" method="GET">
        <div class="mt-6 relative text-gray-600 mb-4 px-1">
            <input class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" type="search" name="search" placeholder="Search" />
            <button class="absolute right-3 top-3 focus:outline-none" type="submit">
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </div>
        </form>

        <table class="table border-collapse border w-full border-gray-500 ">
          <!-- head -->
          <thead  >
            <tr class="border border-gray-500 ">
              <th class="border-gray-500">
                <label>
                  <input type="checkbox" class="checkbox" />
                </label>
              </th>
              <th class="border-gray-500 " >Image</th>
              <th>Title</th>

              <th></th>
            </tr>
          </thead>
          <tbody >
            <!-- row 1 -->
            @foreach ($posts as $post)
                <x-post :post="$post" />
            @endforeach

          </tbody>
          <!-- foot -->
          <tfoot>
            <tr>
              <th></th>
              <th>Name</th>
              <th>Job</th>
              <th>Favorite Color</th>
              <th></th>
            </tr>
          </tfoot>

        </table>
        <div class="mt-6 p-4  ">
            {{ $posts->links('vendor.pagination.simple-tailwind') }}
        </div>
    </div>

</div>
@endsection

