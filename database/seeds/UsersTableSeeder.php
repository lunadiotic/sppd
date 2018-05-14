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
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'role' => 'admin',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'Finance',
                'email' => 'finance@mail.com',
                'role' => 'finance',
                'password' => bcrypt('password')
            ],
        ];
        \DB::table('users')->insert($user);
    }
}
