<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <div class="flex flex-1 h-full">
            @include('layouts.leftBarGerant')

            <main class="flex-1 overflow-y-auto">
                <!-- Header élégant -->
                <div class="bg-white px-6 py-5 border-b border-gray-100">
                    <div class="max-w-7xl mx-auto flex items-center justify-between">
                        <div>
                            <h1 class="text-2xl font-semibold text-gray-900 tracking-tight">
                                Créer une nouvelle tontine
                            </h1>
                            <p class="text-sm text-gray-500 mt-1">
                                Remplissez les détails pour lancer une nouvelle tontine
                            </p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <a href="{{ route('gerant.tontines.index') }}" class="inline-flex items-center px-3 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Retour
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Formulaire moderne -->
                <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                        <form action="{{ route('gerant.tontines.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Section Informations -->
                            <div class="p-6 space-y-6 border-b border-gray-100">
                                <div class="flex items-center space-x-3">
                                    <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-50 text-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <h2 class="text-lg font-medium text-gray-900">
                                        Informations générales
                                    </h2>
                                </div>

                                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                    <!-- Nom -->
                                    <div>
                                        <label for="libelle" class="block text-sm font-medium text-gray-700 mb-1">Nom de la tontine</label>
                                        <div class="relative rounded-md shadow-sm">
                                            <input type="text" id="libelle" name="libelle" required
                                                class="block w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400 transition duration-150"
                                                placeholder="Ex: Épargne collective">
                                        </div>
                                        <x-input-error :messages="$errors->get('libelle')" class="mt-1 text-sm text-red-600"/>
                                    </div>

                                    <!-- Fréquence -->
                                    <div>
                                        <label for="frequence" class="block text-sm font-medium text-gray-700 mb-1">Fréquence</label>
                                        <select id="frequence" name="frequence" required
                                            class="block w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500 appearance-none bg-white bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGZpbGw9Im5vbmUiIHZpZXdCb3g9IjAgMCAyNCAyNCIgc3Ryb2tlPSJjdXJyZW50Q29sb3IiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIj48cG9seWxpbmUgcG9pbnRzPSI2IDkgMTIgMTUgMTggOSI+PC9wb2x5bGluZT48L3N2Zz4=')] bg-no-repeat bg-[right_0.5rem_center] bg-[length:1.5em_1.5em]">
                                            <option value="JOURNALIERE">Quotidienne</option>
                                            <option value="HEBDOMADAIRE">Hebdomadaire</option>
                                            <option value="MENSUEL">Mensuelle</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('frequence')" class="mt-1 text-sm text-red-600"/>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                    <!-- Date de début -->
                                    <div>
                                        <label for="dateDebut" class="block text-sm font-medium text-gray-700 mb-1">Date de début</label>
                                        <input type="date" id="dateDebut" name="dateDebut" required
                                            min="{{ now()->format('Y-m-d') }}"
                                            class="block w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('dateDebut')" class="mt-1 text-sm text-red-600"/>
                                    </div>

                                    <!-- Date de fin -->
                                    <div>
                                        <label for="dateFin" class="block text-sm font-medium text-gray-700 mb-1">Date de fin</label>
                                        <input type="date" id="dateFin" name="dateFin" required
                                            min="{{ now()->addDay()->format('Y-m-d') }}"
                                            class="block w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                                        <x-input-error :messages="$errors->get('dateFin')" class="mt-1 text-sm text-red-600"/>
                                    </div>
                                </div>
                            </div>

                            <!-- Section Financière -->
                            <div class="p-6 space-y-6 border-b border-gray-100">
                                <div class="flex items-center space-x-3">
                                    <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-50 text-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <h2 class="text-lg font-medium text-gray-900">
                                        Paramètres financiers
                                    </h2>
                                </div>

                                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                    <!-- Montant total -->
                                    <div>
                                        <label for="montant_total" class="block text-sm font-medium text-gray-700 mb-1">Montant total</label>
                                        <div class="relative rounded-md shadow-sm">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500">FCFA</span>
                                            </div>
                                            <input type="number" id="montant_total" name="montant_total" required
                                                min="1000" step="500"
                                                class="block w-full pl-16 pr-4 py-2.5 border border-gray-200 rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                                                placeholder="500 000">
                                        </div>
                                        <x-input-error :messages="$errors->get('montant_total')" class="mt-1 text-sm text-red-600"/>
                                    </div>

                                    <!-- Montant de base -->
                                    <div>
                                        <label for="montant_de_base" class="block text-sm font-medium text-gray-700 mb-1">Montant de base</label>
                                        <div class="relative rounded-md shadow-sm">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500">FCFA</span>
                                            </div>
                                            <input type="number" id="montant_de_base" name="montant_de_base" required
                                                min="500" step="100"
                                                class="block w-full pl-16 pr-4 py-2.5 border border-gray-200 rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                                                placeholder="10 000">
                                        </div>
                                        <x-input-error :messages="$errors->get('montant_de_base')" class="mt-1 text-sm text-red-600"/>
                                    </div>
                                </div>

                                <!-- Participants -->
                                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                    <div>
                                        <label for="nbreParticipant" class="block text-sm font-medium text-gray-700 mb-1">Nombre de participants</label>
                                        <input type="number" id="nbreParticipant" name="nbreParticipant" required
                                            min="3" max="50"
                                            class="block w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="3-50">
                                        <x-input-error :messages="$errors->get('nbreParticipant')" class="mt-1 text-sm text-red-600"/>
                                    </div>
                                </div>
                            </div>

                            <!-- Section Description -->
                            <div class="p-6 space-y-6">
                                <div class="flex items-center space-x-3">
                                    <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-blue-50 text-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                        </svg>
                                    </div>
                                    <h2 class="text-lg font-medium text-gray-900">
                                        Détails supplémentaires
                                    </h2>
                                </div>

                                <!-- Description -->
                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                                    <textarea id="description" name="description" rows="4"
                                        class="block w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Décrivez les objectifs et règles de cette tontine...">{{ old('description') }}</textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-1 text-sm text-red-600"/>
                                </div>

                                <!-- Image Upload amélioré -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-3">Image de la tontine</label>
                                    <div class="mt-1 flex items-center">
                                        <label class="group relative flex flex-col items-center justify-center w-full h-32 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:border-blue-500 transition duration-150 overflow-hidden bg-gray-50">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6 px-4 text-center">
                                                <svg class="w-10 h-10 text-gray-400 group-hover:text-blue-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                                <p class="text-sm text-gray-500 group-hover:text-blue-500">
                                                    <span class="font-medium">Cliquer pour uploader</span> ou glisser-déposer
                                                </p>
                                                <p class="text-xs text-gray-400 mt-1">PNG, JPG jusqu'à 5MB</p>
                                            </div>
                                            <input type="file" id="images" name="images[]" class="sr-only" accept="image/*">
                                        </label>
                                    </div>
                                    <x-input-error :messages="$errors->get('images.*')" class="mt-1 text-sm text-red-600"/>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-end space-x-3">
                                <button type="button" onclick="window.history.back()"
                                    class="px-5 py-2.5 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                                    Annuler
                                </button>
                                <button type="submit"
                                    class="px-5 py-2.5 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 transition duration-150 inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                    </svg>
                                    Créer la tontine
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
