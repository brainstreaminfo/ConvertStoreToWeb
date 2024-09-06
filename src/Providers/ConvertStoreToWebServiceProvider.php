<?php

namespace Webkul\ConvertStoreToWeb\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\View;

class ConvertStoreToWebServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->loadRoutesFrom(__DIR__ . '/../Routes/admin-routes.php');

        $this->loadRoutesFrom(__DIR__ . '/../Routes/shop-routes.php');

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'convertstoretoweb');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'convertstoretoweb');

        Event::listen('bagisto.admin.layout.head', function($viewRenderEventManager) {
            $viewRenderEventManager->addTemplate('convertstoretoweb::admin.layouts.style');
        });

        // Override the specific view
        View::composer('shop::components.layouts.services', function ($view) {
            $view->setPath(base_path('packages/Webkul/ConvertStoreToWeb/src/Resources/views/components/layouts/services.blade.php'));
        });

        View::composer('shop::components.products.card', function ($view) {
            $view->setPath(base_path('packages/Webkul/ConvertStoreToWeb/src/Resources/views/components/products/card.blade.php'));
        });

        View::composer('shop::products.view', function ($view) {
            $view->setPath(base_path('packages/Webkul/ConvertStoreToWeb/src/Resources/views/products/view.blade.php'));
        });

        View::composer('shop::components.layouts.header.desktop.bottom', function ($view) {
            $view->setPath(base_path('packages/Webkul/ConvertStoreToWeb/src/Resources/views/components/layouts/header/desktop/bottom.blade.php'));
        });

        View::composer('admin::dashboard.index', function ($view) {
            $view->setPath(base_path('packages/Webkul/ConvertStoreToWeb/src/Resources/views/dashboard/index.blade.php'));
        });

        View::composer('admin::catalog.products.edit.links', function ($view) {
            $view->setPath(base_path('packages/Webkul/ConvertStoreToWeb/src/Resources/views/catalog/products/edit/links.blade.php'));
        });

        View::composer('admin::reporting.customers.index', function ($view) {
            $view->setPath(base_path('packages/Webkul/ConvertStoreToWeb/src/Resources/views/reporting/customers/index.blade.php'));
        });

        View::composer('admin::reporting.products.index', function ($view) {
            $view->setPath(base_path('packages/Webkul/ConvertStoreToWeb/src/Resources/views/reporting/products/index.blade.php'));
        });

        View::composer('admin::dashboard.stock-threshold-products', function ($view) {
            $view->setPath(base_path('packages/Webkul/ConvertStoreToWeb/src/Resources/views/dashboard/stock-threshold-products.blade.php'));
        });

        View::composer('admin::catalog.products.index', function ($view) {
            $view->setPath(base_path('packages/Webkul/ConvertStoreToWeb/src/Resources/views/catalog/products/index.blade.php'));
        });

        View::composer('shop::categories.toolbar', function ($view) {
            $view->setPath(base_path('packages/Webkul/ConvertStoreToWeb/src/Resources/views/categories/toolbar.blade.php'));
        });

        View::composer('shop::search.index', function ($view) {
            $view->setPath(base_path('packages/Webkul/ConvertStoreToWeb/src/Resources/views/search/index.blade.php'));
        });

        View::composer('shop::search.index', function ($view) {
            $view->setPath(base_path('packages/Webkul/ConvertStoreToWeb/src/Resources/views/search/index.blade.php'));
        });

        View::composer('shop::components.products.carousel', function ($view) {
            $view->setPath(base_path('packages/Webkul/ConvertStoreToWeb/src/Resources/views/components/products/carousel.blade.php'));
        });

        View::composer('shop::categories.filters', function ($view) {
            $view->setPath(base_path('packages/Webkul/ConvertStoreToWeb/src/Resources/views/categories/filters.blade.php'));
        });

        View::composer('shop::components.layouts.footer.index', function ($view) {
            $view->setPath(base_path('packages/Webkul/ConvertStoreToWeb/src/Resources/views/components/layouts/footer/index.blade.php'));
        });

        // Add the menu filtering logic here
        $config = Config::get('menu.admin');
        $filteredMenu = [];

        foreach ($config as $key => $data) {
            // Exclude 'sales' and 'marketing.promotions'
            if (strpos($config[$key]['key'], 'sales') === false && strpos($config[$key]['key'], 'marketing.promotions') === false  && strpos($config[$key]['key'], 'settings.taxes') === false && strpos($config[$key]['key'], 'settings.currencies') === false && strpos($config[$key]['key'], 'settings.exchange_rates') === false) {
                $filteredMenu[] = $config[$key];
            }
        }

        // Override the 'menu.admin' configuration with the filtered menu
        Config::set('menu.admin', $filteredMenu);  

        // Override system.php configuration
        $this->mergeSystemConfig();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
    }

    /**
     * Register package config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(__DIR__ . '/../Config/admin-menu.php', 'menu.admin');
    }

    /**
     * Merge custom system.php configuration.
     */
    protected function mergeSystemConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/system.php', 'core'
        );
    }

}