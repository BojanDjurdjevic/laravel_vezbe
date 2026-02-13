<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shop:get-currency {currency}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for get currency USD & EUR';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cur = strtoupper($this->argument('currency'));
        $response = Http::get(env('CUR_API_URL') . $cur);

        //$response = Http::get("https://open.er-api.com/v6/latest/$cur"); - otvoren api bez API key

        $result = $response->json();
        if(($result['result'] === 'error')) {
            $this->output->error('Uneli ste nepostojeću valutu!');
            return;
        }

        dd("$cur -> RSD: ". $result['rates']['RSD']);
    }
}
