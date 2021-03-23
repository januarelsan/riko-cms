<?php

use Illuminate\Database\Seeder;

class PlayerActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('player_activities')->insert([
            'player_uuid' => "XuhyPYN9C9Xrv9EQy7280mAe4qj2",
            'activity_id' => 1,            
        ]); 
    }
}
