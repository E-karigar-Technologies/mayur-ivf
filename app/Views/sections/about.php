<?php
$credentials = [
    ['label' => 'MBBS', 'sub' => 'Bachelor of Medicine & Surgery'],
    ['label' => 'MS (OBG)', 'sub' => 'Obstetrics & Gynaecology'],
    ['label' => 'IVF Specialist', 'sub' => 'Assisted Reproductive Technology'],
    ['label' => '17+ Years', 'sub' => 'Clinical Experience'],
    ['label' => 'Reproductive Health', 'sub' => 'Complete Gynecological Care'],
    ['label' => 'Advanced Fertility', 'sub' => 'Personalized Treatment'],
];
?>

<section id="about" class="py-20 lg:py-28 bg-white">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">
            <!-- Image -->
            <div class="relative">
                <div class="rounded-[28px] overflow-hidden aspect-[3/4] max-w-[440px] bg-[#FCEAF2] shadow-sm">
                    <img
                        src="https://images.unsplash.com/photo-1758691463198-dc663b8a64e4?w=800&h=1067&fit=crop&auto=format"
                        alt="Dr. Meetu Bhushan in consultation"
                        class="w-full h-full object-cover"
                        loading="lazy"
                    />
                </div>
                <!-- Accent elements -->
                <div class="absolute -bottom-6 -right-6 w-36 h-36 bg-[#FFF4F8] rounded-[20px] -z-10"></div>
                <div class="absolute -top-4 -left-4 w-20 h-20 bg-[#FCEAF2] rounded-full -z-10"></div>
            </div>

            <!-- Content -->
            <div>
                <p class="text-[11px] font-semibold tracking-[2px] text-[#ED709E] uppercase mb-4">
                    Meet Dr. Meetu Bhushan
                </p>
                <h2 class="font-display text-[36px] lg:text-[44px] font-extrabold text-[#252525] leading-[1.1] tracking-[-1px] mb-6">
                    Expertise With a <span class="text-[#ED709E]">Human Touch</span>
                </h2>
                <p class="text-[16px] text-[#6F6F6F] leading-[1.75] mb-8">
                    Dr. Meetu Bhushan is an experienced IVF specialist, fertility consultant and gynecologist dedicated to helping individuals and couples navigate their fertility journey with clarity, compassion and personalized medical care.
                </p>

                <!-- Credentials grid -->
                <div class="grid grid-cols-2 gap-3 mb-8">
                    <?php foreach ($credentials as $c): ?>
                        <div class="flex items-start gap-3 bg-[#FFF4F8] rounded-xl p-3.5">
                            <div class="w-1.5 h-1.5 rounded-full bg-[#ED709E] mt-2 flex-shrink-0"></div>
                            <div>
                                <div class="font-display text-[13.5px] font-bold text-[#252525]"><?= esc($c['label']) ?></div>
                                <div class="text-[11.5px] text-[#6F6F6F]"><?= esc($c['sub']) ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <a
                    href="#contact"
                    class="inline-flex items-center gap-2 border-2 border-[#ED709E] text-[#ED709E] hover:bg-[#ED709E] hover:text-white text-[14px] font-semibold px-7 py-3 rounded-full transition-all duration-200 font-display"
                >
                    Know More About Dr. Meetu
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
