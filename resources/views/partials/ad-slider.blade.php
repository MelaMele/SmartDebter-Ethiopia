@props(['sliderId' => 'ad-slider-default'])

@php
    // ከ Clever Cloud MySQL በቀጥታ ንቁ ማስታወቂያዎችን ብቻ ያወጣል
    try {
        $dbAds = \Illuminate\Support\Facades\DB::table('advertisements')
            ->where('is_active', true)
            ->orderBy('id', 'desc')
            ->get();
    } catch (\Exception $e) {
        $dbAds = collect();
    }
@endphp

<!-- DYNAMIC MOVING AD CAROUSEL (ከ Clever Cloud ዳታቤዝ ብቻ የሚያነብ) -->
<div id="{{ $sliderId }}" class="relative w-full overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm my-4">

    <div class="slides-wrapper relative w-full h-[150px] sm:h-[135px]">

        @if($dbAds->count() > 0)
            <!-- ዳታቤዝ ውስጥ የተሰቀሉ እውነተኛ ማስታወቂያዎች ብቻ ይወጣሉ -->
            @foreach($dbAds as $index => $ad)
                <div class="ad-slide absolute inset-0 transition-opacity duration-700 ease-in-out {{ $index == 0 ? '' : 'opacity-0 pointer-events-none' }}">
                    <a href="{{ $ad->target_url ?? '#' }}" target="_blank" class="block w-full h-full relative group">
                        
                        <!-- የተሰቀለው እውነተኛ ፎቶ -->
                        <img src="{{ $ad->image_url }}" 
                             alt="{{ $ad->company_name }}" 
                             class="w-full h-full object-cover rounded-2xl brightness-95 group-hover:brightness-100 transition">
                        
                        <span class="absolute top-2 right-2 text-[9px] font-extrabold uppercase bg-black/60 text-white px-2 py-0.5 rounded backdrop-blur-xs shadow">
                            ስፖንሰር የተደረገ
                        </span>

                        <div class="absolute bottom-2 left-2 bg-black/75 text-white px-3 py-1 rounded-lg text-xs font-bold backdrop-blur-xs flex items-center space-x-1.5 shadow">
                            <span>{{ $ad->company_name }}</span>
                            <i class="fas fa-external-link-alt text-[9px] text-amber-400"></i>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <!-- ምንም ማስታወቂያ ካልተሰቀለ የሚታይ ክፍት ሰሌዳ -->
            <div class="ad-slide absolute inset-0 flex flex-col sm:flex-row items-center justify-between p-4 bg-gradient-to-r from-emerald-500/10 via-teal-500/10 to-emerald-500/10 border-2 border-dashed border-emerald-300 rounded-2xl">
                <span class="absolute top-2 right-2 text-[9px] font-extrabold uppercase bg-emerald-200 text-emerald-900 px-2 py-0.5 rounded">ክፍት የማስታወቂያ ቦታ</span>
                <div class="flex items-center space-x-3 w-full sm:w-auto">
                    <div class="w-14 h-14 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center text-2xl shrink-0">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <div class="text-left pr-12 sm:pr-0">
                        <h4 class="text-xs sm:text-sm font-bold text-slate-900 leading-tight">ድርጅትዎን በሺዎች ለሚቆጠሩ ወላጆች ያስተዋውቁ!</h4>
                        <p class="text-[11px] text-slate-600 mt-1">የራስዎን ፖስተር ወይም ባነር እዚህ ሰሌዳ ላይ ለመለጠፍ በ 0913064239 ይደውሉ።</p>
                    </div>
                </div>
                <a href="tel:0913064239" class="mt-2 sm:mt-0 whitespace-nowrap text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 px-4 py-2 rounded-xl shadow transition shrink-0">
                    አሁኑኑ ይደውሉ <i class="fas fa-phone-alt ml-1 text-[10px]"></i>
                </a>
            </div>
        @endif

    </div>

    <!-- Dots (ከ 1 በላይ ማስታወቂያ ሲኖር ብቻ ይታያሉ) -->
    @if($dbAds->count() > 1)
        <div class="absolute bottom-1.5 left-1/2 -translate-x-1/2 flex space-x-1.5 z-10">
            @foreach($dbAds as $i => $ad)
                <span class="dot w-2 h-2 rounded-full {{ $i == 0 ? 'bg-amber-500' : 'bg-slate-300' }} transition"></span>
            @endforeach
        </div>
    @endif
</div>

@if($dbAds->count() > 1)
<script>
    (function() {
        const slider = document.getElementById('{{ $sliderId }}');
        if (!slider) return;
        const slides = slider.querySelectorAll('.ad-slide');
        const dots = slider.querySelectorAll('.dot');
        let current = 0;

        function showNextSlide() {
            slides[current].classList.add('opacity-0', 'pointer-events-none');
            if (dots.length > 0) {
                dots[current].classList.remove('bg-amber-500');
                dots[current].classList.add('bg-slate-300');
            }

            current = (current + 1) % slides.length;

            slides[current].classList.remove('opacity-0', 'pointer-events-none');
            if (dots.length > 0) {
                dots[current].classList.remove('bg-slate-300');
                dots[current].classList.add('bg-amber-500');
            }
        }

        setInterval(showNextSlide, 4500);
    })();
</script>
@endif
