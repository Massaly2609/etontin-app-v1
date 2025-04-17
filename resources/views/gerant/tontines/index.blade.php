<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <div class="flex h-screen">
            @include('layouts.leftBarGerant')

            <main class="flex-1 p-5 overflow-y-auto">
                <!-- En-tête élégant avec gradient -->
                <div class="bg-gradient-to-r from-teal-600 to-emerald-600 px-6 py-12 sm:px-8 rounded-b-3xl shadow-xl">
                    <div class="max-w-7xl mx-auto">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <div class="p-3 rounded-lg bg-white/10 backdrop-blur-sm mr-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h1 class="text-3xl sm:text-4xl font-bold text-white tracking-tight">
                                            Mes Tontines
                                        </h1>
                                        <p class="text-teal-100 text-lg">
                                            Gestion des tontines sous votre responsabilité
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-shrink-0">
                                {{-- {{ route('gerant.tontines.create') }} --}}
                                <a href="#" class="inline-flex items-center px-5 py-3 bg-white/20 hover:bg-white/30 backdrop-blur-sm border border-white/30 rounded-lg text-white font-medium transition duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Nouvelle Tontine
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contenu principal -->
                <div class="max-w-7xl mx-auto px-6 sm:px-8 py-8 ">
                    <!-- Filtres et statistiques -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                        <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
                            <p class="text-sm font-medium text-gray-500">Tontines actives</p>
                            <p class="text-2xl font-semibold text-teal-600">{{ $activeTontinesCount }}</p>
                        </div>
                        <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
                            <p class="text-sm font-medium text-gray-500">Tontines terminées</p>
                            <p class="text-2xl font-semibold text-gray-600">{{ $completedTontinesCount }}</p>
                        </div>
                        <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
                            <p class="text-sm font-medium text-gray-500">Total collecté</p>
                            <p class="text-2xl font-semibold text-emerald-600">{{ number_format($totalCollected, 0, ',', ' ') }} FCFA</p>
                        </div>
                        <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">
                            <p class="text-sm font-medium text-gray-500">Participants</p>
                            <p class="text-2xl font-semibold text-blue-600">{{ $totalParticipants }}</p>
                        </div>
                    </div>

                    <!-- Tableau modernisé -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                        <!-- Barre d'outils -->
                        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                            <div class="relative w-full sm:w-64">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                                <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500" placeholder="Rechercher...">
                            </div>

                            <div class="flex items-center space-x-3">
                                <div class="text-sm text-gray-500">
                                    {{ $tontines->total() }} tontines trouvées
                                </div>
                            </div>
                        </div>

                        <!-- Tableau responsive -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Montant</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fréquence</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Participants</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($tontines as $tontine)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gradient-to-r from-teal-100 to-emerald-100 flex items-center justify-center mr-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-teal-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </div>
                                                <div>
                                                    <div class="font-medium text-gray-900">{{ $tontine->libelle }}</div>
                                                    <div class="text-sm text-gray-500">Du {{ $tontine->dateDebut->format('d/m/Y') }} au {{ $tontine->dateFin->format('d/m/Y') }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-base text-gray-900">{{ number_format($tontine->montant_total, 0, ',', ' ') }} FCFA</div>
                                            <div class="text-sm text-gray-500">{{ number_format($tontine->montant_de_base, 0, ',', ' ') }} FCFA/base</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                {{ ucfirst($tontine->frequence) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                                </svg>
                                                <span>{{ $tontine->participants_count ?? 0 }}/{{ $tontine->nbreParticipant }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                                {{ $tontine->dateFin > now() ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                                {{ $tontine->dateFin > now() ? 'Active' : 'Terminée' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex justify-end space-x-2">
                                                <a href="{{ route('gerant.tontines.show', $tontine) }}" class="text-teal-600 hover:text-teal-900 p-2 rounded-full hover:bg-teal-50" title="Voir">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </a>
                                                <a href="{{ route('gerant.tontines.edit', $tontine) }}" class="text-blue-600 hover:text-blue-900 p-2 rounded-full hover:bg-blue-50" title="Modifier">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination améliorée -->
                        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 flex flex-col md:flex-row items-center justify-between">
                            <div class="text-sm text-gray-500 mb-4 md:mb-0">
                                Affichage de <span class="font-medium">{{ $tontines->firstItem() }}</span> à <span class="font-medium">{{ $tontines->lastItem() }}</span> sur <span class="font-medium">{{ $tontines->total() }}</span> tontines
                            </div>
                            <div class="flex-1 flex justify-center md:justify-end">
                                {{ $tontines->links('vendor.pagination.tailwind') }}
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
