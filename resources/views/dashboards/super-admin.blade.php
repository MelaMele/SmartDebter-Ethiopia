<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin | Mela Solution Master Hub</title>
    
    <!-- PWA Settings -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#1e1b4b">

    <!-- Tailwind CSS & FontAwesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-950 text-slate-100 font-sans min-h-screen pb-12">

    <!-- Top Master Header -->
    <header class="bg-slate-900 border-b border-slate-800 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 py-3.5 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-indigo-600 to-violet-500 flex items-center justify-center text-white font-black shadow-lg">
                    <i class="fas fa-crown text-base"></i>
                </div>
                <div>
                    <div class="flex items-center space-x-2">
                        <h2 class="text-sm font-bold text-white tracking-wide">Mela Solution</h2>
                        <span class="text-[10px] bg-indigo-500/20 text-indigo-400 border border-indigo-500/30 px-2 py-0.5 rounded-full font-bold">SUPER ADMIN</span>
                    </div>
                    <p class="text-[11px] text-slate-400">Clever Cloud MySQL Live ዳታቤዝ የተገናኘበት ማዕከል</p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <span class="text-xs bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 px-2.5 py-1 rounded-full font-bold">
                    <i class="fas fa-database mr-1"></i>MySQL Live
                </span>
                <a href="/login" class="text-xs bg-rose-500/10 text-rose-400 border border-rose-500/30 px-3 py-1.5 rounded-xl font-semibold hover:bg-rose-500/20 transition">
                    <i class="fas fa-sign-out-alt mr-1"></i>ውጣ
                </a>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 mt-6 space-y-8">

        <!-- Flash Message -->
        @if(session('success'))
            <div class="p-3 bg-emerald-500/20 border border-emerald-500/40 text-emerald-300 rounded-xl text-xs font-bold flex items-center space-x-2">
                <i class="fas fa-check-circle text-base"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- 1. Real Database Metrics -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="bg-slate-900 p-5 rounded-2xl border border-slate-800 shadow-sm">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400">አጋር ት/ቤቶች</span>
                    <i class="fas fa-school text-indigo-400"></i>
                </div>
                <h3 class="text-3xl font-black text-white">{{ $stats['schools_count'] ?? 0 }}</h3>
                <span class="text-[10px] text-slate-400">በ MySQL ዳታቤዝ ያሉ</span>
            </div>

            <div class="bg-slate-900 p-5 rounded-2xl border border-slate-800 shadow-sm">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400">አጠቃላይ ተማሪዎች</span>
                    <i class="fas fa-user-graduate text-blue-400"></i>
                </div>
                <h3 class="text-3xl font-black text-white">{{ $stats['students_count'] ?? 0 }}</h3>
                <span class="text-[10px] text-slate-400">የተመዘገቡ ተማሪዎች</span>
            </div>

            <div class="bg-slate-900 p-5 rounded-2xl border border-slate-800 shadow-sm">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400">የማስታወቂያ ዕይታ</span>
                    <i class="fas fa-eye text-amber-400"></i>
                </div>
                <h3 class="text-3xl font-black text-amber-400">{{ $stats['views_count'] ?? 0 }}</h3>
                <span class="text-[10px] text-slate-400">ጠቅላላ እይታ</span>
            </div>

            <div class="bg-slate-900 p-5 rounded-2xl border border-slate-800 shadow-sm">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-400">ንቁ ማስታወቂያዎች</span>
                    <i class="fas fa-bullhorn text-emerald-400"></i>
                </div>
                <h3 class="text-3xl font-black text-emerald-400">{{ $stats['ads_count'] ?? 0 }}</h3>
                <span class="text-[10px] text-slate-400">በሰሌዳው ላይ ያሉ</span>
            </div>
        </div>

        <!-- 2. LIVE MOVING AD PREVIEW -->
        <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-2 mb-4 pb-3 border-b border-slate-800">
                <div>
                    <h3 class="text-base font-bold text-white flex items-center">
                        <i class="fas fa-play-circle text-emerald-400 mr-2"></i>
                        የቀጥታ አንቀሳቃሽ ሰሌዳ ቅኝት (Live Carousel Preview)
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">በአሁኑ ሰዓት ወላጆችና መምህራን የሚያዩት ተንቀሳቃሽ ማስታወቂያ፡</p>
                </div>
                <span class="text-xs font-bold text-emerald-400 bg-emerald-500/10 border border-emerald-500/30 px-3 py-1 rounded-full">
                    <i class="fas fa-sync-alt fa-spin mr-1"></i>በየ 4.5 ሰከንድ ይንሸራተታል
                </span>
            </div>

            @include('partials.ad-slider', ['sliderId' => 'superadmin-preview'])
        </div>

        <!-- 3. AD CAMPAIGN MANAGEMENT TABLE -->
        <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-6 pb-4 border-b border-slate-800">
                <div>
                    <h3 class="text-base font-bold text-white flex items-center">
                        <i class="fas fa-tasks text-amber-400 mr-2"></i>
                        የማስታወቂያዎች አስተዳደር (Ad Campaigns)
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">ማስታወቂያዎችን በቀጥታ ከስልክዎ ወይም ከኮምፒውተርዎ Upload ያድርጉ</p>
                </div>
                <button onclick="openModal('ad-modal')" class="text-xs font-bold bg-amber-500 hover:bg-amber-600 text-slate-950 px-4 py-2.5 rounded-xl transition shadow flex items-center space-x-1.5">
                    <i class="fas fa-upload"></i>
                    <span>አዲስ ፖስተር ጫን (Upload Ad)</span>
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="text-slate-400 border-b border-slate-800 bg-slate-950/40">
                            <th class="p-3">አስተዋዋቂ ድርጅት</th>
                            <th class="p-3">የተሰቀለው ፖስተር</th>
                            <th class="p-3">ዒላማ</th>
                            <th class="p-3">የጊዜ ገደብ</th>
                            <th class="p-3">ሁኔታ</th>
                            <th class="p-3 text-right">እርምጃ</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800 text-slate-300">
                        @forelse($ads as $ad)
                            <tr class="hover:bg-slate-800/40 transition">
                                <td class="p-3 font-bold text-white">{{ $ad->company_name }}</td>
                                <td class="p-3">
                                    <img src="{{ $ad->image_url }}" alt="Ad Banner" class="w-16 h-9 object-cover rounded-lg border border-slate-700">
                                </td>
                                <td class="p-3"><span class="bg-blue-500/20 text-blue-400 border border-blue-500/30 px-2 py-0.5 rounded font-semibold">{{ $ad->target_audience }}</span></td>
                                <td class="p-3 text-emerald-400 font-medium">{{ $ad->duration }}</td>
                                <td class="p-3"><span class="bg-emerald-500/20 text-emerald-400 px-2 py-0.5 rounded-full text-[10px] font-bold">ንቁ</span></td>
                                <td class="p-3 text-right">
                                    <form action="/super-admin/ads/delete" method="POST" onsubmit="return confirm('ማስታወቂያው ከዳታቤዝ ይሰረዝ?');" class="inline">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $ad->id }}">
                                        <button type="submit" class="text-rose-400 hover:text-rose-300 font-bold">
                                            <i class="fas fa-trash-alt mr-0.5"></i>ሰርዝ
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-8 text-center text-slate-500">
                                    <i class="fas fa-upload text-3xl mb-2 text-slate-700 block"></i>
                                    እስካሁን የተሰቀለ ማስታወቂያ የለም። "አዲስ ፖስተር ጫን" የሚለውን ነክተው የመጀመሪያውን ማስታወቂያ ይስቀሉ።
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 4. PARTNER SCHOOLS MANAGEMENT -->
        <div class="bg-slate-900 rounded-2xl border border-slate-800 p-6">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-6 pb-4 border-b border-slate-800">
                <div>
                    <h3 class="text-base font-bold text-white flex items-center">
                        <i class="fas fa-school text-indigo-400 mr-2"></i>
                        አጋር ትምህርት ቤቶች (Partner Schools Network)
                    </h3>
                    <p class="text-xs text-slate-400 mt-0.5">አዲስ ት/ቤት ሲመዘገብ በቀጥታ Clever Cloud MySQL ላይ ይቀመጣል</p>
                </div>
                <button onclick="openModal('school-modal')" class="text-xs font-bold bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2.5 rounded-xl transition shadow flex items-center space-x-1.5">
                    <i class="fas fa-plus"></i>
                    <span>አዲስ ት/ቤት መዝግብ</span>
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="text-slate-400 border-b border-slate-800 bg-slate-950/40">
                            <th class="p-3">የትምህርት ቤቱ ስም</th>
                            <th class="p-3">የመለያ ኮድ</th>
                            <th class="p-3">የአድሚን ስልክ</th>
                            <th class="p-3">ሁኔታ</th>
                            <th class="p-3">ማዕከላዊ ቁጥጥር</th>
                            <th class="p-3 text-right">የአድሚን መግቢያ ሊንክ</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800 text-slate-300">
                        @forelse($schools as $school)
                            <tr class="hover:bg-slate-800/40 transition">
                                <td class="p-3 font-bold text-white flex items-center space-x-2">
                                    <span class="w-2 h-2 rounded-full {{ $school->status == 'active' ? 'bg-emerald-400' : 'bg-rose-500' }}"></span>
                                    <span class="{{ $school->status == 'suspended' ? 'line-through text-slate-500' : '' }}">{{ $school->name }}</span>
                                </td>
                                <td class="p-3 text-indigo-400 font-mono">{{ $school->code }}</td>
                                <td class="p-3">{{ $school->phone }}</td>
                                <td class="p-3">
                                    @if($school->status == 'active')
                                        <span class="bg-emerald-500/20 text-emerald-400 border border-emerald-500/30 px-2 py-0.5 rounded-full text-[10px] font-bold">ንቁ (Active)</span>
                                    @else
                                        <span class="bg-rose-500/20 text-rose-400 border border-rose-500/30 px-2 py-0.5 rounded-full text-[10px] font-bold">የታገደ</span>
                                    @endif
                                </td>
                                <td class="p-3">
                                    <form action="/super-admin/schools/toggle-status" method="POST" class="inline">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $school->id }}">
                                        <button type="submit" class="text-[11px] font-bold px-2.5 py-1 rounded-lg border transition {{ $school->status == 'active' ? 'bg-rose-500/10 text-rose-400 border-rose-500/30 hover:bg-rose-500/20' : 'bg-emerald-500/10 text-emerald-400 border-emerald-500/30 hover:bg-emerald-500/20' }}">
                                            {{ $school->status == 'active' ? 'እገድ' : 'አንቃ' }}
                                        </button>
                                    </form>
                                </td>
                                <td class="p-3 text-right">
                                    <button onclick="navigator.clipboard.writeText('https://smart-debter-ethiopia.vercel.app/dashboard/admin?school={{ $school->code }}'); alert('የ {{ $school->name }} የአድሚን ሊንክ ተገልብጧል!');" 
                                            class="text-xs bg-indigo-600/30 hover:bg-indigo-600 text-indigo-300 hover:text-white px-3 py-1.5 rounded-lg border border-indigo-500/30 transition">
                                        <i class="fas fa-copy mr-1"></i>ሊንክ ቅዳ
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-8 text-center text-slate-500">
                                    <i class="fas fa-school text-3xl mb-2 text-slate-700 block"></i>
                                    እስካሁን በዳታቤዙ ውስጥ የተመዘገበ ትምህርት ቤት የለም። "አዲስ ት/ቤት መዝግብ" የሚለውን ነክተው የመጀመሪያውን ት/ቤት ያስገቡ።
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <!-- ==================== MODALS ==================== -->

    <!-- 1. ADD PARTNER SCHOOL MODAL -->
    <div id="school-modal" class="hidden fixed inset-0 z-50 bg-black/70 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-slate-900 rounded-2xl max-w-md w-full p-6 border border-slate-800 shadow-2xl text-slate-100">
            <div class="flex items-center justify-between pb-3 border-b border-slate-800">
                <h3 class="font-bold text-sm text-white flex items-center">
                    <i class="fas fa-school text-indigo-400 mr-2"></i>
                    አዲስ ት/ቤት መመዝገቢያ (MySQL)
                </h3>
                <button onclick="closeModal('school-modal')" class="text-slate-400 hover:text-white">✕</button>
            </div>
            <form action="/super-admin/schools/store" method="POST" class="my-4 space-y-3">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1">የትምህርት ቤቱ ሙሉ ስም</label>
                    <input type="text" name="name" placeholder="ምሳሌ፡ ዳግማዊ ሚኒሊክ ት/ቤት" required class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white">
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">የመለያ ኮድ (Code)</label>
                        <input type="text" name="code" placeholder="DMN-001" required class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs font-mono text-indigo-400 uppercase">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">ከተማ / አድራሻ</label>
                        <input type="text" name="city" placeholder="አዲስ አበባ" required class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1">የት/ቤቱ ዋና አድሚን ስልክ ቁጥር</label>
                    <input type="text" name="phone" placeholder="09xxxxxxxx" required class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white">
                </div>
                <button type="submit" class="w-full py-2.5 rounded-xl text-xs font-bold text-white bg-indigo-600 hover:bg-indigo-700 shadow mt-2">
                    ት/ቤቱን ዳታቤዝ ላይ መዝግብ እና ሊንክ አመንጭ
                </button>
            </form>
        </div>
    </div>

    <!-- 2. DIRECT FILE UPLOAD AD MODAL -->
    <div id="ad-modal" class="hidden fixed inset-0 z-50 bg-black/70 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-slate-900 rounded-2xl max-w-md w-full p-6 border border-slate-800 shadow-2xl text-slate-100 max-h-[90vh] overflow-y-auto">
            <div class="flex items-center justify-between pb-3 border-b border-slate-800">
                <h3 class="font-bold text-sm text-white flex items-center">
                    <i class="fas fa-upload text-amber-400 mr-2"></i>
                    ማስታወቂያ ከስልክዎ / ኮምፒውተርዎ ይጫኑ
                </h3>
                <button onclick="closeModal('ad-modal')" class="text-slate-400 hover:text-white">✕</button>
            </div>

            <form action="/super-admin/ads/store" method="POST" class="my-4 space-y-3" onsubmit="return validateAdForm();">
                @csrf
                <input type="hidden" name="image_base64" id="image-base64-input">

                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1">አስተዋዋቂ ድርጅት</label>
                    <input type="text" name="company_name" placeholder="ምሳሌ፡ አቢሲንያ ባንክ" required class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1">የማስታወቂያው ፖስተር / ባነር ይምረጡ</label>
                    <div class="border-2 border-dashed border-amber-400/50 bg-amber-400/5 hover:bg-amber-400/10 rounded-2xl p-5 text-center cursor-pointer transition"
                         onclick="document.getElementById('ad-file-upload').click()">
                        <i class="fas fa-cloud-upload-alt text-3xl text-amber-400 mb-2"></i>
                        <p class="text-xs font-bold text-white">ፎቶውን ከስልክዎ ወይም ኮምፒውተርዎ ይምረጡ</p>
                        <p class="text-[10px] text-slate-400 mt-1">PNG, JPG, JPEG (Landscape ባነር ይመረጣል)</p>
                        <input type="file" id="ad-file-upload" accept="image/*" class="hidden" onchange="previewSelectedAd(this)">
                    </div>

                    <div id="image-preview-wrapper" class="hidden mt-3 p-2 bg-slate-950 rounded-xl border border-slate-800 text-center">
                        <p class="text-[10px] text-emerald-400 font-bold mb-1">✅ ፖስተሩ ተመርጧል (ቅድመ-እይታ)፡</p>
                        <img id="image-preview-tag" src="#" class="w-full h-28 object-cover rounded-lg border border-slate-700">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1">ፖስተሩ ሲነካ የሚወስደው ሊንክ ወይም ስልክ</label>
                    <input type="text" name="target_url" placeholder="https://t.me/... ወይም tel:09xxxxxxxx" required class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white font-mono">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">ዒላማ</label>
                        <select name="target_audience" class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white">
                            <option value="ለሁሉም ተጠቃሚዎች">ለሁሉም ተጠቃሚዎች</option>
                            <option value="ወላጆች በሙሉ">ወላጆች በሙሉ</option>
                            <option value="መምህራን በሙሉ">መምህራን በሙሉ</option>
                            <option value="የት/ቤት አድሚኖች">የት/ቤት አድሚኖች</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-300 mb-1">የጊዜ ገደብ</label>
                        <select name="duration" class="w-full p-2.5 bg-slate-950 border border-slate-800 rounded-xl text-xs text-white">
                            <option value="ያልተገደበ (ቋሚ)">ያልተገደበ (ቋሚ)</option>
                            <option value="ለ 1 ወር ብቻ">ለ 1 ወር ብቻ</option>
                            <option value="ለ 3 ወራት">ለ 3 ወራት</option>
                            <option value="ለ 1 ዓመት">ለ 1 ዓመት</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="w-full py-2.5 rounded-xl text-xs font-bold text-slate-950 bg-amber-400 hover:bg-amber-500 shadow mt-2">
                    ፖስተሩን ዳታቤዝ ላይ ስቀል እና ለጥፍ
                </button>
            </form>
        </div>
    </div>

    <!-- Mela Solution Shared Footer -->
    @include('partials.footer')

    <!-- Scripts -->
    <script>
        function openModal(id) { document.getElementById(id).classList.remove('hidden'); }
        function closeModal(id) { document.getElementById(id).classList.add('hidden'); }

        // ፎቶውን በራስ-ሰር አሳንሶ (Compress) ወደ ዳታቤዝ የሚያዘጋጅ ስክሪፕት
        function previewSelectedAd(input) {
            if (input.files && input.files[0]) {
                const file = input.files[0];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const img = new Image();
                    img.src = e.target.result;

                    img.onload = function() {
                        const canvas = document.createElement('canvas');
                        const ctx = canvas.getContext('2d');

                        const maxWidth = 900;
                        const scale = maxWidth / img.width;
                        canvas.width = (img.width > maxWidth) ? maxWidth : img.width;
                        canvas.height = (img.width > maxWidth) ? (img.height * scale) : img.height;

                        ctx.drawImage(img, 0, 0, canvas.width, canvas.height);

                        const compressedBase64 = canvas.toDataURL('image/jpeg', 0.85);

                        document.getElementById('image-base64-input').value = compressedBase64;
                        document.getElementById('image-preview-tag').src = compressedBase64;
                        document.getElementById('image-preview-wrapper').classList.remove('hidden');
                    };
                };

                reader.readAsDataURL(file);
            }
        }

        function validateAdForm() {
            const base64 = document.getElementById('image-base64-input').value;
            if (!base64) {
                alert('እባክዎ መጀመሪያ የፖስተር ፎቶ ይምረጡ!');
                return false;
            }
            return true;
        }
    </script>

</body>
</html>
