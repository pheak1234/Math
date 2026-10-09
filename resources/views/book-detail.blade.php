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

    @include('partials.header')

    <!-- PREMIUM LIGHT BOOK DETAIL SECTION -->
    <main class="flex-grow relative py-12 md:py-24 overflow-hidden" style="background-color: #fcf8f7; background-image: radial-gradient(#e2e8f0 1px, transparent 1px); background-size: 32px 32px;">
        
        <!-- Soft Ambient Glows (Light Mode) -->
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
            <div class="absolute top-[-10%] right-[-5%] w-[600px] h-[600px] bg-rose-200/40 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-[-10%] left-[-5%] w-[600px] h-[600px] bg-sky-200/40 rounded-full blur-[100px]"></div>
        </div>

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 w-full relative z-10">
            
            @if(session('success'))
                <div class="mb-8 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-medium flex items-center gap-3 shadow-xs">
                    <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-8 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-sm font-medium flex items-center gap-3 shadow-xs">
                    <svg class="w-5 h-5 text-rose-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <div class="flex flex-col md:flex-row gap-12 lg:gap-20 items-center md:items-start">
                
                <!-- Left: Book Image with Premium Light Shadow -->
                <div class="w-full md:w-5/12 flex justify-center perspective-1000">
                    <div class="w-64 md:w-80 shadow-[0_30px_60px_-15px_rgba(0,0,0,0.15)] rounded-lg border border-slate-200 bg-white relative group overflow-hidden transform transition-all duration-700 hover:scale-105 hover:rotate-y-3">
                        <img src="{{ $book->cover_image ?? '/images/book_maths_yellow.jpg' }}" alt="{{ $book->title }}" class="w-full h-auto object-cover" />
                        <!-- Glass reflection -->
                        <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/40 to-white/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                        
                        <!-- Free/Premium Badge on Image -->
                        @if($book->price > 0)
                            <div class="absolute top-4 right-4 bg-gradient-to-r from-amber-500 via-orange-500 to-amber-600 text-white text-xs font-black px-4 py-1.5 rounded-full shadow-lg shadow-amber-500/30 border border-white/60 flex items-center gap-1.5 tracking-wider uppercase">
                                <span>👑</span> <span>PREMIUM</span>
                            </div>
                        @else
                            <div class="absolute top-4 right-4 bg-emerald-600 text-white text-xs font-extrabold px-3.5 py-1.5 rounded-full shadow-md border border-white/40 flex items-center gap-1">
                                <span>🎁</span> <span>ឥតគិតថ្លៃ (Free)</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Right: Book Info Premium Light -->
                <div class="w-full md:w-7/12 space-y-8 pt-4 text-center md:text-left">
                    
                    <div class="space-y-3">
                        <div class="flex items-center justify-center md:justify-start gap-2">
                            @if($book->price > 0)
                                <span class="px-3 py-1 rounded-full text-xs font-black bg-gradient-to-r from-amber-500 to-orange-500 text-white shadow-xs inline-flex items-center gap-1">
                                    <span>👑</span> <span>សៀវភៅ Premium</span>
                                </span>
                            @else
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800 border border-emerald-200 inline-flex items-center gap-1">
                                    <span>🎁</span> <span>សៀវភៅឥតគិតថ្លៃ</span>
                                </span>
                            @endif
                        </div>
                        <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight" style="font-family: 'Outfit', sans-serif;">
                            {{ $book->title }}
                        </h1>
                        <p class="text-xl text-slate-500 font-medium tracking-wide">សៀវភៅល្អបំផុត</p>
                    </div>
                    
                    <div class="flex flex-wrap items-center justify-center md:justify-start gap-3 sm:gap-4">
                        @if($book->price > 0)
                            <span class="px-5 py-2 bg-gradient-to-r from-amber-500/10 via-orange-500/10 to-amber-500/10 border-2 border-amber-400 rounded-full font-black text-amber-900 text-lg shadow-sm flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-amber-500 animate-pulse"></span> ${{ number_format($book->price, 2) }}
                                <span class="text-[10px] uppercase tracking-wider text-amber-800 bg-amber-200/90 px-2 py-0.5 rounded-full font-black">PRO</span>
                            </span>
                        @else
                            <span class="px-5 py-2 bg-emerald-50 border border-emerald-200 rounded-full font-bold text-emerald-800 text-lg shadow-sm flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span> ឥតគិតថ្លៃ (Free)
                            </span>
                        @endif
                        
                        <div class="flex items-center gap-2 px-4 py-2 bg-white/80 backdrop-blur-sm border border-slate-200/60 rounded-full shadow-sm">
                            <div class="flex text-amber-400 text-sm">
                                @php
                                    $avgRating = $book->averageRating();
                                    $fullStars = floor($avgRating);
                                @endphp
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $fullStars)
                                        ★
                                    @else
                                        ☆
                                    @endif
                                @endfor
                            </div>
                            <span class="font-bold text-slate-800 text-sm">{{ $avgRating > 0 ? number_format($avgRating, 1) : '0.0' }}</span>
                            <span class="text-xs text-slate-400">({{ $book->reviews->count() }} មតិ)</span>
                        </div>

                        <span class="px-5 py-2 bg-emerald-50 border border-emerald-100 rounded-full font-semibold text-emerald-600 text-sm shadow-xs">
                            មានក្នុងស្តុក (In Stock)
                        </span>
                    </div>
                    
                    <div class="text-slate-600 leading-relaxed text-base md:text-lg space-y-5 max-w-2xl bg-white/60 p-6 rounded-2xl border border-white backdrop-blur-xl shadow-sm">
                        <p>
                            {{ $book->description ?? 'អត្ថបទបរិយាយអំពីសៀវភៅមិនទាន់មាននៅឡើយទេ។' }}
                        </p>
                    </div>

                    <div class="flex items-center justify-center md:justify-start gap-3">
                        <span class="text-slate-500 text-sm">អ្នកនិពន្ធ៖</span>
                        <a href="#" class="text-rose-500 hover:text-rose-600 font-bold text-base transition-colors flex items-center gap-1 group">
                            {{ $book->author }}
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
                        
                        @if(!Auth::check())
                            <a href="{{ route('login') }}" class="w-full sm:w-auto px-10 py-3.5 rounded-full text-white font-bold text-sm shadow-[0_8px_15px_-3px_rgba(37,99,235,0.3)] transition-all hover:-translate-y-1 bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center justify-center gap-2">ចូលគណនីដើម្បីទិញសៀវភៅ</a>
                        @else
                            @if($inLibrary)
                                <a href="/dashboard" class="w-full sm:w-auto px-10 py-3.5 rounded-full text-white font-bold text-sm shadow-md transition-all hover:-translate-y-1 bg-green-600 flex items-center justify-center gap-2">ចូលអានសៀវភៅនេះ</a>
                            @else
                                @if($book->price == 0)
                                    <form method="POST" action="{{ route('books.add', $book->id) }}" class="w-full sm:w-auto">
                                        @csrf
                                        <button type="submit" class="w-full sm:w-auto px-10 py-3.5 rounded-full text-white font-bold text-sm shadow-[0_8px_15px_-3px_rgba(37,99,235,0.3)] transition-all hover:shadow-[0_12px_20px_-3px_rgba(37,99,235,0.4)] hover:-translate-y-1 bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center justify-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                            បន្ថែមសៀវភៅឥតគិតថ្លៃ (Free)
                                        </button>
                                    </form>
                                @else
                                    <button type="button" onclick="openOrderModal()" class="w-full sm:w-auto px-10 py-3.5 rounded-full text-white font-bold text-sm shadow-[0_8px_15px_-3px_rgba(37,99,235,0.3)] transition-all hover:shadow-[0_12px_20px_-3px_rgba(37,99,235,0.4)] hover:-translate-y-1 bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center justify-center gap-2 cursor-pointer">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                        ទិញសៀវភៅ ${{ number_format($book->price, 2) }}
                                    </button>
                                @endif
                            @endif
                        @endif
                    </div>

                </div>

            </div>

            <!-- RATINGS & REVIEWS SECTION -->
            <div class="mt-20 pt-16 border-t border-slate-200">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
                    <div>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight" style="font-family: 'Outfit', sans-serif;">
                            ការវាយតម្លៃ និងមតិយោបល់
                        </h2>
                        <p class="text-slate-500 text-sm mt-1">មតិយោបល់ និងបទពិសោធន៍ពីអ្នកអានសៀវភៅនេះ</p>
                    </div>

                    <!-- Average Rating Pill -->
                    <div class="flex items-center gap-3 px-5 py-3 bg-white rounded-2xl border border-slate-200 shadow-xs">
                        <div class="text-3xl font-black text-slate-900">{{ $avgRating > 0 ? number_format($avgRating, 1) : '0.0' }}</div>
                        <div>
                            <div class="flex text-amber-400 text-base">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $fullStars)
                                        ★
                                    @else
                                        ☆
                                    @endif
                                @endfor
                            </div>
                            <p class="text-xs text-slate-400 mt-0.5">ផ្អែកលើការវាយតម្លៃ {{ $book->reviews->count() }}</p>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                    
                    <!-- LEFT (1 col): Review Form or Restriction Notice -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm sticky top-24">
                            <h3 class="font-bold text-slate-900 text-lg mb-2">
                                @if(isset($userReview) && $userReview)
                                    កែប្រែការវាយតម្លៃរបស់អ្នក
                                @else
                                    វាយតម្លៃសៀវភៅនេះ
                                @endif
                            </h3>

                            @auth
                                @if($hasRead)
                                    <!-- User has read the book: Can rate and comment -->
                                    <form action="{{ route('books.review', $book->id) }}" method="POST" class="mt-4 space-y-4">
                                        @csrf
                                        
                                        <!-- Star Rating Selector -->
                                        <div>
                                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">កម្រិតផ្កាយ (Rating)</label>
                                            <div class="flex items-center gap-2" id="starRatingContainer">
                                                @php
                                                    $selectedRating = old('rating', $userReview->rating ?? 5);
                                                @endphp
                                                @for($star = 1; $star <= 5; $star++)
                                                    <label class="cursor-pointer group text-2xl transition-transform hover:scale-125">
                                                        <input type="radio" name="rating" value="{{ $star }}" class="hidden rating-star-input" {{ $selectedRating == $star ? 'checked' : '' }} onchange="updateStarDisplay({{ $star }})">
                                                        <span class="star-icon text-amber-400" data-star="{{ $star }}">
                                                            {{ $star <= $selectedRating ? '★' : '☆' }}
                                                        </span>
                                                    </label>
                                                @endfor
                                                <span id="ratingText" class="text-xs font-bold text-slate-600 ml-2">{{ $selectedRating }} / 5</span>
                                            </div>
                                            @error('rating')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Comment Input -->
                                        <div>
                                            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">មតិយោបល់របស់អ្នក (Feedback)</label>
                                            <textarea name="comment" rows="4" required placeholder="ចែករំលែកចំណាប់អារម្មណ៍របស់អ្នកអំពីខ្លឹមសារសៀវភៅនេះ..." class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 focus:border-sky-500 focus:ring focus:ring-sky-100 text-sm text-slate-800 transition-colors bg-slate-50">{{ old('comment', $userReview->comment ?? '') }}</textarea>
                                            @error('comment')
                                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <button type="submit" class="w-full py-3 rounded-xl bg-sky-600 hover:bg-sky-700 text-white font-bold text-sm shadow-xs transition-colors flex items-center justify-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                                            {{ isset($userReview) && $userReview ? 'កែប្រែការវាយតម្លៃ' : 'ផ្ញើការវាយតម្លៃ' }}
                                        </button>
                                    </form>
                                @else
                                    <!-- User is logged in but has NOT read the book -->
                                    <div class="mt-4 p-5 rounded-xl bg-amber-50/80 border border-amber-200 text-amber-800">
                                        <div class="flex items-start gap-3">
                                            <svg class="w-5 h-5 text-amber-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                            </svg>
                                            <div>
                                                <h4 class="font-bold text-sm text-amber-900">អនុញ្ញាតសម្រាប់តែអ្នកបានអានប៉ុណ្ណោះ</h4>
                                                <p class="text-xs text-amber-700 mt-1 leading-relaxed">
                                                    អ្នកអាចវាយតម្លៃ និងផ្តល់មតិយោបល់បាន លុះត្រាតែអ្នកបានអាន ឬបន្ថែមសៀវភៅនេះទៅក្នុងបណ្ណាល័យរបស់អ្នកជាមុនសិន។
                                                </p>
                                            </div>
                                        </div>

                                        <form action="{{ route('books.add', $book->id) }}" method="POST" class="mt-4">
                                            @csrf
                                            <button type="submit" class="w-full py-2.5 rounded-lg bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs shadow-xs transition-colors flex items-center justify-center gap-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                                បន្ថែមសៀវភៅដើម្បីចាប់ផ្តើមអាន
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            @else
                                <!-- Guest user: Must login -->
                                <div class="mt-4 p-5 rounded-xl bg-slate-50 border border-slate-200 text-center">
                                    <div class="w-12 h-12 rounded-full bg-sky-50 text-sky-600 flex items-center justify-center mx-auto mb-3">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
                                    </div>
                                    <h4 class="font-bold text-slate-800 text-sm">សូមចូលគណនីរបស់អ្នក</h4>
                                    <p class="text-xs text-slate-500 mt-1">សូមចូលគណនី និងអានសៀវភៅនេះ ដើម្បីអាចវាយតម្លៃ និងផ្តល់មតិយោបល់បាន។</p>
                                    <a href="/login" class="mt-4 inline-block w-full py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs shadow-xs transition-colors">
                                        ចូលគណនី (Login)
                                    </a>
                                </div>
                            @endauth
                        </div>
                    </div>

                    <!-- RIGHT (2 cols): Reviews List -->
                    <div class="lg:col-span-2 space-y-4">
                        <div class="flex items-center justify-between mb-2">
                            <h3 class="font-bold text-slate-900 text-base">
                                មតិយោបល់ទាំងអស់ ({{ $book->reviews->count() }})
                            </h3>
                        </div>

                        @forelse($book->reviews as $review)
                            <div class="bg-white rounded-2xl p-5 sm:p-6 border border-slate-200/80 shadow-xs">
                                <div class="flex items-start justify-between gap-4 mb-3">
                                    <div class="flex items-center gap-3">
                                        @if($review->user->profile_photo_url)
                                            <img src="{{ $review->user->profile_photo_url }}" alt="{{ $review->user->name }}" class="w-10 h-10 rounded-full object-cover ring-2 ring-slate-100">
                                        @else
                                            <div class="w-10 h-10 rounded-full bg-sky-100 text-sky-700 flex items-center justify-center font-bold text-sm ring-2 ring-slate-100">
                                                {{ substr($review->user->name, 0, 1) }}
                                            </div>
                                        @endif
                                        <div>
                                            <h4 class="font-bold text-slate-900 text-sm">{{ $review->user->name }}</h4>
                                            <p class="text-[11px] text-slate-400">{{ $review->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>

                                    <!-- Review Stars -->
                                    <div class="flex text-amber-400 text-sm">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $review->rating)
                                                ★
                                            @else
                                                ☆
                                            @endif
                                        @endfor
                                    </div>
                                </div>

                                <p class="text-slate-700 text-sm leading-relaxed whitespace-pre-line pl-13">
                                    {{ $review->comment }}
                                </p>
                            </div>
                        @empty
                            <div class="bg-white rounded-2xl p-10 border border-slate-200 text-center">
                                <div class="w-14 h-14 rounded-full bg-sky-50 text-sky-600 flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                                </div>
                                <h4 class="font-bold text-slate-800 text-base mb-1">មិនទាន់មានការវាយតម្លៃនៅឡើយទេ</h4>
                                <p class="text-slate-500 text-xs max-w-sm mx-auto">ក្លាយជាអ្នកដំបូងគេដែលបានអាន និងចែករំលែកមតិយោបល់របស់អ្នកអំពីសៀវភៅនេះ!</p>
                            </div>
                        @endforelse
                    </div>

                </div>
            </div>

        </div>
    </main>

    <script>
        function updateStarDisplay(selected) {
            const stars = document.querySelectorAll('.star-icon');
            stars.forEach(star => {
                const val = parseInt(star.getAttribute('data-star'));
                star.textContent = val <= selected ? '★' : '☆';
            });
            const ratingText = document.getElementById('ratingText');
            if (ratingText) {
                ratingText.textContent = selected + ' / 5';
            }
        }
    </script>

    
    <!-- Book Order Modal -->
    <div id="orderModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-lg w-full p-6 shadow-2xl border border-slate-100 relative">
            <button onclick="closeOrderModal()" class="absolute top-5 right-5 text-slate-400 hover:text-slate-700 cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            
            <h3 class="text-lg font-bold text-slate-900 mb-1">បញ្ជាក់ការទិញសៀវភៅ</h3>
            
            <div class="flex items-center gap-4 mt-4 p-4 bg-slate-50 rounded-2xl border border-slate-100">
                <div class="w-12 h-16 bg-slate-200 rounded shadow-sm overflow-hidden flex-shrink-0">
                    <img src="{{ $book->cover_image ?? '/images/book_math_blue.svg' }}" alt="{{ $book->title }}" class="w-full h-full object-cover">
                </div>
                <div>
                    <h4 class="font-bold text-slate-800 text-sm line-clamp-1">{{ $book->title }}</h4>
                    <p class="text-sky-600 font-bold text-xs mt-1">${{ number_format($book->price, 2) }}</p>
                </div>
            </div>

            <form id="orderForm" method="POST" action="{{ route('books.order', $book->id) }}" enctype="multipart/form-data" class="space-y-4 mt-5">
                @csrf
                <input type="hidden" name="order_code" id="bookOrderCode">
                <input type="hidden" name="payment_method" value="khqr">

                <div class="p-3 bg-sky-50/80 border border-sky-100 rounded-xl flex items-center justify-between text-xs">
                    <div class="flex items-center gap-1.5 text-slate-700">
                        <svg class="w-4 h-4 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                        <span class="font-medium">លេខយោងវិក្កយបត្រ (Bill Ref):</span>
                    </div>
                    <span class="font-mono font-bold text-sky-700 bg-white px-2 py-0.5 rounded border border-sky-200" id="displayOrderCode">...</span>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">ឈ្មោះអតិថិជន *</label>
                    <input type="text" name="customer_name" id="customerNameInput" value="{{ Auth::user()?->name ?? '' }}" required placeholder="ឧ. សុខ ចាន់ថា" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 focus:outline-hidden focus:border-sky-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">លេខទូរស័ព្ទ *</label>
                    <input type="text" name="customer_phone" id="customerPhoneInput" value="{{ Auth::user()?->phone ?? '' }}" required placeholder="ឧ. 012 345 678" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 focus:outline-hidden focus:border-sky-500">
                </div>
                
                <div class="pt-2 border-t border-slate-100 flex items-center justify-between">
                    <span class="text-xs font-semibold text-slate-700">វិធីសាស្ត្របង់ប្រាក់</span>
                    <span class="px-2.5 py-1 bg-sky-100 text-sky-800 text-[11px] font-bold rounded-lg flex items-center gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-sky-500"></span>
                        ABA / KHQR
                    </span>
                </div>

                <!-- KHQR Section -->
                <div id="khqrSection" class="space-y-3 p-4 bg-gradient-to-b from-sky-50/80 to-blue-50/40 rounded-2xl border border-sky-100 text-center">
                    <p class="text-xs text-sky-900 font-bold">សូមស្កេន QR Code ខាងក្រោម ដើម្បីទូទាត់ប្រាក់៖</p>
                    <div class="w-44 h-44 bg-white rounded-2xl border border-sky-200 mx-auto flex items-center justify-center shadow-xs overflow-hidden">
                        <canvas id="dynamicKHQR"></canvas>
                    </div>
                    <div class="inline-flex items-center gap-1.5 px-3 py-1 bg-white/80 rounded-full border border-sky-200 text-[11px] text-slate-600 font-medium shadow-2xs">
                        <span>ទឹកប្រាក់: <strong class="text-sky-700">${{ number_format($book->price, 2) }}</strong></span>
                        <span class="text-slate-300">•</span>
                        <span>លេខយោង: <strong class="text-sky-700 font-mono" id="qrRefText">#BK</strong></span>
                    </div>
                </div>

                <!-- Modern Receipt Upload -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-slate-700 flex items-center justify-between">
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>រូបភាពបង្កាន់ដៃបង់ប្រាក់ (Receipt Screenshot)</span>
                        </span>
                        <span class="text-[10px] text-sky-700 font-semibold bg-sky-50 px-2 py-0.5 rounded-full border border-sky-100">ជម្រើសផ្ទៀងផ្ទាត់</span>
                    </label>

                    <div id="receiptDropzone" onclick="document.getElementById('paymentReceiptInput').click()" class="relative group border-2 border-dashed border-slate-200 hover:border-sky-500 bg-slate-50/70 hover:bg-sky-50/30 rounded-2xl p-4 text-center cursor-pointer transition-all duration-200 ease-in-out">
                        <input type="file" name="payment_receipt" id="paymentReceiptInput" accept="image/*" class="hidden" onchange="handleReceiptPreview(this)">
                        
                        <!-- Empty State -->
                        <div id="receiptEmptyState" class="space-y-2 py-1">
                            <div class="w-12 h-12 bg-white group-hover:bg-sky-100/70 text-slate-400 group-hover:text-sky-600 rounded-2xl flex items-center justify-center mx-auto shadow-xs border border-slate-100 group-hover:border-sky-200 transition-colors">
                                <svg class="w-6 h-6 transition-transform group-hover:-translate-y-0.5 duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                            </div>
                            <div>
                                <p class="text-xs font-bold text-slate-700 group-hover:text-sky-700 transition-colors">
                                    ចុចជ្រើសរើសរូបភាព ឬទម្លាក់រូបភាពនៅទីនេះ
                                </p>
                                <p class="text-[10px] text-slate-400 mt-0.5">
                                    JPG, PNG ឬ WEBP (ទំហំអតិបរមា 5MB)
                                </p>
                            </div>
                        </div>

                        <!-- Live Preview State -->
                        <div id="receiptPreviewState" class="hidden flex items-center justify-between gap-3 bg-white p-2.5 rounded-xl border border-sky-200 shadow-xs text-left" onclick="event.stopPropagation()">
                            <div class="flex items-center gap-3 min-w-0">
                                <img id="receiptPreviewImg" src="" alt="Receipt Preview" class="w-12 h-12 object-cover rounded-lg border border-slate-200 shrink-0">
                                <div class="min-w-0">
                                    <p id="receiptFileName" class="text-xs font-bold text-slate-800 truncate">receipt.png</p>
                                    <p id="receiptFileSize" class="text-[10px] text-slate-400">120 KB</p>
                                    <span class="inline-flex items-center gap-1 text-[10px] text-emerald-600 font-semibold mt-0.5">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        បានជ្រើសរើសរួចរាល់
                                    </span>
                                </div>
                            </div>
                            <button type="button" onclick="removeReceiptFile(event)" class="p-1.5 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors cursor-pointer shrink-0" title="ដកចេញ">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                    </div>
                </div>

                <button type="submit" id="submitOrderBtn" class="w-full py-3 bg-sky-600 hover:bg-sky-700 text-white rounded-xl text-xs font-bold transition-all cursor-pointer shadow-md flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>បញ្ជាក់ការបញ្ជាទិញ (ផ្ញើជូន Admin ពិនិត្យ)</span>
                </button>
            </form>
        </div>
    </div>


    <!-- Footer -->

    <script>
        let paymentCheckInterval = null;
        let activeOrderCode = '';

        async function openOrderModal() {
            document.getElementById('orderModal').classList.remove('hidden');

            const price = parseFloat("{{ $book->price }}");

            // Automatically pre-create or retrieve pending order
            try {
                const res = await fetch("{{ route('books.init-order', $book->id) }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        customer_name: document.getElementById('customerNameInput')?.value || '',
                        customer_phone: document.getElementById('customerPhoneInput')?.value || ''
                    })
                });
                const data = await res.json();
                if (data && data.success) {
                    activeOrderCode = data.order_code;
                }
            } catch (err) {
                console.error('Error initializing order:', err);
            }

            if (!activeOrderCode) {
                activeOrderCode = 'BK' + Math.floor(10000 + Math.random() * 90000);
            }

            document.getElementById('bookOrderCode').value = activeOrderCode;
            document.getElementById('displayOrderCode').textContent = '#' + activeOrderCode;
            document.getElementById('qrRefText').textContent = '#' + activeOrderCode;

            if (price > 0 && typeof window.generateKHQR === 'function') {
                window.generateKHQR('dynamicKHQR', price, "{{ addslashes($book->title) }}", activeOrderCode);
            }

            startStatusPolling(activeOrderCode);
        }

        function startStatusPolling(orderCode) {
            if (paymentCheckInterval) clearInterval(paymentCheckInterval);
            paymentCheckInterval = setInterval(async () => {
                try {
                    const res = await fetch(`/orders/check-status/${orderCode}`);
                    const data = await res.json();
                    if (data && data.is_paid) {
                        clearInterval(paymentCheckInterval);
                        document.getElementById('orderModal').innerHTML = `
                            <div class="bg-white rounded-3xl max-w-sm w-full p-8 shadow-2xl border border-slate-100 text-center space-y-4">
                                <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto text-3xl font-bold">✓</div>
                                <h3 class="text-lg font-bold text-slate-800">ការបញ្ជាទិញត្រូវបានយល់ព្រមជោគជ័យ!</h3>
                                <p class="text-xs text-slate-500">Admin បានបញ្ជាក់ការទូទាត់រួចរាល់។ សៀវភៅត្រូវបានបើកជូនលោកអ្នកក្នុងបណ្ណាល័យ។</p>
                                <a href="/dashboard" class="block w-full py-2.5 bg-emerald-600 text-white rounded-xl text-xs font-bold shadow-md hover:bg-emerald-700 transition">ចូលអានសៀវភៅឥឡូវនេះ</a>
                            </div>
                        `;
                        setTimeout(() => {
                            window.location.reload();
                        }, 2500);
                    }
                } catch (e) {}
            }, 2500);
        }

        function showWaitingAdminState(orderCode) {
            document.getElementById('orderModal').innerHTML = `
                <div class="bg-white rounded-3xl max-w-sm w-full p-6 sm:p-7 shadow-2xl border border-slate-100 text-center space-y-4">
                    <div class="w-16 h-16 bg-amber-100 text-amber-600 rounded-full flex items-center justify-center mx-auto text-3xl font-bold shadow-xs">⏳</div>
                    <div>
                        <h3 class="text-lg font-bold text-slate-800">បានផ្ញើជូន Admin ពិនិត្យ!</h3>
                        <p class="text-xs text-slate-500 mt-0.5">លេខកូដវិក្កយបត្រ: <strong class="text-sky-600 font-mono font-bold">#${orderCode}</strong></p>
                    </div>

                    <div class="p-3.5 bg-amber-50/90 border border-amber-200 rounded-2xl text-xs text-amber-900 text-left leading-relaxed space-y-2">
                        <p class="font-semibold flex items-center gap-1.5 text-amber-800">
                            <span>✓</span> ព័ត៌មាន និងវិក្កយបត្រត្រូវបានផ្ញើជូន Admin តាម Telegram រួចរាល់។
                        </p>
                        <p class="text-[11px] text-amber-700">
                            💡 <strong>អ្នកអាចបិទទំព័រនេះបានដោយសុវត្ថិភាព។</strong> នៅពេល Admin ពិនិត្យរួច សៀវភៅនឹងបើកជូនស្វ័យប្រវត្តិក្នុងគណនី Dashboard របស់អ្នក។
                        </p>
                    </div>

                    <div class="flex items-center justify-center gap-2 text-amber-600 text-xs font-semibold py-1">
                        <svg class="w-4 h-4 animate-spin text-amber-500" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg>
                        <span>កំពុងរង់ចាំការបញ្ជាក់ពី Admin...</span>
                    </div>

                    <div class="space-y-2 pt-2 border-t border-slate-100">
                        <a href="/dashboard" class="block w-full py-2.5 bg-slate-900 hover:bg-slate-800 text-white rounded-xl text-xs font-bold transition-all shadow-sm">
                            ទៅកាន់ផ្ទាំងគ្រប់គ្រង (Dashboard)
                        </a>
                        <a href="https://t.me/sopheak1993" target="_blank" class="flex items-center justify-center gap-1.5 w-full py-2.5 bg-sky-50 hover:bg-sky-100 text-sky-700 rounded-xl text-xs font-bold border border-sky-200 transition-colors">
                            <svg class="w-3.5 h-3.5 text-sky-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.64 6.8c-.15 1.58-.8 5.42-1.13 7.19-.14.75-.42 1-.68 1.03-.58.05-1.02-.38-1.58-.75-.88-.58-1.38-.94-2.23-1.5-.99-.65-.35-1.01.22-1.59.15-.15 2.71-2.48 2.76-2.69a.2.2 0 00-.05-.18c-.06-.05-.14-.03-.21-.02-.09.02-1.49.95-4.22 2.79-.4.27-.76.41-1.08.4-.36-.01-1.04-.2-1.55-.37-.63-.2-1.12-.31-1.08-.66.02-.18.27-.36.75-.55 2.92-1.27 4.86-2.11 5.83-2.51 2.78-1.16 3.35-1.36 3.73-1.36.08 0 .27.02.39.12.1.08.13.19.14.27-.01.06.01.24 0 .37z"/></svg>
                            <span>ទាក់ទង Admin តាម Telegram</span>
                        </a>
                        <button type="button" onclick="closeOrderModal()" class="block w-full py-1.5 text-slate-400 hover:text-slate-600 text-xs font-semibold cursor-pointer">
                            បិទផ្ទាំងនេះ (Close)
                        </button>
                    </div>
                </div>
            `;
            startStatusPolling(orderCode);
        }

        document.getElementById('orderForm')?.addEventListener('submit', async function(e) {
            e.preventDefault();
            const btn = document.getElementById('submitOrderBtn');
            if (btn) {
                btn.disabled = true;
                btn.innerHTML = `<svg class="w-4 h-4 animate-spin inline-block mr-1" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg> កំពុងផ្ញើទៅ Admin...`;
            }

            const formData = new FormData(this);
            try {
                const res = await fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });
                const data = await res.json();
                if (data && data.success) {
                    showWaitingAdminState(data.order_code || activeOrderCode);
                } else {
                    alert(data.message || 'មានបញ្ហាក្នុងការផ្ញើ។ សូមព្យាយាមម្តងទៀត!');
                    if (btn) {
                        btn.disabled = false;
                        btn.innerHTML = 'បញ្ជាក់ការបញ្ជាទិញ (ផ្ញើជូន Admin ពិនិត្យ)';
                    }
                }
            } catch (err) {
                console.error(err);
                this.submit();
            }
        });

        function handleReceiptPreview(input) {
            if (input.files && input.files[0]) {
                const file = input.files[0];
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById('receiptPreviewImg');
                    if (img) img.src = e.target.result;
                    const name = document.getElementById('receiptFileName');
                    if (name) name.textContent = file.name;
                    const size = document.getElementById('receiptFileSize');
                    if (size) size.textContent = (file.size / 1024).toFixed(1) + ' KB';

                    document.getElementById('receiptEmptyState')?.classList.add('hidden');
                    document.getElementById('receiptPreviewState')?.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        }

        function removeReceiptFile(e) {
            if (e) e.stopPropagation();
            const input = document.getElementById('paymentReceiptInput');
            if (input) input.value = '';
            const img = document.getElementById('receiptPreviewImg');
            if (img) img.src = '';
            document.getElementById('receiptEmptyState')?.classList.remove('hidden');
            document.getElementById('receiptPreviewState')?.classList.add('hidden');
        }

        // Setup drag and drop for receipt upload
        const dropzone = document.getElementById('receiptDropzone');
        if (dropzone) {
            ['dragenter', 'dragover'].forEach(eventName => {
                dropzone.addEventListener(eventName, (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    dropzone.classList.add('border-sky-500', 'bg-sky-50/50');
                });
            });
            ['dragleave', 'drop'].forEach(eventName => {
                dropzone.addEventListener(eventName, (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    dropzone.classList.remove('border-sky-500', 'bg-sky-50/50');
                });
            });
            dropzone.addEventListener('drop', (e) => {
                const files = e.dataTransfer.files;
                if (files && files.length > 0) {
                    const input = document.getElementById('paymentReceiptInput');
                    if (input) {
                        input.files = files;
                        handleReceiptPreview(input);
                    }
                }
            });
        }

        function closeOrderModal() {
            if (paymentCheckInterval) clearInterval(paymentCheckInterval);
            document.getElementById('orderModal').classList.add('hidden');
        }
    </script>

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
