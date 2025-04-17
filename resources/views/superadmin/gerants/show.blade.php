<x-app-layout>
     <!-- Main Container -->
     <div class="min-h-screen bg-gray-50">
        <!-- Contenu Principal -->
        <div class="flex h-screen">
             @include('layouts.leftBar')
            <main class="flex-1 p-5 bg-gray-50 overflow-y-auto">
                <!-- En-tête avec effet glassmorphism -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-500 px-8 pt-24 pb-16 rounded-b-3xl shadow-2xl ">
                    <div class="max-w-7xl mx-auto">
                        <div class="flex flex-col md:flex-row items-start md:items-center justify-between">

                            <div class="flex items-center space-x-6 -mt-16">
                                <!-- Avatar -->
                                <div class="w-24 h-24 rounded-full bg-white/20 backdrop-blur-sm border-2 border-white/30 flex items-center justify-center">
                                    <i class="fas fa-user-shield text-4xl text-white/80"></i>
                                </div>

                                <!-- Informations principales -->
                                <div class="space-y-2">
                                    <h1 class="text-4xl font-bold text-white">
                                        {{ $gerant->prenom }} <span class="font-light">{{ $gerant->nom }}</span>
                                    </h1>
                                    <div class="flex items-center space-x-4 text-white/90">
                                        <div class="flex items-center space-x-2">
                                            <i class="fas fa-calendar-star"></i>
                                            <span>Membre depuis {{ $gerant->created_at->diffForHumans() }}</span>
                                        </div>
                                        <div class="w-1 h-1 bg-white/30 rounded-full"></div>
                                        <span class="flex items-center space-x-2">
                                            <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                                            <span>En ligne</span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <!-- Badge de statut -->
                            <div class=" -mt-16 bg-white/10 backdrop-blur-sm px-6 py-3 rounded-xl border border-white/20 ">
                                <div class="text-center">
                                    <p class="text-sm text-white/80">Niveau de confiance</p>
                                    <div class="flex items-center justify-center space-x-2 mt-1">
                                        <div class="flex items-center">
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-yellow-400"></i>
                                            <i class="fas fa-star text-white/30"></i>
                                        </div>
                                        <span class="text-white font-medium">4.8/5</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contenu principal -->
                <div class="max-w-7xl mx-auto px-8 -mt-10">
                    <!-- Grille de cartes interactives -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Carte Profil -->
                        <div class="bg-white rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-shadow duration-300">
                            <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center space-x-3">
                                <i class="fas fa-id-card text-blue-600"></i>
                                <span>Profil</span>
                            </h2>
                            <dl class="space-y-4">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 mb-1">Coordonnées</dt>
                                    <dd class="flex items-center space-x-3">
                                        <i class="fas fa-envelope text-gray-400"></i>
                                        <a href="mailto:{{ $gerant->email }}" class="text-gray-700 hover:text-blue-600">{{ $gerant->email }}</a>
                                    </dd>
                                    <dd class="flex items-center space-x-3 mt-2">
                                        <i class="fas fa-phone-alt text-gray-400"></i>
                                        <a href="tel:{{ $gerant->telephone }}" class="text-gray-700 hover:text-blue-600">{{ $gerant->telephone }}</a>
                                    </dd>
                                </div>

                                <div class="pt-4 border-t border-gray-100">
                                    <dt class="text-sm font-medium text-gray-500 mb-2">Identifiants</dt>
                                    <dd class="flex items-center justify-between">
                                        <span class="text-gray-600">Dernière connexion</span>
                                        <span class="text-sm text-gray-500">{{ $gerant->last_login_at?->diffForHumans() ?? 'Jamais' }}</span>
                                    </dd>
                                </div>
                            </dl>
                        </div>

                        <!-- Carte Statistiques -->
                        <div class="bg-white rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-shadow duration-300">
                            <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center space-x-3">
                                <i class="fas fa-chart-line text-purple-600"></i>
                                <span>Activité</span>
                            </h2>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="text-center p-4 bg-blue-50 rounded-xl">
                                    <p class="text-3xl font-bold text-blue-600">{{ $gerant->tontines_gerees_count }}</p>
                                    <p class="text-sm text-gray-600 mt-1">Tontines actives</p>
                                </div>
                                <div class="text-center p-4 bg-green-50 rounded-xl">
                                    <p class="text-3xl font-bold text-green-600">287</p>
                                    <p class="text-sm text-gray-600 mt-1">Participants</p>
                                </div>
                                <div class="text-center p-4 bg-orange-50 rounded-xl">
                                    <p class="text-3xl font-bold text-orange-600">1.2M</p>
                                    <p class="text-sm text-gray-600 mt-1">FCFA gérés</p>
                                </div>
                                <div class="text-center p-4 bg-purple-50 rounded-xl">
                                    <p class="text-3xl font-bold text-purple-600">98%</p>
                                    <p class="text-sm text-gray-600 mt-1">Satisfaction</p>
                                </div>
                            </div>
                        </div>

                        <!-- Carte Dernières activités -->
                        <div class="bg-white rounded-2xl shadow-xl p-6 hover:shadow-2xl transition-shadow duration-300 lg:col-span-2">
                            <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center space-x-3">
                                <i class="fas fa-clock-rotate-left text-amber-600"></i>
                                <span>Activités récentes</span>
                            </h2>
                            <div class="space-y-4">
                                <!-- Élément d'activité -->
                                <div class="flex items-start space-x-4 p-3 hover:bg-gray-50 rounded-lg transition-colors">
                                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                        <i class="fas fa-coins text-green-600 text-sm"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-gray-800 font-medium">Nouvelle tontine créée</p>
                                        <p class="text-sm text-gray-500 mt-1">"Épargne Entreprise 2024" - 5M FCFA</p>
                                        <p class="text-xs text-gray-400 mt-2">Il y a 2 heures</p>
                                    </div>
                                </div>

                                <!-- Plus d'éléments... -->
                            </div>
                        </div>
                    </div>

                    <!-- Section Documents -->
                    <div class="mt-8 bg-white rounded-2xl shadow-xl p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center space-x-3">
                            <i class="fas fa-folder-open text-red-600"></i>
                            <span>Documents associés</span>
                        </h2>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="border-2 border-dashed border-gray-200 rounded-xl p-4 text-center hover:border-blue-200 transition-colors cursor-pointer">
                                <i class="fas fa-plus text-gray-400 text-2xl mb-2"></i>
                                <p class="text-sm text-gray-500">Ajouter document</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
</x-app-layout>

