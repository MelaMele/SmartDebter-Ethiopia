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
                <h3 class="text-3xl font-black text-emerald-400" id="active-ads-counter">3</h3>
                <span class="text-[10px] text-slate-400">በአንቀሳቃሽ ሰሌዳው ላይ ያሉ</span>
            </div>
        </div>

        <!-- 2. LIVE MOVING AD PREVIEW (ሱፐር አድሚኑ የቀጥታ አንቀሳቃሽ ሰሌዳውን የሚያይበት) -->
        <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-2 mb-4 pb-3 border-b border-slate-800">
                <div>
                    <h3 class="text-base font-bold text-white flex items-center">
                        <i class="fas fa-play-circle text-emerald-400 mr-2"></i>
                        የቀጥታ አንቀሳቃሽ ሰሌዳ ቅኝት (Live Carousel Preview)
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">በአሁኑ ሰዓት ወላጆች፣ መምህራን እና አድሚኖች የሚያዩት ተንቀሳቃሽ ማስታወቂያ፡</p>
                </div>
                <span class="text-xs font-bold text-emerald-400 bg-emerald-500/10 border border-emerald-500/30 px-3 py-1 rounded-full">
                    <i class="fas fa-sync-alt fa-spin mr-1"></i>በየ 4.5 ሰከንድ ይንሸራተታል
                </span>
            </div>

            <!-- Carousel Component Included directly -->
            @include('partials.ad-slider', ['sliderId' => 'superadmin-preview'])
        </div>

        <!-- 3. AD CAMPAIGN MANAGEMENT TABLE (ኤዲት፣ ማጥፊያ፣ የጊዜ ገደብ መቆጣጠሪያ) -->
        <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-6 pb-4 border-b border-slate-800">
                <div>
                    <h3 class="text-base font-bold text-white flex items-center">
                        <i class="fas fa-tasks text-amber-400 mr-2"></i>
                        የማስታወቂያዎች አስተዳደር (Edit, Replace & Scheduling)
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">ማስታወቂያዎችን ያርትዑ፣ በሌላ ይተኩ፣ የጊዜ ገደባቸውን ይወስኑ ወይም ያጥፉ</p>
                </div>
                <button onclick="openModal('ad-modal')" class="text-xs font-bold bg-amber-500 hover:bg-amber-600 text-slate-950 px-4 py-2.5 rounded-xl transition shadow flex items-center space-x-1.5">
                    <i class="fas fa-plus"></i>
                    <span>አዲስ ማስታወቂያ ስቀል</span>
                </button>
            </div>

            <!-- Ad Management Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="text-slate-400 border-b border-slate-800 bg-slate-950/40">
                            <th class="p-3">አስተዋዋቂ ድርጅት</th>
                            <th class="p-3">የርዕስ ጽሁፍ</th>
                            <th class="p-3">ዒላማ (Audience)</th>
                            <th class="p-3">የጊዜ ገደብ (Duration)</th>
                            <th class="p-3">ዕይታ/ክሊክ</th>
                            <th class="p-3">ሁኔታ</th>
                            <th class="p-3 text-right">እርምጃ (Actions)</th>
                        </tr>
                    </thead>
                    <tbody id="ads-table-body" class="divide-y divide-slate-800 text-slate-300">
                        
                        <!-- Ad Row 1 -->
                        <tr id="ad-row-1" class="hover:bg-slate-800/40 transition">
                            <td class="p-3 font-bold text-white flex items-center space-x-2">
                                <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?w=60&auto=format&fit=crop&q=60" class="w-7 h-7 rounded-lg object-cover">
                                <span>የትምህርት ቁሳቁሶች አቅራቢ</span>
                            </td>
                            <td class="p-3 text-slate-200">የትምህርት ቁሳቁሶች እና መጻሕፍት 20% ቅናሽ</td>
                            <td class="p-3"><span class="bg-blue-500/20 text-blue-400 border border-blue-500/30 px-2 py-0.5 rounded font-semibold">ወላጆች</span></td>
                            <td class="p-3 text-emerald-400 font-medium">እስከ ጥቅምት 30 (የተወሰነ)</td>
                            <td class="p-3 font-semibold text-slate-300">68.4K / 4.1K</td>
                            <td class="p-3"><span class="bg-emerald-500/20 text-emerald-400 px-2 py-0.5 rounded-full text-[10px] font-bold">ንቁ</span></td>
                            <td class="p-3 text-right space-x-2">
                                <button onclick="editAd('የትምህርት ቁሳቁሶች አቅራቢ', 'የትምህርት ቁሳቁሶች እና መጻሕፍት 20% ቅናሽ')" class="text-indigo-400 hover:text-indigo-300 font-bold">
                                    <i class="fas fa-edit mr-0.5"></i>አስተካክል
                                </button>
                                <button onclick="deleteAd('ad-row-1')" class="text-rose-400 hover:text-rose-300 font-bold">
                                    <i class="fas fa-trash-alt mr-0.5"></i>ሰርዝ
                                </button>
                            </td>
                        </tr>

                        <!-- Ad Row 2 -->
                        <tr id="ad-row-2" class="hover:bg-slate-800/40 transition">
                            <td class="p-3 font-bold text-white flex items-center space-x-2">
                                <div class="w-7 h-7 rounded-lg bg-indigo-500/20 text-indigo-400 flex items-center justify-center"><i class="fas fa-piggy-bank"></i></div>
                                <span>አዋሽ ባንክ (የልጆች ሒሳብ)</span>
                            </td>
                            <td class="p-3 text-slate-200">የልጆች የቁጠባ ሒሳብ በከፍተኛ ወለድ</td>
                            <td class="p-3"><span class="bg-purple-500/20 text-purple-400 border border-purple-500/30 px-2 py-0.5 rounded font-semibold">ሁሉንም</span></td>
                            <td class="p-3 text-slate-400 font-medium">ያልተገደበ (ቋሚ ውል)</td>
                            <td class="p-3 font-semibold text-slate-300">54.2K / 3.8K</td>
                            <td class="p-3"><span class="bg-emerald-500/20 text-emerald-400 px-2 py-0.5 rounded-full text-[10px] font-bold">ንቁ</span></td>
                            <td class="p-3 text-right space-x-2">
                                <button onclick="editAd('አዋሽ ባንክ', 'የልጆች የቁጠባ ሒሳብ በከፍተኛ ወለድ')" class="text-indigo-400 hover:text-indigo-300 font-bold">
                                    <i class="fas fa-edit mr-0.5"></i>አስተካክል
                                </button>
                                <button onclick="deleteAd('ad-row-2')" class="text-rose-400 hover:text-rose-300 font-bold">
                                    <i class="fas fa-trash-alt mr-0.5"></i>ሰርዝ
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <!-- 4. PARTNER SCHOOLS MANAGEMENT -->
        <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-6 pb-4 border-b border-slate-800">
                <div>
                    <h3 class="text-base font-bold text-white flex items-center">
                        <i class="fas fa-school text-indigo-400 mr-2"></i>
                        አጋር ትምህርት ቤቶች (Partner Schools Control)
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">ትምህርት ቤቶችን ማገድ (Suspend)፣ ማንቃት (Activate) እና የአድሚን ሊንካቸውን መቆጣጠሪያ</p>
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
                            <th class="p-3">ተማሪዎች</th>
                            <th class="p-3">የአድሚን ስልክ</th>
                            <th class="p-3">ሁኔታ (Status)</th>
                            <th class="p-3">ማዕከላዊ ቁጥጥር</th>
                            <th class="p-3 text-right">የአድሚን መግቢያ ሊንክ</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800 text-slate-300">
                        <tr id="school-row-1" class="hover:bg-slate-800/40 transition">
                            <td class="p-3 font-bold text-white flex items-center space-x-2">
                                <span class="status-dot w-2 h-2 rounded-full bg-emerald-400"></span>
                                <span class="school-name">ብስራተ ገብርኤል ት/ቤት</span>
                            </td>
                            <td class="p-3 text-indigo-400 font-mono">BG-001</td>
                            <td class="p-3 font-semibold">840</td>
                            <td class="p-3">0911223344</td>
                            <td class="p-3">
                                <span class="status-badge bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 px-2 py-0.5 rounded-full text-[10px] font-bold">ንቁ (Active)</span>
                            </td>
                            <td class="p-3">
                                <button onclick="toggleSchoolStatus(this, 'school-row-1', 'ብስራተ ገብርኤል ት/ቤት')" 
                                        class="toggle-btn text-[11px] font-bold px-2.5 py-1 rounded-lg border transition bg-rose-500/10 text-rose-400 border-rose-500/30 hover:bg-rose-500/20">
                                    <i class="fas fa-ban mr-1"></i>እገድ (Suspend)
                                </button>
                            </td>
                            <td class="p-3 text-right">
                                <button onclick="copySchoolLink('BG-001')" class="text-xs bg-indigo-600/30 hover:bg-indigo-600 text-indigo-300 hover:text-white px-3 py-1.5 rounded-lg border border-indigo-500/30 transition">
                                    <i class="fas fa-copy mr-1"></i>ሊንክ ቅዳ
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <!-- ==================== MODALS ==================== -->

    <!-- ADD / EDIT AD MODAL (ለአዲስም ለማስተካከያም የሚያገለግል) -->
    <div id="ad-modal" class="hidden fixed inset-0 z-50 bg-black/70 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-slate-900 rounded-2xl max-w-md w-full p-6 border border-slate-800 shadow-2xl text-slate-100">
            <div class="flex items-center justify-between pb-3 border-b border-slate-800">
                <h3 id="ad-modal-title" class="font-bold text-sm text-white flex items-center">
                    <i class="fas fa-ad text-amber-400 mr-2"></i>
                    አዲስ ማስታወቂያ ስቀል / አስተካክል
                </h3>
                <button onclick="closeModal('ad-modal')" class="text-slate-400 hover:text-white">✕</button>
            </div>
            <form action="#" onsubmit="event.preventDefault(); saveAd();" class="my-4 space-y-3">
                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1">አስተዋዋቂ ድርጅት</label>
                    <input type="text" id="ad-company" placeholder="ምሳሌ፡ አዋሽ ባንክ / ዩኒፎርም አቅራቢ" required class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1">የማስታወቂያው ርዕስ/ጽሁፍ (Headline)</label>
                    <input type="text" id="ad-headline" placeholder="ምሳሌ፡ የ 20% የትምህርት ቁሳቁሶች ቅናሽ" required class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white">
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">ዒላማ (Target Audience)</label>
                        <select class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white">
                            <option>ወላጆች በሙሉ</option>
                            <option>መምህራን በሙሉ</option>
                            <option>የት/ቤት አድሚኖች</option>
                            <option>ለሁሉም ተጠቃሚዎች</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">የጊዜ ገደብ (Duration)</label>
                        <select class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white">
                            <option>ያልተገደበ (ቋሚ)</option>
                            <option>ለ 1 ወር ብቻ</option>
                            <option>ለ 3 ወራት</option>
                            <option>ለ 1 ዓመት</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1">ሲጫኑት የሚወስደው ሊንክ ወይም ስልክ</label>
                    <input type="text" placeholder="https://... ወይም tel:09xxxxxxxx" class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white">
                </div>
                <button type="submit" class="w-full py-2.5 rounded-xl text-xs font-bold text-slate-950 bg-amber-400 hover:bg-amber-500 shadow mt-2">
                    ማስታወቂያውን አስቀምጥ / በአንቀሳቃሽ ሰሌዳው ላይ ለጥፍ
                </button>
            </form>
        </div>
    </div>

    <!-- Mela Solution Shared Footer -->
    @include('partials.footer')

    <!-- Scripts for CRUD -->
    <script>
        function openModal(id) { document.getElementById(id).classList.remove('hidden'); }
        function closeModal(id) { document.getElementById(id).classList.add('hidden'); }

        function deleteAd(rowId) {
            if (confirm('እርግጠኛ ነዎት ይህ ማስታወቂያ ከሁሉም ት/ቤቶች ሰሌዳ ላይ እንዲነሳ ይፈልጋሉ?')) {
                document.getElementById(rowId).remove();
                alert('ማስታወቂያው በተሳካ ሁኔታ ተሰርዟል!');
            }
        }

        function editAd(company, headline) {
            document.getElementById('ad-modal-title').innerText = 'ማስታወቂያውን አስተካክል (Edit Ad)';
            document.getElementById('ad-company').value = company;
            document.getElementById('ad-headline').value = headline;
            openModal('ad-modal');
        }

        function saveAd() {
            alert('ማስታወቂያው ተስተካክሏል! በአንቀሳቃሽ ሰሌዳው ላይ ወዲያውኑ ስራ ጀምሯል።');
            closeModal('ad-modal');
        }

        function copySchoolLink(code) {
            navigator.clipboard.writeText('https://smart-debter-ethiopia.vercel.app/dashboard/admin?school=' + code);
            alert('የትምህርት ቤቱ የአድሚን ሊንክ ተገልብጧል!');
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
                btn.className = 'toggle-btn text-[11px] font-bold px-2.5 py-1 rounded-lg border transition bg-emerald-500/10 text-emerald-400 border-emerald-500/30 hover:bg-emerald-500/20';
                btn.innerHTML = '<i class="fas fa-check mr-1"></i>አንቃ (Activate)';
                alert('⚠️ ' + schoolName + ' አገልግሎቱ ታግዷል!');
            } else {
                badge.className = 'status-badge bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 px-2 py-0.5 rounded-full text-[10px] font-bold';
                badge.innerText = 'ንቁ (Active)';
                dot.className = 'status-dot w-2 h-2 rounded-full bg-emerald-400';
                nameEl.classList.remove('line-through', 'text-slate-400');
                btn.className = 'toggle-btn text-[11px] font-bold px-2.5 py-1 rounded-lg border transition bg-rose-500/10 text-rose-400 border-rose-500/30 hover:bg-rose-500/20';
                btn.innerHTML = '<i class="fas fa-ban mr-1"></i>እገድ (Suspend)';
                alert('✅ ' + schoolName + ' አገልግሎቱ ነቅቷል!');
            }
        }
    </script>

</body>
</html>
