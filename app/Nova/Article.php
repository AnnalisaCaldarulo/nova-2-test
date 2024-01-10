<?php

namespace App\Nova;

use App\Nova\Filters\IsPublished;
use App\Nova\Filters\PublishingDateFilter;
use App\Nova\Metrics\ArticleGoalPerWeek;
use App\Nova\Metrics\ArticlePerUser;
use Eminiarts\Tabs\Tab;
use Eminiarts\Tabs\Tabs;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Stack;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\KeyValue;
use Laravel\Nova\Fields\Textarea;
use Eminiarts\Tabs\Traits\HasTabs;
use Laravel\Nova\Fields\BelongsTo;
use Mostafaznv\NovaCkEditor\CkEditor;
use Laravel\Nova\Http\Requests\NovaRequest;
use Ebess\AdvancedNovaMediaLibrary\Fields\Images;

class Article extends Resource
{
    use HasTabs;
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Article::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title'
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

            // Tabs::make('Tabs', [
            //     Tab::make('Principali', [
            ID::make()->sortable(),

            Stack::make('Titoli', [
                Text::make('Titolo', 'title'),

                Slug::make('Slug', 'slug')->from('title'),
            ])
                ->hideFromDetail()
                ->sortable(),
            Text::make('Titolo', 'title')
                ->sortable()
                ->rules('required', 'max:255')
                ->hideFromIndex(),

            Slug::make('Slug')->from('title')
                ->hideFromIndex(),

            Text::make('Sottotitolo', 'subtitle')
                ->sortable()
                ->rules('required', 'max:255')
                ->hideFromIndex(),
            // ]),

            // Tab::make('Corpo e Pubblicazione', [
            CkEditor::make('Corpo', 'body')
                ->rules('required', 'max:2500')
                ->alwaysShow()
                ->hideFromIndex(),

            Images::make('Gallery', 'gallery')
                ->conversionOnIndexView('thumb')
                ->rules('required', 'max:8'),

            Boolean::make('Pubblicato', 'is_published')
                ->readonly(function ($request) {
                    if (!$request->session()->has('nova_impersonated_by')) {
                        return !$request->user()->is_chief_editor();
                    } else {
                        return $request->user()->is_chief_editor();
                    }
                }),

            Date::make(__('Pubblicato il'), 'published_at')
                ->readonly(function ($request) {
                    if (!$request->session()->has('nova_impersonated_by')) {
                        return !$request->user()->is_chief_editor();
                    } else {
                        return $request->user()->is_chief_editor();
                    }
                }),

            BelongsTo::make('Utente', 'user', \App\Nova\User::class),
            // ]),

            // Tab::make('Meta tags', [
            KeyValue::make('Meta', 'meta')
                ->keyLabel('Proprietà') //nome del campo chiave
                ->valueLabel('Valore') //nome del campo valore
                ->actionText('Aggiungi elemento') //azione del +
                ->rules('json'),

            Date::make('Creato il', 'created_at')
                ->onlyOnDetail(),

            Date::make('Aggiornato il', 'updated_at')
                ->onlyOnDetail(),

            //     ]),

            // ]),

        ];
    }

    public static function createButtonLabel()
    {
        return 'Crea articolo!';
    }

    public static function updateButtonLabel()
    {
        return 'Modifica l\'articolo!';
    }


    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [
            (new ArticlePerUser())->width('1/3'),
            (new ArticleGoalPerWeek())->width('2/3')->help('ciao')
        ];
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
            new IsPublished,
            new PublishingDateFilter
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
