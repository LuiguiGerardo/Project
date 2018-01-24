<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
        	array(
        		array(
        			'name'=>'LuiguiG',
        			'email'=>'luiguies.20@gmail.com',  
        			'password'=>bcrypt('123456'),
        			'remember_token' => str_random(10),
        			'id_personal'=>1,          			
        			'created_at'=>Carbon::now(),
        			'updated_at'=>Carbon::now()
        		),
        		array(
        			'name'=>'YsabelC',
        			'email'=>'ysaca@gmail.com',  
        			'password'=>bcrypt('123456'),
        			'remember_token' => str_random(10),
        			'id_personal'=>2,          			
        			'created_at'=>Carbon::now(),
        			'updated_at'=>Carbon::now()
        		),         		          		
        	)
        );
    }
}
