<?php
$faqs = [
    [
        'q' => 'When should I consult a fertility specialist?',
        'a' => 'If you have been trying to conceive for 12 months (or 6 months if you are over 35), or if you have known conditions that may affect fertility such as PCOS, endometriosis or irregular cycles, consulting a specialist early can be beneficial.',
    ],
    [
        'q' => 'What fertility tests may be recommended?',
        'a' => 'Fertility assessment typically includes hormonal blood tests, an ultrasound scan, and a semen analysis for your partner. Further investigations may be recommended based on your individual circumstances.',
    ],
    [
        'q' => 'What is IVF?',
        'a' => 'In vitro fertilization (IVF) is an assisted reproductive technique in which eggs are collected from the ovaries, fertilized in a laboratory setting, and the resulting embryo is transferred into the uterus.',
    ],
    [
        'q' => 'Who may benefit from IVF?',
        'a' => 'IVF may be recommended for couples with tubal factor infertility, male factor infertility, unexplained infertility, endometriosis, or after unsuccessful simpler treatments such as IUI.',
    ],
    [
        'q' => 'How long does an IVF cycle take?',
        'a' => 'An IVF cycle typically takes around 4–6 weeks from the start of stimulation to the embryo transfer. The exact timeline varies depending on individual treatment protocols.',
    ],
    [
        'q' => 'Is IVF treatment painful?',
        'a' => 'Most patients find IVF manageable. The injections are mild, and the egg retrieval procedure is carried out under sedation. Some discomfort or bloating is possible during stimulation, and our team will guide you throughout.',
    ],
    [
        'q' => 'What factors affect fertility?',
        'a' => 'Fertility can be affected by age, hormonal conditions, structural issues, sperm health, lifestyle factors, and general health. A thorough assessment helps identify contributing factors.',
    ],
    [
        'q' => 'When should couples consider fertility preservation?',
        'a' => 'Fertility preservation is worth considering if you wish to delay parenthood, are facing medical treatment that may affect fertility, or have a family history of early menopause.',
    ],
    [
        'q' => 'What should I expect during my first consultation?',
        'a' => 'Your first visit is an opportunity to discuss your medical history, fertility concerns and goals. Dr. Meetu will listen carefully and recommend appropriate next steps for your evaluation.',
    ],
];
?>

<section class="py-20 lg:py-28 bg-[#FFF4F8]">
    <div class="max-w-[900px] mx-auto px-6 lg:px-8">
        <div class="text-center mb-12">
            <p class="text-[11px] font-semibold tracking-[2px] text-[#ED709E] uppercase mb-4">Questions</p>
            <h2 class="font-display text-[36px] lg:text-[44px] font-extrabold text-[#252525] leading-[1.1] tracking-[-1px]">
                Frequently Asked Questions
            </h2>
        </div>

        <div class="space-y-3">
            <?php foreach ($faqs as $i => $faq): ?>
                <div class="accordion-item bg-white rounded-xl border border-[#EDEDED] overflow-hidden transition-all duration-200">
                    <button
                        type="button"
                        class="accordion-btn w-full text-left flex items-center justify-between gap-4 px-6 py-5 focus:outline-none"
                    >
                        <span class="font-display text-[15px] font-semibold text-[#252525] pr-4">
                            <?= esc($faq['q']) ?>
                        </span>
                        <span class="accordion-icon flex-shrink-0 w-7 h-7 rounded-full border border-[#EDEDED] flex items-center justify-center transition-all duration-300 bg-white">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" class="transition-transform duration-300 stroke-[#6F6F6F]">
                                <path d="M2 4l4 4 4-4" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </button>
                    <div class="accordion-content">
                        <div class="px-6 pb-5 pt-1">
                            <p class="text-[14px] text-[#6F6F6F] leading-[1.75]"><?= esc($faq['a']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
