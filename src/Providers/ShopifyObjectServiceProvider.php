<?php

namespace Shopify\Providers;

use Illuminate\Support\ServiceProvider;

class ShopifyObjectServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        $this->publishes([
            __DIR__ . '/../Config/shopify_object.php' => config_path('shopify_object.php'),
        ],'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        
    }

}
