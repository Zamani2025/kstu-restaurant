<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
      @include('sweetalert::alert')
        <div class="bg-white shadow-md" x-data="{ isOpen: false }">
          <nav class="container px-6 py-8 mx-auto md:flex md:justify-between md:items-center">
            <div class="flex items-center justify-between">
              <a class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 md:text-2xl hover:text-green-400"
                href="/">
                Kstu Restaurant
              </a>
              <!-- Mobile menu button -->
              <div @click="isOpen = !isOpen" class="flex md:hidden">
                <button type="button" class="text-gray-800 hover:text-gray-400 focus:outline-none focus:text-gray-400"
                  aria-label="toggle menu">
                  <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                    <path fill-rule="evenodd"
                      d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                    </path>
                  </svg>
                </button>
              </div>
            </div>
    
            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div :class="isOpen ? 'flex' : 'hidden'"
              class="flex-col mt-8 space-y-4 md:flex md:space-y-0 md:flex-row md:items-center md:space-x-10 md:mt-0">
              <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
                href="/">Home</a>
              <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
                href="{{route("categories.index")}}">Categories</a>
              <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
                href="{{route("menus.index")}}">Our Menu</a>
                @if (Route::has("login"))
                @auth
                  @if (Auth::user()->is_admin)
                    <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
                    href="{{ route('admin.index') }}">Dashboard</a>
                  @else
                    <p class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400">
                      Welcome {{Auth::user()->name}}
                    </p>
                    <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
                    href="{{route("logout")}}" onclick="event.preventDefault(); document.getElementById('formId').submit();">Logout</a>
                    <form action="{{route("logout")}}" id="formId" method="post" style="display: none">@csrf</form>     
                  @endif
                @else
                <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
                  href="{{route("login")}}">Login</a>
                  <a class="text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 hover:text-green-400"
                    href="{{route("register")}}">Register</a> 
                @endauth
                    
                @endif
            </div>
          </nav>
        </div>
        <div class="font-sans text-gray-900 min-h-screen antialiased">
            {{ $slot }}
        </div>
        <footer class="bg-gray-800 border-t border-gray-200">
          <div class="container flex flex-wrap items-center justify-center px-4 py-8 mx-auto lg:justify-between">
            <div class="flex flex-wrap justify-center mx-auto">
              <h4 class="flex items-center text-center space-x-4 text-white">
                 &COPY; all right reserved 2022 &nbsp; <a href="https://zamani-portfolio.herokuapp.com/" class="text-green-700" target="_blank">Designed By Saani Zamani</a>
              </h4>
            </div>
          </div>
        </footer>
    </body>
</html>
