<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ArticleRepository 
 * 
 * @package App\Repositories
 */
class ArticleRepository extends Model 
{
    /**
     * Method for determining is the article has a published status. 
     * 
     * @return bool
     */
    public function isPublished(): bool 
    {
        return $this->status;
    }

    /**
     * Method for determining if the article has a draft status. 
     * 
     * @return bool 
     */
    public function isDraft(): bool 
    {
        return ! $this->isPublished();
    }

    /**
     * Check if the article has an author or not.
     * 
     * @return bool
     */
    public function hasNoAuthor(): bool 
    {
        return is_null($this->author) || is_null($this->author->name);
    }
}