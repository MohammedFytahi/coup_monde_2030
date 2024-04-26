<!-- component -->
<style>
    /* Style de survol des liens de navigation */
    .nav-links a:hover {
        text-decoration: none;
        color: #FFD700; 
          
    }
</style>
<nav class="bg-blue-900 shadow-md py-4 px-4 md:px-8 w-full" style="position: fixed; z-index: 4; ">
    <div class="container mx-auto flex items-center justify-between">
        <!-- Logo -->
        <div class="nav-logo">
            <!-- Replace 'logo.png' with your actual logo file -->
            <img src="{{ asset('images/yalla.png') }}" alt="Logo" class="w-24">
        </div>
        <!-- Navigation links -->
        <div class="nav-links hidden md:flex flex-grow justify-center font-semibold">
            <ul class="flex">
                <!-- Active Link = text-yellow-400, Inactive Link = hover:text-yellow-400 -->
                <li >    <div class="relative flex" id="search-form" data-twe-input-wrapper-init data-twe-input-group-ref>
                    <input type="search" class="peer block min-h-[auto] w-full rounded border-0 bg-white px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0" placeholder="Search" aria-label="Search" id="query" name="query" aria-describedby="basic-addon4"  style="z-index: 1000;"/>
                    <label for="query" class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary peer-data-[twe-input-placeholder-active]:text-primary">Search</label>
                    <button class="relative z-[2] -ms-0.5 flex items-center rounded-e bg-primary px-5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong" type="button" id="button-addon4" data-twe-ripple-init data-twe-ripple-color="light">
                        <span class="[&>svg]:h-5 [&>svg]:w-5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                            </svg>
                        </span>
                    </button>
                </div></li>
                @auth
                @if (auth()->user()->role == 'admin')
                    <li class="mx-2"><a href="{{route('dashboard')}}" class="text-yellow-400 hover:text-yellow-400">Dashboard</a></li>
                @else
                    <li class="mx-2"><a href="{{ route('home') }}" class="text-yellow-400 hover:text-yellow-400">Home</a></li>
                @endif
            @else
                <!-- Si l'utilisateur n'est pas authentifié, vous pouvez afficher ici les éléments de navigation pour les utilisateurs non authentifiés -->
            @endauth
            
           
           @if(auth()->user())
                <li class="mx-2"><a href="{{ route('matches.index') }}" class="text-yellow-400 hover:text-yellow-400">Matches</a></li>
                <li class="mx-2"><a href="{{ route('teams.index') }}" class="text-yellow-400 hover:text-yellow-400">Teams</a></li>
                <li class="mx-2"><a href="{{route('stadiums.index')}}" class="text-yellow-400 hover:text-yellow-400">Stadiums</a></li>
                <li class="mx-2"><a href="{{ route('matches.results') }}" class="text-yellow-400 hover:text-yellow-400">Match results</a></li>
                <li class="mx-2"><a href="{{route('articles.index')}}" class="text-yellow-400 hover:text-yellow-400">Articles</a></li>
             @else
                <li class="mx-2"><a href="{{ route('home') }}" class="text-yellow-400 hover:text-yellow-400">Home</a></li>
               
              @endif
            </ul>
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
        <!-- Hamburger menu for small screens -->
        <div class="md:hidden flex items-center">
            <button id="mobileMenuBtn" class="text-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>
    <!-- Mobile menu -->
    <div id="mobileMenu" class="md:hidden bg-blue-900 hidden">
        <ul class="text-center py-2">
            <li><a href="#" class="block text-yellow-400 py-2 hover:text-yellow-400">Home</a></li>
            <li><a href="{{ route('matches.index') }}" class="block text-yellow-400 py-2 hover:text-yellow-400">Matches</a></li>
            <li><a href="{{ route('teams.index') }}" class="block text-yellow-400 py-2 hover:text-yellow-400">Teams</a></li>
            <li><a href="#" class="block text-yellow-400 py-2 hover:text-yellow-400">Players</a></li>
            <li><a href="#" class="block text-yellow-400 py-2 hover:text-yellow-400">About</a></li>
            <li><a href="#" class="block text-yellow-400 py-2 hover:text-yellow-400">Contact</a></li>
        </ul>
        <!-- Authentication buttons -->
        <div class="text-center py-2">
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-gray-900 rounded-xl flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-yellow-400 mx-4 p-2 hover:border rounded focus:outline-red-500 focus:outline-2 focus:rounded-sm focus:border-yellow-400">Log in</a>
                <a href="{{ route('register') }}" class="text-yellow-400 mx-4 p-2 hover:border rounded focus:outline-red-500 focus:outline-2 focus:rounded-sm focus:border-yellow-400">Register</a>
            @endauth
        </div>
    </div>
</nav>

<script>
    // Script to toggle mobile menu
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    mobileMenuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
