<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\APIElTiempoController;

class FetchDatosElTiempo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:fetch-datos-el-tiempo';

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
        $historico = new APIElTiempoController();
        $historico->showAllMunicipios();
    }
}
