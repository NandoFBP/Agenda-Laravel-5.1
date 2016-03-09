<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //nuevo objeto faker, para insertar en masa
        $faker = Faker::create('en_US');    

        for ($i=0; $i < 50 ; $i++) { 
        
     	//inserta y devuelveme el id.
        	$id = \DB::table('contacts')->insertGetId([
	        	'firstName' => $faker->firstName,
	        	'lastName'  => $faker->lastName,
	        	'phone'     => $faker->PhoneNumber,
	        	'address'   => $faker->address,
	        	'category'  => $faker->randomElement(['work', 'family', 'friends']),
	        	'email'     => $faker->email,
	        	//'user_id'   => $faker->numberBetween($min = 1, $max = 9), 
                'user_id'   => 2, 
	        	'created_at'=> date('YmdHms')   	
        	]);

        }
    }
}
