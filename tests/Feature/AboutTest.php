<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Book;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\TeachingMaterial;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AboutTest extends TestCase
{
    use RefreshDatabase;

    public function test_about_page_loads_successfully_with_stats_and_teachers(): void
    {
        $teacher = Teacher::create([
            'name' => 'លោកគ្រូ វ៉ាសនា',
            'subject' => 'គណិតវិទ្យា',
            'bio' => 'សាស្ត្រាចារ្យគណិតវិទ្យា',
            'education' => 'អនុបណ្ឌិត',
            'phone' => '012 345 678',
            'telegram' => '@vasnamath',
        ]);

        Book::create([
            'title' => 'គណិតវិទ្យាថ្នាក់ទី១២',
            'slug' => 'math-grade-12',
            'author' => 'ក្រសួងអប់រំ',
            'category' => 'សៀវភៅពុម្ព',
            'grade_level' => 'ថ្នាក់ទី១២',
        ]);

        Article::create([
            'title' => 'សារៈសំខាន់នៃធរណីមាត្រ',
            'slug' => 'geometry-importance',
            'category' => 'វិធីសាស្ត្ររៀន',
            'author' => 'ANONTAK Team',
            'content' => 'ខ្លឹមសារអត្ថបទ...',
        ]);

        TeachingMaterial::create([
            'name' => 'បន្ទាត់ត្រីកោណមាត្រ',
            'category' => 'ធរណីមាត្រ',
            'description' => 'ឧបករណ៍វាស់ស្ទង់',
        ]);

        Classroom::create([
            'teacher_id' => $teacher->id,
            'code' => 'ថ្នាក់ រ136',
            'title' => 'គណិតវិទ្យា',
            'room' => 'បន្ទប់ រ136',
            'grade_level' => 'ថ្នាក់ទី១២',
            'schedule' => '08:00 - 10:00',
        ]);

        $response = $this->get(route('about'));

        $response->assertStatus(200);
        $response->assertSee('អំពីយើង');
        $response->assertSee('បេសកកម្មអប់រំ និងចែករំលែក');
        $response->assertSee('ចក្ខុវិស័យ (Vision)');
        $response->assertSee('បេសកកម្ម (Mission)');
        $response->assertSee('គុណតម្លៃស្នូល (Core Values)');
        $response->assertSee('លោកគ្រូ វ៉ាសនា');
        $response->assertViewHas('teachers', function ($teachers) use ($teacher) {
            return $teachers->contains($teacher);
        });
        $response->assertViewHas('stats', function ($stats) {
            return $stats['books_count'] === 1 &&
                   $stats['articles_count'] === 1 &&
                   $stats['materials_count'] === 1 &&
                   $stats['classrooms_count'] === 1 &&
                   $stats['teachers_count'] === 1;
        });
    }
}
