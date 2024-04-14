<x-app title="Edit Match">
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold mb-4">Edit Match</h2>
        <form action="{{ route('matches.update', $match->id) }}" method="POST" class="max-w-md mx-auto">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="date" class="block text-gray-700">Date:</label>
                <input type="date" id="date" name="date" value="{{ $match->date }}" required class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="team1_id" class="block text-gray-700">Team 1:</label>
                <select name="team1_id" id="team1_id" required class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                    <option value="" disabled>Select Team 1</option>
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}" @if($match->team1_id == $team->id) selected @endif>{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="team2_id" class="block text-gray-700">Team 2:</label>
                <select name="team2_id" id="team2_id" required class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                    <option value="" disabled>Select Team 2</option>
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}" @if($match->team2_id == $team->id) selected @endif>{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="stadium_id" class="block text-gray-700">Stadium:</label>
                <select name="stadium_id" id="stadium_id" required class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                    <option value="" disabled>Select Stadium</option>
                    @foreach($stadiums as $stadium)
                        <option value="{{ $stadium->id }}" @if($match->stadium_id == $stadium->id) selected @endif>{{ $stadium->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700">Price:</label>
                <input type="number" id="price" name="price" value="{{ $match->price }}" required placeholder="Price" class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out">Update</button>
        </form>
    </div>







    
</x-app>
