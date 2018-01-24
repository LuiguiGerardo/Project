<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cargos')->insert(
        	array(
        		array(
        			'descripcion'=>'Admin',        			
        			'created_at'=>Carbon::now(),
        			'updated_at'=>Carbon::now()
        		),
        		array(
        			'descripcion'=>'Vendedor',        			
        			'created_at'=>Carbon::now(),
        			'updated_at'=>Carbon::now()
        		)        		
        	)
        );
    }
}
