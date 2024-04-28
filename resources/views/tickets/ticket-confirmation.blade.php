<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .ticket-background {
            background-image: url('https://sites.duke.edu/wcwp/files/2018/05/Coupe-du-Monde.jpeg');
            /* Remplacez l'URL par l'URL de votre image de fond */
            background-size: cover;
            background-position: center;
            brightness: 0.5;
        }

        .white-text {
            color: white;
        }

        /* Masquer le contenu non nécessaire lors de l'impression */
        @media print {
           

            .ticket-background, .ticket-content, .print-button {
                visibility: visible;
            }

            .ticket-background {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }

            .ticket-content {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            .print-button {
                display: none;
            }
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-8">Ticket Confirmation</h1>

        @foreach ($tickets as $ticket)
        <div class="ticket-background bg-gradient-to-r from-blue-400 to-indigo-600 rounded-lg shadow-md p-6 mb-6 max-w-2xl white-text">
            <div class="ticket-content">
                <div class="flex justify-between items-center mb-4">
                    <div>
                        <h2 class="text-xl font-bold">Match Date: {{ $ticket->match->date }}</h2>
                        <p class="text-gray-600 flex items-center">
                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path($ticket->match->team1->flag))) }}" alt="{{ $ticket->match->team1->name }}" class="w-8 h-8 mr-2">
                            {{ $ticket->match->team1->name }}
                            <span class="mx-1">&bull;</span>
                            {{ $ticket->match->team2->name }}
                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path($ticket->match->team2->flag))) }}" alt="{{ $ticket->match->team2->name }}" class="w-8 h-8 ml-2">
                        </p>
                    </div>
                    <div class="flex items-center">
                        <div>
                            <p class="text-lg font-semibold"><i class="fas fa-map-marker-alt mr-2"></i> Stadium:
                                {{ $ticket->match->stadium->name }}</p>
                            <p class="text-lg font-semibold"><i class="fas fa-clock mr-2"></i> Match Time:
                                {{ $ticket->match->time }}</p>
                            <p class="text-lg font-semibold"><i class="fas fa-money-bill mr-2"></i> Price:
                                {{ $ticket->match->price }}</p>
                        </div>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=YourDataHere" alt="QR Code" class="w-16 h-16 ml-6">
                    </div>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</body>

</html>
