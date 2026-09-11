<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mela Solution Proposal - Neway Challenge Academy</title>
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
<body class="bg-slate-200 py-8 px-4 font-sans text-slate-900 min-h-screen flex flex-col items-center">

    <!-- FLOATING PRINT BUTTON -->
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

        <!-- ================= MELA SOLUTION OFFICIAL LETTERHEAD ================= -->
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
            <span>የደብዳቤ ቁጥር፡ <b class="font-mono text-indigo-900">MS/NCA/001/2019</b></span>
            <span>ቀን፡ <b class="text-indigo-950">መስከረም 1 ቀን 2019 ዓ.ም</b></span>
        </div>

        <!-- ADDRESSEE -->
        <div class="text-xs text-slate-800 space-y-1">
            <p><b>ለ፡</b> ነዋይ ቻሌንጅ አካዳሚ (Neway Challenge Academy)</p>
            <p><b>ለባለቤትና ማኔጅመንት ቦርድ / ዋና ርዕሰ-መምህር</b></p>
            <p class="underline">አዲስ አበባ፣ ኢትዮጵያ</p>
        </div>

        <!-- SUBJECT -->
        <div class="bg-slate-50 border-l-4 border-indigo-900 p-3 rounded-r-xl">
            <h2 class="text-xs sm:text-sm font-black text-slate-900 leading-snug">
                ጉዳዩ፡ <u>የትምህርት ቤቱን የተማሪዎች ግንኙነት ደብተር (Communication Book) ሙሉ በሙሉ ዲጂታል በማድረግ በዓመት ከ 600,000 ብር በላይ የህትመት ወጪዎችን ለማስቀረት የቀረበ ይፋዊ የትብብር ፕሮፖዛል</u>
            </h2>
        </div>

        <!-- LETTER BODY -->
        <div class="text-xs text-slate-700 leading-relaxed space-y-3.5 text-justify">
            <p>
                ክቡራትና ክቡራን የነዋይ ቻሌንጅ አካዳሚ ማኔጅመንት ቦርድና የስራ አመራሮች፤
            </p>
            <p>
                አካዳሚዎ ባለፉት ዓመታት ጥራቱን የጠበቀ ትምህርት ከመስጠት ባለፈ ከ 4,000 በላይ ተማሪዎችን በተለያዩ ካምፓሶችና ዲቪዥኖች (ከኬጂ እስከ 12ኛ ክፍል) ተቀብሎ በማስተማር በሀገራችን ካሉ ታላላቅና ተምሳሌት የትምህርት ተቋማት ግንባር ቀደም መሆኑ ይታወቃል። 
            </p>
            <p>
                ሆኖም ለ 4,000 ተማሪዎች በየዓመቱ የሚዘጋጀው ባህላዊ የወረቀት ግንኙነት ደብተር ለትምህርት ቤቱ ከፍተኛ የህትመት ወጪ የሚያስከትል (በአማካይ በዓመት <b>ከ 600,000 ብር በላይ</b>) ከመሆኑም ባሻገር፤ ደብተሮች ከተማሪዎች ቦርሳ መጥፋት፣ መቅደድ እንዲሁም ወላጆች በወቅቱ አይተው አለመፈረም የክትትል ክፍተት ሲፈጥር ቆይቷል።
            </p>
            <p>
                ድርጅታችን <b>መላ ሶሉሽን (Mela Solution)</b> ይህንን ችግር ከስሩ ለመቅረፍ እና የነዋይ ቻሌንጅ አካዳሚን የቴክኖሎጂ ፈር-ቀዳጅነት ወደ ላቀ ደረጃ ለማሸጋገር በሀገራችን የትምህርት መዋቅር መሰረት የተሰራውን <b>'SmartDebter-Ethiopia' የተሰኘውን ዘመናዊ ዲጂታል የግንኙነት ደብተር</b> በታላቅ ኩራት ለትምህርት ቤትዎ ያቀርባል።
            </p>

            <!-- KEY FEATURES HIGHLIGHT FOR NEWAY CHALLENGE -->
            <div class="bg-slate-50 rounded-xl p-4 border space-y-2">
                <h3 class="font-bold text-slate-900 text-xs flex items-center">
                    <i class="fas fa-check-circle text-emerald-600 mr-1.5"></i>
                    ሲስተሙ ለነዋይ ቻሌንጅ አካዳሚ የሚሰጣቸው ልዩ ጠቀሜታዎች፡
                </h3>
                <ul class="list-disc list-inside space-y-1 text-[11px] text-slate-700 pl-2">
                    <li><b>የካምፓሶች እና የዲቪዥን ተጠሪዎች የተሟላ የስራ ክፍፍል፡</b> ካምፓስ 1 እና ካምፓስ 2 ሳይቀላቀሉ እያንዳንዱ ዲቪዥን (ኬጂ፣ 1-4፣ 5-8፣ 9-12 ዩኒት ሊደሮች) የየራሳቸውን መምህራንና ተማሪዎች በነፃነት የሚቆጣጠሩበት አሰራር።</li>
                    <li><b>100% ወረቀት አልባ የወላጅ ክትትል፡</b> የቤት ስራ፣ ባህሪና ማስታወሻዎች በሰከንድ ውስጥ ለወላጅ ስልክ ይደርሳሉ፤ ወላጆችም በስልካቸው "አይቻለሁ/ፈርሜያለሁ" ብለው ያረጋግጣሉ።</li>
                    <li><b>ቀላልና ደህንነቱ የተጠበቀ የወላጅ መግቢያ፡</b> ወላጆች አላስፈላጊ የይለፍ ቃል ማስታወስ አይጠበቅባቸውም፤ በት/ቤቱ ባስመዘገቡት <b>ስልክ ቁጥር + በተማሪው መለያ ቁጥር (Student ID)</b> ብቻ ይገባሉ።</li>
                    <li><b>ከስልክ ጋር የተመሳሰለ የኢትዮጵያ ዘመን አቆጣጠር (ዓ.ም)፡</b> ከመስከረም እስከ ጳጉሜ (2019 ዓ.ም) በሀገራችን የቀን መቁጠሪያ በራሱ የሚሰራና በአማርኛ እንዲሁም በእንግሊዝኛ ቋንቋ የተዋቀረ ነው።</li>
                </ul>
            </div>

            <!-- SPECIAL OFFER FOR NEWAY CHALLENGE -->
            <div class="border-2 border-dashed border-amber-300 bg-amber-50/60 p-3 rounded-xl">
                <h4 class="font-bold text-amber-950 text-xs mb-1">🎁 ለመጀመሪያው ሞዴል አጋራችን (Flagship Partner) የቀረበ ልዩ ስጦታ፡</h4>
                <p class="text-[11px] text-amber-900 leading-relaxed">
                    ነዋይ ቻሌንጅ አካዳሚ የዚህ ዘመናዊ ቴክኖሎጂ የመጀመሪያው ሞዴል አጋራችን እንዲሆን የምንፈልግ በመሆኑ፡ <b>የግማሽ ሴሚስተር ነፃ የሙከራ ጊዜ (100% Free Pilot)</b> የምንሰጥ ሲሆን፣ የ 4,000 ተማሪዎችን መረጃ ከነባር ኤክሴል (Excel) ላይ ወደ ሲስተሙ የመጫኑን ስራ እና ለመምህራን የሚሰጠውን ስልጠና Mela Solution ያለምንም ክፍያ በነፃ ያከናውናል።
                </p>
            </div>

            <p>
                ይህንን ዘመናዊ ፕላትፎርም በትምህርት ቤትዎ ስራ ላይ ለማዋል አጭር የ 15 ደቂቃ የቀጥታ ማሳያ (Live Demo) ለማኔጅመንት ቦርዱ በአካል ቀርበን ለማሳየት ዝግጁ መሆናችንን በአክብሮት እንገልጻለን።
            </p>
        </div>

        <!-- ================= SIGNATURE & OFFICIAL COMPANY STAMP (ፊርማ እና ማህተም) ================= -->
        <div class="pt-6 border-t flex items-center justify-between text-xs relative">
            
            <!-- Signature Block -->
            <div class="space-y-1 relative z-10">
                <p class="text-slate-500 text-[10px]">ከከበረ ሰላምታ ጋር፤</p>
                
                <!-- YOUR ACTUAL HANDWRITTEN SIGNATURE (ቬክተር የተደረገው ፊርማህ) -->
                <div class="py-1">
                    <svg viewBox="0 0 200 110" class="w-44 h-20 text-blue-800 stroke-current fill-none">
                        <!-- Top loop -->
                        <path d="M 55 42 C 45 28, 65 15, 78 18 C 88 22, 82 45, 92 40 C 102 35, 112 35, 122 45" stroke-width="3" stroke-linecap="round"/>
                        <!-- Vertical stem -->
                        <path d="M 72 38 L 68 95" stroke-width="3.2" stroke-linecap="round"/>
                        <!-- Double horizontal bars -->
                        <path d="M 45 62 L 138 48" stroke-width="2.6" stroke-linecap="round"/>
                        <path d="M 42 75 L 135 60" stroke-width="2.6" stroke-linecap="round"/>
                        <!-- Vertical cross-hatches -->
                        <path d="M 60 55 L 56 82" stroke-width="2.6" stroke-linecap="round"/>
                        <path d="M 72 53 L 68 80" stroke-width="2.6" stroke-linecap="round"/>
                        <path d="M 84 51 L 80 78" stroke-width="2.6" stroke-linecap="round"/>
                        <path d="M 96 49 L 92 76" stroke-width="2.6" stroke-linecap="round"/>
                        <path d="M 108 47 L 104 74" stroke-width="2.6" stroke-linecap="round"/>
                        <path d="M 120 45 L 116 72" stroke-width="2.6" stroke-linecap="round"/>
                        <!-- Right flourish loop -->
                        <path d="M 122 45 C 132 36, 142 40, 138 55 C 132 68, 142 76, 136 90" stroke-width="3" stroke-linecap="round"/>
                    </svg>
                </div>

                <p class="font-bold text-slate-900 text-sm">መላ ሶሉሽን (Mela Solution)</p>
                <p class="text-slate-600 text-[11px]">ዋና ስራ አስኪያጅ (General Manager)</p>
                <p class="text-slate-500 text-[10px]">ስልክ፡ 0913064239 / 0703064239</p>
            </div>

            <!-- OFFICIAL CIRCULAR MELA SOLUTION STAMP (የተቀረጸው ይፋዊ ማህተም) -->
            <div class="relative z-10 pr-6">
                <div class="w-36 h-36 relative select-none" style="transform: rotate(-8deg);">
                    <svg viewBox="0 0 200 200" class="w-full h-full text-blue-800 stroke-current fill-none">
                        <!-- Outer double ring -->
                        <circle cx="100" cy="100" r="92" stroke-width="3.5" stroke-dasharray="1 0"/>
                        <circle cx="100" cy="100" r="84" stroke-width="1.5"/>
                        <!-- Inner ring -->
                        <circle cx="100" cy="100" r="56" stroke-width="1.8"/>

                        <!-- Text along circular path (Top) -->
                        <path id="top-curve" d="M 22 100 A 78 78 0 0 1 178 100" fill="none"/>
                        <text class="fill-current text-blue-800 text-[11px] font-black tracking-[0.22em]">
                            <textPath href="#top-curve" startOffset="50%" text-anchor="middle">
                                ★ MELA SOLUTION ★
                            </textPath>
                        </text>

                        <!-- Text along circular path (Bottom) -->
                        <path id="bottom-curve" d="M 178 100 A 78 78 0 0 1 22 100" fill="none"/>
                        <text class="fill-current text-blue-800 text-[9.5px] font-bold tracking-[0.16em]">
                            <textPath href="#bottom-curve" startOffset="50%" text-anchor="middle">
                                • ADDIS ABABA • ETHIOPIA •
                            </textPath>
                        </text>

                        <!-- Center Stamp Core -->
                        <g class="text-center font-sans">
                            <text x="100" y="86" text-anchor="middle" class="fill-current text-blue-800 text-[9px] font-black tracking-wider">SOFTWARE & IT</text>
                            <path d="M 75 92 L 125 92" stroke-width="1.2"/>
                            <text x="100" y="105" text-anchor="middle" class="fill-current text-blue-800 text-[11px] font-black">መላ ሶሉሽን</text>
                            <path d="M 75 111 L 125 111" stroke-width="1.2"/>
                            <text x="100" y="123" text-anchor="middle" class="fill-current text-blue-800 text-[8px] font-bold tracking-widest">★ 2019 ★</text>
                        </g>
                    </svg>
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
