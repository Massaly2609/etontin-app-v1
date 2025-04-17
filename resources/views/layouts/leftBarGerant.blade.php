<!-- Sidebar Modernisée -->
<aside class="w-64 bg-white border-r border-gray-100 shadow-xl flex flex-col justify-between">
    <!-- Contenu principal -->
    <div>
        <!-- Logo -->
        <div class="p-4 border-b border-gray-100">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-coins text-white text-sm"></i>
                </div>
                <span class="text-lg font-semibold text-gray-800">ETontine</span>
            </div>
        </div>

        <!-- Menu -->
        <div class="p-2 space-y-1">
            <!-- Tableau de Bord -->
            <x-sidebar-link href="{{ route('gerant.dashboard') }}" :active="request()->routeIs('gerant.dashboard')">
                <div class="relative flex items-center gap-3 p-0 rounded-xl group">
                    <div class="w-8 h-8 bg-blue-100/50 flex items-center justify-center rounded-lg transition-all group-hover:bg-blue-600">
                        <i class="fas fa-tachometer-alt text-lg text-blue-600 transition-all group-hover:text-white"></i>
                    </div>
                    <span class="text-gray-600 text-sm font-medium group-hover:text-blue-600">Tableau de bord</span>
                    <div class="absolute -left-4 w-1 h-6 bg-blue-600 rounded-full opacity-0 transition-all group-[:hover]:opacity-100"></div>
                </div>
            </x-sidebar-link>

            <!-- Mes Tontines -->
            <x-sidebar-link href="{{ route('gerant.tontines.index') }}" :active="request()->routeIs('gerant.tontines.*')">
                <div class="relative flex items-center gap-3 p-0 rounded-xl group">
                    <div class="w-8 h-8 bg-purple-100/50 flex items-center justify-center rounded-lg transition-all group-hover:bg-purple-600">
                        <i class="fas fa-hand-holding-usd text-lg text-purple-600 transition-all group-hover:text-white"></i>
                    </div>
                    <span class="text-gray-600 text-sm font-medium group-hover:text-purple-600">Mes Tontines</span>
                    <div class="absolute -left-4 w-1 h-6 bg-purple-600 rounded-full opacity-0 transition-all group-[:hover]:opacity-100"></div>
                </div>
            </x-sidebar-link>

            <!-- Participants -->
            <x-sidebar-link href="{{ route('gerant.participants.index') }}" :active="request()->routeIs('gerant.participants.*')">
                <div class="relative flex items-center gap-3 p-0 rounded-xl group">
                    <div class="w-8 h-8 bg-green-100/50 flex items-center justify-center rounded-lg transition-all group-hover:bg-green-600">
                        <i class="fas fa-users text-lg text-green-600 transition-all group-hover:text-white"></i>
                    </div>
                    <span class="text-gray-600 text-sm font-medium group-hover:text-green-600">Participants</span>
                    <div class="absolute -left-4 w-1 h-6 bg-green-600 rounded-full opacity-0 transition-all group-[:hover]:opacity-100"></div>
                </div>
            </x-sidebar-link>

            <!-- Cotisations -->
            <x-sidebar-link href="{{ route('gerant.cotisations.index') }}" :active="request()->routeIs('gerant.cotisations.*')">
                <div class="relative flex items-center gap-3 p-0 rounded-xl group">
                    <div class="w-8 h-8 bg-orange-100/50 flex items-center justify-center rounded-lg transition-all group-hover:bg-orange-600">
                        <i class="fas fa-coins text-lg text-orange-600 transition-all group-hover:text-white"></i>
                    </div>
                    <span class="text-gray-600 text-sm font-medium group-hover:text-orange-600">Cotisations</span>
                    <div class="absolute -left-4 w-1 h-6 bg-orange-600 rounded-full opacity-0 transition-all group-[:hover]:opacity-100"></div>
                </div>
            </x-sidebar-link>

            <!-- Rapports -->
            <x-sidebar-link href="{{ route('gerant.reports.index') }}" :active="request()->routeIs('gerant.reports.*')">
                <div class="relative flex items-center gap-3 p-0 rounded-xl group">
                    <div class="w-8 h-8 bg-pink-100/50 flex items-center justify-center rounded-lg transition-all group-hover:bg-pink-600">
                        <i class="fas fa-chart-bar text-lg text-pink-600 transition-all group-hover:text-white"></i>
                    </div>
                    <span class="text-gray-600 text-sm font-medium group-hover:text-pink-600">Rapports</span>
                    <div class="absolute -left-4 w-1 h-6 bg-pink-600 rounded-full opacity-0 transition-all group-[:hover]:opacity-100"></div>
                </div>
            </x-sidebar-link>
        </div>
    </div>


</aside>
