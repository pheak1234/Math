<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $material->name }} - សំភារៈបង្រៀន - ANONTAK</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,300..700;1,300..700&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 antialiased font-sans flex flex-col min-h-screen">

    @include('partials.header')

    <!-- CONTENT -->
    <main class="flex-grow max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12 w-full">
        <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200 shadow-sm">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div class="aspect-square bg-slate-50 rounded-2xl p-8 flex items-center justify-center border border-slate-100">
                    <img src="{{ $material->image ?? '/images/tool_ruler.svg' }}" alt="{{ $material->name }}" class="max-h-full max-w-full object-contain filter drop-shadow-md">
                </div>

                <div class="space-y-4">
                    <div class="flex items-center gap-2">
                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-sky-100 text-sky-700">
                            {{ $material->category }}
                        </span>
                        <span class="text-xs text-slate-500 font-medium">
                            {{ $material->grade_level }}
                        </span>
                    </div>

                    <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900">
                        {{ $material->name }}
                    </h1>

                    <p class="text-slate-600 text-sm leading-relaxed">
                        {{ $material->description }}
                    </p>

                    @if($material->specifications)
                        <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                            <h4 class="text-xs font-bold text-slate-800 uppercase tracking-wider mb-1">លក្ខណៈបច្ចេកទេស</h4>
                            <p class="text-xs text-slate-600 font-mono">{{ $material->specifications }}</p>
                        </div>
                    @endif

                    <div class="pt-4 flex flex-wrap gap-3">
                        <button onclick="alert('បានទាញយកមគ្គុទ្ទេសក៍ណែនាំបង្រៀនជាទម្រង់ PDF!');" class="px-6 py-2.5 bg-sky-600 hover:bg-sky-700 text-white rounded-xl text-xs font-bold transition-colors cursor-pointer shadow-md">
                            📥 ទាញយកឯកសារមគ្គុទ្ទេសក៍ (PDF)
                        </button>
                        <a href="{{ route('teaching-materials.index') }}" class="px-6 py-2.5 border border-slate-200 hover:bg-slate-50 text-slate-700 rounded-xl text-xs font-semibold transition-colors">
                            មើលសម្ភារៈផ្សេងទៀត
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('partials.footer')
</body>
</html>
