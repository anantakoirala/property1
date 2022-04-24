<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PropertyStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('property_statuses')->delete();
        $data = [
            [
                'name'=>'Selfusing',
                
            ],
            [
                'name' =>'Rendted',
                
            ],
            [
                'name' =>'Leased',
                
            ],
            [
                'name' =>'Planting',
                
            ],
            [
                'name' =>'Non Planting',
                
            ],
            [
                'name' =>'Locked',
            ],
            [
                'name' =>'Open',
            ],
            [
                'name' =>'Self Using and rented',
            ]
            
            ];
        \App\Models\PropertyStatus::insert($data);
    }
}
