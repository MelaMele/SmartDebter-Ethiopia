<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin | Mela Solution Master Hub</title>
    
    <!-- PWA Settings -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#1e1b4b">

    <!-- Tailwind CSS & FontAwesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-950 text-slate-100 font-sans min-h-screen pb-12">

    <!-- Top Master Header -->
    <header class="bg-slate-900 border-b border-slate-800 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 py-3.5 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-indigo-600 to-violet-500 flex items-center justify-center text-white font-black shadow-lg">
                    <i class="fas fa-crown text-base"></i>
                </div>
                <div>
                    <div class="flex items-center space-x-2">
                        <h2 class="text-sm font-bold text-white tracking-wide">Mela Solution</h2>
                        <span class="text-[10px] bg-indigo-500/20 text-indigo-400 border border-indigo-500/30 px-2 py-0.5 rounded-full font-bold">SUPER ADMIN</span>
                    </div>
                    <p class="text-[11px] text-slate-400">ማዕከላዊ የትምህርት ቤቶች እና የማስታወቂያ መቆጣጠሪያ ኔትወርክ</p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <a href="/login" class="text-xs bg-rose-500/10 text-rose-400 border border-rose-500/30 px-3 py-1.5 rounded-xl font-semibold hover:bg-rose-500/20 transition">
                    <i class="fas fa-sign-out-alt mr-1"></i>ውጣ
                </a>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 mt-6 space-y-8">

        <!-- 1. Platform-Wide Macro Metrics -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="bg-slate-900 p-5 rounded-2xl border border-slate-800 shadow-sm">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400">የት/ቤቶች ብዛት</span>
                    <i class="fas fa-school text-indigo-400"></i>
                </div>
                <h3 class="text-3xl font-black text-white">12</h3>
                <span class="text-[10px] text-emerald-400 font-medium">11 ንቁ • 1 የታገደ</span>
            </div>

            <div class="bg-slate-900 p-5 rounded-2xl border border-slate-800 shadow-sm">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400">አጠቃላይ ተማሪዎች</span>
                    <i class="fas fa-user-graduate text-blue-400"></i>
                </div>
                <h3 class="text-3xl font-black text-white">7,450</h3>
                <span class="text-[10px] text-indigo-400 font-medium">በ 12ቱም ት/ቤቶች ያሉ</span>
            </div>

            <div class="bg-slate-900 p-5 rounded-2xl border border-slate-800 shadow-sm">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400">የማስታወቂያ ዕይታ (Views)</span>
                    <i class="fas fa-eye text-amber-400"></i>
                </div>
                <h3 class="text-3xl font-black text-amber-400">142.8K</h3>
                <span class="text-[10px] text-slate-400">በዚህ ወር የተመዘገበ</span>
            </div>

            <div class="bg-slate-900 p-5 rounded-2xl border border-slate-800 shadow-sm">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400">ንቁ ማስታወቂያዎች</span>
                    <i class="fas fa-bullhorn text-emerald-400"></i>
                </div>
                <h3 class="text-3xl font-black text-emerald-400">4</h3>
                <span class="text-[10px] text-slate-400">በሁሉም ኔትወርክ ላይ ያሉ</span>
            </div>
        </div>

        <!-- 2. MASTER ADVERTISEMENT ENGINE -->
        <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-6 pb-4 border-b border-slate-800">
                <div>
                    <div class="flex items-center space-x-2">
                        <h3 class="text-base font-bold text-white flex items-center">
                            <i class="fas fa-ad text-amber-400 mr-2"></i>
                            ማዕከላዊ የማስታወቂያ ሰሌዳ (Global Ad Campaigns)
                        </h3>
                        <span class="text-[10px] bg-amber-400/20 text-amber-300 border border-amber-400/30 px-2 py-0.5 rounded-full font-bold">Mela Revenue</span>
                    </div>
                    <p class="text-xs text-slate-400 mt-0.5">እዚህ የምትለጥፈው ማስታወቂያ በሁሉም አጋር ትምህርት ቤቶች ወላጆች እና መምህራን ስልክ ላይ በቀጥታ ይታያል</p>
                </div>
                <button onclick="openModal('ad-modal')" class="text-xs font-bold bg-amber-500 hover:bg-amber-600 text-slate-950 px-4 py-2.5 rounded-xl transition shadow flex items-center space-x-1.5">
                    <i class="fas fa-plus"></i>
                    <span>አዲስ ድርጅታዊ ማስታወቂያ ስቀል</span>
                </button>
            </div>

            <!-- Active Campaigns Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-slate-950/80 rounded-xl border border-slate-800 p-4 flex flex-col justify-between space-y-3">
                    <div class="flex items-start justify-between">
                        <div class="flex items-center space-x-3">
                            <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?w=100&auto=format&fit=crop&q=60" 
                                 class="w-12 h-12 rounded-lg object-cover border border-slate-700">
                            <div>
                                <h4 class="text-xs font-bold text-white">አቢሲንያ ባንክ - የህፃናት ቁጠባ</h4>
                                <p class="text-[11px] text-slate-400">ዒላማ፡ ለሁሉም ት/ቤቶች ወላጆች</p>
                            </div>
                        </div>
                        <span class="text-[10px] font-bold bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 px-2 py-0.5 rounded-full">ንቁ (Live)</span>
                    </div>
                    <div class="grid grid-cols-3 gap-2 bg-slate-900/60 p-2.5 rounded-lg text-center text-xs">
                        <div><p class="text-[10px] text-slate-500">ዕይታ</p><b class="text-slate-200">68,400</b></div>
                        <div><p class="text-[10px] text-slate-500">ክሊክ</p><b class="text-emerald-400">4,120</b></div>
                        <div><p class="text-[10px] text-slate-500">ቦታ</p><b class="text-indigo-400">In-Feed</b></div>
                    </div>
                </div>

                <div class="bg-slate-950/80 rounded-xl border border-slate-800 p-4 flex flex-col justify-between space-y-3">
                    <div class="flex items-start justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 rounded-lg bg-teal-500/20 text-teal-400 flex items-center justify-center text-xl border border-teal-500/30">
                                <i class="fas fa-laptop"></i>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-white">ኢትዮ ቴሌኮም - የመምህራን ላፕቶፕ</h4>
                                <p class="text-[11px] text-slate-400">ዒላማ፡ ለሁሉም ት/ቤቶች መምህራን</p>
                            </div>
                        </div>
                        <span class="text-[10px] font-bold bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 px-2 py-0.5 rounded-full">ንቁ (Live)</span>
                    </div>
                    <div class="grid grid-cols-3 gap-2 bg-slate-900/60 p-2.5 rounded-lg text-center text-xs">
                        <div><p class="text-[10px] text-slate-500">ዕይታ</p><b class="text-slate-200">12,200</b></div>
                        <div><p class="text-[10px] text-slate-500">ክሊክ</p><b class="text-emerald-400">1,890</b></div>
                        <div><p class="text-[10px] text-slate-500">ቦታ</p><b class="text-indigo-400">Top Banner</b></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. PARTNER SCHOOLS MANAGEMENT (ከነ ማገድ እና ማንቃት ቁልፍ) -->
        <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-6 pb-4 border-b border-slate-800">
                <div>
                    <h3 class="text-base font-bold text-white flex items-center">
                        <i class="fas fa-school text-indigo-400 mr-2"></i>
                        አጋር ትምህርት ቤቶች እና የቁጥጥር ሰሌዳ (Partner Schools Control)
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">ትምህርት ቤቶችን ማገድ (Suspend)፣ ማንቃት (Activate) እና የአድሚን ሊንካቸውን መቆጣጠሪያ</p>
                </div>
                <button onclick="openModal('school-modal')" class="text-xs font-bold bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2.5 rounded-xl transition shadow flex items-center space-x-1.5">
                    <i class="fas fa-plus"></i>
                    <span>አዲስ ት/ቤት መዝግብ (Add School)</span>
                </button>
            </div>

            <!-- Schools Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="text-slate-400 border-b border-slate-800 bg-slate-950/40">
                            <th class="p-3">የትምህርት ቤቱ ስም</th>
                            <th class="p-3">የመለያ ኮድ</th>
                            <th class="p-3">ተማሪዎች</th>
                            <th class="p-3">የአድሚን ስልክ</th>
                            <th class="p-3">ሁኔታ (Status)</th>
                            <th class="p-3">ማዕከላዊ ቁጥጥር (Control)</th>
                            <th class="p-3 text-right">የአድሚን መግቢያ ሊንክ</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800 text-slate-300">
                        
                        <!-- School 1 (Active) -->
                        <tr id="school-row-1" class="hover:bg-slate-800/40 transition">
                            <td class="p-3 font-bold text-white flex items-center space-x-2">
                                <span class="status-dot w-2 h-2 rounded-full bg-emerald-400"></span>
                                <span class="school-name">ብስራተ ገብርኤል ት/ቤት</span>
                            </td>
                            <td class="p-3 text-indigo-400 font-mono">BG-001</td>
                            <td class="p-3 font-semibold">840</td>
                            <td class="p-3">0911223344</td>
                            <td class="p-3">
                                <span class="status-badge bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 px-2 py-0.5 rounded-full text-[10px] font-bold">
                                    ንቁ (Active)
                                </span>
                            </td>
                            <td class="p-3">
                                <!-- Suspend / Activate Toggle Button -->
                                <button onclick="toggleSchoolStatus(this, 'school-row-1', 'ብስራተ ገብርኤል ት/ቤት')" 
                                        class="toggle-btn text-[11px] font-bold px-2.5 py-1 rounded-lg border transition bg-rose-500/10 text-rose-400 border-rose-500/30 hover:bg-rose-500/20">
                                    <i class="fas fa-ban mr-1"></i>እገድ (Suspend)
                                </button>
                            </td>
                            <td class="p-3 text-right">
                                <button onclick="copySchoolLink('BG-001')" 
                                        class="text-xs bg-indigo-600/30 hover:bg-indigo-600 text-indigo-300 hover:text-white px-3 py-1.5 rounded-lg border border-indigo-500/30 transition">
                                    <i class="fas fa-copy mr-1"></i>ሊንክ ቅዳ
                                </button>
                            </td>
                        </tr>

                        <!-- School 2 (Active) -->
                        <tr id="school-row-2" class="hover:bg-slate-800/40 transition">
                            <td class="p-3 font-bold text-white flex items-center space-x-2">
                                <span class="status-dot w-2 h-2 rounded-full bg-emerald-400"></span>
                                <span class="school-name">ፊውቸር ጄኔሬሽን አካዳሚ</span>
                            </td>
                            <td class="p-3 text-indigo-400 font-mono">FGA-002</td>
                            <td class="p-3 font-semibold">1,250</td>
                            <td class="p-3">0922334455</td>
                            <td class="p-3">
                                <span class="status-badge bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 px-2 py-0.5 rounded-full text-[10px] font-bold">
                                    ንቁ (Active)
                                </span>
                            </td>
                            <td class="p-3">
                                <button onclick="toggleSchoolStatus(this, 'school-row-2', 'ፊውቸር ጄኔሬሽን አካዳሚ')" 
                                        class="toggle-btn text-[11px] font-bold px-2.5 py-1 rounded-lg border transition bg-rose-500/10 text-rose-400 border-rose-500/30 hover:bg-rose-500/20">
                                    <i class="fas fa-ban mr-1"></i>እገድ (Suspend)
                                </button>
                            </td>
                            <td class="p-3 text-right">
                                <button onclick="copySchoolLink('FGA-002')" 
                                        class="text-xs bg-indigo-600/30 hover:bg-indigo-600 text-indigo-300 hover:text-white px-3 py-1.5 rounded-lg border border-indigo-500/30 transition">
                                    <i class="fas fa-copy mr-1"></i>ሊንክ ቅዳ
                                </button>
                            </td>
                        </tr>

                        <!-- School 3 (Pre-Suspended Demo) -->
                        <tr id="school-row-3" class="hover:bg-slate-800/40 transition opacity-70">
                            <td class="p-3 font-bold text-slate-400 flex items-center space-x-2">
                                <span class="status-dot w-2 h-2 rounded-full bg-rose-500"></span>
                                <span class="school-name line-through">አንድነት ኢንተርናሽናል</span>
                            </td>
                            <td class="p-3 text-slate-500 font-mono">AND-003</td>
                            <td class="p-3 font-semibold text-slate-500">420</td>
                            <td class="p-3 text-slate-500">0933445566</td>
                            <td class="p-3">
                                <span class="status-badge bg-rose-500/20 text-rose-400 border border-rose-500/30 px-2 py-0.5 rounded-full text-[10px] font-bold">
                                    የታገደ (Suspended)
                                </span>
                            </td>
                            <td class="p-3">
                                <button onclick="toggleSchoolStatus(this, 'school-row-3', 'አንድነት ኢንተርናሽናል')" 
                                        class="toggle-btn text-[11px] font-bold px-2.5 py-1 rounded-lg border transition bg-emerald-500/10 text-emerald-400 border-emerald-500/30 hover:bg-emerald-500/20">
                                    <i class="fas fa-check mr-1"></i>አንቃ (Activate)
                                </button>
                            </td>
                            <td class="p-3 text-right">
                                <span class="text-[10px] text-rose-400 italic">አገልግሎቱ ቆሟል</span>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <!-- ==================== MODALS ==================== -->

    <!-- 1. ADD PARTNER SCHOOL MODAL -->
    <div id="school-modal" class="hidden fixed inset-0 z-50 bg-black/70 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-slate-900 rounded-2xl max-w-md w-full p-6 border border-slate-800 shadow-2xl text-slate-100">
            <div class="flex items-center justify-between pb-3 border-b border-slate-800">
                <h3 class="font-bold text-sm text-white flex items-center">
                    <i class="fas fa-school text-indigo-400 mr-2"></i>
                    አዲስ ት/ቤት መመዝገቢያ
                </h3>
                <button onclick="closeModal('school-modal')" class="text-slate-400 hover:text-white">✕</button>
            </div>
            <form action="#" onsubmit="event.preventDefault(); alert('አዲሱ ትምህርት ቤት ተመዝግቧል! የአድሚን ሊንኩ ተፈጥሯል።'); closeModal('school-modal');" class="my-4 space-y-3">
                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1">የትምህርት ቤቱ ሙሉ ስም</label>
                    <input type="text" placeholder="ምሳሌ፡ ዳግማዊ ሚኒሊክ ት/ቤት" required class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white">
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">የመለያ ኮድ (School Code)</label>
                        <input type="text" placeholder="DMN-004" required class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs font-mono text-indigo-400">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">ከተማ / አድራሻ</label>
                        <input type="text" placeholder="አዲስ አበባ" required class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1">የት/ቤቱ ዋና አድሚን ስልክ ቁጥር</label>
                    <input type="text" placeholder="09xxxxxxxx" required class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white">
                </div>
                <button type="submit" class="w-full py-2.5 rounded-xl text-xs font-bold text-white bg-indigo-600 hover:bg-indigo-700 shadow mt-2">
                    ት/ቤቱን መዝግብ እና ሊንክ አመንጭ
                </button>
            </form>
        </div>
    </div>

    <!-- 2. ADD GLOBAL AD MODAL -->
    <div id="ad-modal" class="hidden fixed inset-0 z-50 bg-black/70 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-slate-900 rounded-2xl max-w-md w-full p-6 border border-slate-800 shadow-2xl text-slate-100">
            <div class="flex items-center justify-between pb-3 border-b border-slate-800">
                <h3 class="font-bold text-sm text-white flex items-center">
                    <i class="fas fa-ad text-amber-400 mr-2"></i>
                    አዲስ ዓለም አቀፍ ማስታወቂያ ስቀል
                </h3>
                <button onclick="closeModal('ad-modal')" class="text-slate-400 hover:text-white">✕</button>
            </div>
            <form action="#" onsubmit="event.preventDefault(); alert('ማስታወቂያው በሁሉም ት/ቤቶች ኔትወርክ ላይ ተለጥፏል!'); closeModal('ad-modal');" class="my-4 space-y-3">
                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1">አስተዋዋቂ ድርጅት</label>
                    <input type="text" placeholder="ምሳሌ፡ አዋሽ ባንክ / ዩኒፎርም አቅራቢ" required class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1">የማስታወቂያው ርዕስ</label>
                    <input type="text" placeholder="ምሳሌ፡ የ 20% የትምህርት ቁሳቁሶች ቅናሽ" required class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white">
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">የማስታወቂያው ቦታ</label>
                        <select class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white">
                            <option>In-Feed Native (በደብተር መሃል)</option>
                            <option>Top Banner (ከላይ)</option>
                            <option>Login Banner</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">ዒላማ (Target Audience)</label>
                        <select class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white">
                            <option>ወላጆች በሙሉ</option>
                            <option>መምህራን በሙሉ</option>
                            <option>ለሁሉም ተጠቃሚዎች</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="w-full py-2.5 rounded-xl text-xs font-bold text-slate-950 bg-amber-400 hover:bg-amber-500 shadow mt-2">
                    በሁሉም ኔትወርክ ላይ አሰራጭ (Publish to All)
                </button>
            </form>
        </div>
    </div>

    <!-- Mela Solution Shared Footer -->
    @include('partials.footer')

    <!-- Scripts for Instant Suspension & Activation -->
    <script>
        function openModal(id) { document.getElementById(id).classList.remove('hidden'); }
        function closeModal(id) { document.getElementById(id).classList.add('hidden'); }

        function copySchoolLink(code) {
            navigator.clipboard.writeText('https://smart-debter-ethiopia.vercel.app/dashboard/admin?school=' + code);
            alert('የትምህርት ቤቱ የአድሚን ሊንክ ተገልብጧል!');
        }

        // ONE-CLICK SUSPEND / ACTIVATE FUNCTION
        function toggleSchoolStatus(btn, rowId, schoolName) {
            const row = document.getElementById(rowId);
            const badge = row.querySelector('.status-badge');
            const dot = row.querySelector('.status-dot');
            const nameEl = row.querySelector('.school-name');

            if (btn.innerText.includes('እገድ') || btn.innerText.includes('Suspend')) {
                // SUSPEND ACTION
                badge.className = 'status-badge bg-rose-500/20 text-rose-400 border border-rose-500/30 px-2 py-0.5 rounded-full text-[10px] font-bold';
                badge.innerText = 'የታገደ (Suspended)';
                dot.className = 'status-dot w-2 h-2 rounded-full bg-rose-500';
                nameEl.classList.add('line-through', 'text-slate-400');
                row.classList.add('opacity-70');

                btn.className = 'toggle-btn text-[11px] font-bold px-2.5 py-1 rounded-lg border transition bg-emerald-500/10 text-emerald-400 border-emerald-500/30 hover:bg-emerald-500/20';
                btn.innerHTML = '<i class="fas fa-check mr-1"></i>አንቃ (Activate)';

                alert('⚠️ ' + schoolName + ' አገልግሎቱ ወዲያውኑ ታግዷል! የአድሚንና የመምህራን መግቢያ ተዘግቷል።');
            } else {
                // ACTIVATE ACTION
                badge.className = 'status-badge bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 px-2 py-0.5 rounded-full text-[10px] font-bold';
                badge.innerText = 'ንቁ (Active)';
                dot.className = 'status-dot w-2 h-2 rounded-full bg-emerald-400';
                nameEl.classList.remove('line-through', 'text-slate-400');
                row.classList.remove('opacity-70');

                btn.className = 'toggle-btn text-[11px] font-bold px-2.5 py-1 rounded-lg border transition bg-rose-500/10 text-rose-400 border-rose-500/30 hover:bg-rose-500/20';
                btn.innerHTML = '<i class="fas fa-ban mr-1"></i>እገድ (Suspend)';

                alert('✅ ' + schoolName + ' አገልግሎቱ በተሳካ ሁኔታ ነቅቷል!');
            }
        }
    </script>

</body>
</html>
