<x-auth-guest>
    <div class="min-h-screen flex items-center justify-center p-6 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-950">
        <div class="w-full max-w-4xl bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row transform transition-all duration-300 hover:scale-[1.005]">

            <div class="md:w-1/3 bg-gradient-to-br from-indigo-700 to-purple-800 p-8 hidden md:flex flex-col justify-center items-center text-white relative overflow-hidden">
                <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.1\'%3E%3Cpath d=\'M36 34.238l-4-4.834V20h-4v9.404L20 34.238v4.928L29 33v6.238L24 45v4l5 3 5-3v-4l-5-6.238V33l9 5.866v-4.928zM42 21h-4v4h4v-4zM24 16h-4v4h4v-4z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E'); background-size: 20px 20px;"></div>
                <div class="relative z-10 text-center space-y-6">
                    <div class="inline-block p-5 bg-white bg-opacity-20 rounded-full backdrop-blur-sm shadow-lg">
                        <i class="fas fa-user-plus text-4xl text-white"></i>
                    </div>
                    <h2 class="text-2xl font-extrabold leading-tight tracking-tight">
                        Créez Votre <br> Compte Admin
                    </h2>
                    <p class="text-sm text-indigo-100 opacity-90 leading-relaxed">
                        Rejoignez notre équipe d'administrateurs pour une gestion complète et sécurisée.
                    </p>
                    <div class="mt-6">
                        <span class="inline-flex items-center px-4 py-2 bg-indigo-600 bg-opacity-80 rounded-full text-sm font-medium text-white shadow-md">
                            <i class="fas fa-fingerprint mr-2"></i> Inscription Sécurisée
                        </span>
                    </div>
                </div>
            </div>

            <div class="md:w-2/3 p-8 sm:p-10 md:p-12">
                <div class="text-center mb-8">
                    <h1 class="text-2xl sm:text-2xl font-extrabold text-gray-900 dark:text-white leading-snug">
                        Inscription <span class="text-indigo-600">Super Admin</span>
                    </h1>
                    <p class="mt-2 text-gray-600 dark:text-gray-400 text-sm font-medium">
                        Remplissez le formulaire pour créer un compte administrateur.
                    </p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <input type="hidden" name="profil" value="SUPER_ADMIN">

                    <div class="bg-blue-50 dark:bg-blue-900/20 p-3 rounded-lg border border-blue-200 dark:border-blue-800 flex items-center space-x-3">
                        <i class="fas fa-info-circle text-blue-600 dark:text-blue-300 text-lg"></i>
                        <p class="text-xs text-blue-800 dark:text-blue-300">
                            Ce compte bénéficiera de **privilèges d'administration complets**.
                        </p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-x-4 gap-y-5">
                        <div>
                            <label for="prenom" class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 block">Prénom <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-user absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <x-text-input
                                    id="prenom"
                                    type="text"
                                    name="prenom"
                                    :value="old('prenom')"
                                    class="w-full pl-12 pr-4 py-3.5 border-gray-300 dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-gray-900 dark:text-white dark:bg-gray-700"
                                    required
                                    autofocus />
                            </div>
                            <x-input-error :messages="$errors->get('prenom')" class="mt-2 text-red-500 text-sm" />
                        </div>

                        <div>
                            <label for="nom" class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 block">Nom <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-id-card absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <x-text-input
                                    id="nom"
                                    type="text"
                                    name="nom"
                                    :value="old('nom')"
                                    class="w-full pl-12 pr-4 py-3.5 border-gray-300 dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-gray-900 dark:text-white dark:bg-gray-700"
                                    required />
                            </div>
                            <x-input-error :messages="$errors->get('nom')" class="mt-2 text-red-500 text-sm" />
                        </div>

                        <div>
                            <label for="telephone" class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 block">Téléphone <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-phone absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <x-text-input
                                    id="telephone"
                                    type="tel"
                                    name="telephone"
                                    :value="old('telephone')"
                                    class="w-full pl-12 pr-4 py-3.5 border-gray-300 dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-gray-900 dark:text-white dark:bg-gray-700"
                                    required />
                            </div>
                            <x-input-error :messages="$errors->get('telephone')" class="mt-2 text-red-500 text-sm" />
                        </div>

                        <div>
                            <label for="email" class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 block">Email <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-envelope absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <x-text-input
                                    id="email"
                                    type="email"
                                    name="email"
                                    :value="old('email')"
                                    class="w-full pl-12 pr-4 py-3.5 border-gray-300 dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-gray-900 dark:text-white dark:bg-gray-700"
                                    required />
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
                        </div>

                        <div>
                            <label for="password" class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 block">Mot de passe <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <x-text-input
                                    id="password"
                                    type="password"
                                    name="password"
                                    class="w-full pl-12 pr-14 py-3.5 border-gray-300 dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-gray-900 dark:text-white dark:bg-gray-700"
                                    required />
                                <button type="button"
                                        class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors duration-200"
                                        onclick="togglePasswordVisibility('password')">
                                    <i class="fas fa-eye-slash" id="password-icon"></i>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
                        </div>

                        <div>
                            <label for="password_confirmation" class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 block">Confirmer le mot de passe <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <x-text-input
                                    id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    class="w-full pl-12 pr-14 py-3.5 border-gray-300 dark:border-gray-700 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm text-gray-900 dark:text-white dark:bg-gray-700"
                                    required />
                                <button type="button"
                                        class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors duration-200"
                                        onclick="togglePasswordVisibility('password_confirmation')">
                                    <i class="fas fa-eye-slash" id="password-confirmation-icon"></i>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
                        </div>
                    </div>

                    <x-primary-button class="w-full bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white py-4 rounded-lg font-bold text-lg shadow-md hover:shadow-lg transition-all duration-200 flex items-center justify-center mt-6">
                        <i class="fas fa-user-plus mr-2"></i> Créer Mon Compte Admin
                    </x-primary-button>

                    <p class="text-center text-sm text-gray-600 dark:text-gray-400 mt-4">
                        Vous avez déjà un compte ?
                        <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-300 font-semibold transition-colors duration-200">
                            Connectez-vous ici
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility(id) {
            const passwordInput = document.getElementById(id);
            const icon = document.getElementById(id + '-icon'); // Use ID for icon as well

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
