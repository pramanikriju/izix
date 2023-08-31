<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display the paginated list of all articles
     */
    public function ViewAll(Request $request)
    {
        //Paginate articles to 15 per page
        $articles = Article::simplePaginate(10);
        //Used 'with' for better readability
        return view('welcome')->with([
            'articles' => $articles
        ]);
    }
    /**
     * Display an individual article
     */
    public function viewArticle(Article $article)
    {
        //Used 'with' for better readability
        return view('article')->with([
            'article' => $article,
            'comments' => $article->comments()->where('published', true)->get(),
        ]);
    }
}
