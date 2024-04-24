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
        .played {
        /* Styles pour le statut "Played" */
        background-color: #4caf50; /* Fond vert */
        color: white; /* Texte blanc */
        font-weight: bold; /* Texte en gras */
        padding: 0.5rem 1rem; /* Espacement interne */
        border-radius: 0.25rem; /* Coins arrondis */
        display: inline-block; /* Affichage en ligne */
    }
    </style>


    </head>



    <body class="bg-gray-100 font-sans">
        <x-app title="Matches">
            <div class="flex justify-center mb-4">
                <button onclick="filterMatchesByStatus('all')"
                    class="mr-2 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out">All</button>
                <button onclick="filterMatchesByStatus('not-played-yet')"
                    class="mr-2 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out">Not
                    Played Yet</button>
                <button onclick="filterMatchesByStatus('playing')"
                    class="mr-2 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out">Playing</button>
                <button onclick="filterMatchesByStatus('played')"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out">Played</button>
            </div>
            <div class="container mx-auto px-4 py-8">
                <h2 class="text-3xl font-bold mb-4">Matches</h2>


                <a id="addMatchBtn"
                    class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-gray-900 to-slate-800 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25"
                    href="javascript:;"> <i class="fas fa-plus"> </i>&nbsp;&nbsp;Add New Card</a>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($matches as $match)
                    
                        <div class=" match-card   glass shadow-xl overflow-hidden shadow-md">
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
                                @if ($match->result)
                                    <p class="text-gray-700 mb-2">Result: {{ $match->result }}</p>
                                @endif
                            </div>
                             <div class="match-actions">
                                @if (auth()->user() && auth()->user()->role == 'admin')
                                
                                    <div class="m-5">
                                        <a href="{{ route('matches.edit', $match->id) }}" class="flex p-2.5 bg-yellow-500 rounded-xl hover:rounded-3xl hover:bg-yellow-600 transition-all duration-300 text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                    </div>
                            
                                  
                                        

                                    <form action="{{ route('matches.destroy', $match->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-block px-4 py-3 mb-0 font-bold text-center text-red-600 uppercase align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in hover:scale-102 active:opacity-85"> <i class="mr-2 far fa-trash-alt" aria-hidden="true"></i>Delete</button>
                                    </form>
                                @endif

                                @if ($match->date <= now() && auth()->user() && auth()->user()->role == 'admin')
                                @if ($match->matchResults()->exists())
                                <a href="{{ route('match_results.show', $match->id) }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition duration-300 ease-in-out mb-2 inline-block">
                                    <i class="far fa-eye mr-2"></i> <!-- Ajoutez cette ligne pour l'icône d'œil -->
                                  
                                </a>
                                    @else
                                        <a href="{{ route('match_results.create', $match->id) }}"
                                            class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition duration-300 ease-in-out mb-2 inline-block">
                                            Add Result
                                        </a>
                                    @endif
                                @endif




                                @if (auth()->user() && auth()->user()->role == 'utilisateur')
                                    <button
                                        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out mb-2 inline-flex items-center"
                                        onclick="toggleReservationForm({{ $match->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 14l9-5-9-5-9 5 9 5z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 14l7-3m7 3l-7 3" />
                                        </svg>
                                        Réserver
                                    </button>
                                @endif


                                <div id="reservationForm{{ $match->id }}" class="hidden fixed inset-0 flex items-center justify-center z-50 overflow-auto bg-gray-500 bg-opacity-75">
                                    <div class="bg-white rounded-lg p-8 max-w-md mx-auto">
                                        <h2 class="text-2xl font-bold mb-4">Réserver un ticket</h2>
                                        <form action="{{ route('reserve-ticket', ['match_id' => $match->id]) }}" method="POST">
                                            @csrf
                                            <div class="mb-4">
                                                <label for="quantity" class="block text-gray-700">Quantité:</label>
                                                <input type="number" id="quantity" name="quantity" min="1" required placeholder="Quantité" class="w-full px-4 py-2 mt-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                                            </div>
                                            <div class="flex justify-end">
                                                <button type="button" onclick="toggleReservationForm({{ $match->id }})" class="mr-2 px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">Annuler</button>
                                                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Réserver</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                

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
                    <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6"
                        role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                        <h2 class="text-3xl font-bold mb-4">Add Match</h2>
                        <form action="{{ route('matches.store') }}" method="POST" class="max-w-md mx-auto">
                            @csrf
                            <div class="mb-4">
                                <input type="date" id="date" name="date" required placeholder="Date"
                                    class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div class="mb-4">
                                <select name="team1_id" id="team1_id" required
                                    class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                                    <option value="" disabled selected>Select Team 1</option>
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <select name="team2_id" id="team2_id" required
                                    class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                                    <option value="" disabled selected>Select Team 2</option>
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <select name="stadium_id" id="stadium_id" required
                                    class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                                    <option value="" disabled selected>Select Stadium</option>
                                    @foreach ($stadiums as $stadium)
                                        <option value="{{ $stadium->id }}">{{ $stadium->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <input type="number" id="price" name="price" required placeholder="Price"
                                    class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <button id="closeModalBtn" type="button"
                                class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-300 ease-in-out">Close</button>
                            <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out">Submit</button>
                        </form>
                    </div>
                </div>
            </div>


            <div id="editMatchModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
                <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6"
                        role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                        <h2 class="text-3xl font-bold mb-4">Edit Match</h2>
                        <form action="{{ route('matches.update', $match->id) }}" method="POST"
                            class="max-w-md mx-auto">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="date" class="block text-gray-700">Date:</label>
                                <input type="date" id="date" name="date" value="{{ $match->date }}"
                                    required
                                    class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div class="mb-4">
                                <label for="team1_id" class="block text-gray-700">Team 1:</label>
                                <select name="team1_id" id="team1_id" required
                                    class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                                    <option value="" disabled>Select Team 1</option>
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}"
                                            @if ($match->team1_id == $team->id) selected @endif>{{ $team->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="team2_id" class="block text-gray-700">Team 2:</label>
                                <select name="team2_id" id="team2_id" required
                                    class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                                    <option value="" disabled>Select Team 2</option>
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}"
                                            @if ($match->team2_id == $team->id) selected @endif>{{ $team->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="stadium_id" class="block text-gray-700">Stadium:</label>
                                <select name="stadium_id" id="stadium_id" required
                                    class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                                    <option value="" disabled>Select Stadium</option>
                                    @foreach ($stadiums as $stadium)
                                        <option value="{{ $stadium->id }}"
                                            @if ($match->stadium_id == $stadium->id) selected @endif>{{ $stadium->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="price" class="block text-gray-700">Price:</label>
                                <input type="number" id="price" name="price" value="{{ $match->price }}"
                                    required placeholder="Price"
                                    class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out">Update</button>
                        </form>
                    </div>
                </div>
            </div>





        </x-app>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#addMatchBtn').click(function() {
                    $('#createMatchModal').removeClass('hidden');
                });

                $('#closeModalBtn').click(function() {
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

    // Si le temps restant est inférieur ou égal à zéro, le match est terminé
    if (timeDiff <= 0) {
        timerElement.innerHTML = "Played";
        timerElement.classList.add('played');
        return;
    }

    var seconds = Math.floor(timeDiff / 1000);

    // Calculer les heures, minutes et secondes restantes
    var hours = Math.floor(seconds / 3600);
    var minutes = Math.floor((seconds % 3600) / 60);
    seconds = seconds % 60;

    // Mettre à jour le texte du compteur de temps
    timerElement.innerHTML = `
        <span class="countdown font-mono text-2xl">
            <span style="--value:${hours};">${hours}</span>h
            <span style="--value:${minutes};">${minutes}</span>m
            <span style="--value:${seconds};">${seconds}</span>s
        </span>`;
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

            function toggleScoreForm(matchId) {
                var form = document.getElementById('scoreForm' + matchId);
                form.classList.toggle('hidden');
            }
        </script>
