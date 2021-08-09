<?php

namespace App\Providers;

use App\Models\User;
use App\Services\Contracts\Newsletter;
use App\Services\MailchimpNewsletter;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(Newsletter::class, MailchimpNewsletter::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin', function (User $user) {
            return $user->username === 'john';
        });
    }
}
