<x-app-layout>
    <!-- Main Container -->
    <div class="min-h-screen bg-gray-50">
        <!-- Contenu Principal -->
        <div class="flex flex-1 h-screen">
            <!-- Sidebar Modernisée -->
            @include('layouts.leftBarGerant')
            <!-- Main Content -->
            <main class="flex-1 p-5 bg-gray-50 pt-5 overflow-y-auto">
                <!-- En-tête Modernisé -->
                <div class="bg-gradient-to-r from-green-600 to-green-500 px-8 pt-24 pb-16 rounded-b-3xl shadow-2xl">
                    <div class="max-w-7xl mx-auto">
                        <div class="flex items-center justify-between -mt-16">
                            <div class="space-y-4">
                                <h1 class="text-4xl font-bold text-white tracking-tight">
                                    {{ __('Tableau de Bord Gérant') }}
                                </h1>
                                <p class="text-green-100 text-lg font-light">
                                    Gestion des tontines et participants sous votre responsabilité
                                </p>
                            </div>
                            <div class="hidden md:block">
                                <div class="bg-white/10 p-4 rounded-xl backdrop-blur-sm">
                                    <i class="fas fa-chart-pie text-3xl text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contenu Principal -->
                <div class="max-w-7xl mx-auto px-8 -mt-10">
                    <!-- Grille de Statistiques -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                        <!-- Carte Tontines Gérées -->
                        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-green-500">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm text-gray-500">Tontines Gérées</p>
                                    <p class="text-3xl font-bold mt-2">{{ $managedTontinesCount }}</p>
                                </div>
                                <div class="bg-green-100 p-4 rounded-full">
                                    <i class="fas fa-hand-holding-usd text-2xl text-green-600"></i>
                                </div>
                            </div>
                            <a href="{{ route('gerant.tontines.index') }}" class="mt-4 inline-flex items-center text-green-600 hover:text-green-800 text-sm">
                                Voir plus
                                <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>

                        <!-- Carte Participants Actifs -->
                        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-blue-500">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm text-gray-500">Participants Actifs</p>
                                    <p class="text-3xl font-bold mt-2">{{ $activeParticipantsCount }}</p>
                                </div>
                                <div class="bg-blue-100 p-4 rounded-full">
                                    <i class="fas fa-users text-2xl text-blue-600"></i>
                                </div>
                            </div>
                            <a href="{{ route('gerant.participants.index') }}" class="mt-4 inline-flex items-center text-blue-600 hover:text-blue-800 text-sm">
                                Voir plus
                                <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>

                        <!-- Carte Montant Collecté -->
                        <div class="bg-white rounded-xl shadow-lg p-6 border-l-4 border-purple-500">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm text-gray-500">Montant Collecté</p>
                                    <p class="text-3xl font-bold mt-2">{{ number_format($totalCollected, 0, ',', ' ') }} FCFA</p>
                                </div>
                                <div class="bg-purple-100 p-4 rounded-full">
                                    <i class="fas fa-coins text-2xl text-purple-600"></i>
                                </div>
                            </div>
                            <a href="{{ route('gerant.cotisations.index') }}" class="mt-4 inline-flex items-center text-purple-600 hover:text-purple-800 text-sm">
                                Voir plus
                                <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Section Graphiques Principaux -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                        <!-- Graphique 1 -->
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <h3 class="text-xl font-semibold mb-4">Répartition des Tontines</h3>
                            <div class="chart-container h-80">
                                <canvas id="tontinesChart"></canvas>
                            </div>
                        </div>

                        <!-- Graphique 2 -->
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <h3 class="text-xl font-semibold mb-4">Cotisations Mensuelles</h3>
                            <div class="chart-container h-80">
                                <canvas id="cotisationsChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Dernières Tontines -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-xl font-semibold">Dernières Tontines</h3>
                            <x-secondary-button class="group">
                                <span>Voir tout</span>
                                <i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
                            </x-secondary-button>
                        </div>

                        <div class="overflow-x-auto rounded-lg border">
                            <table class="w-full">
                                <thead class="bg-gray-50">
                                    <tr class="text-left text-sm text-gray-500">
                                        <th class="px-6 py-3">Nom</th>
                                        <th class="px-6 py-3">Statut</th>
                                        <th class="px-6 py-3">Montant</th>
                                        <th class="px-6 py-3">Progression</th>
                                        <th class="px-6 py-3"></th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">
                                    @foreach($latestTontines as $tontine)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 font-medium">{{ $tontine->libelle }}</td>
                                        <td class="px-6 py-4">
                                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-800 text-sm">
                                                {{ $tontine->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4">{{ number_format($tontine->montant_total, 0, ',', ' ') }} FCFA</td>
                                        <td class="px-6 py-4">
                                            <div class="w-32 h-2 bg-gray-200 rounded-full">
                                                <div class="h-full bg-blue-600 rounded-full" style="width: {{ $tontine->progress }}%"></div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <!-- Menu déroulant actions... -->
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
        // Debug: Vérifiez que les données sont bien reçues
        console.log(@json($tontinesChart));
        console.log(@json($cotisationsChart));

        // 1. Graphique en donut des tontines
        const tontinesCtx = document.getElementById('tontinesChart');
        if (tontinesCtx) {
            new Chart(tontinesCtx, {
                type: 'doughnut',
                data: {
                    labels: @json($tontinesChart['labels']),
                    datasets: [{
                        data: @json($tontinesChart['data']),
                        backgroundColor: @json($tontinesChart['colors']),
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'right' }
                    }
                }
            });
        } else {
            console.error("Element #tontinesChart non trouvé");
        }

        // 2. Graphique en barres des cotisations
        const cotisationsCtx = document.getElementById('cotisationsChart');
        if (cotisationsCtx) {
            new Chart(cotisationsCtx, {
                type: 'bar',
                data: {
                    labels: @json($cotisationsChart['labels']),
                    datasets: [{
                        label: 'Montant (FCFA)',
                        data: @json($cotisationsChart['data']),
                        backgroundColor: @json($cotisationsChart['color']),
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return new Intl.NumberFormat('fr-FR').format(value) + ' FCFA';
                                }
                            }
                        }
                    }
                }
            });
        } else {
            console.error("Element #cotisationsChart non trouvé");
        }
    });
    </script>
    @endpush
</x-app-layout>
