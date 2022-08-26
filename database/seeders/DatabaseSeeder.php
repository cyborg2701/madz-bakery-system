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
        Transaction::create([
            'transactionId' => 22000000,
            'price' => 0,
            'qty' => 0,
            'subTotal' => 0,
            'created_at' => '2022-08-26'
        ]);
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
        // Expense::create([
        //     'expensesTotal' => 8960,
        //     'created_at' => '2022-08-24'
        // ]);
        // Sale::create([
        //     'total' => 4885,
        //     'created_at' => '2022-08-25'
        // ]);
        
    }
}
