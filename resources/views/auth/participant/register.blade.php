<x-auth-guest>
    <div class="min-h-screen flex items-center justify-center p-4 bg-gray-100 font-sans antialiased">
        <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row transform transition-all duration-300 hover:shadow-2xl">
            <div class="md:w-1/3 bg-gradient-to-br from-indigo-700 to-blue-500 p-8 hidden md:flex flex-col justify-center items-center text-white relative overflow-hidden">
                <div class="absolute inset-0 bg-pattern-dots opacity-10"></div>
                <div class="text-center space-y-6 z-10">
                    <div class="inline-block p-4 bg-white bg-opacity-20 backdrop-filter backdrop-blur-sm rounded-full shadow-lg">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H2v-2a3 3 0 015.356-1.857M9 20v-2a3 3 0 00-3-3H4a3 3 0 00-3 3v2m3-3h.01M20 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-extrabold leading-tight">Rejoignez la Communauté</h2>
                    <p class="text-base text-indigo-100 opacity-90">Créez votre compte en quelques étapes et gérez vos tontines en toute simplicité.</p>
                </div>
            </div>

            <div class="md:w-2/3 p-8 md:p-12">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-800">Inscription Participant</h1>
                    <p class="text-sm text-gray-500 mt-2">Remplissez les informations requises pour créer votre compte.</p>
                </div>

                <form method="POST" action="{{ route('participant.register.submit') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div class="grid md:grid-cols-2 gap-x-6 gap-y-4">
                        <div>
                            <label for="prenom" class="block text-sm font-medium text-gray-700 mb-1">Prénom <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 13a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <x-text-input
                                    id="prenom"
                                    type="text"
                                    name="prenom"
                                    :value="old('prenom')"
                                    class="w-full pl-10 pr-3 py-2.5 text-base border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    required
                                    autofocus
                                    placeholder="Votre prénom" />
                            </div>
                            <x-input-error :messages="$errors->get('prenom')" class="mt-2 text-sm text-red-600" />
                        </div>

                        <div>
                            <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0h4"></path>
                                    </svg>
                                </div>
                                <x-text-input
                                    id="nom"
                                    type="text"
                                    name="nom"
                                    :value="old('nom')"
                                    class="w-full pl-10 pr-3 py-2.5 text-base border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    required
                                    placeholder="Votre nom de famille" />
                            </div>
                            <x-input-error :messages="$errors->get('nom')" class="mt-2 text-sm text-red-600" />
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
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
                            <label for="telephone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21L9.5 13.502A11.001 11.001 0 0015.588 20l3.243-3.243a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                </div>
                                <x-text-input
                                    id="telephone"
                                    type="tel"
                                    name="telephone"
                                    :value="old('telephone')"
                                    class="w-full pl-10 pr-3 py-2.5 text-base border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    required
                                    placeholder="Ex: 77 123 45 67" />
                            </div>
                            <x-input-error :messages="$errors->get('telephone')" class="mt-2 text-sm text-red-600" />
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe <span class="text-red-500">*</span></label>
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
                                    autocomplete="new-password"
                                    placeholder="Créez votre mot de passe" />
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirmation Mot de passe <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-2 4h4m6-12a2 2 0 01-2 2H8a2 2 0 01-2-2m2 0V9a2 2 0 012-2h4a2 2 0 012 2v2m-6 0h6m-6 0h-2M9 11h.01M15 11h.01M5 11h.01M19 11h.01M12 11h.01"></path>
                                    </svg>
                                </div>
                                <x-text-input
                                    id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    class="w-full pl-10 pr-3 py-2.5 text-base border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    required
                                    autocomplete="new-password"
                                    placeholder="Confirmez votre mot de passe" />
                            </div>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
                        </div>
                    </div>

                    <div class="grid md:grid-cols-3 gap-x-6 gap-y-4">
                        <div>
                            <label for="dateNaissance" class="block text-sm font-medium text-gray-700 mb-1">Date de naissance <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h.01M14 11h.01M14 15h.01M12 21H5a2 2 0 01-2-2V5a2 2 0 012-2h14a2 2 0 012 2v12a2 2 0 01-2 2h-7l-4 4z"></path>
                                    </svg>
                                </div>
                                <x-text-input
                                    id="dateNaissance"
                                    type="date"
                                    name="dateNaissance"
                                    :value="old('dateNaissance')"
                                    class="w-full pl-10 pr-3 py-2.5 text-base border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    required />
                            </div>
                            <x-input-error :messages="$errors->get('dateNaissance')" class="mt-2 text-sm text-red-600" />
                        </div>

                        <div>
                            <label for="cni" class="block text-sm font-medium text-gray-700 mb-1">N° CNI <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0h4"></path>
                                    </svg>
                                </div>
                                <x-text-input
                                    id="cni"
                                    type="text"
                                    name="cni"
                                    :value="old('cni')"
                                    class="w-full pl-10 pr-3 py-2.5 text-base border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    required
                                    placeholder="Ex: 1234567890123" />
                            </div>
                            <x-input-error :messages="$errors->get('cni')" class="mt-2 text-sm text-red-600" />
                        </div>

                        <div>
                            <label for="adresse" class="block text-sm font-medium text-gray-700 mb-1">Adresse <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <x-text-input
                                    id="adresse"
                                    type="text"
                                    name="adresse"
                                    :value="old('adresse')"
                                    class="w-full pl-10 pr-3 py-2.5 text-base border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-colors"
                                    required
                                    placeholder="Ex: 123 Rue de l'Exemple, Ville" />
                            </div>
                            <x-input-error :messages="$errors->get('adresse')" class="mt-2 text-sm text-red-600" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="imageCni" value="Scan CNI (Recto) " class="font-medium text-gray-700 mb-1"/>
                        <div class="flex items-center justify-center w-full">
                            <label for="imageCni" class="flex flex-col w-full cursor-pointer">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6 border-2 border-dashed border-gray-300 rounded-lg hover:border-blue-500 transition-colors group">
                                    <svg class="w-10 h-10 text-gray-400 group-hover:text-blue-500 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 0115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="text-sm text-gray-500 group-hover:text-blue-600">
                                        <span class="font-semibold">Glissez-déposez</span> ou cliquez pour uploader
                                    </p>
                                    <p class="text-xs text-gray-500 mt-1">Formats acceptés : JPG, PNG, PDF (max 5MB)</p>
                                    <input type="file" id="imageCni" name="imageCni" class="hidden" accept="image/*,.pdf" required>
                                </div>
                            </label>
                        </div>
                        <x-input-error :messages="$errors->get('imageCni')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg text-lg font-semibold hover:bg-blue-700 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 mt-4">
                        <i class="fas fa-user-plus mr-2"></i> Finaliser l'inscription
                    </button>

                    <p class="text-center text-sm text-gray-600 mt-4">
                        Déjà membre ?
                        <a href="{{ route('participant.login') }}" class="text-blue-600 hover:text-blue-700 hover:underline transition-colors duration-200 font-medium">Connectez-vous ici</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-auth-guest>
