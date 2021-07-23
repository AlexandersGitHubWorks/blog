<?php

namespace App\Providers;

use App\Services\Contracts\FileReaderContract;
use App\Services\YamlFrontMatterService;
use Illuminate\Support\ServiceProvider;

class FileReaderProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(FileReaderContract::class, YamlFrontMatterService::class);
    }
}
