<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *  Ambos seeder están comentados porque hay que lanzar primero el de usuarios y después el de contactos, pues sino nos daría un error de foreign key.
     * @return void
     */
    public function run()
    {
        
        Model::unguard();//bloquea para tener acceso exclusivo.

        //$this->call(UserTableSeeder::class);
        $this->call(ContactTableSeeder::class);

		Model::reguard();//desbloquea para que todos puedan acceder.
    }
}
