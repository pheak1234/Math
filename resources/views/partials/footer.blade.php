<footer class="bg-slate-900 border-t border-slate-800 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 sm:py-0 sm:h-16 flex flex-col sm:flex-row items-center justify-between gap-3">
        
        <!-- Left: Logo & Copyright -->
        <div class="flex items-center gap-3 sm:gap-4">
            <a href="/" class="group">
                <img src="{{ asset('images/anontak-logo-white.png') }}" alt="ANONTAK" class="h-6 sm:h-7 w-auto object-contain transition-transform group-hover:scale-105">
            </a>
            <span class="text-white/50 font-light hidden sm:block">|</span>
            <p class="text-[11px] sm:text-xs text-white">&copy; {{ date('Y') }} ANONTAK. រក្សាសិទ្ធិគ្រប់យ៉ាង។</p>
        </div>
        
        <!-- Right: Minimal Links & Slogan -->
        <nav class="flex items-center gap-4 sm:gap-6 text-[11px] sm:text-xs font-medium">
            <a href="/about" class="text-white hover:text-slate-300 transition-colors">អំពីយើង</a>
            <a href="/books" class="text-white hover:text-slate-300 transition-colors">សៀវភៅ</a>
            <a href="/teaching-materials" class="text-white hover:text-slate-300 transition-colors">សំភារៈបង្រៀន</a>
            <span class="w-1 h-1 rounded-full bg-white/50 hidden sm:block"></span>
            <span class="text-[9px] sm:text-[10px] uppercase tracking-[0.2em] font-bold text-white">Infinity Wisdom</span>
        </nav>
        
    </div>
</footer>
