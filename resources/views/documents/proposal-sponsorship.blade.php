<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mela Solution - ይፋዊ የማስታወቂያ ስፖንሰርሺፕ ፕሮፖዛል</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print { display: none !important; }
            body { background: white !important; padding: 0 !important; }
            .print-page { box-shadow: none !important; border: none !important; margin: 0 !important; width: 100% !important; max-width: 100% !important; }
        }
    </style>
</head>
<body class="bg-slate-200 py-8 px-4 font-sans text-slate-900 min-h-screen flex flex-col items-center">

    @php
        $targetCompany = request('company', '_____________________________');
    @endphp

    <!-- FLOATING ACTION BUTTON -->
    <div class="no-print fixed top-4 right-4 z-50 flex items-center space-x-2">
        <a href="/" class="bg-white border text-slate-700 hover:bg-slate-50 text-xs font-bold px-3 py-2 rounded-xl shadow-md transition">
            <i class="fas fa-arrow-left mr-1"></i>ተመለስ
        </a>
        <button onclick="window.print()" class="bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold px-4 py-2 rounded-xl shadow-lg transition flex items-center space-x-1.5">
            <i class="fas fa-print"></i>
            <span>በ PDF አውርድ / አትም (Print to PDF)</span>
        </button>
    </div>

    <!-- A4 PRINTABLE DOCUMENT -->
    <div class="print-page bg-white w-full max-w-4xl p-8 sm:p-12 rounded-2xl shadow-xl border border-slate-300 space-y-6">

        <!-- ================= MELA SOLUTION LETTERHEAD ================= -->
        <header class="border-b-2 border-indigo-900 pb-4">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center space-x-3">
                    <div class="w-14 h-14 rounded-2xl bg-indigo-950 text-white flex items-center justify-center text-2xl font-black shadow-md">
                        <i class="fas fa-ad"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-black text-indigo-950 tracking-tight leading-tight">መላ ሶሉሽን (Mela Solution)</h1>
                        <p class="text-xs font-bold text-slate-500 uppercase tracking-widest">Digital Educational Advertising & Software Network</p>
                    </div>
                </div>

                <div class="text-right text-[11px] text-slate-600 space-y-0.5">
                    <p><i class="fas fa-phone-alt text-indigo-600 mr-1"></i> <b>ስልክ፡</b> 0913064239 / 0703064239</p>
                    <p><i class="fas fa-envelope text-indigo-600 mr-1"></i> <b>ኢሜይል፡</b> melasolution@gmail.com</p>
                    <p><i class="fas fa-map-marker-alt text-indigo-600 mr-1"></i> <b>አድራሻ፡</b> አዲስ አበባ፣ ኢትዮጵያ</p>
                </div>
            </div>
        </header>

        <!-- REFERENCE & DATE -->
        <div class="flex justify-between items-center text-xs font-bold text-slate-700 border-b pb-2">
            <span>የደብዳቤ ቁጥር፡ <b class="font-mono text-indigo-900">MS/SPON/{{ rand(100, 999) }}/2019</b></span>
            <span>ቀን፡ <b class="text-indigo-950">መስከረም 1 ቀን 2019 ዓ.ም</b></span>
        </div>

        <!-- ADDRESSEE -->
        <div class="text-xs text-slate-800 space-y-1">
            <p><b>ለ፡</b> <span class="text-indigo-950 font-bold underline">{{ $targetCompany }}</span></p>
            <p><b>ለማርኬቲንግ እና ኮሙኒኬሽን መምሪያ</b></p>
            <p class="underline">አዲስ አበባ፣ ኢትዮጵያ</p>
        </div>

        <!-- SUBJECT -->
        <div class="bg-slate-50 border-l-4 border-indigo-900 p-3 rounded-r-xl">
            <h2 class="text-xs sm:text-sm font-black text-slate-900 leading-snug">
                ጉዳዩ፡ <u>በስማርት ደብተር የትምህርት ቤት ኔትወርክ (SmartDebter Network) ላይ በቀጥታ ለወላጆች፣ ለመምህራን እና ለት/ቤት አመራሮች የሚደርስ ይፋዊ የማስታወቂያ ስፖንሰርሺፕ ፕሮፖዛል</u>
            </h2>
        </div>

        <!-- BODY -->
        <div class="text-xs text-slate-700 leading-relaxed space-y-3.5 text-justify">
            <p>
                ክቡራትና ክቡራን የአስተዋዋቂ ድርጅቱ የስራ አመራሮች፤
            </p>
            <p>
                ድርጅታችን <b>መላ ሶሉሽን (Mela Solution)</b> በሀገራችን ባሉ በርካታ ትምህርት ቤቶች ውስጥ በሺዎች የሚቆጠሩ ወላጆች፣ መምህራን እና የትምህርት ቤት አመራሮች በየቀኑ የተማሪዎችን የቤት ስራ እና ውሎ የሚከታተሉበትን <b>'SmartDebter-Ethiopia' የተሰኘውን የዲጂታል ግንኙነት ደብተር ኔትወርክ</b> በስራ ላይ አውሏል።
            </p>
            <p>
                ይህ ፕላትፎርም በተለይ ለባንኮች (የልጆች የቁጠባ ሒሳብ)፣ ለኢንሹራንስ፣ ለትምህርት ቁሳቁሶች፣ ለቴክኖሎጂ እና ለህፃናት አልባሳት አቅራቢዎች **እጅግ ከፍተኛ የመግዛት አቅም ያላቸውን ወላጆች በቀጥታ በስልካቸው ስክሪን ላይ (Direct-to-Parent Screen)** ለማግኘት ወደር የሌለው ተመራጭ የገበያ ቦታ ነው።
            </p>

            <!-- AUDIENCE HIGHLIGHTS -->
            <div class="grid grid-cols-3 gap-3 bg-slate-50 p-4 rounded-xl border text-center">
                <div class="p-2 bg-white rounded-lg border shadow-xs">
                    <p class="text-xl font-black text-indigo-900">15,000+</p>
                    <p class="text-[10px] text-slate-500 font-bold mt-0.5">ንቁ ወላጆችና ተማሪዎች</p>
                </div>
                <div class="p-2 bg-white rounded-lg border shadow-xs">
                    <p class="text-xl font-black text-emerald-700">300,000+</p>
                    <p class="text-[10px] text-slate-500 font-bold mt-0.5">ወርሃዊ የማስታወቂያ ዕይታ (Views)</p>
                </div>
                <div class="p-2 bg-white rounded-lg border shadow-xs">
                    <p class="text-xl font-black text-purple-700">100%</p>
                    <p class="text-[10px] text-slate-500 font-bold mt-0.5">ዒላማውን የጠበቀ ታዳሚ (High-Income)</p>
                </div>
            </div>

            <!-- AD FORMATS -->
            <div class="space-y-2">
                <h3 class="font-bold text-slate-900 text-xs flex items-center">
                    <i class="fas fa-check-circle text-emerald-600 mr-1.5"></i>
                    የማስታወቂያ አቀራረብ ቅርጾች (Ad Formats):
                </h3>
                <ul class="list-disc list-inside space-y-1 text-[11px] text-slate-700 pl-2">
                    <li><b>ሙሉ ግራፊክስ ባነር (Full Graphic Banner):</b> ድርጅትዎ ያዘጋጀው ፖስተር ወይም ባነር ያለምንም ጽሑፍ መደራረብ በሙሉ ውበቱ በየ 4.5 ሰከንዱ እየተንሸራተተ የሚታይበት።</li>
                    <li><b>ቀጥታ መስተጋብር (Click-to-Action):</b> ወላጁ ወይም መምህሩ ማስታወቂያውን ሲነካው በቀጥታ ወደ ድርጅትዎ ቴሌግራም ቻናል፣ ዌብሳይት ወይም ቀጥታ ስልክ ጥሪ ይወስደዋል።</li>
                    <li><b>የዕይታ እና የክሊክ ሪፖርት (Analytics Report):</b> ማስታወቂያዎ በስንት ሺህ ወላጆች እንደታየ እና እንደተነካ የሚያሳይ ወርሃዊ ትንታኔ እንሰጣለን።</li>
                </ul>
            </div>

            <!-- PRICING PACKAGES -->
            <div class="bg-indigo-50/50 p-3.5 rounded-xl border border-indigo-200 space-y-2">
                <h4 class="font-bold text-indigo-950 text-xs">💎 የስፖንሰርሺፕ ፓኬጆች፡</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-[11px]">
                    <div class="p-2 bg-white rounded-lg border">
                        <span class="font-bold text-indigo-900">የ 1 ወር ብቸኛ ስፖንሰር (Monthly)፡</span>
                        <p class="text-slate-600 mt-0.5">በወላጆች፣ በመምህራን እና በት/ቤት አድሚኖች ሰሌዳ ላይ ያለ ገደብ የሚታይ።</p>
                    </div>
                    <div class="p-2 bg-white rounded-lg border">
                        <span class="font-bold text-indigo-900">የ 3 ወራት (ሴሚስተር) ስፖንሰር፡</span>
                        <p class="text-slate-600 mt-0.5">ከ 20% የዋጋ ቅናሽ ጋር ቀጣይነት ያለው የደንበኞች ቀጥታ ግንኙነት።</p>
                    </div>
                </div>
            </div>

            <p>
                ድርጅትዎ በዚህ ፕላትፎርም ላይ ያለውን የገበያ ተደራሽነት እንዲጠቀም አጭር የቀጥታ ማሳያ (Live Demo) በአካል ቀርበን ለማሳየት ዝግጁ መሆናችንን በአክብሮት እንገልጻለን።
            </p>
        </div>

        <!-- SIGNATURE BLOCK -->
        <div class="pt-6 border-t flex items-end justify-between text-xs">
            <div>
                <p class="text-slate-500 text-[10px]">ከከበረ ሰላምታ ጋር፤</p>
                <p class="font-bold text-slate-900 text-sm mt-3">መላ ሶሉሽን (Mela Solution)</p>
                <p class="text-slate-600 text-[11px]">የሶፍትዌር እና የትምህርት ቴክኖሎጂ አበልጻጊ</p>
                <p class="text-slate-500 text-[10px] mt-1">ስልክ፡ 0913064239 / 0703064239</p>
            </div>

            <div class="text-center">
                <div class="w-24 h-24 border-2 border-dashed border-slate-300 rounded-full flex items-center justify-center text-[10px] text-slate-400">
                    የድርጅቱ ማህተም
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <footer class="text-center text-[10px] text-slate-400 border-t pt-2">
            SmartDebter-Ethiopia • Powered by Mela Solution • Addis Ababa, Ethiopia
        </footer>

    </div>

</body>
</html>
