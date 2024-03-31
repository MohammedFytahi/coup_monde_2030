<x-app title="Register">
    <div class="flex items-center mt-4 justify-center bg-cover bg-center bg-gradient-to-b from-blue-600 to-blue-400"
        style="background-image: url('images/hero-image.png');">

        <div class="shadow-2xl rounded-md m-8  w-[90%]  sm:w-[80%] bg-gray-200 bg-opacity-50">

            <h1 class="text-center m-4 text-3xl underline">Rejoignez-nous</h1>
            <div class="flex flex-col sm:flex-row items-center mb-8  w-full sm:justify-around ">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data ">
                    @csrf

                    <div class="box bg-gray-200 bg-opacity-50">

                        <div class="input__wrapper w-full -ml-2 mb-36">
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-50 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400 w-full"><span
                                            class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 w-full">SVG, PNG, JPG or GIF
                                        (MAX. 800x400px)</p>
                                </div>
                                <input id="dropzone-file" name="image" type="file" class="w-full hidden" />
                            </label>
                        </div>



                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <div class="input__wrapper">
                            <input id="name" type="name" name="name" placeholder="Votre nom"
                                class="input__field xl:w-[30vw]">
                            <label for="name" class="input__label">Nom</label>


                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="input__wrapper">
                            <input id="email" type="email" name="email" placeholder="Votre email"
                                title="Minimum 6 caractères avec au moins 1 lettre et 1 chiffre"
                                class="input__field xl:w-[30vw]">
                            <label for="email" class="input__label">Email</label>


                        </div>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="input__wrapper">
                            <input id="password" type="password" name="password" placeholder="Votre mot de passe"
                                title="Minimum 6 caractères avec au moins 1 lettre et 1 chiffre"
                                class="input__field inputpass xl:w-[30vw] ">
                            <label for="password" class="input__label">Mot de passe</label>
                            <img alt="Icône œil" title="Icône œil" src="{{ asset('images/eye.svg') }}"
                                class="input__icon r-[500px" id="eyeIcon">

                        </div>
                        @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="input__wrapper">
                            <input id="password_confirmation" type="password" name="password_confirmation"
                                placeholder="Confirmez votre mot de passe"
                                title="Minimum 6 caractères avec au moins 1 lettre et 1 chiffre"
                                class="input__field  xl:w-[30vw]">
                            <label for="password_confirmation" class="input__label">Confirmez votre mot de passe</label>


                        </div>


                        <button
                            class="mt-4 bg-gradient-to-r from-yellow-400 via-red-500 to-pink-500 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out hover:scale-105 transform"
                            type="submit">S'inscrire</button>


                </form>
            </div>

            <div>


                <div class="flex">
                    <a class="m-1" href=""><i class="fab fa-facebook-f text-2xl text-blue-700"></i></a>
                    <a class="m-1" href=""><i class="fab fa-twitter text-2xl text-blue-400"></i></a>
                    <a class="m-1" href=""><i class="fab fa-instagram text-2xl text-pink-500"></i></a>
                    <a class="m-1" href=""><i class="fab fa-youtube text-2xl text-red-600"></i></a>

                </div>
                <img src="images/banner.png" alt="">


            </div>
        </div>

    </div>
    <script src="script.js"></script>
    <script>
        const input = document.querySelector(".inputpass");
        const inputIcon = document.querySelector("#eyeIcon"); // Select by id

        inputIcon.addEventListener("click", (e) => {
            e.preventDefault();

            const isPassword = input.getAttribute('type') === 'password';

            // Change the src attribute based on the current state
            inputIcon.setAttribute(
                'src',
                isPassword ? "{{ asset('images/eye-off.svg') }}" : "{{ asset('images/eye.svg') }}"
            );

            // Change the input type attribute to toggle between password and text
            input.setAttribute(
                'type',
                isPassword ? 'text' : 'password'
            );
        });
    </script>
</x-app>
