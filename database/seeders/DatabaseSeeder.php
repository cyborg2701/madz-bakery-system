<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
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
            'qty' => 1,
            'subTotal' => 0
        ]);
    }
}
