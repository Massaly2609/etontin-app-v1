<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <div class="flex h-screen">
            @include('layouts.leftBarGerant')

            <main class="flex-1 p-5 overflow-y-auto">
                <!-- En-tête élégant -->
                <div class="bg-gradient-to-r from-emerald-600 to-teal-500 px-6 py-12 sm:px-8 rounded-b-3xl shadow-lg">
                    <div class="max-w-7xl mx-auto">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-12 w-12 rounded-full bg-white/20 flex items-center justify-center mr-4">
                                        <span class="text-white text-xl font-medium">
                                            {{ substr($participant->user->prenom, 0, 1) }}{{ substr($participant->user->nom, 0, 1) }}
                                        </span>
                                    </div>
                                    <div>
                                        <h1 class="text-3xl sm:text-4xl font-bold text-white tracking-tight">
                                            {{ $participant->user->prenom }} {{ $participant->user->nom }}
                                        </h1>
                                        <p class="text-emerald-100 text-lg">
                                            Fiche détaillée du participant
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex space-x-3">
                                <a href="{{ route('gerant.participants.edit', $participant) }}" class="inline-flex items-center px-4 py-2 bg-white/20 hover:bg-white/30 backdrop-blur-sm border border-white/30 rounded-lg text-white font-medium transition duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    Modifier
                                </a>
                                <a href="{{ route('gerant.participants.index') }}" class="inline-flex items-center px-4 py-2 bg-white text-emerald-600 hover:bg-white/90 rounded-lg font-medium transition duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                    </svg>
                                    Retour
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contenu principal -->
                <div class="max-w-7xl mx-auto px-6 sm:px-8 py-8 -mt-2">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <!-- Colonne gauche - Informations personnelles -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Carte Informations -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        Informations personnelles
                                    </h3>
                                </div>
                                <div class="px-6 py-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <p class="text-sm font-medium text-gray-500">Nom complet</p>
                                            <p class="mt-1 text-base text-gray-900">{{ $participant->user->prenom }} {{ $participant->user->nom }}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-500">CNI</p>
                                            <p class="mt-1 text-base text-gray-900">{{ $participant->cni }}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-500">Email</p>
                                            <p class="mt-1 text-base text-gray-900">{{ $participant->user->email }}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-500">Téléphone</p>
                                            <p class="mt-1 text-base text-gray-900">{{ $participant->user->telephone }}</p>
                                        </div>
                                        <div class="md:col-span-2">
                                            <p class="text-sm font-medium text-gray-500">Adresse</p>
                                            <p class="mt-1 text-base text-gray-900">{{ $participant->adresse }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Section Tontines -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        Tontines participées
                                    </h3>
                                </div>
                                <div class="divide-y divide-gray-200">
                                    @if( $participant->$tontines && count($participant->$tontines) > 0)
                                        @foreach($participant->tontines as $tontine)
                                        <div class="px-6 py-4 hover:bg-gray-50 transition-colors">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <p class="font-medium text-gray-900">{{ $tontine->libelle }}</p>
                                                    <p class="text-sm text-gray-500 mt-1">Du {{ $tontine->dateDebut->format('d/m/Y') }} au {{ $tontine->dateFin->format('d/m/Y') }}</p>
                                                </div>
                                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                                                    {{ $tontine->pivot->role ?? 'Membre' }}
                                                </span>
                                            </div>
                                        </div>
                                        @endforeach
                                    @else
                                        <div class="px-6 py-4 text-center text-gray-500">
                                            Ce participant n'est inscrit à aucune tontine
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Colonne droite - Statistiques et actions -->
                        <div class="space-y-6">
                            <!-- Carte Statut -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                        </svg>
                                        Statut
                                    </h3>
                                </div>
                                <div class="px-6 py-4">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <span class="flex-shrink-0 h-3 w-3 rounded-full bg-emerald-400"></span>
                                            <span class="ml-2 text-base font-medium text-gray-900">
                                                Actif
                                            </span>
                                        </div>
                                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                                            Membre depuis {{ $participant->created_at->format('d/m/Y') }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Carte Actions -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                                    <h3 class="text-lg font-semibold text-gray-800">
                                        Actions
                                    </h3>
                                </div>
                                <div class="p-4 space-y-3">
                                    <a href="#" class="block w-full text-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                                        Voir les cotisations
                                    </a>
                                    <form action="{{ route('gerant.participants.destroy', $participant) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce participant ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="block w-full text-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                                            Supprimer le participant
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- Carte Dernière activité -->
                            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Dernière activité
                                    </h3>
                                </div>
                                <div class="px-6 py-4">
                                    <p class="text-sm text-gray-500">
                                        Dernière connexion :
                                        <span class="font-medium text-gray-900">
                                            @if($participant->user->last_login_at)
                                                {{ $participant->user->last_login_at->diffForHumans() }}
                                            @else
                                                Jamais connecté
                                            @endif
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
