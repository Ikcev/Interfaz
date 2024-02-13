<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\APIElTiempoController;

class FetchDatosRandom extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:fetch-datos-random';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $random = new APIElTiempoController();
        $random->showAllMunicipios();
    }
}
