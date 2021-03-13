<?php

use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();    
        for ($i=0; $i < 25; $i++) { 
            # code...
            DB::table('quizzes')->insert([            
                'question' => $faker->realText($maxNbChars = 50, $indexSize = 2),    
            ]);

            $rand = rand(0,1);
            $optionCount = 0;
            $correct_option = 0;
            if($rand == 0){
                $correct_option = rand(0,1);
                $optionCount = 2;
            } else {
                $optionCount = 4;
                $correct_option = rand(0,3);
            }

            for ($j=0; $j < $optionCount; $j++) { 
                
                if ($correct_option == $j) {                    
                    $option = DB::table('options')->insert([            
                        'quiz_id' => $i + 1,
                        'value' => 'benar ' . $faker->realText($maxNbChars = 20, $indexSize = 2),    
                        'correct_option' => 1,
                    ]);
                } else {
                    $option = DB::table('options')->insert([            
                        'quiz_id' => $i + 1,
                        'value' => $faker->realText($maxNbChars = 20, $indexSize = 2),    
                        'correct_option' => 0,
                    ]);
                }
            }
        }
        
    }
}
