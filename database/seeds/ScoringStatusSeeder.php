<?php

use Illuminate\Database\Seeder;

class ScoringStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('scoring_statuses')->insert([            
            'activated' => 0,            
        ]);

    }
}
