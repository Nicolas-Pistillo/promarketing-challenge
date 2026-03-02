<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>@yield('title', 'Panel de soporte')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/@ryangjchandler/alpine-tooltip@1.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css" />
    <style>
        [x-cloack] {
            display: none !important;
        }
    </style>
    @livewireStyles
</head>

<body>

    <div class="min-h-full">
        <nav x-data="{ mobileMenuOpen: false }" class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <a href="{{ route('support.panel.index') }}">
                                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                                    alt="Your Company" class="size-8" />
                            </a>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">

                                <a href="{{ route('support.panel.index') }}"
                                    class="rounded-md px-3 py-2 text-sm font-medium
                                {{ Route::is('support.panel.index')
                                    ? 'bg-gray-900 text-white'
                                    : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                                    Inicio
                                </a>

                                @can('view-users')
                                    <a href="{{ route('support.panel.users.index') }}"
                                        class="rounded-md px-3 py-2 text-sm font-medium
                                    {{ Route::is('support.panel.users.*')
                                        ? 'bg-gray-900 text-white'
                                        : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                                        Usuarios
                                    </a>
                                @endcan

                                @can('view-tickets')
                                    <a href="{{ route('support.panel.tickets.index') }}"
                                        class="rounded-md px-3 py-2 text-sm font-medium
                                    {{ Route::is('support.panel.tickets.*')
                                        ? 'bg-gray-900 text-white'
                                        : 'text-gray-300 hover:bg-white/5 hover:text-white' }}">
                                        Tickets
                                    </a>
                                @endcan

                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <button type="button"
                                class="relative rounded-full p-1 
                            text-gray-400 hover:text-white">
                                <x-icon code="notifications" />
                            </button>

                            <!-- Profile dropdown -->
                            <div class="relative ml-3">
                                <x-dropdown position="right-0">
                                    <x-slot name="trigger">
                                        <button type="button"
                                            class="flex rounded-full bg-gray-800 
                                        text-sm focus:outline-2 focus:outline-offset-2 
                                        focus:outline-indigo-500 cursor-pointer">
                                            <span class="sr-only">Open user menu</span>
                                            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&color=000&background=FFF"
                                                alt="Avatar" class="size-8 rounded-full" />
                                        </button>
                                    </x-slot>

                                    <div class="p-2 border-b border-gray-200">
                                        <h4 class="font-semibold">{{ Auth::user()->name }}</h4>
                                        <small class="font-semibold text-gray-600">
                                            Nro de legajo: {{ Auth::user()->employee_number }}
                                        </small>
                                    </div>

                                    <form method="POST" action="{{ route('support.logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="w-full text-left text-gray-700 px-4 py-2 text-sm 
                                        hover:bg-gray-50 hover:text-gray-900 flex items-center cursor-pointer">
                                            <x-icon code="logout" class="mr-2 text-gray-600" />
                                            Cerrar sesion
                                        </button>
                                    </form>
                                </x-dropdown>
                            </div>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button @click="mobileMenuOpen = !mobileMenuOpen" type="button"
                            class="relative inline-flex items-center justify-center rounded-md 
                        p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 
                        focus:outline-offset-2 focus:outline-indigo-500 cursor-pointer">
                            <span class="absolute -inset-0.5"></span>
                            <x-icon code="menu" />
                        </button>
                    </div>
                </div>
            </div>

            @include('support.panel.partials.mobile-menu')
        </nav>

        <header class="relative bg-white shadow-sm">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                    @yield('title', 'Panel de soporte')
                </h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>

    <x-toast />

    @livewireScripts
</body>

</html>
