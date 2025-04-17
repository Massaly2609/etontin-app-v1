<x-auth-guest>
    <div class="min-h-screen flex items-center justify-center p-4 bg-gray-50">
        <div class="w-full max-w-6xl bg-white dark:bg-gray-900 rounded-2xl shadow-lg overflow-hidden flex flex-col md:flex-row">
            <!-- Section visuelle gauche -->
            <div class="md:w-1/3 bg-gradient-to-b from-red-50 to-red-100 dark:from-red-900 dark:to-red-800 p-8 hidden md:flex flex-col justify-center">
                <div class="text-center space-y-6">
                    <div class="inline-block p-5 bg-red-600 rounded-xl">
                        <i class="fas fa-shield-alt text-4xl text-white"></i>
                    </div>
                     {{-- message
                     {!! Toastr::message() !!} --}}
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                        Sécurité Maximale
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-red-200">
                        Accès sécurisé au panel d'administration complet
                    </p>
                </div>
            </div>

            <!-- Section formulaire droite -->
            <div class="md:w-2/3 p-8 flex items-center justify-center">
                <div class="w-full max-w-md">
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-extrabold text-gray-900 dark:text-white">
                            Connexion Super Admin | Gérant
                        </h2>
                        <p class="mt-2 text-red-500 dark:text-red-400 text-sm font-medium">
                            Accès restreint aux administrateurs certifiés
                        </p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf
                        <input type="hidden" name="expected_role" value="SUPER_ADMIN">

                        <!-- Avertissement -->
                        <div class="bg-red-50 dark:bg-red-900/20 p-4 rounded-lg border border-red-200 dark:border-red-800">
                            <p class="text-xs text-red-700 dark:text-red-300 text-center">
                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                Accès réservé au personnel autorisé
                            </p>
                        </div>

                        <!-- Email -->
                        <div>
                            <x-input-label for="email" value="Identifiant Administrateur" />
                            <div class="relative mt-2">
                                <i class="fas fa-user-shield absolute left-4 top-1/2 transform -translate-y-1/2 text-red-500"></i>
                                <x-text-input
                                    id="email"
                                    class="w-full pl-12 pr-4 py-3 border-red-200 dark:border-red-700 focus:ring-red-500"
                                    type="email"
                                    name="email"
                                    :value="old('email')"
                                    required
                                    autofocus
                                    placeholder="admin@domaine.com" />
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                        </div>

                        <!-- Mot de passe -->
                        <div>
                            <x-input-label for="password" value="Clé de Sécurité" />
                            <div class="relative mt-2">
                                <i class="fas fa-key absolute left-4 top-1/2 transform -translate-y-1/2 text-red-500"></i>
                                <x-text-input
                                    id="password"
                                    class="w-full pl-12 pr-12 py-3 border-red-200 dark:border-red-700 focus:ring-red-500"
                                    type="password"
                                    name="password"
                                    required
                                    placeholder="••••••••" />
                                <button type="button"
                                        class="absolute right-4 top-1/2 transform -translate-y-1/2 text-red-400 hover:text-red-600"
                                        onclick="togglePasswordVisibility()">
                                    <i class="fas fa-eye-slash" id="password-icon"></i>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                        </div>

                        <!-- 2FA -->
                        <div class="text-center">
                            <a href="#" class="text-sm text-red-600 dark:text-red-400 hover:text-red-800">
                                <i class="fas fa-mobile-alt mr-2"></i>Authentification à 2 facteurs
                            </a>
                        </div>

                        <!-- Bouton -->
                        <x-primary-button class="w-full bg-red-600 hover:bg-red-700 text-white py-3.5  font-semibold">
                            <i class="fas fa-unlock-alt mr-2"></i> Accès au Panel
                        </x-primary-button>

                        <!-- Lien retour -->
                        <div class="text-center pt-4 border-t border-gray-200 dark:border-gray-800">
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Utilisateur standard ?
                                <a href="{{ route('register') }}" class="text-red-600 hover:text-red-800 dark:text-red-400">
                                    Créer un compte
                                </a>

                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const icon = document.getElementById('password-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            } else {
                passwordInput.type = 'password';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            }
        }
    </script>
</x-auth-guest>
