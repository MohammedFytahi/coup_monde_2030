{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Article</title>
</head>
<body>
    <h1>Add New Article</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>
        <div>
            <label for="content">Content:</label><br>
            <textarea id="content" name="content" required>{{ old('content') }}</textarea>
        </div>
        <div>
            <label for="image">Image:</label><br>
            <input type="file" id="image" name="image">
        </div>
        <button type="submit">Add Article</button>
    </form>
</body>
</html> --}}

<x-app :title="'Articles'">
<div class="flex items-center justify-center p-12">
    <div class="mx-auto w-full max-w-[550px] bg-white">
        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="title" class="mb-3 block text-base font-medium text-[#07074D]">
                 Title
                </label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required  placeholder="Title"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>
            <div class="mb-5">
                <label for="Content" class="mb-3 block text-base font-medium text-[#07074D]">
                    Content
                </label>
                <textarea id="content" name="content"  class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>{{ old('content') }}</textarea>
                  
            </div>
            <div class="mb-5">
                <label for="image" class="mb-3 block text-base font-medium text-[#07074D]">
                    image
                </label>
                <input type="file" id="image" name="image"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>
         

            

            <div>
                <button
                    class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                  Add Article
                </button>
            </div>
        </form>
    </div>
</div>
</x-app>