<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Tracker;

class ApiRequest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'request:api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Launch API request to check tracker status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $trackers = Tracker::all();

        foreach ($trackers as $tracker) {

            // GET Request da API
            $response = Http::get('https://ws001.selfivery.com/api/test/spedizione/' . $tracker->codice);
            
            // Stampa dati se codice corretto e stato consegna diverso da "consegnata"
            if (isset($response['stato']) && ($response['stato'] != "consegnata")) {     
                echo nl2br($tracker->codice . " " . $response['stato'] . "\r\n");
            }
        }
    }
}
