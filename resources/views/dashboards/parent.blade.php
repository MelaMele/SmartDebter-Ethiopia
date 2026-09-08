<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>የወላጅ ዳሽቦርድ | SmartDebter</title>
    
    <!-- PWA Settings (ለሞባይል አፕሊኬሽን) -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#4f46e5">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="SmartDebter">
    <link rel="apple-touch-icon" href="https://cdn-icons-png.flaticon.com/512/2997/2997295.png">

    <!-- Tailwind CSS & Icons -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-100 font-sans min-h-screen pb-12">

    <!-- PWA INSTALL PROMPT BANNER (አፑን ስልክ ላይ ለመጫን የሚመጣ ጥያቄ) -->
    <div id="pwa-install-banner" class="hidden bg-indigo-900 text-white px-4 py-2.5 shadow-md">
        <div class="max-w-3xl mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <img src="https://cdn-icons-png.flaticon.com/512/2997/2997295.png" alt="Logo" class="w-8 h-8 rounded-lg">
                <div>
                    <p class="text-xs font-bold leading-tight">SmartDebter አፕሊኬሽን</p>
                    <p class="text-[10px] text-indigo-200">በቀላሉ ስልክዎ ላይ ጭነው ይጠቀሙ!</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <button id="install-btn" class="bg-amber-400 hover:bg-amber-500 text-slate-900 font-bold text-xs px-3 py-1.5 rounded-lg shadow transition">
                    <i class="fas fa-download mr-1"></i>ጫን (Install)
                </button>
                <button onclick="document.getElementById('pwa-install-banner').classList.add('hidden')" class="text-indigo-300 hover:text-white text-sm px-1">
                    ✕
                </button>
            </div>
        </div>
    </div>

    <!-- Top Header -->
    <header class="bg-white border-b shadow-sm sticky top-0 z-50">
        <div class="max-w-3xl mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">
                    ወ
                </div>
                <div>
                    <h2 class="text-sm font-bold text-slate-900 leading-tight">አቶ ዳዊት በቀለ</h2>
                    <p class="text-[11px] text-slate-500">የተማሪ ወላጅ (Parent)</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <a href="/login" class="text-xs bg-rose-50 text-rose-600 border border-rose-200 px-3 py-1.5 rounded-lg font-semibold hover:bg-rose-100 transition">
                    <i class="fas fa-sign-out-alt mr-1"></i>ውጣ
                </a>
            </div>
        </div>
    </header>

    <!-- Child Selector -->
    <div class="max-w-3xl mx-auto px-4 pt-4">
        <div class="bg-white rounded-2xl p-3 border shadow-sm flex items-center justify-between overflow-x-auto">
            <div class="flex items-center space-x-3 min-w-max">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">ተማሪ ምረጥ:</span>
                
                <!-- Child 1 (Active) -->
                <button class="flex items-center space-x-2 bg-indigo-50 border-2 border-indigo-600 px-3 py-1.5 rounded-xl text-xs font-bold text-indigo-900 shadow-xs">
                    <span class="w-2 h-2 rounded-full bg-indigo-600"></span>
                    <span>ዮናስ ዳዊት (ክፍል 7-B)</span>
                </button>

                <!-- Child 2 -->
                <button class="flex items-center space-x-2 bg-slate-50 border border-slate-200 px-3 py-1.5 rounded-xl text-xs font-medium text-slate-600 hover:bg-slate-100">
                    <span>ሳራ ዳዊት (ክፍል 3-A)</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Main Feed / Timeline -->
    <main class="max-w-3xl mx-auto px-4 mt-4 space-y-4">

        <!-- 1. Urgent Announcement -->
        <div class="bg-amber-50 border-l-4 border-amber-500 rounded-xl p-4 shadow-sm">
            <div class="flex items-start justify-between">
                <div class="flex items-start space-x-3">
                    <i class="fas fa-bell text-amber-600 text-lg mt-0.5"></i>
                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-amber-900">የት/ቤት አስቸኳይ ማስታወቂያ</h4>
                        <p class="text-sm font-semibold text-slate-800 mt-1">የወላጆች አጠቃላይ ስብሰባ</p>
                        <p class="text-xs text-slate-600 mt-1">ቅዳሜ የካቲት 22 ጠዋት 2:30 ላይ የተማሪዎች ውጤት ካርድ እና ገምጋሚ ስብሰባ ስላለ በአካል እንዲገኙ በትህትና እናሳስባለን።</p>
                        <span class="inline-block mt-2 text-[10px] text-amber-800 font-medium bg-amber-200/50 px-2 py-0.5 rounded">የት/ቤት አስተዳደር • ዛሬ 2:15</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. Daily Debter Entry: Homework -->
        <div class="bg-white rounded-2xl border shadow-sm overflow-hidden">
            <div class="p-4 border-b bg-slate-50/50 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center font-bold text-sm">
                        ሂ
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-slate-900">የሂሳብ ትምህርት የቤት ስራ</h4>
                        <p class="text-[11px] text-slate-500">መምህር አለሙ ተሾመ • ዛሬ 4:30</p>
                    </div>
                </div>
                <span class="bg-purple-50 text-purple-700 border border-purple-200 text-[10px] font-bold px-2 py-1 rounded-full uppercase">
                    የቤት ስራ
                </span>
            </div>

            <div class="p-4 text-sm text-slate-700 space-y-3">
                <p>በመጽሐፉ ገጽ 45 ላይ ያሉትን ጥያቄዎች (ቁጥር 1 እስከ 10) በደብተራቸው ሰርተው ነገ ጠዋት እንዲያስረክቡ ያድርጉ። እባክዎ ልጅዎ መስራቱን ያረጋግጡ።</p>

                <div class="p-3 bg-slate-50 rounded-xl border flex items-center justify-between text-xs">
                    <div class="flex items-center space-x-2 text-slate-600">
                        <i class="fas fa-file-pdf text-rose-500 text-base"></i>
                        <span class="font-medium">የተጨማሪ ጥያቄዎች ወረቀት.pdf (1.2 MB)</span>
                    </div>
                    <a href="#" class="text-indigo-600 hover:underline font-bold">አውርድ</a>
                </div>
                
                <div class="text-[11px] text-rose-600 font-semibold">
                    <i class="fas fa-clock mr-1"></i>የማስረከቢያ ቀን፡ ነገ ጠዋት 2:00 ሰዓት
                </div>
            </div>

            <!-- Parent Sign Section -->
            <div class="px-4 py-3 bg-slate-50 border-t flex flex-col sm:flex-row items-center justify-between gap-3">
                <span class="text-xs text-slate-500">የወላጅ ፊርማ ማረጋገጫ:</span>
                <button onclick="toggleSign(this)" class="w-full sm:w-auto px-4 py-2 rounded-xl text-xs font-bold text-white bg-indigo-600 hover:bg-indigo-700 shadow-sm transition flex items-center justify-center space-x-1.5">
                    <i class="fas fa-check-circle"></i>
                    <span>አይቻለሁ (ፈረምኩ)</span>
                </button>
            </div>
        </div>

        <!-- 3. IN-FEED SPONSORED ADVERTISEMENT -->
        <div class="bg-gradient-to-r from-amber-500/10 via-orange-500/10 to-amber-500/10 border-2 border-dashed border-amber-300 rounded-2xl p-4 shadow-sm relative overflow-hidden">
            <span class="absolute top-2 right-2 text-[9px] font-extrabold uppercase bg-amber-200 text-amber-800 px-2 py-0.5 rounded">የስፖንሰር ማስታወቂያ</span>
            <div class="flex flex-col sm:flex-row items-center gap-4 mt-1">
                <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?w=200&auto=format&fit=crop&q=60" 
                     alt="Ad" class="w-20 h-20 rounded-xl object-cover shadow-sm">
                <div class="flex-1 text-center sm:text-left">
                    <h4 class="text-sm font-bold text-slate-900">አቢሲንያ የልጆች የቁጠባ ሒሳብ</h4>
                    <p class="text-xs text-slate-600 mt-1 leading-relaxed">የልጆን የወደፊት ተስፋ ዛሬውኑ በከፍተኛ የወለድ ተመን ያቅዱ። የመጀመሪያውን ደብተር በነፃ ያግኙ!</p>
                    <div class="mt-2">
                        <a href="https://www.bankofabyssinia.com" target="_blank" class="inline-block text-xs font-bold text-white bg-amber-600 hover:bg-amber-700 px-3 py-1.5 rounded-lg shadow-sm transition">
                            ይመዝገቡ (ይጎብኙ) <i class="fas fa-external-link-alt ml-1 text-[10px]"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Behavior Note -->
        <div class="bg-white rounded-2xl border shadow-sm overflow-hidden">
            <div class="p-4 border-b bg-slate-50/50 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-sm">
                        እ
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-slate-900">የእንግሊዝኛ ክፍለ-ጊዜ ተሳትፎ</h4>
                        <p class="text-[11px] text-slate-500">መምህርት ትዕግስት • ትናንት</p>
                    </div>
                </div>
                <span class="bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-bold px-2 py-1 rounded-full uppercase">
                    ምስጋና እና ባህሪ
                </span>
            </div>

            <div class="p-4 text-sm text-slate-700">
                <p>ዮናስ በዛሬው የ Reading and Speaking ክበብ ላይ እጅግ ድንቅ የሆነ የንግግር ችሎታ አሳይቷል። በርታ በሉልኝ!</p>
            </div>

            <div class="px-4 py-2.5 bg-emerald-50 border-t flex items-center justify-between text-xs text-emerald-800">
                <div class="flex items-center space-x-1.5 font-bold">
                    <i class="fas fa-check-double text-emerald-600"></i>
                    <span>በወላጅ ተፈርሟል (ትናንት 12:40 ላይ)</span>
                </div>
                <span class="text-[10px] bg-white px-2 py-0.5 rounded border border-emerald-200">የተረጋገጠ</span>
            </div>
        </div>

    </main>

    <!-- PWA & Signature Scripts -->
    <script>
        // 1. Service Worker Registration
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then(reg => console.log('PWA ServiceWorker ready!'))
                    .catch(err => console.log('SW registration error:', err));
            });
        }

        // 2. Install Prompt Handler
        let deferredPrompt;
        const pwaBanner = document.getElementById('pwa-install-banner');
        const installBtn = document.getElementById('install-btn');

        window.addEventListener('beforeinstallprompt', (e) => {
            e.preventDefault();
            deferredPrompt = e;
            if (pwaBanner) {
                pwaBanner.classList.remove('hidden');
            }
        });

        if (installBtn) {
            installBtn.addEventListener('click', async () => {
                if (deferredPrompt) {
                    deferredPrompt.prompt();
                    const { outcome } = await deferredPrompt.userChoice;
                    console.log(`User response: ${outcome}`);
                    deferredPrompt = null;
                    pwaBanner.classList.add('hidden');
                }
            });
        }

        // 3. Interactive Signature
        function toggleSign(btn) {
            btn.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
            btn.classList.add('bg-emerald-600', 'cursor-default');
            btn.innerHTML = '<i class="fas fa-check-double mr-1"></i> ተረጋግጧል (ተፈርሟል)';
            btn.disabled = true;
        }
    </script>

</body>
</html>
