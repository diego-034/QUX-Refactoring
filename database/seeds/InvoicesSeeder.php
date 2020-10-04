<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'total' => '100000',
                'total_discount' => '0',
                'total_iva' => '0',
                'state' => "1",
                'client_id' => "2",
                'user_id' => "1"
            ],
            [
                'total' => '100000',
                'total_discount' => '0',
                'total_iva' => '0',
                'state' => "1",
                'client_id' => "2",
                'user_id' => "1"
            ]
        );
        DB::table('invoices')->insert($data);
    }
}
