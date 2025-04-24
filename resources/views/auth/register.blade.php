<x-auth-guest>
    <div class="min-h-screen flex items-center justify-center p-4 bg-gray-50">
        <div class="w-full max-w-4xl bg-white rounded-xl shadow-lg overflow-hidden flex flex-col md:flex-row">
            <!-- Section visuelle -->
            <div class="md:w-1/3 bg-gradient-to-b from-red-50 to-red-100 p-6 hidden md:flex flex-col justify-center">
                <div class="text-center space-y-4">
                    <div class="inline-block p-3 bg-red-600 rounded-xl">
                        <i class="fas fa-shield-alt text-2xl text-white"></i>
                    </div>
                    <h2 class="text-xl font-bold text-gray-800">Accès Administrateur Système</h2>
                    <p class="text-sm text-gray-600">Interface sécurisée de gestion globale</p>
                </div>
            </div>

            <!-- Formulaire -->
            <div class="md:w-2/3 p-6">
                <div class="text-center mb-6">
                    <h1 class="text-xl font-semibold text-gray-800">Inscription Super Admin</h1>
                    <p class="text-sm text-red-500 mt-1">Réservé aux administrateurs système autorisés</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <!-- Champ caché pour le profil -->
                    <input type="hidden" name="profil" value="SUPER_ADMIN">

                    <div class="bg-red-50 p-4 rounded-lg mb-4 border border-red-200">
                        <p class="text-xs text-red-700 text-center">
                            <i class="fas fa-exclamation-triangle mr-1"></i>
                            Vous créez un compte avec des privilèges d'administration complets
                        </p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        <!-- Champs avec icônes rouges -->
                        <!-- Prénom -->
                        <div class="space-y-1">
                            <label class="text-xs font-medium text-gray-600">Prénom <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-user absolute left-3 top-3 text-red-400"></i>
                                <x-text-input
                                    id="prenom"
                                    type="text"
                                    name="prenom"
                                    :value="old('prenom')"
                                    class="w-full pl-10 pr-3 py-2 border-red-200 rounded-lg focus:ring-1 focus:ring-red-500"
                                    required
                                    autofocus />
                            </div>
                            <x-input-error :messages="$errors->get('prenom')" class="mt-1 text-xs text-red-500" />
                        </div>

                        <!-- Nom -->
                        <div class="space-y-1">
                            <label class="text-xs font-medium text-gray-600">Nom <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-id-card absolute left-3 top-3 text-red-400"></i>
                                <x-text-input
                                    id="nom"
                                    type="text"
                                    name="nom"
                                    :value="old('nom')"
                                    class="w-full pl-10 pr-3 py-2 border-red-200 rounded-lg focus:ring-1 focus:ring-red-500"
                                    required />
                            </div>
                            <x-input-error :messages="$errors->get('nom')" class="mt-1 text-xs text-red-500" />
                        </div>

                        <!-- Téléphone -->
                        <div class="space-y-1">
                            <label class="text-xs font-medium text-gray-600">Téléphone <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-phone absolute left-3 top-3 text-red-400"></i>
                                <x-text-input
                                    id="telephone"
                                    type="tel"
                                    name="telephone"
                                    :value="old('telephone')"
                                    class="w-full pl-10 pr-3 py-2 border-red-200 rounded-lg focus:ring-1 focus:ring-red-500"
                                    required />
                            </div>
                            <x-input-error :messages="$errors->get('telephone')" class="mt-1 text-xs text-red-500" />
                        </div>

                        <!-- Email -->
                        <div class="space-y-1">
                            <label class="text-xs font-medium text-gray-600">Email <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-envelope absolute left-3 top-3 text-red-400"></i>
                                <x-text-input
                                    id="email"
                                    type="email"
                                    name="email"
                                    :value="old('email')"
                                    class="w-full pl-10 pr-3 py-2 border-red-200 rounded-lg focus:ring-1 focus:ring-red-500"
                                    required />
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-500" />
                        </div>

                        <!-- Mot de passe -->
                        <div class="space-y-1">
                            <label class="text-xs font-medium text-gray-600">Mot de passe <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-lock absolute left-3 top-3 text-red-400"></i>
                                <x-text-input
                                    id="password"
                                    type="password"
                                    name="password"
                                    class="w-full pl-10 pr-3 py-2 border-red-200 rounded-lg focus:ring-1 focus:ring-red-500"
                                    required />
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-500" />
                        </div>

                        <!-- Confirmation -->
                        <div class="space-y-1">
                            <label class="text-xs font-medium text-gray-600">Confirmation <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-lock absolute left-3 top-3 text-red-400"></i>
                                <x-text-input
                                    id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    class="w-full pl-10 pr-3 py-2 border-red-200 rounded-lg focus:ring-1 focus:ring-red-500"
                                    required />
                            </div>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs text-red-500" />
                        </div>
                    </div>

                    <!-- Bouton rouge -->
                    <button type="submit" class="w-full bg-red-600 text-white py-2.5 px-4 rounded-lg text-sm font-medium hover:bg-red-700 transition-colors mt-4">
                        <i class="fas fa-user-shield mr-2"></i> Créer le compte Super Admin
                    </button>

                    <p class="text-center text-xs text-gray-500 mt-3">
                        Accès existant ?
                        <a href="{{ route('login') }}" class="text-red-600 hover:text-red-800">Connexion Super Admin</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-auth-guest>
