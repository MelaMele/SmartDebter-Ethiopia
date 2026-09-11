<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mela Solution - School Proposal Generator</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print { display: none !important; }
            body { background: white !important; padding: 0 !important; }
            .print-page { box-shadow: none !important; border: none !important; margin: 0 !important; width: 100% !important; max-width: 100% !important; padding: 20px !important; }
        }
    </style>
</head>
<body class="bg-slate-200 py-6 px-4 font-sans text-slate-900 min-h-screen flex flex-col items-center">

    <!-- TOP CONTROL PANEL (የት/ቤት መረጃዎችን በፍጥነት መሙያ ሳጥን - ህትመት ላይ አይታይም) -->
    <div class="no-print bg-slate-900 text-white w-full max-w-4xl p-5 rounded-2xl shadow-xl mb-6 border border-slate-800">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-4 pb-3 border-b border-slate-800">
            <div>
                <h2 class="text-sm font-bold text-white flex items-center">
                    <i class="fas fa-magic text-amber-400 mr-2"></i>
                    የትምህርት ቤቶች ይፋዊ ደብዳቤ ማመንጫ (Proposal Generator)
                </h2>
                <p class="text-[11px] text-slate-400">የትምህርት ቤቱን መረጃ እዚህ ሲሞሉ ከታች ያለው ደብዳቤ በራሱ ይስተካከላል፡</p>
            </div>
            <button onclick="window.print()" class="bg-amber-400 hover:bg-amber-500 text-slate-950 text-xs font-bold px-4 py-2 rounded-xl shadow transition flex items-center space-x-1.5 shrink-0">
                <i class="fas fa-print"></i>
                <span>በ PDF አውርድ / አትም (Print to PDF)</span>
            </button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs">
            <div>
                <label class="block text-[10px] text-slate-400 mb-1 font-bold">የትምህርት ቤቱ ስም</label>
                <input type="text" id="input-school-name" value="ብስራተ ገብርኤል ትምህርት ቤት" oninput="updateLetter()" 
                       class="w-full p-2 bg-slate-950 border border-slate-700 rounded-lg text-white font-bold">
            </div>

            <div>
                <label class="block text-[10px] text-slate-400 mb-1 font-bold">የተማሪዎች ብዛት</label>
                <input type="text" id="input-student-count" value="1,800" oninput="updateLetter()" 
                       class="w-full p-2 bg-slate-950 border border-slate-700 rounded-lg text-white">
            </div>

            <div>
                <label class="block text-[10px] text-slate-400 mb-1 font-bold">የደብዳቤው ቀን</label>
                <input type="text" id="input-letter-date" value="መስከረም 1 ቀን 2019 ዓ.ም" oninput="updateLetter()" 
                       class="w-full p-2 bg-slate-950 border border-slate-700 rounded-lg text-white font-bold text-amber-300">
            </div>
        </div>
    </div>

    <!-- ================= A4 PRINTABLE DOCUMENT ================= -->
    <div class="print-page bg-white w-full max-w-4xl p-8 sm:p-12 rounded-2xl shadow-xl border border-slate-300 space-y-5">

        <!-- MELA SOLUTION OFFICIAL LETTERHEAD -->
        <header class="border-b-2 border-indigo-950 pb-4">
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
            <span>የደብዳቤ ቁጥር፡ <b class="font-mono text-indigo-900">MS/SD/2019/04</b></span>
            <span>ቀን፡ <b class="text-indigo-950" id="doc-date">መስከረም 1 ቀን 2019 ዓ.ም</b></span>
        </div>

        <!-- ADDRESSEE -->
        <div class="text-xs text-slate-800 space-y-0.5">
            <p><b>ለ፡</b> <span id="doc-school-name" class="font-bold text-indigo-950 text-sm">ብስራተ ገብርኤል ትምህርት ቤት</span></p>
            <p><b>ለማኔጅመንት ቦርድና ዋና ርዕሰ-መምህር</b></p>
            <p class="underline">አዲስ አበባ፣ ኢትዮጵያ</p>
        </div>

        <!-- SUBJECT -->
        <div class="bg-slate-50 border-l-4 border-indigo-900 p-3 rounded-r-xl">
            <h2 class="text-xs sm:text-sm font-black text-slate-900 leading-snug">
                ጉዳዩ፡ <u>የትምህርት ቤቱን የተማሪዎች ግንኙነት ደብተር (Communication Book) ሙሉ በሙሉ ዲጂታል በማድረግ ከፍተኛ የህትመት ወጪዎችን ለማስቀረት የቀረበ ይፋዊ የትብብር ፕሮፖዛል</u>
            </h2>
        </div>

        <!-- LETTER BODY -->
        <div class="text-xs text-slate-700 leading-relaxed space-y-3 text-justify">
            <p>
                ክቡራትና ክቡራን የትምህርት ቤቱ ማኔጅመንት ቦርድና የስራ አመራሮች፤
            </p>
            <p>
                እንደሚታወቀው ትምህርት ቤትዎ ጥራቱን የጠበቀ ትምህርት በመስጠት ከ <b id="doc-student-count">1,800</b> በላይ ተማሪዎችን ተቀብሎ በማስተማር በሀገራችን ካሉ ታዋቂ የትምህርት ተቋማት አንዱ መሆኑ ይታወቃል።
            </p>
            <p>
                ሆኖም ለተማሪዎች በየዓመቱ የሚዘጋጀው ባህላዊ የወረቀት ግንኙነት ደብተር ለትምህርት ቤቱ ከፍተኛ የህትመት ወጪ ከማስከተሉም በላይ፤ ደብተሮች ከተማሪዎች ቦርሳ መጥፋት፣ መቅደድ እንዲሁም ወላጆች በወቅቱ አይተው አለመፈረም በትምህርት ቤቱና በወላጆች መካከል የክትትል ክፍተት ሲፈጥር ቆይቷል።
            </p>
            <p>
                ድርጅታችን <b>መላ ሶሉሽን (Mela Solution)</b> ይህንን ችግር ከስሩ ለመቅረፍ እና ትምህርት ቤትዎን ወደ ዘመናዊ ቴክኖሎጂ ለማሸጋገር በሀገራችን የትምህርት መዋቅር መሰረት የተሰራውን <b>'SmartDebter-Ethiopia' የተሰኘውን ዘመናዊ ዲጂታል የግንኙነት ደብተር ፕላትፎርም</b> በታላቅ ኩራት ለትምህርት ቤትዎ ያቀርባል።
            </p>

            <!-- KEY FEATURES -->
            <div class="bg-slate-50 rounded-xl p-3.5 border space-y-1.5">
                <h3 class="font-bold text-slate-900 text-xs flex items-center">
                    <i class="fas fa-check-circle text-emerald-600 mr-1.5"></i>
                    ሲስተሙ ለትምህርት ቤትዎ የሚሰጣቸው ልዩ ጠቀሜታዎች፡
                </h3>
                <ul class="list-disc list-inside space-y-1 text-[11px] text-slate-700 pl-2">
                    <li><b>የዲቪዥን ተጠሪዎች የተሟላ የስራ ክፍፍል፡</b> ኬጂ፣ 1ኛ-4ኛ፣ 5ኛ-8ኛ እና 9ኛ-12ኛ ዩኒት ሊደሮች የየራሳቸውን መምህራንና ተማሪዎች ለይተው የሚቆጣጠሩበት ዘመናዊ አሰራር።</li>
                    <li><b>100% ወረቀት አልባ የወላጅ ክትትል፡</b> የቤት ስራ፣ ባህሪና ማስታወሻዎች በሰከንድ ውስጥ ለወላጅ ስልክ ይደርሳሉ፤ ወላጆችም በስልካቸው "አይቻለሁ/ፈርሜያለሁ" ብለው ያረጋግጣሉ።</li>
                    <li><b>ቀላልና ደህንነቱ የተጠበቀ የወላጅ መግቢያ፡</b> ወላጆች አላስፈላጊ የይለፍ ቃል ማስታወስ አይጠበቅባቸውም፤ በት/ቤቱ ባስመዘገቡት <b>ስልክ ቁጥር + በተማሪው መለያ ቁጥር (Student ID)</b> ብቻ ይገባሉ።</li>
                    <li><b>ከስልክ ጋር የተመሳሰለ የኢትዮጵያ ዘመን አቆጣጠር (ዓ.ም)፡</b> ከመስከረም እስከ ጳጉሜ በሀገራችን የቀን መቁጠሪያ በራሱ የሚሰራና በአማርኛ እንዲሁም በእንግሊዝኛ የተዋቀረ ነው።</li>
                </ul>
            </div>

            <!-- SPECIAL OFFER -->
            <div class="border-2 border-dashed border-amber-300 bg-amber-50/60 p-3 rounded-xl">
                <h4 class="font-bold text-amber-950 text-xs mb-0.5">🎁 ለትምህርት ቤትዎ የቀረበ ልዩ ስጦታ፡</h4>
                <p class="text-[11px] text-amber-900 leading-relaxed">
                    ትምህርት ቤትዎ የአሰራሩን ጥራት በተግባር እንዲያረጋግጥ፡ <b>የግማሽ ሴሚስተር ነፃ የሙከራ ጊዜ (100% Free Pilot)</b> የምንሰጥ ሲሆን፣ የተማሪዎችን መረጃ ከ Excel ላይ ወደ ሲስተሙ የመጫኑን ስራ እና ለመምህራን የሚሰጠውን ስልጠና Mela Solution ያለምንም ክፍያ በነፃ ያከናውናል።
                </p>
            </div>

            <p>
                ይህንን ዘመናዊ ፕላትፎርም በትምህርት ቤትዎ ስራ ላይ ለማዋል አጭር የ 15 ደቂቃ የቀጥታ ማሳያ (Live Demo) ለማኔጅመንቱ በአካል ቀርበን ለማሳየት ዝግጁ መሆናችንን በአክብሮት እንገልጻለን።
            </p>
        </div>

        <!-- SIGNATURE & SEAL BLOCK -->
        <div class="pt-4 border-t flex items-end justify-between text-xs">
            <div>
                <p class="text-slate-500 text-[10px]">ከከበረ ሰላምታ ጋር፤</p>
                <p class="font-bold text-slate-900 text-sm mt-2">መላ ሶሉሽን (Mela Solution)</p>
                <p class="text-slate-600 text-[11px]">የሶፍትዌር እና የትምህርት ቴክኖሎጂ አበልጻጊ</p>
                <p class="text-slate-500 text-[10px]">ስልክ፡ 0913064239 / 0703064239</p>
            </div>

            <div class="text-center">
                <div class="w-20 h-20 border-2 border-dashed border-slate-300 rounded-full flex items-center justify-center text-[9px] text-slate-400">
                    የድርጅቱ ማህተም
                </div>
            </div>
        </div>

        <footer class="text-center text-[10px] text-slate-400 border-t pt-1.5">
            SmartDebter-Ethiopia • Powered by Mela Solution • Addis Ababa, Ethiopia
        </footer>

    </div>

    <!-- Live Update Script -->
    <script>
        function updateLetter() {
            const schoolName = document.getElementById('input-school-name').value;
            const studentCount = document.getElementById('input-student-count').value;
            const letterDate = document.getElementById('input-letter-date').value;

            document.getElementById('doc-school-name').innerText = schoolName;
            document.getElementById('doc-student-count').innerText = studentCount;
            document.getElementById('doc-date').innerText = letterDate;
        }
    </script>

</body>
</html>
