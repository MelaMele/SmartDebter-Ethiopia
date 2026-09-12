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

    @php
        $childGrade = $parent['children'][0]['grade'] ?? ($childClass ?? 'ክፍል 7-B');
    @endphp

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
        <div class="max-w-3xl mx-auto px-4 py-3 flex flex-col sm:flex-row items-center justify-between gap-3">
            
            <div class="flex items-center space-x-3 w-full sm:w-auto">
                <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold shadow-xs shrink-0">
                    <i class="fas fa-user-shield"></i>
                </div>
                <div>
                    <h2 class="text-sm font-bold text-slate-900 leading-tight">{{ $parent['name'] ?? 'የተማሪ ወላጅ' }}</h2>
                    <p class="text-[11px] text-slate-500">የተመዘገበ ስልክ፡ {{ $phone ?? '09xxxxxxxx' }}</p>
                </div>
            </div>

            <div class="flex items-center space-x-2.5 w-full sm:w-auto justify-between sm:justify-end">
                <div class="bg-blue-50 border border-blue-200 px-2.5 py-1 rounded-xl text-xs flex items-center space-x-1.5">
                    <i class="far fa-calendar-alt text-blue-600 text-xs"></i>
                    <span class="text-blue-950 font-bold text-[11px]">🇪🇹 2019 ዓ.ም</span>
                </div>

                <a href="/login" class="text-xs bg-rose-50 text-rose-600 border border-rose-200 px-3 py-1.5 rounded-lg font-semibold hover:bg-rose-100 transition">
                    <i class="fas fa-sign-out-alt mr-1"></i>ውጣ
                </a>
            </div>

        </div>
    </header>

    <!-- Child Profile Card & Write Note Button -->
    <div class="max-w-3xl mx-auto px-4 pt-4">
        <!-- Flash Message -->
        @if(session('success'))
            <div class="mb-3 p-3 bg-emerald-500/10 border border-emerald-500/30 text-emerald-800 rounded-xl text-xs font-bold flex items-center space-x-2">
                <i class="fas fa-check-circle text-emerald-600"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="bg-white rounded-2xl p-3 border shadow-sm flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
            <div class="flex items-center space-x-3">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">የእርስዎ ተማሪ:</span>
                <button class="flex items-center space-x-2 bg-indigo-50 border-2 border-indigo-600 px-3.5 py-1.5 rounded-xl text-xs font-bold text-indigo-950 shadow-xs">
                    <span class="w-2 h-2 rounded-full bg-indigo-600"></span>
                    <span>{{ $parent['children'][0]['name'] ?? 'ተማሪ' }} ({{ $childGrade }})</span>
                </button>
            </div>

            <!-- BUTTON: WRITE REAL NOTE TO TEACHER -->
            <button onclick="openModal('parent-write-modal')" class="w-full sm:w-auto bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-4 py-2 rounded-xl transition shadow flex items-center justify-center space-x-1.5">
                <i class="fas fa-pen-alt text-xs"></i>
                <span>ለመምህሩ / ለተጠሪው መልእክት ይጻፉ</span>
            </button>
        </div>
    </div>

    <!-- Main Feed / Timeline -->
    <main class="max-w-3xl mx-auto px-4 mt-4 space-y-4">

        <!-- 1. DYNAMIC MOVING AD CAROUSEL -->
        @include('partials.ad-slider', ['sliderId' => 'parent-feed-slider'])

        <!-- 2. PARENT'S SENT NOTES (ወላጁ ወደ MySQL የላካቸው ማስታወሻዎች) -->
        @if(isset($parentSentNotes) && $parentSentNotes->count() > 0)
        <div class="space-y-2">
            <h4 class="text-xs font-bold text-slate-700 flex items-center">
                <i class="fas fa-paper-plane text-emerald-600 mr-1.5"></i>
                <span>እርስዎ የላኳቸው ማስታወሻዎች (Sent Notes)</span>
            </h4>
            <div class="space-y-2">
                @foreach($parentSentNotes as $sn)
                    <div class="p-3 bg-white rounded-xl border border-slate-200 text-xs text-slate-800 space-y-1 shadow-xs">
                        <div class="flex items-center justify-between">
                            <span class="font-bold text-slate-900">{{ $sn->title }}</span>
                            <span class="text-[10px] bg-emerald-50 text-emerald-700 border border-emerald-200 px-2 py-0.5 rounded font-bold">ለመምህሩ ደርሷል</span>
                        </div>
                        <p class="text-slate-600">{{ $sn->message }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- 3. REAL DEBTER FEED FROM TEACHER (ከመምህሩ በ MySQL የተላኩ እውነተኛ የቤት ስራዎች) -->
        <div id="parent-debter-feed" class="space-y-4">
            @forelse($teacherNotes ?? [] as $note)
                <div class="bg-white rounded-2xl border shadow-sm overflow-hidden">
                    <div class="p-4 border-b bg-slate-50/50 flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-9 h-9 rounded-xl bg-purple-100 text-purple-700 flex items-center justify-center font-bold text-sm">
                                📝
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-slate-900">{{ $note->title }}</h4>
                                <p class="text-[11px] text-slate-500">መምህር • 2019 ዓ.ም</p>
                            </div>
                        </div>
                        <span class="bg-purple-100 text-purple-800 font-bold px-2.5 py-1 rounded-full text-[10px] uppercase">
                            {{ $note->category }}
                        </span>
                    </div>

                    <div class="p-4 text-xs sm:text-sm text-slate-700 space-y-3">
                        <p class="leading-relaxed">{{ $note->message }}</p>
                    </div>

                    <!-- SIGN BUTTON -->
                    <div class="px-4 py-3 bg-slate-50 border-t flex flex-col sm:flex-row items-center justify-between gap-3">
                        <span class="text-xs text-slate-500">የወላጅ ፊርማ ማረጋገጫ:</span>
                        <button onclick="toggleSign(this)" class="w-full sm:w-auto px-4 py-2 rounded-xl text-xs font-bold text-white bg-indigo-600 hover:bg-indigo-700 shadow-sm transition flex items-center justify-center space-x-1.5">
                            <i class="fas fa-check-circle"></i>
                            <span>አይቻለሁ (ፈረምኩ)</span>
                        </button>
                    </div>
                </div>
            @empty
                <!-- Clean Empty State -->
                <div class="bg-white rounded-2xl border p-8 text-center shadow-sm">
                    <div class="w-14 h-14 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center text-2xl mx-auto mb-3">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <h4 class="text-sm font-bold text-slate-800">የልጅዎ ደብተር ንጹህ ነው!</h4>
                    <p class="text-xs text-slate-500 mt-1 max-w-sm mx-auto leading-relaxed">
                        እስካሁን ከመምህሩ የተላከ አዲስ የቤት ስራ የለም። መምህሩ መልእክት ሲልክ እዚህ ገጽ ላይ በቅጽበት ይደርሶዎታል።
                    </p>
                </div>
            @endforelse
        </div>

    </main>

    <!-- ==================== PARENT WRITE MESSAGE MODAL (Direct to MySQL) ==================== -->
    <div id="parent-write-modal" class="hidden fixed inset-0 z-50 bg-black/70 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-xl border">
            <div class="flex items-center justify-between pb-3 border-b">
                <h3 class="font-bold text-sm text-slate-900 flex items-center">
                    <i class="fas fa-envelope-open-text text-emerald-600 mr-2"></i>
                    ወደ ትምህርት ቤቱ መልእክት ይጻፉ
                </h3>
                <button onclick="closeModal('parent-write-modal')" class="text-slate-400 hover:text-slate-600 text-lg">✕</button>
            </div>

            <form action="/communications/parent-send" method="POST" class="my-4 space-y-3.5">
                @csrf
                <input type="hidden" name="parent_phone" value="{{ $phone ?? '0911000000' }}">
                <input type="hidden" name="class_code" value="{{ $childGrade }}">

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">ተቀባይ ይምረጡ</label>
                    <select name="recipient" class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs font-bold">
                        <option value="መምህር">ለክፍል ኃላፊ መምህር</option>
                        <option value="ዲቪዥን ተጠሪ">ለዲቪዥን ተጠሪ (Unit Leader)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">የመልእክቱ አይነት</label>
                    <select name="topic" class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs font-bold">
                        <option value="የህመም ፈቃድ ማስታወሻ">🤒 የህመም / የፈቃድ ማስታወሻ (Sick Leave)</option>
                        <option value="የቤት ስራ ጥያቄ">📝 የቤት ስራ ጥያቄ / አስተያየት</option>
                        <option value="የስነ-ምግባር ማስታወሻ">🌟 የባህሪ / የስነ-ምግባር ጉዳይ</option>
                        <option value="አጠቃላይ ጥያቄ">💬 አጠቃላይ ጥያቄ / አስተያየት</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">መልእክትዎን እዚህ ይጻፉ</label>
                    <textarea name="message" rows="4" placeholder="ምሳሌ፡ ልጄ ዛሬ ህመም ስለተሰማው ወደ ት/ቤት መምጣት አልቻለም..." required
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

        function toggleSign(btn) {
            btn.classList.remove('bg-indigo-600', 'hover:bg-indigo-700');
            btn.classList.add('bg-emerald-600', 'cursor-default');
            btn.innerHTML = '<i class="fas fa-check-double mr-1"></i> ተረጋግጧል (ተፈርሟል)';
            btn.disabled = true;
        }

        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => { navigator.serviceWorker.register('/sw.js'); });
        }
    </script>

</body>
</html>
