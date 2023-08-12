<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Policies\CarInstallmentPolicy;
use App\Policies\CarInsurancePolicy;
use App\Policies\CarMaintenancePolicy;
use App\Policies\CarNewPolicy;
use App\Policies\CarPolicy;
use App\Policies\DealerPolicy;
use App\Policies\EvaluationPolicy;
use App\Policies\MediaPolicy;
use App\Policies\PostPolicy;
use App\Policies\PricePolicy;
use App\Policies\ReviewPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Modules\Car\Entities\Car;
use Modules\CarInstallment\Entities\CarInstallment;
use Modules\CarInsurance\Entities\CarInsurance;
use Modules\CarMaintenance\Entities\CarMaintenance;
use Modules\CarNew\Entities\CarNew;
use Modules\Dealer\Entities\Dealer;
use Modules\Evaluation\Entities\Evaluation;
use Modules\Media\Entities\Media;
use Modules\Post\Entities\Post;
use Modules\Price\Entities\Price;
use Modules\Review\Entities\Review;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Car::class => CarPolicy::class,
        CarInstallment::class => CarInstallmentPolicy::class,
        CarInsurance::class => CarInsurancePolicy::class,
        CarMaintenance::class => CarMaintenancePolicy::class,
        CarNew::class => CarNewPolicy::class,
        Dealer::class => DealerPolicy::class,
        Evaluation::class => EvaluationPolicy::class,
        Media::class => MediaPolicy::class,
        Post::class => PostPolicy::class,
        Price::class => PricePolicy::class,
        Review::class => ReviewPolicy::class

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
