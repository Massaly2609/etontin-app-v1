<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <div class="flex h-screen">
            @include('layouts.leftBarGerant')
            <main class="flex-1 p-5 bg-gray-50 overflow-y-auto">
                <!-- En-tête -->
                <div class="bg-gradient-to-r from-green-600 to-green-500 px-8 pt-10 pb-16 rounded-xl shadow-lg">
                    <div class="max-w-7xl mx-auto">
                        <div class="flex items-center justify-between">
                            <div class="space-y-4">
                                <h1 class="text-4xl font-bold text-white tracking-tight">
                                    {{ __('Tableau de Bord des Rapports') }}
                                </h1>
                                <p class="text-green-100 text-lg font-light">
                                    Statistiques et rapports sur les Tontines gérées
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistiques -->
                <div class="max-w-7xl mx-auto px-8 -mt-10">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <!-- Carte Tontines -->
                        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-blue-500">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm text-gray-500">Tontines Gérées</p>
                                    <p class="text-3xl font-bold mt-2">{{ $totalTontines }}</p>
                                </div>
                                <div class="bg-blue-100 p-4 rounded-full">
                                    <i class="fas fa-hand-holding-usd text-2xl text-blue-600"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Carte Participants -->
                        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-green-500">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm text-gray-500">Participants</p>
                                    <p class="text-3xl font-bold mt-2">{{ $totalParticipants }}</p>
                                </div>
                                <div class="bg-green-100 p-4 rounded-full">
                                    <i class="fas fa-users text-2xl text-green-600"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Carte Cotisations -->
                        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-purple-500">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm text-gray-500">Montant Collecté</p>
                                    <p class="text-3xl font-bold mt-2">{{ number_format($totalCotisations, 0, ',', ' ') }} FCFA</p>
                                </div>
                                <div class="bg-purple-100 p-4 rounded-full">
                                    <i class="fas fa-coins text-2xl text-purple-600"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Liens vers les rapports détaillés -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <a href="{{ route('gerant.reports.tontines') }}" class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                            <h2 class="text-xl font-bold text-gray-800 mb-4">Rapport des Tontines</h2>
                            <p class="text-gray-600">Voir les détails des Tontines gérées</p>
                        </a>
                        <a href="{{ route('gerant.reports.participants') }}" class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                            <h2 class="text-xl font-bold text-gray-800 mb-4">Rapport des Participants</h2>
                            <p class="text-gray-600">Voir les détails des participants</p>
                        </a>
                        <a href="{{ route('gerant.reports.cotisations') }}" class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow">
                            <h2 class="text-xl font-bold text-gray-800 mb-4">Rapport des Cotisations</h2>
                            <p class="text-gray-600">Voir les détails des cotisations</p>
                        </a>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
