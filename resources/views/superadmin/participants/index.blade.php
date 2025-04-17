<x-app-layout>
     <!-- Main Container -->
     <div class="min-h-screen bg-gray-50">
        <!-- Contenu Principal -->
        <div class="flex h-screen">
            @include('layouts.leftBar')

            <!-- Contenu Principal -->
            <main class="flex-1 p-5 bg-gray-50 overflow-y-auto">
                <!-- En-tête héro amélioré -->
                <div class="bg-gradient-to-r from-orange-600 to-orange-500 px-8 pt-24 pb-16 rounded-b-3xl shadow-2xl relative overflow-hidden">
                    <!-- Effet de vague décoratif -->
                    <div class="absolute bottom-0 left-0 right-0 h-12 bg-white/10"></div>
                    <div class="max-w-7xl mx-auto relative z-10">
                        <div class="flex flex-col md:flex-row items-start md:items-center justify-between">
                            <!-- Titre et fil d'Ariane -->
                            <div class="space-y-5 mb-6 md:mb-0 -mt-16">
                                <h1 class="text-4xl font-bold text-white tracking-tight drop-shadow-md">
                                    {{ __('Gestion des Participants') }}
                                </h1>
                                <nav class="flex space-x-2 items-center text-sm">
                                    <a href="{{ route('superadmin.dashboard') }}" class="text-orange-200 hover:text-white transition-colors">
                                        <i class="fas fa-home mr-1"></i> Tableau de bord
                                    </a>
                                    <span class="text-orange-300">/</span>
                                    <span class="text-white font-medium">
                                        <i class="fas fa-users mr-2"></i>Liste des participants
                                    </span>
                                </nav>
                            </div>

                            <!-- Bouton d'action avec effet hover -->
                            <div class="hidden md:block transform transition hover:-translate-y-1 -mt-12">
                                <a href="{{ route('superadmin.participants.create') }}"
                                class="bg-white/20 backdrop-blur-sm hover:bg-white/30 px-6 py-3 rounded-xl text-white transition-all duration-300 flex items-center shadow-lg hover:shadow-xl">
                                    <i class="fas fa-user-plus mr-3"></i>
                                    <span class="font-semibold">Nouveau Participant</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contenu du Tableau -->
                <div class="py-6 px-4 sm:px-6 lg:px-8">
                    <div class="max-w-7xl mx-auto">
                        <!-- En-tête amélioré -->
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 space-y-4 md:space-y-0">
                            <div>
                                <h1 class="text-2xl font-bold text-gray-900">Gestion des Participants</h1>
                                <p class="mt-1 text-sm text-gray-500">{{ $participants->total() }} participants trouvés</p>
                            </div>
                        </div>

                        <!-- Carte des Filtres -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-4 mb-6">
                            <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                                <!-- Filtre Tontine -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Filtrer par tontine</label>
                                    <select name="tontine_id" class="block w-full rounded-md border-gray-200 py-2 px-3 shadow-sm focus:border-orange-300 focus:ring focus:ring-orange-200 focus:ring-opacity-50">
                                        <option value="">Toutes les tontines</option>
                                        @foreach($tontines as $id => $nom)
                                            <option value="{{ $id }}" @selected(request('tontine_id') == $id)>
                                                {{ $nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Boutons -->
                                <div class="flex space-x-2">
                                    <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded-md transition-colors flex items-center">
                                        <i class="fas fa-filter mr-2"></i>Appliquer les filtres
                                    </button>
                                    <a href="{{ route('superadmin.participants.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-md transition-colors flex items-center">
                                        <i class="fas fa-sync-alt mr-2"></i>Réinitialiser
                                    </a>
                                </div>
                            </form>
                        </div>

                        <!-- Tableau modernisé -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-100">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Participant</th>
                                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Contact</th>
                                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tontines</th>
                                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-100">
                                        @forelse($participants as $participant)
                                        <tr class="hover:bg-gray-50 transition-colors">
                                            <!-- Colonne Participant -->
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10 bg-orange-100 rounded-full flex items-center justify-center">
                                                        <i class="fas fa-user text-orange-500"></i>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="font-medium text-gray-900">{{ $participant->prenom }} {{ $participant->nom }}</div>
                                                        <div class="text-sm text-gray-500">Inscrit le {{ $participant->created_at->format('d/m/Y') }}</div>
                                                    </div>
                                                </div>
                                            </td>

                                            <!-- Colonne Contact -->
                                            <td class="px-6 py-4">
                                                <div class="text-sm">
                                                    <div class="flex items-center space-x-2">
                                                        <i class="fas fa-envelope text-gray-400"></i>
                                                        <a href="mailto:{{ $participant->email }}" class="text-gray-600 hover:text-orange-500">{{ $participant->email }}</a>
                                                    </div>
                                                    <div class="flex items-center space-x-2 mt-1">
                                                        <i class="fas fa-phone-alt text-gray-400"></i>
                                                        <span class="text-gray-600">{{ $participant->telephone }}</span>
                                                    </div>
                                                </div>
                                            </td>

                                            <!-- Colonne Tontines -->
                                            <td class="px-6 py-4">
                                                <div class="flex flex-wrap gap-2">
                                                    @forelse($participant->tontines as $tontine)
                                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800">
                                                            {{ $tontine->libelle }}
                                                        </span>
                                                    @empty
                                                        <span class="text-sm text-gray-400">Aucune tontine</span>
                                                    @endforelse
                                                </div>
                                            </td>

                                            <!-- Actions -->
                                            <td class="px-6 py-4">
                                                <div class="flex items-center space-x-3">
                                                    <a href="{{ route('superadmin.participants.show', $participant) }}"
                                                    class="text-gray-400 hover:text-orange-500 transition-colors"
                                                    title="Voir le profil">
                                                        <i class="fas fa-eye fa-fw"></i>
                                                    </a>

                                                      <!-- Supprimer -->
                                                      @can('delete', $participant)
                                                        <form method="POST" action="{{ route('superadmin.participants.destroy', $participant) }}" id="delete-form-{{ $participant->id }}" class="inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                type="button"
                                                                onclick="confirmDelete({{ $participant->id }})"
                                                                class="p-2 text-red-600 hover:bg-red-50 rounded-full transition-colors"
                                                            >
                                                                <i class="fas fa-trash w-4 h-4"></i>
                                                            </button>
                                                        </form>
                                                     @endcan
                                                </div>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                                Aucun participant trouvé
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination stylisée -->
                            <div class="px-4 py-3 bg-gray-50 border-t border-gray-100 sm:px-6">
                                {{ $participants->links('vendor.pagination.tailwind') }}
                            </div>
                        </div>
                    </div>
                </div>
        </main>
        <!-- Fin de la balise main -->
    </div>
</div>


<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Êtes-vous sûr ?',
            text: "Cette action est irréversible !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Oui, supprimer !',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`delete-form-${id}`).submit();
            }
        })
    }
    </script>
</x-app-layout>
