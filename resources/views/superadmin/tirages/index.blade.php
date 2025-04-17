<!-- resources/views/superadmin/tirages/index.blade.php -->
<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <div class="flex h-screen">
            @include('layouts.leftBar')

            <main class="flex-1 p-6 bg-gray-50 overflow-y-auto">
                <div class="mb-8 bg-gradient-to-r from-purple-50 to-indigo-50 rounded-xl p-6 border border-gray-100 shadow-sm">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div>
                            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 flex items-center">
                                <span class="bg-purple-600 text-white p-2 rounded-lg mr-3 shadow-md">
                                    <i class="fas fa-trophy"></i>
                                </span>
                                Tirages pour: {{ $tontine->libelle }}
                            </h1>
                            <nav class="flex items-center space-x-2 text-sm text-gray-600 mt-3 ml-11">
                                <a href="{{ route('superadmin.tontines.index') }}"
                                   class="text-blue-600 hover:text-blue-800 hover:underline flex items-center">
                                    <i class="fas fa-chevron-left mr-1 text-xs"></i> Retour aux tontines
                                </a>
                                <span class="text-gray-400">|</span>
                                <a href="{{ route('superadmin.tontines.show', $tontine) }}"
                                   class="text-blue-600 hover:text-blue-800 hover:underline flex items-center">
                                    <i class="fas fa-info-circle mr-1"></i> Détails de la tontine
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Section d'information -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Statut du tirage</h3>
                        @if($canDraw)
                            <div class="flex items-center">
                                <div class="p-2 rounded-full bg-green-100 text-green-600 mr-3">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div>
                                    <p class="font-medium">Tirage possible</p>
                                    <p class="text-sm text-gray-500">{{ $participantsEligibles->count() }} participants éligibles</p>
                                </div>
                            </div>
                        @else
                            <!-- Message tirage impossible -->
                            <div class="flex items-center">
                                <div class="p-2 rounded-full bg-yellow-100 text-yellow-600 mr-3">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <div>
                                    <p class="font-medium">Tirage impossible</p>
                                    <p class="text-sm text-gray-500">Pas assez de participants éligibles</p>
                                </div>
                            </div>
                        @endif

                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Participants éligibles</h3>
                        <div class="space-y-2 max-h-96 overflow-y-auto">
                            @forelse($participantsEligibles as $participant)
                            <div class="flex justify-between items-center p-2 hover:bg-gray-50 rounded">
                                <div class="flex items-center min-w-0">
                                    <div class="shrink-0 h-8 w-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 mr-3">
                                        {{ strtoupper(substr($participant->prenom, 0, 1).strtoupper(substr($participant->nom, 0, 1))) }}
                                    </div>
                                    <span class="truncate">{{ $participant->prenom }} {{ $participant->nom }}</span>
                                </div>
                                <span class="text-sm text-gray-500 whitespace-nowrap">
                                    {{ number_format($tontine->montant_de_base, 0, ',', ' ') }} FCFA
                                </span>
                            </div>


                            @empty
                            <p class="text-gray-500 text-sm p-2">Aucun participant éligible</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Effectuer un tirage</h3>

                        @if($canDraw)
                            <form method="POST" action="{{ route('superadmin.tontines.tirages.store', $tontine) }}">
                                @csrf
                                <button type="submit"
                                        class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white py-3 px-4 rounded-lg flex items-center justify-center transition-all shadow-md hover:shadow-lg">
                                    <i class="  fas fa-random mr-2"></i> Effectuer le tirage
                                </button>
                            </form>
                            <p class="mt-3 text-sm text-gray-500">
                                Un participant sera sélectionné aléatoirement parmi les éligibles.
                            </p>
                        @else
                            <button disabled
                                    class="w-full bg-gray-200 text-gray-500 py-3 px-4 rounded-lg flex items-center justify-center cursor-not-allowed">
                                <i class="fas fa-ban mr-2"></i> Tirage indisponible
                            </button>
                            <p class="mt-3 text-sm text-gray-500">
                                Le tirage nécessite au moins 1 participant éligible.
                            </p>
                        @endif
                    </div>
                </div>

                <!-- Historique des tirages -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                        <h3 class="text-lg font-medium text-gray-900">Historique des tirages</h3>
                    </div>
                    <div class="divide-y divide-gray-100">
                        @forelse($tontine->tirages as $tirage)
                            <div class="px-6 py-4 hover:bg-gray-50 transition-colors">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center text-green-600 mr-4">
                                            <i class="fas fa-trophy"></i>
                                        </div>
                                        <div>
                                            <p class="font-medium">{{ $tirage->user->prenom }} {{ $tirage->user->nom }}</p>
                                            <p class="text-sm text-gray-500">Gagnant du {{ $tirage->created_at->format('d/m/Y à H:i') }}</p>
                                        </div>
                                    </div>
                                    <span class="text-green-600 font-medium">{{ number_format($tontine->montant_total, 0, ',', ' ') }} FCFA</span>
                                </div>
                            </div>
                        @empty
                            <div class="px-6 py-8 text-center">
                                <div class="text-gray-400 mb-3">
                                    <i class="fas fa-trophy fa-2x"></i>
                                </div>
                                <p class="text-gray-500">Aucun tirage effectué pour cette tontine</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
