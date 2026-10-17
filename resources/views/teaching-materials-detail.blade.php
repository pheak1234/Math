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
                
                <!-- Left: Product Image & Gallery Showcase -->
                <div class="lg:col-span-5">
                    @php
                        $allImages = $material->all_images;
                        $mainImg = $allImages[0] ?? '/images/tool_ruler.svg';
                        $hasMultipleImages = count($allImages) > 1;
                    @endphp
                    
                    <!-- Main Showcase Display -->
                    <div class="aspect-square bg-slate-50 rounded-2xl border border-slate-200/80 relative overflow-hidden shadow-xs group cursor-zoom-in"
                         onclick="tmOpenFullscreen()">
                        <img id="tmMainImage" 
                             src="{{ $mainImg }}" 
                             alt="{{ $material->name }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-all duration-300">
                        
                        <!-- Badges -->
                        <div class="absolute top-4 left-4 flex flex-col gap-1.5 items-start pointer-events-none z-10">
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-white/95 text-slate-700 shadow-xs border border-slate-200 backdrop-blur-xs">
                                {{ $material->category }}
                            </span>
                            @if($material->price > 0)
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black uppercase bg-gradient-to-r from-amber-500 via-orange-500 to-amber-600 text-white shadow-md shadow-amber-500/30 flex items-center gap-1 ring-1 ring-white">
                                    <span>👑</span> <span>PREMIUM</span>
                                </span>
                            @endif
                        </div>

                        @if($material->is_featured)
                            <span class="absolute top-4 right-4 px-3 py-1 rounded-full text-xs font-bold bg-amber-500 text-white shadow-xs z-10">
                                ពេញនិយម
                            </span>
                        @endif

                        <!-- Fullscreen Action Pill -->
                        <button type="button" 
                                onclick="event.stopPropagation(); tmOpenFullscreen();"
                                title="ពង្រីកពេញអេក្រង់ (Full Screen)"
                                class="absolute bottom-3 left-3 px-3 py-1.5 rounded-full text-xs font-semibold bg-white/90 hover:bg-white text-slate-700 shadow-md border border-slate-200 flex items-center gap-1.5 backdrop-blur-xs transition-all hover:scale-105 cursor-pointer z-10 group-hover:ring-2 group-hover:ring-sky-400/40">
                            <svg class="w-3.5 h-3.5 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5v-4m0 4h-4m4 0l-5-5"/>
                            </svg>
                            <span>ពង្រីកពេញអេក្រង់</span>
                        </button>

                        @if($hasMultipleImages)
                            <!-- Left / Right Navigation Overlays -->
                            <button type="button" 
                                    onclick="event.stopPropagation(); tmPrevImage();" 
                                    aria-label="Previous image"
                                    class="absolute left-2.5 top-1/2 -translate-y-1/2 w-9 h-9 rounded-full bg-white/90 hover:bg-white text-slate-700 shadow-md border border-slate-200 flex items-center justify-center transition-all opacity-0 group-hover:opacity-100 cursor-pointer hover:scale-110 active:scale-95 z-20">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
                            </button>
                            <button type="button" 
                                    onclick="event.stopPropagation(); tmNextImage();" 
                                    aria-label="Next image"
                                    class="absolute right-2.5 top-1/2 -translate-y-1/2 w-9 h-9 rounded-full bg-white/90 hover:bg-white text-slate-700 shadow-md border border-slate-200 flex items-center justify-center transition-all opacity-0 group-hover:opacity-100 cursor-pointer hover:scale-110 active:scale-95 z-20">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                            </button>

                            <!-- Counter Badge -->
                            <div class="absolute bottom-3 right-3 px-2.5 py-1 rounded-full text-[11px] font-bold bg-slate-900/70 text-white backdrop-blur-xs flex items-center gap-1.5 shadow-xs z-10 font-mono">
                                <svg class="w-3.5 h-3.5 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span id="tmImageCounterText">1 / {{ count($allImages) }}</span>
                            </div>
                        @endif
                    </div>

                    @if($hasMultipleImages)
                        <!-- Compact Thumbnail Gallery Strip (Fixed height, horizontal scroll) -->
                        <div class="mt-3.5 pt-3 border-t border-slate-100">
                            <div class="flex items-center justify-between text-xs font-semibold text-slate-600 mb-2 px-1">
                                <span class="flex items-center gap-1.5 text-slate-700">
                                    <svg class="w-4 h-4 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                                    <span>កម្រងរូបភាព ({{ count($allImages) }} សន្លឹក)</span>
                                </span>
                                @if(count($allImages) > 4)
                                    <div class="flex items-center gap-1">
                                        <button type="button" onclick="tmScrollThumbs(-120)" class="w-6 h-6 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-600 flex items-center justify-center transition-colors cursor-pointer" title="មុន">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
                                        </button>
                                        <button type="button" onclick="tmScrollThumbs(120)" class="w-6 h-6 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-600 flex items-center justify-center transition-colors cursor-pointer" title="បន្ទាប់">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                                        </button>
                                    </div>
                                @endif
                            </div>

                            <div id="tmThumbsContainer" class="flex items-center gap-2 overflow-x-auto p-1 scrollbar-thin scroll-smooth max-w-full">
                                @foreach($allImages as $index => $img)
                                    <button type="button" 
                                            onclick="tmSelectImage({{ $index }})" 
                                            id="tmThumb-{{ $index }}"
                                            class="tm-gallery-thumb relative w-14 h-14 sm:w-16 sm:h-16 rounded-xl bg-slate-50 p-1.5 border-2 transition-all cursor-pointer shrink-0 flex items-center justify-center shadow-2xs hover:shadow-sm {{ $index === 0 ? 'border-sky-500 ring-2 ring-sky-400/30 scale-105 bg-white' : 'border-slate-200 hover:border-sky-300 opacity-60 hover:opacity-100' }}">
                                        <img src="{{ $img }}" alt="{{ $material->name }} - {{ $index + 1 }}" class="max-h-full max-w-full object-contain">
                                        @if($index === 0)
                                            <span class="absolute -top-1 -right-1 bg-sky-600 text-white text-[8px] font-black px-1 rounded-full shadow-xs">មេ</span>
                                        @endif
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    @endif

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

                    <!-- Modern High-Converting Action Bar & Buttons -->
                    <div class="mt-8 pt-6 border-t border-slate-100 space-y-4">
                        
                        <!-- Quantity Selector & Live Subtotal Bar -->
                        <div class="p-3.5 sm:p-4 bg-slate-50/90 rounded-2xl border border-slate-200/90 flex items-center justify-between gap-4 shadow-2xs">
                            <div class="flex items-center gap-3">
                                <span class="text-xs font-bold text-slate-700 flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/></svg>
                                    <span>ចំនួន (Qty):</span>
                                </span>
                                <div class="flex items-center bg-white rounded-xl p-1 border border-slate-200 shadow-2xs">
                                    <button type="button" 
                                            onclick="let q = document.getElementById('detailItemQty'); q.value = Math.max(1, parseInt(q.value||1) - 1); updateDetailLineTotal();" 
                                            class="w-8 h-8 rounded-lg bg-slate-100 hover:bg-amber-500 hover:text-white text-slate-700 flex items-center justify-center font-black text-sm transition-all cursor-pointer active:scale-90">
                                        −
                                    </button>
                                    <input type="number" 
                                           id="detailItemQty" 
                                           value="1" 
                                           min="1" 
                                           max="99" 
                                           onchange="updateDetailLineTotal()" 
                                           onkeyup="updateDetailLineTotal()" 
                                           class="w-12 text-center text-sm font-black font-mono text-slate-900 bg-transparent outline-hidden">
                                    <button type="button" 
                                            onclick="let q = document.getElementById('detailItemQty'); q.value = Math.min(99, parseInt(q.value||1) + 1); updateDetailLineTotal();" 
                                            class="w-8 h-8 rounded-lg bg-slate-100 hover:bg-amber-500 hover:text-white text-slate-700 flex items-center justify-center font-black text-sm transition-all cursor-pointer active:scale-90">
                                        +
                                    </button>
                                </div>
                            </div>

                            <div class="text-right">
                                <span class="text-[10px] uppercase font-bold text-slate-400 block tracking-wider">សរុប (Subtotal)</span>
                                <span id="detailLineTotal" class="text-lg sm:text-xl font-black text-amber-600 font-mono tracking-tight">
                                    {{ $material->price > 0 ? '$' . number_format($material->price, 2) : 'Free' }}
                                </span>
                            </div>
                        </div>

                        <!-- 2 Catchy Main Action Buttons -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-3.5 pt-1">
                            
                            <!-- 1. Secondary CTA: Add to Cart (Warm Amber Pill) -->
                            <button type="button" 
                                    onclick="let qty = parseInt(document.getElementById('detailItemQty').value) || 1; window.addTMCart({{ json_encode($material) }}, qty, false);" 
                                    class="group w-full py-3.5 sm:py-4 px-5 rounded-2xl bg-amber-50 hover:bg-amber-100/90 text-amber-900 hover:text-amber-950 font-extrabold text-sm sm:text-base border-2 border-amber-400 hover:border-amber-500 shadow-sm hover:shadow-md hover:-translate-y-0.5 active:translate-y-0 active:scale-[0.98] transition-all duration-200 flex items-center justify-center gap-2.5 cursor-pointer">
                                <svg class="w-5 h-5 text-amber-600 group-hover:scale-110 transition-transform shrink-0" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span class="whitespace-nowrap tracking-wide">+ ថែមទៅកន្ត្រក</span>
                            </button>

                            <!-- 2. Primary CTA: Buy Now (Vibrant Sunset Flame Gradient) -->
                            <button type="button" 
                                    onclick="let qty = parseInt(document.getElementById('detailItemQty').value) || 1; window.addTMCart({{ json_encode($material) }}, qty, true);" 
                                    class="group w-full py-3.5 sm:py-4 px-5 rounded-2xl bg-gradient-to-r from-amber-500 via-orange-500 to-amber-600 hover:from-amber-600 hover:via-orange-600 hover:to-amber-700 text-white font-black text-sm sm:text-base shadow-lg shadow-orange-500/25 hover:shadow-xl hover:shadow-orange-500/35 hover:-translate-y-0.5 active:translate-y-0 active:scale-[0.98] transition-all duration-200 flex items-center justify-center gap-2.5 cursor-pointer ring-1 ring-white/20">
                                <svg class="w-5 h-5 text-amber-100 group-hover:scale-110 transition-transform shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
                                </svg>
                                <span class="whitespace-nowrap tracking-wide">ទិញឥឡូវនេះ</span>
                            </button>

                        </div>

                        <!-- 4 Catchy Trust Pills -->
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 pt-2 text-center">
                            <div class="py-2 px-2.5 bg-slate-50 rounded-xl border border-slate-100 flex items-center justify-center gap-1.5 text-[11px] font-semibold text-slate-700">
                                <span>🚚</span>
                                <span>ដឹកទូទាំងប្រទេស</span>
                            </div>
                            <div class="py-2 px-2.5 bg-slate-50 rounded-xl border border-slate-100 flex items-center justify-center gap-1.5 text-[11px] font-semibold text-slate-700">
                                <span>💵</span>
                                <span>បង់ពេលទទួល (COD)</span>
                            </div>
                            <div class="py-2 px-2.5 bg-slate-50 rounded-xl border border-slate-100 flex items-center justify-center gap-1.5 text-[11px] font-semibold text-slate-700">
                                <span>🛡️</span>
                                <span>ធានាគុណភាព ១០០%</span>
                            </div>
                            <div class="py-2 px-2.5 bg-slate-50 rounded-xl border border-slate-100 flex items-center justify-center gap-1.5 text-[11px] font-semibold text-slate-700">
                                <span>💬</span>
                                <span>ប្រឹក្សាឥតគិតថ្លៃ</span>
                            </div>
                        </div>

                        <!-- Supplementary Links & PDF Action -->
                        <div class="flex flex-col sm:flex-row gap-3 pt-2">
                            <button type="button" onclick="alert('បានទាញយកមគ្គុទ្ទេសក៍ណែនាំបង្រៀនជាទម្រង់ PDF!');" 
                                    class="flex-1 py-3 px-4 rounded-xl border border-rose-200 hover:border-rose-300 bg-rose-50/40 hover:bg-rose-50 text-rose-700 font-bold text-xs transition-colors flex items-center justify-center gap-2 cursor-pointer shadow-2xs">
                                <span class="px-1.5 py-0.5 rounded text-[10px] font-black bg-rose-500 text-white">PDF</span>
                                <span>ទាញយកមគ្គុទ្ទេសក៍ណែនាំបង្រៀន (Download Guide)</span>
                            </button>
                            <a href="{{ route('teaching-materials.index') }}" 
                               class="py-3 px-4 rounded-xl border border-slate-200 hover:border-slate-300 bg-white hover:bg-slate-50 text-slate-600 hover:text-slate-900 font-semibold text-xs transition-colors flex items-center justify-center gap-1.5 shrink-0 shadow-2xs">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                                <span>បញ្ជីសម្ភារៈទាំងអស់</span>
                            </a>
                        </div>

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
                        <div class="group bg-white rounded-2xl border border-slate-200/90 hover:border-slate-300 shadow-xs hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col overflow-hidden">
                            
                            <!-- Card Image Link -->
                            <div class="relative aspect-square w-full bg-slate-50 overflow-hidden border-b border-slate-100">
                                <a href="{{ route('teaching-materials.show', $rel) }}" class="block w-full h-full">
                                    <img src="{{ $rel->image_url }}" 
                                         alt="{{ $rel->name }}" 
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out" 
                                         loading="lazy" />
                                </a>
                                
                                <!-- Badges -->
                                <div class="absolute top-3 inset-x-3 flex items-center justify-between pointer-events-none">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-[10px] font-semibold bg-white/95 backdrop-blur-xs text-slate-700 shadow-xs border border-slate-200/80">
                                        {{ $rel->category }}
                                    </span>
                                    @if($rel->is_featured)
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg text-[10px] font-bold bg-amber-500 text-white shadow-xs">
                                            <span>★</span>
                                            <span>ពេញនិយម</span>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Card Content -->
                            <div class="p-4 sm:p-5 flex-1 flex flex-col">
                                <div class="flex items-center gap-1.5 text-[11px] text-slate-500 font-medium mb-1.5">
                                    <svg class="w-3.5 h-3.5 text-sky-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                    <span>{{ $rel->grade_level }}</span>
                                </div>

                                <h3 class="font-bold text-slate-900 group-hover:text-sky-600 transition-colors text-sm leading-snug line-clamp-2 min-h-[2.5rem]">
                                    <a href="{{ route('teaching-materials.show', $rel) }}">
                                        {{ $rel->name }}
                                    </a>
                                </h3>

                                <p class="text-xs text-slate-500 mt-1.5 line-clamp-2 leading-relaxed">
                                    {{ $rel->description }}
                                </p>

                                @if($rel->specifications)
                                    @php
                                        $firstRelSpec = trim(explode('|', $rel->specifications)[0]);
                                    @endphp
                                    <div class="mt-2.5 flex items-center gap-1.5 text-[11px] text-slate-600 bg-slate-50 border border-slate-100 rounded-lg px-2.5 py-1.5">
                                        <svg class="w-3.5 h-3.5 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        <span class="truncate" title="{{ $firstRelSpec }}">{{ $firstRelSpec }}</span>
                                    </div>
                                @endif

                                <div class="mt-auto pt-4">
                                    <div class="flex items-center justify-between mb-3">
                                        @if($rel->price > 0)
                                            <div class="flex items-baseline gap-1">
                                                <span class="text-xs text-slate-400 font-medium">$</span>
                                                <span class="text-lg font-black text-slate-900 tracking-tight">{{ number_format($rel->price, 2) }}</span>
                                            </div>
                                            <span class="text-[10px] uppercase font-bold tracking-wider text-amber-700 bg-amber-50 border border-amber-200/80 px-2 py-0.5 rounded-md">
                                                PRO
                                            </span>
                                        @else
                                            <div class="flex items-center gap-1.5 text-emerald-600 font-bold text-sm">
                                                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                                <span>ឥតគិតថ្លៃ (Free)</span>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="border-t border-slate-100 pt-3 flex items-center gap-2">
                                        <a href="{{ route('teaching-materials.show', $rel) }}" 
                                           class="py-2 px-3 rounded-xl border border-slate-200 hover:border-sky-300 bg-white hover:bg-sky-50/50 text-slate-700 hover:text-sky-600 text-xs font-semibold transition-all text-center flex items-center justify-center shrink-0">
                                            <span>មើលលម្អិត</span>
                                        </a>
                                        <button type="button" 
                                                onclick="window.addTMCart({{ json_encode($rel) }})" 
                                                class="flex-1 py-2 px-3 rounded-xl bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white text-xs font-bold transition-all flex items-center justify-center gap-1.5 shadow-sm hover:shadow-md hover:shadow-orange-500/20 active:scale-95 cursor-pointer">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                            </svg>
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

    <!-- Fullscreen Image Lightbox Modal -->
    <div id="tmFullscreenModal" 
         class="hidden fixed inset-0 z-[9999] bg-slate-950/95 backdrop-blur-md flex flex-col justify-between p-4 sm:p-6 transition-all duration-300 opacity-0 pointer-events-none"
         onclick="if(event.target === this) tmCloseFullscreen()">
        
        <!-- Top Bar -->
        <div class="flex items-center justify-between text-white pb-3 border-b border-white/10 z-20">
            <div class="flex items-center gap-2.5 min-w-0">
                <span class="px-2.5 py-0.5 rounded-lg text-[10px] font-bold bg-sky-500/20 text-sky-300 border border-sky-400/30">
                    {{ $material->category }}
                </span>
                <h3 class="text-sm sm:text-base font-bold text-white truncate max-w-xs sm:max-w-md lg:max-w-xl">
                    {{ $material->name }}
                </h3>
            </div>

            <div class="flex items-center gap-2 sm:gap-3 shrink-0">
                <span id="tmFsCounter" class="text-xs font-mono font-bold text-white/80 bg-white/10 px-3 py-1 rounded-full border border-white/15">
                    1 / {{ count($allImages) }}
                </span>
                <button type="button" 
                        onclick="tmToggleFsZoom()" 
                        title="ពង្រីក / បង្រួម (Zoom)"
                        class="w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center transition-colors cursor-pointer">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/>
                    </svg>
                </button>
                <button type="button" 
                        onclick="tmCloseFullscreen()" 
                        title="បិទ (ESC)"
                        class="w-9 h-9 rounded-full bg-white/10 hover:bg-rose-600 text-white flex items-center justify-center transition-colors cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Center Image Showcase with Navigation -->
        <div class="flex-1 relative flex items-center justify-center overflow-hidden my-auto w-full select-none" onclick="if(event.target === this) tmCloseFullscreen()">
            @if($hasMultipleImages)
                <button type="button" 
                        onclick="event.stopPropagation(); tmPrevImage();" 
                        aria-label="Previous"
                        class="absolute left-2 sm:left-6 top-1/2 -translate-y-1/2 w-11 h-11 sm:w-14 sm:h-14 rounded-full bg-white/10 hover:bg-white/30 text-white border border-white/20 flex items-center justify-center transition-all hover:scale-110 active:scale-95 cursor-pointer z-20 backdrop-blur-xs">
                    <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button type="button" 
                        onclick="event.stopPropagation(); tmNextImage();" 
                        aria-label="Next"
                        class="absolute right-2 sm:right-6 top-1/2 -translate-y-1/2 w-11 h-11 sm:w-14 sm:h-14 rounded-full bg-white/10 hover:bg-white/30 text-white border border-white/20 flex items-center justify-center transition-all hover:scale-110 active:scale-95 cursor-pointer z-20 backdrop-blur-xs">
                    <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                </button>
            @endif

            <img id="tmFsImage" 
                 src="{{ $mainImg }}" 
                 alt="{{ $material->name }}" 
                 onclick="event.stopPropagation(); tmToggleFsZoom();"
                 class="max-h-[72vh] sm:max-h-[80vh] max-w-[92vw] object-contain transition-transform duration-300 select-none drop-shadow-2xl cursor-zoom-in" />
        </div>

        <!-- Bottom Thumbnails Strip in Fullscreen -->
        @if($hasMultipleImages)
            <div class="pt-3 border-t border-white/10 z-20 flex justify-center">
                <div id="tmFsThumbsContainer" class="flex items-center gap-2 overflow-x-auto max-w-2xl px-2 py-1 scrollbar-thin">
                    @foreach($allImages as $index => $img)
                        <button type="button" 
                                onclick="event.stopPropagation(); tmSelectImage({{ $index }})" 
                                id="tmFsThumb-{{ $index }}"
                                class="tm-fs-thumb relative w-12 h-12 sm:w-14 sm:h-14 rounded-lg bg-white/5 p-1 border-2 transition-all cursor-pointer shrink-0 flex items-center justify-center {{ $index === 0 ? 'border-sky-400 ring-2 ring-sky-400/50 scale-105 bg-white/20' : 'border-white/20 opacity-50 hover:opacity-100 hover:border-white/40' }}">
                            <img src="{{ $img }}" alt="{{ $material->name }} - {{ $index + 1 }}" class="max-h-full max-w-full object-contain">
                        </button>
                    @endforeach
                </div>
            </div>
        @endif
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

        function updateDetailLineTotal() {
            const qtyInput = document.getElementById('detailItemQty');
            const totalEl = document.getElementById('detailLineTotal');
            if (!qtyInput || !totalEl) return;
            const qty = Math.max(1, parseInt(qtyInput.value) || 1);
            const unitPrice = {{ (float) ($material->price ?? 0) }};
            const total = qty * unitPrice;
            totalEl.textContent = unitPrice > 0 ? '$' + total.toFixed(2) : 'Free';
        }

        // Teaching Material Gallery Controller
        const tmImages = @json($allImages);
        let tmCurrentIdx = 0;
        let tmIsFsZoomed = false;

        function tmSelectImage(idx) {
            if (idx < 0 || idx >= tmImages.length) return;
            tmCurrentIdx = idx;
            
            const mainImg = document.getElementById('tmMainImage');
            if (mainImg) {
                mainImg.classList.add('opacity-40', 'scale-95');
                setTimeout(() => {
                    mainImg.src = tmImages[tmCurrentIdx];
                    mainImg.classList.remove('opacity-40', 'scale-95');
                }, 100);
            }

            const counter = document.getElementById('tmImageCounterText');
            if (counter) {
                counter.textContent = (tmCurrentIdx + 1) + ' / ' + tmImages.length;
            }

            // Sync with Fullscreen Modal if active
            const fsImg = document.getElementById('tmFsImage');
            if (fsImg) {
                fsImg.src = tmImages[tmCurrentIdx];
            }
            const fsCounter = document.getElementById('tmFsCounter');
            if (fsCounter) {
                fsCounter.textContent = (tmCurrentIdx + 1) + ' / ' + tmImages.length;
            }
            tmUpdateFsThumbs();

            document.querySelectorAll('.tm-gallery-thumb').forEach((thumb, i) => {
                if (i === tmCurrentIdx) {
                    thumb.classList.add('border-sky-500', 'ring-2', 'ring-sky-400/30', 'scale-105', 'opacity-100', 'bg-white');
                    thumb.classList.remove('border-slate-200', 'opacity-60');
                } else {
                    thumb.classList.remove('border-sky-500', 'ring-2', 'ring-sky-400/30', 'scale-105', 'opacity-100', 'bg-white');
                    thumb.classList.add('border-slate-200', 'opacity-60');
                }
            });

            // Smoothly auto-scroll thumbnail into visible area
            const activeThumb = document.getElementById('tmThumb-' + idx);
            if (activeThumb) {
                activeThumb.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
            }
        }

        function tmScrollThumbs(delta) {
            const container = document.getElementById('tmThumbsContainer');
            if (container) {
                container.scrollBy({ left: delta, behavior: 'smooth' });
            }
        }

        function tmPrevImage() {
            if (tmImages.length <= 1) return;
            const prevIdx = (tmCurrentIdx - 1 + tmImages.length) % tmImages.length;
            tmSelectImage(prevIdx);
        }

        function tmNextImage() {
            if (tmImages.length <= 1) return;
            const nextIdx = (tmCurrentIdx + 1) % tmImages.length;
            tmSelectImage(nextIdx);
        }

        // Fullscreen Modal Controls
        function tmOpenFullscreen(idx = null) {
            if (idx !== null) {
                tmSelectImage(idx);
            }
            const modal = document.getElementById('tmFullscreenModal');
            if (!modal) return;

            const fsImg = document.getElementById('tmFsImage');
            if (fsImg) {
                fsImg.src = tmImages[tmCurrentIdx];
                fsImg.classList.remove('scale-150', 'cursor-zoom-out');
                fsImg.classList.add('cursor-zoom-in');
                tmIsFsZoomed = false;
            }

            const fsCounter = document.getElementById('tmFsCounter');
            if (fsCounter) {
                fsCounter.textContent = (tmCurrentIdx + 1) + ' / ' + tmImages.length;
            }

            tmUpdateFsThumbs();

            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0', 'pointer-events-none');
            }, 10);
            document.body.classList.add('overflow-hidden');
        }

        function tmCloseFullscreen() {
            const modal = document.getElementById('tmFullscreenModal');
            if (!modal) return;

            modal.classList.add('opacity-0', 'pointer-events-none');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 200);
            document.body.classList.remove('overflow-hidden');
            tmIsFsZoomed = false;
        }

        function tmToggleFsZoom() {
            const fsImg = document.getElementById('tmFsImage');
            if (!fsImg) return;
            tmIsFsZoomed = !tmIsFsZoomed;
            if (tmIsFsZoomed) {
                fsImg.classList.add('scale-150', 'cursor-zoom-out');
                fsImg.classList.remove('cursor-zoom-in');
            } else {
                fsImg.classList.remove('scale-150', 'cursor-zoom-out');
                fsImg.classList.add('cursor-zoom-in');
            }
        }

        function tmUpdateFsThumbs() {
            document.querySelectorAll('.tm-fs-thumb').forEach((thumb, i) => {
                if (i === tmCurrentIdx) {
                    thumb.classList.add('border-sky-400', 'ring-2', 'ring-sky-400/50', 'scale-105', 'bg-white/20');
                    thumb.classList.remove('border-white/20', 'opacity-50');
                } else {
                    thumb.classList.remove('border-sky-400', 'ring-2', 'ring-sky-400/50', 'scale-105', 'bg-white/20');
                    thumb.classList.add('border-white/20', 'opacity-50');
                }
            });

            const activeFsThumb = document.getElementById('tmFsThumb-' + tmCurrentIdx);
            if (activeFsThumb) {
                activeFsThumb.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
            }
        }

        // Keyboard Support for Fullscreen & Gallery
        document.addEventListener('keydown', function(e) {
            const modal = document.getElementById('tmFullscreenModal');
            if (!modal || modal.classList.contains('hidden') || modal.classList.contains('opacity-0')) return;

            if (e.key === 'Escape') {
                tmCloseFullscreen();
            } else if (e.key === 'ArrowLeft') {
                tmPrevImage();
            } else if (e.key === 'ArrowRight') {
                tmNextImage();
            }
        });
    </script>
</body>
</html>
