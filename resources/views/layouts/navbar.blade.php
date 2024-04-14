<!-- component -->
<nav class="bg-gray-900 shadow-md w-full py-4 px-8 md:px-auto">
    <div class="container mx-auto flex items-center justify-between">
        <!-- Logo -->
        <div class="nav-logo">

            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-24">
        </div>

        <div class="nav-links">
            <ul class="flex font-semibold">
                <li class="mx-4"><a href="{{ route('login') }}" class="text-yellow-400 hover:text-yellow-400">Home</a></li>
                <li class="mx-4"><a href="{{ route('matches.index') }}" class="text-yellow-400 hover:text-yellow-400">Matches</a></li>
                <li class="mx-4"><a href="{{ route('teams.index') }}" class="text-yellow-400 hover:text-yellow-400">Teams</a></li>
                <li class="mx-4"><a href="{{ route('login') }}" class="text-yellow-400 hover:text-yellow-400">Players</a></li>
                <li class="mx-4"><a href="{{ route('login') }}" class="text-yellow-400 hover:text-yellow-400">About</a></li>
                <li class="mx-4"><a href="{{ route('login') }}" class="text-yellow-400 hover:text-yellow-400">Contact</a></li>
            </ul>
        </div>
        <div class="nav-auth-buttons">
            @auth
                <div class="sm:fixed sm:top-[-11px] sm:right-0 p-6 text-right z-10">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-gray-900 rounded-xl flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}" class="text-yellow-400 mx-4 p-2 hover:border rounded focus:outline-red-500 focus:outline-2 focus:rounded-sm focus:border-yellow-400">Log in</a>
                <a href="{{ route('register') }}" class="text-yellow-400 mx-4 p-2 hover:border rounded focus:outline-red-500 focus:outline-2 focus:rounded-sm focus:border-yellow-400">Register</a>
            @endauth
        </div>
    </div>
</nav>  
