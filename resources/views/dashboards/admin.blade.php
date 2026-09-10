<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $school->name ?? 'የትምህርት ቤት አስተዳደር' }} | SmartDebter</title>

    <!-- PWA Settings -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#7e22ce">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="apple-touch-icon" href="https://cdn-icons-png.flaticon.com/512/2997/2997295.png">

    <!-- Tailwind CSS & FontAwesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-100 font-sans min-h-screen pb-16">

    @php
        $schoolName = $school->name ?? request('school_name', 'ብስራተ ገብርኤል ት/ቤት');
        $schoolCode = $school->code ?? request('school', 'BG-001');
    @endphp

    <!-- PWA Install Banner -->
    <div id="pwa-install-banner" class="hidden bg-purple-950 text-white px-4 py-2.5 shadow-md">
        <div class="max-w-6xl mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <img src="https://cdn-icons-png.flaticon.com/512/2997/2997295.png" alt="Logo" class="w-8 h-8 rounded-lg">
                <div>
                    <p class="text-xs font-bold leading-tight">{{ $schoolName }} አፕሊኬሽን</p>
                    <p class="text-[10px] text-purple-200">በቀላሉ ስልክዎ ላይ ጭነው ይጠቀሙ!</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <button id="install-btn" class="bg-amber-400 hover:bg-amber-500 text-slate-900 font-bold text-xs px-3 py-1.5 rounded-lg shadow transition">
                    <i class="fas fa-download mr-1"></i>ጫን (Install)
                </button>
                <button onclick="document.getElementById('pwa-install-banner').classList.add('hidden')" class="text-purple-300 hover:text-white text-sm px-1">✕</button>
            </div>
        </div>
    </div>

    <!-- Top Master Header With Dynamic School Name, Dual Calendar & Language Toggle -->
    <header class="bg-white border-b shadow-sm sticky top-0 z-40">
        <div class="max-w-6xl mx-auto px-4 py-3 flex flex-col sm:flex-row items-center justify-between gap-3">
            
            <!-- School Name & Logo Branding -->
            <div class="flex items-center space-x-3 w-full sm:w-auto">
                <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-purple-700 to-indigo-600 text-white flex items-center justify-center font-black text-lg shadow-md shrink-0">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div>
                    <div class="flex items-center space-x-2">
                        <h1 class="text-base sm:text-lg font-black text-slate-900 leading-tight tracking-tight">{{ $schoolName }}</h1>
                        <span class="text-[10px] bg-purple-100 text-purple-800 font-mono font-bold px-2 py-0.5 rounded-md border border-purple-200">{{ $schoolCode }}</span>
                    </div>
                    <p class="text-[11px] text-slate-500 font-medium">የትምህርት ቤት አስተዳደር ዳሽቦርድ • SmartDebter Portal</p>
                </div>
            </div>

            <!-- Dual Calendar & Language Switcher -->
            <div class="flex items-center space-x-3 w-full sm:w-auto justify-between sm:justify-end">
                
                <!-- Dual Calendar Badge (ኢትዮጵያ 🇪🇹 + ፈረንጅ 🌍) -->
                <div class="flex items-center space-x-2 bg-slate-50 border border-slate-200 px-3 py-1.5 rounded-xl text-xs">
                    <span class="text-emerald-700 font-bold flex items-center">
                        <i class="far fa-calendar-alt mr-1"></i> 🇪🇹 የካቲት 2017 ዓ.ም
                    </span>
                    <span class="text-slate-300">|</span>
                    <span class="text-slate-500 font-medium">
                        🌍 Feb 2025
                    </span>
                </div>

                <!-- Language Toggle Button -->
                <button onclick="toggleLanguage(this)" class="text-xs bg-indigo-50 text-indigo-700 border border-indigo-200 px-3 py-1.5 rounded-xl font-bold hover:bg-indigo-100 transition flex items-center space-x-1">
                    <i class="fas fa-globe text-sm"></i>
                    <span id="lang-label">English</span>
                </button>

                <a href="/login" class="text-xs bg-rose-50 text-rose-600 border border-rose-200 px-3 py-1.5 rounded-xl font-semibold hover:bg-rose-100 transition">
                    <i class="fas fa-sign-out-alt mr-1"></i>ውጣ
                </a>
            </div>

        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 mt-6 space-y-6">

        <!-- 1. FRESH ONBOARDING CALLOUT -->
        <div id="onboarding-guide" class="bg-gradient-to-r from-purple-800 via-indigo-800 to-slate-900 rounded-2xl p-5 sm:p-6 text-white shadow-sm flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="space-y-1">
                <div class="flex items-center space-x-2">
                    <span class="text-lg">👋</span>
                    <h3 class="text-base font-bold">እንኳን ወደ {{ $schoolName }} አስተዳደር በደህና መጡ!</h3>
                </div>
                <p class="text-xs text-purple-100 leading-relaxed max-w-2xl">
                    የትምህርት ቤትዎ የግንኙነት ደብተር ዝግጁ ነው። ለመጀመር የተማሪዎችን ዝርዝር ከ Excel ላይ ይጫኑ፤ ከዚያም ለመምህራን የመግቢያ ሊንካቸውን ይላኩላቸው።
                </p>
            </div>
            <button onclick="openModal('excel-modal')" class="whitespace-nowrap text-xs font-bold bg-amber-400 hover:bg-amber-300 text-slate-950 px-4 py-2.5 rounded-xl transition shadow flex items-center space-x-1.5 shrink-0">
                <i class="fas fa-file-excel"></i>
                <span>ተማሪዎችን በ Excel ጫን (Import)</span>
            </button>
        </div>

        <!-- 2. Metrics (Clean Zero State) -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="bg-white p-5 rounded-2xl border shadow-xs">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">ክፍሎች / Classes</span>
                    <i class="fas fa-door-open text-purple-600"></i>
                </div>
                <h3 id="class-count" class="text-2xl font-black text-slate-900">0</h3>
                <span class="text-[10px] text-slate-400">ከ KG እስከ 12ኛ ክፍል</span>
            </div>

            <div class="bg-white p-5 rounded-2xl border shadow-xs">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">ተማሪዎች / Students</span>
                    <i class="fas fa-user-graduate text-blue-600"></i>
                </div>
                <h3 id="student-count" class="text-2xl font-black text-slate-900">0</h3>
                <span class="text-[10px] text-slate-400">የተመዘገቡ ተማሪዎች</span>
            </div>

            <div class="bg-white p-5 rounded-2xl border shadow-xs">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">መምህራን / Teachers</span>
                    <i class="fas fa-chalkboard-teacher text-emerald-600"></i>
                </div>
                <h3 id="teacher-count" class="text-2xl font-black text-slate-900">0</h3>
                <span class="text-[10px] text-slate-400">የተመደቡ መምህራን</span>
            </div>

            <div class="bg-white p-5 rounded-2xl border shadow-xs">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">የወላጆች ፊርማ</span>
                    <i class="fas fa-signature text-amber-600"></i>
                </div>
                <h3 id="sign-rate" class="text-2xl font-black text-slate-400">0%</h3>
                <span class="text-[10px] text-slate-400">የወላጆች ምላሽ ምጣኔ</span>
            </div>
        </div>

        <!-- 3. Dynamic Moving Ad Carousel -->
        @include('partials.ad-slider', ['sliderId' => 'admin-slider'])

        <!-- 4. Student & Class Management Bar -->
        <div class="bg-white rounded-2xl border shadow-sm p-5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <h3 class="text-sm font-bold text-slate-900 flex items-center">
                    <i class="fas fa-users-cog text-purple-600 mr-2"></i>
                    የተማሪዎች እና ክፍሎች አስተዳደር (Student & Section Hub)
                </h3>
                <p class="text-xs text-slate-500 mt-0.5">የተማሪዎችን መረጃ በ Excel ይጫኑ ወይም አዲስ ተማሪና ሴክሽን ይመዝግቡ</p>
            </div>
            <div class="flex flex-wrap items-center gap-2">
                <button onclick="openModal('excel-modal')" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-3.5 py-2 rounded-xl transition shadow-xs flex items-center space-x-1.5">
                    <i class="fas fa-file-excel text-sm"></i>
                    <span>ከ Excel ጫን (Bulk)</span>
                </button>
                <button onclick="openModal('student-modal')" class="bg-purple-600 hover:bg-purple-700 text-white text-xs font-bold px-3.5 py-2 rounded-xl transition shadow-xs flex items-center space-x-1.5">
                    <i class="fas fa-user-plus"></i>
                    <span>አዲስ ተማሪ መዝግብ</span>
                </button>
                <button onclick="openModal('section-modal')" class="bg-slate-800 hover:bg-slate-900 text-white text-xs font-bold px-3 py-2 rounded-xl transition shadow-xs flex items-center space-x-1.5">
                    <i class="fas fa-plus-circle"></i>
                    <span>አዲስ ሴክሽን</span>
                </button>
            </div>
        </div>

        <!-- 5. Teacher Assignment Bar -->
        <div class="bg-white rounded-2xl border shadow-sm p-6">
            <div class="flex items-center justify-between mb-4 pb-3 border-b">
                <div>
                    <h3 class="text-base font-bold text-slate-900 flex items-center">
                        <i class="fas fa-link text-emerald-600 mr-2"></i>
                        የመምህራን የክፍል ምደባ እና የመግቢያ ሊንክ (Teacher Access Links)
                    </h3>
                    <p class="text-xs text-slate-500 mt-0.5">ለመምህራን የተመደቡበትን ክፍል ብቻ እንዲያገኙ ሊንክ አመንጭተው በ Telegram/SMS ይላኩላቸው።</p>
                </div>
            </div>

            <div id="teachers-container" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div onclick="openModal('teacher-assign-modal')" class="p-6 border-2 border-dashed border-slate-300 hover:border-purple-500 bg-slate-50 hover:bg-purple-50/50 rounded-xl flex flex-col items-center justify-center text-center cursor-pointer transition">
                    <div class="w-10 h-10 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-base mb-2">
                        <i class="fas fa-plus"></i>
                    </div>
                    <span class="text-xs font-bold text-slate-800">መምህር በክፍል መድብ እና ሊንክ አመንጭ</span>
                    <p class="text-[10px] text-slate-500 mt-1">ክፍልና መምህር መርጠው ሊንክ ይውሰዱ</p>
                </div>
            </div>
        </div>

        <!-- 6. Internal Announcements -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl border shadow-sm p-5 md:col-span-1">
                <h3 class="text-sm font-bold text-slate-900 mb-2 flex items-center">
                    <i class="fas fa-bullhorn text-indigo-600 mr-2"></i>
                    የት/ቤት አጠቃላይ ማስታወቂያ (School Circular)
                </h3>
                <p class="text-xs text-slate-500 mb-3 leading-relaxed">ይህ መልእክት በሙሉ {{ $schoolName }} ላሉ ወላጆች በሙሉ ደብተር ላይ በቀጥታ ይለጠፋል።</p>
                
                <form action="#" onsubmit="event.preventDefault(); postNotice(this);" class="space-y-3">
                    <div>
                        <label class="block text-[11px] font-bold text-slate-700 mb-1">የማስታወቂያው ርዕስ</label>
                        <input type="text" id="notice-title" placeholder="ምሳሌ፡ የወላጆች አጠቃላይ ስብሰባ" required
                               class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs focus:ring-2 focus:ring-purple-500 focus:outline-none">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-slate-700 mb-1">ዝርዝር መልእክት</label>
                        <textarea rows="3" id="notice-msg" placeholder="ቀን፣ ሰዓት እና ዝርዝር መረጃ እዚህ ይጻፉ..." required
                                  class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs focus:ring-2 focus:ring-purple-500 focus:outline-none"></textarea>
                    </div>
                    <button type="submit" class="w-full py-2.5 rounded-xl bg-purple-600 hover:bg-purple-700 text-white font-bold text-xs shadow transition">
                        ለሁሉም ወላጆች አሰራጭ
                    </button>
                </form>
            </div>

            <div class="bg-white rounded-2xl border shadow-sm p-5 md:col-span-2 flex flex-col justify-between">
                <div>
                    <h3 class="text-sm font-bold text-slate-900 mb-3 flex items-center justify-between">
                        <span>የተላኩ የት/ቤት ሰርኩላሮች</span>
                        <span class="text-[11px] text-purple-600 font-semibold">{{ $schoolName }}</span>
                    </h3>

                    <div id="circulars-list" class="space-y-3">
                        <div id="empty-notice" class="text-center py-8 text-slate-400">
                            <i class="fas fa-clipboard-list text-3xl mb-2 text-slate-300"></i>
                            <p class="text-xs font-medium">እስካሁን የተላከ ማስታወቂያ የለም።</p>
                            <p class="text-[10px] text-slate-400 mt-0.5">ከግራ በኩል አዲስ ማስታወቂያ ሲጽፉ እዚህ ይደረደራል።</p>
                        </div>
                    </div>
                </div>

                <div class="mt-4 pt-3 border-t text-[11px] text-slate-400 flex items-center justify-between">
                    <span>ደህንነቱ የተጠበቀ የትምህርት ቤት ኔትወርክ</span>
                    <span class="text-slate-600 font-semibold">SmartDebter Enterprise</span>
                </div>
            </div>
        </div>

    </main>

    <!-- Modals -->
    <!-- 1. EXCEL MODAL -->
    <div id="excel-modal" class="hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-xl border">
            <div class="flex items-center justify-between pb-3 border-b">
                <h3 class="font-bold text-sm text-slate-900 flex items-center">
                    <i class="fas fa-file-excel text-emerald-600 text-base mr-2"></i>
                    የተማሪዎች መረጃ ከ Excel/CSV መጫኛ
                </h3>
                <button onclick="closeModal('excel-modal')" class="text-slate-400 hover:text-slate-600 text-lg">✕</button>
            </div>

            <div class="my-4 space-y-4">
                <div class="bg-amber-50 border border-amber-200 rounded-xl p-3 text-xs text-amber-900">
                    <p class="font-bold mb-1">የ Excel አዘገጃጀት መመሪያ፡</p>
                    <p>ፋይልዎ የሚከተሉትን ዓምዶች (Columns) መያዝ አለበት፡ <br>
                    <b>[የተማሪ ሙሉ ስም] , [የክፍል ደረጃ] , [ሴክሽን] , [ጾታ] , [የወላጅ ስልክ ቁጥር]</b></p>
                </div>

                <div class="flex items-center justify-between text-xs p-3 bg-slate-50 rounded-xl border">
                    <span class="text-slate-600 font-medium">የተዘጋጀ የናሙና Excel ቅጽ ያውርዱ፡</span>
                    <a href="data:text/csv;charset=utf-8,StudentName,Grade,Section,Gender,ParentPhone%0Aዮናስ ዳዊት,Grade 7,B,Male,0911000000%0Aሳራ ዳዊት,Grade 3,A,Female,0922000000" 
                       download="smartdebter_sample_students.csv" 
                       class="text-emerald-700 font-bold hover:underline flex items-center space-x-1">
                        <i class="fas fa-download"></i>
                        <span>Sample.csv</span>
                    </a>
                </div>

                <div class="border-2 border-dashed border-emerald-300 bg-emerald-50/40 rounded-2xl p-6 text-center hover:bg-emerald-50/70 transition cursor-pointer"
                     onclick="document.getElementById('excel-file-input').click()">
                    <i class="fas fa-cloud-upload-alt text-3xl text-emerald-600 mb-2"></i>
                    <p class="text-xs font-bold text-slate-800">የ Excel ወይም CSV ፋይሉን እዚህ ይጎትቱ ወይም ይምረጡ</p>
                    <p class="text-[10px] text-slate-500 mt-1">የሚፈቀዱ ፋይሎች፡ .xlsx, .xls, .csv</p>
                    <input type="file" id="excel-file-input" class="hidden" accept=".xlsx, .xls, .csv" onchange="fileSelected(this)">
                </div>
                <p id="file-name-display" class="text-xs text-emerald-700 font-bold text-center hidden"></p>
            </div>

            <div class="flex items-center justify-end space-x-2 pt-2 border-t">
                <button onclick="closeModal('excel-modal')" class="px-4 py-2 rounded-xl text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200">ይቅር</button>
                <button onclick="simulateUpload()" class="px-5 py-2 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow">ጫን (Upload Now)</button>
            </div>
        </div>
    </div>

    <!-- 2. TEACHER MODAL -->
    <div id="teacher-assign-modal" class="hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-sm w-full p-6 shadow-xl border">
            <div class="flex items-center justify-between pb-3 border-b">
                <h3 class="font-bold text-sm text-slate-900">አዲስ መምህር በክፍል መድብ</h3>
                <button onclick="closeModal('teacher-assign-modal')" class="text-slate-400 hover:text-slate-600 text-lg">✕</button>
            </div>
            <form action="#" onsubmit="event.preventDefault(); addTeacher();" class="my-4 space-y-3">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">የመምህሩ ሙሉ ስም</label>
                    <input type="text" id="assign-teacher-name" placeholder="ምሳሌ፡ መምህር ከበደ" required class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">የተመደበበት ክፍል</label>
                    <input type="text" id="assign-teacher-class" placeholder="ምሳሌ፡ ክፍል 7-B" required class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs font-bold text-purple-700">
                </div>
                <button type="submit" class="w-full py-2.5 rounded-xl text-xs font-bold text-white bg-purple-600 hover:bg-purple-700 shadow">ሊንክ አመንጭ</button>
            </form>
        </div>
    </div>

    <!-- 3. STUDENT MODAL -->
    <div id="student-modal" class="hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-xl border max-h-[90vh] overflow-y-auto">
            <div class="flex items-center justify-between pb-3 border-b">
                <h3 class="font-bold text-sm text-slate-900">አዲስ ተማሪ መመዝገቢያ</h3>
                <button onclick="closeModal('student-modal')" class="text-slate-400 hover:text-slate-600">✕</button>
            </div>
            <form action="#" onsubmit="event.preventDefault(); addSingleStudent();" class="my-4 space-y-3">
                <div class="grid grid-cols-2 gap-3">
                    <input type="text" placeholder="የተማሪ ስም" required class="p-2.5 bg-slate-50 border rounded-xl text-xs">
                    <input type="text" placeholder="የአባት ስም" required class="p-2.5 bg-slate-50 border rounded-xl text-xs">
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <input type="text" placeholder="ክፍል (ምሳሌ፡ 7)" required class="p-2.5 bg-slate-50 border rounded-xl text-xs">
                    <input type="text" placeholder="ሴክሽን (ምሳሌ፡ B)" required class="p-2.5 bg-slate-50 border rounded-xl text-xs">
                </div>
                <input type="text" placeholder="የወላጅ ስልክ ቁጥር (09xxxxxxxx)" required class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs">
                <button type="submit" class="w-full py-2.5 rounded-xl text-xs font-bold text-white bg-purple-600 hover:bg-purple-700 shadow">ተማሪ መዝግብ</button>
            </form>
        </div>
    </div>

    <!-- Mela Solution Shared Footer -->
    @include('partials.footer')

    <!-- Scripts -->
    <script>
        function openModal(id) { document.getElementById(id).classList.remove('hidden'); }
        function closeModal(id) { document.getElementById(id).classList.add('hidden'); }

        function toggleLanguage(btn) {
            const label = document.getElementById('lang-label');
            if (label.innerText === 'English') {
                label.innerText = 'አማርኛ';
                alert('Language switched to English!');
            } else {
                label.innerText = 'English';
                alert('ቋንቋ ወደ አማርኛ ተቀይሯል!');
            }
        }

        function fileSelected(input) {
            if (input.files && input.files[0]) {
                const display = document.getElementById('file-name-display');
                display.classList.remove('hidden');
                display.innerText = 'የተመረጠው ፋይል: ' + input.files[0].name;
            }
        }

        function simulateUpload() {
            const input = document.getElementById('excel-file-input');
            if (!input.files || !input.files[0]) {
                alert('እባክዎ መጀመሪያ የ Excel ወይም CSV ፋይል ይምረጡ!');
                return;
            }
            document.getElementById('student-count').innerText = '65';
            document.getElementById('class-count').innerText = '4';
            document.getElementById('onboarding-guide').classList.add('hidden');
            alert('🎉 እንኳን ደስ አለዎት! ተማሪዎች በ Excel በተሳካ ሁኔታ ተጭነዋል!');
            closeModal('excel-modal');
        }

        function addSingleStudent() {
            const cur = parseInt(document.getElementById('student-count').innerText) || 0;
            document.getElementById('student-count').innerText = cur + 1;
            alert('ተማሪው በተሳካ ሁኔታ ተመዝግቧል!');
            closeModal('student-modal');
        }

        function addTeacher() {
            const name = document.getElementById('assign-teacher-name').value;
            const cls = document.getElementById('assign-teacher-class').value;
            const cur = parseInt(document.getElementById('teacher-count').innerText) || 0;
            document.getElementById('teacher-count').innerText = cur + 1;

            const card = document.createElement('div');
            card.className = 'p-4 bg-slate-50 rounded-xl border flex flex-col justify-between';
            card.innerHTML = `
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-bold text-slate-900">${name}</span>
                        <span class="text-[10px] font-bold bg-purple-100 text-purple-700 px-2 py-0.5 rounded">${cls}</span>
                    </div>
                    <p class="text-[11px] text-slate-500 mb-3">የ ${cls} ደብተር ማስተዳደሪያ ሊንክ፡</p>
                </div>
                <div class="flex items-center space-x-2">
                    <input type="text" readonly value="https://smart-debter-ethiopia.vercel.app/teacher/entry?class=${encodeURIComponent(cls)}&name=${encodeURIComponent(name)}" 
                           class="text-[10px] bg-white border p-1.5 rounded flex-1 text-slate-600 select-all">
                    <button onclick="navigator.clipboard.writeText('https://smart-debter-ethiopia.vercel.app/teacher/entry?class=${encodeURIComponent(cls)}&name=${encodeURIComponent(name)}'); alert('ሊንኩ ተገልብጧል!');" 
                            class="text-xs bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-2.5 py-1.5 rounded transition">
                        <i class="fas fa-copy"></i>
                    </button>
                </div>
            `;
            document.getElementById('teachers-container').prepend(card);
            closeModal('teacher-assign-modal');
            alert('መምህሩ ተመድቧል! ሊንኩን ገልብጠው ይላኩላቸው።');
        }

        function postNotice(form) {
            const title = document.getElementById('notice-title').value;
            const msg = document.getElementById('notice-msg').value;
            document.getElementById('empty-notice')?.remove();
            const item = document.createElement('div');
            item.className = 'p-3 bg-slate-50 rounded-xl border flex items-center justify-between text-xs';
            item.innerHTML = `
                <div>
                    <span class="font-bold text-slate-800">${title}</span>
                    <p class="text-[11px] text-slate-500 mt-0.5">${msg}</p>
                </div>
                <span class="text-emerald-700 font-bold bg-emerald-100 px-2 py-1 rounded">ተሰራጭቷል</span>
            `;
            document.getElementById('circulars-list').prepend(item);
            form.reset();
            alert('ማስታወቂያው ለወላጆች በሙሉ ተሰራጭቷል!');
        }

        // PWA Script
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => { navigator.serviceWorker.register('/sw.js'); });
        }
        let deferredPrompt;
        const pwaBanner = document.getElementById('pwa-install-banner');
        const installBtn = document.getElementById('install-btn');
        window.addEventListener('beforeinstallprompt', (e) => {
            e.preventDefault();
            deferredPrompt = e;
            if (pwaBanner) pwaBanner.classList.remove('hidden');
        });
        if (installBtn) {
            installBtn.addEventListener('click', async () => {
                if (deferredPrompt) {
                    deferredPrompt.prompt();
                    deferredPrompt = null;
                    pwaBanner.classList.add('hidden');
                }
            });
        }
    </script>

</body>
</html>
