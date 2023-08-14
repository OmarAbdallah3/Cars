<?php

namespace App\Nova\Metrics;

use Laravel\Nova\Card;
use Mako\CustomTableCard\Table\Cell;
use Mako\CustomTableCard\Table\Row;
use Modules\Car\Entities\Car;

class CustomCard extends \Mako\CustomTableCard\CustomTableCard
{
    public function __construct()
    {
        $header = collect(['Car Brand', 'Total Price']);

        $this->title('Brand Prices');
        $this->viewAll(['label' => 'View All', 'link' => '/resources/cars']);

        // $orders = Order::all();
        // Data from you model
        $brandsPrices =collect(Car::with('price')->get());

       

        $this->data($brandsPrices->map(function($brandPrice) {
            
            return new \Mako\CustomTableCard\Table\Row(
                new \Mako\CustomTableCard\Table\Cell($brandPrice['car_brand']),
                new \Mako\CustomTableCard\Table\Cell($brandPrice['price']['total_price']),
                // Instead of alphabetically ordering the status, set a sortableData value for better representation
                
            );
        })->toArray());
    }

    private function getStatusSortableData (string $status) : int
    {
        switch ($status) {
            case 'Ordered':
                return 1;            
            default:
                return 0;
        }
    }}


