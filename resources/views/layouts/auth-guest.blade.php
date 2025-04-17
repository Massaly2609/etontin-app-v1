<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Tontine') }}</title>

         <!-- Fonts -->
         <link rel="preconnect" href="https://fonts.bunny.net">
         <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
         <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

         <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


        @if(isset($pageTitle))
        <title>{{ $pageTitle }} - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- message toastr --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Toastr JS -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

	<link rel="stylesheet" href="{{ URL::to('assets/css/toastr.min.css') }}">
	<script src="{{ URL::to('assets/js/toastr_jquery.min.js') }}"></script>
	<script src="{{ URL::to('assets/js/toastr.min.js') }}"></script>

    <!-- Scripts -->
    @stack('head-scripts')

    </head>
    <body class="font-[Poppins] antialiased">
        <div class="min-h-screen bg-gradient-to-br ">
            <!-- Header -->
            @if(isset($headerAction))
                <nav class="bg-white/10 backdrop-blur-md border-b border-white/20">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between h-16">
                            <div class="flex items-center">
                                <a href="/" class="text-xl font-bold text-white flex items-center">
                                    <x-application-logo class="h-8 w-8 mr-2" />
                                    {{ config('app.name') }}
                                </a>
                            </div>
                            <div class="flex items-center space-x-4">
                                {{ $headerAction }}
                            </div>
                        </div>
                    </div>
                </nav>
            @endif

            <!-- Contenu principal -->
            <main class="py-1">
                    {{ $slot }}
            </main>
        </div>

        @stack('modals')
        @stack('footer-scripts')

         <!-- Initialisation de Toastr -->
         <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

     <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "5000",
        };
    </script>
    </body>
</html>
