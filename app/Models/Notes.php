<?php

namespace App\Models;

use App\User;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    protected $dates = ["created_at"];

    /**
     * Data relation for the author from the note. 
     * 
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault(['voornaam' => 'Onbekende', 'achternaam' => 'gebruiker']);
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
     * Data relation for the attached city. 
     * 
     * @return BelongsTo
     */
    public function postal(): BelongsTo
    {
        return $this->belongsTo(Postal::class, 'postal_id');
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
