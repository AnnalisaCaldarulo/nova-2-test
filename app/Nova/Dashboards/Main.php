<?php

namespace App\Nova\Dashboards;

use Laravel\Nova\Cards\Help;
use App\Nova\Metrics\UserPerDay;
use App\Nova\Metrics\ArticlePerUser;
use App\Nova\Metrics\SubscribersTrend;
use App\Nova\Metrics\ArticleGoalPerWeek;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    /**
     * Get the cards for the dashboard.
     *
     * @return array
     */

     public function name(){
        return 'Dashboard principale';
     }
    public function cards()
    {
        return [
            new ArticlePerUser(),
            new ArticleGoalPerWeek(),
            new UserPerDay(),
            (new SubscribersTrend())->width('full')
        ];
    }
}
