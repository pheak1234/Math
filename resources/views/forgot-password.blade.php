<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ភ្លេចពាក្យសម្ងាត់ - ANONTAK</title>
    
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
            <h1 class="text-2xl font-bold text-slate-900 mb-2" style="font-family: 'Kantumruy Pro', sans-serif;">កំណត់ពាក្យសម្ងាត់ថ្មី</h1>
            <p class="text-slate-500 text-sm">សូមបញ្ចូលអ៊ីមែលរបស់អ្នកដើម្បីទទួលបានតំណភ្ជាប់</p>
        </div>

        <form onsubmit="return false;" class="space-y-6">
            
            <!-- Email Input -->
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-slate-700">អ៊ីមែល (Email)</label>
                <input type="email" required class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-slate-900 focus:ring-1 focus:ring-slate-900 transition-colors text-sm" placeholder="name@example.com">
            </div>

            <!-- Submit Button -->
            <div class="pt-2">
                <button type="submit" class="w-full flex justify-center py-3.5 px-4 rounded-xl text-sm font-bold text-white bg-slate-900 hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-900 transition-all cursor-pointer">
                    ផ្ញើតំណភ្ជាប់ (Send Link)
                </button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm text-slate-500">
            នឹកឃើញពាក្យសម្ងាត់វិញ? 
            <a href="/login" class="font-semibold text-slate-900 hover:underline underline-offset-4">ត្រឡប់ទៅចូលគណនីវិញ</a>
        </p>

    </div>

</body>
</html>
