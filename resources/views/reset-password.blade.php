<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>កំណត់ពាក្យសម្ងាត់ថ្មី - ANONTAK</title>
    
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
            <p class="text-slate-500 text-sm">សូមបញ្ចូលពាក្យសម្ងាត់ថ្មីរបស់អ្នក</p>
        </div>

        <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
            @csrf
            
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Input -->
            <div class="space-y-2">
                <label class="block text-sm font-semibold text-slate-700">អ៊ីមែល (Email)</label>
                <input type="email" name="email" value="{{ old('email', $request->email) }}" required readonly class="block w-full px-4 py-3 bg-slate-100 border border-slate-200 rounded-xl text-slate-500 cursor-not-allowed focus:outline-none transition-colors text-sm" placeholder="name@example.com">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-semibold text-slate-700">ពាក្យសម្ងាត់ថ្មី (New Password)</label>
                <input type="password" name="password" required autofocus class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-slate-900 focus:ring-1 focus:ring-slate-900 transition-colors text-sm">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-semibold text-slate-700">បញ្ជាក់ពាក្យសម្ងាត់ថ្មី (Confirm Password)</label>
                <input type="password" name="password_confirmation" required class="block w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder-slate-400 focus:bg-white focus:outline-none focus:border-slate-900 focus:ring-1 focus:ring-slate-900 transition-colors text-sm">
            </div>

            <!-- Submit Button -->
            <div class="pt-2">
                <button type="submit" class="w-full flex justify-center py-3.5 px-4 rounded-xl text-sm font-bold text-white bg-slate-900 hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-900 transition-all cursor-pointer">
                    កំណត់ពាក្យសម្ងាត់ថ្មី
                </button>
            </div>
        </form>

    </div>
    </div>
    @include('partials.footer')
</body>
</html>
