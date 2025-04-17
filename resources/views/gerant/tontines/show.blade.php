<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="flex h-full">
            @include('layouts.leftBarGerant')

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto">
                <!-- Hero Header -->
                <div class="relative bg-gradient-to-r from-emerald-600 to-teal-500 shadow-xl">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent"></div>
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 relative z-10">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
                            <div class="text-white">
                                <div class="flex items-center space-x-4">
                                    <div class="p-3 bg-white/20 rounded-lg backdrop-blur-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h1 class="text-3xl font-bold tracking-tight">{{ $tontine->libelle }}</h1>
                                        <p class="mt-1 text-emerald-100 opacity-90">Gestion détaillée de votre tontine collective</p>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('gerant.tontines.index') }}" class="inline-flex items-center px-5 py-2.5 bg-white/10 hover:bg-white/20 border border-white/20 rounded-lg text-white text-sm font-medium transition-all duration-300 hover:shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                                </svg>
                                Retour aux tontines
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 -mt-2">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Left Column -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Tontine Details Card -->
                            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                                    <div class="flex items-center">
                                        <div class="p-3 rounded-xl bg-emerald-100 text-emerald-600 shadow-sm mr-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <h3 class="text-xl font-semibold text-gray-800">
                                            Détails de la tontine
                                        </h3>
                                    </div>
                                </div>
                                <div class="px-6 py-5">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="space-y-4">
                                            <div>
                                                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Date de début</p>
                                                <p class="mt-1 text-lg font-medium text-gray-900 flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    {{ $tontine->dateDebut->format('d/m/Y') }}
                                                </p>
                                            </div>
                                            <div>
                                                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Date de fin</p>
                                                <p class="mt-1 text-lg font-medium text-gray-900 flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    {{ $tontine->dateFin->format('d/m/Y') }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="space-y-4">
                                            <div>
                                                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Montant total</p>
                                                <p class="mt-1 text-2xl font-bold text-emerald-600 flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    {{ number_format($tontine->montant_total, 0, ',', ' ') }} FCFA
                                                </p>
                                            </div>
                                            <div>
                                                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Montant de base</p>
                                                <p class="mt-1 text-lg font-medium text-gray-900">
                                                    {{ number_format($tontine->montant_de_base, 0, ',', ' ') }} FCFA
                                                </p>
                                            </div>
                                            <div>
                                                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Participants</p>
                                                <p class="mt-1 text-lg font-medium text-gray-900">
                                                    {{ $tontine->nbreParticipant }} membres
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Participants Card -->
                            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <div class="p-3 rounded-xl bg-blue-100 text-blue-600 shadow-sm mr-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                                </svg>
                                            </div>
                                            <h3 class="text-xl font-semibold text-gray-800">
                                                Participants ({{ count($participants) }})
                                            </h3>
                                        </div>
                                        <span class="px-3 py-1 bg-emerald-100 text-emerald-800 text-xs font-medium rounded-full shadow-sm">
                                            {{ $tontine->nbreParticipant }} membres
                                        </span>
                                    </div>
                                </div>
                                <div class="divide-y divide-gray-100">
                                    @foreach($participants as $participant)
                                    <div class="px-6 py-4 hover:bg-gray-50 transition duration-200 ease-in-out">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 relative">
                                                <div class="h-12 w-12 rounded-full bg-gradient-to-br from-blue-100 to-teal-100 flex items-center justify-center shadow-inner">
                                                    <span class="text-lg font-medium text-gray-700">{{ substr($participant->nom, 0, 1) }}</span>
                                                </div>
                                                @if($participant->statut === 'gagnant')
                                                <div class="absolute -top-1 -right-1 bg-purple-500 rounded-full p-1 shadow">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="ml-4 flex-1">
                                                <div class="flex items-center justify-between">
                                                    <p class="text-base font-semibold text-gray-900">{{ $participant->nom }}</p>
                                                    <p class="text-sm font-medium text-emerald-600">
                                                        {{ number_format($participant->total_cotise ?? 0, 0, ',', ' ') }} FCFA
                                                    </p>
                                                </div>
                                                <div class="mt-1 flex items-center text-sm text-gray-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                                    </svg>
                                                    {{ $participant->telephone }}
                                                </div>
                                                <div class="mt-1 flex items-center text-sm text-gray-500">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                                                    </svg>
                                                    {{ $participant->cni }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">
                            <!-- Description Card -->
                            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                                    <div class="flex items-center">
                                        <div class="p-3 rounded-xl bg-purple-100 text-purple-600 shadow-sm mr-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                            </svg>
                                        </div>
                                        <h3 class="text-xl font-semibold text-gray-800">
                                            Description
                                        </h3>
                                    </div>
                                </div>
                                <div class="px-6 py-5">
                                    <p class="text-gray-700 leading-relaxed">
                                        {{ $tontine->description ?? 'Aucune description disponible pour cette tontine.' }}
                                    </p>
                                </div>
                            </div>

                            <!-- Status Card -->
                            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                                    <div class="flex items-center">
                                        <div class="p-3 rounded-xl bg-amber-100 text-amber-600 shadow-sm mr-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                            </svg>
                                        </div>
                                        <h3 class="text-xl font-semibold text-gray-800">
                                            Statut de la tontine
                                        </h3>
                                    </div>
                                </div>
                                <div class="px-6 py-5">
                                    @php
                                        $isActive = $tontine->dateFin->isFuture();
                                    @endphp
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="flex items-center">
                                            <div class="relative">
                                                <div class="h-4 w-4 rounded-full {{ $isActive ? 'bg-emerald-400' : 'bg-gray-400' }} shadow-inner"></div>
                                                <div class="{{ $isActive ? 'animate-ping bg-emerald-200' : '' }} absolute inset-0 rounded-full opacity-75"></div>
                                            </div>
                                            <span class="ml-3 text-lg font-medium text-gray-900">
                                                {{ $isActive ? 'Active' : 'Terminée' }}
                                            </span>
                                        </div>
                                        <span class="px-3 py-1 rounded-full text-xs font-medium {{ $isActive ? 'bg-emerald-100 text-emerald-800' : 'bg-gray-100 text-gray-800' }} shadow-sm">
                                            {{ $isActive ? 'En cours' : 'Clôturée' }}
                                        </span>
                                    </div>
                                    
                                    @if($isActive)
                                    <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                                        <div class="flex">
                                            <div class="flex-shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm text-blue-700">
                                                    Cette tontine est active jusqu'au {{ $tontine->dateFin->format('d/m/Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                                        <p class="text-sm text-gray-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            Terminée le {{ $tontine->dateFin->format('d/m/Y') }}
                                        </p>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Actions Card -->
                            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                                    <h3 class="text-xl font-semibold text-gray-800">
                                        Actions rapides
                                    </h3>
                                </div>
                                <div class="p-4 space-y-3">
                                    <button class="w-full flex items-center justify-center px-4 py-3 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all duration-200 transform hover:-translate-y-0.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Ajouter un participant
                                    </button>
                                    
                                    <button class="w-full flex items-center justify-center px-4 py-3 border border-gray-300 rounded-xl shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition duration-150">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Modifier la tontine
                                    </button>
                                    
                                    @if($isActive)
                                    <button class="w-full flex items-center justify-center px-4 py-3 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-gradient-to-r from-rose-600 to-pink-600 hover:from-rose-700 hover:to-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 transition duration-150">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        Clôturer la tontine
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-app-layout>