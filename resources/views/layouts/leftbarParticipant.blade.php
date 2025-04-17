<aside class="w-64 bg-white border-r border-gray-100 shadow-xl flex flex-col justify-between">
    <!-- Contenu principal -->
    <div>
        <!-- Logo -->
    <!-- Logo avec effet de profondeur -->
    <div class="p-4 border-b border-gray-200 bg-white/80 backdrop-blur-sm">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-lg flex items-center justify-center shadow-md">
                <i class="fas fa-users text-white text-lg"></i>
            </div>
            <span class="text-xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">Espace Membre</span>
        </div>
    </div>

        <!-- Menu -->
        <div class="p-2 space-y-1">
            <!-- Tableau de Bord -->
            <x-sidebar-link href="{{ route('participant.dashboard') }}" :active="request()->routeIs('participant.dashboard')">
                <div class="relative flex items-center gap-3  rounded-xl group transition-all duration-200 hover:bg-white/0 hover:shadow-sm">
                    <div class="w-9 h-9 bg-white flex items-center justify-center rounded-lg shadow-sm group-hover:shadow-md transition-all">
                        <i class="fas fa-tachometer-alt text-blue-500 text-lg"></i>
                    </div>
                    <span class="text-gray-700 font-medium">Tableau de bord</span>
                    <div class="absolute -left-1 w-1 h-6 bg-blue-500 rounded-r-lg opacity-0 group-hover:opacity-100 transition-all"></div>
                </div>
            </x-sidebar-link>

            <!-- Mes tontines -->
            <x-sidebar-link href="{{ route('participant.tontines.index') }}" :active="request()->routeIs('participant.tontines.index')">
                <div class="relative flex items-center gap-3 rounded-xl group transition-all duration-200 hover:bg-white/0 hover:shadow-sm">
                    <div class="w-9 h-9 bg-white flex items-center justify-center rounded-lg shadow-sm group-hover:shadow-md transition-all">
                        <i class="fas fa-piggy-bank text-indigo-500 text-lg"></i>
                    </div>
                    <span class="text-gray-700 font-medium">Mes Tontines</span>
                    <div class="absolute -left-1 w-1 h-6 bg-indigo-500 rounded-r-lg opacity-0 group-hover:opacity-100 transition-all"></div>
                </div>
            </x-sidebar-link>

            <!-- Rejoindre une tontine -->
            <x-sidebar-link href="{{ route('participant.tontines.available') }}" :active="request()->routeIs('participant.tontines.available')">
                <div class="relative flex items-center gap-3  rounded-xl group transition-all duration-200 hover:bg-white/0 hover:shadow-sm">
                    <div class="w-9 h-9 bg-white flex items-center justify-center rounded-lg shadow-sm group-hover:shadow-md transition-all">
                        <i class="fas fa-hand-holding-usd text-green-500 text-lg"></i>
                    </div>
                    <span class="text-gray-700 font-medium">Nouvelle Tontine</span>
                    <div class="absolute -left-1 w-1 h-6 bg-green-500 rounded-r-lg opacity-0 group-hover:opacity-100 transition-all"></div>
                </div>
            </x-sidebar-link>

            <!-- Mes cotisations -->
            <x-sidebar-link href="{{ route('participant.cotisations.index') }}" :active="request()->routeIs('participant.cotisations.*')">
                <div class="relative flex items-center gap-3  rounded-xl group transition-all duration-200 hover:bg-white/0 hover:shadow-sm">
                    <div class="w-9 h-9 bg-white flex items-center justify-center rounded-lg shadow-sm group-hover:shadow-md transition-all">
                        <i class="fas fa-coins text-amber-500 text-lg"></i>
                    </div>
                    <span class="text-gray-700 font-medium">Mes Cotisations</span>
                    <div class="absolute -left-1 w-1 h-6 bg-amber-500 rounded-r-lg opacity-0 group-hover:opacity-100 transition-all"></div>
                </div>
            </x-sidebar-link>

            <!-- Historique -->
            {{-- <x-sidebar-link href="" :active="false">
                <div class="relative flex items-center gap-3  rounded-xl group transition-all duration-200 hover:bg-white/0 hover:shadow-sm">
                    <div class="w-9 h-9 bg-white flex items-center justify-center rounded-lg shadow-sm group-hover:shadow-md transition-all">
                        <i class="fas fa-history text-purple-500 text-lg"></i>
                    </div>
                    <span class="text-gray-700 font-medium">Mon Historique</span>
                    <div class="absolute -left-1 w-1 h-6 bg-purple-500 rounded-r-lg opacity-0 group-hover:opacity-100 transition-all"></div>
                </div>
            </x-sidebar-link> --}}
            <x-sidebar-link href="{{ route('participant.historique.index') }}" :active="request()->routeIs('participant.historique.*')">
                <div class="relative flex items-center gap-3 rounded-xl group transition-all duration-200 hover:bg-white/0 hover:shadow-sm">
                    <div class="w-9 h-9 bg-white flex items-center justify-center rounded-lg shadow-sm group-hover:shadow-md transition-all">
                        <i class="fas fa-history text-purple-500 text-lg"></i>
                    </div>
                    <span class="text-gray-700 font-medium">Mon Historique</span>
                    <div class="absolute -left-1 w-1 h-6 bg-purple-500 rounded-r-lg opacity-0 group-hover:opacity-100 transition-all"></div>
                </div>
            </x-sidebar-link>
        </div>
    </div>
</aside>

