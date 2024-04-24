<x-app title="teams">
    <style>
.club {
    width: 190px;
    height: 254px;
    background: #dfe8f3;
    position: relative;
    display: flex;
    place-content: center;
    place-items: center;
    overflow: hidden;
    border-radius: 20px;
}

.club::before {
    content: '';
    position: absolute;
    width: 100px;
    background-image: linear-gradient(180deg, rgb(0, 183, 255), rgb(255, 48, 255));
    height: 130%;
    animation: rotBGimg 3s linear infinite;
    transition: all 0.2s linear;
}

@keyframes rotBGimg {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

.club::after {
    content: '';
    position: absolute;
    background: #b6b9bd;
    inset: 5px;
    border-radius: 15px;
}

.club img {
    position: relative;     
    z-index: 2; 
    max-width: 100%; 
    max-height: 100%; 
}
.club h4{
    z-index: 1;
}


 
    </style>
    <div class="container">
        <h2 class="text-2xl uppercase font-bold mb-5">Liste des équipes</h2>
        <a id="addMatchBtn" class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-to-tl from-gray-900 to-slate-800 hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25" href="{{route('teams.create')}}"> <i class="fas fa-plus"> </i>&nbsp;&nbsp;Add New Card</a>
        <section id="clubs">
           
            <div class="clubs">
                @foreach($teams as $team)
                <div class="club">
                    <img class="club-logo" src="{{ asset(''. $team->flag) }}" alt="{{ $team->name }}">

                    <h4>{{ $team->name }}</h4>
                </div>
                @endforeach
            </div>
        </section>
        
    </div>

    
</x-app>


