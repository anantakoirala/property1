<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ClassTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_types')->delete();
        $data = [
            [
                'name'=>'Low Underdeveloped Area',
                
            ],
            [
                'name' =>'Moderate Developed Area',
                
            ],
            [
                'name' =>'Full Developed Area',
                
            ],
            [
                'name' =>'High Developed Area',
                
            ],
            [
                'name' =>'Commercial Area',
                
            ],
            [
                'name' =>'Developed Colony Area',
                
            ],
            [
                'name' =>'Old Heritage Area',
                
            ]
            
            ];
        \App\Models\ClassType::insert($data);
    }
}
