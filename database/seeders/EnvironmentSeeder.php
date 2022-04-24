<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class EnvironmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('environments')->delete();
        $data = [
            [
                'name'=>'Open Environment',
                
            ],
            [
                'name' =>'Quite Surrounding',
                
            ],
            [
                'name' =>'Good Neighbourhood',
                
            ],
            [
                'name' =>'Good Security',
                
            ],
            [
                'name' =>'Natural Environment',
                
            ],
            [
                'name' =>'Highly Commercial Area',
                
            ],
            [
                'name' =>'Developing Commercial Area',
                
            ]
            
            ];
        \App\Models\Environment::insert($data);
    }
}
