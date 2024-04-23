@extends('partials.dashboard.main')

@section('content')
<div class=" mt-8 p-6 bg-white rounded-lg shadow-md  overflow-y-scroll h-[750px]">

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
    <div>
        <button id="addComment">
            <i class="material-icons text-green-600" >{{ $post->comments_count }} add</i>
        </button>


        <script>

            document.getElementById('addComment').addEventListener('click', function() {

                const dialog = document.createElement('dialog')
                dialog.innerHTML = `<form class="grid grid-cols-1 ">
                    <label for="commentBody" class="block text-sm font-semibold mb-2 center">Comment body</label>
                    <textarea class=" px-4 py-2 rounded-lg shadow-md focus:outline-none focus:shadow-outline mb-2 border border-gray-300" name="commentBody" id="commentBody" cols="30" rows="2"></textarea>
                    <button type="submit" class="mx-2 py-3 mb-2 bg-blue-500 text-white text-center content-center font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:shadow-outline">Add comment</button>
                </form>`
                document.body.appendChild(dialog)
                dialog.showModal()
                dialog.querySelector('form').addEventListener('submit', function(event) {
                    event.preventDefault()
                    const commentBody = dialog.querySelector('#commentBody').value
                    const postId = {{ $post->id }}
                    const token =  '{{ csrf_token() }}'
                    const user_id = '{{ Auth::user()->id }}'

                    fetch(`{{ route('comments.store') }}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token
                        },
                        body: JSON.stringify({ body: commentBody, post_id: postId, user_id: user_id })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(token , postId, commentBody);
                        console.log(data)

                        const comment = document.createElement('div')
                        comment.innerHTML = `<div class="bg-gray-100 p-4 rounded-lg mb-4" >
                            <div class="flex items-center mb-4">
                                <img src="https://picsum.photos/50" class="w-12 h-12 rounded-full mr-4">
                                <div>
                                    <h2 class="text-xl font-bold mb-2">${data[1].name}</h2>
                                    <p>${ new Date(data[0].created_at ).toDateString()}</p>
                                </div>
                            </div>
                            <p>${data[0].body}</p>
                        </div>`
                        document.getElementById('comments').insertBefore(comment, document.getElementById('comments').firstChild);

                        dialog.close()
                    });
                });
            });


        </script>
    </div>
    <div class="mt-8" id="comments">
        @isset($comments)
            @foreach ($comments as $comment)
                <div class="bg-gray-100 p-4 rounded-lg mb-4" >
                    <div class="flex items-center mb-4">
                        <img src="https://picsum.photos/50" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h2 class="text-xl font-bold mb-2">{{ $comment->user->name }}</h2>
                            <p>{{ $comment->created_at->format('d M Y') }}</p>
                        </div>
                    </div>

                    <p>{{ $comment->body }}</p>
                </div>

            @endforeach
        @endisset
    </div>
</div>
@endsection
