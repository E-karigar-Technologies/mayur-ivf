<?php
$galleryModel = new \App\Models\GalleryModel();
$galleryItems = $galleryModel->getActiveGallery();
$galleryCategories = $galleryModel->getCategories();
?>

<section id="gallery" class="py-20 lg:py-28 bg-[#FFF4F8] relative overflow-hidden">
    <!-- Ambient background glow elements -->
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-[#FCEAF2] rounded-full filter blur-3xl opacity-70 pointer-events-none -z-0"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-[#ED709E]/10 rounded-full filter blur-3xl opacity-60 pointer-events-none -z-0"></div>

    <div class="max-w-[1280px] mx-auto px-6 lg:px-8 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-2xl mx-auto mb-12">
            <p class="text-[11px] font-semibold tracking-[2px] text-[#ED709E] uppercase mb-3 font-display">
                Real Glimpses &amp; Success
            </p>
            <h2 class="font-display text-[34px] sm:text-[42px] font-extrabold text-[#252525] leading-[1.15] tracking-[-1px] mb-4">
                Clinical Excellence &amp; Joyous Moments
            </h2>
            <p class="text-[14.5px] text-[#6F6F6F] leading-[1.7]">
                Take a closer look at our state-of-the-art IVF embryology laboratories, world-class clinical facilities, and joyful stories of parenthood.
            </p>
        </div>

        <!-- Filter Buttons -->
        <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-3 mb-10">
            <button
                type="button"
                onclick="filterGallery('all', this)"
                class="gallery-filter-btn active px-5 py-2 rounded-full text-[13px] font-semibold font-display transition-all duration-200 bg-[#ED709E] text-white shadow-xs"
            >
                All Media
            </button>
            <button
                type="button"
                onclick="filterGallery('image', this)"
                class="gallery-filter-btn px-5 py-2 rounded-full text-[13px] font-semibold font-display transition-all duration-200 bg-white text-[#6F6F6F] hover:text-[#ED709E] border border-[#EDEDED]"
            >
                📷 Photos
            </button>
            <button
                type="button"
                onclick="filterGallery('video', this)"
                class="gallery-filter-btn px-5 py-2 rounded-full text-[13px] font-semibold font-display transition-all duration-200 bg-white text-[#6F6F6F] hover:text-[#ED709E] border border-[#EDEDED]"
            >
                🎬 Videos
            </button>
            <?php foreach ($galleryCategories as $cat): ?>
                <?php if (!in_array(strtolower($cat), ['all', 'photos', 'videos', 'images'])): ?>
                    <button
                        type="button"
                        onclick="filterGallery('<?= esc(strtolower($cat), 'js') ?>', this)"
                        class="gallery-filter-btn hidden sm:inline-block px-5 py-2 rounded-full text-[13px] font-semibold font-display transition-all duration-200 bg-white text-[#6F6F6F] hover:text-[#ED709E] border border-[#EDEDED]"
                    >
                        <?= esc($cat) ?>
                    </button>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <!-- Gallery Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8" id="gallery-grid">
            <?php foreach ($galleryItems as $item): ?>
                <div
                    class="gallery-card bg-white rounded-3xl overflow-hidden border border-[#EDEDED] shadow-2xs hover:shadow-xl hover:border-[#ED709E]/50 transition-all duration-300 flex flex-col group cursor-pointer"
                    data-type="<?= esc($item['type']) ?>"
                    data-category="<?= esc(strtolower($item['category'])) ?>"
                    onclick="openMediaModal(<?= htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8') ?>)"
                >
                    <!-- Media Thumbnail Container -->
                    <div class="relative aspect-[16/10] bg-[#FCEAF2] overflow-hidden">
                        <img
                            src="<?= esc($item['thumbnail_url'] ?: $item['file_url']) ?>"
                            alt="<?= esc($item['title']) ?>"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            loading="lazy"
                        />

                        <!-- Type & Category Badges -->
                        <div class="absolute top-3 left-3 flex items-center gap-2">
                            <?php if ($item['type'] === 'video'): ?>
                                <span class="inline-flex items-center gap-1.5 bg-[#252525]/85 backdrop-blur-xs text-white text-[11px] font-bold px-3 py-1 rounded-full shadow-sm font-display">
                                    <svg class="w-3 h-3 text-[#ED709E] fill-current" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                    Video
                                </span>
                            <?php else: ?>
                                <span class="inline-flex items-center gap-1.5 bg-white/90 backdrop-blur-xs text-[#ED709E] text-[11px] font-bold px-3 py-1 rounded-full shadow-sm font-display">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Photo
                                </span>
                            <?php endif; ?>

                            <span class="bg-[#FFF4F8]/90 backdrop-blur-xs text-[#6F6F6F] text-[11px] font-semibold px-2.5 py-1 rounded-full border border-[#FCEAF2] hidden sm:inline-block font-display">
                                <?= esc($item['category']) ?>
                            </span>
                        </div>

                        <!-- Video Play Button Overlay / Photo Zoom Icon -->
                        <?php if ($item['type'] === 'video'): ?>
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition-colors flex items-center justify-center">
                                <div class="w-14 h-14 rounded-full bg-[#ED709E] text-white flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-6 h-6 fill-current translate-x-0.5" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="absolute inset-0 bg-[#ED709E]/0 group-hover:bg-[#ED709E]/15 transition-colors flex items-center justify-center">
                                <div class="w-11 h-11 rounded-full bg-white/90 text-[#ED709E] flex items-center justify-center shadow-md opacity-0 group-hover:opacity-100 group-hover:scale-100 scale-75 transition-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                                    </svg>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Caption & Description -->
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="font-display text-[16px] sm:text-[17px] font-bold text-[#252525] group-hover:text-[#ED709E] transition-colors leading-[1.35] mb-2">
                                <?= esc($item['title']) ?>
                            </h3>
                            <?php if (!empty($item['description'])): ?>
                                <p class="text-[13px] text-[#6F6F6F] line-clamp-2 leading-relaxed">
                                    <?= esc($item['description']) ?>
                                </p>
                            <?php endif; ?>
                        </div>

                        <div class="mt-4 pt-3 border-t border-[#EDEDED]/60 flex items-center justify-between text-[12px] font-semibold text-[#ED709E] font-display">
                            <span><?= $item['type'] === 'video' ? '▶ Watch Video Story' : '🔍 View Full Size' ?></span>
                            <span class="text-[#6F6F6F] group-hover:translate-x-1 transition-transform">→</span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Lightbox / Video Modal -->
<div id="mediaModal" class="fixed inset-0 z-50 hidden bg-black/85 backdrop-blur-md items-center justify-center p-4 sm:p-6 opacity-0 transition-opacity duration-300">
    <div class="relative w-full max-w-4xl bg-[#252525] rounded-3xl overflow-hidden shadow-2xl border border-white/10 flex flex-col max-h-[90vh]">
        <!-- Close Button -->
        <button
            type="button"
            onclick="closeMediaModal()"
            class="absolute top-4 right-4 z-20 w-10 h-10 rounded-full bg-black/60 text-white hover:bg-[#ED709E] flex items-center justify-center transition-colors text-xl leading-none"
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
                <span id="modalCategory" class="text-[11px] font-bold uppercase tracking-[1px] text-[#ED709E] bg-[#ED709E]/10 px-3 py-1 rounded-full"></span>
                <span id="modalType" class="text-[11px] font-semibold text-gray-400"></span>
            </div>
            <h3 id="modalTitle" class="font-display text-[20px] sm:text-[22px] font-bold text-white mb-2"></h3>
            <p id="modalDescription" class="text-[13.5px] text-[#9E9E9E] leading-[1.65]"></p>
        </div>
    </div>
</div>

<script>
function filterGallery(filter, btn) {
    // Update active button styles
    document.querySelectorAll('.gallery-filter-btn').forEach(b => {
        b.classList.remove('bg-[#ED709E]', 'text-white', 'shadow-xs');
        b.classList.add('bg-white', 'text-[#6F6F6F]', 'border', 'border-[#EDEDED]');
    });

    btn.classList.add('bg-[#ED709E]', 'text-white', 'shadow-xs');
    btn.classList.remove('bg-white', 'text-[#6F6F6F]', 'border-[#EDEDED]');

    const cards = document.querySelectorAll('.gallery-card');
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
        } else if (item.video_source === 'upload') {
            container.innerHTML = `<video class="w-full h-full object-contain" controls autoplay playsinline><source src="${item.file_url}" type="video/mp4">Your browser does not support HTML5 video.</video>`;
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

// Close on escape key or backdrop click
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeMediaModal();
});

document.getElementById('mediaModal')?.addEventListener('click', (e) => {
    if (e.target.id === 'mediaModal') closeMediaModal();
});
</script>
