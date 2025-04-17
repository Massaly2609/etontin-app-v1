<nav x-data="{ open: false }" class="bg-white shadow-lg relative border-l-2 border-b-4 border-cyan-600 pb-2 fixed">
    <!-- Primary Navigation Menu -->
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <div class="flex justify-between h-16">
            <!-- Left section -->
            <div class="flex items-center">
                <a
                    href="{{ route(Auth::user()->isSuperAdmin() ? 'superadmin.dashboard' : (Auth::user()->isGerant() ? 'gerant.dashboard' : 'participant.dashboard')) }}"
                    class="flex items-center space-x-3 hover:opacity-80 transition-opacity"
                >
                    <x-application-logo class="h-9 w-9 text-indigo-600" />
                    <span class="text-xl font-semibold text-gray-800">
                        <span class="text-indigo-600">Ton</span>tine
                    </span>
                </a>
            </div>

            <!-- Right section -->
            <div class="flex items-center space-x-4">
                <!-- Notifications -->
                <button class="p-2 rounded-full hover:bg-gray-100 transition-colors relative">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>

                <!-- Profile Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center space-x-2 group">
                            <div class="h-10 w-10 bg-indigo-100 rounded-full flex items-center justify-center font-semibold text-indigo-700">
                                {{ strtoupper(substr(Auth::user()->prenom, 0, 1)) }}
                            </div>
                            <span class="hidden lg:block font-medium text-gray-700 group-hover:text-indigo-600 transition-colors">
                                {{ Auth::user()->prenom }}
                            </span>
                            <svg class="w-4 h-4 text-gray-500 transform transition-transform" :class="{ 'rotate-180': open }" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="py-2 px-4 border-b">
                            <p class="text-sm font-medium text-gray-900">{{ Auth::user()->prenom }}</p>
                            <p class="text-sm text-gray-500 truncate">{{ Auth::user()->email }}</p>
                        </div>

                        <x-dropdown-link :href="route('profile.edit')" class="flex items-center space-x-2 hover:bg-indigo-50">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span>{{ __('Profil') }}</span>
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                   onclick="event.preventDefault(); this.closest('form').submit();"
                                   class="flex items-center space-x-2 hover:bg-red-50 text-red-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                <span>{{ __('Déconnexion') }}</span>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger Menu (Mobile) -->
            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="p-2 rounded-md text-gray-600 hover:text-indigo-600 focus:outline-none transition">
                    <svg class="h-8 w-8" :class="{ 'hidden': open, 'block': !open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg class="h-8 w-8" :class="{ 'hidden': !open, 'block': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" class="md:hidden absolute w-full bg-white shadow-xl z-50" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-2" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-2">
        <!-- Profile Section Mobile -->
        <div class="border-t border-gray-100 pt-4 pb-2">
            <div class="px-6 flex items-center space-x-3">
                <div class="h-12 w-12 bg-indigo-100 rounded-full flex items-center justify-center font-semibold text-indigo-700">
                    {{ strtoupper(substr(Auth::user()->prenom, 0, 1)) }}
                </div>
                <div>
                    <div class="font-medium text-gray-900">{{ Auth::user()->prenom }}</div>
                    <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-2">
                <x-responsive-nav-link :href="route('profile.edit')" class="px-6 py-3">
                    {{ __('Profil') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                           onclick="event.preventDefault(); this.closest('form').submit();"
                           class="text-red-600 hover:bg-red-50 px-6 py-3">
                        {{ __('Déconnexion') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>



</nav>
