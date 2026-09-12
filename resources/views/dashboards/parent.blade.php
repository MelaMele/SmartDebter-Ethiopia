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
    <link rel="apple-touch-icon" href="https://cdn-icons-png.flaticon.com/512/2997/2997295.png">

    <!-- Tailwind CSS & Icons -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-100 font-sans min-h-screen pb-16">

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
                <div class="bg-blue-50 border border-blue-200 px-2.5 py-1 rounded-xl text-xs flex items-center space-x-1.5">
                    <i class="far fa-calendar-alt text-blue-600 text-xs"></i>
                    <span id="parent-eth-date" class="text-blue-950 font-bold text-[11px]">በመጫን ላይ...</span>
                </div>

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

    <!-- Child Profile Card & Write Note Button -->
    <div class="max-w-3xl mx-auto px-4 pt-4">
        <div class="bg-white rounded-2xl p-3 border shadow-sm flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
            <div class="flex items-center space-x-3">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider" data-am="የእርስዎ ተማሪ:" data-en="Student:">የእርስዎ ተማሪ:</span>
                <button class="flex items-center space-x-2 bg-indigo-50 border-2 border-indigo-600 px-3.5 py-1.5 rounded-xl text-xs font-bold text-indigo-950 shadow-xs">
                    <span class="w-2 h-2 rounded-full bg-indigo-600"></span>
                    <span>{{ $parent['children'][0]['name'] ?? 'ተማሪ' }} ({{ $parent['children'][0]['grade'] ?? 'ክፍል 7-B' }})</span>
                </button>
            </div>

            <!-- BUTTON: WRITE NOTE TO TEACHER OR UNIT LEADER -->
            <button onclick="openModal('parent-write-modal')" class="w-full sm:w-auto bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-4 py-2 rounded-xl transition shadow flex items-center justify-center space-x-1.5">
                <i class="fas fa-pen-alt text-xs"></i>
                <span data-am="ለመምህሩ / ለተጠሪው መልእክት ይጻፉ" data-en="Write to Teacher/Leader">ለመምህሩ / ለተጠሪው መልእክት ይጻፉ</span>
            </button>
        </div>
    </div>

    <!-- Main Feed / Timeline -->
    <main class="max-w-3xl mx-auto px-4 mt-4 space-y-4">

        <!-- 1. DYNAMIC MOVING AD CAROUSEL -->
        @include('partials.ad-slider', ['sliderId' => 'parent-feed-slider'])

        <!-- 2. MONTHLY ARCHIVE TABS -->
        <div class="bg-white rounded-2xl border shadow-sm overflow-hidden">
            <div class="p-3 bg-slate-50/70 border-b flex items-center justify-between">
                <span class="text-xs font-bold text-slate-700 flex items-center">
                    <i class="fas fa-folder text-amber-500 mr-1.5"></i>
                    <span data-am="የደብተሩ የወራት ማህደር" data-en="Monthly Archives">የደብተሩ የወራት ማህደር</span>
                </span>
                <span class="text-[10px] text-indigo-700 bg-indigo-50 px-2 py-0.5 rounded-md font-bold">2017 ዓ.ም</span>
            </div>

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

        <!-- 3. SENT NOTES BY PARENT (ወላጅ የላካቸው መልእክቶች) -->
        <div id="parent-sent-box" class="hidden space-y-3">
            <h4 class="text-xs font-bold text-slate-700 flex items-center">
                <i class="fas fa-paper-plane text-emerald-600 mr-1.5"></i>
                <span>እርስዎ የላኳቸው ማስታወሻዎች</span>
            </h4>
            <div id="parent-sent-items" class="space-y-2"></div>
        </div>

        <!-- 4. DEBTER FEED CONTAINER -->
        <div id="parent-debter-feed" class="space-y-4">
            <div class="bg-white rounded-2xl border p-8 text-center shadow-sm">
                <div class="w-14 h-14 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center text-2xl mx-auto mb-3">
                    <i class="fas fa-book-open"></i>
                </div>
                <h4 class="text-sm font-bold text-slate-800" data-am="የልጅዎ ደብተር ንጹህ ነው!" data-en="Debter is Clean & Ready!">የልጅዎ ደብተር ንጹህ ነው!</h4>
                <p class="text-xs text-slate-500 mt-1 max-w-sm mx-auto leading-relaxed" data-am="እስካሁን ከመምህራን የተላከ አዲስ የቤት ስራ የለም። መምህሩ መልእክት ሲልክ እዚህ ገጽ ላይ በቅጽበት ይደርሶዎታል።" data-en="No new homework yet. It will appear here in real-time.">
                    እስካሁን ከመምህራን የተላከ አዲስ የቤት ስራ የለም። መምህሩ መልእክት ሲልክ እዚህ ገጽ ላይ በቅጽበት ይደርሶዎታል።
                </p>
            </div>
        </div>

    </main>

    <!-- ==================== PARENT WRITE MESSAGE MODAL ==================== -->
    <div id="parent-write-modal" class="hidden fixed inset-0 z-50 bg-black/70 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-xl border">
            <div class="flex items-center justify-between pb-3 border-b">
                <h3 class="font-bold text-sm text-slate-900 flex items-center">
                    <i class="fas fa-envelope-open-text text-emerald-600 mr-2"></i>
                    ወደ ትምህርት ቤቱ መልእክት ይጻፉ
                </h3>
                <button onclick="closeModal('parent-write-modal')" class="text-slate-400 hover:text-slate-600 text-lg">✕</button>
            </div>

            <form action="#" onsubmit="event.preventDefault(); sendParentMessage();" class="my-4 space-y-3.5">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">ተቀባይ ይምረጡ (Recipient)</label>
                    <select id="msg-recipient" class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs font-bold">
                        <option value="መምህር">ለክፍል ኃላፊ መምህር (Homeroom Teacher)</option>
                        <option value="ተጠሪ">ለዲቪዥን ተጠሪ (Unit Leader / Administration)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">የመልእክቱ አይነት (Topic)</label>
                    <select id="msg-topic" class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs font-bold">
                        <option value="የህመም ፈቃድ ማስታወሻ">🤒 የህመም / የፈቃድ ማስታወሻ (Sick Leave)</option>
                        <option value="የቤት ስራ ጥያቄ">📝 የቤት ስራ ጥያቄ / አስተያየት</option>
                        <option value="የስነ-ምግባር ማስታወሻ">🌟 የባህሪ / የስነ-ምግባር ጉዳይ</option>
                        <option value="አጠቃላይ ጥያቄ">💬 አጠቃላይ ጥያቄ / አስተያየት</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">መልእክትዎን እዚህ ይጻፉ</label>
                    <textarea id="msg-text" rows="4" placeholder="ምሳሌ፡ ልጄ ዛሬ ህመም ስለተሰማው ወደ ት/ቤት መምጣት አይችልም..." required
                              class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                </div>

                <div class="flex items-center justify-end space-x-2 pt-2 border-t">
                    <button type="button" onclick="closeModal('parent-write-modal')" class="px-4 py-2 rounded-xl text-xs font-bold text-slate-600 bg-slate-100">ይቅር</button>
                    <button type="submit" class="px-5 py-2 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow flex items-center space-x-1.5">
                        <i class="fas fa-paper-plane text-xs"></i>
                        <span>ላክ (Send Message)</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Mela Solution Shared Footer -->
    @include('partials.footer')

    <!-- Interactive Scripts -->
    <script>
        function openModal(id) { document.getElementById(id).classList.remove('hidden'); }
        function closeModal(id) { document.getElementById(id).classList.add('hidden'); }

        function toggleParentLanguage(btn) {
            const label = document.getElementById('parent-lang-btn');
            label.innerText = (label.innerText === 'English') ? 'አማርኛ' : 'English';
        }

        // AUTO-SYNC ETHIOPIAN DATE
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

        // PARENT SENDS MESSAGE TO TEACHER / LEADER
        function sendParentMessage() {
            const rec = document.getElementById('msg-recipient').value;
            const top = document.getElementById('msg-topic').value;
            const txt = document.getElementById('msg-text').value;

            document.getElementById('parent-sent-box').classList.remove('hidden');

            const item = document.createElement('div');
            item.className = 'p-3 bg-emerald-50 rounded-xl border border-emerald-200 text-xs text-slate-800 space-y-1';
            item.innerHTML = `
                <div class="flex items-center justify-between">
                    <span class="font-bold text-emerald-900">${top} (${rec})</span>
                    <span class="text-[10px] bg-white px-2 py-0.5 rounded border border-emerald-300 font-bold text-emerald-700">ተልኳል</span>
                </div>
                <p class="text-slate-600">${txt}</p>
            `;

            document.getElementById('parent-sent-items').prepend(item);
            document.getElementById('msg-text').value = '';
            closeModal('parent-write-modal');

            alert(`🎉 መልእክትዎ ለ${rec}ው በተሳካ ሁኔታ ተልኳል! ወደ ት/ቤቱ ገጽ ደርሷል።`);
        }

        function parentFilterMonth(m) {
            alert(`የ ${m} ወር የደብተር ማህደር ተመርጧል።`);
        }

        // PWA Script
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => { navigator.serviceWorker.register('/sw.js'); });
        }
    </script>

</body>
</html>
