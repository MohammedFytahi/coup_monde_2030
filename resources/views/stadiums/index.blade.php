<x-app title="Stadiums">
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold mb-4">Stadiums</h2>
        <button onclick="openModal('add')"
            class="relative inline-flex items-center justify-center px-8 py-4 text-lg font-bold text-white transition-all duration-200 bg-gray-900 font-pj rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900"
            role="button">Add Stadium</button>

        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
            <thead>
                <tr>
                    <th
                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                        Name</th>
                    <th
                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                        Capacity</th>
                    <th
                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                        Address</th>
                    <th
                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                        Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dans votre vue -->
                @foreach ($stadiums as $stadium)
                    <tr class="hover:bg-gray-100 transition duration-300 ease-in-out">
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            {{ $stadium->name }}</td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            {{ $stadium->capacity }}</td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            {{ $stadium->address }}</td>
                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                            <button
                                onclick="openModal('edit', '{{ $stadium->id }}', '{{ $stadium->name }}', '{{ $stadium->capacity }}', '{{ $stadium->address }}')"
                                class="text-blue-500 hover:text-blue-700">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="deleteStadium('{{ $stadium->id }}')"
                                class="text-red-500 hover:text-red-700 ml-2">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
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
                    <p id="modalTitle" class="text-2xl font-bold"></p>
                    <button onclick="closeModal()" class="text-black opacity-50 hover:text-black focus:outline-none">
                        <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M19.78 21.78l-1.56 1.56L12 13.56l-6.22 6.22-1.56-1.56L10.44 12 4.22 5.78l1.56-1.56L12 10.44l6.22-6.22 1.56 1.56L13.56 12l6.22 6.22z" />
                        </svg>
                    </button>
                </div>

                <form id="editForm" method="POST" class="max-w-md mx-auto">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <input type="hidden" id="stadiumId" name="id">
                        <label for="name" class="block text-gray-700">Name:</label>
                        <input type="text" id="name" name="name" required placeholder="Name"
                            class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="capacity" class="block text-gray-700">Capacity:</label>
                        <input type="number" id="capacity" name="capacity" required placeholder="Capacity"
                            class="w-full px-3 py-2 placeholder-gray-400 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-gray-700">Address:</label>
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
    function openModal(mode, id = null, name = '', capacity = '', address = '') {
        const modalTitle = document.getElementById('modalTitle');
        const modal = document.getElementById('myModal');
        const editForm = document.getElementById('editForm');

        if (mode === 'add') {
            modalTitle.textContent = 'Add Stadium';
            editForm.action = '{{ route('stadiums.store') }}';
            document.getElementById('stadiumId').value = '';
            document.getElementById('name').value = '';
            document.getElementById('capacity').value = '';
            document.getElementById('address').value = '';
        } else if (mode === 'edit') {
            modalTitle.textContent = 'Edit Stadium';
            editForm.action = '/stadiums/' + id;
            document.getElementById('stadiumId').value = id;
            document.getElementById('name').value = name;
            document.getElementById('capacity').value = capacity;
            document.getElementById('address').value = address;
        }

        modal.classList.remove('hidden');
    }

    function closeModal() {
        const modal = document.getElementById('myModal');
        modal.classList.add('hidden');
    }

// Dans votre script JavaScript
function deleteStadium(id) {
    if (confirm("Are you sure you want to delete this stadium?")) {
        fetch('/stadiums/' + id, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
        })
        .then(response => {
            if (response.ok) {
                window.location.reload(); // Actualise la page après la suppression
            } else {
                console.error('Error deleting stadium');
            }
        })
        .catch(error => {
            console.error('Error deleting stadium:', error);
        });
    }
}

</script>
