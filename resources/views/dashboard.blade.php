<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ផ្ទាំងគ្រប់គ្រង - ANONTAK</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,300..700;1,300..700&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js"></script>
    <style>
        .cropper-view-box,
        .cropper-face {
            border-radius: 50%;
        }
        .cropper-view-box {
            outline: 2px solid #0284c7;
            outline-color: rgba(2, 132, 199, 0.85);
        }
        .cropper-dashed {
            border-color: rgba(255, 255, 255, 0.4);
        }
        .cropper-container {
            width: 100% !important;
            height: 100% !important;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 antialiased font-sans flex flex-col min-h-screen">

    @include('partials.header')

    <!-- Dashboard Content -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full">
        
        @php
            $activeTab = $errors->any() ? 'profile' : ($tab ?? 'books');
        @endphp
                            <span class="text-sm font-medium hidden sm:block">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-slate-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- Dropdown -->
                        <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-slate-100 py-2 z-50 text-sm">
                            <div class="px-4 py-2 text-xs text-slate-500 font-medium border-b border-slate-100 mb-1">
                                គណនីរបស់អ្នក
                            </div>
                            <a href="/dashboard" class="block px-4 py-2 hover:bg-slate-50 text-slate-700 font-medium">ផ្ទាំងគ្រប់គ្រង (Dashboard)</a>
                            <a href="/books" class="block px-4 py-2 hover:bg-slate-50 text-slate-600">សៀវភៅទាំងអស់</a>
                            <hr class="my-1 border-slate-100">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-red-600 hover:bg-red-50 font-medium">ចាកចេញ (Logout)</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>

    <!-- Dashboard Content -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full">
        
        <h1 class="text-3xl font-bold text-slate-900 mb-8" style="font-family: 'Kantumruy Pro', sans-serif;">
            ជំរាបសួរ, {{ Auth::user()->name }} 👋
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 flex flex-col items-center justify-center text-center">
                <div class="w-16 h-16 rounded-full bg-sky-50 text-sky-600 flex items-center justify-center mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h2 class="text-xl font-bold text-slate-800 mb-2">សៀវភៅរបស់អ្នក</h2>
                <p class="text-slate-500 mb-4 text-sm">មើលសៀវភៅដែលអ្នកបានទិញ ឬកំពុងអាន។</p>
                <a href="/books" class="px-5 py-2 bg-slate-900 text-white rounded-full text-sm font-semibold hover:bg-sky-600 transition-colors">ទៅកាន់បណ្ណាល័យ</a>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 flex flex-col items-center justify-center text-center">
                <div class="w-16 h-16 rounded-full bg-rose-50 text-rose-600 flex items-center justify-center mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h2 class="text-xl font-bold text-slate-800 mb-2">ប្រវត្តិសិក្សា</h2>
                <p class="text-slate-500 mb-4 text-sm">តាមដានវឌ្ឍនភាពនៃការអាន និងវគ្គសិក្សារបស់អ្នក។</p>
                <button class="px-5 py-2 bg-slate-100 text-slate-400 rounded-full text-sm font-semibold cursor-not-allowed">ឆាប់ៗនេះ</button>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 flex flex-col items-center justify-center text-center">
                <div class="w-16 h-16 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <h2 class="text-xl font-bold text-slate-800 mb-2">ការកំណត់គណនី</h2>
                <p class="text-slate-500 mb-4 text-sm">កែប្រែព័ត៌មានផ្ទាល់ខ្លួន និងសុវត្ថិភាព។</p>
                <button class="px-5 py-2 bg-slate-100 text-slate-400 rounded-full text-sm font-semibold cursor-not-allowed">ឆាប់ៗនេះ</button>
            </div>

        </div>
    </main>

    <script>
        function toggleUserMenu() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('hidden');
        }
        
        // Close dropdown when clicking outside
        window.addEventListener('click', function(e) {
            const btn = document.getElementById('userBtn');
            const dropdown = document.getElementById('userDropdown');
            if (btn && dropdown && !btn.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</body>
</html>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-10 flex flex-col items-center justify-center text-center">
                            <div class="w-16 h-16 rounded-full bg-sky-50 text-sky-600 flex items-center justify-center mb-4">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden flex flex-col group hover:shadow-md transition-shadow">
                                    <!-- Cover Placeholder -->
                                    <div class="h-40 bg-slate-50 flex items-center justify-center relative overflow-hidden">
                                        @if($book->cover_image)
                                            <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" class="w-full h-full object-cover">
                                    </div>
                                    <div class="p-5 flex-grow flex flex-col">
                                        <h3 class="font-bold text-slate-800 text-base line-clamp-1">{{ $book->title }}</h3>
                                        <p class="text-slate-500 text-xs mb-4 mt-0.5">ដោយ {{ $book->author }}</p>
                                        
                                        <!-- Progress Bar -->
                                        <div class="mt-auto">
                                            <div class="flex justify-between text-[11px] font-semibold mb-1">
                                                <span class="text-sky-600">{{ $book->pivot->progress }}% បានបញ្ចប់</span>
                    <!-- Books Section -->
                    <div class="mb-6 flex justify-between items-end">
                        <div>
                            <h2 class="text-2xl font-bold text-slate-900">សៀវភៅកំពុងអាន</h2>
                            <p class="text-slate-500 text-sm mt-1">តាមដានសៀវភៅដែលអ្នកកំពុងអានបន្ត។</p>
                        </div>
                        <a href="/books" class="text-sky-600 hover:text-sky-700 text-sm font-semibold">រុករកសៀវភៅ &rarr;</a>
                    </div>

                    @if($books->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($books as $book)
                                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden flex flex-col group hover:shadow-md transition-shadow">
                                    <!-- Cover Placeholder -->
                                    <div class="h-40 bg-slate-50 flex items-center justify-center relative overflow-hidden">
                                        @if($book->cover_image)
                                            <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="absolute inset-0 bg-gradient-to-br from-sky-400 to-indigo-500 opacity-20"></div>
                                            <svg class="w-12 h-12 text-sky-700/40 relative z-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                        @endif
                                    </div>
                                    <div class="p-5 flex-grow flex flex-col">
                                        <h3 class="font-bold text-slate-800 text-base line-clamp-1">{{ $book->title }}</h3>
                                        <p class="text-slate-500 text-xs mb-4 mt-0.5">ដោយ {{ $book->author }}</p>
                                        
                                        <!-- Progress Bar -->
                                        <div class="mt-auto">
                                            <div class="flex justify-between text-[11px] font-semibold mb-1">
                                                <span class="text-sky-600">{{ $book->pivot->progress }}% បានបញ្ចប់</span>
                                                <span class="text-slate-400">{{ $book->pivot->status === 'completed' ? 'បានបញ្ចប់' : 'កំពុងអាន' }}</span>
                                            </div>
                                            <div class="w-full bg-slate-100 rounded-full h-1.5 mb-4">
                                                <div class="bg-sky-500 h-1.5 rounded-full" style="width: {{ $book->pivot->progress }}%"></div>
                                            </div>
                                            <a href="/read-book/{{ $book->id }}" class="block w-full py-2.5 text-center bg-slate-900 text-white rounded-xl text-xs font-semibold hover:bg-slate-800 transition-colors">
                                                បន្តការអាន
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-10 flex flex-col items-center justify-center text-center">
                            <div class="w-16 h-16 rounded-full bg-sky-50 text-sky-600 flex items-center justify-center mb-4">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            </div>
                            <h2 class="text-xl font-bold text-slate-800 mb-2">អ្នកមិនទាន់មានសៀវភៅនៅឡើយទេ</h2>
                            <p class="text-slate-500 text-sm max-w-sm mx-auto mb-6">សូមស្វែងរក និងបន្ថែមសៀវភៅដែលអ្នកចូលចិត្តពីបណ្ណាល័យរបស់យើង ដើម្បីចាប់ផ្តើមអាន។</p>
                            <a href="/books" class="px-6 py-2.5 bg-slate-900 text-white rounded-xl text-sm font-semibold hover:bg-sky-600 transition-colors shadow-sm">
                                ស្វែងរកសៀវភៅឥឡូវនេះ
                            </a>
                        </div>
                    @endif
                </div>

                <div id="tab-content-exams" class="dashboard-tab-pane {{ $activeTab === 'exams' ? '' : 'hidden' }}">
                    <!-- Exams Section -->
                    <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div>
                            <h2 class="text-2xl font-bold text-slate-900">ការប្រឡងរបស់ខ្ញុំ</h2>
                            <p class="text-slate-500 text-sm mt-1">គ្រប់គ្រង និងតាមដានលទ្ធផលនៃការប្រឡងតេស្តសមត្ថភាពរបស់អ្នក។</p>
                        </div>
                        <a href="/mathematics" class="inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-xs font-bold transition-all shadow-xs self-start">
                            <span>ធ្វើតេស្តថ្មី</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        </a>
                    </div>

                    @if(isset($examAttempts) && $examAttempts->count() > 0)
                        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="w-full text-left border-collapse min-w-[600px]">
                                    <thead>
                                        <tr class="bg-slate-50 border-b border-slate-200 text-xs uppercase text-slate-500 font-bold tracking-wider">
                                            <th class="p-4">កាលបរិច្ឆេទ</th>
                                            <th class="p-4">វិញ្ញាសា</th>
                                            <th class="p-4">កម្រិត</th>
                                            <th class="p-4 text-center">ពិន្ទុ</th>
                                            <th class="p-4 text-center">លទ្ធផល</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100">
                                        @foreach($examAttempts as $attempt)
                                            <tr class="hover:bg-slate-50 transition-colors">
                                                <td class="p-4 text-sm text-slate-600 whitespace-nowrap">
                                                    {{ $attempt->completed_at ? \Carbon\Carbon::parse($attempt->completed_at)->format('d/m/Y H:i') : $attempt->created_at->format('d/m/Y') }}
                                                </td>
                                                <td class="p-4 text-sm font-semibold text-slate-900 min-w-[200px]">
                                                    {{ $attempt->exam->title ?? 'វិញ្ញាសាដែលត្រូវបានលុប' }}
                                                </td>
                                                <td class="p-4 text-sm text-slate-600 whitespace-nowrap">
                                                    {{ $attempt->exam->grade_level ?? '-' }}
                                                </td>
                                                <td class="p-4 text-center text-sm font-bold whitespace-nowrap {{ ($attempt->score / max(1, $attempt->exam?->questions->count() ?? 1)) >= (($attempt->exam?->passing_score ?? 50) / 100) ? 'text-emerald-600' : 'text-rose-600' }}">
                                                    {{ $attempt->score }} / {{ $attempt->exam?->questions->count() ?? '10' }}
                                                </td>
                                                <td class="p-4 text-center whitespace-nowrap">
                                                    @if(($attempt->score / max(1, $attempt->exam?->questions->count() ?? 1)) >= (($attempt->exam?->passing_score ?? 50) / 100))
                                                        <span class="px-2.5 py-1 bg-emerald-100 text-emerald-700 text-xs font-bold rounded-lg border border-emerald-200">ជាប់</span>
                                                    @else
                                                        <span class="px-2.5 py-1 bg-rose-100 text-rose-700 text-xs font-bold rounded-lg border border-rose-200">ធ្លាក់</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-10 flex flex-col items-center justify-center text-center">
                            <div class="w-16 h-16 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center mb-4">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                            </div>
                            <h2 class="text-xl font-bold text-slate-800 mb-2">មិនមានទិន្នន័យប្រឡងទេ</h2>
                            <p class="text-slate-500 text-sm max-w-sm mx-auto mb-6">អ្នកមិនទាន់មានប្រវត្តិធ្វើតេស្តប្រឡងនៅឡើយទេ។ សូមចូលរួមការប្រឡងដើម្បីវាស់ស្ទង់សមត្ថភាព។</p>
                            <a href="/mathematics" class="px-6 py-2.5 bg-indigo-600 text-white rounded-xl text-sm font-semibold hover:bg-indigo-700 transition-colors shadow-sm">
                                ធ្វើតេស្តឥឡូវនេះ
                            </a>
                        </div>
                    @endif
                </div>

                <div id="tab-content-profile" class="dashboard-tab-pane {{ $activeTab === 'profile' ? '' : 'hidden' }}">
                    <!-- Profile Section -->
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-slate-900">ព័ត៌មានផ្ទាល់ខ្លួន</h2>
                        <p class="text-slate-500 text-sm mt-1">ធ្វើបច្ចុប្បន្នភាពឈ្មោះ អ៊ីមែល និងពាក្យសម្ងាត់របស់អ្នក។</p>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 md:p-8">
                        <form action="{{ route('dashboard.profile.update') }}" method="POST" enctype="multipart/form-data" class="max-w-xl">
                            @csrf
                            
                            <!-- Profile Photo -->
                            <div class="mb-8">
                                <label class="block text-sm font-semibold text-slate-700 mb-2">រូបថតគណនី (Profile Photo)</label>
                                <div class="flex items-center gap-5">
                                    <div class="relative group">
                                        <img id="avatarPreview" 
                                             src="{{ Auth::user()->profile_photo_url ?? '' }}" 
                                             alt="{{ Auth::user()->name }}" 
                                             class="w-20 h-20 rounded-full object-cover ring-4 ring-slate-100 shadow-inner {{ Auth::user()->profile_photo_url ? '' : 'hidden' }}">
                                        
                                        <div id="avatarFallback" 
                                             class="w-20 h-20 rounded-full bg-sky-100 text-sky-700 flex items-center justify-center font-bold text-2xl ring-4 ring-slate-100 shadow-inner {{ Auth::user()->profile_photo_url ? 'hidden' : '' }}">
                                            {{ substr(Auth::user()->name, 0, 1) }}
                                        </div>
                                            
                                            <button type="button" onclick="document.getElementById('photoInput').click()" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs sm:text-sm font-semibold transition-colors flex items-center gap-2 border border-slate-200 cursor-pointer">
                                                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                ជ្រើសរើសរូបភាព
                                            </button>

                                            <button type="button" 
                                        <p class="text-xs text-slate-400">ទ្រង់ទ្រាយ៖ JPG, PNG, WEBP, GIF (ទំហំអតិបរមា 2MB)</p>
                                    </div>
                                </div>
                                @error('photo')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-5">
                                                    id="removePhotoBtn" 
                                                    onclick="removeSelectedPhoto()" 
                                                    class="px-3 py-2 text-rose-600 hover:bg-rose-50 rounded-xl text-xs sm:text-sm font-semibold transition-colors cursor-pointer {{ Auth::user()->profile_photo_url ? '' : 'hidden' }}">
                                                លុបរូបភាព
                                            </button>
                                        </div>
                                        
                                        <div id="cropBadge" class="hidden text-xs text-emerald-700 bg-emerald-50 border border-emerald-200 px-3 py-1.5 rounded-xl flex items-center gap-1.5 mt-1">
                                            <svg class="w-4 h-4 shrink-0 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                            <span>រូបភាពត្រូវបានកាត់តម្រឹមរួចរាល់! សូមចុច <strong>«រក្សាទុកការផ្លាស់ប្តូរ»</strong> ខាងក្រោម។</span>
                                        </div>

                                        <p class="text-xs text-slate-400">ទ្រង់ទ្រាយ៖ JPG, PNG, WEBP, GIF (ទំហំអតិបរមា 2MB) — អាចកាត់តម្រឹម (Crop) ជារង្វង់តាមចិត្ត</p>
                                    </div>
                                </div>
                                @error('photo')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                                </div>
                                @error('photo')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label class="block text-sm font-semibold text-slate-700 mb-2">ឈ្មោះពេញ</label>
                                <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-sky-500 focus:ring focus:ring-sky-200 focus:ring-opacity-50 transition-colors bg-slate-50">
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-5">
                                <label class="block text-sm font-semibold text-slate-700 mb-2">អាសយដ្ឋានអ៊ីមែល</label>
                                <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-sky-500 focus:ring focus:ring-sky-200 focus:ring-opacity-50 transition-colors bg-slate-50">
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <hr class="my-8 border-slate-200">
                            
                            <h3 class="text-lg font-bold text-slate-900 mb-4">ប្តូរពាក្យសម្ងាត់ (មិនចាំបាច់ទេបើមិនចង់ប្តូរ)</h3>

                            <div class="mb-5">
                                <label class="block text-sm font-semibold text-slate-700 mb-2">ពាក្យសម្ងាត់ថ្មី</label>
                                <input type="password" name="password" class="w-full px-4 py-2.5 rounded-xl border border-slate-300 focus:border-sky-500 focus:ring focus:ring-sky-200 focus:ring-opacity-50 transition-colors bg-slate-50">
                                @error('password')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    alert('ទំហំរូបភាពមិនត្រូវលើសពី 2MB ឡើយ។');
                    input.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('avatarPreview');
                    const fallback = document.getElementById('avatarFallback');

    <script>
        function toggleUserMenu() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('hidden');
        }
        
        // Close dropdown when clicking outside
        window.addEventListener('click', function(e) {
            const btn = document.getElementById('userBtn');
            const dropdown = document.getElementById('userDropdown');
            if (btn && dropdown && !btn.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });

        function switchDashboardTab(tabName, event) {
            if (event) {
                event.preventDefault();
            }

            const panes = document.querySelectorAll('.dashboard-tab-pane');
            panes.forEach(pane => pane.classList.add('hidden'));

            const targetPane = document.getElementById('tab-content-' + tabName);
            if (targetPane) {
                targetPane.classList.remove('hidden');
            }

            const tabs = ['books', 'exams', 'profile'];
            tabs.forEach(t => {
                const btn = document.getElementById('tab-btn-' + t);
                if (btn) {
                    if (t === tabName) {
                        btn.className = 'flex items-center gap-3 px-4 py-3 rounded-xl font-medium bg-sky-50 text-sky-700 transition-colors cursor-pointer';
                    } else {
                        btn.className = 'flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-slate-600 hover:bg-slate-50 transition-colors cursor-pointer';
                    }
                }
            });

            const newUrl = new URL(window.location);
            newUrl.searchParams.set('tab', tabName);
            window.history.pushState({}, '', newUrl);
        }

        window.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const tabParam = urlParams.get('tab');
            if (tabParam && ['books', 'exams', 'profile'].includes(tabParam)) {
            });

            const newUrl = new URL(window.location);
            newUrl.searchParams.set('tab', tabName);
            window.history.pushState({}, '', newUrl);
        }

        window.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const tabParam = urlParams.get('tab');
            if (tabParam && ['books', 'exams', 'profile'].includes(tabParam)) {
                switchDashboardTab(tabParam);
            }
        });

        // --- CROP PROFILE PHOTO SYSTEM ---
        let cropperInstance = null;
        let currentRawPhotoData = null;

        function handlePhotoSelected(input) {
            if (input.files && input.files[0]) {
                const file = input.files[0];

                if (!file.type.match(/^image\//)) {
                    alert('សូមជ្រើសរើសឯកសាររូបភាពត្រឹមត្រូវ (JPG, PNG, WEBP, GIF)។');
                    input.value = '';
                    return;
                }

                // Check file size (max 5MB for uploading, will be optimized when cropped)
                if (file.size > 5 * 1024 * 1024) {
                    alert('ទំហំរូបភាពដើមធំពេក (មិនត្រូវលើសពី 5MB ឡើយ)។');
                    input.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    currentRawPhotoData = e.target.result;
                    openCropModal(currentRawPhotoData);
                };
                reader.readAsDataURL(file);
            }
        }

        function openCropModal(imageSrc) {
            const modal = document.getElementById('cropModal');
            const image = document.getElementById('cropImageTarget');
            if (!modal || !image) return;

            modal.classList.remove('hidden');

            if (cropperInstance) {
                cropperInstance.destroy();
                cropperInstance = null;
            }

            image.src = imageSrc;

            const initCropper = function() {
                if (cropperInstance) {
                    cropperInstance.destroy();
                    cropperInstance = null;
                }

                if (typeof Cropper !== 'undefined') {
                    cropperInstance = new Cropper(image, {
                        aspectRatio: 1,
                        viewMode: 1,
                        dragMode: 'move',
                        autoCropArea: 0.9,
            if (currentRawPhotoData) {
                openCropModal(currentRawPhotoData);
            } else {
                const preview = document.getElementById('avatarPreview');
                if (preview && preview.src) {
                    openCropModal(preview.src);
                }
            }
        }

        function zoomCrop(delta) {
            if (cropperInstance) {
                cropperInstance.zoom(delta);
            }
        }

        function rotateCrop(degree) {
            if (cropperInstance) {
                cropperInstance.rotate(degree);
            }
        }

        function resetCrop() {
            if (cropperInstance) {
                cropperInstance.reset();
            }
        }

        function cancelCrop() {
            const modal = document.getElementById('cropModal');
            if (modal) modal.classList.add('hidden');

            if (cropperInstance) {
                cropperInstance.destroy();
                cropperInstance = null;
            }

            const croppedInput = document.getElementById('croppedPhotoInput');
            if (!croppedInput.value && !currentRawPhotoData) {
                const photoInput = document.getElementById('photoInput');
                if (photoInput) photoInput.value = '';
            }
        }

        function applyCrop() {
            const preview = document.getElementById('avatarPreview');
            const fallback = document.getElementById('avatarFallback');
            const removeBtn = document.getElementById('removePhotoBtn');
            const removeInput = document.getElementById('removePhotoInput');
            const croppedInput = document.getElementById('croppedPhotoInput');
            const recropBtn = document.getElementById('recropBtn');
            const cropBadge = document.getElementById('cropBadge');
            const photoInput = document.getElementById('photoInput');

            if (cropperInstance) {
                const canvas = cropperInstance.getCroppedCanvas({
                    width: 400,
                    height: 400,
                    imageSmoothingQuality: 'high',
                });

                if (canvas) {
                    const croppedDataUrl = canvas.toDataURL('image/jpeg', 0.92);

                    // 1. Update Preview in Profile Page
                    if (preview && fallback) {
                        preview.src = croppedDataUrl;
                        preview.classList.remove('hidden');
                        fallback.classList.add('hidden');
                    }

                    // 2. Put into base64 input for fallback
                    if (croppedInput) {
                        croppedInput.value = croppedDataUrl;
                    }

                    // 3. Put into File input using DataTransfer
                    canvas.toBlob(function(blob) {
                        if (blob && photoInput) {
                            try {
                                const file = new File([blob], 'avatar.jpg', { type: 'image/jpeg' });
                                const dt = new DataTransfer();
                                dt.items.add(file);
                                photoInput.files = dt.files;
                            } catch (err) {
                                console.warn('DataTransfer not supported, falling back to base64 input', err);
                            }
                        }
                    }, 'image/jpeg', 0.92);

                    if (removeBtn) removeBtn.classList.remove('hidden');
                    if (recropBtn) recropBtn.classList.remove('hidden');
                    if (cropBadge) cropBadge.classList.remove('hidden');
                    if (removeInput) removeInput.value = '0';
                }
            } else {
                // If cropper failed to load, keep raw image
                if (currentRawPhotoData && preview && fallback) {
                    preview.src = currentRawPhotoData;
                    preview.classList.remove('hidden');
                    fallback.classList.add('hidden');
                    if (croppedInput) croppedInput.value = currentRawPhotoData;
                    if (removeBtn) removeBtn.classList.remove('hidden');
                }
            }

            cancelCrop();
        }

        function removeSelectedPhoto() {
            const preview = document.getElementById('avatarPreview');
            const fallback = document.getElementById('avatarFallback');
            const input = document.getElementById('photoInput');
            const removeBtn = document.getElementById('removePhotoBtn');
            const removeInput = document.getElementById('removePhotoInput');
            const croppedInput = document.getElementById('croppedPhotoInput');
            const recropBtn = document.getElementById('recropBtn');
            const cropBadge = document.getElementById('cropBadge');

            if (input) input.value = '';
            if (croppedInput) croppedInput.value = '';
            currentRawPhotoData = null;

            if (preview) {
                preview.src = '';
                preview.classList.add('hidden');
            }
            if (fallback) {
                fallback.classList.remove('hidden');
            }
            if (removeBtn) {
                removeBtn.classList.add('hidden');
            }
            if (recropBtn) {
                recropBtn.classList.add('hidden');
            }
            if (cropBadge) {
                cropBadge.classList.add('hidden');
            }
            if (removeInput) {
                removeInput.value = '1';
            }
        }
    
    </script>

    <!-- CROP PROFILE PHOTO MODAL -->
    <div id="cropModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-slate-900/75 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-lg w-full p-6 sm:p-7 shadow-2xl border border-slate-100 relative animate-in fade-in zoom-in-95 duration-200">
            <!-- Close Button -->
            <button type="button" onclick="cancelCrop()" class="absolute top-5 right-5 text-slate-400 hover:text-slate-700 p-1.5 rounded-xl hover:bg-slate-100 transition-colors cursor-pointer" title="បិទ">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <!-- Header -->
            <div class="mb-4 pr-8">
                <h3 class="text-lg sm:text-xl font-bold text-slate-900" style="font-family: 'Kantumruy Pro', sans-serif;">
                    កាត់តម្រឹមរូបថតគណនី (Crop Profile Photo)
                </h3>
                <p class="text-xs text-slate-500 mt-1">
                    រំកិល ពង្រីក ឬបង្រួម ដើម្បីជ្រើសរើសទំហំរូបថតដែលអ្នកពេញចិត្ត។
                </p>
            </div>

            <!-- Image Cropping Canvas Area -->
            <div class="relative w-full h-72 sm:h-80 bg-slate-950 rounded-2xl overflow-hidden flex items-center justify-center border border-slate-800 shadow-inner">
                <img id="cropImageTarget" src="" alt="រូបភាពសម្រាប់កាត់តម្រឹម" class="max-w-full max-h-full block">
            </div>

            <!-- Toolbar & Live Preview -->
            <div class="mt-4 flex flex-wrap items-center justify-between gap-3 p-3 bg-slate-50 rounded-2xl border border-slate-100">
                <!-- Transform Buttons -->
                <div class="flex items-center gap-1.5">
                    <button type="button" onclick="zoomCrop(-0.1)" title="Zoom Out (បង្រួម)" class="p-2 rounded-xl bg-white text-slate-700 hover:bg-slate-100 border border-slate-200 transition-colors shadow-2xs cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>
                    </button>
                    <button type="button" onclick="zoomCrop(0.1)" title="Zoom In (ពង្រីក)" class="p-2 rounded-xl bg-white text-slate-700 hover:bg-slate-100 border border-slate-200 transition-colors shadow-2xs cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    </button>
                    <button type="button" onclick="rotateCrop(-90)" title="Rotate Left 90° (បង្វិលឆ្វេង)" class="p-2 rounded-xl bg-white text-slate-700 hover:bg-slate-100 border border-slate-200 transition-colors shadow-2xs cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a5 5 0 015 5v2m0 0l3-3m-3 3l-3-3M3 10l3-3m-3 3l3 3"/></svg>
                    </button>
                    <button type="button" onclick="rotateCrop(90)" title="Rotate Right 90° (បង្វិលស្តាំ)" class="p-2 rounded-xl bg-white text-slate-700 hover:bg-slate-100 border border-slate-200 transition-colors shadow-2xs cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 10H11a5 5 0 00-5 5v2m0 0l-3-3m3 3l3-3M21 10l-3-3m3 3l-3 3"/></svg>
                    </button>
                    <button type="button" onclick="resetCrop()" title="Reset (កំណត់ឡើងវិញ)" class="px-2.5 py-1.5 rounded-xl bg-white text-slate-700 hover:bg-slate-100 border border-slate-200 transition-colors text-xs font-semibold shadow-2xs cursor-pointer">
                        កំណត់ឡើងវិញ
                    </button>
                </div>

                <!-- Live Circle Preview Box -->
                <div class="flex items-center gap-2">
                    <span class="text-[11px] text-slate-500 font-medium">គំរូ៖</span>
                    <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-sky-400 bg-white shadow-xs shrink-0">
                        <div id="cropLivePreview" class="w-full h-full overflow-hidden rounded-full"></div>
                    </div>
                </div>
            </div>

            <!-- Footer Action Buttons -->
            <div class="mt-5 flex items-center justify-end gap-3 pt-3 border-t border-slate-100">
                <button type="button" onclick="cancelCrop()" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-700 hover:bg-slate-100 text-xs font-semibold transition-colors cursor-pointer">
                    បោះបង់ (Cancel)
                </button>
                <button type="button" onclick="applyCrop()" class="px-6 py-2.5 rounded-xl bg-sky-600 hover:bg-sky-500 text-white text-xs font-bold transition-colors shadow-sm cursor-pointer flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    រក្សាទុកការកាត់តម្រឹម
                </button>
            </div>
        </div>
    </div>

    @include('partials.footer')
</body>
</html>
