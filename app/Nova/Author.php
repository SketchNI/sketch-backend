<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\HasManyThrough;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Author extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static string $model = \App\Models\Author::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The value that this resource should be grouped into in the sidebar.
     *
     * @var string
     */
    public static $group = 'Meta';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name', 'goodreads_profile',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  Request  $request
     * @return array
     */
    public function fields(Request $request): array
    {
        return [
            Text::make(__('Name'), 'name')->sortable(),
            Text::make('Goodreads URL', 'goodreads_profile')->onlyOnForms(),
            Text::make('Goodreads URL', 'goodreads_profile', function() {
                $name = $this->name;
                $url = $this->goodreads_profile;

                return sprintf('<a href="%s" target="_blank">%s</a>', $url, $name);
            })->asHtml()->exceptOnForms(),

            Number::make('Books', 'books_count')->exceptOnForms(),

            HasMany::make('Books'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
