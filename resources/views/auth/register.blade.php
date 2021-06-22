<x-guest-layout>

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

        <!-- Lastname -->
        <div>
            <x-label for="lastname" :value="__('Nom')" />

            <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus />
        </div>

        <!-- Firstname -->
        <div>
            <x-label for="firstname" :value="__('Prénom')" />

            <x-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus />
        </div>

        <!-- Phonenumber -->
        <div>
            <x-label for="phonenumber" :value="__('Numéro de téléphone')" />

            <x-input id="phonenumber" class="block mt-1 w-full" type="number" name="phonenumber" :value="old('phonenumber')" required autofocus />
        </div>

        <!-- Town -->
        <div>
            <x-label for="town" :value="__('Ville')" />

            <x-input id="town" class="block mt-1 w-full" type="text" name="town" :value="old('town')" required autofocus />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-label for="email" :value="__('Email')" />

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-label for="password" :value="__('Mot de passe')" />

            <x-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-label for="password_confirmation" :value="__('Confirmez mot de passe')" />

            <x-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required />
        </div>

        <div class="flex items-center justify-end mt-4">
            <!-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Déjà enregistré ?') }}
            </a> -->

            <x-button class="ml-4">
                {{ __('enregistrer') }}
            </x-button>
        </div>
    </form>
</x-auth-card>
</x-guest-layout>
