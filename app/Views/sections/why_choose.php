<?php
$features = [
    [
        'icon' => '✦',
        'title' => 'Personalized Treatment',
        'desc' => 'Every fertility plan is designed specifically for you — not a template, but a tailored medical strategy.',
    ],
    [
        'icon' => '✦',
        'title' => 'Experienced Specialist',
        'desc' => '17+ years of clinical expertise in IVF and reproductive medicine across complex fertility cases.',
    ],
    [
        'icon' => '✦',
        'title' => 'Advanced IVF Care',
        'desc' => 'Access to modern reproductive technologies combined with careful, evidence-based clinical judgment.',
    ],
    [
        'icon' => '✦',
        'title' => 'Transparent Guidance',
        'desc' => 'Clear communication at every step — so you always understand your options and what to expect.',
    ],
    [
        'icon' => '✦',
        'title' => 'Compassionate Support',
        'desc' => 'Fertility journeys are emotional. Dr. Meetu provides the warmth and encouragement you deserve.',
    ],
    [
        'icon' => '✦',
        'title' => 'Complete Fertility Journey',
        'desc' => 'From initial consultation through pregnancy support, comprehensive care under one specialist.',
    ],
];
?>

<section class="py-20 lg:py-28 bg-[#FFF4F8]">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">
            <!-- Content -->
            <div>
                <p class="text-[11px] font-semibold tracking-[2px] text-[#ED709E] uppercase mb-4">Why Choose Us</p>
                <h2 class="font-display text-[36px] lg:text-[44px] font-extrabold text-[#252525] leading-[1.1] tracking-[-1px] mb-10">
                    Why Patients Choose <span class="text-[#ED709E]">Dr. Meetu</span>
                </h2>

                <div class="grid sm:grid-cols-2 gap-5">
                    <?php foreach ($features as $f): ?>
                        <div class="bg-white rounded-xl p-5 border border-[#EDEDED] shadow-xs">
                            <div class="text-[#ED709E] text-[10px] mb-3"><?= esc($f['icon']) ?></div>
                            <h3 class="font-display text-[15px] font-bold text-[#252525] mb-1.5">
                                <?= esc($f['title']) ?>
                            </h3>
                            <p class="text-[13px] text-[#6F6F6F] leading-[1.6]"><?= esc($f['desc']) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Image -->
            <div class="relative">
                <div class="rounded-[28px] overflow-hidden aspect-[3/4] bg-[#FCEAF2] shadow-sm">
                    <img
                        src="https://images.unsplash.com/photo-1758691462878-6edc3d3da1be?w=800&h=1067&fit=crop&auto=format"
                        alt="Dr. Meetu Bhushan consulting with patient"
                        class="w-full h-full object-cover"
                        loading="lazy"
                    />
                </div>
                <div class="absolute -bottom-5 -left-5 w-28 h-28 bg-[#FCEAF2] rounded-2xl -z-10"></div>
            </div>
        </div>
    </div>
</section>
