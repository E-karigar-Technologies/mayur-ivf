<?php
$steps = [
    [
        'num' => '01',
        'title' => 'Initial Consultation',
        'desc' => 'Understanding your medical history, fertility goals and treatment options in a warm, unhurried setting.',
    ],
    [
        'num' => '02',
        'title' => 'Fertility Assessment',
        'desc' => 'Recommended investigations and evaluation tailored to your individual reproductive profile.',
    ],
    [
        'num' => '03',
        'title' => 'Personalized Treatment Plan',
        'desc' => 'A treatment approach designed specifically around your circumstances, goals and medical findings.',
    ],
    [
        'num' => '04',
        'title' => 'IVF Treatment',
        'desc' => 'Carefully monitored fertility treatment using advanced reproductive techniques and close medical support.',
    ],
    [
        'num' => '05',
        'title' => 'Embryo Transfer',
        'desc' => 'The appropriate embryo transfer procedure following your treatment cycle, with ongoing clinical care.',
    ],
    [
        'num' => '06',
        'title' => 'Pregnancy Support',
        'desc' => 'Continued guidance, monitoring and support through the next stage of your journey toward parenthood.',
    ],
];
?>

<section id="ivf-journey" class="py-20 lg:py-28 bg-white">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-8">
        <div class="text-center mb-14">
            <p class="text-[11px] font-semibold tracking-[2px] text-[#ED709E] uppercase mb-4">The Process</p>
            <h2 class="font-display text-[36px] lg:text-[44px] font-extrabold text-[#252525] leading-[1.1] tracking-[-1px]">
                Your IVF Journey, <span class="text-[#ED709E]">Step by Step</span>
            </h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($steps as $i => $step): ?>
                <div class="relative group">
                    <div class="bg-[#FFF4F8] rounded-2xl p-7 h-full border border-transparent group-hover:border-[#FCEAF2] transition-all duration-300">
                        <div class="font-display text-[40px] font-extrabold text-[#ED709E] opacity-20 leading-none mb-4">
                            <?= esc($step['num']) ?>
                        </div>
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-8 h-8 rounded-full bg-[#ED709E] flex items-center justify-center text-white text-[12px] font-bold flex-shrink-0">
                                <?= esc($step['num']) ?>
                            </div>
                            <h3 class="font-display text-[16px] font-bold text-[#252525]">
                                <?= esc($step['title']) ?>
                            </h3>
                        </div>
                        <p class="text-[14px] text-[#6F6F6F] leading-[1.7]">
                            <?= esc($step['desc']) ?>
                        </p>
                    </div>
                    <?php if ($i % 3 !== 2 && $i < count($steps) - 1): ?>
                        <div class="hidden lg:block absolute top-10 -right-3 w-6 h-px bg-[#EDEDED] z-10"></div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
