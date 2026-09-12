<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>መግቢያ በር | SmartDebter Ethiopia</title>
    
    <!-- PWA Settings -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#4f46e5">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-100 min-h-screen flex flex-col justify-between items-center p-4">

    @php
        $role = request('role', 'parent');
        $schoolName = request('school_name', '');
        $schoolCode = request('school', '');
    @endphp

    <!-- Top Header -->
    <div class="w-full max-w-md text-center mt-4 mb-2">
        <a href="/" class="inline-flex items-center space-x-2 text-indigo-600 hover:text-indigo-800 transition mb-2">
            <i class="fas fa-arrow-left text-sm"></i>
            <span class="text-xs font-semibold">ወደ መነሻ ገጽ ተመለስ</span>
        </a>

        @if($schoolName)
            <div class="bg-white p-3 rounded-2xl border shadow-xs mb-3 flex items-center justify-center space-x-2">
                <div class="w-8 h-8 rounded-xl bg-purple-100 text-purple-700 flex items-center justify-center text-sm font-bold">
                    <i class="fas fa-school"></i>
                </div>
                <div class="text-left">
                    <h2 class="text-sm font-black text-slate-900 leading-tight">{{ $schoolName }}</h2>
                    <p class="text-[10px] text-purple-700 font-mono font-bold">{{ $schoolCode }}</p>
                </div>
            </div>
        @else
            <h1 class="text-2xl font-black text-slate-800">SmartDebter</h1>
            <p class="text-xs text-slate-500 font-medium">የተጠቃሚ መግቢያ በር (Portal Login)</p>
        @endif
    </div>

    <!-- Login Box -->
    <div class="w-full max-w-md bg-white rounded-2xl shadow-sm border p-6 sm:p-8 my-auto">

        <!-- Error Alert -->
        @if (session('error'))
            <div class="mb-4 p-3 bg-rose-50 border border-rose-200 text-rose-700 text-xs rounded-xl flex items-start space-x-2">
                <i class="fas fa-exclamation-circle text-sm mt-0.5 shrink-0"></i>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @if($role == 'parent')
            <!-- PARENT LOGIN (ምንም የውሸት ስልክ ቁጥር የለም) -->
            <div class="flex items-center justify-center mb-4">
                <div class="flex items-center space-x-2 bg-blue-50 text-blue-700 border border-blue-200 px-4 py-1.5 rounded-full text-xs font-bold">
                    <i class="fas fa-user-shield"></i>
                    <span>የተማሪ ወላጅ መግቢያ (Parent Portal)</span>
                </div>
            </div>

            <p class="text-xs text-slate-500 text-center mb-5 leading-relaxed">
                በትምህርት ቤቱ ያስመዘገቡትን ስልክ ቁጥር እና የልጅዎን የተማሪ መለያ ቁጥር (Student ID) ያስገቡ።
            </p>

            <form action="/parent/verify" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" name="school_code" value="{{ $schoolCode }}">

                <!-- 1. Phone Number -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">
                        የወላጅ ስልክ ቁጥር (Username)
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                            <i class="fas fa-phone text-xs"></i>
                        </span>
                        <input type="text" name="phone" placeholder="09xxxxxxxx" required
                               class="w-full pl-9 pr-3 py-2.5 bg-slate-50 border rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 font-medium">
                    </div>
                </div>

                <!-- 2. Student ID Code -->
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">
                        የተማሪው መለያ ቁጥር (Student ID / Password)
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                            <i class="fas fa-id-card text-xs"></i>
                        </span>
                        <input type="text" name="student_code" placeholder="ምሳሌ፡ 1001" required
                               class="w-full pl-9 pr-3 py-2.5 bg-slate-50 border rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 font-bold text-blue-900 uppercase">
                    </div>
                    <p class="text-[10px] text-slate-400 mt-1">
                        <i class="fas fa-info-circle text-blue-500 mr-0.5"></i>የይለፍ ቃል፡ የልጅዎ የት/ቤት ባጅ ወይም ደረሰኝ ላይ ያለው የተማሪ መለያ ቁጥር (ID) ነው።
                    </p>
                </div>

                <button type="submit" class="w-full py-3 px-4 rounded-xl text-white font-bold text-sm bg-blue-600 hover:bg-blue-700 shadow-md transition flex items-center justify-center space-x-2">
                    <span>የልጄን ደብተር ክፈት</span>
                    <i class="fas fa-arrow-right text-xs"></i>
                </button>
            </form>

        @elseif($role == 'teacher')
            <!-- TEACHER LOGIN INFO -->
            <div class="flex items-center justify-center mb-4">
                <div class="flex items-center space-x-2 bg-emerald-50 text-emerald-700 border border-emerald-200 px-4 py-1.5 rounded-full text-xs font-bold">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>የመምህራን ክፍል</span>
                </div>
            </div>
            <div class="p-4 bg-emerald-50/60 rounded-xl border border-emerald-200 text-center text-xs text-emerald-900 mb-4 leading-relaxed">
                <i class="fas fa-info-circle text-emerald-600 text-base mb-1 block"></i>
                መምህራን ወደ ተመደቡበት ክፍል የሚገቡት በዲቪዥን ተጠሪያቸው በሚሰጣቸው **ልዩ ሊንክ** ብቻ ነው።
            </div>
            <a href="/teacher/entry?class=ክፍል+7-B&name=የክፍል+ኃላፊ+መምህር" class="block text-center w-full py-2.5 px-4 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-xs transition">
                በክፍል ሊንክ ግባ
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
                <input type="hidden" name="school" value="{{ $schoolCode }}">
                <input type="hidden" name="school_name" value="{{ $schoolName }}">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">የአድሚን ስልክ</label>
                    <input type="text" placeholder="09xxxxxxxx" required class="w-full p-2.5 bg-slate-50 border rounded-xl text-sm">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">የይለፍ ቃል</label>
                    <input type="password" placeholder="••••••••" required class="w-full p-2.5 bg-slate-50 border rounded-xl text-sm">
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
                <a href="/login?role=parent&school={{ $schoolCode }}&school_name={{ urlencode($schoolName) }}" class="text-blue-600 hover:underline">ወላጅ</a> •
                <a href="/login?role=teacher" class="text-emerald-600 hover:underline">መምህር</a> •
                <a href="/login?role=admin&school={{ $schoolCode }}&school_name={{ urlencode($schoolName) }}" class="text-purple-600 hover:underline">አድሚን</a>
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
                    <p class="text-[9px] text-blue-100">ለ 2019 ዓ.ም ነፃ ምዝገባ ጀምሯል።</p>
                </div>
            </div>
            <a href="tel:0913064239" class="text-[10px] font-bold bg-white text-blue-600 px-2.5 py-1 rounded shadow">ይጎብኙ</a>
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
