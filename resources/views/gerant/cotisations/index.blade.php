<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <div class="flex h-screen">
            @include('layouts.leftBarGerant')
            <main class="flex-1 p-5 bg-gray-50 overflow-y-auto">
                <!-- En-tête modernisé -->
                <div class="bg-gradient-to-r from-emerald-600 to-teal-500 px-6 sm:px-8 py-12 rounded-b-3xl shadow-xl">
                    <div class="max-w-7xl mx-auto">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-6">
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <h1 class="text-3xl sm:text-4xl font-bold text-white tracking-tight">
                                        {{ __('Cotisations') }}
                                    </h1>
                                </div>
                                <p class="text-emerald-100 text-lg max-w-2xl">
                                    Liste complète des cotisations des tontines gérées avec historique détaillé
                                </p>
                            </div>

                            <div class="flex-shrink-0">
                                <div class="inline-flex rounded-lg bg-white/10 backdrop-blur-sm p-3">
                                    <span class="text-white text-sm font-medium">
                                        {{ now()->format('d M Y') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Indicateur de navigation -->
                        <div class="mt-8 flex space-x-1">
                            <a href="#" class="px-4 py-2 text-sm font-medium text-white bg-white/20 rounded-lg">
                                Toutes
                            </a>
                            <a href="#" class="px-4 py-2 text-sm font-medium text-emerald-100 hover:text-white rounded-lg">
                                En cours
                            </a>
                            <a href="#" class="px-4 py-2 text-sm font-medium text-emerald-100 hover:text-white rounded-lg">
                                Validées
                            </a>
                            <a href="#" class="px-4 py-2 text-sm font-medium text-emerald-100 hover:text-white rounded-lg">
                                En retard
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contenu principal -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                    <!-- Carte des cotisations -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                        <!-- En-tête de carte -->
                        <div class="px-6 py-4 border-b border-gray-100 flex flex-col sm:flex-row justify-between items-start sm:items-center bg-gray-50">
                            <div class="flex items-center mb-3 sm:mb-0">
                                <div class="p-2 rounded-lg bg-indigo-100 text-indigo-600 mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-800">Historique des cotisations</h3>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="relative">
                                    <select class="appearance-none bg-white pl-3 pr-8 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                        <option>Tous les moyens</option>
                                        <option>Mobile Money</option>
                                        <option>Espèces</option>
                                        <option>Virement</option>
                                    </select>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                                <button class="flex items-center text-sm bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Nouvelle cotisation
                                </button>
                            </div>
                        </div>

                        <!-- Tableau optimisé -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Participant</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Montant</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Paiement</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($cotisations as $cotisation)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gradient-to-r from-indigo-100 to-purple-100 flex items-center justify-center">
                                                    <span class="text-indigo-600 font-medium">{{ substr($cotisation->user->prenom, 0, 1) }}{{ substr($cotisation->user->nom, 0, 1) }}</span>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">{{ $cotisation->user->prenom }} {{ substr($cotisation->user->nom, 0, 1) }}.</div>
                                                    <div class="text-sm text-gray-500">{{ $cotisation->user->telephone }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                {{ number_format($cotisation->montant, 0, ',', ' ') }} FCFA
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                @if($cotisation->moyen_paiement === 'Mobile Money')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                                </svg>
                                                @elseif($cotisation->moyen_paiement === 'Espèces')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                                @endif
                                                <span class="text-sm text-gray-600">{{ $cotisation->moyen_paiement }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $cotisation->created_at->format('d/m/Y') }}
                                            <div class="text-xs text-gray-400">{{ $cotisation->created_at->format('H:i') }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <button class="text-indigo-600 hover:text-indigo-900 mr-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </button>
                                            <button class="text-gray-500 hover:text-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pied de tableau -->
                        <div class="px-6 py-4 border-t border-gray-200 flex flex-col md:flex-row items-center justify-between bg-gray-50">
                            <div class="text-sm text-gray-500 mb-4 md:mb-0">
                                Affichage de <span class="font-medium">{{ $cotisations->firstItem() }}</span> à <span class="font-medium">{{ $cotisations->lastItem() }}</span> sur <span class="font-medium">{{ $cotisations->total() }}</span> cotisations
                            </div>
                            <div class="flex-1 flex justify-center md:justify-end">
                                {{ $cotisations->links('vendor.pagination.tailwind') }}
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
