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
                'description' => 'បន្ទាត់ដែកអ៊ីណុកស្តង់ដារគុណភាពខ្ពស់ គំនូសខ្នាតច្បាស់លាស់ឆ្លាក់ដោយកាំរស្មីឡាស៊ែរ ធានាមិនរលុបពេលប្រើប្រាស់យូរអង្វែង។ ស័ក្តិសមបំផុតសម្រាប់ការបង្រៀន និងរៀនធរណីមាត្រប្លង់ ការគូរគំនូសបច្ចេកទេស និងការវាស់ប្រវែងជាក់លាក់ក្នុងថ្នាក់រៀន និងមន្ទីរពិសោធន៍។',
                'specifications' => 'ប្រវែង៖ ៣០ ស.ម និង ៥០ ស.ម | សម្ភារៈ៖ ដែកអ៊ីណុក SUS-304 មិនច្រេះ | កម្រាស់៖ ១.២ ម.ម | ខ្នាត៖ មីលីម៉ែត្រ (mm), សង់ទីម៉ែត្រ (cm) និង អ៊ីញ (inch) | ផ្ទៃ៖ ម៉ាត់ប្រឆាំងចំណាំងផ្លាតពន្លឺ',
                'image' => 'teaching-materials/tool_ruler.svg',
                'gallery' => [
                    'teaching-materials/gallery/tool_ruler.svg',
                    'teaching-materials/gallery/tool_triangle.svg',
                    'teaching-materials/gallery/tool_compass.svg',
                    'teaching-materials/gallery/tool_tape.svg',
                ],
                'price' => 3.50,
                'guide_url' => '#guide-ruler',
                'is_featured' => true,
            ],
            [
                'name' => 'បន្ទាត់ត្រីកោណកែង & រង្វាស់មុំ (Set Square & Protractor)',
                'category' => 'ធរណីមាត្រ',
                'grade_level' => 'ថ្នាក់ទី ៧ ដល់ ១២',
                'description' => 'ឈុតឧបករណ៍បន្ទាត់កែង និងរង្វាស់មុំថ្លាជំនួយដល់ការបង្រៀនគំនិតមុំកែង បន្ទាត់ស្រប បន្ទាត់កែង និងការវាស់មុំក្នុងត្រីកោណមាត្រ។ ជួយឱ្យសិស្សានុសិស្សយល់ច្បាស់ពីទ្រឹស្ដីពីតាក័រ និងផលធៀបត្រីកោណមាត្រ (Sin, Cos, Tan) តាមរយៈការអនុវត្តផ្ទាល់លើក្រដាស និងក្តារខៀន។',
                'specifications' => 'មុំត្រីកោណ៖ ៤៥°-៤៥°-៩០° (ប្រវែង ២០ ស.ម) និង ៣០°-៦០°-៩០° (ប្រវែង ២៥ ស.ម) | រង្វាស់មុំកន្លះរង្វង់៖ ១៨០ ដឺក្រេ | សម្ភារៈ៖ ជ័រថ្លា Acrylic ធន់នឹងការបាក់បែក | គែម៖ រលោងមិនកោសសៀវភៅ',
                'image' => 'teaching-materials/tool_triangle.svg',
                'gallery' => [
                    'teaching-materials/gallery/tool_triangle.svg',
                    'teaching-materials/gallery/tool_ruler.svg',
                    'teaching-materials/gallery/tool_compass.svg',
                    'teaching-materials/gallery/book_math_polyhedron.svg',
                ],
                'price' => 4.00,
                'guide_url' => '#guide-triangle',
                'is_featured' => true,
            ],
            [
                'name' => 'ប្រអប់រង្វាស់ និងដែកឈាន (Compass Geometry Kit)',
                'category' => 'ធរណីមាត្រ',
                'grade_level' => 'ថ្នាក់ទី ៧ ដល់ ១២',
                'description' => 'ឈុតប្រអប់ឧបករណ៍ដែកឈានវិស្វកម្ម ត្រូវបានរចនាឡើងយ៉ាងផ្ចិតផ្ចង់សម្រាប់គូសរង្វង់ ធ្នូរង្វង់ បន្ទាត់ពុះមុំ និងការដោះស្រាយចំណោទធរណីមាត្រស្មុគស្មាញ។ ក្បាលដែកឈានមានគន្លឹះចាក់សោស្វ័យប្រវត្ត ធានាថាកាំរង្វង់មិនប្រែប្រួលពេលកំពុងបង្វិលគូរ។',
                'specifications' => 'ឈុត ៨ មុខ៖ ដែកឈានក្បាលដែក, ជើងជំនួយខ្មៅដៃ, រង្វាស់មុំ ១៨០°, បន្ទាត់ត្រង់ ១៥ ស.ម, បន្ទាត់កែង ២, ជ័រលុបគុណភាពខ្ពស់, កូនប្រអប់ស្នូលខ្មៅដៃ | ប្រអប់ដែកការពាររឹងមាំ',
                'image' => 'teaching-materials/tool_compass.svg',
                'gallery' => [
                    'teaching-materials/gallery/tool_compass.svg',
                    'teaching-materials/gallery/tool_triangle.svg',
                    'teaching-materials/gallery/tool_ruler.svg',
                    'teaching-materials/gallery/book_math_polyhedron.svg',
                ],
                'price' => 6.50,
                'guide_url' => '#guide-compass',
                'is_featured' => true,
            ],
            [
                'name' => 'ម៉ែត្រខ្សែវាស់ខ្នាត (Flexible Tape Measure)',
                'category' => 'ឧបករណ៍វាស់ស្ទង់',
                'grade_level' => 'គ្រប់កម្រិតថ្នាក់',
                'description' => 'ម៉ែត្រខ្សែរឹងមាំសម្រាប់សកម្មភាពសិក្សាគណិតវិទ្យាក្រៅថ្នាក់រៀន (Outdoor Math Activities)។ សិស្សអាចអនុវត្តការវាស់បរិមាត្រ និងផ្ទៃក្រឡានៃបន្ទប់រៀន ទីលានបាល់ទាត់ ឬកម្ពស់ដើមឈើដោយប្រើទ្រឹស្ដីសមាមាត្រ និងត្រីកោណដូចគ្នា ភ្ជាប់ទ្រឹស្ដីទៅនឹងការអនុវត្តជាក់ស្ដែង។',
                'specifications' => 'ប្រវែងវាស់៖ ៥ ម៉ែត្រ និង ៧.៥ ម៉ែត្រ | ទទឹងបន្ទះដែក៖ ២៥ ម.ម | ប្រព័ន្ធចាក់សោរស្វ័យប្រវត្តិ (Auto-Lock) | សម្ភារៈស្រោម៖ កៅស៊ូ TPR ការពារការធ្លាក់បោកទង្គិច | ខ្នាត៖ Metric និង Imperial',
                'image' => 'teaching-materials/tool_tape.svg',
                'gallery' => [
                    'teaching-materials/gallery/tool_tape.svg',
                    'teaching-materials/gallery/tool_ruler.svg',
                    'teaching-materials/gallery/article_study.svg',
                    'teaching-materials/gallery/article_finance.svg',
                ],
                'price' => 5.00,
                'guide_url' => '#guide-tape',
                'is_featured' => true,
            ],
            [
                'name' => 'កម្រងសៀវភៅជំនួយការរៀន និងលំហាត់ (Math Reference Guides)',
                'category' => 'សៀវភៅជំនួយ',
                'grade_level' => 'គ្រូបង្រៀន និងសិស្ស',
                'description' => 'សៀវភៅជំនួយស្មារតីគរុកោសល្យគណិតវិទ្យាប្រមូលផ្ដុំនូវវិធីសាស្ត្របង្រៀនទំនើបតាមបែប STEM និងវិធីសាស្រ្តជំរុញការគិតស៊ីជម្រៅរបស់សិស្ស។ រួមមានគំរូសន្លឹកកិច្ចការ លំហាត់ពង្រឹងសមត្ថភាព និងការវិភាគកំហុសទូទៅដែលសិស្សតែងតែជួបប្រទះក្នុងការប្រឡងថ្នាក់ជាតិ។',
                'specifications' => 'កម្រាស់៖ ៣២០ ទំព័រ | ទំហំក្រដាស៖ B5 (ក្រដាសពណ៌ក្រែមការពារភ្នែក 80gsm) | ភាសា៖ ខ្មែរ និងរូបមន្តសកល | ការចងក្រង៖ កម្រងកិច្ចតែងការបង្រៀនគំរូ និងវិធីសាស្ត្រដោះស្រាយលំហាត់លម្អិត',
                'image' => 'teaching-materials/tool_books.svg',
                'gallery' => [
                    'teaching-materials/gallery/tool_books.svg',
                    'teaching-materials/gallery/book_math_blue.svg',
                    'teaching-materials/gallery/book_math_green.svg',
                    'teaching-materials/gallery/book_math_teal.svg',
                ],
                'price' => 15.00,
                'guide_url' => '#guide-books',
                'is_featured' => true,
            ],
            [
                'name' => 'គំរូរូបធរណីមាត្រក្នុងលំហ 3D (3D Geometric Polyhedrons)',
                'category' => 'ធរណីមាត្រ',
                'grade_level' => 'ថ្នាក់ទី ៨ ដល់ ១២',
                'description' => 'ឧបទេសសិក្សាដ៏មានឥទ្ធិពលបំផុតសម្រាប់បំប្លែងទ្រឹស្ដីធរណីមាត្រក្នុងលំហឱ្យទៅជារូបភាពពិតជាក់ស្ដែង។ សិស្សអាចសង្កេតឃើញផ្ទាល់ភ្នែកនូវចំនួនមុខ កំពូល គែម ព្រមទាំងពិសោធន៍ប្រៀបធៀបមាឌរវាងកោន និងស៊ីឡាំង ឬពីរ៉ាមីត និងព្រីស ដែលមានបាត និងកម្ពស់ដូចគ្នា។',
                'specifications' => 'ឈុត ១៤ រូប (គូប, ព្រីសត្រីកោណ, ព្រីសចតុកោណ, ស៊ីឡាំង, កោន, ស៊្វែរ, ពីរ៉ាមីត) | សម្ភារៈ៖ ប្លាស្ទិកថ្លា Grade-A គ្មានជាតិពុល | បាតអាចដោះចេញបានសម្រាប់ចាក់ទឹក ឬខ្សាច់វាស់មាឌជាក់ស្តែង',
                'image' => 'teaching-materials/book_math_polyhedron.svg',
                'gallery' => [
                    'teaching-materials/gallery/book_math_polyhedron.svg',
                    'teaching-materials/gallery/tool_triangle.svg',
                    'teaching-materials/gallery/tool_compass.svg',
                    'teaching-materials/gallery/article_study.svg',
                ],
                'price' => 18.50,
                'guide_url' => '#guide-polyhedron',
                'is_featured' => true,
            ],
            [
                'name' => 'ក្តារខៀនគូសក្រឡាចត្រង្គកូអរដោណេ (Coordinate Grid Board)',
                'category' => 'សម្ភារៈពិសោធន៍',
                'grade_level' => 'ថ្នាក់ទី ៩ ដល់ ១២',
                'description' => 'ក្តារខៀនជំនួយការបង្រៀនគូសក្រាហ្វនៃអនុគមន៍លីនេអ៊ែរ អនុគមន៍ដឺក្រេទីពីរ ប៉ារ៉ាបូល និងប្រព័ន្ធសមីការ។ គ្រូបង្រៀនអាចបិទភ្ជាប់លើក្តារខៀនធំក្នុងថ្នាក់រៀនបានយ៉ាងងាយស្រួល ជួយសន្សំពេលវេលាក្នុងការគូសក្រឡាចត្រង្គ និងធ្វើឱ្យមេរៀនប្រកបដោយភាពរស់រវើក។',
                'specifications' => 'ទំហំ៖ ៦០ x ៩០ ស.ម | ផ្ទៃ៖ ដែកស្រោបថ្នាំម៉ាញេទិកសរសេរហ្វឺតលុបបាន | ក្រឡាកូអរដោណេ៖ អ័ក្ស X និង Y ច្បាស់ក្រឡា ២ x ២ ស.ម | ថែមជូន៖ គ្រាប់ម៉ាញេទិក ៦ គ្រាប់ និងហ្វឺត ២ ដើម',
                'image' => 'teaching-materials/article_blackboard.svg',
                'gallery' => [
                    'teaching-materials/gallery/article_blackboard.svg',
                    'teaching-materials/gallery/hero_math_blackboard.jpg',
                    'teaching-materials/gallery/tool_ruler.svg',
                    'teaching-materials/gallery/article_study.svg',
                ],
                'price' => 12.00,
                'guide_url' => '#guide-grid',
                'is_featured' => false,
            ],
            [
                'name' => 'កាឡាក់ស៊ីប្រូបាប៊ីលីតេ និងគ្រាប់ឡុកឡាក់ (Probability & Statistics Kit)',
                'category' => 'សម្ភារៈពិសោធន៍',
                'grade_level' => 'ថ្នាក់ទី ១០ ដល់ ១២',
                'description' => 'ឧបករណ៍ពិសោធន៍ជាក់ស្ដែងសម្រាប់មេរៀនប្រូបាប៊ីលីតេ និងស្ថិតិវិទ្យា។ អនុញ្ញាតឱ្យសិស្សធ្វើការពិសោធន៍ចៃដន្យ កត់ត្រាទិន្នន័យគំរូ គណនាប្រេកង់ និងប្រៀបធៀបប្រេកង់ជាក់ស្ដែងទៅនឹងប្រូបាប៊ីលីតេទ្រឹស្ដីតាមច្បាប់នៃចំនួនធំ (Law of Large Numbers)។',
                'specifications' => 'រួមមាន៖ គ្រាប់ឡុកឡាក់ ៤, ៦, ៨, ១០, ១២, ២០ មុខ (ឈុត ៧ គ្រាប់), កងបង្វិលប្រូបាប៊ីលីតេបែងចែកមុំស្មើ, បាល់ពណ៌ ៥០ គ្រាប់ក្នុងថង់ងងឹត, កាក់ពិសោធន៍ ២, តារាងកត់ត្រាទិន្នន័យស្ថិតិ',
                'image' => 'teaching-materials/article_study.svg',
                'gallery' => [
                    'teaching-materials/gallery/article_study.svg',
                    'teaching-materials/gallery/article_finance.svg',
                    'teaching-materials/gallery/tool_compass.svg',
                    'teaching-materials/gallery/book_math_polyhedron.svg',
                ],
                'price' => 14.00,
                'guide_url' => '#guide-prob',
                'is_featured' => false,
            ],
            [
                'name' => 'ម៉ាស៊ីនគិតលេខវិទ្យាសាស្ត្រគំរូ (Scientific Calculator Classroom Pack)',
                'category' => 'ឧបករណ៍វាស់ស្ទង់',
                'grade_level' => 'ថ្នាក់ទី ១០ ដល់ ១២',
                'description' => 'ម៉ាស៊ីនគិតលេខវិទ្យាសាស្ត្រកម្រិតខ្ពស់គាំទ្រការដោះស្រាយប្រព័ន្ធសមីការ ការគណនាម៉ាទ្រីស វ៉ិចទ័រ ចំនួនកុំផ្លិច និងស្ថិតិវិភាគទិន្នន័យ។ ឧបករណ៍មិនអាចខ្វះបានសម្រាប់សិស្សថ្នាក់ទី ១២ ត្រៀមប្រឡងសញ្ញាបត្រមធ្យមសិក្សាទុតិយភូមិ (បាក់ឌុប) និងប្រឡងអាហារូបករណ៍សាកលវិទ្យាល័យ។',
                'specifications' => 'អនុគមន៍គណនា៖ ៤១៧ មុខងារស្តង់ដារ | អេក្រង់៖ Natural Textbook Display (បង្ហាញរូបមន្តប្រភាគ អាំងតេក្រាល និងរ៉ាឌីកាល់ដូចសៀវភៅពុម្ព) | ថាមពល៖ ថ្មសូឡាពន្លឺព្រះអាទិត្យ + ថ្ម Button Cell | ធានា៖ ១២ ខែពេញ',
                'image' => 'teaching-materials/article_finance.svg',
                'gallery' => [
                    'teaching-materials/gallery/article_finance.svg',
                    'teaching-materials/gallery/phone_app_mockup.jpg',
                    'teaching-materials/gallery/tool_books.svg',
                    'teaching-materials/gallery/article_study.svg',
                ],
                'price' => 35.00,
                'guide_url' => '#guide-calc',
                'is_featured' => false,
            ],
            [
                'name' => 'តារាងរូបមន្តគណិតវិទ្យាជញ្ជាំងថ្នាក់រៀន (Wall Formula Charts)',
                'category' => 'សៀវភៅជំនួយ',
                'grade_level' => 'ថ្នាក់ទី ៧ ដល់ ១២',
                'description' => 'ផ្ទាំងរូបមន្តគណិតវិទ្យាជញ្ជាំងថ្នាក់រៀនដែលត្រូវបានរៀបចំឡើងយ៉ាងមានរបៀបរៀបរយតាមលំដាប់លំដោយនៃកម្មវិធីសិក្សាជាតិ។ ជួយឱ្យបរិយាកាសក្នុងថ្នាក់រៀនពោរពេញដោយចំណេះដឹង និងជួយឱ្យសិស្សានុសិស្សងាយស្រួលផ្ទៀងផ្ទាត់រូបមន្ត និងរំលឹកមេរៀនគ្រប់ពេលវេលា។',
                'specifications' => 'ទំហំ៖ ៨០ x ១២០ ស.ម (ខ្នាតធំអាចមើលឃើញច្បាស់ពីចម្ងាយ ៨ ម៉ែត្រ) | ក្រដាស៖ PP Synthetic Film មិនជ្រាបទឹក មិនរហែក | ការបោះពុម្ព៖ ទឹកថ្នាំ UV ពណ៌ដិតស្រស់មិនរសាត់ពណ៌ | មាតិកា៖ រូបមន្តពិជគណិត ធរណីមាត្រ ត្រីកោណមាត្រ និងដេរីវេ-អាំងតេក្រាល',
                'image' => 'teaching-materials/book_math_blue.svg',
                'gallery' => [
                    'teaching-materials/gallery/book_math_blue.svg',
                    'teaching-materials/gallery/book_math_green.svg',
                    'teaching-materials/gallery/book_math_teal.svg',
                    'teaching-materials/gallery/article_blackboard.svg',
                ],
                'price' => 8.50,
                'guide_url' => '#guide-wallchart',
                'is_featured' => false,
            ],
            [
                'name' => 'កញ្ចប់ឯកសារជំនួយការបង្រៀនគំរូឥតគិតថ្លៃ (Free Digital Math Starter Pack)',
                'category' => 'សៀវភៅជំនួយ',
                'grade_level' => 'គ្រូបង្រៀន និងសិស្ស',
                'description' => 'កញ្ចប់ជំនួយការបង្រៀនគំរូឥតគិតថ្លៃសម្រាប់លោកគ្រូអ្នកគ្រូ និងសិស្សានុសិស្ស។ រួមបញ្ចូលទាំងកម្រងលំហាត់អនុវត្តប្រចាំសប្តាហ៍ តារាងសង្ខេបមេរៀន និងលំហាត់ត្រិះរិះពិចារណាសម្រាប់ពង្រឹងមូលដ្ឋានគ្រឹះគណិតវិទ្យា។',
                'specifications' => 'ទម្រង់៖ ឯកសារ PDF & សន្លឹកកិច្ចការបោះពុម្ពបាន | ចំនួន៖ ៥ ឯកសារគំរូ | ទំហំឯកសារ៖ 15 MB | ភាសា៖ ខ្មែរ',
                'image' => 'teaching-materials/book_math_teal.svg',
                'gallery' => [
                    'teaching-materials/gallery/book_math_teal.svg',
                    'teaching-materials/gallery/book_math_green.svg',
                    'teaching-materials/gallery/tool_books.svg',
                ],
                'price' => 0.00,
                'guide_url' => '#guide-starter',
                'is_featured' => true,
            ],
            [
                'name' => 'ឈុតរង្វង់ត្រីកោណមាត្របង្វិល (Unit Circle Trigonometry Demonstrator)',
                'category' => 'ធរណីមាត្រ',
                'grade_level' => 'ថ្នាក់ទី ១០ ដល់ ១២',
                'description' => 'ឧបករណ៍បង្រៀនរង្វង់ត្រីកោណមាត្រគំរូអាចបង្វិលបាន ៣៦០ ដឺក្រេ សម្រាប់ពន្យល់សិស្សឱ្យយល់ស៊ីជម្រៅពីទំនាក់ទំនងរវាងមុំ និងអនុគមន៍ត្រីកោណមាត្រ សញ្ញានៃកាដ្រង់ទាំងបួន និងការប្រែប្រួលតម្លៃ Sin, Cos តាមទិសដៅបង្វិល។',
                'specifications' => 'អង្កត់ផ្ចិតកងរង្វង់៖ ៣០ ស.ម | សម្ភារៈ៖ ជ័រថ្លា Acrylic ស្រោបម៉ាញេទិក | ខ្នាតមុំ៖ ដឺក្រេ (0° - 360°) និង រ៉ាដ្យង់ (0 - 2π) | សញ្ញាសម្គាល់៖ បង្ហាញតម្លៃពិតនៃ Sin, Cos, Tan លើអ័ក្សកូអរដោណេ',
                'image' => 'teaching-materials/tool_triangle.svg',
                'gallery' => [
                    'teaching-materials/gallery/tool_triangle.svg',
                    'teaching-materials/gallery/tool_compass.svg',
                    'teaching-materials/gallery/book_math_polyhedron.svg',
                    'teaching-materials/gallery/article_study.svg',
                ],
                'price' => 11.00,
                'guide_url' => '#guide-unit-circle',
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
