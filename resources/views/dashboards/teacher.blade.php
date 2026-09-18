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
                <div class="bg-emerald-50 border border-emerald-200 px-3 py-1 rounded-xl text-xs flex items-center space-x-1.5">
                    <i class="far fa-calendar-alt text-emerald-600 text-xs"></i>
                    <span class="text-emerald-900 font-bold text-[11px]">🇪🇹 2019 ዓ.ም</span>
                </div>

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

        <!-- Flash Message -->
        @if(session('success'))
            <div class="p-3.5 bg-emerald-500/10 border border-emerald-500/30 text-emerald-800 rounded-xl text-xs font-bold flex items-center space-x-2">
                <i class="fas fa-check-circle text-base text-emerald-600"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- Quick Stats -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="bg-white p-4 rounded-2xl border shadow-xs">
                <p class="text-[11px] font-bold text-slate-500 uppercase">ክፍል</p>
                <h3 class="text-xl font-black text-slate-900 mt-1">{{ $cCode }}</h3>
                <span class="text-[10px] text-emerald-600 font-medium">ንቁ ክፍል</span>
            </div>

            <div class="bg-white p-4 rounded-2xl border shadow-xs">
                <p class="text-[11px] font-bold text-slate-500 uppercase">የክፍሉ ተማሪዎች</p>
                <h3 class="text-2xl font-black text-blue-600 mt-1">{{ count($students ?? []) }}</h3>
                <span class="text-[10px] text-slate-400">የተመዘገቡ ተማሪዎች</span>
            </div>

            <div class="bg-white p-4 rounded-2xl border shadow-xs">
                <p class="text-[11px] font-bold text-slate-500 uppercase">የተላኩ መልእክቶች</p>
                <h3 class="text-2xl font-black text-slate-900 mt-1">{{ count($sentNotes ?? []) }}</h3>
                <span class="text-[10px] text-slate-400">የቤት ስራ / ማስታወሻ</span>
            </div>

            <div class="bg-white p-4 rounded-2xl border shadow-xs">
                <p class="text-[11px] font-bold text-slate-500 uppercase">ከወላጅ የመጡ</p>
                <h3 class="text-2xl font-black text-amber-600 mt-1">{{ count($parentMessages ?? []) }}</h3>
                <span class="text-[10px] text-slate-400">የፈቃድ ማስታወሻዎች</span>
            </div>
        </div>

        <!-- Ad Carousel -->
        @include('partials.ad-slider', ['sliderId' => 'teacher-slider'])

        <!-- INCOMING PARENT MESSAGES INBOX -->
        <div class="bg-white rounded-2xl border shadow-sm p-5 sm:p-6 border-l-4 border-l-blue-600">
            <div class="flex items-center justify-between mb-3 pb-2 border-b">
                <div>
                    <h3 class="text-base font-bold text-slate-900 flex items-center">
                        <i class="fas fa-inbox text-blue-600 mr-2"></i>
                        የወላጆች መልእክት ሳጥን (Parent Messages Inbox)
                    </h3>
                    <p class="text-xs text-slate-500 mt-0.5">ከክፍልዎ ወላጆች የተላኩ የፈቃድ ማስታወሻዎች እና ጥያቄዎች፡</p>
                </div>
                <span class="text-xs bg-blue-100 text-blue-800 font-bold px-2.5 py-1 rounded-full">
                    {{ count($parentMessages ?? []) }} መልእክቶች
                </span>
            </div>

            <div class="space-y-2.5">
                @forelse($parentMessages ?? [] as $msg)
                    <div class="p-3.5 bg-blue-50/50 rounded-xl border border-blue-100 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
                        <div class="space-y-1">
                            <div class="flex items-center space-x-2">
                                <span class="text-xs font-black text-slate-900">{{ $msg->title }}</span>
                                <span class="text-[10px] bg-blue-100 text-blue-800 font-mono font-bold px-2 py-0.5 rounded">{{ $msg->sender_phone }}</span>
                            </div>
                            <p class="text-xs text-slate-700 leading-relaxed">{{ $msg->message }}</p>
                            <span class="text-[10px] text-slate-400">የተላከው፡ {{ $msg->created_at }}</span>
                        </div>
                        <button onclick="this.innerText='ተረጋግጧል'; this.className='text-xs bg-emerald-600 text-white font-bold px-3 py-1.5 rounded-lg'; alert('የወላጁ መልእክት መታየቱ ተረጋግጧል!');" 
                                class="whitespace-nowrap text-xs bg-white border border-blue-200 text-blue-700 hover:bg-blue-100 font-bold px-3 py-1.5 rounded-lg shadow-xs transition">
                            <i class="fas fa-check mr-1"></i>አይቻለሁ
                        </button>
                    </div>
                @empty
                    <div class="text-center py-6 text-slate-400">
                        <i class="fas fa-envelope-open text-2xl mb-1 text-slate-300"></i>
                        <p class="text-xs font-medium">እስካሁን ከወላጆች የተላከ አዲስ መልእክት የለም።</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- CLASS STUDENT ROSTER -->
        <div class="bg-white rounded-2xl border shadow-sm p-5 sm:p-6">
            <div class="flex items-center justify-between mb-3 pb-2 border-b">
                <div>
                    <h3 class="text-base font-bold text-slate-900 flex items-center">
                        <i class="fas fa-user-graduate text-emerald-600 mr-2"></i>
                        የክፍሌ ተማሪዎች ዝርዝር ({{ $cCode }})
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
                        @forelse($students ?? [] as $st)
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
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- ================= POST TO DEBTER FORM (ከነ ተማሪ መምረጫው) ================= -->
        <div class="bg-white rounded-2xl border shadow-sm p-5 sm:p-6">
            <h3 class="text-base font-bold text-slate-900 mb-4 flex items-center">
                <i class="fas fa-edit text-emerald-600 mr-2"></i>
                <span>ወደ ደብተር አዲስ መልእክት ይጻፉ</span> ({{ $cCode }})
            </h3>

            <form action="/communications/teacher-send" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="class_code" value="{{ $cCode }}">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- ተቀባይ መምረጫ -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">ተቀባይ</label>
                        <select name="recipient_type" id="recipient-type" onchange="toggleStudentPicker(this.value)" class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs font-bold text-slate-800">
                            <option value="all">ለሙሉ ክፍል ({{ $cCode }} ተማሪዎች በሙሉ)</option>
                            <option value="individual">ለተወሰነ ተማሪ ብቻ (Individual Student)</option>
                        </select>
                    </div>

                    <!-- የመልእክቱ አይነት -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">የመልእክቱ አይነት</label>
                        <select name="category" class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs font-bold">
                            <option value="የቤት ስራ">📝 የቤት ስራ (Homework)</option>
                            <option value="ባህሪና ምስጋና">🌟 የስነ-ምግባር ማስታወሻ / ምስጋና</option>
                            <option value="አስቸኳይ ማስታወቂያ">⚠️ አስቸኳይ ማስታወቂያ</option>
                            <option value="የቀን መገኘት">📅 የቀን መገኘት (መቅረት/ማርፈድ)</option>
                        </select>
                    </div>
                </div>

                <!-- ================= [አዲሱ ክፍል] የተማሪዎች ስም ዝርዝር መምረጫ (ለተወሰነ ተማሪ ሲባል ብቻ ይወጣል) ================= -->
                <div id="student-picker-container" class="hidden p-3.5 bg-emerald-50/70 border border-emerald-200 rounded-xl space-y-1">
                    <label class="block text-xs font-bold text-emerald-950">
                        <i class="fas fa-user-check text-emerald-600 mr-1"></i>
                        መልእክቱ የሚላክለትን ተማሪ ይምረጡ (Select Student):
                    </label>
                    <select name="student_id" id="student-select" class="w-full p-2.5 bg-white border border-slate-300 rounded-xl text-xs font-bold text-slate-900">
                        <option value="">-- ተማሪ ይምረጡ --</option>
                        @foreach($students ?? [] as $st)
                            <option value="{{ $st->id }}">
                                👤 {{ $st->first_name }} {{ $st->last_name }} (የተማሪ ID: {{ $st->student_id_number }})
                            </option>
                        @endforeach
                    </select>
                    <p class="text-[10px] text-emerald-800 mt-1">
                        💡 ማሳሰቢያ፡ መልእክቱ የሚደርሰው <b>ለዚህ ተማሪ ወላጅ ብቻ</b> ነው፤ ሌሎች ወላጆች አያዩትም።
                    </p>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">የመልእክቱ ርዕስ</label>
                    <input type="text" name="title" placeholder="ምሳሌ፡ የሂሳብ ምዕራፍ 3 መልመጃ ወይም የምስጋና ማስታወሻ" required
                           class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs font-semibold">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">የደብተሩ ዝርዝር መልእክት</label>
                    <textarea name="message" rows="3" placeholder="ለወላጅ የሚተላለፈውን መልእክት እዚህ ይጻፉ..." required
                              class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs"></textarea>
                </div>

                <div class="pt-2 flex justify-end">
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-md transition flex items-center space-x-2">
                        <i class="fas fa-paper-plane"></i>
                        <span>ወደ ደብተር ላክ</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- SENT NOTES HISTORY -->
        <div class="bg-white rounded-2xl border shadow-sm overflow-hidden">
            <div class="p-4 border-b bg-slate-50 flex items-center justify-between">
                <h3 class="font-bold text-sm text-slate-900">የተላኩ የቤት ስራዎች እና መልእክቶች ታሪክ</h3>
                <span class="text-xs text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-lg border border-emerald-200 font-bold">2019 ዓ.ም</span>
            </div>

            <div class="divide-y text-sm">
                @forelse($sentNotes ?? [] as $note)
                    <div class="p-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 hover:bg-slate-50 transition">
                        <div>
                            <div class="flex items-center space-x-2">
                                <span class="bg-purple-100 text-purple-700 text-[10px] font-bold px-2 py-0.5 rounded">{{ $note->category }}</span>
                                <h4 class="font-bold text-slate-900">{{ $note->title }}</h4>
                                @if($note->student_id)
                                    <span class="text-[9px] bg-blue-100 text-blue-800 font-bold px-1.5 py-0.5 rounded">የግል መልእክት</span>
                                @endif
                            </div>
                            <p class="text-xs text-slate-600 mt-1 leading-relaxed">{{ $note->message }}</p>
                            <span class="text-[10px] text-slate-400 mt-1 inline-block">የተላከው፡ {{ $note->created_at }}</span>
                        </div>
                        <span class="text-xs font-bold text-emerald-700 bg-emerald-50 border border-emerald-200 px-2.5 py-1 rounded-full whitespace-nowrap">
                            <i class="fas fa-check-double mr-1"></i>ተልኳል
                        </span>
                    </div>
                @empty
                    <div class="text-center py-8 text-slate-400">
                        <i class="fas fa-book-open text-3xl mb-2 text-slate-300"></i>
                        <p class="text-xs font-medium">እስካሁን የተላከ የቤት ስራ ወይም ማስታወሻ የለም።</p>
                    </div>
                @endforelse
            </div>
        </div>

    </main>

    <!-- Mela Solution Shared Footer -->
    @include('partials.footer')

    <!-- Interactive Scripts -->
    <script>
        // Toggle Student Picker Dropdown
        function toggleStudentPicker(val) {
            const container = document.getElementById('student-picker-container');
            const select = document.getElementById('student-select');

            if (val === 'individual') {
                container.classList.remove('hidden');
                select.required = true;
            } else {
                container.classList.add('hidden');
                select.required = false;
                select.value = '';
            }
        }

        let currentLang = 'am';
        function toggleTeacherLanguage(btn) {
            currentLang = (currentLang === 'am') ? 'en' : 'am';
            document.getElementById('lang-btn-text').innerText = (currentLang === 'am') ? 'English' : 'አማርኛ';

            document.querySelectorAll('[data-am]').forEach(el => {
                el.innerText = (currentLang === 'am') ? el.getAttribute('data-am') : el.getAttribute('data-en');
            });
        }

        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => { navigator.serviceWorker.register('/sw.js'); });
        }
    </script>

</body>
</html>
