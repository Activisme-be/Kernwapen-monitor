<?php

namespace App\Observers;

use App\Models\Tags;

/**
 * Class TagsObserver 
 * 
 * @package App\Observers
 */
class TagsObserver
{
    /**
     * Handle the tags "created" event.
     *
     * Register the authenticated user to the created category tag. 
     * 
     * @param  Tags $tag The database entity from the newly created category tag. 
     * @return void
     */
    public function created(Tags $tag): void
    {
        $user = auth()->user(); 
        $tag->author()->associate($user)->save();
    }
}
