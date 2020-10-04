<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            ['name'=>'Camisa Polo',
            'image'=>'images/q-ux.jpg',
            'description'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur quidem laudantium aliquid quibusdam. Commodi ipsa, natus tempora ipsum provident tempore possimus corrupti numquam omnis quibusdam mollitia, aut in maxime vel!',
            'state'=> 1,
            'color'=>'Negro',
            'price'=>'123132123',
            'iva'=>'0',
            'discount'=>'0',
            'size_s'=>'0',
            'size_m'=>'10',
            'size_l'=>'10',
            'user_id'=>'1'
        ],
        ['name'=>'Camisa Larga',
            'image'=>'images/q-ux.jpg',
            'description'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur quidem laudantium aliquid quibusdam. Commodi ipsa, natus tempora ipsum provident tempore possimus corrupti numquam omnis quibusdam mollitia, aut in maxime vel!',
            'state'=> 1,
            'color'=>'Azul',
            'price'=>'123132123',
            'iva'=>'0',
            'discount'=>'0',
            'size_s'=>'0',
            'size_m'=>'10',
            'size_l'=>'10',
            'user_id'=>'1'
            ]
        );
        DB::table('products')->insert($data);
    }
}
