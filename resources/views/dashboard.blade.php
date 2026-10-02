<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ផ្ទាំងគ្រប់គ្រង - ANONTAK</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,300..700;1,300..700&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 antialiased font-sans flex flex-col min-h-screen">

    <!-- Top Navigation Bar -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200/80 transition-all shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 sm:h-18">
                
                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <a href="/" class="flex items-center gap-2 group">
                        <div class="w-9 h-9 rounded-lg bg-slate-900 flex items-center justify-center text-white shadow-sm group-hover:bg-sky-600 transition-colors">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 12c-2-2.5-4-4-6.5-4a4.5 4.5 0 0 0 0 9c2.5 0 4.5-1.5 6.5-5 2 3.5 4 5 6.5 5a4.5 4.5 0 0 0 0-9c-2.5 0-4.5 1.5-6.5 4z" />
                            </svg>
                        </div>
                        <span class="font-extrabold text-xl tracking-wider text-slate-900 group-hover:text-sky-600 transition-colors" style="font-family: 'Outfit', sans-serif;">
                            ANONTAK
                        </span>
                    </a>
                </div>

                <!-- Right Utility Icons & Controls -->
                <div class="flex items-center space-x-3 sm:space-x-4">
                    
                    <!-- User Account / Profile -->
                    <div class="relative">
                        <button onclick="toggleUserMenu()" id="userBtn" class="flex items-center gap-2 p-1.5 sm:px-3 sm:py-1.5 rounded-full text-slate-700 hover:bg-slate-100 transition-colors bg-white shadow-sm border border-slate-200">
                            <div class="w-7 h-7 rounded-full bg-sky-100 text-sky-700 flex items-center justify-center font-bold text-sm">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <span class="text-sm font-medium hidden sm:block">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-slate-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- Dropdown -->
                        <div id="userDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-slate-100 py-2 z-50 text-sm">
                            <div class="px-4 py-2 text-xs text-slate-500 font-medium border-b border-slate-100 mb-1">
                                គណនីរបស់អ្នក
                            </div>
                            <a href="/dashboard" class="block px-4 py-2 hover:bg-slate-50 text-slate-700 font-medium">ផ្ទាំងគ្រប់គ្រង (Dashboard)</a>
                            <a href="/books" class="block px-4 py-2 hover:bg-slate-50 text-slate-600">សៀវភៅទាំងអស់</a>
                            <hr class="my-1 border-slate-100">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full text-left px-4 py-2 text-red-600 hover:bg-red-50 font-medium">ចាកចេញ (Logout)</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>

    <!-- Dashboard Content -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full">
        
        <h1 class="text-3xl font-bold text-slate-900 mb-8" style="font-family: 'Kantumruy Pro', sans-serif;">
            ជំរាបសួរ, {{ Auth::user()->name }} 👋
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 flex flex-col items-center justify-center text-center">
                <div class="w-16 h-16 rounded-full bg-sky-50 text-sky-600 flex items-center justify-center mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h2 class="text-xl font-bold text-slate-800 mb-2">សៀវភៅរបស់អ្នក</h2>
                <p class="text-slate-500 mb-4 text-sm">មើលសៀវភៅដែលអ្នកបានទិញ ឬកំពុងអាន។</p>
                <a href="/books" class="px-5 py-2 bg-slate-900 text-white rounded-full text-sm font-semibold hover:bg-sky-600 transition-colors">ទៅកាន់បណ្ណាល័យ</a>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 flex flex-col items-center justify-center text-center">
                <div class="w-16 h-16 rounded-full bg-rose-50 text-rose-600 flex items-center justify-center mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h2 class="text-xl font-bold text-slate-800 mb-2">ប្រវត្តិសិក្សា</h2>
                <p class="text-slate-500 mb-4 text-sm">តាមដានវឌ្ឍនភាពនៃការអាន និងវគ្គសិក្សារបស់អ្នក។</p>
                <button class="px-5 py-2 bg-slate-100 text-slate-400 rounded-full text-sm font-semibold cursor-not-allowed">ឆាប់ៗនេះ</button>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 flex flex-col items-center justify-center text-center">
                <div class="w-16 h-16 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center mb-4">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <h2 class="text-xl font-bold text-slate-800 mb-2">ការកំណត់គណនី</h2>
                <p class="text-slate-500 mb-4 text-sm">កែប្រែព័ត៌មានផ្ទាល់ខ្លួន និងសុវត្ថិភាព។</p>
                <button class="px-5 py-2 bg-slate-100 text-slate-400 rounded-full text-sm font-semibold cursor-not-allowed">ឆាប់ៗនេះ</button>
            </div>

        </div>
    </main>

    <script>
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
