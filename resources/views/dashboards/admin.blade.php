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
        $schoolName = $school->name ?? request('school_name', 'ብስራተ ገብርኤል ት/ቤት');
        $schoolCode = $school->code ?? request('school', 'BG-001');
        $division = request('division', 'all');
        $leaderName = request('leader', '');

        $divisionMap = [
            'all' => [
                'title' => 'ዋና ርዕሰ-መምህር (General Director)',
                'role_badge' => 'ዋና አስተዳዳሪ (General Principal)',
                'icon' => 'fa-crown',
                'badge' => 'bg-purple-100 text-purple-800 border-purple-300'
            ],
            'kg' => [
                'title' => 'የኬጂ ዲቪዥን ተጠሪ (የህፃናት & KG 1-3)',
                'role_badge' => 'KG Unit Leader',
                'icon' => 'fa-baby',
                'badge' => 'bg-pink-100 text-pink-800 border-pink-300'
            ],
            '1-4' => [
                'title' => 'የ 1ኛ - 4ኛ ዲቪዥን ተጠሪ (Lower Primary)',
                'role_badge' => 'Grade 1-4 Leader',
                'icon' => 'fa-child',
                'badge' => 'bg-blue-100 text-blue-800 border-blue-300'
            ],
            '5-8' => [
                'title' => 'የ 5ኛ - 8ኛ ዲቪዥን ተጠሪ (Middle School)',
                'role_badge' => 'Grade 5-8 Leader',
                'icon' => 'fa-book-open',
                'badge' => 'bg-emerald-100 text-emerald-800 border-emerald-300'
            ],
            '9-12' => [
                'title' => 'የ 9ኛ - 12ኛ ዲቪዥን ተጠሪ (High School)',
                'role_badge' => 'Grade 9-12 Leader',
                'icon' => 'fa-user-graduate',
                'badge' => 'bg-amber-100 text-amber-800 border-amber-300'
            ]
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
                        <span class="text-[10px] {{ $currentDiv['badge'] }} border px-2 py-0.5 rounded-full font-bold">
                            {{ $leaderName ? $leaderName . ' (' . $currentDiv['role_badge'] . ')' : $currentDiv['title'] }}
                        </span>
                    </div>
                    <p class="text-[11px] text-slate-500 font-medium">ኮድ፡ <b class="text-purple-700 font-mono">{{ $schoolCode }}</b> • SmartDebter Portal</p>
                </div>
            </div>

            <div class="flex items-center space-x-3 w-full sm:w-auto justify-between sm:justify-end">
                <div class="flex items-center space-x-2 bg-slate-50 border border-slate-200 px-3 py-1.5 rounded-xl text-xs">
                    <span class="text-emerald-700 font-bold flex items-center">
                        <i class="far fa-calendar-alt mr-1"></i> 🇪🇹 የካቲት 2017 ዓ.ም
                    </span>
                    <span class="text-slate-300">|</span>
                    <span class="text-slate-500 font-medium">Feb 2025</span>
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

        @if($division == 'all')
            <!-- ONBOARDING FOR GENERAL PRINCIPAL -->
            <div class="bg-gradient-to-r from-purple-900 via-indigo-900 to-slate-900 rounded-2xl p-5 sm:p-6 text-white shadow-sm flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div class="space-y-1">
                    <div class="flex items-center space-x-2">
                        <span class="text-xl">👑</span>
                        <h3 class="text-base font-bold">የዋና ርዕሰ-መምህር ማዕከል (General Director Hub)</h3>
                    </div>
                    <p class="text-xs text-purple-200 leading-relaxed max-w-2xl">
                        እዚህ ሆነው ለወላጆች የሚላከውን የመግቢያ ሊንክ ለቻናል ያሰራጩ፤ የ 4ቱን ዲቪዥኖች ተጠሪዎች (Unit Leaders) በስማቸው መድበው ሊንካቸውን ይላኩላቸው።
                    </p>
                </div>
                <button onclick="openModal('excel-modal')" class="whitespace-nowrap text-xs font-bold bg-amber-400 hover:bg-amber-300 text-slate-950 px-4 py-2.5 rounded-xl transition shadow flex items-center space-x-1.5 shrink-0">
                    <i class="fas fa-file-excel"></i>
                    <span>የሁሉንም ተማሪዎች Excel ጫን</span>
                </button>
            </div>

            <!-- ================= SECTION 1: PARENT PORTAL BROADCAST CARD (ለቴሌግራም/SMS የሚላከው ዝግጁ መልእክት) ================= -->
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

                <!-- Preview of the text message -->
                <div class="mt-4 p-3.5 bg-black/40 rounded-xl border border-blue-900/60 text-xs text-slate-300 font-sans space-y-1.5 leading-relaxed">
                    <p class="font-bold text-white">📢 ክቡራን የ{{ $schoolName }} ወላጆች፡</p>
                    <p>የልጅዎን የዕለት ውሎ፣ የቤት ስራ እና ማስታወሻዎች በስልክዎ ለመከታተል የትምህርት ቤታችንን የዲጂታል ግንኙነት ደብተር ይጠቀሙ።</p>
                    <p class="text-blue-300 font-mono font-bold">👉 የመግቢያ ሊንክ፡ https://smart-debter-ethiopia.vercel.app/login?role=parent&school={{ $schoolCode }}&school_name={{ urlencode($schoolName) }}</p>
                    <p>👤 <b>ተጠቃሚ ስም (Username)፡</b> በት/ቤቱ ያስመዘገቡት ስልክ ቁጥር</p>
                    <p>🔑 <b>የይለፍ ቃል (Password)፡</b> የልጅዎ የተማሪ መለያ ቁጥር (Student ID)</p>
                </div>
            </div>

            <!-- ================= SECTION 2: ASSIGN UNIT LEADERS (የ 4ቱ ዲቪዥን ተጠሪዎች ምደባ) ================= -->
            <div class="bg-white rounded-2xl border shadow-sm p-6">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-2 mb-4 pb-3 border-b">
                    <div>
                        <h3 class="text-base font-bold text-slate-900 flex items-center">
                            <i class="fas fa-users-cog text-purple-600 mr-2"></i>
                            የዲቪዥን ተጠሪዎች (Unit Leaders) ምደባ እና የመግቢያ ሊንክ
                        </h3>
                        <p class="text-xs text-slate-500 mt-0.5">ለእያንዳንዱ ዲቪዥን ኃላፊ በስሙ/በስሟ ሊንክ ያመንጩና በቴሌግራም/SMS ይላኩላቸው፡</p>
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
                                    <h4 class="text-xs font-bold text-slate-900">የኬጂ ዲቪዥን ተጠሪ (KG Unit Leader)</h4>
                                    <p class="text-[10px] text-slate-500">የህፃናት ማቆያ እና KG 1 - 3 ኃላፊ</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input type="text" id="leader-name-kg" placeholder="የተጠሪዋ ስም (ምሳሌ፡ ወ/ሮ ሰላማዊት)" 
                                   class="text-xs p-2 bg-white border border-slate-200 rounded-lg flex-1">
                            <button onclick="generateLeaderLink('kg')" class="bg-pink-600 hover:bg-pink-700 text-white text-xs font-bold px-3 py-2 rounded-lg transition shadow-xs">
                                ሊንክ ውሰድ
                            </button>
                        </div>
                    </div>

                    <!-- 1-4 Leader -->
                    <div class="p-4 rounded-xl border border-blue-200 bg-blue-50/40 flex flex-col justify-between space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <span class="w-8 h-8 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center font-bold">🎒</span>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900">የ 1ኛ - 4ኛ ዲቪዥን ተጠሪ (Lower Primary)</h4>
                                    <p class="text-[10px] text-slate-500">የ 1ኛ እስከ 4ኛ ክፍል ኃላፊ</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input type="text" id="leader-name-1-4" placeholder="የተጠሪው ስም (ምሳሌ፡ አቶ ከበደ)" 
                                   class="text-xs p-2 bg-white border border-slate-200 rounded-lg flex-1">
                            <button onclick="generateLeaderLink('1-4')" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold px-3 py-2 rounded-lg transition shadow-xs">
                                ሊንክ ውሰድ
                            </button>
                        </div>
                    </div>

                    <!-- 5-8 Leader -->
                    <div class="p-4 rounded-xl border border-emerald-200 bg-emerald-50/40 flex flex-col justify-between space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <span class="w-8 h-8 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold">📚</span>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900">የ 5ኛ - 8ኛ ዲቪዥን ተጠሪ (Middle School)</h4>
                                    <p class="text-[10px] text-slate-500">የ 5ኛ እስከ 8ኛ ክፍል ኃላፊ</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input type="text" id="leader-name-5-8" placeholder="የተጠሪው ስም (ምሳሌ፡ መምህር ግርማ)" 
                                   class="text-xs p-2 bg-white border border-slate-200 rounded-lg flex-1">
                            <button onclick="generateLeaderLink('5-8')" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-3 py-2 rounded-lg transition shadow-xs">
                                ሊንክ ውሰድ
                            </button>
                        </div>
                    </div>

                    <!-- 9-12 Leader -->
                    <div class="p-4 rounded-xl border border-amber-200 bg-amber-50/40 flex flex-col justify-between space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <span class="w-8 h-8 rounded-xl bg-amber-100 text-amber-700 flex items-center justify-center font-bold">🎓</span>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900">የ 9ኛ - 12ኛ ዲቪዥን ተጠሪ (High School)</h4>
                                    <p class="text-[10px] text-slate-500">የ 9ኛ እስከ 12ኛ ክፍል ኃላፊ</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <input type="text" id="leader-name-9-12" placeholder="የተጠሪው ስም (ምሳሌ፡ አቶ ታደሰ)" 
                                   class="text-xs p-2 bg-white border border-slate-200 rounded-lg flex-1">
                            <button onclick="generateLeaderLink('9-12')" class="bg-amber-600 hover:bg-amber-700 text-white text-xs font-bold px-3 py-2 rounded-lg transition shadow-xs">
                                ሊንክ ውሰድ
                            </button>
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
                        በዚህ ዲቪዥን ስር ላሉት መምህራን በስማቸው ሊንክ ያመንጩ፤ የተማሪዎችንም የቤት ስራ እና እንቅስቃሴ ይከታተሉ።
                    </p>
                </div>
                <button onclick="openModal('teacher-assign-modal')" class="whitespace-nowrap text-xs font-bold bg-amber-400 hover:bg-amber-300 text-slate-950 px-4 py-2.5 rounded-xl transition shadow flex items-center space-x-1.5 shrink-0">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>መምህር መድብ እና ሊንክ አመንጭ</span>
                </button>
            </div>

            <!-- TEACHER ASSIGNMENT CARD FOR THIS DIVISION ONLY -->
            <div class="bg-white rounded-2xl border shadow-sm p-6">
                <div class="flex items-center justify-between mb-4 pb-3 border-b">
                    <div>
                        <h3 class="text-base font-bold text-slate-900 flex items-center">
                            <i class="fas fa-link text-emerald-600 mr-2"></i>
                            የ{{ $currentDiv['title'] }} መምህራን ሊንክ ማመንጫ
                        </h3>
                        <p class="text-xs text-slate-500 mt-0.5">በዚህ ዲቪዥን ስር ላሉ መምህራን በስማቸው የመግቢያ ሊንክ ሰጥተው ወደ ክፍላቸው ይላኩ።</p>
                    </div>
                </div>

                <div id="teachers-container" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div onclick="openModal('teacher-assign-modal')" class="p-6 border-2 border-dashed border-slate-300 hover:border-purple-500 bg-slate-50 hover:bg-purple-50/50 rounded-xl flex flex-col items-center justify-center text-center cursor-pointer transition">
                        <div class="w-10 h-10 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-base mb-2">
                            <i class="fas fa-plus"></i>
                        </div>
                        <span class="text-xs font-bold text-slate-800">አዲስ መምህር በክፍል መድብ</span>
                        <p class="text-[10px] text-slate-500 mt-1">የመምህሩን ስም እና ክፍል አስገብተው ሊንክ ይውሰዱ</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Clean Metrics -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="bg-white p-5 rounded-2xl border shadow-xs">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">ክፍሎች / Classes</span>
                    <i class="fas fa-door-open text-purple-600"></i>
                </div>
                <h3 id="class-count" class="text-2xl font-black text-slate-900">0</h3>
                <span class="text-[10px] text-slate-400">{{ $currentDiv['title'] }}</span>
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
                <span class="text-[10px] text-slate-400">የዲቪዥኑ መምህራን</span>
            </div>

            <div class="bg-white p-5 rounded-2xl border shadow-xs">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">የወላጆች ፊርማ</span>
                    <i class="fas fa-signature text-amber-600"></i>
                </div>
                <h3 id="sign-rate" class="text-2xl font-black text-slate-400">0%</h3>
                <span class="text-[10px] text-slate-400">የወላጆች ምላሽ</span>
            </div>
        </div>

        <!-- Dynamic Moving Ad Carousel -->
        @include('partials.ad-slider', ['sliderId' => 'admin-slider'])

        <!-- Student & Section Action Bar -->
        <div class="bg-white rounded-2xl border shadow-sm p-5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <h3 class="text-sm font-bold text-slate-900 flex items-center">
                    <i class="fas fa-user-graduate text-purple-600 mr-2"></i>
                    የተማሪዎች እና ክፍሎች አስተዳደር
                </h3>
                <p class="text-xs text-slate-500 mt-0.5">የተማሪዎችን መረጃ በ Excel ይጫኑ ወይም አዲስ ተማሪና ሴክሽን ይመዝግቡ</p>
            </div>
            <div class="flex flex-wrap items-center gap-2">
                <button onclick="openModal('excel-modal')" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-3.5 py-2 rounded-xl transition shadow-xs flex items-center space-x-1.5">
                    <i class="fas fa-file-excel text-sm"></i>
                    <span>ከ Excel ጫን</span>
                </button>
                <button onclick="openModal('student-modal')" class="bg-purple-600 hover:bg-purple-700 text-white text-xs font-bold px-3.5 py-2 rounded-xl transition shadow-xs flex items-center space-x-1.5">
                    <i class="fas fa-user-plus"></i>
                    <span>አዲስ ተማሪ መዝግብ</span>
                </button>
            </div>
        </div>

        <!-- Internal Announcements -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl border shadow-sm p-5 md:col-span-1">
                <h3 class="text-sm font-bold text-slate-900 mb-2 flex items-center">
                    <i class="fas fa-bullhorn text-indigo-600 mr-2"></i>
                    አስቸኳይ ማስታወቂያ (Circular)
                </h3>
                <p class="text-xs text-slate-500 mb-3 leading-relaxed">ይህ መልእክት በሙሉ {{ $currentDiv['title'] }} ላሉ ወላጆች ብቻ ይለጠፋል።</p>
                
                <form action="#" onsubmit="event.preventDefault(); postNotice(this);" class="space-y-3">
                    <input type="text" id="notice-title" placeholder="የማስታወቂያው ርዕስ..." required
                           class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs focus:ring-2 focus:ring-purple-500 focus:outline-none">
                    <textarea rows="3" id="notice-msg" placeholder="ዝርዝር መልእክት እዚህ ይጻፉ..." required
                              class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs focus:ring-2 focus:ring-purple-500 focus:outline-none"></textarea>
                    <button type="submit" class="w-full py-2.5 rounded-xl bg-purple-600 hover:bg-purple-700 text-white font-bold text-xs shadow transition">
                        ለወላጆች አሰራጭ
                    </button>
                </form>
            </div>

            <div class="bg-white rounded-2xl border shadow-sm p-5 md:col-span-2 flex flex-col justify-between">
                <div>
                    <h3 class="text-sm font-bold text-slate-900 mb-3 flex items-center justify-between">
                        <span>የተላኩ ሰርኩላሮች</span>
                        <span class="text-[11px] text-purple-600 font-semibold">{{ $schoolName }}</span>
                    </h3>

                    <div id="circulars-list" class="space-y-3">
                        <div id="empty-notice" class="text-center py-8 text-slate-400">
                            <i class="fas fa-clipboard-list text-3xl mb-2 text-slate-300"></i>
                            <p class="text-xs font-medium">በዚህ ክፍል ውስጥ እስካሁን የተላከ ማስታወቂያ የለም።</p>
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
                    የተማሪዎች መረጃ ከ Excel መጫኛ
                </h3>
                <button onclick="closeModal('excel-modal')" class="text-slate-400 hover:text-slate-600 text-lg">✕</button>
            </div>

            <div class="my-4 space-y-4">
                <div class="flex items-center justify-between text-xs p-3 bg-slate-50 rounded-xl border">
                    <span class="text-slate-600 font-medium">የተዘጋጀ የናሙና Excel ቅጽ ያውርዱ፡</span>
                    <a href="data:text/csv;charset=utf-8,StudentName,Grade,Section,Gender,ParentPhone,StudentID%0Aዮናስ ዳዊት,Grade 7,B,Male,0911000000,1001%0Aሳራ ዳዊት,Grade 3,A,Female,0922000000,1002" 
                       download="smartdebter_sample_students.csv" 
                       class="text-emerald-700 font-bold hover:underline flex items-center space-x-1">
                        <i class="fas fa-download"></i>
                        <span>Sample.csv</span>
                    </a>
                </div>

                <div class="border-2 border-dashed border-emerald-300 bg-emerald-50/40 rounded-2xl p-6 text-center hover:bg-emerald-50/70 transition cursor-pointer"
                     onclick="document.getElementById('excel-file-input').click()">
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

    <!-- 2. STUDENT MODAL -->
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
                    <input type="text" placeholder="ክፍል (ምሳሌ፡ 7 ወይም KG 2)" required class="p-2.5 bg-slate-50 border rounded-xl text-xs">
                    <input type="text" placeholder="ሴክሽን (ምሳሌ፡ A)" required class="p-2.5 bg-slate-50 border rounded-xl text-xs">
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <input type="text" placeholder="የወላጅ ስልክ ቁጥር (09xxxxxxxx)" required class="p-2.5 bg-slate-50 border rounded-xl text-xs">
                    <input type="text" placeholder="የተማሪ መለያ ቁጥር (ID: ምሳሌ 1001)" required class="p-2.5 bg-slate-50 border rounded-xl text-xs font-bold text-blue-900">
                </div>
                <button type="submit" class="w-full py-2.5 rounded-xl text-xs font-bold text-white bg-purple-600 hover:bg-purple-700 shadow">ተማሪ መዝግብ</button>
            </form>
        </div>
    </div>

    <!-- 3. TEACHER MODAL -->
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

        function toggleLanguage(btn) {
            const label = document.getElementById('lang-label');
            label.innerText = (label.innerText === 'English') ? 'አማርኛ' : 'English';
        }

        // 1. COPY PARENT BROADCAST READY-MADE MESSAGE (ቴሌግራም ላይ የሚለጠፈውን መልእክት መቅጃ)
        function copyParentBroadcastMessage(schoolName, schoolCode) {
            const link = `https://smart-debter-ethiopia.vercel.app/login?role=parent&school=${schoolCode}&school_name=${encodeURIComponent(schoolName)}`;
            
            const message = `📢 ክቡራን የ${schoolName} ወላጆች፡\n\nየልጅዎን የዕለት ውሎ፣ የቤት ስራ እና ማስታወሻዎች በስልክዎ በቀጥታ ለመከታተል የትምህርት ቤታችንን የዲጂታል ግንኙነት ደብተር (SmartDebter) ይጠቀሙ።\n\n👉 የመግቢያ ሊንክ፡\n${link}\n\n👤 ተጠቃሚ ስም (Username)፡ በት/ቤቱ ያስመዘገቡት ስልክ ቁጥር\n🔑 የይለፍ ቃል (Password)፡ የልጅዎ የተማሪ መለያ ቁጥር (Student ID)\n\n-${schoolName} አስተዳደር-`;

            navigator.clipboard.writeText(message);
            alert('🎉 የቴሌግራም/SMS መልእክቱ ተገልብጧል (Copied)! በት/ቤትዎ የቴሌግራም ቻናል ላይ መለጠፍ ይችላሉ።');
        }

        function copyParentLink(schoolCode, schoolName) {
            const link = `https://smart-debter-ethiopia.vercel.app/login?role=parent&school=${schoolCode}&school_name=${encodeURIComponent(schoolName)}`;
            navigator.clipboard.writeText(link);
            alert('የወላጆች መግቢያ ሊንክ ተገልብጧል!');
        }

        // GENERATE UNIT LEADER LINK
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
            const link = `https://smart-debter-ethiopia.vercel.app/dashboard/admin?school=${schoolCode}&division=${divCode}&leader=${encodeURIComponent(leaderName)}&school_name=${encodeURIComponent(schoolName)}`;

            navigator.clipboard.writeText(link);
            alert(`🎉 የ ${leaderName} የዲቪዥን ሊንክ ተገልብጧል! በቴሌግራም ወይም SMS ይላኩላቸው።`);
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
                alert('እባክዎ መጀመሪያ የ Excel ፋይል ይምረጡ!');
                return;
            }
            document.getElementById('student-count').innerText = '120';
            document.getElementById('class-count').innerText = '6';
            alert('🎉 ተማሪዎች በ Excel ተጭነዋል!');
            closeModal('excel-modal');
        }

        function addSingleStudent() {
            const cur = parseInt(document.getElementById('student-count').innerText) || 0;
            document.getElementById('student-count').innerText = cur + 1;
            alert('ተማሪው ተመዝግቧል!');
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
                    <p class="text-[11px] text-slate-500 mb-3">የ ${cls} ደብተር መግቢያ ሊንክ፡</p>
                </div>
                <div class="flex items-center space-x-2">
                    <input type="text" readonly value="https://smart-debter-ethiopia.vercel.app/teacher/entry?class=${encodeURIComponent(cls)}&name=${encodeURIComponent(name)}" 
                           class="text-[10px] bg-white border p-1.5 rounded flex-1 text-slate-600 select-all">
                    <button onclick="navigator.clipboard.writeText('https://smart-debter-ethiopia.vercel.app/teacher/entry?class=${encodeURIComponent(cls)}&name=${encodeURIComponent(name)}'); alert('የመምህሩ ሊንክ ተገልብጧል!');" 
                            class="text-xs bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-2.5 py-1.5 rounded transition">
                        <i class="fas fa-copy"></i>
                    </button>
                </div>
            `;
            document.getElementById('teachers-container').prepend(card);
            closeModal('teacher-assign-modal');
            alert('መምህሩ ተመድቧል!');
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
            alert('ማስታወቂያው ተሰራጭቷል!');
        }

        // PWA Script
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => { navigator.serviceWorker.register('/sw.js'); });
        }
    </script>

</body>
</html>
