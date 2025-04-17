<x-auth-guest>
    <div class="min-h-screen flex items-center justify-center p-4 bg-gray-50">
        <div class="w-full max-w-4xl bg-white rounded-xl shadow-lg overflow-hidden flex flex-col md:flex-row">
            <!-- Section visuelle -->
            <div class="md:w-1/3 bg-gradient-to-b from-blue-50 to-indigo-50 p-6 hidden md:flex flex-col justify-center">
                <div class="text-center space-y-4">
                    <div class="inline-block p-3 bg-blue-600 rounded-xl">
                        <i class="fas fa-users text-2xl text-white"></i>
                    </div>
                        {{-- message --}}
                        {{-- {!! Toastr::message() !!} --}}
                    <h2 class="text-xl font-bold text-gray-800">Devenez Membre</h2>
                    <p class="text-sm text-gray-600">Gestion sécurisée de vos tontines</p>
                </div>
            </div>

            <!-- Formulaire -->
            <div class="md:w-2/3 p-6">
                <div class="text-center mb-6">
                    <h1 class="text-xl font-semibold text-gray-800">Inscription Participant</h1>
                    <p class="text-sm text-gray-500 mt-1">Remplissez les informations requises</p>
                </div>

                <form method="POST" action="{{ route('participant.register.submit') }}" enctype="multipart/form-data" class="space-y-4">
                    @csrf

                    <!-- Section Utilisateur -->
                    <div class="grid md:grid-cols-2 gap-3">
                        <!-- Prénom -->
                        <div class="space-y-1">
                            <label for="prenom" class="text-xs font-medium text-gray-600">Prénom <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-user absolute left-3 top-3 text-gray-400 text-sm"></i>
                                <x-text-input
                                    id="prenom"
                                    type="text"
                                    name="prenom"
                                    :value="old('prenom')"
                                    class="w-full pl-10 pr-3 py-2 text-sm border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-500"
                                    required
                                    autofocus />
                            </div>
                            <x-input-error :messages="$errors->get('prenom')" class="mt-1 text-xs text-red-500" />
                        </div>

                        <!-- Nom -->
                        <div class="space-y-1">
                            <label for="nom" class="text-xs font-medium text-gray-600">Nom <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-id-card absolute left-3 top-3 text-gray-400 text-sm"></i>
                                <x-text-input
                                    id="nom"
                                    type="text"
                                    name="nom"
                                    :value="old('nom')"
                                    class="w-full pl-10 pr-3 py-2 text-sm border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-500"
                                    required />
                            </div>
                            <x-input-error :messages="$errors->get('nom')" class="mt-1 text-xs text-red-500" />
                        </div>

                        <!-- Email -->
                        <div class="space-y-1">
                            <label for="email" class="text-xs font-medium text-gray-600">Email <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-envelope absolute left-3 top-3 text-gray-400 text-sm"></i>
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

                        <!-- Téléphone -->
                        <div class="space-y-1">
                            <label for="telephone" class="text-xs font-medium text-gray-600">Téléphone <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-phone absolute left-3 top-3 text-gray-400 text-sm"></i>
                                <x-text-input
                                    id="telephone"
                                    type="tel"
                                    name="telephone"
                                    :value="old('telephone')"
                                    class="w-full pl-10 pr-3 py-2 text-sm border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-500"
                                    required />
                            </div>
                            <x-input-error :messages="$errors->get('telephone')" class="mt-1 text-xs text-red-500" />
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

                        <!-- Confirmation -->
                        <div class="space-y-1">
                            <label for="password_confirmation" class="text-xs font-medium text-gray-600">Confirmation <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-lock absolute left-3 top-3 text-gray-400 text-sm"></i>
                                <x-text-input
                                    id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    class="w-full pl-10 pr-3 py-2 text-sm border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-500"
                                    required />
                            </div>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs text-red-500" />
                        </div>
                    </div>

                    <!-- Section Participant -->
                    <div class="grid md:grid-cols-3 gap-3">
                        <!-- Date de naissance -->
                        <div class="space-y-1">
                            <label for="dateNaissance" class="text-xs font-medium text-gray-600">Date de naissance <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-calendar-alt absolute left-3 top-3 text-gray-400 text-sm"></i>
                                <x-text-input
                                    id="dateNaissance"
                                    type="date"
                                    name="dateNaissance"
                                    :value="old('dateNaissance')"
                                    class="w-full pl-10 pr-3 py-2 text-sm border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-500"
                                    required />
                            </div>
                            <x-input-error :messages="$errors->get('dateNaissance')" class="mt-1 text-xs text-red-500" />
                        </div>

                        <!-- CNI -->
                        <div class="space-y-1">
                            <label for="cni" class="text-xs font-medium text-gray-600">N° CNI <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-id-badge absolute left-3 top-3 text-gray-400 text-sm"></i>
                                <x-text-input
                                    id="cni"
                                    type="text"
                                    name="cni"
                                    :value="old('cni')"
                                    class="w-full pl-10 pr-3 py-2 text-sm border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-500"
                                    required />
                            </div>
                            <x-input-error :messages="$errors->get('cni')" class="mt-1 text-xs text-red-500" />
                        </div>

                        <!-- Adresse -->
                        <div class="space-y-1">
                            <label for="adresse" class="text-xs font-medium text-gray-600">Adresse <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-map-marker-alt absolute left-3 top-3 text-gray-400 text-sm"></i>
                                <x-text-input
                                    id="adresse"
                                    type="text"
                                    name="adresse"
                                    :value="old('adresse')"
                                    class="w-full pl-10 pr-3 py-2 text-sm border-gray-300 rounded-lg focus:ring-1 focus:ring-blue-500"
                                    required />
                            </div>
                            <x-input-error :messages="$errors->get('adresse')" class="mt-1 text-xs text-red-500" />
                        </div>
                    </div>

                    <!-- Upload CNI -->
                    {{-- <div class="space-y-2">
                        <label class="text-xs font-medium text-gray-600">Scan CNI (Recto) <span class="text-red-500">*</span></label>
                        <div class="border border-dashed border-gray-300 rounded-lg p-3 text-center hover:border-blue-500 transition-colors cursor-pointer">
                            <div class="flex items-center justify-center space-x-2 text-gray-500">
                                <i class="fas fa-file-image text-sm"></i>
                                <span class="text-xs">Formats acceptés : JPG, PNG (max 2MB)</span>
                            </div>
                            <input type="file" name="imageCni" class="hidden" accept="image/*" required>
                        </div>
                        <x-input-error :messages="$errors->get('imageCni')" class="mt-1 text-xs text-red-500" />
                    </div> --}}
                        <!-- Upload d'images -->
                        <div class="space-y-2">
                            <x-input-label for="images" value="Scan CNI (Recto) " class="font-medium text-gray-700"/>
                            <div class="flex items-center justify-center w-full">
                                <label class="flex flex-col w-full cursor-pointer">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6 border-2 border-dashed border-gray-300 rounded-lg hover:border-blue-500 transition-colors group">
                                        <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 group-hover:text-blue-500 mb-3"></i>
                                        <p class="text-sm text-gray-500 group-hover:text-blue-600">
                                            <span class="font-semibold">Glissez-déposez</span> ou cliquez pour uploader
                                        </p>
                                        <input type="file" name="imageCni" class="hidden" accept="image/*" multiple required>

                                        {{-- <input type="file" id="images" name="images[]" multiple
                                                class="hidden"
                                                accept="image/*"> --}}
                                    </div>
                                </label>
                            </div>
                            <x-input-error :messages="$errors->get('imageCni')" class="mt-1 text-xs text-red-500" />
                            </div>
                                            <!-- Bouton -->
                    <button type="submit" class="w-full bg-blue-600 text-white py-2.5 px-4 rounded-lg text-sm font-medium hover:bg-blue-700 transition-colors mt-4">
                        <i class="fas fa-user-check mr-2"></i> Finaliser l'inscription
                    </button>

                    <p class="text-center text-xs text-gray-500 mt-3">
                        Déjà membre ?
                        <a href="{{ route('participant.login') }}" class="text-blue-600 hover:underline">Connectez-vous ici</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-auth-guest>





  <!-- Avatar -->
  {{-- <div class="flex justify-center">
    <label class="relative group cursor-pointer">
        <div class="h-20 w-20 rounded-full bg-gray-100 border-2 border-dashed border-gray-300 flex items-center justify-center hover:border-blue-500 transition-colors">
            <i class="fas fa-camera text-gray-400 group-hover:text-blue-500"></i>
            <input type="file" name="avatar" class="hidden">
        </div>
    </label>
</div> --}}
