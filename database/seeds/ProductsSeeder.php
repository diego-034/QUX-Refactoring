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
            'price'=>'50000',
            'iva'=>'0',
            'discount'=>'0',
            'user_id'=>'1'
        ],
        ['name'=>'Camisa Larga',
            'image'=>'images/q-ux.jpg',
            'description'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur quidem laudantium aliquid quibusdam. Commodi ipsa, natus tempora ipsum provident tempore possimus corrupti numquam omnis quibusdam mollitia, aut in maxime vel!',
            'state'=> 1,
            'color'=>'Azul',
            'price'=>'25000',
            'iva'=>'0',
            'discount'=>'0',
            'user_id'=>'1'
            ]
            ,
        ['name'=>'Camisilla',
            'image'=>'images/q-ux.jpg',
            'description'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur quidem laudantium aliquid quibusdam. Commodi ipsa, natus tempora ipsum provident tempore possimus corrupti numquam omnis quibusdam mollitia, aut in maxime vel!',
            'state'=> 1,
            'color'=>'Balnca',
            'price'=>'15000',
            'iva'=>'0',
            'discount'=>'0',
            'user_id'=>'1'
            ]
        );
        DB::table('products')->insert($data);
    }
}
