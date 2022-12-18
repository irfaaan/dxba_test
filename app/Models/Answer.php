<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['question_id','opt_1','opt_2','opt_3','opt_4','correct_ans'];

    function question()
    {
        return $this->belongsTo(Question::class);
    }
}
