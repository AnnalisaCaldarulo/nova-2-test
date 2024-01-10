<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::where('is_published', true)->orderBy('published_at', 'DESC')->get();

        return view('article.index', compact('articles'));
    }

    public function show(Article $article){
        return view('article.show', compact('article'));
    }
}
