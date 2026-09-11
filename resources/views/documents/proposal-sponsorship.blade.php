<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mela Solution - Corporate Sponsorship Proposal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print { display: none !important; }
            body { background: white !important; padding: 0 !important; }
            .print-page { box-shadow: none !important; border: none !important; margin: 0 !important; width: 100% !important; max-width: 100% !important; padding: 25px !important; }
        }
        .stamp-rotate { transform: rotate(-8deg); }
    </style>
</head>
<body class="bg-slate-200 py-6 px-4 font-sans text-slate-900 min-h-screen flex flex-col items-center">

    <!-- TOP CONTROL PANEL (ህትመት ላይ አይታይም) -->
    <div class="no-print bg-slate-900 text-white w-full max-w-4xl p-5 rounded-2xl shadow-xl mb-6 border border-slate-800">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 mb-4 pb-3 border-b border-slate-800">
            <div>
                <h2 class="text-sm font-bold text-white flex items-center">
                    <i class="fas fa-handshake text-amber-400 mr-2"></i>
                    የድርጅቶችና ባንኮች የማስታወቂያ ስፖንሰርሺፕ ማመንጫ (Sponsorship Pitch)
                </h2>
                <p class="text-[11px] text-slate-400">የአስተዋዋቂውን ባንክ/ድርጅት ስም ሲሞሉ ደብዳቤው በራሱ ይስተካከላል፡</p>
            </div>
            <button onclick="window.print()" class="bg-amber-400 hover:bg-amber-500 text-slate-950 text-xs font-bold px-4 py-2.5 rounded-xl shadow transition flex items-center space-x-1.5 shrink-0">
                <i class="fas fa-print"></i>
                <span>በ PDF አውርድ / አትም (Print to PDF)</span>
            </button>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs">
            <div>
                <label class="block text-[10px] text-slate-400 mb-1 font-bold">የአስተዋዋቂው ባንክ / ድርጅት ስም</label>
                <input type="text" id="input-sponsor-name" value="አቢሲንያ ባንክ አ.ማ (Bank of Abyssinia)" oninput="updateSponsorLetter()" 
                       class="w-full p-2 bg-slate-950 border border-slate-700 rounded-lg text-white font-bold">
            </div>

            <div>
                <label class="block text-[10px] text-slate-400 mb-1 font-bold">ተቀባይ የስራ ክፍል</label>
                <input type="text" id="input-dept-name" value="ለማርኬቲንግ፣ ብራንዲንግ እና ኮሙዩኒኬሽን ዳይሬክቶሬት" oninput="updateSponsorLetter()" 
                       class="w-full p-2 bg-slate-950 border border-slate-700 rounded-lg text-white">
            </div>

            <div>
                <label class="block text-[10px] text-slate-400 mb-1 font-bold">የደብዳቤው ቀን</label>
                <input type="text" id="input-sponsor-date" value="መስከረም 1 ቀን 2019 ዓ.ም" oninput="updateSponsorLetter()" 
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
            <span>የደብዳቤ ቁጥር፡ <b class="font-mono text-indigo-900">MS/AD/2019/01</b></span>
            <span>ቀን፡ <b class="text-indigo-950" id="doc-sponsor-date">መስከረም 1 ቀን 2019 ዓ.ም</b></span>
        </div>

        <!-- ADDRESSEE -->
        <div class="text-xs text-slate-800 space-y-0.5">
            <p><b>ለ፡</b> <span id="doc-sponsor-name" class="font-bold text-indigo-950 text-sm">አቢሲንያ ባንክ አ.ማ (Bank of Abyssinia)</span></p>
            <p><b id="doc-dept-name">ለማርኬቲንግ፣ ብራንዲንግ እና ኮሙዩኒኬሽን ዳይሬክቶሬት</b></p>
            <p class="underline">አዲስ አበባ፣ ኢትዮጵያ</p>
        </div>

        <!-- SUBJECT -->
        <div class="bg-slate-50 border-l-4 border-indigo-900 p-3 rounded-r-xl">
            <h2 class="text-xs sm:text-sm font-black text-slate-900 leading-snug">
                ጉዳዩ፡ <u>በ 'SmartDebter-Ethiopia' የዲጂታል ግንኙነት ደብተር ፕላትፎርም ላይ የንግድ ማስታወቂያ ስፖንሰርሺፕ ለመስራት የቀረበ ይፋዊ የትብብር ጥያቄ</u>
            </h2>
        </div>

        <!-- LETTER BODY -->
        <div class="text-xs text-slate-700 leading-relaxed space-y-3 text-justify">
            <p>
                ክቡራትና ክቡራን የተቋሙ የስራ አመራሮች፤
            </p>
            <p>
                ተቋማችሁ በሀገራችን የፋይናንስና የንግድ ዘርፍ ውስጥ የላቀ የህዝብ አመኔታ ያተረፈ፣ ዘመናዊ የዲጂታል አገልግሎቶችን በማቅረብ ግንባር ቀደም ሚና እየተጫወተ የሚገኝ ታላቅ ተቋም መሆኑ ይታወቃል።
            </p>
            <p>
                ድርጅታችን <b>መላ ሶሉሽን (Mela Solution)</b> በሀገራችን ባሉ ታዋቂ የግል ትምህርት ቤቶች (እንደ <b>Neway Challenge Academy</b> ያሉ ከ 4,000 በላይ ተማሪዎች ያሏቸው ተቋማትን ጨምሮ) ውስጥ በየቀኑ በሺዎች የሚቆጠሩ ወላጆች፣ መምህራንና የትምህርት ቤት አመራሮች የሚገለገሉበትን <b>'SmartDebter-Ethiopia' የተሰኘውን የዲጂታል ግንኙነት ደብተር ፕላትፎርም</b> በስራ ላይ አውሏል።
            </p>
            <p>
                በዚህ ፕላትፎርም ላይ በየቀኑ ከ <b>15,000 በላይ በቀጥታ የሚከታተሉ (Daily Active Users)</b> ከፍተኛ የመግዛት አቅም ያላቸው ወላጆች ልጆቻቸውን ለመከታተል የሚገቡበት በመሆኑ፤ ተቋማችሁ የሚሰጣቸውን የቁጠባ፣ የዲጂታል ባንኪንግና ሌሎች አገልግሎቶች በቀጥታ ለነዚህ ወላጆች በብቸኝነት ለማስተዋወቅ እጅግ ተመራጭ የገበያ መድረክ ነው።
            </p>

            <!-- WHY SMARTDEBTER ADVERTISING WINS -->
            <div class="bg-slate-50 rounded-xl p-3.5 border space-y-1.5">
                <h3 class="font-bold text-slate-900 text-xs flex items-center">
                    <i class="fas fa-bullseye text-indigo-600 mr-1.5"></i>
                    ይህ የማስታወቂያ ስፖንሰርሺፕ ለተቋማችሁ የሚሰጣቸው ልዩ ጥቅሞች፡
                </h3>
                <ul class="list-disc list-inside space-y-1 text-[11px] text-slate-700 pl-2">
                    <li><b>100% የታለመ ማህበረሰብ (Targeted Audience)፡</b> ማስታወቂያችሁ በቀጥታ የሚደርሰው ልጆቻቸውን በከፍተኛ ክፍያ በሚያስተምሩና ከፍተኛ የፋይናንስ እንቅስቃሴ ባላቸው ወላጆች ስልክ ላይ ብቻ ነው።</li>
                    <li><b>የዕለት ተዕለት እይታ (Guaranteed Daily Views)፡</b> ወላጆች የልጃቸውን የቤት ስራና የትምህርት ቤት ውሎ ለማየት በቀን ቢያንስ 2 ጊዜ አፑን ስለሚከፍቱት ማስታወቂያችሁ ሳይዘለል ይታያል።</li>
                    <li><b>በየ 4.5 ሰከንዱ የሚንሸራሸር ውብ ሰሌዳ (Auto-sliding Carousel)፡</b> ድርጅታችሁ ያዘጋጀውን ሙሉ ፖስተር ወይም ባነር በከፍተኛ ጥራትና ውበት ያቀርባል።</li>
                </ul>
            </div>

            <!-- SPONSORSHIP PACKAGES -->
            <div class="border rounded-xl overflow-hidden text-xs">
                <table class="w-full text-left">
                    <thead class="bg-slate-100 text-slate-700 font-bold border-b">
                        <tr>
                            <th class="p-2.5">የስፖንሰርሺፕ ፓኬጅ</th>
                            <th class="p-2.5">የማስታወቂያው ቦታ</th>
                            <th class="p-2.5">ዒላማ</th>
                            <th class="p-2.5">ወርሃዊ ኢንቨስትመንት</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y text-[11px] text-slate-700">
                        <tr>
                            <td class="p-2.5 font-bold text-amber-700">🥇 ወርቅ ፓኬጅ (Platinum)</td>
                            <td class="p-2.5">በወላጆች ደብተር መሃል (In-Feed Banner)</td>
                            <td class="p-2.5">ወላጆች በሙሉ</td>
                            <td class="p-2.5 font-bold text-slate-900">35,000 ብር / ወር</td>
                        </tr>
                        <tr>
                            <td class="p-2.5 font-bold text-slate-600">🥈 ብር ፓኬጅ (Silver)</td>
                            <td class="p-2.5">በመምህራን ፖርታል አናት (Top Banner)</td>
                            <td class="p-2.5">መምህራን በሙሉ</td>
                            <td class="p-2.5 font-bold text-slate-900">25,000 ብር / ወር</td>
                        </tr>
                        <tr>
                            <td class="p-2.5 font-bold text-amber-900">🥉 ነሐስ ፓኬጅ (Corporate B2B)</td>
                            <td class="p-2.5">በትምህርት ቤት ባለቤቶችና አድሚን ገጽ</td>
                            <td class="p-2.5">ርዕሰ-መምህራን</td>
                            <td class="p-2.5 font-bold text-slate-900">20,000 ብር / ወር</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p>
                የተቋማችሁን የግብይትና የማስታወቂያ ግቦች ለማሳካት ይህንን ትብብር በአካል ቀርበን በዝርዝር ለመወያየት ዝግጁ መሆናችንን በአክብሮት እንገልጻለን።
            </p>
        </div>

        <!-- ================= OFFICIAL SIGNATURE & STAMP BLOCK ================= -->
        <div class="pt-4 border-t flex items-center justify-between text-xs relative">
            <div>
                <p class="text-slate-500 text-[10px]">ከከበረ ሰላምታ ጋር፤</p>
                <div class="my-1">
                    <svg class="w-36 h-12 text-blue-900" viewBox="0 0 200 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 40 Q 30 10, 50 35 T 90 20 Q 120 50, 150 15 T 190 35" stroke="#1d4ed8" stroke-width="2.5" stroke-linecap="round"/>
                        <path d="M30 45 Q 70 55, 160 38" stroke="#1d4ed8" stroke-width="2" stroke-linecap="round"/>
                        <path d="M45 25 Q 40 5, 60 15" stroke="#1d4ed8" stroke-width="2.2" stroke-linecap="round"/>
                    </svg>
                </div>
                <p class="font-bold text-slate-900 text-sm">መላ ሶሉሽን (Mela Solution)</p>
                <p class="text-slate-600 text-[11px] font-semibold">የስራ አመራር / General Manager</p>
                <p class="text-slate-500 text-[10px] mt-0.5">ስልክ፡ 0913064239 / 0703064239</p>
            </div>

            <div class="text-center relative">
                <div class="stamp-rotate">
                    <div class="w-32 h-32 rounded-full border-4 border-dashed border-blue-800 p-1 flex items-center justify-center relative shadow-xs">
                        <div class="w-full h-full rounded-full border-2 border-blue-800 flex flex-col items-center justify-center text-blue-800 font-bold text-center p-2">
                            <span class="text-[8px] uppercase tracking-tighter leading-none">★ MELA SOLUTION ★</span>
                            <div class="my-0.5 text-xs font-black tracking-widest border-y border-blue-800 py-0.5 w-full">መላ ሶሉሽን</div>
                            <span class="text-[7px] uppercase tracking-tight">ADDIS ABABA • ETHIOPIA</span>
                            <span class="text-[8px] font-mono mt-0.5">★ OFFICIAL ★</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="text-center text-[10px] text-slate-400 border-t pt-2">
            SmartDebter-Ethiopia • Powered by Mela Solut
