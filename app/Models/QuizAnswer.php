<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class QuizAnswer extends Model
{


    use HasFactory;

    protected $fillable = [
        'answer',
        'is_correct',
        'quiz_id'
    ];



    public function quiz()
    {

        return $this->belongsTo(Quiz::class);
    }
}
