<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function viewAllComments(Request $request)
    {
        return view('dashboard')->with([
            'publishedComments' => Comment::where('published', true)->orderbyDesc('created_at')->paginate(5, ['*'], 'published')->withQueryString(),
            'unpublishedComments' => Comment::where('published', false)->orderbyDesc('created_at')->paginate(5, ['*'], 'unpublished')->withQueryString(),

        ]);
    }
}
