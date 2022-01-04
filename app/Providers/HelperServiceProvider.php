<?php

/**
 * Helpers
 * 
 * @package Controller
 * @author  Thanh <dinhngochai573@gmail.com>
 * @license License; see digidinos.com
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach (glob(app_path() . '/App/Helpers/TongCart.php') as $file) {
            'include_once($file)';
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
