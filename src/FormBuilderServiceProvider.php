<?php
namespace Prasanth\FormBuilder;

use Illuminate\Support\ServiceProvider;

class FormBuilderServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(
            __DIR__ . '/../database/migrations'
        );

        $this->loadRoutesFrom(
            __DIR__ . '/../routes/web.php'
        );

        $this->loadViewsFrom(
            __DIR__ . '/../resources/views',
            'formbuilder'
        );

        $this->publishes([
            __DIR__ . '/../config/formbuilder.php' =>
            config_path('formbuilder.php'),
        ], 'formbuilder-config');

        $this->publishes([
            __DIR__ . '/../resources/js' =>
            public_path('vendor/formbuilder/js'),
        ], 'formbuilder-assets');

        $menus = config('package_menus', []);

        $menus[] = config('formbuilder.menu');

        config([
            'package_menus' => $menus,
        ]);
    }
}
