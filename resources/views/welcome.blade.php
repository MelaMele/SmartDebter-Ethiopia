<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>መግቢያ | SmartDebter Ethiopia</title>
    
    <!-- PWA Settings -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#4f46e5">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-100 min-h-screen flex flex-col justify-between items-center p-4">

    <!-- Top Header -->
    <div class="w-full max-w-md text-center mt-4 mb-2">
        <a href="/" class="inline-flex items-center space-x-2 text-indigo-600 hover:text-indigo-800 transition mb-2">
            <i class="fas fa-arrow-left text-sm"></i>
            <span class="text-xs font-semibold">ወደ መነሻ ተመለስ</span>
        </a>
        <h1 class="text-2xl font-black text-slate-800">SmartDebter</h1>
        <p class="text-xs text-slate-500 font-medium">የተጠቃሚ መግቢያ በር (Portal Login)</p>
    </div>

    <!-- Login Box -->
    <div class="w-full max-w-md bg-white rounded-2xl shadow-sm border p-6 sm:p-8 my-auto">
        @php
            $role = request('role', 'parent');
        @endphp

        <!-- Error Alert -->
        @if (session('error'))
            <div class="mb-4 p-3 bg-rose-50 border border-rose-200 text-rose-700 text-xs rounded-xl flex items-start space-x-2">
                <i class="fas fa-exclamation-circle text-sm mt-0.5"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @if($role == 'parent')
            <!-- PARENT LOGIN -->
            <div class="flex items-center justify-center mb-5">
                <div class="flex items-center space-x-2 bg-blue-50 text-blue-700 border border-blue-200 px-4 py-1.5 rounded-full text-xs font-bold">
                    <i class="fas fa-user-shield"></i>
                    <span>የተማሪ ወላጅ መግቢያ</span>
                </div>
            </div>

            <p class="text-xs text-slate-500 text-center mb-4 leading-relaxed">
                ልጅዎን በት/ቤቱ ሲያስመዘግቡ የሰጡትን ስልክ ቁጥር ያስገቡ። የገዛ ልጅዎ መረጃ ብቻ ይከፈትልዎታል።
            </p>

            <form action="/parent/verify" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">ያስመዘገቡት ስልክ ቁጥር</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                            <i class="fas fa-phone text-xs"></i>
                        </span>
                        <input type="text" name="phone" placeholder="09xxxxxxxx" required value="0911000000"
                               class="w-full pl-9 pr-3 py-2.5 bg-slate-50 border rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <p class="text-[10px] text-slate-400 mt-1">ለመሞከር፡ <b class="text-indigo-600">0911000000</b> (ለዮናስ) ወይም <b class="text-indigo-600">0922000000</b> (ለሳራ)</p>
                </div>

                <button type="submit" class="w-full py-3 px-4 rounded-xl text-white font-bold text-sm bg-blue-600 hover:bg-blue-700 shadow-md transition">
                    የልጄን ደብተር ክፈት <i class="fas fa-arrow-right ml-1"></i>
                </button>
            </form>

        @elseif($role == 'teacher')
            <!-- TEACHER INFO -->
            <div class="flex items-center justify-center mb-4">
                <div class="flex items-center space-x-2 bg-emerald-50 text-emerald-700 border border-emerald-200 px-4 py-1.5 rounded-full text-xs font-bold">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>የመምህራን ክፍል</span>
                </div>
            </div>
            <div class="p-4 bg-emerald-50/60 rounded-xl border border-emerald-200 text-center text-xs text-emerald-900 mb-4">
                <i class="fas fa-info-circle text-emerald-600 text-base mb-1 block"></i>
                መምህራን ወደ ተመደቡበት ክፍል የሚገቡት በትምህርት ቤቱ አስተዳዳሪ በሚሰጣቸው <b>ልዩ ሊንክ (Access Link)</b> ብቻ ነው።
            </div>
            <a href="/teacher/entry?class=7-B&name=መምህር አለሙ ተሾመ" class="block text-center w-full py-2.5 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-xs transition">
                በተሰጠኝ ክፍል (7-B) ሊንክ ግባ
            </a>

        @else
            <!-- ADMIN LOGIN -->
            <div class="flex items-center justify-center mb-4">
                <div class="flex items-center space-x-2 bg-purple-50 text-purple-700 border border-purple-200 px-4 py-1.5 rounded-full text-xs font-bold">
                    <i class="fas fa-shield-alt"></i>
                    <span>የት/ቤት አስተዳደር</span>
                </div>
            </div>
            <form action="/dashboard/admin" method="GET" class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">የአድሚን ስልክ</label>
                    <input type="text" value="0900000000" class="w-full p-2.5 bg-slate-50 border rounded-xl text-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">የይለፍ ቃል</label>
                    <input type="password" value="••••••••" class="w-full p-2.5 bg-slate-50 border rounded-xl text-sm">
                </div>
                <button type="submit" class="w-full py-2.5 rounded-xl text-white font-bold text-xs bg-purple-600 hover:bg-purple-700 shadow transition">
                    እንደ አድሚን ግባ
                </button>
            </form>
        @endif

        <!-- Role Switcher -->
        <div class="mt-6 pt-4 border-t text-center text-xs text-slate-500">
            ሚና ለመቀየር፡
            <div class="flex justify-center gap-2 mt-2 font-medium">
                <a href="/login?role=parent" class="text-blue-600 hover:underline">ወላጅ</a> •
                <a href="/login?role=teacher" class="text-emerald-600 hover:underline">መምህር</a> •
                <a href="/login?role=admin" class="text-purple-600 hover:underline">አድሚን</a>
            </div>
        </div>
    </div>

    <!-- SPONSORED BANNER -->
    <div class="w-full max-w-md my-3">
        <div class="bg-gradient-to-r from-cyan-500 to-blue-600 rounded-xl p-3 text-white flex items-center justify-between shadow-sm">
            <div class="flex items-center space-x-2">
                <div class="p-2 bg-white/20 rounded-lg"><i class="fas fa-graduation-cap"></i></div>
                <div>
                    <p class="text-[11px] font-bold">የውጭ ሀገር የትምህርት እድል (Scholarships)</p>
                    <p class="text-[9px] text-blue-100">ለ 2025/26 ነፃ ምዝገባ ጀምሯል።</p>
                </div>
            </div>
            <a href="#" class="text-[10px] font-bold bg-white text-blue-600 px-2.5 py-1 rounded shadow">ይጎብኙ</a>
        </div>
    </div>

    <!-- FOOTER BY MELA SOLUTION -->
    <footer class="w-full max-w-md text-center text-xs text-slate-500 py-3 border-t bg-white/50 rounded-xl mb-2">
        <p class="font-bold text-slate-800">
            Powered by <span class="text-indigo-600 font-black">Mela Solution</span>
        </p>
        <p class="text-slate-600 font-medium flex items-center justify-center space-x-2 text-[11px] mt-0.5">
            <i class="fas fa-phone-alt text-emerald-600"></i>
            <span>ያግኙን፡</span>
            <a href="tel:0913064239" class="text-indigo-600 hover:underline font-bold">0913064239</a>
            <span>/</span>
            <a href="tel:0703064239" class="text-indigo-600 hover:underline font-bold">0703064239</a>
        </p>
    </footer>

</body>
</html>
