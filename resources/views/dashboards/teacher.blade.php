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
                    <p class="text-[11px] text-slate-500">የተመደቡበት ክፍል / Assigned Class: <b class="text-emerald-700 font-bold">{{ $classCode ?? 'ክፍል 7-B' }}</b></p>
                </div>
            </div>

            <div class="flex items-center space-x-3 w-full sm:w-auto justify-between sm:justify-end">
                <!-- Dual Calendar Badge -->
                <div class="bg-emerald-50 border border-emerald-200 px-3 py-1 rounded-xl text-xs flex items-center space-x-2">
                    <span class="text-emerald-800 font-bold">🇪🇹 የካቲት 2017 ዓ.ም</span>
                    <span class="text-slate-300">|</span>
                    <span class="text-slate-500 font-medium text-[11px]">Feb 2025</span>
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

        <!-- 3. POST TO DEBTER FORM (ከነ ኢትዮጵያ የቀን መቁጠሪያ ሳጥን ጋር) -->
        <div class="bg-white rounded-2xl border shadow-sm p-5 sm:p-6">
            <h3 class="text-base font-bold text-slate-900 mb-4 flex items-center">
                <i class="fas fa-edit text-emerald-600 mr-2"></i>
                ወደ ደብተር አዲስ መልእክት ይጻፉ / New Entry (ለ{{ $classCode ?? 'ክፍል 7-B' }})
            </h3>

            <form action="#" onsubmit="event.preventDefault(); sendTeacherNote(this);" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">ተቀባይ / Target</label>
                        <select class="w-full p-2.5 bg-slate-50 border rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option>ለሙሉ ክፍል ({{ $classCode ?? 'ክፍል 7-B' }})</option>
                            <option>ለተወሰነ ተማሪ ብቻ (Individual Student)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">የመልእክቱ አይነት / Category</label>
                        <select id="note-category" class="w-full p-2.5 bg-slate-50 border rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="የቤት ስራ">📝 የቤት ስራ (Homework)</option>
                            <option value="ባህሪና ምስጋና">🌟 የስነ-ምግባር ማስታወሻ / ምስጋና</option>
                            <option value="አስቸኳይ ማስታወቂያ">⚠️ አስቸኳይ ማስታወቂያ (Urgent)</option>
                            <option value="የቀን መገኘት">📅 የቀን መገኘት (መቅረት/ማርፈድ)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">የመልእክቱ ርዕስ / Title</label>
                    <input type="text" id="note-title" placeholder="ምሳሌ፡ የሂሳብ ምዕራፍ 3 መልመጃ" required
                           class="w-full p-2.5 bg-slate-50 border rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">የደብተሩ ዝርዝር መልእክት / Note Description</label>
                    <textarea rows="3" id="note-body" placeholder="ለወላጆች የሚተላለፈውን መልእክት እዚህ ይጻፉ..." required
                              class="w-full p-2.5 bg-slate-50 border rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                </div>

                <!-- ================= ETHIOPIAN & GREGORIAN DATE PICKER BOX ================= -->
                <div class="p-4 bg-emerald-50/50 border border-emerald-200 rounded-2xl space-y-3">
                    <div class="flex items-center justify-between">
                        <label class="text-xs font-bold text-emerald-950 flex items-center">
                            <i class="far fa-calendar-check text-emerald-600 mr-1.5 text-sm"></i>
                            የማስረከቢያ ቀን / Due Date
                        </label>
                        
                        <!-- Calendar Type Selector (E.C vs G.C) -->
                        <div class="flex bg-white rounded-lg border p-0.5 text-[11px] font-bold">
                            <button type="button" onclick="switchCalendar('ethiopian')" id="tab-eth" class="px-2.5 py-1 rounded-md bg-emerald-600 text-white transition">
                                🇪🇹 የኢትዮጵያ (E.C)
                            </button>
                            <button type="button" onclick="switchCalendar('gregorian')" id="tab-greg" class="px-2.5 py-1 rounded-md text-slate-600 hover:text-slate-900 transition">
                                🌍 ፈረንጅ (G.C)
                            </button>
                        </div>
                    </div>

                    <!-- 1. ETHIOPIAN DATE PICKER BOX (ቀን፣ ወር፣ ዓ.ም) -->
                    <div id="ethiopian-date-box" class="grid grid-cols-3 gap-2">
                        <!-- ቀን (Day: 1 - 30) -->
                        <div>
                            <label class="block text-[10px] font-bold text-slate-600 mb-0.5">ቀን (Day)</label>
                            <select id="eth-day" class="w-full p-2 bg-white border border-slate-200 rounded-xl text-xs font-bold text-slate-800">
                                @for($d = 1; $d <= 30; $d++)
                                    <option value="{{ $d }}" {{ $d == 19 ? 'selected' : '' }}>{{ $d }}</option>
                                @endfor
                            </select>
                        </div>

                        <!-- ወር (Month: መስከረም - ጳጉሜ) -->
                        <div>
                            <label class="block text-[10px] font-bold text-slate-600 mb-0.5">ወር (Month)</label>
                            <select id="eth-month" class="w-full p-2 bg-white border border-slate-200 rounded-xl text-xs font-bold text-slate-800">
                                <option value="መስከረም">መስከረም (Meskerem)</option>
                                <option value="ጥቅምት">ጥቅምት (Tikimt)</option>
                                <option value="ህዳር">ህዳር (Hidar)</option>
                                <option value="ታህሳስ">ታህሳስ (Tahsas)</option>
                                <option value="ጥር">ጥር (Tir)</option>
                                <option value="የካቲት" selected>የካቲት (Yekatit)</option>
                                <option value="መጋቢት">መጋቢት (Megabit)</option>
                                <option value="ሚያዝያ">ሚያዝያ (Miazia)</option>
                                <option value="ግንቦት">ግንቦት (Ginbot)</option>
                                <option value="ሰኔ">ሰኔ (Sene)</option>
                                <option value="ሐምሌ">ሐምሌ (Hamle)</option>
                                <option value="ነሐሴ">ነሐሴ (Nehase)</option>
                                <option value="ጳጉሜ">ጳጉሜ (Pagume)</option>
                            </select>
                        </div>

                        <!-- ዓ.ም (Year) -->
                        <div>
                            <label class="block text-[10px] font-bold text-slate-600 mb-0.5">ዓ.ም (Year)</label>
                            <select id="eth-year" class="w-full p-2 bg-white border border-slate-200 rounded-xl text-xs font-bold text-slate-800">
                                <option value="2017 ዓ.ም" selected>2017 ዓ.ም</option>
                                <option value="2018 ዓ.ም">2018 ዓ.ም</option>
                            </select>
                        </div>
                    </div>

                    <!-- 2. GREGORIAN DATE PICKER BOX (የፈረንጅ ቀን) -->
                    <div id="gregorian-date-box" class="hidden">
                        <label class="block text-[10px] font-bold text-slate-600 mb-0.5">የፈረንጅ ቀን ይምረጡ (Select Date)</label>
                        <input type="date" id="greg-date" value="2025-02-26" class="w-full p-2 bg-white border border-slate-200 rounded-xl text-xs font-bold">
                    </div>
                </div>

                <!-- Attachment Option -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">ፋይል ወይም ፎቶ ያያይዙ / Attachment (አማራጭ)</label>
                    <input type="file" class="w-full text-xs text-slate-500 file:mr-3 file:py-2 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-emerald-50 file:text-emerald-700">
                </div>

                <div class="pt-2 flex justify-end">
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-md transition flex items-center space-x-2">
                        <i class="fas fa-paper-plane"></i>
                        <span>ወደ ደብተር ላክ (Publish)</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- 4. Recently Sent Debter Notes -->
        <div class="bg-white rounded-2xl border shadow-sm overflow-hidden">
            <div class="p-4 border-b bg-slate-50 flex items-center justify-between">
                <h3 class="font-bold text-sm text-slate-900">የተላኩ መልእክቶች እና የወላጅ ፊርማ ሁኔታ</h3>
                <span class="text-xs text-slate-500">የቅርብ ጊዜ</span>
            </div>

            <div id="teacher-sent-list" class="divide-y text-sm">
                <!-- Clean Empty State -->
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

    <!-- Interactive Scripts -->
    <script>
        let selectedCalendarType = 'ethiopian';

        function switchCalendar(type) {
            selectedCalendarType = type;
            const ethBox = document.getElementById('ethiopian-date-box');
            const gregBox = document.getElementById('gregorian-date-box');
            const tabEth = document.getElementById('tab-eth');
            const tabGreg = document.getElementById('tab-greg');

            if (type === 'ethiopian') {
                ethBox.classList.remove('hidden');
                gregBox.classList.add('hidden');
                tabEth.className = 'px-2.5 py-1 rounded-md bg-emerald-600 text-white transition';
                tabGreg.className = 'px-2.5 py-1 rounded-md text-slate-600 hover:text-slate-900 transition';
            } else {
                ethBox.classList.add('hidden');
                gregBox.classList.remove('hidden');
                tabGreg.className = 'px-2.5 py-1 rounded-md bg-emerald-600 text-white transition';
                tabEth.className = 'px-2.5 py-1 rounded-md text-slate-600 hover:text-slate-900 transition';
            }
        }

        function sendTeacherNote(form) {
            const cat = document.getElementById('note-category').value;
            const title = document.getElementById('note-title').value;
            const body = document.getElementById('note-body').value;

            // Date formatting
            let dueDateStr = '';
            if (selectedCalendarType === 'ethiopian') {
                const day = document.getElementById('eth-day').value;
                const month = document.getElementById('eth-month').value;
                const year = document.getElementById('eth-year').value;
                dueDateStr = `🇪🇹 የማስረከቢያ ቀን፡ ${month} ${day} ቀን ${year}`;
            } else {
                const gregDate = document.getElementById('greg-date').value;
                dueDateStr = `🌍 Due Date: ${gregDate}`;
            }

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
                    <p class="text-xs text-slate-500 mt-1">${body}</p>
                    <span class="inline-block mt-1 text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded border border-emerald-200">
                        <i class="far fa-clock mr-1"></i>${dueDateStr}
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
            alert('🎉 መልእክቱ ከነ ኢትዮጵያ የቀን መቁጠሪያው ለወላጆች ደብተር ተልኳል!');
        }

        // PWA Script
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => { navigator.serviceWorker.register('/sw.js'); });
        }
    </script>

</body>
</html>
