<x-app-layout>
    <!-- Main Container -->
    <div class="min-h-screen bg-gray-50">
        <!-- Contenu Principal -->
        <div class="flex h-screen">
            @include('layouts.leftBar')

            <!-- Contenu Principal -->
            <main class="flex-1 p-5 overflow-y-auto bg-gray-50">
                <!-- Hero Section -->
                <div class="relative bg-gradient-to-r from-blue-700 to-indigo-600 px-6 pt-16 pb-24 rounded-b-3xl shadow-sm">
                    <div class="absolute inset-0 bg-gradient-to-b from-white/10 to-transparent"></div>
                    <div class="relative max-w-7xl mx-auto">
                        <div class="flex flex-col space-y-4">
                            <h1 class="text-3xl font-bold text-white tracking-tight">
                                Configuration du Système
                            </h1>
                            <nav class="flex items-center space-x-2 text-sm text-blue-100">
                                <a href="{{ route('superadmin.dashboard') }}" class="hover:text-white transition-colors">
                                    <i class="fas fa-home mr-1"></i> Tableau de bord
                                </a>
                                <span class="text-white/50">/</span>
                                <span class="font-medium">Paramètres</span>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Settings Grid -->
                <div class="max-w-7xl mx-auto px-6 lg:px-8  pb-16">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Payment Methods Card -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-all hover:shadow-md hover:-translate-y-1">
                            <a href="{{ route('settings.updatePaymentMethods') }}" class="block h-full">
                                <div class="p-6 flex flex-col h-full">
                                    <div class="flex items-center space-x-4">
                                        <div class="bg-blue-100 p-3 rounded-lg">
                                            <i class="fas fa-credit-card text-blue-600 text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="font-medium text-gray-800">Moyens de Paiement</h3>
                                            <p class="text-sm text-gray-500 mt-1">Options de paiement disponibles</p>
                                        </div>
                                    </div>
                                    <div class="mt-6 pt-4 border-t border-gray-100 text-sm text-blue-600 font-medium flex items-center">
                                        Configurer <i class="fas fa-chevron-right ml-2 text-xs"></i>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Tontine Types Card -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-all hover:shadow-md hover:-translate-y-1">
                            <a href="{{ route('settings.updateTontineTypes') }}" class="block h-full">
                                <div class="p-6 flex flex-col h-full">
                                    <div class="flex items-center space-x-4">
                                        <div class="bg-purple-100 p-3 rounded-lg">
                                            <i class="fas fa-hand-holding-usd text-purple-600 text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="font-medium text-gray-800">Types de Tontines</h3>
                                            <p class="text-sm text-gray-500 mt-1">Modèles d'épargne collective</p>
                                        </div>
                                    </div>
                                    <div class="mt-6 pt-4 border-t border-gray-100 text-sm text-purple-600 font-medium flex items-center">
                                        Configurer <i class="fas fa-chevron-right ml-2 text-xs"></i>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Notifications Card -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-all hover:shadow-md hover:-translate-y-1">
                            <a href="{{ route('settings.updateNotifications') }}" class="block h-full">
                                <div class="p-6 flex flex-col h-full">
                                    <div class="flex items-center space-x-4">
                                        <div class="bg-green-100 p-3 rounded-lg">
                                            <i class="fas fa-bell text-green-600 text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="font-medium text-gray-800">Notifications</h3>
                                            <p class="text-sm text-gray-500 mt-1">Préférences de communication</p>
                                        </div>
                                    </div>
                                    <div class="mt-6 pt-4 border-t border-gray-100 text-sm text-green-600 font-medium flex items-center">
                                        Configurer <i class="fas fa-chevron-right ml-2 text-xs"></i>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Security Card -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-all hover:shadow-md hover:-translate-y-1">
                            <a href="{{ route('settings.updateSecurity') }}" class="block h-full">
                                <div class="p-6 flex flex-col h-full">
                                    <div class="flex items-center space-x-4">
                                        <div class="bg-orange-100 p-3 rounded-lg">
                                            <i class="fas fa-shield-alt text-orange-600 text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="font-medium text-gray-800">Sécurité</h3>
                                            <p class="text-sm text-gray-500 mt-1">Protection des données</p>
                                        </div>
                                    </div>
                                    <div class="mt-6 pt-4 border-t border-gray-100 text-sm text-orange-600 font-medium flex items-center">
                                        Configurer <i class="fas fa-chevron-right ml-2 text-xs"></i>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- System Preferences Card -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-all hover:shadow-md hover:-translate-y-1">
                            <a href="#" class="block h-full">
                                <div class="p-6 flex flex-col h-full">
                                    <div class="flex items-center space-x-4">
                                        <div class="bg-indigo-100 p-3 rounded-lg">
                                            <i class="fas fa-cog text-indigo-600 text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="font-medium text-gray-800">Préférences Système</h3>
                                            <p class="text-sm text-gray-500 mt-1">Configuration globale</p>
                                        </div>
                                    </div>
                                    <div class="mt-6 pt-4 border-t border-gray-100 text-sm text-indigo-600 font-medium flex items-center">
                                        Configurer <i class="fas fa-chevron-right ml-2 text-xs"></i>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- User Management Card -->
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-all hover:shadow-md hover:-translate-y-1">
                            <a href="3" class="block h-full">
                                <div class="p-6 flex flex-col h-full">
                                    <div class="flex items-center space-x-4">
                                        <div class="bg-pink-100 p-3 rounded-lg">
                                            <i class="fas fa-users-cog text-pink-600 text-xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="font-medium text-gray-800">Gestion de utilisateur</h3>
                                            <p class="text-sm text-gray-500 mt-1"> profil </p>
                                        </div>
                                    </div>
                                    <div class="mt-6 pt-4 border-t border-gray-100 text-sm text-pink-600 font-medium flex items-center">
                                        Configurer <i class="fas fa-chevron-right ml-2 text-xs"></i>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
