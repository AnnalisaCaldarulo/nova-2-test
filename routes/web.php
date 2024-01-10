<?php

use App\Http\Controllers\ArticleController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use Laravel\Nova\Contracts\ImpersonatesUsers;

/*
|--------------------------------------------------------------------------
| ssWeb Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

Route::get('/blog', [ArticleController::class, 'index'])->name('article.index');
Route::get('/blog/dettaglio/{article:slug}', [ArticleController::class, 'show'])->name('article.show');


Route::get('/impersonation', function (Request $request, ImpersonatesUsers $impersonator) {
    if ($impersonator->impersonating($request)) {
        $impersonator->stopImpersonating($request, Auth::guard(), User::class);
    }
    return redirect(route('homepage'));
})->name('stopImpersonating');

Route::post('/newsletter/register', [PublicController::class, 'register'])->name('newsletter.register');