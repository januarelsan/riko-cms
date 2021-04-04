<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Response;
use App\Quiz;
use App\Option;
use App\Activity;
use App\Player;
use App\PlayerActivity;
use App\PlayerQuizAnswer;

use App\Imports\QuizImport;
use App\Imports\QuizImportFour;
use App\Exports\QuizExport;
use Maatwebsite\Excel\Facades\Excel;

class QuizController extends Controller
{
    //

    public function leaderboard(){        
        $players = Player::all();
                
        $players = $players->sortByDesc(function ($player) {
                    return $player->player_activities->sum('player_quiz_answer.option.correct_option');
                });
                
        return view('quiz-leaderboard', compact('players'));
    }

    public function export() 
    {
        return Excel::download(new QuizExport, 'Quiz.xlsx');
    }
    
    public function list(){        
        $quizzes = Quiz::all();                
        return view('quiz-list', compact('quizzes'));
    }

    public function form(){                
        return view('quiz-form');
    }    

    public function editForm($id){        
        $quiz = Quiz::find($id);
        $options = Option::where('quiz_id', '=', $id)->get();   

        $playerQuizAnswers = PlayerQuizAnswer::whereHas('option', function (Builder $query) use ($id) {
            $query->where('quiz_id', $id);
        })->get();

        return view('quiz-edit', compact('quiz','options','playerQuizAnswers'));
    }

    public function detail($id){        
        $quiz = Quiz::find($id);
        $options = Option::where('quiz_id', '=', $id)->get();   

        $playerQuizAnswers = PlayerQuizAnswer::whereHas('option', function (Builder $query) use ($id) {
            $query->where('quiz_id', $id);
        })->get();
        
        return view('quiz-detail', compact('quiz','options','playerQuizAnswers'));
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

    public function activate($id){        
        
        $quiz = Quiz::find($id);       
        $quiz->removed = 0;
        
        $quiz->save();        
              
        return redirect()->back();
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('quiz-import-form');
    }

    
    public function importTwoOption() 
    {                
        $validated = request()->validate([
            'file' => ['required', 'mimes:xlsx']      
            
        ]);                                        
        Excel::import(new QuizImport,request()->file('file'));                   
        return redirect()->back()->with('message','message');  
    }

    public function importFourOption() 
    {                
        $validated = request()->validate([
            'file' => ['required', 'mimes:xlsx']      
            
        ]);                                        
        Excel::import(new QuizImportFour,request()->file('file'));                   
        return redirect()->back()->with('message','message');  
    }

    public function downloadTwoTemplate(){

        $file = public_path()."/files/Quiz Two Option Template.xlsx";
        
        return response()->download($file);
    }

    public function downloadFourTemplate(){

        $file = public_path()."/files/Quiz Four Option Template.xlsx";        
        return response()->download($file);
    }
}
