    <x-app title="create">

        <div class="bg-cover bg-gradient-to-b from-black to-gray-700 flex items-center justify-center h-screen">
            <div class="max-w-md mx-auto bg-gradient-to-r p-8 from-purple-500 to-red-300 shadow-2xl shdow-gray-400/50 rounded-xl">
                <h1 class="text-center text-white text-2xl uppercase font-bold mb-5">Create a New Team</h1>
                <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-3">
                    @csrf
                    <div class="input__wrapper w-full -ml-2 mb-36">
                        <label for="flag" class="flex flex-col items-center justify-center w-full h-50 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400 w-full"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400 w-full">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input id="flag" name="flag" type="file" class="w-full hidden" />
                        </label>
                    </div>
                    <input type="text" placeholder="Name" id="name" name="name" class="w-full outline-none rounded-lg py-2 px-3 bg-transparent border border-gray-200"/>
                    <input type="text" placeholder="Country" id="country" name="country" class="w-full outline-none rounded-lg py-2 px-3 bg-transparent border border-gray-200"/>
                    <button type="submit" class="w-full bg-gray-800 text-white py-2 rounded-lg hover:bg-gray-700">Envoyer</button>
                </form>
            </div>
        </div> 

    </x-app>


