<x-app :title="'Statistiques'">
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold mb-8">Dashboard</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Statistique: Nombre d'articles -->
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col justify-between animate__animated animate__fadeIn">
                <h2 class="text-xl font-semibold mb-4">Nombre d'articles</h2>
                <canvas id="articleChart" width="400" height="200"></canvas>
            </div>

            <!-- Statistique: Nombre de matchs -->
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col justify-between animate__animated animate__fadeIn">
                <h2 class="text-xl font-semibold mb-4">Nombre de matchs</h2>
                <canvas id="matchChart" width="400" height="200"></canvas>
            </div>

            <!-- Statistique: Nombre d'équipes -->
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col justify-between animate__animated animate__fadeIn">
                <h2 class="text-xl font-semibold mb-4">Nombre d'équipes</h2>
                <canvas id="teamChart" width="400" height="200"></canvas>
            </div>

            <!-- Statistique: Nombre d'utilisateurs -->
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col justify-between animate__animated animate__fadeIn">
                <h2 class="text-xl font-semibold mb-4">Nombre d'utilisateurs</h2>
                <canvas id="userChart" width="400" height="200"></canvas>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col justify-between animate__animated animate__fadeIn">
            <h2 class="text-xl font-semibold mb-4">Utilisateur avec le plus de commentaires</h2>
            <div class="flex items-center mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                </svg>
                <span class="font-semibold">{{ $userWithMostComments->name }}</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="font-semibold">{{ $userWithMostComments->comments_count }}</span>
                <span class="ml-1 text-gray-500">commentaires</span>
            </div>
        </div>

        <!-- Statistique: Article avec le plus de likes et de commentaires -->
        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col justify-between animate__animated animate__fadeIn">
            <h2 class="text-xl font-semibold mb-4">Article avec le plus de likes et de commentaires</h2>
            <div class="flex items-center mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                </svg>
                <span class="font-semibold">{{ $articleWithMostLikesAndComments->title }}</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="font-semibold">{{ $articleWithMostLikesAndComments->likes_count }}</span>
                <span class="ml-1 text-gray-500">likes</span>
            </div>
            <div class="flex items-center">
                <span class="font-semibold">{{ $articleWithMostLikesAndComments->comments_count }}</span>
                <span class="ml-1 text-gray-500">commentaires</span>
            </div>
        </div>
        
    </div>

    <script>
        // Article Chart
        var articleChartCtx = document.getElementById('articleChart').getContext('2d');
        var articleChart = new Chart(articleChartCtx, {
            type: 'bar',
            data: {
                labels: ['Nombre d\'articles'],
                datasets: [{
                    label: 'Nombre',
                    data: [{{ $numberOfArticles }}],
                    backgroundColor: 'rgba(54, 162, 235, 0.8)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });

        // Match Chart
        var matchChartCtx = document.getElementById('matchChart').getContext('2d');
        var matchChart = new Chart(matchChartCtx, {
            type: 'bar',
            data: {
                labels: ['Nombre de matchs'],
                datasets: [{
                    label: 'Nombre',
                    data: [{{ $numberOfMatches }}],
                    backgroundColor: 'rgba(75, 192, 192, 0.8)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });

        // Team Chart
        var teamChartCtx = document.getElementById('teamChart').getContext('2d');
        var teamChart = new Chart(teamChartCtx, {
            type: 'bar',
            data: {
                labels: ['Nombre d\'équipes'],
                datasets: [{
                    label: 'Nombre',
                    data: [{{ $numberOfTeams }}],
                    backgroundColor: 'rgba(255, 206, 86, 0.8)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });

        // User Chart
        var userChartCtx = document.getElementById('userChart').getContext('2d');
        var userChart = new Chart(userChartCtx, {
            type: 'bar',
            data: {
                labels: ['Nombre d\'utilisateurs'],
                datasets: [{
                    label: 'Nombre',
                    data: [{{ $numberOfUsers }}],
                    backgroundColor: 'rgba(255, 99, 132, 0.8)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>
</body>
</x-app>