<?php

namespace App\Models;

use Spatie\Tags\Tag;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\User;

/**
 * Class Tags
 * 
 *Mo-del that is extendt he Spatie/laravel-tags model for the author relation
 */
class Tags extends Tag
{
    /**
     * Data relation for the author information from the tag. 
     * 
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
