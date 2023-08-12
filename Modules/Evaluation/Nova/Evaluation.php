<?php

namespace Modules\Evaluation\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Http\Requests\NovaRequest;

class Evaluation extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\Modules\Evaluation\Entities\Evaluation>
     */
    public static $model = \Modules\Evaluation\Entities\Evaluation::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
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

            Select::make('Car Paint')
            ->options([
                'Painted'=>'Painted',
                'Not Painted'=>'Not Painted',
                'Partial Paint'=>'Partial Paint',
            ])
            ->rules('required'),

            Select::make('Transmission')
            ->options([
                'Excellent'=>'Excellent',
                'Average'=>'Average',
                'Acceptable'=>'Acceptable'
            ])
            ->rules('required'),

            Select::make('Suspention')
            ->options([
                'Excellent'=>'Excellent',
                'Average'=>'Average',
                'Acceptable'=>'Acceptable'
            ])
            ->rules('required'),

            Select::make('Engine Status')
            ->options([
                'Good'=>'Good',
                'Bad'=>'Bad'
            ])
            ->rules('required'),

            Select::make('Accident')
            ->options([
                'Yes'=>'Yes',
                'No'=>'No'
            ])
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
}
