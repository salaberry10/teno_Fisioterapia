<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Cita;
use App\Policies\CitaPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Cita::class => CitaPolicy::class,
    ];

    public function boot(): void
    {
        //
    }
}