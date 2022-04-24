<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class FacilityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facilities')->delete();
        $data = [
            [
                'name'=>'Water Supply',
                
            ],
            [
                'name' =>'Electricity',
                
            ],
            [
                'name' =>'Land Line Phone',
                
            ],
            [
                'name' =>'Cable Tv',
                
            ],
            [
                'name' =>'Internet',
                
            ],
            [
                'name' =>'Waste Management',
                
            ],
            [
                'name' =>'Garden',
                
            ]
            
            ];
        \App\Models\Facility::insert($data);
    }
}
