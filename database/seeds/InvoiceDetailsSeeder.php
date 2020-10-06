<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceDetailsSeeder extends Seeder
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
                'quantity' => '2',
                'total' => '50000',
                'discount' => '0',
                'iva' => "0",
                'state' => "1",
                'size' => "m",
                "product_id"=> "2",
                "invoice_id"=> "1"
            ],
            [
                'quantity' => '2',
                'total' => '100000',
                'discount' => '0',
                'iva' => "0",
                'state' => "1",
                'size' => "m",
                "product_id"=> "1",
                "invoice_id"=> "2"
            ]
        );
        DB::table('invoice_details')->insert($data);
    }
}
