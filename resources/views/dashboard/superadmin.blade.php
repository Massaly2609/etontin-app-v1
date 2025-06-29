<x-app-layout>
    <div class="min-h-screen bg-gray-100 font-sans antialiased">
        <div class="flex flex-1 h-screen">
            @include('layouts.leftBar')

            <main class="flex-1 p-6 bg-gray-100 overflow-y-auto">
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 px-8 pt-24 pb-16 rounded-b-3xl shadow-2xl relative overflow-hidden">
                    <div class="absolute inset-0 bg-blue-700 opacity-20 transform -skew-y-6"></div>
                    <div class="max-w-7xl mx-auto relative z-10">
                        <div class="flex items-center justify-between -mt-16">
                            <div class="space-y-3">
                                <h1 class="text-5xl font-extrabold text-white tracking-tight leading-tight">
                                    {{ __('Tableau de Bord Administrateur') }}
                                </h1>
                                <p class="text-blue-100 text-lg font-light opacity-90">
                                    Gestion globale des tontines, gérants et participants
                                </p>
                            </div>
                            <div class="hidden md:block">
                                <div class="bg-white/20 p-5 rounded-full backdrop-blur-sm shadow-xl animate-fade-in-up">
                                    <i class="fas fa-chart-line text-4xl text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-12">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                        <div class="bg-white rounded-xl shadow-md p-6 border-b-4 border-blue-500 transition-all duration-300 ease-in-out hover:shadow-xl hover:scale-105 transform">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-sm text-gray-500 font-medium">Tontines Actives</p>
                                    <p class="text-4xl font-extrabold text-gray-900 mt-2">
                                        {{ number_format($stats['active_tontines'], 0, ',', ' ') }}
                                    </p>
                                </div>
                                <div class="bg-blue-50 p-3 rounded-full text-blue-600">
                                    <i class="fas fa-coins text-2xl"></i>
                                </div>
                            </div>
                            <a href="{{ route('superadmin.tontines.index') }}" class="mt-5 inline-flex items-center text-blue-600 hover:text-blue-800 text-sm font-semibold transition-colors duration-200">
                                Voir plus
                                <i class="fas fa-arrow-right ml-2 text-xs"></i>
                            </a>
                        </div>

                        <div class="bg-white rounded-xl shadow-md p-6 border-b-4 border-green-500 transition-all duration-300 ease-in-out hover:shadow-xl hover:scale-105 transform">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-sm text-gray-500 font-medium">Gérants Actifs</p>
                                    <p class="text-4xl font-extrabold text-gray-900 mt-2">
                                        {{ number_format($stats['active_gerants'], 0, ',', ' ') }}
                                    </p>
                                </div>
                                <div class="bg-green-50 p-3 rounded-full text-green-600">
                                    <i class="fas fa-users-cog text-2xl"></i>
                                </div>
                            </div>
                            <a href="{{ route('superadmin.gerants.index') }}" class="mt-5 inline-flex items-center text-green-600 hover:text-green-800 text-sm font-semibold transition-colors duration-200">
                                Voir plus
                                <i class="fas fa-arrow-right ml-2 text-xs"></i>
                            </a>
                        </div>

                        <div class="bg-white rounded-xl shadow-md p-6 border-b-4 border-purple-500 transition-all duration-300 ease-in-out hover:shadow-xl hover:scale-105 transform">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="text-sm text-gray-500 font-medium">Participants Totaux</p>
                                    <p class="text-4xl font-extrabold text-gray-900 mt-2">
                                        {{ number_format($stats['total_participants'], 0, ',', ' ') }}
                                    </p>
                                </div>
                                <div class="bg-purple-50 p-3 rounded-full text-purple-600">
                                    <i class="fas fa-users text-2xl"></i>
                                </div>
                            </div>
                            <a href="{{ route('superadmin.participants.index') }}" class="mt-5 inline-flex items-center text-purple-600 hover:text-purple-800 text-sm font-semibold transition-colors duration-200">
                                Voir plus
                                <i class="fas fa-arrow-right ml-2 text-xs"></i>
                            </a>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Tontines créées par mois</h3>
                            <div class="chart-container h-80 flex items-center justify-center">
                                <canvas id="tontinesChart"></canvas>
                            </div>
                        </div>

                        <div class="bg-white rounded-2xl shadow-lg p-6">
                            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Activité Mensuelle</h3>
                            <div class="chart-container h-80 flex items-center justify-center">
                                <canvas id="monthlyActivityChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
                        <h3 class="text-2xl font-semibold text-gray-800 mb-4">Dernières Activités</h3>
                        <ul class="space-y-4">
                            <li class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                                <div class="w-8 h-8 flex items-center justify-center bg-blue-100 text-blue-600 rounded-full">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <p class="text-gray-700"><span class="font-medium">Admin</span> a créé une nouvelle tontine "Épargne Solidaire". <span class="text-xs text-gray-500 ml-2">Il y a 5 min</span></p>
                            </li>
                            <li class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                                <div class="w-8 h-8 flex items-center justify-center bg-green-100 text-green-600 rounded-full">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <p class="text-gray-700"><span class="font-medium">Fatou Diallo</span> a rejoint la tontine "Objectif Maison". <span class="text-xs text-gray-500 ml-2">Il y a 30 min</span></p>
                            </li>
                            <li class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                                <div class="w-8 h-8 flex items-center justify-center bg-red-100 text-red-600 rounded-full">
                                    <i class="fas fa-times-circle"></i>
                                </div>
                                <p class="text-gray-700">La tontine "Vacances 2025" a été clôturée. <span class="text-xs text-gray-500 ml-2">Il y a 1 heure</span></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </main>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Chart 1: Tontines créées par mois (Bar Chart)
            const tontinesCtx = document.getElementById('tontinesChart').getContext('2d');
            const tontinesData = @json(array_values($completeData));
            const tontinesLabels = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

            new Chart(tontinesCtx, {
                type: 'bar',
                data: {
                    labels: tontinesLabels,
                    datasets: [{
                        label: 'Nombre de Tontines',
                        data: tontinesData,
                        backgroundColor: 'rgba(59, 130, 246, 0.8)', // Blue 600 with opacity
                        borderColor: 'rgba(59, 130, 246, 1)',
                        borderWidth: 1,
                        borderRadius: 6, // Rounded bars
                        barPercentage: 0.7, // Adjust bar width
                        categoryPercentage: 0.8 // Adjust space between categories
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false, // No legend for a single dataset
                        },
                        title: {
                            display: false, // Title moved to H3
                        },
                        tooltip: {
                            backgroundColor: '#1E293B', // Dark slate for tooltip
                            titleFont: { size: 14, weight: 'bold' },
                            bodyFont: { size: 14 },
                            padding: 12,
                            cornerRadius: 8,
                            displayColors: false,
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(200, 200, 200, 0.2)', // Lighter grid lines
                                drawBorder: false
                            },
                            ticks: {
                                precision: 0,
                                font: {
                                    size: 12
                                },
                                color: '#6B7280' // Gray 500 for tick labels
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    size: 12
                                },
                                color: '#6B7280'
                            }
                        }
                    }
                }
            });

            // Chart 2: Activité Mensuelle (Line Chart for trends)
            const activityCtx = document.getElementById('monthlyActivityChart').getContext('2d');

            const activityData = {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'],
                datasets: [
                    {
                        label: 'Nouvelles Tontines',
                        data: [12, 19, 8, 15, 12, 10, 7, 14, 11, 13, 9, 16], // Example data
                        backgroundColor: 'rgba(99, 102, 241, 0.6)', // Indigo 500 with opacity
                        borderColor: 'rgba(99, 102, 241, 1)',
                        borderWidth: 2,
                        tension: 0.4, // Smooth lines
                        pointRadius: 5, // Larger points
                        pointBackgroundColor: 'rgba(99, 102, 241, 1)',
                        pointBorderColor: '#fff',
                        pointHoverRadius: 7
                    },
                    {
                        label: 'Nouveaux Participants',
                        data: [8, 15, 12, 10, 7, 14, 11, 13, 9, 16, 12, 19], // Example data
                        backgroundColor: 'rgba(244, 63, 94, 0.6)', // Rose 500 with opacity
                        borderColor: 'rgba(244, 63, 94, 1)',
                        borderWidth: 2,
                        tension: 0.4,
                        pointRadius: 5,
                        pointBackgroundColor: 'rgba(244, 63, 94, 1)',
                        pointBorderColor: '#fff',
                        pointHoverRadius: 7
                    }
                ]
            };

            new Chart(activityCtx, {
                type: 'line', // Changed to line chart for trends
                data: activityData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                boxWidth: 20,
                                padding: 20,
                                font: {
                                    size: 13,
                                    weight: '600' // Semibold legend text
                                },
                                color: '#4B5563' // Gray 700 for legend
                            }
                        },
                        tooltip: {
                            backgroundColor: '#1E293B',
                            titleFont: { size: 14, weight: 'bold' },
                            bodyFont: { size: 14 },
                            padding: 12,
                            cornerRadius: 8,
                            displayColors: true,
                            intersect: false,
                            mode: 'index',
                            bodySpacing: 6
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(200, 200, 200, 0.2)',
                                drawBorder: false
                            },
                            ticks: {
                                stepSize: 5,
                                font: {
                                    size: 12
                                },
                                color: '#6B7280'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            },
                            ticks: {
                                font: {
                                    size: 12
                                },
                                color: '#6B7280'
                            }
                        }
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    animation: {
                        duration: 1000, // Animation on chart load
                        easing: 'easeOutQuart'
                    }
                }
            });
        });
    </script>

    <style>
        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .animate-fade-in-up {
            animation: fadeInScale 0.6s ease-out forwards;
        }
    </style>
    @endpush
</x-app-layout>
