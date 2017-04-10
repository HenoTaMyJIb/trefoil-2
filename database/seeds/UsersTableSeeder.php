<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           'name' => 'Aljona Orlova',
           'email' => 'aljona.orlova@gmail.com',
           'password' => bcrypt(env('ROOT_PASSWORD')),
       ]);


       DB::table('users')->insert([
          'name' => 'Olga Gogoladze',
          'email' => 'sktrefoil@gmail.com',
          'password' => bcrypt(env('ROOT_PASSWORD')),
      ]);
    }
}
