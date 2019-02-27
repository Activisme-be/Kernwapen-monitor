<?php

namespace App\Imports;

use App\Models\City;
use App\Models\Postal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\Importable;

/**
 * Class CityImport
 *  
 * @package App\Imports
 */
class CityImport implements ToModel, WithHeadingRow, WithBatchInserts, WithProgressBar
{
    use Importable;

    /**
     * Method for inserting the records into the database. 
     *  
     * @param  array $row A simle row from the CSV file. 
     * @return void
     */
    public function model(array $row): void
    {
        $postal = Postal::firstOrCreate(['code' => $row['postal']]);
        $city   = City::firstOrCreate(['naam' => $row['name'], 'lat' => $row['lat'], 'lng' => $row['lng']]);
    
        $city->postal()->associate($postal)->save();
    }

    /**
     * Register the number of inserts for each batch. 
     * 
     * @return int
     */
    public function batchSize(): int
    {
        return 50;
    }

    /**
     * Register the chunk size. 
     * 
     * @return int
     */
    public function chunkSize(): int
    {
        return 50;
    }
}
