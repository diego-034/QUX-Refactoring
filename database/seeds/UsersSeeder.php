<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => "User_Prueba",
            'email' => "admin@mail.com",
            'password' => "$2y$10$/O2ETLscMHEBibQlrVTNd.OKhZ5oXAlcm3RZpArX1uMndRhJ.aAKG"
        ];
        DB::table('users')->insert($data);
    }
}
