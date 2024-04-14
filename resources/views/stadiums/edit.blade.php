<x-app title="Edit Stadium">
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold mb-4">Edit Stadium</h2>
        <form action="{{ route('stadiums.update', $stadium->id) }}" method="POST" class="max-w-md mx-auto">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" id="name" name="name" value="{{ $stadium->name }}"
                    class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="capacity" class="block text-gray-700">Capacity:</label>
                <input type="number" id="capacity" name="capacity" value="{{ $stadium->capacity }}"
                    class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="address" class="block text-gray-700">Address:</label>
                <input type="text" id="address" name="address" value="{{ $stadium->address }}"
                    class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
            </div>
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out">Submit</button>
        </form>
    </div>
</x-app>
