<x-app :title="'Articles'">
<div class="max-w-3xl mx-auto my-8">
    <h2 class="text-3xl font-bold mb-4">{{ $article->title }}</h2>
    <div class="mb-4">
        <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="rounded-lg">
    </div>
    <p class="text-lg leading-relaxed">{{ $article->content }}</p>

  
    @if($comments->count() > 0)
        <h3 class="text-xl font-semibold mt-8">Comments</h3>
        <ul class="list-disc pl-8 mt-4">
            @foreach($comments as $comment)
            <li class="text-lg">
                <span class="font-semibold">{{ $comment->user->name }}:</span> {{ $comment->content }}
            </li>
            @endforeach
        </ul>
    @else
        <p class="text-lg mt-8">No comments yet.</p>
    @endif

    <!-- Form to add a new comment -->
    <form action="{{ route('articles.comments.add', ['articleId' => $article->id]) }}" method="POST" class="mt-8">
        @csrf
        <textarea name="content" placeholder="Enter your comment here" required class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-blue-500"></textarea>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out mt-4">Add Comment</button>
    </form>
</div>
</x-app>
