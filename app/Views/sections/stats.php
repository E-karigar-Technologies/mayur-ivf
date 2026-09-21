<?php
$stats = [
    ['value' => '17+', 'label' => 'Years of Experience', 'sub' => 'Dedicated clinical practice in fertility medicine'],
    ['value' => 'IVF & Fertility', 'label' => 'Specialized Expertise', 'sub' => 'Advanced assisted reproductive technology'],
    ['value' => 'Personalized', 'label' => 'Care Plans', 'sub' => 'Every patient receives an individualized approach'],
    ['value' => 'Patient-Centered', 'label' => 'Approach', 'sub' => 'Compassionate guidance throughout your journey'],
];
?>

<section class="py-16 lg:py-20 bg-white border-y border-[#EDEDED]">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
            <?php foreach ($stats as $s): ?>
                <div class="text-center">
                    <div class="font-display text-[28px] lg:text-[36px] font-extrabold text-[#ED709E] leading-none mb-2">
                        <?= esc($s['value']) ?>
                    </div>
                    <div class="font-display text-[15px] font-bold text-[#252525] mb-1">
                        <?= esc($s['label']) ?>
                    </div>
                    <div class="text-[12px] text-[#6F6F6F] leading-[1.5]"><?= esc($s['sub']) ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
