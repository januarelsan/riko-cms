<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Quiz;
use App\Option;

class QuizImportFour implements ToModel, WithHeadingRow
{
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if(isset($row['question'], $row['option_a'], $row['option_b'], $row['option_c'], $row['option_d'], $row['correct_option'])){
            // return dd($row);
            
            $optionKeys = array("option_a", "option_b", "option_c", "option_d");                        
        
            $quiz = new Quiz([                
                'question' => $row['question'],                        
                'removed'  => 0,                        
            ]);
            
            $quiz->save();            

            for ($i=0; $i < 4; $i++) { 
                if (isset($row[$optionKeys[$i]])) {                        
                    $option = new Option([
                        'quiz_id'=> $quiz->id,                        
                        'value'     => $row[$optionKeys[$i]],                        
                        'correct_option'=> 0,                        
                    ]);     
                    $correct_option = 0;
                    switch (strtoupper($row['correct_option'])) {
                        case "A":
                            $correct_option = 0;
                            break;
                        case "B":
                            $correct_option = 1;
                            break;
                        case "C":
                            $correct_option = 2;
                            break;
                        case "D":
                            $correct_option = 3;
                            break;
                    }
                    if($correct_option == $i){
                        $option->correct_option = 1;
                    }
                    $option->save();
                }
            }
        
        }

    }

    

    

    
}
