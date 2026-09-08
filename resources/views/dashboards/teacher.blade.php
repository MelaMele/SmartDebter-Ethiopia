<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>የመምህራን ዳሽቦርድ | SmartDebter</title>

    <!-- PWA Settings -->
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

    <!-- PWA Install Banner -->
    <div id="pwa-install-banner" class="hidden bg-emerald-900 text-white px-4 py-2.5 shadow-md">
        <div class="max-w-4xl mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <img src="https://cdn-icons-png.flaticon.com/512/2997/2997295.png" alt="Logo" class="w-8 h-8 rounded-lg">
                <div>
                    <p class="text-xs font-bold leading-tight">SmartDebter የመምህራን አፕሊኬሽን</p>
                    <p class="text-[10px] text-emerald-200">የቤት ስራዎችን በፍጥነት ለመላክ ስልክዎ ላይ ይጫኑት!</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <button id="install-btn" class="bg-amber-400 hover:bg-amber-500 text-slate-900 font-bold text-xs px-3 py-1.5 rounded-lg shadow transition">
                    <i class="fas fa-download mr-1"></i>ጫን
                </button>
                <button onclick="document.getElementById('pwa-install-banner').classList.add('hidden')" class="text-emerald-300 hover:text-white text-sm px-1">✕</button>
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
                    <h2 class="text-sm font-bold text-slate-900 leading-tight">{{ $teacherName ?? 'የክፍል ኃላፊ መምህር' }}</h2>
                    <p class="text-[11px] text-slate-500">የተመደቡበት ክፍል፡ <b class="text-emerald-700 font-bold">{{ $classCode ?? 'ክፍል 7-B' }}</b></p>
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

        <!-- 1. Quick Stats (በንጹህ 0 ይጀምራሉ) -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="bg-white p-4 rounded-2xl border shadow-xs">
                <p class="text-[11px] font-bold text-slate-500 uppercase">የተመደበበት ክፍል</p>
                <h3 class="text-xl font-black text-slate-900 mt-1">{{ $classCode ?? 'ክፍል 7-B' }}</h3>
                <span class="text-[10px] text-emerald-600 font-medium">ንቁ ክፍል</span>
            </div>

            <div class="bg-white p-4 rounded-2xl border shadow-xs">
                <p class="text-[11px] font-bold text-slate-500 uppercase">የዛሬ የተላኩ</p>
                <h3 id="teacher-sent-count" class="text-2xl font-black text-slate-900 mt-1">0</h3>
                <span class="text-[10px] text-slate-400">የቤት ስራ / ማስታወሻ</span>
            </div>

            <div class="bg-white p-4 rounded-2xl border shadow-xs">
                <p class="text-[11px] font-bold text-slate-500 uppercase">የወላጅ ፊርማ ምጣኔ</p>
                <h3 id="teacher-sign-rate" class="text-2xl font-black text-slate-400 mt-1">0%</h3>
                <span class="text-[10px] text-slate-400">የወላጆች ምላሽ</span>
            </div>

            <div class="bg-white p-4 rounded-2xl border shadow-xs">
                <p class="text-[11px] font-bold text-slate-500 uppercase">ያልፈረሙ ወላጆች</p>
                <h3 id="teacher-pending-count" class="text-2xl font-black text-slate-400 mt-1">0</h3>
                <span class="text-[10px] text-slate-400">ክትትል የሚሹ</span>
            </div>
        </div>

        <!-- 2. DYNAMIC MOVING AD CAROUSEL -->
        @include('partials.ad-slider', ['sliderId' => 'teacher-slider'])

        <!-- 3. Post to Debter Form (የቤት ስራ መላኪያ ቅጽ) -->
        <div class="bg-white rounded-2xl border shadow-sm p-5 sm:p-6">
            <h3 class="text-base font-bold text-slate-900 mb-4 flex items-center">
                <i class="fas fa-edit text-emerald-600 mr-2"></i>
                ወደ ደብተር አዲስ መልእክት ይጻፉ (ለ{{ $classCode ?? 'ክፍል 7-B' }})
            </h3>

            <form action="#" onsubmit="event.preventDefault(); sendTeacherNote(this);" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">ተቀባይ</label>
                        <select class="w-full p-2.5 bg-slate-50 border rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option>ለሙሉ ክፍል ({{ $classCode ?? 'ክፍል 7-B' }})</option>
                            <option>ለተወሰነ ተማሪ ብቻ</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">የመልእክቱ አይነት</label>
                        <select id="note-category" class="w-full p-2.5 bg-slate-50 border rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="የቤት ስራ">📝 የቤት ስራ (Homework)</option>
                            <option value="ባህሪና ምስጋና">🌟 የስነ-ምግባር ማስታወሻ / ምስጋና</option>
                            <option value="አስቸኳይ ማስታወቂያ">⚠️ አስቸኳይ ማስታወቂያ</option>
                            <option value="የቀን መገኘት">📅 የቀን መገኘት (መቅረት/ማርፈድ)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">የመልእክቱ ርዕስ</label>
                    <input type="text" id="note-title" placeholder="ምሳሌ፡ የሂሳብ ምዕራፍ 3 መልመጃ" required
                           class="w-full p-2.5 bg-slate-50 border rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">የደብተሩ ዝርዝር መልእክት</label>
                    <textarea rows="3" id="note-body" placeholder="ለወላጆች የሚተላለፈውን መልእክት እዚህ ይጻፉ..." required
                              class="w-full p-2.5 bg-slate-50 border rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">ፋይል ወይም ፎቶ ያያይዙ (አማራጭ)</label>
                        <input type="file" class="w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">የማስረከቢያ ቀን (አማራጭ)</label>
                        <input type="date" class="w-full p-2 bg-slate-50 border rounded-xl text-sm">
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

        <!-- 4. Recently Sent Debter Notes (ንጹህ የታሪክ ሰሌዳ) -->
        <div class="bg-white rounded-2xl border shadow-sm overflow-hidden">
            <div class="p-4 border-b bg-slate-50 flex items-center justify-between">
                <h3 class="font-bold text-sm text-slate-900">የተላኩ መልእክቶች እና የወላጅ ፊርማ ሁኔታ</h3>
                <span class="text-xs text-slate-500">የቅርብ ጊዜ</span>
            </div>

            <div id="teacher-sent-list" class="divide-y text-sm">
                <!-- Clean Empty State (መጀመሪያ ላይ ምንም የለም) -->
                <div id="teacher-empty-state" class="text-center py-10 text-slate-400">
                    <i class="fas fa-book-open text-3xl mb-2 text-slate-300"></i>
                    <p class="text-xs font-medium">እስካሁን ምንም የቤት ስራ ወይም ማስታወሻ አልላኩም።</p>
                    <p class="text-[10px] text-slate-400 mt-0.5">ከላይ ያለውን ቅጽ በመጠቀም የመጀመሪያውን መልእክት ወደ ወላጆች ይላኩ።</p>
                </div>
            </div>
        </div>

    </main>

    <!-- Mela Solution Shared Footer -->
    @include('partials.footer')

    <!-- Interactive Script -->
    <script>
        function sendTeacherNote(form) {
            const cat = document.getElementById('note-category').value;
            const title = document.getElementById('note-title').value;
            const body = document.getElementById('note-body').value;

            // Remove Empty State
            document.getElementById('teacher-empty-state')?.remove();

            // Update Counts
            const curCount = parseInt(document.getElementById('teacher-sent-count').innerText) || 0;
            document.getElementById('teacher-sent-count').innerText = curCount + 1;
            document.getElementById('teacher-pending-count').innerText = 'በመጠበቅ ላይ';
            document.getElementById('teacher-pending-count').classList.remove('text-slate-400');
            document.getElementById('teacher-pending-count').classList.add('text-amber-600');

            // Prepend new note item
            const item = document.createElement('div');
            item.className = 'p-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 hover:bg-slate-50 transition';
            item.innerHTML = `
                <div>
                    <div class="flex items-center space-x-2">
                        <span class="bg-purple-100 text-purple-700 text-[10px] font-bold px-2 py-0.5 rounded">${cat}</span>
                        <h4 class="font-bold text-slate-900">${title}</h4>
                    </div>
                    <p class="text-xs text-slate-500 mt-1">${body} (አሁን የተላከ)</p>
                </div>
                <div class="flex items-center space-x-3">
                    <span class="text-xs font-bold text-amber-600 bg-amber-50 border border-amber-200 px-2.5 py-1 rounded-full">
                        <i class="fas fa-clock mr-1"></i>ለወላጆች ደርሷል (ፊርማ ይጠበቃል)
                    </span>
                </div>
            `;

            document.getElementById('teacher-sent-list').prepend(item);
            form.reset();
            alert('🎉 መልእክቱ በተሳካ ሁኔታ ለወላጆች ደብተር ተልኳል!');
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
