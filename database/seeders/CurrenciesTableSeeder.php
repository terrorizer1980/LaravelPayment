<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['usd', 'eur', 'gbp', 'jpy'] as $currency) {
            Currency::create(['iso' => $currency]);
        }
        
    }
}
