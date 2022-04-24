<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ExteriorLookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exterior_looks')->delete();
        $data = [
            [
                'name'=>'Traditional Typical Nepalese House',
                
            ],
            [
                'name' =>'Modern House',
                
            ],
            [
                'name' =>'Semi Mordern House',
                
            ],
            [
                'name' =>'European Style House',
                
            ],
            [
                'name' =>'Pillar System',
                
            ],
            [
                'name' =>'Wall System',
                
            ],
            [
                'name' =>'Basement',
                
            ]
            
            ];
        \App\Models\ExteriorLook::insert($data);
    }
}
