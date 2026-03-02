<section x-show="mobileMenuOpen" x-cloak x-collapse id="mobile-menu" class="block md:hidden">
    <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
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
    <div class="border-t border-white/10 pt-4 pb-3">
        <div class="flex items-center px-5">
            <div class="shrink-0">
                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&color=000&background=FFF"
                    alt="Avatar" class="size-10 rounded-full outline -outline-offset-1 outline-white/10" />
            </div>
            <div class="ml-3">
                <div class="text-base/5 font-medium text-white">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-white">Nro de legajo: {{ Auth::user()->employee_number }}</div>
                <div class="text-sm font-medium text-gray-400">{{ Auth::user()->email }}</div>
            </div>
            <button type="button"
                class="relative ml-auto shrink-0 rounded-full p-1 text-gray-400">
                <x-icon code="notifications" class="size-6" />
            </button>
        </div>
        <div class="mt-3 space-y-1 px-2">
            <form method="POST" action="{{ route('support.logout') }}">
                @csrf
                <button type="submit"
                class="w-full text-left text-gray-300 px-4 py-2 text-sm 
                flex items-center cursor-pointer">
                    <x-icon code="logout" class="mr-2 text-gray-300" />
                    Cerrar sesion
                </button>
            </form>
        </div>
    </div>
</section>
