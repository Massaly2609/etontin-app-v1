<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <div class="flex flex-col lg:flex-row h-screen overflow-hidden">
            @include('layouts.leftbarParticipant')

            <main class="flex-1 overflow-y-auto overflow-x-hidden bg-gray-50">
                <!-- En-tête -->
                <div class="relative p-5 bg-gradient-to-r from-blue-700 to-indigo-700 shadow-2xl overflow-hidden">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-white/5 to-transparent"></div>
                    <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
                        <div class="flex flex-col md:flex-row justify-between items-center py-10 gap-8">
                            <div>
                                <h1 class="text-4xl font-extrabold text-white tracking-wide drop-shadow-lg">
                                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-200">
                                        {{ $tontine->libelle }}
                                    </span>
                                </h1>
                                <p class="text-blue-100 mt-2 flex items-center gap-2 text-sm">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-200 text-blue-800">
                                        {{ $tontine->type }}
                                    </span>
                                    <span>{{ $tontine->participants->count() }} membres</span>
                                </p>
                            </div>

                            <div class="flex gap-3">
                                <a href="{{ route('participant.cotisations.create', $tontine) }}"
                                   class="px-4 py-2 bg-white hover:bg-gray-100 text-blue-700 text-sm font-medium rounded-lg transition-colors duration-300 inline-flex items-center">
                                    <i class="fas fa-plus-circle mr-2"></i>
                                    Nouvelle cotisation
                                </a>
                                <form action="{{ route('participant.tontines.leave', $tontine) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-colors duration-300 inline-flex items-center" onclick="return confirm('Êtes-vous sûr de vouloir quitter cette tontine?')">
                                        <i class="fas fa-sign-out-alt mr-2"></i>
                                        Quitter
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contenu principal -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
                    <!-- Stats -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-white rounded-xl shadow p-6 border-t-4 border-blue-500">
                            <div class="flex justify-between">
                                <div>
                                    <p class="text-sm text-gray-500">Montant de base</p>
                                    <p class="text-2xl font-bold mt-1">{{ number_format($tontine->montant_de_base, 0, ',', ' ') }} FCFA</p>
                                </div>
                                <div class="bg-blue-100 p-3 rounded-lg">
                                    <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow p-6 border-t-4 border-purple-500">
                            <div class="flex justify-between">
                                <div>
                                    <p class="text-sm text-gray-500">Prochaine échéance</p>
                                    <p class="text-2xl font-bold mt-1">{{ $tontine->prochaineEcheance() }}</p>
                                </div>
                                <div class="bg-purple-100 p-3 rounded-lg">
                                    <svg class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="bg-white rounded-xl shadow p-6 border-t-4 border-green-500">
                            <div class="flex justify-between">
                                <div>
                                    <p class="text-sm text-gray-500">Mes cotisations</p>
                                    <p class="text-2xl font-bold mt-1">{{ $cotisations->count() }}</p>
                                </div>
                                <div class="bg-green-100 p-3 rounded-lg">
                                    <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Description et détails -->
                    <div class="bg-white rounded-xl shadow overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-lg font-medium text-gray-900">À propos de cette tontine</h2>
                        </div>
                        <div class="px-6 py-4">
                            <p class="text-gray-700">{{ $tontine->description }}</p>

                            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-500">Règles de la tontine</h3>
                                    <ul class="mt-2 space-y-2">
                                        <li class="flex items-start">
                                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span class="text-gray-700">Montant minimum: {{ number_format($tontine->montant_de_base, 0, ',', ' ') }} FCFA</span>
                                        </li>
                                        <li class="flex items-start">
                                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span class="text-gray-700">Fréquence: {{ $tontine->frequence }}</span>
                                        </li>
                                        <li class="flex items-start">
                                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span class="text-gray-700">Date de fin: {{ $tontine->dateFin->format('d/m/Y') }}</span>
                                        </li>
                                    </ul>
                                </div>

                                <div>
                                    <h3 class="text-sm font-medium text-gray-500">Statistiques</h3>
                                    <div class="mt-2 space-y-3">
                                        <div>
                                            <p class="text-xs text-gray-500">Total collecté</p>
                                            <p class="text-lg font-medium">{{ number_format($tontine->cotisations()->sum('montant'), 0, ',', ' ') }} FCFA</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500">Prochain tirage</p>
                                            <p class="text-lg font-medium">{{ $tontine->prochainTirage() ?? 'Non programmé' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Mes cotisations -->
                    <div class="bg-white rounded-xl shadow overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <div class="flex justify-between items-center">
                                <h2 class="text-lg font-medium text-gray-900">Mes cotisations</h2>
                                <a href="{{ route('participant.cotisations.create', $tontine) }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium inline-flex items-center">
                                    <i class="fas fa-plus-circle mr-1"></i> Ajouter
                                </a>
                            </div>
                        </div>

                        @if($cotisations->isEmpty())
                            <div class="px-6 py-12 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h3 class="mt-2 text-lg font-medium text-gray-900">Aucune cotisation</h3>
                                <p class="mt-1 text-sm text-gray-500">Vous n'avez pas encore effectué de cotisation pour cette tontine</p>
                            </div>
                        @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Montant</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Moyen</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Transaction</th>
                                            <th scope="col" class="relative px-6 py-3"><span class="sr-only">Actions</span></th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($cotisations as $cotisation)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $cotisation->created_at->format('d/m/Y H:i') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ number_format($cotisation->montant, 0, ',', ' ') }} FCFA
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $cotisation->moyen_paiement }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $cotisation->numero_transaction ?? 'N/A' }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="#" class="text-blue-600 hover:text-blue-900">Détails</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
