<x-app :title="'matche result'">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Match Result Details
                    </div>
                    <div class="card-body">
                        <p><strong>Match ID:</strong> {{ $matchResult->match_id }}</p>
                        <p><strong>Team 1 Score:</strong> {{ $matchResult->team1_score }}</p>
                        <p><strong>Team 2 Score:</strong> {{ $matchResult->team2_score }}</p>
                        <p><strong>Result:</strong> {{ $matchResult->result }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
