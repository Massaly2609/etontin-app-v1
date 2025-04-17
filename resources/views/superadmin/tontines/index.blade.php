<x-app-layout>
    <!-- Main Container -->
    <div class="min-h-screen bg-gray-50">
        <!-- Contenu Principal -->
        <div class="flex h-screen">
            @include('layouts.leftBar')

            <!-- Contenu Principal -->
            <main class="flex-1 p-6 bg-gray-50 overflow-y-auto">
                <!-- En-tête amélioré -->
                <div class="mb-8 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 border border-gray-100 shadow-sm">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <div>
                            <h1 class="text-2xl md:text-3xl font-bold text-gray-800 flex items-center">
                                <span class="bg-blue-600 text-white p-2 rounded-lg mr-3 shadow-md">
                                    <i class="fas fa-users-cog"></i>
                                </span>
                                {{ __('Gestion des Tontines') }}
                            </h1>
                            <nav class="flex items-center space-x-2 text-sm text-gray-600 mt-3 ml-11">
                                <a href="{{ route('superadmin.tontines.index') }}"
                                class="text-blue-600 hover:text-blue-800 hover:underline flex items-center">
                                <i class="fas fa-chevron-left mr-1 text-xs"></i> Retour aux tontines
                                </a>
                                <span class="text-gray-400">|</span>
                                <span class="font-medium text-gray-700">
                                    <i class="fas fa-list-check mr-1"></i> Liste complète
                                </span>
                            </nav>
                        </div>
                        <div>
                            <a href="{{ route('superadmin.tontines.create') }}"
                            class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700
                                    px-5 py-3 rounded-lg text-white transition-all flex items-center shadow-md
                                    hover:shadow-lg group">
                                <span class="bg-white/20 p-1 rounded-lg mr-3 group-hover:bg-white/30 transition-all">
                                    <i class="fas fa-plus text-sm"></i>
                                </span>
                                <span class="font-medium">Nouvelle Tontine</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contenu principal -->
                <div class="bg-white mt-4 rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[800px] divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gérant</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Montant</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fréquence</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($tontines as $tontine)
                                <tr class="hover:bg-blue-50/50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $tontine->libelle }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $tontine->gerant->nom ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ number_format($tontine->montant_total, 0, ',', ' ') }} FCFA
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">
                                            {{ $tontine->frequence ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        <span class="px-2 py-1 text-xs rounded-full {{ $tontine->dateFin > now() ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                            {{ $tontine->dateFin > now() ? 'Active' : 'Terminée' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end space-x-2">
                                            <!-- Éditer -->
                                            <a href="{{ route('superadmin.tontines.edit', $tontine) }}"
                                                class="text-blue-600 hover:text-blue-900 p-1 rounded hover:bg-blue-100 transition-colors"
                                                title="Éditer">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </a>

                                            <!-- Voir détails -->
                                            <a href="{{ route('superadmin.tontines.show', $tontine) }}"
                                                class="text-gray-600 hover:text-gray-900 p-1 rounded hover:bg-gray-100 transition-colors"
                                                title="Détails">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </a>

                                            <!-- Après les autres boutons d'action -->
                                            <a href="{{ route('superadmin.tontines.tirages.index', $tontine) }}"
                                                class="text-purple-600 hover:text-purple-900 p-1 rounded hover:bg-purple-100 transition-colors"
                                                title="Tirages">
                                                <i class="fas fa-trophy"></i>
                                            </a>

                                            <!-- Supprimer -->
                                            <form id="delete-form-{{ $tontine->id }}" method="POST" action="{{ route('superadmin.tontines.destroy', $tontine) }}" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    onclick="confirmDelete('{{ $tontine->id }}')"
                                                    class="text-red-600 hover:text-red-900 p-1 rounded hover:bg-red-100 transition-colors"
                                                    title="Supprimer">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination sobre -->
                    <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                        {{ $tontines->links() }}
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Confirmer la suppression',
                text: "Cette action est irréversible. Voulez-vous continuer ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler',
                backdrop: `
                    rgba(59, 130, 246, 0.1)
                    url("/images/trash-icon.png")
                    center top
                    no-repeat
                `
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${id}`).submit();
                }
            })
        }
    </script>
</x-app-layout>

