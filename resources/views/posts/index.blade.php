@extends('partials.dashboard.main')

@section('content')
<div class=" p-6 bg-white rounded-lg shadow-md   overflow-y-scroll  mx-auto h-[750px]"  >
    <h1 class="text-3xl font-bold mb-6 text-center">All Posts</h1>
    <span class="text-gray-400 font-bold"><a href="{{ route('posts.create') }}"> <i class="material-icons text-green-600 ">add</i></a></span>
    <div class="overflow-x-auto min-w-max">
        <table class="table border-collapse border w-full border-gray-500 ">
          <!-- head -->
          <thead  >
            <tr class="border border-gray-500">
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
      </div>

</div>
@endsection

