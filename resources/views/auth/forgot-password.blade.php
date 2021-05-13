<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Zapomniałeś hasła? Wypełnij poniższe pole, a my wyślemy tobie e-maila z linkiem resetującym hasło.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('E-mail:')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-button>
                    {{ __('Resetuj hasło') }}
                </x-button>
                <x-button class="ml-2 bg-blue-500">
                    <a href="{{route('login')}}"> {{ __('Powrót') }}
                 </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
