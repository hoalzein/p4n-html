<?php

namespace hoalzein\Prof4Net\Html;

use Illuminate\Support\ServiceProvider;

class HtmlServiceProvider extends ServiceProvider {

    public function register() {
        $this->mergeConfigFrom(__DIR__ . '/config/p4n-html.php', 'p4n-html');
    }

    public function boot() {
        $this->publishes([__DIR__ . '/config/p4n-html.php' => config_path('p4n-html.php'),]);
    }

}
