    {{-- <x-app-layout>
        <div class="min-h-screen bg-gray-50">
            <div class="flex flex-col lg:flex-row h-screen overflow-hidden">
                @include('layouts.leftbarParticipant')

                <main class="flex-1 overflow-y-auto overflow-x-hidden bg-gray-50">
                    <!-- En-tête -->
                    <div class="relative p-5 bg-gradient-to-r from-blue-700 to-indigo-700 shadow-2xl overflow-hidden">
                        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-white/5 to-transparent"></div>
                        <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
                            <div class="py-10">
                                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                    <div>
                                        <h1 class="text-4xl font-extrabold text-white tracking-wide drop-shadow-lg">
                                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-200">
                                                Nouvelle Cotisation
                                            </span>
                                        </h1>
                                        <p class="text-blue-100 mt-2 flex items-center gap-2 text-sm">
                                            <span class="animate-pulse">✨</span>
                                            <span>Effectuez une cotisation pour la tontine: {{ $tontine->libelle }}</span>
                                        </p>
                                    </div>
                                    <a href="{{ route('participant.tontines.show', $tontine) }}" class="px-4 py-2 bg-white/20 hover:bg-white/30 text-white text-sm font-medium rounded-lg transition-colors duration-300 inline-flex items-center">
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
                                <h2 class="text-lg font-medium text-gray-900">Formulaire de cotisation</h2>
                            </div>
                            @php
                            $totalCotise = auth()->user()->cotisations()
                                ->where('idTontine', $tontine->id)
                                ->sum('montant');
                            $reste = $tontine->montant_total - $totalCotise;
                        @endphp

                                @if($reste > 0)
                                    <div class="alert alert-info">
                                        Vous avez cotisé {{ number_format($totalCotise, 0, ',', ' ') }} FCFA sur
                                        {{ number_format($tontine->montant_total, 0, ',', ' ') }} FCFA.
                                        Il reste {{ number_format($reste, 0, ',', ' ') }} FCFA.
                                    </div>
                                @else
                                    <div class="alert alert-success">
                                        Vous avez complété votre participation à cette tontine.
                                    </div>
                                @endif
                            <form method="POST" action="{{ route('participant.cotisations.store', $tontine) }}" class="p-6">
                                @csrf

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Montant -->
                                    <div class="col-span-1">
                                        <label for="montant" class="block text-sm font-medium text-gray-700">Montant (FCFA)</label>
                                        <div class="mt-1 relative rounded-md shadow-sm">
                                            <input type="number" name="montant" id="montant"
                                                max="{{ $tontine->montant_total }}"
                                                value="{{ $tontine->montant_de_base }}"
                                                class="block w-full pr-12 pl-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                                                required>
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                                <span class="text-gray-500 sm:text-sm">FCFA</span>
                                            </div>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500">Minimum: {{ number_format($tontine->montant_de_base, 0, ',', ' ') }} FCFA</p>
                                    </div>

                                    <!-- Moyen de paiement -->
                                    <div class="col-span-1">
                                        <label for="moyen_paiement" class="block text-sm font-medium text-gray-700">Moyen de paiement</label>
                                        <select id="moyen_paiement" name="moyen_paiement"
                                                class="mt-1 block w-full pl-3 pr-10 py-3 text-base border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 rounded-lg transition duration-150"
                                                required>
                                            <option value="">Sélectionnez...</option>
                                            <option value="WAVE">Wave</option>
                                            <option value="OM">Orange Money</option>
                                            <option value="ESPECES">Espèces</option>
                                        </select>
                                    </div>

                                    <!-- Numéro de transaction (conditionnel) -->
                                    <div class="col-span-1 md:col-span-2" id="transactionField">
                                        <label for="numero_transaction" class="block text-sm font-medium text-gray-700">Numéro de transaction</label>
                                        <input type="text" name="numero_transaction" id="numero_transaction"
                                            placeholder="Ex: WAVE123456789"
                                            class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                                        <p class="mt-1 text-sm text-gray-500">Pour les paiements électroniques uniquement</p>
                                    </div>

                                    <!-- Solde actuel -->
                                    <div class="col-span-1 md:col-span-2 bg-blue-50 p-4 rounded-lg">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <p class="text-sm font-medium text-gray-700">Votre solde actuel</p>
                                                <p class="text-2xl font-bold text-blue-700">{{ number_format(auth()->user()->solde, 0, ',', ' ') }} FCFA</p>
                                            </div>
                                            <a href="#" class="text-sm text-blue-600 hover:text-blue-800 font-medium inline-flex items-center">
                                                <i class="fas fa-plus-circle mr-1"></i> Recharger
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-8 flex justify-end space-x-3">
                                    <a href="{{ route('participant.tontines.show', $tontine) }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors duration-150 inline-flex items-center">
                                        Annuler
                                    </a>
                                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-150 inline-flex items-center">
                                        <i class="fas fa-check-circle mr-2"></i> Confirmer la cotisation
                                    </button>
                                </div>
                            </form>
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
    </x-app-layout> --}}

    <x-app-layout>
        <div class="min-h-screen bg-gray-50">
            <div class="flex flex-col lg:flex-row h-screen overflow-hidden">
                <!-- Sidebar -->
                @include('layouts.leftbarParticipant')

                <!-- Main Content -->
                <main class="flex-1 overflow-y-auto overflow-x-hidden bg-gray-50">
                    <!-- Hero Header -->
                    <div class="relative p-5 bg-gradient-to-r from-blue-700 to-indigo-700 shadow-2xl overflow-hidden">
                        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-white/5 to-transparent"></div>

                        <div class="relative max-w-7xl mx-auto px-6 lg:px-8">
                            <div class="py-10">
                                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                    <!-- Title Section -->
                                    <div>
                                        <h1 class="text-4xl font-extrabold text-white tracking-wide drop-shadow-lg">
                                            <span class="bg-clip-text text-transparent bg-gradient-to-r from-white to-blue-200">
                                                Nouvelle Cotisation
                                            </span>
                                        </h1>
                                        <p class="text-blue-100 mt-2 flex items-center gap-2 text-sm">
                                            <span class="animate-pulse">✨</span>
                                            <span>Effectuez une cotisation pour la tontine: {{ $tontine->libelle }}</span>
                                        </p>
                                    </div>


                                    <!-- Solde Section -->
                                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3 border border-white/20">
                                        <div class="flex items-center gap-3">
                                            <div class="p-2 bg-blue-600/20 rounded-full">
                                                <i class="fas fa-wallet text-white text-lg"></i>
                                            </div>
                                            <div>
                                                <p class="text-xs font-semibold text-blue-200 uppercase tracking-wider">Votre solde</p>
                                                <p class="text-xl font-bold text-white mt-1 flex items-center">
                                                    {{-- {{ number_format(auth()->user()->solde, 0, ',', ' ') }} FCFA --}}
                                                    {{-- auth()->user()->solde --}}
                                                    {{ $tontine->montant_de_base}}
                                                    @if( $tontine->montant_de_base >= $tontine->montant_total)
                                                        <span class="ml-2 text-xs bg-green-500/90 text-white px-2 py-0.5 rounded-full flex items-center">
                                                            <i class="fas fa-check-circle mr-1"></i> Suffisant
                                                        </span>
                                                    @else
                                                        <span class="ml-2 text-xs bg-red-500/90 text-white px-2 py-0.5 rounded-full flex items-center">
                                                            <i class="fas fa-exclamation-circle mr-1"></i> Insuffisant
                                                        </span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Back Button -->
                                    <a href="{{ route('participant.tontines.show', $tontine) }}"
                                       class="px-4 py-2 bg-white/20 hover:bg-white/30 text-white text-sm font-medium rounded-lg transition-colors duration-300 inline-flex items-center">
                                        <i class="fas fa-arrow-left mr-2"></i>
                                        Retour
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Form Container -->
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                        <div class="bg-white rounded-xl shadow overflow-hidden">
                            <!-- Form Header -->
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h2 class="text-lg font-medium text-gray-900">Formulaire de cotisation</h2>
                            </div>

                              <!-- Cotisation Status -->
                              @php
                              $cotisations = auth()->user()->cotisations()
                                  ->where('idTontine', $tontine->id)
                                  ->orderBy('created_at', 'desc')
                                  ->get();

                              $totalCotise = $cotisations->sum('montant');
                              $reste = $tontine->montant_total - $totalCotise;
                              @endphp

                          <!-- Cotisation History -->
                          <div class="px-6 py-4 border-b border-gray-200">
                              <h3 class="text-md font-medium text-gray-900 mb-3">Historique de vos cotisations</h3>

                              @if($cotisations->isEmpty())
                                  <p class="text-sm text-gray-500">Aucune cotisation enregistrée</p>
                              @else
                                  <div class="space-y-2">
                                      @foreach($cotisations as $cotisation)
                                      <div class="flex justify-between items-center p-3 bg-gray-50 rounded-lg">
                                          <div>
                                              <p class="text-sm font-medium text-gray-900">
                                                  {{ $cotisation->created_at->format('d/m/Y H:i') }}
                                              </p>
                                              <p class="text-xs text-gray-500">
                                                  {{ $cotisation->moyen_paiement }}
                                                  @if($cotisation->numero_transaction)
                                                      ({{ $cotisation->numero_transaction }})
                                                  @endif
                                              </p>
                                          </div>
                                          <span class="text-sm font-bold text-blue-600">
                                              +{{ number_format($cotisation->montant, 0, ',', ' ') }} FCFA
                                          </span>
                                      </div>
                                      @endforeach
                                  </div>
                              @endif
                          </div>
                            <!-- Cotisation Status -->
                            @php
                                $totalCotise = auth()->user()->cotisations()
                                    ->where('idTontine', $tontine->id)
                                    ->sum('montant');
                                $reste = $tontine->montant_total - $totalCotise;
                            @endphp

                            @if($reste > 0)
                                <div class="px-6 py-4 bg-blue-50 border-b border-blue-100">
                                    <div class="flex items-center text-blue-800">
                                        <i class="fas fa-info-circle mr-2"></i>
                                        <p>
                                            Vous avez cotisé <strong>{{ number_format($totalCotise, 0, ',', ' ') }} FCFA</strong> sur
                                            <strong>{{ number_format($tontine->montant_total, 0, ',', ' ') }} FCFA</strong>.
                                            Il reste <strong>{{ number_format($reste, 0, ',', ' ') }} FCFA</strong>.
                                        </p>
                                    </div>
                                </div>
                            @else
                                <div class="px-6 py-4 bg-green-50 border-b border-green-100">
                                    <div class="flex items-center text-green-800">
                                        <i class="fas fa-check-circle mr-2"></i>
                                        <p>Vous avez complété votre participation à cette tontine.</p>
                                    </div>
                                </div>
                            @endif
                            <!-- Progress Bar -->
                            <div class="px-6 py-4 border-b border-gray-200">
                                <div class="mb-2 flex justify-between">
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-blue-600 h-2.5 rounded-full"
                                        style="width: {{ ($totalCotise / $tontine->montant_total) * 100 }}%"></div>
                                        <span class="text-sm font-medium text-blue-600">
                                            {{ round(($totalCotise / $tontine->montant_total) * 100) }}%
                                        </span>
                                </div>
                            </div>

                            <!-- Cotisation Form -->
                            <form method="POST" action="{{ route('participant.cotisations.store', $tontine) }}" class="p-6">
                                @csrf

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <!-- Amount Field -->
                                    <div class="col-span-1">
                                        <label for="montant" class="block text-sm font-medium text-gray-700">
                                            Montant (FCFA)
                                        </label>
                                        <div class="mt-1 relative rounded-md shadow-sm">
                                            <input type="number"
                                                   name="montant"
                                                   id="montant"
                                                   min="{{ $tontine->montant_de_base }}"
                                                   max="{{ $tontine->montant_total }}"
                                                   value="{{ $tontine->montant_de_base }}"
                                                   class="block w-full pr-12 pl-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150"
                                                   required>
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                                <span class="text-gray-500 sm:text-sm">FCFA</span>
                                            </div>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500">
                                            Minimum: {{ number_format($tontine->montant_de_base, 0, ',', ' ') }} FCFA
                                        </p>
                                    </div>

                                    <!-- Payment Method -->
                                    <div class="col-span-1">
                                        <label for="moyen_paiement" class="block text-sm font-medium text-gray-700">
                                            Moyen de paiement
                                        </label>
                                        <select id="moyen_paiement"
                                                name="moyen_paiement"
                                                class="mt-1 block w-full pl-3 pr-10 py-3 text-base border border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 rounded-lg transition duration-150"
                                                required>
                                            <option value="">Sélectionnez...</option>
                                            <option value="WAVE">Wave</option>
                                            <option value="OM">Orange Money</option>
                                            <option value="ESPECES">Espèces</option>
                                        </select>
                                    </div>

                                    <!-- Transaction Number (Conditional) -->
                                    <div class="col-span-1 md:col-span-2" id="transactionField">
                                        <label for="numero_transaction" class="block text-sm font-medium text-gray-700">
                                            Numéro de transaction
                                        </label>
                                        <input type="text"
                                               name="numero_transaction"
                                               id="numero_transaction"
                                               placeholder="Ex: WAVE123456789"
                                               class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                                        <p class="mt-1 text-sm text-gray-500">
                                            Pour les paiements électroniques uniquement
                                        </p>
                                    </div>

                                    <!-- Current Balance -->
                                    <div class="col-span-1 md:col-span-2 bg-blue-50 p-4 rounded-lg">
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <p class="text-sm font-medium text-gray-700">Votre solde actuel</p>
                                                <p class="text-2xl font-bold text-blue-700">
                                                    {{ number_format(auth()->user()->solde, 0, ',', ' ') }} FCFA
                                                </p>
                                            </div>
                                            <a href="#" class="text-sm text-blue-600 hover:text-blue-800 font-medium inline-flex items-center">
                                                <i class="fas fa-plus-circle mr-1"></i> Recharger
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Form Actions -->
                                <div class="mt-8 flex justify-end space-x-3">
                                    <a href="{{ route('participant.tontines.show', $tontine) }}"
                                       class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors duration-150 inline-flex items-center">
                                        Annuler
                                    </a>
                                    <button type="submit"
                                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-150 inline-flex items-center">
                                        <i class="fas fa-check-circle mr-2"></i> Confirmer la cotisation
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>


                </main>
            </div>
        </div>

        <!-- JavaScript for Dynamic Field -->
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
