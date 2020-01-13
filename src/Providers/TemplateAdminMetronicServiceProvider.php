<?php

namespace ConfrariaWeb\TemplateAdminMetronic\Providers;

use Illuminate\Support\ServiceProvider;

class TemplateAdminMetronicServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../Views', 'templatemetronic');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

}
