<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
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

        // if($this->app->environment('production')) {
        //     \URL::forceScheme('https');
        //     Paginator::useBootstrap();
        // }

        Paginator::useBootstrap();

        Blade::directive('money', function ($amount) {
            return "<?php echo '₱' . number_format($amount, 2); ?>";
        });
    }
}
