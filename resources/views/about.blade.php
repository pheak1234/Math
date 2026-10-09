<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>អំពីយើង (About Us) - ANONTAK Math</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,300..700;1,300..700&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="text-slate-800 antialiased font-sans flex flex-col min-h-screen bg-slate-50/50">

    @include('partials.header')

    <!-- HERO SECTION (Elegant & Inspiring) -->
    <section class="relative py-16 sm:py-24 overflow-hidden bg-slate-900 text-white"
             style="background-image: radial-gradient(circle at 10% 20%, rgba(14, 165, 233, 0.15) 0%, transparent 40%), radial-gradient(circle at 90% 80%, rgba(99, 102, 241, 0.15) 0%, transparent 40%);">
        
        <!-- Subtle Grid Pattern -->
        <div class="absolute inset-0 opacity-10" style="background-image: linear-gradient(#38bdf8 1px, transparent 1px), linear-gradient(90deg, #38bdf8 1px, transparent 1px); background-size: 32px 32px;"></div>
        
        <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-sky-500/10 border border-sky-400/30 text-sky-300 text-xs font-semibold mb-6">
                <span class="w-2 h-2 rounded-full bg-sky-400 animate-pulse"></span>
                ស្គាល់ពីយើង ANONTAK Math
            </div>

            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-white mb-6 leading-tight" style="font-family: 'Kantumruy Pro', sans-serif;">
                បេសកកម្មអប់រំ និងចែករំលែក <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 via-teal-300 to-indigo-300">
                    ចំណេះដឹងគណិតវិទ្យា
                </span> សម្រាប់កម្ពុជា
            </h1>

            <p class="text-slate-300 text-sm sm:text-base md:text-lg max-w-3xl mx-auto leading-relaxed mb-10">
                ANONTAK គឺជាវេទិកាឌីជីថលដែលបង្កើតឡើងដោយក្រុមអ្នកស្រឡាញ់ការអប់រំ និងសាស្ត្រាចារ្យគណិតវិទ្យា ក្នុងគោលបំណងកសាងធនធានសិក្សាឥតគិតថ្លៃ ងាយស្រួលយល់ និងស្របតាមស្តង់ដារអន្តរជាតិសម្រាប់សិស្សានុសិស្សគ្រប់កម្រិត។
            </p>

            <!-- Quick Action Links -->
            <div class="flex flex-wrap justify-center gap-4">
                <a href="#mission" class="px-6 py-3 bg-sky-500 hover:bg-sky-400 text-white font-semibold text-sm rounded-xl transition-all shadow-lg shadow-sky-500/25">
                    បេសកកម្ម និងចក្ខុវិស័យ
                </a>
                <a href="#team" class="px-6 py-3 bg-white/10 hover:bg-white/15 text-white font-semibold text-sm rounded-xl transition-all border border-white/15">
                    គ្រូបង្រៀន និងក្រុមការងារ
                </a>
                <a href="#contact" class="px-6 py-3 bg-white/10 hover:bg-white/15 text-white font-semibold text-sm rounded-xl transition-all border border-white/15">
                    ទំនាក់ទំនងយើង
                </a>
            </div>

        </div>
    </section>

    <!-- PLATFORM STATS STRIP -->
    <section class="border-y border-slate-200 bg-white py-8 sm:py-10 shadow-2xs">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                
                <div class="p-4 rounded-2xl bg-slate-50/60 border border-slate-100">
                    <div class="text-2xl sm:text-3xl font-extrabold text-sky-600 mb-1" style="font-family: 'Outfit', sans-serif;">
                        {{ $stats['books_count'] > 0 ? $stats['books_count'].'+' : '15+' }}
                    </div>
                    <div class="text-xs sm:text-sm font-semibold text-slate-700">សៀវភៅពុម្ព & ឯកសារ</div>
                    <div class="text-[11px] text-slate-400 mt-0.5">E-Books & Worksheets</div>
                </div>

                <div class="p-4 rounded-2xl bg-slate-50/60 border border-slate-100">
                    <div class="text-2xl sm:text-3xl font-extrabold text-teal-600 mb-1" style="font-family: 'Outfit', sans-serif;">
                        {{ $stats['articles_count'] > 0 ? $stats['articles_count'].'+' : '12+' }}
                    </div>
                    <div class="text-xs sm:text-sm font-semibold text-slate-700">អត្ថបទគណិតវិទ្យា</div>
                    <div class="text-[11px] text-slate-400 mt-0.5">Research & Insights</div>
                </div>

                <div class="p-4 rounded-2xl bg-slate-50/60 border border-slate-100">
                    <div class="text-2xl sm:text-3xl font-extrabold text-indigo-600 mb-1" style="font-family: 'Outfit', sans-serif;">
                        {{ $stats['materials_count'] > 0 ? $stats['materials_count'].'+' : '10+' }}
                    </div>
                    <div class="text-xs sm:text-sm font-semibold text-slate-700">សម្ភារៈឧបទេសបង្រៀន</div>
                    <div class="text-[11px] text-slate-400 mt-0.5">Hands-on Tools</div>
                </div>

                <div class="p-4 rounded-2xl bg-slate-50/60 border border-slate-100">
                    <div class="text-2xl sm:text-3xl font-extrabold text-rose-600 mb-1" style="font-family: 'Outfit', sans-serif;">
                        {{ $stats['classrooms_count'] > 0 ? $stats['classrooms_count'].'+' : '14+' }}
                    </div>
                    <div class="text-xs sm:text-sm font-semibold text-slate-700">ថ្នាក់បង្រៀនសកម្ម</div>
                    <div class="text-[11px] text-slate-400 mt-0.5">Active Classrooms</div>
                </div>

            </div>
        </div>
    </section>

    <!-- CORE MISSION, VISION & VALUES -->
    <section id="mission" class="py-16 sm:py-24 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-14">
            <span class="text-sky-600 text-xs font-bold uppercase tracking-wider">គោលការណ៍គ្រឹះ</span>
            <h2 class="text-2xl sm:text-4xl font-extrabold text-slate-900 mt-2 mb-4" style="font-family: 'Kantumruy Pro', sans-serif;">
                ចក្ខុវិស័យ បេសកកម្ម និងគុណតម្លៃ
            </h2>
            <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                យើងប្តេជ្ញាបង្កើតបរិយាកាសសិក្សាគណិតវិទ្យាដែលបំផុសគំនិត និងជំរុញសមត្ថភាពត្រិះរិះពិចារណារបស់យុវជនខ្មែរ។
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Vision -->
            <div class="bg-white rounded-3xl p-8 border border-slate-200/80 shadow-xs hover:shadow-md transition-shadow relative overflow-hidden group">
                <div class="w-12 h-12 rounded-2xl bg-sky-50 text-sky-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2.5">ចក្ខុវិស័យ (Vision)</h3>
                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                    ក្លាយជាមជ្ឈមណ្ឌលធនធានគណិតវិទ្យាឌីជីថលឈានមុខគេ និងទូលំទូលាយបំផុតនៅកម្ពុជា ដែលជួយឱ្យសិស្សគ្រប់កម្រិតលែងខ្លាចគណិតវិទ្យា ហើយប្រែក្លាយវាទៅជាចំណង់ចំណូលចិត្ត។
                </p>
            </div>

            <!-- Mission -->
            <div class="bg-white rounded-3xl p-8 border border-slate-200/80 shadow-xs hover:shadow-md transition-shadow relative overflow-hidden group">
                <div class="w-12 h-12 rounded-2xl bg-teal-50 text-teal-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2.5">បេសកកម្ម (Mission)</h3>
                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                    ផ្ដល់លទ្ធភាពឱ្យសិស្សានុសិស្ស និងគ្រូបង្រៀនទទួលបានឯកសារ សៀវភៅពុម្ព លំហាត់ដោះស្រាយគំរូ ព្រមទាំងឧបករណ៍ឧបទេសទំនើបៗប្រកបដោយគុណភាព និងភាពងាយស្រួល។
                </p>
            </div>

            <!-- Core Values -->
            <div class="bg-white rounded-3xl p-8 border border-slate-200/80 shadow-xs hover:shadow-md transition-shadow relative overflow-hidden group">
                <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2.5">គុណតម្លៃស្នូល (Core Values)</h3>
                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                    ភាពសុក្រឹតខាងវិទ្យាសាស្ត្រ (Accuracy), ការបង្រៀនប្រកបដោយភាពច្នៃប្រឌិត (Innovation), ភាពស្មោះត្រង់ (Integrity), និងស្មារតីចែករំលែកដល់សហគមន៍ (Community Sharing)។
                </p>
            </div>

        </div>

    </section>

    <!-- WHAT WE OFFER (Ecosystem of Learning) -->
    <section class="py-16 sm:py-20 bg-slate-100/60 border-y border-slate-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="text-sky-600 text-xs font-bold uppercase tracking-wider">ប្រព័ន្ធអេកូឡូស៊ីសិក្សា</span>
                <h2 class="text-2xl sm:text-4xl font-extrabold text-slate-900 mt-2 mb-3" style="font-family: 'Kantumruy Pro', sans-serif;">
                    អ្វីដែល ANONTAK ផ្ដល់ជូន
                </h2>
                <p class="text-slate-600 text-xs sm:text-sm">
                    គ្រប់ជ្រុងជ្រោយនៃធនធានគណិតវិទ្យា ត្រូវបានរៀបចំឡើងជាប្រព័ន្ធដើម្បីជួយដល់ការសិក្សា។
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <a href="/mathematics" class="bg-white p-6 rounded-2xl border border-slate-200/80 hover:border-sky-500 shadow-2xs hover:shadow-md transition-all group block">
                    <div class="w-10 h-10 rounded-xl bg-sky-50 text-sky-600 flex items-center justify-center mb-4 group-hover:bg-sky-500 group-hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="font-bold text-slate-900 group-hover:text-sky-600 transition-colors mb-1.5 text-sm">គណិតវិទ្យា & លំហាត់</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        មេរៀនតាមកម្រិតថ្នាក់ លំហាត់អនុវត្តន៍ និងវិធីសាស្ត្រគន្លឹះដោះស្រាយលំហាត់ពិបាកៗ។
                    </p>
                </a>

                <a href="/books" class="bg-white p-6 rounded-2xl border border-slate-200/80 hover:border-teal-500 shadow-2xs hover:shadow-md transition-all group block">
                    <div class="w-10 h-10 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center mb-4 group-hover:bg-teal-500 group-hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <h3 class="font-bold text-slate-900 group-hover:text-teal-600 transition-colors mb-1.5 text-sm">បណ្ណាល័យសៀវភៅ</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        បណ្តុំសៀវភៅពុម្ព សៀវភៅលំហាត់ និងកម្រងវិញ្ញាសាថ្នាក់ជាតិ និងអូឡាំព្យាដ។
                    </p>
                </a>

                <a href="/teaching-materials" class="bg-white p-6 rounded-2xl border border-slate-200/80 hover:border-indigo-500 shadow-2xs hover:shadow-md transition-all group block">
                    <div class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center mb-4 group-hover:bg-indigo-500 group-hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                    </div>
                    <h3 class="font-bold text-slate-900 group-hover:text-indigo-600 transition-colors mb-1.5 text-sm">សម្ភារៈឧបទេស</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        ឧបករណ៍វាស់ស្ទង់ កំប៉ាស បន្ទាត់ធរណីមាត្រ និងគំរូរូបបីវិមាត្រសម្រាប់បង្រៀន។
                    </p>
                </a>

                <a href="/classes" class="bg-white p-6 rounded-2xl border border-slate-200/80 hover:border-rose-500 shadow-2xs hover:shadow-md transition-all group block">
                    <div class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center mb-4 group-hover:bg-rose-500 group-hover:text-white transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    </div>
                    <h3 class="font-bold text-slate-900 group-hover:text-rose-600 transition-colors mb-1.5 text-sm">ថ្នាក់បង្រៀនជាក់ស្តែង</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        ថ្នាក់បង្រៀនផ្ទាល់ និងអនឡាញជាមួយសាស្ត្រាចារ្យ និងគ្រូជំនាញគណិតវិទ្យា។
                    </p>
                </a>

            </div>

        </div>
    </section>

    <!-- EDUCATORS & TEAM SECTION -->
    <section id="team" class="py-16 sm:py-24 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-12">
            <div>
                <span class="text-sky-600 text-xs font-bold uppercase tracking-wider">សាស្ត្រាចារ្យ និងគ្រូបង្រៀន</span>
                <h2 class="text-2xl sm:text-4xl font-extrabold text-slate-900 mt-2" style="font-family: 'Kantumruy Pro', sans-serif;">
                    ក្រុមការងារបង្រៀនរបស់យើង
                </h2>
            </div>
            <a href="/classes" class="inline-flex items-center gap-1.5 text-xs font-bold text-sky-600 hover:text-sky-700">
                មើលថ្នាក់បង្រៀនទាំងអស់ &rarr;
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($teachers as $teacher)
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-xs flex flex-col sm:flex-row items-center sm:items-start gap-6 hover:shadow-md transition-shadow">
                    
                    <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-full overflow-hidden shrink-0 border-2 border-slate-200 shadow-sm bg-slate-100">
                        <img src="{{ $teacher->avatar ?? '/images/teacher_vasna.png' }}" 
                             alt="{{ $teacher->name }}" 
                             class="w-full h-full object-cover">
                    </div>

                    <div class="flex-1 text-center sm:text-left">
                        <div class="flex flex-wrap items-center justify-center sm:justify-start gap-2 mb-1">
                            <h3 class="text-xl font-bold text-slate-900" style="font-family: 'Kantumruy Pro', sans-serif;">
                                {{ $teacher->name }}
                            </h3>
                            <span class="px-2 py-0.5 rounded-full bg-sky-50 text-sky-700 text-[11px] font-semibold border border-sky-200">
                                {{ $teacher->subject ?? 'គណិតវិទ្យា' }}
                            </span>
                        </div>

                        <p class="text-xs text-slate-600 leading-relaxed mb-4">
                            {{ $teacher->bio ?? 'សាស្ត្រាចារ្យគណិតវិទ្យាដែលមានបទពិសោធន៍បង្រៀន និងដឹកនាំសិស្សានុសិស្សឆ្នើម។' }}
                        </p>

                        <div class="text-xs text-slate-500 space-y-1 mb-4">
                            @if($teacher->education)
                                <div><span class="font-semibold text-slate-700">កម្រិតវប្បធម៌៖</span> {{ $teacher->education }}</div>
                            @endif
                            @if($teacher->telegram)
                                <div><span class="font-semibold text-slate-700">តេឡេក្រាម៖</span> <span class="text-sky-600 font-mono">{{ $teacher->telegram }}</span></div>
                            @endif
                        </div>

                        <div class="flex flex-wrap gap-2 justify-center sm:justify-start">
                            <a href="/classes" class="px-3.5 py-1.5 rounded-lg bg-slate-900 hover:bg-slate-800 text-white text-xs font-semibold transition-colors">
                                មើលថ្នាក់បង្រៀន ({{ $teacher->classrooms->count() }})
                            </a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </section>

    <!-- CONTACT & LOCATION SECTION -->
    <section id="contact" class="py-16 sm:py-24 bg-white border-t border-slate-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                
                <!-- Contact Info Left (5 cols) -->
                <div class="lg:col-span-5 space-y-8">
                    <div>
                        <span class="text-sky-600 text-xs font-bold uppercase tracking-wider">ទំនាក់ទំនង</span>
                        <h2 class="text-2xl sm:text-4xl font-extrabold text-slate-900 mt-2 mb-4" style="font-family: 'Kantumruy Pro', sans-serif;">
                            មានសំណួរ ឬចង់សហការ?
                        </h2>
                        <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                            សូមទាក់ទងមកកាន់យើងសម្រាប់ព័ត៌មានបន្ថែមអំពីការចុះឈ្មោះរៀន សៀវភៅ ឬការចូលរួមចំណែកក្នុងសហគមន៍អប់រំគណិតវិទ្យា។
                        </p>
                    </div>

                    <div class="space-y-4 text-xs sm:text-sm">
                        
                        <div class="flex items-start gap-3.5 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                            <div class="w-9 h-9 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-800">ទីតាំងការិយាល័យ</h4>
                                <p class="text-slate-500 mt-0.5">រាជធានីភ្នំពេញ ព្រះរាជាណាចក្រកម្ពុជា</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3.5 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                            <div class="w-9 h-9 rounded-xl bg-teal-100 text-teal-600 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-800">អ៊ីមែលទំនាក់ទំនង</h4>
                                <p class="text-sky-600 font-medium mt-0.5">contact@anontak.edu.kh</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3.5 p-4 rounded-2xl bg-slate-50 border border-slate-100">
                            <div class="w-9 h-9 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-800">លេខទូរស័ព្ទ & តេឡេក្រាម</h4>
                                <p class="text-slate-500 mt-0.5">+855 12 345 678 / @anontak_support</p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Contact Form Right (7 cols) -->
                <div class="lg:col-span-7 bg-slate-50 rounded-3xl p-6 sm:p-10 border border-slate-200">
                    <h3 class="text-lg font-bold text-slate-900 mb-6">ផ្ញើសារមកកាន់ពួកយើង</h3>
                    
                    <form onsubmit="handleContactSubmit(event)" class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1.5">ឈ្មោះរបស់អ្នក *</label>
                                <input type="text" id="contactName" required placeholder="ឧ. សុខ ចិន្តា" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white text-xs focus:ring-2 focus:ring-sky-500 focus:outline-hidden">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1.5">អ៊ីមែល ឬលេខទូរស័ព្ទ *</label>
                                <input type="text" id="contactInfo" required placeholder="ឧ. 012 345 678 ឬ email@example.com" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white text-xs focus:ring-2 focus:ring-sky-500 focus:outline-hidden">
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">ប្រធានបទ</label>
                            <input type="text" id="contactSubject" placeholder="ឧ. ចង់សាកសួរអំពីថ្នាក់បង្រៀនគណិតវិទ្យា" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white text-xs focus:ring-2 focus:ring-sky-500 focus:outline-hidden">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">ខ្លឹមសារសារ *</label>
                            <textarea id="contactMessage" required rows="4" placeholder="សូមសរសេរសំណួរ ឬព័ត៌មានលម្អិតនៅទីនេះ..." class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 bg-white text-xs focus:ring-2 focus:ring-sky-500 focus:outline-hidden"></textarea>
                        </div>

                        <button type="submit" class="w-full py-3 bg-sky-600 hover:bg-sky-500 text-white font-semibold text-xs rounded-xl transition-colors shadow-sm cursor-pointer">
                            ផ្ញើសារឥឡូវនេះ
                        </button>
                    </form>

                    <div id="contactSuccessMsg" class="hidden mt-4 p-3 bg-emerald-50 border border-emerald-200 text-emerald-700 text-xs rounded-xl flex items-center gap-2">
                        <svg class="w-4 h-4 shrink-0 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        សាររបស់អ្នកត្រូវបានបញ្ជូនជោគជ័យ! ក្រុមការងារយើងខ្ញុំនឹងឆ្លើយតបវិញក្នុងពេលឆាប់ៗ។
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- FOOTER (ANONTAK Standard Clean Footer) -->
    @include('partials.footer')

    <!-- INTERACTIVE JAVASCRIPT LOGIC -->
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            if (menu) menu.classList.toggle('hidden');
        }

        function toggleUserMenu() {
            const dropdown = document.getElementById('userDropdown');
            if (dropdown) dropdown.classList.toggle('hidden');
        }

        window.addEventListener('click', function(e) {
            const userBtn = document.getElementById('userBtn');
            const userDropdown = document.getElementById('userDropdown');
            if (userBtn && userDropdown && !userBtn.contains(e.target) && !userDropdown.contains(e.target)) {
                userDropdown.classList.add('hidden');
            }
        });

        function handleContactSubmit(e) {
            e.preventDefault();
            const msg = document.getElementById('contactSuccessMsg');
            if (msg) {
                msg.classList.remove('hidden');
                e.target.reset();
                setTimeout(() => {
                    msg.classList.add('hidden');
                }, 6000);
            }
        }
    </script>
</body>
</html>
