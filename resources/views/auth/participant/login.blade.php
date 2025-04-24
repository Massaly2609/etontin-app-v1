<x-auth-guest>
    <div class="min-h-screen flex items-center justify-center p-4 bg-gray-50">
        <div class="w-full max-w-4xl bg-white rounded-xl shadow-lg overflow-hidden flex flex-col md:flex-row">
            <!-- Section visuelle -->
            <div class="md:w-1/3 bg-gradient-to-b from-blue-50 to-indigo-50 p-6 hidden md:flex flex-col justify-center">
                <div class="text-center space-y-4">
                    <div class="inline-block p-3 bg-blue-600 rounded-xl">
                        <i class="fas fa-lock text-2xl text-white"></i>
                    </div>
                    <h2 class="text-xl font-bold text-gray-800">Bienvenue à nouveau</h2>
                    <p class="text-sm text-gray-600">Accédez à votre espace participant sécurisé</p>
                </div>
            </div>

            <!-- Formulaire -->
            <div class="md:w-2/3 p-6">
                <div class="text-center mb-6">
                    <h1 class="text-xl font-semibold text-gray-800">Connexion Participant</h1>
                    <p class="text-sm text-gray-500 mt-1">Accédez à votre compte</p>
                </div>

                <form method="POST" action="{{ route('participant.login.submit') }}" class="space-y-4">
                    @csrf
                      <!-- Email -->
                      <div class="space-y-1">
                        <label for="email" class="text-xs font-medium text-gray-600">Email <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-user absolute left-3 top-3 text-gray-400 text-sm"></i>
                            <x-text-input
                                id="email"
                                type="email"
                                name="email"
                                :value="old('email')"
                                class="w-full pl-10 pr-3 py-2 text-sm border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-500"
                                required />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-500" />
                    </div>

                    <!-- Mot de passe -->
                        <div class="space-y-1">
                            <label for="password" class="text-xs font-medium text-gray-600">Mot de passe <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-lock absolute left-3 top-3 text-gray-400 text-sm"></i>
                                <x-text-input
                                    id="password"
                                    type="password"
                                    name="password"
                                    class="w-full pl-10 pr-3 py-2 text-sm border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-500"
                                    required />
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-500" />
                        </div>

                    <!-- Options -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            <span class="text-gray-600">Se souvenir de moi</span>
                        </label>
                        <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">Mot de passe oublié ?</a>
                    </div>

                    <!-- Bouton -->
                    <button type="submit" class="w-full bg-blue-600 text-white py-2.5 px-4 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors">
                        <i class="fas fa-sign-in-alt mr-2"></i> Se connecter
                    </button>

                    <p class="text-center text-xs text-gray-500 mt-3">
                        Pas encore membre ?
                        <a href="{{ route('participant.register') }}" class="text-blue-600 hover:underline">Créer un compte</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-auth-guest>
