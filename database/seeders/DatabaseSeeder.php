<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Enrollment;
use App\Models\Payment;
use App\Models\Certificate;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1) مبدئياً: اعمل شوية يوزرز
        $instructors = User::factory()->count(5)->create();   // مدرسين
        $students    = User::factory()->count(50)->create();  // طلاب

        // 2) اعمل 10 كورسات وربط كل كورس بمدرس عشوائي
$courses = Course::factory()->count(10)->create()->each(function ($course) use ($instructors, $students) {
            $course->teacher_id = $instructors->random()->id;
            $course->save();

            // 2.a) لكل كورس: اعمل 8 دروس
            Lesson::factory()->count(8)->for($course)->create();

            // 2.b) لكل كورس: اعمل 2 امتحان
            $exams = Exam::factory()->count(2)->for($course)->create();

            // 2.c) لكل امتحان: 10 أسئلة ولكل سؤال 4 إجابات
            $exams->each(function ($exam) {
                Question::factory()->count(10)->for($exam)->create()->each(function ($question) {
                    $answers = collect([
                        ['answer_text' => 'Choice A', 'is_correct' => false],
                        ['answer_text' => 'Choice B', 'is_correct' => false],
                        ['answer_text' => 'Choice C', 'is_correct' => false],
                        ['answer_text' => 'Choice D', 'is_correct' => true ],
                    ])->shuffle()->all();

                    $question->answers()->createMany($answers);
                });
            });

            // 2.d) سجّل 12 طالب عشوائي في كل كورس
            $picked = $students->random(12);
            foreach ($picked as $student) {
                $enrollment = Enrollment::firstOrCreate([
                    'user_id' => $student->id,
                    'course_id' => $course->id,
                ], [
                    'enrolled_at' => now(),
                ]);

                // 80% مدفوعات Paid والباقي Pending
                $paid = fake()->boolean(80);
                Payment::create([
                    'enrollment_id' => $enrollment->id,
                    'amount' => $course->price,
                    'status' => $paid ? 'paid' : 'pending',
                    'payment_method' => $paid ? fake()->randomElement(['visa','vodafone_cash','fawry']) : null,
                ]);

                // 30% منهم ياخد شهادة (لو مدفوع)
                if ($paid && fake()->boolean(30)) {
                    Certificate::create([
                        'user_id' => $student->id,
                        'course_id' => $course->id,
                        'certificate_url' => 'https://example.com/certificates/'.uniqid(),
                        'issued_at' => now(),
                    ]);
                }
            }
        });

        // Admin واحد يدير الـ Dashboard
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);
    }
}
