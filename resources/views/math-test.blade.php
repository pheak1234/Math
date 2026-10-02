<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ការធ្វើតេស្តគណិតវិទ្យា - ANONTAK (Math Test Portal)</title>
    
    <meta name="description" content="ANONTAK - ប្រព័ន្ធធ្វើតេស្តសមត្ថភាពគណិតវិទ្យាអនឡាញ ៣០ នាទី ១០ សំណួរ គ្រប់កម្រិតថ្នាក់">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,300..700;1,300..700&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fcfdfd] text-slate-800 antialiased font-sans selection:bg-sky-500 selection:text-white flex flex-col min-h-screen">

    <!-- Top Navigation Bar (Identical to Home Page Design) -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200/80 transition-all shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 sm:h-18">
                
                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <a href="/" class="flex items-center gap-2 group">
                        <!-- Infinity Spectacles Logo -->
                        <div class="w-9 h-9 rounded-lg bg-slate-900 flex items-center justify-center text-white shadow-sm group-hover:bg-sky-600 transition-colors">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 12c-2-2.5-4-4-6.5-4a4.5 4.5 0 0 0 0 9c2.5 0 4.5-1.5 6.5-5 2 3.5 4 5 6.5 5a4.5 4.5 0 0 0 0-9c-2.5 0-4.5 1.5-6.5 4z" />
                            </svg>
                        </div>
                        <span class="font-extrabold text-xl tracking-wider text-slate-900 group-hover:text-sky-600 transition-colors" style="font-family: 'Outfit', sans-serif;">
                            ANONTAK
                        </span>
                    </a>
                </div>

                <!-- Desktop Nav Links with គណិតវិទ្យា Active -->
                <nav class="hidden lg:flex items-center space-x-1 xl:space-x-2 text-[15px] font-medium text-slate-700">
                    <a href="/" class="px-3 py-1.5 hover:text-sky-600 transition-colors">
                        គេហទំព័រ
                    </a>
                    <a href="/mathematics" class="px-3 py-1.5 text-sky-600 font-semibold relative after:content-[''] after:absolute after:bottom-0 after:left-3 after:right-3 after:h-0.5 after:bg-sky-600">
                        គណិតវិទ្យា
                    </a>
                    <a href="/books" class="px-3 py-1.5 hover:text-sky-600 transition-colors">
                        សៀវភៅ
                    </a>
                    <a href="/#courses" class="px-3 py-1.5 hover:text-sky-600 transition-colors">
                        វគ្គសិក្សា
                    </a>
                    <a href="/#articles" class="px-3 py-1.5 hover:text-sky-600 transition-colors">
                        ព័ត៌មានប្រចាំថ្ងៃ
                    </a>
                    <a href="/#about" class="px-3 py-1.5 hover:text-sky-600 transition-colors">
                        អំពីយើង
                    </a>
                    <a href="/#contact" class="px-3 py-1.5 hover:text-sky-600 transition-colors">
                        ទំនាក់ទំនង
                    </a>
                </nav>

                <!-- Right Utility Icons & Controls -->
                <div class="flex items-center space-x-3 sm:space-x-4">
                    <!-- Search Button -->
                    <button onclick="openModal('searchModal')" aria-label="Search" class="p-2 text-slate-600 hover:text-sky-600 hover:bg-slate-100 rounded-full transition-colors cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>

                    <!-- User Account / Profile -->
                    <div class="relative">
                        <button onclick="toggleUserMenu()" id="userBtn" class="flex items-center gap-1.5 p-1.5 sm:px-2 sm:py-1 rounded-full text-slate-700 hover:bg-slate-100 transition-colors cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <svg class="w-3 h-3 text-slate-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- Dropdown -->
                        <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-slate-100 py-2 z-50 text-sm">
                            <a href="/login" class="block px-4 py-2 hover:bg-slate-50 text-slate-700 font-medium">ចូលគណនី (Sign In)</a>
                            <a href="/register" class="block px-4 py-2 hover:bg-slate-50 text-slate-700 font-medium">ចុះឈ្មោះគណនីថ្មី</a>
                            <hr class="my-1 border-slate-100">
                            <a href="#my-library" class="block px-4 py-2 hover:bg-slate-50 text-slate-600">សៀវភៅរបស់ខ្ញុំ</a>
                        </div>
                    </div>

                    <!-- Language Switcher -->
                    <div class="flex items-center text-xs font-semibold border border-slate-200 rounded-lg p-0.5 bg-slate-50">
                        <button onclick="switchLang('km')" id="langKm" class="px-2 py-1 rounded bg-white text-slate-900 shadow-2xs font-bold transition-all">
                            ភាសាខ្មែរ
                        </button>
                        <span class="text-slate-300">/</span>
                        <button onclick="switchLang('en')" id="langEn" class="px-2 py-1 rounded text-slate-500 hover:text-slate-900 transition-all">
                            ENG
                        </button>
                    </div>

                    <!-- Mobile Hamburger -->
                    <button onclick="toggleMobileMenu()" class="lg:hidden p-2 text-slate-700 hover:bg-slate-100 rounded-lg" aria-label="Toggle Navigation">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Container -->
        <div id="mobileMenu" class="hidden lg:hidden border-t border-slate-200 bg-white px-4 pt-3 pb-5 space-y-2">
            <a href="/" class="block px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-50">គេហទំព័រ (Home)</a>
            <a href="/mathematics" class="block px-3 py-2 rounded-lg text-sky-600 bg-sky-50 font-semibold">គណិតវិទ្យា (Math Test)</a>
            <a href="/books" class="block px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-50">សៀវភៅ (Books)</a>
            <a href="/#courses" class="block px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-50">វគ្គសិក្សា (Courses)</a>
            <a href="/#articles" class="block px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-50">ព័ត៌មានប្រចាំថ្ងៃ (Articles)</a>
            <a href="/#about" class="block px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-50">អំពីយើង (About)</a>
            <a href="/#contact" class="block px-3 py-2 rounded-lg text-slate-700 hover:bg-slate-50">ទំនាក់ទំនង (Contact)</a>
        </div>
    </header>

    <!-- SECTION 1: HERO PORTAL (FAITHFUL TO USER MOCKUP WITH 2-STEP FLOW) -->
    <section class="relative py-12 sm:py-16 overflow-hidden border-b border-[#e2d0ca]" style="background-color: #eeddd9;">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-14 items-center">
                
                <!-- ================= LEFT COLUMN: DESIGN 1 (WELCOME) & DESIGN 2 (SELECTION) ================= -->
                <div class="lg:col-span-6">

                    <!-- FIRST DESIGN: Welcome & Instructions (Screenshot 1) -->
                    <div id="stepWelcome" class="space-y-5">
                        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight leading-snug">
                            សូមស្វាគមន៍មកកាន់ការធ្វើតេស្តសាកល្បង
                        </h1>

                        <p class="text-slate-700 text-sm sm:text-base leading-relaxed">
                            សូមស្វាគមន៍មកកាន់ប្រព័ន្ធប្រឡង និងធ្វើតេស្តសមត្ថភាពគណិតវិទ្យាអនឡាញ។ នៅទីនេះលោកអ្នកអាចវាស់ស្ទង់កម្រិតយល់ដឹង អនុវត្តលំហាត់ជាក់ស្ដែង ត្រៀមប្រឡងឆមាស និងការប្រឡងសិស្សពូកែគ្រប់កម្រិតថ្នាក់។ ប្រព័ន្ធនឹងធ្វើការកែ និងផ្ដល់ពិន្ទុភ្លាមៗ រួមទាំងមានដំណោះស្រាយពន្យល់លម្អិតសម្រាប់រាល់សំណួរទាំងអស់។
                        </p>

                        <!-- Button 1: ធ្វើតេស្តឥឡូវនេះ (Solid Blue from Mockup) -->
                        <div class="pt-2">
                            <button onclick="goToSelectionStep()" id="btnStartWelcome" class="inline-flex items-center justify-center px-7 py-3 rounded-xl text-white font-bold text-sm sm:text-base transition-all duration-200 shadow-md hover:shadow-lg active:scale-95 cursor-pointer hover:opacity-95" style="background-color: #627ee2 !important; color: #ffffff !important;">
                                ធ្វើតេស្តឥឡូវនេះ
                            </button>
                        </div>
                    </div>

                    <!-- SECOND DESIGN: Dropdowns & Notice (Screenshot 2) -->
                    <div id="stepSelection" class="hidden space-y-4">
                        
                        <div class="flex items-center justify-between pb-1">
                            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight leading-snug">
                                សូមជ្រើសរើស
                            </h2>
                            <button onclick="goToWelcomeStep()" class="text-xs text-slate-600 hover:text-slate-900 flex items-center gap-1 font-semibold transition-colors px-2 py-1 rounded-lg hover:bg-black/5 cursor-pointer">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                                <span>ត្រឡប់ក្រោយ</span>
                            </button>
                        </div>

                        <!-- Dropdown 1: ថ្នាក់ទី (Grade) -->
                        <div class="relative w-full max-w-[260px]">
                            <select id="gradeSelect" class="w-full bg-white border border-slate-200/90 rounded-md px-4 py-2.5 pr-10 text-sm font-medium text-slate-700 shadow-xs hover:border-slate-300 focus:outline-none focus:ring-2 focus:ring-[#627ee2]/40 transition-all cursor-pointer appearance-none">
                                <option value="" disabled selected class="text-slate-400">ថ្នាក់ទី</option>
                                <option value="ថ្នាក់ទី ៧">ថ្នាក់ទី ៧</option>
                                <option value="ថ្នាក់ទី ៨">ថ្នាក់ទី ៨</option>
                                <option value="ថ្នាក់ទី ៩">ថ្នាក់ទី ៩</option>
                                <option value="ថ្នាក់ទី ១០">ថ្នាក់ទី ១០</option>
                                <option value="ថ្នាក់ទី ១១">ថ្នាក់ទី ១១</option>
                                <option value="ថ្នាក់ទី ១២">ថ្នាក់ទី ១២</option>
                                <option value="សិស្សពូកែ">សិស្សពូកែ</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3.5 text-slate-400 text-xs">
                                ▼
                            </div>
                        </div>

                        <!-- Dropdown 2: កម្រិតពិបាក (Difficulty) -->
                        <div class="relative w-full max-w-[260px]">
                            <select id="difficultySelect" class="w-full bg-white border border-slate-200/90 rounded-md px-4 py-2.5 pr-10 text-sm font-medium text-slate-700 shadow-xs hover:border-slate-300 focus:outline-none focus:ring-2 focus:ring-[#627ee2]/40 transition-all cursor-pointer appearance-none">
                                <option value="" disabled selected class="text-slate-400">កម្រិតពិបាក</option>
                                <option value="ងាយស្រួល">ងាយស្រួល</option>
                                <option value="មធ្យម">មធ្យម</option>
                                <option value="ពិបាក">ពិបាក</option>
                                <option value="កម្រិតប្រកួតប្រជែង">កម្រិតប្រកួតប្រជែង</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3.5 text-slate-400 text-xs">
                                ▼
                            </div>
                        </div>

                        <!-- Notice Box (Exact match from screenshot 2) -->
                        <div class="pt-1 text-xs text-slate-700 leading-relaxed max-w-[260px]">
                            <p class="font-bold text-slate-800">បញ្ជាក់:</p>
                            <p>ប្អូនមានពេល ៣០ នាទី សម្រាប់ ១០សំណួរ</p>
                        </div>

                        <!-- Button 2: ចាប់ផ្ដើម (Solid Blue from Mockup) -->
                        <div class="pt-2">
                            <button onclick="startConfiguredTest()" id="btnStartSelection" class="inline-flex items-center justify-center px-7 py-2.5 rounded-xl text-white font-bold text-sm sm:text-base transition-all duration-200 shadow-md hover:shadow-lg active:scale-95 cursor-pointer hover:opacity-95" style="background-color: #627ee2 !important; color: #ffffff !important;">
                                ចាប់ផ្ដើម
                            </button>
                        </div>

                    </div>

                </div>

                <!-- ================= RIGHT COLUMN: VIDEO TUTORIAL SHOWCASE ================= -->
                <div class="lg:col-span-6 space-y-3">
                    <h3 class="text-base sm:text-lg font-bold text-slate-900">
                        វីដេអូបង្ហាញពីរបៀបចូលធ្វើតេស្ត
                    </h3>

                    <!-- Video Container with Real Camera Image and Blue Triangle Play Button -->
                    <div onclick="openVideoPlayer()" class="relative w-full aspect-[16/10] rounded-none sm:rounded-sm overflow-hidden shadow-md group cursor-pointer border border-black/10">
                        <img src="/images/math_test_camera_tutorial.jpg" alt="វីដេអូបង្ហាញពីរបៀបចូលធ្វើតេស្ត" class="w-full h-full object-cover">
                        
                        <!-- Soft dark overlay -->
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors"></div>

                        <!-- Large Blue Triangle Play Button (Exact match from user mockup) -->
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-16 h-16 sm:w-20 sm:h-20 flex items-center justify-center transition-transform duration-200 group-hover:scale-110">
                                <svg class="w-14 h-14 sm:w-18 sm:h-18 drop-shadow-md" viewBox="0 0 24 24" fill="#627ee2" style="color: #627ee2;">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION 2: POPULAR TEST EXAMS (Makes the page rich, engaging, and complete!) -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        
        <div class="mb-8 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
                <span class="text-xs font-bold uppercase tracking-wider text-sky-600">វិញ្ញាសាដែលសិស្សានុសិស្សជ្រើសរើសច្រើន</span>
                <h3 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight mt-1">
                    វិញ្ញាសាគណិតវិទ្យាពេញនិយម
                </h3>
            </div>
            <a href="/categories" class="text-xs sm:text-sm font-semibold text-sky-600 hover:text-sky-700 flex items-center gap-1">
                <span>រុករកមេរៀនទាំងអស់ (All Categories)</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Exam Card 1: BacII -->
            <div class="bg-white rounded-2xl border border-slate-200/90 p-6 shadow-xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="px-2.5 py-1 rounded-lg text-xs font-bold bg-rose-50 text-rose-700 border border-rose-200">
                            ថ្នាក់ទី ១២ (បាក់ឌុប)
                        </span>
                        <span class="text-xs text-slate-400 font-mono">⏱ ៣០ នាទី</span>
                    </div>
                    <h4 class="text-base sm:text-lg font-bold text-slate-900 group-hover:text-indigo-600 transition-colors">
                        វិញ្ញាសាត្រៀមប្រឡងបាក់ឌុប
                    </h4>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                        វិញ្ញាសារួមមាន លីមីតនៃអនុគមន៍ ដេរីវេ អាំងតេក្រាល ចំនួនកុំផ្លិច និងធរណីមាត្រក្នុងលំហ។
                    </p>
                    <div class="mt-4 flex items-center gap-3 text-xs text-slate-600 border-t border-slate-100 pt-3">
                        <span>📝 ១០ សំណួរគន្លឹះ</span>
                        <span>⭐ កម្រិតមធ្យម</span>
                    </div>
                </div>
                <button onclick="launchPresetTest('ថ្នាក់ទី ១២', 'មធ្យម')" class="mt-5 w-full py-2.5 rounded-xl bg-slate-900 hover:bg-[#5271e8] text-white text-xs font-bold transition-colors flex items-center justify-center gap-2 cursor-pointer shadow-xs">
                    <span>ចាប់ផ្ដើមវិញ្ញាសានេះ</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </div>

            <!-- Exam Card 2: Olympiad -->
            <div class="bg-white rounded-2xl border border-slate-200/90 p-6 shadow-xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="px-2.5 py-1 rounded-lg text-xs font-bold bg-amber-50 text-amber-700 border border-amber-200">
                            សិស្សពូកែ (Olympiad)
                        </span>
                        <span class="text-xs text-slate-400 font-mono">⏱ ៣០ នាទី</span>
                    </div>
                    <h4 class="text-base sm:text-lg font-bold text-slate-900 group-hover:text-amber-600 transition-colors">
                        វិញ្ញាសាសិស្សពូកែទូទាំងប្រទេស
                    </h4>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                        លំហាត់វិសមភាព Cauchy, ធរណីមាត្រកម្រិតខ្ពស់, ទ្រឹស្ដីចំនួន និងក្បួនដោះស្រាយពិសេស។
                    </p>
                    <div class="mt-4 flex items-center gap-3 text-xs text-slate-600 border-t border-slate-100 pt-3">
                        <span>📝 ១០ សំណួរគន្លឹះ</span>
                        <span>🏆 កម្រិតប្រកួតប្រជែង</span>
                    </div>
                </div>
                <button onclick="launchPresetTest('សិស្សពូកែ', 'កម្រិតប្រកួតប្រជែង')" class="mt-5 w-full py-2.5 rounded-xl bg-slate-900 hover:bg-[#5271e8] text-white text-xs font-bold transition-colors flex items-center justify-center gap-2 cursor-pointer shadow-xs">
                    <span>ចាប់ផ្ដើមវិញ្ញាសានេះ</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </div>

            <!-- Exam Card 3: Grade 9 Foundations -->
            <div class="bg-white rounded-2xl border border-slate-200/90 p-6 shadow-xs hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between group">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="px-2.5 py-1 rounded-lg text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                            អនុវិទ្យាល័យ (ទី៩)
                        </span>
                        <span class="text-xs text-slate-400 font-mono">⏱ ៣០ នាទី</span>
                    </div>
                    <h4 class="text-base sm:text-lg font-bold text-slate-900 group-hover:text-emerald-600 transition-colors">
                        តេស្តមូលដ្ឋានគ្រឹះគណិតវិទ្យាទី ៩
                    </h4>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                        សមីការដឺក្រេទី១ និងទី២ ប្រព័ន្ធសមីការ ត្រីកោណមាត្រប្លង់ និងការគណនាផ្ទៃក្រឡា។
                    </p>
                    <div class="mt-4 flex items-center gap-3 text-xs text-slate-600 border-t border-slate-100 pt-3">
                        <span>📝 ១០ សំណួរគន្លឹះ</span>
                        <span>⭐ កម្រិតមូលដ្ឋាន</span>
                    </div>
                </div>
                <button onclick="launchPresetTest('ថ្នាក់ទី ៩', 'មធ្យម')" class="mt-5 w-full py-2.5 rounded-xl bg-slate-900 hover:bg-[#5271e8] text-white text-xs font-bold transition-colors flex items-center justify-center gap-2 cursor-pointer shadow-xs">
                    <span>ចាប់ផ្ដើមវិញ្ញាសានេះ</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </button>
            </div>

        </div>

    </section>

    <!-- SECTION 3: TEST-TAKING TIPS -->
    <section class="bg-slate-50 border-t border-slate-200/80 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h3 class="text-xl font-bold text-slate-900 text-center mb-8">
                គន្លឹះដើម្បីទទួលបានពិន្ទុខ្ពស់ក្នុងការធ្វើតេស្ត
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-2xs flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center text-lg flex-shrink-0 font-bold">
                        1
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 text-sm">អានសំណួរឱ្យបានហ្មត់ចត់</h4>
                        <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                            កត់សម្គាល់លក្ខខណ្ឌនៃសំណួរ សញ្ញាបូកដក និងឯកតារង្វាស់មុននឹងគណនា។
                        </p>
                    </div>
                </div>
                <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-2xs flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center text-lg flex-shrink-0 font-bold">
                        2
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 text-sm">បែងចែកពេល ៣ នាទី/សំណួរ</h4>
                        <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                            អ្នកមានពេល ៣០ នាទីសម្រាប់ ១០ សំណួរ។ បើជាប់សំណួរណាពិបាក សូមរំលងធ្វើសំណួរក្រោយសិន។
                        </p>
                    </div>
                </div>
                <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-2xs flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-lg flex-shrink-0 font-bold">
                        3
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 text-sm">ពិនិត្យដំណោះស្រាយពន្យល់</h4>
                        <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                            ក្រោយពេលបញ្ជូនចម្លើយ ប្រព័ន្ធនឹងបង្ហាញដំណោះស្រាយលម្អិតដើម្បីឱ្យអ្នករៀនបន្ថែមពីកំហុស។
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer (Identical to Home Page Design) -->
    <footer class="bg-slate-900 text-slate-400 text-sm border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                
                <div class="space-y-3">
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded bg-sky-500 flex items-center justify-center text-white">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M12 12c-2-2.5-4-4-6.5-4a4.5 4.5 0 0 0 0 9c2.5 0 4.5-1.5 6.5-5 2 3.5 4 5 6.5 5a4.5 4.5 0 0 0 0-9c-2.5 0-4.5 1.5-6.5 4z" />
                            </svg>
                        </div>
                        <span class="font-bold text-lg text-white" style="font-family: 'Outfit', sans-serif;">ANONTAK</span>
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        គេហទំព័រអប់រំ និងចែករំលែកធនធានគណិតវិទ្យាសម្រាប់សិស្សានុសិស្ស លោកគ្រូអ្នកគ្រូ និងអ្នកស្រឡាញ់ការសិក្សា។
                    </p>
                </div>

                <div>
                    <h5 class="text-white font-semibold text-xs tracking-wider uppercase mb-3">ផ្នែកសំខាន់ៗ</h5>
                    <ul class="space-y-2 text-xs">
                        <li><a href="/" class="hover:text-white transition-colors">គេហទំព័រដើម</a></li>
                        <li><a href="/mathematics" class="text-sky-400 font-semibold hover:text-white transition-colors">ការធ្វើតេស្តគណិតវិទ្យា</a></li>
                        <li><a href="/categories" class="hover:text-white transition-colors">ផ្នែក និងមេរៀនគណិតវិទ្យា</a></li>
                        <li><a href="/#books" class="hover:text-white transition-colors">សៀវភៅពុម្ព និងលំហាត់</a></li>
                    </ul>
                </div>

                <div>
                    <h5 class="text-white font-semibold text-xs tracking-wider uppercase mb-3">ឧបករណ៍ និងជំនួយ</h5>
                    <ul class="space-y-2 text-xs">
                        <li><button onclick="goToSelectionStep()" class="hover:text-white transition-colors text-left cursor-pointer">ធ្វើតេស្តសាកល្បង</button></li>
                        <li><button onclick="openVideoPlayer()" class="hover:text-white transition-colors text-left cursor-pointer">វីដេអូណែនាំ</button></li>
                        <li><a href="/#contact" class="hover:text-white transition-colors">ទំនាក់ទំនងក្រុមការងារ</a></li>
                    </ul>
                </div>

                <div>
                    <h5 class="text-white font-semibold text-xs tracking-wider uppercase mb-3">ទទួលព័ត៌មានថ្មីៗ</h5>
                    <p class="text-xs text-slate-400 mb-3">ចុះឈ្មោះអ៊ីមែលដើម្បីទទួលបានលំហាត់ថ្មីៗ និងសៀវភៅឥតគិតថ្លៃ៖</p>
                    <form onsubmit="alert('អរគុណសម្រាប់ការចុះឈ្មោះទទួលព័ត៌មាន!'); return false;" class="flex gap-2">
                        <input type="email" placeholder="អ៊ីមែលរបស់អ្នក..." required class="bg-slate-800 border border-slate-700 text-white text-xs rounded-lg px-3 py-2 flex-1 focus:outline-hidden focus:border-sky-500">
                        <button type="submit" class="bg-sky-500 hover:bg-sky-600 text-white text-xs px-3 py-2 rounded-lg font-medium transition-colors cursor-pointer">
                            បញ្ជូន
                        </button>
                    </form>
                </div>

            </div>

            <!-- Bottom Copyright bar (Matching Home Page) -->
            <div class="border-t border-slate-800 pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
                <p>2026 All Right Reserved - ANONTAK</p>
                <div class="flex items-center space-x-4">
                    <a href="#privacy" class="hover:text-slate-400">គោលការណ៍ឯកជនភាព</a>
                    <span>&bull;</span>
                    <a href="#terms" class="hover:text-slate-400">លក្ខខណ្ឌប្រើប្រាស់</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Interactive 10-Question 30-Minute Test Runner Modal -->
    <div id="testRunnerModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-slate-950/80 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-2xl w-full p-6 sm:p-8 shadow-2xl border border-slate-100 relative animate-in fade-in zoom-in-95 duration-200">
            
            <!-- Header with Title, Grade Badge & Live 30-Min Timer -->
            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                <div>
                    <span id="modalBadge" class="text-[11px] font-bold text-indigo-600 uppercase tracking-wider">ថ្នាក់ទី ១២ • កម្រិត: មធ្យម</span>
                    <h3 id="currentTestTitle" class="text-lg sm:text-xl font-bold text-slate-900 mt-0.5">
                        ការធ្វើតេស្តគណិតវិទ្យា (១០ សំណួរ)
                    </h3>
                </div>
                <div class="flex items-center gap-2 bg-rose-50 border border-rose-200 px-3.5 py-1.5 rounded-xl font-mono text-xs font-bold text-rose-700 shadow-2xs">
                    <svg class="w-4 h-4 text-rose-600 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    <span id="testTimer">30:00</span>
                </div>
            </div>

            <!-- Question Progress Bar -->
            <div class="pt-4 flex items-center justify-between text-xs text-slate-500">
                <span id="questionStepLabel">សំណួរទី <span id="currentQNum" class="font-bold text-slate-900">១</span> នៃ ១០</span>
                <span id="answeredCount" class="font-medium text-indigo-600">ឆ្លើយបាន 0/10</span>
            </div>
            <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden mt-1.5">
                <div id="progressBar" class="bg-gradient-to-r from-indigo-500 to-sky-500 h-full transition-all duration-300" style="width: 10%"></div>
            </div>

            <!-- Quiz Questions Container -->
            <div id="quizContent" class="py-6 min-h-[220px]">
                
                <!-- Dynamic Question Block -->
                <div id="activeQuestionCard" class="space-y-4">
                    <div class="flex items-start gap-2.5">
                        <span id="qBadge" class="w-7 h-7 rounded-xl bg-indigo-600 text-white flex items-center justify-center font-bold text-xs flex-shrink-0 mt-0.5 shadow-xs">១</span>
                        <p id="qText" class="font-bold text-slate-900 text-sm sm:text-base leading-snug">
                            រកតម្លៃនៃ $x$ ក្នុងសមីការ $2x + 6 = 18$ :
                        </p>
                    </div>

                    <div id="qOptions" class="grid grid-cols-1 sm:grid-cols-2 gap-3 pl-0 sm:pl-9 pt-2">
                        <!-- options populated dynamically -->
                    </div>
                </div>

            </div>

            <!-- Score Results Screen (Hidden initially) -->
            <div id="quizResult" class="hidden py-8 text-center space-y-4">
                <div class="w-16 h-16 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto text-3xl font-bold shadow-xs">
                    ✓
                </div>
                <h4 class="text-xl sm:text-2xl font-extrabold text-slate-900">ការធ្វើតេស្តបានបញ្ចប់ដោយជោគជ័យ!</h4>
                <p class="text-slate-600 text-sm max-w-md mx-auto">
                    អ្នកទទួលបានពិន្ទុ <span id="finalScore" class="font-black text-emerald-600 text-xl">៩០% (៩ / ១០)</span>
                </p>
                <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200 text-left text-xs space-y-2 max-w-md mx-auto">
                    <p class="font-bold text-slate-800 text-sm">💡 ការវាយតម្លៃសមត្ថភាព:</p>
                    <p class="text-slate-600">• កម្រិតយល់ដឹងលើរូបមន្តគ្រឹះ និងពិជគណិតល្អប្រសើរណាស់។</p>
                    <p class="text-slate-600">• សូមបន្តអនុវត្តបន្ថែមលើធរណីមាត្រក្នុងលំហ និងអាំងតេក្រាល។</p>
                </div>
            </div>

            <!-- Footer Navigation Controls -->
            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                <button onclick="closeTestModal()" class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-500 hover:bg-slate-100 transition-colors cursor-pointer">
                    បិទ
                </button>
                <div class="flex items-center gap-2">
                    <button id="prevQBtn" onclick="prevQuestion()" class="hidden px-4 py-2 rounded-xl border border-slate-200 text-xs font-semibold text-slate-700 hover:bg-slate-50 transition-colors cursor-pointer">
                        សំណួរមុន
                    </button>
                    <button id="nextQBtn" onclick="nextQuestion()" class="px-5 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-semibold shadow-xs hover:shadow transition-all cursor-pointer">
                        សំណួរបន្ទាប់ &rarr;
                    </button>
                    <button id="submitTestBtn" onclick="submitTestAnswers()" class="hidden px-6 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-semibold shadow-xs transition-all cursor-pointer">
                        បញ្ជូនចម្លើយ
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- Video Tutorial Modal -->
    <div id="videoModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-slate-950/80 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-neutral-900 text-white rounded-3xl max-w-3xl w-full p-4 sm:p-6 shadow-2xl relative">
            <div class="flex items-center justify-between pb-3 border-b border-neutral-800 mb-4">
                <h4 class="text-sm font-bold flex items-center gap-2">
                    <svg class="w-4 h-4 text-indigo-400" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                    <span>វីដេអូណែនាំពីរបៀបចូលធ្វើតេស្តគណិតវិទ្យា (Math Test Tutorial)</span>
                </h4>
                <button onclick="closeVideoPlayer()" class="text-neutral-400 hover:text-white p-1 rounded-lg hover:bg-neutral-800 cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            
            <div class="aspect-video bg-black rounded-2xl overflow-hidden relative flex items-center justify-center border border-neutral-800">
                <iframe class="w-full h-full" src="https://www.youtube-nocookie.com/embed/dQw4w9WgXcQ?autoplay=0" title="Math Tutorial Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <p class="text-xs text-neutral-400 mt-3 text-center">
                វីដេអូបង្ហាញពីជំហានចុះឈ្មោះ ការជ្រើសរើសវិញ្ញាសា ការកំណត់ម៉ោង និងរបៀបមើលដំណោះស្រាយលម្អិត។
            </p>
        </div>
    </div>

    <!-- Search Modal (Identical to Home Page) -->
    <div id="searchModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-start justify-center pt-20 p-4">
        <div class="bg-white rounded-2xl max-w-2xl w-full p-6 shadow-2xl border border-slate-100 relative animate-in fade-in duration-200">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                <div class="flex items-center gap-3 w-full">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input id="searchInput" oninput="filterSearch(this.value)" type="text" placeholder="ស្វែងរកមេរៀន សៀវភៅ ឬរូបមន្តគណិតវិទ្យា..." class="w-full text-sm outline-hidden">
                </div>
                <button onclick="closeModal('searchModal')" class="text-slate-400 hover:text-slate-700 cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <div id="searchResults" class="py-4 space-y-2 text-xs">
                <a href="/mathematics" class="flex items-center justify-between p-2.5 rounded-lg hover:bg-slate-50 transition-colors">
                    <span class="font-medium text-slate-800">ការធ្វើតេស្តសាកល្បងគណិតវិទ្យា (Math Mock Test)</span>
                    <span class="text-sky-600 bg-sky-50 px-2 py-0.5 rounded text-[10px]">តេស្ត</span>
                </a>
                <a href="/#books" class="flex items-center justify-between p-2.5 rounded-lg hover:bg-slate-50 transition-colors">
                    <span class="font-medium text-slate-800">សៀវភៅពុម្ពគណិតវិទ្យាថ្នាក់ទី ១២</span>
                    <span class="text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded text-[10px]">សៀវភៅ</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Scripts: Smooth Transitions, 10 Questions Engine, and Timer -->
    <script>
        function goToSelectionStep() {
            document.getElementById('stepWelcome').classList.add('hidden');
            document.getElementById('stepSelection').classList.remove('hidden');
        }

        function goToWelcomeStep() {
            document.getElementById('stepSelection').classList.add('hidden');
            document.getElementById('stepWelcome').classList.remove('hidden');
        }

        function launchPresetTest(grade, difficulty) {
            document.getElementById('gradeSelect').value = grade;
            document.getElementById('difficultySelect').value = difficulty;
            goToSelectionStep();
            startConfiguredTest();
        }

        // Complete 10 Interactive Math Questions
        const mathQuestions = [
            { q: "រកតម្លៃនៃ x ក្នុងសមីការ 2x + 6 = 18 :", options: ["x = 4", "x = 6", "x = 8", "x = 12"], correct: 1 },
            { q: "គណនាលីមីត lim (x→2) [ (x² - 4) / (x - 2) ] :", options: ["0", "2", "4", "មិនកំណត់"], correct: 2 },
            { q: "រកដេរីវេនៃអនុគមន៍ f(x) = 3x² + 5x - 7 :", options: ["f'(x) = 6x + 5", "f'(x) = 3x + 5", "f'(x) = 6x", "f'(x) = 5x - 7"], correct: 0 },
            { q: "គណនាអាំងតេក្រាល ∫ (2x + 3) dx :", options: ["x² + 3x + C", "2x² + 3x + C", "x² + C", "2x + C"], correct: 0 },
            { q: "ត្រីកោណកែងមួយមានជ្រុងជាប់មុំកែងប្រវែង 3cm និង 4cm។ គណនាប្រវែងអ៊ីប៉ូតេនុស :", options: ["5 cm", "6 cm", "7 cm", "25 cm"], correct: 0 },
            { q: "រកម៉ូឌុលនៃចំនួនកុំផ្លិច z = 3 + 4i :", options: ["|z| = 5", "|z| = 7", "|z| = 25", "|z| = 1"], correct: 0 },
            { q: "បោះកាក់មួយ ២ ដង។ រកប្រូបាបដែលចេញក្បាល (H) ទាំងពីរដង :", options: ["1/4", "1/2", "3/4", "1"], correct: 0 },
            { q: "រកផលបូកមុំក្នុងនៃត្រីកោណមួយ :", options: ["90°", "180°", "270°", "360°"], correct: 1 },
            { q: "ដោះស្រាយវិសមភាព 3x - 5 > 7 :", options: ["x > 4", "x < 4", "x > 12", "x < 12"], correct: 0 },
            { q: "គណនាតម្លៃនៃ sin(30°) + cos(60°) :", options: ["1/2", "1", "√3/2", "0"], correct: 1 }
        ];

        let currentQIndex = 0;
        let userAnswers = {};
        let timerInterval = null;
        let secondsRemaining = 1800; // 30 minutes

        function startConfiguredTest() {
            const grade = document.getElementById('gradeSelect').value || 'ថ្នាក់ទី ១២';
            const difficulty = document.getElementById('difficultySelect').value || 'មធ្យម';
            
            document.getElementById('modalBadge').textContent = `${grade} • កម្រិត: ${difficulty}`;
            document.getElementById('currentTestTitle').textContent = `ការធ្វើតេស្ត ${grade} (${difficulty})`;
            
            currentQIndex = 0;
            userAnswers = {};
            secondsRemaining = 1800;

            document.getElementById('quizContent').classList.remove('hidden');
            document.getElementById('quizResult').classList.add('hidden');
            document.getElementById('testRunnerModal').classList.remove('hidden');

            renderCurrentQuestion();
            startTimer();
        }

        function renderCurrentQuestion() {
            const q = mathQuestions[currentQIndex];
            document.getElementById('currentQNum').textContent = currentQIndex + 1;
            document.getElementById('qBadge').textContent = currentQIndex + 1;
            document.getElementById('qText').textContent = q.q;

            const progressPct = ((currentQIndex + 1) / mathQuestions.length) * 100;
            document.getElementById('progressBar').style.width = progressPct + '%';

            const answeredCount = Object.keys(userAnswers).length;
            document.getElementById('answeredCount').textContent = `ឆ្លើយបាន ${answeredCount}/${mathQuestions.length}`;

            // Render options
            const optsContainer = document.getElementById('qOptions');
            optsContainer.innerHTML = '';
            
            q.options.forEach((opt, idx) => {
                const isSelected = userAnswers[currentQIndex] === idx;
                const optLabel = ['A', 'B', 'C', 'D'][idx];

                const card = document.createElement('label');
                card.className = `flex items-center gap-3 p-3.5 rounded-2xl border transition-all cursor-pointer ${
                    isSelected ? 'border-indigo-600 bg-indigo-50 shadow-xs' : 'border-slate-200 hover:border-indigo-300 hover:bg-slate-50'
                }`;
                card.innerHTML = `
                    <input type="radio" name="optRadio" value="${idx}" ${isSelected ? 'checked' : ''} onchange="selectOption(${idx})" class="accent-indigo-600 w-4 h-4">
                    <span class="text-sm font-semibold ${isSelected ? 'text-indigo-900' : 'text-slate-700'}">${optLabel}. ${opt}</span>
                `;
                optsContainer.appendChild(card);
            });

            // Button visibility
            const prevBtn = document.getElementById('prevQBtn');
            const nextBtn = document.getElementById('nextQBtn');
            const submitBtn = document.getElementById('submitTestBtn');

            if (currentQIndex === 0) {
                prevBtn.classList.add('hidden');
            } else {
                prevBtn.classList.remove('hidden');
            }

            if (currentQIndex === mathQuestions.length - 1) {
                nextBtn.classList.add('hidden');
                submitBtn.classList.remove('hidden');
            } else {
                nextBtn.classList.remove('hidden');
                submitBtn.classList.add('hidden');
            }
        }

        function selectOption(idx) {
            userAnswers[currentQIndex] = idx;
            renderCurrentQuestion();
        }

        function nextQuestion() {
            if (currentQIndex < mathQuestions.length - 1) {
                currentQIndex++;
                renderCurrentQuestion();
            }
        }

        function prevQuestion() {
            if (currentQIndex > 0) {
                currentQIndex--;
                renderCurrentQuestion();
            }
        }

        function startTimer() {
            clearInterval(timerInterval);
            timerInterval = setInterval(() => {
                secondsRemaining--;
                if (secondsRemaining <= 0) {
                    clearInterval(timerInterval);
                    submitTestAnswers();
                    return;
                }
                const mins = String(Math.floor(secondsRemaining / 60)).padStart(2, '0');
                const secs = String(secondsRemaining % 60).padStart(2, '0');
                document.getElementById('testTimer').textContent = `${mins}:${secs}`;
            }, 1000);
        }

        function submitTestAnswers() {
            clearInterval(timerInterval);
            let score = 0;
            mathQuestions.forEach((q, idx) => {
                if (userAnswers[idx] === q.correct) {
                    score++;
                }
            });

            const pct = Math.round((score / mathQuestions.length) * 100);
            document.getElementById('finalScore').textContent = `${pct}% (${score} / ${mathQuestions.length})`;

            document.getElementById('quizContent').classList.add('hidden');
            document.getElementById('quizResult').classList.remove('hidden');
            document.getElementById('prevQBtn').classList.add('hidden');
            document.getElementById('nextQBtn').classList.add('hidden');
            document.getElementById('submitTestBtn').classList.add('hidden');
        }

        function closeTestModal() {
            clearInterval(timerInterval);
            document.getElementById('testRunnerModal').classList.add('hidden');
        }

        function openVideoPlayer() {
            document.getElementById('videoModal').classList.remove('hidden');
        }

        function closeVideoPlayer() {
            document.getElementById('videoModal').classList.add('hidden');
        }

        // Header Modals
        function openModal(id) {
            const el = document.getElementById(id);
            if (el) el.classList.remove('hidden');
        }

        function closeModal(id) {
            const el = document.getElementById(id);
            if (el) el.classList.add('hidden');
        }

        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        function toggleUserMenu() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('hidden');
        }

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

        // Window dismiss
        window.addEventListener('click', function(e) {
            const userBtn = document.getElementById('userBtn');
            const userDropdown = document.getElementById('userDropdown');
            if (userBtn && userDropdown && !userBtn.contains(e.target) && !userDropdown.contains(e.target)) {
                userDropdown.classList.add('hidden');
            }
            const tModal = document.getElementById('testRunnerModal');
            const vModal = document.getElementById('videoModal');
            const sModal = document.getElementById('searchModal');
            if (e.target === tModal) closeTestModal();
            if (e.target === vModal) closeVideoPlayer();
            if (e.target === sModal) closeModal('searchModal');
        });
    </script>
</body>
</html>
