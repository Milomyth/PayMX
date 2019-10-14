<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\User::create([
          'full_name'     =>  'John Wick',
          'email'    =>  'localhost@localhost.com',
          'password' =>  bcrypt('1234')
        ]);
        App\User::create([
            'full_name'     =>  'El Vato',
            'email'    =>  'localhost1@localhost.com',
            'password' =>  bcrypt('1234')
          ]);
    }
}
