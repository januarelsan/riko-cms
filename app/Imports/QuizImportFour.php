<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Quiz;
use App\Option;

class QuizImportFour implements ToCollection, WithHeadingRow, WithValidation
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
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
    
    public function rules(): array
    {
        $this->validOptions=array('a', 'b', 'c', 'd', 'A', 'B' , 'C' , 'D' );

        return [
            'question' => 'required',            
            'option_a' => 'required',            
            'option_b' => 'required',            
            'option_c' => 'required',            
            'option_d' => 'required',            
            'correct_option' => 'required|in:' . implode(',', $this->validOptions),
        ];
    }

    /**
     * @return array
     */
    public function customValidationMessages()
    {
        return [
            'question.required' => 'Question Field is Required',
            'option_a.required' => 'Option A Field is Required',
            'option_b.required' => 'Option B Field is Required',
            'option_c.required' => 'Option C Field is Required',
            'option_d.required' => 'Option D Field is Required',
            'correct_option.required' => 'Correct Option Field is Required',
            'correct_option.in' => 'Correct Option Field is Invalid.',
        ];
    }
}
