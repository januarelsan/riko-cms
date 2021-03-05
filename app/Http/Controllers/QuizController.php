<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use App\Option;
use App\Imports\QuizImport;
use Maatwebsite\Excel\Facades\Excel;

class QuizController extends Controller
{
    //
    
    public function list(){        
        $quizzes = Quiz::where('removed', '=', 0)->get();
        
    
        return view('quiz-list', compact('quizzes'));
    }
    public function form(){        
        
        return view('quiz-form');
    }

    public function editForm($id){        
        $quiz = Quiz::find($id);
        $options = Option::where('quiz_id', '=', $id)->get();
        // return $options;
        // return $quiz;
        return view('quiz-edit', compact('quiz','options'));
    }

    public function editStore(Request $request){        
        
        $reqArray = $request->all();       
        $keys = array_keys($reqArray);
        

        $quiz = Quiz::find($request->id);
        
        $quiz->question = $request->question;
        $quiz->save();

        $optionIndex = 0;
        for ($i=3; $i < count($keys) - 1; $i++) { 
            $options = Option::where('quiz_id', '=', $quiz->id)->get();
            $options[$optionIndex]->value = $reqArray[$keys[$i]];            
            if($reqArray['correct_option'] == ($i - 3)){
                $options[$optionIndex]->correct_option = 1;                
            }else{
                $options[$optionIndex]->correct_option = 0;                
            }

            $options[$optionIndex]->save();            
            $optionIndex++;
        }
        return redirect()->route('quiz.list')->with('message');
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
        
        return redirect()->back()->with('message','message');   
    }

    public function remove($id){        
        
        $quiz = Quiz::find($id);       
        $quiz->removed = 1;
        
        $quiz->save();        
              
        return redirect()->back()->with('message','message');   
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('quiz-import');
    }

    
    public function import() 
    {
        Excel::import(new QuizImport,request()->file('file'));
           
        return back();
    }
}
