<!DOCTYPE html>
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
</html>
