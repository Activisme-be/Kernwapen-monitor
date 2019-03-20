<?php

namespace App\Models;

use App\Repositories\MonitorRepository;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class City 
 * 
 * @package App\Models
 */
class City extends MonitorRepository
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
