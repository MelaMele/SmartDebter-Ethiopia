<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mela Solution - ይፋዊ የዲጂታል ትብብር ፕሮፖዛል</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print { display: none !important; }
            body { background: white !important; padding: 0 !important; }
            .print-page { box-shadow: none !important; border: none !important; margin: 0 !important; width: 100% !important; max-width: 100% !important; padding: 10px !important; }
            .editable-input { border: none !important; background: transparent !important; padding: 0 !important; }
        }
    </style>
</head>
<body class="bg-slate-200 py-6 px-4 font-sans text-slate-900 min-h-screen flex flex-col items-center">

    <!-- ================= TOP DIGITAL CONTROLS BAR (ቴሌግራም/ዋትስአፕ መላኪያ) ================= -->
    <div class="no-print w-full max-w-4xl bg-slate-900 text-white p-4 rounded-2xl shadow-xl mb-6 flex flex-col sm:flex-row items-center justify-between gap-3 border border-slate-800">
        <div class="flex items-center space-x-2 text-xs">
            <span class="p-2 bg-indigo-600 rounded-xl text-white"><i class="fas fa-paper-plane"></i></span>
            <div>
                <p class="font-bold">ዲጂታል ማጋሪያ ሰሌዳ (Digital Dispatch)</p>
                <p class="text-[10px] text-slate-400">የት/ቤቱን ስም ይጻፉ፤ በቀጥታ በቴሌግራም ወይም ዋትስአፕ ይላኩላቸው</p>
            </div>
        </div>

        <div class="flex items-center space-x-2 flex-wrap gap-y-2">
            <!-- Share on Telegram -->
            <button onclick="shareToTelegram()" class="bg-sky-500 hover:bg-sky-600 text-white text-xs font-bold px-3 py-2 rounded-xl transition shadow flex items-center space-x-1.5">
                <i class="fab fa-telegram-plane text-sm"></i>
                <span>በቴሌግራም ላክ</span>
            </button>

            <!-- Share on WhatsApp -->
            <button onclick="shareToWhatsApp()" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-3 py-2 rounded-xl transition shadow flex items-center space-x-1.5">
                <i class="fab fa-whatsapp text-sm"></i>
                <span>በ WhatsApp ላክ</span>
            </button>

            <!-- Copy Link -->
            <button onclick="copyCurrentProposalLink()" class="bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs font-bold px-3 py-2 rounded-xl border border-slate-700 transition flex items-center space-x-1">
                <i class="fas fa-link"></i>
                <span>ሊንክ ቅዳ</span>
            </button>

            <!-- Print to PDF -->
            <button onclick="window.print()" class="bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold px-3 py-2 rounded-xl shadow transition">
                <i class="fas fa-print mr-1"></i>PDF
            </button>
        </div>
    </div>

    <!-- ================= A4 PRINTABLE DOCUMENT ================= -->
    <div class="print-page bg-white w-full max-w-4xl p-8 sm:p-12 rounded-2xl shadow-xl border border-slate-300 space-y-6">

        <!-- MELA SOLUTION LETTERHEAD -->
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
            <div class="flex items-center space-x-1">
                <span>የደብዳቤ ቁጥር፡</span>
                <input type="text" id="prop-ref" value="MS/PROP/101/2019" class="editable-input font-mono text-indigo-900 font-bold bg-slate-50 border border-slate-300 rounded px-1.5 py-0.5 w-40 text-xs">
            </div>

            <div class="flex items-center space-x-1">
                <span>ቀን፡</span>
                <input type="text" id="prop-date" value="መስከረም 1 ቀን 2019 ዓ.ም" class="editable-input text-indigo-950 font-bold bg-slate-50 border border-slate-300 rounded px-1.5 py-0.5 w-48 text-xs text-right">
            </div>
        </div>

        <!-- ADDRESSEE -->
        <div class="text-xs text-slate-800 space-y-1">
            <div class="flex items-center space-x-1">
                <b>ለ፡</b>
                <input type="text" id="input-school-name" placeholder="የትምህርት ቤቱን ስም እዚህ ይጻፉ (ምሳሌ፡ ነዋይ ቻሌንጅ አካዳሚ)" 
                       value="ነዋይ ቻሌንጅ አካዳሚ" 
                       oninput="updateSchoolName(this.value)"
                       class="editable-input text-indigo-950 font-black text-sm bg-amber-50 border-b-2 border-indigo-600 rounded px-2 py-0.5 w-full max-w-md">
            </div>
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
                ድርጅታችን <b>መላ ሶሉሽን (Mela Solution)</b> ይህንን ችግር በዘመናዊ ቴክኖሎጂ ለመቅረፍ እና <span class="display-target-school font-bold text-slate-900">ነዋይ ቻሌንጅ አካዳሚ</span> ያሳተመውን የወረቀት ደብተር ሳያስተጓጉል <b>ጎን ለጎን በነፃ እንዲሞክረው</b> የሚያስችለውን <b>'SmartDebter-Ethiopia' የተሰኘውን የዲጂታል ግንኙነት ደብተር</b> በታላቅ ክብር ያቀርብልዎታል።
            </p>

            <!-- STRATEGY: PARALLEL PILOT -->
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
                    <li><b>የሁለትዮሽ ግንኙነት (Two-Way Communication):</b> መምህራን የቤት ስራ ሲልኩ ወላጆች ያረጋግጣሉ፤ እንዲሁም ወላጆች የህመም ፈቃድና ማስታወሻዎችን በቀጥታ ለመምህሩ ወይም ለዲቪዥን ተጠሪው ይልካሉ።</li>
                    <li><b>ቀላልና ደህንነቱ የተጠበቀ አሰራር፡</b> ወላጆች አላስፈላጊ የይለፍ ቃል ማስታወስ አይጠበቅባቸውም፤ በት/ቤቱ ባስመዘገቡት <b>ስልክ ቁጥር + በተማሪው መለያ ቁጥር (Student ID)</b> ብቻ ይገባሉ።</li>
                    <li><b>የወራት ማህደር እና የኢትዮጵያ ካሌንደር፡</b> ከመስከረም እስከ ጳጉሜ (2019 ዓ.ም) በሀገራችን ዘመን አቆጣጠር በየወሩ ተከፋፍሎ የሚቀመጥ ዘመናዊ ሰነድ አያያዝ አለው።</li>
                </ul>
            </div>

            <!-- SPECIAL OFFER -->
            <div class="border-2 border-dashed border-emerald-300 bg-emerald-50/60 p-3 rounded-xl">
                <h4 class="font-bold text-emerald-950 text-xs mb-1">🎁 ለትምህርት ቤትዎ የቀረበ ልዩ ስጦታ፡</h4>
                <p class="text-[11px] text-emerald-900 leading-relaxed">
                    የትምህርት ቤቱን የተማሪዎች መረጃ ከ Excel ላይ ወደ ሲስተሙ የመጫን ስራ እና ለመምህራን የሚሰጠውን ገለጻ Mela Solution <b>ያለምንም ክፍያ በነፃ</b> ያከናውናል። የሙከራ ጊዜው ሲጠናቀቅ ለቀጣዩ ዓመት የትምህርት ቤቱን የወረቀት ህትመት ወጪ ከ 70% በላይ በሚቀንስ እጅግ ተመጣጣኝ ዋጋ አብረን እንሰራለን።
                </p>
            </div>

            <!-- LIVE INTERACTIVE LINK FOR THE DIRECTOR -->
            <div class="p-3 bg-slate-100 rounded-xl text-center space-y-1">
                <p class="text-[11px] font-bold text-slate-800">ሲስተሙን በቀጥታ በስልክዎ ለመመልከት ይጫኑት፡</p>
                <a href="https://smart-debter-ethiopia.vercel.app" target="_blank" class="text-indigo-600 hover:underline font-bold text-xs">
                    👉 https://smart-debter-ethiopia.vercel.app
                </a>
            </div>
        </div>

        <!-- SIGNATURE BLOCK -->
        <div class="pt-6 border-t flex items-end justify-between text-xs">
            <div>
                <p class="text-slate-500 text-[10px]">ከከበረ ሰላምታ ጋር፤</p>
                
                <div class="my-2">
                    <div id="sig-preview-box" class="hidden">
                        <img id="sig-img" src="#" class="h-12 object-contain">
                    </div>
                    <button type="button" onclick="document.getElementById('sig-input').click()" class="no-print text-[10px] text-indigo-600 bg-indigo-50 border border-indigo-200 px-2 py-1 rounded hover:bg-indigo-100 font-bold">
                        <i class="fas fa-signature mr-1"></i>ፊርማ ከጋለሪ ስቀል
                    </button>
                    <input type="file" id="sig-input" accept="image/*" class="hidden" onchange="uploadSignature(this)">
                </div>

                <p class="font-bold text-slate-900 text-sm">መላ ሶሉሽን (Mela Solution)</p>
                <p class="text-slate-600 text-[11px]">የሶፍትዌር እና የትምህርት ቴክኖሎጂ አበልጻጊ</p>
                <p class="text-slate-500 text-[10px] mt-1">ስልክ፡ 0913064239 / 0703064239</p>
            </div>

            <div class="text-center">
                <div class="w-28 h-28 relative flex items-center justify-center">
                    <img id="stamp-img" src="#" class="hidden w-full h-full object-contain">
                    <div id="stamp-placeholder" onclick="document.getElementById('stamp-input').click()" 
                         class="w-24 h-24 border-2 border-dashed border-slate-300 rounded-full flex flex-col items-center justify-center text-center cursor-pointer hover:bg-slate-50 transition">
                        <i class="fas fa-stamp text-slate-400 text-lg mb-1"></i>
                        <span class="text-[9px] text-slate-400 font-bold leading-tight">ማህተም ከጋለሪ<br>ይምረጡ</span>
                    </div>
                    <input type="file" id="stamp-input" accept="image/*" class="hidden" onchange="uploadStamp(this)">
                </div>
            </div>
        </div>

        <footer class="text-center text-[10px] text-slate-400 border-t pt-2">
            SmartDebter-Ethiopia • Powered by Mela Solution • Addis Ababa, Ethiopia
        </footer>

    </div>

    <!-- Scripts -->
    <script>
        function updateSchoolName(val) {
            const targets = document.querySelectorAll('.display-target-school');
            targets.forEach(t => t.innerText = val ? val : '_____________________________');
        }

        function getShareableText() {
            const schoolName = document.getElementById('input-school-name').value.trim() || 'የትምህርት ቤቱ አስተዳደር';
            const proposalLink = `https://smart-debter-ethiopia.vercel.app/proposal/school?school_name=${encodeURIComponent(schoolName)}`;
            
            return `ሰላም ጤና ይስጥልኝ ለ ${schoolName} አመራሮች ✋\n\nየትምህርት ቤትዎን የግንኙነት ደብተር የወረቀት ህትመት ወጪዎችን በዘላቂነት ለማስቀረት እና ለግማሽ ሴሚስተር በነፃ ጎን ለጎን ለመጠቀም የቀረበ ይፋዊ የትብብር ፕሮፖዛላችንን በዚህ ዲጂታል ሊንክ ይመልከቱ፡\n\n📄 ይፋዊ ደብዳቤ፡ ${proposalLink}\n🚀 የቀጥታ ሲስተም ማሳያ፡ https://smart-debter-ethiopia.vercel.app\n\nስልክ፡ 0913064239 / 0703064239\nመላ ሶሉሽን (Mela Solution)`;
        }

        // SHARE TO TELEGRAM
        function shareToTelegram() {
            const text = encodeURIComponent(getShareableText());
            window.open(`https://t.me/share/url?url=&text=${text}`, '_blank');
        }

        // SHARE TO WHATSAPP
        function shareToWhatsApp() {
            const text = encodeURIComponent(getShareableText());
            window.open(`https://api.whatsapp.com/send?text=${text}`, '_blank');
        }

        function copyCurrentProposalLink() {
            const schoolName = document.getElementById('input-school-name').value.trim();
            const link = `https://smart-debter-ethiopia.vercel.app/proposal/school?school_name=${encodeURIComponent(schoolName)}`;
            navigator.clipboard.writeText(link);
            alert('የዲጂታል ፕሮፖዛሉ ሊንክ ተገልብጧል (Copied)!');
        }

        function uploadSignature(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('sig-img').src = e.target.result;
                    document.getElementById('sig-preview-box').classList.remove('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function uploadStamp(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('stamp-img').src = e.target.result;
                    document.getElementById('stamp-img').classList.remove('hidden');
                    document.getElementById('stamp-placeholder').classList.add('hidden');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</body>
</html>
