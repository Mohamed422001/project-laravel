<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // ✅
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory; // ✅

    protected $fillable = [
        'exam_id',
        'text',
    ];

    // السؤال بيتبع امتحان
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    // السؤال له إجابات
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
