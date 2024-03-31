<x-app title="Login">

    @if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
@endif

@if (session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
    <strong class="font-bold">Success!</strong>
    <span class="block sm:inline">{{ session('success') }}</span>
</div>
@endif
<div class="flex items-center mt-4 justify-center bg-cover bg-center bg-gradient-to-b from-blue-600 to-blue-400" style="background-image: url('images/hero-image.png');">

        <div class="shadow-2xl rounded-md m-8  w-[90%]  sm:w-[80%]  bg-gray-200 bg-opacity-50">

          
            <div class=" flex flex-col sm:flex-row items-center mb-8   w-full sm:justify-around  ">
              <form method="POST" action="{{ route('login') }}">
                    @csrf
            
                    <div class="box  bg-gray-200 bg-opacity-50">
                        <h1 class="text-center m-4 text-3xl underline">Login </h1>
              

                  

                  
                        <div class="input__wrapper">
                            <input id="email" type="email" name="email" placeholder="Your email"
                                title="Minimum 6 characters at least 1 Alphabet and 1 Number"
                                class="input__field xl:w-[30vw]">
                            <label for="email" class="input__label">Email</label>


                        </div>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="input__wrapper">
                            <input id="password" type="password" name="password" placeholder="Your Password"
                                title="Minimum 6 characters at least 1 Alphabet and 1 Number"
                                class="input__field inputpass xl:w-[30vw] ">
                            <label for="password" class="input__label">Password</label>
                            <img alt="Eye Icon" title="Eye Icon" src="{{ asset('images/eye.svg') }}"
                                class="input__icon r-[500px" id="eyeIcon">

                        </div>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div>
                       
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                
                    
                        </div>
                        <button class="mt-4 bg-gradient-to-r from-yellow-400 via-red-500 to-pink-500 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out hover:scale-105 transform"
    type="submit">Login</button>
                           
                            <div class="register-link">
                                <p>Don't have an account? <a class="underline" href="{{route('register')}}">Register</a></p>
                            </div>
                </form>
              
            </div>

            <div>
                

                <div class="flex">
                    

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
