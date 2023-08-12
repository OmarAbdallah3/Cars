<?php

namespace Modules\Car\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Engine extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\Modules\Car\Entities\Engine>
     */
    public static $model = \Modules\Car\Entities\Engine::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'engine_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','engine_name'
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

            Text::make('Engine Name')
            ->rules('required','max:255'),
           
            Text::make('Engine Type')
            ->sortable()
            ->rules('required','max:255'),

            

            Text::make('Engine Capacity')
            ->rules('required','max:255'),

            Number::make('Cylinder Num')
            ->rules('required'),

            Number::make('Acceleration')
            ->rules('required'),

            Number::make('Feul Capacity')
            ->rules('required'),

            Text::make('Traction System')
            ->rules('required','max:255'),

            Text::make('Engine Location')
            ->rules('required','max:255'),

            Number::make('Max Speed')
            ->rules('required'),

            Number::make('Horse Power' ,'Horsepower')
            ->rules('required'),

            Number::make('Torque')
            ->rules('required'),

            Number::make('Avg Oil Consumption')
            ->rules('required'),

            Text::make('Fuel Type')
            ->rules('required','max:255'),

            Number::make('Gears Num')
            ->rules('required'),

            Text::make('Internal Combustion Engine')
            ->rules('required','max:255'),

            DateTime::make('Creation Date')
            ->rules('required')
            ->default(now())
            ->filterable(),
            

            Textarea::make('Description')
            ->rules('required'),

            


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
        return [];
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

    public static function label()
{
    return __('Engines');
}

/**
 * Get the displayable singular label of the resource.
 *
 * @return string
 */
public static function singularLabel()
{
    return __('Engine');
}


    /**
 * The logical group associated with the resource.
 *
 * @var string
 */
public static $group = 'Cars';
}
