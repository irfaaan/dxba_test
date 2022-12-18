<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Answer;
use App\Models\Question;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Question::factory(35)->create()->each(function ($question) {
            Answer::factory()->create(['question_id' => $question->id]);
        });
    }
}
