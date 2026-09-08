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

        <!-- 1. Real Zero Metrics (ሙሉ በሙሉ በ 0 ይጀምራሉ) -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="bg-slate-900 p-5 rounded-2xl border border-slate-800 shadow-sm">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400">አጋር ት/ቤቶች</span>
                    <i class="fas fa-school text-indigo-400"></i>
                </div>
                <h3 id="super-school-count" class="text-3xl font-black text-white">0</h3>
                <span class="text-[10px] text-slate-400">የተመዘገቡ ት/ቤቶች</span>
            </div>

            <div class="bg-slate-900 p-5 rounded-2xl border border-slate-800 shadow-sm">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400">አጠቃላይ ተማሪዎች</span>
                    <i class="fas fa-user-graduate text-blue-400"></i>
                </div>
                <h3 id="super-student-count" class="text-3xl font-black text-white">0</h3>
                <span class="text-[10px] text-slate-400">በኔትወርኩ ያሉ ተማሪዎች</span>
            </div>

            <div class="bg-slate-900 p-5 rounded-2xl border border-slate-800 shadow-sm">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400">የማስታወቂያ ዕይታ</span>
                    <i class="fas fa-eye text-amber-400"></i>
                </div>
                <h3 id="super-view-count" class="text-3xl font-black text-amber-400">0</h3>
                <span class="text-[10px] text-slate-400">የተመዘገበ እይታ</span>
            </div>

            <div class="bg-slate-900 p-5 rounded-2xl border border-slate-800 shadow-sm">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400">ንቁ ማስታወቂያዎች</span>
                    <i class="fas fa-bullhorn text-emerald-400"></i>
                </div>
                <h3 id="super-ad-count" class="text-3xl font-black text-emerald-400">0</h3>
                <span class="text-[10px] text-slate-400">የሚታዩ ማስታወቂያዎች</span>
            </div>
        </div>

        <!-- 2. LIVE MOVING AD PREVIEW (ማስታወቂያ ሲኖር የሚታይበት ሰሌዳ) -->
        <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-2 mb-4 pb-3 border-b border-slate-800">
                <div>
                    <h3 class="text-base font-bold text-white flex items-center">
                        <i class="fas fa-play-circle text-emerald-400 mr-2"></i>
                        የቀጥታ አንቀሳቃሽ ሰሌዳ ቅኝት (Live Carousel Preview)
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">በአሁኑ ሰዓት ወላጆችና መምህራን የሚያዩት ተንቀሳቃሽ ማስታወቂያ፡</p>
                </div>
                <span class="text-xs font-bold text-emerald-400 bg-emerald-500/10 border border-emerald-500/30 px-3 py-1 rounded-full">
                    <i class="fas fa-sync-alt fa-spin mr-1"></i>በየ 4.5 ሰከንድ ይንሸራተታል
                </span>
            </div>

            <!-- Auto-sliding Component -->
            @include('partials.ad-slider', ['sliderId' => 'superadmin-preview'])
        </div>

        <!-- 3. AD CAMPAIGN MANAGEMENT (ንጹህ የማስታወቂያ ሰንጠረዥ) -->
        <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-6 pb-4 border-b border-slate-800">
                <div>
                    <h3 class="text-base font-bold text-white flex items-center">
                        <i class="fas fa-tasks text-amber-400 mr-2"></i>
                        የማስታወቂያዎች አስተዳደር (Ad Campaigns)
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">አዳዲስ ድርጅታዊ ማስታወቂያዎችን እዚህ ይስቀሉ፤ ያርትዑ ወይም ያጥፉ</p>
                </div>
                <button onclick="openModal('ad-modal')" class="text-xs font-bold bg-amber-500 hover:bg-amber-600 text-slate-950 px-4 py-2.5 rounded-xl transition shadow flex items-center space-x-1.5">
                    <i class="fas fa-plus"></i>
                    <span>አዲስ ማስታወቂያ ስቀል</span>
                </button>
            </div>

            <!-- Ad Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="text-slate-400 border-b border-slate-800 bg-slate-950/40">
                            <th class="p-3">አስተዋዋቂ ድርጅት</th>
                            <th class="p-3">የርዕስ ጽሁፍ</th>
                            <th class="p-3">ዒላማ</th>
                            <th class="p-3">የጊዜ ገደብ</th>
                            <th class="p-3">ሁኔታ</th>
                            <th class="p-3 text-right">እርምጃ</th>
                        </tr>
                    </thead>
                    <tbody id="ads-table-body" class="divide-y divide-slate-800 text-slate-300">
                        <!-- Empty State for Ads -->
                        <tr id="empty-ads-row">
                            <td colspan="6" class="p-8 text-center text-slate-500">
                                <i class="fas fa-ad text-3xl mb-2 text-slate-700 block"></i>
                                እስካሁን የተሰቀለ ማስታወቂያ የለም። "አዲስ ማስታወቂያ ስቀል" የሚለውን ነክተው የመጀመሪያውን ማስታወቂያ ይለጥፉ።
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 4. PARTNER SCHOOLS MANAGEMENT (ንጹህ የት/ቤቶች ሰንጠረዥ) -->
        <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-6 pb-4 border-b border-slate-800">
                <div>
                    <h3 class="text-base font-bold text-white flex items-center">
                        <i class="fas fa-school text-indigo-400 mr-2"></i>
                        አጋር ትምህርት ቤቶች (Partner Schools Network)
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">አዲስ ት/ቤት ሲመጣ እዚህ ይመዝግቡ፤ የመግቢያ የአድሚን ሊንካቸውን ያመንጩ</p>
                </div>
                <button onclick="openModal('school-modal')" class="text-xs font-bold bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2.5 rounded-xl transition shadow flex items-center space-x-1.5">
                    <i class="fas fa-plus"></i>
                    <span>አዲስ ት/ቤት መዝግብ</span>
                </button>
            </div>

            <!-- Schools Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="text-slate-400 border-b border-slate-800 bg-slate-950/40">
                            <th class="p-3">የትምህርት ቤቱ ስም</th>
                            <th class="p-3">የመለያ ኮድ</th>
                            <th class="p-3">የአድሚን ስልክ</th>
                            <th class="p-3">ሁኔታ</th>
                            <th class="p-3">ማዕከላዊ ቁጥጥር</th>
                            <th class="p-3 text-right">የአድሚን መግቢያ ሊንክ</th>
                        </tr>
                    </thead>
                    <tbody id="schools-table-body" class="divide-y divide-slate-800 text-slate-300">
                        <!-- Empty State for Schools -->
                        <tr id="empty-schools-row">
                            <td colspan="6" class="p-8 text-center text-slate-500">
                                <i class="fas fa-school text-3xl mb-2 text-slate-700 block"></i>
                                እስካሁን የተመዘገበ ትምህርት ቤት የለም። "አዲስ ት/ቤት መዝግብ" የሚለውን ነክተው የመጀመሪያውን ት/ቤት ያስገቡ።
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
            <form action="#" onsubmit="event.preventDefault(); addNewSchool();" class="my-4 space-y-3">
                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1">የትምህርት ቤቱ ሙሉ ስም</label>
                    <input type="text" id="new-school-name" placeholder="ምሳሌ፡ ዳግማዊ ሚኒሊክ ት/ቤት" required class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white">
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">የመለያ ኮድ (School Code)</label>
                        <input type="text" id="new-school-code" placeholder="DMN-001" required class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs font-mono text-indigo-400">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">ከተማ / አድራሻ</label>
                        <input type="text" id="new-school-city" placeholder="አዲስ አበባ" required class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1">የት/ቤቱ ዋና አድሚን ስልክ ቁጥር</label>
                    <input type="text" id="new-school-phone" placeholder="09xxxxxxxx" required class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white">
                </div>
                <button type="submit" class="w-full py-2.5 rounded-xl text-xs font-bold text-white bg-indigo-600 hover:bg-indigo-700 shadow mt-2">
                    ት/ቤቱን መዝግብ እና ሊንክ አመንጭ
                </button>
            </form>
        </div>
    </div>

    <!-- 2. ADD / EDIT AD MODAL -->
    <div id="ad-modal" class="hidden fixed inset-0 z-50 bg-black/70 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-slate-900 rounded-2xl max-w-md w-full p-6 border border-slate-800 shadow-2xl text-slate-100">
            <div class="flex items-center justify-between pb-3 border-b border-slate-800">
                <h3 class="font-bold text-sm text-white flex items-center">
                    <i class="fas fa-ad text-amber-400 mr-2"></i>
                    አዲስ ማስታወቂያ ስቀል
                </h3>
                <button onclick="closeModal('ad-modal')" class="text-slate-400 hover:text-white">✕</button>
            </div>
            <form action="#" onsubmit="event.preventDefault(); addNewAd();" class="my-4 space-y-3">
                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1">አስተዋዋቂ ድርጅት</label>
                    <input type="text" id="new-ad-company" placeholder="ምሳሌ፡ አዋሽ ባንክ / ዩኒፎርም አቅራቢ" required class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1">የማስታወቂያው ርዕስ/ጽሁፍ</label>
                    <input type="text" id="new-ad-headline" placeholder="ምሳሌ፡ የ 20% የትምህርት ቁሳቁሶች ቅናሽ" required class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white">
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">ዒላማ</label>
                        <select id="new-ad-target" class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white">
                            <option>ወላጆች በሙሉ</option>
                            <option>መምህራን በሙሉ</option>
                            <option>የት/ቤት አድሚኖች</option>
                            <option>ለሁሉም ተጠቃሚዎች</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">የጊዜ ገደብ</label>
                        <select id="new-ad-duration" class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white">
                            <option>ያልተገደበ (ቋሚ)</option>
                            <option>ለ 1 ወር ብቻ</option>
                            <option>ለ 3 ወራት</option>
                            <option>ለ 1 ዓመት</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="w-full py-2.5 rounded-xl text-xs font-bold text-slate-950 bg-amber-400 hover:bg-amber-500 shadow mt-2">
                    ማስታወቂያውን በአንቀሳቃሽ ሰሌዳው ላይ ለጥፍ
                </button>
            </form>
        </div>
    </div>

    <!-- Mela Solution Shared Footer -->
    @include('partials.footer')

    <!-- Scripts -->
    <script>
        function openModal(id) { document.getElementById(id).classList.remove('hidden'); }
        function closeModal(id) { document.getElementById(id).classList.add('hidden'); }

        // ADD NEW SCHOOL DYNAMICALLY
        function addNewSchool() {
            const name = document.getElementById('new-school-name').value;
            const code = document.getElementById('new-school-code').value;
            const phone = document.getElementById('new-school-phone').value;

            document.getElementById('empty-schools-row')?.remove();

            const cur = parseInt(document.getElementById('super-school-count').innerText) || 0;
            document.getElementById('super-school-count').innerText = cur + 1;

            const row = document.createElement('tr');
            row.id = 'school-' + code;
            row.className = 'hover:bg-slate-800/40 transition';
            row.innerHTML = `
                <td class="p-3 font-bold text-white flex items-center space-x-2">
                    <span class="status-dot w-2 h-2 rounded-full bg-emerald-400"></span>
                    <span class="school-name">${name}</span>
                </td>
                <td class="p-3 text-indigo-400 font-mono">${code}</td>
                <td class="p-3">${phone}</td>
                <td class="p-3">
                    <span class="status-badge bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 px-2 py-0.5 rounded-full text-[10px] font-bold">ንቁ (Active)</span>
                </td>
                <td class="p-3">
                    <button onclick="toggleSchoolStatus(this, 'school-${code}', '${name}')" 
                            class="text-[11px] font-bold px-2.5 py-1 rounded-lg border transition bg-rose-500/10 text-rose-400 border-rose-500/30 hover:bg-rose-500/20">
                        <i class="fas fa-ban mr-1"></i>እገድ
                    </button>
                </td>
                <td class="p-3 text-right">
                    <button onclick="navigator.clipboard.writeText('https://smart-debter-ethiopia.vercel.app/dashboard/admin?school=${code}'); alert('የትምህርት ቤቱ የአድሚን ሊንክ ተገልብጧል!');" 
                            class="text-xs bg-indigo-600/30 hover:bg-indigo-600 text-indigo-300 hover:text-white px-3 py-1.5 rounded-lg border border-indigo-500/30 transition">
                        <i class="fas fa-copy mr-1"></i>ሊንክ ቅዳ
                    </button>
                </td>
            `;

            document.getElementById('schools-table-body').prepend(row);
            closeModal('school-modal');
            alert('🎉 ' + name + ' በተሳካ ሁኔታ ተመዝግቧል! የአድሚን ሊንኩ ተፈጥሯል።');
        }

        // ADD NEW AD DYNAMICALLY
        function addNewAd() {
            const comp = document.getElementById('new-ad-company').value;
            const head = document.getElementById('new-ad-headline').value;
            const target = document.getElementById('new-ad-target').value;
            const dur = document.getElementById('new-ad-duration').value;

            document.getElementById('empty-ads-row')?.remove();

            const cur = parseInt(document.getElementById('super-ad-count').innerText) || 0;
            document.getElementById('super-ad-count').innerText = cur + 1;

            const row = document.createElement('tr');
            row.className = 'hover:bg-slate-800/40 transition';
            row.innerHTML = `
                <td class="p-3 font-bold text-white">${comp}</td>
                <td class="p-3 text-slate-200">${head}</td>
                <td class="p-3"><span class="bg-blue-500/20 text-blue-400 border border-blue-500/30 px-2 py-0.5 rounded font-semibold">${target}</span></td>
                <td class="p-3 text-emerald-400 font-medium">${dur}</td>
                <td class="p-3"><span class="bg-emerald-500/20 text-emerald-400 px-2 py-0.5 rounded-full text-[10px] font-bold">ንቁ</span></td>
                <td class="p-3 text-right">
                    <button onclick="this.closest('tr').remove();" class="text-rose-400 hover:text-rose-300 font-bold">
                        <i class="fas fa-trash-alt mr-0.5"></i>ሰርዝ
                    </button>
                </td>
            `;

            document.getElementById('ads-table-body').prepend(row);
            closeModal('ad-modal');
            alert('🎉 ማስታወቂያው ተለጥፏል! በአንቀሳቃሽ ሰሌዳው ላይ ወዲያውኑ ይታያል።');
        }

        function toggleSchoolStatus(btn, rowId, schoolName) {
            const row = document.getElementById(rowId);
            const badge = row.querySelector('.status-badge');
            const dot = row.querySelector('.status-dot');
            const nameEl = row.querySelector('.school-name');

            if (btn.innerText.includes('እገድ')) {
                badge.className = 'status-badge bg-rose-500/20 text-rose-400 border border-rose-500/30 px-2 py-0.5 rounded-full text-[10px] font-bold';
                badge.innerText = 'የታገደ (Suspended)';
                dot.className = 'status-dot w-2 h-2 rounded-full bg-rose-500';
                nameEl.classList.add('line-through', 'text-slate-400');
                btn.className = 'text-[11px] font-bold px-2.5 py-1 rounded-lg border transition bg-emerald-500/10 text-emerald-400 border-emerald-500/30 hover:bg-emerald-500/20';
                btn.innerHTML = '<i class="fas fa-check mr-1"></i>አንቃ';
                alert('⚠️ ' + schoolName + ' አገልግሎቱ ታግዷል!');
            } else {
                badge.className = 'status-badge bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 px-2 py-0.5 rounded-full text-[10px] font-bold';
                badge.innerText = 'ንቁ (Active)';
                dot.className = 'status-dot w-2 h-2 rounded-full bg-emerald-400';
                nameEl.classList.remove('line-through', 'text-slate-400');
                btn.className = 'text-[11px] font-bold px-2.5 py-1 rounded-lg border transition bg-rose-500/10 text-rose-400 border-rose-500/30 hover:bg-rose-500/20';
                btn.innerHTML = '<i class="fas fa-ban mr-1"></i>እገድ';
                alert('✅ ' + schoolName + ' አገልግሎቱ ነቅቷል!');
            }
        }
    </script>

</body>
</html>
