<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Comment;
use Livewire\Component;

class CommentBox extends Component
{

    public Article $article;

    public $comments, $text;

    public $comment;
    protected $rules = [
        'comment' => 'required',
    ];

    public function mount()
    {
        $this->comments = $this->article->comments()->where('published', true)->orderByDesc('updated_at')->get();
    }
    public function delete()
    {
        $this->reset(['text','comment']);
    }

    public function updatedText()
    {
        if(empty($this->comment))
        {
            $validated = $this->validate([
                'text' => 'required',
            ]);
            $currentComment = Comment::create([
                'content' => $validated['text'],
                'user_id' => auth()->user()->id ?? null,
                'article_id' => $this->article->id,
                'published' => false
            ]);
            $this->comment = $currentComment;
        }
        $this->comment->content = $this->text;
        $this->comment->save();

    }

    public function save()
    {
        $this->comment->published = true;
        $this->comment->save();
        $this->reset('text');
        $this->comments = $this->article->comments()->where('published', true)->orderByDesc('updated_at')->get();
    }
}
