<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display list of all comments, published and unpublished
     */
    public function viewAllComments(Request $request)
    {
        //Send two instances of paginate to the view in descending order of creation,
        // with query strings to allow different page numbers for each paginator instance
        //TODO - Improve data reading calls by only making one DB call

        return view('dashboard')->with([
            'publishedComments' => Comment::where('published', true)->orderbyDesc('created_at')->paginate(5, ['*'], 'published')->withQueryString(),
            'unpublishedComments' => Comment::where('published', false)->orderbyDesc('created_at')->paginate(5, ['*'], 'unpublished')->withQueryString(),

        ]);
    }
}
