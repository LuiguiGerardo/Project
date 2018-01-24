<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sucursales')->insert(
        	array(
        		array(
        			'direccion'=>'Urb El Bosque',
        			'id_ciudad'=>1,        			
        			'created_at'=>Carbon::now(),
        			'updated_at'=>Carbon::now()
        		),
        		array(
        			'direccion'=>'Urb Los Cedros',
        			'id_ciudad'=>1,       			
        			'created_at'=>Carbon::now(),
        			'updated_at'=>Carbon::now()
        		)        		
        	)
        );
    }
}
