<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Correr Seeders a DB
     *
     * @return void
     */
    public function run()
    {
        $this->call(TypesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(InvoicesSeeder::class);
        $this->call(InvoiceDetailsSeeder::class);
    }
}
