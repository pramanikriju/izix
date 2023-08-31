<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Comment;
use Livewire\Component;

class CommentBox extends Component
{
    // Locked article variable using new Livewire v3 feature
    public Article $article;
    // Init array of all comments and empty text string
    public $comments, $text;
    //Current comment being edited
    public $comment;

    /**
     * Fetch all the published comments for the article
     */
    public function mount()
    {
        $this->comments = $this->article->comments()->where('published', true)->orderByDesc('updated_at')->get();
    }
    /**
     * Permanently store the unpublished article and clear the text field
     */
    public function delete()
    {
        $this->reset(['text','comment']);
    }

    /**
     * Save the comment on every 
     */
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
