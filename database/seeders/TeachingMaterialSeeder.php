<?php

namespace Database\Seeders;

use App\Models\TeachingMaterial;
use Illuminate\Database\Seeder;

class TeachingMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $materials = [
            [
                'name' => 'បន្ទាត់វាស់ស្ទង់ដែកអ៊ីណុក (Stainless Steel Ruler)',
                'category' => 'ឧបករណ៍វាស់ស្ទង់',
                'grade_level' => 'គ្រប់កម្រិតថ្នាក់',
                'description' => 'បន្ទាត់ដែកអ៊ីណុកគុណភាពខ្ពស់ មិនច្រេះ ប្រវែង ៣០ ស.ម និង ៥០ ស.ម គំនូសខ្នាតច្បាស់លាស់សម្រាប់គូរ និងវាស់ប្រវែងជាក់លាក់ក្នុងធរណីមាត្រប្លង់។',
                'specifications' => 'ប្រវែង៖ ៣០ ស.ម / ៥០ ស.ម | សម្ភារៈ៖ ដែកអ៊ីណុកស្តង់ដារ | ខ្នាត៖ ម.ម និង អ៊ីញ',
                'image' => '/images/tool_ruler.svg',
                'guide_url' => '#guide-ruler',
                'is_featured' => true,
            ],
            [
                'name' => 'បន្ទាត់ត្រីកោណកែង & រង្វាស់មុំ (Set Square & Protractor)',
                'category' => 'ធរណីមាត្រ',
                'grade_level' => 'ថ្នាក់ទី ៧ ដល់ ១២',
                'description' => 'ឧបករណ៍សម្រាប់វាស់មុំ គូរបន្ទាត់កែង បន្ទាត់ស្រប និងគូសត្រីកោណមាត្រ។ ជួយឱ្យការបង្រៀនរូបធរណីមាត្រនៅលើក្តារខៀន និងសៀវភៅសិស្សមានភាពសុក្រឹត។',
                'specifications' => 'មុំ៖ ៤៥°-៤៥°-៩០° និង ៣០°-៦០°-៩០° | សម្ភារៈ៖ ប្លាស្ទិកថ្លារឹងមាំ',
                'image' => '/images/tool_triangle.svg',
                'guide_url' => '#guide-triangle',
                'is_featured' => true,
            ],
            [
                'name' => 'ប្រអប់រង្វាស់ និងដែកឈាន (Compass Geometry Kit)',
                'category' => 'ធរណីមាត្រ',
                'grade_level' => 'ថ្នាក់ទី ៧ ដល់ ១២',
                'description' => 'ឈុតឧបករណ៍ដែកឈាន និងរង្វាស់មុំសម្រាប់គូសរង្វង់ ធ្នូរង្វង់ និងបន្ទាត់ពុះមុំ។ ងាយស្រួលកាន់ និងចាក់ចំកណ្តាលផ្ចិតបានច្បាស់លាស់។',
                'specifications' => 'ឈុត ៧ មុខ៖ ដែកឈាន, រង្វាស់មុំ ១៨០°, បន្ទាត់ត្រង់, ជ័រលុប, កាំបិតចិតខ្មៅដៃ',
                'image' => '/images/tool_compass.svg',
                'guide_url' => '#guide-compass',
                'is_featured' => true,
            ],
            [
                'name' => 'ម៉ែត្រខ្សែវាស់ខ្នាត (Flexible Tape Measure)',
                'category' => 'ឧបករណ៍វាស់ស្ទង់',
                'grade_level' => 'គ្រប់កម្រិតថ្នាក់',
                'description' => 'ម៉ែត្រខ្សែស្វ័យប្រវត្តប្រវែង ៣ ម៉ែត្រ និង ៥ ម៉ែត្រ សម្រាប់វាស់បរិមាត្រ ផ្ទៃក្រឡាជាក់ស្ដែងក្នុងថ្នាក់រៀន និងទីធ្លាសាលា ភ្ជាប់ការរៀនទៅនឹងជីវភាពរស់នៅ។',
                'specifications' => 'ប្រវែង៖ ៥ ម៉ែត្រ | ប្រព័ន្ធចាក់សោស្វ័យប្រវត្ត | គំនូសខ្នាតស្តង់ដារ ISO',
                'image' => '/images/tool_tape.svg',
                'guide_url' => '#guide-tape',
                'is_featured' => true,
            ],
            [
                'name' => 'កម្រងសៀវភៅជំនួយការរៀន និងលំហាត់ (Math Reference Guides)',
                'category' => 'សៀវភៅជំនួយ',
                'grade_level' => 'គ្រូបង្រៀន និងសិស្ស',
                'description' => 'កម្រងសៀវភៅពុម្ព មគ្គុទ្ទេសក៍គ្រូបង្រៀន និងកម្រងលំហាត់ជ្រើសរើសពិសេសសម្រាប់គ្រូបង្រៀនប្រើក្នុងការរៀបចំកិច្ចតែងការបង្រៀន និងវិញ្ញាសាប្រឡង។',
                'specifications' => 'កម្រាស់៖ ២៥០ ទំព័រ | ភាសា៖ ខ្មែរ | កម្រិត៖ មធ្យមសិក្សា និងឧត្តមសិក្សា',
                'image' => '/images/tool_books.svg',
                'guide_url' => '#guide-books',
                'is_featured' => true,
            ],
            [
                'name' => 'គំរូរូបធរណីមាត្រក្នុងលំហ 3D (3D Geometric Polyhedrons)',
                'category' => 'ធរណីមាត្រ',
                'grade_level' => 'ថ្នាក់ទី ៨ ដល់ ១២',
                'description' => 'ឈុតគំរូរូបធរណីមាត្រ 3D (គូប ព្រីស ស៊ីឡាំង កោន ស៊្វែរ ពីរ៉ាមីត) សម្រាប់បង្ហាញសិស្សឱ្យយល់ច្បាស់ពីមុខ កំពូល គែម ផ្ទៃក្រឡា និងមាឌ។',
                'specifications' => 'ឈុត ១២ រូប | សម្ភារៈ៖ ប្លាស្ទិកថ្លាអាចផ្ទុកទឹកបានសម្រាប់វាស់មាឌ',
                'image' => '/images/book_math_polyhedron.svg',
                'guide_url' => '#guide-polyhedron',
                'is_featured' => false,
            ],
            [
                'name' => 'ក្តារខៀនគូសក្រឡាចត្រង្គកូអរដោណេ (Coordinate Grid Board)',
                'category' => 'សម្ភារៈពិសោធន៍',
                'grade_level' => 'ថ្នាក់ទី ៩ ដល់ ១២',
                'description' => 'ក្តារខៀនម៉ាញេទិកមានក្រឡាកូអរដោណេ ដេកាត (x, y) សម្រាប់បង្ហាញក្រាហ្វនៃអនុគមន៍ សមីការបន្ទាត់ និងប៉ារ៉ាបូលយ៉ាងរហ័ស។',
                'specifications' => 'ទំហំ៖ ៦០ x ៩០ ស.ម | ផ្ទៃម៉ាញេទិក | ក្រឡាខ្នាត ១ ស.ម',
                'image' => '/images/article_blackboard.svg',
                'guide_url' => '#guide-grid',
                'is_featured' => false,
            ],
            [
                'name' => 'កាឡាក់ស៊ីប្រូបាប៊ីលីតេ និងគ្រាប់ឡុកឡាក់ (Probability & Statistics Kit)',
                'category' => 'សម្ភារៈពិសោធន៍',
                'grade_level' => 'ថ្នាក់ទី ១០ ដល់ ១២',
                'description' => 'ឈុតឧបករណ៍ពិសោធន៍ប្រូបាប៊ីលីតេ រួមមានគ្រាប់ឡុកឡាក់ពហុមុខ កងបង្វិលសំណាង និងថង់បាល់ពណ៌ សម្រាប់បង្រៀនទ្រឹស្ដីប្រូបាប៊ីលីតេជាក់ស្ដែង។',
                'specifications' => 'គ្រាប់ឡុកឡាក់ ៤, ៦, ៨, ១២, ២០ មុខ | កងបង្វិលមុំ ៣៦០°',
                'image' => '/images/article_study.svg',
                'guide_url' => '#guide-prob',
                'is_featured' => false,
            ],
            [
                'name' => 'ម៉ាស៊ីនគិតលេខវិទ្យាសាស្ត្រគំរូ (Scientific Calculator Classroom Pack)',
                'category' => 'ឧបករណ៍វាស់ស្ទង់',
                'grade_level' => 'ថ្នាក់ទី ១០ ដល់ ១២',
                'description' => 'ម៉ាស៊ីនគិតលេខវិទ្យាសាស្ត្រគាំទ្រការគណនាម៉ាទ្រីស វ៉ិចទ័រ ស្ថិតិ និងដោះស្រាយសមីការកម្រិតខ្ពស់សម្រាប់ត្រៀមប្រឡងបាក់ឌុប។',
                'specifications' => 'អនុគមន៍ ៤១៧ មុខងារ | អេក្រង់បង្ហាញរូបមន្តធម្មជាតិ (Natural Display)',
                'image' => '/images/article_finance.svg',
                'guide_url' => '#guide-calc',
                'is_featured' => false,
            ],
            [
                'name' => 'តារាងរូបមន្តគណិតវិទ្យាជញ្ជាំងថ្នាក់រៀន (Wall Formula Charts)',
                'category' => 'សៀវភៅជំនួយ',
                'grade_level' => 'ថ្នាក់ទី ៧ ដល់ ១២',
                'description' => 'ផ្ទាំងរូបភាពធំសម្រាប់បិទជញ្ជាំងថ្នាក់រៀន បង្ហាញរូបមន្តពិជគណិត ត្រីកោណមាត្រ និងធរណីមាត្រចាំបាច់ ងាយស្រួលឱ្យសិស្សមើល និងចងចាំ។',
                'specifications' => 'ទំហំ៖ ៨០ x ១២០ ស.ម | បោះពុម្ពពណ៌លើក្រដាសរលោងមិនជ្រាបទឹក',
                'image' => '/images/book_math_blue.svg',
                'guide_url' => '#guide-wallchart',
                'is_featured' => false,
            ],
        ];

        foreach ($materials as $item) {
            TeachingMaterial::updateOrCreate(
                ['name' => $item['name']],
                $item
            );
        }
    }
}
