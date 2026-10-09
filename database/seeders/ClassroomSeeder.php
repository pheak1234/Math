<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Featured Teacher from user mockup: លោកគ្រូ វ៉ាសនា
        $vasna = Teacher::updateOrCreate(
            ['name' => 'លោកគ្រូ វ៉ាសនា'],
            [
                'avatar' => '/images/teacher_vasna.png',
                'subject' => 'គណិតវិទ្យាវិទ្យាល័យ (អនុគមន៍ ធរណីមាត្រ មាត្រីស)',
                'bio' => 'លោកគ្រូ វ៉ាសនា មានបទពិសោធន៍បង្រៀនគណិតវិទ្យាថ្នាក់ទី ១០ ដល់ ១២ ជាង ៨ ឆ្នាំក្នុងការត្រៀមប្រឡងបាក់ឌុប និងសិស្សពូកែទូទាំងប្រទេស។ វិធីសាស្ត្របង្រៀនងាយយល់ ច្បាស់លាស់ និងមានលំហាត់ជាក់ស្ដែងជាច្រើន។',
                'education' => 'បរិញ្ញាបត្រជាន់ខ្ពស់គណិតវិទ្យា សាកលវិទ្យាល័យភូមិន្ទភ្នំពេញ (RUPP)',
                'phone' => '012 889 900',
                'telegram' => '@teacher_vasna',
            ]
        );

        // 9 classrooms matching mockup (5 in top row, 4 in bottom row)
        $vasnaRooms = [
            ['code' => 'ថ្នាក់ រ136', 'title' => 'គណិតវិទ្យាត្រៀមបាក់ឌុប វេនព្រឹក', 'room' => 'បន្ទប់ ១៣៦', 'schedule' => 'ចន្ទ-ពុធ-សុក្រ (7:30 AM - 9:00 AM)', 'grade_level' => 'ថ្នាក់ទី ១២'],
            ['code' => 'ថ្នាក់ រ136', 'title' => 'គណិតវិទ្យាត្រៀមបាក់ឌុប វេនរសៀល', 'room' => 'បន្ទប់ ១៣៦', 'schedule' => 'ចន្ទ-ពុធ-សុក្រ (2:00 PM - 3:30 PM)', 'grade_level' => 'ថ្នាក់ទី ១២'],
            ['code' => 'ថ្នាក់ រ136', 'title' => 'ធរណីមាត្រក្នុងលំហ 3D', 'room' => 'បន្ទប់ ១៣៦', 'schedule' => 'អង្គារ-ព្រហស្បតិ៍ (5:00 PM - 6:30 PM)', 'grade_level' => 'ថ្នាក់ទី ១១-១២'],
            ['code' => 'ថ្នាក់ រ136', 'title' => 'ពិជគណិត និងអនុគមន៍អិចស្ប៉ូណង់ស្យែល', 'room' => 'បន្ទប់ ១៣៦', 'schedule' => 'សៅរ៍-អាទិត្យ (8:00 AM - 10:00 AM)', 'grade_level' => 'ថ្នាក់ទី ១១'],
            ['code' => 'ថ្នាក់ រ136', 'title' => 'ត្រៀមប្រឡងសិស្សពូកែគណិតវិទ្យា', 'room' => 'បន្ទប់ ១៣៦', 'schedule' => 'សៅរ៍-អាទិត្យ (2:00 PM - 4:00 PM)', 'grade_level' => 'ថ្នាក់ទី ១២'],
            ['code' => 'ថ្នាក់ រ136', 'title' => 'អាំងតេក្រាល និងសមីការឌីផេរ៉ង់ស្យែល', 'room' => 'បន្ទប់ ១៣៦', 'schedule' => 'ចន្ទ-ពុធ-សុក្រ (5:00 PM - 6:30 PM)', 'grade_level' => 'ថ្នាក់ទី ១២'],
            ['code' => 'ថ្នាក់ រ136', 'title' => 'លីមីត និងដេរីវេកម្រិតខ្ពស់', 'room' => 'បន្ទប់ ១៣៦', 'schedule' => 'អង្គារ-ព្រហស្បតិ៍ (7:30 AM - 9:00 AM)', 'grade_level' => 'ថ្នាក់ទី ១២'],
            ['code' => 'ថ្នាក់ រ136', 'title' => 'ក្បួនដោះស្រាយប្រូបាប៊ីលីតេ', 'room' => 'បន្ទប់ ១៣៦', 'schedule' => 'សៅរ៍ (4:30 PM - 6:30 PM)', 'grade_level' => 'ថ្នាក់ទី ១២'],
            ['code' => 'ថ្នាក់ រ136', 'title' => 'ធរណីមាត្រវិភាគក្នុងប្លង់', 'room' => 'បន្ទប់ ១៣៦', 'schedule' => 'អាទិត្យ (4:30 PM - 6:30 PM)', 'grade_level' => 'ថ្នាក់ទី ១១-១២'],
        ];

        foreach ($vasnaRooms as $room) {
            Classroom::create([
                'teacher_id' => $vasna->id,
                'code' => $room['code'],
                'title' => $room['title'],
                'room' => $room['room'],
                'schedule' => $room['schedule'],
                'grade_level' => $room['grade_level'],
                'capacity' => 35,
                'enrolled_count' => rand(20, 32),
                'status' => 'active',
            ]);
        }

        // 2. Additional Teacher: អ្នកគ្រូ សុវណ្ណារី
        $sovannary = Teacher::updateOrCreate(
            ['name' => 'អ្នកគ្រូ សុវណ្ណារី'],
            [
                'avatar' => '/images/article_teacher.svg',
                'subject' => 'មូលដ្ឋានគ្រឹះគណិតវិទ្យា និងធរណីមាត្រប្លង់',
                'bio' => 'អ្នកគ្រូ សុវណ្ណារី ជំនាញខាងការបង្រៀនគណិតវិទ្យាមូលដ្ឋានសម្រាប់សិស្សថ្នាក់ទី ៧ ដល់ ទី ៩ ជួយសិស្សដែលខ្សោយឱ្យឆាប់យល់ និងមានទំនុកចិត្តខ្ពស់។',
                'education' => 'វិទ្យាស្ថានជាតិអប់រំ (NIE) - គរុកោសល្យគណិតវិទ្យា',
                'phone' => '011 234 567',
                'telegram' => '@teacher_sovannary',
            ]
        );

        $sovannaryRooms = [
            ['code' => 'ថ្នាក់ រ201', 'title' => 'មូលដ្ឋានគ្រឹះពិជគណិតថ្នាក់ទី ៧', 'room' => 'បន្ទប់ ២០១', 'schedule' => 'ចន្ទ-ពុធ-សុក្រ (8:00 AM - 9:30 AM)', 'grade_level' => 'ថ្នាក់ទី ៧'],
            ['code' => 'ថ្នាក់ រ201', 'title' => 'ធរណីមាត្រប្លង់ និងត្រីកោណមាត្រទី ៨', 'room' => 'បន្ទប់ ២០១', 'schedule' => 'ចន្ទ-ពុធ-សុក្រ (2:00 PM - 3:30 PM)', 'grade_level' => 'ថ្នាក់ទី ៨'],
            ['code' => 'ថ្នាក់ រ202', 'title' => 'ត្រៀមប្រឡងឌីប្លូមថ្នាក់ទី ៩', 'room' => 'បន្ទប់ ២០២', 'schedule' => 'សៅរ៍-អាទិត្យ (8:00 AM - 10:30 AM)', 'grade_level' => 'ថ្នាក់ទី ៩'],
            ['code' => 'ថ្នាក់ រ202', 'title' => 'លំហាត់ប្រឡងសិស្សពូកែអនុវិទ្យាល័យ', 'room' => 'បន្ទប់ ២០២', 'schedule' => 'សៅរ៍-អាទិត្យ (2:00 PM - 4:00 PM)', 'grade_level' => 'ថ្នាក់ទី ៩'],
        ];

        foreach ($sovannaryRooms as $room) {
            Classroom::create([
                'teacher_id' => $sovannary->id,
                'code' => $room['code'],
                'title' => $room['title'],
                'room' => $room['room'],
                'schedule' => $room['schedule'],
                'grade_level' => $room['grade_level'],
                'capacity' => 30,
                'enrolled_count' => rand(18, 28),
                'status' => 'active',
            ]);
        }
    }
}
