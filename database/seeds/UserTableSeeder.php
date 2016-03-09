<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //nuevo objeto faker, para insertar en masa
        $faker = Faker::create('es_ES');

        for ($i=0; $i < 10 ; $i++) { 
        
     	//inserta y devuelveme el id.
        	$id = \DB::table('users')->insertGetId([
	        	'firstName' => $faker->firstName,
	        	'lastName'  => $faker->lastName,
	        	'email'     => $faker->unique()->email,//email que no se haya generado antes
	        	'password'  => \Hash::make(123456), 
	        	'created_at'=> date('YmdHms'),   	
	        	'remember_token'     => md5(date('YmdHms'))

        	]);

        }
    }
}
