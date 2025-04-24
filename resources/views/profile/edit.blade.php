
<x-app-layout>

    <x-slot name="header">
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 pb-32">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-white">
                    {{ __('Gestion du Profil') }}
                </h2>
                <p class="mt-2 text-lg text-indigo-100">
                    Gérez vos informations personnelles et votre sécurité
                </p>
            </div>
        </div>
    </x-slot>


    <x-slot name="header">
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 pb-32">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-white">
                    {{ __('Gestion du Profil') }}
                </h2>
                <p class="mt-2 text-lg text-indigo-100">
                    Gérez vos informations personnelles et votre sécurité
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 -mt-24" x-data="{ activeTab: 'profile' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Navigation par onglets -->
            <div class="flex space-x-4 mb-8">
                <button @click="activeTab = 'profile'"
                        :class="activeTab === 'profile' ? 'bg-white text-indigo-600 shadow-lg' : 'bg-indigo-100 text-indigo-900 hover:bg-indigo-200'"
                        class="flex-1 flex items-center justify-center p-4 rounded-lg transition-all duration-300">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                    </svg>
                    Profil
                </button>

                <button @click="activeTab = 'password'"
                        :class="activeTab === 'password' ? 'bg-white text-indigo-600 shadow-lg' : 'bg-indigo-100 text-indigo-900 hover:bg-indigo-200'"
                        class="flex-1 flex items-center justify-center p-4 rounded-lg transition-all duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                    </svg>
                    Mot de passe
                </button>

                <button @click="activeTab = 'delete'"
                        :class="activeTab === 'delete' ? 'bg-white text-indigo-600 shadow-lg' : 'bg-indigo-100 text-indigo-900 hover:bg-indigo-200'"
                        class="flex-1 flex items-center justify-center p-4 rounded-lg transition-all duration-300">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Suppression
                </button>
            </div>

            <!-- Contenu des onglets -->
            <div class="space-y-6">
                <!-- Profil -->
                <div x-show="activeTab === 'profile'" class="bg-white rounded-2xl shadow-xl p-6 sm:p-8 transition-all duration-300">
                    <div class="max-w-2xl">
                        <h3 class="text-xl font-semibold mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/>
                            </svg>
                            Informations du profil
                        </h3>
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- Mot de passe -->
                <div x-show="activeTab === 'password'" class="bg-white rounded-2xl shadow-xl p-6 sm:p-8 transition-all duration-300">
                    <div class="max-w-2xl">
                        <h3 class="text-xl font-semibold mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            Sécurité du compte
                        </h3>
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <!-- Suppression -->
                <div x-show="activeTab === 'delete'" class="bg-white rounded-2xl shadow-xl p-6 sm:p-8 transition-all duration-300">
                    <div class="max-w-2xl">

                        <div class="bg-red-50 p-4 rounded-lg">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
