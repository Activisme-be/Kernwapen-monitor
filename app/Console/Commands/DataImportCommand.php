<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\CityImport;

class DataImportCommand extends Command
{
    protected $signature = 'data:import';

    protected $description = 'Import all the data that is specific for this application.';

    public function handle(): void
    {
        $this->output->title('Start import');

        (new CityImport)->withOutput($this->output)->import(database_path('stubs/cities.csv'));
        $this->output->success('De stads informatie is geimporteerd.');
    }
}
