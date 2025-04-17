<x-app-layout>
    <!-- Main Container -->
    <div class="min-h-screen bg-gray-50">
        <!-- Contenu Principal -->
        <div class="flex flex-1 h-screen">
            <!-- Sidebar -->
            @include('layouts.leftBar')

            <!-- Main Content -->
            <main class="flex-1 p-5 overflow-y-auto">
                <!-- En-tête Modernisé -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-500 px-8 pt-10 pb-16 rounded-xl border-l-2 border-b-4 border-cyan-600 shadow-lg">
                    <div class="max-w-7xl mx-auto">
                        <div class="flex items-center justify-between">
                            <div class="space-y-4">
                                <h1 class="text-4xl font-bold text-white tracking-tighter">
                                    {{ __('Nouveau Gérant') }}
                                </h1>
                                <p class="text-blue-100/90 text-lg font-light">

                                </p>
                                <nav class="flex space-x-2">
                                    <a href="{{ route('superadmin.gerants.index') }}" class="text-blue-200 hover:text-white">Gérant</a>
                                    <span class="text-blue-400">/</span>
                                    <span class="text-white">Création d'un nouveau compte gérant</span>
                                </nav>
                            </div>
                            <div class="hidden md:block animate-fade-in-left">
                                <div class="bg-white/10 p-4 rounded-xl backdrop-blur-sm transition-transform hover:scale-105 animatio-pulse">
                                    <i class="fas fa-user-shield text-3xl text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulaire Modernisé -->
                <div class="max-w-7xl mx-auto px-8 -mt-10">
                    <div class="bg-white rounded-2xl shadow-lg p-8 mb-8 border border-gray-100/50">
                        <form action="{{ route('superadmin.gerants.store') }}" method="POST" class="space-y-8">
                            @csrf

                            <!-- Grille de champs -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <!-- Prénom -->
                                <div class="space-y-2">
                                    <x-input-label value="Prénom *" class="font-medium text-gray-700" />
                                    <div class="relative">
                                        <x-text-input
                                            name="prenom"
                                            class="w-full pl-12 pr-4 py-3 rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500"
                                            placeholder="Medoune"
                                            required />
                                        <i class="fas fa-user-circle absolute left-4 top-3.5 text-gray-400"></i>
                                    </div>
                                </div>

                                <!-- Nom -->
                                <div class="space-y-2">
                                    <x-input-label value="Nom *" class="font-medium text-gray-700" />
                                    <div class="relative">
                                        <x-text-input
                                            name="nom"
                                            class="w-full pl-12 pr-4 py-3 rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500"
                                            placeholder="Massaly"
                                            required />
                                        <i class="fas fa-signature absolute left-4 top-3.5 text-gray-400"></i>
                                    </div>
                                </div>

                                <!-- Téléphone -->
                                <div class="space-y-2">
                                    <x-input-label value="Téléphone *" class="font-medium text-gray-700" />
                                    <div class="relative">
                                        <x-text-input
                                            name="telephone"
                                            type="tel"
                                            class="w-full pl-12 pr-4 py-3 rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500"
                                            placeholder="+221 77 267 07 69"
                                            required />
                                        <i class="fas fa-phone-alt absolute left-4 top-3.5 text-gray-400"></i>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="space-y-2">
                                    <x-input-label value="Email *" class="font-medium text-gray-700" />
                                    <div class="relative">
                                        <x-text-input
                                            name="email"
                                            type="email"
                                            class="w-full pl-12 pr-4 py-3 rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500"
                                            placeholder="medoune.massaly@uadb.edu.sn"
                                            required />
                                        <i class="fas fa-envelope absolute left-4 top-3.5 text-gray-400"></i>
                                    </div>
                                </div>

                                <!-- Mot de passe -->
                                <div class="space-y-2">
                                    <x-input-label value="Mot de passe *" class="font-medium text-gray-700" />
                                    <div class="relative">
                                        <x-text-input
                                            name="password"
                                            type="password"
                                            class="w-full pl-12 pr-4 py-3 rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500"
                                            placeholder="••••••••"
                                            required />
                                        <i class="fas fa-lock absolute left-4 top-3.5 text-gray-400"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Actions du formulaire -->
                            <div class="flex justify-end gap-4 border-t pt-8">
                                <a href="{{ route('superadmin.gerants.index') }}"
                                   class="px-6 py-3 bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200 transition-colors flex items-center">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    Retour
                                </a>
                                <x-primary-button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 transition-colors">
                                    <i class="fas fa-save mr-2"></i>
                                    Enregistrer le gérant
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>

