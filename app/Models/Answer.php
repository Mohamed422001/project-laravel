<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // ✅ استدعاء HasFactory
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory; // ✅ تفعيل HasFactory

    protected $fillable = [
        'question_id',
        'answer_text',   // ✅ خليتها نفس اللي في الفاكتوري
        'is_correct',
    ];

    // الإجابة بتتبع سؤال
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
