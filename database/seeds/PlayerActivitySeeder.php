<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


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
            'player_firebase_uuid' => "XuhyPYN9C9Xrv9EQy7280mAe4qj2",
            'activity_id' => 1,            
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        // DB::table('player_activities')->insert([
        //     'player_firebase_uuid' => "XuhyPYN9C9Xrv9EQy7280mAe4qj2",
        //     'activity_id' => 2,            
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]); 
        // DB::table('player_activities')->insert([
        //     'player_firebase_uuid' => "XuhyPYN9C9Xrv9EQy7280mAe4qj2",
        //     'activity_id' => 2,            
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]); 
        // DB::table('player_activities')->insert([
        //     'player_firebase_uuid' => "XuhyPYN9C9Xrv9EQy7280mAe4qj2",
        //     'activity_id' => 2,            
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        // ]); 
    }
}
