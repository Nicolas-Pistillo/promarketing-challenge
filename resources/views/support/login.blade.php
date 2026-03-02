<x-basic-layout>
    <div class="flex min-h-screen flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company"
            class="mx-auto h-10 w-auto" />
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">
                Promarketing Challenge
            </h2>
            <p class="text-center text-gray-500">
                Ingresar como agente de soporte
            </p>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form action="{{ route('support.login') }}" method="POST" class="space-y-6">
                @csrf

                <x-form-input name="email" type="email" icon="mail" label="Email" value="{{ old('email') }}" />

                <x-form-input name="password" icon="lock" type="password" label="Contraseña" />

                <x-button class="mb-3" size="large" submit class="w-full cursor-pointer">
                    Iniciar sesion
                </x-button>

                @error('login_failed')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </form>
        </div>
    </div>
</x-basic-layout>
