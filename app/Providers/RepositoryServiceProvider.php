<?php

/**
 * Eloqent User
 * 
 * @package Controller
 * @author  Thanh <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\UserRepository::class, \App\Repositories\Eloquent\UserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CategoryRepository::class, \App\Repositories\Eloquent\CategoryRepositoryEloquent::class);
        // $this->app->bind(\App\Repositories\ContactRepositoryInterface::class, \App\Repositories\Eloquent\ContactRepository::class);
        $this->app->bind(\App\Repositories\ProductRepository::class, \App\Repositories\Eloquent\ProductRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TagRepository::class, \App\Repositories\Eloquent\TagRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\OrderRepository::class, \App\Repositories\Eloquent\OrderRepositoryEloquent::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\PostRepository',
            'App\Repositories\UserRepository',
            'App\Repositories\Eloquent\PostRepositoryEloquent',
            'App\Repositories\Eloquent\UserRepositoryEloquent'
        );
    }
}
