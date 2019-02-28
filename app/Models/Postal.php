<?php

namespace App\Models;

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
}
