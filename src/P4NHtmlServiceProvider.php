<?php

namespace hoalzein\Prof4Net\Html;

use Illuminate\Support\ServiceProvider;

class P4NHtmlServiceProvider extends ServiceProvider {

    public function register() {
        $this->mergeConfigFrom(__DIR__ . '/config/p4n-html.php', 'p4n-html');
        $this->app->bind('p4n-html', function() {
            return new P4NHtml;
        });
    }

    public function boot() {
        $this->publishes([__DIR__ . '/config/p4n-html.php' => config_path('p4n-html.php'),], 'p4n-config');
        $this->publishes([__DIR__ . '/assets' => public_path('prof4net'),], 'p4n-assets');
        //$this->publishes([__DIR__ . '/resources/views' => base_path('resources/views/vendor/p4n-html'),], 'views');
        //$this->publishes([__DIR__ . '/database/migrations/' => database_path('migrations')], 'migrations');
        //$this->publishes([__DIR__ . '/path/to/translations' => resource_path('lang/vendor/courier'),], 'translations');
        //$this->loadMigrationsFrom(__DIR__.'/path/to/migrations');
        //$this->loadRoutesFrom(__DIR__.'/routes.php');
        //$this->loadTranslationsFrom(__DIR__.'/path/to/translations', 'courier');
        //$this->loadViewsFrom(__DIR__.'/path/to/views', 'courier');
    }

}
