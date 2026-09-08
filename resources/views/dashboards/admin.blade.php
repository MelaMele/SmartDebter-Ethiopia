<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>አድሚን ዳሽቦርድ | SmartDebter</title>

    <!-- PWA Settings (ለአድሚን ሞባይል/ዴስክቶፕ አፕ) -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#7e22ce">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="SmartDebter Admin">
    <link rel="apple-touch-icon" href="https://cdn-icons-png.flaticon.com/512/2997/2997295.png">

    <!-- Tailwind CSS & FontAwesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-100 font-sans min-h-screen pb-12">

    <!-- PWA INSTALL BANNER FOR ADMIN -->
    <div id="pwa-install-banner" class="hidden bg-purple-950 text-white px-4 py-2.5 shadow-md">
        <div class="max-w-6xl mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <img src="https://cdn-icons-png.flaticon.com/512/2997/2997295.png" alt="Logo" class="w-8 h-8 rounded-lg">
                <div>
                    <p class="text-xs font-bold leading-tight">SmartDebter የአስተዳደር አፕሊኬሽን</p>
                    <p class="text-[10px] text-purple-200">የትምህርት ቤቱን እንቅስቃሴ እና ማስታወቂያዎች በስልክዎ ለመከታተል ይጫኑ!</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <button id="install-btn" class="bg-amber-400 hover:bg-amber-500 text-slate-900 font-bold text-xs px-3 py-1.5 rounded-lg shadow transition">
                    <i class="fas fa-download mr-1"></i>ጫን (Install)
                </button>
                <button onclick="document.getElementById('pwa-install-banner').classList.add('hidden')" class="text-purple-300 hover:text-white text-sm px-1">
                    ✕
                </button>
            </div>
        </div>
    </div>

    <!-- Top Header -->
    <header class="bg-white border-b shadow-sm sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-full bg-purple-100 text-purple-700 flex items-center justify-center font-bold">
                    አ
                </div>
                <div>
                    <h2 class="text-sm font-bold text-slate-900 leading-tight">የትምህርት ቤት አስተዳደር</h2>
                    <p class="text-[11px] text-slate-500">SmartDebter Admin Portal • 2017 ዓ.ም</p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <span class="hidden sm:inline-block text-xs bg-emerald-50 text-emerald-700 border border-emerald-200 px-2.5 py-1 rounded-full font-bold">
                    <i class="fas fa-check-circle mr-1"></i>ሲስተሙ ንቁ ነው
                </span>
                <a href="/login" class="text-xs bg-rose-50 text-rose-600 border border-rose-200 px-3 py-1.5 rounded-lg font-semibold hover:bg-rose-100 transition">
                    <i class="fas fa-sign-out-alt mr-1"></i>ውጣ
                </a>
            </div>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 mt-6 space-y-6">

        <!-- 1. School Overview Metrics -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="bg-white p-5 rounded-2xl border shadow-xs">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">ክፍሎች</span>
                    <i class="fas fa-door-open text-purple-600"></i>
                </div>
                <h3 class="text-2xl font-black text-slate-900">18</h3>
                <span class="text-[10px] text-slate-500">ከ 1ኛ እስከ 8ኛ ክፍል</span>
            </div>

            <div class="bg-white p-5 rounded-2xl border shadow-xs">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">ተማሪዎች</span>
                    <i class="fas fa-user-graduate text-blue-600"></i>
                </div>
                <h3 class="text-2xl font-black text-slate-900">620</h3>
                <span class="text-[10px] text-emerald-600 font-medium">96% የተመዘገቡ ወላጆች</span>
            </div>

            <div class="bg-white p-5 rounded-2xl border shadow-xs">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">መምህራን</span>
                    <i class="fas fa-chalkboard-teacher text-emerald-600"></i>
                </div>
                <h3 class="text-2xl font-black text-slate-900">28</h3>
                <span class="text-[10px] text-slate-500">ንቁ መለያ ያላቸው</span>
            </div>

            <div class="bg-white p-5 rounded-2xl border shadow-xs">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">አጠቃላይ ፊርማ</span>
                    <i class="fas fa-signature text-amber-600"></i>
                </div>
                <h3 class="text-2xl font-black text-emerald-600">92%</h3>
                <span class="text-[10px] text-slate-500">የወላጆች የዕለት ምላሽ ምጣኔ</span>
            </div>
        </div>
