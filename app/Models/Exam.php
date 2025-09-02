<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // ✅
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory; // ✅

    protected $fillable = [
        'course_id',
        'lesson_id',
        'title',
    ];

    // الامتحان بيتبع كورس
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // الامتحان بيتبع درس (اختياري لو الامتحان مربوط بدرس)
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    // الامتحان له أسئلة
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
