<?php

namespace App\Providers;

use App\Nova\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Modules\Car\Nova\Accessory;
use Modules\Car\Nova\Car;
use Modules\Car\Nova\CarMake;
use Modules\Car\Nova\CarModel;
use Modules\Car\Nova\Engine;
use Modules\Car\Nova\Specification;
use Modules\CarInstallment\Nova\CarInstallment;
use Modules\CarInsurance\Nova\CarInsurance;
use Modules\CarMaintenance\Nova\CarMaintenance;
use Modules\CarNew\Nova\CarNews;
use Modules\Dealer\Nova\Dealer;
use Modules\Evaluation\Nova\Evaluation;
use Modules\Post\Nova\Post;
use Modules\Price\Nova\Price;
use Modules\Review\Nova\Review;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        
        $this->getFooterContent();

        Nova::userTimezone(function (Request $request) {
            return $request->user()?->timezone;
        });

       
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
            
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function getFooterContent():void
    {
        Nova::footer(function($request)
        {
            return Blade::render('nova/footer');
        });
    }

    protected function resources()
{
    

    Nova::resources([
        Car::class,
        Accessory::class,
        Engine::class,
        Specification::class,
        User::class,
        CarMake::class,
        CarModel::class,
        Evaluation::class,
        Price::class,
        CarNews::class,
        CarInsurance::class,
        CarInstallment::class,
        CarMaintenance::class,
        Post::class,
        Dealer::class,
        Review::class,
    ]);
}

}
