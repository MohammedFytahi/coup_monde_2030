<x-app title="Stadiums">
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold mb-4">Stadiums</h2>
        <button onclick="openModal()"
            class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300 ease-in-out mb-4">Add
            Stadium</button>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Capacity</th>
                    <th class="border border-gray-300 px-4 py-2">Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stadiums as $stadium)
                    <tr class="hover:bg-gray-100 transition duration-300 ease-in-out">
                        <td class="border border-gray-300 px-4 py-2">{{ $stadium->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $stadium->capacity }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $stadium->address }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="myModal" class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center hidden">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">

                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Add Stadium</p>
                    <button onclick="closeModal()" class="text-black opacity-50 hover:text-black focus:outline-none">
                        <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M19.78 21.78l-1.56 1.56L12 13.56l-6.22 6.22-1.56-1.56L10.44 12 4.22 5.78l1.56-1.56L12 10.44l6.22-6.22 1.56 1.56L13.56 12l6.22 6.22z" />
                        </svg>
                    </button>
                </div>

                <form action="{{ route('stadiums.store') }}" method="POST" class="max-w-md mx-auto">
                    @csrf
                    <div class="mb-4">
                        <input type="text" id="name" name="name" required placeholder="Name"
                            class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="mb-4">

                        <input type="number" id="capacity" name="capacity" required placeholder="Capacity"
                            class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <input type="text" id="address" name="address" required placeholder="address"
                            class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app>
<script>
    function openModal() {
        document.getElementById('myModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('myModal').classList.add('hidden');
    }
</script>
