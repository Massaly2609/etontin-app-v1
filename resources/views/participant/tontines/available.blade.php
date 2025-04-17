<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <div class="flex flex-col lg:flex-row h-screen overflow-hidden">
            @include('layouts.leftbarParticipant')

            <main class="flex-1 overflow-y-auto overflow-x-hidden bg-gray-50">
                <!-- En-tête -->
                <div class="relative p-5 bg-gradient-to-r from-green-700 to-teal-700 shadow-2xl overflow-hidden">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-white/5 to-transparent"></div>
                    <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
                        <div class="py-10">
                            <h1 class="text-4xl font-extrabold text-white tracking-wide drop-shadow-lg">
                                <span class="bg-clip-text text-transparent bg-gradient-to-r from-white to-green-200">
                                    Tontines Disponibles
                                </span>
                            </h1>
                            <p class="text-green-100 mt-2 flex items-center gap-2 text-sm">
                                <span class="animate-pulse">✨</span>
                                <span>Rejoignez de nouvelles tontines et développez votre épargne</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Contenu principal -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                    @if($user->tontines()->count() >= 2)
                        <div class="bg-white rounded-xl shadow p-8 text-center">
                            <svg class="mx-auto h-12 w-12 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <h3 class="mt-2 text-lg font-medium text-gray-900">Limite de participation atteinte</h3>
                            <p class="mt-1 text-sm text-gray-500">
                                Vous êtes déjà inscrit à 2 tontines. Vous ne pouvez pas rejoindre d'autres tontines pour le moment.
                            </p>
                            <div class="mt-6">
                                <a href="{{ route('participant.tontines.index') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors inline-flex items-center">
                                    <i class="fas fa-piggy-bank mr-2"></i>
                                    Voir mes tontines
                                </a>
                            </div>
                        </div>
                    @elseif($tontines->isEmpty())
                        <div class="bg-white rounded-xl shadow p-8 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="mt-2 text-lg font-medium text-gray-900">Aucune tontine disponible</h3>
                            <p class="mt-1 text-sm text-gray-500">Toutes les tontines sont actuellement complètes ou vous y êtes déjà inscrit.</p>
                            <div class="mt-6">
                                <a href="{{ route('participant.tontines.index') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors inline-flex items-center">
                                    <i class="fas fa-piggy-bank mr-2"></i>
                                    Voir mes tontines
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="bg-white rounded-xl shadow overflow-hidden">
                            <div class="px-6 py-4 border-b border-gray-200 bg-white">
                                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                    <h2 class="text-lg font-medium text-gray-900">Tontines disponibles pour rejoindre</h2>
                                    <div class="relative w-full sm:w-64">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                            </svg>
                                        </div>
                                        <input type="text" placeholder="Rechercher..." class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-green-500 focus:border-green-500 transition duration-150">
                                    </div>
                                </div>
                            </div>

                            <div class="divide-y divide-gray-200">
                                @foreach($tontines as $tontine)
                                <div class="px-6 py-4 hover:bg-gray-50 transition-colors duration-150">
                                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                        <div class="min-w-0">
                                            <div class="flex items-center gap-2">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    {{ $tontine->type }}
                                                </span>
                                                <h3 class="text-base font-medium text-gray-900 truncate">{{ $tontine->libelle }}</h3>
                                            </div>
                                            <p class="mt-1 text-sm text-gray-500">{{ Str::limit($tontine->description, 120) }}</p>
                                            <div class="mt-2 flex flex-wrap gap-4">
                                                <div class="flex items-center text-sm text-gray-500">
                                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    {{ number_format($tontine->montant_de_base, 0, ',', ' ') }} FCFA
                                                </div>
                                                <div class="flex items-center text-sm text-gray-500">
                                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    {{ $tontine->dateFin->format('d/m/Y') }}
                                                </div>
                                                <div class="flex items-center text-sm text-gray-500">
                                                    <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                                    </svg>
                                                    {{ $tontine->participants_count }} membres
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('participant.tontines.join-form', $tontine) }}"
                                           class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors duration-300 inline-flex items-center">
                                            <i class="fas fa-sign-in-alt mr-2"></i>
                                            Rejoindre
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                                {{ $tontines->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
