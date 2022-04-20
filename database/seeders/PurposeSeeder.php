<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('purposes')->delete();
        $data = [
            [
                'name'=>'Rent',
                
            ],
            [
                'name' =>'Sale',
                
            ],
            [
                'name' =>'Invest',
                
            ]
            
            ];
        \App\Models\Purpose::insert($data);
    }
}
