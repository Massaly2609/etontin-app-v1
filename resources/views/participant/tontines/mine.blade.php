<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <div class="flex flex-col lg:flex-row h-screen overflow-hidden">
            @include('layouts.leftbarParticipant')

            <main class="flex-1 overflow-y-auto overflow-x-hidden bg-gray-50">
                <!-- En-tête -->
                <div class="relative p-5 bg-gradient-to-r from-indigo-700 to-purple-700 shadow-2xl overflow-hidden">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-white/5 to-transparent"></div>
                    <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
                        <div class="py-10">
                            <h1 class="text-4xl font-extrabold text-white tracking-wide drop-shadow-lg">
                                <span class="bg-clip-text text-transparent bg-gradient-to-r from-white to-indigo-200">
                                    Mes Tontines Actives
                                </span>
                            </h1>
                            <p class="text-indigo-100 mt-2 flex items-center gap-2 text-sm">
                                <span class="animate-pulse">✨</span>
                                <span>Gérez vos participations aux différentes tontines</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Contenu principal -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                    @if($tontines->isEmpty())
                        <div class="bg-white rounded-xl shadow p-8 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="mt-2 text-lg font-medium text-gray-900">Aucune tontine active</h3>
                            <p class="mt-1 text-sm text-gray-500">Vous n'êtes actuellement membre d'aucune tontine.</p>
                            <div class="mt-6">
                                <a href="{{ route('participant.tontines.available') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors inline-flex items-center">
                                    <i class="fas fa-hand-holding-usd mr-2"></i>
                                    Rejoindre une tontine
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($tontines as $tontine)
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-[1.02] hover:shadow-xl border-t-4 border-indigo-500">
                                <div class="p-6">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="text-lg font-bold text-gray-900">{{ $tontine->libelle }}</h3>
                                            <span class="inline-block mt-1 px-2 py-1 text-xs font-semibold rounded-full bg-indigo-100 text-indigo-800">
                                                {{ $tontine->type }}
                                            </span>
                                        </div>
                                        <div class="bg-indigo-100 p-2 rounded-lg">
                                            <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                    </div>

                                    <p class="mt-3 text-sm text-gray-500">{{ Str::limit($tontine->description, 100) }}</p>

                                    <div class="mt-4 grid grid-cols-2 gap-4">
                                        <div>
                                            <p class="text-xs text-gray-500">Montant</p>
                                            <p class="text-sm font-medium">{{ number_format($tontine->montant_de_base, 0, ',', ' ') }} FCFA</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500">Membres</p>
                                            <p class="text-sm font-medium">{{ $tontine->participants_count }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500">Prochaine échéance</p>
                                            <p class="text-sm font-medium">{{ $tontine->prochaineEcheance() }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500">Statut</p>
                                            <p class="text-sm font-medium text-green-600">Active</p>
                                        </div>
                                    </div>

                                    <div class="mt-6 flex justify-between">
                                        <a href="{{ route('participant.tontines.show', $tontine) }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium flex items-center">
                                            Détails <i class="fas fa-chevron-right ml-1 text-xs"></i>
                                        </a>
                                        <form action="{{ route('participant.tontines.leave', $tontine) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium flex items-center" onclick="return confirm('Êtes-vous sûr de vouloir quitter cette tontine?')">
                                                Quitter <i class="fas fa-sign-out-alt ml-1 text-xs"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
