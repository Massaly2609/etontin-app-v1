<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <div class="flex flex-col lg:flex-row h-screen overflow-hidden">
            @include('layouts.leftbarParticipant')

            <main class="flex-1 overflow-y-auto overflow-x-hidden bg-gray-50">
                <!-- En-tête Premium Amélioré -->
                <div class="relative p-5 bg-gradient-to-r from-blue-700 to-indigo-700 shadow-2xl overflow-hidden">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-white/5 to-transparent"></div>
                    <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
                        <div class="flex flex-col md:flex-row justify-between items-center py-10 gap-8">
                            <div class="relative -mt-3 text-center md:text-left">
                                <h1 class="text-4xl font-extrabold text-white tracking-wide drop-shadow-lg">
                                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-200">
                                        Mon Tableau de Bord
                                    </span>
                                </h1>
                                <p class="text-blue-100 mt-2 flex items-center gap-2 text-sm">
                                    <span class="animate-pulse">✨</span>
                                    <span>Résumé complet de vos activités</span>
                                </p>
                            </div>

                            <div class="relative bg-white/10 -mt-5 backdrop-blur-lg rounded-2xl p-5 border border-white/20 shadow-xl transition-transform transform hover:scale-105">
                                <div class="flex items-center gap-4">
                                    <div class="p-4 bg-white/20 rounded-xl shadow-inner">
                                        <svg class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs font-semibold text-blue-200">SOLDE DISPONIBLE</p>
                                        <p class="text-2xl font-bold text-white mt-1">
                                            {{ number_format(auth()->user()->solde ?? 0, 0, ',', ' ') }} FCFA
                                        </p>
                                    </div>
                                </div>
                                <button class="mt-4 w-full py-2 bg-white/20 hover:bg-white/30 text-white text-sm font-medium rounded-xl transition flex items-center justify-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    Recharger
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contenu principal amélioré -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
                    <!-- Statistiques sous forme de cartes interactives -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Carte Tontines -->
                        <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-blue-500 hover:shadow-xl transition-all duration-300">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm text-gray-500">Tontines Actives</p>
                                    <p class="text-3xl font-bold mt-1">{{ $tontines->count() }}</p>
                                </div>
                                <div class="p-3 bg-blue-100 rounded-lg text-blue-600">
                                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4 h-2 bg-gray-200 rounded-full">
                                <div class="h-2 bg-blue-500 rounded-full" style="width: {{ min(($tontines->count()/2)*100, 100) }}%"></div>
                            </div>
                            <p class="mt-2 text-xs text-gray-500">
                                {{ $tontines->count() }}/2 tontines maximum
                            </p>
                            <a href="{{ route('participant.tontines.index') }}" class="mt-4 inline-flex items-center text-sm text-blue-600 hover:text-blue-800 transition-colors">
                                Gérer mes tontines
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>

                        <!-- Carte Cotisations -->
                        <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-purple-500 hover:shadow-xl transition-all duration-300">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm text-gray-500">Cotisations</p>
                                    <p class="text-3xl font-bold mt-1">{{ $cotisations->count() }}</p>
                                </div>
                                <div class="p-3 bg-purple-100 rounded-lg text-purple-600">
                                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="text-lg font-semibold text-purple-700">
                                    {{ number_format($cotisations->sum('montant'), 0, ',', ' ') }} FCFA
                                </p>
                                <p class="text-xs text-gray-500">Total investi</p>
                            </div>
                            <a href="{{ route('participant.cotisations.index') }}" class="mt-4 inline-flex items-center text-sm text-purple-600 hover:text-purple-800 transition-colors">
                                Voir l'historique
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>

                        <!-- Carte Prochain Tirage -->
                        <div class="bg-white rounded-xl shadow-lg p-6 border-t-4 border-green-500 hover:shadow-xl transition-all duration-300">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm text-gray-500">Prochain Tirage</p>
                                    <p class="text-2xl font-bold mt-1">
                                        {{ $nextDraw ? $nextDraw->format('d/m/Y') : 'Aucun' }}
                                    </p>
                                </div>
                                <div class="p-3 bg-green-100 rounded-lg text-green-600">
                                    <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                @if($nextDraw)
                                    <p class="text-xs text-gray-500">
                                        {{ $nextDraw->diffForHumans() }}
                                    </p>
                                @endif
                            </div>
                            <a href="#" class="mt-4 inline-flex items-center text-sm text-green-600 hover:text-green-800 transition-colors">
                                Voir les tirages
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Graphique des cotisations -->
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-lg font-medium text-gray-900">Historique des cotisations</h2>
                        </div>
                        <div class="p-6 h-80">
                            <canvas id="contributionsChart"></canvas>
                        </div>
                    </div>

                    <!-- Section Prochaines Échéances -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Prochaines cotisations -->
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h2 class="text-lg font-medium text-gray-900">Prochaines Échéances</h2>
                            </div>
                            <div class="divide-y divide-gray-200">
                                @forelse($upcomingPayments as $payment)
                                    <div class="px-6 py-4 hover:bg-gray-50 transition-colors duration-150">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <h3 class="text-base font-medium text-gray-900">{{ $payment['tontine'] }}</h3>
                                                <p class="text-sm text-gray-500">{{ number_format($payment['amount'], 0, ',', ' ') }} FCFA - {{ $payment['date']->format('d/m/Y') }}</p>
                                            </div>
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-amber-100 text-amber-800">
                                                {{-- {{ $payment['date']->diffForHumans() }} --}}
                                                {{ $payment['date']->locale('fr')->diffForHumans() }}

                                            </span>
                                        </div>
                                    </div>
                                @empty
                                    <div class="px-6 py-12 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <p class="mt-2 text-sm text-gray-500">Aucune échéance à venir</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>

                        <!-- Tontines disponibles (version compacte) -->
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                                <h2 class="text-lg font-medium text-gray-900">Tontines Disponibles</h2>
                                <a href="{{ route('participant.tontines.available') }}" class="text-sm text-blue-600 hover:text-blue-800">Voir tout</a>
                            </div>
                            <div class="divide-y divide-gray-200">
                                @php
                                    $userTontinesCount = auth()->user()->tontines()->active()->count();
                                    $canJoinMore = $userTontinesCount < 2;
                                @endphp

                                @forelse($allTontines->take(3) as $tontine)
                                    <div class="px-6 py-4 hover:bg-gray-50 transition-colors duration-150">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <h3 class="text-base font-medium text-gray-900">{{ $tontine->libelle }}</h3>
                                                <p class="text-sm text-gray-500">
                                                    {{ number_format($tontine->montant_de_base, 0, ',', ' ') }} FCFA/mois
                                                    • {{ $tontine->participants_count }} membres
                                                </p>
                                            </div>
                                            @if(!$tontine->participants->contains(auth()->id()))
                                                @if($canJoinMore)
                                                    <a href="{{ route('participant.tontines.join-form', $tontine) }}"
                                                       class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium rounded-lg transition-colors">
                                                        Rejoindre
                                                    </a>
                                                @else
                                                    <span class="px-3 py-1 bg-gray-200 text-gray-600 text-xs font-medium rounded-lg cursor-not-allowed"
                                                          title="Vous avez déjà 2 tontines actives">
                                                        Limite atteinte
                                                    </span>
                                                @endif
                                            @else
                                                <span class="px-3 py-1 bg-green-100 text-green-800 text-xs font-medium rounded-lg">
                                                    Déjà membre
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                @empty
                                    <div class="px-6 py-12 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <p class="mt-2 text-sm text-gray-500">Aucune tontine disponible</p>
                                    </div>
                                @endforelse

                                @if(!$canJoinMore && $allTontines->isNotEmpty())
                                    <div class="px-6 py-4 bg-yellow-50 text-yellow-700 text-sm">
                                        <div class="flex items-center">
                                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                            Vous avez atteint la limite de 2 tontines actives
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Script pour le graphique -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Graphique des cotisations
            const ctx = document.getElementById('contributionsChart').getContext('2d');
            const chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($contributionMonths) !!},
                    datasets: [{
                        label: 'Montant (FCFA)',
                        data: {!! json_encode($contributionAmounts) !!},
                        backgroundColor: 'rgba(59, 130, 246, 0.7)',
                        borderColor: 'rgba(59, 130, 246, 1)',
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
                                    return value.toLocaleString() + ' FCFA';
                                }
                            }
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return context.parsed.y.toLocaleString() + ' FCFA';
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>
