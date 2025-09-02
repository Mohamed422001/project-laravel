<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // ✅
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory; // ✅

    protected $fillable = [
        'title',
        'description',
        'duration',
        'teacher_id',
        'price',
    ];

    // العلاقة مع المدرس (User)
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    // العلاقة مع الدروس
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    // العلاقة مع الامتحانات
    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    // العلاقة مع الطلاب (عبر Enrollments)
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}

