<?php

namespace App\Nova\Dashboards;

use App\Nova\Metrics\ArticleGoalPerWeek;
use App\Nova\Metrics\ArticlePerUser;
use Laravel\Nova\Dashboard;

class ArticleInsights extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */
    public function cards()
    {
        return [
            new ArticlePerUser(),
            new ArticleGoalPerWeek()
        ];
    }

    /**
     * Get the URI key for the dashboard.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'article-insights';
    }
}
