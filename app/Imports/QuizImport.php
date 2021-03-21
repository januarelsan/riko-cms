<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Quiz;
use App\Option;

class QuizImport implements ToModel, WithHeadingRow
{
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        if(isset($row['code'], $row['question'], $row['correct_option'])){
            
            $optionKeys = array("option_a", "option_b", "option_c", "option_d");                        
            $quiz = Quiz::where('code', $row['code'])->first();

            if(isset($quiz)){
                
                $quiz->question = $row['question'];        

                for ($i=0; $i < 4; $i++) { 
                    
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
                    
                    if (isset($row[$optionKeys[$i]])) { 
                        
                        if (isset($quiz->options[$i])) { 

                            $quiz->options[$i]->value = $row[$optionKeys[$i]];
                            $quiz->options[$i]->correct_option = 0;
                            if($correct_option == $i){
                                $quiz->options[$i]->correct_option = 1;
                            }
                            $quiz->options[$i]->save();
                        }else {
                            $option = new Option([
                                'quiz_id'=> $quiz->id,                        
                                'value'     => $row[$optionKeys[$i]],                        
                                'correct_option'=> 0,                        
                            ]); 
                            if($correct_option == $i){
                                $option->correct_option = 1;
                            }
                            $option->save();
                        }
                    } else {
                        
                        if (isset($quiz->options[$i])) { 
                            $quiz->options[$i]->value = null;
                            $quiz->options[$i]->correct_option = 0;
                            $quiz->options[$i]->save();
                        }
                    }
    
    
                }            
                
                $quiz->save();
    
            } else {
                $quiz = new Quiz([
                    'code' => $row['code'],                        
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

    

    

    
}
