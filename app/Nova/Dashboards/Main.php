<?php

namespace App\Nova\Dashboards;

use App\Nova\Metrics\NewCar;
use Laravel\Nova\Cards\Help;
use App\Nova\Metrics\Dealers;
use App\Nova\Metrics\NewPost;
use App\Nova\Metrics\AvgPrice;
use App\Nova\Metrics\CustomCard;
use App\Nova\Metrics\TotalPrice;
use Mako\CustomTableCard\Table\Row;
use Mako\CustomTableCard\Table\Cell;
use Laravel\Nova\Dashboards\Main as Dashboard;
use Modules\Car\Entities\Car;

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
           new CustomCard(),
        ];
    }
    public function name()
    {
        return 'Cars';
    }
}
