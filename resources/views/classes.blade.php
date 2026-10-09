<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ថ្នាក់បង្រៀន - ANONTAK (Classrooms & Teachers)</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:ital,wght@0,300..700;1,300..700&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="text-slate-800 antialiased font-sans flex flex-col min-h-screen" style="background-color: #faf0ee;">

    @include('partials.header')

    <!-- MAIN CONTENT: FAITHFUL TO USER MOCKUP -->
    <main class="flex-grow max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-16 w-full">
        
        <!-- Page Title (Exactly matching the "ថ្នាក់បង្រៀន" header in the mockup) -->
        <div class="mb-10 sm:mb-14">
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight" style="font-family: 'Kantumruy Pro', sans-serif;">
                ថ្នាក់បង្រៀន
            </h1>
        </div>

        <!-- Teachers & Classrooms List -->
        <div class="space-y-16">
            @foreach($teachers as $teacher)
                <!-- TEACHER BLOCK (Direct translation of mockup) -->
                <div class="flex flex-col md:flex-row items-center md:items-start gap-8 sm:gap-12 pb-12 {{ !$loop->last ? 'border-b border-[#ebd7d2]' : '' }}">
                    
                    <!-- Left: Circular Teacher Avatar -->
                    <div class="shrink-0 flex justify-center">
                        <div class="w-36 h-36 sm:w-44 sm:h-44 rounded-full overflow-hidden shadow-sm bg-white border border-[#ebd7d2]/60">
                            <img src="{{ $teacher->avatar ?? '/images/teacher_vasna.png' }}" 
                                 alt="{{ $teacher->name }}" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>

                    <!-- Right: Teacher Name, Profile Button, and Class Badges -->
                    <div class="flex-1 text-center md:text-left">
                        
                        <!-- Teacher Name -->
                        <h2 class="text-2xl sm:text-3xl font-bold text-slate-900 tracking-tight" style="font-family: 'Kantumruy Pro', sans-serif;">
                            {{ $teacher->name }}
                        </h2>

                        <!-- View Profile Button -->
                        <div class="mt-2.5 mb-6">
                            <button onclick="openProfileModal({{ json_encode($teacher) }})" 
                                    class="inline-block px-3.5 py-1.5 text-xs font-semibold text-white bg-[#29b6f6] hover:bg-[#0288d1] rounded transition-colors shadow-2xs cursor-pointer">
                                View Profile
                            </button>
                        </div>

                        <!-- Class Badges Grid (Matching the mockup badges) -->
                        <div class="flex flex-wrap gap-2.5 justify-center md:justify-start max-w-xl">
                            @foreach($teacher->classrooms as $classroom)
                                <button onclick="openClassModal({{ json_encode($classroom) }}, '{{ $teacher->name }}')" 
                                        class="px-4 py-2 rounded-xs bg-[#a8c2bd] hover:bg-[#94b0ab] text-slate-800 text-xs font-medium tracking-wide transition-all shadow-2xs hover:shadow-sm cursor-pointer select-none active:scale-95"
                                        title="{{ $classroom->title }}">
                                    {{ $classroom->code }}
                                </button>
                            @endforeach
                        </div>

                    </div>

                </div>
            @endforeach
        </div>

    </main>

    <!-- TEACHER PROFILE MODAL -->
    <div id="profileModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-lg w-full p-6 sm:p-8 shadow-2xl border border-slate-100 relative">
            <button onclick="closeProfileModal()" class="absolute top-5 right-5 text-slate-400 hover:text-slate-700 cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <div class="flex items-center gap-4 pb-6 border-b border-slate-100">
                <img id="profileImg" src="" alt="" class="w-18 h-18 rounded-full object-cover border border-slate-200">
                <div>
                    <h3 id="profileName" class="text-xl font-bold text-slate-900"></h3>
                    <p id="profileSubject" class="text-xs text-sky-600 font-semibold mt-0.5"></p>
                </div>
            </div>

            <div class="py-5 space-y-4 text-xs sm:text-sm text-slate-600 leading-relaxed">
                <div>
                    <h4 class="font-bold text-slate-800 text-xs uppercase tracking-wider mb-1">ជីវប្រវត្តិ និងបទពិសោធន៍</h4>
                    <p id="profileBio"></p>
                </div>

                <div class="p-3.5 bg-slate-50 rounded-xl border border-slate-100 space-y-1.5 text-xs">
                    <div><span class="font-semibold text-slate-700">កម្រិតវប្បធម៌៖</span> <span id="profileEducation"></span></div>
                    <div><span class="font-semibold text-slate-700">លេខទូរស័ព្ទ៖</span> <span id="profilePhone"></span></div>
                    <div><span class="font-semibold text-slate-700">តេឡេក្រាម៖</span> <span id="profileTelegram" class="text-sky-600 font-mono"></span></div>
                </div>
            </div>

            <div class="pt-2">
                <button onclick="closeProfileModal()" class="w-full py-2.5 bg-slate-900 hover:bg-slate-800 text-white rounded-xl text-xs font-bold transition-colors cursor-pointer">
                    បិទ
                </button>
            </div>
        </div>
    </div>

    <!-- CLASSROOM DETAILS MODAL -->
    <div id="classModal" class="hidden fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-md w-full p-6 sm:p-8 shadow-2xl border border-slate-100 relative">
            <button onclick="closeClassModal()" class="absolute top-5 right-5 text-slate-400 hover:text-slate-700 cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#a8c2bd]/30 text-slate-800 text-xs font-bold mb-3">
                <span id="classCode"></span>
            </div>

            <h3 id="classTitle" class="text-lg font-bold text-slate-900 mb-1"></h3>
            <p id="classTeacher" class="text-xs text-slate-500 mb-4"></p>

            <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 space-y-2.5 text-xs text-slate-600 mb-6">
                <div class="flex items-center justify-between">
                    <span class="font-semibold text-slate-700">បន្ទប់សិក្សា៖</span>
                    <span id="classRoom" class="font-bold text-slate-900"></span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="font-semibold text-slate-700">កម្រិតថ្នាក់៖</span>
                    <span id="classGrade" class="text-slate-800 font-medium"></span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="font-semibold text-slate-700">កាលវិភាគ៖</span>
                    <span id="classSchedule" class="text-sky-700 font-medium"></span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="font-semibold text-slate-700">ចំនួនសិស្ស៖</span>
                    <span id="classStudents" class="text-emerald-700 font-bold"></span>
                </div>
            </div>

            <div class="flex gap-3">
                <button onclick="alert('បានចុះឈ្មោះចូលរៀនដោយជោគជ័យ! លោកគ្រូនឹងទាក់ទងមកអ្នកឆាប់ៗ។'); closeClassModal();" 
                        class="flex-1 py-2.5 bg-[#29b6f6] hover:bg-[#0288d1] text-white text-xs font-bold rounded-xl shadow-md transition-colors cursor-pointer">
                    ចុះឈ្មោះចូលរៀន (Enroll)
                </button>
                <button onclick="closeClassModal()" 
                        class="py-2.5 px-4 rounded-xl border border-slate-200 text-slate-700 text-xs font-semibold hover:bg-slate-50 cursor-pointer">
                    បិទ
                </button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Interactive JavaScript Handlers -->
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            if (menu) {
                menu.classList.toggle('hidden');
            }
        }

        function toggleUserMenu() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('hidden');
        }

        // Teacher Profile Modal
        function openProfileModal(teacher) {
            document.getElementById('profileName').innerText = teacher.name;
            document.getElementById('profileSubject').innerText = teacher.subject || 'គ្រូបង្រៀនគណិតវិទ្យា';
            document.getElementById('profileBio').innerText = teacher.bio || 'មិនមានព័ត៌មានបន្ថែម';
            document.getElementById('profileEducation').innerText = teacher.education || 'សាកលវិទ្យាល័យភូមិន្ទភ្នំពេញ';
            document.getElementById('profilePhone').innerText = teacher.phone || '012 889 900';
            document.getElementById('profileTelegram').innerText = teacher.telegram || '@anontak_math';
            document.getElementById('profileImg').src = teacher.avatar || '/images/teacher_vasna.png';
            document.getElementById('profileModal').classList.remove('hidden');
        }

        function closeProfileModal() {
            document.getElementById('profileModal').classList.add('hidden');
        }

        // Classroom Modal
        function openClassModal(classroom, teacherName) {
            document.getElementById('classCode').innerText = classroom.code;
            document.getElementById('classTitle').innerText = classroom.title || 'ថ្នាក់គណិតវិទ្យា';
            document.getElementById('classTeacher').innerText = 'បង្រៀនដោយ៖ ' + teacherName;
            document.getElementById('classRoom').innerText = classroom.room || 'បន្ទប់ ១៣៦';
            document.getElementById('classGrade').innerText = classroom.grade_level || 'ថ្នាក់ទី ១២';
            document.getElementById('classSchedule').innerText = classroom.schedule || 'ចន្ទ - សុក្រ';
            document.getElementById('classStudents').innerText = (classroom.enrolled_count || 28) + ' / ' + (classroom.capacity || 35) + ' នាក់';
            document.getElementById('classModal').classList.remove('hidden');
        }

        function closeClassModal() {
            document.getElementById('classModal').classList.add('hidden');
        }

        // Close on background click
        window.addEventListener('click', function(e) {
            const btn = document.getElementById('userBtn');
            const dropdown = document.getElementById('userDropdown');
            if (btn && dropdown && !btn.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add('hidden');
            }
            const pModal = document.getElementById('profileModal');
            if (e.target === pModal) {
                closeProfileModal();
            }
            const cModal = document.getElementById('classModal');
            if (e.target === cModal) {
                closeClassModal();
            }
        });
    </script>
</body>
</html>
