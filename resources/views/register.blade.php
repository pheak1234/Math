<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ចុះឈ្មោះ - ANONTAK</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,300..700;1,300..700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-slate-900 antialiased font-sans min-h-screen flex items-center justify-center selection:bg-slate-900 selection:text-white">

    <div class="w-full max-w-md px-6 py-12">
        
        <!-- Minimal Logo -->
        <div class="flex justify-center mb-10">
            <a href="/" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-xl bg-slate-900 flex items-center justify-center text-white transition-transform group-hover:scale-105">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 12c-2-2.5-4-4-6.5-4a4.5 4.5 0 0 0 0 9c2.5 0 4.5-1.5 6.5-5 2 3.5 4 5 6.5 5a4.5 4.5 0 0 0 0-9c-2.5 0-4.5 1.5-6.5 4z" />
                    </svg>
                </div>
                <span class="font-extrabold text-2xl tracking-widest text-slate-900" style="font-family: 'Inter', sans-serif;">ANONTAK</span>
            </a>
        </div>

        <div class="text-center mb-10">
            <h1 class="text-2xl font-bold text-slate-900 mb-2" style="font-family: 'Kantumruy Pro', sans-serif;">បង្កើតគណនីថ្មី</h1>
            <p class="text-slate-500 text-sm">សូមបំពេញព័ត៌មានខាងក្រោមដើម្បីចុះឈ្មោះ</p>
        </div>

        @if(session('error'))
            <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-600 rounded-xl text-sm font-medium text-center">
                {{ session('error') }}
            </div>
        @endif

        <form onsubmit="return false;" class="space-y-5">
            
            <!-- Name Input -->
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-slate-700">ឈ្មោះពេញ (Full Name)</label>
                <input type="text" required class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-slate-900 focus:ring-1 focus:ring-slate-900 transition-colors text-sm" placeholder="ឧ. សុវណ្ណ តារា">
            </div>

            <!-- Email Input -->
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-slate-700">អ៊ីមែល (Email)</label>
                <input type="email" required class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-slate-900 focus:ring-1 focus:ring-slate-900 transition-colors text-sm" placeholder="name@example.com">
            </div>

            <!-- Password Input -->
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-slate-700">ពាក្យសម្ងាត់ (Password)</label>
                <input type="password" required class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-slate-900 focus:ring-1 focus:ring-slate-900 transition-colors text-sm" placeholder="••••••••">
            </div>

            <!-- Terms -->
            <div class="flex items-start mt-2">
                <div class="flex items-center h-5">
                    <input id="terms" name="terms" type="checkbox" required class="h-4 w-4 rounded border-slate-300 text-slate-900 focus:ring-slate-900 focus:ring-offset-0 cursor-pointer accent-slate-900">
                </div>
                <label for="terms" class="ml-2 block text-sm text-slate-500 cursor-pointer">
                    ខ្ញុំយល់ព្រមតាម <a href="#" class="font-medium text-slate-900 hover:underline">លក្ខខណ្ឌប្រើប្រាស់</a> និង <a href="#" class="font-medium text-slate-900 hover:underline">គោលការណ៍ឯកជនភាព</a>
                </label>
            </div>

            <!-- Submit Button -->
            <div class="pt-2">
                <button type="submit" class="w-full flex justify-center py-3.5 px-4 rounded-xl text-sm font-bold text-white bg-slate-900 hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-900 transition-all cursor-pointer">
                    ចុះឈ្មោះ
                </button>
            </div>
        </form>

        <div class="mt-8 relative">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="w-full border-t border-slate-200"></div>
            </div>
            <div class="relative flex justify-center text-xs font-medium uppercase tracking-wider">
                <span class="px-4 bg-white text-slate-400">ឬចុះឈ្មោះតាមរយៈ</span>
            </div>
        </div>

        <!-- Social Login -->
        <div class="mt-6 grid grid-cols-2 gap-3">
            <a href="/auth/google/redirect" class="flex items-center justify-center gap-2 py-2.5 px-4 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-colors text-slate-700 text-sm font-semibold">
                <svg class="h-5 w-5" viewBox="0 0 24 24"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
                Google
            </a>
            <a href="/auth/facebook/redirect" class="flex items-center justify-center gap-2 py-2.5 px-4 bg-white border border-slate-200 rounded-xl hover:bg-slate-50 transition-colors text-slate-700 text-sm font-semibold">
                <svg class="h-5 w-5 text-[#1877F2]" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                Facebook
            </a>
        </div>

        <p class="mt-10 text-center text-sm text-slate-500">
            មានគណនីរួចហើយ? 
            <a href="/login" class="font-semibold text-slate-900 hover:underline underline-offset-4">ចូលគណនីទីនេះ</a>
        </p>

    </div>

</body>
</html>
