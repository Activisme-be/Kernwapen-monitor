<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\CityImport;

/**
 * Class DataImportCommand 
 * 
 * @package App\Console\Commands
 */
class DataImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import all the data that is specific for this application.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->output->title('Start import');

        (new CityImport)->withOutput($this->output)->import(database_path('stubs/cities.csv'));
        $this->output->success('De stads informatie is geimporteerd.');
    }
}
