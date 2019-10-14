<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\Role::create([
          'name'     =>  'Super User',
          'slug'     =>  'super-user',
        ]);
      App\Role::create([
          'name'     =>  'Administrador',
          'slug'     =>  'administrador',
        ]);
      App\Role::create([
          'name'     =>  'Cliente',
          'slug'     =>  'cliente',
        ]);


    }
}
