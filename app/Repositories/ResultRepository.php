<?php

namespace App\Repositories;

use App\Interfaces\ResultRepositoryInterface;
use App\Models\Result;


class ResultRepository implements ResultRepositoryInterface
{


    public function getResult()
    {

        $response =  Result::where('user_id','=',getUserID())
            ->orderBy('created_at','DESC')
            ->first();


        return $response;
    }



}
