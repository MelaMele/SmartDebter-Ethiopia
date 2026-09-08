<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>የመምህራን ዳሽቦርድ | SmartDebter</title>

    <!-- PWA Settings (ለመምህራን ሞባይል አፕ) -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#059669">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="SmartDebter Teacher">
    <link rel="apple-touch-icon" href="https://cdn-icons-png.flaticon.com/512/2997/2997295.png">

    <!-- Tailwind CSS & FontAwesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-100 font-sans min-h-screen pb-12">

    <!-- PWA INSTALL BANNER FOR TEACHERS -->
    <div id="pwa-install-banner" class="hidden bg-emerald-900 text-white px-4 py-2.5 shadow-md">
        <div class="max-w-4xl mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <img src="https://cdn-icons-png.flaticon.com/512/2997/2997295.png" alt="Logo" class="w-8 h-8 rounded-lg">
                <div>
                    <p class="text-xs font-bold leading-tight">SmartDebter የመምህራን አፕሊኬሽን</p>
                    <p class="text-[10px] text-emerald-200">የቤት ስራ እና ማስታወሻዎችን በፍጥነት ለመላክ ስልክዎ ላይ ይጫኑት!</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <button id="install-btn" class="bg-amber-400 hover:bg-amber-500 text-slate-900 font-bold text-xs px-3 py-1.5 rounded-lg shadow transition">
                    <i class="fas fa-download mr-1"></i>ጫን (Install)
                </button>
                <button onclick="document.getElementById('pwa-install-banner').classList.add('hidden')" class="text-emerald-300 hover:text-white text-sm px-1">
                    ✕
                </button>
            </div>
        </div>
    </div>

    <!-- Top Header -->
    <header class="bg-white border-b shadow-sm sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold">
                    መ
                </div>
                <div>
                    <h2 class="text-sm font-bold text-slate-900 leading-tight">መምህር አለሙ ተሾመ</h2>
                    <p class="text-[11px] text-slate-500">የክፍል 7-B ኃላፊ እና የሂሳብ መምህር</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <a href="/login" class="text-xs bg-rose-50 text-rose-600 border border-rose-200 px-3 py-1.5 rounded-lg font-semibold hover:bg-rose-100 transition">
                    <i class="fas fa-sign-out-alt mr-1"></i>ውጣ
                </a>
            </div>
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-4 mt-6 space-y-6">

        <!-- 1. Quick Stats -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="bg-white p-4 rounded-2xl border shadow-xs">
                <p class="text-[11px] font-bold text-slate-500 uppercase">ተማሪዎች ብዛት</p>
                <h3 class="text-2xl font-black text-slate-900 mt-1">36</h3>
                <span class="text-[10px] text-emerald-600 font-medium">ክፍል 7-B</span>
            </div>

            <div class="bg-white p-4 rounded-2xl border shadow-xs">
                <p class="text-[11px] font-bold text-slate-500 uppercase">የዛሬ የተላኩ</p>
                <h3 class="text-2xl font-black text-slate-900 mt-1">2</h3>
                <span class="text-[10px] text-indigo-600 font-medium">የቤት ስራ እና ማስታወሻ</span>
            </div>

            <div class="bg-white p-4 rounded-2xl border shadow-xs">
                <p class="text-[11px] font-bold text-slate-500 uppercase">የወላጅ ፊርማ ምጣኔ</p>
                <h3 class="text-2xl font-black text-emerald-600 mt-1">88%</h3>
                <span class="text-[10px] text-slate-500">32 ወላጆች ፈርመዋል</span>
            </div>

            <div class="bg-white p-4 rounded-2xl border shadow-xs">
                <p class="text-[11px] font-bold text-slate-500 uppercase">ያልፈረሙ ወላጆች</p>
                <h3 class="text-2xl font-black text-rose-500 mt-1">4</h3>
                <span class="text-[10px] text-rose-600 font-medium">ክትትል የሚሹ</span>
            </div>
        </div>

        <!-- 2. TEACHER SPONSORED BANNER -->
        <div class="bg-gradient-to-r from-emerald-600 to-teal-700 rounded-2xl p-4 text-white shadow-sm flex flex-col sm:flex-row items-center justify-between gap-3">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center text-xl">
                    <i class="fas fa-laptop"></i>
                </div>
                <div>
                    <h4 class="font-bold text-sm">ለመምህራን በረጅም ጊዜ ክፍያ የሚሰጡ ላፕቶፖች!</h4>
                    <p class="text-xs text-emerald-100">በወር ከ 1,500 ብር ጀምሮ ያለ ምንም ወለድ በኢትዮ ቴሌኮም እና በዳሸን ባንክ ትብብር የቀረበ።</p>
                </div>
            </div>
            <a href="#" class="whitespace-nowrap text-xs font-bold bg-white text-emerald-800 hover:bg-emerald-50 px-4 py-2 rounded-xl transition shadow">
                ቅጹን ይሙሉ
            </a>
        </div>

        <!-- 3. Post to Debter Form -->
        <div class="bg-white rounded-2xl border shadow-sm p-5 sm:p-6">
            <h3 class="text-base font-bold text-slate-900 mb-4 flex items-center">
                <i class="fas fa-edit text-emerald-600 mr-2"></i>
                ወደ ደብተር አዲስ መልእክት ይጻፉ
            </h3>

            <form action="#" onsubmit="event.preventDefault(); alert('መልእክቱ ለወላጆች በተሳካ ሁኔታ ተልኳል!');" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">ተቀባይ (ክፍል / ተማሪ)</label>
                        <select class="w-full p-2.5 bg-slate-50 border rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option>ሙሉ ክፍል (ክፍል 7-B - 36 ተማሪዎች)</option>
                            <option>ለተወሰነ ተማሪ ብቻ (ምሳሌ፡ ዮናስ ዳዊት)</option>
                            <option>ለተወሰነ ተማሪ ብቻ (ምሳሌ፡ ሳራ ዳዊት)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">የመልእክቱ አይነት (Category)</label>
                        <select class="w-full p-2.5 bg-slate-50 border rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option>📝 የቤት ስራ (Homework)</option>
                            <option>🌟 የስነ-ምግባር ማስታወሻ / ምስጋና</option>
                            <option>⚠️ አስቸኳይ ማስታወቂያ</option>
                            <option>📅 የቀን መገኘት (መቅረት/ማርፈድ)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">የመልእክቱ ርዕስ</label>
                    <input type="text" placeholder="ምሳሌ፡ የሂሳብ ምዕራፍ 3 መልመጃ" required
                           class="w-full p-2.5 bg-slate-50 border rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">የደብተሩ ዝርዝር መልእክት</label>
                    <textarea rows="3" placeholder="ለወላጆች የሚተላለፈውን መልእክት እዚህ ይጻፉ..." required
                              class="w-full p-2.5 bg-slate-50 border rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">ፋይል ወይም ፎቶ ያያይዙ (አማራጭ)</label>
                        <input type="file" class="w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700 hover:file:bg-emerald-100">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">የማስረከቢያ ቀን (Due Date)</label>
                        <input type="date" class="w-full p-2 bg-slate-50 border rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                    </div>
                </div>

                <div class="pt-2 flex justify-end">
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-md transition flex items-center space-x-2">
                        <i class="fas fa-paper-plane"></i>
                        <span>ወደ ደብተር ላክ</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- 4. Recently Sent Notes -->
        <div class="bg-white rounded-2xl border shadow-sm overflow-hidden">
            <div class="p-4 border-b bg-slate-50 flex items-center justify-between">
                <h3 class="font-bold text-sm text-slate-900">የቅርብ ጊዜ የተላኩ መልእክቶች እና የወላጅ ፊርማ ሁኔታ</h3>
                <span class="text-xs text-slate-500">በቅርቡ የተላኩ</span>
            </div>

            <div class="divide-y text-sm">
                <div class="p-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 hover:bg-slate-50 transition">
                    <div>
                        <div class="flex items-center space-x-2">
                            <span class="bg-purple-100 text-purple-700 text-[10px] font-bold px-2 py-0.5 rounded">የቤት ስራ</span>
                            <h4 class="font-bold text-slate-900">የሂሳብ ትምህርት የቤት ስራ (ገጽ 45)</h4>
                        </div>
                        <p class="text-xs text-slate-500 mt-1">የተላከው፡ ዛሬ 4:30 | ክፍል 7-B (36 ተማሪዎች)</p>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="text-right">
                            <span class="text-xs font-bold text-emerald-600">32/36 ፈርመዋል</span>
                            <div class="w-24 bg-slate-200 h-1.5 rounded-full mt-1 overflow-hidden">
                                <div class="bg-emerald-500 h-full rounded-full" style="width: 88%"></div>
                            </div>
                        </div>
                        <button class="text-xs font-semibold text-indigo-600 hover:text-indigo-800 bg-indigo-50 px-3 py-1.5 rounded-lg">
                            ያልፈረሙትን እይ
                        </button>
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
