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
            <div class="flex items-center space-x-1.5 sm:space-x-2">
                <!-- Search Button -->
                <a href="/books" aria-label="Search" class="w-9 h-9 sm:w-10 sm:h-10 rounded-full flex items-center justify-center text-slate-600 hover:text-sky-600 hover:bg-sky-50 transition-all duration-200 cursor-pointer group" title="ស្វែងរក">
                    <svg class="w-5 h-5 transition-transform duration-200 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </a>

                <!-- Cart Button with Modern Live Badge -->
                <button type="button" onclick="window.openTMCartModal()" aria-label="Cart" class="relative w-9 h-9 sm:w-10 sm:h-10 rounded-full flex items-center justify-center text-slate-600 hover:text-amber-600 hover:bg-amber-50 transition-all duration-200 cursor-pointer group" title="កន្ត្រកសម្ភារៈ">
                    <svg class="w-5 h-5 transition-transform duration-200 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span id="headerCartBadge" style="display: none; position: absolute; top: -1px; right: -1px; min-width: 18px; height: 18px; padding: 0 4px; border-radius: 9999px; background: linear-gradient(135deg, #f59e0b, #ea580c); color: #ffffff; font-size: 10px; font-weight: 800; line-height: 18px; text-align: center; box-shadow: 0 0 0 2px #ffffff, 0 2px 4px rgba(234, 88, 12, 0.35); align-items: center; justify-content: center; z-index: 10; pointer-events: none;">
                        0
                    </span>
                </button>

                <!-- Notification Bell (Auth Only) -->
                @auth
                    @php
                        $headerUnreadCount = Auth::user()->unreadNotifications()->count();
                        $headerNotifications = Auth::user()->notifications()->take(7)->get();
                    @endphp
                    <div class="relative">
                        <button type="button" 
                                onclick="toggleGlobalNotificationMenu(event)" 
                                id="globalNotifBtn" 
                                aria-label="Notifications" 
                                class="relative w-9 h-9 sm:w-10 sm:h-10 rounded-full flex items-center justify-center text-slate-600 hover:text-sky-600 hover:bg-sky-50 transition-all duration-200 cursor-pointer group" 
                                title="ការជូនដំណឹង">
                            <svg class="w-5 h-5 transition-transform duration-200 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                            </svg>
                            <span id="headerNotifBadge" 
                                  style="{{ $headerUnreadCount > 0 ? 'display: flex;' : 'display: none;' }} position: absolute; top: -1px; right: -1px; min-width: 18px; height: 18px; padding: 0 4px; border-radius: 9999px; background: linear-gradient(135deg, #ef4444, #dc2626); color: #ffffff; font-size: 10px; font-weight: 800; line-height: 18px; text-align: center; box-shadow: 0 0 0 2px #ffffff, 0 2px 4px rgba(220, 38, 38, 0.35); align-items: center; justify-content: center; z-index: 10; pointer-events: none;">
                                {{ $headerUnreadCount > 99 ? '99+' : $headerUnreadCount }}
                            </span>
                        </button>

                        <!-- Notification Dropdown -->
                        <div id="globalNotifDropdown" class="hidden absolute right-0 mt-2 w-80 sm:w-96 bg-white rounded-2xl shadow-xl border border-slate-100 py-0 z-50 text-sm overflow-hidden animate-in fade-in zoom-in-95 duration-150">
                            <!-- Header -->
                            <div class="px-4 py-3 bg-slate-50/80 border-b border-slate-100 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-slate-800 text-sm">ការជូនដំណឹង</span>
                                    <span id="headerNotifPill" class="{{ $headerUnreadCount > 0 ? '' : 'hidden' }} px-2 py-0.5 rounded-full text-[11px] font-bold bg-rose-100 text-rose-700">
                                        <span id="headerNotifCountText">{{ $headerUnreadCount }}</span> ថ្មី
                                    </span>
                                </div>
                                <button type="button" 
                                        id="headerMarkAllBtn"
                                        onclick="markAllNotificationsAsRead(event)" 
                                        class="{{ $headerUnreadCount > 0 ? '' : 'hidden' }} text-xs text-sky-600 hover:text-sky-700 font-semibold cursor-pointer">
                                    អានទាំងអស់
                                </button>
                            </div>

                            <!-- List -->
                            <div class="max-h-80 overflow-y-auto divide-y divide-slate-100" id="headerNotifList">
                                @forelse($headerNotifications as $notif)
                                    @php
                                        $d = $notif->data;
                                        $isApproved = ($d['type'] ?? '') === 'approved' || ($d['status'] ?? '') === 'completed';
                                        $isUnread = is_null($notif->read_at);
                                        $actionUrl = $d['action_url'] ?? route('dashboard', ['tab' => 'orders']);
                                    @endphp
                                    <a href="{{ $actionUrl }}" 
                                       onclick="markNotificationAsRead('{{ $notif->id }}', event, '{{ $actionUrl }}')"
                                       id="notif-item-{{ $notif->id }}"
                                       class="p-3.5 flex items-start gap-3 hover:bg-slate-50 transition-colors block {{ $isUnread ? 'bg-sky-50/30' : '' }}">
                                        <!-- Icon -->
                                        <div class="w-8 h-8 rounded-xl flex items-center justify-center shrink-0 mt-0.5 {{ $isApproved ? 'bg-emerald-100 text-emerald-600' : 'bg-rose-100 text-rose-600' }}">
                                            @if($isApproved)
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                            @else
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                                            @endif
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <div class="flex items-center justify-between gap-1 mb-0.5">
                                                <h5 class="text-xs font-bold text-slate-900 truncate">
                                                    {{ $d['title'] ?? 'ការជូនដំណឹង' }}
                                                </h5>
                                                @if($isUnread)
                                                    <span class="w-2 h-2 rounded-full bg-sky-500 shrink-0 notif-unread-dot"></span>
                                                @endif
                                            </div>
                                            <p class="text-xs text-slate-600 line-clamp-2 leading-relaxed">
                                                {{ $d['body'] ?? '' }}
                                            </p>
                                            <span class="text-[10px] text-slate-400 mt-1 block font-mono">
                                                {{ $notif->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                    </a>
                                @empty
                                    <div class="p-8 text-center text-slate-400" id="headerNotifEmptyState">
                                        <div class="w-10 h-10 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mx-auto mb-2 text-lg">
                                            🔔
                                        </div>
                                        <p class="text-xs">មិនទាន់មានការជូនដំណឹងនៅឡើយទេ</p>
                                    </div>
                                @endforelse
                            </div>

                            <!-- Footer -->
                            <div class="p-2.5 bg-slate-50 border-t border-slate-100 text-center">
                                <a href="{{ route('dashboard', ['tab' => 'orders']) }}" class="text-xs font-semibold text-slate-700 hover:text-sky-600 transition-colors block py-1">
                                    មើលប្រវត្តិបញ្ជាទិញទាំងអស់ →
                                </a>
                            </div>
                        </div>
                    </div>
                @endauth

                <!-- User Account / Profile -->
                <div class="relative">
                    @auth
                        <button onclick="toggleGlobalUserMenu(event)" id="globalUserBtn" class="flex items-center gap-2 p-1 sm:pr-3 rounded-full text-slate-700 hover:bg-slate-100 transition-all bg-white shadow-xs border border-slate-200/80 cursor-pointer">
                            @if(Auth::user()->profile_photo_url)
                                <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="w-7 h-7 sm:w-8 sm:h-8 rounded-full object-cover">
                            @else
                                <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-sky-100 text-sky-700 flex items-center justify-center font-bold text-xs sm:text-sm">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                            @endif
                            <span class="text-xs sm:text-sm font-semibold hidden sm:block">{{ Auth::user()->name }}</span>
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
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
                            <a href="/dashboard?tab=exams" class="block px-4 py-2 hover:bg-slate-50 text-slate-700 font-medium flex items-center gap-2">
                                <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
                                ការប្រឡងរបស់ខ្ញុំ (My Exams)
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
                        <button onclick="toggleGlobalUserMenu(event)" id="globalUserBtn" class="w-9 h-9 sm:w-10 sm:h-10 rounded-full flex items-center justify-center text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-all duration-200 cursor-pointer group" title="គណនី">
                            <svg class="w-5 h-5 transition-transform duration-200 group-hover:scale-110" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
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
        const notifDropdown = document.getElementById('globalNotifDropdown');
        if (notifDropdown) notifDropdown.classList.add('hidden');
    }

    function toggleGlobalNotificationMenu(e) {
        if (e) e.stopPropagation();
        const notifDropdown = document.getElementById('globalNotifDropdown');
        if (notifDropdown) notifDropdown.classList.toggle('hidden');
        const userDropdown = document.getElementById('globalUserDropdown');
        if (userDropdown) userDropdown.classList.add('hidden');
    }

    function markNotificationAsRead(id, e, targetUrl) {
        if (e) e.preventDefault();

        // Optimistically update UI
        const item = document.getElementById('notif-item-' + id);
        if (item) {
            item.classList.remove('bg-sky-50/30');
            const dot = item.querySelector('.notif-unread-dot');
            if (dot) dot.remove();
        }

        fetch('/notifications/' + id + '/read', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        }).then(r => r.json()).then(data => {
            if (data && typeof data.unread_count !== 'undefined') {
                updateNotificationBadgeCount(data.unread_count);
            }
        }).catch(err => console.warn('Could not mark read:', err))
        .finally(() => {
            if (targetUrl) {
                window.location.href = targetUrl;
            }
        });
    }

    function markAllNotificationsAsRead(e) {
        if (e) e.stopPropagation();

        fetch('/notifications/mark-all-read', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        }).then(r => r.json()).then(data => {
            updateNotificationBadgeCount(0);
            document.querySelectorAll('#headerNotifList a').forEach(el => el.classList.remove('bg-sky-50/30'));
            document.querySelectorAll('.notif-unread-dot').forEach(el => el.remove());
            const markBtn = document.getElementById('headerMarkAllBtn');
            if (markBtn) markBtn.classList.add('hidden');
            const pill = document.getElementById('headerNotifPill');
            if (pill) pill.classList.add('hidden');
        }).catch(err => console.warn('Could not mark all read:', err));
    }

    function updateNotificationBadgeCount(count) {
        const badge = document.getElementById('headerNotifBadge');
        const pill = document.getElementById('headerNotifPill');
        const countText = document.getElementById('headerNotifCountText');
        const markBtn = document.getElementById('headerMarkAllBtn');

        if (count > 0) {
            if (badge) {
                badge.style.display = 'flex';
                badge.textContent = count > 99 ? '99+' : count;
            }
            if (pill) pill.classList.remove('hidden');
            if (countText) countText.textContent = count;
            if (markBtn) markBtn.classList.remove('hidden');
        } else {
            if (badge) badge.style.display = 'none';
            if (pill) pill.classList.add('hidden');
            if (markBtn) markBtn.classList.add('hidden');
        }
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        const btn = document.getElementById('globalUserBtn');
        const dropdown = document.getElementById('globalUserDropdown');
        if (btn && dropdown && !btn.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.add('hidden');
        }

        const notifBtn = document.getElementById('globalNotifBtn');
        const notifDropdown = document.getElementById('globalNotifDropdown');
        if (notifBtn && notifDropdown && !notifBtn.contains(e.target) && !notifDropdown.contains(e.target)) {
            notifDropdown.classList.add('hidden');
        }
    });

    // Backward compatibility aliases & global exposures
    window.toggleUserMenu = toggleGlobalUserMenu;
    window.toggleMobileMenu = toggleGlobalMobileMenu;
    window.toggleGlobalNotificationMenu = toggleGlobalNotificationMenu;
    window.markNotificationAsRead = markNotificationAsRead;
    window.markAllNotificationsAsRead = markAllNotificationsAsRead;
    window.updateNotificationBadgeCount = updateNotificationBadgeCount;
</script>
