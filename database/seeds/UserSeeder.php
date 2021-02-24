<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Superadmin',
            'role_id' => 1,
            'email' => 'superadmin'.'@gmail.com',
            'password' => Hash::make('qwerty123'),
        ]);
    }
}
