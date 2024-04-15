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
            <tr >
              <td class="px-8 ">
                <label>
                  <input type="checkbox" class="checkbox" />
                </label>
              </td>

              <td class="px-4 ">
                <div class="flex items-center gap-3">
                  <div class="avatar">
                    <div class="mask mask-squircle w-12 h-12">
                      <img src=" {{ $post->image }}" alt="Avatar Tailwind CSS Component" class="w-10 h-10" />
                    </div>
                  </div>
                </div>
              </td>


              <td>
                {{ $post->title }}
              </td>

              <th class="px-2">
                <a  class="px-2" href="{{ route('posts.show', $post->id) }}">details</a>
                <a  class="px-2" href="{{ route('posts.edit', $post->id) }}">edit</a>
              </th>
            </tr>
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

