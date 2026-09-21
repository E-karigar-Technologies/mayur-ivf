<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<article class="pt-[110px] pb-20 bg-white">
    <div class="max-w-[960px] mx-auto px-6 lg:px-8">
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 text-[13px] text-[#6F6F6F] mb-8 font-display">
            <a href="<?= base_url('/') ?>" class="hover:text-[#ED709E] transition-colors">Home</a>
            <span>/</span>
            <a href="<?= base_url('blog') ?>" class="hover:text-[#ED709E] transition-colors">Blog</a>
            <span>/</span>
            <span class="text-[#252525] font-semibold truncate max-w-[280px] sm:max-w-none"><?= esc($article['title']) ?></span>
        </nav>

        <!-- Article Header -->
        <div class="mb-8">
            <div class="inline-block text-[11px] font-bold tracking-[1px] uppercase text-[#ED709E] bg-[#FFF4F8] px-3.5 py-1 rounded-full border border-[#FCEAF2] mb-4">
                <?= esc($article['category']) ?>
            </div>
            <h1 class="font-display text-[32px] sm:text-[42px] font-extrabold text-[#252525] leading-[1.18] tracking-[-1px] mb-6">
                <?= esc($article['title']) ?>
            </h1>

            <div class="flex flex-wrap items-center justify-between gap-4 py-4 border-y border-[#EDEDED] text-[13.5px] text-[#6F6F6F]">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-[#ED709E] text-white flex items-center justify-center font-bold font-display text-[14px]">
                        MB
                    </div>
                    <div>
                        <div class="font-display font-bold text-[#252525]"><?= esc($article['author']) ?></div>
                        <div class="text-[12px] text-[#ED709E]">IVF Specialist · Fertility Consultant</div>
                    </div>
                </div>
                <div class="flex items-center gap-4 text-[12.5px]">
                    <span><?= esc($article['date']) ?></span>
                    <span>•</span>
                    <span><?= esc($article['read_time']) ?></span>
                </div>
            </div>
        </div>

        <!-- Featured Image -->
        <div class="rounded-[24px] overflow-hidden aspect-[16/9] bg-[#FCEAF2] mb-12 shadow-sm border border-[#EDEDED]">
            <img
                src="<?= esc($article['img']) ?>"
                alt="<?= esc($article['title']) ?>"
                class="w-full h-full object-cover"
            />
        </div>

        <!-- Article Body -->
        <div class="prose max-w-none text-[#252525] text-[16px] lg:text-[17px] leading-[1.8] space-y-6">
            <p class="text-[18px] lg:text-[20px] font-medium text-[#252525] leading-[1.6] bg-[#FFF4F8] p-6 rounded-2xl border-l-4 border-[#ED709E]">
                <?= esc($article['desc']) ?>
            </p>

            <div class="space-y-6 whitespace-pre-line text-[#444444]">
                <?= nl2br(esc($article['content'])) ?>
            </div>
        </div>

        <!-- Author Profile Card -->
        <div class="mt-14 p-6 sm:p-8 bg-[#FFF4F8] rounded-2xl border border-[#EDEDED] flex flex-col sm:flex-row items-center sm:items-start gap-6">
            <div class="w-16 h-16 rounded-full bg-[#ED709E] text-white flex items-center justify-center font-bold font-display text-[20px] shrink-0">
                MB
            </div>
            <div>
                <div class="font-display text-[18px] font-bold text-[#252525] mb-1">Written by <?= esc($article['author']) ?></div>
                <div class="text-[12.5px] text-[#ED709E] font-medium uppercase tracking-[0.5px] mb-3">IVF Specialist · Gynecologist · 17+ Years Experience</div>
                <p class="text-[14px] text-[#6F6F6F] leading-[1.65]">
                    Dr. Meetu Bhushan is dedicated to providing patient-centered, evidence-based reproductive care to guide couples with confidence through every phase of their fertility journey.
                </p>
            </div>
        </div>

        <!-- Back to Blog & Next CTA -->
        <div class="mt-12 flex flex-col sm:flex-row items-center justify-between gap-4 pt-8 border-t border-[#EDEDED]">
            <a
                href="<?= base_url('blog') ?>"
                class="inline-flex items-center gap-2 text-[#6F6F6F] hover:text-[#ED709E] font-semibold text-[14px] transition-colors font-display"
            >
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M13 8H3M7 4L3 8l4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Back to all articles
            </a>

            <a
                href="<?= base_url('/#book') ?>"
                class="inline-flex items-center gap-2 bg-[#ED709E] hover:bg-[#e05a8a] text-white text-[14px] font-semibold px-6 py-3 rounded-full transition-all shadow-xs font-display"
            >
                Book a Consultation
            </a>
        </div>

        <?php if (!empty($related)): ?>
            <!-- Related Articles -->
            <div class="mt-20">
                <h3 class="font-display text-[22px] font-bold text-[#252525] mb-6">
                    Related Articles
                </h3>
                <div class="grid sm:grid-cols-2 gap-6">
                    <?php foreach ($related as $rel): ?>
                        <a
                            href="<?= base_url('blog/' . $rel['slug']) ?>"
                            class="group bg-white rounded-2xl border border-[#EDEDED] p-5 hover:border-[#ED709E] hover:shadow-md transition-all flex gap-4"
                        >
                            <div class="w-24 h-24 rounded-xl overflow-hidden bg-[#FCEAF2] shrink-0">
                                <img
                                    src="<?= esc($rel['img']) ?>"
                                    alt="<?= esc($rel['title']) ?>"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform"
                                />
                            </div>
                            <div class="flex flex-col justify-between">
                                <span class="text-[11px] font-bold text-[#ED709E] uppercase tracking-[0.5px]">
                                    <?= esc($rel['category']) ?>
                                </span>
                                <h4 class="font-display text-[14.5px] font-bold text-[#252525] group-hover:text-[#ED709E] transition-colors line-clamp-2">
                                    <?= esc($rel['title']) ?>
                                </h4>
                                <span class="text-[12px] text-[#6F6F6F]"><?= esc($rel['read_time']) ?></span>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</article>

<?= $this->endSection() ?>
