<x-app-layout>
    <div class="min-h-screen bg-gray-50">
        <div class="flex h-screen">
            @include('layouts.leftBar')

            <main class="flex-1 p-5 bg-gray-50 overflow-y-auto">
                <!-- En-tête -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-500 px-8 pt-10 pb-16 rounded-xl border-l-2 border-b-4 border-cyan-600 shadow-lg">
                    <div class="max-w-7xl mx-auto">
                        <div class="flex items-center justify-between">
                            <div class="space-y-4">
                                <h1 class="text-4xl font-bold text-white tracking-tight">
                                    {{ __('Moyens de Paiement') }}
                                </h1>
                                <nav class="flex space-x-2">
                                    <a href="{{ route('settings.index') }}" class="text-blue-200 hover:text-white">Paramètres</a>
                                    <span class="text-blue-400">/</span>
                                    <span class="text-white"> Moyens de Paiement</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contenu principal -->
                <div class="max-w-7xl mx-auto px-8 -mt-12">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <form action="{{ route('settings.updatePaymentMethods') }}" method="POST">
                            @csrf
                            <div class="space-y-4">
                                <div class="form-check">
                                    <input type="checkbox" name="payment_methods[]" value="ESPECES" {{ in_array('ESPECES', $activePaymentMethods) ? 'checked' : '' }} class="form-check-input">
                                    <label class="form-check-label">Espèces</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="payment_methods[]" value="WAVE" {{ in_array('WAVE', $activePaymentMethods) ? 'checked' : '' }} class="form-check-input">
                                    <label class="form-check-label">Wave</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="payment_methods[]" value="OM" {{ in_array('OM', $activePaymentMethods) ? 'checked' : '' }} class="form-check-input">
                                    <label class="form-check-label">Orange Money</label>
                                </div>
                                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
