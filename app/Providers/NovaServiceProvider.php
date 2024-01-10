<?php

namespace App\Providers;

use App\Nova\User;
use App\Nova\Article;
use App\Models\Article as ModelArticle;
use Laravel\Nova\Nova;
use Illuminate\Http\Request;
use App\Nova\Dashboards\Main;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Illuminate\Support\Facades\Gate;
use App\Nova\Lenses\MostProlificWriter;
use App\Nova\Dashboards\ArticleInsights;
use App\Nova\Dashboards\NewsletterInsights;
use Oneduo\NovaFileManager\NovaFileManager;
use Laravel\Nova\NovaApplicationServiceProvider;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Nova::mainMenu(function (Request $request) {
            return [
                MenuSection::make('Dashboards', [
                    MenuItem::dashboard(Main::class),
                    MenuItem::dashboard(ArticleInsights::class)
                ])->icon('view-grid')->collapsable(),
                MenuSection::make('Sezione utenti', [
                    MenuItem::resource(User::class),
                    MenuItem::lens(User::class, MostProlificWriter::class)
                ])->icon('user')->collapsable(),
                MenuSection::make('Sezione articoli', [
                    MenuItem::resource(Article::class)
                ])->path('/resources/articles')
                ->withBadgeIf('!', 'success', fn()=> ModelArticle::where('created_at', '>=', now()->startOfWeek())->count() >=3)
                ->icon('document-text'),

                MenuSection::make('Strumenti', [
                    MenuItem::link('File Manager', '/nova-file-manager'),
                ])->icon('server')->collapsable(),
            ];
        });
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return $user->is_admin() || $user->is_chief_editor();
        });
    }

    /**
     * Get the dashboards that should be listed in the Nova sidebar.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [
            new \App\Nova\Dashboards\Main,
            new NewsletterInsights(),
            new ArticleInsights()
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            NovaFileManager::make(),
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
