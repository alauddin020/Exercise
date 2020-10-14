<?php

use App\Question;
use App\QuestionOption;
use App\Quiz;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class QuizSeeder extends Seeder
{
    public function run()
    {
        $quizzes = [
        'After you have cooled a burn, what everyday item can you use to cover it?',
        'If a child cuts his hand and it is bleeding a lot. You should...',
        'The ABCs of first aid are...',
        'If a child is having a seizure, you should...',
        'Your child\'s nose is bleeding. You should...',
        'If a child is bitten by a dog, he may need...',
        'If a child had a severe anaphylactic reaction to a bee sting. You should...',
        'Your child touches a hot surface and you think he has a first degree burn. What should you do?',
        'A bite from which of the following animals puts your child at risk of getting rabies',
        'While playing, a child falls backwards and lands on his outstretched wrist. It isn\'t very swollen, but it hurts when you touch or move it. You should...',
        'A child falls and hits his head. He is most at risk for a serious injury if...',
        'Which of the following is a classic sign of dehydration?',
        'Your child burns his arm and the area of skin is red and blistered. This is likely a...',
        'A honey bee stings a child. You should...',
        'Which of the following should be in a first aid kit for a child?',
        'How should you open the airway of an unconscious casualty?',
        'How long would you check to see if an unconscious casualty is breathing normally?',
        'You are a lone first aider and have an unconscious non-breathing adult, what should you do first?',
        'Which is the correct ratio of chest compressions to rescue breaths for use in CPR of an adult casualty?',
        'Which of the following is the correct sequence for the chain of survival? '];
        $option1 = [
            'Kitchen foil',
            'Wrap a tourniquet',
            'Airway, Blood and Circulation',
            'Start CPR',
            'Rush him to the hospital',
            'Antibiotics',
            'Have an EpiPen available',
            'Put ice on the burn',
            'A rat',
            'Call your doctor',
            'He falls from a height',
            'Crying',
            '1st degree burn',
            'Try to scrape the stinger out',
            'Aspirin in case he has a febrile seizure',
            'Head tilt and chin lift.',
            'No more than 10 seconds.',
            'Start CPR with 30 chest compressions.',
            '2 compressions: 30 rescue breaths.',
            '911/112. CPR. Defibrillation. Advanced care'
];
        $option2 = [
            'Cling film',
    'Put his hand below his heart',
    'Airway, Breathing and Circulation',
    'Hold his hand firmly',
    'Tilt his head back until it stops',
    'Rabies shots',
    'Have Benadryl available',
    'Run cool water over the burned area',
    'A dog',
    'Just put ice on it',
    'He falls onto a hard floor',
    'Weight gain',
    '2nd degree burn',
    'Pull the stinger out right away',
    'gauze and bandages in case he cuts himself',
    'Jaw thrust.',
    'Approximately 10 seconds',
    'Give five initial rescue breaths',
    '5 compressions: 1 rescue breath',
    'CPR. Defibrillation. 911/112. Advanced care.'

        ];
        $option3 = [
        'Cotton wool',
        'Place a sterile gauze and Pressure on it',
        'Airway, Bleeding and Choking',
        'Place something in his mouth',
        'lean forward and pinch the bottom of his nose shut',
        'A tetanus shot',
        'Use an insect repellent with 100% DEET',
        'Apply oil on the burn',
        'A bat',
        'Just wrap it',
        'He passes out briefly',
        'Weight loss',
        '3rd degree burn',
        'Place ice or a paste of baking soda and water on the sting',
        'a mercury thermometer in case he has a fever',
        'Head tilt and jaw thrust.',
        'Exactly 10 seconds',
        'Call 911/112 requesting AED (defibrillator) and ambulance',
        '15 compressions: 2 rescue breaths',
        'Defibrillation. CPR. 911/112. Advanced care

        '];
        $option4 = [
        'All of them',
        'All of the above',
        'Airway, Breathing and Compressions',
        'None of the above',
        'Place ice on the bridge of his nose ',
        'All of the above',
        'Never let him go outside',
        'Nothing. It is only a first degree burn',
        'Both b & c',
        'Just keep it elevated',
        'He falls onto a soft floor',
        'Increased urination',
        '4th degree burn',
        'both a and c',
        'all of the above',
        'Lift the chin',
        'At least 10 seconds.',
        'Give two initial rescue breaths',
        '30 compressions: 2 rescue breaths.',
        'Defibrillation. 911/112. CPR. Advanced care.'
        ];
        $quiz = new Quiz();
        $quiz->name = 'quiz';
        $quiz->points = 1;
        $quiz->save();
        foreach ($quizzes as $key=>$text)
        {
            try {
                $question= new Question();
                $question->name=$text;
                $question->quiz_id=1;
                $question->save();

                $questionsoption= new QuestionOption();
                $questionsoption->question_id=$question->id;
                $questionsoption->option= $option1[$key];
                $questionsoption->correct=rand(0,1);;
                $questionsoption->save();


                $questionsoption= new QuestionOption();
                $questionsoption->question_id=$question->id;
                $questionsoption->option= $option2[$key];
                $questionsoption->correct=rand(0,1);;
                $questionsoption->save();


                $questionsoption= new QuestionOption();
                $questionsoption->question_id=$question->id;
                $questionsoption->option= $option3[$key];
                    $questionsoption->correct=rand(0,1);;
                $questionsoption->save();

                $questionsoption= new QuestionOption();
                $questionsoption->question_id=$question->id;
                $questionsoption->option= $option4[$key];
                    $questionsoption->correct=rand(0,1);
                $questionsoption->save();
            }catch (\Exception $e){return $e->getMessage();}
        }
    }
}
