<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        //styles for pagination
        Paginator::useBootstrap();

        //new blade directive for prices
        Blade::directive('priceFormat', function ($price) {
            return "<?php echo number_format($price, 0, ',', ' ');?>";
        });

        //categories for header
        view()->composer('layout.header', function ($view) {
            $view->with('categories', Category::all());
        });
    }
}
