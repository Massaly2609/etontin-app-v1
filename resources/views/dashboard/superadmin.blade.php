<x-app-layout>
    <!-- Main Container -->
    <div class="min-h-screen bg-gray-50">
        <!-- Contenu Principal -->
        <div class="flex flex-1 h-screen">
            <!-- Sidebar Modernisée -->
            @include('layouts.leftBar')

            <!-- Main Content -->
            <main class="flex-1 p-5 bg-gray-50 pt-10 overflow-y-auto">
                <!-- En-tête Modernisé -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-500 px-8 pt-24 pb-16 rounded-b-3xl shadow-2xl ">
                    <div class="max-w-7xl mx-auto">
                        <div class="flex items-center justify-between -mt-16">
                            <div class="space-y-4">
                                <h1 class="text-4xl font-bold text-white tracking-tight">
                                    {{ __('Tableau de Bord Administrateur') }}
                                </h1>
                                <p class="text-blue-100 text-lg font-light">
                                    Gestion globale des tontines, gérants et participants
                                </p>
                            </div>
                            <div class="hidden md:block">
                                <div class="bg-white/10 p-4 rounded-xl backdrop-blur-sm">
                                    <i class="fas fa-chart-line text-3xl text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contenu Principal -->
                <div class="max-w-7xl mx-auto px-8 -mt-10">
                    <!-- Grille de Statistiques -->
                    {{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                        <!-- Carte Statistique Modernisée -->
                            <!-- Carte Tontines -->
                            <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-blue-500">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-sm text-gray-500">Tontines Actives</p>
                                        <p class="text-3xl font-bold mt-2">1,234</p>
                                    </div>
                                    <div class="bg-blue-100 p-4 rounded-full">
                                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                        </svg>
                                    </div>
                                </div>
                                <a href="#" class="mt-4 inline-flex items-center text-blue-600 hover:text-blue-800 text-sm">
                                    Voir plus
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>

                            <!-- Carte Gérants -->
                            <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-green-500">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-sm text-gray-500">Gérants Actifs</p>
                                        <p class="text-3xl font-bold mt-2">456</p>
                                    </div>
                                    <div class="bg-green-100 p-4 rounded-full">
                                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                    </div>
                                </div>
                                <a href="#" class="mt-4 inline-flex items-center text-green-600 hover:text-green-800 text-sm">
                                    Voir plus
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>

                            <!-- Carte Participants -->
                            <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-purple-500">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="text-sm text-gray-500">Participants Totaux</p>
                                        <p class="text-3xl font-bold mt-2">8,901</p>
                                    </div>
                                    <div class="bg-purple-100 p-4 rounded-full">
                                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                        </svg>
                                    </div>
                                </div>
                                <a href="#" class="mt-4 inline-flex items-center text-purple-600 hover:text-purple-800 text-sm">
                                    Voir plus
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                    </div> --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                        <!-- Carte Tontines -->
                        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-blue-500">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm text-gray-500">Tontines Actives</p>
                                    <p class="text-3xl font-bold mt-2">{{ number_format($stats['active_tontines'], 0, ',', ' ') }}</p>
                                </div>
                                <div class="bg-blue-100 p-4 rounded-full">
                                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                    </svg>
                                </div>
                            </div>
                            <a href="{{ route('superadmin.tontines.index') }}" class="mt-4 inline-flex items-center text-blue-600 hover:text-blue-800 text-sm">
                                Voir plus
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>

                        <!-- Carte Gérants -->
                        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-green-500">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm text-gray-500">Gérants Actifs</p>
                                    <p class="text-3xl font-bold mt-2">{{ number_format($stats['active_gerants'], 0, ',', ' ') }}</p>
                                </div>
                                <div class="bg-green-100 p-4 rounded-full">
                                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <a href="{{ route('superadmin.gerants.index') }}" class="mt-4 inline-flex items-center text-green-600 hover:text-green-800 text-sm">
                                Voir plus
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>

                        <!-- Carte Participants -->
                        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-purple-500">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm text-gray-500">Participants Totaux</p>
                                    <p class="text-3xl font-bold mt-2">{{ number_format($stats['total_participants'], 0, ',', ' ') }}</p>
                                </div>
                                <div class="bg-purple-100 p-4 rounded-full">
                                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    </svg>
                                </div>
                            </div>
                                <a href="{{ route('superadmin.participants.index') }}" class="mt-4 inline-flex items-center text-purple-600 hover:text-purple-800 text-sm">
                                    Voir plus
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                        </div>
                    </div>

                    <!-- Section Graphiques Principaux -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                        <!-- Graphique en secteurs -->
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <h3 class="text-xl font-semibold mb-4">Tontines créées par mois</h3>
                            <div class="chart-container h-80" data-type="doughnut">
                                <canvas id="tontinesChart"></canvas>
                            </div>
                        </div>

                        <!-- Graphique en barres -->
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <h3 class="text-xl font-semibold mb-4">Activité Mensuelle</h3>
                            <div class="chart-container h-80">
                                <canvas id="monthlyActivityChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('tontinesChart').getContext('2d');

        // Données formatées correctement
        const chartData = {
            labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            datasets: [{
                label: 'Nombre de tontines',
                data: @json(array_values($completeData)),
                backgroundColor: 'rgba(59, 130, 246, 0.6)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 1,
                tension: 0.1
            }]
        };

        new Chart(ctx, {
            type: 'bar', // ou 'line' pour un graphique linéaire
            data: chartData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('monthlyActivityChart').getContext('2d');

    // Données dynamiques (à remplacer par vos données réelles)
    const chartData = {
        labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
        datasets: [{
            label: 'Tontines créées',
            data: [12, 19, 8, 15, 12, 10, 7, 14, 11, 13, 9, 16],
            backgroundColor: 'rgba(99, 102, 241, 0.7)',
            borderColor: 'rgba(99, 102, 241, 1)',
            borderWidth: 1,
            borderRadius: 4, // Bords arrondis pour les barres
            barPercentage: 0.6 // Largeur des barres
        }, {
            label: 'Participants',
            data: [8, 15, 12, 10, 7, 14, 11, 13, 9, 16, 12, 19],
            backgroundColor: 'rgba(244, 63, 94, 0.7)',
            borderColor: 'rgba(244, 63, 94, 1)',
            borderWidth: 1,
            borderRadius: 4,
            barPercentage: 0.6
        }]
    };

    new Chart(ctx, {
        type: 'bar',
        data: chartData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false
                    },
                    ticks: {
                        stepSize: 5
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        boxWidth: 12,
                        padding: 16,
                        usePointStyle: true
                    }
                },
                tooltip: {
                    backgroundColor: '#1E293B',
                    titleFont: { size: 14 },
                    bodyFont: { size: 14 },
                    padding: 12,
                    cornerRadius: 8,
                    displayColors: true,
                    intersect: false,
                    mode: 'index'
                }
            },
            interaction: {
                mode: 'nearest',
                axis: 'x',
                intersect: false
            }
        }
    });
});
    </script>
    @endpush
</x-app-layout>
