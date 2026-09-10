@props(['target' => 'all', 'sliderId' => 'ad-slider-default'])

<!-- DYNAMIC MOVING AD CAROUSEL (ሁለቱንም ቅርጾች የሚያስተናግድ አንቀሳቃሽ ሰሌዳ) -->
<div id="{{ $sliderId }}" class="relative w-full overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm my-4">

    <div class="slides-wrapper relative w-full h-[150px] sm:h-[135px]">

        <!-- SLIDE 1: ሙሉ ግራፊክስ ባነር/ፖስተር (Full Graphic Banner - ለባንኮችና ትልልቅ ድርጅቶች) -->
        <div class="ad-slide absolute inset-0 transition-opacity duration-700 ease-in-out">
            <a href="https://www.bankofabyssinia.com" target="_blank" class="block w-full h-full relative group">
                <!-- ድርጅቱ በራሱ ያዘጋጀው ሙሉ ፖስተር -->
                <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?w=1000&auto=format&fit=crop&q=80" 
                     alt="Full Graphic Ad" 
                     class="w-full h-full object-cover rounded-2xl brightness-95 group-hover:brightness-100 transition">
                
                <span class="absolute top-2 right-2 text-[9px] font-extrabold uppercase bg-black/60 text-white px-2 py-0.5 rounded backdrop-blur-xs shadow">
                    ስፖንሰር የተደረገ
                </span>

                <!-- ጥግ ላይ ያለች አጭር የድርጅቱ መጠሪያ ባጅ -->
                <div class="absolute bottom-2 left-2 bg-black/70 text-white px-2.5 py-1 rounded-lg text-[10px] font-bold backdrop-blur-xs flex items-center space-x-1">
                    <span>አቢሲንያ ባንክ • ይጎብኙ</span>
                    <i class="fas fa-external-link-alt text-[8px] ml-1"></i>
                </div>
            </a>
        </div>

        <!-- SLIDE 2: መደበኛ ቴምፕሌት (ጽሁፍ + ምስል + አዝራር - ለትናንሽ ድርጅቶች) -->
        <div class="ad-slide absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 pointer-events-none flex flex-col sm:flex-row items-center justify-between p-4 bg-gradient-to-r from-purple-500/10 via-indigo-500/10 to-purple-500/10 border-2 border-dashed border-purple-300 rounded-2xl">
            <span class="absolute top-2 right-2 text-[9px] font-extrabold uppercase bg-purple-200 text-purple-900 px-2 py-0.5 rounded">ስፖንሰር የተደረገ</span>
            <div class="flex items-center space-x-3 w-full sm:w-auto">
                <div class="w-16 h-16 rounded-xl bg-purple-100 text-purple-700 flex items-center justify-center text-2xl shrink-0">
                    <i class="fas fa-book-reader"></i>
                </div>
                <div class="text-left pr-12 sm:pr-0">
                    <h4 class="text-xs sm:text-sm font-bold text-slate-900 leading-tight">የትምህርት ቁሳቁሶች እና ደብተሮች ጅምላ አቅራቢ!</h4>
                    <p class="text-[11px] text-slate-600 mt-1 line-clamp-2">ለአዲሱ የትምህርት ዘመን ጥራት ያላቸውን ደብተሮችና እስክሪብቶ በታላቅ ቅናሽ ይዘዙ።</p>
                </div>
            </div>
            <a href="tel:0913064239" class="mt-2 sm:mt-0 whitespace-nowrap text-xs font-bold text-white bg-purple-600 hover:bg-purple-700 px-3.5 py-1.5 rounded-lg shadow transition shrink-0">
                አሁኑኑ ይዘዙ <i class="fas fa-phone-alt ml-1 text-[10px]"></i>
            </a>
        </div>

        <!-- SLIDE 3: ክፍት የማስታወቂያ ቦታ (ለ Mela Solution ማስታወቂያ ጥሪ) -->
        <div class="ad-slide absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 pointer-events-none flex flex-col sm:flex-row items-center justify-between p-4 bg-gradient-to-r from-emerald-500/10 via-teal-500/10 to-emerald-500/10 border-2 border-dashed border-emerald-300 rounded-2xl">
            <span class="absolute top-2 right-2 text-[9px] font-extrabold uppercase bg-emerald-200 text-emerald-900 px-2 py-0.5 rounded">ክፍት የማስታወቂያ ቦታ</span>
            <div class="flex items-center space-x-3 w-full sm:w-auto">
                <div class="w-16 h-16 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-2xl shrink-0">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <div class="text-left pr-12 sm:pr-0">
                    <h4 class="text-xs sm:text-sm font-bold text-slate-900 leading-tight">ድርጅትዎን በሺዎች ለሚቆጠሩ ወላጆች ያስተዋውቁ!</h4>
                    <p class="text-[11px] text-slate-600 mt-1 line-clamp-2">የራስዎን ፖስተር ወይም ባነር እዚህ ሰሌዳ ላይ ለመለጠፍ በ 0913064239 ይደውሉ።</p>
                </div>
            </div>
            <a href="tel:0913064239" class="mt-2 sm:mt-0 whitespace-nowrap text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 px-3.5 py-1.5 rounded-lg shadow transition shrink-0">
                አሁኑኑ ይደውሉ <i class="fas fa-phone-alt ml-1 text-[10px]"></i>
            </a>
        </div>

    </div>

    <!-- Dots/Indicators -->
    <div class="absolute bottom-1.5 left-1/2 -translate-x-1/2 flex space-x-1.5 z-10">
        <span class="dot w-2 h-2 rounded-full bg-slate-900 transition"></span>
        <span class="dot w-2 h-2 rounded-full bg-slate-300 transition"></span>
        <span class="dot w-2 h-2 rounded-full bg-slate-300 transition"></span>
    </div>
</div>

<script>
    (function() {
        const slider = document.getElementById('{{ $sliderId }}');
        if (!slider) return;
        const slides = slider.querySelectorAll('.ad-slide');
        const dots = slider.querySelectorAll('.dot');
        let current = 0;

        function showNextSlide() {
            slides[current].classList.add('opacity-0', 'pointer-events-none');
            dots[current].classList.remove('bg-slate-900');
            dots[current].classList.add('bg-slate-300');

            current = (current + 1) % slides.length;

            slides[current].classList.remove('opacity-0', 'pointer-events-none');
            dots[current].classList.remove('bg-slate-300');
            dots[current].classList.add('bg-slate-900');
        }

        setInterval(showNextSlide, 4500);
    })();
</script>
