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

    @include('partials.header')

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

    <!-- MAIN CONTENT: 5-COLUMN BOOK GRID & PAGINATION (10 BOOKS PER PAGE) -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 bg-slate-50 relative">
        <div class="absolute top-0 inset-x-0 h-40 bg-gradient-to-b from-white to-transparent pointer-events-none"></div>
        
        <div class="relative z-10">
            <!-- Header and Filter Bar -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10 pb-6 border-b border-slate-200">
                <div>
                    <h2 class="text-2xl sm:text-3xl font-bold text-slate-900 tracking-tight">សៀវភៅទាំងអស់</h2>
                    <p class="text-slate-500 text-sm mt-1">បណ្តុំសៀវភៅគណិតវិទ្យា និងវិទ្យាសាស្ត្រគុណភាពខ្ពស់</p>
                </div>

                <div class="flex items-center gap-2 overflow-x-auto pb-2 md:pb-0">
                    <a href="{{ route('books.index', ['tab' => 'all']) }}" 
                       class="px-4 py-2 rounded-full text-xs font-bold transition-all shadow-xs {{ ($tab ?? 'all') === 'all' ? 'bg-sky-600 text-white shadow-sky-200' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
                        ទាំងអស់ ({{ $counts['all'] ?? $books->total() }})
                    </a>
                    <a href="{{ route('books.index', ['tab' => 'free']) }}" 
                       class="px-4 py-2 rounded-full text-xs font-bold transition-all shadow-xs {{ ($tab ?? '') === 'free' ? 'bg-emerald-600 text-white shadow-emerald-200' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
                        ឥតគិតថ្លៃ ({{ $counts['free'] ?? 0 }})
                    </a>
                    <a href="{{ route('books.index', ['tab' => 'premium']) }}" 
                       class="px-4 py-2 rounded-full text-xs font-bold transition-all shadow-xs {{ ($tab ?? '') === 'premium' ? 'bg-slate-900 text-white shadow-slate-200' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
                        Premium ({{ $counts['premium'] ?? 0 }})
                    </a>
                </div>
            </div>

            <!-- 5-Column Book Grid (5 items per row) -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4 sm:gap-5">
                @forelse($books as $book)
                    <div class="bg-white border border-slate-200 hover:border-slate-300 hover:shadow-md transition-all duration-200 flex flex-col relative">
                        <!-- Image Container -->
                        <a href="{{ route('books.show', $book->id) }}" class="block relative aspect-[3/4] overflow-hidden border-b border-slate-100">
                            <img src="{{ $book->cover_image ?? '/images/book_math_blue.svg' }}" alt="{{ $book->title }}" class="absolute inset-0 w-full h-full object-cover hover:scale-105 transition-transform duration-300" />
                            
                            <!-- Badges -->
                            @if($book->price > 0)
                                <div class="absolute top-0 left-0 bg-amber-500 text-white text-[10px] font-bold px-2 py-1 uppercase tracking-wide z-10 shadow-sm">
                                    Premium
                                </div>
                            @else
                                <div class="absolute top-0 left-0 bg-emerald-500 text-white text-[10px] font-bold px-2 py-1 uppercase tracking-wide z-10 shadow-sm">
                                    Free
                                </div>
                            @endif
                        </a>
                        
                        <!-- Details -->
                        <div class="p-3 flex flex-col flex-1">
                            <!-- Title -->
                            <a href="{{ route('books.show', $book->id) }}" class="text-sm font-medium text-sky-700 hover:text-orange-600 hover:underline line-clamp-2 leading-tight mb-1">
                                {{ $book->title }}
                            </a>
                            
                            <!-- Author -->
                            <div class="text-[11px] text-slate-500 mb-1.5">
                                ដោយ <span class="text-slate-700">{{ $book->author ?? 'ANONTAK' }}</span>
                            </div>
                            
                            <!-- Rating -->
                            <div class="flex items-center gap-1 mb-2">
                                <div class="flex text-amber-500 text-xs">
                                    @php
                                        $avg = $book->averageRating();
                                        $fullStars = floor($avg);
                                    @endphp
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $fullStars)
                                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                        @else
                                            <svg class="w-3.5 h-3.5 fill-current text-slate-300" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                                        @endif
                                    @endfor
                                </div>
                                <span class="text-[11px] text-sky-600 hover:underline">{{ $book->reviews->count() }}</span>
                            </div>
                            
                            <!-- Price & Status -->
                            <div class="mt-auto pt-2 flex items-end justify-between">
                                <div>
                                    @if($book->price > 0)
                                        <div class="text-lg font-bold text-slate-900 leading-none">${{ number_format($book->price, 2) }}</div>
                                    @else
                                        <div class="text-base font-bold text-emerald-600 leading-none">FREE</div>
                                    @endif
                                </div>
                                
                                @if(Auth::check() && Auth::user()->hasReadBook($book))
                                    <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-1.5 py-0.5 border border-emerald-200">
                                        ✓ នៅក្នុងបណ្ណាល័យ
                                    </span>
                                @elseif(Auth::check() && Auth::user()->hasOrderedBook($book))
                                    <span class="text-[10px] font-bold text-amber-700 bg-amber-50 px-1.5 py-0.5 border border-amber-200">
                                        កំពុងរង់ចាំ
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center bg-white rounded-2xl border border-slate-200">
                        <p class="text-slate-500 text-sm">មិនទាន់មានសៀវភៅក្នុងផ្នែកនេះនៅឡើយទេ។</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination (if over 10 items) -->
            @if($books->hasPages())
                <div class="mt-14 pt-8 border-t border-slate-200/80 flex justify-center">
                    {{ $books->links('vendor.pagination.tailwind') }}
                </div>
            @endif
        </div>
    </section>

    @include('partials.footer')

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            if (menu) {
                menu.classList.toggle('hidden');
            }
        }

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
