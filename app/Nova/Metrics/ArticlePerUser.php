<?php

namespace App\Nova\Metrics;

use App\Models\User;
use App\Models\Article;
use Laravel\Nova\Metrics\Partition;
use Laravel\Nova\Http\Requests\NovaRequest;

class ArticlePerUser extends Partition
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return mixed
     */

     public function name(){
        return 'Articoli per utente';
     }
    public function calculate(NovaRequest $request)
    {
        return $this->count($request, Article::class, 'user_id')
            ->label(function ($value) {
                switch ($value) {
                    case null:
                        return 'None';
                    default:
                        return User::find($value)->name; //importare modello User
                };
            });
    }

    /**
     * Determine the amount of time the results of the metric should be cached.
     *
     * @return \DateTimeInterface|\DateInterval|float|int|null
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'article-per-user';
    }
}
