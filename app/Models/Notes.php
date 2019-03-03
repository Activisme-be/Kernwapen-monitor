<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\User;

/**
 * Class Notes 
 * 
 * @package App\Models
 */
class Notes extends Model
{
    use HasSlug; 

    /**
     * Mass-assign fields for the database table. 
     * 
     * @return array
     */
    protected $fillable = ['titel', 'beschrijving'];

    /**
     * Data relation for the author from the note. 
     * 
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault(['naam', 'Onbekende gebruiker']);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Get the options for generating the slug.
     * 
     * @return SlugOptions
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('titel')
            ->saveSlugsTo('slug');
    }
}
