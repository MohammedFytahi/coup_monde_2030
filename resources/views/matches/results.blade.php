<x-app :title="'match results'">
    <style>.score {
    font-weight: bold;
    font-size: 18px;
    color: #333; /* couleur de texte souhaitée */
}</style>
    <section class="flexible">
        <div class="fixture-header">
            <h3>Todays Matches</h3>
            <a class="link-button" target="_blank" href="https://www.goal.com/en-in/live-scores">Live</a>
        </div>
      
        <div class="fixture-name">
            <h3>UEFA CHAMPIONS LEAGUE</h3>
            <div class="fixtures">
                @foreach($matches as $match)
                    <div class="fixture">
                        <h4 class="status">{{ $match->date }}</h4>
                        @if($match->team1 && $match->team2)
                            <p>{{ $match->team1->name }} <span class="score">{{ $match->matchResults->team1_score }}</span> - <span class="score">{{ $match->matchResults->team2_score }}</span> {{ $match->team2->name }}</p>
                        @else
                            <p>Équipes non disponibles</p>
                        @endif
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </section>
</x-app>