{{-- Apre ajouter la gestion des erreur --}}
{{-- <x-app-layout>
    <!-- Main Container -->
    <div class="min-h-screen bg-gray-50">
        <!-- Contenu Principal -->
        <div class="flex flex-1 h-screen">
            <!-- Sidebar -->
            @include('layouts.leftBar')

            <!-- Main Content -->
            <main class="flex-1 p-5 overflow-y-auto">
                <!-- En-tête Modernisé -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-500 px-8 pt-10 pb-16 rounded-xl border-l-2 border-b-4 border-cyan-600 shadow-lg">
                    <div class="max-w-7xl mx-auto">
                        <div class="flex items-center justify-between">
                            <div class="space-y-4">
                                <h1 class="text-4xl font-bold text-white tracking-tighter">
                                    {{ __('Nouveau Gérant') }}
                                </h1>
                                <p class="text-blue-100/90 text-lg font-light">
                                    Création d'un nouveau compte gérant
                                </p>
                            </div>
                            <div class="hidden md:block animate-fade-in-left">
                                <div class="bg-white/10 p-4 rounded-xl backdrop-blur-sm transition-transform hover:scale-105">
                                    <i class="fas fa-user-shield text-3xl text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulaire Modernisé -->
                <div class="max-w-7xl mx-auto px-8 -mt-10">
                    <div class="bg-white rounded-2xl shadow-lg p-8 mb-8 border border-gray-100/50">
                        <form action="{{ route('superadmin.gerants.store') }}" method="POST" class="space-y-8" x-data="{ showPassword: false }">
                            @csrf

                            <!-- Grille de champs -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <!-- Prénom -->
                                <div class="space-y-2">
                                    <x-input-label value="Prénom *" class="font-medium text-gray-700" />
                                    <div class="relative">
                                        <x-text-input
                                            name="prenom"
                                            value="{{ old('prenom') }}"
                                            class="w-full pl-12 pr-4 py-3 rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500"
                                            placeholder="Medoune"
                                            required />
                                        <i class="fas fa-user-circle absolute left-4 top-3.5 text-gray-400"></i>
                                    </div>
                                    @error('prenom')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Nom -->
                                <div class="space-y-2">
                                    <x-input-label value="Nom *" class="font-medium text-gray-700" />
                                    <div class="relative">
                                        <x-text-input
                                            name="nom"
                                            value="{{ old('nom') }}"
                                            class="w-full pl-12 pr-4 py-3 rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500"
                                            placeholder="Massaly"
                                            required />
                                        <i class="fas fa-signature absolute left-4 top-3.5 text-gray-400"></i>
                                    </div>
                                    @error('nom')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Téléphone -->
                                <div class="space-y-2">
                                    <x-input-label value="Téléphone *" class="font-medium text-gray-700" />
                                    <div class="relative">
                                        <x-text-input
                                            name="telephone"
                                            type="tel"
                                            value="{{ old('telephone') }}"
                                            class="w-full pl-12 pr-4 py-3 rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500"
                                            placeholder="+221 77 267 07 69"
                                            pattern="[+]{1}[0-9]{1,3} [0-9]{2} [0-9]{3} [0-9]{2} [0-9]{2}"
                                            required />
                                        <i class="fas fa-phone-alt absolute left-4 top-3.5 text-gray-400"></i>
                                    </div>
                                    @error('telephone')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="space-y-2">
                                    <x-input-label value="Email *" class="font-medium text-gray-700" />
                                    <div class="relative">
                                        <x-text-input
                                            name="email"
                                            type="email"
                                            value="{{ old('email') }}"
                                            class="w-full pl-12 pr-4 py-3 rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500"
                                            placeholder="medoune.massaly@uadb.edu.sn"
                                            required />
                                        <i class="fas fa-envelope absolute left-4 top-3.5 text-gray-400"></i>
                                    </div>
                                    @error('email')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Mot de passe -->
                                <div class="space-y-2">
                                    <x-input-label value="Mot de passe *" class="font-medium text-gray-700" />
                                    <div class="relative">
                                        <x-text-input
                                            name="password"
                                            :type="showPassword ? 'text' : 'password'"
                                            class="w-full pl-12 pr-12 py-3 rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500"
                                            placeholder="••••••••"
                                            required />
                                        <i class="fas fa-lock absolute left-4 top-3.5 text-gray-400"></i>
                                        <button type="button" @click="showPassword = !showPassword" class="absolute right-4 top-3.5 text-gray-400 hover:text-blue-600">
                                            <i x-show="!showPassword" class="fas fa-eye"></i>
                                            <i x-show="showPassword" class="fas fa-eye-slash"></i>
                                        </button>
                                    </div>
                                    @error('password')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Confirmation Mot de passe -->
                                <div class="space-y-2">
                                    <x-input-label value="Confirmer le mot de passe *" class="font-medium text-gray-700" />
                                    <div class="relative">
                                        <x-text-input
                                            name="password_confirmation"
                                            :type="showPassword ? 'text' : 'password'"
                                            class="w-full pl-12 pr-12 py-3 rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500"
                                            placeholder="••••••••"
                                            required />
                                        <i class="fas fa-lock absolute left-4 top-3.5 text-gray-400"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Actions du formulaire -->
                            <div class="flex justify-end gap-4 border-t pt-8">
                                <a href="{{ route('superadmin.gerants.index') }}"
                                   class="px-6 py-3 bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200 transition-colors flex items-center">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    Retour
                                </a>
                                <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors flex items-center">
                                    <i class="fas fa-save mr-2"></i>
                                    Enregistrer le gérant
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout> --}}
