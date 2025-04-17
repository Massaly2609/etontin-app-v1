<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <div class="flex flex-col lg:flex-row h-screen overflow-hidden">
            @include('layouts.leftbarParticipant')

            <main class="flex-1 overflow-y-auto overflow-x-hidden bg-gray-50">
                <!-- En-tête -->
                <div class="relative p-5 bg-gradient-to-r from-amber-600 to-amber-700 shadow-2xl overflow-hidden">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-white/5 to-transparent"></div>
                    <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
                        <div class="py-10">
                            <h1 class="text-4xl font-extrabold text-white tracking-wide drop-shadow-lg">
                                <span class="bg-clip-text text-transparent bg-gradient-to-r from-white to-amber-200">
                                    Mes Cotisations
                                </span>
                            </h1>
                            <p class="text-amber-100 mt-2 flex items-center gap-2 text-sm">
                                <span class="animate-pulse">✨</span>
                                <span>Historique de toutes vos cotisations</span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Contenu principal -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                <h2 class="text-lg font-medium text-gray-900">Toutes mes cotisations</h2>
                                <div class="relative w-full sm:w-64">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                                    <input type="text" placeholder="Rechercher..." class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-amber-500 focus:border-amber-500 transition duration-150">
                                </div>
                            </div>
                        </div>

                        @if($cotisations->isEmpty())
                            <div class="px-6 py-12 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h3 class="mt-2 text-lg font-medium text-gray-900">Aucune cotisation</h3>
                                <p class="mt-1 text-sm text-gray-500">Vous n'avez pas encore effectué de cotisation</p>
                            </div>
                        @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tontine</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Montant</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Moyen</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                            <th scope="col" class="relative px-6 py-3"><span class="sr-only">Actions</span></th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach($cotisations as $cotisation)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $cotisation->created_at->format('d/m/Y H:i') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm font-medium text-gray-900">{{ $cotisation->tontine->libelle }}</div>
                                                <div class="text-sm text-gray-500">{{ $cotisation->tontine->type }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ number_format($cotisation->montant, 0, ',', ' ') }} FCFA
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                                    {{ $cotisation->moyen_paiement }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                    Validée
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                @if($cotisation->tontine)
                                                    <a href="{{ route('participant.tontines.show', $cotisation->tontine) }}" class="text-amber-600 hover:text-amber-900">Détails</a>
                                                @else
                                                    <span class="text-gray-400">N/A</span>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                                {{ $cotisations->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
