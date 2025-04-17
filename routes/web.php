<?php

use App\Models\Tontine;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\TirageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdmin\GerantController;
use App\Http\Controllers\SuperAdmin\ReportController;
use App\Http\Controllers\SuperAdmin\SettingController;
use App\Http\Controllers\SuperAdmin\TontineController;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Participant\PaymentController;
use App\Http\Controllers\Auth\ParticipantAuthController;
use App\Http\Controllers\Gerants\GerantReportController;
use App\Http\Controllers\Gerants\GerantTontineController;
use App\Http\Controllers\SuperAdmin\ParticipantController;
use App\Http\Controllers\Gerants\GerantCotisationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Gerants\GerantParticipantController;


// 🏠 Page d'accueil
Route::get('/', function () {
    $tontines = Tontine::with('images')->latest()->take(6)->get();
// dd($tontines);
    return view('welcome', compact('tontines'));
});



// 👤 Gestion du profil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🔐 Routes Super Admin
Route::middleware(['auth', 'verified', 'role:SUPER_ADMIN'])
    ->prefix('superadmin')
    ->name('superadmin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', function () {
            return view('dashboard.superadmin');
        })->name('dashboard');

        // Ressources
        Route::resource('tontines', TontineController::class);
        Route::resource('gerants', GerantController::class);
        Route::resource('participants', ParticipantController::class);

        Route::get('/tontines/{tontine}', [TontineController::class, 'details'])
        ->name('tontines.show');
        //
        Route::get('/gerants/{gerant}', [GerantController::class, 'show'])
        ->name('gerants.show');
        Route::resource('gerants', GerantController::class)
         ->except(['show'])
         ->names([
             'index' => 'gerants.index',
             'create' => 'gerants.create',
             'store' => 'gerants.store',
             'edit' => 'gerants.edit',
             'update' => 'gerants.update',
             'destroy' => 'gerants.destroy'
         ]);
    });

//          // 🔐 Routes Super Admin
// Route::middleware(['auth', 'verified', 'role:SUPER_ADMIN'])
// ->prefix('superadmin')
// ->name('superadmin.')
// ->group(function () {

//     // Dashboard
//     Route::get('/dashboard', [AuthenticatedSessionController::class, 'dashboardSuperAdmin'])
//     ->name('dashboard');

//     // Tontines
//     Route::resource('tontines', TontineController::class)
//         ->except(['show']);
//     Route::get('/tontines/{tontine}', [TontineController::class, 'details'])
//         ->name('tontines.show');

//     // Gérants (Utilisateurs avec profil GERANT)
//     Route::resource('gerants', GerantController::class)
//         ->parameters(['gerants' => 'user'])
//         ->except(['show']);

//         // Route::delete('participants/{participant}', [ParticipantController::class, 'destroy'])
//         // ->name('superadmin.participants.delete');

//     // Participants (Utilisateurs avec profil PARTICIPANT)
//     Route::resource('participants', ParticipantController::class)
//         ->parameters(['participants' => 'user'])
//         ->except(['show']);

//     // Gestion des images
//     Route::delete('/images/{image}', [TontineController::class, 'deleteImage'])
//         ->name('images.destroy');

//     // Routes supplémentaires
//     Route::get('reports', [ReportController::class, 'index'])->name('reports');
//     Route::get('settings', [SettingController::class, 'index'])->name('settings');

// Route::prefix('tirages')->group(function () {
//     // Tableau de bord des tirages
//     Route::get('/dashboard', [TirageController::class, 'dashboard'])->name('tirages.dashboard');

//     // Routes spécifiques aux tontines
//     Route::prefix('tontines/{idTontine}')->group(function () {
//         Route::get('/', [TirageController::class, 'index'])->name('tirages.index');
//         Route::get('/create', [TirageController::class, 'create'])->name('tirages.create');
//         Route::post('/', [TirageController::class, 'store'])->name('tirages.store');
//         Route::get('/{idTirage}', [TirageController::class, 'show'])->name('tirages.show');
//         Route::delete('/{idTirage}', [TirageController::class, 'destroy'])->name('tirages.destroy');
//     });
// });

// });

// 🔐 Routes Super Admin
// Route::middleware(['auth', 'verified', 'role:SUPER_ADMIN'])
//     ->prefix('superadmin')
//     ->name('superadmin.')
//     ->group(function () {

//         // Dashboard
//         Route::get('/dashboard', [AuthenticatedSessionController::class, 'dashboardSuperAdmin'])
//             ->name('dashboard');

