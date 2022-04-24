<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ElevationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('elevations')->delete();
        $data = [
            [
                'name'=>'East',
                
            ],
            [
                'name' =>'West',
                
            ],
            [
                'name' =>'North',
                
            ],
            [
                'name' =>'South',
                
            ],
            [
                'name' =>'East South',
                
            ],
            [
                'name' =>'West North',
                
            ],
            [
                'name' =>'East north',
                
            ]
            
            ];
        \App\Models\Elevation::insert($data);
    }
}
