<?php

namespace Modules\Price\Nova;

use App\Nova\Filters\Price as FiltersPrice;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;

class Price extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\Modules\Price\Entities\Price>
     */
    public static $model = \Modules\Price\Entities\Price::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'total_price';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','total_price'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Currency::make('Submitted Price')
            ->rules('required'),

            Currency::make('Monthly Installment')
            ->rules('required'),

            Currency::make('Yearly Installment')
            ->rules('required'),

            Currency::make('Total Price')
            ->rules('required'),

            BelongsTo::make('Car'),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [
            new FiltersPrice()
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
