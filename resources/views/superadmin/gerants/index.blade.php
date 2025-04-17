<x-app-layout>
    <div class="flex min-h-screen">
        @include('layouts.leftBar')


        <div class="flex-1 overflow-y-auto bg-gray-50">
            <!-- Hero Header -->
            <div class="relative bg-gradient-to-r from-indigo-600 to-blue-600 px-6 py-12 shadow-lg overflow-hidden">
                <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjA1KSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNwYXR0ZXJuKSIvPjwvc3ZnPg==')]"></div>

                <div class="relative max-w-7xl mx-auto">
                    <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                        <div class="space-y-3">
                            <h1 class="text-3xl font-bold text-white tracking-tight">
                                Gestion des Gérants
                            </h1>
                            <p class="text-blue-100 text-lg max-w-2xl">
                                Liste complète des responsables de tontines avec leurs informations et statistiques
                            </p>
                        </div>
                        <a href="{{ route('superadmin.gerants.create') }}"
                           class="flex items-center px-6 py-3 bg-white/10 hover:bg-white/20 text-white rounded-lg border border-white/20 backdrop-blur-sm transition-all hover:shadow-lg">
                            <i class="fas fa-plus-circle mr-2"></i>
                            Nouveau Gérant
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 -mt-6">
                <div class="bg-white rounded-xl shadow-xl overflow-hidden">
                    <!-- Table Header -->
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="bg-blue-100 text-blue-600 p-2 rounded-lg mr-3">
                                <i class="fas fa-users-cog"></i>
                            </div>
                            <h2 class="text-lg font-semibold text-gray-800">
                                Liste des Gérants
                            </h2>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-search text-gray-400"></i>
                            </div>
                            <input type="text" placeholder="Rechercher un gérant..."
                                   class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>

                    <!-- Table Container -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 sticky top-0">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <span>Gérant</span>
                                            <i class="fas fa-sort ml-1 text-gray-400 cursor-pointer hover:text-blue-500"></i>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Contact
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            <span>Tontines gérées</span>
                                            <i class="fas fa-sort ml-1 text-gray-400 cursor-pointer hover:text-blue-500"></i>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($gerants as $gerant)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <!-- Nom -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
                                                <i class="fas fa-user-tie text-blue-600"></i>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $gerant->prenom }} {{ $gerant->nom }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    ID: {{ $gerant->id }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- Contact -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            <i class="fas fa-phone-alt mr-2 text-blue-500"></i>
                                            {{ $gerant->telephone }}
                                        </div>
                                        <div class="text-sm text-gray-500 mt-1">
                                            <i class="fas fa-envelope mr-2 text-blue-500"></i>
                                            {{ $gerant->email ?? 'Non spécifié' }}
                                        </div>
                                    </td>

                                    <!-- Tontines gérées -->
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                      {{ $gerant->tontines_gerees_count > 0 ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                                {{ $gerant->tontines_gerees_count }} tontine(s)
                                            </span>
                                            @if($gerant->tontines_gerees_count > 0)
                                            <span class="ml-2 text-xs text-gray-500">
                                                Dernière: {{ $gerant->latest_tontine_date?->format('d/m/Y') ?? '-' }}
                                            </span>
                                            @endif
                                        </div>
                                    </td>

                                    <!-- Actions -->
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end space-x-2">
                                            <!-- View Button -->
                                            <a href="{{ route('superadmin.gerants.show', $gerant) }}"
                                               class="text-blue-600 hover:text-blue-900 p-2 rounded-full hover:bg-blue-50 transition-colors relative group"
                                               data-tooltip="Voir détails">
                                                <i class="fas fa-eye"></i>
                                                <span class="tooltip-text">Détails</span>
                                            </a>

                                            <!-- Edit Button -->
                                            <a href="{{ route('superadmin.gerants.edit', $gerant) }}"
                                               class="text-indigo-600 hover:text-indigo-900 p-2 rounded-full hover:bg-indigo-50 transition-colors relative group"
                                               data-tooltip="Modifier">
                                                <i class="fas fa-pencil-alt"></i>
                                                <span class="tooltip-text">Éditer</span>
                                            </a>

                                            <!-- Delete Button -->
                                            <form method="POST" action="{{ route('superadmin.gerants.destroy', $gerant) }}" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                        onclick="confirmDelete('{{ $gerant->id }}', '{{ $gerant->prenom }} {{ $gerant->nom }}')"
                                                        class="text-red-600 hover:text-red-900 p-2 rounded-full hover:bg-red-50 transition-colors relative group">
                                                    <i class="fas fa-trash-alt"></i>
                                                    <span class="tooltip-text">Supprimer</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination & Status -->
                    <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between">
                        <div class="text-sm text-gray-500 mb-4 sm:mb-0">
                            Affichage de <span class="font-medium">{{ $gerants->firstItem() }}</span> à <span class="font-medium">{{ $gerants->lastItem() }}</span> sur <span class="font-medium">{{ $gerants->total() }}</span> gérants
                        </div>
                        <div class="flex items-center space-x-2">
                            {{ $gerants->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script>

     function confirmDelete(id, name) {
            Swal.fire({
                title: 'Confirmer la suppression',
                html: `Voulez-vous vraiment supprimer <b>${name}</b> ?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${id}`).submit();
                }
            });
        }
    </script>
</x-app-layout>
