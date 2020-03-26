<?php
namespace Isb\Language;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes(
            [
                __DIR__ . '/../database/migrations' => database_path('migrations')
            ], 'isb-language-migrations'
        );
        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\Commands\AddLanguageCommand::class,
                Console\Commands\InstallCommand::class,
            ]);
        }
    }
}
