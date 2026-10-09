<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MathExam;
use App\Models\ExamQuestion;
use App\Models\ExamOption;

class MathExamSeeder extends Seeder
{
    public function run(): void
    {
        $exams = [
            [
                'title' => 'វិញ្ញាសាគណិតវិទ្យា ទី១២ ត្រៀមប្រឡងបាក់ឌុប (ភាគ១)',
                'grade_level' => 'ទី១២',
                'description' => 'វិញ្ញាសានេះមានលំហាត់ទាក់ទងនឹងចំនួនកុំផ្លិច និងអាំងតេក្រាល។',
                'questions' => [
                    [
                        'text' => 'គណនាអាំងតេក្រាល I = ∫(2x + 3)dx',
                        'options' => ['x² + 3x + C', '2x² + 3x + C', 'x² + 3 + C', 'x + 3x² + C'],
                        'correct' => 0
                    ],
                    [
                        'text' => 'រកម៉ូឌុលនៃចំនួនកុំផ្លិច z = 3 + 4i',
                        'options' => ['5', '7', '25', '√7'],
                        'correct' => 0
                    ],
                ]
            ],
            [
                'title' => 'វិញ្ញាសាគណិតវិទ្យា ទី១២ (សមីការឌីផេរ៉ង់ស្យែល)',
                'grade_level' => 'ទី១២',
                'description' => 'លំហាត់សមីការឌីផេរ៉ង់ស្យែលលំដាប់ទី១ និងទី២។',
                'questions' => [
                    [
                        'text' => 'ដោះស្រាយសមីការ y\' + 2y = 0',
                        'options' => ['y = Ce⁻²ˣ', 'y = Ce²ˣ', 'y = C + e⁻²ˣ', 'y = 2Ce⁻ˣ'],
                        'correct' => 0
                    ],
                    [
                        'text' => 'ដោះស្រាយសមីការ y\'\' - 4y = 0',
                        'options' => ['y = C₁e²ˣ + C₂e⁻²ˣ', 'y = C₁cos(2x) + C₂sin(2x)', 'y = C₁eˣ + C₂e⁻ˣ', 'y = e²ˣ + C'],
                        'correct' => 0
                    ],
                ]
            ],
            [
                'title' => 'វិញ្ញាសាអនុគមន៍លោការីត និងអិចស្ប៉ូណង់ស្យែល',
                'grade_level' => 'ទី១១-១២',
                'description' => 'ការសិក្សាអនុគមន៍ f(x) = eˣ និង ln(x)។',
                'questions' => [
                    [
                        'text' => 'គណនាដេរីវេនៃ f(x) = ln(x² + 1)',
                        'options' => ['2x / (x² + 1)', '1 / (x² + 1)', '2x(x² + 1)', '2 / (x² + 1)'],
                        'correct' => 0
                    ],
                    [
                        'text' => 'តើ lim (x→∞) e⁻ˣ មានតម្លៃស្មើប៉ុន្មាន?',
                        'options' => ['0', '1', '∞', '-∞'],
                        'correct' => 0
                    ],
                ]
            ],
            [
                'title' => 'វិញ្ញាសាធរណីមាត្រក្នុងលំហ',
                'grade_level' => 'ទី១២',
                'description' => 'លំហាត់វ៉ិចទ័រ ផលគុណស្កាលែ និងប្លង់។',
                'questions' => [
                    [
                        'text' => 'គណនាផលគុណស្កាលែនៃ u⃗(1, 2, 3) និង v⃗(-1, 0, 2)',
                        'options' => ['5', '-1', '6', '4'],
                        'correct' => 0
                    ],
                    [
                        'text' => 'តើប្លង់ (P): 2x - y + z - 4 = 0 មានវ៉ិចទ័រណរម៉ាល់ជាអ្វី?',
                        'options' => ['n⃗(2, -1, 1)', 'n⃗(2, 1, 1)', 'n⃗(-2, -1, 1)', 'n⃗(2, -1, -4)'],
                        'correct' => 0
                    ],
                ]
            ],
            [
                'title' => 'វិញ្ញាសាប្រូបាប (Probability)',
                'grade_level' => 'ទី១២',
                'description' => 'លំហាត់ប្រូបាបមានលក្ខខណ្ឌ និងបន្សំ។',
                'questions' => [
                    [
                        'text' => 'គណនាបន្សំនៃ C(5, 2)',
                        'options' => ['10', '20', '5', '120'],
                        'correct' => 0
                    ],
                    [
                        'text' => 'បោះគ្រាប់ឡុកឡាក់មួយគ្រាប់ តើប្រូបាបបានលេខគូស្មើប៉ុន្មាន?',
                        'options' => ['½', '⅓', '¼', '⅙'],
                        'correct' => 0
                    ],
                ]
            ],
            [
                'title' => 'វិញ្ញាសាត្រីកោណមាត្រ',
                'grade_level' => 'ទី១១',
                'description' => 'ការដោះស្រាយសមីការត្រីកោណមាត្រកម្រិតមូលដ្ឋាន។',
                'questions' => [
                    [
                        'text' => 'ដោះស្រាយសមីការ sin(x) = ½ (ចន្លោះ 0 ដល់ π)',
                        'options' => ['π/6 និង 5π/6', 'π/3 និង 2π/3', 'π/4 និង 3π/4', 'π/6 តែមួយគត់'],
                        'correct' => 0
                    ],
                    [
                        'text' => 'តើ cos²(x) + sin²(x) ស្មើប៉ុន្មាន?',
                        'options' => ['1', '0', '-1', 'tan(x)'],
                        'correct' => 0
                    ],
                ]
            ],
            [
                'title' => 'វិញ្ញាសាស្វ៊ីតនព្វន្ត និងធរណីមាត្រ',
                'grade_level' => 'ទី១១',
                'description' => 'ការរកតួទី n និងផលបូក n តួ។',
                'questions' => [
                    [
                        'text' => 'រកតួទី10 នៃស្វ៊ីតនព្វន្ត 2, 5, 8, ...',
                        'options' => ['29', '27', '30', '32'],
                        'correct' => 0
                    ],
                    [
                        'text' => 'រកផលធៀបរួម q នៃស្វ៊ីតធរណីមាត្រ 3, 6, 12, ...',
                        'options' => ['2', '3', '½', '4'],
                        'correct' => 0
                    ],
                ]
            ],
            [
                'title' => 'វិញ្ញាសាលីមីតនៃអនុគមន៍',
                'grade_level' => 'ទី១១-១២',
                'description' => 'ការគណនាលីមីតរាងមិនកំណត់ 0/0 និង ∞/∞។',
                'questions' => [
                    [
                        'text' => 'គណនា lim (x→2) (x² - 4)/(x - 2)',
                        'options' => ['4', '0', '2', '∞'],
                        'correct' => 0
                    ],
                    [
                        'text' => 'គណនា lim (x→∞) (3x² + 2)/(x² - 1)',
                        'options' => ['3', '0', '∞', '1'],
                        'correct' => 0
                    ],
                ]
            ],
            [
                'title' => 'វិញ្ញាសាគណិតវិទ្យា ទី៩ (ត្រៀមប្រឡងឌីប្លូម)',
                'grade_level' => 'ទី៩',
                'description' => 'ប្រព័ន្ធសមីការ និងវិសមីការដឺក្រេទី១។',
                'questions' => [
                    [
                        'text' => 'ដោះស្រាយប្រព័ន្ធសមីការ x + y = 5 និង x - y = 1',
                        'options' => ['x=3, y=2', 'x=2, y=3', 'x=4, y=1', 'x=1, y=4'],
                        'correct' => 0
                    ],
                    [
                        'text' => 'ដោះស្រាយវិសមីការ 2x - 4 ≥ 0',
                        'options' => ['x ≥ 2', 'x ≤ 2', 'x > 2', 'x < 2'],
                        'correct' => 0
                    ],
                ]
            ],
            [
                'title' => 'វិញ្ញាសាធរណីមាត្រក្នុងប្លង់ (ទី៩)',
                'grade_level' => 'ទី៩',
                'description' => 'ទ្រឹស្តីបទពីតាក័រ និងតាលែស។',
                'questions' => [
                    [
                        'text' => 'ត្រីកោណកែងមួយមានជ្រុងកែងប្រវែង 3 និង 4។ តើអ៊ីប៉ូតេនុសមានប្រវែងប៉ុន្មាន?',
                        'options' => ['5', '7', '25', '√7'],
                        'correct' => 0
                    ],
                    [
                        'text' => 'បើ a∥b នោះមុំឆ្លាស់ក្នុងនៃបន្ទាត់ខ្វែងមានលក្ខណៈដូចម្តេច?',
                        'options' => ['ប៉ុនគ្នា', 'បន្ថែមគ្នា', 'ស្មើ 90°', 'ស្មើ 180°'],
                        'correct' => 0
                    ],
                ]
            ],
        ];

        foreach ($exams as $index => $examData) {
            $exam = MathExam::create([
                'title' => $examData['title'],
                'grade_level' => $examData['grade_level'],
                'description' => '<p>' . $examData['description'] . '</p>',
                'priority' => 10 - $index,
                'is_popular' => true,
                'duration_minutes' => 60,
                'passing_score' => 50,
            ]);

            foreach ($examData['questions'] as $qIndex => $qData) {
                $question = ExamQuestion::create([
                    'math_exam_id' => $exam->id,
                    'question_text' => '<p>' . $qData['text'] . '</p>',
                    'points' => 10,
                    'order' => $qIndex,
                ]);

                foreach ($qData['options'] as $oIndex => $optionText) {
                    
                    ExamOption::create([
                        'exam_question_id' => $question->id,
                        'option_text' => '<p>' . $optionText . '</p>',
                        'is_correct' => ($oIndex === $qData['correct']),
                    ]);
                }
            }
        }
    }
}
