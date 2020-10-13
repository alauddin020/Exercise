<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Services\MCQService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class QuizController extends Controller
{

    public function index()
    {
       $quizzes = Quiz::with('question.option')->get();
       return view('quiz.index',compact('quizzes'));
    }

    public function create()
    {
       return view('quiz.create');
    }
    public function store(Request $request)
    {
        if ($request->ajax())
        {
            return $this->saveToJson();
        }
        $request->validate([
            'name'=>'required|min:2|max:255',
            'positive_marks'=>'required',
        ]);
        $quiz = new Quiz();
        $quiz->name = $request->name;
        $quiz->points = $request->positive_marks;
        $quiz->save();
        MCQService::mcq($quiz,$request);
        return redirect()->back()->with('fa','Quiz Create Successfully');
    }

    public function import(Request $request)
    {

    }
    public function saveToJson()
    {
        $name = Str::random();
         $quiz = Quiz::with(['question.option'])->get()->map(function ($data){
            return [
                'round' => $data->name,
                'pointsAddedForCorrectAnswer' => $data->points,
                'question' => $data->question->map(function ($a){
                    return [
                        'questionText' => $a->name,
                        'option' => $a->option->map(function ($b){
                            return [
                                'answerText' => $b->option,
                                'isCorrect' => $b->correct==1 ? true : false,
                            ];
                        })
                    ];
                })
            ];
        });

        Storage::disk('public')->put('json/'.$name.'.json', $quiz);
        return "/storage/json/$name.json";
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Quiz::destroy($id);
    }
}
