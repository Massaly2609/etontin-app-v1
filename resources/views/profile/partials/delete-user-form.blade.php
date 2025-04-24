{{-- <section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Une fois votre compte supprimé, toutes ses
                        ressources et données seront définitivement
                         supprimées. Avant de supprimer votre compte,
                        veuillez télécharger toutes les données ou
                        informations que vous souhaitez conserver.') }}
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
                {{ __('Êtes-vous sûr de vouloir supprimer votre compte ?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées.
                            Veuillez saisir votre mot de passe pour confirmer la suppression définitive de votre compte.') }}
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
</section> --}}
<section class="space-y-6">
    <header>
        <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 flex items-center">
            <svg class="w-6 h-6 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
            </svg>
            {{ __('Suppression du compte') }}
        </h2>

        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 bg-red-50 dark:bg-red-900/20 p-4 rounded-lg border border-red-100 dark:border-red-900/30">
            {{ __('Attention : Cette action est irréversible. Une fois votre compte supprimé, toutes vos données seront définitivement perdues. Nous vous recommandons fortement d\'exporter vos données avant de procéder.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="flex items-center justify-center w-full sm:w-auto px-6 py-3"
    >
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
        </svg>
        {{ __('Supprimer mon compte') }}
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <div class="relative p-6">
            <!-- Gradient Border Top -->
            <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-red-500 to-red-300"></div>

            <div class="flex items-start">
                <div class="flex-shrink-0 mt-0.5">
                    <div class="w-12 h-12 rounded-full bg-red-100 dark:bg-red-900/30 flex items-center justify-center">
                        <svg class="w-7 h-7 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                        </svg>
                    </div>
                </div>

                <div class="ml-4 flex-1">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ __('Confirmer la suppression') }}
                    </h2>

                    <div class="mt-4 space-y-4">
                        <p class="text-sm text-gray-600 dark:text-gray-300">
                            {{ __('Cette action supprimera définitivement votre compte et toutes les données associées. Cette opération ne peut pas être annulée.') }}
                        </p>

                        <div class="bg-red-50 dark:bg-red-900/10 p-4 rounded-lg border border-red-100 dark:border-red-900/20">
                            <h3 class="font-medium text-red-800 dark:text-red-200 flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ __('Avant de continuer...') }}
                            </h3>
                            <ul class="mt-2 text-xs text-red-700 dark:text-red-300 list-disc list-inside space-y-1">
                                <li>{{ __('Téléchargez vos données importantes') }}</li>
                                <li>{{ __('Annulez tous les abonnements actifs') }}</li>
                                <li>{{ __('Sauvegardez vos informations de paiement si nécessaire') }}</li>
                            </ul>
                        </div>
                    </div>

                    <form method="post" action="{{ route('profile.destroy') }}" class="mt-6">
                        @csrf
                        @method('delete')

                        <div class="space-y-4">
                            <div>
                                <x-input-label for="password" value="{{ __('Mot de passe actuel') }}" class="block mb-2 font-medium" />
                                <x-text-input
                                    id="password"
                                    name="password"
                                    type="password"
                                    class="block w-full"
                                    placeholder="{{ __('Votre mot de passe') }}"
                                    autocomplete="current-password"
                                />
                                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                            </div>

                            <div class="flex items-center">
                                <input id="confirm-deletion" name="confirm-deletion" type="checkbox" class="rounded border-gray-300 text-red-600 focus:ring-red-500">
                                <label for="confirm-deletion" class="ml-2 text-sm text-gray-600 dark:text-gray-300">
                                    {{ __('Je comprends que cette action est irréversible') }}
                                </label>
                            </div>
                        </div>

                        <div class="mt-8 flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-3">
                            <x-secondary-button
                                x-on:click="$dispatch('close')"
                                class="px-6 py-2.5 justify-center"
                            >
                                {{ __('Annuler') }}
                            </x-secondary-button>

                            <x-danger-button
                                type="submit"
                                class="px-6 py-2.5 justify-center"
                                id="submit-button"
                                disabled
                                x-data=""
                                x-init="document.getElementById('confirm-deletion').addEventListener('change', function() {
                                    document.getElementById('submit-button').disabled = !this.checked;
                                })"
                            >
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                {{ __('Supprimer définitivement') }}
                            </x-danger-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-modal>
</section>
