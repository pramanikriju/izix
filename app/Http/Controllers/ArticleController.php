<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function ViewAll(Request $request)
    {
        //Paginate articles to 15 per page
        $articles = Article::simplePaginate(10);
        
        return view('welcome')->with([
            'articles' => $articles
        ]);
    }

    public function viewArticle(Article $article)
    {
        return view('article')->with([
            'article' => $article,
            'comments' => $article->comments()->where('published', true)->get(),
        ]);
    }
}
