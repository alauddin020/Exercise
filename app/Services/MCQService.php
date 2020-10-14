<?php


namespace App\Services;


use App\Question;
use App\QuestionOption;
use App\Quiz;

class MCQService
{
    public static function mcq($quiz,$request)
    {
        $option1 = $request->input('option1');
        $option2 = $request->input('option2');
        $option3 = $request->input('option3');
        $option4 = $request->input('option4');
        $correct=1;
        foreach ($request->question_text as $key=>$text)
        {
            try {
                $question= new Question();
                $question->name=trim($text);
                $question->quiz_id=$quiz->id;
                $question->save();

                $questionsoption= new QuestionOption();
                $questionsoption->question_id=$question->id;
                $questionsoption->option= trim($option1[$key]);
                if($request->input('correct'.$correct)==1)
                    $questionsoption->correct=1;
                else
                    $questionsoption->correct=0;
                $questionsoption->save();


                $questionsoption= new QuestionOption();
                $questionsoption->question_id=$question->id;
                $questionsoption->option= trim($option2[$key]);
                if($request->input('correct'.$correct)==2)
                    $questionsoption->correct=1;
                else
                    $questionsoption->correct=0;
                $questionsoption->save();


                $questionsoption= new QuestionOption();
                $questionsoption->question_id=$question->id;
                $questionsoption->option= trim($option3[$key]);
                if($request->input('correct'.$correct)==3)
                    $questionsoption->correct=1;
                else
                    $questionsoption->correct=0;
                $questionsoption->save();

                $questionsoption= new QuestionOption();
                $questionsoption->question_id=$question->id;
                $questionsoption->option= trim($option4[$key]);
                if($request->input('correct'.$correct)==4)
                    $questionsoption->correct=1;
                else
                    $questionsoption->correct=0;
                $questionsoption->save();
                $correct++;
            }catch (\Exception $e){Quiz::destroy($quiz->id);return $e->getMessage();}
        }

    }
}
