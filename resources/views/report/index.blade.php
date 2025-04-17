<x-app-layout>
    <!-- Main Container -->
    <div class="min-h-screen bg-gray-50">
        <!-- Contenu Principal -->
        <div class="flex h-screen">
            @include('layouts.leftBar')

            <!-- Contenu Principal -->
            <main class="flex-1 overflow-y-auto p-5 bg-gradient-to-b from-gray-50 to-gray-100">
                <!-- Hero Section -->
                <div class="relative bg-gradient-to-r from-indigo-700 to-blue-600 px-8 pt-16 pb-24 rounded-b-3xl shadow-xl overflow-hidden">
                    <!-- Decorative elements -->
                    <div class="absolute inset-0 opacity-20">
                        <div class="absolute top-0 right-0 w-64 h-64 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-70"></div>
                        <div class="absolute bottom-0 left-0 w-64 h-64 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-70"></div>
                    </div>

                    <div class="relative max-w-7xl mx-auto z-10">
                        <div class="flex flex-col md:flex-row items-start md:items-center justify-between">
                            <div class="space-y-4">
                                <h1 class="text-4xl font-bold text-white tracking-tight">
                                    Tableau de Bord Analytique
                                </h1>
                                <nav class="flex items-center space-x-2 text-white/90">
                                    <a href="{{ route('superadmin.dashboard') }}" class="hover:text-white transition-colors">
                                        <i class="fas fa-home mr-1"></i> Tableau de bord
                                    </a>
                                    <span class="text-white/50">/</span>
                                    <span class="font-medium">Analytique</span>
                                </nav>
                            </div>

                            <div class="mt-6 md:mt-0">
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-calendar-alt text-white/70"></i>
                                    </div>
                                    <select class="appearance-none bg-white/10 backdrop-blur-sm border border-white/20 text-white rounded-lg pl-10 pr-8 py-2 focus:ring-2 focus:ring-white focus:outline-none">
                                        <option class="text-gray-900">30 derniers jours</option>
                                        <option class="text-gray-900">Ce mois-ci</option>
                                        <option class="text-gray-900">Ce trimestre</option>
                                        <option class="text-gray-900">Cette année</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reports Grid -->
                <div class="max-w-7xl mx-auto px-6 lg:px-8  pb-16">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Tontines Card -->
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-all hover:shadow-xl hover:-translate-y-1">
                            <a href="{{ route('reports.tontines') }}" class="block">
                                <div class="p-6">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-800">Tontines</h3>
                                            <p class="text-sm text-gray-500 mt-1">Performance globale</p>
                                        </div>
                                        <div class="bg-blue-100 p-3 rounded-lg">
                                            <i class="fas fa-hand-holding-usd text-blue-600 text-xl"></i>
                                        </div>
                                    </div>
                                    <div class="mt-6">
                                        <div class="text-3xl font-bold text-gray-800">{{ $totalTontines }}</div>
                                        <div class="flex items-center text-sm text-blue-600 mt-2">
                                            <i class="fas fa-arrow-up mr-1"></i>
                                            <span>12% vs période précédente</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-6 py-3 border-t border-gray-100 text-sm text-blue-600 font-medium">
                                    Voir le rapport complet <i class="fas fa-chevron-right ml-1"></i>
                                </div>
                            </a>
                        </div>

                        <!-- Participants Card -->
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-all hover:shadow-xl hover:-translate-y-1">
                            <a href="{{ route('reports.participants') }}" class="block">
                                <div class="p-6">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-800">Participants</h3>
                                            <p class="text-sm text-gray-500 mt-1">Engagement communautaire</p>
                                        </div>
                                        <div class="bg-purple-100 p-3 rounded-lg">
                                            <i class="fas fa-users text-purple-600 text-xl"></i>
                                        </div>
                                    </div>
                                    <div class="mt-6">
                                        <div class="text-3xl font-bold text-gray-800">{{ $participantsActifs }}</div>
                                        <div class="flex items-center text-sm text-purple-600 mt-2">
                                            <i class="fas fa-arrow-up mr-1"></i>
                                            <span>8% de croissance</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-6 py-3 border-t border-gray-100 text-sm text-purple-600 font-medium">
                                    Voir le rapport complet <i class="fas fa-chevron-right ml-1"></i>
                                </div>
                            </a>
                        </div>

                        <!-- Cotisations Card -->
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-all hover:shadow-xl hover:-translate-y-1">
                            <a href="{{ route('reports.cotisations') }}" class="block">
                                <div class="p-6">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-800">Cotisations</h3>
                                            <p class="text-sm text-gray-500 mt-1">Flux financiers</p>
                                        </div>
                                        <div class="bg-green-100 p-3 rounded-lg">
                                            <i class="fas fa-coins text-green-600 text-xl"></i>
                                        </div>
                                    </div>
                                    <div class="mt-6">
                                        <div class="text-3xl font-bold text-gray-800">{{ number_format($totalCotisations/1000000, 1) }}M</div>
                                        <div class="text-sm text-gray-500">FCFA</div>
                                        <div class="flex items-center text-sm text-green-600 mt-2">
                                            <i class="fas fa-arrow-up mr-1"></i>
                                            <span>23% vs période précédente</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-6 py-3 border-t border-gray-100 text-sm text-green-600 font-medium">
                                    Voir le rapport complet <i class="fas fa-chevron-right ml-1"></i>
                                </div>
                            </a>
                        </div>

                        <!-- Tirages Card -->
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-all hover:shadow-xl hover:-translate-y-1">
                            <a href="{{ route('reports.tirages') }}" class="block">
                                <div class="p-6">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-800">Tirages</h3>
                                            <p class="text-sm text-gray-500 mt-1">Activité des bénéficiaires</p>
                                        </div>
                                        <div class="bg-orange-100 p-3 rounded-lg">
                                            <i class="fas fa-gift text-orange-600 text-xl"></i>
                                        </div>
                                    </div>
                                    <div class="mt-6">
                                        <div class="text-3xl font-bold text-gray-800">{{ $totalTirages }}</div>
                                        <div class="flex items-center text-sm text-orange-600 mt-2">
                                            <i class="fas fa-arrow-up mr-1"></i>
                                            <span>5% vs période précédente</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-6 py-3 border-t border-gray-100 text-sm text-orange-600 font-medium">
                                    Voir le rapport complet <i class="fas fa-chevron-right ml-1"></i>
                                </div>
                            </a>
                        </div>

                        <!-- Financial Card -->
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-all hover:shadow-xl hover:-translate-y-1">
                            <a href="{{ route('reports.financial') }}" class="block">
                                <div class="p-6">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-800">Performance Financière</h3>
                                            <p class="text-sm text-gray-500 mt-1">Bénéfices & rentabilité</p>
                                        </div>
                                        <div class="bg-pink-100 p-3 rounded-lg">
                                            <i class="fas fa-chart-line text-pink-600 text-xl"></i>
                                        </div>
                                    </div>
                                    <div class="mt-6">
                                        <div class="text-3xl font-bold text-gray-800">{{ number_format($benefices/1000000, 1) }}M</div>
                                        <div class="text-sm text-gray-500">FCFA de bénéfices</div>
                                        <div class="flex items-center text-sm text-pink-600 mt-2">
                                            <i class="fas fa-arrow-up mr-1"></i>
                                            <span>15% de marge</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-6 py-3 border-t border-gray-100 text-sm text-pink-600 font-medium">
                                    Voir le rapport complet <i class="fas fa-chevron-right ml-1"></i>
                                </div>
                            </a>
                        </div>

                        <!-- Custom Report Card -->
                        <div class="bg-gradient-to-br from-indigo-600 to-blue-500 rounded-2xl shadow-lg overflow-hidden transition-all hover:shadow-xl hover:-translate-y-1">
                            <a href="#" class="block h-full">
                                <div class="p-6 flex flex-col h-full">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="text-lg font-semibold text-white">Rapport Personnalisé</h3>
                                            <p class="text-sm text-white/80 mt-1">Créez votre propre analyse</p>
                                        </div>
                                        <div class="bg-white/20 p-3 rounded-lg backdrop-blur-sm">
                                            <i class="fas fa-sliders-h text-white text-xl"></i>
                                        </div>
                                    </div>
                                    <div class="mt-auto pt-6">
                                        <div class="flex items-center text-white font-medium">
                                            Configurer <i class="fas fa-arrow-right ml-2"></i>
                                        </div>
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
