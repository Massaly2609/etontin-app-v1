<x-app-layout>
    <!-- Main Container -->
    <div class="min-h-screen bg-gray-50">
        <!-- Contenu Principal -->
        <div class="flex flex-1 h-screen">
            <!-- Sidebar -->
            @include('layouts.leftBar')

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto">
                <!-- Hero Section -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-12 shadow-xl">
                    <div class="max-w-7xl mx-auto">
                        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                            <div class="space-y-4">
                                <h1 class="text-3xl md:text-4xl font-bold text-white tracking-tight">
                                    {{ __('Nouvelle Tontine') }}
                                </h1>
                                <nav class="flex items-center space-x-2 text-sm md:text-base">
                                    <a href="{{ route('superadmin.tontines.index') }}" class="text-blue-200 hover:text-white transition-colors">
                                        <i class="fas fa-arrow-left mr-1"></i> Retour aux tontines
                                    </a>
                                    <span class="text-blue-300">/</span>
                                    <span class="text-white font-medium">Création</span>
                                </nav>
                            </div>
                            <div class="p-3 bg-white/10 rounded-xl backdrop-blur-sm transition-transform hover:scale-105">
                                <i class="fas fa-hand-holding-usd text-3xl text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Container -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8">
                    <div class="bg-white rounded-xl shadow-2xl overflow-hidden">
                        <!-- Form Header -->
                        <div class="bg-gray-50 px-6 py-4 border-b">
                            <h2 class="text-lg font-semibold text-gray-800">
                                <i class="fas fa-info-circle text-blue-500 mr-2"></i>
                                Informations de la tontine
                            </h2>
                        </div>

                        <!-- Form Content -->
                        <form action="{{ route('superadmin.tontines.store') }}" method="POST" enctype="multipart/form-data" class="p-6 md:p-8">
                            @csrf

                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                <!-- Left Column -->
                                <div class="space-y-6">
                                    <!-- Name Field -->
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">
                                            Nom de la tontine <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-tag text-gray-400"></i>
                                            </div>
                                            <input type="text" id="libelle" name="libelle" required
                                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400"
                                                placeholder="Ex: Tontine des Entrepreneurs" {{ old('libelle') }}>
                                        </div>
                                        <x-input-error :messages="$errors->get('libelle')" class="mt-1 text-red-600 text-sm"/>
                                    </div>

                                    <!-- Date Fields -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="space-y-2">
                                            <label class="block text-sm font-medium text-gray-700">
                                                Date de début <span class="text-red-500">*</span>
                                            </label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <i class="far fa-calendar-alt text-gray-400"></i>
                                                </div>
                                                <input type="date" id="dateDebut" name="dateDebut" required
                                                    min="{{ now()->format('Y-m-d') }}"
                                                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                            </div>
                                            <x-input-error :messages="$errors->get('dateDebut')" class="mt-1 text-red-600 text-sm"/>
                                        </div>

                                        <div class="space-y-2">
                                            <label class="block text-sm font-medium text-gray-700">
                                                Date de fin <span class="text-red-500">*</span>
                                            </label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <i class="far fa-calendar-check text-gray-400"></i>
                                                </div>
                                                <input type="date" id="dateFin" name="dateFin" required
                                                    min="{{ now()->addDay()->format('Y-m-d') }}"
                                                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                            </div>
                                            <x-input-error :messages="$errors->get('dateFin')" class="mt-1 text-red-600 text-sm"/>
                                        </div>
                                    </div>

                                    <!-- Amount Fields -->
                                    <div class="space-y-4">
                                        <div class="space-y-2">
                                            <label class="block text-sm font-medium text-gray-700">
                                                Montant total <span class="text-red-500">*</span>
                                            </label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <span class="text-gray-500">FCFA</span>
                                                </div>
                                                <input type="number" id="montant_total" name="montant_total" required
                                                    min="1000" step="500"
                                                    class="block w-full pl-16 pr-3 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                                    placeholder="500000">
                                            </div>
                                            <x-input-error :messages="$errors->get('montant_total')" class="mt-1 text-red-600 text-sm"/>
                                        </div>

                                        <div class="space-y-2">
                                            <label class="block text-sm font-medium text-gray-700">
                                                Montant de base <span class="text-red-500">*</span>
                                            </label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <span class="text-gray-500">FCFA</span>
                                                </div>
                                                <input type="number" id="montant_de_base" name="montant_de_base" required
                                                    min="500" step="100"
                                                    class="block w-full pl-16 pr-3 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                                    placeholder="10000">
                                            </div>
                                            <x-input-error :messages="$errors->get('montant_de_base')" class="mt-1 text-red-600 text-sm"/>
                                        </div>
                                    </div>
                                </div>

                                <!-- Right Column -->
                                <div class="space-y-6">
                                    <!-- Manager Field -->
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">
                                            Gérant responsable <span class="text-red-500">*</span>
                                        </label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <i class="fas fa-user-tie text-gray-400"></i>
                                            </div>
                                            <select id="gerant_id" name="gerant_id" required
                                                class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 appearance-none bg-white">
                                                <option value="">Sélectionnez un gérant</option>
                                                @foreach($gerants as $gerant)
                                                    <option value="{{ $gerant->id }}" {{ old('gerant_id') == $gerant->id ? 'selected' : '' }}>
                                                        {{ $gerant->prenom }} {{ $gerant->nom }} ({{ $gerant->telephone }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <x-input-error :messages="$errors->get('gerant_id')" class="mt-1 text-red-600 text-sm"/>
                                    </div>

                                    <!-- Frequency and Participants -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="space-y-2">
                                            <label class="block text-sm font-medium text-gray-700">
                                                Fréquence <span class="text-red-500">*</span>
                                            </label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <i class="fas fa-sync-alt text-gray-400"></i>
                                                </div>
                                                <select id="frequence" name="frequence" required
                                                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 appearance-none bg-white">
                                                    <option value="JOURNALIERE" {{ old('frequence') == 'JOURNALIERE' ? 'selected' : '' }}>Quotidienne</option>
                                                    <option value="HEBDOMADAIRE" {{ old('frequence') == 'HEBDOMADAIRE' ? 'selected' : '' }}>Hebdomadaire</option>
                                                    <option value="MENSUEL" {{ old('frequence') == 'MENSUEL' ? 'selected' : '' }}>Mensuelle</option>
                                                </select>
                                            </div>
                                            <x-input-error :messages="$errors->get('frequence')" class="mt-1 text-red-600 text-sm"/>
                                        </div>

                                        <div class="space-y-2">
                                            <label class="block text-sm font-medium text-gray-700">
                                                Participants <span class="text-red-500">*</span>
                                            </label>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <i class="fas fa-users text-gray-400"></i>
                                                </div>
                                                <input type="number" id="nbreParticipant" name="nbreParticipant" required
                                                    min="3" max="150"
                                                    class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                                    placeholder="3-150">
                                            </div>
                                            <x-input-error :messages="$errors->get('nbreParticipant')" class="mt-1 text-red-600 text-sm"/>
                                        </div>
                                    </div>

                                    <!-- Description -->
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">
                                            Description
                                        </label>
                                        <div class="relative">
                                            <textarea id="description" name="description" rows="4"
                                                class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                                placeholder="Objectifs et spécificités de cette tontine...">{{ old('description') }}</textarea>
                                        </div>
                                        <x-input-error :messages="$errors->get('description')" class="mt-1 text-red-600 text-sm"/>
                                    </div>

                                    <!-- Image Upload -->
                                    <div class="space-y-2">
                                        <label class="block text-sm font-medium text-gray-700">
                                            Images (optionnel)
                                        </label>
                                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-blue-500 transition-colors">
                                            <div class="space-y-1 text-center">
                                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <div class="flex text-sm text-gray-600">
                                                    <label class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                                        <span>Téléverser des fichiers</span>
                                                        <input type="file" id="images" name="images[]" multiple class="sr-only" accept="image/*">
                                                    </label>
                                                    <p class="pl-1">ou glisser-déposer</p>
                                                </div>
                                                <p class="text-xs text-gray-500">
                                                    PNG, JPG, GIF jusqu'à 5MB
                                                </p>
                                            </div>
                                        </div>
                                        <x-input-error :messages="$errors->get('images.*')" class="mt-1 text-red-600 text-sm"/>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="mt-10 pt-6 border-t border-gray-200 flex justify-end space-x-4">
                                <button type="button" onclick="window.history.back()"
                                    class="inline-flex items-center px-5 py-3 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <i class="fas fa-times mr-2"></i> Annuler
                                </button>
                                <button type="submit"
                                    class="inline-flex items-center px-5 py-3 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <i class="fas fa-save mr-2"></i> Créer la tontine
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
