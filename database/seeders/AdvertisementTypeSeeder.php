<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AdvertisementTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('advertisement_types')->delete();
        $data = [
            [
                'name'=>'Self Promotion',
                'slug'=>\Str::slug('self-promotion')
                
            ],
            [
                'name' =>'Agency Promotion',
                'slug' =>\Str::slug('agency promotion'),
                
            ],
            [
                'name' =>'Company Promotion',
                'slug' =>\Str::slug('company promotion'),
                
            ],
            [
                'name' =>'Featured',
                'slug' =>\Str::slug('featured'),
                
            ],
            [
                'name' =>'Home Page(1st)',
                'slug' =>\Str::slug('home page 1'),
                
            ],
            [
                'name' =>'Home Page(2nd)',
                'slug' =>\Str::slug('home-page-2'),
            ],
            [
                'name' =>'Online Marketing',
                'slug' =>\Str::slug('online marketing'),
                
            ]
            
            ];
        \App\Models\AdvertisementType::insert($data);
    }
}
