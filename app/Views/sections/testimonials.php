<?php
$testimonials = [
    [
        'quote' => 'After years of trying, we finally found the guidance and support we needed. Dr. Meetu made every step feel clear and manageable. We are forever grateful.',
        'label' => 'IVF Patient',
        'tag' => 'Successful IVF Journey',
    ],
    [
        'quote' => "Dr. Meetu's patience and compassion through our fertility journey was unlike anything we had experienced before. She truly cared about our wellbeing, not just our treatment.",
        'label' => 'Fertility Consultation Patient',
        'tag' => 'Personalized Care',
    ],
    [
        'quote' => 'From the first consultation, we felt heard and understood. The entire experience with Dr. Meetu was professional, warm and deeply reassuring.',
        'label' => 'IVF Patient',
        'tag' => 'First Consultation',
    ],
    [
        'quote' => 'We had many questions and concerns before beginning IVF. Dr. Meetu walked us through everything with such clarity. We trusted her completely.',
        'label' => 'Fertility Patient',
        'tag' => 'IVF Guidance',
    ],
];
?>

<section id="testimonials" class="py-20 lg:py-28 bg-white">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-8">
        <div class="text-center mb-14">
            <p class="text-[11px] font-semibold tracking-[2px] text-[#ED709E] uppercase mb-4">Patient Stories</p>
            <h2 class="font-display text-[36px] lg:text-[44px] font-extrabold text-[#252525] leading-[1.1] tracking-[-1px]">
                Stories of <span class="text-[#ED709E]">Hope</span>
            </h2>
            <p class="text-[13px] text-[#6F6F6F] mt-3 italic">
                Real experiences and stories from patients who completed their fertility journey with us.
            </p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <?php foreach ($testimonials as $t): ?>
                <div class="bg-[#FFF4F8] rounded-2xl p-6 border border-[#EDEDED] flex flex-col hover:border-[#ED709E] transition-colors">
                    <div class="text-[36px] text-[#ED709E] font-serif leading-none mb-4 opacity-60">"</div>
                    <p class="text-[14px] text-[#252525] leading-[1.7] flex-1 mb-5"><?= esc($t['quote']) ?></p>
                    <div class="pt-4 border-t border-[#EDEDED]">
                        <div class="font-display text-[13px] font-semibold text-[#252525]">
                            — <?= esc($t['label']) ?>
                        </div>
                        <div class="inline-block mt-2 text-[11px] font-semibold text-[#ED709E] bg-white px-3 py-1 rounded-full border border-[#FCEAF2]">
                            <?= esc($t['tag']) ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Supporting banner image -->
        <div class="mt-12 rounded-[24px] overflow-hidden h-[280px] lg:h-[360px] bg-[#FCEAF2] shadow-xs">
            <img
                src="https://images.unsplash.com/photo-1528218635780-5952720c9729?w=1400&h=400&fit=crop&auto=format"
                alt="Couple celebrating pregnancy journey"
                class="w-full h-full object-cover object-center"
                loading="lazy"
            />
        </div>
    </div>
</section>
