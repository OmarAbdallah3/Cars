<?php

namespace Modules\Car\Nova;

use App\Nova\Filters\CarBrand;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Color;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Modules\Car\Nova\Engine;
use Modules\Dealer\Nova\Dealer;
use Modules\Price\Nova\Price;
use YieldStudio\NovaPhoneField\PhoneNumber;

class Car extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\Modules\Car\Entities\Car>
     */
    public static $model = \Modules\Car\Entities\Car::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'car_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id','car_name'
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

            Text::make('Car Name')
            ->sortable()
            ->rules('required','max:255'),

            Text::make('Car Brand')
            ->sortable()
            ->rules('required','max:255')
            ->filterable(function ($request, $query, $value, $attribute) {
                $query->where($attribute, 'LIKE', "%{$value}%");
            }),

            Text::make('Address')
            ->rules('required','max:255'),

            PhoneNumber::make('Phone Number','phone')
            ->rules('required'),

            Text::make('Transmission')
            ->sortable()
            ->rules('required','max:255'),

            Select::make('Car Condition')->options([
                'Used'=>'Used',
                'New'=>'New',
            ])
            ->displayUsingLabels()
            ->rules('required'),



            Number::make('Mileage')
            ->rules('required'),

            DateTime::make('Registration')
            ->rules('required'),

            Color::make('Color')
            ->rules('required'),
            
            HasMany::make('Engines','engines',Engine::class),

            HasMany::make('CarModels','carModels',CarModel::class),

            BelongsTo::make('User'),

            HasMany::make('Dealers','dealers',Dealer::class),

            HasOne::make('Price','price',Price::class),

            HasMany::make('Specifications','specifications',Specification::class),

            HasMany::make('Accessories','accessories',Accessory::class),

            Images::make('Image','images'),



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
            new CarBrand()
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

    /**
 * The logical group associated with the resource.
 *
 * @var string
 */
public static $group = 'Cars';
}
