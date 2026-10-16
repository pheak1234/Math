<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $material->name }} - សម្ភារៈបង្រៀន - ANONTAK</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,300..700;1,300..700&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 antialiased font-sans flex flex-col min-h-screen">

    @include('partials.header')

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 w-full">
            <div class="p-4 bg-emerald-50 border border-emerald-200 rounded-2xl flex items-center gap-3 text-emerald-800 text-sm shadow-xs">
                <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 w-full">
            <div class="p-4 bg-rose-50 border border-rose-200 rounded-2xl flex items-center gap-3 text-rose-800 text-sm shadow-xs">
                <svg class="w-5 h-5 text-rose-500 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif

    <!-- MAIN CONTENT -->
    <main class="flex-grow max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
        
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 text-xs text-slate-500 mb-6 flex-wrap">
            <a href="/" class="hover:text-sky-600 transition-colors flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span>ទំព័រដើម</span>
            </a>
            <span>/</span>
            <a href="{{ route('teaching-materials.index') }}" class="hover:text-sky-600 transition-colors">
                សម្ភារៈបង្រៀន
            </a>
            <span>/</span>
            <span class="text-slate-800 font-semibold truncate max-w-xs sm:max-w-md">
                {{ $material->name }}
            </span>
        </nav>

        <!-- Product Main Showcase Card -->
        <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200 shadow-sm relative overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
                
                <!-- Left: Product Image -->
                <div class="lg:col-span-5">
                    @php
                        if ($material->image) {
                            $matImg = str_starts_with($material->image, '/') || str_starts_with($material->image, 'http') 
                                ? $material->image 
                                : Storage::url($material->image);
                        } else {
                            $matImg = '/images/tool_ruler.svg';
                        }
                    @endphp
                    <div class="aspect-square bg-slate-50/80 rounded-2xl p-8 flex items-center justify-center border border-slate-200/80 relative overflow-hidden shadow-inner group">
                        <img src="{{ $matImg }}" 
                             alt="{{ $material->name }}" 
                             class="max-h-full max-w-full object-contain filter drop-shadow-md group-hover:scale-105 transition-transform duration-500">
                        
                        <!-- Badges -->
                        <div class="absolute top-4 left-4 flex flex-col gap-1.5 items-start">
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-white text-slate-700 shadow-xs border border-slate-200">
                                {{ $material->category }}
                            </span>
                            @if($material->price > 0)
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black uppercase bg-gradient-to-r from-amber-500 via-orange-500 to-amber-600 text-white shadow-md shadow-amber-500/30 flex items-center gap-1 ring-1 ring-white">
                                    <span>👑</span> <span>PREMIUM</span>
                                </span>
                            @endif
                        </div>

                        @if($material->is_featured)
                            <span class="absolute top-4 right-4 px-3 py-1 rounded-full text-xs font-bold bg-amber-500 text-white shadow-xs">
                                ពេញនិយម
                            </span>
                        @endif
                    </div>

                    <!-- Mini Guarantees -->
                    <div class="grid grid-cols-3 gap-2 mt-4 text-center">
                        <div class="p-2.5 bg-slate-50 rounded-xl border border-slate-100">
                            <svg class="w-4 h-4 mx-auto text-sky-600 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span class="text-[10px] text-slate-600 font-medium block">គុណភាពស្ដង់ដារ</span>
                        </div>
                        <div class="p-2.5 bg-slate-50 rounded-xl border border-slate-100">
                            <svg class="w-4 h-4 mx-auto text-sky-600 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span class="text-[10px] text-slate-600 font-medium block">ដឹកជញ្ជូនរហ័ស</span>
                        </div>
                        <div class="p-2.5 bg-slate-50 rounded-xl border border-slate-100">
                            <svg class="w-4 h-4 mx-auto text-sky-600 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            <span class="text-[10px] text-slate-600 font-medium block">សេវាទំនុកចិត្ត</span>
                        </div>
                    </div>
                </div>

                <!-- Right: Product Info & Actions -->
                <div class="lg:col-span-7 flex flex-col">
                    <div class="flex items-center gap-2 text-xs text-sky-600 font-bold mb-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <span>កម្រិតថ្នាក់៖ {{ $material->grade_level }}</span>
                    </div>

                    <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 leading-tight">
                        {{ $material->name }}
                    </h1>

                    <!-- Price Box -->
                    <div class="mt-4 p-4 rounded-2xl {{ $material->price > 0 ? 'bg-amber-50/70 border border-amber-200' : 'bg-emerald-50/70 border border-emerald-200' }} flex items-center justify-between">
                        <div>
                            <span class="text-[11px] text-slate-500 font-medium block mb-0.5">តម្លៃសម្ភារៈ</span>
                            @if($material->price > 0)
                                <div class="text-amber-600 font-black text-2xl sm:text-3xl flex items-center gap-2">
                                    <span>${{ number_format($material->price, 2) }}</span>
                                    <span class="text-xs uppercase tracking-wider text-amber-800 bg-amber-100 px-2.5 py-1 rounded-full font-black border border-amber-200">PRO</span>
                                </div>
                            @else
                                <div class="text-emerald-600 font-extrabold text-xl sm:text-2xl flex items-center gap-1.5">
                                    <span>🎁 ឥតគិតថ្លៃ (Free)</span>
                                </div>
                            @endif
                        </div>
                        <div class="text-right">
                            <span class="inline-flex items-center gap-1 text-xs font-semibold text-emerald-700 bg-emerald-100 px-3 py-1 rounded-full">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                មានក្នុងស្តុក (In Stock)
                            </span>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mt-5 space-y-2">
                        <h3 class="text-xs font-bold text-slate-800 uppercase tracking-wider">ព័ត៌មានលម្អិត</h3>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            {{ $material->description }}
                        </p>
                    </div>

                    <!-- Specifications -->
                    @if($material->specifications)
                        <div class="mt-5 p-4 bg-slate-50 rounded-2xl border border-slate-200/80">
                            <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider mb-1 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                                <span>លក្ខណៈបច្ចេកទេស (Specifications)</span>
                            </h4>
                            <p class="text-xs text-slate-700 font-mono whitespace-pre-line leading-relaxed">{{ $material->specifications }}</p>
                        </div>
                    @endif

                    <!-- Quantity Selector & Action Buttons -->
                    <div class="mt-8 pt-6 border-t border-slate-100 space-y-4">
                        <div class="flex items-center gap-4">
                            <label class="text-xs font-bold text-slate-700">ចំនួន (Quantity):</label>
                            <div class="flex items-center bg-slate-100 rounded-xl p-1 border border-slate-200">
                                <button type="button" onclick="let q = document.getElementById('detailItemQty'); q.value = Math.max(1, parseInt(q.value||1) - 1);" class="w-8 h-8 rounded-lg bg-white hover:bg-slate-200 text-slate-800 flex items-center justify-center font-black cursor-pointer shadow-2xs">−</button>
                                <input type="number" id="detailItemQty" value="1" min="1" max="99" class="w-12 text-center text-xs font-bold font-mono bg-transparent outline-hidden">
                                <button type="button" onclick="let q = document.getElementById('detailItemQty'); q.value = parseInt(q.value||1) + 1;" class="w-8 h-8 rounded-lg bg-white hover:bg-slate-200 text-slate-800 flex items-center justify-center font-black cursor-pointer shadow-2xs">+</button>
                            </div>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-3 items-stretch">
                            <button type="button" 
                                    onclick="let qty = parseInt(document.getElementById('detailItemQty').value) || 1; window.addTMCart({{ json_encode($material) }}, qty, false);" 
                                    class="flex-1 py-3.5 px-5 rounded-2xl bg-amber-500 hover:bg-amber-600 text-white text-xs sm:text-sm font-bold transition-all flex items-center justify-center gap-2 shadow-md shadow-amber-500/25 hover:shadow-lg cursor-pointer">
                                <span>🛒</span>
                                <span>+ ថែមទៅកន្ត្រក</span>
                            </button>

                            <button type="button" 
                                    onclick="let qty = parseInt(document.getElementById('detailItemQty').value) || 1; window.addTMCart({{ json_encode($material) }}, qty, true);" 
                                    class="flex-1 py-3.5 px-5 rounded-2xl bg-gradient-to-r from-orange-500 to-amber-600 hover:from-orange-600 hover:to-amber-700 text-white text-xs sm:text-sm font-bold transition-all flex items-center justify-center gap-2 shadow-lg shadow-orange-500/25 hover:shadow-xl cursor-pointer">
                                <span>⚡</span>
                                <span>កម្ម៉ង់ទិញឥឡូវនេះ</span>
                            </button>

                            <button type="button" onclick="alert('បានទាញយកមគ្គុទ្ទេសក៍ណែនាំបង្រៀនជាទម្រង់ PDF!');" 
                                    class="py-3.5 px-4 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-2xl text-xs font-bold transition-colors flex items-center justify-center gap-1.5 cursor-pointer shrink-0">
                                <span>📥</span>
                                <span>PDF</span>
                            </button>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('teaching-materials.index') }}" class="text-xs text-slate-500 hover:text-sky-600 font-semibold inline-flex items-center gap-1 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                            <span>ត្រឡប់ទៅបញ្ជីសម្ភារៈបង្រៀនទាំងអស់</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <!-- Related Materials Section -->
        @if(isset($related) && $related->count() > 0)
            <div class="mt-16">
                <div class="mb-6 flex items-end justify-between">
                    <div>
                        <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight">
                            សម្ភារៈបង្រៀនដែលពាក់ព័ន្ធ
                        </h2>
                        <p class="text-xs sm:text-sm text-slate-500 mt-1">សម្ភារៈផ្សេងទៀតក្នុងប្រភេទ {{ $material->category }}</p>
                    </div>
                    <a href="{{ route('teaching-materials.index', ['category' => $material->category]) }}" class="text-xs sm:text-sm font-semibold text-sky-600 hover:text-sky-700 flex items-center gap-1">
                        <span>មើលទាំងអស់</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($related as $rel)
                        <div class="rounded-2xl transition-all duration-300 flex flex-col group overflow-hidden hover:-translate-y-1.5 {{ $rel->price > 0 ? 'bg-gradient-to-b from-amber-500/[0.08] via-amber-500/[0.02] to-white border-2 border-amber-300 hover:border-amber-500 shadow-md shadow-amber-500/10 hover:shadow-xl hover:shadow-amber-500/25 ring-1 ring-amber-400/20' : 'bg-white border border-slate-200 shadow-2xs hover:shadow-lg hover:border-sky-300' }}">
                            
                            <!-- Card Image Link -->
                            <a href="{{ route('teaching-materials.show', $rel) }}" class="aspect-square w-full bg-slate-50 p-6 flex items-center justify-center relative overflow-hidden border-b {{ $rel->price > 0 ? 'border-amber-100' : 'border-slate-100' }} block">
                                @php
                                    if ($rel->image) {
                                        $relImg = str_starts_with($rel->image, '/') || str_starts_with($rel->image, 'http') 
                                            ? $rel->image 
                                            : Storage::url($rel->image);
                                    } else {
                                        $relImg = '/images/tool_ruler.svg';
                                    }
                                @endphp
                                <img src="{{ $relImg }}" 
                                     alt="{{ $rel->name }}" 
                                     class="w-full h-full object-contain group-hover:scale-110 transition-transform duration-500 filter drop-shadow-sm" />
                                
                                <div class="absolute top-3 left-3 flex items-center gap-1.5">
                                    <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-white text-slate-700 shadow-xs border border-slate-200">
                                        {{ $rel->category }}
                                    </span>
                                    @if($rel->price > 0)
                                        <span class="px-2 py-0.5 rounded-full text-[9px] font-black uppercase bg-gradient-to-r from-amber-500 via-orange-500 to-amber-600 text-white shadow-md shadow-amber-500/30 flex items-center gap-1 ring-1 ring-white">
                                            <span>👑</span> <span>PREMIUM</span>
                                        </span>
                                    @endif
                                </div>
                                
                                @if($rel->is_featured)
                                    <span class="absolute top-3 right-3 px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500 text-white shadow-xs">
                                        ពេញនិយម
                                    </span>
                                @endif
                            </a>

                            <!-- Card Content -->
                            <div class="p-5 flex-1 flex flex-col">
                                <div class="flex items-center gap-1.5 text-[11px] text-slate-400 font-medium mb-1.5">
                                    <svg class="w-3.5 h-3.5 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                    <span>{{ $rel->grade_level }}</span>
                                </div>

                                <h3 class="font-bold text-slate-900 text-sm leading-snug group-hover:text-sky-600 transition-colors line-clamp-2">
                                    <a href="{{ route('teaching-materials.show', $rel) }}">
                                        {{ $rel->name }}
                                    </a>
                                </h3>

                                <p class="text-xs text-slate-500 mt-2 line-clamp-2 leading-relaxed">
                                    {{ $rel->description }}
                                </p>

                                <div class="mt-auto pt-3">
                                    @if($rel->price > 0)
                                        <div class="text-amber-600 font-extrabold text-base mb-3 flex items-center gap-1.5">
                                            <span>${{ number_format($rel->price, 2) }}</span>
                                            <span class="text-[10px] uppercase tracking-wider text-amber-800 bg-amber-100 px-2 py-0.5 rounded-full font-black border border-amber-200">PRO</span>
                                        </div>
                                    @else
                                        <div class="text-emerald-600 font-bold mb-3 flex items-center gap-1">
                                            <span>🎁 ឥតគិតថ្លៃ (Free)</span>
                                        </div>
                                    @endif

                                    <div class="border-t {{ $rel->price > 0 ? 'border-amber-100' : 'border-slate-100' }} pt-3 flex items-center gap-2">
                                        <a href="{{ route('teaching-materials.show', $rel) }}" 
                                           class="py-2 px-2.5 rounded-xl border border-slate-200 hover:border-sky-400 bg-white hover:bg-sky-50 text-slate-700 hover:text-sky-600 text-xs font-semibold transition-colors text-center flex items-center justify-center gap-1 shrink-0">
                                            <span>មើលលម្អិត</span>
                                        </a>
                                        <button type="button" onclick="window.addTMCart({{ json_encode($rel) }})" 
                                                class="flex-1 py-2 px-2.5 rounded-xl bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 text-white text-xs font-bold transition-all flex items-center justify-center gap-1.5 shadow-md shadow-amber-500/20 hover:shadow-lg cursor-pointer">
                                            <span>🛒</span>
                                            <span>+ ថែមទៅកន្ត្រក</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </main>

    <!-- Order Modal -->
    <div id="orderModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-lg w-full p-6 shadow-2xl border border-slate-100 relative">
            <button type="button" onclick="closeOrderModal()" aria-label="Close" class="absolute top-5 right-5 text-slate-400 hover:text-slate-700 cursor-pointer">
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
                    <textarea name="notes" rows="2" placeholder="ចំណាំបន្ថែម..." class="w-full px-3 py-2 text-xs rounded-xl border border-slate-200 focus:outline-hidden focus:border-sky-500"></textarea>
                </div>
                <div class="flex gap-3 pt-2">
                    <button type="button" onclick="closeOrderModal()" class="flex-1 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs font-bold transition-colors cursor-pointer">
                        បោះបង់
                    </button>
                    <button type="submit" class="flex-2 py-2.5 bg-sky-600 hover:bg-sky-700 text-white rounded-xl text-xs font-bold transition-colors cursor-pointer shadow-md">
                        បញ្ជូនការកម្ម៉ង់ទិញ
                    </button>
                </div>
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
            if (dropdown) dropdown.classList.toggle('hidden');
        }

        let currentItem = null;
        let currentQuantity = 1;
        let currentOrderCode = '';
        let paymentCheckInterval = null;

        function updateQuantity() {
            const qtyInput = document.getElementById('orderQty');
            if(qtyInput) {
                currentQuantity = parseInt(qtyInput.value) || 1;
                const method = document.querySelector('input[name="payment_method"]:checked');
                if (method && method.value === 'khqr') {
                    toggleKHQR(true);
                }
            }
        }

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
            
            let imgSrc = item.image || '/images/tool_ruler.svg';
            if (item.image && !item.image.startsWith('/') && !item.image.startsWith('http')) {
                imgSrc = '/storage/' + item.image;
            }
            document.getElementById('orderImg').src = imgSrc;
            
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
            if (typeof paymentCheckInterval !== 'undefined' && paymentCheckInterval) {
                clearInterval(paymentCheckInterval);
                paymentCheckInterval = null;
            }
            const modal = document.getElementById('orderModal');
            if (modal) {
                modal.classList.add('hidden');
            }
        }

        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeOrderModal();
            }
        });

        // Close on clicking backdrop
        document.getElementById('orderModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeOrderModal();
            }
        });
    </script>
</body>
</html>
