<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tontine - Gestion de tontines</title>

    <!-- Polices modernes -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-[Poppins] bg-white dark:bg-gray-900">

    <!-- Navigation premium -->
    <nav class="fixed w-full bg-white/80 dark:bg-gray-900/80 backdrop-blur-md z-50 border-b border-gray-100 dark:border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <div class="flex-shrink-0">
                    <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-indigo-500 bg-clip-text text-transparent">
                        TontineConnect
                    </span>
                </div>
                <div class="hidden md:block">
                    <div class="hidden md:block">
                        <div class="flex items-center space-x-6">
                            <!-- Lien Connexion Super Admin -->
                            <a href="{{ route('login') }}" class="group relative transition-all duration-300">
                                <div class="flex items-center space-x-2 px-4 py-2 rounded-lg bg-white/20 backdrop-blur-lg border border-white/30 hover:bg-white/30 shadow-[0_8px_32px_0_rgba(31,38,135,0.15)]">
                                    <i class="fas fa-shield-check text-blue-600 group-hover:text-purple-600 transition-colors"></i>
                                    <span class="text-sm font-semibold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                                        Espace Admin
                                    </span>
                                </div>
                                <div class="absolute -bottom-1 left-0 w-full h-1 bg-gradient-to-r from-blue-400 to-purple-400 opacity-0 group-hover:opacity-100 transition-opacity rounded-full"></div>
                            </a>

                           <!-- Bouton Commencer -->
                           <!-- Bouton version compacte -->
                            <a href="{{ route('participant.login') }}" class="group relative isolate overflow-hidden transition-all duration-200 hover:-translate-y-0.5">
                                <!-- Fond animé léger -->
                                <div class="absolute inset-0 bg-gradient-to-r from-blue-400/20 to-purple-400/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                <!-- Contenu principal -->
                                <div class="relative flex items-center gap-1.5 px-5 py-2.5 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg shadow-md hover:shadow-lg transition-all">
                                    <!-- Icone -->
                                    <i class="fas fa-sparkles text-sm text-amber-300 animate-pulse"></i>

                                    <!-- Texte -->
                                    <span class="font-medium text-xs text-white/95 tracking-tight">
                                        CONNECTEZ-VOUS !
                                    </span>

                                    <!-- Trait décoratif discret -->
                                    <div class="ml-1.5 h-[1px] w-4 bg-white/30 transition-all duration-300 group-hover:w-6"></div>
                                </div>

                                <!-- Bordure subtile -->
                                <div class="absolute inset-0 rounded-lg border border-white/5 group-hover:border-white/10 transition-colors"></div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero section premium -->
    <div class="relative pt-32 pb-24 md:pt-40 md:pb-32 overflow-hidden bg-indigo-50 dark:bg-gray-900">
        <!-- Image de fond thématique -->
        <div class="absolute inset-0 overflow-hidden">
            <!-- Illustration vectorielle de fond -->
            <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1604594849809-dfedbc827105?q=80&w=3000&auto=format&fit=crop')] bg-cover bg-center opacity-20 dark:opacity-10"></div>

            <!-- Overlay coloré -->
            <div class="absolute inset-0 bg-gradient-to-r from-blue-500/10 to-indigo-600/10 dark:from-gray-900/80 dark:to-gray-900/90"></div>

            <!-- Éléments décoratifs animés -->
            <div class="absolute top-0 left-0 w-full h-full opacity-15 dark:opacity-10">
                <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob"></div>
                <div class="absolute top-1/3 right-1/4 w-64 h-64 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-2000"></div>
                <div class="absolute bottom-1/4 right-1/3 w-64 h-64 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-40 animate-blob animation-delay-4000"></div>
            </div>

            <!-- Icônes flottantes thématiques -->
            <i class="fas fa-coins text-yellow-400/30 text-6xl absolute top-1/4 right-20 animate-float"></i>
            <i class="fas fa-hand-holding-usd text-green-400/30 text-5xl absolute bottom-1/3 left-32 animate-float animation-delay-2000"></i>
            <i class="fas fa-piggy-bank text-pink-400/30 text-7xl absolute top-40 left-1/4 animate-float animation-delay-3000"></i>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <!-- Badge d'annonce -->
                <div class="mb-8 inline-flex animate-fade-in-up">
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-white text-blue-600 dark:bg-blue-900/80 dark:text-blue-100 shadow-sm border border-blue-100 dark:border-blue-800">
                        <i class="fas fa-medal text-yellow-500 mr-2 animate-pulse"></i>
                        Plateforme certifiée • 100% sécurisée
                    </span>
                </div>

                <!-- Titre principal -->
                <h1 class="text-4xl md:text-6xl font-bold text-gray-900 dark:text-white mb-6 leading-tight">
                    Votre épargne collective <br>
                    <span class="bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                        intelligente et sécurisée
                    </span>
                </h1>

                <!-- Sous-titre -->
                <p class="text-xl text-gray-700 dark:text-gray-300 mb-10 max-w-3xl mx-auto">
                    Transformez vos habitudes d'épargne avec notre solution digitale de tontines transparentes.
                    <span class="block mt-2 text-blue-600 dark:text-blue-400 font-medium">Gagnez en liberté, sans perdre en sécurité.</span>
                </p>

                <!-- Boutons d'action -->
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('participant.register') }}" class="relative group">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl blur opacity-75 group-hover:opacity-100 transition duration-200"></div>
                        <div class="relative px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl hover:shadow-xl transition-all text-lg font-semibold shadow-lg flex items-center justify-center">
                            <i class="fas fa-user-plus mr-3"></i>Commencer gratuitement
                        </div>
                    </a>
                    <a href="#how-it-works" class="px-8 py-4 bg-white/90 dark:bg-gray-800/90 border border-gray-200 dark:border-gray-700 text-gray-800 dark:text-gray-200 rounded-xl hover:bg-white dark:hover:bg-gray-700 transition-all text-lg font-medium flex items-center justify-center shadow-sm hover:shadow-md">
                        <i class="fas fa-play-circle mr-3 text-blue-500"></i>Voir comment ça marche
                    </a>
                </div>

                <!-- Statistiques de confiance -->
                <div class="mt-16 flex flex-wrap justify-center gap-6 text-center">
                    <div class="px-6 py-3 bg-white/80 dark:bg-gray-800/80 rounded-lg shadow-xs backdrop-blur-sm">
                        <div class="text-2xl font-bold text-blue-600 dark:text-blue-400">+5 000</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Membres actifs</div>
                    </div>
                    <div class="px-6 py-3 bg-white/80 dark:bg-gray-800/80 rounded-lg shadow-xs backdrop-blur-sm">
                        <div class="text-2xl font-bold text-purple-600 dark:text-purple-400">+2M FCFA</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Échangés mensuellement</div>
                    </div>
                    <div class="px-6 py-3 bg-white/80 dark:bg-gray-800/80 rounded-lg shadow-xs backdrop-blur-sm">
                        <div class="text-2xl font-bold text-green-600 dark:text-green-400">98%</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Satisfaction</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sectio marques partenaires (optionnel) -->
    <div class="py-12 bg-gray-50 dark:bg-gray-800/50 border-y border-gray-100 dark:border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <p class="text-center text-sm text-gray-500 dark:text-gray-400 mb-8">Partenaires de confiance</p>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-8 items-center justify-center">
                <div class="flex justify-center opacity-60 hover:opacity-100 transition-opacity">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQm9rYPURKIok7K0ZF22oqFgMbzIHgNCauVQA&s" alt="Wave" class="h-20 dark:invert">
                </div>
                <div class="flex justify-center opacity-60 hover:opacity-100 transition-opacity">
                    <img src="https://orange.sn/sites/default/files/2023-08/OM-CarteQR-OM-880x400px.jpg" alt="Orange Money" class="h-20 dark:invert">
                </div>
                <div class="flex justify-center opacity-60 hover:opacity-100 transition-opacity">
                    <img src="https://black.bird.eu/strapi/uploads/mtn_1_741f2b27ec.png" alt="MTN Mobile Money" class="h-20 dark:invert">
                </div>
                <div class="flex justify-center opacity-60 hover:opacity-100 transition-opacity">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSGOtPSVspg4GbLv7Jt1INslUCIkwMisZ9Ohw&s" alt="Bank" class="h-20 dark:invert">
                </div>
                <div class="flex justify-center opacity-60 hover:opacity-100 transition-opacity">
                    <img src="https://cdn.prod.website-files.com/65943d23dc44e6ce92eb6b67/65fc568691151fc5cece853c_broker_listing_distribution.png" alt="Certification" class="h-20 dark:invert">
                </div>
            </div>
        </div>
    </div>

    <!-- Section Tontines avec design carte premium -->
    <section id="tontines" class="py-24 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-block px-3 py-1 text-sm font-medium bg-blue-100 text-blue-800 rounded-full dark:bg-blue-900/30 dark:text-blue-300 mb-4">
                    Tontines actives
                </span>
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Nos meilleures tontines du moment</h2>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Sélectionnez la tontine qui correspond à vos besoins financiers et rejoignez une communauté de confiance
                </p>
            </div>

            <!-- Section Image - Affichage des images des tontines -->
                @if($tontines->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($tontines as $tontine)
                    <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 transform hover:-translate-y-2">
                        <!-- Badge top-right -->
                        @if($tontine->nbreParticipant >= ($tontine->nbreParticipant * 0.8))
                        <div class="absolute top-4 right-4 z-10">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-300">
                                <i class="fas fa-bolt mr-1"></i> Populaire
                            </span>
                        </div>
                        @endif

                        <!-- Image avec overlay -->
                        <div class="relative h-56 overflow-hidden">
                            @if($tontine->images->count() > 0)
                            <img
                                src="{{ asset('storage/' . $tontine->images->first()->nomImage) }}"
                                alt="Image de la tontine {{ $tontine->libelle }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                            >

                            @else
                            <div class="w-full h-full bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-gray-700 dark:to-gray-600 flex items-center justify-center">
                                <i class="fas fa-users text-5xl text-blue-400 dark:text-blue-500 opacity-30"></i>
                            </div>
                            @endif

                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                        </div>

                        <!-- Contenu -->
                        <div class="p-6 relative">
                            <!-- Fréquence -->
                            <div class="mb-3">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300">
                                    {{ $tontine->frequence }}
                                </span>
                            </div>

                            <!-- Titre et description -->
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $tontine->libelle }}</h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-5 line-clamp-2">
                                {{ $tontine->description }}
                            </p>

                            <!-- Stats -->
                            <div class="grid grid-cols-2 gap-4 text-sm mb-6">
                                <div class="flex items-center">
                                    <div class="p-2 rounded-lg bg-blue-50 dark:bg-gray-700 mr-3">
                                        <i class="fas fa-coins text-blue-500 dark:text-blue-400"></i>
                                    </div>
                                    <div>
                                        <p class="text-gray-500 dark:text-gray-400 text-xs">Cotisation</p>
                                        <p class="font-semibold text-blue-600 dark:text-blue-400">
                                            {{ number_format($tontine->montant_de_base, 0, ',', ' ') }} FCFA
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <div class="p-2 rounded-lg bg-purple-50 dark:bg-gray-700 mr-3">
                                        <i class="fas fa-users text-purple-500 dark:text-purple-400"></i>
                                    </div>
                                    <div>
                                        <p class="text-gray-500 dark:text-gray-400 text-xs">Participants</p>
                                        <p class="font-semibold text-purple-600 dark:text-purple-400">
                                            {{ $tontine->nbreParticipant }}/{{ $tontine->nbreParticipant }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Bouton et date -->
                            <div class="flex items-center justify-between">
                                <a href="{{ route('participant.register') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 font-medium text-sm">
                                    Rejoindre maintenant
                                    <i class="fas fa-arrow-right ml-2 text-xs"></i>
                                </a>
                                <span class="text-xs text-gray-500 dark:text-gray-400">
                                    <span title="{{ $tontine->dateFin->locale('fr')->isoFormat('LLLL') }}" data-tooltip-target="tooltip-date">
                                        <i class="far fa-clock mr-1"></i>
                                        {{ $tontine->dateFin->locale('fr')->diffForHumans() }}
                                    </span>
                                    <div id="tooltip-date" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip">
                                        Date exacte : {{ $tontine->dateFin->locale('fr')->isoFormat('LLLL') }}
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </span>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="text-center mt-12">
                    <a href="{{ route('participant.register') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-sm text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 transition-all">
                        Voir toutes les tontines ({{ $tontines->count() }})
                        <i class="fas fa-chevron-right ml-2 text-sm"></i>
                    </a>
                </div>
                @else
                <div class="text-center py-12">
                    <div class="mx-auto w-24 h-24 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-info-circle text-3xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Aucune tontine disponible actuellement</h3>
                    <p class="text-gray-600 dark:text-gray-400 max-w-md mx-auto mb-6">
                        De nouvelles tontines seront bientôt disponibles. Inscrivez-vous pour être notifié.
                    </p>
                    <a href="{{ route('participant.register') }}" class="inline-flex items-center px-6 py-2.5 border border-transparent text-sm font-medium rounded-full shadow-sm text-white bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-600 hover:to-indigo-600">
                        S'inscrire maintenant
                    </a>
                </div>
                @endif

         </div>
    </section>

    <!-- Section Valeurs - Design Moderne -->
    <section class="py-24 bg-white dark:bg-gray-900 relative overflow-hidden">
        <!-- Éléments décoratifs -->
        <div class="absolute -right-20 -top-20 w-96 h-96 bg-blue-500/5 rounded-full mix-blend-multiply filter blur-3xl"></div>
        <div class="absolute -left-20 -bottom-20 w-96 h-96 bg-indigo-500/5 rounded-full mix-blend-multiply filter blur-3xl"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <!-- En-tête -->
            <div class="text-center mb-20">
                <span class="inline-block px-4 py-2 text-sm font-semibold tracking-wider text-blue-600 dark:text-blue-400 uppercase bg-blue-50 dark:bg-blue-900/30 rounded-full mb-6">
                    Notre différence
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    La tontine <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-500">réinventée</span>
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    Nous combinons tradition et innovation pour une expérience financière communautaire inégalée
                </p>
            </div>

            <!-- Grille de valeurs -->
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Carte 1 - Sécurité -->
                <div class="relative group overflow-hidden rounded-2xl bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 dark:border-gray-700">
                    <div class="absolute -right-10 -top-10 w-36 h-36 bg-blue-500/5 rounded-full"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 mb-6 rounded-lg bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center text-blue-600 dark:text-blue-400 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Sécurité bancaire</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            Vos fonds sont protégés par des technologies de cryptage avancées et des protocoles équivalents aux standards bancaires.
                        </p>
                        <ul class="space-y-3 text-sm text-gray-600 dark:text-gray-400">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Chiffrement AES-256 bits
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Authentification à deux facteurs
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Surveillance 24/7
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Carte 2 - Transparence -->
                <div class="relative group overflow-hidden rounded-2xl bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 dark:border-gray-700">
                    <div class="absolute -right-10 -top-10 w-36 h-36 bg-purple-500/5 rounded-full"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 mb-6 rounded-lg bg-purple-100 dark:bg-purple-900/30 flex items-center justify-center text-purple-600 dark:text-purple-400 group-hover:bg-purple-600 group-hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Transparence radicale</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            Chaque opération est traçable en temps réel dans un registre immuable. Plus de doutes, seulement des faits.
                        </p>
                        <ul class="space-y-3 text-sm text-gray-600 dark:text-gray-400">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Historique complet des transactions
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Notifications en temps réel
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Rapports automatiques mensuels
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Carte 3 - Mobilité -->
                <div class="relative group overflow-hidden rounded-2xl bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 p-8 shadow-xl hover:shadow-2xl transition-all duration-300 border border-gray-100 dark:border-gray-700">
                    <div class="absolute -right-10 -top-10 w-36 h-36 bg-green-500/5 rounded-full"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 mb-6 rounded-lg bg-green-100 dark:bg-green-900/30 flex items-center justify-center text-green-600 dark:text-green-400 group-hover:bg-green-600 group-hover:text-white transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Liberté mobile</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-6">
                            Gérez vos tontines où que vous soyez, avec une application optimisée pour rester connecté à votre communauté.
                        </p>
                        <ul class="space-y-3 text-sm text-gray-600 dark:text-gray-400">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Application iOS et Android
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Paiements en un clic
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Synchronisation instantanée
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Bandeau de confiance -->
            <div class="mt-20 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl p-8 text-center shadow-lg">
                <div class="max-w-4xl mx-auto">
                    <h3 class="text-2xl font-bold text-white mb-4">Rejoignez la révolution des tontines digitales</h3>
                    <p class="text-blue-100 mb-6 max-w-3xl mx-auto">
                        Plus de 10 000 membres nous font déjà confiance pour gérer leurs tontines en toute sérénité
                    </p>
                    <a href="{{ route('participant.register') }}" class="inline-flex items-center px-8 py-3 bg-white text-blue-600 rounded-lg font-semibold hover:bg-gray-100 transition-all shadow-md">
                        Commencer maintenant
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section témoignages -->
    <section class="py-24 bg-gradient-to-br from-blue-600 to-indigo-700 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-block px-3 py-1 text-sm font-medium bg-white/20 rounded-full mb-4">
                    Témoignages
                </span>
                <h2 class="text-3xl font-bold mb-4">Ce que nos membres disent</h2>
                <p class="text-blue-100 max-w-2xl mx-auto">
                    Découvrez les expériences de ceux qui ont déjà rejoint notre communauté
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Témoignage 1 -->
                <div class="bg-white/10 p-8 rounded-xl backdrop-blur-sm border border-white/10 hover:border-white/20 transition-all">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-blue-500 flex items-center justify-center text-xl font-bold mr-4">AM</div>
                        <div>
                            <h4 class="font-semibold">Aminata M.</h4>
                            <p class="text-sm text-blue-200">Membre depuis 2023</p>
                        </div>
                    </div>
                    <p class="italic text-blue-100 mb-4">
                        "Grâce à TontineConnect, j'ai pu constituer mon capital commerce en toute sécurité. Les paiements sont transparents et faciles à suivre."
                    </p>
                    <div class="flex text-amber-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <!-- Témoignage 2 -->
                <div class="bg-white/10 p-8 rounded-xl backdrop-blur-sm border border-white/10 hover:border-white/20 transition-all">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-indigo-500 flex items-center justify-center text-xl font-bold mr-4">PD</div>
                        <div>
                            <h4 class="font-semibold">Papa D.</h4>
                            <p class="text-sm text-blue-200">Membre depuis 2024</p>
                        </div>
                    </div>
                    <p class="italic text-blue-100 mb-4">
                        "Je n'aurais jamais cru qu'une tontine pouvait être aussi simple. L'application est intuitive et les rappels de paiement très utiles."
                    </p>
                    <div class="flex text-amber-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <!-- Témoignage 3 -->
                <div class="bg-white/10 p-8 rounded-xl backdrop-blur-sm border border-white/10 hover:border-white/20 transition-all">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-purple-500 flex items-center justify-center text-xl font-bold mr-4">FS</div>
                        <div>
                            <h4 class="font-semibold">Fatou S.</h4>
                            <p class="text-sm text-blue-200">Membre depuis 2022</p>
                        </div>
                    </div>
                    <p class="italic text-blue-100 mb-4">
                        "La meilleure plateforme pour les tontines digitales. J'ai participé à 3 tontines sans aucun problème. Je recommande vivement !"
                    </p>
                    <div class="flex text-amber-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer premium -->
    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-10 mb-12">
                <!-- Logo et description -->
                <div class="col-span-2">
                    <span class="text-2xl font-bold bg-gradient-to-r from-blue-400 to-indigo-400 bg-clip-text text-transparent mb-4 inline-block">
                        TontineConnect
                    </span>
                    <p class="text-gray-400 text-sm mb-6">
                        La plateforme de référence pour des tontines digitales sécurisées et transparentes en Afrique.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                <!-- Liens rapides -->
                <div>
                    <h4 class="text-sm font-semibold uppercase tracking-wider mb-4 text-gray-300">Navigation</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Accueil</a></li>
                        <li><a href="#tontines" class="text-gray-400 hover:text-white transition-colors text-sm">Tontines</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Fonctionnalités</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Tarifs</a></li>
                    </ul>
                </div>

                <!-- Ressources -->
                <div>
                    <h4 class="text-sm font-semibold uppercase tracking-wider mb-4 text-gray-300">Ressources</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Centre d'aide</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Tutoriels</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">FAQ</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-sm font-semibold uppercase tracking-wider mb-4 text-gray-300">Contact</h4>
                    <ul class="space-y-3">
                        <li class="text-gray-400 text-sm flex items-start">
                            <i class="fas fa-map-marker-alt mr-2 mt-1 text-blue-400"></i>
                            Dakar, Sénégal
                        </li>
                        <li class="text-gray-400 text-sm flex items-center">
                            <i class="fas fa-envelope mr-2 text-blue-400"></i>
                            sene@tontineconnect.com
                        </li>
                        <li class="text-gray-400 text-sm flex items-center">
                            <i class="fas fa-phone-alt mr-2 text-blue-400"></i>
                            +221 78 267 07 89
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm mb-4 md:mb-0">
                    © 2024 TontineConnect. Tous droits réservés.
                </p>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Confidentialité</a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Conditions</a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Cookies</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Styles supplémentaires -->
    <style>
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</body>
</html>

