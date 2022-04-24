<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        $data = [
            [
                'name' =>'Agent',
                
            ],
            [
                'name' =>'Buyer',
                
            ],
            [
                'name' =>'Seller',
                
            ],
            [
                'name' =>'Owner',
                
            ]
            
            ];
        \App\Models\Role::insert($data);
    }
}
