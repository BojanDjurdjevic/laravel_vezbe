<?php

namespace App\Console\Commands;

use App\Models\ExchangeRates;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
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

        //dd("$cur -> RSD: ". $result['rates']['RSD']);

        // NOVO U odnosu na domaći (vežba sa predavanja):
        $dbRow = ExchangeRates::where(['currency' => $cur])->first();
        if($dbRow === null) {
            $dbRow = ExchangeRates::create([
                'currency' => $cur,
                'value' => $result['rates']['RSD']
            ]);
            $this->output->comment("Kurs valute $cur je uspešno upisan u bazu!");
            return;
        }

        if($dbRow->updated_at->isToday()) {
            $this->output->comment("Kurs valute $cur je već ažuriran za danas!");
            return;
        }
        
        $dbRow->update([
            'value' => $result['rates']['RSD']
        ]);

        
    }
}
