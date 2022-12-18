<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckAnswerRequest;
use App\Interfaces\HomeRepositoryInterface;
use App\Models\Question;
use App\Models\Result;
use App\Traits\HomeTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    use HomeTrait;

    protected  $homeRepository;

    public function __construct(HomeRepositoryInterface $homeRepository)
    {
        $this->homeRepository = $homeRepository;
    }

    public function test()
    {
        return view('test.index');
    }

    public function getNextQuestion()
    {
        $response = $this->homeRepository->getCurrentQuestion();

        return response()->json($response);
    }

    public function checkAns(CheckAnswerRequest $request)
    {
        $this->homeRepository->checkAns($request->only('answer'));

        return $this->sendJsonResoponse();
    }


    /**
     * Save final results in database.
     * @return void
     */
    public function saveResults()
    {
        $this->homeRepository->saveResults();
    }


}
