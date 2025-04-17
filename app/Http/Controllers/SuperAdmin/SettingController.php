<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Setting;
use App\Models\Tontine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    //

// Page principale des paramètres
public function index()
{
    $tontines = Tontine::all(); // Get all tontines
    $activePaymentMethods = Setting::where('key', 'payment_methods')->first()->value ?? [];
    $tontineTypes = Setting::where('key', 'tontine_types')->first()->value ?? [];
    $notificationSettings = Setting::where('key', 'notifications')->first()->value ?? [];
    $securitySettings = Setting::where('key', 'security')->first()->value ?? [];

    return view('setting.index', compact('activePaymentMethods', 'tontineTypes', 'notificationSettings', 'securitySettings', 'tontines'));
}

// Mettre à jour les moyens de paiement
public function updatePaymentMethods(Request $request)
{
    $methods = $request->input('payment_methods', []);
    Setting::updateOrCreate(
        ['key' => 'payment_methods'], // Colonne de recherche
        ['value' => json_encode($methods)] // Données à mettre à jour ou créer
    );

    return redirect()->route('settings.index')->with('success', 'Moyens de paiement mis à jour');
}

// Mettre à jour les types de tontines
public function updateTontineTypes(Request $request)
{
    $types = $request->input('tontine_types', []);
    Setting::updateOrCreate(
        ['key' => 'tontine_types'],
        ['value' =>json_encode($types) ]
    );

    return redirect()->route('settings.index')->with('success', 'Types de tontines mis à jour');
}

// Mettre à jour les notifications
public function updateNotifications(Request $request)
{
    $notifications = $request->input('notifications', []);
    Setting::updateOrCreate(
        ['key' => 'notifications'],
        ['value' =>json_encode($notifications) ]


    );

    return redirect()->route('settings.index')->with('success', 'Paramètres de notifications mis à jour');
}

// Mettre à jour les paramètres de sécurité
public function updateSecurity(Request $request)
{
    $security = $request->input('security', []);
    Setting::updateOrCreate(
        ['key' => 'security'],

        ['value' =>json_encode($security)]
    );

    return redirect()->route('settings.index')->with('success', 'Paramètres de sécurité mis à jour');
}
}
