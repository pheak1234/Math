<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>អត្ថបទគណិតវិទ្យា - ANONTAK (Math Articles & Insights)</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,300..700;1,300..700&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 antialiased font-sans flex flex-col min-h-screen">

    @include('partials.header')

    <!-- HERO SECTION (Articles Banner) -->
    <section class="relative py-14 md:py-20 overflow-hidden bg-slate-900"
             style="background-image: url('/images/hero_math_blackboard.jpg'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-slate-950/85 pointer-events-none z-0"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-sky-500/15 rounded-full blur-[100px] pointer-events-none z-0"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-sky-500/10 border border-sky-500/20 text-sky-400 text-xs font-semibold tracking-wider uppercase mb-4">
                <span class="w-2 h-2 rounded-full bg-sky-400 animate-pulse"></span>
                ចំណេះដឹង និងការស្រាវជ្រាវ
            </div>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white tracking-tight" style="font-family: 'Outfit', sans-serif;">
                អត្ថបទ និងចំណេះដឹង<span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-indigo-400">គណិតវិទ្យា</span>
            </h1>
            <p class="text-slate-300 text-sm md:text-base leading-relaxed max-w-2xl mx-auto mt-4">
                កម្រងអត្ថបទស្រាវជ្រាវ គន្លឹះដោះស្រាយលំហាត់ វិធីសាស្ត្របង្រៀនគរុកោសល្យ និងការអនុវត្តគណិតវិទ្យាក្នុងវិស័យហិរញ្ញវត្ថុ និងជីវភាពរស់នៅជាក់ស្ដែង។
            </p>
        </div>
    </section>

    <!-- MAIN CONTENT: 8 POSTS PER PAGE & PAGINATION -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16 w-full">
        
        <!-- Category Filter Tabs -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-10 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight">កម្រងអត្ថបទទាំងអស់</h2>
                <p class="text-slate-500 text-xs sm:text-sm mt-0.5">បង្ហាញ ៨ អត្ថបទក្នុងមួយទំព័រ</p>
            </div>

            <div class="flex items-center gap-2 overflow-x-auto pb-2 sm:pb-0">
                <a href="{{ route('articles.index', ['category' => 'all']) }}" 
                   class="px-3.5 py-1.5 rounded-full text-xs font-bold transition-all shadow-2xs whitespace-nowrap {{ ($category ?? 'all') === 'all' ? 'bg-sky-600 text-white shadow-sky-200' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
                    ទាំងអស់ ({{ $counts['all'] ?? $articles->total() }})
                </a>
                <a href="{{ route('articles.index', ['category' => 'វិធីសាស្ត្រ']) }}" 
                   class="px-3.5 py-1.5 rounded-full text-xs font-bold transition-all shadow-2xs whitespace-nowrap {{ ($category ?? '') === 'វិធីសាស្ត្រ' ? 'bg-sky-600 text-white shadow-sky-200' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
                    វិធីសាស្ត្រ ({{ $counts['វិធីសាស្ត្រ'] ?? 0 }})
                </a>
                <a href="{{ route('articles.index', ['category' => 'ទ្រឹស្ដីបទ']) }}" 
                   class="px-3.5 py-1.5 rounded-full text-xs font-bold transition-all shadow-2xs whitespace-nowrap {{ ($category ?? '') === 'ទ្រឹស្ដីបទ' ? 'bg-indigo-600 text-white shadow-indigo-200' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
                    ទ្រឹស្ដីបទ ({{ $counts['ទ្រឹស្ដីបទ'] ?? 0 }})
                </a>
                <a href="{{ route('articles.index', ['category' => 'ការរៀនសូត្រ']) }}" 
                   class="px-3.5 py-1.5 rounded-full text-xs font-bold transition-all shadow-2xs whitespace-nowrap {{ ($category ?? '') === 'ការរៀនសូត្រ' ? 'bg-emerald-600 text-white shadow-emerald-200' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
                    ការរៀនសូត្រ ({{ $counts['ការរៀនសូត្រ'] ?? 0 }})
                </a>
                <a href="{{ route('articles.index', ['category' => 'ហិរញ្ញវត្ថុ']) }}" 
                   class="px-3.5 py-1.5 rounded-full text-xs font-bold transition-all shadow-2xs whitespace-nowrap {{ ($category ?? '') === 'ហិរញ្ញវត្ថុ' ? 'bg-amber-600 text-white shadow-amber-200' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
                    ហិរញ្ញវត្ថុ ({{ $counts['ហិរញ្ញវត្ថុ'] ?? 0 }})
                </a>
            </div>
        </div>

        <!-- 8-Card Responsive Grid (4 Columns on Desktop = 2 Rows) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($articles as $article)
                <article class="article-card bg-white rounded-2xl overflow-hidden border border-slate-200/90 shadow-2xs hover:shadow-lg group flex flex-col transform transition-all duration-300 hover:-translate-y-1">
                    <a href="{{ route('articles.show', $article->id) }}" class="block aspect-[16/10] w-full overflow-hidden bg-slate-100 relative">
                        @php
                            if ($article->image) {
                                $imgSrc = str_starts_with($article->image, '/') || str_starts_with($article->image, 'http') 
                                    ? $article->image 
                                    : Storage::url($article->image);
                            } else {
                                $imgSrc = '/images/article_teacher.svg';
                            }
                        @endphp
                        <img src="{{ $imgSrc }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" />
                        
                        @php
                            $badgeColor = match($article->category) {
                                'វិធីសាស្ត្រ' => 'bg-sky-600',
                                'ទ្រឹស្ដីបទ' => 'bg-indigo-600',
                                'ការរៀនសូត្រ' => 'bg-emerald-600',
                                'ហិរញ្ញវត្ថុ' => 'bg-amber-600',
                                default => 'bg-slate-700',
                            };
                        @endphp
                        <span class="absolute top-3 left-3 px-2.5 py-0.5 rounded-full text-[11px] font-bold text-white shadow-xs {{ $badgeColor }}">
                            {{ $article->category }}
                        </span>
                        
                        @if($article->read_time)
                            <span class="absolute bottom-2.5 right-2.5 px-2 py-0.5 rounded-md text-[10px] font-semibold bg-slate-900/70 backdrop-blur-xs text-white">
                                ⏱ {{ $article->read_time }}
                            </span>
                        @endif
                    </a>

                    <div class="p-4 sm:p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center gap-2 text-xs text-slate-400 mb-2 font-medium">
                                <span>{{ $article->published_at ? $article->published_at->format('d M Y') : 'ថ្មីៗ' }}</span>
                                <span>&bull;</span>
                                <span>{{ $article->author ?? 'ANONTAK' }}</span>
                            </div>

                            <a href="{{ route('articles.show', $article->id) }}">
                                <h3 class="font-bold text-slate-900 text-sm sm:text-base leading-snug group-hover:text-sky-600 transition-colors line-clamp-2">
                                    {{ $article->title }}
                                </h3>
                            </a>

                            <p class="text-xs text-slate-500 mt-2 line-clamp-2 leading-relaxed">
                                {{ $article->summary }}
                            </p>
                        </div>
                        
                        <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                            <a href="{{ route('articles.show', $article->id) }}" class="font-semibold text-sky-600 hover:text-sky-700 flex items-center gap-1 group-hover:underline">
                                <span>អានលម្អិត</span>
                                <span>&rarr;</span>
                            </a>
                            <span class="w-6 h-6 rounded-full bg-slate-50 group-hover:bg-sky-500 group-hover:text-white flex items-center justify-center text-slate-400 text-xs transition-colors">
                                &plus;
                            </span>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full py-16 text-center bg-white rounded-2xl border border-slate-200">
                    <p class="text-slate-500 text-sm">មិនទាន់មានអត្ថបទក្នុងប្រភេទនេះនៅឡើយទេ។</p>
                    <a href="{{ route('articles.index') }}" class="inline-block mt-3 text-xs font-semibold text-sky-600 hover:underline">
                        &larr; ត្រឡប់ទៅមើលអត្ថបទទាំងអស់
                    </a>
                </div>
            @endforelse
        </div>

        <!-- Custom Tailwind Pagination (When Over 8 Articles) -->
        @if($articles->hasPages())
            <div class="mt-14 pt-8 border-t border-slate-200/80 flex justify-center">
                {{ $articles->links('vendor.pagination.tailwind') }}
            </div>
        @endif

    </main>

    <!-- Footer -->
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
