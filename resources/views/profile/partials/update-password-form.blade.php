{{-- <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" :value="__('Current Password')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section> --}}

<section class="max-w-2xl">
    <header class="border-b border-slate-100 pb-6">
        <h2 class="text-2xl font-semibold text-slate-800">
            🔒 {{ __('Paramètre de sécurités') }}
        </h2>
        <p class="mt-3 text-sm text-slate-500">
            {{ __('Protégez votre compte avec un mot de passe fort et unique. Nous vous recommandons d\'utiliser un mélange de lettres, de chiffres et de symboles.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-8 space-y-8">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="relative">
            <div class="flex items-center justify-between mb-3">
                <label for="current_password" class="block text-lg font-medium text-slate-700">
                    {{ __('Mot de passe actuel') }}
                </label>
            </div>
            <div class="relative">
                <input
                    id="current_password"
                    name="current_password"
                    type="password"
                    autocomplete="current-password"
                    class="w-full px-4 py-3 pl-11 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                    placeholder="••••••••"
                >
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </span>
            </div>
            @error('current_password', 'updatePassword')
                <p class="mt-2 text-sm text-rose-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- New Password -->
        <div class="relative">
            <div class="flex items-center justify-between mb-3">
                <label for="password" class="block text-lg font-medium text-slate-700">
                    {{ __('Nouveau mot de passe') }}
                </label>
            </div>
            <div class="relative">
                <input
                    id="password"
                    name="password"
                    type="password"
                    autocomplete="new-password"
                    class="w-full px-4 py-3 pl-11 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                    placeholder="••••••••"
                >
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                    </svg>
                </span>
            </div>
            @error('password', 'updatePassword')
                <p class="mt-2 text-sm text-rose-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="relative">
            <div class="flex items-center justify-between mb-3">
                <label for="password_confirmation" class="block text-lg font-medium text-slate-700">
                    {{ __('Confirmer le nouveau mot de passe') }}
                </label>
            </div>
            <div class="relative">
                <input
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    autocomplete="new-password"
                    class="w-full px-4 py-3 pl-11 rounded-lg bg-slate-50 border border-slate-200 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition-all"
                    placeholder="••••••••"
                >
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </span>
            </div>
        </div>

        <div class="flex items-center gap-4 mt-10">
            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-medium rounded-lg transition-all transform hover:-translate-y-0.5 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                {{ __('Mettre à jour le mot de passe') }}
            </button>

            @if (session('status') === 'password-updated')
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2500)" class="flex items-center px-4 py-2 bg-emerald-100 text-emerald-700 rounded-full text-lg">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    {{ __('Mot de passe mis à jour !') }}
                </div>
            @endif
        </div>
    </form>
</section>
