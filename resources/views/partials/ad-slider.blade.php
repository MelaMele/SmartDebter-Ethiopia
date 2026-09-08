@props(['target' => 'all', 'sliderId' => 'ad-slider-default'])

<!-- DYNAMIC MOVING AD CAROUSEL (አንቀሳቃሽ የማስታወቂያ ሰሌዳ) -->
<div id="{{ $sliderId }}" class="relative w-full overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm my-4">

    <!-- Slide Container -->
    <div class="slides-wrapper relative w-full h-[150px] sm:h-[130px]">

        <!-- SLIDE 1 (Default Live Ad) -->
        <div class="ad-slide absolute inset-0 transition-opacity duration-700 ease-in-out flex flex-col sm:flex-row items-center justify-between p-4 bg-gradient-to-r from-amber-500/10 via-orange-500/10 to-amber-500/10 border-2 border-dashed border-amber-300 rounded-2xl">
            <span class="absolute top-2 right-2 text-[9px] font-extrabold uppercase bg-amber-200 text-amber-900 px-2 py-0.5 rounded">ስፖንሰር የተደረገ</span>
            <div class="flex items-center space-x-3 w-full sm:w-auto">
                <img src="https://images.unsplash.com/photo-1544717305-2782549b5136?w=160&auto=format&fit=crop&q=60" 
                     class="w-16 h-16 rounded-xl object-cover shadow-sm shrink-0 border border-amber-200">
                <div class="text-left pr-12 sm:pr-0">
                    <h4 class="text-xs sm:text-sm font-bold text-slate-900 leading-tight">የትምህርት ቁሳቁሶች እና መጻሕፍት ታላቅ ቅናሽ!</h4>
                    <p class="text-[11px] text-slate-600 mt-1 line-clamp-2">ለአዲሱ የትምህርት ዘመን ለልጆት የሚሆኑ ደብተሮች፣ እስክሪብቶ እና ቦርሳዎችን በ 20% ቅናሽ ያግኙ።</p>
                </div>
            </div>
            <a href="tel:0913064239" class="mt-2 sm:mt-0 whitespace-nowrap text-xs font-bold text-white bg-amber-600 hover:bg-amber-700 px-3.5 py-1.5 rounded-lg shadow transition shrink-0">
                ዝርዝሩን እይ <i class="fas fa-arrow-right ml-1 text-[10px]"></i>
            </a>
        </div>

        <!-- SLIDE 2 (Moving Second Ad) -->
        <div class="ad-slide absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 pointer-events-none flex flex-col sm:flex-row items-center justify-between p-4 bg-gradient-to-r from-indigo-500/10 via-blue-500/10 to-indigo-500/10 border-2 border-dashed border-indigo-300 rounded-2xl">
            <span class="absolute top-2 right-2 text-[9px] font-extrabold uppercase bg-indigo-200 text-indigo-900 px-2 py-0.5 rounded">ስፖንሰር የተደረገ</span>
            <div class="flex items-center space-x-3 w-full sm:w-auto">
                <div class="w-16 h-16 rounded-xl bg-indigo-100 text-indigo-700 flex items-center justify-center text-2xl shrink-0">
                    <i class="fas fa-piggy-bank"></i>
                </div>
                <div class="text-left pr-12 sm:pr-0">
                    <h4 class="text-xs sm:text-sm font-bold text-slate-900 leading-tight">የልጆች የቁጠባ ሒሳብ በከፍተኛ ወለድ!</h4>
                    <p class="text-[11px] text-slate-600 mt-1 line-clamp-2">የልጆን የወደፊት ህይወት ዛሬውኑ ያቅዱ፤ ነፃ የመጀመሪያ የቁጠባ ደብተር ያግኙ።</p>
                </div>
            </div>
            <a href="tel:0913064239" class="mt-2 sm:mt-0 whitespace-nowrap text-xs font-bold text-white bg-indigo-600 hover:bg-indigo-700 px-3.5 py-1.5 rounded-lg shadow transition shrink-0">
                አሁኑኑ ይክፈቱ <i class="fas fa-arrow-right ml-1 text-[10px]"></i>
            </a>
        </div>

        <!-- SLIDE 3 (Self-Promo / Open Slot for Businesses) -->
        <div class="ad-slide absolute inset-0 transition-opacity duration-700 ease-in-out opacity-0 pointer-events-none flex flex-col sm:flex-row items-center justify-between p-4 bg-gradient-to-r from-emerald-500/10 via-teal-500/10 to-emerald-500/10 border-2 border-dashed border-emerald-300 rounded-2xl">
            <span class="absolute top-2 right-2 text-[9px] font-extrabold uppercase bg-emerald-200 text-emerald-900 px-2 py-0.5 rounded">ክፍት የማስታወቂያ ቦታ</span>
            <div class="flex items-center space-x-3 w-full sm:w-auto">
                <div class="w-16 h-16 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-2xl shrink-0">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <div class="text-left pr-12 sm:pr-0">
                    <h4 class="text-xs sm:text-sm font-bold text-slate-900 leading-tight">ድርጅትዎን በሺዎች ለሚቆጠሩ ወላጆች ያስተዋውቁ!</h4>
                    <p class="text-[11px] text-slate-600 mt-1 line-clamp-2">ይህንን የማስታወቂያ ሰሌዳ ለድርጅትዎ ለመከራየት አሁኑኑ በ 0913064239 ይደውሉ።</p>
                </div>
            </div>
            <a href="tel:0913064239" class="mt-2 sm:mt-0 whitespace-nowrap text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 px-3.5 py-1.5 rounded-lg shadow transition shrink-0">
                አሁኑኑ ይደውሉ <i class="fas fa-phone-alt ml-1 text-[10px]"></i>
            </a>
        </div>

    </div>

    <!-- Carousel Dots/Indicators -->
    <div class="absolute bottom-1.5 left-1/2 -translate-x-1/2 flex space-x-1.5 z-10">
        <span class="dot w-2 h-2 rounded-full bg-amber-600 transition"></span>
        <span class="dot w-2 h-2 rounded-full bg-slate-300 transition"></span>
        <span class="dot w-2 h-2 rounded-full bg-slate-300 transition"></span>
    </div>
</div>

<!-- Simple Script for Smooth Auto-Slide (በየ 4 ሰከንዱ ራሱ ይንሸራተታል) -->
<script>
    (function() {
        const slider = document.getElementById('{{ $sliderId }}');
        if (!slider) return;
        const slides = slider.querySelectorAll('.ad-slide');
        const dots = slider.querySelectorAll('.dot');
        let current = 0;

        function showNextSlide() {
            slides[current].classList.add('opacity-0', 'pointer-events-none');
            dots[current].classList.remove('bg-amber-600', 'bg-indigo-600', 'bg-emerald-600');
            dots[current].classList.add('bg-slate-300');

            current = (current + 1) % slides.length;

            slides[current].classList.remove('opacity-0', 'pointer-events-none');
            dots[current].classList.remove('bg-slate-300');
            dots[current].classList.add('bg-amber-600');
        }

        setInterval(showNextSlide, 4500); // በየ 4.5 ሰከንድ ይቀያየራል
    })();
</script>
