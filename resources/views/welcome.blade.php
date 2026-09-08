<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartDebter Ethiopia | የዲጂታል ግንኙነት ደብተር</title>
    
    <!-- PWA Settings -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#4f46e5">

    <!-- Tailwind CSS & Icons -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-50 text-slate-800 font-sans min-h-screen flex flex-col justify-between">

    <!-- Top Navigation -->
    <header class="bg-white shadow-sm border-b sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="bg-indigo-600 text-white p-2 rounded-xl shadow-md">
                    <i class="fas fa-book-open text-xl"></i>
                </div>
                <div>
                    <h1 class="font-bold text-lg text-indigo-950 leading-tight">SmartDebter</h1>
                    <p class="text-xs text-slate-500 font-medium">የኢትዮጵያ ዲጂታል ግንኙነት ደብተር</p>
                </div>
            </div>
            <div>
                <a href="/login" class="bg-indigo-600 hover:bg-indigo-700 text-white text-xs sm:text-sm font-semibold px-4 py-2 rounded-xl transition shadow-sm">
                    ይግቡ (Login)
                </a>
            </div>
        </div>
    </header>

    <!-- SPONSORED ADVERTISEMENT BANNER (TOP) -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 w-full">
        <div class="relative overflow-hidden rounded-xl border border-dashed border-amber-300 bg-amber-50 p-4 text-center">
            <span class="absolute top-1 right-2 text-[10px] uppercase font-bold tracking-wider text-amber-700 bg-amber-200/60 px-1.5 py-0.5 rounded">ስፖንሰር የተደረገ</span>
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3 px-2">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full bg-amber-200 flex items-center justify-center text-amber-800">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <div class="text-left">
                        <h4 class="font-bold text-sm text-slate-900">የትምህርት ቁሳቁሶች እና መጻሕፍት ቅናሽ!</h4>
                        <p class="text-xs text-slate-600">ለአዲሱ የትምህርት ዘመን ለልጆት የሚሆኑ ደብተሮችና አልባሳትን በ 20% ቅናሽ ያግኙ።</p>
                    </div>
                </div>
                <a href="#" class="inline-block text-xs font-bold text-white bg-amber-600 hover:bg-amber-700 px-4 py-2 rounded-lg transition">
                    ዝርዝሩን ይመልከቱ
                </a>
            </div>
        </div>
    </section>

    <!-- Main Content / Hero -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-8 flex-1">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                የትምህርት ቤት እና የወላጅ ቀጥታ ግንኙነት
            </h2>
            <p class="mt-3 text-slate-600 text-sm sm:text-base">
                የልጅዎ የዕለት ውሎ፣ የቤት ስራ፣ ባህሪ እና ማስታወቂያዎች በአንድ ቦታ በቅጽበት ይከታተሉ።
            </p>
        </div>

        <!-- 3 Dashboards Entry Cards -->
        <div id="login-section" class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- 1. የወላጅ ዳሽቦርድ -->
            <div class="bg-white rounded-2xl p-6 border shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center text-xl mb-4">
                    <i class="fas fa-user-friends"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-900">የወላጅ ክፍል (Parent)</h3>
                <p class="text-xs text-slate-500 mt-1 mb-6 leading-relaxed">
                    የልጅዎን የቤት ስራ ይመልከቱ፣ ያረጋግጡ (ይፈርሙ)፣ ከመምህራን የሚላኩ መልእክቶችን በስልክዎ ይከታተሉ።
                </p>
                <a href="/login?role=parent" class="block text-center w-full py-2.5 px-4 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm transition">
                    እንደ ወላጅ ይግቡ
                </a>
            </div>

            <!-- 2. የመምህራን ዳሽቦርድ -->
            <div class="bg-white rounded-2xl p-6 border shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-xl mb-4">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-900">የመምህራን ክፍል (Teacher)</h3>
                <p class="text-xs text-slate-500 mt-1 mb-6 leading-relaxed">
                    የዕለት የቤት ስራ፣ የባህሪ ማስታወሻ እና የክፍል መልእክቶችን በሰከንድ ውስጥ ለወላጆች ይላኩ።
                </p>
                <a href="/login?role=teacher" class="block text-center w-full py-2.5 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm transition">
                    እንደ መምህር ይግቡ
                </a>
            </div>

            <!-- 3. የአድሚን ዳሽቦርድ -->
            <div class="bg-white rounded-2xl p-6 border shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center text-xl mb-4">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-900">አስተዳዳሪ (School Admin)</h3>
                <p class="text-xs text-slate-500 mt-1 mb-6 leading-relaxed">
                    ክፍሎችን፣ መምህራንን እና ተማሪዎችን በ Excel ያቀናጁ፤ የድርጅቶችን ማስታወቂያዎች ያስተዳድሩ።
                </p>
                <a href="/login?role=admin" class="block text-center w-full py-2.5 px-4 rounded-xl bg-purple-600 hover:bg-purple-700 text-white font-semibold text-sm transition">
                    እንደ አድሚን ይግቡ
                </a>
            </div>

        </div>
    </main>

    <!-- FOOTER BY MELA SOLUTION (የተጨመረው አዲሱ ግርጌ) -->
    <footer class="bg-white border-t py-6 mt-12 text-center text-xs text-slate-500">
        <div class="max-w-4xl mx-auto px-4 space-y-2">
            <p class="
