<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CiudadSeeder::class);
        $this->call(CargoSeeder::class);
        $this->call(SucursalSeeder::class);
        $this->call(PersonalSeeder::class);
        $this->call(UserSeeder::class);
    }
}
