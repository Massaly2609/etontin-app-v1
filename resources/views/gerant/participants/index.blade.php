
<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <div class="flex h-screen">
            @include('layouts.leftBarGerant')

            <main class="flex-1 p-5 overflow-y-auto">
                <!-- En-tête élégant -->
                <div class="bg-gradient-to-r from-emerald-600 to-teal-500 px-6 py-12 sm:px-8 rounded-b-3xl shadow-lg">
                    <div class="max-w-7xl mx-auto">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                    <h1 class="text-3xl sm:text-4xl font-bold text-white tracking-tight">
                                        {{ __('Participants') }}
                                    </h1>
                                </div>
                                <p class="text-emerald-100 text-lg">
                                    Gestion des participants aux tontines
                                </p>
                            </div>

                            <div class="flex-shrink-0">
                                <a href="{{ route('gerant.participants.create') }}" class="inline-flex items-center px-4 py-3 bg-white/20 hover:bg-white/30 backdrop-blur-sm border border-white/30 rounded-lg text-white font-medium transition duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                    Ajouter un participant
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contenu principal -->
                <div class="max-w-7xl mx-auto px-6   sm:px-8 py-8 ">
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                        <!-- Barre d'outils -->
                        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                            <div class="relative w-full sm:w-64">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                                <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" placeholder="Rechercher...">
                            </div>

                            <div class="flex items-center space-x-3">
                                <div class="text-sm text-gray-500">
                                    {{ $participants->total() }} participants
                                </div>
                            </div>
                        </div>

                        <!-- Tableau épuré -->
                        <div class="overflow-x-auto ">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Participant</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Identité</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Localisation</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($participants as $participant)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gradient-to-r from-emerald-100 to-teal-100 flex items-center justify-center">
                                                    <span class="text-emerald-600 font-medium">
                                                        {{ substr($participant->user->prenom, 0, 1) }}{{ substr($participant->user->nom, 0, 1) }}
                                                    </span>
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">{{ $participant->user->prenom }} {{ $participant->user->nom }}</div>
                                                    <div class="text-sm text-gray-500">{{ $participant->user->email }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $participant->cni }}</div>
                                            <div class="text-sm text-gray-500">{{ $participant->user->telephone }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">{{ $participant->adresse }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <div class="flex justify-end space-x-2">
                                                <a href="{{ route('gerant.participants.show', $participant) }}" class="text-emerald-600 hover:text-emerald-900 p-2 rounded-full hover:bg-emerald-50" title="Voir">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                </a>
                                                <form action="{{ route('gerant.participants.destroy', $participant) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce participant ?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900 p-2 rounded-full hover:bg-red-50" title="Supprimer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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

                        <!-- Pagination -->
                        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 flex flex-col md:flex-row items-center justify-between">
                            <div class="text-sm text-gray-500 mb-4 md:mb-0">
                                Affichage de <span class="font-medium">{{ $participants->firstItem() }}</span> à <span class="font-medium">{{ $participants->lastItem() }}</span> sur <span class="font-medium">{{ $participants->total() }}</span> participants
                            </div>
                            <div class="flex-1 flex justify-center md:justify-end">
                                {{ $participants->links('vendor.pagination.tailwind') }}
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
