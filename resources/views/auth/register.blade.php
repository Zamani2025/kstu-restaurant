{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
<x-guest-layout>
    <section class="md:h-screen mx-auto md:w-8/12 bg-slate-100 mt-4">
        <div class="px-6 h-full text-gray-800">
          <div
            class="flex xl:justify-center lg:justify-between justify-center items-center flex-wrap h-full g-6"
          >
            <div
              class="grow-0 shrink-1 md:shrink-0 basis-auto xl:w-6/12 lg:w-6/12 md:w-9/12 mb-12 md:mb-0"
            >
              <img
                src="{{asset ("assets/coffee.jpg")}}"
                class="w-full"
                alt="Sample image"
              />
            </div>
            <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 mb-12 md:mb-0">
              <form method="POST" action="{{ route('register') }}">
                @csrf  
                <!-- Name input -->
                <div class="mb-6">
                  <input
                    type="text"
                    class="form-control block w-full @error('name') border-red-500 @enderror px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    id="exampleFormControlInput2"
                    placeholder="Name"
                    name="name"
                    :value="old('name')" 
                  />
                </div>
                @error('name')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
                <!-- Email input -->
                <div class="mb-6">
                  <input
                    type="email"
                    class="form-control block w-full @error('email') border-red-500 @enderror px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    id="exampleFormControlInput2"
                    placeholder="Email address"
                    name="email"
                    :value="old('email')" 
                  />
                </div>
                @error('email')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
      
                <!-- Password input -->
                <div class="mb-6">
                  <input
                    autocomplete="current-password"
                    type="password"
                    class="form-control @error('password') border-red-500 @enderror block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    id="exampleFormControlInput2"
                    placeholder="Password"
                    name="password"
                  />
                  @error('password')
                      <p class="text-red-500">{{$message}}</p>
                  @enderror
                </div>
                {{-- Confirm Password input --}}
                <div class="mb-6">
                    <input
                      autocomplete="current-password"
                      type="password"
                      class="form-control block w-full @error('password_confirmation') border-red-500 @enderror px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                      id="password_confirmation"
                      placeholder="Confirm Password"
                      name="password_confirmation" 
                    />
                    @error('password_confirmation')
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                  </div>
      
                <div class="text-center lg:text-left">
                  <button
                    type="submit"
                    class="inline-block px-7 py-3 bg-blue-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
                  >
                    Register
                  </button>
                  <p class="text-sm font-semibold mt-2 pt-1 mb-0">
                    Already have an account?
                    <a
                      href="{{route("login")}}"
                      class="text-red-600 hover:text-red-700 focus:text-red-700 transition duration-200 ease-in-out"
                      >Login</a
                    >
                  </p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
</x-guest-layout>