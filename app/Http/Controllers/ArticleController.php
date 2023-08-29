<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function ViewAll(Request $request)
    {
        //Paginate articles to 15 per page
        $articles = Article::paginate(15);

        return view('welcome')->with([
            "articles" => $articles
        ]);
    }
}
