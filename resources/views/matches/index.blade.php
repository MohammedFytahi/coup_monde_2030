
    <style>
        /* Custom CSS for styling */
        .match-card {
            transition: all 0.3s ease-in-out;
        }

        .match-card:hover {
            transform: translateY(-5px);
        }

        .match-card img {
            width: 50px;
            height: auto;
        }

        .match-card .match-details {
            padding: 1.5rem;
        }

        .match-card .match-details h3 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .match-card .match-details p {
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
        }

        .match-card .match-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem;
            background-color: #f3f4f6;
            border-top: 1px solid #d1d5db;
        }

        .match-card .match-actions button {
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .match-card .match-actions button:hover {
            background-color: #4b5563;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <x-app title="Matches">
        <div class="container mx-auto px-4 py-8">
            <h2 class="text-3xl font-bold mb-4">Matches</h2>
            <button id="addMatchBtn" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300 ease-in-out mb-4">Add Match</button>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($matches as $match)
                    <div class="match-card bg-white border border-gray-300 rounded-lg overflow-hidden shadow-md">
                        <div class="flex justify-between p-4">
                            <img src="{{ asset($match->team1->flag) }}" alt="{{ $match->team1->name }}">
                            <img src="{{ asset($match->team2->flag) }}" alt="{{ $match->team2->name }}">
                        </div>
                        <div class="match-details">
                            <h3>{{ $match->team1->name }} vs {{ $match->team2->name }}</h3>
                            <p class="text-gray-500 mb-2">{{ $match->date }}</p>
                            <p class="text-gray-700 mb-2">Stadium: {{ $match->stadium->name }}</p>
                            <p class="text-gray-700 mb-2">Price: {{ $match->price }}</p>
                            <p class="text-gray-700 mb-2" id="matchTimer{{ $match->id }}"></p>
                        </div>
                        <div class="match-actions">
                            <a href="{{ route('matches.edit', $match->id) }}" class="text-blue-500 hover:text-blue-700 inline-block px-3 py-1 rounded-md border border-blue-500 hover:bg-blue-500 hover:text-white">Edit</a>

                            <form action="{{ route('matches.destroy', $match->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 inline-block px-3 py-1 rounded-md border border-red-500 hover:bg-red-500 hover:text-white">Delete</button>
                            </form>
                            
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out mb-2 inline-block" onclick="toggleReservationForm({{ $match->id }})">Réserver un ticket</button>

                            <form id="reservationForm{{ $match->id }}" class="hidden" action="{{ route('reserve-ticket', ['match_id' => $match->id]) }}" method="POST">
                                @csrf
                                <input type="number" id="quantity" name="quantity" min="1" required class="w-16 px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out">Réserver</button>
                            </form>
                            
                        </div>
                        
                    </div>
                @endforeach
        </div>
    </div>
    

  <!-- Modale pour ajouter un match -->
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


  <!-- Modale pour éditer un match -->
<div id="editMatchModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
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
</div>

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

    function updateMatchTimer(matchDate, matchId) {
        // Récupérer l'élément de compteur de temps par son ID
        var timerElement = document.getElementById('matchTimer' + matchId);

        // Calculer le temps restant jusqu'au début du match
        var currentDate = new Date();
        var startDate = new Date(matchDate);
        var timeDiff = startDate.getTime() - currentDate.getTime();
        var seconds = Math.floor(timeDiff / 1000);

        // Calculer les heures, minutes et secondes restantes
        var hours = Math.floor(seconds / 3600);
        var minutes = Math.floor((seconds % 3600) / 60);
        seconds = seconds % 60;

        // Mettre à jour le texte du compteur de temps
        timerElement.textContent = 'Time Remaining: ' + hours + 'h ' + minutes + 'm ' + seconds + 's';
    }

    // Mettre à jour le compteur de temps pour chaque match
    @foreach ($matches as $match)
        updateMatchTimer('{{ $match->date }}', '{{ $match->id }}');
    @endforeach

    // Mettre à jour le compteur de temps toutes les secondes
    setInterval(function() {
        @foreach ($matches as $match)
            updateMatchTimer('{{ $match->date }}', '{{ $match->id }}');
        @endforeach
    }, 1000);
    function toggleReservationForm(matchId) {
    var form = document.getElementById('reservationForm' + matchId);
    form.classList.toggle('hidden');
}


</script>
