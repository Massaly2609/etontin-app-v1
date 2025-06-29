<x-auth-guest>
    <div class="min-h-screen flex items-center justify-center p-4 bg-gray-100 font-sans antialiased">
        <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row transform transition-all duration-300 hover:shadow-2xl">
            <div class="md:w-1/3 bg-gradient-to-br from-indigo-700 to-blue-500 p-8 hidden md:flex flex-col justify-center items-center text-white relative overflow-hidden">
                <div class="absolute inset-0 bg-pattern-dots opacity-10"></div>
                <div class="text-center space-y-6 z-10">
                    <div class="inline-block p-4 bg-white bg-opacity-20 backdrop-filter backdrop-blur-sm rounded-full shadow-lg">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-2 4h4m6-12a2 2 0 01-2 2H8a2 2 0 01-2-2m2 0V9a2 2 0 012-2h4a2 2 0 012 2v2m-6 0h6m-6 0h-2M9 11h.01M15 11h.01M5 11h.01M19 11h.01M12 11h.01"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-extrabold leading-tight">Bienvenue sur votre Espace Tontine</h2>
                    <p class="text-base text-indigo-100 opacity-90">Accédez à votre compte sécurisé et gérez vos contributions en toute sérénité.</p>
                </div>
            </div>

            <div class="md:w-2/3 p-8 md:p-12">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-800">Connexion Participant</h1>
                    <p class="text-sm text-gray-500 mt-2">Connectez-vous pour accéder à vos tontines et suivre vos participations.</p>
                </div>

                <form method="POST" action="{{ route('participant.login.submit') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Adresse Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.5a2.5 2.5 0 01-5 0V12a9 9 0 119 9m-4.5-1.5z"></path>
                                </svg>
                            </div>
                            <x-text-input
                                id="email"
                                type="email"
                                name="email"
                                :value="old('email')"
                                class="w-full pl-10 pr-3 py-2.5 text-base border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                required
                                autocomplete="email"
                                placeholder="votre@email.com" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-2 4h4m6-12a2 2 0 01-2 2H8a2 2 0 01-2-2m2 0V9a2 2 0 012-2h4a2 2 0 012 2v2m-6 0h6m-6 0h-2M9 11h.01M15 11h.01M5 11h.01M19 11h.01M12 11h.01"></path>
                                </svg>
                            </div>
                            <x-text-input
                                id="password"
                                type="password"
                                name="password"
                                class="w-full pl-10 pr-3 py-2.5 text-base border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                required
                                autocomplete="current-password"
                                placeholder="Entrez votre mot de passe" />
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                            <span class="text-gray-700">Se souvenir de moi</span>
                        </label>
                        <a href="{{ route('password.request') }}" class="text-blue-600 hover:text-blue-700 hover:underline transition-colors duration-200">Mot de passe oublié ?</a>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg text-lg font-semibold hover:bg-blue-700 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <i class="fas fa-sign-in-alt mr-2"></i> Se connecter
                    </button>

                    <p class="text-center text-sm text-gray-600 mt-4">
                        Pas encore membre ?
                        <a href="{{ route('participant.register') }}" class="text-blue-600 hover:text-blue-700 hover:underline transition-colors duration-200 font-medium">Créer un compte</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-auth-guest>
