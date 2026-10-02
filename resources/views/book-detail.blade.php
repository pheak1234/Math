<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>លម្អិតសៀវភៅ - ANONTAK</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,300..700;1,300..700&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-rose-50/50 text-slate-800 antialiased font-sans flex flex-col min-h-screen">

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
                    <!-- User Account / Profile -->
                    <div class="relative">
                        @auth
                            <button onclick="toggleUserMenu()" id="userBtn" class="flex items-center gap-2 p-1.5 sm:px-3 sm:py-1.5 rounded-full text-slate-700 hover:bg-slate-100 transition-colors bg-white shadow-sm border border-slate-200">
                                <div class="w-7 h-7 rounded-full bg-sky-100 text-sky-700 flex items-center justify-center font-bold text-sm">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
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
                        @else
                            <button onclick="toggleUserMenu()" id="userBtn" class="flex items-center gap-1.5 p-1.5 sm:px-2 sm:py-1 rounded-full text-slate-700 hover:bg-slate-100 transition-colors">
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
                        @endauth
                    </div>
                    <div class="flex items-center text-xs font-semibold border border-slate-200 rounded-lg p-0.5 bg-slate-50">
                        <button class="px-2 py-1 rounded bg-white text-slate-900 shadow-2xs font-bold">ENG</button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- PREMIUM LIGHT BOOK DETAIL SECTION -->
    <main class="flex-grow relative py-12 md:py-24 overflow-hidden" style="background-color: #fcf8f7; background-image: radial-gradient(#e2e8f0 1px, transparent 1px); background-size: 32px 32px;">
        
        <!-- Soft Ambient Glows (Light Mode) -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
            <div class="absolute top-[-10%] right-[-5%] w-[600px] h-[600px] bg-rose-200/40 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-[-10%] left-[-5%] w-[600px] h-[600px] bg-sky-200/40 rounded-full blur-[100px]"></div>
        </div>

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 w-full relative z-10">
            
            <div class="flex flex-col md:flex-row gap-12 lg:gap-20 items-center md:items-start">
                
                <!-- Left: Book Image with Premium Light Shadow -->
                <div class="w-full md:w-5/12 flex justify-center perspective-1000">
                    <div class="w-64 md:w-80 shadow-[0_30px_60px_-15px_rgba(0,0,0,0.15)] rounded-lg border border-slate-200 bg-white relative group overflow-hidden transform transition-all duration-700 hover:scale-105 hover:rotate-y-3">
                        <img src="/images/book_maths_yellow.jpg" alt="Business Mathematics" class="w-full h-auto object-cover" />
                        <!-- Glass reflection -->
                        <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/40 to-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                        
                        <!-- Free/Premium Badge on Image -->
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-md text-slate-800 text-xs font-extrabold px-3 py-1.5 rounded-full shadow-md border border-slate-100">
                            ពេញនិយមបំផុត
                        </div>
                    </div>
                </div>

                <!-- Right: Book Info Premium Light -->
                <div class="w-full md:w-7/12 space-y-8 pt-4 text-center md:text-left">
                    
                    <div class="space-y-3">
                        <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight" style="font-family: 'Outfit', sans-serif;">
                            Business Mathematics
                        </h1>
                        <p class="text-xl text-slate-500 font-medium tracking-wide">Student's Edition</p>
                    </div>
                    
                    <div class="flex items-center justify-center md:justify-start gap-4">
                        <span class="px-5 py-2 bg-white/80 backdrop-blur-sm border border-slate-200/60 rounded-full font-bold text-slate-800 text-lg shadow-sm flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse"></span> 5.00$
                        </span>
                        <span class="px-5 py-2 bg-emerald-50 border border-emerald-100 rounded-full font-semibold text-emerald-600 text-sm shadow-xs">
                            មានក្នុងស្តុក (In Stock)
                        </span>
                    </div>
                    
                    <div class="text-slate-600 leading-relaxed text-base md:text-lg space-y-5 max-w-2xl bg-white/60 p-6 rounded-2xl border border-white backdrop-blur-xl shadow-sm">
                        <p>
                            អត្ថបទបរិយាយអំពីសៀវភៅ។ សៀវភៅនេះមានផ្ទុកនូវលំហាត់ និងមេរៀនសំខាន់ៗជាច្រើន ដែលសាកសមបំផុតសម្រាប់សិស្សានុសិស្ស ក្នុងការសិក្សាស្រាវជ្រាវ និងត្រៀមប្រឡង។ 
                        </p>
                        <p>
                            វាត្រូវបានរៀបរៀងឡើងដោយយកចិត្តទុកដាក់បំផុត ព្រមទាំងមានការពន្យល់យ៉ាងក្បោះក្បាយងាយយល់ ដើម្បីជួយអភិវឌ្ឍសមត្ថភាពគណិតវិទ្យារបស់អ្នកឲ្យកាន់តែប្រសើរ។
                        </p>
                    </div>

                    <div class="flex items-center justify-center md:justify-start gap-3">
                        <span class="text-slate-500 text-sm">អ្នកនិពន្ធ៖</span>
                        <a href="#" class="text-rose-500 hover:text-rose-600 font-bold text-base transition-colors flex items-center gap-1 group">
                            LANGE
                            <svg class="w-4 h-4 transform transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>

                    <!-- Premium Actions Light -->
                    <div class="pt-8 flex flex-col sm:flex-row items-center gap-4 justify-center md:justify-start border-t border-slate-200/60">
                        
                        <!-- Read Preview Button -->
                        <a href="/read-book" target="_blank" class="w-full sm:w-auto px-8 py-3.5 rounded-full text-slate-600 font-semibold text-sm border border-slate-200 bg-white hover:bg-slate-50 hover:text-slate-900 transition-all shadow-sm flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                            អានសៀវភៅគំរូ
                        </a>
                        
                        <!-- Buy Button -->
                        <button class="w-full sm:w-auto px-10 py-3.5 rounded-full text-white font-bold text-sm shadow-[0_8px_15px_-3px_rgba(37,99,235,0.3)] transition-all hover:shadow-[0_12px_20px_-3px_rgba(37,99,235,0.4)] hover:-translate-y-1 bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                            ទិញសៀវភៅ 5.00$
                        </button>

                        <!-- Save to Library -->
                        <button class="w-full sm:w-auto px-6 py-3.5 rounded-full text-orange-600 font-semibold text-sm border border-orange-200 bg-orange-50 hover:bg-orange-500 hover:text-white transition-all shadow-sm flex items-center justify-center gap-2 group">
                            <svg class="w-5 h-5 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg>
                            <span class="sm:hidden lg:inline">រក្សាទុក</span>
                        </button>
                    </div>

                </div>

            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-400 text-sm border-t border-slate-800 mt-auto">
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
                        <li><button class="hover:text-white transition-colors text-left cursor-pointer">ជំនួយកិច្ចការផ្ទះ</button></li>
                        <li><button class="hover:text-white transition-colors text-left cursor-pointer">លំហាត់ប្រចាំថ្ងៃ</button></li>
                        <li><button class="hover:text-white transition-colors text-left cursor-pointer">ទាញយក App ទូរស័ព្ទ</button></li>
                        <li><a href="#contact" class="hover:text-white transition-colors">ទំនាក់ទំនងក្រុមការងារ</a></li>
                    </ul>
                </div>

                <div>
                    <h5 class="text-white font-semibold text-xs tracking-wider uppercase mb-3">ទទួលព័ត៌មានថ្មីៗ</h5>
                    <p class="text-xs text-slate-400 mb-3">ចុះឈ្មោះអ៊ីមែលដើម្បីទទួលបានលំហាត់ថ្មីៗ និងសៀវភៅឥតគិតថ្លៃ៖</p>
                    <form onsubmit="return false;" class="flex gap-2">
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
