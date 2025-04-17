<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>



{{-- <section class="space-y-6">
    <header class="p-6 bg-gradient-to-r from-red-50 to-orange-50 dark:from-red-900/20 dark:to-red-800/20 rounded-xl border border-red-100 dark:border-red-900/50">
        <h2 class="text-2xl font-bold bg-gradient-to-r from-red-600 to-orange-600 bg-clip-text text-transparent">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-3 text-gray-600 dark:text-red-200/80 leading-relaxed">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="group flex items-center gap-2 w-full justify-center transform transition-all hover:scale-[1.02]"
    >
        <svg class="w-5 h-5 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
        </svg>
        {{ __('Delete Account') }}
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity"></div>
        <div class="fixed inset-0 flex items-center justify-center p-4">
            <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-2xl w-full max-w-lg p-6 border border-red-100 dark:border-red-900/50 glass-effect">
                <form method="post" action="{{ route('profile.destroy') }}" class="space-y-6">
                    @csrf
                    @method('delete')

                    <div class="text-center">
                        <div class="mx-auto mb-4 w-16 h-16 bg-red-100 dark:bg-red-900/20 rounded-full flex items-center justify-center">
                            <svg class="w-8 h-8 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>

                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                            {{ __('Confirm Account Deletion') }}
                        </h2>

                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                            {{ __('This action cannot be undone. All data will be permanently erased.') }}
                        </p>
                    </div>

                    <div class="space-y-4">
                        <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                        <div class="relative">
                            <x-text-input
                                id="password"
                                name="password"
                                type="password"
                                class="w-full px-4 py-3 rounded-lg border-2 border-red-100 focus:border-red-500 focus:ring-4 focus:ring-red-100 dark:border-red-900/50 dark:bg-gray-800 dark:focus:ring-red-900/20"
                                placeholder="{{ __('Enter your password to confirm') }}"
                                autocomplete="current-password"
                            />
                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-red-600 dark:text-red-400" />
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 mt-8">
                        <x-secondary-button
                            x-on:click="$dispatch('close')"
                            class="px-6 py-3 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors"
                        >
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-danger-button class="px-6 py-3 bg-gradient-to-r from-red-600 to-orange-600 hover:from-red-700 hover:to-orange-700 shadow-lg transition-all">
                            {{ __('Permanently Delete Account') }}
                        </x-danger-button>
                    </div>
                </form>
            </div>
        </div>
    </x-modal>
</section>

<style>
.glass-effect {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.2);
}
</style> --}}
