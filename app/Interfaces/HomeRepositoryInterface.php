<?php

namespace App\Interfaces;

interface HomeRepositoryInterface
{

    public function getNextQuestion();
    public function getCurrentQuestion();
    public function saveResults();
    public function checkAns(array $detail);


}
