@props(['post'])
<tr >
    <td class="px-8 ">
      <label>
        <input type="checkbox" class="checkbox" />
      </label>
      {{$post->id}}
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
