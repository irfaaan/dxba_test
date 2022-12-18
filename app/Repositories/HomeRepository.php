<?php

namespace App\Repositories;

use App\Interfaces\HomeRepositoryInterface;
use App\Models\Question;
use App\Models\Result;
use App\Traits\HomeTrait;
use Illuminate\Support\Facades\Cache;


class HomeRepository implements HomeRepositoryInterface
{

    use HomeTrait;


    public function getNextQuestion()
    {
        $current_question = $this->getCurrentQuestion();
        $response = [
            'question_no' =>  $this->getQuizMeta()["index"] + 1,
            'question' => $current_question->question,
            'opt_1' => $current_question->answers->opt_1,
            'opt_2' => $current_question->answers->opt_2,
            'opt_3' => $current_question->answers->opt_3,
            'opt_4' => $current_question->answers->opt_4,
        ];

        return $response;
    }

    public function checkAns(array $detail){
        $ans = $detail['answer'];
        if ($ans == $this->getCurrentQuestion()->answers->correct_ans)
            $this->setAns('correct');
        else
            $this->setAns('wrong');
    }


    public function saveResults(){

        $result = $this->getQuizMeta();
        unset($result['index']);
        $result['user_id'] = getUserID();

        Result::create($result);
        $this->flushCache();
    }


    public function getCurrentQuestion(){
        Cache::rememberForever('user_quiz_' . getUserID(), function () {
            return Question::getTenRandQuesWithAns();
        });
        Cache::rememberForever('user_result_' . getUserID(), function () {
            return [
                "index" => 0,
                "correct" => 0,
                "wrong" => 0,
                "skipped" => 0
            ];
        });

        $questions = Cache::get('user_quiz_'.getUserID());

        return $questions[$this->getQuizMeta()["index"]];
    }
}
