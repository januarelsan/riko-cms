<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use App\Option;

class QuizController extends Controller
{
    //
    
    public function list(){        
        $quizzes = Quiz::all();
        return view('quiz-list', compact('quizzes'));
    }
    public function form(){        
        
        return view('quiz-form');
    }

    public function store(Request $request){        
        
        $reqArray = $request->all();       
        $keys = array_keys($reqArray);

        $data = [
            'question' => $request->question,            
        ];

        $quiz = Quiz::create($data);

        for ($i=2; $i < count($keys) - 1; $i++) { 
            $option = [
                'quiz_id' => $quiz->id,            
                'value' => $reqArray[$keys[$i]],            
                'correct_option' => 0,            
            ];    
            if($reqArray['correct_option'] == ($i - 2)){
                $option['correct_option'] = 1;                
            }
            
            Option::create($option);
        }
              
        return redirect()->back()->with('success', 'Question Added');   
    }
}
