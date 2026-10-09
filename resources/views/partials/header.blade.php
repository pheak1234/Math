@php
    $isActive = function($pattern) {
        if ($pattern === '/' && request()->is('/')) {
            return true;
        }
        if ($pattern !== '/' && (request()->is($pattern) || request()->is(trim($pattern, '*').'/*'))) {
            return true;
        }
        return false;
    };
@endphp

<!-- Global Top Navigation Bar (Identical on Every Page) -->
<header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200/80 transition-all shadow-xs">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 sm:h-18">
            
            <!-- Logo (User's Official Brand Logo: Snake/Naga Infinity + ANONTAK) -->
            <div class="flex items-center">
                <a href="/" class="flex items-center group py-1" title="ANONTAK">
                    <img src="{{ asset('images/anontak-logo-transparent.png') }}" 
                         alt="ANONTAK" 
                         class="h-9 sm:h-10 w-auto object-contain transition-transform duration-200 group-hover:scale-105">
                    <span class="sr-only">ANONTAK</span>
                </a>
            </div>

            <!-- Desktop Nav Links (The 7 Exact Menu Titles) -->
            <nav class="hidden lg:flex items-center space-x-1 xl:space-x-3 text-[15px] font-medium text-slate-700">
                <a href="/" class="px-2 xl:px-3 py-1.5 whitespace-nowrap {{ $isActive('/') ? 'text-slate-900 font-semibold relative after:content-[\'\'] after:absolute after:bottom-0 after:left-2.5 after:right-2.5 after:h-0.5 after:bg-slate-900' : 'hover:text-sky-600 transition-colors' }}">
                    ទំព័រដើម
                </a>
                <a href="/mathematics" class="px-2 xl:px-3 py-1.5 whitespace-nowrap {{ $isActive('mathematics*') ? 'text-slate-900 font-semibold relative after:content-[\'\'] after:absolute after:bottom-0 after:left-2.5 after:right-2.5 after:h-0.5 after:bg-slate-900' : 'hover:text-sky-600 transition-colors' }}">
                    គណិតវិទ្យា
                </a>
                <a href="/books" class="px-2 xl:px-3 py-1.5 whitespace-nowrap {{ $isActive('books*') ? 'text-slate-900 font-semibold relative after:content-[\'\'] after:absolute after:bottom-0 after:left-2.5 after:right-2.5 after:h-0.5 after:bg-slate-900' : 'hover:text-sky-600 transition-colors' }}">
                    សៀវភៅ
                </a>
                <a href="/articles" class="px-2 xl:px-3 py-1.5 whitespace-nowrap {{ $isActive('articles*') ? 'text-slate-900 font-semibold relative after:content-[\'\'] after:absolute after:bottom-0 after:left-2.5 after:right-2.5 after:h-0.5 after:bg-slate-900' : 'hover:text-sky-600 transition-colors' }}">
                    អត្ថបទ
                </a>
                <a href="/teaching-materials" class="px-2 xl:px-3 py-1.5 whitespace-nowrap {{ $isActive('teaching-materials*') ? 'text-slate-900 font-semibold relative after:content-[\'\'] after:absolute after:bottom-0 after:left-2.5 after:right-2.5 after:h-0.5 after:bg-slate-900' : 'hover:text-sky-600 transition-colors' }}">
                    សំភារៈបង្រៀន
                </a>
                <a href="/about" class="px-2 xl:px-3 py-1.5 whitespace-nowrap {{ $isActive('about*') ? 'text-slate-900 font-semibold relative after:content-[\'\'] after:absolute after:bottom-0 after:left-2.5 after:right-2.5 after:h-0.5 after:bg-slate-900' : 'hover:text-sky-600 transition-colors' }}">
                    អំពីយើង
                </a>
                <a href="/classes" class="px-2 xl:px-3 py-1.5 whitespace-nowrap {{ $isActive('classes*') ? 'text-slate-900 font-semibold relative after:content-[\'\'] after:absolute after:bottom-0 after:left-2.5 after:right-2.5 after:h-0.5 after:bg-slate-900' : 'hover:text-sky-600 transition-colors' }}">
                    ថ្នាក់បង្រៀន
                </a>
            </nav>

            <!-- Right Controls -->
            <div class="flex items-center space-x-3 sm:space-x-4">
                <!-- Search Button -->
                <a href="/books" aria-label="Search" class="p-2 text-slate-600 hover:text-sky-600 hover:bg-slate-100 rounded-full transition-colors cursor-pointer" title="ស្វែងរក">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </a>

                <!-- User Account / Profile -->
                <div class="relative">
                    @auth
                        <button onclick="toggleGlobalUserMenu(event)" id="globalUserBtn" class="flex items-center gap-2 p-1.5 sm:px-3 sm:py-1.5 rounded-full text-slate-700 hover:bg-slate-100 transition-colors bg-white shadow-sm border border-slate-200 cursor-pointer">
                            @if(Auth::user()->profile_photo_url)
                                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="w-7 h-7 rounded-full object-cover">
                            @else
                                <div class="w-7 h-7 rounded-full bg-sky-100 text-sky-700 flex items-center justify-center font-bold text-sm">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                            @endif
                            <span class="text-sm font-medium hidden sm:block">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-slate-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- User Dropdown -->
                        <div id="globalUserDropdown" class="hidden absolute right-0 mt-2 w-52 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 z-50 text-sm animate-in fade-in zoom-in-95 duration-150">
                            <div class="px-4 py-2 text-xs text-slate-500 font-medium border-b border-slate-100 mb-1">
                                គណនីរបស់អ្នក
                            </div>
                            <a href="/dashboard" class="block px-4 py-2 hover:bg-slate-50 text-slate-700 font-medium flex items-center gap-2">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                ផ្ទាំងគ្រប់គ្រង (Dashboard)
                            </a>
                            <a href="/dashboard?tab=profile" class="block px-4 py-2 hover:bg-slate-50 text-slate-700 font-medium flex items-center gap-2">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                ព័ត៌មានផ្ទាល់ខ្លួន
                            </a>
                            <a href="/books" class="block px-4 py-2 hover:bg-slate-50 text-slate-600 flex items-center gap-2">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                សៀវភៅទាំងអស់
                            </a>
                            <hr class="my-1 border-slate-100">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-red-50 font-medium flex items-center gap-2 cursor-pointer">
                                    <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                    ចាកចេញ (Logout)
                                </button>
                            </form>
                        </div>
                    @else
                        <button onclick="toggleGlobalUserMenu(event)" id="globalUserBtn" class="flex items-center gap-1.5 p-1.5 sm:px-2 sm:py-1 rounded-full text-slate-700 hover:bg-slate-100 transition-colors cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <svg class="w-3 h-3 text-slate-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- Guest Dropdown -->
                        <div id="globalUserDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 z-50 text-sm animate-in fade-in zoom-in-95 duration-150">
                            <a href="/login" class="block px-4 py-2 hover:bg-slate-50 text-slate-700 font-medium">ចូលគណនី (Sign In)</a>
                            <a href="/register" class="block px-4 py-2 hover:bg-slate-50 text-slate-700 font-medium">ចុះឈ្មោះគណនីថ្មី</a>
                        </div>
                    @endauth
                </div>

                <!-- Language Switcher -->
                <div class="flex items-center text-xs font-semibold border border-slate-200 rounded-lg p-0.5 bg-slate-50">
                    <button class="px-2 py-1 rounded bg-white text-slate-900 shadow-2xs font-bold transition-all">
                        ភាសាខ្មែរ
                    </button>
                    <span class="text-slate-300">/</span>
                    <button class="px-2 py-1 rounded text-slate-500 hover:text-slate-900 transition-all">
                        ENG
                    </button>
                </div>

                <!-- Mobile Hamburger Button -->
                <button onclick="toggleGlobalMobileMenu(event)" class="lg:hidden p-2 text-slate-700 hover:bg-slate-100 rounded-lg cursor-pointer" aria-label="Toggle Navigation">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Container -->
    <div id="globalMobileMenu" class="hidden lg:hidden border-t border-slate-200 bg-white px-4 pt-3 pb-5 space-y-1.5 shadow-md">
        <a href="/" class="block px-3 py-2 rounded-lg {{ $isActive('/') ? 'text-slate-900 bg-slate-100 font-semibold' : 'text-slate-700 hover:bg-slate-50 font-medium' }}">
            ទំព័រដើម
        </a>
        <a href="/mathematics" class="block px-3 py-2 rounded-lg {{ $isActive('mathematics*') ? 'text-slate-900 bg-slate-100 font-semibold' : 'text-slate-700 hover:bg-slate-50 font-medium' }}">
            គណិតវិទ្យា
        </a>
        <a href="/books" class="block px-3 py-2 rounded-lg {{ $isActive('books*') ? 'text-slate-900 bg-slate-100 font-semibold' : 'text-slate-700 hover:bg-slate-50 font-medium' }}">
            សៀវភៅ
        </a>
        <a href="/articles" class="block px-3 py-2 rounded-lg {{ $isActive('articles*') ? 'text-slate-900 bg-slate-100 font-semibold' : 'text-slate-700 hover:bg-slate-50 font-medium' }}">
            អត្ថបទ
        </a>
        <a href="/teaching-materials" class="block px-3 py-2 rounded-lg {{ $isActive('teaching-materials*') ? 'text-slate-900 bg-slate-100 font-semibold' : 'text-slate-700 hover:bg-slate-50 font-medium' }}">
            សំភារៈបង្រៀន
        </a>
        <a href="/about" class="block px-3 py-2 rounded-lg {{ $isActive('about*') ? 'text-slate-900 bg-slate-100 font-semibold' : 'text-slate-700 hover:bg-slate-50 font-medium' }}">
            អំពីយើង
        </a>
        <a href="/classes" class="block px-3 py-2 rounded-lg {{ $isActive('classes*') ? 'text-slate-900 bg-slate-100 font-semibold' : 'text-slate-700 hover:bg-slate-50 font-medium' }}">
            ថ្នាក់បង្រៀន
        </a>
    </div>
</header>

<script>
    function toggleGlobalMobileMenu(e) {
        if (e) e.stopPropagation();
        const menu = document.getElementById('globalMobileMenu');
        if (menu) menu.classList.toggle('hidden');
    }

    function toggleGlobalUserMenu(e) {
        if (e) e.stopPropagation();
        const dropdown = document.getElementById('globalUserDropdown');
        if (dropdown) dropdown.classList.toggle('hidden');
    }

    // Close user dropdown when clicking outside
    document.addEventListener('click', function(e) {
        const btn = document.getElementById('globalUserBtn');
        const dropdown = document.getElementById('globalUserDropdown');
        if (btn && dropdown && !btn.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.add('hidden');
        }
    });

    // Backward compatibility aliases
    window.toggleUserMenu = toggleGlobalUserMenu;
    window.toggleMobileMenu = toggleGlobalMobileMenu;
</script>
