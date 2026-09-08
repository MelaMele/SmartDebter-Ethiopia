<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>የወላጅ ዳሽቦርድ | SmartDebter</title>
    
    <!-- PWA Settings -->
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

    <!-- PWA Install Banner -->
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
                    <i class="fas fa-download mr-1"></i>ጫን
                </button>
                <button onclick="document.getElementById('pwa-install-banner').classList.add('hidden')" class="text-indigo-300 hover:text-white text-sm px-1">✕</button>
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
                    <h2 class="text-sm font-bold text-slate-900 leading-tight">{{ $parent['name'] ?? 'የተማሪ ወላጅ' }}</h2>
                    <p class="text-[11px] text-slate-500">የተመዘገበ ስልክ፡ {{ $phone ?? '09xxxxxxxx' }}</p>
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
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">ተማሪ:</span>
                <button class="flex items-center space-x-2 bg-indigo-50 border-2 border-indigo-600 px-3 py-1.5 rounded-xl text-xs font-bold text-indigo-900 shadow-xs">
                    <span class="w-2 h-2 rounded-full bg-indigo-600"></span>
                    <span>{{ $parent['children'][0]['name'] ?? 'ተማሪ' }} ({{ $parent['children'][0]['grade'] ?? 'ክፍል' }})</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Main Feed / Timeline -->
    <main class="max-w-3xl mx-auto px-4 mt-4 space-y-4">

        <!-- 1. DYNAMIC MOVING AD CAROUSEL (ማስታወቂያው በቦታው አለ) -->
        @include('partials.ad-slider', ['sliderId' => 'parent-feed-slider'])

        <!-- 2. DEBTER FEED CONTAINER -->
        <div id="parent-debter-feed" class="space-y-4">
            
            <!-- Clean Empty State (መጀመሪያ ላይ ደብተሩ ንጹህ ነው) -->
            <div class="bg-white rounded-2xl border p-8 text-center shadow-sm">
                <div class="w-14 h-14 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center text-2xl mx-auto mb-3">
                    <i class="fas fa-book-open"></i>
                </div>
                <h4 class="text-sm font-bold text-slate-800">የልጅዎ ደብተር ንጹህ ነው!</h4>
                <p class="text-xs text-slate-500 mt-1 max-w-sm mx-auto leading-relaxed">
                    እስካሁን ከመምህራን የተላከ አዲስ የቤት ስራ ወይም ማስታወሻ የለም። መምህሩ መልእክት ሲልክ እዚህ ገጽ ላይ በቅጽበት ይደርሶዎታል።
                </p>
                <div class="mt-4 inline-flex items-center space-x-1.5 text-[11px] font-bold text-emerald-600 bg-emerald-50 border border-emerald-200 px-3 py-1 rounded-full">
                    <i class="fas fa-check-circle"></i>
                    <span>ሲስተሙ ከት/ቤቱ ጋር በቀጥታ ተገናኝቷል</span>
                </div>
            </div>

        </div>

    </main>

    <!-- Mela Solution Shared Footer -->
    @include('partials.footer')

    <!-- Scripts -->
    <script>
        function toggleSign(btn) {
            btn.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
            btn.classList.add('bg-emerald-600', 'cursor-default');
            btn.innerHTML = '<i class="fas fa-check-double mr-1"></i> ተረጋግጧል (ተፈርሟል)';
            btn.disabled = true;
        }

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
