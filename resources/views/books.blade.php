<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>សៀវភៅ - ANONTAK</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,300..700;1,300..700&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-slate-800 antialiased font-sans">

    <!-- Top Navigation Bar -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200/80 transition-all shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 sm:h-18">
                
                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <a href="/" class="flex items-center gap-2 group">
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

                <!-- Desktop Nav Links -->
                <nav class="hidden lg:flex items-center space-x-1 xl:space-x-2 text-[15px] font-medium text-slate-700">
                    <a href="/" class="px-3 py-1.5 hover:text-sky-600 transition-colors">ទំព័រដើម</a>
                    <a href="/mathematics" class="px-3 py-1.5 hover:text-sky-600 transition-colors">គណិតវិទ្យា</a>
                    <a href="/books" class="px-3 py-1.5 text-sky-600 font-semibold relative after:content-[''] after:absolute after:bottom-0 after:left-3 after:right-3 after:h-0.5 after:bg-sky-600">សៀវភៅ</a>
                    <a href="#courses" class="px-3 py-1.5 hover:text-sky-600 transition-colors">វគ្គសិក្សា</a>
                    <a href="#articles" class="px-3 py-1.5 hover:text-sky-600 transition-colors">ព័ត៌មានប្រចាំថ្ងៃ</a>
                    <a href="#about" class="px-3 py-1.5 hover:text-sky-600 transition-colors">អំពីយើង</a>
                    <a href="#contact" class="px-3 py-1.5 hover:text-sky-600 transition-colors">ទំនាក់ទំនង</a>
                </nav>

                <!-- Right Utility -->
                <div class="flex items-center space-x-3 sm:space-x-4">
                    <button class="p-2 text-slate-600 hover:text-sky-600 hover:bg-slate-100 rounded-full transition-colors cursor-pointer">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    </button>
                    <a href="/register" class="flex items-center gap-1.5 p-1.5 rounded-full text-slate-700 hover:bg-slate-100 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </a>
                    <div class="flex items-center text-xs font-semibold border border-slate-200 rounded-lg p-0.5 bg-slate-50">
                        <button class="px-2 py-1 rounded bg-white text-slate-900 shadow-2xs font-bold">ENG</button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- HERO SECTION (Premium Dark Background Image Motif) -->
    <section class="relative py-16 md:py-28 overflow-hidden bg-slate-900"
             style="background-image: url('/images/hero_math_blackboard.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">
        
        <!-- Dark overlay to ensure text is readable -->
        <div class="absolute inset-0 bg-slate-950/80 pointer-events-none z-0"></div>

        <!-- Background Glowing Orbs -->
        <div class="absolute top-[-20%] left-[-10%] w-96 h-96 bg-indigo-500/20 rounded-full blur-[100px] pointer-events-none z-0"></div>
        <div class="absolute bottom-[-20%] right-[-10%] w-96 h-96 bg-sky-500/20 rounded-full blur-[100px] pointer-events-none z-0"></div>
        
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row items-center justify-center gap-12 md:gap-24">
                
                <!-- Left: Book Cover with 3D effect -->
                <div class="w-full md:w-5/12 flex justify-center md:justify-end perspective-1000">
                    <div class="w-64 md:w-72 shadow-[0_20px_50px_-12px_rgba(56,189,248,0.4)] rounded-xl border border-white/10 bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-md flex items-center justify-center p-8 transform transition-transform hover:scale-105 hover:rotate-y-12 duration-700">
                        <img src="/images/book_math_blue.svg" alt="Math Smart Book Cover" class="w-full object-contain filter drop-shadow-2xl" />
                    </div>
                </div>

                <!-- Right: Text & Button with Premium Typography -->
                <div class="w-full md:w-7/12 text-center md:text-left space-y-8">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-sky-500/10 border border-sky-500/20 text-sky-400 text-xs font-semibold tracking-wider uppercase mb-2">
                        <span class="w-2 h-2 rounded-full bg-sky-400 animate-pulse"></span>
                        សៀវភៅថ្មីបំផុត
                    </div>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight" style="font-family: 'Outfit', sans-serif;">
                        ស្វែងយល់ពី<span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-indigo-400">អាថ៌កំបាំងគណិតវិទ្យា</span>
                    </h1>
                    <p class="text-slate-300 text-sm md:text-base leading-relaxed max-w-lg">
                        បណ្តុំឯកសារមេរៀនគណិតវិទ្យាល្អៗសម្រាប់អ្នកសិក្សាទូទៅ។ លោកអ្នកអាចស្វែងរកមេរៀន សៀវភៅជំនួយស្មារតី និងឯកសារស្រាវជ្រាវផ្សេងៗជាច្រើនទៀតបាននៅទីនេះដោយសេរី។ 
                        សៀវភៅនេះមានអត្ថប្រយោជន៍ជាច្រើនសម្រាប់សិស្សានុសិស្ស។
                    </p>
                    <div class="pt-4 flex flex-col sm:flex-row items-center gap-4 justify-center md:justify-start">
                        <button class="px-8 py-3.5 rounded-full text-white font-bold text-sm shadow-[0_0_20px_rgba(56,189,248,0.3)] transition-all hover:shadow-[0_0_30px_rgba(56,189,248,0.5)] hover:-translate-y-1 bg-gradient-to-r from-sky-500 to-indigo-500 w-full sm:w-auto">
                            អានសៀវភៅឥឡូវនេះ
                        </button>
                        <button class="px-8 py-3.5 rounded-full text-white font-bold text-sm border border-slate-700 bg-slate-800/50 hover:bg-slate-800 transition-all backdrop-blur-sm w-full sm:w-auto">
                            មើលមាតិកា
                        </button>
                    </div>
                </div>

            </div>
            
            <!-- Elegant Dots -->
            <div class="flex justify-center gap-3 mt-16">
                <div class="w-8 h-1.5 rounded-full bg-sky-500"></div>
                <div class="w-2 h-1.5 rounded-full bg-slate-700 transition-all hover:bg-slate-500 cursor-pointer"></div>
                <div class="w-2 h-1.5 rounded-full bg-slate-700 transition-all hover:bg-slate-500 cursor-pointer"></div>
            </div>
        </div>
    </section>

    <!-- MAIN CONTENT: GRID & SIDEBAR -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 bg-slate-50 relative">
        <div class="absolute top-0 inset-x-0 h-40 bg-gradient-to-b from-white to-transparent pointer-events-none"></div>
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 relative z-10">
            
            <!-- LEFT: Book Grid (3 columns on lg, 2 on md) -->
            <div class="lg:col-span-3">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-2xl font-bold text-slate-900 tracking-tight">សៀវភៅពេញនិយម</h2>
                    <a href="#" class="text-sm font-semibold text-sky-600 hover:text-sky-700 flex items-center gap-1 transition-colors">
                        មើលទាំងអស់
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-3 gap-8">
                    
                    <!-- Book Item 1 (Links to detail page) -->
                    <a href="/books/detail" class="group cursor-pointer block">
                        <div class="relative overflow-hidden rounded-2xl shadow-sm border border-slate-200/60 group-hover:shadow-2xl transition-all duration-500 bg-white flex justify-center items-center p-6 transform group-hover:-translate-y-2">
                            <img src="/images/book_maths_yellow.jpg" alt="Book 1" class="w-full aspect-[3/4] object-contain group-hover:scale-105 transition-transform duration-700 drop-shadow-xl">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                <button class="w-full py-2.5 bg-white text-slate-900 font-bold text-xs rounded-xl shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:bg-sky-50">មើលព័ត៌មានលម្អិត</button>
                            </div>
                        </div>
                    </a>
                    
                    <!-- Book Item 2 -->
                    <div class="group cursor-pointer">
                        <div class="relative overflow-hidden rounded-2xl shadow-sm border border-slate-200/60 group-hover:shadow-2xl transition-all duration-500 bg-white flex justify-center items-center p-6 transform group-hover:-translate-y-2">
                            <img src="/images/book_math_green.svg" alt="Book 2" class="w-full aspect-[3/4] object-contain group-hover:scale-105 transition-transform duration-700 drop-shadow-xl">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                <button class="w-full py-2.5 bg-white text-slate-900 font-bold text-xs rounded-xl shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:bg-sky-50">អានឥឡូវនេះ</button>
                            </div>
                        </div>
                    </div>

                    <!-- Book Item 3 -->
                    <div class="group cursor-pointer">
                        <div class="relative overflow-hidden rounded-2xl shadow-sm border border-slate-200/60 group-hover:shadow-2xl transition-all duration-500 bg-white flex justify-center items-center p-6 transform group-hover:-translate-y-2">
                            <img src="/images/book_math_polyhedron.svg" alt="Book 3" class="w-full aspect-[3/4] object-contain group-hover:scale-105 transition-transform duration-700 drop-shadow-xl">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                <button class="w-full py-2.5 bg-white text-slate-900 font-bold text-xs rounded-xl shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:bg-sky-50">អានឥឡូវនេះ</button>
                            </div>
                        </div>
                    </div>

                    <!-- Book Item 4 -->
                    <div class="group cursor-pointer">
                        <div class="relative overflow-hidden rounded-2xl shadow-sm border border-slate-200/60 group-hover:shadow-2xl transition-all duration-500 bg-white flex justify-center items-center p-6 transform group-hover:-translate-y-2">
                            <img src="/images/book_math_teal.svg" alt="Book 4" class="w-full aspect-[3/4] object-contain group-hover:scale-105 transition-transform duration-700 drop-shadow-xl">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                <button class="w-full py-2.5 bg-white text-slate-900 font-bold text-xs rounded-xl shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:bg-sky-50">អានឥឡូវនេះ</button>
                            </div>
                        </div>
                    </div>

                    <!-- Book Item 5 -->
                    <div class="group cursor-pointer">
                        <div class="relative overflow-hidden rounded-2xl shadow-sm border border-slate-200/60 group-hover:shadow-2xl transition-all duration-500 bg-white flex justify-center items-center p-6 transform group-hover:-translate-y-2">
                            <img src="/images/book_cambodian_apsara.svg" alt="Book 5" class="w-full aspect-[3/4] object-contain group-hover:scale-105 transition-transform duration-700 drop-shadow-xl">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                <button class="w-full py-2.5 bg-white text-slate-900 font-bold text-xs rounded-xl shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:bg-sky-50">អានឥឡូវនេះ</button>
                            </div>
                        </div>
                    </div>

                    <!-- Book Item 6 -->
                    <div class="group cursor-pointer">
                        <div class="relative overflow-hidden rounded-2xl shadow-sm border border-slate-200/60 group-hover:shadow-2xl transition-all duration-500 bg-white flex justify-center items-center p-6 transform group-hover:-translate-y-2">
                            <img src="/images/book_cambodian_history.svg" alt="Book 6" class="w-full aspect-[3/4] object-contain group-hover:scale-105 transition-transform duration-700 drop-shadow-xl">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                <button class="w-full py-2.5 bg-white text-slate-900 font-bold text-xs rounded-xl shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:bg-sky-50">អានឥឡូវនេះ</button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Book Item 7 -->
                    <div class="group cursor-pointer">
                        <div class="relative overflow-hidden rounded-2xl shadow-sm border border-slate-200/60 group-hover:shadow-2xl transition-all duration-500 bg-slate-900 flex justify-center items-center transform group-hover:-translate-y-2">
                            <img src="/images/book_maths_yellow.jpg" alt="Book 7" class="w-full aspect-[3/4] object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                <button class="w-full py-2.5 bg-sky-500 text-white font-bold text-xs rounded-xl shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:bg-sky-400">អានឥឡូវនេះ</button>
                            </div>
                        </div>
                    </div>

                    <!-- Book Item 8 -->
                    <div class="group cursor-pointer">
                        <div class="relative overflow-hidden rounded-2xl shadow-sm border border-slate-200/60 group-hover:shadow-2xl transition-all duration-500 bg-white flex justify-center items-center p-6 transform group-hover:-translate-y-2">
                            <img src="/images/book_math_blue.svg" alt="Book 8" class="w-full aspect-[3/4] object-contain group-hover:scale-105 transition-transform duration-700 drop-shadow-xl">
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                <button class="w-full py-2.5 bg-white text-slate-900 font-bold text-xs rounded-xl shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:bg-sky-50">អានឥឡូវនេះ</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- RIGHT: Sidebar (Premium styling) -->
            <div class="lg:col-span-1 space-y-8">
                
                <!-- Filter Card -->
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 p-6">
                    <h3 class="text-base font-bold text-slate-900 mb-5 flex items-center gap-2">
                        <svg class="w-5 h-5 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                        តម្រងការស្វែងរក
                    </h3>
                    
                    <!-- Filter: Category -->
                    <div class="mb-6">
                        <h4 class="text-sm font-semibold text-slate-700 mb-3">ប្រភេទសៀវភៅ</h4>
                        <div class="space-y-2.5">
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="checkbox" class="w-4.5 h-4.5 rounded border-slate-300 text-sky-500 focus:ring-sky-500 transition-colors">
                                <span class="text-sm text-slate-600 group-hover:text-slate-900 transition-colors">ថ្នាក់ទី ៧ ដល់ ៩</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="checkbox" class="w-4.5 h-4.5 rounded border-slate-300 text-sky-500 focus:ring-sky-500 transition-colors">
                                <span class="text-sm text-slate-600 group-hover:text-slate-900 transition-colors">ថ្នាក់ទី ១០ ដល់ ១២</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="checkbox" class="w-4.5 h-4.5 rounded border-slate-300 text-sky-500 focus:ring-sky-500 transition-colors">
                                <span class="text-sm text-slate-600 group-hover:text-slate-900 transition-colors">ស្រាវជ្រាវទូទៅ</span>
                            </label>
                        </div>
                    </div>

                    <!-- Filter: Price -->
                    <div>
                        <h4 class="text-sm font-semibold text-slate-700 mb-3">តម្លៃសៀវភៅ</h4>
                        <div class="space-y-2.5">
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="checkbox" class="w-4.5 h-4.5 rounded border-slate-300 text-sky-500 focus:ring-sky-500 transition-colors">
                                <span class="text-sm text-slate-600 group-hover:text-slate-900 transition-colors">ឥតគិតថ្លៃ</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="checkbox" class="w-4.5 h-4.5 rounded border-slate-300 text-sky-500 focus:ring-sky-500 transition-colors">
                                <span class="text-sm text-slate-600 group-hover:text-slate-900 transition-colors">សម្រាប់លក់ (Premium)</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Promo Banner -->
                <div class="rounded-2xl overflow-hidden shadow-lg relative group cursor-pointer border border-sky-500/20 transform hover:-translate-y-1 transition-all duration-500">
                    <img src="/images/math_test_camera_tutorial.jpg" alt="Promo" class="w-full aspect-[4/5] object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent"></div>
                    <div class="absolute inset-x-0 bottom-0 p-5">
                        <span class="inline-block px-2 py-1 rounded bg-rose-500 text-white text-[10px] font-bold tracking-wider uppercase mb-2">HOT OFFER</span>
                        <h4 class="text-white text-lg font-bold leading-tight mb-1">ថ្នាក់រៀនគណិតវិទ្យាពិសេស</h4>
                        <p class="text-slate-300 text-xs mb-3">ចុះឈ្មោះឥឡូវនេះដើម្បីទទួលបានការបញ្ចុះតម្លៃ</p>
                        <div class="inline-flex items-center gap-2 text-sky-400 text-xs font-bold">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            090 000 000
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

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
                        <li><a href="/mathematics" class="hover:text-white transition-colors">មេរៀនគណិតវិទ្យា</a></li>
                        <li><a href="/books" class="hover:text-white transition-colors">សៀវភៅពុម្ព និងលំហាត់</a></li>
                        <li><a href="#courses" class="hover:text-white transition-colors">វគ្គសិក្សាអនឡាញ</a></li>
                    </ul>
                </div>

                <div>
                    <h5 class="text-white font-semibold text-xs tracking-wider uppercase mb-3">ឧបករណ៍ និងជំនួយ</h5>
                    <ul class="space-y-2 text-xs">
                        <li><button onclick="alert('ជំនួយកិច្ចការផ្ទះ')" class="hover:text-white transition-colors text-left cursor-pointer">ជំនួយកិច្ចការផ្ទះ</button></li>
                        <li><button onclick="alert('លំហាត់ប្រចាំថ្ងៃ')" class="hover:text-white transition-colors text-left cursor-pointer">លំហាត់ប្រចាំថ្ងៃ</button></li>
                        <li><button onclick="alert('ទាញយក App')" class="hover:text-white transition-colors text-left cursor-pointer">ទាញយក App ទូរស័ព្ទ</button></li>
                        <li><a href="#contact" class="hover:text-white transition-colors">ទំនាក់ទំនងក្រុមការងារ</a></li>
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

</body>
</html>
