<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ciudades')->insert(
        	array(
        		array(
        			'descripcion'=>'Trujillo',        			
        			'created_at'=>Carbon::now(),
        			'updated_at'=>Carbon::now()
        		),
        		array(
        			'descripcion'=>'Chimbote',        			
        			'created_at'=>Carbon::now(),
        			'updated_at'=>Carbon::now()
        		),
        		array(
        			'descripcion'=>'Lima',        			
        			'created_at'=>Carbon::now(),
        			'updated_at'=>Carbon::now()
        		),
        		array(
        			'descripcion'=>'Cajamarca',        			
        			'created_at'=>Carbon::now(),
        			'updated_at'=>Carbon::now()
        		)            		
        	)
        );
    }
}
