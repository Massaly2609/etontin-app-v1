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
                                    {{ __('Types de Tontines') }}
                                </h1>
                                <nav class="flex space-x-2">
                                    <a href="{{ route('settings.index') }}" class="text-blue-200 hover:text-white">Paramètres</a>
                                    <span class="text-blue-400">/</span>
                                    <span class="text-white"> Types de Tontines</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contenu principal -->
                <div class="max-w-7xl mx-auto px-8 -mt-12">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <form action="{{ route('settings.updateTontineTypes') }}" method="POST">
                            @csrf
                            <div class="space-y-4">
                                <div class="form-check">
                                    <input type="checkbox" name="tontine_types[]" value="JOURNALIERE" {{ in_array('JOURNALIERE', $activeTontineTypes) ? 'checked' : '' }} class="form-check-input">
                                    <label class="form-check-label">Journalière</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="tontine_types[]" value="HEBDOMADAIRE" {{ in_array('HEBDOMADAIRE', $activeTontineTypes) ? 'checked' : '' }} class="form-check-input">
                                    <label class="form-check-label">Hebdomadaire</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="tontine_types[]" value="MENSUEL" {{ in_array('MENSUEL', $activeTontineTypes) ? 'checked' : '' }} class="form-check-input">
                                    <label class="form-check-label">Mensuel</label>
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
