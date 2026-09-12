<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $school->name ?? request('school_name', 'የትምህርት ቤት አስተዳደር') }} | SmartDebter</title>

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
        $schoolName = $school->name ?? request('school_name', 'ነዋይ ቻሌንጅ አካዳሚ');
        $schoolCode = $school->code ?? request('school', 'NCA-001');
        $campus = request('campus', 'all');
        $division = request('division', 'all');
        $leaderName = request('leader', '');

        $campusNames = [
            'all' => 'ሁሉም ካምፓሶች (All Campuses)',
            '1' => 'ካምፓስ 1 (ቅርንጫፍ 1)',
            '2' => 'ካምፓስ 2 (ቅርንጫፍ 2)'
        ];
        $currentCampusName = $campusNames[$campus] ?? $campusNames['all'];

        $divisionMap = [
            'all' => ['title' => 'ዋና ርዕሰ-መምህር (General Director)', 'role_badge' => 'General Principal', 'icon' => 'fa-crown', 'badge' => 'bg-purple-100 text-purple-800 border-purple-300'],
            'kg' => ['title' => 'የኬጂ ዲቪዥን ተጠሪ (KG)', 'role_badge' => 'KG Unit Leader', 'icon' => 'fa-baby', 'badge' => 'bg-pink-100 text-pink-800 border-pink-300'],
            '1-4' => ['title' => 'የ 1ኛ - 4ኛ ተጠሪ', 'role_badge' => 'Grade 1-4 Leader', 'icon' => 'fa-child', 'badge' => 'bg-blue-100 text-blue-800 border-blue-300'],
            '5-8' => ['title' => 'የ 5ኛ - 8ኛ ተጠሪ', 'role_badge' => 'Grade 5-8 Leader', 'icon' => 'fa-book-open', 'badge' => 'bg-emerald-100 text-emerald-800 border-emerald-300'],
            '9-12' => ['title' => 'የ 9ኛ - 12ኛ ተጠሪ', 'role_badge' => 'Grade 9-12 Leader', 'icon' => 'fa-user-graduate', 'badge' => 'bg-amber-100 text-amber-800 border-amber-300']
        ];
        $currentDiv = $divisionMap[$division] ?? $divisionMap['all'];
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
                    <i class="fas fa-download mr-1"></i>ጫን
                </button>
                <button onclick="document.getElementById('pwa-install-banner').classList.add('hidden')" class="text-purple-300 hover:text-white text-sm px-1">✕</button>
            </div>
        </div>
    </div>

    <!-- Top Master Header -->
    <header class="bg-white border-b shadow-sm sticky top-0 z-40">
        <div class="max-w-6xl mx-auto px-4 py-3 flex flex-col sm:flex-row items-center justify-between gap-3">
            
            <div class="flex items-center space-x-3 w-full sm:w-auto">
                <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-purple-700 to-indigo-600 text-white flex items-center justify-center font-black text-lg shadow-md shrink-0">
                    <i class="fas {{ $currentDiv['icon'] }}"></i>
                </div>
                <div>
                    <div class="flex items-center space-x-2 flex-wrap">
                        <h1 class="text-base sm:text-lg font-black text-slate-900 leading-tight tracking-tight">{{ $schoolName }}</h1>
                        <span class="text-[10px] bg-indigo-100 text-indigo-800 border border-indigo-200 px-2 py-0.5 rounded-full font-bold">
                            <i class="fas fa-map-marker-alt mr-1"></i>{{ $currentCampusName }}
                        </span>
                        <span class="text-[10px] {{ $currentDiv['badge'] }} border px-2 py-0.5 rounded-full font-bold">
                            {{ $leaderName ? $leaderName . ' (' . $currentDiv['role_badge'] . ')' : $currentDiv['title'] }}
                        </span>
                    </div>
                    <p class="text-[11px] text-slate-500 font-medium">ኮድ፡ <b class="text-purple-700 font-mono">{{ $schoolCode }}</b> • 2019 የትምህርት ዘመን</p>
                </div>
            </div>

            <div class="flex items-center space-x-3 w-full sm:w-auto justify-between sm:justify-end">
                <div class="flex items-center space-x-2 bg-slate-50 border border-slate-200 px-3 py-1.5 rounded-xl text-xs">
                    <span class="text-emerald-700 font-bold flex items-center">
                        <i class="far fa-calendar-alt mr-1"></i> 🇪🇹 2019 ዓ.ም
                    </span>
                    <span class="text-slate-300">|</span>
                    <span class="text-slate-600 font-semibold">መስከረም</span>
                </div>

                <button onclick="toggleLanguage(this)" class="text-xs bg-indigo-50 text-indigo-700 border border-indigo-200 px-3 py-1.5 rounded-xl font-bold hover:bg-indigo-100 transition flex items-center space-x-1">
                    <i class="fas fa-globe text-sm"></i>
                    <span id="lang-label">English</span>
                </button>

                <a href="/login" class="text-xs bg-rose-50 text-rose-600 border border-rose-200 px-3 py-1.5 rounded-lg font-semibold hover:bg-rose-100 transition">
                    <i class="fas fa-sign-out-alt mr-1"></i>ውጣ
                </a>
            </div>

        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 mt-6 space-y-6">

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="p-3.5 bg-emerald-500/10 border border-emerald-500/30 text-emerald-800 rounded-xl text-xs font-bold flex items-center space-x-2">
                <i class="fas fa-check-circle text-base text-emerald-600"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if($division == 'all')
        <!-- GENERAL PRINCIPAL CAMPUS TABS -->
        <div class="bg-white rounded-2xl p-3 border shadow-xs flex items-center justify-between gap-3 flex-wrap">
            <div class="flex items-center space-x-2 overflow-x-auto">
                <span class="text-xs font-bold text-slate-500 px-1 uppercase shrink-0">ካምፓስ ምረጥ፡</span>
                <a href="?school={{ $schoolCode }}&campus=all&division=all&school_name={{ urlencode($schoolName) }}" class="whitespace-nowrap text-xs font-bold px-3 py-1.5 rounded-xl {{ $campus == 'all' ? 'bg-purple-600 text-white shadow-xs' : 'bg-slate-50 border text-slate-600 hover:bg-slate-100' }}">
                    📍 ሁሉም ካምፓሶች
                </a>
                <a href="?school={{ $schoolCode }}&campus=1&division=all&school_name={{ urlencode($schoolName) }}" class="whitespace-nowrap text-xs font-bold px-3 py-1.5 rounded-xl {{ $campus == '1' ? 'bg-blue-600 text-white shadow-xs' : 'bg-slate-50 border text-slate-600 hover:bg-slate-100' }}">
                    📍 ካምፓስ 1
                </a>
                <a href="?school={{ $schoolCode }}&campus=2&division=all&school_name={{ urlencode($schoolName) }}" class="whitespace-nowrap text-xs font-bold px-3 py-1.5 rounded-xl {{ $campus == '2' ? 'bg-emerald-600 text-white shadow-xs' : 'bg-slate-50 border text-slate-600 hover:bg-slate-100' }}">
                    📍 ካምፓስ 2
                </a>
            </div>

            <div class="text-[11px] text-slate-500 font-semibold">
                የትምህርት ዘመን፡ <span class="bg-purple-50 text-purple-800 border border-purple-200 px-2.5 py-1 rounded-md font-bold">2019 ዓ.ም</span>
            </div>
        </div>

        <!-- SECTION 1: PARENT PORTAL BROADCAST CARD -->
        <div class="bg-gradient-to-r from-blue-900 via-indigo-950 to-slate-900 rounded-2xl p-5 sm:p-6 text-white shadow-md border border-blue-800/50">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pb-4 border-b border-blue-800/60">
                <div>
                    <div class="flex items-center space-x-2">
                        <span class="p-2 bg-blue-500/20 text-blue-400 rounded-xl text-base"><i class="fas fa-bullhorn"></i></span>
                        <h3 class="text-base font-bold text-white">የወላጆች መግቢያ ሊንክ ማሰራጫ (Telegram & SMS Broadcast)</h3>
                    </div>
                    <p class="text-xs text-blue-200 mt-1">ለትምህርት ቤትዎ ወላጆች በሙሉ በቴሌግራም ቻናልዎ ወይም በ SMS የሚላክ ዝግጁ መልእክት፡</p>
                </div>
                <div class="flex items-center space-x-2 w-full sm:w-auto">
                    <button onclick="copyParentLink('{{ $schoolCode }}', '{{ $schoolName }}')" class="flex-1 sm:flex-none text-xs bg-white/10 hover:bg-white/20 text-white font-bold px-3.5 py-2 rounded-xl transition border border-white/20 flex items-center justify-center space-x-1.5">
                        <i class="fas fa-link text-xs"></i>
                        <span>ሊንኩን ብቻ ቅዳ</span>
                    </button>
                    <button onclick="copyParentBroadcastMessage('{{ $schoolName }}', '{{ $schoolCode }}')" class="flex-1 sm:flex-none text-xs bg-blue-500 hover:bg-blue-600 text-white font-bold px-4 py-2 rounded-xl transition shadow flex items-center justify-center space-x-1.5">
                        <i class="fas fa-copy text-xs"></i>
                        <span>የቴሌግራም መልእክት ቅዳ</span>
                    </button>
                </div>
            </div>

            <div class="mt-4 p-3.5 bg-black/40 rounded-xl border border-blue-900/60 text-xs text-slate-300 font-sans space-y-1.5 leading-relaxed">
                <p class="font-bold text-white">📢 ክቡራን የ{{ $schoolName }} ወላጆች፡</p>
                <p>የልጅዎን የዕለት ውሎ፣ የቤት ስራ እና ማስታወሻዎች በስልክዎ በቀጥታ ለመከታተል የትምህርት ቤታችንን የዲጂታል ግንኙነት ደብተር ይጠቀሙ።</p>
                <p class="text-blue-300 font-mono font-bold">👉 የመግቢያ ሊንክ፡ https://smart-debter-ethiopia.vercel.app/login?role=parent&school={{ $schoolCode }}&school_name={{ urlencode($schoolName) }}</p>
                <p>👤 <b>ተጠቃሚ ስም (Username)፡</b> በት/ቤቱ ያስመዘገቡት ስልክ ቁጥር</p>
                <p>🔑 <b>የይለፍ ቃል (Password)፡</b> የልጅዎ የተማሪ መለያ ቁጥር (Student ID)</p>
            </div>
        </div>

        <!-- SECTION 2: ASSIGN & MANAGE UNIT LEADERS -->
        <div class="bg-white rounded-2xl border shadow-sm p-6">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-2 mb-4 pb-3 border-b">
                <div>
                    <h3 class="text-base font-bold text-slate-900 flex items-center">
                        <i class="fas fa-users-cog text-purple-600 mr-2"></i>
                        የዲቪዥን ተጠሪዎች ምደባ እና አስተዳደር ({{ $currentCampusName }})
                    </h3>
                    <p class="text-xs text-slate-500 mt-0.5">ለእያንዳንዱ ዲቪዥን ኃላፊ በስሙ ሊንክ አመንጭተው በቴሌግራም/SMS ይላኩላቸው፡</p>
                </div>
                <span class="text-xs font-bold text-purple-700 bg-purple-50 border border-purple-200 px-3 py-1 rounded-full">
                    የስልጣን ውክልና
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- KG Leader -->
                <div class="p-4 rounded-xl border border-pink-200 bg-pink-50/40 flex flex-col justify-between space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <span class="w-8 h-8 rounded-xl bg-pink-100 text-pink-700 flex items-center justify-center font-bold">👶</span>
                            <div>
                                <h4 class="text-xs font-bold text-slate-900">የኬጂ ተጠሪ (KG Leader)</h4>
                                <p class="text-[10px] text-slate-500">{{ $currentCampusName }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="text" id="leader-name-kg" placeholder="የተጠሪዋ ስም (ምሳሌ፡ ወ/ሮ ሰላማዊት)" class="text-xs p-2 bg-white border border-slate-200 rounded-lg flex-1 font-semibold">
                        <button onclick="generateLeaderLink('kg')" class="bg-pink-600 hover:bg-pink-700 text-white text-xs font-bold px-3 py-2 rounded-lg transition shadow-xs">ሊንክ ውሰድ</button>
                    </div>
                </div>

                <!-- 1-4 Leader -->
                <div class="p-4 rounded-xl border border-blue-200 bg-blue-50/40 flex flex-col justify-between space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <span class="w-8 h-8 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center font-bold">🎒</span>
                            <div>
                                <h4 class="text-xs font-bold text-slate-900">የ 1ኛ - 4ኛ ተጠሪ (Grade 1-4)</h4>
                                <p class="text-[10px] text-slate-500">{{ $currentCampusName }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="text" id="leader-name-1-4" placeholder="የተጠሪው ስም (ምሳሌ፡ አቶ ከበደ)" class="text-xs p-2 bg-white border border-slate-200 rounded-lg flex-1 font-semibold">
                        <button onclick="generateLeaderLink('1-4')" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-3 py-2 rounded-lg transition shadow-xs">ሊንክ ውሰድ</button>
                    </div>
                </div>

                <!-- 5-8 Leader -->
                <div class="p-4 rounded-xl border border-emerald-200 bg-emerald-50/40 flex flex-col justify-between space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <span class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold">📚</span>
                            <div>
                                <h4 class="text-xs font-bold text-slate-900">የ 5ኛ - 8ኛ ተጠሪ (Grade 5-8)</h4>
                                <p class="text-[10px] text-slate-500">{{ $currentCampusName }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="text" id="leader-name-5-8" placeholder="የተጠሪው ስም (ምሳሌ፡ መምህር ግርማ)" class="text-xs p-2 bg-white border border-slate-200 rounded-lg flex-1 font-semibold">
                        <button onclick="generateLeaderLink('5-8')" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-3 py-2 rounded-lg transition shadow-xs">ሊንክ ውሰድ</button>
                    </div>
                </div>

                <!-- 9-12 Leader -->
                <div class="p-4 rounded-xl border border-amber-200 bg-amber-50/40 flex flex-col justify-between space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <span class="w-8 h-8 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center font-bold">🎓</span>
                            <div>
                                <h4 class="text-xs font-bold text-slate-900">የ 9ኛ - 12ኛ ተጠሪ (Grade 9-12)</h4>
                                <p class="text-[10px] text-slate-500">{{ $currentCampusName }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="text" id="leader-name-9-12" placeholder="የተጠሪው ስም (ምሳሌ፡ አቶ ታደሰ)" class="text-xs p-2 bg-white border border-slate-200 rounded-lg flex-1 font-semibold">
                        <button onclick="generateLeaderLink('9-12')" class="bg-amber-600 hover:bg-amber-700 text-white text-xs font-bold px-3 py-2 rounded-lg transition shadow-xs">ሊንክ ውሰድ</button>
                    </div>
                </div>
            </div>
        </div>

        @else
        <!-- ================= UNIT LEADER PORTAL ================= -->
        <div class="bg-gradient-to-r from-purple-800 to-indigo-900 rounded-2xl p-5 sm:p-6 text-white shadow-sm flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="space-y-1">
                <div class="flex items-center space-x-2">
                    <span class="text-xl">👋</span>
                    <h3 class="text-base font-bold">እንኳን ደህና መጡ {{ $leaderName ? $leaderName : $currentDiv['title'] }}!</h3>
                </div>
                <p class="text-xs text-purple-200 leading-relaxed max-w-2xl">
                    ይህ ፖርታል ለ {{ $currentCampusName }} • {{ $currentDiv['title'] }} የተዘጋጀ ነው። (2019 ዓ.ም)
                </p>
            </div>
            <button onclick="openModal('teacher-assign-modal')" class="whitespace-nowrap text-xs font-bold bg-amber-400 hover:bg-amber-300 text-slate-950 px-4 py-2.5 rounded-xl transition shadow flex items-center space-x-1.5 shrink-0">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>መምህር መድብ እና ሊንክ አመንጭ</span>
            </button>
        </div>

        <!-- ================= [ዋናው ማስተካከያ] ለዲቪዥን ተጠሪው ከወላጆች የተላኩ መልእክቶች ሳጥን ================= -->
        <div class="bg-white rounded-2xl border shadow-sm p-5 sm:p-6 border-l-4 border-l-emerald-600">
            <div class="flex items-center justify-between mb-3 pb-2 border-b">
                <div>
                    <h3 class="text-base font-bold text-slate-900 flex items-center">
                        <i class="fas fa-inbox text-emerald-600 mr-2"></i>
                        የወላጆች ጥያቄዎች እና ፈቃዶች መቀበያ ሳጥን (Unit Leader Inbox)
                    </h3>
                    <p class="text-xs text-slate-500 mt-0.5">ከወላጆች በቀጥታ ለዲቪዥን ተጠሪው የተላኩ ማስታወሻዎች እዚህ ይወጣሉ፡</p>
                </div>
                <span class="text-xs bg-emerald-100 text-emerald-800 font-bold px-2.5 py-1 rounded-full">
                    {{ count($parentInquiries ?? []) }} መልእክቶች
                </span>
            </div>

            <!-- Parent Inquiries from MySQL -->
            <div class="space-y-2.5">
                @forelse($parentInquiries ?? [] as $inq)
                    <div class="p-3.5 bg-emerald-50/40 rounded-xl border border-emerald-100 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                        <div class="space-y-1">
                            <div class="flex items-center space-x-2">
                                <span class="text-xs font-black text-slate-900">{{ $inq->title }}</span>
                                <span class="text-[10px] bg-emerald-100 text-emerald-800 font-mono font-bold px-2 py-0.5 rounded">{{ $inq->sender_phone }}</span>
                                <span class="text-[10px] bg-white border border-emerald-300 text-emerald-700 px-1.5 py-0.5 rounded font-bold">{{ $inq->classroom_id }}</span>
                            </div>
                            <p class="text-xs text-slate-700 leading-relaxed">{{ $inq->message }}</p>
                            <span class="text-[10px] text-slate-400">የተላከው፡ {{ $inq->created_at }}</span>
                        </div>
                        <button onclick="this.innerText='ተረጋግጧል'; this.className='text-xs bg-emerald-600 text-white font-bold px-3 py-1.5 rounded-lg'; alert('የወላጁ መልእክት መታየቱ ተረጋግጧል!');" 
                                class="whitespace-nowrap text-xs bg-white border border-emerald-200 text-emerald-700 hover:bg-emerald-100 font-bold px-3 py-1.5 rounded-lg shadow-xs transition">
                            <i class="fas fa-check mr-1"></i>አይቻለሁ
                        </button>
                    </div>
                @empty
                    <!-- Clean Empty State -->
                    <div class="text-center py-6 text-slate-400">
                        <i class="fas fa-envelope-open text-2xl mb-1 text-slate-300"></i>
                        <p class="text-xs font-medium">እስካሁን ከወላጆች ለዲቪዥን ተጠሪው የተላከ አዲስ ጥያቄ ወይም የፈቃድ ማስታወሻ የለም።</p>
                        <p class="text-[10px] text-slate-400 mt-0.5">ወላጆች "ለዲቪዥን ተጠሪ" ብለው ሲጽፉ እዚህ ሳጥን ውስጥ በቅጽበት ይደርሶዎታል።</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- TEACHER ASSIGNMENT CARD -->
        <div class="bg-white rounded-2xl border shadow-sm p-6">
            <div class="flex items-center justify-between mb-4 pb-3 border-b">
                <div>
                    <h3 class="text-base font-bold text-slate-900 flex items-center">
                        <i class="fas fa-link text-emerald-600 mr-2"></i>
                        የ{{ $currentDiv['title'] }} መምህራን ሊንክ ማመንጫ ({{ $currentCampusName }})
                    </h3>
                    <p class="text-xs text-slate-500 mt-0.5">በዚህ ካምፓስ ስር ላሉ መምህራን የመግቢያ ሊንክ አመንጭተው ይላኩላቸው።</p>
                </div>
            </div>

            <div id="teachers-container" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div onclick="openModal('teacher-assign-modal')" class="p-6 border-2 border-dashed border-slate-300 hover:border-purple-500 bg-slate-50 hover:bg-purple-50/50 rounded-xl flex flex-col items-center justify-center text-center cursor-pointer transition">
                    <div class="w-10 h-10 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-base mb-2">
                        <i class="fas fa-plus"></i>
                    </div>
                    <span class="text-xs font-bold text-slate-800">አዲስ መምህር በክፍል መድብ</span>
                    <p class="text-[10px] text-slate-500 mt-1">ስም እና ክፍል አስገብተው ሊንክ ይውሰዱ</p>
                </div>
            </div>
        </div>
        @endif

        <!-- Real Database Metrics -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="bg-white p-5 rounded-2xl border shadow-xs">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">ክፍሎች / Classes</span>
                    <i class="fas fa-door-open text-purple-600"></i>
                </div>
                <h3 class="text-2xl font-black text-slate-900">{{ $students->pluck('classroom_id')->unique()->count() }}</h3>
                <span class="text-[10px] text-slate-400">የተመዘገቡ ክፍሎች</span>
            </div>

            <div class="bg-white p-5 rounded-2xl border shadow-xs">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">ተማሪዎች / Students</span>
                    <i class="fas fa-user-graduate text-blue-600"></i>
                </div>
                <h3 class="text-2xl font-black text-slate-900">{{ $students->count() }}</h3>
                <span class="text-[10px] text-slate-400">በዳታቤዝ ያሉ ተማሪዎች</span>
            </div>

            <div class="bg-white p-5 rounded-2xl border shadow-xs">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">የተጠሪው ሳጥን</span>
                    <i class="fas fa-inbox text-emerald-600"></i>
                </div>
                <h3 class="text-2xl font-black text-emerald-600">{{ count($parentInquiries ?? []) }}</h3>
                <span class="text-[10px] text-slate-400">ከወላጅ የመጡ ማስታወሻዎች</span>
            </div>

            <div class="bg-white p-5 rounded-2xl border shadow-xs">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">የትምህርት ዘመን</span>
                    <i class="far fa-calendar-check text-purple-600"></i>
                </div>
                <h3 class="text-2xl font-black text-purple-700">2019</h3>
                <span class="text-[10px] text-purple-500 font-bold">ዓ.ም (Active)</span>
            </div>
        </div>

        <!-- Dynamic Moving Ad Carousel -->
        @include('partials.ad-slider', ['sliderId' => 'admin-slider'])

        <!-- STUDENTS ROSTER TABLE -->
        <div class="bg-white rounded-2xl border shadow-sm p-6">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-4 pb-3 border-b">
                <div>
                    <h3 class="text-base font-bold text-slate-900 flex items-center">
                        <i class="fas fa-users text-blue-600 mr-2"></i>
                        የተማሪዎች ስም ዝርዝር እና የወላጅ መግቢያ መለያ (Students Roster & IDs)
                    </h3>
                    <p class="text-xs text-slate-500 mt-0.5">የተመዘገቡ ተማሪዎችን ይመልከቱ፣ ያርትዑ (Edit) ወይም ይሰርዙ (Delete)</p>
                </div>
                <div class="flex items-center space-x-2">
                    <button onclick="openModal('student-modal')" class="bg-purple-600 hover:bg-purple-700 text-white text-xs font-bold px-3.5 py-2 rounded-xl transition shadow flex items-center space-x-1.5">
                        <i class="fas fa-user-plus"></i>
                        <span>አዲስ ተማሪ መዝግብ</span>
                    </button>
                    <button onclick="openModal('excel-modal')" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-3.5 py-2 rounded-xl transition shadow flex items-center space-x-1.5">
                        <i class="fas fa-file-excel"></i>
                        <span>ከ Excel ጫን</span>
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="text-slate-500 border-b bg-slate-50">
                            <th class="p-3">የተማሪው ሙሉ ስም</th>
                            <th class="p-3">ክፍል / Section</th>
                            <th class="p-3">የወላጅ ስልክ (Username)</th>
                            <th class="p-3">የተማሪ መለያ ቁጥር (Password/ID)</th>
                            <th class="p-3 text-right">እርምጃዎች</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y text-slate-700">
                        @forelse($students as $s)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="p-3 font-bold text-slate-900">
                                    <i class="fas fa-user-graduate text-slate-400 mr-1.5"></i>
                                    {{ $s->first_name }} {{ $s->last_name }}
                                </td>
                                <td class="p-3"><span class="bg-purple-100 text-purple-800 font-bold px-2 py-0.5 rounded">{{ $s->classroom_id }}</span></td>
                                <td class="p-3 font-mono text-blue-700 font-bold">{{ $s->parent_phone ?? 'ስልክ የለም' }}</td>
                                <td class="p-3 font-mono text-emerald-700 font-black bg-emerald-50 px-2 py-1 rounded w-fit">{{ $s->student_id_number }}</td>
                                <td class="p-3 text-right space-x-1.5">
                                    <button onclick="openEditStudentModal('{{ $s->id }}', '{{ $s->first_name }}', '{{ $s->last_name }}', '{{ $s->classroom_id }}', '{{ $s->student_id_number }}', '{{ $s->parent_phone }}')" 
                                            class="text-amber-600 hover:text-amber-700 font-bold bg-amber-50 px-2.5 py-1 rounded-lg border border-amber-200">
                                        <i class="fas fa-edit mr-0.5"></i>አስተካክል
                                    </button>
                                    <form action="/students/delete" method="POST" onsubmit="return confirm('ተማሪ {{ $s->first_name }} ይሰረዝ?');" class="inline">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $s->id }}">
                                        <button type="submit" class="text-rose-600 hover:text-rose-700 font-bold bg-rose-50 px-2 py-1 rounded-lg border border-rose-200">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-slate-400">
                                    <i class="fas fa-user-friends text-3xl mb-2 text-slate-300 block"></i>
                                    እስካሁን የተመዘገበ ተማሪ የለም።
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <!-- ==================== MODALS ==================== -->

    <!-- STUDENT MODAL -->
    <div id="student-modal" class="hidden fixed inset-0 z-50 bg-black/70 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-xl border max-h-[90vh] overflow-y-auto">
            <div class="flex items-center justify-between pb-3 border-b">
                <h3 class="font-bold text-sm text-slate-900 flex items-center">
                    <i class="fas fa-user-plus text-purple-600 mr-2"></i>
                    አዲስ ተማሪ መመዝገቢያ (MySQL Database)
                </h3>
                <button onclick="closeModal('student-modal')" class="text-slate-400 hover:text-slate-600">✕</button>
            </div>
            
            <form action="/students/store" method="POST" class="my-4 space-y-3">
                @csrf
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[11px] font-bold text-slate-600 mb-1">የተማሪው ስም</label>
                        <input type="text" name="first_name" placeholder="ምሳሌ፡ ዮናስ" required class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs font-semibold">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-slate-600 mb-1">የአባት ስም</label>
                        <input type="text" name="last_name" placeholder="ምሳሌ፡ ዳዊት" required class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs font-semibold">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[11px] font-bold text-slate-600 mb-1">ክፍልና ሴክሽን</label>
                        <input type="text" name="class_name" placeholder="ምሳሌ፡ ክፍል 7-B ወይም KG 2-A" required class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs font-bold text-purple-700">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-slate-600 mb-1">የወላጅ ስም</label>
                        <input type="text" name="parent_name" placeholder="ምሳሌ፡ አቶ ዳዊት በቀለ" class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs">
                    </div>
                </div>

                <div class="p-3 bg-blue-50/60 rounded-xl border border-blue-200 space-y-2">
                    <p class="text-[11px] font-bold text-blue-900">የወላጅ መግቢያ መለያዎች (Credentials):</p>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label class="block text-[10px] font-bold text-slate-600 mb-0.5">የወላጅ ስልክ (Username)</label>
                            <input type="text" name="phone" placeholder="09xxxxxxxx" required class="w-full p-2 bg-white border rounded-lg text-xs font-mono font-bold">
                        </div>
                        <div>
                            <label class="block text-[10px] font-bold text-slate-600 mb-0.5">የተማሪ መለያ ቁጥር (ID/Password)</label>
                            <input type="text" name="student_id_number" placeholder="ምሳሌ፡ 1001" required class="w-full p-2 bg-white border rounded-lg text-xs font-mono font-black text-emerald-800 uppercase">
                        </div>
                    </div>
                </div>

                <button type="submit" class="w-full py-2.5 rounded-xl text-xs font-bold text-white bg-purple-600 hover:bg-purple-700 shadow mt-2">
                    ተማሪውን ዳታቤዝ ላይ መዝግብ (Save to Database)
                </button>
            </form>
        </div>
    </div>

    <!-- EDIT STUDENT MODAL -->
    <div id="edit-student-modal" class="hidden fixed inset-0 z-50 bg-black/70 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-xl border">
            <div class="flex items-center justify-between pb-3 border-b">
                <h3 class="font-bold text-sm text-slate-900">የተማሪ መረጃ ማስተካከያ</h3>
                <button onclick="closeModal('edit-student-modal')" class="text-slate-400 hover:text-slate-600">✕</button>
            </div>
            <form action="/students/update" method="POST" class="my-4 space-y-3">
                @csrf
                <input type="hidden" name="id" id="edit-student-id">
                <div class="grid grid-cols-2 gap-2">
                    <input type="text" name="first_name" id="edit-student-first" placeholder="የተማሪ ስም" required class="p-2 bg-slate-50 border rounded-lg text-xs">
                    <input type="text" name="last_name" id="edit-student-last" placeholder="የአባት ስም" required class="p-2 bg-slate-50 border rounded-lg text-xs">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-600 mb-0.5">ክፍል</label>
                    <input type="text" name="class_name" id="edit-student-class" required class="w-full p-2 bg-slate-50 border rounded-lg text-xs font-bold">
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label class="block text-[10px] font-bold text-slate-600 mb-0.5">የወላጅ ስልክ</label>
                        <input type="text" name="phone" id="edit-student-phone" required class="w-full p-2 bg-slate-50 border rounded-lg text-xs font-mono font-bold">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-slate-600 mb-0.5">Student ID</label>
                        <input type="text" name="student_id_number" id="edit-student-code" required class="w-full p-2 bg-slate-50 border rounded-lg text-xs font-mono font-bold text-emerald-800">
                    </div>
                </div>
                <button type="submit" class="w-full py-2 rounded-xl text-xs font-bold text-white bg-amber-600 hover:bg-amber-700 shadow mt-2">
                    ለውጦችን መዝግብ (Update)
                </button>
            </form>
        </div>
    </div>

    <!-- EXCEL MODAL -->
    <div id="excel-modal" class="hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-xl border">
            <div class="flex items-center justify-between pb-3 border-b">
                <h3 class="font-bold text-sm text-slate-900 flex items-center">
                    <i class="fas fa-file-excel text-emerald-600 text-base mr-2"></i>
                    የተማሪዎች መረጃ ከ Excel መጫኛ
                </h3>
                <button onclick="closeModal('excel-modal')" class="text-slate-400 hover:text-slate-600 text-lg">✕</button>
            </div>
            <div class="my-4 space-y-4">
                <div class="flex items-center justify-between text-xs p-3 bg-slate-50 rounded-xl border">
                    <span class="text-slate-600 font-medium">የተዘጋጀ የናሙና Excel ቅጽ ያውርዱ፡</span>
                    <a href="data:text/csv;charset=utf-8,StudentName,Grade,Section,Gender,ParentPhone,StudentID%0Aዮናስ ዳዊት,Grade 7,B,Male,0911000000,1001" 
                       download="smartdebter_sample_students.csv" class="text-emerald-700 font-bold hover:underline flex items-center space-x-1">
                        <i class="fas fa-download"></i><span>Sample.csv</span>
                    </a>
                </div>
                <div class="border-2 border-dashed border-emerald-300 bg-emerald-50/40 rounded-2xl p-6 text-center hover:bg-emerald-50/70 transition cursor-pointer" onclick="document.getElementById('excel-file-input').click()">
                    <i class="fas fa-cloud-upload-alt text-3xl text-emerald-600 mb-2"></i>
                    <p class="text-xs font-bold text-slate-800">የ Excel ፋይሉን እዚህ ይጎትቱ ወይም ይምረጡ</p>
                    <input type="file" id="excel-file-input" class="hidden" accept=".xlsx, .xls, .csv" onchange="fileSelected(this)">
                </div>
                <p id="file-name-display" class="text-xs text-emerald-700 font-bold text-center hidden"></p>
            </div>
            <div class="flex items-center justify-end space-x-2 pt-2 border-t">
                <button onclick="closeModal('excel-modal')" class="px-4 py-2 rounded-xl text-xs font-bold text-slate-600 bg-slate-100">ይቅር</button>
                <button onclick="simulateUpload()" class="px-5 py-2 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow">ጫን</button>
            </div>
        </div>
    </div>

    <!-- TEACHER ASSIGN MODAL -->
    <div id="teacher-assign-modal" class="hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-sm w-full p-6 shadow-xl border">
            <div class="flex items-center justify-between pb-3 border-b">
                <h3 class="font-bold text-sm text-slate-900">አዲስ መምህር በክፍል መድብ</h3>
                <button onclick="closeModal('teacher-assign-modal')" class="text-slate-400 hover:text-slate-600 text-lg">✕</button>
            </div>
            <form action="#" onsubmit="event.preventDefault(); addTeacher();" class="my-4 space-y-3">
                <input type="text" id="assign-teacher-name" placeholder="የመምህሩ ሙሉ ስም" required class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs">
                <input type="text" id="assign-teacher-class" placeholder="የተመደበበት ክፍል (ምሳሌ፡ ክፍል 7-B)" required class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs font-bold text-purple-700">
                <button type="submit" class="w-full py-2.5 rounded-xl text-xs font-bold text-white bg-purple-600 hover:bg-purple-700 shadow">ሊንክ አመንጭ</button>
            </form>
        </div>
    </div>

    <!-- Mela Solution Shared Footer -->
    @include('partials.footer')

    <!-- Scripts -->
    <script>
        function openModal(id) { document.getElementById(id).classList.remove('hidden'); }
        function closeModal(id) { document.getElementById(id).classList.add('hidden'); }

        function openEditStudentModal(id, first, last, cls, code, phone) {
            document.getElementById('edit-student-id').value = id;
            document.getElementById('edit-student-first').value = first;
            document.getElementById('edit-student-last').value = last;
            document.getElementById('edit-student-class').value = cls;
            document.getElementById('edit-student-code').value = code;
            document.getElementById('edit-student-phone').value = phone;
            openModal('edit-student-modal');
        }

        function toggleLanguage(btn) {
            const label = document.getElementById('lang-label');
            label.innerText = (label.innerText === 'English') ? 'አማርኛ' : 'English';
        }

        function copyParentBroadcastMessage(schoolName, schoolCode) {
            const link = `https://smart-debter-ethiopia.vercel.app/login?role=parent&school=${schoolCode}&school_name=${encodeURIComponent(schoolName)}`;
            const message = `📢 ክቡራን የ${schoolName} ወላጆች (2019 ዓ.ም)፡\n\nየልጅዎን የዕለት ውሎ፣ የቤት ስራ እና ማስታወሻዎች በስልክዎ ለመከታተል የትምህርት ቤታችንን የዲጂታል ግንኙነት ደብተር ይጠቀሙ።\n\n👉 የመግቢያ ሊንክ፡\n${link}\n\n👤 ተጠቃሚ ስም (Username)፡ በት/ቤቱ ያስመዘገቡት ስልክ ቁጥር\n🔑 የይለፍ ቃል (Password)፡ የልጅዎ የተማሪ መለያ ቁጥር (Student ID)\n\n-${schoolName} አስተዳደር-`;
            navigator.clipboard.writeText(message);
            alert('🎉 የቴሌግራም መልእክቱ ተገልብጧል!');
        }

        function copyParentLink(schoolCode, schoolName) {
            const link = `https://smart-debter-ethiopia.vercel.app/login?role=parent&school=${schoolCode}&school_name=${encodeURIComponent(schoolName)}`;
            navigator.clipboard.writeText(link);
            alert('የወላጆች መግቢያ ሊንክ ተገልብጧል!');
        }

        function generateLeaderLink(divCode) {
            const input = document.getElementById('leader-name-' + divCode);
            const leaderName = input.value.trim();
            if (!leaderName) {
                alert('እባክዎ መጀመሪያ የተጠሪውን ስም ያስገቡ!');
                input.focus();
                return;
            }
            const schoolCode = '{{ $schoolCode }}';
            const schoolName = '{{ $schoolName }}';
            const currentCampus = '{{ $campus }}';
            const link = `https://smart-debter-ethiopia.vercel.app/dashboard/admin?school=${schoolCode}&campus=${currentCampus}&division=${divCode}&leader=${encodeURIComponent(leaderName)}&school_name=${encodeURIComponent(schoolName)}`;
            navigator.clipboard.writeText(link);
            alert(`🎉 የ ${leaderName} የዲቪዥን ሊንክ ተገልብጧል!`);
        }

        function fileSelected(input) {
            if (input.files && input.files[0]) {
                const display = document.getElementById('file-name-display');
                display.classList.remove('hidden');
                display.innerText = 'የተመረጠው ፋይል: ' + input.files[0].name;
            }
        }

        function simulateUpload() {
            alert('🎉 ተማሪዎች በ Excel ተጭነዋል!');
            closeModal('excel-modal');
        }

        function addTeacher() {
            const name = document.getElementById('assign-teacher-name').value;
            const cls = document.getElementById('assign-teacher-class').value;
            const card = document.createElement('div');
            card.className = 'p-4 bg-slate-50 rounded-xl border flex flex-col justify-between space-y-3';
            const link = `https://smart-debter-ethiopia.vercel.app/teacher/entry?class=${encodeURIComponent(cls)}&name=${encodeURIComponent(name)}`;
            card.innerHTML = `
                <div>
                    <span class="text-xs font-bold text-slate-900">${name}</span>
                    <span class="text-[10px] font-bold bg-purple-100 text-purple-700 px-2 py-0.5 rounded ml-1">${cls}</span>
                </div>
                <div class="flex items-center space-x-1.5">
                    <input type="text" readonly value="${link}" class="text-[10px] bg-white border p-1 rounded flex-1 text-slate-600 select-all font-mono">
                    <button onclick="navigator.clipboard.writeText('${link}'); alert('ሊንክ ተገልብጧል!');" class="text-xs bg-emerald-600 text-white font-bold p-1 rounded"><i class="fas fa-copy"></i></button>
                </div>
            `;
            document.getElementById('teachers-container').prepend(card);
            closeModal('teacher-assign-modal');
            alert('መምህሩ ተመድቧል!');
        }

        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => { navigator.serviceWorker.register('/sw.js'); });
        }
    </script>

</body>
</html>
