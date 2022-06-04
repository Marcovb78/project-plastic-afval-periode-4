<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    
    /**
     * Show all the news articles.
     * 
     * @return
     */
    public function index ()
    {
        $articles = Article::whereActive()->get();

        return view('news.index')
            ->with('articles', $articles);
    }

    /**
     * Show a single news article.
     * 
     * @param Article $article
     */
    public function show (Article $article)
    {
        return view('news.show')
            ->with('article', $article);
    }

}
