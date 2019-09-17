<?php

use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'admin',
            'password'=> bcrypt('admin'),
            'email' => 'admin@gmail.com',
            'admin' => 1,
            'avatar' =>asset('avatars/avatar.png')
        ]);



        App\User::create([
            'name' => 'Andrew Mills',
            'password'=> bcrypt('password'),
            'email' => 'andrew@gmail.com',
            'avatar' =>asset('avatars/avatar.png')
        ]);

    }
}
