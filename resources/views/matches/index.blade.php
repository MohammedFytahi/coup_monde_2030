<x-app title="Matches">
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold mb-4">Matches</h2>
        <button id="addMatchBtn" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300 ease-in-out mb-4">Add Match</button>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Date</th>
                    <th class="border border-gray-300 px-4 py-2">Team 1</th>
                    <th class="border border-gray-300 px-4 py-2">Team 2</th>
                    <th class="border border-gray-300 px-4 py-2">Stadium</th>
                    <th class="border border-gray-300 px-4 py-2">Price</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th> <!-- Nouvelle colonne pour les actions -->
                </tr>
            </thead>
            <tbody>
                @foreach ($matches as $match)
                    <tr class="hover:bg-gray-100 transition duration-300 ease-in-out">
                        <td class="border border-gray-300 px-4 py-2">{{ $match->date }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $match->team1->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $match->team2->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $match->stadium->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $match->price }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('matches.edit', $match->id) }}" class="text-blue-500 hover:text-blue-700 mr-2 edit-button">Edit</a>
                            <form action="{{ route('matches.destroy', $match->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="createMatchModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <h2 class="text-3xl font-bold mb-4">Add Match</h2>
                <form action="{{ route('matches.store') }}" method="POST" class="max-w-md mx-auto">
                    @csrf
                    <div class="mb-4">
                        <input type="date" id="date" name="date" required placeholder="Date" class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <select name="team1_id" id="team1_id" required class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                            <option value="" disabled selected>Select Team 1</option>
                            @foreach($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <select name="team2_id" id="team2_id" required class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                            <option value="" disabled selected>Select Team 2</option>
                            @foreach($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <select name="stadium_id" id="stadium_id" required class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                            <option value="" disabled selected>Select Stadium</option>
                            @foreach($stadiums as $stadium)
                                <option value="{{ $stadium->id }}">{{ $stadium->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <input type="number" id="price" name="price" required placeholder="Price" class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <button id="closeModalBtn" type="button" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-300 ease-in-out">Close</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out">Submit</button>
                </form>
            </div>
        </div>
    </div>






    {{-- <div id="editMatchModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
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
        </div>
    </div> --}}
</x-app>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('#addMatchBtn').click(function(){
            $('#createMatchModal').removeClass('hidden');
        });

        $('#closeModalBtn').click(function(){
            $('#createMatchModal').addClass('hidden');
        });
    });

    $(document).ready(function(){
        $('#addMatchBtn').click(function(){
            $('#createMatchModal').removeClass('hidden');
        });

        $('.edit-button').click(function(){
            $('#editMatchModal').removeClass('hidden');
        });

        $('.closeModalBtn').click(function(){
            $(this).closest('.modal').addClass('hidden');
        });
    });
</script>
