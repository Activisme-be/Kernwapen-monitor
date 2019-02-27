<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['naam', 'lat', 'lng'];

    /**
     * Data relation for getting the postal code that is attached to the city.
     *
     * @return BelongsTo
     */
    public function postal(): BelongsTo
    {
        return $this->belongsTo(Postal::class)->withDefault(['code' => 0000]);
    }
}
