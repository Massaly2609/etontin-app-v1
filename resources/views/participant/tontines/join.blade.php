<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <div class="flex flex-col lg:flex-row h-screen overflow-hidden">
            @include('layouts.leftbarParticipant')

            <main class="flex-1 overflow-y-auto overflow-x-hidden bg-gray-50">
                <!-- En-tête -->
                <div class="relative p-5 bg-gradient-to-r from-green-700 to-teal-700 shadow-2xl overflow-hidden">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-white/5 to-transparent"></div>
                    <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
                        <div class="py-10">
                            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                <div>
                                    <h1 class="text-4xl font-extrabold text-white tracking-wide drop-shadow-lg">
                                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-white to-green-200">
                                            Rejoindre la Tontine
                                        </span>
                                    </h1>
                                    <p class="text-green-100 mt-2 flex items-center gap-2 text-sm">
                                        <span class="animate-pulse">✨</span>
                                        <span>Formulaire d'inscription: {{ $tontine->libelle }}</span>
                                    </p>
                                </div>
                                <a href="{{ route('participant.tontines.available') }}" class="px-4 py-2 bg-white/20 hover:bg-white/30 text-white text-sm font-medium rounded-lg transition-colors duration-300 inline-flex items-center">
                                    <i class="fas fa-arrow-left mr-2"></i>
                                    Retour
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contenu principal -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                    <div class="bg-white rounded-xl shadow overflow-hidden">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-lg font-medium text-gray-900">Détails de la tontine</h2>
                        </div>

                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <!-- Info Tontine -->
                                <div>
                                    <h3 class="text-lg font-medium text-gray-900 mb-4">{{ $tontine->libelle }}</h3>
                                    <p class="text-gray-700 mb-4">{{ $tontine->description }}</p>

                                    <div class="space-y-3">
                                        <div class="flex items-center">
                                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span class="text-gray-700">Montant: {{ number_format($tontine->montant_de_base, 0, ',', ' ') }} FCFA</span>
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span class="text-gray-700">Fréquence: {{ $tontine->frequence }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                            </svg>
                                            <span class="text-gray-700">Membres: {{ $tontine->participants_count }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="h-5 w-5 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span class="text-gray-700">Date de fin: {{ $tontine->dateFin->format('d/m/Y') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Formulaire d'inscription -->
                                <div>
                                    <form method="POST" action="{{ route('participant.tontines.join', $tontine) }}">
                                        @csrf

                                        <div class="space-y-4">
                                            <div>
                                                <label for="montant" class="block text-sm font-medium text-gray-700">Montant initial (FCFA)</label>
                                                <input type="number" name="montant" id="montant"
                                                       min="{{ $tontine->montant_de_base }}"
                                                       value="{{ $tontine->montant_de_base }}"
                                                       class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 transition duration-150"
                                                       required>
                                                <p class="mt-1 text-sm text-gray-500">Minimum: {{ number_format($tontine->montant_de_base, 0, ',', ' ') }} FCFA</p>
                                            </div>

                                            <div>
                                                <label for="moyen_paiement" class="block text-sm font-medium text-gray-700">Moyen de paiement</label>
                                                <select id="moyen_paiement" name="moyen_paiement"
                                                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 transition duration-150"
                                                        required>
                                                    <option value="">Sélectionnez...</option>
                                                    <option value="WAVE">Wave</option>
                                                    <option value="OM">Orange Money</option>
                                                    <option value="ESPECES">Espèces</option>
                                                </select>
                                            </div>

                                            <div id="transactionField">
                                                <label for="numero_transaction" class="block text-sm font-medium text-gray-700">Numéro de transaction</label>
                                                <input type="text" name="numero_transaction" id="numero_transaction"
                                                       placeholder="Ex: WAVE123456789"
                                                       class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500 transition duration-150">
                                                <p class="mt-1 text-sm text-gray-500">Pour les paiements électroniques uniquement</p>
                                            </div>

                                            <div class="pt-4">
                                                <button type="submit" class="w-full px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors duration-300 inline-flex items-center justify-center">
                                                    <i class="fas fa-check-circle mr-2"></i> Confirmer l'inscription
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const moyenPaiement = document.getElementById('moyen_paiement');
            const transactionField = document.getElementById('transactionField');

            // Initial state
            toggleTransactionField();

            moyenPaiement.addEventListener('change', function() {
                toggleTransactionField();
            });

            function toggleTransactionField() {
                if (moyenPaiement.value === 'ESPECES' || moyenPaiement.value === '') {
                    transactionField.style.display = 'none';
                } else {
                    transactionField.style.display = 'block';
                }
            }
        });
    </script>
</x-app-layout>
