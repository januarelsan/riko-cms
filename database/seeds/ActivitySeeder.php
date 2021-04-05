<?php

use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
               

        DB::table('activities')->insert([
            'title' => "Player Login",
            'description' => "Player Login",            
        ]);

        DB::table('activities')->insert([
            'title' => "Player Answer Quiz",
            'description' => "Player Answer Quiz",            
        ]); 

        DB::table('activities')->insert(['title' => "Player Finish Mission 1", ]);
        DB::table('activities')->insert(['title' => "Player Finish Mission 2", ]);
        DB::table('activities')->insert(['title' => "Player Finish Mission 3", ]);
        DB::table('activities')->insert(['title' => "Player Finish Mission 4", ]);
        DB::table('activities')->insert(['title' => "Player Finish Mission 5", ]);

        DB::table('activities')->insert(['title' => "Player Finish Mission 6", ]);
        DB::table('activities')->insert(['title' => "Player Finish Mission 7", ]);
        DB::table('activities')->insert(['title' => "Player Finish Mission 8", ]);
        DB::table('activities')->insert(['title' => "Player Finish Mission 9", ]);
        DB::table('activities')->insert(['title' => "Player Finish Mission 10", ]);

        DB::table('activities')->insert(['title' => "Player Finish Mission 11", ]);
        DB::table('activities')->insert(['title' => "Player Finish Mission 12", ]);
        DB::table('activities')->insert(['title' => "Player Finish Mission 13", ]);
        DB::table('activities')->insert(['title' => "Player Finish Mission 14", ]);
        DB::table('activities')->insert(['title' => "Player Finish Mission 15", ]);

        DB::table('activities')->insert(['title' => "Player Finish Mission 16", ]);
        DB::table('activities')->insert(['title' => "Player Finish Mission 17", ]);
        DB::table('activities')->insert(['title' => "Player Finish Mission 18", ]);
        DB::table('activities')->insert(['title' => "Player Finish Mission 19", ]);
        DB::table('activities')->insert(['title' => "Player Finish Mission 20", ]);

        DB::table('activities')->insert(['title' => "Player Finish Mission 21", ]);
        DB::table('activities')->insert(['title' => "Player Finish Mission 22", ]);
        DB::table('activities')->insert(['title' => "Player Finish Mission 23", ]);
        DB::table('activities')->insert(['title' => "Player Finish Mission 24", ]);
        DB::table('activities')->insert(['title' => "Player Finish Mission 25", ]);
    }
}
