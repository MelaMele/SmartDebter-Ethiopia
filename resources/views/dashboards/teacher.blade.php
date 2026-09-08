<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>የመምህራን ዳሽቦርድ | SmartDebter</title>

    <!-- PWA Settings -->
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#059669">

    <!-- Tailwind CSS & FontAwesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-100 font-sans min-h-screen pb-12">

    <!-- Top Header -->
    <header class="bg-white border-b shadow-sm sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold">
                    መ
                </div>
                <div>
                    <h2 class="text-sm font-bold text-slate-900 leading-tight">{{ $teacherName ?? 'መምህር አለሙ ተሾመ' }}</h2>
                    <p class="text-[11px] text-slate-500">የተመደቡበት ክፍል፡ <b class="text-emerald-700 font-bold">{{ $classCode ?? '7-B' }}</b></p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <a href="/login" class="text-xs bg-rose-50 text-rose-600 border border-rose-200 px-3 py-1.5 rounded-lg font-semibold hover:bg-rose-100 transition">
                    <i class="fas fa-sign-out-alt mr-1"></i>ውጣ
                </a>
            </div>
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-4 mt-6 space-y-6">

        <!-- 1. Quick Stats -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="bg-white p-4 rounded-2xl border shadow-xs">
                <p class="text-[11px] font-bold text-slate-500 uppercase">ተማሪዎች ብዛት</p>
                <h3 class="text-2xl font-black text-slate-900 mt-1">36</h3>
                <span class="text-[10px] text-emerald-600 font-medium">ክፍል {{ $classCode ?? '7-B' }}</span>
            </div>

            <div class="bg-white p-4 rounded-2xl border shadow-xs">
                <p class="text-[11px] font-bold text-slate-500 uppercase">የዛሬ የተላኩ</p>
                <h3 class="text-2xl font-black text-slate-900 mt-1">2</h3>
                <span class="text-[10px] text-indigo-600 font-medium">የቤት ስራ እና ማስታወሻ</span>
            </div>

            <div class="bg-white p-4 rounded-2xl border shadow-xs">
                <p class="text-[11px] font-bold text-slate-500 uppercase">የወላጅ ፊርማ ምጣኔ</p>
                <h3 class="text-2xl font-black text-emerald-600 mt-1">88%</h3>
                <span class="text-[10px] text-slate-500">32 ወላጆች ፈርመዋል</span>
            </div>

            <div class="bg-white p-4 rounded-2xl border shadow-xs">
                <p class="text-[11px] font-bold text-slate-500 uppercase">ያልፈረሙ ወላጆች</p>
                <h3 class="text-2xl font-black text-rose-500 mt-1">4</h3>
                <span class="text-[10px] text-rose-600 font-medium">ክትትል የሚሹ</span>
            </div>
        </div>

        <!-- 2. DYNAMIC MOVING AD CAROUSEL (አዲሱ አንቀሳቃሽ ሰሌዳ - ለመምህራን) -->
        @include('partials.ad-slider', ['sliderId' => 'teacher-slider'])

        <!-- 3. Post to Debter Form -->
        <div class="bg-white rounded-2xl border shadow-sm p-5 sm:p-6">
            <h3 class="text-base font-bold text-slate-900 mb-4 flex items-center">
                <i class="fas fa-edit text-emerald-600 mr-2"></i>
                ወደ ደብተር አዲስ መልእክት ይጻፉ (ክፍል {{ $classCode ?? '7-B' }})
            </h3>

            <form action="#" onsubmit="event.preventDefault(); alert('መልእክቱ ለወላጆች በተሳካ ሁኔታ ተልኳል!');" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">ተቀባይ</label>
                        <select class="w-full p-2.5 bg-slate-50 border rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option>ሙሉ ክፍል (ክፍል {{ $classCode ?? '7-B' }} - 36 ተማሪዎች)</option>
                            <option>ለተወሰነ ተማሪ ብቻ</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 uppercase mb-1">የመልእክቱ አይነት</label>
                        <select class="w-full p-2.5 bg-slate-50 border rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                            <option>📝 የቤት ስራ (Homework)</option>
                            <option>🌟 የስነ-ምግባር ማስታወሻ / ምስጋና</option>
                            <option>⚠️ አስቸኳይ ማስታወቂያ</option>
                            <option>📅 የቀን መገኘት (መቅረት/ማርፈድ)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">የመልእክቱ ርዕስ</label>
                    <input type="text" placeholder="ምሳሌ፡ የሂሳብ ምዕራፍ 3 መልመጃ" required
                           class="w-full p-2.5 bg-slate-50 border rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">የደብተሩ ዝርዝር መልእክት</label>
                    <textarea rows="3" placeholder="ለወላጆች የሚተላለፈውን መልእክት እዚህ ይጻፉ..." required
                              class="w-full p-2.5 bg-slate-50 border rounded-xl text-sm focus:ring-2 focus:ring-emerald-500 focus:outline-none"></textarea>
                </div>

                <div class="pt-2 flex justify-end">
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm shadow-md transition flex items-center space-x-2">
                        <i class="fas fa-paper-plane"></i>
