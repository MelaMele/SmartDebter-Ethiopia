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
                    <p class="text-xs font-bold leading-tight" data-am="SmartDebter አፕሊኬሽን" data-en="SmartDebter App">SmartDebter አፕሊኬሽን</p>
                    <p class="text-[10px] text-indigo-200" data-am="በቀላሉ ስልክዎ ላይ ጭነው ይጠቀሙ!" data-en="Install on your phone for quick access!">በቀላሉ ስልክዎ ላይ ጭነው ይጠቀሙ!</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <button id="install-btn" class="bg-amber-400 hover:bg-amber-500 text-slate-900 font-bold text-xs px-3 py-1.5 rounded-lg shadow transition">
                    <i class="fas fa-download mr-1"></i><span data-am="ጫን" data-en="Install">ጫን</span>
                </button>
                <button onclick="document.getElementById('pwa-install-banner').classList.add('hidden')" class="text-indigo-300 hover:text-white text-sm px-1">✕</button>
            </div>
        </div>
    </div>

    <!-- Top Header -->
    <header class="bg-white border-b shadow-sm sticky top-0 z-50">
        <div class="max-w-3xl mx-auto px-4 py-3 flex flex-col sm:flex-row items-center justify-between gap-3">
            
            <div class="flex items-center space-x-3 w-full sm:w-auto">
                <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold shadow-xs shrink-0">
                    <i class="fas fa-user-shield"></i>
                </div>
                <div>
                    <h2 class="text-sm font-bold text-slate-900 leading-tight">{{ $parent['name'] ?? 'የተማሪ ወላጅ' }}</h2>
                    <p class="text-[11px] text-slate-500"><span data-am="የተመዘገበ ስልክ፡" data-en="Phone:">የተመዘገበ ስልክ፡</span> {{ $phone ?? '09xxxxxxxx' }}</p>
                </div>
            </div>

            <div class="flex items-center space-x-2.5 w-full sm:w-auto justify-between sm:justify-end">
                <!-- Auto-synced Date Badge -->
                <div class="bg-blue-50 border border-blue-200 px-2.5 py-1 rounded-xl text-xs flex items-center space-x-1.5">
                    <i class="far fa-calendar-alt text-blue-600 text-xs"></i>
                    <span id="parent-eth-date" class="text-blue-950 font-bold text-[11px]">በመጫን ላይ...</span>
                </div>

                <!-- Language Switcher Button -->
                <button onclick="toggleParentLanguage(this)" class="text-xs bg-indigo-50 text-indigo-700 border border-indigo-200 px-3 py-1.5 rounded-xl font-bold hover:bg-indigo-100 transition flex items-center space-x-1">
                    <i class="fas fa-globe text-xs"></i>
                    <span id="parent-lang-btn">English</span>
                </button>

                <a href="/login" class="text-xs bg-rose-50 text-rose-600 border border-rose-200 px-3 py-1.5 rounded-lg font-semibold hover:bg-rose-100 transition">
                    <i class="fas fa-sign-out-alt mr-1"></i><span data-am="ውጣ" data-en="Logout">ውጣ</span>
                </a>
            </div>

        </div>
    </header>

    <!-- Child Profile Card -->
    <div class="max-w-3xl mx-auto px-4 pt-4">
        <div class="bg-white rounded-2xl p-3 border shadow-sm flex items-center justify-between overflow-x-auto">
            <div class="flex items-center space-x-3 min-w-max">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider" data-am="የእርስዎ ተማሪ:" data-en="Your Student:">የእርስዎ ተማሪ:</span>
                <button class="flex items-center space-x-2 bg-indigo-50 border-2 border-indigo-600 px-3.5 py-1.5 rounded-xl text-xs font-bold text-indigo-950 shadow-xs">
                    <span class="w-2 h-2 rounded-full bg-indigo-600"></span>
                    <span>{{ $parent['children'][0]['name'] ?? 'ተማሪ' }} ({{ $parent['children'][0]['grade'] ?? 'ክፍል 7-B' }})</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Main Feed / Timeline -->
    <main class="max-w-3xl mx-auto px-4 mt-4 space-y-4">

        <!-- 1. DYNAMIC MOVING AD CAROUSEL -->
        @include('partials.ad-slider', ['sliderId' => 'parent-feed-slider'])

        <!-- 2. MONTHLY ARCHIVE TABS (የወራት ማህደር ከመስከረም እስከ ጳጉሜ) -->
        <div class="bg-white rounded-2xl border shadow-sm overflow-hidden">
            <div class="p-3 bg-slate-50/70 border-b flex items-center justify-between">
                <span class="text-xs font-bold text-slate-700 flex items-center">
                    <i class="fas fa-folder text-amber-500 mr-1.5"></i>
                    <span data-am="የደብተሩ የወራት ማህደር (ወር ይምረጡ)" data-en="Monthly Debter Archives">የደብተሩ የወራት ማህደር (ወር ይምረጡ)</span>
                </span>
                <span class="text-[10px] text-indigo-700 bg-indigo-50 px-2 py-0.5 rounded-md font-bold">2017 ዓ.ም</span>
            </div>

            <!-- Month Tabs Including Pagume -->
            <div class="p-3 bg-white overflow-x-auto flex space-x-2">
                @php
                    $ethMonths = ['መስከረም', 'ጥቅምት', 'ህዳር', 'ታህሳስ', 'ጥር', 'የካቲት', 'መጋቢት', 'ሚያዝያ', 'ግንቦት', 'ሰኔ', 'ሐምሌ', 'ነሐሴ', 'ጳጉሜ'];
                @endphp
                @foreach($ethMonths as $m)
                    <button onclick="parentFilterMonth('{{ $m }}')" 
                            class="parent-month-tab whitespace-nowrap px-3 py-1.5 rounded-xl text-xs font-bold transition {{ $m == 'የካቲት' ? 'bg-indigo-600 text-white shadow-xs' : 'bg-slate-50 border text-slate-600 hover:bg-slate-100' }}">
                        {{ $m }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- 3. DEBTER FEED CONTAINER -->
        <div id="parent-debter-feed" class="space-y-4">
            
            <!-- Clean Empty State (መጀመሪያ ላይ ደብተሩ ንጹህ ነው) -->
            <div class="bg-white rounded-2xl border p-8 text-center shadow-sm">
                <div class="w-14 h-14 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center text-2xl mx-auto mb-3">
                    <i class="fas fa-book-open"></i>
                </div>
                <h4 class="text-sm font-bold text-slate-800" data-am="የልጅዎ ደብተር ንጹህ ነው!" data-en="Debter is Clean & Ready!">የልጅዎ ደብተር ንጹህ ነው!</h4>
                <p class="text-xs text-slate-500 mt-1 max-w-sm mx-auto leading-relaxed" data-am="እስካሁን ከመምህራን የተላከ አዲስ የቤት ስራ ወይም ማስታወሻ የለም። መምህሩ መልእክት ሲልክ እዚህ ገጽ ላይ በቅጽበት ይደርሶዎታል።" data-en="No new homework or notes from teachers yet. They will appear here in real-time.">
                    እስካሁን ከመምህራን የተላከ አዲስ የቤት ስራ ወይም ማስታወሻ የለም። መምህሩ መልእክት ሲልክ እዚህ ገጽ ላይ በቅጽበት ይደርሶዎታል።
                </p>
                <div class="mt-4 inline-flex items-center space-x-1.5 text-[11px] font-bold text-emerald-600 bg-emerald-50 border border-emerald-200 px-3 py-1 rounded-full">
                    <i class="fas fa-check-circle"></i>
                    <span data-am="ሲስተሙ ከት/ቤቱ ጋር በቀጥታ ተገናኝቷል" data-en="Connected directly to School">ሲስተሙ ከት/ቤቱ ጋር በቀጥታ ተገናኝቷል</span>
                </div>
            </div>

        </div>

    </main>

    <!-- Mela Solution Shared Footer -->
    @include('partials.footer')

    <!-- Interactive Scripts -->
    <script>
        // 1. LANGUAGE SWITCHER (አማርኛ ⇄ English)
        let parentLang = 'am';
        function toggleParentLanguage(btn) {
            parentLang = (parentLang === 'am') ? 'en' : 'am';
            document.getElementById('parent-lang-btn').innerText = (parentLang === 'am') ? 'English' : 'አማርኛ';

            document.querySelectorAll('[data-am]').forEach(el => {
                el.innerText = (parentLang === 'am') ? el.getAttribute('data-am') : el.getAttribute('data-en');
            });
        }

        // 2. AUTO-SYNC WITH PHONE DATE TO ETHIOPIAN CALENDAR
        function getEthiopianDate(date = new Date()) {
            const gYear = date.getFullYear();
            const gMonth = date.getMonth() + 1;
            const gDay = date.getDate();
            const months = ["መስከረም", "ጥቅምት", "ህዳር", "ታህሳስ", "ጥር", "የካቲት", "መጋቢት", "ሚያዝያ", "ግንቦት", "ሰኔ", "ሐምሌ", "ነሐሴ", "ጳጉሜ"];

            const jdn = Math.floor((1461 * (gYear + 4800 + Math.floor((gMonth - 14) / 12))) / 4) +
                        Math.floor((367 * (gMonth - 2 - 12 * Math.floor((gMonth - 14) / 12))) / 12) -
                        Math.floor((3 * Math.floor((gYear + 4900 + Math.floor((gMonth - 14) / 12)) / 100)) / 4) +
                        gDay - 32075;
            const r = (jdn - 1723856) % 1461;
            const n = (r % 365) + 365 * Math.floor(r / 1460);
            const ethYear = 4 * Math.floor((jdn - 1723856) / 1461) + Math.floor(r / 365) - Math.floor(r / 1460);
            const ethMonthIndex = Math.min(Math.floor(n / 30), 12);
            const ethDay = (n % 30) + 1;

            return { year: ethYear, monthName: months[ethMonthIndex], day: ethDay };
        }

        window.addEventListener('DOMContentLoaded', () => {
            const ethDate = getEthiopianDate();
            document.getElementById('parent-eth-date').innerText = `🇪🇹 ዛሬ፡ ${ethDate.monthName} ${ethDate.day} / ${ethDate.year} ዓ.ም`;
        });

        // 3. PARENT MONTHLY ARCHIVE FILTER
        function parentFilterMonth(monthName) {
            document.querySelectorAll('.parent-month-tab').forEach(t => {
                t.className = 'parent-month-tab whitespace-nowrap px-3 py-1.5 rounded-xl text-xs font-bold transition bg-slate-50 border text-slate-600 hover:bg-slate-100';
            });
            event.target.className = 'parent-month-tab whitespace-nowrap px-3 py-1.5 rounded-xl text-xs font-bold transition bg-indigo-600 text-white shadow-xs';
            alert(`የ ${monthName} ወር የደብተር ማህደር ተመርጧል።`);
        }

        // 4. SIGN BUTTON
        function toggleSign(btn) {
            btn.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
            btn.classList.add('bg-emerald-600', 'cursor-default');
            btn.innerHTML = '<i class="fas fa-check-double mr-1"></i> ተረጋግጧል (ተፈርሟል)';
            btn.disabled = true;
        }

        // PWA Script
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => { navigator.serviceWorker.register('/sw.js'); });
        }
    </script>

</body>
</html>
