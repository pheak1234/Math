<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ផ្ទាំងគ្រប់គ្រង - ANONTAK</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,300..700;1,300..700&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js"></script>
    <style>
        .cropper-view-box,
        .cropper-face {
            border-radius: 50%;
        }
        .cropper-view-box {
            outline: 2px solid #0284c7;
            outline-color: rgba(2, 132, 199, 0.85);
        }
        .cropper-dashed {
            border-color: rgba(255, 255, 255, 0.4);
        }
        .cropper-container {
            width: 100% !important;
            height: 100% !important;
        }
        @media print {
            body * {
                visibility: hidden !important;
            }
            #orderInvoiceModal, #orderInvoiceModal * {
                visibility: visible !important;
            }
            #orderInvoiceModal {
                position: absolute !important;
                left: 0 !important;
                top: 0 !important;
                width: 100% !important;
                height: auto !important;
                background: white !important;
                padding: 0 !important;
                box-shadow: none !important;
                display: block !important;
            }
            #orderInvoiceModal button {
                display: none !important;
            }
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 antialiased font-sans flex flex-col min-h-screen">

    @include('partials.header')

    <!-- Dashboard Content -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full">
        
        @php
            $activeTab = (isset($errors) && $errors->any()) ? 'profile' : ($tab ?? 'books');
        @endphp

        <div class="flex flex-col md:flex-row gap-8">
            
            <!-- Sidebar -->
            <div class="w-full md:w-1/4">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden sticky top-24">
                    <div class="p-6 border-b border-slate-100 flex flex-col items-center text-center">
                        @if(Auth::user()->profile_photo_url)
                            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" class="w-16 h-16 rounded-full object-cover mb-3 shadow-sm border border-slate-200">
                        @else
                            <div class="w-16 h-16 rounded-full bg-sky-100 text-sky-700 flex items-center justify-center font-bold text-2xl mb-3 shadow-sm">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                        @endif
                        <h2 class="font-bold text-slate-900 text-lg">{{ Auth::user()->name }}</h2>
                        <p class="text-xs text-slate-500 mt-1">សមាជិក ANONTAK</p>
                    </div>
                    <nav class="p-3 space-y-1">
                        <a href="{{ route('dashboard', ['tab' => 'books']) }}" id="tab-btn-books" onclick="switchDashboardTab('books', event)" class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium {{ $activeTab === 'books' ? 'bg-sky-50 text-sky-700' : 'text-slate-600 hover:bg-slate-50' }} transition-colors cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            សៀវភៅរបស់ខ្ញុំ
                        </a>
                        <a href="{{ route('dashboard', ['tab' => 'exams']) }}" id="tab-btn-exams" onclick="switchDashboardTab('exams', event)" class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium {{ $activeTab === 'exams' ? 'bg-sky-50 text-sky-700' : 'text-slate-600 hover:bg-slate-50' }} transition-colors cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                            ការប្រឡងរបស់ខ្ញុំ
                        </a>
                        <a href="{{ route('dashboard', ['tab' => 'profile']) }}" id="tab-btn-profile" onclick="switchDashboardTab('profile', event)" class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium {{ $activeTab === 'profile' ? 'bg-sky-50 text-sky-700' : 'text-slate-600 hover:bg-slate-50' }} transition-colors cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            ព័ត៌មានផ្ទាល់ខ្លួន
                        </a>
                        <a href="{{ route('dashboard', ['tab' => 'orders']) }}" id="tab-btn-orders" onclick="switchDashboardTab('orders', event)" class="flex items-center justify-between px-4 py-3 rounded-xl font-medium {{ $activeTab === 'orders' ? 'bg-sky-50 text-sky-700' : 'text-slate-600 hover:bg-slate-50' }} transition-colors cursor-pointer">
                            <span class="flex items-center gap-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                <span>ប្រវត្តិការបញ្ជាទិញ</span>
                            </span>
                            @if(isset($allOrders) && $allOrders->count() > 0)
                                <span class="text-[11px] font-bold px-2 py-0.5 rounded-full {{ $allOrders->where('status', 'pending')->count() > 0 ? 'bg-amber-100 text-amber-700' : 'bg-slate-100 text-slate-600' }}">
                                    {{ $allOrders->count() }}
                                </span>
                            @endif
                        </a>
                        @if(isset($unreadCount) && $unreadCount > 0)
                            <div class="px-3.5 py-2 mt-2 bg-rose-50 rounded-xl border border-rose-100 flex items-center justify-between text-xs text-rose-700 font-medium">
                                <span class="flex items-center gap-1.5 font-bold">
                                    <span class="w-2 h-2 rounded-full bg-rose-500 animate-pulse"></span>
                                    <span>ដំណឹងថ្មី ({{ $unreadCount }})</span>
                                </span>
                                <button type="button" onclick="window.markAllNotificationsAsRead(event)" class="text-[11px] underline hover:text-rose-900 cursor-pointer">
                                    អានទាំងអស់
                                </button>
                            </div>
                        @endif
                    </nav>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="w-full md:w-3/4">
                
                @if(session('success'))
                    <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700 font-medium flex items-center gap-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        {{ session('success') }}
                    </div>
                @endif

                @if(isset($notifications) && $notifications->where('read_at', null)->count() > 0)
                    <!-- Active Notifications from Admin Approval or Rejection -->
                    <div class="mb-6 space-y-3" id="dashboardNotificationAlerts">
                        @foreach($notifications->where('read_at', null)->take(3) as $alertNotif)
                            @php
                                $nd = $alertNotif->data;
                                $isAlertApproved = ($nd['type'] ?? '') === 'approved' || ($nd['status'] ?? '') === 'completed';
                                $alertAction = $nd['action_url'] ?? route('dashboard', ['tab' => 'orders']);
                            @endphp
                            <div class="p-4 sm:p-5 rounded-2xl border shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-4 transition-all {{ $isAlertApproved ? 'bg-gradient-to-r from-emerald-50 via-teal-50 to-white border-emerald-200' : 'bg-gradient-to-r from-rose-50 via-amber-50 to-white border-rose-200' }}"
                                 id="notif-banner-{{ $alertNotif->id }}">
                                <div class="flex items-start gap-3.5">
                                    <div class="w-11 h-11 rounded-2xl flex items-center justify-center shrink-0 shadow-xs {{ $isAlertApproved ? 'bg-emerald-600 text-white' : 'bg-rose-600 text-white' }}">
                                        @if($isAlertApproved)
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                        @else
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/></svg>
                                        @endif
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="flex flex-wrap items-center gap-2">
                                            <h4 class="text-sm font-bold {{ $isAlertApproved ? 'text-emerald-950' : 'text-rose-950' }}">
                                                {{ $nd['title'] ?? 'ការជូនដំណឹងពី Admin' }}
                                            </h4>
                                            <span class="text-[10px] font-mono px-2 py-0.5 rounded-full {{ $isAlertApproved ? 'bg-emerald-100 text-emerald-800' : 'bg-rose-100 text-rose-800' }}">
                                                {{ $alertNotif->created_at->diffForHumans() }}
                                            </span>
                                        </div>
                                        <p class="text-xs text-slate-700 mt-1 leading-relaxed">
                                            {{ $nd['body'] ?? '' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 shrink-0 self-end sm:self-center">
                                    <a href="{{ $alertAction }}" 
                                       onclick="dismissNotificationBanner('{{ $alertNotif->id }}', '{{ $alertAction }}')"
                                       class="px-4 py-2 rounded-xl text-xs font-bold transition-all shadow-xs {{ $isAlertApproved ? 'bg-emerald-600 hover:bg-emerald-500 text-white' : 'bg-slate-900 hover:bg-slate-800 text-white' }}">
                                        {{ $isAlertApproved && ($nd['book_id'] ?? null) ? '📖 ចូលអានឥឡូវនេះ' : 'មើលបញ្ជាទិញ' }}
                                    </a>
                                    <button type="button" 
                                            onclick="dismissNotificationBanner('{{ $alertNotif->id }}')" 
                                            class="p-2 text-slate-400 hover:text-slate-600 rounded-lg hover:bg-slate-100 transition-colors cursor-pointer" 
                                            title="បិទ (Dismiss)">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- TAB 1: BOOKS -->
                <div id="tab-content-books" class="dashboard-tab-pane {{ $activeTab === 'books' ? '' : 'hidden' }}">
                    @if(isset($pendingOrders) && $pendingOrders->count() > 0)
                        <!-- Pending Orders Waiting for Admin Review -->
                        <div class="mb-8 p-5 sm:p-6 bg-gradient-to-r from-amber-50 to-orange-50/60 rounded-3xl border border-amber-200 shadow-xs">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-2xl bg-amber-500 text-white flex items-center justify-center font-bold text-lg shadow-xs shrink-0">
                                        ⏳
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-slate-900 text-base">ការបញ្ជាទិញរង់ចាំការពិនិត្យ ({{ $pendingOrders->count() }})</h3>
                                        <p class="text-xs text-amber-800 mt-0.5">Admin កំពុងពិនិត្យ និងយល់ព្រមលើការទូទាត់។ សៀវភៅនឹងបើកជូនស្វ័យប្រវត្តិតាមក្រោយ។</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="mb-6 flex justify-between items-end">
                        <div>
                            <h2 class="text-2xl font-bold text-slate-900">សៀវភៅរបស់ខ្ញុំ</h2>
                            <p class="text-slate-500 text-sm mt-1">តាមដានសៀវភៅដែលអ្នកកំពុងអានបន្ត។</p>
                        </div>
                        <a href="/books" class="text-sky-600 hover:text-sky-700 text-sm font-semibold">រុករកសៀវភៅ &rarr;</a>
                    </div>

                    @if($books->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($books as $book)
                                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden flex flex-col group hover:shadow-md transition-shadow">
                                    <div class="h-40 bg-slate-50 flex items-center justify-center relative overflow-hidden">
                                        @if($book->cover_image)
                                            <img src="{{ $book->cover_image }}" alt="{{ $book->title }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="absolute inset-0 bg-gradient-to-br from-sky-400 to-indigo-500 opacity-20"></div>
                                            <svg class="w-12 h-12 text-sky-700/40 relative z-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                        @endif
                                    </div>
                                    <div class="p-5 flex-grow flex flex-col">
                                        <h3 class="font-bold text-slate-800 text-base line-clamp-1">{{ $book->title }}</h3>
                                        <p class="text-slate-500 text-xs mb-4 mt-0.5">ដោយ {{ $book->author }}</p>
                                        <div class="mt-auto">
                                            <a href="{{ route('books.read', $book) }}" class="block text-center w-full py-2 bg-slate-900 text-white rounded-xl text-xs font-semibold hover:bg-sky-600 transition-colors">
                                                អានបន្ត
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-10 flex flex-col items-center justify-center text-center">
                            <div class="w-16 h-16 rounded-full bg-sky-50 text-sky-600 flex items-center justify-center mb-4">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            </div>
                            <h2 class="text-xl font-bold text-slate-800 mb-2">អ្នកមិនទាន់មានសៀវភៅនៅឡើយទេ</h2>
                            <p class="text-slate-500 text-sm max-w-sm mx-auto mb-6">សូមស្វែងរក និងបន្ថែមសៀវភៅដែលអ្នកចូលចិត្តពីបណ្ណាល័យរបស់យើង ដើម្បីចាប់ផ្តើមអាន។</p>
                            <a href="/books" class="px-6 py-2.5 bg-slate-900 text-white rounded-xl text-sm font-semibold hover:bg-sky-600 transition-colors shadow-sm">
                                ស្វែងរកសៀវភៅឥឡូវនេះ
                            </a>
                        </div>
                    @endif
                </div>

                <!-- TAB 2: EXAMS -->
                <div id="tab-content-exams" class="dashboard-tab-pane {{ $activeTab === 'exams' ? '' : 'hidden' }}">
                    <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div>
                            <h2 class="text-2xl font-bold text-slate-900">ការប្រឡងរបស់ខ្ញុំ</h2>
                            <p class="text-slate-500 text-sm mt-1">គ្រប់គ្រង និងតាមដានលទ្ធផលនៃការប្រឡងតេស្តសមត្ថភាពរបស់អ្នក។</p>
                        </div>
                        <a href="/mathematics" class="inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-xs font-bold transition-all shadow-xs self-start">
                            <span>ធ្វើតេស្តថ្មី</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        </a>
                    </div>

                    @if(isset($examAttempts) && $examAttempts->count() > 0)
                        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="w-full text-left border-collapse min-w-[600px]">
                                    <thead>
                                        <tr class="bg-slate-50 border-b border-slate-200 text-xs uppercase text-slate-500 font-bold tracking-wider">
                                            <th class="p-4">កាលបរិច្ឆេទ</th>
                                            <th class="p-4">វិញ្ញាសា</th>
                                            <th class="p-4">កម្រិត</th>
                                            <th class="p-4 text-center">ពិន្ទុ</th>
                                            <th class="p-4 text-center">លទ្ធផល</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-100">
                                        @foreach($examAttempts as $attempt)
                                            <tr class="hover:bg-slate-50 transition-colors">
                                                <td class="p-4 text-sm text-slate-600 whitespace-nowrap">
                                                    {{ $attempt->completed_at ? \Carbon\Carbon::parse($attempt->completed_at)->format('d/m/Y H:i') : $attempt->created_at->format('d/m/Y') }}
                                                </td>
                                                <td class="p-4 text-sm font-semibold text-slate-900 min-w-[200px]">
                                                    {{ $attempt->exam->title ?? 'វិញ្ញាសាដែលត្រូវបានលុប' }}
                                                </td>
                                                <td class="p-4 text-sm text-slate-600 whitespace-nowrap">
                                                    {{ $attempt->exam->grade_level ?? '-' }}
                                                </td>
                                                <td class="p-4 text-center text-sm font-bold whitespace-nowrap {{ ($attempt->score / max(1, $attempt->exam?->questions->count() ?? 1)) >= (($attempt->exam?->passing_score ?? 50) / 100) ? 'text-emerald-600' : 'text-rose-600' }}">
                                                    {{ $attempt->score }} / {{ $attempt->exam?->questions->count() ?? '10' }}
                                                </td>
                                                <td class="p-4 text-center whitespace-nowrap">
                                                    @if(($attempt->score / max(1, $attempt->exam?->questions->count() ?? 1)) >= (($attempt->exam?->passing_score ?? 50) / 100))
                                                        <span class="px-2.5 py-1 bg-emerald-100 text-emerald-700 text-xs font-bold rounded-lg border border-emerald-200">ជាប់</span>
                                                    @else
                                                        <span class="px-2.5 py-1 bg-rose-100 text-rose-700 text-xs font-bold rounded-lg border border-rose-200">ធ្លាក់</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-10 flex flex-col items-center justify-center text-center">
                            <div class="w-16 h-16 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center mb-4">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                            </div>
                            <h2 class="text-xl font-bold text-slate-800 mb-2">មិនមានទិន្នន័យប្រឡងទេ</h2>
                            <p class="text-slate-500 text-sm max-w-sm mx-auto mb-6">អ្នកមិនទាន់មានប្រវត្តិធ្វើតេស្តប្រឡងនៅឡើយទេ។ សូមចូលរួមការប្រឡងដើម្បីវាស់ស្ទង់សមត្ថភាព។</p>
                            <a href="/mathematics" class="px-6 py-2.5 bg-indigo-600 text-white rounded-xl text-sm font-semibold hover:bg-indigo-700 transition-colors shadow-sm">
                                ធ្វើតេស្តឥឡូវនេះ
                            </a>
                        </div>
                    @endif
                </div>

                <!-- TAB 3: PROFILE -->
                <div id="tab-content-profile" class="dashboard-tab-pane {{ $activeTab === 'profile' ? '' : 'hidden' }}">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-slate-900">ព័ត៌មានផ្ទាល់ខ្លួន</h2>
                        <p class="text-slate-500 text-sm mt-1">ធ្វើបច្ចុប្បន្នភាពឈ្មោះ អ៊ីមែល លេខទូរស័ព្ទ និងពាក្យសម្ងាត់របស់អ្នក។</p>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 md:p-8">
                        <form action="{{ route('dashboard.profile.update') }}" method="POST" enctype="multipart/form-data" class="max-w-xl">
                            @csrf
                            
                            <!-- Profile Photo -->
                            <div class="mb-8">
                                <label class="block text-sm font-semibold text-slate-700 mb-2">រូបថតគណនី (Profile Photo)</label>
                                <div class="flex items-center gap-5">
                                    <div class="relative group">
                                        <img id="avatarPreview" 
                                             src="{{ Auth::user()->profile_photo_url ?? '' }}" 
                                             alt="{{ Auth::user()->name }}" 
                                             class="w-20 h-20 rounded-full object-cover ring-4 ring-slate-100 shadow-inner {{ Auth::user()->profile_photo_url ? '' : 'hidden' }}">
                                        
                                        <div id="avatarFallback" 
                                             class="w-20 h-20 rounded-full bg-sky-100 text-sky-700 flex items-center justify-center font-bold text-2xl ring-4 ring-slate-100 shadow-inner {{ Auth::user()->profile_photo_url ? 'hidden' : '' }}">
                                            {{ substr(Auth::user()->name, 0, 1) }}
                                        </div>
                                    </div>

                                    <div class="flex flex-col gap-2">
                                        <div class="flex items-center gap-2">
                                            <input type="file" id="photoInput" name="photo" accept="image/*" class="hidden" onchange="handlePhotoSelect(this)">
                                            <input type="hidden" id="croppedPhotoInput" name="cropped_photo">
                                            <input type="hidden" id="removePhotoInput" name="remove_photo" value="0">
                                            
                                            <button type="button" onclick="document.getElementById('photoInput').click()" class="px-4 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-xs sm:text-sm font-semibold transition-colors flex items-center gap-2 border border-slate-200 cursor-pointer">
                                                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                ជ្រើសរើសរូបភាព
                                            </button>

                                            <button type="button" id="recropBtn" onclick="reopenCropper()" class="hidden px-3 py-2 bg-sky-50 hover:bg-sky-100 text-sky-700 rounded-xl text-xs font-semibold transition-colors flex items-center gap-1.5 border border-sky-200 cursor-pointer">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                                កាត់តម្រឹម
                                            </button>

                                            <button type="button" id="removePhotoBtn" onclick="removeSelectedPhoto()" class="{{ Auth::user()->profile_photo_url ? '' : 'hidden' }} px-3 py-2 text-rose-600 hover:bg-rose-50 rounded-xl text-xs font-semibold transition-colors border border-transparent hover:border-rose-200 cursor-pointer">
                                                លុបរូប
                                            </button>
                                        </div>
                                        <p class="text-[11px] text-slate-400">JPG, PNG ឬ WebP ទំហំអតិបរមា 2MB។</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Name -->
                            <div class="mb-5">
                                <label for="name" class="block text-sm font-semibold text-slate-700 mb-1.5">ឈ្មោះពេញ (Full Name)</label>
                                <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required
                                       class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-hidden focus:border-sky-500 focus:ring-1 focus:ring-sky-500 @error('name') border-rose-300 @enderror">
                                @error('name')
                                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-5">
                                <label for="email" class="block text-sm font-semibold text-slate-700 mb-1.5">អ៊ីមែល (Email)</label>
                                <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required
                                       class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-hidden focus:border-sky-500 focus:ring-1 focus:ring-sky-500 @error('email') border-rose-300 @enderror">
                                @error('email')
                                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="mb-5">
                                <label for="phone" class="block text-sm font-semibold text-slate-700 mb-1.5">លេខទូរស័ព្ទ (Phone Number)</label>
                                <input type="text" id="phone" name="phone" value="{{ old('phone', Auth::user()->phone) }}" placeholder="012 345 678"
                                       class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-hidden focus:border-sky-500 focus:ring-1 focus:ring-sky-500 @error('phone') border-rose-300 @enderror">
                                @error('phone')
                                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <hr class="my-6 border-slate-100">

                            <!-- Password Section -->
                            <div class="mb-5">
                                <h3 class="text-base font-bold text-slate-800 mb-1">ប្តូរពាក្យសម្ងាត់ (Change Password)</h3>
                                <p class="text-xs text-slate-400 mb-4">ទុកឱ្យនៅទំនេរ ប្រសិនបើអ្នកមិនចង់ប្តូរពាក្យសម្ងាត់។</p>

                                <div class="space-y-4">
                                    <div>
                                        <label for="password" class="block text-sm font-semibold text-slate-700 mb-1.5">ពាក្យសម្ងាត់ថ្មី (New Password)</label>
                                        <input type="password" id="password" name="password"
                                               class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-hidden focus:border-sky-500 focus:ring-1 focus:ring-sky-500 @error('password') border-rose-300 @enderror">
                                        @error('password')
                                            <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="password_confirmation" class="block text-sm font-semibold text-slate-700 mb-1.5">ផ្ទៀងផ្ទាត់ពាក្យសម្ងាត់ថ្មី (Confirm New Password)</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                               class="w-full px-4 py-2.5 rounded-xl border border-slate-200 text-sm focus:outline-hidden focus:border-sky-500 focus:ring-1 focus:ring-sky-500">
                                    </div>
                                </div>
                            </div>

                            <div class="pt-4">
                                <button type="submit" class="px-6 py-2.5 bg-sky-600 hover:bg-sky-500 text-white rounded-xl text-sm font-bold shadow-xs hover:shadow transition-all cursor-pointer">
                                    រក្សាទុកការផ្លាស់ប្តូរ
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- TAB 4: ORDERS (Purchase History) -->
                <div id="tab-content-orders" class="dashboard-tab-pane {{ $activeTab === 'orders' ? '' : 'hidden' }}">
                    <!-- Header -->
                    <div class="mb-6 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
                        <div>
                            <h2 class="text-2xl font-bold text-slate-900">ប្រវត្តិការបញ្ជាទិញ (Purchase History)</h2>
                            <p class="text-slate-500 text-sm mt-1">ពិនិត្យតាមដានស្ថានភាពទំនិញ វិក្កយបត្រ និងការទូទាត់ទាំងអស់របស់អ្នក។</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('teaching-materials.index') }}" class="px-3.5 py-2 rounded-xl border border-slate-200 hover:border-sky-300 bg-white text-slate-700 hover:text-sky-600 text-xs font-semibold transition-all shadow-2xs flex items-center gap-1.5">
                                <span>🛒</span>
                                <span>ទិញសម្ភារៈ</span>
                            </a>
                            <a href="/books" class="px-3.5 py-2 rounded-xl bg-sky-600 hover:bg-sky-500 text-white text-xs font-bold transition-all shadow-xs flex items-center gap-1.5">
                                <span>📚</span>
                                <span>ទិញសៀវភៅ</span>
                            </a>
                        </div>
                    </div>

                    @if(isset($allOrders) && $allOrders->count() > 0)
                        <!-- 4 Summary Stats Cards -->
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                            <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/90 shadow-2xs">
                                <div class="flex items-center justify-between text-slate-500 text-xs font-medium mb-1.5">
                                    <span>ការបញ្ជាទិញសរុប</span>
                                    <span class="w-6 h-6 rounded-lg bg-sky-50 text-sky-600 flex items-center justify-center text-xs font-bold">📦</span>
                                </div>
                                <div class="text-2xl font-black text-slate-900">{{ $allOrders->count() }}</div>
                            </div>
                            
                            <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/90 shadow-2xs">
                                <div class="flex items-center justify-between text-emerald-600 text-xs font-medium mb-1.5">
                                    <span>ជោគជ័យ / យល់ព្រម</span>
                                    <span class="w-6 h-6 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center text-xs font-bold">✓</span>
                                </div>
                                <div class="text-2xl font-black text-emerald-600">{{ $allOrders->filter(fn($o) => $o->isSuccessful())->count() }}</div>
                            </div>

                            <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/90 shadow-2xs">
                                <div class="flex items-center justify-between text-amber-600 text-xs font-medium mb-1.5">
                                    <span>រង់ចាំការពិនិត្យ</span>
                                    <span class="w-6 h-6 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center text-xs font-bold">⏳</span>
                                </div>
                                <div class="text-2xl font-black text-amber-600">{{ $allOrders->filter(fn($o) => $o->isPending())->count() }}</div>
                            </div>

                            <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/90 shadow-2xs">
                                <div class="flex items-center justify-between text-slate-500 text-xs font-medium mb-1.5">
                                    <span>ទឹកប្រាក់បានទូទាត់</span>
                                    <span class="w-6 h-6 rounded-lg bg-slate-100 text-slate-700 flex items-center justify-center text-xs font-bold font-mono">$</span>
                                </div>
                                <div class="text-2xl font-black text-slate-900">${{ number_format($totalSpent ?? 0, 2) }}</div>
                            </div>
                        </div>

                        <!-- Filter Pills -->
                        <div class="flex items-center gap-2 overflow-x-auto pb-2 mb-5 no-scrollbar text-xs font-semibold">
                            <button type="button" onclick="filterOrderHistory('all', this)" class="order-filter-pill px-3.5 py-1.5 rounded-xl bg-sky-600 text-white shadow-xs cursor-pointer">
                                ទាំងអស់ ({{ $allOrders->count() }})
                            </button>
                            <button type="button" onclick="filterOrderHistory('teaching_material', this)" class="order-filter-pill px-3.5 py-1.5 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 cursor-pointer">
                                🛒 សម្ភារៈបង្រៀន ({{ $allOrders->whereNotNull('teaching_material_id')->count() }})
                            </button>
                            <button type="button" onclick="filterOrderHistory('book', this)" class="order-filter-pill px-3.5 py-1.5 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 cursor-pointer">
                                📚 សៀវភៅ ({{ $allOrders->whereNotNull('book_id')->count() }})
                            </button>
                            <button type="button" onclick="filterOrderHistory('pending', this)" class="order-filter-pill px-3.5 py-1.5 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 cursor-pointer">
                                ⏳ កំពុងរង់ចាំ ({{ $allOrders->filter(fn($o) => $o->isPending())->count() }})
                            </button>
                            <button type="button" onclick="filterOrderHistory('approved', this)" class="order-filter-pill px-3.5 py-1.5 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-50 cursor-pointer">
                                ✓ ជោគជ័យ ({{ $allOrders->filter(fn($o) => $o->isSuccessful())->count() }})
                            </button>
                        </div>

                        <!-- Orders List -->
                        <div class="space-y-4" id="ordersContainer">
                            @foreach($allOrders as $order)
                                @php
                                    $itemType = $order->book_id ? 'book' : 'teaching_material';
                                    $statusCategory = $order->isSuccessful() ? 'approved' : ($order->isPending() ? 'pending' : 'cancelled');
                                    $itemImg = $order->item_image;
                                    $itemName = $order->item_name;
                                    $detailUrl = $order->book_id 
                                        ? route('books.show', $order->book_id) 
                                        : ($order->teaching_material_id ? route('teaching-materials.show', $order->teaching_material_id) : '#');
                                @endphp

                                <div class="order-item-card bg-white rounded-2xl border border-slate-200/90 shadow-2xs hover:shadow-md transition-all p-5 sm:p-6"
                                     data-type="{{ $itemType }}"
                                     data-status="{{ $statusCategory }}">
                                    
                                    <!-- Card Header: Code, Date, Status -->
                                    <div class="flex flex-wrap items-center justify-between gap-3 pb-3.5 border-b border-slate-100 mb-4">
                                        <div class="flex items-center gap-2.5">
                                            <span class="inline-flex items-center gap-1 font-mono font-bold text-xs sm:text-sm text-slate-800 bg-slate-100 px-2.5 py-1 rounded-lg border border-slate-200">
                                                <span>#{{ $order->order_code ?? ('ORD-'.$order->id) }}</span>
                                            </span>
                                            <span class="text-xs text-slate-400">
                                                {{ $order->created_at->format('d/m/Y, h:i A') }}
                                            </span>
                                        </div>

                                        <!-- Status Badge -->
                                        <div>
                                            @if($order->isSuccessful())
                                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                                    <span>ជោគជ័យ (Completed)</span>
                                                </span>
                                            @elseif($order->isPending())
                                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                                    <svg class="w-3.5 h-3.5 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                    <span>រង់ចាំការពិនិត្យ (Pending Review)</span>
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-rose-50 text-rose-700 border border-rose-200">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                                    <span>បានបដិសេធ (Cancelled)</span>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Card Main Content -->
                                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                                        <!-- Item thumbnail and details -->
                                        <div class="flex items-start gap-4 min-w-0 flex-1">
                                            <a href="{{ $detailUrl }}" class="w-16 h-16 sm:w-20 sm:h-20 rounded-xl overflow-hidden bg-slate-50 border border-slate-200/80 shrink-0 block group">
                                                <img src="{{ $itemImg }}" alt="{{ $itemName }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                            </a>

                                            <div class="min-w-0 flex-1 space-y-1">
                                                <div class="flex items-center gap-2">
                                                    @if($order->book_id)
                                                        <span class="px-2 py-0.5 rounded-md text-[10px] font-bold bg-sky-50 text-sky-700 border border-sky-100">
                                                            📚 សៀវភៅ
                                                        </span>
                                                    @else
                                                        <span class="px-2 py-0.5 rounded-md text-[10px] font-bold bg-amber-50 text-amber-700 border border-amber-100">
                                                            🛒 សម្ភារៈបង្រៀន
                                                        </span>
                                                    @endif
                                                    <span class="text-xs text-slate-500 font-medium">
                                                        ចំនួន៖ <strong class="text-slate-800">{{ $order->quantity }}</strong>
                                                    </span>
                                                </div>

                                                <h3 class="font-bold text-slate-900 text-sm sm:text-base leading-snug line-clamp-1 hover:text-sky-600 transition-colors">
                                                    <a href="{{ $detailUrl }}">{{ $itemName }}</a>
                                                </h3>

                                                <!-- Meta / Notes Preview -->
                                                <div class="flex flex-wrap items-center gap-x-3 gap-y-1 text-xs text-slate-500 pt-0.5">
                                                    <span class="inline-flex items-center gap-1">
                                                        @if($order->payment_method === 'khqr')
                                                            <span>💳</span> <span>ABA / KHQR</span>
                                                        @else
                                                            <span>🚚</span> <span>បង់ពេលទទួល (COD)</span>
                                                        @endif
                                                    </span>

                                                    @if($order->customer_address)
                                                        <span class="inline-flex items-center gap-1 truncate max-w-xs" title="{{ $order->customer_address }}">
                                                            <span>📍</span> <span>{{ $order->customer_address }}</span>
                                                        </span>
                                                    @endif
                                                </div>

                                                @if($order->notes)
                                                    <p class="text-[11px] text-slate-400 line-clamp-1 mt-1 font-mono">
                                                        {{ Str::limit($order->notes, 80) }}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Price and Action Buttons -->
                                        <div class="w-full sm:w-auto flex sm:flex-col items-center sm:items-end justify-between sm:justify-center gap-3 pt-3 sm:pt-0 border-t sm:border-t-0 border-slate-100 shrink-0">
                                            <div class="text-left sm:text-right">
                                                <div class="text-xs text-slate-400 font-medium">ទឹកប្រាក់សរុប</div>
                                                <div class="text-xl sm:text-2xl font-black text-slate-900">
                                                    ${{ number_format($order->total_price ?? 0, 2) }}
                                                </div>
                                            </div>

                                            <div class="flex items-center gap-2">
                                                <!-- View Invoice Button -->
                                                <button type="button" 
                                                        onclick="openOrderInvoice({{ json_encode($order) }}, {{ json_encode($itemName) }}, {{ json_encode($itemImg) }})"
                                                        class="px-3 py-1.5 rounded-xl border border-slate-200 hover:border-sky-400 bg-white hover:bg-sky-50 text-slate-700 hover:text-sky-600 text-xs font-semibold transition-all flex items-center gap-1 cursor-pointer shadow-2xs">
                                                    <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                                    <span>វិក្កយបត្រ</span>
                                                </button>

                                                @if($order->book_id && $order->isSuccessful())
                                                    <a href="{{ route('books.read', $order->book_id) }}" 
                                                       class="px-3.5 py-1.5 rounded-xl bg-sky-600 hover:bg-sky-500 text-white text-xs font-bold transition-all shadow-xs flex items-center gap-1">
                                                        <span>📖</span> <span>អាន</span>
                                                    </a>
                                                @elseif($order->teaching_material_id)
                                                    <a href="{{ route('teaching-materials.show', $order->teaching_material_id) }}" 
                                                       class="px-3.5 py-1.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold transition-all shadow-xs flex items-center gap-1">
                                                        <span>🔍</span> <span>មើល</span>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <!-- Empty State -->
                        <div class="bg-white rounded-3xl shadow-xs border border-slate-200/90 p-10 sm:p-14 flex flex-col items-center justify-center text-center">
                            <div class="w-16 h-16 rounded-3xl bg-sky-50 text-sky-600 flex items-center justify-center text-3xl mb-4 shadow-inner">
                                🛒
                            </div>
                            <h2 class="text-xl font-bold text-slate-900 mb-1.5">មិនទាន់មានប្រវត្តិបញ្ជាទិញនៅឡើយទេ</h2>
                            <p class="text-slate-500 text-sm max-w-md mx-auto mb-6 leading-relaxed">
                                នៅពេលអ្នកទិញសៀវភៅ ឬសម្ភារៈបង្រៀនគណិតវិទ្យា ប្រវត្តិបញ្ជាទិញ វិក្កយបត្រ និងស្ថានភាពទំនិញនឹងបង្ហាញនៅទីនេះ។
                            </p>
                            <div class="flex flex-wrap items-center justify-center gap-3">
                                <a href="{{ route('teaching-materials.index') }}" class="px-5 py-2.5 bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-600 hover:to-orange-600 text-white rounded-xl text-xs sm:text-sm font-bold transition-all shadow-md">
                                    🛒 រុករកសម្ភារៈបង្រៀន
                                </a>
                                <a href="/books" class="px-5 py-2.5 bg-sky-600 text-white rounded-xl text-xs sm:text-sm font-bold hover:bg-sky-500 transition-all shadow-md">
                                    📚 រុករកសៀវភៅគណិតវិទ្យា
                                </a>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- ORDER INVOICE MODAL (Printable / Detailed Slip) -->
                <div id="orderInvoiceModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-slate-950/75 backdrop-blur-xs flex items-center justify-center p-4">
                    <div class="bg-white rounded-3xl max-w-xl w-full p-6 sm:p-8 shadow-2xl border border-slate-100 relative animate-in fade-in zoom-in-95 duration-200">
                        <!-- Close button -->
                        <button type="button" onclick="closeOrderInvoice()" class="absolute top-5 right-5 text-slate-400 hover:text-slate-700 p-2 rounded-xl hover:bg-slate-100 transition-colors cursor-pointer" title="បិទ">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>

                        <div id="printableInvoiceArea">
                            <!-- Invoice Header -->
                            <div class="flex items-center justify-between pb-5 border-b border-slate-200">
                                <div>
                                    <div class="flex items-center gap-2">
                                        <div class="w-8 h-8 rounded-lg bg-sky-600 text-white font-bold flex items-center justify-center text-sm shadow-xs">
                                            A
                                        </div>
                                        <h3 class="font-extrabold text-slate-900 text-lg tracking-tight">ANONTAK MATH</h3>
                                    </div>
                                    <p class="text-[11px] text-slate-400 mt-1">វិទ្យាស្ថានស្រាវជ្រាវ និងអភិវឌ្ឍន៍គណិតវិទ្យា</p>
                                </div>
                                <div class="text-right pr-8">
                                    <span class="text-xs uppercase font-mono font-bold text-slate-400 block">វិក្កយបត្រ / INVOICE</span>
                                    <span id="invOrderCode" class="text-sm font-mono font-black text-sky-600 block">#</span>
                                </div>
                            </div>

                            <!-- Customer & Order Meta -->
                            <div class="grid grid-cols-2 gap-4 py-4 text-xs border-b border-slate-100">
                                <div>
                                    <span class="text-slate-400 block mb-0.5">អតិថិជន៖</span>
                                    <strong id="invCustomerName" class="text-slate-800 block text-sm">-</strong>
                                    <span id="invCustomerPhone" class="text-slate-600 block mt-0.5">-</span>
                                    <span id="invCustomerAddress" class="text-slate-500 block mt-0.5">-</span>
                                </div>
                                <div class="text-right">
                                    <span class="text-slate-400 block mb-0.5">កាលបរិច្ឆេទ៖</span>
                                    <strong id="invOrderDate" class="text-slate-800 block">-</strong>
                                    <span class="text-slate-400 block mt-2">វិធីសាស្ត្រទូទាត់៖</span>
                                    <strong id="invPaymentMethod" class="text-slate-700 block">-</strong>
                                    <div id="invStatusBadge" class="mt-2 inline-block"></div>
                                </div>
                            </div>

                            <!-- Item Table -->
                            <div class="py-4 border-b border-slate-200">
                                <div class="flex items-center gap-3.5 mb-3 p-3 bg-slate-50 rounded-2xl border border-slate-100">
                                    <img id="invItemImg" src="" alt="" class="w-12 h-12 rounded-xl object-cover bg-white border border-slate-200 shrink-0">
                                    <div class="min-w-0 flex-1">
                                        <h4 id="invItemName" class="text-xs sm:text-sm font-bold text-slate-900 truncate">-</h4>
                                        <p id="invItemQty" class="text-[11px] text-slate-500 mt-0.5">-</p>
                                    </div>
                                    <div class="text-right">
                                        <div id="invTotalPrice" class="text-base sm:text-lg font-black text-slate-900">$0.00</div>
                                    </div>
                                </div>

                                <!-- Detailed Breakdown if group order notes exist -->
                                <div id="invNotesSection" class="hidden p-3 bg-amber-50/60 rounded-xl border border-amber-100 text-xs text-amber-900">
                                    <strong class="block mb-1 text-[11px] font-bold text-amber-800">ព័ត៌មានលម្អិតមុខទំនិញ៖</strong>
                                    <pre id="invNotesText" class="whitespace-pre-wrap font-sans text-xs text-amber-950"></pre>
                                </div>

                                <!-- Receipt preview if uploaded -->
                                <div id="invReceiptPreviewSection" class="hidden mt-3 p-3 bg-slate-50 rounded-xl border border-slate-100 text-xs">
                                    <span class="block mb-2 text-slate-600 font-semibold flex items-center gap-1.5">
                                        <svg class="w-4 h-4 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        <span>បង្កាន់ដៃបង់ប្រាក់ (Payment Receipt)</span>
                                    </span>
                                    <a id="invReceiptLink" href="#" target="_blank" class="block w-28 h-28 rounded-lg overflow-hidden border border-slate-200 hover:border-sky-400 shadow-2xs">
                                        <img id="invReceiptImg" src="" alt="Receipt" class="w-full h-full object-cover">
                                    </a>
                                </div>
                            </div>

                            <!-- Total Summary Row -->
                            <div class="pt-4 flex items-center justify-between">
                                <span class="text-sm font-bold text-slate-600">សរុបទឹកប្រាក់ត្រូវទូទាត់៖</span>
                                <span id="invGrandTotal" class="text-2xl font-black text-slate-900">$0.00</span>
                            </div>
                        </div>

                        <!-- Modal Actions -->
                        <div class="mt-6 flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                            <button type="button" onclick="closeOrderInvoice()" class="px-5 py-2.5 rounded-xl border border-slate-200 hover:bg-slate-50 text-slate-700 text-xs font-semibold transition-colors cursor-pointer">
                                បិទ (Close)
                            </button>
                            <button type="button" onclick="window.print()" class="px-5 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold transition-all shadow-sm flex items-center gap-1.5 cursor-pointer">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                                <span>បោះពុម្ព (Print)</span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- CROP PROFILE PHOTO MODAL -->
    <div id="cropModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-slate-900/75 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-lg w-full p-6 sm:p-7 shadow-2xl border border-slate-100 relative animate-in fade-in zoom-in-95 duration-200">
            <!-- Close Button -->
            <button type="button" onclick="cancelCrop()" class="absolute top-5 right-5 text-slate-400 hover:text-slate-700 p-1.5 rounded-xl hover:bg-slate-100 transition-colors cursor-pointer" title="បិទ">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <!-- Header -->
            <div class="mb-4 pr-8">
                <h3 class="text-lg sm:text-xl font-bold text-slate-900" style="font-family: 'Kantumruy Pro', sans-serif;">
                    កាត់តម្រឹមរូបថតគណនី (Crop Profile Photo)
                </h3>
                <p class="text-xs text-slate-500 mt-1">
                    រំកិល ពង្រីក ឬបង្រួម ដើម្បីជ្រើសរើសទំហំរូបថតដែលអ្នកពេញចិត្ត។
                </p>
            </div>

            <!-- Image Cropping Canvas Area -->
            <div class="relative w-full h-72 sm:h-80 bg-slate-950 rounded-2xl overflow-hidden flex items-center justify-center border border-slate-800 shadow-inner">
                <img id="cropImageTarget" src="" alt="រូបភាពសម្រាប់កាត់តម្រឹម" class="max-w-full max-h-full block">
            </div>

            <!-- Toolbar & Live Preview -->
            <div class="mt-4 flex flex-wrap items-center justify-between gap-3 p-3 bg-slate-50 rounded-2xl border border-slate-100">
                <div class="flex items-center gap-1.5">
                    <button type="button" onclick="zoomCrop(-0.1)" title="Zoom Out" class="p-2 rounded-xl bg-white text-slate-700 hover:bg-slate-100 border border-slate-200 transition-colors shadow-2xs cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>
                    </button>
                    <button type="button" onclick="zoomCrop(0.1)" title="Zoom In" class="p-2 rounded-xl bg-white text-slate-700 hover:bg-slate-100 border border-slate-200 transition-colors shadow-2xs cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    </button>
                    <button type="button" onclick="rotateCrop(-90)" title="Rotate Left" class="p-2 rounded-xl bg-white text-slate-700 hover:bg-slate-100 border border-slate-200 transition-colors shadow-2xs cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a5 5 0 015 5v2m0 0l3-3m-3 3l-3-3M3 10l3-3m-3 3l3 3"/></svg>
                    </button>
                    <button type="button" onclick="rotateCrop(90)" title="Rotate Right" class="p-2 rounded-xl bg-white text-slate-700 hover:bg-slate-100 border border-slate-200 transition-colors shadow-2xs cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 10H11a5 5 0 00-5 5v2m0 0l-3-3m3 3l3-3M21 10l-3-3m3 3l-3 3"/></svg>
                    </button>
                    <button type="button" onclick="resetCrop()" title="Reset" class="px-2.5 py-1.5 rounded-xl bg-white text-slate-700 hover:bg-slate-100 border border-slate-200 transition-colors text-xs font-semibold shadow-2xs cursor-pointer">
                        កំណត់ឡើងវិញ
                    </button>
                </div>

                <div class="flex items-center gap-2">
                    <span class="text-[11px] text-slate-500 font-medium">គំរូ៖</span>
                    <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-sky-400 bg-white shadow-xs shrink-0">
                        <div id="cropLivePreview" class="w-full h-full overflow-hidden rounded-full"></div>
                    </div>
                </div>
            </div>

            <!-- Footer Action Buttons -->
            <div class="mt-5 flex items-center justify-end gap-3 pt-3 border-t border-slate-100">
                <button type="button" onclick="cancelCrop()" class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-700 hover:bg-slate-100 text-xs font-semibold transition-colors cursor-pointer">
                    បោះបង់ (Cancel)
                </button>
                <button type="button" onclick="applyCrop()" class="px-6 py-2.5 rounded-xl bg-sky-600 hover:bg-sky-500 text-white text-xs font-bold transition-colors shadow-sm cursor-pointer flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    រក្សាទុកការកាត់តម្រឹម
                </button>
            </div>
        </div>
    </div>

    @include('partials.footer')

    <script>
        function toggleUserMenu() {
            const dropdown = document.getElementById('userDropdown');
            if (dropdown) dropdown.classList.toggle('hidden');
        }
        
        window.addEventListener('click', function(e) {
            const btn = document.getElementById('userBtn');
            const dropdown = document.getElementById('userDropdown');
            if (btn && dropdown && !btn.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
        });

        function switchDashboardTab(tabName, event) {
            if (event) {
                event.preventDefault();
            }

            const panes = document.querySelectorAll('.dashboard-tab-pane');
            panes.forEach(pane => pane.classList.add('hidden'));

            const targetPane = document.getElementById('tab-content-' + tabName);
            if (targetPane) {
                targetPane.classList.remove('hidden');
            }

            const tabs = ['books', 'exams', 'profile', 'orders'];
            tabs.forEach(t => {
                const btn = document.getElementById('tab-btn-' + t);
                if (btn) {
                    if (t === tabName) {
                        btn.classList.add('bg-sky-50', 'text-sky-700');
                        btn.classList.remove('text-slate-600', 'hover:bg-slate-50');
                    } else {
                        btn.classList.remove('bg-sky-50', 'text-sky-700');
                        btn.classList.add('text-slate-600', 'hover:bg-slate-50');
                    }
                }
            });

            const newUrl = new URL(window.location);
            newUrl.searchParams.set('tab', tabName);
            window.history.pushState({}, '', newUrl);
        }

        window.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const tabParam = urlParams.get('tab');
            if (tabParam && ['books', 'exams', 'profile', 'orders'].includes(tabParam)) {
                switchDashboardTab(tabParam);
            }
        });

        // Photo Cropper Logic
        let cropperInstance = null;
        let currentRawPhotoData = null;

        function handlePhotoSelect(input) {
            if (input.files && input.files[0]) {
                const file = input.files[0];
                if (!file.type.match(/^image\//)) {
                    alert('សូមជ្រើសរើសឯកសាររូបភាពត្រឹមត្រូវ!');
                    return;
                }
                const reader = new FileReader();
                reader.onload = function(e) {
                    currentRawPhotoData = e.target.result;
                    openCropModal(currentRawPhotoData);
                };
                reader.readAsDataURL(file);
            }
        }

        function openCropModal(imageSrc) {
            const modal = document.getElementById('cropModal');
            const target = document.getElementById('cropImageTarget');
            if (!modal || !target) return;

            target.src = imageSrc;
            modal.classList.remove('hidden');

            if (cropperInstance) {
                cropperInstance.destroy();
                cropperInstance = null;
            }

            setTimeout(function() {
                if (typeof Cropper !== 'undefined') {
                    cropperInstance = new Cropper(target, {
                        aspectRatio: 1,
                        viewMode: 1,
                        dragMode: 'move',
                        autoCropArea: 0.85,
                        restore: false,
                        guides: false,
                        center: false,
                        highlight: false,
                        cropBoxMovable: true,
                        cropBoxResizable: true,
                        toggleDragModeOnDblclick: false,
                        preview: '#cropLivePreview'
                    });
                }
            }, 100);
        }

        function reopenCropper() {
            if (currentRawPhotoData) {
                openCropModal(currentRawPhotoData);
            } else {
                const preview = document.getElementById('avatarPreview');
                if (preview && preview.src) {
                    openCropModal(preview.src);
                }
            }
        }

        function zoomCrop(delta) {
            if (cropperInstance) cropperInstance.zoom(delta);
        }

        function rotateCrop(degree) {
            if (cropperInstance) cropperInstance.rotate(degree);
        }

        function resetCrop() {
            if (cropperInstance) cropperInstance.reset();
        }

        function cancelCrop() {
            const modal = document.getElementById('cropModal');
            if (modal) modal.classList.add('hidden');
            if (cropperInstance) {
                cropperInstance.destroy();
                cropperInstance = null;
            }
            const croppedInput = document.getElementById('croppedPhotoInput');
            if (!croppedInput.value && !currentRawPhotoData) {
                const photoInput = document.getElementById('photoInput');
                if (photoInput) photoInput.value = '';
            }
        }

        function applyCrop() {
            const preview = document.getElementById('avatarPreview');
            const fallback = document.getElementById('avatarFallback');
            const removeBtn = document.getElementById('removePhotoBtn');
            const removeInput = document.getElementById('removePhotoInput');
            const croppedInput = document.getElementById('croppedPhotoInput');
            const recropBtn = document.getElementById('recropBtn');
            const photoInput = document.getElementById('photoInput');

            if (cropperInstance) {
                const canvas = cropperInstance.getCroppedCanvas({
                    width: 400,
                    height: 400,
                    imageSmoothingQuality: 'high',
                });

                if (canvas) {
                    const croppedDataUrl = canvas.toDataURL('image/jpeg', 0.92);

                    if (preview && fallback) {
                        preview.src = croppedDataUrl;
                        preview.classList.remove('hidden');
                        fallback.classList.add('hidden');
                    }

                    if (croppedInput) croppedInput.value = croppedDataUrl;

                    canvas.toBlob(function(blob) {
                        if (blob && photoInput) {
                            try {
                                const file = new File([blob], 'avatar.jpg', { type: 'image/jpeg' });
                                const dt = new DataTransfer();
                                dt.items.add(file);
                                photoInput.files = dt.files;
                            } catch (err) {
                                console.warn('DataTransfer not supported', err);
                            }
                        }
                    }, 'image/jpeg', 0.92);

                    if (removeBtn) removeBtn.classList.remove('hidden');
                    if (recropBtn) recropBtn.classList.remove('hidden');
                    if (removeInput) removeInput.value = '0';
                }
            } else if (currentRawPhotoData && preview && fallback) {
                preview.src = currentRawPhotoData;
                preview.classList.remove('hidden');
                fallback.classList.add('hidden');
                if (croppedInput) croppedInput.value = currentRawPhotoData;
                if (removeBtn) removeBtn.classList.remove('hidden');
            }

            cancelCrop();
        }

        function removeSelectedPhoto() {
            const preview = document.getElementById('avatarPreview');
            const fallback = document.getElementById('avatarFallback');
            const input = document.getElementById('photoInput');
            const removeBtn = document.getElementById('removePhotoBtn');
            const removeInput = document.getElementById('removePhotoInput');
            const croppedInput = document.getElementById('croppedPhotoInput');
            const recropBtn = document.getElementById('recropBtn');

            if (input) input.value = '';
            if (croppedInput) croppedInput.value = '';
            currentRawPhotoData = null;

            if (preview) {
                preview.src = '';
                preview.classList.add('hidden');
            }
            if (fallback) fallback.classList.remove('hidden');
            if (removeBtn) removeBtn.classList.add('hidden');
            if (recropBtn) recropBtn.classList.add('hidden');
            if (removeInput) removeInput.value = '1';
        }

        // ==========================================
        // Purchase History & Invoice Functions
        // ==========================================
        function filterOrderHistory(type, btn) {
            // Update filter pill active styling
            document.querySelectorAll('.order-filter-pill').forEach(el => {
                el.classList.remove('bg-sky-600', 'text-white', 'shadow-xs');
                el.classList.add('bg-white', 'border', 'border-slate-200', 'text-slate-600', 'hover:bg-slate-50');
            });
            if (btn) {
                btn.classList.add('bg-sky-600', 'text-white', 'shadow-xs');
                btn.classList.remove('bg-white', 'border', 'border-slate-200', 'text-slate-600', 'hover:bg-slate-50');
            }

            // Filter order cards
            const cards = document.querySelectorAll('.order-item-card');
            cards.forEach(card => {
                const cardType = card.dataset.type;
                const cardStatus = card.dataset.status;

                let shouldShow = false;
                if (type === 'all') {
                    shouldShow = true;
                } else if (type === 'teaching_material' || type === 'book') {
                    shouldShow = (cardType === type);
                } else if (type === 'pending' || type === 'approved') {
                    shouldShow = (cardStatus === type);
                }

                if (shouldShow) {
                    card.classList.remove('hidden');
                } else {
                    card.classList.add('hidden');
                }
            });
        }

        function openOrderInvoice(order, itemName, itemImg) {
            if (!order) return;

            const modal = document.getElementById('orderInvoiceModal');
            if (!modal) return;

            // Invoice Code & Dates
            const codeEl = document.getElementById('invOrderCode');
            if (codeEl) codeEl.textContent = '#' + (order.order_code || ('ORD-' + order.id));

            const dateEl = document.getElementById('invOrderDate');
            if (dateEl) {
                if (order.created_at) {
                    const d = new Date(order.created_at);
                    dateEl.textContent = !isNaN(d) ? d.toLocaleString('km-KH', { dateStyle: 'medium', timeStyle: 'short' }) : order.created_at;
                } else {
                    dateEl.textContent = '-';
                }
            }

            // Customer Info
            const nameEl = document.getElementById('invCustomerName');
            if (nameEl) nameEl.textContent = order.customer_name || '-';

            const phoneEl = document.getElementById('invCustomerPhone');
            if (phoneEl) phoneEl.textContent = order.customer_phone ? ('ទូរស័ព្ទ៖ ' + order.customer_phone) : '-';

            const addrEl = document.getElementById('invCustomerAddress');
            if (addrEl) addrEl.textContent = order.customer_address ? ('អាសយដ្ឋាន៖ ' + order.customer_address) : 'មិនមានអាសយដ្ឋានដឹកជញ្ជូន';

            // Payment Method
            const payEl = document.getElementById('invPaymentMethod');
            if (payEl) {
                const pm = (order.payment_method || '').toLowerCase();
                if (pm === 'cod') {
                    payEl.textContent = 'សាច់ប្រាក់ពេលទទួល (Cash on Delivery)';
                } else {
                    payEl.textContent = 'KHQR / ធនាគារ (ABA, Bakong)';
                }
            }

            // Status Badge
            const statusEl = document.getElementById('invStatusBadge');
            if (statusEl) {
                const st = (order.status || '').toLowerCase();
                if (st === 'approved' || st === 'completed') {
                    statusEl.innerHTML = '<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-emerald-100 text-emerald-800">✓ ជោគជ័យ (Completed)</span>';
                } else if (st === 'pending') {
                    statusEl.innerHTML = '<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-amber-100 text-amber-800">⏳ រង់ចាំពិនិត្យ (Pending)</span>';
                } else {
                    statusEl.innerHTML = '<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-rose-100 text-rose-800">✕ បានបដិសេធ (Cancelled)</span>';
                }
            }

            // Item Details
            const imgEl = document.getElementById('invItemImg');
            if (imgEl) {
                imgEl.src = itemImg || '/images/default-thumbnail.svg';
                imgEl.alt = itemName || 'ផលិតផល';
            }

            const itemNameEl = document.getElementById('invItemName');
            if (itemNameEl) itemNameEl.textContent = itemName || 'ផលិតផលគណិតវិទ្យា';

            const qty = parseInt(order.quantity, 10) || 1;
            const totalPrice = parseFloat(order.total_price) || 0;
            const unitPrice = totalPrice / Math.max(1, qty);

            const qtyEl = document.getElementById('invItemQty');
            if (qtyEl) qtyEl.textContent = `ចំនួន៖ ${qty} x $${unitPrice.toFixed(2)}`;

            const priceEl = document.getElementById('invTotalPrice');
            if (priceEl) priceEl.textContent = `$${totalPrice.toFixed(2)}`;

            const grandTotalEl = document.getElementById('invGrandTotal');
            if (grandTotalEl) grandTotalEl.textContent = `$${totalPrice.toFixed(2)}`;

            // Notes / Group order details
            const notesSec = document.getElementById('invNotesSection');
            const notesText = document.getElementById('invNotesText');
            if (notesSec && notesText) {
                if (order.notes && order.notes.trim()) {
                    notesText.textContent = order.notes.trim();
                    notesSec.classList.remove('hidden');
                } else {
                    notesSec.classList.add('hidden');
                }
            }

            // Payment Receipt Screenshot
            const receiptSec = document.getElementById('invReceiptPreviewSection');
            const receiptImg = document.getElementById('invReceiptImg');
            const receiptLink = document.getElementById('invReceiptLink');
            if (receiptSec && receiptImg && receiptLink) {
                if (order.payment_receipt) {
                    const receiptUrl = order.payment_receipt.startsWith('http')
                        ? order.payment_receipt
                        : '/storage/' + order.payment_receipt.replace(/^\/+/, '');
                    receiptImg.src = receiptUrl;
                    receiptLink.href = receiptUrl;
                    receiptSec.classList.remove('hidden');
                } else {
                    receiptSec.classList.add('hidden');
                }
            }

            // Show modal
            modal.classList.remove('hidden');
        }

        function closeOrderInvoice() {
            const modal = document.getElementById('orderInvoiceModal');
            if (modal) modal.classList.add('hidden');
        }

        // Close invoice modal when clicking outside
        window.addEventListener('click', function(e) {
            const modal = document.getElementById('orderInvoiceModal');
            if (modal && !modal.classList.contains('hidden') && e.target === modal) {
                closeOrderInvoice();
            }
        });

        // Close on ESC key
        window.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeOrderInvoice();
            }
        });

        function dismissNotificationBanner(id, redirectUrl) {
            const banner = document.getElementById('notif-banner-' + id);
            if (banner) {
                banner.style.opacity = '0';
                banner.style.transform = 'translateY(-10px)';
                banner.style.transition = 'all 0.25s ease-out';
                setTimeout(() => banner.remove(), 260);
            }

            fetch('/notifications/' + id + '/read', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            }).then(r => r.json()).then(data => {
                if (data && typeof data.unread_count !== 'undefined' && window.updateNotificationBadgeCount) {
                    window.updateNotificationBadgeCount(data.unread_count);
                }
            }).catch(err => console.warn('Could not mark banner read:', err))
            .finally(() => {
                if (redirectUrl) {
                    window.location.href = redirectUrl;
                }
            });
        }
    </script>
</body>
</html>
