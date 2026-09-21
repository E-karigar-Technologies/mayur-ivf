<?php
$blogModel = new \App\Models\BlogModel();
$posts = array_slice($blogModel->getAll(), 0, 6);
?>

<section id="blog" class="py-20 lg:py-28 bg-white">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-5 mb-12">
            <div>
                <p class="text-[11px] font-semibold tracking-[2px] text-[#ED709E] uppercase mb-4">Education</p>
                <h2 class="font-display text-[36px] lg:text-[44px] font-extrabold text-[#252525] leading-[1.1] tracking-[-1px]">
                    Fertility &amp; IVF Insights
                </h2>
            </div>
            <a
                href="<?= base_url('blog') ?>"
                class="inline-flex items-center gap-2 text-[#ED709E] text-[14px] font-semibold hover:gap-3 transition-all font-display"
            >
                View all articles
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($posts as $post): ?>
                <article class="group cursor-pointer">
                    <a href="<?= base_url('blog/' . $post['slug']) ?>" class="block rounded-2xl overflow-hidden aspect-[16/9] bg-[#FCEAF2] mb-4 shadow-2xs">
                        <img
                            src="<?= esc($post['img']) ?>"
                            alt="<?= esc($post['title']) ?>"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            loading="lazy"
                        />
                    </a>
                    <div class="inline-block text-[11px] font-semibold tracking-[1px] text-[#ED709E] bg-[#FFF4F8] px-3 py-1 rounded-full mb-3">
                        <?= esc($post['category']) ?>
                    </div>
                    <h3 class="font-display text-[17px] font-bold text-[#252525] mb-2 group-hover:text-[#ED709E] transition-colors leading-[1.35]">
                        <a href="<?= base_url('blog/' . $post['slug']) ?>">
                            <?= esc($post['title']) ?>
                        </a>
                    </h3>
                    <p class="text-[13.5px] text-[#6F6F6F] leading-[1.65] mb-3">
                        <?= esc($post['desc']) ?>
                    </p>
                    <a
                        href="<?= base_url('blog/' . $post['slug']) ?>"
                        class="text-[13px] font-semibold text-[#ED709E] inline-flex items-center gap-1.5 hover:gap-2.5 transition-all"
                    >
                        Read more
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none">
                            <path d="M2 6.5h9M8 3l3.5 3.5L8 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