//         // Tontines
//         Route::resource('tontines', TontineController::class)
//             ->except(['show']);
//         Route::get('/tontines/{tontine}', [TontineController::class, 'details'])
//             ->name('tontines.show');

//         Route::prefix('tontines/{tontine}')->group(function() {
//             Route::get('tirages', [TirageController::class, 'index'])->name('superadmin.tontines.tirages.index');
//             Route::post('tirages', [TirageController::class, 'store'])->name('superadmin.tontines.tirages.store');
//         });

//         // Gérants (Utilisateurs avec profil GERANT)
//         Route::resource('gerants', GerantController::class)
//             ->parameters(['gerants' => 'user'])
//             ->except(['show']);

//         // Participants (Utilisateurs avec profil PARTICIPANT)
//         Route::resource('participants', ParticipantController::class)
//             ->parameters(['participants' => 'user'])
//             ->except(['show']);

//         // Gestion des images
//         Route::delete('/images/{image}', [TontineController::class, 'deleteImage'])
//             ->name('images.destroy');

//         // Routes supplémentaires
//         Route::get('reports', [ReportController::class, 'index'])->name('reports');
//         Route::get('settings', [SettingController::class, 'index'])->name('settings');
//     });

Route::middleware(['auth', 'verified', 'role:SUPER_ADMIN'])
    ->prefix('superadmin')
    ->name('superadmin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [AuthenticatedSessionController::class, 'dashboardSuperAdmin'])
            ->name('dashboard');

        // Tontines
        Route::resource('tontines', TontineController::class)
            ->except(['show']);
        Route::get('/tontines/{tontine}', [TontineController::class, 'details'])
            ->name('tontines.show');

        // Sous-routes pour les tirages
        Route::prefix('tontines/{tontine}')->group(function() {
            Route::get('tirages', [TirageController::class, 'index'])->name('tontines.tirages.index');
            Route::post('tirages', [TirageController::class, 'store'])->name('tontines.tirages.store');
        });

        // Gérants (Utilisateurs avec profil GERANT)
        Route::resource('gerants', GerantController::class)
            ->parameters(['gerants' => 'user'])
            ->except(['show']);

        // Participants (Utilisateurs avec profil PARTICIPANT)
        Route::resource('participants', ParticipantController::class)
            ->parameters(['participants' => 'user'])
            ->except(['show']);

        // Gestion des images
        Route::delete('/images/{image}', [TontineController::class, 'deleteImage'])
            ->name('images.destroy');

        // Routes supplémentaires
        Route::get('reports', [ReportController::class, 'index'])->name('reports');
        Route::get('settings', [SettingController::class, 'index'])->name('settings');
    });
// 🔐 Routes Gérant
Route::middleware(['auth', 'verified', 'role:GERANT'])
    ->prefix('gerant') // Préfixe pour toutes les routes du gérant
    ->name('gerant.') // Préfixe pour les noms de routes
    ->group(function () {
        // Tableau de bord
        Route::get('/dashboard', [GerantController::class, 'dashboard'])->name('dashboard');

        // Ressources
        Route::resource('tontines', GerantTontineController::class);
        Route::resource('participants', GerantParticipantController::class);
        Route::resource('cotisations', GerantCotisationController::class);

        // Rapports
        Route::get('reports', [GerantReportController::class, 'index'])->name('reports.index');
        Route::get('/gerant/reports', [GerantReportController::class, 'index'])->name('gerant.reports.index');
        Route::get('/gerant/reports/tontines', [GerantReportController::class, 'tontinesReport'])->name('gerant.reports.tontines');
        Route::get('/gerant/reports/participants', [GerantReportController::class, 'participantsReport'])->name('gerant.reports.participants');
        Route::get('/gerant/reports/cotisations', [GerantReportController::class, 'cotisationsReport'])->name('gerant.reports.cotisations');
    });


// Routes publiques pour participants (sans authentification)
Route::middleware('guest')->group(function () {
    // Connexion
    Route::get('/participant/login', [ParticipantAuthController::class, 'showLoginForm'])
         ->name('participant.login');

    Route::post('/participant/login', [ParticipantAuthController::class, 'login'])
         ->name('participant.login.submit');

    // Inscription
    Route::get('/participant/register', [ParticipantAuthController::class, 'showRegistrationForm'])
         ->name('participant.register');

    Route::post('/participant/register', [ParticipantAuthController::class, 'register'])
         ->name('participant.register.submit');

         Route::get('/error', function () {
            return view('error.403'); // Crée une vue temporaire "resources/views/errors/custom.blade.php"
        })->name('error');
 });

