<?php

namespace App\Providers;
use App\Models\User;

use App\Policies\ParticipantPolicy;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        User::class => ParticipantPolicy::class,
    ];


    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Paginator::useTailwind();
        // $this->registerPolicies();

    }
}
