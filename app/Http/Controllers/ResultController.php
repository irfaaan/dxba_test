<?php

namespace App\Http\Controllers;

use App\Interfaces\ResultRepositoryInterface;
use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    protected  $resultRepository;

    public function __construct(ResultRepositoryInterface $resultRepository)
    {
        $this->resultRepository = $resultRepository;
    }

    function index(){

        $result = $this->resultRepository->getResult();

       return view("result.index", ['result' => $result]);
    }

}
