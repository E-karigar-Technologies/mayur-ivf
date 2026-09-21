<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Blog Hero & Header -->
<section class="pt-[110px] pb-12 lg:pb-16 bg-[#FFF4F8] border-b border-[#EDEDED]">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-[13px] text-[#6F6F6F] mb-6 font-display">
            <a href="<?= base_url('/') ?>" class="hover:text-[#ED709E] transition-colors">Home</a>
            <span>/</span>
            <span class="text-[#252525] font-semibold">Fertility &amp; IVF Insights</span>
        </nav>

        <div class="max-w-[760px]">
            <p class="text-[11px] font-semibold tracking-[2px] text-[#ED709E] uppercase mb-3">Medical Knowledge &amp; Guidance</p>
            <h1 class="font-display text-[38px] lg:text-[50px] font-extrabold text-[#252525] leading-[1.12] tracking-[-1.5px] mb-5">
                Fertility &amp; IVF Insights
            </h1>
            <p class="text-[16px] lg:text-[17px] text-[#6F6F6F] leading-[1.7] mb-8">
                Evidence-based articles, patient guides, and answers to common reproductive health questions authored by Dr. Meetu Bhushan.
            </p>
        </div>

        <!-- Search & Category Filters -->
        <div class="pt-4 flex flex-col md:flex-row md:items-center justify-between gap-5 border-t border-[#EDEDED]/80">
            <!-- Category Pills -->
            <div class="flex flex-wrap gap-2" id="blog-category-filters">
                <?php foreach ($categories as $cat): ?>
                    <button
                        type="button"
                        data-category="<?= esc($cat) ?>"
                        class="category-filter-btn px-4 py-2 rounded-full text-[13px] font-semibold transition-all duration-200 font-display cursor-pointer <?= ($activeCategory ?? 'All') === $cat ? 'bg-[#ED709E] text-white shadow-xs' : 'bg-white border border-[#EDEDED] text-[#6F6F6F] hover:border-[#ED709E] hover:text-[#ED709E]' ?>"
                    >
                        <?= esc($cat) ?>
                    </button>
                <?php endforeach; ?>
            </div>

            <!-- Search input -->
            <div class="relative min-w-[260px]">
                <input
                    type="text"
                    id="blog-search-input"
                    placeholder="Search fertility topics..."
                    class="w-full bg-white border border-[#EDEDED] rounded-full pl-10 pr-4 py-2.5 text-[13.5px] focus:outline-none focus:border-[#ED709E] focus:ring-2 focus:ring-[#ED709E]/10 transition-all"
                />
                <svg class="absolute left-3.5 top-3 w-4 h-4 text-[#6F6F6F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>
    </div>
</section>

<!-- Main Blog Content Area -->
<section class="py-16 lg:py-20 bg-white">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-8">

        <?php if (!empty($featured) && empty($currentFilter)): ?>
            <!-- Featured Highlight Card -->
            <div class="mb-16 bg-[#FFF4F8] rounded-[28px] p-6 lg:p-10 border border-[#EDEDED] shadow-2xs hover:border-[#ED709E]/50 transition-all duration-300">
                <div class="grid lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                    <div class="lg:col-span-7">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="inline-block text-[11px] font-bold tracking-[1px] uppercase text-[#ED709E] bg-white px-3.5 py-1 rounded-full border border-[#FCEAF2]">
                                Featured Guide · <?= esc($featured['category']) ?>
                            </span>
                            <span class="text-[12.5px] text-[#6F6F6F]"><?= esc($featured['read_time']) ?></span>
                        </div>
                        <h2 class="font-display text-[26px] lg:text-[34px] font-extrabold text-[#252525] leading-[1.2] mb-4 hover:text-[#ED709E] transition-colors">
                            <a href="<?= base_url('blog/' . $featured['slug']) ?>">
                                <?= esc($featured['title']) ?>
                            </a>
                        </h2>
                        <p class="text-[15px] text-[#6F6F6F] leading-[1.75] mb-6 line-clamp-3">
                            <?= esc($featured['desc']) ?>
                        </p>
                        <div class="flex items-center justify-between pt-5 border-t border-[#EDEDED]/80">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-[#ED709E] text-white flex items-center justify-center font-bold font-display text-[14px]">
                                    MB
                                </div>
                                <div>
                                    <div class="font-display text-[13px] font-bold text-[#252525]"><?= esc($featured['author']) ?></div>
                                    <div class="text-[11.5px] text-[#6F6F6F]"><?= esc($featured['date']) ?></div>
                                </div>
                            </div>
                            <a
                                href="<?= base_url('blog/' . $featured['slug']) ?>"
                                class="inline-flex items-center gap-2 bg-[#ED709E] hover:bg-[#e05a8a] text-white text-[13.5px] font-semibold px-5 py-2.5 rounded-full transition-all duration-200 shadow-xs font-display"
                            >
                                Read Guide
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                                    <path d="M2.5 7h9M8 3.5l3.5 3.5L8 10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="lg:col-span-5">
                        <a href="<?= base_url('blog/' . $featured['slug']) ?>" class="block rounded-2xl overflow-hidden aspect-[16/10] bg-[#FCEAF2] shadow-xs group">
                            <img
                                src="<?= esc($featured['img']) ?>"
                                alt="<?= esc($featured['title']) ?>"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            />
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Articles Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8" id="articles-grid">
            <?php foreach ($articles as $post): ?>
                <article
                    class="blog-card bg-white rounded-2xl border border-[#EDEDED] overflow-hidden hover:border-[#ED709E] hover:shadow-lg transition-all duration-300 flex flex-col group"
                    data-category="<?= esc($post['category']) ?>"
                    data-title="<?= esc(strtolower($post['title'])) ?>"
                    data-desc="<?= esc(strtolower($post['desc'])) ?>"
                >
                    <a href="<?= base_url('blog/' . $post['slug']) ?>" class="block overflow-hidden aspect-[16/9] bg-[#FCEAF2] relative">
                        <img
                            src="<?= esc($post['img']) ?>"
                            alt="<?= esc($post['title']) ?>"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            loading="lazy"
                        />
                        <span class="absolute top-3 left-3 text-[11px] font-bold tracking-[0.5px] text-[#ED709E] bg-white/95 backdrop-blur-xs px-3 py-1 rounded-full shadow-2xs">
                            <?= esc($post['category']) ?>
                        </span>
                    </a>

                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex items-center gap-2 text-[12px] text-[#6F6F6F] mb-2.5">
                            <span><?= esc($post['date']) ?></span>
                            <span>•</span>
                            <span><?= esc($post['read_time']) ?></span>
                        </div>

                        <h3 class="font-display text-[18px] font-bold text-[#252525] mb-2.5 group-hover:text-[#ED709E] transition-colors leading-[1.35]">
                            <a href="<?= base_url('blog/' . $post['slug']) ?>">
                                <?= esc($post['title']) ?>
                            </a>
                        </h3>

                        <p class="text-[13.5px] text-[#6F6F6F] leading-[1.65] mb-6 flex-1 line-clamp-3">
                            <?= esc($post['desc']) ?>
                        </p>

                        <div class="pt-4 border-t border-[#EDEDED] flex items-center justify-between">
                            <span class="text-[12.5px] font-medium text-[#252525]">By <?= esc($post['author']) ?></span>
                            <a
                                href="<?= base_url('blog/' . $post['slug']) ?>"
                                class="text-[13px] font-semibold text-[#ED709E] inline-flex items-center gap-1 group-hover:gap-2 transition-all font-display"
                            >
                                Read Article
                                <svg width="13" height="13" viewBox="0 0 13 13" fill="none">
                                    <path d="M2 6.5h9M8 3l3.5 3.5L8 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <!-- Empty State When No Results Found in Search -->
        <div id="no-articles-found" class="hidden text-center py-20 bg-[#FFF4F8] rounded-2xl border border-[#EDEDED]">
            <div class="w-14 h-14 rounded-full bg-white flex items-center justify-center mx-auto mb-4 text-[#ED709E] shadow-2xs">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h3 class="font-display text-[18px] font-bold text-[#252525] mb-2">No matching articles found</h3>
            <p class="text-[14px] text-[#6F6F6F] mb-6 max-w-[400px] mx-auto">
                Try searching with different keywords or switch categories to explore other topics.
            </p>
            <button
                type="button"
                id="reset-filter-btn"
                class="inline-flex items-center gap-2 bg-[#ED709E] text-white text-[13px] font-semibold px-5 py-2.5 rounded-full font-display cursor-pointer"
            >
                View All Articles
            </button>
        </div>

        <!-- Consultation Banner Callout -->
        <div class="mt-20 rounded-[24px] bg-gradient-to-r from-[#FFF4F8] to-[#FCEAF2] p-8 lg:p-12 border border-[#EDEDED] flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="max-w-[600px]">
                <span class="text-[11px] font-semibold uppercase tracking-[2px] text-[#ED709E] mb-2 block">Have Questions About Your Fertility?</span>
                <h3 class="font-display text-[24px] lg:text-[30px] font-extrabold text-[#252525] leading-tight mb-3">
                    Schedule a One-on-One Consultation
                </h3>
                <p class="text-[14.5px] text-[#6F6F6F] leading-[1.65]">
                    Receive clear, compassionate answers tailored to your specific reproductive health and medical history.
                </p>
            </div>
            <a
                href="<?= base_url('/#book') ?>"
                class="inline-flex items-center gap-2 bg-[#ED709E] hover:bg-[#e05a8a] text-white text-[14.5px] font-semibold px-7 py-3.5 rounded-full transition-all duration-200 shadow-sm hover:shadow-md font-display shrink-0"
            >
                Book Consultation Now
                <svg width="15" height="15" viewBox="0 0 16 16" fill="none">
                    <path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<!-- Client-side Interactive Filter Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const filterButtons = document.querySelectorAll('.category-filter-btn');
    const searchInput = document.getElementById('blog-search-input');
    const cards = document.querySelectorAll('.blog-card');
    const noResults = document.getElementById('no-articles-found');
    const resetBtn = document.getElementById('reset-filter-btn');

    let currentCategory = 'All';
    let searchQuery = '';

    const filterArticles = () => {
        let visibleCount = 0;

        cards.forEach(card => {
            const cardCat = card.getAttribute('data-category');
            const cardTitle = card.getAttribute('data-title') || '';
            const cardDesc = card.getAttribute('data-desc') || '';

            const matchesCategory = (currentCategory === 'All' || cardCat.toLowerCase() === currentCategory.toLowerCase());
            const matchesSearch = (searchQuery === '' || cardTitle.includes(searchQuery) || cardDesc.includes(searchQuery));

            if (matchesCategory && matchesSearch) {
                card.style.display = 'flex';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        if (visibleCount === 0) {
            noResults?.classList.remove('hidden');
        } else {
            noResults?.classList.add('hidden');
        }
    };

    filterButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            filterButtons.forEach(b => {
                b.classList.remove('bg-[#ED709E]', 'text-white', 'shadow-xs');
                b.classList.add('bg-white', 'border', 'border-[#EDEDED]', 'text-[#6F6F6F]');
            });

            btn.classList.remove('bg-white', 'border', 'border-[#EDEDED]', 'text-[#6F6F6F]');
            btn.classList.add('bg-[#ED709E]', 'text-white', 'shadow-xs');

            currentCategory = btn.getAttribute('data-category') || 'All';
            filterArticles();
        });
    });

    searchInput?.addEventListener('input', (e) => {
        searchQuery = e.target.value.toLowerCase().trim();
        filterArticles();
    });

    resetBtn?.addEventListener('click', () => {
        if (searchInput) searchInput.value = '';
        searchQuery = '';
        const allBtn = document.querySelector('.category-filter-btn[data-category="All"]');
        allBtn?.click();
    });
});
</script>

<?= $this->endSection() ?>
