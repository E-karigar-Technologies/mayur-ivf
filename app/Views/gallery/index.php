<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="pt-[110px] pb-24 bg-white">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-8">
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 text-[13px] text-[#6F6F6F] mb-6 font-display">
            <a href="<?= base_url('/') ?>" class="hover:text-[#ED709E] transition-colors">Home</a>
            <span>/</span>
            <span class="text-[#252525] font-semibold">Gallery</span>
        </nav>

        <!-- Page Header -->
        <div class="max-w-3xl mb-12">
            <div class="inline-block text-[11px] font-bold tracking-[1.5px] uppercase text-[#ED709E] bg-[#FFF4F8] px-3.5 py-1 rounded-full border border-[#FCEAF2] mb-3">
                Patient Milestones &amp; Joy
            </div>
            <h1 class="font-display text-[34px] sm:text-[46px] font-extrabold text-[#252525] leading-[1.12] tracking-[-1.5px] mb-4">
                Real Patient Success Moments
            </h1>
            <p class="text-[15.5px] text-[#6F6F6F] leading-[1.75]">
                Cherished genuine moments of parenthood dreams fulfilled, newborn blessings, and joyful clinic visits with Dr. Meetu Bhushan at Mayor's IVF Centre.
            </p>
        </div>

        <!-- Filter Tabs -->
        <div class="flex flex-wrap items-center gap-2 sm:gap-3 mb-12 border-b border-[#EDEDED] pb-5">
            <button
                type="button"
                onclick="filterGallery('all', this)"
                class="gallery-page-filter-btn active px-6 py-2.5 rounded-full text-[13.5px] font-semibold font-display transition-all duration-200 bg-[#ED709E] text-white shadow-xs"
            >
                All Photos (<?= count($items) ?>)
            </button>
            <button
                type="button"
                onclick="filterGallery('twins blessing', this)"
                class="gallery-page-filter-btn px-6 py-2.5 rounded-full text-[13.5px] font-semibold font-display transition-all duration-200 bg-white text-[#6F6F6F] hover:text-[#ED709E] border border-[#EDEDED]"
            >
                👶 Twins Blessing
            </button>
            <button
                type="button"
                onclick="filterGallery('clinic milestones', this)"
                class="gallery-page-filter-btn px-6 py-2.5 rounded-full text-[13.5px] font-semibold font-display transition-all duration-200 bg-white text-[#6F6F6F] hover:text-[#ED709E] border border-[#EDEDED]"
            >
                🏥 Clinic Milestones
            </button>
            <button
                type="button"
                onclick="filterGallery('newborn joy', this)"
                class="gallery-page-filter-btn px-6 py-2.5 rounded-full text-[13.5px] font-semibold font-display transition-all duration-200 bg-white text-[#6F6F6F] hover:text-[#ED709E] border border-[#EDEDED]"
            >
                💖 Newborn Joy
            </button>
            <button
                type="button"
                onclick="filterGallery('events & outreach', this)"
                class="gallery-page-filter-btn px-6 py-2.5 rounded-full text-[13.5px] font-semibold font-display transition-all duration-200 bg-white text-[#6F6F6F] hover:text-[#ED709E] border border-[#EDEDED]"
            >
                🤝 Events &amp; Outreach
            </button>
        </div>

        <!-- All Media Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-7" id="gallery-full-grid">
            <?php foreach ($items as $item): ?>
                <div
                    class="gallery-item-card bg-white rounded-3xl overflow-hidden border border-[#EDEDED] shadow-2xs hover:shadow-xl hover:border-[#ED709E]/50 transition-all duration-300 flex flex-col group cursor-pointer"
                    data-type="<?= esc($item['type']) ?>"
                    data-category="<?= esc(strtolower($item['category'])) ?>"
                    onclick="openMediaModal(<?= htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8') ?>)"
                >
                    <!-- Media Thumbnail Container -->
                    <div class="relative aspect-[16/11] bg-[#FCEAF2] overflow-hidden">
                        <img
                            src="<?= esc($item['thumbnail_url'] ?: $item['file_url']) ?>"
                            alt="<?= esc($item['title']) ?>"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            loading="lazy"
                        />

                        <!-- Hover Icon -->
                        <?php if ($item['type'] === 'video'): ?>
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition-colors flex items-center justify-center">
                                <div class="w-12 h-12 rounded-full bg-[#ED709E] text-white flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-5 h-5 fill-current translate-x-0.5" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="absolute inset-0 bg-[#ED709E]/0 group-hover:bg-[#ED709E]/15 transition-colors flex items-center justify-center">
                                <div class="w-10 h-10 rounded-full bg-white/90 text-[#ED709E] flex items-center justify-center shadow-md opacity-0 group-hover:opacity-100 group-hover:scale-100 scale-75 transition-all duration-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                                    </svg>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Description Body -->
                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="font-display text-[15.5px] font-bold text-[#252525] group-hover:text-[#ED709E] transition-colors leading-[1.35] mb-1.5">
                                <?= esc($item['title']) ?>
                            </h3>
                            <?php if (!empty($item['description'])): ?>
                                <p class="text-[12.5px] text-[#6F6F6F] leading-relaxed line-clamp-2">
                                    <?= esc($item['description']) ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <div class="mt-4 pt-3 border-t border-[#EDEDED]/60 flex items-center justify-between text-[11.5px] font-semibold text-[#ED709E] font-display">
                            <span><?= $item['type'] === 'video' ? '▶ Watch Video' : '🔍 View Full Image' ?></span>
                            <span class="text-[#6F6F6F] group-hover:translate-x-1 transition-transform">→</span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Bottom Consultation CTA -->
        <div class="mt-20 p-8 sm:p-12 rounded-3xl bg-[#FFF4F8] border border-[#FCEAF2] flex flex-col sm:flex-row items-center justify-between gap-6 text-center sm:text-left">
            <div>
                <h3 class="font-display text-[22px] sm:text-[26px] font-bold text-[#252525] mb-2">
                    Experience World-Class Fertility Care in Person
                </h3>
                <p class="text-[14px] text-[#6F6F6F] max-w-xl">
                    Schedule a confidential consultation with Dr. Meetu Bhushan to tour our facility and discuss your personalized treatment roadmap.
                </p>
            </div>
            <a
                href="<?= base_url('/#book') ?>"
                class="inline-flex items-center gap-2 bg-[#ED709E] hover:bg-[#e05a8a] text-white text-[14.5px] font-semibold px-8 py-4 rounded-full transition-all shadow-md hover:shadow-lg shrink-0 font-display"
            >
                Book a Consultation
            </a>
        </div>
    </div>
</div>

<!-- Lightbox / Video Modal -->
<div id="mediaModal" class="fixed inset-0 z-50 hidden bg-black/85 backdrop-blur-md items-center justify-center p-4 sm:p-6 opacity-0 transition-opacity duration-300">
    <div class="relative w-full max-w-4xl bg-[#252525] rounded-3xl overflow-hidden shadow-2xl border border-white/10 flex flex-col max-h-[90vh]">
        <!-- Close Button -->
        <button
            type="button"
            onclick="closeMediaModal()"
            class="absolute top-4 right-4 z-20 w-10 h-10 rounded-full bg-black/60 text-white hover:bg-[#ED709E] flex items-center justify-center transition-colors text-xl leading-none cursor-pointer"
            aria-label="Close modal"
        >
            &times;
        </button>

        <!-- Media Player / Image Area -->
        <div id="modalMediaContainer" class="w-full bg-black flex items-center justify-center aspect-[16/9] max-h-[60vh] overflow-hidden">
            <!-- Dynamic Injection via JS -->
        </div>

        <!-- Info Footer -->
        <div class="p-6 bg-[#1E1E1E] text-white flex-1 overflow-y-auto">
            <div class="flex items-center gap-2 mb-2">
                <span id="modalCategory" class="text-[11px] font-bold uppercase tracking-[1px] text-[#ED709E] bg-[#ED709E]/10 px-3 py-1 rounded-full font-display"></span>
                <span id="modalType" class="text-[11px] font-semibold text-gray-400 font-display"></span>
            </div>
            <h3 id="modalTitle" class="font-display text-[18px] sm:text-[22px] font-bold text-white mb-2"></h3>
            <p id="modalDescription" class="text-[13.5px] text-[#9E9E9E] leading-[1.65]"></p>
        </div>
    </div>
</div>

<script>
function filterGallery(filter, btn) {
    document.querySelectorAll('.gallery-page-filter-btn').forEach(b => {
        b.classList.remove('bg-[#ED709E]', 'text-white', 'shadow-xs');
        b.classList.add('bg-white', 'text-[#6F6F6F]', 'border', 'border-[#EDEDED]');
    });

    btn.classList.add('bg-[#ED709E]', 'text-white', 'shadow-xs');
    btn.classList.remove('bg-white', 'text-[#6F6F6F]', 'border-[#EDEDED]');

    const cards = document.querySelectorAll('.gallery-item-card');
    cards.forEach(card => {
        const type = card.dataset.type;
        const category = card.dataset.category;

        if (filter === 'all') {
            card.style.display = 'flex';
        } else if (filter === 'image' || filter === 'video') {
            card.style.display = (type === filter) ? 'flex' : 'none';
        } else {
            card.style.display = (category === filter) ? 'flex' : 'none';
        }
    });
}

function openMediaModal(item) {
    const modal = document.getElementById('mediaModal');
    const container = document.getElementById('modalMediaContainer');
    const title = document.getElementById('modalTitle');
    const desc = document.getElementById('modalDescription');
    const cat = document.getElementById('modalCategory');
    const type = document.getElementById('modalType');

    title.textContent = item.title || '';
    desc.textContent = item.description || '';
    cat.textContent = item.category || 'Clinical Facility';
    type.textContent = item.type === 'video' ? '• Video Feature' : '• Photograph';

    if (item.type === 'video') {
        if (item.video_embed_url) {
            container.innerHTML = `<iframe class="w-full h-full border-0" src="${item.video_embed_url}?autoplay=1" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
        } else {
            container.innerHTML = `<iframe class="w-full h-full border-0" src="${item.file_url}" allowfullscreen></iframe>`;
        }
    } else {
        container.innerHTML = `<img src="${item.file_url || item.thumbnail_url}" alt="${item.title}" class="w-full h-full object-contain" />`;
    }

    modal.classList.remove('hidden');
    modal.classList.add('flex');
    setTimeout(() => {
        modal.classList.remove('opacity-0');
    }, 10);
}

function closeMediaModal() {
    const modal = document.getElementById('mediaModal');
    const container = document.getElementById('modalMediaContainer');
    
    modal.classList.add('opacity-0');
    setTimeout(() => {
        modal.classList.remove('flex');
        modal.classList.add('hidden');
        container.innerHTML = '';
    }, 250);
}

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeMediaModal();
});

document.getElementById('mediaModal')?.addEventListener('click', (e) => {
    if (e.target.id === 'mediaModal') closeMediaModal();
});
</script>

<?= $this->endSection() ?>
