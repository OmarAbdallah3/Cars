<?php

namespace Modules\Dealer\Nova;

use App\Nova\Filters\Dealer as FiltersDealer;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use YieldStudio\NovaPhoneField\PhoneNumber;

class Dealer extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\Modules\Dealer\Entities\Dealer>
     */
    public static $model = \Modules\Dealer\Entities\Dealer::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'dealer_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','dealer_name'
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

            Text::make('Dealer Name')
            ->sortable()
            ->rules('required','max:255'),

            Text::make('Address')
            ->rules('required','max:255'),

            PhoneNumber::make('Phone','dealer_phone')
            ->rules('required'),

            Select::make('Dealer Availability')
            ->options([
                'Yes'=>'Yes',
                'No'=>'No',
            ])
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
        return [
            new FiltersDealer()
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

    public static function label()
{
    return __('Dealers');
}

/**
 * Get the displayable singular label of the resource.
 *
 * @return string
 */
public static function singularLabel()
{
    return __('Dealer');
}

}
