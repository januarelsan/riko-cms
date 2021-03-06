<?php

use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('players')->insert([
            'name' => 'Januar',                        
            'firebase_uuid' => 'XuhyPYN9C9Xrv9EQy7280mAe4qj2',
            'email' => 'januarelsan@gmail.com',            
        ]);
    }
}
