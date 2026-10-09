<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>សំភារៈបង្រៀន - ANONTAK (Math Teaching Materials & Aids)</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,300..700;1,300..700&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 antialiased font-sans flex flex-col min-h-screen">

    <!-- Top Navigation Bar (7 Exact Menu Titles from User Design) -->
    @include('partials.header')

    <!-- HERO SECTION -->
    <section class="relative py-14 md:py-20 overflow-hidden bg-slate-900"
             style="background-image: url('/images/hero_math_blackboard.jpg'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-slate-950/85 pointer-events-none z-0"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-sky-500/15 rounded-full blur-[100px] pointer-events-none z-0"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-sky-500/10 border border-sky-500/20 text-sky-400 text-xs font-semibold tracking-wider uppercase mb-4">
                <span class="w-2 h-2 rounded-full bg-sky-400 animate-pulse"></span>
                សម្ភារៈឧបទេស & ឧបករណ៍បង្រៀន
            </div>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-white tracking-tight" style="font-family: 'Outfit', sans-serif;">
                ឧបករណ៍ និង<span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-indigo-400">សំភារៈបង្រៀនគណិតវិទ្យា</span>
            </h1>
            <p class="text-slate-300 text-sm md:text-base leading-relaxed max-w-2xl mx-auto mt-4">
                បណ្តុំឧបករណ៍ឧបទេស បន្ទាត់វាស់ស្ទង់ ឈុតធរណីមាត្រ កម្រងសៀវភៅជំនួយ និងឧបករណ៍ពិសោធន៍ជាក់ស្ដែង ដើម្បីបង្កើនប្រសិទ្ធភាពនៃការបង្រៀន និងរៀនគណិតវិទ្យាក្នុងថ្នាក់រៀន។
            </p>
        </div>
    </section>

    <!-- MAIN SECTION: FILTER & GRID -->
    
    @if(session('order_success'))
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl relative flex items-center justify-between" role="alert">
            <span class="block sm:inline font-bold">{{ session('order_success') }}</span>
        </div>
    </div>
    @endif

    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16 w-full">
        
        <!-- Search and Filter Bar -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-10 pb-6 border-b border-slate-200">
            <div>
                <h2 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight">បញ្ជីឧបករណ៍ និងសម្ភារៈទាំងអស់</h2>
                <p class="text-slate-500 text-xs sm:text-sm mt-0.5">ឧបករណ៍ស្តង់ដារគុណភាពខ្ពស់សម្រាប់សាលារៀន លោកគ្រូអ្នកគ្រូ និងសិស្សានុសិស្ស</p>
            </div>

            <!-- Search Input Form -->
            <form method="GET" action="{{ route('teaching-materials.index') }}" class="flex items-center gap-2">
                @if($category && $category !== 'all')
                    <input type="hidden" name="category" value="{{ $category }}">
                @endif
                <div class="relative w-full sm:w-64">
                    <input type="text" name="q" value="{{ $search ?? '' }}" placeholder="ស្វែងរកសម្ភារៈ..." 
                           class="w-full pl-9 pr-4 py-2 text-xs rounded-xl bg-white border border-slate-200 focus:outline-hidden focus:border-sky-500 shadow-2xs">
                    <svg class="w-4 h-4 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <button type="submit" class="px-4 py-2 bg-sky-600 hover:bg-sky-700 text-white rounded-xl text-xs font-semibold transition-colors shadow-2xs">
                    ស្វែងរក
                </button>
            </form>
        </div>

        <!-- Category Pills -->
        <div class="flex items-center gap-2 overflow-x-auto pb-4 mb-8 no-scrollbar">
            <a href="{{ route('teaching-materials.index', ['q' => $search]) }}" 
               class="px-4 py-2 rounded-full text-xs font-bold transition-all shadow-2xs whitespace-nowrap {{ ($category ?? 'all') === 'all' ? 'bg-sky-600 text-white shadow-sky-200' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
                ទាំងអស់ ({{ $counts['all'] ?? $materials->total() }})
            </a>
            <a href="{{ route('teaching-materials.index', ['category' => 'ឧបករណ៍វាស់ស្ទង់', 'q' => $search]) }}" 
               class="px-4 py-2 rounded-full text-xs font-bold transition-all shadow-2xs whitespace-nowrap {{ ($category ?? '') === 'ឧបករណ៍វាស់ស្ទង់' ? 'bg-sky-600 text-white shadow-sky-200' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
                ឧបករណ៍វាស់ស្ទង់ ({{ $counts['ឧបករណ៍វាស់ស្ទង់'] ?? 0 }})
            </a>
            <a href="{{ route('teaching-materials.index', ['category' => 'ធរណីមាត្រ', 'q' => $search]) }}" 
               class="px-4 py-2 rounded-full text-xs font-bold transition-all shadow-2xs whitespace-nowrap {{ ($category ?? '') === 'ធរណីមាត្រ' ? 'bg-indigo-600 text-white shadow-indigo-200' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
                ធរណីមាត្រ ({{ $counts['ធរណីមាត្រ'] ?? 0 }})
            </a>
            <a href="{{ route('teaching-materials.index', ['category' => 'សៀវភៅជំនួយ', 'q' => $search]) }}" 
               class="px-4 py-2 rounded-full text-xs font-bold transition-all shadow-2xs whitespace-nowrap {{ ($category ?? '') === 'សៀវភៅជំនួយ' ? 'bg-emerald-600 text-white shadow-emerald-200' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
                សៀវភៅជំនួយ ({{ $counts['សៀវភៅជំនួយ'] ?? 0 }})
            </a>
            <a href="{{ route('teaching-materials.index', ['category' => 'សម្ភារៈពិសោធន៍', 'q' => $search]) }}" 
               class="px-4 py-2 rounded-full text-xs font-bold transition-all shadow-2xs whitespace-nowrap {{ ($category ?? '') === 'សម្ភារៈពិសោធន៍' ? 'bg-amber-600 text-white shadow-amber-200' : 'bg-white text-slate-600 border border-slate-200 hover:bg-slate-50' }}">
                សម្ភារៈពិសោធន៍ ({{ $counts['សម្ភារៈពិសោធន៍'] ?? 0 }})
            </a>
        </div>

        <!-- Materials Grid (Responsive 4-column card layout) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($materials as $item)
                <div class="rounded-2xl transition-all duration-300 flex flex-col group overflow-hidden hover:-translate-y-1.5 {{ $item->price > 0 ? 'bg-gradient-to-b from-amber-500/[0.08] via-amber-500/[0.02] to-white border-2 border-amber-300 hover:border-amber-500 shadow-md shadow-amber-500/10 hover:shadow-xl hover:shadow-amber-500/25 ring-1 ring-amber-400/20' : 'bg-white border border-slate-200 shadow-2xs hover:shadow-lg hover:border-sky-300' }}">
                    
                    <!-- Item Image Preview -->
                    <div class="aspect-square w-full bg-slate-50 p-6 flex items-center justify-center relative overflow-hidden border-b {{ $item->price > 0 ? 'border-amber-100' : 'border-slate-100' }}">
                        <img src="{{ $item->image ?? '/images/tool_ruler.svg' }}" 
                             alt="{{ $item->name }}" 
                             class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500 filter drop-shadow-sm" />
                        
                        <!-- Badges -->
                        <div class="absolute top-3 left-3 flex items-center gap-1.5">
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-white text-slate-700 shadow-xs border border-slate-200">
                                {{ $item->category }}
                            </span>
                            @if($item->price > 0)
                                <span class="px-2 py-0.5 rounded-full text-[9px] font-black uppercase bg-gradient-to-r from-amber-500 via-orange-500 to-amber-600 text-white shadow-md shadow-amber-500/30 flex items-center gap-1 ring-1 ring-white">
                                    <span>👑</span> <span>PREMIUM</span>
                                </span>
                            @endif
                        </div>
                        
                        @if($item->is_featured)
                            <span class="absolute top-3 right-3 px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500 text-white shadow-xs">
                                ពេញនិយម
                            </span>
                        @endif
                    </div>

                    
                    <!-- Item Content -->
                    <div class="p-5 flex-1 flex flex-col">
                        <div class="flex items-center gap-1.5 text-[11px] text-slate-400 font-medium mb-1.5">
                            <svg class="w-3.5 h-3.5 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <span>{{ $item->grade_level }}</span>
                        </div>

                        <h3 class="font-bold text-slate-900 text-sm leading-snug group-hover:text-sky-600 transition-colors line-clamp-2">
                            {{ $item->name }}
                        </h3>

                        <p class="text-xs text-slate-500 mt-2 line-clamp-2 leading-relaxed">
                            {{ $item->description }}
                        </p>

                        @if($item->specifications)
                            <div class="mt-3 mb-2 p-2 bg-slate-50 rounded-lg text-[11px] text-slate-600 line-clamp-2 border border-slate-100 font-mono">
                                {{ $item->specifications }}
                            </div>
                        @endif

                        <div class="mt-auto pt-3">
                            @if($item->price > 0)
                                <div class="text-amber-600 font-extrabold text-base mb-3 flex items-center gap-1.5">
                                    <span>${{ number_format($item->price, 2) }}</span>
                                    <span class="text-[10px] uppercase tracking-wider text-amber-800 bg-amber-100 px-2 py-0.5 rounded-full font-black border border-amber-200">PRO</span>
                                </div>
                            @else
                                <div class="text-emerald-600 font-bold mb-3 flex items-center gap-1">
                                    <span>🎁 ឥតគិតថ្លៃ (Free)</span>
                                </div>
                            @endif

                            <div class="border-t {{ $item->price > 0 ? 'border-amber-100' : 'border-slate-100' }} pt-3">
                                @if($item->price > 0)
                                    <button onclick="openOrderModal({{ json_encode($item) }})" 
                                            class="w-full py-2.5 px-3 rounded-xl bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 text-white text-xs font-bold transition-all flex items-center justify-center gap-1.5 shadow-md shadow-amber-500/20 cursor-pointer">
                                        🛒 <span>ទិញឥឡូវនេះ (${{ number_format($item->price, 2) }})</span>
                                    </button>
                                @else
                                    <button onclick="openOrderModal({{ json_encode($item) }})" 
                                            class="w-full py-2 px-3 rounded-xl bg-sky-600 hover:bg-sky-700 text-white text-xs font-semibold transition-colors flex items-center justify-center gap-1.5 shadow-2xs cursor-pointer">
                                        🛒 <span>កម្ម៉ង់ទិញឥឡូវនេះ</span>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            @empty
                <div class="col-span-full py-16 text-center bg-white rounded-2xl border border-slate-200">
                    <div class="w-12 h-12 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <p class="text-slate-600 text-sm font-semibold">មិនមានសម្ភារៈដែលអ្នកស្វែងរកឡើយ</p>
                    <a href="{{ route('teaching-materials.index') }}" class="inline-block mt-3 text-xs font-semibold text-sky-600 hover:underline">
                        &larr; មើលសម្ភារៈទាំងអស់
                    </a>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($materials->hasPages())
            <div class="mt-14 pt-8 border-t border-slate-200/80 flex justify-center">
                {{ $materials->links('vendor.pagination.tailwind') }}
            </div>
        @endif

        <!-- Teacher Request Box -->
        <section class="mt-16 bg-gradient-to-br from-sky-600 to-indigo-700 rounded-3xl p-8 sm:p-12 text-white relative overflow-hidden shadow-lg">
            <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-white/10 rounded-full blur-2xl pointer-events-none"></div>
            <div class="max-w-3xl relative z-10 space-y-4">
                <span class="px-3 py-1 rounded-full bg-white/20 backdrop-blur-md text-xs font-bold tracking-wide uppercase">
                    សម្រាប់លោកគ្រូអ្នកគ្រូ និងសាលារៀន
                </span>
                <h3 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                    តើលោកគ្រូអ្នកគ្រូត្រូវការសម្ភារៈឧបទេសបន្ថែមសម្រាប់ថ្នាក់រៀនមែនទេ?
                </h3>
                <p class="text-sky-100 text-sm sm:text-base leading-relaxed">
                    យើងខ្ញុំផ្ដល់ជូននូវឯកសារមគ្គុទ្ទេសក៍បង្រៀនគំរូ សន្លឹកកិច្ចការលំហាត់អនុវត្តជាក់ស្ដែង និងការប្រឹក្សាយោបល់បច្ចេកទេសបង្រៀនគណិតវិទ្យាទំនើប។
                </p>
                <div class="pt-2 flex flex-wrap gap-3">
                    <button onclick="openRequestModal()" class="px-6 py-3 rounded-xl bg-white text-sky-700 hover:bg-sky-50 font-bold text-xs sm:text-sm transition-all shadow-md cursor-pointer">
                        ស្នើសុំឯកសារជំនួយការបង្រៀន
                    </button>
                    <a href="/books" class="px-6 py-3 rounded-xl bg-white/10 hover:bg-white/20 text-white font-bold text-xs sm:text-sm transition-all border border-white/20">
                        មើលសៀវភៅគណិតវិទ្យា
                    </a>
                </div>
            </div>
        </section>

    </main>

    
    <!-- Order Modal -->
    <div id="orderModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-lg w-full p-6 shadow-2xl border border-slate-100 relative">
            <button onclick="closeOrderModal()" class="absolute top-5 right-5 text-slate-400 hover:text-slate-700 cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            
            <h3 class="text-lg font-bold text-slate-900 mb-1">បញ្ជាក់ការកម្ម៉ង់ទិញ</h3>
            
            <div class="flex items-center gap-4 mt-4 p-4 bg-slate-50 rounded-2xl border border-slate-100">
                <img id="orderImg" src="" class="w-16 h-16 object-cover rounded-xl border border-slate-200">
                <div>
                    <h4 id="orderTitle" class="font-bold text-slate-800 text-sm"></h4>
                    <p id="orderPriceDisplay" class="text-sky-600 font-bold text-xs mt-1"></p>
                </div>
            </div>

            <form id="orderForm" method="POST" action="" enctype="multipart/form-data" class="space-y-4 mt-5">
                @csrf
                <input type="hidden" name="order_code" id="tmOrderCode">

                <div class="p-3 bg-sky-50/80 border border-sky-100 rounded-xl flex items-center justify-between text-xs">
                    <div class="flex items-center gap-1.5 text-slate-700">
                        <svg class="w-4 h-4 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                        <span class="font-medium">លេខយោងវិក្កយបត្រ (Bill Ref):</span>
                    </div>
                    <span class="font-mono font-bold text-sky-700 bg-white px-2 py-0.5 rounded border border-sky-200" id="tmDisplayCode">...</span>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">ឈ្មោះអតិថិជន *</label>
                    <input type="text" name="customer_name" required placeholder="ឧ. សុខ ចាន់ថា" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 focus:outline-hidden focus:border-sky-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">លេខទូរស័ព្ទ *</label>
                    <input type="text" name="customer_phone" required placeholder="ឧ. 012 345 678" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 focus:outline-hidden focus:border-sky-500">
                </div>
                <div class="flex gap-4">
                    <div class="flex-1">
                        <label class="block text-xs font-semibold text-slate-700 mb-1">ចំនួន *</label>
                        <input type="number" name="quantity" id="orderQty" onchange="updateQuantity()" onkeyup="updateQuantity()" min="1" value="1" required class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 focus:outline-hidden focus:border-sky-500">
                    </div>
                    <div class="flex-1">
                        <label class="block text-xs font-semibold text-slate-700 mb-1">ទីតាំងដឹកជញ្ជូន</label>
                        <input type="text" name="customer_address" placeholder="ខេត្ត/ក្រុង..." class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 focus:outline-hidden focus:border-sky-500">
                    </div>
                </div>
                
                <div class="pt-2 border-t border-slate-100">
                    <label class="block text-xs font-semibold text-slate-700 mb-2">វិធីសាស្ត្របង់ប្រាក់ *</label>
                    <div class="grid grid-cols-2 gap-3">
                        <label class="relative flex items-center justify-center gap-2 p-3 border border-slate-200 rounded-xl cursor-pointer hover:bg-slate-50 transition-colors">
                            <input type="radio" name="payment_method" value="cod" class="peer sr-only" checked onchange="toggleKHQR(false)">
                            <div class="w-4 h-4 rounded-full border border-slate-300 peer-checked:border-[4px] peer-checked:border-sky-500"></div>
                            <span class="text-xs font-bold text-slate-700">បង់ប្រាក់ពេលទទួល</span>
                        </label>
                        <label class="relative flex items-center justify-center gap-2 p-3 border border-slate-200 rounded-xl cursor-pointer hover:bg-slate-50 transition-colors">
                            <input type="radio" name="payment_method" value="khqr" class="peer sr-only" onchange="toggleKHQR(true)">
                            <div class="w-4 h-4 rounded-full border border-slate-300 peer-checked:border-[4px] peer-checked:border-sky-500"></div>
                            <span class="text-xs font-bold text-slate-700">ABA / KHQR</span>
                        </label>
                    </div>
                </div>

                <div id="khqrSection" class="hidden space-y-4 p-4 bg-sky-50 rounded-2xl border border-sky-100 text-center">
                    <p class="text-xs text-sky-800 font-bold">សូមស្កេន QR Code ខាងក្រោម ដើម្បីទូទាត់ប្រាក់៖</p>
                    <div class="w-44 h-44 bg-white rounded-2xl border border-sky-200 mx-auto flex items-center justify-center shadow-xs overflow-hidden">
                        <canvas id="dynamicKHQR"></canvas>
                    </div>
                    <p class="text-[10px] text-slate-500 mt-2">* QR នេះបង្កើតឡើងដោយស្វ័យប្រវត្តិយោងតាមតម្លៃសរុប និងលេខយោង <strong class="text-sky-700" id="tmRefText">#TM</strong></p>

                    <!-- Modern Receipt Upload -->
                    <div class="space-y-1.5 text-left pt-2 border-t border-sky-200/60">
                        <label class="block text-xs font-bold text-slate-700 flex items-center justify-between">
                            <span class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span>រូបភាពបង្កាន់ដៃបង់ប្រាក់ (Receipt Screenshot)</span>
                            </span>
                            <span class="text-[10px] text-sky-700 font-semibold bg-white px-2 py-0.5 rounded-full border border-sky-200">ជម្រើសផ្ទៀងផ្ទាត់</span>
                        </label>

                        <div id="tmReceiptDropzone" onclick="document.getElementById('tmPaymentReceiptInput').click()" class="relative group border-2 border-dashed border-sky-200 hover:border-sky-500 bg-white/80 hover:bg-white rounded-2xl p-3 text-center cursor-pointer transition-all duration-200">
                            <input type="file" name="payment_receipt" id="tmPaymentReceiptInput" accept="image/*" class="hidden" onchange="handleTmReceiptPreview(this)">
                            
                            <!-- Empty State -->
                            <div id="tmReceiptEmptyState" class="space-y-1.5 py-1">
                                <div class="w-10 h-10 bg-sky-50 text-sky-600 rounded-xl flex items-center justify-center mx-auto shadow-2xs border border-sky-100">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                                </div>
                                <p class="text-xs font-bold text-slate-700 group-hover:text-sky-700 transition-colors">
                                    ចុចជ្រើសរើសរូបភាព ឬទម្លាក់រូបភាពនៅទីនេះ
                                </p>
                                <p class="text-[10px] text-slate-400">
                                    JPG, PNG ឬ WEBP (ទំហំអតិបរមា 5MB)
                                </p>
                            </div>

                            <!-- Live Preview State -->
                            <div id="tmReceiptPreviewState" class="hidden flex items-center justify-between gap-3 bg-slate-50 p-2 rounded-xl border border-sky-100 text-left" onclick="event.stopPropagation()">
                                <div class="flex items-center gap-2.5 min-w-0">
                                    <img id="tmReceiptPreviewImg" src="" alt="Receipt" class="w-10 h-10 object-cover rounded-lg border border-slate-200 shrink-0">
                                    <div class="min-w-0">
                                        <p id="tmReceiptFileName" class="text-xs font-bold text-slate-800 truncate">receipt.png</p>
                                        <p id="tmReceiptFileSize" class="text-[10px] text-slate-400">120 KB</p>
                                    </div>
                                </div>
                                <button type="button" onclick="removeTmReceiptFile(event)" class="p-1 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors cursor-pointer shrink-0">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">ចំណាំផ្សេងៗ</label>
                    <textarea name="notes" rows="2" placeholder="ចំណាំបጨማሪ..." class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 focus:outline-hidden focus:border-sky-500"></textarea>
                </div>
                <button type="submit" class="w-full py-2.5 bg-sky-600 hover:bg-sky-700 text-white rounded-xl text-xs font-bold transition-colors cursor-pointer shadow-md">
                    បញ្ជូនការកម្ម៉ង់ទិញ
                </button>
            </form>
        </div>
    </div>


    <!-- Request Modal for Teachers -->
    <div id="requestModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-md w-full p-6 sm:p-8 shadow-2xl border border-slate-100 relative">
            <button onclick="closeRequestModal()" class="absolute top-5 right-5 text-slate-400 hover:text-slate-700 cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            
            <h3 class="text-lg font-bold text-slate-900 mb-1">ស្នើសុំសម្ភារៈ ឬឯកសារបង្រៀន</h3>
            <p class="text-xs text-slate-500 mb-5">សូមបំពេញព័ត៌មានខាងក្រោម ក្រុមការងារយើងខ្ញុំនឹងទាក់ទងត្រឡប់ទៅវិញ៖</p>

            <form onsubmit="alert('សូមអរគុណ! សំណើរបស់អ្នកត្រូវបានទទួលរួចរាល់ហើយ។'); closeRequestModal(); return false;" class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">ឈ្មោះលោកគ្រូ/អ្នកគ្រូ</label>
                    <input type="text" required placeholder="ឧ. សុខ ចាន់ថា" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 focus:outline-hidden focus:border-sky-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">ឈ្មោះសាលារៀន ឬស្ថាប័ន</label>
                    <input type="text" required placeholder="ឧ. វិទ្យាល័យ ព្រះស៊ីសុវត្ថិ" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 focus:outline-hidden focus:border-sky-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">លេខទូរស័ព្ទ ឬតេឡេក្រាម</label>
                    <input type="text" required placeholder="ឧ. 012 345 678" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 focus:outline-hidden focus:border-sky-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">សម្ភារៈ ឬឯកសារដែលត្រូវការ</label>
                    <textarea rows="3" required placeholder="រៀបរាប់ពីសម្ភារៈឧបទេសដែលត្រូវការ..." class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 focus:outline-hidden focus:border-sky-500"></textarea>
                </div>
                <button type="submit" class="w-full py-2.5 bg-sky-600 hover:bg-sky-700 text-white rounded-xl text-xs font-bold transition-colors cursor-pointer shadow-md">
                    បញ្ជូនសំណើ
                </button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Scripts -->
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

        
        
        
        let currentItem = null;
        let currentQuantity = 1;

        function updateQuantity() {
            const qtyInput = document.getElementById('orderQty');
            if(qtyInput) {
                currentQuantity = qtyInput.value || 1;
                const method = document.querySelector('input[name="payment_method"]:checked');
                if (method && method.value === 'khqr') {
                    toggleKHQR(true);
                }
            }
        }

        let currentOrderCode = '';

        function toggleKHQR(show) {
            const section = document.getElementById('khqrSection');
            if (show) {
                section.classList.remove('hidden');
                if (currentItem) {
                    const price = currentItem.price ? parseFloat(currentItem.price) : 0;
                    const total = price * currentQuantity;
                    if (total > 0 && typeof window.generateKHQR === 'function') {
                        window.generateKHQR('dynamicKHQR', total, currentItem.name, currentOrderCode);
                    }
                }
            } else {
                section.classList.add('hidden');
            }
        }

        function openOrderModal(item) {
            currentItem = item;
            currentQuantity = 1;
            currentOrderCode = 'TM' + Math.floor(10000 + Math.random() * 90000);
            const orderCodeInput = document.getElementById('tmOrderCode');
            if (orderCodeInput) orderCodeInput.value = currentOrderCode;
            const displayCode = document.getElementById('tmDisplayCode');
            if (displayCode) displayCode.textContent = '#' + currentOrderCode;
            const refText = document.getElementById('tmRefText');
            if (refText) refText.textContent = '#' + currentOrderCode;

            const qtyInput = document.getElementById('orderQty');
            if(qtyInput) qtyInput.value = 1;
            document.getElementById('orderTitle').innerText = item.name;
            const price = item.price ? '$' + parseFloat(item.price).toFixed(2) : 'Free';
            document.getElementById('orderPriceDisplay').innerText = price;
            document.getElementById('orderImg').src = item.image || '/images/tool_ruler.svg';
            document.getElementById('orderForm').action = '/teaching-materials/' + item.id + '/order';
            document.getElementById('orderModal').classList.remove('hidden');
        }

        function handleTmReceiptPreview(input) {
            if (input.files && input.files[0]) {
                const file = input.files[0];
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById('tmReceiptPreviewImg');
                    if (img) img.src = e.target.result;
                    const name = document.getElementById('tmReceiptFileName');
                    if (name) name.textContent = file.name;
                    const size = document.getElementById('tmReceiptFileSize');
                    if (size) size.textContent = (file.size / 1024).toFixed(1) + ' KB';

                    document.getElementById('tmReceiptEmptyState')?.classList.add('hidden');
                    document.getElementById('tmReceiptPreviewState')?.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        }

        function removeTmReceiptFile(e) {
            if (e) e.stopPropagation();
            const input = document.getElementById('tmPaymentReceiptInput');
            if (input) input.value = '';
            const img = document.getElementById('tmReceiptPreviewImg');
            if (img) img.src = '';
            document.getElementById('tmReceiptEmptyState')?.classList.remove('hidden');
            document.getElementById('tmReceiptPreviewState')?.classList.add('hidden');
        }

        function closeOrderModal() {
            if (paymentCheckInterval) clearInterval(paymentCheckInterval);
            document.getElementById('orderModal').classList.add('hidden');
        }


        

        function openRequestModal() {
            document.getElementById('requestModal').classList.remove('hidden');
        }

        function closeRequestModal() {
            document.getElementById('requestModal').classList.add('hidden');
        }

        window.addEventListener('click', function(e) {
            const btn = document.getElementById('userBtn');
            const dropdown = document.getElementById('userDropdown');
            if (btn && dropdown && !btn.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
            const modal = document.getElementById('orderModal');
            if (e.target === modal) {
                closeOrderModal();
            }
            const reqModal = document.getElementById('requestModal');
            if (e.target === reqModal) {
                closeRequestModal();
            }
        });
    </script>
</body>
</html>
