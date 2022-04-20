<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class PropertyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('property_categories')->delete();
        $data = [
            [
                'name'=>'House',
                
            ],
            [
                'name' =>'Apartment',
                
            ],
            [
                'name' =>'Land',
                
            ]
            
            ];
        \App\Models\PropertyCategory::insert($data);
    }
}
