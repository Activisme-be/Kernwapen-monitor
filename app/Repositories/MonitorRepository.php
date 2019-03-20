<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MonitorRepository
 *
 * @package App\Repositories
 */
class MonitorRepository extends Model
{
    /**
     * Method for searching trough the cities in the monitor.
     *
     * @param  null|string $term The term u want to search for.
     * @return Builder
     */
    public function getSearchResults(?string $term): Builder
    {
        return $this->whereHas('postal', function(Builder $query) use ($term) {
            $query->where('code', 'LIKE', "%{$term}%");
        })->orWhere('naam', 'LIKE', "%{$term}%");
    }
}