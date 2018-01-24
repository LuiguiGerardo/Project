<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personals')->insert(
        	array(
        		array(
        			'nombre'=>'Luigui',
        			'apellido'=>'Escalante Sanchez',
        			'dni'=>'48120850',
        			'fecha_nacimiento'=>'1993-11-20',
        			'direccion'=>'Urb. El Bosque Mnz C#8',
        			'sueldo'=>3000,
        			'telefono'=>'534836',
        			'sexo'=>'H',
        			'email'=>'luiguies.20@gmail.com',
        			'id_ciudad'=>1,
        			'id_sucursal'=>1,
        			'id_cargo'=>1,
        			'created_at'=>Carbon::now(),
        			'updated_at'=>Carbon::now()
        		),
        		array(
        			'nombre'=>'Ysabel',
        			'apellido'=>'Cabrera',
        			'dni'=>'78121853',
        			'fecha_nacimiento'=>'1990-09-10',
        			'direccion'=>'Buenos Aires',
        			'sueldo'=>3000,
        			'telefono'=>'323211',
        			'sexo'=>'M',
        			'email'=>'ysaca@gmail.com',
        			'id_ciudad'=>1,
        			'id_sucursal'=>1,
        			'id_cargo'=>2,
        			'created_at'=>Carbon::now(),
        			'updated_at'=>Carbon::now()
        		)        		
        	)
        );
    }
}
