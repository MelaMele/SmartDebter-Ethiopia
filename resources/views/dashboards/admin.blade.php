<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>አድሚን ዳሽቦርድ | SmartDebter</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-100 font-sans min-h-screen pb-12">

    <!-- Top Header -->
    <header class="bg-white border-b shadow-sm sticky top-0 z-50">
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
                <h3 class="text-2xl font-black text-slate-900">18</h3>
                <span class="text-[10px] text-slate-500">ከ 1ኛ እስከ 8ኛ ክፍል</span>
            </div>

            <div class="bg-white p-5 rounded-2xl border shadow-xs">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">ተማሪዎች</span>
                    <i class="fas fa-user-graduate text-blue-600"></i>
                </div>
                <h3 class="text-2xl font-black text-slate-900">620</h3>
                <span class="text-[10px] text-emerald-600 font-medium">96% የተመዘገቡ ወላጆች</span>
            </div>

            <div class="bg-white p-5 rounded-2xl border shadow-xs">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">መምህራን</span>
                    <i class="fas fa-chalkboard-teacher text-emerald-600"></i>
                </div>
                <h3 class="text-2xl font-black text-slate-900">28</h3>
                <span class="text-[10px] text-slate-500">ንቁ መለያ ያላቸው</span>
            </div>

            <div class="bg-white p-5 rounded-2xl border shadow-xs">
                <div class="flex items-center justify-between text-slate-400 mb-2">
                    <span class="text-xs font-bold uppercase tracking-wider text-slate-500">አጠቃላይ ፊርማ</span>
                    <i class="fas fa-signature text-amber-600"></i>
                </div>
                <h3 class="text-2xl font-black text-emerald-600">92%</h3>
                <span class="text-[10px] text-slate-500">የወላጆች የዕለት ምላሽ ምጣኔ</span>
            </div>
        </div>

        <!-- 2. ADVERTISEMENT MANAGEMENT SECTION (የድርጅቶች ማስታወቂያ አስተዳደር ክፍል) -->
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
                            <th class="p-3">የማስታወቂያው ቦታ (Placement)</th>
                            <th class="p-3">ዒላማ (Target)</th>
                            <th class="p-3">የታየበት (Views)</th>
                            <th class="p-3">የተነካበት (Clicks)</th>
                            <th class="p-3">ሁኔታ (Status)</th>
                            <th class="p-3 text-right">እርምጃ</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y text-slate-700">
                        <!-- Ad 1 -->
                        <tr class="hover:bg-slate-50 transition">
                            <td class="p-3 font-bold text-slate-900 flex items-center space-x-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                <span>አቢሲንያ ባንክ (የቁጠባ ሒሳብ)</span>
                            </td>
                            <td class="p-3">Parent Feed (በደብተር መሃል)</td>
                            <td class="p-3"><span class="bg-blue-50 text-blue-700 px-2 py-0.5 rounded font-semibold">ወላጆች</span></td>
                            <td class="p-3 font-semibold">1,420</td>
                            <td class="p-3 font-semibold text-emerald-600">245 (17.2%)</td>
                            <td class="p-3"><span class="bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded-full font-bold">ንቁ (Active)</span></td>
                            <td class="p-3 text-right">
                                <button class="text-indigo-600 hover:underline mr-2">አስተካክል</button>
                                <button class="text-rose-600 hover:underline">አቁም</button>
                            </td>
                        </tr>

                        <!-- Ad 2 -->
                        <tr class="hover:bg-slate-50 transition">
                            <td class="p-3 font-bold text-slate-900 flex items-center space-x-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                <span>ኢትዮ ቴሌኮም (የመምህራን ላፕቶፕ)</span>
                            </td>
                            <td class="p-3">Teacher Banner (ከላይ)</td>
                            <td class="p-3"><span class="bg-emerald-50 text-emerald-700 px-2 py-0.5 rounded font-semibold">መምህራን</span></td>
                            <td class="p-3 font-semibold">380</td>
                            <td class="p-3 font-semibold text-emerald-600">62 (16.3%)</td>
                            <td class="p-3"><span class="bg-emerald-100 text-emerald-800 px-2 py-0.5 rounded-full font-bold">ንቁ (Active)</span></td>
                            <td class="p-3 text-right">
                                <button class="text-indigo-600 hover:underline mr-2">አስተካክል</button>
                                <button class="text-rose-600 hover:underline">አቁም</button>
                            </td>
                        </tr>

                        <!-- Ad 3 -->
                        <tr class="hover:bg-slate-50 transition">
                            <td class="p-3 font-bold text-slate-900 flex items-center space-x-2">
                                <span class="w-2 h-2 rounded-full bg-slate-400"></span>
                                <span>መጻሕፍት እና ደብተሮች አቅራቢ</span>
                            </td>
                            <td class="p-3">Top Banner (መነሻ ገጽ)</td>
                            <td class="p-3"><span class="bg-purple-50 text-purple-700 px-2 py-0.5 rounded font-semibold">ሁሉም</span></td>
                            <td class="p-3 font-semibold">3,200</td>
                            <td class="p-3 font-semibold text-emerald-600">410 (12.8%)</td>
                            <td class="p-3"><span class="bg-slate-200 text-slate-700 px-2 py-0.5 rounded-full font-bold">ያበቃ (Expired)</span></td>
                            <td class="p-3 text-right">
                                <button class="text-indigo-600 hover:underline mr-2">አድስ</button>
                                <button class="text-rose-600 hover:underline">ሰርዝ</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- 3. Broadcast Announcement & Recent Activity -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Send School-Wide Notice -->
            <div class="bg-white rounded-2xl border shadow-sm p-5 md:col-span-1">
                <h3 class="text-sm font-bold text-slate-900 mb-3 flex items-center">
                    <i class="fas fa-bullhorn text-indigo-600 mr-2"></i>
                    አጠቃላይ አስቸኳይ ማስታወቂያ
                </h3>
                <p class="text-xs text-slate-500 mb-3 leading-relaxed">ይህ መልእክት በሙሉ ትምህርት ቤቱ ላሉ ወላጆች በሙሉ ደብተር ላይ በቀጥታ ይለጠፋል።</p>
                
                <form action="#" onsubmit="event.preventDefault(); alert('አጠቃላይ ማስታወቂያው ለ 620 ወላጆች ተሰራጭቷል!');" class="space-y-3">
                    <input type="text" placeholder="የርዕስ ማስታወሻ..." required
                           class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs focus:ring-2 focus:ring-purple-500 focus:outline-none">
                    <textarea rows="3" placeholder="ዝርዝር መልእክት..." required
                              class="w-full p-2.5 bg-slate-50 border rounded-xl text-xs focus:ring-2 focus:ring-purple-500 focus:outline-none"></textarea>
                    <button type="submit" class="w-full py-2.5 rounded-xl bg-purple-600 hover:bg-purple-700 text-white font-bold text-xs shadow transition">
                        ለሁሉም ወላጆች አሰራጭ
                    </button>
                </form>
            </div>

            <!-- Recent Classrooms Debter Activity -->
            <div class="bg-white rounded-2xl border shadow-sm p-5 md:col-span-2">
                <h3 class="text-sm font-bold text-slate-900 mb-3 flex items-center justify-between">
                    <span>የክፍሎች የዕለት እንቅስቃሴ እና ክትትል</span>
                    <a href="#" class="text-xs text-purple-600 font-semibold hover:underline">ሁሉንም እይ</a>
                </h3>

                <div class="space-y-3">
                    <div class="p-3 bg-slate-50 rounded-xl border flex items-center justify-between text-xs">
                        <div>
                            <span class="font-bold text-slate-800">ክፍል 7-B (ሂሳብ)</span>
                            <p class="text-[11px] text-slate-500 mt-0.5">መምህር አለሙ • ዛሬ 4:30 ላይ የቤት ስራ ልከዋል</p>
                        </div>
                        <span class="text-emerald-700 font-bold bg-emerald-100 px-2 py-1 rounded">32/36 ፈርመዋል</span>
                    </div>

                    <div class="p-3 bg-slate-50 rounded-xl border flex items-center justify-between text-xs">
                        <div>
                            <span class="font-bold text-slate-800">ክፍል 3-A (አማርኛ)</span>
                            <p class="text-[11px] text-slate-500 mt-0.5">መምህርት ትዕግስት • ዛሬ 5:10 ላይ የፊደል ልምምድ ልከዋል</p>
                        </div>
                        <span class="text-emerald-700 font-bold bg-emerald-100 px-2 py-1 rounded">28/30 ፈርመዋል</span>
                    </div>

                    <div class="p-3 bg-slate-50 rounded-xl border flex items-center justify-between text-xs">
                        <div>
                            <span class="font-bold text-slate-800">ክፍል 5-C (ሳይንስ)</span>
                            <p class="text-[11px] text-slate-500 mt-0.5">መምህር ከበደ • ምንም የቤት ስራ አልተላከም</p>
                        </div>
                        <span class="text-slate-500 bg-slate-200 px-2 py-1 rounded">መልእክት የለም</span>
                    </div>
                </div>
            </div>

        </div>

    </main>

</body>
</html>
