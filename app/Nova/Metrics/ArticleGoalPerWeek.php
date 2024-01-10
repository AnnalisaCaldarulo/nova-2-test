<?php

namespace App\Nova\Metrics;

use App\Models\Article;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Progress;

class ArticleGoalPerWeek extends Progress
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return mixed
     */

public function title(){
    return 'prova';
}
    public function name()
    {
        return 'Articoli scritti questa settimana';
    }
    public function calculate(NovaRequest $request)
    {
        return $this->count($request, Article::class, function ($query) {
            return $query->where('created_at', '>=', now()->startOfWeek());
        }, target: 8);
    }

    /**
     * Determine the amount of time the results of the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
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
        return 'article-goal-per-week';
    }
}
