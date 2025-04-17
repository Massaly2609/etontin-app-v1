<x-app-layout>
    <!-- Main Container -->
    <div class="min-h-screen bg-gray-50">
        <!-- Contenu Principal -->
        <div class="flex h-screen">
            @include('layouts.leftBar')

            <!-- Contenu Principal -->
            <main class="flex-1 p-5 bg-gray-50 overflow-y-auto">
            <div class="py-6 px-4 sm:px-6 lg:px-8">
                <div class="max-w-7xl mx-auto">
                    <!-- En-tête héro amélioré pour la fiche participant -->
                    <div class="bg-gradient-to-r from-orange-600 to-orange-500 px-8 pt-24 pb-16 rounded-b-3xl shadow-2xl relative overflow-hidden">
                        <!-- Effet de vague décoratif -->
                        <div class="absolute bottom-0 left-0 right-0 h-12 bg-white/10"></div>

                        <div class="max-w-7xl mx-auto relative z-10">
                            <div class="flex flex-col md:flex-row items-start md:items-center justify-between">
                                <!-- Titre et fil d'Ariane -->
                                <div class="space-y-5 mb-6 md:mb-0 -mt-16">
                                    <h1 class="text-4xl font-bold text-white tracking-tight drop-shadow-md">
                                        {{ $participant->prenom }} {{ $participant->nom }}
                                    </h1>
                                    <nav class="flex space-x-2 items-center text-sm">
                                        <a href="{{ route('superadmin.dashboard') }}" class="text-orange-200 hover:text-white transition-colors">
                                            <i class="fas fa-home mr-1"></i> Tableau de bord
                                        </a>
                                        <span class="text-orange-300">/</span>
                                        <a href="{{ route('superadmin.participants.index') }}" class="text-orange-200 hover:text-white transition-colors">
                                            <i class="fas fa-users mr-1"></i> Participants
                                        </a>
                                        <span class="text-orange-300">/</span>
                                        <span class="text-white font-medium">
                                            Fiche individuelle
                                        </span>
                                    </nav>
                                </div>

                                <!-- Bouton de retour avec effet hover -->
                                <div class="hidden md:block transform transition hover:-translate-y-1 -mt-10">
                                    <a href="{{ route('superadmin.participants.index') }}"
                                    class="bg-white/20 backdrop-blur-sm hover:bg-white/30 px-6 py-3 rounded-xl text-white transition-all duration-300 flex items-center shadow-lg hover:shadow-xl">
                                        <i class="fas fa-arrow-left mr-3"></i>
                                        <span class="font-semibold">Retour à la liste</span>
                                    </a>
                                </div>
                            </div>

                            <!-- Informations secondaires -->
                            <div class="mt-8 flex items-center space-x-4 text-white">
                                <div class="flex items-center">
                                    <i class="fas fa-calendar-alt mr-2"></i>
                                    Membre depuis le {{ $participant->created_at->format('d/m/Y') }}
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-id-card mr-2"></i>
                                    CNI : {{ $participant->participant->cni ?? 'Non renseignée' }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section Informations -->
                    <div class="mt-8 space-y-8">
                        <!-- Carte Informations personnelles -->
                        <div class="bg-white rounded-2xl p-6 border border-gray-100 transition-all hover:border-orange-100">
                            <div class="flex items-center mb-6">
                                <div class="bg-orange-50 p-3 rounded-xl mr-4">
                                    <i class="fas fa-user-circle text-2xl text-orange-600"></i>
                                </div>
                                <h2 class="text-xl font-semibold text-gray-800">Profil personnel</h2>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Bloc Email -->
                                <div class="p-4 bg-gray-50 rounded-lg">
                                    <dt class="text-xs font-medium text-orange-600 uppercase">Email</dt>
                                    <dd class="mt-1 text-gray-700 flex items-center">
                                        <i class="fas fa-envelope text-gray-400 mr-2"></i>
                                        {{ $participant->email }}
                                    </dd>
                                </div>

                                <!-- Bloc Téléphone -->
                                <div class="p-4 bg-gray-50 rounded-lg">
                                    <dt class="text-xs font-medium text-orange-600 uppercase">Téléphone</dt>
                                    <dd class="mt-1 text-gray-700 flex items-center">
                                        <i class="fas fa-mobile-alt text-gray-400 mr-2"></i>
                                        {{ $participant->telephone }}
                                    </dd>
                                </div>

                                <!-- Bloc CNI -->
                                <div class="p-4 bg-gray-50 rounded-lg">
                                    <dt class="text-xs font-medium text-orange-600 uppercase">Identité</dt>
                                    <dd class="mt-1 text-gray-700 flex items-center">
                                        <i class="fas fa-id-card text-gray-400 mr-2"></i>
                                        {{ $participant->participant->cni }}
                                    </dd>
                                </div>

                                 <!-- Bloc CNI -->
                                 <div class="p-4 bg-gray-50 rounded-lg">
                                    <dt class="text-xs font-medium text-orange-600 uppercase">Adresse</dt>
                                    <dd class="mt-1 text-gray-700 flex items-center">
                                        <i class="fas fa-id-card text-gray-400 mr-2"></i>
                                        {{ $participant->participant->adresse }}
                                    </dd>
                                </div>
                            </div>
                        </div>

                        <!-- Carte Activités -->
                        <div class="bg-white rounded-2xl p-6 border border-gray-100">
                            <div class="flex items-center mb-6">
                                <div class="bg-orange-50 p-3 rounded-xl mr-4">
                                    <i class="fas fa-chart-line text-2xl text-orange-600"></i>
                                </div>
                                <h2 class="text-xl font-semibold text-gray-800">Engagements</h2>
                            </div>

                            <div class="space-y-4">
                                <h3 class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Tontines actives</h3>

                                @forelse($participant->tontines as $tontine)
                                <div class="group flex items-center justify-between p-4 rounded-xl border border-gray-100 hover:border-orange-200 transition-colors">
                                    <div>
                                        <div class="font-medium text-gray-800">{{ $tontine->libelle }}</div>
                                        <div class="text-sm text-gray-500 mt-1">
                                            <i class="far fa-calendar-check mr-2"></i>
                                            Adhésion : {{ $tontine->pivot->created_at->format('d/m/Y') }}
                                        </div>
                                    </div>
                                    <i class="fas fa-chevron-right text-gray-400 group-hover:text-orange-500 transition-colors"></i>
                                </div>
                                @empty
                                <div class="text-center p-8">
                                    <div class="text-gray-400 mb-4">
                                        <i class="fas fa-box-open text-3xl"></i>
                                    </div>
                                    <p class="text-gray-500">Aucune participation active</p>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </main>
        </div>
    </div>
</x-app-layout>
