<?php

namespace App\Models;

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
}
