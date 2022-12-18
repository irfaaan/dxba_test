<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Result extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','correct','wrong','skipped'];

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
