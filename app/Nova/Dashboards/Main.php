<?php

namespace App\Nova\Dashboards;

use App\Nova\Metrics\AvgPrice;
use App\Nova\Metrics\Dealers;
use App\Nova\Metrics\NewCar;
use App\Nova\Metrics\NewPost;
use App\Nova\Metrics\TotalPrice;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
           new NewCar(),
           new NewPost(),
           new Dealers(),
           new AvgPrice(),
           new TotalPrice(),
        ];
    }

    public function name()
    {
        return 'Cars';
    }
}
