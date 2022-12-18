<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

trait HomeTrait {

    /**
     * This function will set cache result data.
     */
    private function setQuizMeta($result){
        return Cache::forever('user_result_'.getUserID(),$result);
    }

    /**
     * This function will update result in cache
     * @return void
     */
    public function setAns($ans){

        $result = $this->getQuizMeta();
        switch ($ans)
        {
            case 'correct':
                $result['correct']++;
                break;
            case 'wrong':
                $result['wrong']++;
                break;
            case 'skipped':
                $result['skipped']++;
                break;
        }

        $result['index']++;
        $this->setQuizMeta($result);
    }

    /**
     * This function will return json respose to ajax calls
     * @return JsonResponse
     */
    public function sendJsonResoponse()
    {
        if ($this->isQuizEnded()) {
            $this->saveResults();
            return response()->json(['success' => true, 'is_ended' => true, 'meta' => $this->getQuizMeta()]);
        }

        return response()->json(['success' => true, 'is_ended' => false, 'meta' => $this->getQuizMeta()]);
    }

    /**
     * This function will get cache result data.
     */

    private function getQuizMeta(){
        return Cache::get('user_result_'.getUserID());
    }

    public function flushCache(){
        Cache::forget('user_quiz_'.getUserID());
        Cache::forget('user_result_'.getUserID());
    }

    public function skipQuestion()
    {
        $this->setAns('skipped');
        return $this->sendJsonResoponse();
    }

    public function isQuizEnded()
    {
        return $this->getQuizMeta()["index"] >= 10;
    }

}