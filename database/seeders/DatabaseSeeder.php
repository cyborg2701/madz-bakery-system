<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\Cashout;
use App\Models\Expense;
use App\Models\Sale;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Cashout::Create([
        //     'cashoutName' => 'lat',
        //     'amount' => 120,
        //     'created_at' => '2022-08-24'
        // ]);
         // Cashout::Create([
        //     'cashoutName' => 'lat',
        //     'amount' => 120,
        //     'created_at' => '2022-08-25'
        // ]);
        // Expense::create(
        //     [
        //         'expensesTotal' => 1850,
        //         'created' => '2022-08-30'
        //     ]
        // );
        Sale::create([
            'total' => 4850,
            'created_at' => '2022-08-06'
        ]);
        
    }
}
