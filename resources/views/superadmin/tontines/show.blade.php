<x-app-layout>
     <!-- Main Container -->
     <div class="min-h-screen bg-gray-50">
        <!-- Contenu Principal -->
        <div class="flex h-screen">
             @include('layouts.leftBar')


                <main class="flex-1 p-5 bg-gray-50 overflow-y-auto">
                    <!-- En-tête avec effet glassmorphisme -->
                    <div class="bg-gradient-to-r from-blue-600 to-blue-500 px-8 pt-24 pb-16 rounded-b-[40px] shadow-2xl  overflow-hidden">
                        <div class="max-w-7xl mx-auto relative z-10">
                            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-8">
                                <div class="space-y-4 -mt-16 ">
                                    <div class="flex items-center gap-4">
                                        <div class="p-4 bg-white/10 backdrop-blur-sm rounded-2xl border border-white/20">
                                            <i class="fas fa-piggy-bank text-4xl text-white"></i>
                                        </div>
                                        <div>
                                            <h1 class="text-4xl font-bold text-white mb-2">
                                                {{ $tontine->libelle }}
                                            </h1>
                                            <div class="flex items-center gap-3 text-white/90">
                                                <span class="flex items-center gap-2">
                                                    <i class="fas fa-calendar-star"></i>
                                                    Créée le {{ $tontine->created_at->format('d/m/Y') }}
                                                </span>
                                                <span class="w-1 h-1 bg-white/30 rounded-full"></span>
                                                <span class="flex items-center gap-2">
                                                    <span class="w-2 h-2 {{ $tontine->dateFin > now() ? 'bg-green-400' : 'bg-red-400' }} rounded-full animate-pulse"></span>
                                                    {{ $tontine->dateFin > now() ? 'Active' : 'Terminée' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Timeline visuelle -->
                                    <div class="w-full bg-white/10 backdrop-blur-sm p-4 rounded-xl border border-white/20">
                                        <div class="flex justify-between items-center text-white text-sm">
                                            <div class="text-center">
                                                <p class="font-medium">{{ $tontine->dateDebut->format('d M Y') }}</p>
                                                <p class="text-white/70">Début</p>
                                            </div>
                                            <div class="flex-1 h-px bg-white/20 mx-4"></div>
                                            <div class="text-center">
                                                <p class="font-medium">{{ $tontine->dateFin->format('d M Y') }}</p>
                                                <p class="text-white/70">Fin prévue</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Statistiques en temps réel -->
                                <div class="bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-white/20 -mt-16">
                                    <div class="grid grid-cols-2 gap-4 text-white">
                                        <div class="text-center">
                                            <p class="text-3xl font-bold">{{ number_format($tontine->montant_total, 0, ',', ' ') }}</p>
                                            <p class="text-sm opacity-80">FCFA collectés</p>
                                        </div>
                                        <div class="text-center">
                                            <p class="text-3xl font-bold">{{ $tontine->nbreParticipant }}</p>
                                            <p class="text-sm opacity-80">Participants</p>
                                        </div>
                                        <div class="col-span-2">
                                            <div class="h-2 bg-white/20 rounded-full overflow-hidden">
                                                <div class="h-full bg-green-400" style="width: 65%"></div>
                                            </div>
                                            <p class="text-xs mt-2 text-center">65% des objectifs atteints</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contenu principal -->
                    <div class="max-w-7xl mx-auto px-8 -mt-10">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                            <!-- Section gauche -->
                            <div class="lg:col-span-2 space-y-8">
                                <!-- Carte Gérant -->
                                <div class="bg-white rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-shadow">
                                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-3">
                                        <i class="fas fa-user-tie text-blue-600"></i>
                                        Responsable de la tontine
                                    </h2>
                                    <div class="flex items-center gap-4">
                                        <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center">
                                            <i class="fas fa-user text-blue-600 text-2xl"></i>
                                        </div>
                                        <div>
                                            <p class="text-lg font-semibold">{{ $tontine->gerant->prenom }} {{ $tontine->gerant->nom }}</p>
                                            <div class="flex items-center gap-2 text-gray-600 mt-1">
                                                <i class="fas fa-phone"></i>
                                                <span>{{ $tontine->gerant->telephone }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Détails financiers -->
                                <div class="bg-white rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-shadow">
                                    <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-3">
                                        <i class="fas fa-chart-pie text-purple-600"></i>
                                        Répartition des fonds
                                    </h2>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="p-4 bg-blue-50 rounded-xl">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <p class="text-sm text-gray-600">Capital de base</p>
                                                    <p class="text-2xl font-bold text-blue-600 mt-1">
                                                        {{ number_format($tontine->montant_de_base, 0, ',', ' ') }} FCFA
                                                    </p>
                                                </div>
                                                <i class="fas fa-database text-blue-200 text-3xl"></i>
                                            </div>
                                        </div>
                                        <div class="p-4 bg-green-50 rounded-xl">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <p class="text-sm text-gray-600">Bénéfices générés</p>
                                                    <p class="text-2xl font-bold text-green-600 mt-1">
                                                        {{ number_format($tontine->montant_total - $tontine->montant_de_base, 0, ',', ' ') }} FCFA
                                                    </p>
                                                </div>
                                                <i class="fas fa-chart-line text-green-200 text-3xl"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Activités récentes -->
                                <div class="bg-white rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-shadow">
                                    <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center gap-3">
                                        <i class="fas fa-list-check text-amber-600"></i>
                                        Dernières activités
                                    </h2>
                                    <div class="space-y-4">
                                        <div class="flex items-center gap-4 p-3 hover:bg-gray-50 rounded-lg transition-colors">
                                            <div class="space-y-4">
                                                @forelse($recentParticipants as $participant)
                                                <div class="flex items-start p-3 hover:bg-gray-50 rounded-lg transition-colors">
                                                    <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 mr-3">
                                                        <i class="fas fa-user-plus"></i>
                                                    </div>
                                                    <div>
                                                        <p class="font-medium">Nouveau participant</p>
                                                        <p class="text-sm text-gray-500">
                                                            {{ $participant->user->prenom }} {{ $participant->user->nom }} a rejoint la tontine
                                                        </p>
                                                        <p class="text-xs text-gray-400 mt-1">
                                                            {{ $participant->created_at->diffForHumans() }}
                                                            @if($participant->created_at->isToday())
                                                                (Aujourd'hui)
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                                @empty
                                                <div class="text-center py-4 text-gray-500">
                                                    Aucun nouveau participant récent
                                                </div>
                                                @endforelse
                                            </div>
                                        </div>
                                        <!-- Plus d'activités... -->
                                    </div>
                                </div>
                            </div>

                            <!-- Section droite -->
                            <div class="space-y-8">
                                <!-- Carte Fréquence -->
                                <div class="bg-white rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-shadow">
                                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-3">
                                        <i class="fas fa-sync-alt text-green-600"></i>
                                        Rythme des cotisations
                                    </h2>
                                    <div class="text-center p-4 bg-green-50 rounded-xl">
                                        <p class="text-3xl font-bold text-green-600">{{ $tontine->frequence }}</p>
                                        <p class="text-sm text-gray-600 mt-1">Période de contribution</p>
                                    </div>
                                </div>

                                <!-- Membres -->
                                <div class="bg-white rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-shadow">
                                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-3">
                                        <i class="fas fa-users text-purple-600"></i>
                                        Participants
                                    </h2>
                                    <div class="grid grid-cols-3 gap-4">
                                        @for($i = 0; $i < min(6, $tontine->nbreParticipant); $i++)
                                        <div class="aspect-square bg-purple-50 rounded-xl flex items-center justify-center">
                                            <i class="fas fa-user text-purple-400"></i>
                                        </div>
                                        @endfor
                                        @if($tontine->nbreParticipant > 6)
                                        <div class="aspect-square bg-purple-50 rounded-xl flex items-center justify-center">
                                            <span class="text-purple-600">+{{ $tontine->nbreParticipant - 6 }}</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="bg-white rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-shadow">
                                    <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-3">
                                        <i class="fas fa-align-left text-red-600"></i>
                                        À propos
                                    </h2>

                                    <p class="text-gray-600 leading-relaxed">
                                        {{ $tontine->description }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Bouton de retour -->
                        <div class="mt-8">
                            <a href="{{ route('superadmin.tontines.index') }}"
                               class="inline-flex items-center px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl transition-colors">
                               <i class="fas fa-arrow-left mr-2"></i>
                               Retour à la liste
                            </a>
                        </div>
                    </div>
                </main>
        </div>
    </div>
</x-app-layout>
