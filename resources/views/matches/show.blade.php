<x-app :title="'match results'">
    <section class="flexible">
        <div class="fixture-header flex justify-between items-center mb-4">

           
        </div>
        <div class="fixture-name">
            <h3 class="text-lg font-semibold mb-4">FIFA World Cup</h3>
            <div class="fixtures">
                <div class="fixture flex items-center mb-4">
                    <h4 class="status">{{ $matches->date }}</h4>
                    <p class="ml-4">{{ $matches->team1->name }} <span class="font-bold text-base text-gray-800">{{ $matches->matchResults->team1_score }}</span> - <span class="font-bold text-base text-gray-800">{{ $matches->matchResults->team2_score }}</span> {{ $matches->team2->name }} </p>
                    <a href="{{ route('matches.edit', $matches->id) }}" class="edit-icon text-blue-500 ml-4"><i class="fas fa-edit"></i></a>
                </div>
                <hr class="mb-4">
            </div>
        </div>
    </section>
</x-app>
