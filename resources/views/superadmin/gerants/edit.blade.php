<x-app-layout>
    <!-- Main Container -->
    <div class="min-h-screen bg-gray-50">
        <!-- Contenu Principal -->
        <div class="flex flex-1 h-screen">
            <!-- Sidebar Fixe -->
            @include('layouts.leftBar')

            <main class="flex-1 overflow-y-auto bg-gray-50">
                <!-- Hero Header -->
                <div class="relative bg-gradient-to-r from-indigo-600 to-blue-600 px-6 py-12 shadow-xl overflow-hidden">
                    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjA1KSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNwYXR0ZXJuKSIvPjwvc3ZnPg==')]"></div>

                    <div class="relative max-w-7xl mx-auto">
                        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                            <div class="space-y-4">
                                <h1 class="text-3xl font-bold text-white tracking-tight">
                                    Édition de <span class="text-blue-200">{{ $gerant->prenom }} {{ $gerant->nom }}</span>
                                </h1>

                                <nav class="flex items-center space-x-2 text-sm">
                                    <a href="{{ route('superadmin.gerants.index') }}" class="text-blue-100 hover:text-white transition-colors">
                                        <i class="fas fa-chevron-left mr-1 text-xs"></i> Gestion des gérants
                                    </a>
                                    <span class="text-blue-300">/</span>
                                    <span class="text-white font-medium">Modification</span>
                                </nav>

                                <div class="flex flex-wrap gap-4 text-blue-100 text-sm">
                                    <div class="flex items-center bg-white/10 px-3 py-1 rounded-full">
                                        <i class="fas fa-id-card mr-2"></i>
                                        <span>ID : {{ $gerant->id }}</span>
                                    </div>
                                    <div class="flex items-center bg-white/10 px-3 py-1 rounded-full">
                                        <i class="fas fa-calendar-day mr-2"></i>
                                        <span>
                                            Créé le :
                                            @if($gerant->created_at)
                                                {{ $gerant->created_at->format('d/m/Y') }}
                                            @else
                                                Date inconnue
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="p-4 bg-white/10 rounded-xl backdrop-blur-sm border border-white/20 transition-transform hover:scale-105">
                                <i class="fas fa-user-edit text-2xl text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Container -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 -mt-6">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                        <!-- Form Header -->
                        <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex items-center">
                            <div class="bg-blue-100 text-blue-600 p-2 rounded-lg mr-3">
                                <i class="fas fa-user-cog"></i>
                            </div>
                            <h2 class="text-lg font-semibold text-gray-800">
                                Informations du gérant
                            </h2>
                        </div>

                        <!-- Form Content -->
                        <form action="{{ route('superadmin.gerants.update', $gerant) }}" method="POST" x-data="{ showPassword: false }" class="p-6 md:p-8">
                            @csrf
                            @method('PUT')

                            @if($errors->any())
                            <div class="mb-6 p-4 bg-red-50 text-red-700 rounded-lg border-l-4 border-red-500">
                                <div class="flex items-center">
                                    <i class="fas fa-exclamation-circle mr-2"></i>
                                    <h3 class="font-medium">Veuillez corriger les erreurs suivantes :</h3>
                                </div>
                                <ul class="mt-2 list-disc list-inside text-sm">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- First Name -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Prénom <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-user text-gray-400"></i>
                                        </div>
                                        <input type="text" name="prenom" value="{{ old('prenom', $gerant->prenom) }}" required
                                            class="block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Prénom du gérant">
                                    </div>
                                </div>

                                <!-- Last Name -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Nom <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-user text-gray-400"></i>
                                        </div>
                                        <input type="text" name="nom" value="{{ old('nom', $gerant->nom) }}" required
                                            class="block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Nom du gérant">
                                    </div>
                                </div>

                                <!-- Phone -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Téléphone <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-mobile-alt text-gray-400"></i>
                                        </div>
                                        <input type="tel" name="telephone" value="{{ old('telephone', $gerant->telephone) }}" required
                                            class="block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Numéro de téléphone">
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Email <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-envelope text-gray-400"></i>
                                        </div>
                                        <input type="email" name="email" value="{{ old('email', $gerant->email) }}" required
                                            class="block w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Adresse email">
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-700">Mot de passe</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-lock text-gray-400"></i>
                                        </div>
                                        <input :type="showPassword ? 'text' : 'password'" name="password"
                                            class="block w-full pl-10 pr-12 py-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                            placeholder="Laissez vide pour ne pas modifier">
                                        <button type="button" @click="showPassword = !showPassword"
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-blue-600">
                                            <i :class="showPassword ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                                        </button>
                                    </div>
                                    <p class="mt-1 text-xs text-gray-500">
                                        Minimum 8 caractères avec majuscules, minuscules et chiffres
                                    </p>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end space-x-4">
                                <a href="{{ route('superadmin.gerants.index') }}"
                                    class="px-5 py-3 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors flex items-center">
                                    <i class="fas fa-arrow-left mr-2"></i> Annuler
                                </a>
                                <button type="submit"
                                    class="px-5 py-3 border border-transparent rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors shadow-sm flex items-center">
                                    <i class="fas fa-save mr-2"></i> Enregistrer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>


        </div>
    </div>
    <script>
        function togglePassword() {
            const passwordField = document.getElementById('passwordField');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
</x-app-layout>
