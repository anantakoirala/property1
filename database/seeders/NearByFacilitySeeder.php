<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class NearByFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('near_by_facilities')->delete();
        $data = [
            [
                'name'=>'Public Parking',
                
            ],
            [
                'name' =>'Public Transport',
                
            ],
            [
                'name' =>'Temple',
                
            ],
            [
                'name' =>'Shop',
                
            ],
            [
                'name' =>'Department Store',
                
            ],
            [
                'name' =>'School',
                
            ],
            [
                'name' =>'Hospital',
                
            ]
            
            ];
        \App\Models\NearByFacility::insert($data);
    }
}