// Routes protégées pour participants authentifiés
Route::middleware(['auth', 'verified', 'role:PARTICIPANT'])->group(function () {
    // Dashboard
    Route::get('/participant/dashboard', function () {
        return view('dashboard.participant');
    })->name('participant.dashboard');

    // Déconnexion
    Route::post('/participant/logout', [ParticipantAuthController::class, 'logout'])
         ->name('participant.logout');
});

// Espace sécurisé
Route::middleware(['auth:participant', 'verified'])->prefix('participant')->group(function () {

Route::get('/dashboard', [ParticipantController::class, 'dashboard'])->name('participant.dashboard');
        //Pour les images
         Route::delete('/images/{image}', [TontineController::class, 'deleteImage'])
         ->name('images.destroy');
});

// Routes pour les rapports
Route::prefix('reports')->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name('reports.index'); // Page principale des rapports
        Route::get('/tontines', [ReportController::class, 'tontinesReport'])->name('reports.tontines'); // Rapport des tontines
        Route::get('/participants', [ReportController::class, 'participantsReport'])->name('reports.participants'); // Rapport des participants
        Route::get('/cotisations', [ReportController::class, 'cotisationsReport'])->name('reports.cotisations'); // Rapport des cotisations
        Route::get('/tirages', [ReportController::class, 'tiragesReport'])->name('reports.tirages'); // Rapport des tirages
        Route::get('/financier', [ReportController::class, 'financialReport'])->name('reports.financial'); // Rapport financier
});
    // Routes pour les paramètres
Route::prefix('settings')->group(function () {
    Route::get('/', [SettingController::class, 'index'])->name('settings.index'); // Page principale des paramètres
    Route::get('/update-payment-methods', [SettingController::class, 'updatePaymentMethods'])->name('settings.updatePaymentMethods'); // Mettre à jour les moyens de paiement
    Route::get('/update-tontine-types', [SettingController::class, 'updateTontineTypes'])->name('settings.updateTontineTypes'); // Mettre à jour les types de tontines
    Route::get('/update-notifications', [SettingController::class, 'updateNotifications'])->name('settings.updateNotifications'); // Mettre à jour les notifications
     Route::get('/update-security', [SettingController::class, 'updateSecurity'])->name('settings.updateSecurity'); // Mettre à jour les paramètres de sécurité
});

// 🔐 Routes Gérant
Route::middleware(['auth', 'verified', 'role:GERANT'])->group(function () {
    Route::get('/dashboard/gerant', [GerantController::class, 'dashboard'])
        ->name('gerant.dashboard');
});

// 🔐 Routes Participant
Route::middleware(['auth', 'verified', 'role:PARTICIPANT'])
    ->prefix('participant')
    ->name('participant.')
    ->group(function () {
        // Tableau de bord
        Route::get('/dashboard', [ParticipantController::class, 'dashboard'])->name('dashboard');

        // Gestion des tontines
        Route::prefix('tontines')->name('tontines.')->group(function () {
            // Liste des tontines (celles du participant)
            Route::get('/', [ParticipantController::class, 'myTontines'])->name('index');

            // Tontines disponibles
            Route::get('/disponibles', [ParticipantController::class, 'availableTontines'])->name('available');

            // Détail d'une tontine
            Route::get('/{tontine}', [ParticipantController::class, 'showTontine'])->name('show');

            // Inscription
            Route::get('/{tontine}/rejoindre', [ParticipantController::class, 'joinTontineForm'])->name('join-form');
            Route::post('/{tontine}/rejoindre', [ParticipantController::class, 'joinTontine'])->name('join');

            // Quitter
            Route::post('/{tontine}/quitter', [ParticipantController::class, 'leaveTontine'])->name('leave');
        });

        // Gestion des cotisations
        Route::prefix('cotisations')->name('cotisations.')->group(function () {
            Route::get('/', [ParticipantController::class, 'cotisations'])->name('index');
            Route::get('/nouvelle/{tontine}', [ParticipantController::class, 'createCotisation'])->name('create');
            Route::post('/store/{tontine}', [ParticipantController::class, 'storeCotisation'])->name('store');
        });



        //Historique des cotisations
        Route::prefix('historique')->name('historique.')->group(function () {
            Route::get('/', [ParticipantController::class, 'historique'])->name('index');
        });
                // API Paiement
        Route::post('/api/process-payment', [PaymentController::class, 'processPayment'])->name('process-payment');
    });

// 🔐 Authentification
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

// ⚡ Routes d'authentification
require __DIR__.'/auth.php';
