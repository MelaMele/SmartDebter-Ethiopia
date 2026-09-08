<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>መግቢያ | SmartDebter Ethiopia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-100 min-h-screen flex flex-col justify-between items-center p-4">

    <!-- Top Header -->
    <div class="w-full max-w-md text-center mt-6 mb-4">
        <a href="/" class="inline-flex items-center space-x-2 text-indigo-600 hover:text-indigo-800 transition mb-2">
            <i class="fas fa-arrow-left text-sm"></i>
            <span class="text-xs font-semibold">ወደ መነሻ ተመለስ</span>
        </a>
        <h1 class="text-2xl font-black text-slate-800">SmartDebter</h1>
        <p class="text-xs text-slate-500 font-medium">የተጠቃሚ መግቢያ በር (Portal Login)</p>
    </div>

    <!-- Login Box -->
    <div class="w-full max-w-md bg-white rounded-2xl shadow-sm border p-6 sm:p-8">
        @php
            $role = request('role', 'parent');
            $roleNames = [
                'parent' => ['title' => 'የወላጅ መግቢያ', 'color' => 'blue', 'icon' => 'fa-user-friends', 'target' => '/dashboard/parent'],
                'teacher' => ['title' => 'የመምህራን መግቢያ', 'color' => 'emerald', 'icon' => 'fa-chalkboard-teacher', 'target' => '/dashboard/teacher'],
                'admin' => ['title' => 'የት/ቤት አስተዳደር', 'color' => 'purple', 'icon' => 'fa-shield-alt', 'target' => '/dashboard/admin']
            ];
            $currentRole = $roleNames[$role] ?? $roleNames['parent'];
        @endphp

        <!-- Role Badge -->
        <div class="flex items-center justify-center mb-6">
            <div class="flex items-center space-x-2 bg-{{ $currentRole['color'] }}-50 text-{{ $currentRole['color'] }}-700 border border-{{ $currentRole['color'] }}-200 px-4 py-1.5 rounded-full text-xs font-bold">
                <i class="fas {{ $currentRole['icon'] }}"></i>
                <span>{{ $currentRole['title'] }}</span>
            </div>
        </div>

        <form action="{{ $currentRole['target'] }}" method="GET" class="space-y-4">
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">ስልክ ቁጥር</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                        <i class="fas fa-phone text-xs"></i>
                    </span>
                    <input type="text" placeholder="09xxxxxxxx" required value="0911000000"
                           class="w-full pl-9 pr-3 py-2.5 bg-slate-50 border rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">የይለፍ ቃል (Password)</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                        <i class="fas fa-lock text-xs"></i>
                    </span>
                    <input type="password" placeholder="••••••••" required value="123456"
                           class="w-full pl-9 pr-3 py-2.5 bg-slate-50 border rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
            </div>

            <div class="flex items-center justify-between text-xs pt-1">
                <label class="flex items-center text-slate-600">
                    <input type="checkbox" checked class="rounded border-slate-300 text-indigo-600 mr-1.5"> አስታውሰኝ
                </label>
                <a href="#" class="text-indigo-600 hover:underline">ይለፍ ቃል ረሱ?</a>
            </div>

            <button type="submit" class="w-full py-3 px-4 rounded-xl text-white font-bold text-sm bg-indigo-600 hover:bg-indigo-700 shadow-md hover:shadow-lg transition">
                ይግቡ (Login)
            </button>
        </form>

        <!-- Role Switcher -->
        <div class="mt-6 pt-4 border-t text-center text-xs text-slate-500">
            ሚና መቀየር ይፈልጋሉ?
            <div class="flex justify-center gap-2 mt-2 font-medium">
                <a href="/login?role=parent" class="text-blue-600 hover:underline">ወላጅ</a> •
                <a href="/login?role=teacher" class="text-emerald-600 hover:underline">መምህር</a> •
                <a href="/login?role=admin" class="text-purple-600 hover:underline">አድሚን</a>
            </div>
        </div>
    </div>

    <!-- 2. LOGIN PAGE SPONSORED BANNER (በመግቢያ ገጽ ላይ የሚለጠፍ ማስታወቂያ) -->
    <div class="w-full max-w-md my-4">
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

    <footer class="text-center text-xs text-slate-400 py-3">
        © 2025 SmartDebter Ethiopia | Mela Solution
    </footer>

</body>
</html>
