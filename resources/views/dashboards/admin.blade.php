<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>አድሚን ዳሽቦርድ | SmartDebter</title>

    <!-- PWA Settings -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#7e22ce">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="SmartDebter Admin">
    <link rel="apple-touch-icon" href="https://cdn-icons-png.flaticon.com/512/2997/2997295.png">

    <!-- Tailwind CSS & FontAwesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-100 font-sans min-h-screen pb-16">

    <!-- PWA Install Banner -->
    <div id="pwa-install-banner" class="hidden bg-purple-950 text-white px-4 py-2.5 shadow-md">
        <div class="max-w-6xl mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <img src="https://cdn-icons-png.flaticon.com/512/2997/2997295.png" alt="Logo" class="w-8 h-8 rounded-lg">
                <div>
                    <p class="text-xs font-bold leading-tight">SmartDebter የአስተዳደር አፕሊኬሽን</p>
                    <p class="text-[10px] text-purple-200">የትምህርት ቤቱን እንቅስቃሴ እና ማስታወቂያዎች በስልክዎ ለመከታተል ይጫኑ!</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <button id="install-btn" class="bg-amber-400 hover:bg-amber-500 text-slate-900 font-bold text-xs px-3 py-1.5 rounded-lg shadow transition">
                    <i class="fas fa-download mr-1"></i>ጫን (Install)
                </button>
                <button onclick="document.getElementById('pwa-install-banner').classList.add('hidden')" class="text-purple-300 hover:text-white text-sm px-1">✕</button>
            </div>
        </div>
    </div>

    <!-- Top Header -->
    <header class="bg-white border-b shadow-sm sticky top-0 z-40">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-full bg-purple-100 text-purple-700 flex items-center justify-center font-bold">
                    አ
                </div>
                <div>
                    <h2 class="text-sm font-bold text-slate-900 leading-tight">የትምህርት ቤት አስተዳደር</h2>
                    <p class="text-[11px] text-slate-500">SmartDebter Admin Portal • 2017 ዓ.ም</p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <span class="hidden sm:inline-block text-xs bg-emerald-50 text-emerald-700 border border-emerald-200 px-2.5 py-1 rounded-full font-bold">
                    <i class="fas fa-check-circle mr-1"></i>ሲስተሙ ንቁ ነው
                </span>
                <a href="/login" class="text-xs bg-rose-50 text-rose-600 border border-rose-200 px-3 py-1.5 rounded-lg font-semibold hover:bg-rose-100 transition">
                    <i class="fas fa-sign-out-alt mr-1"></i>ውጣ
                </a>
            </div>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 mt-6 space-y-6">

        <!-- 1. School Overview Metrics -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="bg-white p-5 rounded-2xl border shadow-xs">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">ክፍሎች</span>
                    <i class="fas fa-door-open text-purple-600"></i>
                </div>
                <h3 class="text-2xl font-black text-slate-900">24</h3>
                <span class="text-[10px] text-slate-500">ከ KG እስከ 12ኛ ክፍል</span>
            </div>

            <div class="bg-white p-5 rounded-2xl border shadow-xs">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">ተማሪዎች</span>
                    <i class="fas fa-user-graduate text-blue-600"></i>
                </div>
                <h3 class="text-2xl font-black text-slate-900">840</h3>
                <span class="text-[10px] text-emerald-600 font-medium">የተመዘገቡ ወላጆች አሏቸው</span>
            </div>

            <div class="bg-white p-5 rounded-2xl border shadow-xs">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">መምህራን</span>
                    <i class="fas fa-chalkboard-teacher text-emerald-600"></i>
                </div>
                <h3 class="text-2xl font-black text-slate-900">35</h3>
                <span class="text-[10px] text-slate-500">የክፍል ሊንክ የተሰጣቸው</span>
            </div>

            <div class="bg-white p-5 rounded-2xl border shadow-xs">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">አጠቃላይ ፊርማ</span>
                    <i class="fas fa-signature text-amber-600"></i>
                </div>
                <h3 class="text-2xl font-black text-emerald-600">94%</h3>
                <span class="text-[10px] text-slate-500">የወላጆች ምላሽ ምጣኔ</span>
            </div>
        </div>

        <!-- 2. STUDENT & CLASS MANAGEMENT ACTION BAR (አዲስ ተማሪ እና ኤክሴል መጫኛ ቁልፎች) -->
        <div class="bg-white rounded-2xl border shadow-sm p-5 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <h3 class="text-sm font-bold text-slate-900 flex items-center">
                    <i class="fas fa-users-cog text-purple-600 mr-2"></i>
                    የተማሪዎች እና ክፍሎች አስተዳደር (KG - 12ኛ ክፍል)
                </h3>
                <p class="text-xs text-slate-500 mt-0.5">የተማሪዎችን መረጃ በ Excel ይጫኑ ወይም አዲስ ተማሪና ሴክሽን ይመዝግቡ</p>
            </div>
            <div class="flex flex-wrap items-center gap-2">
                <!-- Excel Upload Button -->
                <button onclick="openModal('excel-modal')" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-3.5 py-2 rounded-xl transition shadow-xs flex items-center space-x-1.5">
                    <i class="fas fa-file-excel text-sm"></i>
                    <span>ከ Excel ጫን (Bulk)</span>
                </button>
                <!-- Add Student Button -->
                <button onclick="openModal('student-modal')" class="bg-purple-600 hover:bg-purple-700 text-white text-xs font-bold px-3.5 py-2 rounded-xl transition shadow-xs flex items-center space-x-1.5">
                    <i class="fas fa-user-plus"></i>
                    <span>አዲስ ተማሪ መዝግብ</span>
                </button>
                <!-- Add Section Button -->
                <button onclick="openModal('section-modal')" class="bg-slate-800 hover:bg-slate-900 text-white text-xs font-bold px-3 py-2 rounded-xl transition shadow-xs flex items-center space-x-1.5">
                    <i class="fas fa-plus-circle"></i>
                    <span>አዲስ ሴክሽን</span>
                </button>
            </div>
        </div>

        <!-- 3. TEACHER CLASSROOM ASSIGNMENT & LINK GENERATOR -->
        <div class="bg-white rounded-2xl border shadow-sm p-6">
            <div class="flex items-center justify-between mb-4 pb-3 border-b">
                <div>
                    <h3 class="text-base font-bold text-slate-900 flex items-center">
                        <i class="fas fa-link text-emerald-600 mr-2"></i>
                        የመምህራን የክፍል ምደባ እና የመግቢያ ሊንክ (Teacher Invite Link)
                    </h3>
                    <p class="text-xs text-slate-500 mt-0.5">ለመምህራን የተመደቡበትን ክፍል ብቻ እንዲያገኙ ይህንን ሊንክ በ Telegram/SMS ይላኩላቸው።</p>
                </div>
                <span class="text-xs font-bold text-emerald-700 bg-emerald-50 border border-emerald-200 px-3 py-1 rounded-full">
                    የተጠበቀ አሰራር
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Teacher 1 -->
                <div class="p-4 bg-slate-50 rounded-xl border flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-bold text-slate-900">መምህር አለሙ ተሾመ</span>
                            <span class="text-[10px] font-bold bg-purple-100 text-purple-700 px-2 py-0.5 rounded">ክፍል 7-B</span>
                        </div>
                        <p class="text-[11px] text-slate-500 mb-3">የ 36 ተማሪዎች የቤት ስራ እና ባህሪ ብቻ ማስተዳደር ይችላሉ።</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="text" readonly value="https://smart-debter-ethiopia.vercel.app/teacher/entry?class=7-B&name=መምህር+አለሙ" 
                               class="text-[10px] bg-white border p-1.5 rounded flex-1 text-slate-600 select-all">
                        <button onclick="navigator.clipboard.writeText('https://smart-debter-ethiopia.vercel.app/teacher/entry?class=7-B&name=መምህር+አለሙ'); alert('ሊንኩ ተገልብጧል! ለመምህሩ ይላኩለት።')" 
                                class="text-xs bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-2.5 py-1.5 rounded transition">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>

                <!-- Teacher 2 -->
                <div class="p-4 bg-slate-50 rounded-xl border flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-bold text-slate-900">መምህርት ትዕግስት በቀለ</span>
                            <span class="text-[10px] font-bold bg-blue-100 text-blue-700 px-2 py-0.5 rounded">KG 3 - Red</span>
                        </div>
                        <p class="text-[11px] text-slate-500 mb-3">የ 25 የህፃናት ደብተር እና ክትትል ብቻ ማስተዳደር ይችላሉ።</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="text" readonly value="https://smart-debter-ethiopia.vercel.app/teacher/entry?class=KG-3-Red&name=መምህርት+ትዕግስት" 
                               class="text-[10px] bg-white border p-1.5 rounded flex-1 text-slate-600 select-all">
                        <button onclick="navigator.clipboard.writeText('https://smart-debter-ethiopia.vercel.app/teacher/entry?class=KG-3-Red&name=መምህርት+ትዕግስት'); alert('ሊንኩ ተገልብጧል! ለመምህሯ ይላኩላት።')" 
                                class="text-xs bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-2.5 py-1.5 rounded transition">
                            <i class="fas fa-copy"></i>
                        </button>
                    </div>
                </div>

                <!-- Add New Teacher -->
                <div class="p-4 border-2 border-dashed border-slate-300 rounded-xl flex flex-col items-center justify-center text-center">
                    <div class="w-8 h-8 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center text-sm mb-2">
                        <i class="fas fa-plus"></i>
                    </div>
                    <span class="text-xs font-bold text-slate-800">አዲስ መምህር በክፍል መድብ</span>
                    <p class="text-[10px] text-slate-500 mt-1">መምህር እና ክፍል መርጠው ሊንክ ያመንጩ</p>
                </div>
            </div>
        </div>

        <!-- 4. ADVERTISEMENT MANAGEMENT SECTION -->
        <div class="bg-white rounded-2xl border shadow-sm p-6">
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-6 pb-4 border-b">
                <div>
                    <h3 class="text-base font-bold text-slate-900 flex items-center">
                        <i class="fas fa-ad text-amber-500 mr-2"></i>
                        የድርጅቶች ማስታወቂያ አስተዳደር (Sponsor & Ad Spaces)
                    </h3>
                    <p class="text-xs text-slate-500 mt-0.5">በወላጆች እና በመምህራን ዳሽቦርድ ላይ የሚለጠፉ ማስታወቂያዎች እና የገቢ ትንታኔ</p>
                </div>
                <button onclick="alert('አዲስ ማስታወቂያ የመስቀያ ቅጽ በቅርቡ ይከፈታል!')" class="text-xs font-bold bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-xl transition shadow flex items-center space-x-1.5">
                    <i class="fas fa-plus"></i>
                    <span>አዲስ ማስታወቂያ ጫን</span>
                </button>
            </div>

            <!-- Ad Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="bg-slate-50 text-slate-600 border-b">
                            <th class="p-3">አስተዋዋቂ ድርጅት</th>
                            <th class="p-3">ቦታ (Placement)</th>
                            <th class="p-3">ዒላማ (Target)</th>
                            <th class="p-3">ዕይታ (Views)</th>
                            <th class="p-3">ክሊክ (Clicks)</th>
                            <th class="p-3">ሁኔታ</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y text-slate-700">
                        <tr class="hover:bg-slate-50 transition">
                            <td class="p-3 font-bold text-slate-900 flex items-center space-x-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                <span>አቢሲንያ ባንክ (የቁጠባ ሒሳብ)</span>
                            </td>
                            <td class="p-3">Parent Feed (በደብተር መሃል)</td>
                            <td class="p-3"><span class="bg-blue-50 text-blue-700 px-2 py-0.5 rounded font-semibold">ወላጆች</span></td>
                            <td class="p-3 font-semibold">1,420</td>
                            <td class="p-3 font-semibold text-emerald-600">245 (17.2%)</td>
                            <td class="p-3"><span class="bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded-full font-bold">ንቁ</span></td>
                        </tr>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="p-3 font-bold text-slate-900 flex items-center space-x-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                <span>ኢትዮ ቴሌኮም (የመምህራን ላፕቶፕ)</span>
                            </td>
                            <td class="p-3">Teacher Banner (ከላይ)</td>
                            <td class="p-3"><span class="bg-emerald-50 text-emerald-700 px-2 py-0.5 rounded font-semibold">መምህራን</span></td>
                            <td class="p-3 font-semibold">380</td>
                            <td class="p-3 font-semibold text-emerald-600">62 (16.3%)</td>
                            <td class="p-3"><span class="bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded-full font-bold">ንቁ</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <!-- ==================== MODALS SECTION ==================== -->

    <!-- 1. EXCEL UPLOAD MODAL -->
    <div id="excel-modal" class="hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-xl border">
            <div class="flex items-center justify-between pb-3 border-b">
                <h3 class="font-bold text-sm text-slate-900 flex items-center">
                    <i class="fas fa-file-excel text-emerald-600 text-base mr-2"></i>
                    የተማሪዎች መረጃ ከ Excel/CSV መጫኛ
                </h3>
                <button onclick="closeModal('excel-modal')" class="text-slate-400 hover:text-slate-600 text-lg">✕</button>
            </div>

            <div class="my-4 space-y-4">
                <div class="bg-amber-50 border border-amber-200 rounded-xl p-3 text-xs text-amber-900">
                    <p class="font-bold mb-1">የ Excel አዘገጃጀት መመሪያ፡</p>
                    <p>ፋይልዎ የሚከተሉትን ዓምዶች (Columns) መያዝ አለበት፡ <br>
                    <b>[የተማሪ ሙሉ ስም] , [የክፍል ደረጃ] , [ሴክሽን] , [ጾታ] , [የወላጅ ስልክ ቁጥር]</b></p>
                </div>

                <!-- Download Sample Template -->
                <div class="flex items-center justify-between text-xs p-3 bg-slate-50 rounded-xl border">
                    <span class="text-slate-600 font-medium">የተዘጋጀ የናሙና Excel ቅጽ ያውርዱ፡</span>
                    <a href="data:text/csv;charset=utf-8,StudentName,Grade,Section,Gender,ParentPhone%0Aዮናስ ዳዊት,Grade 7,B,Male,0911000000%0Aሳራ ዳዊት,Grade 3,A,Female,0922000000" 
                       download="smartdebter_sample_students.csv" 
                       class="text-emerald-700 font-bold hover:underline flex items-center space-x-1">
                        <i class="fas fa-download"></i>
                        <span>Sample.csv</span>
                    </a>
                </div>

                <!-- Drag & Drop Zone -->
                <div class="border-2 border-dashed border-emerald-300 bg-emerald-50/40 rounded-2xl p-6 text-center hover:bg-emerald-50/70 transition cursor-pointer"
                     onclick="document.getElementById('excel-file-input').click()">
                    <i class="fas fa-cloud-upload-alt text-3xl text-emerald-600 mb-2"></i>
                    <p class="text-xs font-bold text-slate-800">የ Excel ወይም CSV ፋይሉን እዚህ ይጎትቱ ወይም ይምረጡ</p>
                    <p class="text-[10px] text-slate-500 mt-1">የሚፈቀዱ ፋይሎች፡ .xlsx, .xls, .csv (ከ 10MB በታች)</p>
                    <input type="file" id="excel-file-input" class="hidden" accept=".xlsx, .xls, .csv" onchange="fileSelected(this)">
                </div>
                <p id="file-name-display" class="text-xs text-emerald-700 font-bold text-center hidden"></p>
            </div>

            <div class="flex items-center justify-end space-x-2 pt-2 border-t">
                <button onclick="closeModal('excel-modal')" class="px-4 py-2 rounded-xl text-xs font-bold text-slate-600 bg-slate-100 hover:bg-slate-200">ይቅር</button>
                <button onclick="simulateUpload()" class="px-5 py-2 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 shadow">ጫን (Upload Now)</button>
            </div>
        </div>
    </div>

    <!-- 2. SINGLE STUDENT REGISTRATION MODAL (ከ KG እስከ 12ኛ ክፍል) -->
    <div id="student-modal" class="hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-lg w-full p-6 shadow-xl border max-h-[90vh] overflow-y-auto">
            <div class="flex items-center justify-between pb-3 border-b">
                <h3 class="font-bold text-sm text-slate-900 flex items-center">
                    <i class="fas fa-user-plus text-purple-600 mr-2"></i>
                    አዲስ ተማሪ መመዝገቢያ (ከ KG - 12ኛ ክፍል)
                </h3>
                <button onclick="closeModal('student-modal')" class="text-slate-400 hover:text-slate-600 text-lg">✕</button>
            </div>

            <form action="#" onsubmit="event.preventDefault(); alert('ተማሪው በተሳካ ሁኔታ ተመዝግቧል!'); closeModal('student-modal');" class="my-4 space-y-3.5">
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">የተማሪው ስም</label>
                        <input type="text" placeholder="ምሳሌ፡ ዮናስ" required class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">የአባት ስም</label>
                        <input type="text" placeholder="ምሳሌ፡ ዳዊት" required class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs">
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-3">
                    <!-- Grade: KG to 12 -->
                    <div class="col-span-2">
                        <label class="block text-xs font-bold text-slate-700 mb-1">የክፍል ደረጃ</label>
                        <select required class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs">
                            <optgroup label="የህፃናት ማቆያ እና ኬጂ">
                                <option>KG 1</option>
                                <option>KG 2</option>
                                <option>KG 3</option>
                            </optgroup>
                            <optgroup label="የመጀመሪያ ደረጃ (1ኛ - 8ኛ)">
                                <option>1ኛ ክፍል</option>
                                <option>2ኛ ክፍል</option>
                                <option>3ኛ ክፍል</option>
                                <option>4ኛ ክፍል</option>
                                <option>5ኛ ክፍል</option>
                                <option>6ኛ ክፍል</option>
                                <option selected>7ኛ ክፍል</option>
                                <option>8ኛ ክፍል</option>
                            </optgroup>
                            <optgroup label="ሁለተኛ ደረጃ እና መሰናዶ (9ኛ - 12ኛ)">
                                <option>9ኛ ክፍል</option>
                                <option>10ኛ ክፍል</option>
                                <option>11ኛ ክፍል (Social/Natural)</option>
                                <option>12ኛ ክፍል (Social/Natural)</option>
                            </optgroup>
                        </select>
                    </div>

                    <!-- Unlimited Section -->
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">ሴክሽን (Section)</label>
                        <input type="text" placeholder="A, B, C, Red..." value="B" required class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs font-bold text-purple-700">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">ጾታ</label>
                        <select class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs">
                            <option>ወንድ</option>
                            <option>ሴት</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">የት/ቤት መለያ (ID - አማራጭ)</label>
                        <input type="text" placeholder="ETH-1002" class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs">
                    </div>
                </div>

                <!-- Parent Info (Crucial for Login) -->
                <div class="p-3 bg-purple-50/50 rounded-xl border border-purple-100 space-y-3">
                    <p class="text-[11px] font-bold text-purple-900 uppercase tracking-wide">የወላጅ መረጃ (ለመግቢያ የሚያገለግል)</p>
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-[11px] font-bold text-slate-700 mb-1">የወላጅ ስም</label>
                            <input type="text" placeholder="አቶ ዳዊት" required class="w-full p-2 bg-white border rounded-lg text-xs">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-slate-700 mb-1">የወላጅ ስልክ ቁጥር</label>
                            <input type="text" placeholder="09xxxxxxxx" required class="w-full p-2 bg-white border rounded-lg text-xs">
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end space-x-2 pt-3 border-t">
                    <button type="button" onclick="closeModal('student-modal')" class="px-4 py-2 rounded-xl text-xs font-bold text-slate-600 bg-slate-100">ይቅር</button>
                    <button type="submit" class="px-5 py-2 rounded-xl text-xs font-bold text-white bg-purple-600 hover:bg-purple-700 shadow">ተማሪ መዝግብ</button>
                </div>
            </form>
        </div>
    </div>

    <!-- 3. NEW SECTION CREATOR MODAL -->
    <div id="section-modal" class="hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-sm w-full p-6 shadow-xl border">
            <div class="flex items-center justify-between pb-3 border-b">
                <h3 class="font-bold text-sm text-slate-900">አዲስ ሴክሽን ፍጠር</h3>
                <button onclick="closeModal('section-modal')" class="text-slate-400 hover:text-slate-600 text-lg">✕</button>
            </div>
            <form action="#" onsubmit="event.preventDefault(); alert('አዲሱ ሴክሽን በተሳካ ሁኔታ ተፈጥሯል!'); closeModal('section-modal');" class="my-4 space-y-3">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">ደረጃ ይምረጡ</label>
                    <select class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs">
                        <option>KG 1</option><option>KG 2</option><option>KG 3</option>
                        <option>1ኛ ክፍል</option><option>2ኛ ክፍል</option><option>3ኛ ክፍል</option>
                        <option>4ኛ ክፍል</option><option>5ኛ ክፍል</option><option>6ኛ ክፍል</option>
                        <option>7ኛ ክፍል</option><option>8ኛ ክፍል</option><option>9ኛ ክፍል</option>
                        <option>10ኛ ክፍል</option><option>11ኛ ክፍል</option><option>12ኛ ክፍል</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">የሴክሽን ስም (Unlimited)</label>
                    <input type="text" placeholder="ምሳሌ፡ Section D ወይም Blue" required class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs font-bold">
                </div>
                <button type="submit" class="w-full py-2.5 rounded-xl text-xs font-bold text-white bg-slate-900 hover:bg-slate-800 shadow">ሴክሽን ፍጠር</button>
            </form>
        </div>
    </div>

    <!-- Scripts for Modals and Excel simulation -->
    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }
        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }

        function fileSelected(input) {
            if (input.files && input.files[0]) {
                const display = document.getElementById('file-name-display');
                display.classList.remove('hidden');
                display.innerText = 'የተመረጠው ፋይል: ' + input.files[0].name;
            }
        }

        function simulateUpload() {
            const input = document.getElementById('excel-file-input');
            if (!input.files || !input.files[0]) {
                alert('እባክዎ መጀመሪያ የ Excel ወይም CSV ፋይል ይምረጡ!');
                return;
            }
            alert('ፋይሉ ተመርምሯል! 48 ተማሪዎች እና የወላጆቻቸው ስልክ ቁጥር በተሳካ ሁኔታ ተጭነዋል!');
            closeModal('excel-modal');
        }

        // PWA Script
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js');
            });
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
