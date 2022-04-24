<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class InteriorLookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interior_looks')->delete();
        $data = [
            [
                'name'=>'Fully Furnished',
                
            ],
            [
                'name' =>'Semi Furnished',
                
            ],
            [
                'name' =>'Not Furnished',
                
            ],
            [
                'name' =>'Ready To Move',
                
            ],
            [
                'name' =>'Open Spaces',
                
            ],
            [
                'name' =>'Wall Putting',
                
            ],
            [
                'name' =>'Internal Coloring',
                
            ]
            
            ];
        \App\Models\InteriorLook::insert($data);
    }
}
