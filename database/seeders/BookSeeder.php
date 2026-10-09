<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title' => 'The Art of Computer Programming',
                'author' => 'Donald Knuth',
                'cover_image' => '/images/book_math_blue.svg',
                'price' => 25.00,
                'description' => 'A comprehensive monograph written by Donald Knuth that covers many kinds of programming algorithms and their analysis.',
            ],
            [
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'cover_image' => '/images/book_maths_yellow.jpg',
                'price' => 0.00,
                'description' => 'Even bad code can function. But if code isn\'t clean, it can bring a development organization to its knees.',
            ],
            [
                'title' => 'Design Patterns',
                'author' => 'Erich Gamma',
                'cover_image' => '/images/book_math_green.svg',
                'price' => 19.99,
                'description' => 'Capturing a wealth of experience about the design of object-oriented software, four top-notch designers present a catalog of simple and succinct solutions.',
            ],
            [
                'title' => 'MATHS 2 - គណិតវិទ្យាទី២',
                'author' => 'ក្រសួងអប់រំ យុវជន និងកីឡា',
                'cover_image' => '/images/book_maths_yellow.jpg',
                'price' => 0.00,
                'description' => 'សៀវភៅពុម្ពគណិតវិទ្យាដែលប្រមូលផ្តុំទៅដោយលំហាត់ពិជគណិត ធរណីមាត្រ និងគន្លឹះដោះស្រាយលឿនសម្រាប់សិស្សានុសិស្ស។',
            ],
            [
                'title' => 'MATH II - Teacher Edition',
                'author' => 'សាស្រ្តាចារ្យ គណិតវិទ្យា',
                'cover_image' => '/images/book_math_green.svg',
                'price' => 12.50,
                'description' => 'សៀវភៅណែនាំគ្រូ និងវិធីសាស្ត្របង្រៀនធរណីមាត្រក្នុងលំហ គំរូរូបបីវិមាត្រ និងការអនុវត្តជាក់ស្ដែង។',
            ],
            [
                'title' => 'MATHS - Polyhedron Geometry',
                'author' => 'ANONTAK Academy',
                'cover_image' => '/images/book_math_polyhedron.svg',
                'price' => 15.00,
                'description' => 'ឯកសារឯកទេសលើប្រធានបទធរណីមាត្រពហុមុខ កូអរដោនេក្នុងលំហ និងការវិភាគវ៉ិចទ័រកម្រិតឧត្តម។',
            ],
            [
                'title' => 'Mathematics 6 - មូលដ្ឋានគ្រឹះ',
                'author' => 'គណៈកម្មការស្រាវជ្រាវគណិតវិទ្យា',
                'cover_image' => '/images/book_math_teal.svg',
                'price' => 0.00,
                'description' => 'សៀវភៅពង្រឹងមូលដ្ឋានគ្រឹះគណិតវិទ្យា ការគិតបែបតក្កវិជ្ជា ប្រភាគ និងរង្វាស់រង្វាល់សម្រាប់ថ្នាក់ទី៦។',
            ],
            [
                'title' => 'MATH High Concepts - ថ្នាក់ទី១២',
                'author' => 'បណ្ឌិត គណិតវិទ្យាខ្មែរ',
                'cover_image' => '/images/book_math_blue.svg',
                'price' => 9.99,
                'description' => 'មេរៀនសង្ខេបស៊ីជម្រៅលើអនុគមន៍ ដេរីវេ អាំងតេក្រាល និងរូបមន្តអយល័រសម្រាប់ត្រៀមប្រឡងបាក់ឌុប និងអាហារូបករណ៍។',
            ],
            [
                'title' => 'ប្រវត្តិសាស្ត្រ និងអារ្យធម៌ខ្មែរ',
                'author' => 'វិទ្យាស្ថានជាតិស្រាវជ្រាវ',
                'cover_image' => '/images/book_cambodian_history.svg',
                'price' => 0.00,
                'description' => 'ការសិក្សាស្រាវជ្រាវប្រវត្តិសាស្ត្រខ្មែរសម័យអង្គរ សិល្បៈ ស្ថាបត្យកម្ម និងទស្សនវិជ្ជាបុរាណ។',
            ],
            [
                'title' => 'សិល្បៈរបាំព្រះរាជទ្រព្យ និងអប្សរា',
                'author' => 'សមាគមវប្បធម៌ខ្មែរ',
                'cover_image' => '/images/book_cambodian_apsara.svg',
                'price' => 8.00,
                'description' => 'កម្រងឯកសារស្តីពីកាយវិការ និងអត្ថន័យនៃរបាំបុរាណខ្មែរដែលជាសម្បត្តិបេតិកភណ្ឌពិភពលោក។',
            ],
            [
                'title' => 'ពិជគណិតកម្រិតខ្ពស់ (Advanced Algebra)',
                'author' => 'សាស្រ្តាចារ្យ អ៊ុក សុផល',
                'cover_image' => '/images/book_math_blue.svg',
                'price' => 14.00,
                'description' => 'លំហាត់ និងទ្រឹស្តីបទពិជគណិតលីនេអ៊ែរ ម៉ាទ្រីស និងប្រព័ន្ធសមីការពិជគណិតសម្រាប់ថ្នាក់ឧត្តម។',
            ],
            [
                'title' => 'ធរណីមាត្រវិភាគ (Analytic Geometry)',
                'author' => 'ក្រុមអ្នកស្រាវជ្រាវគណិតវិទ្យា',
                'cover_image' => '/images/book_math_teal.svg',
                'price' => 11.50,
                'description' => 'ការអនុវត្តកូអរដោនេក្នុងប្លង់ និងលំហ បន្ទាត់ ប្លង់ និងអង្កត់កាត់កោណយ៉ាងក្បោះក្បាយ។',
            ],
            [
                'title' => 'ទ្រឹស្តីប្រូបាប និងស្ថិតិ (Probability & Statistics)',
                'author' => 'ANONTAK Research',
                'cover_image' => '/images/book_math_green.svg',
                'price' => 18.00,
                'description' => 'គោលការណ៍គ្រឹះនៃប្រូបាប៊ីលីតេ បម្រែបម្រួលចៃដន្យ និងការវិភាគទិន្នន័យស្ថិតិគណិត។',
            ],
            [
                'title' => 'គណិតវិទ្យាត្រៀមប្រឡងបាក់ឌុប និទ្ទេស A',
                'author' => 'គ្រូឆ្នើមរាជធានីភ្នំពេញ',
                'cover_image' => '/images/book_math_polyhedron.svg',
                'price' => 0.00,
                'description' => 'វិញ្ញាសាជ្រើសរើសពិសេស និងដំណោះស្រាយលម្អិតត្រៀមប្រឡងសញ្ញាបត្រមធ្យមសិក្សាទុតិយភូមិ។',
            ],
            [
                'title' => 'រូបវិទ្យា និងគណិតវិទ្យាអនុវត្ត',
                'author' => 'បណ្ឌិត ឡាយ គីមសាន',
                'cover_image' => '/images/book_math_blue.svg',
                'price' => 16.50,
                'description' => 'ការប្រើប្រាស់ឧបករណ៍គណិតវិទ្យាក្នុងការដោះស្រាយបញ្ហារូបវិទ្យាមេកានិច និងអគ្គិសនី។',
            ],
            [
                'title' => 'ល្បងប្រាជ្ញា និងតក្កវិទ្យាគណិត',
                'author' => 'ANONTAK Publishing',
                'cover_image' => '/images/book_maths_yellow.jpg',
                'price' => 0.00,
                'description' => 'កម្រងល្បងប្រាជ្ញាគណិតវិទ្យា សំណួរគិតពិចារណា និងហ្គេមតក្កវិទ្យាសម្រាប់អភិវឌ្ឍខួរក្បាល។',
            ],
        ];

        foreach ($books as $bookData) {
            Book::firstOrCreate(
                ['title' => $bookData['title']],
                $bookData
            );
        }
    }
}
