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

    @php
        $tName = request('name', $teacherName ?? 'የክፍል ኃላፊ መምህር');
        $cCode = request('class', $classCode ?? 'ክፍል 7-B');
    @endphp

    <!-- Top Header -->
    <header class="bg-white border-b shadow-sm sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-4 py-3 flex flex-col sm:flex-row items-center justify-between gap-3">
            
            <div class="flex items-center space-x-3 w-full sm:w-auto">
                <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-base shadow-xs shrink-0">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div>
                    <h2 class="text-sm font-bold text-slate-900 leading-tight" id="ui-teacher-name">{{ $tName }}</h2>
                    <p class="text-[11px] text-slate-500">
                        <span data-am="የተመደቡበት ክፍል፡" data-en="Assigned Class:">የተመደቡበት ክፍል፡</span> 
                        <b class="text-emerald-700 font-bold" id="ui-class-code">{{ $cCode }}</b> • 2019 ዓ.ም
                    </p>
                </div>
            </div>

            <div class="flex items-center space-x-2.5 w-full sm:w-auto justify-between sm:justify-end">
                <!-- 2019 ዓ.ም Badge -->
                <div class="bg-emerald-50 border border-emerald-200 px-3 py-1 rounded-xl text-xs flex items-center space-x-1.5">
                    <i class="far fa-calendar-alt text-emerald-600 text-xs"></i>
                    <span class="text-emerald-900 font-bold text-[11px]">🇪🇹 2019 ዓ.ም (መስከረም)</span>
                </div>

                <!-- Language Switcher Button -->
                <button onclick="toggleTeacherLanguage(this)" class="text-xs bg-indigo-50 text-indigo-700 border border-indigo-200 px-3 py-1.5 rounded-xl font-bold hover:bg-indigo-100 transition flex items-center space-x-1">
                    <i class="fas fa-globe text-xs"></i>
                    <span id="lang-btn-text">English</span>
                </button>

                <a href="/login" class="text-xs bg-rose-50 text-rose-600 border border-rose-200 px-3 py-1.5 rounded-lg font-semibold hover:bg-rose-100 transition">
                    <i class="fas fa-sign-out-alt mr-1"></i><span data-am="ውጣ" data-en="Logout">ውጣ</span>
                </a>
            </div>
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-4 mt-6 space-y-6">

        <!-- 1. Quick Stats -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="bg-white p-4 rounded-2xl border shadow-xs">
                <p class="text-[11px] font-bold text-slate-500 uppercase" data-am="ክፍል" data-en="Class">ክፍል</p>
                <h3 class="text-xl font-black text-slate-900 mt-1">{{ $cCode }}</h3>
                <span class="text-[10px] text-emerald-600 font-medium" data-am="ንቁ ክፍል" data-en="Active Class">ንቁ ክፍል</span>
            </div>

            <div class="bg-white p-4 rounded-2xl border shadow-xs">
                <p class="text-[11px] font-bold text-slate-500 uppercase" data-am="የክፍሉ ተማሪዎች" data-en="Students">የክፍሉ ተማሪዎች</p>
                <h3 class="text-2xl font-black text-blue-600 mt-1">{{ count($students ?? []) }}</h3>
                <span class="text-[10px] text-slate-400" data-am="የተመዘገቡ ተማሪዎች" data-en="Registered Students">የተመዘገቡ ተማሪዎች</span>
            </div>

            <div class="bg-white p-4 rounded-2xl border shadow-xs">
                <p class="text-[11px] font-bold text-slate-500 uppercase" data-am="የዛሬ የተላኩ" data-en="Sent Today">የዛሬ የተላኩ</p>
                <h3 id="teacher-sent-count" class="text-2xl font-black text-slate-900 mt-1">0</h3>
                <span class="text-[10px] text-slate-400" data-am="የቤት ስራ / ማስታወሻ" data-en="Homework / Note">የቤት ስራ / ማስታወሻ</span>
            </div>

            <div class="bg-white p-4 rounded-2xl border shadow-xs">
                <p class="text-[11px] font-bold text-slate-500 uppercase" data-am="የትምህርት ዘመን" data-en="Academic Year">የትምህርት ዘመን</p>
                <h3 class="text-2xl font-black text-purple-700 mt-1">2019</h3>
                <span class="text-[10px] text-purple-500 font-bold">ዓ.ም (Active)</span>
            </div>
        </div>

        <!-- 2. Dynamic Moving Ad Carousel -->
        @include('partials.ad-slider', ['sliderId' => 'teacher-slider'])

        <!-- ================= 3. INCOMING PARENT MESSAGES INBOX (የወላጆች መልእክት መቀበያ ሳጥን) ================= -->
        <div class="bg-white rounded-2xl border shadow-sm p-5 sm:p-6 border-l-4 border-l-blue-600">
            <div class="flex items-center justify-between mb-3 pb-2 border-b">
                <div>
                    <h3 class="text-base font-bold text-slate-900 flex items-center">
                        <i class="fas fa-inbox text-blue-600 mr-2"></i>
                        <span data-am="የወላጆች መልእክት ሳጥን" data-en="Parent Messages Inbox">የወላጆች መልእክት መቀበያ ሳጥን</span>
                    </h3>
                    <p class="text-xs text-slate-500 mt-0.5" data-am="ከክፍልዎ ወላጆች የተላኩ የፈቃድ ማስታወሻዎች እና ጥያቄዎች እዚህ ይደርሳሉ፡" data-en="Sick leaves and notes sent by parents appear here:">ከክፍልዎ ወላጆች የተላኩ የፈቃድ ማስታወሻዎች እና ጥያቄዎች እዚህ ይደርሳሉ፡</p>
                </div>
                <span class="text-xs bg-slate-100 text-slate-600 font-bold px-2.5 py-1 rounded-full">
                    መልእክት መቀበያ ዝግጁ
                </span>
            </div>

            <!-- Clean Empty State for Messages (ምንም የውሸት መልእክት የለም) -->
            <div id="parent-messages-container" class="text-center py-8 text-slate-400">
                <i class="fas fa-envelope-open text-3xl mb-2 text-slate-300"></i>
                <p class="text-xs font-medium">እስካሁን ከወላጆች የተላከ አዲስ መልእክት ወይም የህመም ፈቃድ የለም።</p>
                <p class="text-[10px] text-slate-400 mt-0.5">ወላጆች በስልካቸው ማስታወሻ ሲጽፉ እዚህ ሳጥን ውስጥ በቅጽበት ይደርሶዎታል።</p>
            </div>
        </div>

        <!-- ================= 4. CLASS STUDENT ROSTER (የክፍሌ ተማሪዎች ዝርዝር) ================= -->
        <div class="bg-white rounded-2xl border shadow-sm p-5 sm:p-6">
            <div class="flex items-center justify-between mb-3 pb-2 border-b">
                <div>
                    <h3 class="text-base font-bold text-slate-900 flex items-center">
                        <i class="fas fa-user-graduate text-emerald-600 mr-2"></i>
                        <span data-am="የክፍሌ ተማሪዎች ዝርዝር" data-en="My Class Students">የክፍሌ ተማሪዎች ዝርዝር</span> ({{ $cCode }})
                    </h3>
                    <p class="text-xs text-slate-500 mt-0.5">በዚህ ክፍል ስር የተመዘገቡ ተማሪዎች እና የወላጆቻቸው ስልክ</p>
                </div>
                <span class="text-xs bg-emerald-50 text-emerald-700 font-bold px-2.5 py-1 rounded-lg border border-emerald-200">
                    {{ count($students ?? []) }} ተማሪዎች
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="text-slate-500 border-b bg-slate-50">
                            <th class="p-2.5">የተማሪ ስም</th>
                            <th class="p-2.5">የተማሪ መለያ (ID/Password)</th>
                            <th class="p-2.5">የወላጅ ስልክ (Username)</th>
                            <th class="p-2.5">ሁኔታ</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y text-slate-700">
                        @forelse($students as $st)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="p-2.5 font-bold text-slate-900">
                                    <i class="fas fa-user-circle text-slate-400 mr-1"></i>
                                    {{ $st->first_name }} {{ $st->last_name }}
                                </td>
                                <td class="p-2.5 font-mono font-black text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded w-fit">{{ $st->student_id_number }}</td>
                                <td class="p-2.5 font-mono font-bold text-blue-700">{{ $st->parent_phone ?? 'ስልክ የለም' }}</td>
                                <td class="p-2.5"><span class="text-[10px] bg-emerald-100 text-emerald-800 font-bold px-2 py-0.5 rounded-full">ንቁ</span></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-6 text-center text-slate-400">
                                    <p class="text-xs font-medium">በዚህ ክፍል ስር እስካሁን የተመዘገበ ተማሪ የለም።</p>
                                    <p class="text-[10px] text-slate-400 mt-0.5">አድሚኑ ወይም የዲቪዥን ተጠሪው ተማሪ ሲመዘግብ እዚህ ዝርዝሩ ይወጣል።</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 5. POST TO DEBTER FORM -->
        <div class="bg-white rounded-2xl border shadow-sm p-5 sm:p-6">
            <h3 class="text-base font-bold text-slate-900 mb-4 flex items-center">
                <i class="fas fa-edit text-emerald-600 mr-2"></i>
                <span data-am="ወደ ደብተር አዲስ መልእክት ይጻፉ" data-en="Compose New Debter Note">ወደ ደብተር አዲስ መልእክት ይጻፉ</span> ({{ $cCode }})
            </h3>

            <form action="#" onsubmit="event.preventDefault(); sendTeacherNote(this);" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1" data-am="ተቀባይ" data-en="Recipients">ተቀባይ</label>
                        <select class="w-full p-2.5 bg-slate-50 border rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="all">ለሙሉ ክፍል (All Students - {{ $cCode }})</option>
                            <option value="individual">ለተወሰነ ተማሪ ብቻ (Individual Student)</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1" data-am="የመልእክቱ አይነት" data-en="Category">የመልእክቱ አይነት</label>
                        <select id="note-category" class="w-full p-2.5 bg-slate-50 border rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option value="የቤት ስራ">📝 የቤት ስራ (Homework)</option>
                            <option value="ባህሪና ምስጋና">🌟 የስነ-ምግባር ማስታወሻ / ምስጋና</option>
                            <option value="አስቸኳይ ማስታወቂያ">⚠️ አስቸኳይ ማስታወቂያ (Urgent Notice)</option>
                            <option value="የቀን መገኘት">📅 የቀን መገኘት (መቅረት/ማርፈድ)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1" data-am="የመልእክቱ ርዕስ" data-en="Note Title">የመልእክቱ ርዕስ</label>
                    <input type="text" id="note-title" placeholder="ምሳሌ፡ የሂሳብ ምዕራፍ 3 መልመጃ" required
                           class="w-full p-2.5 bg-slate-50 border rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1" data-am="የደብተሩ ዝርዝር መልእክት" data-en="Message Description">የደብተሩ ዝርዝር መልእክት</label>
                    <textarea rows="3" id="note-body" placeholder="ለወላጆች የሚተላለፈውን መልእክት እዚህ ይጻፉ..." required
                              class="w-full p-2.5 bg-slate-50 border rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                </div>

                <!-- 2019 ዓ.ም ETHIOPIAN DATE PICKER BOX -->
                <div class="p-4 bg-emerald-50/60 border border-emerald-200 rounded-2xl space-y-3">
                    <div class="flex items-center justify-between">
                        <label class="text-xs font-bold text-emerald-950 flex items-center">
                            <i class="far fa-calendar-check text-emerald-600 mr-1.5 text-sm"></i>
                            <span data-am="የማስረከቢያ ቀን (የኢትዮጵያ ካሌንደር)" data-en="Due Date (Ethiopian Calendar)">የማስረከቢያ ቀን (2019 ዓ.ም)</span>
                        </label>
                        <span class="text-[10px] bg-emerald-200/60 text-emerald-800 font-bold px-2 py-0.5 rounded" data-am="2019 የትምህርት ዘመን" data-en="2019 Academic Year">2019 የትምህርት ዘመን</span>
                    </div>

                    <div class="grid grid-cols-3 gap-2">
                        <div>
                            <label class="block text-[10px] font-bold text-slate-600 mb-0.5" data-am="ቀን" data-en="Day">ቀን</label>
                            <select id="eth-day" class="w-full p-2 bg-white border border-slate-200 rounded-xl text-xs font-bold text-slate-800">
                                @for($d = 1; $d <= 30; $d++)
                                    <option value="{{ $d }}">{{ $d }}</option>
                                @endfor
                            </select>
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold text-slate-600 mb-0.5" data-am="ወር" data-en="Month">ወር</label>
                            <select id="eth-month" class="w-full p-2 bg-white border border-slate-200 rounded-xl text-xs font-bold text-slate-800">
                                <option value="መስከረም" selected>መስከረም</option>
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
                                <option value="ጳጉሜ">ጳጉሜ (Pagume)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold text-slate-600 mb-0.5" data-am="ዓ.ም" data-en="Year">ዓ.ም</label>
                            <select id="eth-year" class="w-full p-2 bg-white border border-slate-200 rounded-xl text-xs font-bold text-slate-800">
                                <option value="2019" selected>2019 ዓ.ም</option>
                                <option value="2020">2020 ዓ.ም</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="pt-2 flex justify-end">
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-md transition flex items-center space-x-2">
                        <i class="fas fa-paper-plane"></i>
                        <span data-am="ወደ ደብተር ላክ" data-en="Send to Debter">ወደ ደብተር ላክ</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- 6. MONTHLY ARCHIVE SYSTEM (2019 ዓ.ም) -->
        <div class="bg-white rounded-2xl border shadow-sm overflow-hidden">
            <div class="p-4 border-b bg-slate-50 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                <div>
                    <h3 class="font-bold text-sm text-slate-900 flex items-center">
                        <i class="fas fa-folder-open text-amber-500 mr-2"></i>
                        <span data-am="የመልእክቶች እና የቤት ስራዎች የወራት ማህደር" data-en="Monthly Archive Folders">የመልእክቶች እና የቤት ስራዎች የወራት ማህደር</span>
                    </h3>
                    <p class="text-[11px] text-slate-500">መልእክቶችን በየወሩ ተከፋፍለው በቀላሉ ያግኙ</p>
                </div>
                <span class="text-xs font-bold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-lg border border-emerald-200">2019 የትምህርት ዘመን</span>
            </div>

            <!-- Month Tabs -->
            <div class="p-3 bg-slate-50/60 border-b overflow-x-auto flex space-x-2">
                @php
                    $ethMonths = ['መስከረም', 'ጥቅምት', 'ህዳር', 'ታህሳስ', 'ጥር', 'የካቲት', 'መጋቢት', 'ሚያዝያ', 'ግንቦት', 'ሰኔ', 'ሐምሌ', 'ነሐሴ', 'ጳጉሜ'];
                @endphp
                @foreach($ethMonths as $m)
                    <button onclick="filterByMonth('{{ $m }}')" 
                            class="month-tab whitespace-nowrap px-3 py-1.5 rounded-xl text-xs font-bold transition {{ $m == 'መስከረም' ? 'bg-emerald-600 text-white shadow-xs' : 'bg-white border text-slate-600 hover:bg-slate-100' }}">
                        {{ $m }}
                    </button>
                @endforeach
            </div>

            <!-- Sent List with Clean Zero State (ምንም የውሸት የቤት ስራ የለም) -->
            <div id="teacher-sent-list" class="divide-y text-sm">
                <div id="teacher-empty-state" class="text-center py-10 text-slate-400">
                    <i class="fas fa-book-open text-3xl mb-2 text-slate-300"></i>
                    <p class="text-xs font-medium">እስካሁን የተላከ የቤት ስራ ወይም ማስታወሻ የለም።</p>
                    <p class="text-[10px] text-slate-400 mt-0.5">ከላይ ያለውን ቅጽ በመጠቀም የመጀመሪያውን የቤት ስራ ወደ ወላጆች ይላኩ።</p>
                </div>
            </div>
        </div>

    </main>

    <!-- Mela Solution Shared Footer -->
    @include('partials.footer')

    <!-- Interactive Scripts -->
    <script>
        let currentLang = 'am';
        function toggleTeacherLanguage(btn) {
            currentLang = (currentLang === 'am') ? 'en' : 'am';
            document.getElementById('lang-btn-text').innerText = (currentLang === 'am') ? 'English' : 'አማርኛ';

            document.querySelectorAll('[data-am]').forEach(el => {
                el.innerText = (currentLang === 'am') ? el.getAttribute('data-am') : el.getAttribute('data-en');
            });
        }

        function filterByMonth(monthName) {
            document.querySelectorAll('.month-tab').forEach(t => {
                t.className = 'month-tab whitespace-nowrap px-3 py-1.5 rounded-xl text-xs font-bold transition bg-white border text-slate-600 hover:bg-slate-100';
            });
            event.target.className = 'month-tab whitespace-nowrap px-3 py-1.5 rounded-xl text-xs font-bold transition bg-emerald-600 text-white shadow-xs';

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
            alert(`🎉 መልእክቱ ወደ "${month} ወር 2019 ዓ.ም" ማህደር ተመዝግቦ ለወላጆች ተልኳል!`);
        }

        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => { navigator.serviceWorker.register('/sw.js'); });
        }
    </script>

</body>
</html>
