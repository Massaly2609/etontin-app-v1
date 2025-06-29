<x-auth-guest>
    <div class="min-h-screen flex items-center justify-center p-6 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-950">
        <div class="w-full max-w-6xl bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row transform transition-all duration-300 hover:scale-[1.005]">

            <div class="md:w-1/2 bg-gradient-to-br from-indigo-700 to-purple-800 p-10 hidden md:flex flex-col justify-center items-center text-white relative overflow-hidden">
                <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.1\'%3E%3Cpath d=\'M36 34.238l-4-4.834V20h-4v9.404L20 34.238v4.928L29 33v6.238L24 45v4l5 3 5-3v-4l-5-6.238V33l9 5.866v-4.928zM42 21h-4v4h4v-4zM24 16h-4v4h4v-4z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E'); background-size: 20px 20px;"></div>
                <div class="relative z-10 text-center space-y-6">
                    <div class="inline-block p-5 bg-white bg-opacity-20 rounded-full backdrop-blur-sm shadow-lg">
                        <i class="fas fa-lock text-5xl text-white"></i>
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-extrabold leading-tight tracking-tight">
                        Plateforme de <br> Gestion Sécurisée
                    </h2>
                    <p class="text-base text-indigo-100 opacity-90 leading-relaxed">
                        Accédez en toute confiance à votre panneau d'administration. Une sécurité de pointe pour protéger vos données.
                    </p>
                    <div class="mt-6">
                        <span class="inline-flex items-center px-4 py-2 bg-indigo-600 bg-opacity-80 rounded-full text-sm font-medium text-white shadow-md">
                            <i class="fas fa-shield-alt mr-2"></i> Accès Réservé
                        </span>
                    </div>
                </div>
            </div>

            <div class="md:w-1/2 p-8 sm:p-10 md:p-12 flex items-center justify-center">
                <div class="w-full max-w-md">
                    <div class="text-center mb-8">
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 dark:text-white leading-snug">
                            Connexion <span class="text-indigo-600">Administrateur</span>
                        </h2>
                        <p class="mt-2 text-gray-600 dark:text-gray-400 text-sm font-medium">
                            Veuillez entrer vos identifiants pour accéder au panel.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf
                        <input type="hidden" name="expected_role" value="SUPER_ADMIN">

                        <div class="bg-blue-50 dark:bg-blue-900/20 p-3 rounded-lg border border-blue-200 dark:border-blue-800 flex items-center space-x-3">
                            <i class="fas fa-info-circle text-blue-600 dark:text-blue-300 text-lg"></i>
                            <p class="text-xs text-blue-800 dark:text-blue-300">
                                Accès strictement contrôlé. Toute tentative non autorisée sera enregistrée.
                            </p>
                        </div>

                        <div>
                            <x-input-label for="email" value="Adresse Email" class="text-gray-700 dark:text-gray-300 mb-2" />
                            <div class="relative">
                                <i class="fas fa-envelope absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 text-lg"></i>
                                <x-text-input
                                    id="email"
                                    class="w-full pl-12 pr-4 py-3.5 border-gray-300 dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-gray-900 dark:text-white dark:bg-gray-700"
                                    type="email"
                                    name="email"
                                    :value="old('email')"
                                    required
                                    autofocus
                                    placeholder="votre.email@exemple.com" />
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                        </div>

                        <div>
                            <x-input-label for="password" value="Mot de passe" class="text-gray-700 dark:text-gray-300 mb-2" />
                            <div class="relative">
                                <i class="fas fa-key absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 text-lg"></i>
                                <x-text-input
                                    id="password"
                                    class="w-full pl-12 pr-14 py-3.5 border-gray-300 dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-gray-900 dark:text-white dark:bg-gray-700"
                                    type="password"
                                    name="password"
                                    required
                                    placeholder="••••••••" />
                                <button type="button"
                                        class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors duration-200"
                                        onclick="togglePasswordVisibility()">
                                    <i class="fas fa-eye-slash" id="password-icon"></i>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                        </div>

                        <div class="text-center pt-2">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium transition-colors duration-200">
                                    <i class="fas fa-question-circle mr-1"></i> Mot de passe oublié ?
                                </a>
                            @endif
                            {{-- Ou pour 2FA --}}
                            {{-- <a href="#" class="inline-flex items-center text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 font-medium transition-colors duration-200">
                                <i class="fas fa-mobile-alt mr-2 text-base"></i> Authentification à 2 facteurs
                            </a> --}}
                        </div>

                        <x-primary-button class="w-full bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white py-4 rounded-lg font-bold text-lg shadow-md hover:shadow-lg transition-all duration-200 flex items-center justify-center">
                            <i class="fas fa-sign-in-alt mr-2"></i> Se Connecter
                        </x-primary-button>

                        {{-- <div class="text-center pt-6 border-t border-gray-200 dark:border-gray-700 mt-8">
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                Pas encore de compte ?
                                <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300 font-semibold transition-colors duration-200">
                                    Inscrivez-vous ici
                                </a>
                            </p>
                        </div> --}}
                         <div class="text-center text-sm text-gray-500 mt-6">
                            Nouveau sur la plateforme?
                            <a href="#" class="text-red-600 hover:text-red-700 font-medium transition duration-200 ease-in-out">Contactez l'admin</a>
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
