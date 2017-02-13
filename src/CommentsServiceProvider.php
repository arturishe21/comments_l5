<?php namespace Vis\Comments;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Finder\Finder;

class CommentsServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        require __DIR__ . '/../vendor/autoload.php';

        $this->setupRoutes($this->app->router);
        $this->loadViewsFrom(realpath(__DIR__ . '/resources/views'), 'comments');
        $this->publishes([
            __DIR__
            . '/published' => public_path('packages/vis/comments'),
            __DIR__ . '/config' => config_path('comments/')
        ], 'comments');

        $this->publishes([
            __DIR__
            . '/published' => public_path('packages/vis/comments')
        ], 'comments_public');

        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/vendor/comments'),
        ], 'comments_views');

        $this->publishes([
            __DIR__ . '/config_definition/comments.php' => config_path('builder/tb-definitions/comments.php')
        ], 'config_definition');


        $this->publishes([
            realpath(__DIR__.'/Migrations') => $this->app->databasePath().'/migrations',
        ]);

    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function setupRoutes(Router $router)
    {
        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/Http/routers.php';
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('comments', function () {
            return new \Vis\Comments\Comment;
        });

        $this->app->booting(function()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Comments', 'Vis\Comments\Facades\Comments');
        });
    }

    public function provides()
    {
    }
}



