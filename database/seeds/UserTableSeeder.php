<?php

use Illuminate\Database\Seeder;
use App\User;
//use Illuminate\Database\Factory\UserFactory;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Without factory
    /*  User::create([
          'name' => 'admin',
          'email' => 'admin@admin.com',
          'password' => bcrypt('password')
      ]);*/
      // With factory (only override the column you want to set with a value)
      /*  $user = factory(App\User::class)->make([
            'email' => 'some@email.com',
            'password' => bcrypt('password')
        ]);*/

        // Multiple with factory

        factory(App\User::class, 10)->create();
    }
}
