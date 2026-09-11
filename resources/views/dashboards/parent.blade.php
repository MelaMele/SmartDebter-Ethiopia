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
<body class="bg-slate-100 font-sans min-h-screen pb-12">

    <!-- PWA Install Banner -->
    <div id="pwa-install-banner" class="hidden bg-indigo-900 text-white px-4 py-2.5 shadow-md">
        <div class="max-w-3xl mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <img src="https://cdn-icons-png.flaticon.com/512/2997/2997295.png" alt="Logo" class="w-8 h-8 rounded-lg">
                <div>
                    <p class="text-xs font-bold leading-tight" data-am="SmartDebter አፕሊኬሽን" data-en="SmartDebter App">SmartDebter አፕሊኬሽን</p>
                    <p class="text-[10px] text-indigo-200" data-am="በቀላሉ ስልክዎ ላይ ጭነው ይጠቀሙ!" data-en="Install on your phone!">በቀላሉ ስልክዎ ላይ ጭነው ይጠቀሙ!</p>
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
                    <p class="text-[11px] text-slate-500"><span data-am="የተመዘገበ ስልክ፡" data-en="Phone:">የተመዘገበ ስልክ፡</span> {{ $phone ?? '0911000000' }}</p>
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

    <!-- Child Profile Card & Action Bar -->
    <div class="max-w-3xl mx-auto px-4 pt-4 flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3">
        <div class="bg-white rounded-2xl p-3 border shadow-xs flex items-center space-x-3 flex-1">
            <span class="text-xs font-bold text-slate-500 uppercase tracking-wider" data-am="የእርስዎ ተማሪ:" data-en="Your Student:">የእርስዎ ተማሪ:</span>
            <span class="flex items-center space-x-2 bg-indigo-50 border-2 border-indigo-600 px-3 py-1 rounded-xl text-xs font-bold text-indigo-950 shadow-xs">
                <span class="w-2 h-2 rounded-full bg-indigo-600"></span>
                <span>{{ $parent['children'][0]['name'] ?? 'ዮናስ ዳዊት' }} ({{ $parent['children'][0]['grade'] ?? 'ክፍል 7-B' }})</span>
            </span>
        </div>

        <!-- BUTTON TO OPEN MESSAGE TO TEACHER / UNIT LEADER -->
        <button onclick="openParentMessageModal()" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-4 py-3 rounded-2xl shadow-sm transition flex items-center justify-center space-x-2 shrink-0">
            <i class="fas fa-comment-dots text-sm"></i>
            <span data-am="ለመምህሩ መልእክት ይጻፉ" data-en="Message Teacher / Leader">ለመምህሩ መልእክት ይጻፉ</span>
        </button>
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
                    <span data-am="የደብተሩ የወራት ማህደር (ወር ይምረጡ)" data-en="Monthly Debter Archives">የደብተሩ የወራት ማህደር (ወር ይምረጡ)</span>
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

        <!-- 3. DEBTER FEED CONTAINER (ሁለቱንም ያሳያል፡ ከመምህር የመጣ እና ወላጅ የላከው) -->
        <div id="parent-debter-feed" class="space-y-4">
            
            <!-- Clean Empty State -->
            <div id="parent-empty-state" class="bg-white rounded-2xl border p-8 text-center shadow-sm">
                <div class="w-14 h-14 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center text-2xl mx-auto mb-3">
                    <i class="fas fa-book-open"></i>
                </div>
                <h4 class="text-sm font-bold text-slate-800" data-am="የልጅዎ ደብተር ንጹህ ነው!" data-en="Debter is Clean & Ready!">የልጅዎ ደብተር ንጹህ ነው!</h4>
                <p class="text-xs text-slate-500 mt-1 max-w-sm mx-auto leading-relaxed" data-am="እስካሁን ከመምህራን የተላከ አዲስ ማስታወሻ የለም። ጥያቄ ካለዎት ከላይ 'ለመምህሩ መልእክት ይጻፉ' የሚለውን ነክተው መላክ ይችላሉ።" data-en="No notes yet. Click 'Message Teacher' above if you have any questions or leave requests.">
                    እስካሁን ከመምህራን የተላከ አዲስ ማስታወሻ የለም። ጥያቄ ካለዎት ከላይ <b>"ለመምህሩ መልእክት ይጻፉ"</b> የሚለውን ነክተው መላክ ይችላሉ።
                </p>
            </div>

        </div>

    </main>

    <!-- ================= MODAL: PARENT MESSAGE TO TEACHER / UNIT LEADER ================= -->
    <div id="parent-message-modal" class="hidden fixed inset-0 z-50 bg-black/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-2xl border">
            <div class="flex items-center justify-between pb-3 border-b">
                <h3 class="font-bold text-sm text-slate-900 flex items-center">
                    <i class="fas fa-paper-plane text-emerald-600 mr-2"></i>
                    <span data-am="ለትምህርት ቤቱ መልእክት ይጻፉ" data-en="Send Message to School">ለትምህርት ቤቱ መልእክት ይጻፉ</span>
                </h3>
                <button onclick="closeParentMessageModal()" class="text-slate-400 hover:text-slate-600 text-lg">✕</button>
            </div>

            <form action="#" onsubmit="event.preventDefault(); submitParentMessage(this);" class="my-4 space-y-3.5">
                <!-- 1. Select Recipient (ተቀባይ ይምረጡ) -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1" data-am="መልእክቱ ለማን ይድረስ?" data-en="Send Message To:">መልእክቱ ለማን ይድረስ?</label>
                    <select id="p-recipient" class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs font-bold text-slate-800 focus:ring-2 focus:ring-emerald-500">
                        <option value="የክፍል ኃላፊ መምህር">👨‍🏫 ለክፍል ኃላፊው መምህር (Homeroom Teacher)</option>
                        <option value="የዲቪዥን ተጠሪ / ዩኒት ሊደር">🏢 ለዲቪዥኑ ተጠሪ / ዩኒት ሊደር (Division Unit Leader)</option>
                    </select>
                </div>

                <!-- 2. Message Category -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1" data-am="የመልእክቱ አይነት" data-en="Message Topic">የመልእክቱ አይነት</label>
                    <select id="p-category" class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs focus:ring-2 focus:ring-emerald-500">
                        <option value="የመቅረት ፈቃድ">🤒 የመቅረት ፈቃድ / የህመም ማስታወሻ (Absence Request)</option>
                        <option value="የቤት ስራ ጥያቄ">❓ ስለ ትምህርት / የቤት ስራ ጥያቄ (Homework Inquiry)</option>
                        <option value="ስነ-ምግባርና ባህሪ">⚠️ ስለ ባህሪ / አጠቃላይ አስተያየት (Behavior / Concern)</option>
                        <option value="አጠቃላይ ጥያቄ">💬 አጠቃላይ ጥያቄ (General Inquiry)</option>
                    </select>
                </div>

                <!-- 3. Message Body -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1" data-am="የመልእክቱ ዝርዝር" data-en="Message Details">የመልእክቱ ዝርዝር</label>
                    <textarea rows="4" id="p-body" placeholder="ለልጅዎ መምህር ወይም ዩኒት ሊደር የሚተላለፈውን መልእክት እዚህ ይጻፉ..." required
                              class="w-full p-3 bg-slate-50 border rounded-xl text-xs focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                </div>

                <div class="flex items-center justify-end space-x-2 pt-2 border-t">
                    <button type="button" onclick="closeParentMessageModal()" class="px-4 py-2 rounded-xl text-xs font-bold text-slate-600 bg-slate-100" data-am="ይቅር" data-en="Cancel">ይቅር</button>
                    <button type="submit" class="px-5 py-2.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow flex items-center space-x-1.5">
                        <i class="fas fa-paper-plane text-xs"></i>
                        <span data-am="መልእክቱን ላክ" data-en="Send Message">መልእክቱን ላክ</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Mela Solution Shared Footer -->
    @include('partials.footer')

    <!-- Interactive Scripts -->
    <script>
        // 1. LANGUAGE SWITCHER
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

        function openParentMessageModal() {
            document.getElementById('parent-message-modal').classList.remove('hidden');
        }
        function closeParentMessageModal() {
            document.getElementById('parent-message-modal').classList.add('hidden');
        }

        // 3. SUBMIT PARENT MESSAGE (ወላጁ ሲልክ በደብተሩ ላይ ወዲያውኑ ይቀመጣል)
        function submitParentMessage(form) {
            const recipient = document.getElementById('p-recipient').value;
            const category = document.getElementById('p-category').value;
            const body = document.getElementById('p-body').value;
            const ethDate = getEthiopianDate();

            document.getElementById('parent-empty-state')?.remove();

            const card = document.createElement('div');
            card.className = 'bg-white rounded-2xl border border-emerald-200 shadow-sm p-4 space-y-2';
            card.innerHTML = `
                <div class="flex items-center justify-between border-b pb-2">
                    <div class="flex items-center space-x-2">
                        <span class="w-7 h-7 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center text-xs font-bold">
                            <i class="fas fa-paper-plane"></i>
                        </span>
                        <div>
                            <span class="text-[11px] font-bold text-slate-800">ከእርስዎ የተላከ መልእክት</span>
                            <p class="text-[9px] text-slate-400">${ethDate.monthName} ${ethDate.day} ቀን ${ethDate.year} ዓ.ም</p>
                        </div>
                    </div>
                    <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 border border-emerald-200 px-2 py-0.5 rounded-full">
                        ተቀባይ፡ ${recipient}
                    </span>
                </div>

                <div class="text-xs text-slate-700 leading-relaxed pt-1">
                    <span class="font-bold text-slate-900 block mb-0.5">[${category}]</span>
                    ${body}
                </div>

                <div class="pt-2 border-t flex items-center justify-between text-[10px] text-slate-400">
                    <span class="text-amber-600 font-bold flex items-center">
                        <i class="fas fa-clock mr-1"></i>መልእክቱ ደርሷል (መምህሩ/ተጠሪው ሲያዩት እዚህ ማሳወቂያ ይደርሶዎታል)
                    </span>
                </div>
            `;

            document.getElementById('parent-debter-feed').prepend(card);
            closeParentMessageModal();
            form.reset();
            alert(`🎉 መልእክትዎ ለ${recipient} በተሳካ ሁኔታ ደርሷል!`);
        }

        function parentFilterMonth(monthName) {
            document.querySelectorAll('.parent-month-tab').forEach(t => {
                t.className = 'parent-month-tab whitespace-nowrap px-3 py-1.5 rounded-xl text-xs font-bold transition bg-slate-50 border text-slate-600 hover:bg-slate-100';
            });
            event.target.className = 'parent-month-tab whitespace-nowrap px-3 py-1.5 rounded-xl text-xs font-bold transition bg-indigo-600 text-white shadow-xs';
            alert(`የ ${monthName} ወር የደብተር ማህደር ተመርጧል።`);
        }

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
