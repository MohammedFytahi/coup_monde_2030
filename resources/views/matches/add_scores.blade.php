<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Scores</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-center mb-8">Add Scores</h1>
        @if(session('success'))
            <div class="bg-green-200 text-green-800 py-2 px-4 mb-4 rounded">{{ session('success') }}</div>
        @endif

        <form action="{{ route('match_results.store', $matchId) }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-6">
                <div class="flex items-center space-x-4">
                    <img src="{{ asset($match->team1->flag) }}" alt="{{ $match->team1->name }} Flag" class="w-12 h-auto">
                    <input type="number" name="team1_score" placeholder="{{ $match->team1->name }} Score" value="{{ old('team1_score') }}" required class="border border-gray-300 rounded-md px-4 py-2 w-24 focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="flex items-center space-x-4">
                    <img src="{{ asset($match->team2->flag) }}" alt="{{ $match->team2->name }} Flag" class="w-12 h-auto">
                    <input type="number" name="team2_score" placeholder="{{ $match->team2->name }} Score" value="{{ old('team2_score') }}" required class="border border-gray-300 rounded-md px-4 py-2 w-24 focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
            <div class="mt-8 flex justify-center">
                <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
