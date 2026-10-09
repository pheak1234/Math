<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $article->title }} - ANONTAK</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,300..700;1,300..700&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 antialiased font-sans flex flex-col min-h-screen">

    @include('partials.header')

    <!-- ARTICLE DETAIL CONTENT -->
    <main class="flex-grow py-10 md:py-16">
        <article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Breadcrumb Navigation -->
            <div class="mb-6 flex items-center gap-2 text-xs sm:text-sm text-slate-500 font-medium">
                <a href="{{ route('articles.index') }}" class="hover:text-sky-600 flex items-center gap-1">
                    <span>&larr;</span>
                    <span>អត្ថបទទាំងអស់</span>
                </a>
                <span>/</span>
                <span class="text-sky-600 font-semibold">{{ $article->category }}</span>
            </div>

            <!-- Header: Category & Title -->
            <header class="mb-8">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold text-white mb-4 {{ $article->category === 'វិធីសាស្ត្រ' ? 'bg-sky-600' : ($article->category === 'ទ្រឹស្ដីបទ' ? 'bg-indigo-600' : ($article->category === 'ការរៀនសូត្រ' ? 'bg-emerald-600' : 'bg-amber-600')) }}">
                    {{ $article->category }}
                </div>
                
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight leading-tight">
                    {{ $article->title }}
                </h1>

                <div class="mt-4 flex flex-wrap items-center gap-4 text-xs sm:text-sm text-slate-500 border-b border-slate-200 pb-6">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-sky-100 text-sky-700 font-bold flex items-center justify-center text-xs">
                            {{ substr($article->author, 0, 1) }}
                        </div>
                        <span class="font-semibold text-slate-800">{{ $article->author }}</span>
                    </div>
                    <span>&bull;</span>
                    <span>កាលបរិច្ឆេទ៖ {{ $article->published_at ? $article->published_at->format('d M Y') : 'ថ្មីៗ' }}</span>
                    @if($article->read_time)
                        <span>&bull;</span>
                        <span>⏱ រយៈពេលអាន៖ {{ $article->read_time }}</span>
                    @endif
                </div>
            </header>

            <!-- Featured Image -->
            @if($article->image)
                <div class="aspect-[21/9] w-full rounded-2xl overflow-hidden shadow-md mb-10 bg-slate-900">
                    @php
                        $imgSrc = str_starts_with($article->image, '/') || str_starts_with($article->image, 'http') 
                            ? $article->image 
                            : Storage::url($article->image);
                    @endphp
                    <img src="{{ $imgSrc }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                </div>
            @endif

            <!-- Excerpt / Lead -->
            @if($article->summary)
                <div class="p-5 sm:p-6 rounded-2xl bg-sky-50/70 border border-sky-100 text-slate-700 text-sm sm:text-base leading-relaxed mb-8 font-medium">
                    {{ $article->summary }}
                </div>
            @endif

            <!-- Article Body -->
            <div class="prose max-w-none text-slate-700 text-sm sm:text-base leading-relaxed space-y-4">
                {!! $article->content !!}
            </div>

            <!-- Author Bio & Back -->
            <div class="mt-12 pt-8 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-slate-900 text-white font-bold flex items-center justify-center">
                        {{ substr($article->author, 0, 1) }}
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 text-sm">{{ $article->author }}</h4>
                        <p class="text-xs text-slate-500">អ្នកនិពន្ធ និងស្រាវជ្រាវគណិតវិទ្យា</p>
                    </div>
                </div>

                <a href="{{ route('articles.index') }}" class="px-5 py-2.5 rounded-xl bg-white border border-slate-200 text-xs font-bold text-slate-700 hover:bg-slate-50 hover:text-sky-600 transition-colors shadow-2xs">
                    &larr; អានអត្ថបទផ្សេងទៀត
                </a>
            </div>

        </article>

        <!-- Related Articles -->
        @if($relatedArticles->isNotEmpty())
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-16 pt-12 border-t border-slate-200">
                <h3 class="text-xl sm:text-2xl font-bold text-slate-900 mb-8">អត្ថបទពាក់ព័ន្ធ</h3>
                
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                    @foreach($relatedArticles as $related)
                        <article class="bg-white rounded-xl overflow-hidden border border-slate-200 shadow-2xs hover:shadow-md transition-all group flex flex-col">
                            <a href="{{ route('articles.show', $related->id) }}" class="aspect-[16/10] overflow-hidden bg-slate-100 block relative">
                                @php
                                    if ($related->image) {
                                        $relImgSrc = str_starts_with($related->image, '/') || str_starts_with($related->image, 'http') 
                                            ? $related->image 
                                            : Storage::url($related->image);
                                    } else {
                                        $relImgSrc = '/images/article_teacher.svg';
                                    }
                                @endphp
                                <img src="{{ $relImgSrc }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </a>
                            <div class="p-4 flex-1 flex flex-col justify-between">
                                <a href="{{ route('articles.show', $related->id) }}">
                                    <h4 class="font-bold text-slate-800 text-xs sm:text-sm line-clamp-2 group-hover:text-sky-600 transition-colors">
                                        {{ $related->title }}
                                    </h4>
                                </a>
                                <div class="mt-3 pt-2 border-t border-slate-100 flex items-center justify-between text-[11px] text-slate-400">
                                    <span>{{ $related->category }}</span>
                                    <a href="{{ route('articles.show', $related->id) }}" class="text-sky-600 font-semibold hover:underline">
                                        អានបន្ត &rarr;
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
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
    </script>
</body>
</html>
