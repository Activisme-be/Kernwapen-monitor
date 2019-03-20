<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Postal 
 * 
 * @package App\Models
 */
class Postal extends Model
{
    /**
     * Mass-assign fields for the database table. 
     * 
     * @return array 
     */
    protected $fillable = ['code'];

    /**
     * Data relation for all the signatures that are attached to the postal code. 
     * 
     * @return HasMany
     */
    public function signatures(): HasMany
    {
        return $this->hasMany(Signature::class);
    }

    /**
     * Data relation for the notes taht are attached to the postal code. 
     * 
     * @return HasMany
     */
    public function notes(): HasMany 
    {
        return $this->hasMany(Notes::class);
    }
}
