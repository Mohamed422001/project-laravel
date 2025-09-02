<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // ✅
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory; // ✅

    protected $fillable = [
        'course_id',
        'user_id',
        'certificate_url',
        'issued_at', // ✅ عشان متسجّل في Seeder
    ];

    // الشهادة بتتبع كورس
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    // الشهادة بتتبع يوزر
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
