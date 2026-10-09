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
<body class="bg-white text-slate-900 antialiased font-sans min-h-screen flex flex-col selection:bg-slate-900 selection:text-white">

    <div class="flex-grow flex items-center justify-center">

    <div class="w-full max-w-md px-6 py-12">
        
        <!-- Brand Logo -->
        <div class="flex justify-center mb-10">
            <a href="/" class="flex items-center group">
                <img src="{{ asset('images/anontak-logo-transparent.png') }}" alt="ANONTAK" class="h-16 w-auto object-contain transition-transform group-hover:scale-105">
                <span class="sr-only">ANONTAK</span>
            </a>
        </div>

        <div class="text-center mb-10">
            <h1 class="text-2xl font-bold text-slate-900 mb-2" style="font-family: 'Kantumruy Pro', sans-serif;">កំណត់ពាក្យសម្ងាត់ថ្មី</h1>
            <p class="text-slate-500 text-sm">សូមបញ្ចូលអ៊ីមែលរបស់អ្នកដើម្បីទទួលបានតំណភ្ជាប់</p>
        </div>

        @if (session('status'))
            <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm font-medium">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf
            <!-- Email Input -->
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-slate-700">អ៊ីមែល (Email)</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-slate-900 focus:ring-1 focus:ring-slate-900 transition-colors text-sm" placeholder="name@example.com">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
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
    </div>
    @include('partials.footer')
</body>
</html>
