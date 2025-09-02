<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // ✅
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory; // ✅

    protected $fillable = [
        'course_id',
        'user_id',
        'enrolled_at', // ✅ عشان بتسجله في Seeder
    ];

    // التسجيل بيتبع كورس
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // التسجيل بيتبع يوزر
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // التسجيل له مدفوعات
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
