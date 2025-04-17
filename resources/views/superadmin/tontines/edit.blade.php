<x-app-layout>
    <!-- Main Container -->
    <div class="min-h-screen bg-gray-50">
        <!-- Contenu Principal -->
        <div class="flex flex-1 h-screen">
            <!-- Sidebar -->
            @include('layouts.leftBar')

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto bg-gray-50">
                <!-- Hero Header -->
                <div class="relative bg-gradient-to-r from-indigo-600 to-blue-600 px-6 py-12 shadow-lg overflow-hidden">
                    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjA1KSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNwYXR0ZXJuKSIvPjwvc3ZnPg==')]"></div>

                    <div class="relative max-w-7xl mx-auto">
                        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                            <div class="space-y-3">
                                <h1 class="text-3xl font-bold text-white tracking-tight">
                                    Édition de <span class="text-blue-200">{{ $tontine->libelle }}</span>
                                </h1>
                                <nav class="flex items-center space-x-2 text-sm">
                                    <a href="{{ route('superadmin.tontines.index') }}" class="text-blue-100 hover:text-white transition-colors flex items-center">
                                        <i class="fas fa-chevron-left mr-1 text-xs"></i> Retour aux tontines
                                    </a>
                                    <span class="text-blue-300">/</span>
                                    <span class="text-white font-medium">Édition</span>
                                </nav>
                            </div>
                            <div class="p-3 bg-white/10 rounded-xl backdrop-blur-sm border border-white/20 transition-transform hover:scale-105">
                                <i class="fas fa-pen-fancy text-2xl text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Container -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 -mt-6">
                    <div class="bg-white rounded-xl shadow-xl overflow-hidden">
                        <!-- Form Header -->
                        <div class="bg-white px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                            <h2 class="text-lg font-semibold text-gray-800 flex items-center">
                                <span class="bg-blue-100 text-blue-600 p-2 rounded-lg mr-3">
                                    <i class="fas fa-edit"></i>
                                </span>
                                Modifier les détails de la tontine
                            </h2>
                            <div class="text-sm text-gray-500">
                                <i class="fas fa-calendar-day mr-1"></i>
                                Créée le {{ $tontine->created_at->format('d/m/Y') }}
                            </div>
                        </div>

                        <!-- Form Content -->
                        <form action="{{ route('superadmin.tontines.update', $tontine) }}" method="POST" enctype="multipart/form-data" class="p-6 md:p-8">
                            @csrf
                            @method('PUT')

                            <div class="space-y-8">
                                <!-- Main Grid -->
                                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                    <!-- Left Column -->
                                    <div class="space-y-6">
                                        <!-- General Information Card -->
                                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                                            <div class="flex items-center mb-4">
                                                <div class="bg-blue-100 text-blue-600 p-2 rounded-lg mr-3">
                                                    <i class="fas fa-info-circle"></i>
                                                </div>
                                                <h3 class="text-lg font-semibold text-gray-800">Informations Générales</h3>
                                            </div>

                                            <!-- Tontine Name -->
                                            <div class="mb-5">
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Nom de la tontine <span class="text-red-500">*</span></label>
                                                <div class="relative">
                                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <i class="fas fa-tag text-gray-400"></i>
                                                    </div>
                                                    <input type="text" name="libelle" value="{{ old('libelle', $tontine->libelle) }}" required
                                                        class="block w-full pl-10 pr-3 py-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                        placeholder="Ex: Club des Entrepreneurs">
                                                </div>
                                            </div>

                                            <!-- Manager Selection -->
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">Gérant responsable <span class="text-red-500">*</span></label>
                                                <div class="relative">
                                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                        <i class="fas fa-user-tie text-gray-400"></i>
                                                    </div>
                                                    <select name="gerant_id" required
                                                        class="block w-full pl-10 pr-3 py-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none bg-white">
                                                        @foreach($gerants as $gerant)
                                                        <option value="{{ $gerant->id }}" {{ $gerant->id == old('gerant_id', $tontine->gerant_id) ? 'selected' : '' }}>
                                                            {{ $gerant->prenom }} {{ $gerant->nom }} ({{ $gerant->telephone }})
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Schedule Card -->
                                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                                            <div class="flex items-center mb-4">
                                                <div class="bg-blue-100 text-blue-600 p-2 rounded-lg mr-3">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </div>
                                                <h3 class="text-lg font-semibold text-gray-800">Planning</h3>
                                            </div>

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <!-- Start Date -->
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Date de début <span class="text-red-500">*</span></label>
                                                    <div class="relative">
                                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                            <i class="fas fa-play text-gray-400"></i>
                                                        </div>
                                                        <input type="date" name="dateDebut" value="{{ old('dateDebut', $tontine->dateDebut->format('Y-m-d')) }}" required
                                                            class="block w-full pl-10 pr-3 py-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                                    </div>
                                                </div>

                                                <!-- End Date -->
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Date de fin <span class="text-red-500">*</span></label>
                                                    <div class="relative">
                                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                            <i class="fas fa-flag-checkered text-gray-400"></i>
                                                        </div>
                                                        <input type="date" name="dateFin" value="{{ old('dateFin', $tontine->dateFin->format('Y-m-d')) }}" required
                                                            class="block w-full pl-10 pr-3 py-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Right Column -->
                                    <div class="space-y-6">
                                        <!-- Financial Settings Card -->
                                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                                            <div class="flex items-center mb-4">
                                                <div class="bg-blue-100 text-blue-600 p-2 rounded-lg mr-3">
                                                    <i class="fas fa-coins"></i>
                                                </div>
                                                <h3 class="text-lg font-semibold text-gray-800">Paramètres Financiers</h3>
                                            </div>

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <!-- Total Amount -->
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Montant total <span class="text-red-500">*</span></label>
                                                    <div class="relative">
                                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                            <span class="text-gray-500">FCFA</span>
                                                        </div>
                                                        <input type="number" name="montant_total" value="{{ old('montant_total', $tontine->montant_total) }}" required
                                                            min="1000" step="500"
                                                            class="block w-full pl-16 pr-3 py-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                            placeholder="500000">
                                                    </div>
                                                </div>

                                                <!-- Base Amount -->
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Montant par participation <span class="text-red-500">*</span></label>
                                                    <div class="relative">
                                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                            <span class="text-gray-500">FCFA</span>
                                                        </div>
                                                        <input type="number" name="montant_de_base" value="{{ old('montant_de_base', $tontine->montant_de_base) }}" required
                                                            min="500" step="100"
                                                            class="block w-full pl-16 pr-3 py-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                            placeholder="10000">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Technical Settings Card -->
                                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                                            <div class="flex items-center mb-4">
                                                <div class="bg-blue-100 text-blue-600 p-2 rounded-lg mr-3">
                                                    <i class="fas fa-cog"></i>
                                                </div>
                                                <h3 class="text-lg font-semibold text-gray-800">Paramètres Techniques</h3>
                                            </div>

                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <!-- Frequency -->
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Fréquence <span class="text-red-500">*</span></label>
                                                    <div class="relative">
                                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                            <i class="fas fa-sync-alt text-gray-400"></i>
                                                        </div>
                                                        <select name="frequence" required
                                                            class="block w-full pl-10 pr-3 py-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none bg-white">
                                                            <option value="JOURNALIERE" {{ old('frequence', $tontine->frequence) == 'JOURNALIERE' ? 'selected' : '' }}>Quotidienne</option>
                                                            <option value="HEBDOMADAIRE" {{ old('frequence', $tontine->frequence) == 'HEBDOMADAIRE' ? 'selected' : '' }}>Hebdomadaire</option>
                                                            <option value="MENSUEL" {{ old('frequence', $tontine->frequence) == 'MENSUEL' ? 'selected' : '' }}>Mensuelle</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Participants -->
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-700 mb-1">Participants <span class="text-red-500">*</span></label>
                                                    <div class="relative">
                                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                            <i class="fas fa-users text-gray-400"></i>
                                                        </div>
                                                        <input type="number" name="nbreParticipant" value="{{ old('nbreParticipant', $tontine->nbreParticipant) }}" required
                                                            min="3" max="50"
                                                            class="block w-full pl-10 pr-3 py-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                            placeholder="3-50">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Description Card -->
                                <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                                    <div class="flex items-center mb-4">
                                        <div class="bg-blue-100 text-blue-600 p-2 rounded-lg mr-3">
                                            <i class="fas fa-align-left"></i>
                                        </div>
                                        <h3 class="text-lg font-semibold text-gray-800">Description</h3>
                                    </div>
                                    <textarea name="description" rows="4"
                                        class="block w-full px-4 py-3 border border-gray-200 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        placeholder="Décrivez les objectifs et règles spécifiques de cette tontine...">{{ old('description', $tontine->description) }}</textarea>
                                </div>

                                <!-- Media Card -->
                                <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                                    <div class="flex items-center mb-4">
                                        <div class="bg-blue-100 text-blue-600 p-2 rounded-lg mr-3">
                                            <i class="fas fa-images"></i>
                                        </div>
                                        <h3 class="text-lg font-semibold text-gray-800">Médias</h3>
                                    </div>

                                    <!-- File Upload -->
                                    <div x-data="{ files: null }" class="mb-6">
                                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center transition-colors hover:border-blue-400 bg-white"
                                            @dragover.prevent="$event.dataTransfer.dropEffect = 'copy';"
                                            @drop.prevent="files = $event.dataTransfer.files">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                            </svg>
                                            <p class="mt-2 text-sm text-gray-600">
                                                Glissez-déposez vos images ou
                                                <label class="text-blue-600 hover:text-blue-500 cursor-pointer font-medium">
                                                    parcourir vos fichiers
                                                    <input type="file" name="images[]" multiple class="hidden" @change="files = $event.target.files">
                                                </label>
                                            </p>
                                            <p class="mt-1 text-xs text-gray-500">
                                                PNG, JPG, GIF jusqu'à 5MB
                                            </p>
                                        </div>
                                    </div>


                                    <!-- Existing Gallery with Delete Option -->
                                    @if($tontine->images->isNotEmpty())
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-700 mb-3">Images existantes</h4>
                                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4" id="image-gallery">
                                            @foreach($tontine->images as $image)
                                            <div class="relative group overflow-hidden rounded-lg shadow-sm hover:shadow-md transition-all duration-300"
                                                data-image-id="{{ $image->id }}">
                                                <img src="{{ asset('storage/'.$image->nomImage) }}"
                                                    class="h-32 w-full object-cover transition-transform duration-300 group-hover:scale-105">
                                                <button type="button"
                                                        onclick="deleteImage({{ $image->id }}, this)"
                                                        class="absolute top-2 right-2 p-2 bg-white/90 rounded-full hover:bg-red-100 transition-all duration-300 shadow-sm hover:shadow-md image-delete-btn">
                                                    <i class="fas fa-trash-alt text-sm text-red-600"></i>
                                                </button>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <!-- Form Actions -->
                                <div class="flex flex-col sm:flex-row justify-end gap-3 pt-6 border-t border-gray-200">
                                    <button type="button" onclick="window.history.back()"
                                        class="px-5 py-3 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors flex items-center justify-center">
                                        <i class="fas fa-times mr-2"></i> Annuler
                                    </button>
                                    <button type="submit"
                                        class="px-5 py-3 border border-transparent rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors shadow-sm flex items-center justify-center">
                                        <i class="fas fa-save mr-2"></i> Enregistrer les modifications
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- JavaScript for Image Deletion -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        async function deleteImage(imageId, button) {
            const btnIcon = button.querySelector('i');

            const result = await Swal.fire({
                title: 'Souhaitez-vous vraiment supprimer cette image ?',
                text: "Cette action est irréversible.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler',
                reverseButtons: true,
                customClass: {
                    confirmButton: 'bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 shadow',
                    cancelButton: 'bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 shadow'
                },
                backdrop: `rgba(0, 0, 0, 0.5) left top no-repeat`,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            });

            if (result.isConfirmed) {
                btnIcon.classList.replace('fa-trash-alt', 'fa-spinner');
                btnIcon.classList.add('fa-spin');
                button.disabled = true;

                try {
                    const response = await fetch(`/images/${imageId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                        }
                    });

                    if (!response.ok) throw new Error('Erreur lors de la suppression.');

                    // Animation de disparition
                    const imageElement = button.closest('[data-image-id]');
                    imageElement.classList.add('opacity-0', 'scale-95');
                    setTimeout(() => {
                        imageElement.remove();
                        Swal.fire({
                            icon: 'success',
                            title: 'Image supprimée !',
                            text: 'L\'image a été supprimée avec succès.',
                            timer: 1800,
                            showConfirmButton: false,
                            toast: true,
                            position: 'top-end'
                        });
                    }, 300);
                } catch (error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erreur',
                        text: 'Impossible de supprimer l\'image. Veuillez réessayer.',
                    });
                } finally {
                    btnIcon.classList.replace('fa-spinner', 'fa-trash-alt');
                    btnIcon.classList.remove('fa-spin');
                    button.disabled = false;
                }
            }
        }
    </script>


    <style>
        /* Animations */
        [data-image-id] {
            transition: all 0.3s ease;
        }

        .image-delete-btn {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .image-delete-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Style personnalisé pour SweetAlert */
        .swal2-popup {
            border-radius: 0.75rem !important;
            font-family: 'Inter', sans-serif;
        }
    </style>
</x-app-layout>
