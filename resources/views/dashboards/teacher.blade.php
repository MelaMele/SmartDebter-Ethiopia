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
    <link rel="apple-touch-icon" href="https://cdn-icons-png.flaticon.com/512/2997/2997295.png">

    <!-- Tailwind CSS & FontAwesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-100 font-sans min-h-screen pb-12">

    <!-- Top Header -->
    <header class="bg-white border-b shadow-sm sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-4 py-3 flex flex-col sm:flex-row items-center justify-between gap-3">
            
            <div class="flex items-center space-x-3 w-full sm:w-auto">
                <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-base shadow-xs shrink-0">
                    መ
                </div>
                <div>
                    <h2 class="text-sm font-bold text-slate-900 leading-tight">{{ $teacherName ?? 'የክፍል ኃላፊ መምህር' }}</h2>
                    <p class="text-[11px] text-slate-500">የተመደቡበት ክፍል፡ <b class="text-emerald-700 font-bold">{{ $classCode ?? 'ክፍል 7-B' }}</b></p>
                </div>
            </div>

            <!-- Auto-synced Date Badge (ከስልኩ ጋር ራሱን ያመሳስላል) -->
            <div class="flex items-center space-x-3 w-full sm:w-auto justify-between sm:justify-end">
                <div class="bg-emerald-50 border border-emerald-200 px-3 py-1.5 rounded-xl text-xs flex items-center space-x-2">
                    <i class="far fa-calendar-alt text-emerald-600"></i>
                    <span id="header-eth-date" class="text-emerald-900 font-bold">ዛሬ፡ በመጫን ላይ...</span>
                </div>

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
                <p class="text-[11px] font-bold text-slate-500 uppercase">ክፍል / Class</p>
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

        <!-- 2. Dynamic Moving Ad Carousel -->
        @include('partials.ad-slider', ['sliderId' => 'teacher-slider'])

        <!-- 3. POST TO DEBTER FORM (ከስልኩ ካሌንደር ጋር ራሱን ያመሳሰለ) -->
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

                <!-- AUTO-SYNCED ETHIOPIAN DATE BOX -->
                <div class="p-4 bg-emerald-50/60 border border-emerald-200 rounded-2xl space-y-3">
                    <div class="flex items-center justify-between">
                        <label class="text-xs font-bold text-emerald-950 flex items-center">
                            <i class="far fa-calendar-check text-emerald-600 mr-1.5 text-sm"></i>
                            የማስረከቢያ ቀን (ከስልክዎ ካሌንደር ጋር የተገናኘ)
                        </label>
                        <span class="text-[10px] bg-emerald-200/60 text-emerald-800 font-bold px-2 py-0.5 rounded">የዛሬ ቀን ተመርጧል</span>
                    </div>

                    <div class="grid grid-cols-3 gap-2">
                        <!-- Day (ቀን) -->
                        <div>
                            <label class="block text-[10px] font-bold text-slate-600 mb-0.5">ቀን</label>
                            <select id="eth-day" class="w-full p-2 bg-white border border-slate-200 rounded-xl text-xs font-bold text-slate-800">
                                @for($d = 1; $d <= 30; $d++)
                                    <option value="{{ $d }}">{{ $d }}</option>
                                @endfor
                            </select>
                        </div>

                        <!-- Month (ወር) -->
                        <div>
                            <label class="block text-[10px] font-bold text-slate-600 mb-0.5">ወር</label>
                            <select id="eth-month" class="w-full p-2 bg-white border border-slate-200 rounded-xl text-xs font-bold text-slate-800">
                                <option value="መስከረም">መስከረም</option>
                                <option value="ጥቅምት">ጥቅምት</option>
                                <option value="ህዳር">ህዳር</option>
                                <option value="ታህሳስ">ታህሳስ</option>
                                <option value="ጥር">ጥር</option>
                                <option value="የካቲት">የካቲት</option>
                                <option value="መጋቢት">መጋቢት</option>
                                <option value="ሚያዝያ">ሚያዝያ</option>
                                <option value="ግንቦት">ግንቦት</option>
                                <option value="ሰኔ">ሰኔ</option>
                                <option value="ሐምሌ">ሐምሌ</option>
                                <option value="ነሐሴ">ነሐሴ</option>
                                <option value="ጳጉሜ">ጳጉሜ</option>
                            </select>
                        </div>

                        <!-- Year (ዓ.ም) -->
                        <div>
                            <label class="block text-[10px] font-bold text-slate-600 mb-0.5">ዓ.ም</label>
                            <select id="eth-year" class="w-full p-2 bg-white border border-slate-200 rounded-xl text-xs font-bold text-slate-800">
                                <option value="2017">2017 ዓ.ም</option>
                                <option value="2018">2018 ዓ.ም</option>
                            </select>
                        </div>
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

        <!-- 4. MONTHLY ARCHIVE SYSTEM (የመልእክቶች የወራት ማህደር) -->
        <div class="bg-white rounded-2xl border shadow-sm overflow-hidden">
            <div class="p-4 border-b bg-slate-50 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                <div>
                    <h3 class="font-bold text-sm text-slate-900 flex items-center">
                        <i class="fas fa-folder-open text-amber-500 mr-2"></i>
                        የመልእክቶች እና የቤት ስራዎች የወራት ማህደር
                    </h3>
                    <p class="text-[11px] text-slate-500">መልእክቶችን በየወሩ ተከፋፍለው በቀላሉ ያግኙ</p>
                </div>
                <span class="text-xs font-bold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-lg border border-emerald-200">2017 የትምህርት ዘመን</span>
            </div>

            <!-- Month Folders/Tabs (ከመስከረም እስከ ሰኔ) -->
            <div class="p-3 bg-slate-50/60 border-b overflow-x-auto flex space-x-2">
                <button onclick="filterByMonth('መስከረም')" class="month-tab whitespace-nowrap px-3 py-1.5 rounded-xl text-xs font-bold bg-white border text-slate-600 hover:bg-slate-100">መስከረም</button>
                <button onclick="filterByMonth('ጥቅምት')" class="month-tab whitespace-nowrap px-3 py-1.5 rounded-xl text-xs font-bold bg-white border text-slate-600 hover:bg-slate-100">ጥቅምት</button>
                <button onclick="filterByMonth('ህዳር')" class="month-tab whitespace-nowrap px-3 py-1.5 rounded-xl text-xs font-bold bg-white border text-slate-600 hover:bg-slate-100">ህዳር</button>
                <button onclick="filterByMonth('ታህሳስ')" class="month-tab whitespace-nowrap px-3 py-1.5 rounded-xl text-xs font-bold bg-white border text-slate-600 hover:bg-slate-100">ታህሳስ</button>
                <button onclick="filterByMonth('ጥር')" class="month-tab whitespace-nowrap px-3 py-1.5 rounded-xl text-xs font-bold bg-white border text-slate-600 hover:bg-slate-100">ጥር</button>
                <!-- Active Month (የካቲት) -->
                <button onclick="filterByMonth('የካቲት')" class="month-tab active-tab whitespace-nowrap px-3.5 py-1.5 rounded-xl text-xs font-bold bg-emerald-600 text-white shadow-xs">⭐️ የካቲት (የአሁኑ ወር)</button>
                <button onclick="filterByMonth('መጋቢት')" class="month-tab whitespace-nowrap px-3 py-1.5 rounded-xl text-xs font-bold bg-white border text-slate-600 hover:bg-slate-100">መጋቢት</button>
                <button onclick="filterByMonth('ሚያዝያ')" class="month-tab whitespace-nowrap px-3 py-1.5 rounded-xl text-xs font-bold bg-white border text-slate-600 hover:bg-slate-100">ሚያዝያ</button>
                <button onclick="filterByMonth('ግንቦት')" class="month-tab whitespace-nowrap px-3 py-1.5 rounded-xl text-xs font-bold bg-white border text-slate-600 hover:bg-slate-100">ግንቦት</button>
                <button onclick="filterByMonth('ሰኔ')" class="month-tab whitespace-nowrap px-3 py-1.5 rounded-xl text-xs font-bold bg-white border text-slate-600 hover:bg-slate-100">ሰኔ</button>
            </div>

            <!-- Sent Messages Container -->
            <div id="teacher-sent-list" class="divide-y text-sm">
                <!-- Clean Empty State -->
                <div id="teacher-empty-state" class="text-center py-10 text-slate-400">
                    <i class="fas fa-folder text-3xl mb-2 text-slate-300"></i>
                    <p class="text-xs font-medium">በተመረጠው ወር ውስጥ እስካሁን የተላከ የቤት ስራ የለም።</p>
                    <p class="text-[10px] text-slate-400 mt-0.5">ከላይ ያለውን ቅጽ በመጠቀም የመጀመሪያውን መልእክት ወደ ወላጆች ይላኩ።</p>
                </div>
            </div>
        </div>

    </main>

    <!-- Mela Solution Shared Footer -->
    @include('partials.footer')

    <!-- Ethiopian Calendar Auto-Sync & Archiving Scripts -->
    <script>
        // 1. AUTO-SYNC WITH PHONE CALENDAR TO ETHIOPIAN DATE
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

        // Apply on Page Load
        window.addEventListener('DOMContentLoaded', () => {
            const ethDate = getEthiopianDate();
            
            // Header display
            document.getElementById('header-eth-date').innerText = `🇪🇹 ዛሬ፡ ${ethDate.monthName} ${ethDate.day} ቀን ${ethDate.year} ዓ.ም`;
            
            // Auto-select dropdowns
            document.getElementById('eth-day').value = ethDate.day;
            document.getElementById('eth-month').value = ethDate.monthName;
            document.getElementById('eth-year').value = ethDate.year;
        });

        // 2. MONTHLY FILTER LOGIC
        function filterByMonth(monthName) {
            document.querySelectorAll('.month-tab').forEach(t => {
                t.className = 'month-tab whitespace-nowrap px-3 py-1.5 rounded-xl text-xs font-bold bg-white border text-slate-600 hover:bg-slate-100';
            });
            event.target.className = 'month-tab active-tab whitespace-nowrap px-3.5 py-1.5 rounded-xl text-xs font-bold bg-emerald-600 text-white shadow-xs';

            const items = document.querySelectorAll('.debter-entry-item');
            let matchCount = 0;

            items.forEach(item => {
                if (item.getAttribute('data-month') === monthName) {
                    item.classList.remove('hidden');
                    matchCount++;
                } else {
                    item.classList.add('hidden');
                }
            });

            if (matchCount === 0 && items.length > 0) {
                alert(`በ ${monthName} ወር ውስጥ የተላከ የቤት ስራ የለም።`);
            }
        }

        // 3. SEND NOTE WITH AUTO DATE
        function sendTeacherNote(form) {
            const cat = document.getElementById('note-category').value;
            const title = document.getElementById('note-title').value;
            const body = document.getElementById('note-body').value;
            const day = document.getElementById('eth-day').value;
            const month = document.getElementById('eth-month').value;
            const year = document.getElementById('eth-year').value;

            document.getElementById('teacher-empty-state')?.remove();

            const cur = parseInt(document.getElementById('teacher-sent-count').innerText) || 0;
            document.getElementById('teacher-sent-count').innerText = cur + 1;
            document.getElementById('teacher-pending-count').innerText = 'በመጠበቅ ላይ';
            document.getElementById('teacher-pending-count').classList.add('text-amber-600');

            const item = document.createElement('div');
            item.className = 'debter-entry-item p-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 hover:bg-slate-50 transition';
            item.setAttribute('data-month', month);
            item.innerHTML = `
                <div>
                    <div class="flex items-center space-x-2">
                        <span class="bg-purple-100 text-purple-700 text-[10px] font-bold px-2 py-0.5 rounded">${cat}</span>
                        <h4 class="font-bold text-slate-900">${title}</h4>
                        <span class="text-[9px] bg-emerald-100 text-emerald-800 font-bold px-1.5 py-0.5 rounded">ማህደር፡ ${month}</span>
                    </div>
                    <p class="text-xs text-slate-500 mt-1">${body}</p>
                    <span class="inline-block mt-1 text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded border border-emerald-200">
                        <i class="far fa-clock mr-1"></i>የማስረከቢያ ቀን፡ ${month} ${day} ቀን ${year} ዓ.ም
                    </span>
                </div>
                <div class="flex items-center space-x-3">
                    <span class="text-xs font-bold text-amber-600 bg-amber-50 border border-amber-200 px-2.5 py-1 rounded-full">
                        <i class="fas fa-clock mr-1"></i>ለወላጆች ደርሷል
                    </span>
                </div>
            `;

            document.getElementById('teacher-sent-list').prepend(item);
            form.reset();
            alert(`🎉 መልእክቱ ወደ "${month} ወር" ማህደር ተመዝግቦ ለወላጆች ተልኳል!`);
        }

        // PWA Script
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => { navigator.serviceWorker.register('/sw.js'); });
        }
    </script>

</body>
</html>
