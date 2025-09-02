<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // ✅
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory; // ✅

    protected $fillable = [
        'course_id',
        'title',
        'content',
    ];

    // الدرس بيتبع كورس
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // الدرس له امتحانات
    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
}
