<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mela Solution - ይፋዊ የትብብር ፕሮፖዛል</title>
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
        $targetSchool = request('school_name', '_____________________________');
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

    <!-- A4 PRINTABLE PROPOSAL DOCUMENT -->
    <div class="print-page bg-white w-full max-w-4xl p-8 sm:p-12 rounded-2xl shadow-xl border border-slate-300 space-y-6">

        <!-- ================= MELA SOLUTION LETTERHEAD ================= -->
        <header class="border-b-2 border-indigo-900 pb-4">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center space-x-3">
                    <div class="w-14 h-14 rounded-2xl bg-indigo-950 text-white flex items-center justify-center text-2xl font-black shadow-md">
                        <i class="fas fa-book-reader"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-black text-indigo-950 tracking-tight leading-tight">መላ ሶሉሽን (Mela Solution)</h1>
                        <p class="text-xs font-bold text-slate-500 uppercase tracking-widest">Software & Educational IT Solutions Provider</p>
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
            <span>የደብዳቤ ቁጥር፡ <b class="font-mono text-indigo-900">MS/PROP/{{ rand(100, 999) }}/2019</b></span>
            <span>ቀን፡ <b class="text-indigo-950">መስከረም 1 ቀን 2019 ዓ.ም</b></span>
        </div>

        <!-- ADDRESSEE -->
        <div class="text-xs text-slate-800 space-y-1">
            <p><b>ለ፡</b> <span class="text-indigo-950 font-bold underline">{{ $targetSchool }} ትምህርት ቤት</span></p>
            <p><b>ለባለቤትና ማኔጅመንት ቦርድ / ዋና ርዕሰ-መምህር</b></p>
            <p class="underline">አዲስ አበባ፣ ኢትዮጵያ</p>
        </div>

        <!-- SUBJECT -->
        <div class="bg-slate-50 border-l-4 border-indigo-900 p-3 rounded-r-xl">
            <h2 class="text-xs sm:text-sm font-black text-slate-900 leading-snug">
                ጉዳዩ፡ <u>የትምህርት ቤቱን የተማሪዎች ግንኙነት ደብተር (Communication Book) ዘመናዊና ዲጂታል በማድረግ የወረቀት ህትመት ወጪዎችን ለማስቀረት እና ለግማሽ ሴሚስተር በነፃ ጎን ለጎን ለመጠቀም የቀረበ ይፋዊ የትብብር ፕሮፖዛል</u>
            </h2>
        </div>

        <!-- BODY -->
        <div class="text-xs text-slate-700 leading-relaxed space-y-3.5 text-justify">
            <p>
                ክቡራትና ክቡራን የትምህርት ቤቱ ማኔጅመንት ቦርድና የስራ አመራሮች፤
            </p>
            <p>
                እንደሚታወቀው በትምህርት ቤቶች ውስጥ የተማሪዎች የዕለት ተዕለት የቤት ስራ፣ የባህሪ ክትትል እና የት/ቤት ማስታወቂያዎች በባህላዊው የወረቀት ግንኙነት ደብተር አማካኝነት ሲከናወን ቆይቷል። ሆኖም የወረቀት ደብተር ለትምህርት ቤቱ <b>ከፍተኛ ዓመታዊ የህትመት ወጪ የሚያስከትል (ለአንድ ተማሪ በአማካይ ከ 150 - 250 ብር)</b> ከመሆኑም ባሻገር፤ ደብተሮች ከተማሪዎች ቦርሳ መጥፋት፣ መቅደድ እና ወላጆች በወቅቱ አይተው አለመፈረም የክትትል ክፍተቶችን ሲፈጥር ቆይቷል።
            </p>
            <p>
                ድርጅታችን <b>መላ ሶሉሽን (Mela Solution)</b> ይህንን ችግር በዘመናዊ ቴክኖሎጂ ለመቅረፍ እና ትምህርት ቤትዎ ያሳተመውን የወረቀት ደብተር ሳያስተጓጉል <b>ጎን ለጎን በነፃ እንዲሞክረው</b> የሚያስችለውን <b>'SmartDebter-Ethiopia' የተሰኘውን የዲጂታል ግንኙነት ደብተር</b> በታላቅ ክብር ያቀርብልዎታል።
            </p>

            <!-- STRATEGY: PARALLEL PILOT (ጎን ለጎን የማስኬድ ስልት) -->
            <div class="bg-indigo-50/60 rounded-xl p-4 border border-indigo-200 space-y-2">
                <h3 class="font-bold text-indigo-950 text-xs flex items-center">
                    <i class="fas fa-sync-alt text-indigo-600 mr-1.5"></i>
                    አሰራሩ እንዴት ነው የሚተገበረው? (ከወረቀት ደብተሩ ጎን ለጎን ማስኬድ)
                </h3>
                <p class="text-[11px] text-indigo-900 leading-relaxed">
                    ትምህርት ቤትዎ ለዚህ ሴሚስተር ያዘጋጀው የወረቀት ደብተር እንዳለ ሆኖ፣ ይህንን ዲጂታል ሲስተም <b>ለግማሽ ሴሚስተር ያለምንም ክፍያ በነፃ (100% Free Pilot)</b> አብሮ ያስኬዳል። በዚህም ወላጆች፣ መምህራን እና አመራሮች የሲስተሙን ፍጥነት፣ ምቾትና አስተማማኝነት በተግባር እንዲመሰክሩ እድል ይሰጣል።
                </p>
            </div>

            <!-- KEY ADVANTAGES -->
            <div class="bg-slate-50 rounded-xl p-4 border space-y-2">
                <h3 class="font-bold text-slate-900 text-xs flex items-center">
                    <i class="fas fa-check-circle text-emerald-600 mr-1.5"></i>
                    የ SmartDebter ዋና ዋና ጠቀሜታዎች፡
                </h3>
                <ul class="list-disc list-inside space-y-1.5 text-[11px] text-slate-700 pl-2">
                    <li><b>የካምፓሶች እና የዲቪዥኖች የተሟላ መዋቅር፡</b> ካምፓስ 1 እና ካምፓስ 2 ሳይቀላቀሉ ለዋና ዳይሬክተር፣ ለኬጂ፣ ለ 1-4፣ ለ 5-8 እና ለ 9-12 ዩኒት ሊደሮች የተከፋፈለ ዘመናዊ የስልጣን ውክልና አለው።</li>
                    <li><b>የሁለትዮሽ ግንኙነት (Two-Way Communication):</b> መምህራን የቤት ስራ ሲልኩ ወላጆች በስልካቸው ያረጋግጣሉ (ይፈርማሉ)፤ እንዲሁም ወላጆች የህመም ፈቃድና ማስታወሻዎችን በቀጥታ ለመምህሩ ወይም ለዲቪዥን ተጠሪው ይልካሉ።</li>
                    <li><b>ቀላልና ደህንነቱ የተጠበቀ አሰራር፡</b> ወላጆች አላስፈላጊ የይለፍ ቃል ማስታወስ አይጠበቅባቸውም፤ በት/ቤቱ ባስመዘገቡት <b>ስልክ ቁጥር + በተማሪው መለያ ቁጥር (Student ID)</b> ብቻ ይገባሉ።</li>
                    <li><b>የወራት ማህደር እና የኢትዮጵያ ካሌንደር፡</b> ከመስከረም እስከ ጳጉሜ (2019 ዓ.ም) በሀገራችን ዘመን አቆጣጠር በየወሩ ተከፋፍሎ የሚቀመጥ ዘመናዊ ሰነድ አያያዝ አለው።</li>
                    <li><b>መተግበሪያውን በቀላሉ ስልክ ላይ መጫን (PWA):</b> ወላጆችና መምህራን ከ Play Store ሳያወርዱ በቀጥታ ስልካቸው ስክሪን ላይ እንደ አፕሊኬሽን ጭነው ይጠቀሙታል።</li>
                </ul>
            </div>

            <!-- SPECIAL OFFER -->
            <div class="border-2 border-dashed border-emerald-300 bg-emerald-50/60 p-3 rounded-xl">
                <h4 class="font-bold text-emerald-950 text-xs mb-1">🎁 ለትምህርት ቤትዎ የቀረበ ልዩ ስጦታ፡</h4>
                <p class="text-[11px] text-emerald-900 leading-relaxed">
                    የትምህርት ቤቱን የተማሪዎች መረጃ ከ Excel ላይ ወደ ሲስተሙ የመጫን ስራ እና ለመምህራን የሚሰጠውን ገለጻ Mela Solution <b>ያለምንም ክፍያ በነፃ</b> ያከናውናል። የሙከራ ጊዜው ሲጠናቀቅ ለቀጣዩ ዓመት የትምህርት ቤቱን የወረቀት ህትመት ወጪ ከ 70% በላይ በሚቀንስ እጅግ ተመጣጣኝ ዋጋ አብረን እንሰራለን።
                </p>
            </div>

            <p>
                ይህንን ዘመናዊ አሰራር በትምህርት ቤትዎ ለመጀመር አጭር የ 15 ደቂቃ የቀጥታ ማሳያ (Live Demo) በአካል ቀርበን ለማሳየት ዝግጁ መሆናችንን በአክብሮት እንገልጻለን።
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
