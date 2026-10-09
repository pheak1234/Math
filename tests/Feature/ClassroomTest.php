<?php

namespace Tests\Feature;

use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClassroomTest extends TestCase
{
    use RefreshDatabase;

    public function test_classes_page_loads_successfully_with_teachers_and_classrooms(): void
    {
        $teacher = Teacher::create([
            'name' => 'លោកគ្រូ វ៉ាសនា',
            'avatar' => '/images/teacher_vasna.png',
            'subject' => 'គណិតវិទ្យា',
            'bio' => 'សាស្ត្រាចារ្យគណិតវិទ្យាដែលមានបទពិសោធន៍បង្រៀនជាង ១០ ឆ្នាំ។',
            'education' => 'បរិញ្ញាបត្រជាន់ខ្ពស់គណិតវិទ្យា (RUPP)',
            'phone' => '012 345 678',
            'telegram' => '@vasnamath',
        ]);

        $classroom = Classroom::create([
            'teacher_id' => $teacher->id,
            'code' => 'ថ្នាក់ រ136',
            'title' => 'គណិតវិទ្យាវិភាគ និងធរណីមាត្រ',
            'room' => 'បន្ទប់ រ136 (អាគារ C)',
            'grade_level' => 'ថ្នាក់ទី១២',
            'schedule' => 'ចន្ទ - សុក្រ (08:00 - 10:00 ព្រឹក)',
            'capacity' => 35,
            'enrolled_count' => 32,
            'status' => 'open',
        ]);

        $response = $this->get(route('classes.index'));

        $response->assertStatus(200);
        $response->assertSee('ថ្នាក់បង្រៀន');
        $response->assertSee('លោកគ្រូ វ៉ាសនា');
        $response->assertSee('View Profile');
        $response->assertSee('ថ្នាក់ រ136');
        $response->assertViewHas('teachers', function ($teachers) use ($teacher) {
            return $teachers->contains($teacher);
        });
    }

    public function test_show_classroom_returns_json_when_requested(): void
    {
        $teacher = Teacher::create([
            'name' => 'លោកគ្រូ វ៉ាសនា',
            'subject' => 'គណិតវិទ្យា',
        ]);

        $classroom = Classroom::create([
            'teacher_id' => $teacher->id,
            'code' => 'ថ្នាក់ រ136',
            'title' => 'គណិតវិទ្យាវិភាគ',
            'room' => 'បន្ទប់ រ136',
            'grade_level' => 'ថ្នាក់ទី១២',
            'schedule' => '08:00 - 10:00',
            'capacity' => 30,
            'enrolled_count' => 20,
            'status' => 'open',
        ]);

        $response = $this->getJson(route('classes.show', $classroom));

        $response->assertStatus(200);
        $response->assertJson([
            'id' => $classroom->id,
            'code' => 'ថ្នាក់ រ136',
            'teacher' => [
                'name' => 'លោកគ្រូ វ៉ាសនា',
            ],
        ]);
    }
}
