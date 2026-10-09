<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ANONTAK - គេហទំព័រគណិតវិទ្យា និងការអប់រំ (Math Learning Platform)</title>
    
    <meta name="description" content="ANONTAK - គេហទំព័រចែករំលែកចំណេះដឹងគណិតវិទ្យា សៀវភៅពុម្ព មេរៀនសង្ខេប លំហាត់អនុវត្ត និងសម្ភារៈបង្រៀនគ្រប់កម្រិត។">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,300..700;1,300..700&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fcfdfd] text-slate-800 antialiased font-sans selection:bg-sky-500 selection:text-white">

    @include('partials.header')

    <!-- 1. Hero Chalkboard Banner with Interactive Slider -->
    <section class="relative w-full overflow-hidden bg-slate-950 group">
        <div class="relative w-full aspect-[21/9] sm:aspect-[24/9] md:aspect-[3/1] max-h-[520px] min-h-[260px] flex items-center justify-center">
            
            <!-- Slide 1 (Current Active Banner) -->
            <div id="heroSlide1" class="hero-slide absolute inset-0 w-full h-full opacity-100 transition-opacity duration-700">
                <img src="/images/hero_math_blackboard.jpg" 
                     alt="Math Blackboard with Formulas and Calculus" 
                     class="w-full h-full object-cover object-center select-none" />
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/40 via-transparent to-slate-950/20 pointer-events-none"></div>
            </div>

            <!-- Slide 2 -->
            <div id="heroSlide2" class="hero-slide absolute inset-0 w-full h-full opacity-0 pointer-events-none transition-opacity duration-700 bg-gradient-to-r from-slate-900 via-slate-800 to-indigo-950 flex items-center justify-center px-6">
                <div class="text-center max-w-3xl text-white">
                    <span class="inline-block px-3 py-1 rounded-full bg-sky-500/20 text-sky-300 text-xs font-semibold tracking-wider uppercase mb-3 border border-sky-400/30">
                        ចំណេះដឹងគណិតវិទ្យា
                    </span>
                    <h2 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight mb-3">
                        រៀនគណិតវិទ្យាកម្រិតខ្ពស់ និងលំហាត់ត្រៀមប្រឡង
                    </h2>
                    <p class="text-sm sm:text-base text-slate-300 max-w-xl mx-auto mb-5">
                        ពន្យល់លម្អិតពីរូបមន្ត ដំណោះស្រាយគណិតវិទ្យា និងវិធីសាស្ត្រគិតរហ័ស
                    </p>
                    <a href="#books" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-sky-500 hover:bg-sky-400 text-white font-medium text-sm transition-all shadow-lg shadow-sky-500/30">
                        រុករកសៀវភៅឥឡូវនេះ
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>

            <!-- Slide 3 -->
            <div id="heroSlide3" class="hero-slide absolute inset-0 w-full h-full opacity-0 pointer-events-none transition-opacity duration-700 bg-gradient-to-r from-teal-950 via-slate-900 to-slate-950 flex items-center justify-center px-6">
                <div class="text-center max-w-3xl text-white">
                    <span class="inline-block px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-semibold tracking-wider uppercase mb-3 border border-emerald-400/30">
                        ជំនួយការកិច្ចការផ្ទះ ២៤/៧
                    </span>
                    <h2 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight mb-3">
                        ដោះស្រាយលំហាត់ពិបាកៗបានយ៉ាងងាយស្រួល
                    </h2>
                    <button onclick="openModal('homeworkModal')" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-emerald-500 hover:bg-emerald-400 text-white font-medium text-sm transition-all shadow-lg shadow-emerald-500/30 cursor-pointer">
                        សាកល្បងសួរលំហាត់
                    </button>
                </div>
            </div>

            <!-- Carousel Controls (Previous / Next) -->
            <button onclick="prevSlide()" class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-black/40 hover:bg-black/70 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 cursor-pointer z-20 backdrop-blur-xs" aria-label="Previous Slide">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </button>
            <button onclick="nextSlide()" class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-black/40 hover:bg-black/70 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 cursor-pointer z-20 backdrop-blur-xs" aria-label="Next Slide">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </button>

            <!-- Slider Dots (Exact match to screenshot 3 dots at bottom center) -->
            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex items-center gap-2 z-20">
                <button onclick="setSlide(1)" id="dot1" class="w-2.5 h-2.5 rounded-full bg-sky-400 transition-all duration-300" aria-label="Slide 1"></button>
                <button onclick="setSlide(2)" id="dot2" class="w-2.5 h-2.5 rounded-full bg-white/50 hover:bg-white transition-all duration-300" aria-label="Slide 2"></button>
                <button onclick="setSlide(3)" id="dot3" class="w-2.5 h-2.5 rounded-full bg-white/50 hover:bg-white transition-all duration-300" aria-label="Slide 3"></button>
            </div>
        </div>
    </section>

    <!-- 2. Featured Promo / Mobile App & Math Puzzle Section (ថ្នាក់បង្រៀន) -->
    <section id="classes" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14 scroll-mt-20">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 lg:gap-8 items-center bg-white p-6 sm:p-8 rounded-2xl border border-slate-100 shadow-sm">
            
            <!-- Left: Mobile Phone Video Preview Mockup -->
            <div class="md:col-span-4 flex justify-center">
                <div class="relative w-56 sm:w-64 aspect-square rounded-2xl overflow-hidden shadow-md group cursor-pointer" onclick="openModal('videoModal')">
                    <img src="/images/phone_app_mockup.jpg" 
                         alt="Math App Video Lesson Mockup" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                    <!-- Play button pulse overlay -->
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 flex items-center justify-center transition-colors">
                        <div class="w-14 h-14 rounded-full bg-white/90 text-sky-600 flex items-center justify-center shadow-lg group-hover:scale-110 group-hover:bg-white transition-all">
                            <svg class="w-7 h-7 translate-x-0.5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z" />
                            </svg>
                        </div>
                    </div>
                    <div class="absolute bottom-2 left-2 right-2 bg-slate-900/75 backdrop-blur-xs text-white text-[11px] py-1 px-2.5 rounded-lg text-center font-medium">
                        ចុចដើម្បីមើលវីដេអូបង្រៀនគំរូ
                    </div>
                </div>
            </div>

            <!-- Center: App Promo Description & CTA -->
            <div class="md:col-span-4 text-left flex flex-col justify-center space-y-3">
                <h3 class="text-xl sm:text-2xl font-bold text-slate-900 leading-snug">
                    ទាញយកកម្មវិធីទូរស័ព្ទដៃឥតគិតថ្លៃ
                </h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    លោកអ្នកអាចធ្វើការទាញយកកម្មវិធីទូរស័ព្ទដៃនេះដើម្បីរៀនគណិតវិទ្យាបានគ្រប់ពេលវេលា និងគ្រប់ទីកន្លែង។ កម្មវិធីនេះមានមេរៀនជាច្រើន លំហាត់អនុវត្ត និងដំណោះស្រាយជាច្រើនផងដែរ។
                </p>
                <div class="pt-2">
                    <button onclick="openModal('downloadModal')" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-sky-500 hover:bg-sky-600 text-white font-medium text-sm transition-all shadow-sm hover:shadow hover:-translate-y-0.5 cursor-pointer">
                        <span>ទាញយកកម្មវិធី</span>
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    </button>
                </div>
            </div>

            <!-- Right: Interactive Math Puzzle Card -->
            <div class="md:col-span-4 flex justify-center">
                <div class="w-full max-w-xs bg-slate-50 border border-slate-200/80 rounded-xl p-5 shadow-xs flex flex-col justify-between text-center relative overflow-hidden">
                    <div class="absolute -top-10 -right-10 w-24 h-24 bg-sky-100 rounded-full blur-xl pointer-events-none"></div>

                    <div class="mb-3">
                        <span class="text-xs font-semibold tracking-wider text-slate-500 uppercase">លំហាត់ប្រចាំថ្ងៃ (Daily Puzzle)</span>
                    </div>

                    <!-- Math formula display -->
                    <div class="space-y-2 py-3 bg-white rounded-lg border border-slate-200/60 font-mono text-lg sm:text-xl font-bold text-slate-800 tracking-wide shadow-2xs">
                        <div class="text-sky-700">A + B = 32</div>
                        <div class="text-indigo-700">A - B = 18</div>
                        <div class="text-rose-600 border-t border-slate-100 pt-2 font-black">A &times; B = ?</div>
                    </div>

                    <!-- Action solve button -->
                    <button onclick="openMathPuzzleSolver()" class="mt-4 w-full py-2.5 px-3 rounded-lg bg-sky-100 hover:bg-sky-200 text-sky-800 font-semibold text-sm flex items-center justify-between transition-colors cursor-pointer group">
                        <span class="text-left font-sans">ដោះស្រាយលំហាត់នេះ</span>
                        <span class="font-bold text-sky-600 group-hover:translate-x-1 transition-transform">&gt;&gt;</span>
                    </button>
                </div>
            </div>

        </div>
    </section>

    <!-- 3. Mathematics Books Carousel & Showcase (សៀវភៅគណិតវិទ្យា) -->
    <section id="books" class="py-12 bg-[#fffdfb] border-t border-b border-orange-50/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="mb-8 flex items-end justify-between">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                        សៀវភៅគណិតវិទ្យា
                    </h2>
                    <p class="text-sm text-slate-500 mt-1">កម្រងសៀវភៅពុម្ព និងឯកសារជំនួយស្មារតីគណិតវិទ្យាគ្រប់កម្រិត</p>
                </div>
                <div class="hidden sm:flex items-center gap-2">
                    <button onclick="scrollBooks('left')" class="p-2 rounded-full border border-slate-200 hover:bg-slate-100 text-slate-600 transition-colors cursor-pointer" aria-label="Previous Books">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <button onclick="scrollBooks('right')" class="p-2 rounded-full border border-slate-200 hover:bg-slate-100 text-slate-600 transition-colors cursor-pointer" aria-label="Next Books">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>

            <!-- Books Grid / Carousel (5 Books exactly matching user's visual) -->
            <div id="booksContainer" class="flex gap-4 sm:gap-6 overflow-x-auto pb-4 pt-2 snap-x scroll-smooth no-scrollbar">
                
                                @foreach($recentBooks as $book)
                    <div class="flex-none w-48 sm:w-56 book-card bg-white rounded-xl overflow-hidden border border-slate-200/80 shadow-sm snap-start group flex flex-col">
                        <div class="aspect-[3/4] w-full overflow-hidden bg-slate-100 relative">
                            @php
                                if ($book->cover_image) {
                                    $bookImg = str_starts_with($book->cover_image, '/') || str_starts_with($book->cover_image, 'http') 
                                        ? $book->cover_image 
                                        : Storage::url($book->cover_image);
                                } else {
                                    $bookImg = '/images/book_math_blue.svg';
                                }
                            @endphp
                            <img src="{{ $bookImg }}" alt="{{ $book->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                            @if($book->priority > 0)
                                <span class="absolute top-2 left-2 px-1.5 py-0.5 rounded text-[9px] font-bold bg-sky-500 text-white shadow-2xs">ពិសេស</span>
                            @endif
                            <span class="absolute top-2 right-2 px-2 py-0.5 rounded text-[10px] font-bold bg-amber-500 text-white shadow-2xs">${{ number_format($book->price, 2) }}</span>
                        </div>
                        <div class="p-3.5 flex-1 flex flex-col justify-between">
                            <div>
                                <h4 class="font-bold text-slate-900 text-sm line-clamp-1">{{ $book->title }}</h4>
                                <p class="text-xs text-slate-500 mt-0.5">{{ $book->author }}</p>
                            </div>
                            <button onclick="previewBook('{{ addslashes($book->title) }}', '{{ addslashes($book->description ?? '') }}', '{{ $bookImg }}')" class="mt-3 w-full py-1.5 rounded-lg bg-slate-100 hover:bg-sky-500 hover:text-white text-slate-700 text-xs font-semibold transition-colors cursor-pointer">
                                មើលលម្អិត
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- 4. Cyan / Vivid Blue Homework Problem Banner (Exact match to screenshot) -->
    <section class="bg-gradient-to-r from-sky-600 via-sky-500 to-cyan-500 py-10 sm:py-12 text-white relative overflow-hidden shadow-inner">
        <!-- Subtle math symbols watermark -->
        <div class="absolute inset-0 opacity-10 flex items-center justify-around text-6xl font-serif pointer-events-none select-none">
            <span>&int;</span>
            <span>&sum;</span>
            <span>&infin;</span>
            <span>&radic;</span>
            <span>&pi;</span>
            <span>&Delta;</span>
        </div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center relative z-10 space-y-5">
            <h3 class="text-xl sm:text-2xl md:text-3xl font-bold leading-relaxed tracking-tight text-white drop-shadow-xs">
                តើលោកអ្នកមានបញ្ហានឹងកិច្ចការផ្ទះដែលដោះស្រាយមិនទាន់រួចរាល់មែនទេ ?
            </h3>
            <div>
                <button onclick="openModal('homeworkModal')" class="inline-flex items-center gap-2 px-7 py-3 rounded-lg bg-white hover:bg-slate-50 text-sky-600 hover:text-sky-700 font-bold text-sm sm:text-base shadow-md hover:shadow-lg transition-all hover:scale-105 cursor-pointer">
                    <span>សូមចុចទីនេះដើម្បីសួរ ឬដោះស្រាយ</span>
                </button>
            </div>
        </div>
    </section>

    <!-- 5. Literature & Cambodian Cultural Heritage (ចំណាប់អារម្មណ៍សៀវភៅ) -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <div class="bg-[#fff9f6] border border-orange-100/80 rounded-2xl p-6 sm:p-10 shadow-xs">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6 lg:gap-8 items-center">
                
                <!-- Left: Cambodian Book Cover (Angkor / Apsara) -->
                <div class="md:col-span-3 flex justify-center">
                    <div class="w-48 sm:w-52 aspect-[3/4] rounded-xl overflow-hidden shadow-md border border-amber-200/80 book-card">
                        <img src="/images/book_cambodian_apsara.svg" alt="Cambodian Heritage Book" class="w-full h-full object-cover" />
                    </div>
                </div>

                <!-- Center: Khmer Description Text & Action -->
                <div class="md:col-span-6 space-y-3.5 text-left">
                    <h3 class="text-xl sm:text-2xl font-bold text-slate-900">
                        ចំណាប់អារម្មណ៍សៀវភៅ
                    </h3>
                    <p class="text-slate-700 text-sm leading-relaxed">
                        ការសិក្សាគណិតវិទ្យាមិនត្រឹមតែជាការគិតលេខប៉ុណ្ណោះទេ ប៉ុន្តែវាក៏ផ្សារភ្ជាប់យ៉ាងជិតស្និទ្ធទៅនឹងការស្រាវជ្រាវប្រវត្តិសាស្ត្រ ស្ថាបត្យកម្មប្រាសាទបុរាណខ្មែរ និងការរីកចម្រើននៃអក្សរសិល្ប៍ជាតិ។ សៀវភៅទាំងនេះជួយបើកទូលាយការគិតពិចារណា និងបង្កើនចំណេះដឹងទូទៅ។
                    </p>
                    <div class="pt-2">
                        <button onclick="openModal('literatureModal')" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-lg bg-sky-100 hover:bg-sky-200 text-sky-800 text-xs sm:text-sm font-semibold transition-colors cursor-pointer">
                            <span>អានបន្ថែម</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>

                <!-- Right: Cambodian History Book Cover -->
                <div class="md:col-span-3 flex justify-center">
                    <div class="w-48 sm:w-52 aspect-[3/4] rounded-xl overflow-hidden shadow-md border border-amber-200/80 book-card">
                        <img src="/images/book_cambodian_history.svg" alt="Cambodian History Book" class="w-full h-full object-cover" />
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 6. Teaching Equipment & Materials (សំភារៈបង្រៀន) -->
    <section id="teaching-materials" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14 scroll-mt-20">
        <div class="mb-8">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                សំភារៈបង្រៀន
            </h2>
            <p class="text-sm text-slate-500 mt-1">ឧបករណ៍ និងសម្ភារៈជំនួយការបង្រៀន និងការរៀនគណិតវិទ្យាជាក់ស្ដែង</p>
        </div>

        <!-- 5 Tool Cards (Exact items from the screenshot) -->
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4 sm:gap-6">
            
            @foreach($recentMaterials as $material)
            <div class="tool-card bg-white rounded-xl border border-slate-200/80 p-3 shadow-xs flex flex-col items-center group cursor-pointer" onclick="viewTool('{{ addslashes($material->name) }}', '{{ addslashes($material->description ?? '') }}')">
                <div class="w-full aspect-square rounded-lg overflow-hidden bg-slate-50 flex items-center justify-center p-2 relative">
                    @php
                        if ($material->image) {
                            $matImg = str_starts_with($material->image, '/') || str_starts_with($material->image, 'http') 
                                ? $material->image 
                                : Storage::url($material->image);
                        } else {
                            $matImg = '/images/tool_books.svg';
                        }
                    @endphp
                    <img src="{{ $matImg }}" alt="{{ $material->name }}" class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-300" />
                    @if($material->is_featured)
                        <span class="absolute top-1 right-1 px-1.5 py-0.5 rounded text-[8px] font-bold bg-sky-500 text-white">ពិសេស</span>
                    @endif
                </div>
                <span class="mt-2.5 text-xs font-semibold text-slate-700 text-center line-clamp-1 group-hover:text-sky-600 transition-colors">{{ $material->name }}</span>
            </div>
            @endforeach

        </div>
    </section>

    <!-- 7. Recent Articles (អត្ថបទថ្មីៗ) -->
    <section id="articles" class="bg-slate-50/70 border-t border-slate-200/60 py-12 sm:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8 flex items-end justify-between">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                        អត្ថបទថ្មីៗ
                    </h2>
                    <p class="text-sm text-slate-500 mt-1">គន្លឹះរៀនសូត្រ ចំណេះដឹងទូទៅ និងវិធីសាស្ត្រគណិតវិទ្យា</p>
                </div>
                <a href="{{ route('articles.index') }}" class="text-xs sm:text-sm font-semibold text-sky-600 hover:text-sky-700 flex items-center gap-1">
                    <span>មើលទាំងអស់</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <!-- 4 Article Cards (Exact match to screenshot) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                @php
                    $badgeColors = [
                        'bg-sky-600',
                        'bg-indigo-600',
                        'bg-emerald-600',
                        'bg-amber-600',
                        'bg-rose-600',
                        'bg-purple-600'
                    ];
                @endphp

                @foreach($recentArticles as $index => $article)
                    @php
                        $colorClass = $badgeColors[$index % count($badgeColors)];
                    @endphp
                    <article class="article-card bg-white rounded-xl overflow-hidden border border-slate-200/80 shadow-2xs group flex flex-col">
                        <a href="{{ route('articles.show', $article) }}" class="block flex-1 flex flex-col">
                            <div class="aspect-[16/10] w-full overflow-hidden bg-slate-100 relative">
                                @if($article->image)
                                    @php
                                        $imgSrc = str_starts_with($article->image, '/') || str_starts_with($article->image, 'http') 
                                            ? $article->image 
                                            : Storage::url($article->image);
                                    @endphp
                                    <img src="{{ $imgSrc }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                                @else
                                    <div class="absolute inset-0 bg-gradient-to-br from-sky-400 to-indigo-500 opacity-20"></div>
                                    <div class="w-full h-full flex items-center justify-center text-sky-700/40 group-hover:scale-105 transition-transform duration-500">
                                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5L18.5 6M4 17l5.93-5.93a2 2 0 012.83 0L15 13m4 4l-4-4"></path></svg>
                                    </div>
                                @endif
                                <span class="absolute top-2.5 left-2.5 px-2 py-0.5 rounded text-[10px] font-bold {{ $colorClass }} text-white shadow-2xs">{{ $article->category }}</span>
                                
                                @if($article->priority > 0)
                                    <span class="absolute top-2.5 right-2.5 px-2 py-0.5 rounded text-[10px] font-bold bg-rose-500 text-white shadow-2xs flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/></svg>
                                        ពិសេស
                                    </span>
                                @endif
                            </div>
                            <div class="p-4 flex-1 flex flex-col justify-between">
                                <h4 class="font-bold text-slate-800 text-sm leading-snug group-hover:text-sky-600 transition-colors line-clamp-2">
                                    {{ $article->title }}
                                </h4>
                                <div class="mt-3 flex items-center justify-between text-[11px] text-slate-400 border-t border-slate-100 pt-2.5">
                                    <span>{{ $article->published_at ? $article->published_at->translatedFormat('d M Y') : $article->created_at->translatedFormat('d M Y') }}</span>
                                    <span class="text-sky-600 font-medium">អានបន្ត &rarr;</span>
                                </div>
                            </div>
                        </a>
                    </article>
                @endforeach

            </div>
        </div>
    </section>

    <!-- Footer (Clean & Professional matching 2026 All Right Reserved - ANONTAK) -->
    @include('partials.footer')

    <!-- MODAL 1: Math Puzzle Interactive Solver -->
    <div id="puzzleModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl border border-slate-100 relative animate-in fade-in zoom-in-95 duration-200">
            <button onclick="closeModal('puzzleModal')" class="absolute top-4 right-4 text-slate-400 hover:text-slate-700 cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center font-bold text-lg">
                    &sum;
                </div>
                <div>
                    <h3 class="font-bold text-slate-900 text-lg">ដំណោះស្រាយលំហាត់ប្រចាំថ្ងៃ</h3>
                    <p class="text-xs text-slate-500">ប្រព័ន្ធសមីការ និងផលគុណ</p>
                </div>
            </div>

            <div class="bg-slate-50 rounded-xl p-4 border border-slate-200/80 mb-4 font-mono text-center space-y-1">
                <div class="text-sky-700 font-bold">A + B = 32</div>
                <div class="text-indigo-700 font-bold">A - B = 18</div>
                <div class="text-rose-600 font-black">A &times; B = ?</div>
            </div>

            <div class="space-y-3 text-sm text-slate-700 leading-relaxed bg-amber-50/60 p-4 rounded-xl border border-amber-200/60">
                <p class="font-semibold text-slate-900">វិធីដោះស្រាយជាជំហានៗ៖</p>
                <ol class="list-decimal list-inside space-y-1.5 text-xs sm:text-sm">
                    <li>បូកសមីការទាំងពីរចូលគ្នា៖ <br>
                        <code class="bg-white px-2 py-0.5 rounded border border-amber-200 font-mono">(A + B) + (A - B) = 32 + 18 &rArr; 2A = 50 &rArr; <strong>A = 25</strong></code>
                    </li>
                    <li>យកតម្លៃ A ទៅជំនួសក្នុងសមីការទី១៖ <br>
                        <code class="bg-white px-2 py-0.5 rounded border border-amber-200 font-mono">25 + B = 32 &rArr; B = 32 - 25 &rArr; <strong>B = 7</strong></code>
                    </li>
                    <li>គណនាផលគុណ <code class="font-mono">A &times; B</code>៖ <br>
                        <code class="bg-emerald-100 text-emerald-900 px-2 py-0.5 rounded font-mono font-bold">25 &times; 7 = 175</code>
                    </li>
                </ol>
                <div class="mt-3 p-2.5 bg-emerald-600 text-white rounded-lg text-center font-bold text-base shadow-xs">
                    ចម្លើយចុងក្រោយ៖ A &times; B = 175
                </div>
            </div>

            <button onclick="closeModal('puzzleModal')" class="mt-5 w-full py-2.5 rounded-lg bg-slate-900 hover:bg-slate-800 text-white font-medium text-sm transition-colors cursor-pointer">
                យល់ព្រម / បិទ
            </button>
        </div>
    </div>

    <!-- MODAL 2: Homework Solver / Ask a Question Modal -->
    <div id="homeworkModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl border border-slate-100 relative">
            <button onclick="closeModal('homeworkModal')" class="absolute top-4 right-4 text-slate-400 hover:text-slate-700 cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-xl bg-sky-500 text-white flex items-center justify-center font-bold text-lg">
                    ?
                </div>
                <div>
                    <h3 class="font-bold text-slate-900 text-lg">សួរ ឬដោះស្រាយលំហាត់កិច្ចការផ្ទះ</h3>
                    <p class="text-xs text-slate-500">បញ្ចូលលំហាត់របស់អ្នកដើម្បីទទួលបានដំណោះស្រាយឆាប់រហ័ស</p>
                </div>
            </div>
            <form onsubmit="submitHomework(event)" class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">កម្រិតថ្នាក់</label>
                    <select class="w-full text-sm border border-slate-300 rounded-lg p-2.5 focus:border-sky-500 focus:outline-hidden">
                        <option>ថ្នាក់ទី ១២ (ត្រៀមបាក់ឌុប)</option>
                        <option>ថ្នាក់ទី ៩ (ត្រៀមឌីប្លូម)</option>
                        <option>ថ្នាក់ទី ១០ - ១១</option>
                        <option>បឋមសិក្សា & អនុវិទ្យាល័យ</option>
                        <option>សាកលវិទ្យាល័យ / ឧត្តមសិក្សា</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">ខ្លឹមសារលំហាត់ ឬសមីការ</label>
                    <textarea rows="4" placeholder="ឧទាហរណ៍៖ រកតម្លៃ x ក្នុងសមីការ 2x² - 5x + 3 = 0..." required class="w-full text-sm border border-slate-300 rounded-lg p-2.5 focus:border-sky-500 focus:outline-hidden"></textarea>
                </div>
                <div id="homeworkResult" class="hidden p-3 bg-emerald-50 border border-emerald-200 rounded-lg text-xs text-emerald-800">
                    <strong>ទទួលបានសំណួរហើយ!</strong> គ្រូជំនាញ និងប្រព័ន្ធឆ្លាតវៃកំពុងវិភាគដំណោះស្រាយសម្រាប់អ្នក។
                </div>
                <button type="submit" class="w-full py-2.5 rounded-lg bg-sky-500 hover:bg-sky-600 text-white font-bold text-sm shadow-sm transition-colors cursor-pointer">
                    ផ្ញើសំណួរដោះស្រាយ
                </button>
            </form>
        </div>
    </div>

    <!-- MODAL 3: Book Detail Modal -->
    <div id="bookModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-2xl border border-slate-100 relative">
            <button onclick="closeModal('bookModal')" class="absolute top-4 right-4 text-slate-400 hover:text-slate-700 cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <div class="flex gap-4 items-start">
                <div class="w-28 aspect-[3/4] rounded-lg overflow-hidden border border-slate-200 shrink-0">
                    <img id="bookModalImg" src="" alt="Book Cover" class="w-full h-full object-cover">
                </div>
                <div>
                    <h3 id="bookModalTitle" class="font-bold text-slate-900 text-lg leading-snug"></h3>
                    <p id="bookModalDesc" class="text-xs text-slate-600 mt-2 leading-relaxed"></p>
                    <div class="mt-4 flex gap-2">
                        <button onclick="alert('ចាប់ផ្ដើមអានជាអេឡិចត្រូនិច (E-Book Viewer)');" class="px-3 py-1.5 rounded-lg bg-sky-500 hover:bg-sky-600 text-white text-xs font-semibold cursor-pointer">
                            អានអនឡាញ
                        </button>
                        <button onclick="alert('ឯកសារ PDF កំពុងទាញយក...');" class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-semibold cursor-pointer">
                            ទាញយក PDF
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL 4: Video Demo Modal -->
    <div id="videoModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-xl w-full p-6 shadow-2xl border border-slate-100 relative">
            <button onclick="closeModal('videoModal')" class="absolute top-4 right-4 text-slate-400 hover:text-slate-700 cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <h3 class="font-bold text-slate-900 text-lg mb-3">វីដេអូបង្រៀនគំរូ - សមីការដឺក្រេទី ២</h3>
            <div class="aspect-video bg-slate-950 rounded-xl overflow-hidden flex items-center justify-center relative group">
                <img src="/images/hero_math_blackboard.jpg" alt="Video cover" class="w-full h-full object-cover opacity-60">
                <div class="absolute inset-0 flex flex-col items-center justify-center text-white">
                    <div class="w-16 h-16 rounded-full bg-sky-500 text-white flex items-center justify-center shadow-lg hover:scale-110 transition-transform cursor-pointer" onclick="alert('ចាក់វីដេអូបង្រៀន (Play Video)');">
                        <svg class="w-8 h-8 translate-x-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    </div>
                    <span class="mt-3 text-xs font-medium text-slate-200">ចុចដើម្បីចាប់ផ្ដើមទស្សនា</span>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL 5: Download App Modal -->
    <div id="downloadModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-2xl border border-slate-100 relative text-center">
            <button onclick="closeModal('downloadModal')" class="absolute top-4 right-4 text-slate-400 hover:text-slate-700 cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <div class="w-16 h-16 bg-sky-100 text-sky-600 rounded-2xl flex items-center justify-center mx-auto mb-3">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
            </div>
            <h3 class="font-bold text-slate-900 text-lg">ទាញយកកម្មវិធី ANONTAK App</h3>
            <p class="text-xs text-slate-500 mt-1 mb-5">រៀនគណិតវិទ្យាដោយឥតគិតថ្លៃ ទាំងលើទូរស័ព្ទ iOS និង Android</p>
            <div class="space-y-2.5">
                <button onclick="alert('កំពុងបើក App Store...');" class="w-full py-2.5 px-4 bg-slate-900 hover:bg-slate-800 text-white rounded-xl text-xs font-semibold flex items-center justify-center gap-2 cursor-pointer transition-colors">
                    <span>ទាញយកតាម Apple App Store</span>
                </button>
                <button onclick="alert('កំពុងបើក Google Play Store...');" class="w-full py-2.5 px-4 bg-sky-600 hover:bg-sky-700 text-white rounded-xl text-xs font-semibold flex items-center justify-center gap-2 cursor-pointer transition-colors">
                    <span>ទាញយកតាម Google Play Store</span>
                </button>
            </div>
        </div>
    </div>

    <!-- MODAL 6: Search Modal -->
    <div id="searchModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-start justify-center p-4 pt-20">
        <div class="bg-white rounded-2xl max-w-xl w-full p-5 shadow-2xl border border-slate-100 relative">
            <button onclick="closeModal('searchModal')" class="absolute top-4 right-4 text-slate-400 hover:text-slate-700 cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <div class="flex items-center gap-2 border-b border-slate-200 pb-3 pr-8">
                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input id="searchInput" oninput="filterSearch(this.value)" type="text" placeholder="ស្វែងរកមេរៀន សៀវភៅ ឬរូបមន្តគណិតវិទ្យា..." class="w-full text-sm outline-hidden">
            </div>
            <div id="searchResults" class="mt-3 space-y-2 max-h-60 overflow-y-auto text-xs text-slate-600">
                <div class="p-2 hover:bg-slate-50 rounded-lg cursor-pointer flex justify-between" onclick="selectSearch('MATHS 2')">
                    <span class="font-medium text-slate-800">សៀវភៅ MATHS 2</span>
                    <span class="text-sky-600">សៀវភៅ</span>
                </div>
                <div class="p-2 hover:bg-slate-50 rounded-lg cursor-pointer flex justify-between" onclick="selectSearch('សមីការដឺក្រេទី២')">
                    <span class="font-medium text-slate-800">រូបមន្តសមីការដឺក្រេទី២ និងឌីសគ្រីមីណង់ &Delta;</span>
                    <span class="text-sky-600">រូបមន្ត</span>
                </div>
                <div class="p-2 hover:bg-slate-50 rounded-lg cursor-pointer flex justify-between" onclick="selectSearch('អាំងតេក្រាល')">
                    <span class="font-medium text-slate-800">គន្លឹះគណនាអាំងតេក្រាលដោយផ្នែក</span>
                    <span class="text-sky-600">មេរៀន</span>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL 7: Tool Details Modal -->
    <div id="toolModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-sm w-full p-6 shadow-2xl border border-slate-100 relative text-center">
            <button onclick="closeModal('toolModal')" class="absolute top-4 right-4 text-slate-400 hover:text-slate-700 cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <div class="w-14 h-14 bg-sky-50 text-sky-600 rounded-2xl flex items-center justify-center mx-auto mb-3">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"/></svg>
            </div>
            <h3 id="toolModalTitle" class="font-bold text-slate-900 text-base"></h3>
            <p id="toolModalDesc" class="text-xs text-slate-500 mt-2 leading-relaxed"></p>
            <button onclick="closeModal('toolModal')" class="mt-4 w-full py-2 bg-slate-900 text-white text-xs font-semibold rounded-lg">បិទ</button>
        </div>
    </div>

    <!-- JavaScript Interactive Handlers -->
    <script>
        // Hero Slider State
        let currentSlide = 1;
        const totalSlides = 3;
        let slideInterval = setInterval(nextSlide, 6000);

        function setSlide(n) {
            currentSlide = n;
            for (let i = 1; i <= totalSlides; i++) {
                const slide = document.getElementById('heroSlide' + i);
                const dot = document.getElementById('dot' + i);
                if (i === n) {
                    slide.classList.remove('opacity-0', 'pointer-events-none');
                    slide.classList.add('opacity-100');
                    dot.classList.remove('bg-white/50');
                    dot.classList.add('bg-sky-400', 'w-5');
                } else {
                    slide.classList.remove('opacity-100');
                    slide.classList.add('opacity-0', 'pointer-events-none');
                    dot.classList.remove('bg-sky-400', 'w-5');
                    dot.classList.add('bg-white/50');
                }
            }
            clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, 6000);
        }

        function nextSlide() {
            let next = currentSlide + 1;
            if (next > totalSlides) next = 1;
            setSlide(next);
        }

        function prevSlide() {
            let prev = currentSlide - 1;
            if (prev < 1) prev = totalSlides;
            setSlide(prev);
        }

        // Horizontal Book Scroll
        function scrollBooks(direction) {
            const container = document.getElementById('booksContainer');
            const scrollAmount = 300;
            if (direction === 'left') {
                container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
            } else {
                container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            }
        }

        // Modals
        function openModal(id) {
            const el = document.getElementById(id);
            if (el) el.classList.remove('hidden');
        }

        function closeModal(id) {
            const el = document.getElementById(id);
            if (el) el.classList.add('hidden');
        }

        function openMathPuzzleSolver() {
            openModal('puzzleModal');
        }

        function previewBook(title, desc, imgSrc) {
            document.getElementById('bookModalTitle').innerText = title;
            document.getElementById('bookModalDesc').innerText = desc;
            document.getElementById('bookModalImg').src = imgSrc;
            openModal('bookModal');
        }

        function viewTool(name, desc) {
            document.getElementById('toolModalTitle').innerText = name;
            document.getElementById('toolModalDesc').innerText = desc;
            openModal('toolModal');
        }

        function submitHomework(e) {
            e.preventDefault();
            const res = document.getElementById('homeworkResult');
            res.classList.remove('hidden');
            setTimeout(() => {
                closeModal('homeworkModal');
                res.classList.add('hidden');
                alert('សំណួរត្រូវបានបញ្ជូនដោយជោគជ័យ! សូមពិនិត្យការជូនដំណឹងក្នុងប្រអប់សារ។');
            }, 1200);
        }

        // Toggle Menus
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        function toggleUserMenu() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('hidden');
        }

        // Language Switcher Toggle
        function switchLang(lang) {
            const kmBtn = document.getElementById('langKm');
            const enBtn = document.getElementById('langEn');
            if (lang === 'en') {
                enBtn.classList.add('bg-white', 'text-slate-900', 'shadow-2xs', 'font-bold');
                enBtn.classList.remove('text-slate-500');
                kmBtn.classList.remove('bg-white', 'text-slate-900', 'shadow-2xs', 'font-bold');
                kmBtn.classList.add('text-slate-500');
            } else {
                kmBtn.classList.add('bg-white', 'text-slate-900', 'shadow-2xs', 'font-bold');
                kmBtn.classList.remove('text-slate-500');
                enBtn.classList.remove('bg-white', 'text-slate-900', 'shadow-2xs', 'font-bold');
                enBtn.classList.add('text-slate-500');
            }
        }

        // Search Filter
        function filterSearch(query) {
            const q = query.toLowerCase();
            const results = document.getElementById('searchResults').children;
            for (let item of results) {
                if (item.innerText.toLowerCase().includes(q)) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            }
        }

        function selectSearch(text) {
            closeModal('searchModal');
            alert('ស្វែងរក: ' + text);
        }

        // Close dropdowns when clicking outside
        window.addEventListener('click', function(e) {
            const userBtn = document.getElementById('userBtn');
            const userDropdown = document.getElementById('userDropdown');
            if (userBtn && userDropdown && !userBtn.contains(e.target) && !userDropdown.contains(e.target)) {
                userDropdown.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
