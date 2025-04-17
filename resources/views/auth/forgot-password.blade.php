{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<x-guest-layout>
    <div class="w-full max-w-md bg-white dark:bg-gray-900 shadow-lg rounded-2xl p-6">
        <h2 class="text-center text-3xl font-bold text-gray-900 dark:text-white mb-6">
            Réinitialisation du mot de passe
        </h2>

        <div class="mb-6 text-gray-600 dark:text-gray-300 text-1xl">
            {{ __("Indiquez votre adresse e-mail et nous vous enverrons un lien de réinitialisation.") }}
        </div>

        <x-auth-session-status class="mb-6" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-base dark:text-gray-300" />
                <x-text-input id="email"
                            class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white p-3 mt-1 text-base"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus
                            autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500 text-sm" />
            </div>

            <div class="flex items-center justify-end">
                <x-primary-button class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition-all shadow-md text-base">
                    {{ __('Envoyer le lien de réinitialisation') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
