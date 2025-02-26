<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerPolicies();
        Gate::guessPolicyNameUsing(function ($modelClass){
            return 'App\Policies\\'.class_basename($modelClass).'Policy';
        });
    }
}