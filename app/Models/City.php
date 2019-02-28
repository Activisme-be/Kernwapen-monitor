<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

/**
 * Class City 
 * 
 * @package App\Models
 */
class City extends Model
{
    /**
     * Mass-assign fields for the database table. 
     * 
     * @return array
     */
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

    /**
     * Data relation for setting/getting the province from the city.
     *
     * @return BelongsTo
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class)->withDefault(['name' => 'None']);
    }
}
