<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(PurposeSeeder::class);
        $this->call(PropertyCategorySeeder::class);
        $this->call(ExteriorLookSeeder::class);
        $this->call(InteriorLookSeeder::class);
        $this->call(FacilityTableSeeder::class);
        $this->call(NearByFacilitySeeder::class);
        $this->call(EnvironmentSeeder::class);
        $this->call(ElevationSeeder::class);
        $this->call(AdvertisementTypeSeeder::class);
        $this->call(ClassTypeSeeder::class);
        $this->call(PropertyStatusSeeder::class);
        $this->call(RoleSeeder::class);
    }
}
