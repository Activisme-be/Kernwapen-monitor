<?php

namespace App\Observers;

use App\Models\Article;

/**
 * Class ArticleObserver 
 * 
 * @package App\Observers
 */
class ArticleObserver
{
    /**
     * Handle the article "created" event.
     *
     * @param  Article  $article The database entity from the created article
     * @return void
     */
    public function created(Article $article): void
    {
        $user = auth()->user();
        $article->author()->associate($user)->save();
    }
}