<!-- TEACHER CLASSROOM ASSIGNMENT & LINK GENERATOR (መምህራንን በክፍል መመደቢያ እና ሊንክ ማመንጫ) -->
        <div class="bg-white rounded-2xl border shadow-sm p-6">
            <div class="flex items-center justify-between mb-4 pb-3 border-b">
                <div>
                    <h3 class="text-base font-bold text-slate-900 flex items-center">
                        <i class="fas fa-link text-emerald-600 mr-2"></i>
                        የመምህራን የክፍል ምደባ እና የመግቢያ ሊንክ (Teacher Invite Link)
                    </h3>
                    <p class="text-xs text-slate-500 mt-0.5">ለመምህራን የተመደቡበትን ክፍል ብቻ እንዲያገኙ ይህንን ሊንክ በ Telegram/SMS ይላኩላቸው።</p>
                </div>
                <span class="text-xs font-bold text-emerald-700 bg-emerald-50 border border-emerald-200 px-3 py-1 rounded-full">
                    የተጠበቀ አሰራር
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Teacher 1 -->
                <div class="p-4 bg-slate-50 rounded-xl border flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-bold text-slate-900">መምህር አለሙ ተሾመ</span>
                            <span class="text-[10px] font-bold bg-purple-100 text-purple-700 px-2 py-0.5 rounded">ክፍል 7-B</span>
                        </div>
                        <p class="text-[11px] text-slate-500 mb-3">የ 36 ተማሪዎች የቤት ስራ እና ባህሪ ብቻ ማስተዳደር ይችላሉ።</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="text" readonly value="https://smart-debter-ethiopia.vercel.app/teacher/entry?class=7-B&name=መምህር+አለሙ" 
                               class="text-[10px] bg-white border p-1.5 rounded flex-1 text-slate-600 select-all">
                        <button onclick="navigator.clipboard.writeText('https://smart-debter-ethiopia.vercel.app/teacher/entry?class=7-B&name=መምህር+አለሙ'); alert('ሊንኩ ተገልብጧል! ለመምህሩ ይላኩለት።')" 
                                class="text-xs bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-2.5 py-1.5 rounded transition">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>

                <!-- Teacher 2 -->
                <div class="p-4 bg-slate-50 rounded-xl border flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-bold text-slate-900">መምህርት ትዕግስት በቀለ</span>
                            <span class="text-[10px] font-bold bg-blue-100 text-blue-700 px-2 py-0.5 rounded">ክፍል 3-A</span>
                        </div>
                        <p class="text-[11px] text-slate-500 mb-3">የ 30 ተማሪዎች የቤት ስራ እና ባህሪ ብቻ ማስተዳደር ይችላሉ።</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="text" readonly value="https://smart-debter-ethiopia.vercel.app/teacher/entry?class=3-A&name=መምህርት+ትዕግስት" 
                               class="text-[10px] bg-white border p-1.5 rounded flex-1 text-slate-600 select-all">
                        <button onclick="navigator.clipboard.writeText('https://smart-debter-ethiopia.vercel.app/teacher/entry?class=3-A&name=መምህርት+ትዕግስት'); alert('ሊንኩ ተገልብጧል! ለመምህሯ ይላኩላት።')" 
                                class="text-xs bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-2.5 py-1.5 rounded transition">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>

                <!-- Add New Teacher Assignment -->
                <div class="p-4 border-2 border-dashed border-slate-300 rounded-xl flex flex-col items-center justify-center text-center">
                    <div class="w-8 h-8 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center text-sm mb-2">
                        <i class="fas fa-plus"></i>
                    </div>
                    <span class="text-xs font-bold text-slate-800">አዲስ መምህር በክፍል መድብ</span>
                    <p class="text-[10px] text-slate-500 mt-1">መምህር እና ክፍል መርጠው ሊንክ ያመንጩ</p>
                </div>
            </div>
        </div>
        <!-- 2. ADVERTISEMENT MANAGEMENT SECTION -->
        <div class="bg-white rounded-2xl border shadow-sm p-6">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-6 pb-4 border-b">
                <div>
                    <h3 class="text-base font-bold text-slate-900 flex items-center">
                        <i class="fas fa-ad text-amber-500 mr-2"></i>
                        የድርጅቶች ማስታወቂያ አስተዳደር (Sponsor & Ad Spaces)
                    </h3>
                    <p class="text-xs text-slate-500 mt-0.5">በወላጆች እና በመምህራን ዳሽቦርድ ላይ የሚለጠፉ ማስታወቂያዎች እና የገቢ ትንታኔ</p>
                </div>
                <button onclick="alert('አዲስ ማስታወቂያ የመስቀያ ቅጽ በቅርቡ ይከፈታል!')" class="text-xs font-bold bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-xl transition shadow flex items-center space-x-1.5">
                    <i class="fas fa-plus"></i>
                    <span>አዲስ ማስታወቂያ ጫን</span>
                </button>
            </div>

            <!-- Ad Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="bg-slate-50 text-slate-600 border-b">
                            <th class="p-3">አስተዋዋቂ ድርጅት</th>
                            <th class="p-3">የማስታወቂያው ቦታ (Placement)</th>
                            <th class="p-3">ዒላማ (Target)</th>
                            <th class="p-3">የታየበት (Views)</th>
                            <th class="p-3">የተነካበት (Clicks)</th>
                            <th class="p-3">ሁኔታ (Status)</th>
                            <th class="p-3 text-right">እርምጃ</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y text-slate-700">
                        <tr class="hover:bg-slate-50 transition">
                            <td class="p-3 font-bold text-slate-900 flex items-center space-x-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                <span>አቢሲንያ ባንክ (የቁጠባ ሒሳብ)</span>
                            </td>
                            <td class="p-3">Parent Feed (በደብተር መሃል)</td>
                            <td class="p-3"><span class="bg-blue-50 text-blue-700 px-2 py-0.5 rounded font-semibold">ወላጆች</span></td>
                            <td class="p-3 font-semibold">1,420</td>
                            <td class="p-3 font-semibold text-emerald-600">245 (17.2%)</td>
                            <td class="p-3"><span class="bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded-full font-bold">ንቁ (Active)</span></td>
                            <td class="p-3 text-right">
                                <button class="text-indigo-600 hover:underline mr-2">አስተካክል</button>
                                <button class="text-rose-600 hover:underline">አቁም</button>
                            </td>
                        </tr>

                        <tr class="hover:bg-slate-50 transition">
                            <td class="p-3 font-bold text-slate-900 flex items-center space-x-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                <span>ኢትዮ ቴሌኮም (የመምህራን ላፕቶፕ)</span>
                            </td>
                            <td class="p-3">Teacher Banner (ከላይ)</td>
                            <td class="p-3"><span class="bg-emerald-50 text-emerald-700 px-2 py-0.5 rounded font-semibold">መምህራን</span></td>
                            <td class="p-3 font-semibold">380</td>
                            <td class="p-3 font-semibold text-emerald-600">62 (16.3%)</td>
                            <td class="p-3"><span class="bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded-full font-bold">ንቁ (Active)</span></td>
                            <td class="p-3 text-right">
                                <button class="text-indigo-600 hover:underline mr-2">አስተካክል</button>
                                <button class="text-rose-600 hover:underline">አቁም</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 3. Broadcast Announcement -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl border shadow-sm p-5 md:col-span-1">
                <h3 class="text-sm font-bold text-slate-900 mb-3 flex items-center">
                    <i class="fas fa-bullhorn text-indigo-600 mr-2"></i>
                    አጠቃላይ አስቸኳይ ማስታወቂያ
                </h3>
                <p class="text-xs text-slate-500 mb-3 leading-relaxed">ይህ መልእክት በሙሉ ትምህርት ቤቱ ላሉ ወላጆች በሙሉ ደብተር ላይ በቀጥታ ይለጠፋል።</p>
                
                <form action="#" onsubmit="event.preventDefault(); alert('አጠቃላይ ማስታወቂያው ለ 620 ወላጆች ተሰራጭቷል!');" class="space-y-3">
                    <input type="text" placeholder="የርዕስ ማስታወሻ..." required
                           class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs focus:ring-2 focus:ring-purple-500 focus:outline-none">
                    <textarea rows="3" placeholder="ዝርዝር መልእክት..." required
                              class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs focus:ring-2 focus:ring-purple-500 focus:outline-none"></textarea>
                    <button type="submit" class="w-full py-2.5 rounded-xl bg-purple-600 hover:bg-purple-700 text-white font-bold text-xs shadow transition">
                        ለሁሉም ወላጆች አሰራጭ
                    </button>
                </form>
            </div>

            <div class="bg-white rounded-2xl border shadow-sm p-5 md:col-span-2">
                <h3 class="text-sm font-bold text-slate-900 mb-3 flex items-center justify-between">
                    <span>የክፍሎች የዕለት እንቅስቃሴ እና ክትትል</span>
                    <a href="#" class="text-xs text-purple-600 font-semibold hover:underline">ሁሉንም እይ</a>
                </h3>

                <div class="space-y-3">
                    <div class="p-3 bg-slate-50 rounded-xl border flex items-center justify-between text-xs">
                        <div>
                            <span class="font-bold text-slate-800">ክፍል 7-B (ሂሳብ)</span>
                            <p class="text-[11px] text-slate-500 mt-0.5">መምህር አለሙ • ዛሬ 4:30 ላይ የቤት ስራ ልከዋል</p>
                        </div>
                        <span class="text-emerald-700 font-bold bg-emerald-100 px-2 py-1 rounded">32/36 ፈርመዋል</span>
                    </div>

                    <div class="p-3 bg-slate-50 rounded-xl border flex items-center justify-between text-xs">
                        <div>
                            <span class="font-bold text-slate-800">ክፍል 3-A (አማርኛ)</span>
                            <p class="text-[11px] text-slate-500 mt-0.5">መምህርት ትዕግስት • ዛሬ 5:10 ላይ የፊደል ልምምድ ልከዋል</p>
                        </div>
                        <span class="text-emerald-700 font-bold bg-emerald-100 px-2 py-1 rounded">28/30 ፈርመዋል</span>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- PWA Script -->
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js');
            });
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
