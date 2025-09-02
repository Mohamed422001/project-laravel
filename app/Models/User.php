<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // ----------------- Relations -----------------

    // المستخدم له تسجيلات في كورسات
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    // المستخدم له كورسات من خلال التسجيل (pivot enrollments)
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments')
                    ->withPivot('status', 'created_at'); // ✅ لو حابب تستفيد من بيانات الجدول الوسيط
    }

    // المستخدم له شهادات
    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    // المستخدم له مدفوعات (عبر التسجيلات)
    public function payments()
    {
        return $this->hasManyThrough(Payment::class, Enrollment::class);
    }
}
