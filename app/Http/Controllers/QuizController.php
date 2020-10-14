<?php

namespace App\Http\Controllers;

use App\Question;
use App\Quiz;
use App\Services\MCQService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class QuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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

    public function saveToJson()
    {
        $name = Str::random();
        $quiz = Quiz::with(['question.option'])->get();
        $quiz = $this->json($quiz);
        Storage::disk('public')->put('json/'.$name.'.json', $quiz);
        return "/storage/json/$name.json";
    }

    public function show(Request $request,$id)
    {
        $quiz = Quiz::with(['question.option'])->findOrFail($id);
        if ($request->has('a'))
        {
            $quizF = new Quiz();
            $quizF->round = $quiz->name;
            $quizF->pointsAddedForCorrectAnswer = $quiz->name;
            $quizF->question = $this->map($quiz->question);
            $name = Str::random();
            Storage::disk('public')->put('json/'.$name.'.json', $quizF);
            $file =  public_path()."/storage/json/$name.json";
            return response()->download($file)->deleteFileAfterSend();
        }
        return view('quiz.view',compact('quiz'));
    }


    public function edit($id)
    {
        $quiz = Quiz::with('question.option')->findOrFail($id);
        return view('quiz.edit',compact('quiz'));
    }

    public function update(Request $request,$id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->name = $request->name;
        $quiz->points = $request->positive_marks;
        $quiz->save();
        Question::where('quiz_id',$id)->forceDelete();
        MCQService::mcq($quiz,$request);
        return redirect()->back()->with('fa','Quiz Updated Successfully');
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

    public function json($data)
    {
       return $data->map(function ($data) {
            return [
                'round' => $data->name,
                'pointsAddedForCorrectAnswer' => $data->points,
                'question' => $this->map($data->question)
            ];
        });
    }

    public function map($data)
    {
        return $data->map(function ($a) {
            return [
                'questionText' => $a->name,
                'option' => $a->option->map(function ($b) {
                    return [
                        'answerText' => $b->option,
                        'isCorrect' => $b->correct == 1 ? true : false,
                    ];
                })
            ];
        });
    }
}
