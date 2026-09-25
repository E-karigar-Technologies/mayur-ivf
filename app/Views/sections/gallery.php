<?php
use App\Models\GalleryModel;
$galleryItems = GalleryModel::getHomeGallery(8);
?>

<section id="gallery" class="py-20 lg:py-28 bg-[#FFF4F8] relative overflow-hidden">
    <!-- Ambient background glow elements -->
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-[#FCEAF2] rounded-full filter blur-3xl opacity-70 pointer-events-none -z-0"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-[#ED709E]/10 rounded-full filter blur-3xl opacity-60 pointer-events-none -z-0"></div>

    <div class="max-w-[1280px] mx-auto px-6 lg:px-8 relative z-10">
        <!-- Section Header -->
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-5 mb-12">
            <div>
                <p class="text-[11px] font-semibold tracking-[2px] text-[#ED709E] uppercase mb-3 font-display">
                    Real Patient Milestones &amp; Joy
                </p>
                <h2 class="font-display text-[32px] sm:text-[42px] font-extrabold text-[#252525] leading-[1.15] tracking-[-1px]">
                    Success Stories &amp; Photo Gallery
                </h2>
                <p class="text-[14.5px] text-[#6F6F6F] mt-2 max-w-xl">
                    Genuine moments of hope, joy, and healthy newborn blessings with Dr. Meetu Bhushan at Mayor's IVF Centre.
                </p>
            </div>

            <a
                href="<?= base_url('gallery') ?>"
                class="inline-flex items-center gap-2 text-[#ED709E] text-[14px] font-semibold hover:gap-3 transition-all font-display self-start sm:self-auto shrink-0"
            >
                <span>View Full Gallery</span>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>

        <!-- 8 Media Cards Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6" id="home-gallery-grid">
            <?php foreach ($galleryItems as $item): ?>
                <div
                    class="gallery-card bg-white rounded-3xl overflow-hidden border border-[#EDEDED] shadow-2xs hover:shadow-xl hover:border-[#ED709E]/50 transition-all duration-300 flex flex-col group cursor-pointer"
                    onclick="openMediaModal(<?= htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8') ?>)"
                >
                    <!-- Media Thumbnail Container -->
                    <div class="relative aspect-[4/3] bg-[#FCEAF2] overflow-hidden">
                        <img
                            src="<?= esc($item['thumbnail_url'] ?: $item['file_url']) ?>"
                            alt="<?= esc($item['title']) ?>"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            loading="lazy"
                        />

                        <!-- Video Play Button Overlay / Photo Zoom Icon -->
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

                    <!-- Caption Body -->
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="text-[11px] font-semibold text-[#ED709E] uppercase tracking-[0.5px] font-display">
                                <?= esc($item['category']) ?>
                            </span>
                            <h3 class="font-display text-[14.5px] font-bold text-[#252525] group-hover:text-[#ED709E] transition-colors leading-[1.3] mt-1 line-clamp-2">
                                <?= esc($item['title']) ?>
                            </h3>
                        </div>

                        <div class="mt-3 pt-2.5 border-t border-[#EDEDED]/60 flex items-center justify-between text-[11.5px] font-semibold text-[#6F6F6F] group-hover:text-[#ED709E] font-display transition-colors">
                            <span><?= $item['type'] === 'video' ? 'Watch Video' : 'View Photo' ?></span>
                            <span>→</span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- See More Button Area -->
        <div class="mt-12 text-center">
            <a
                href="<?= base_url('gallery') ?>"
                class="inline-flex items-center gap-2.5 bg-[#ED709E] hover:bg-[#e05a8a] text-white text-[14.5px] font-semibold px-8 py-3.5 rounded-full transition-all duration-200 shadow-md hover:shadow-lg hover:scale-[1.02] font-display"
            >
                <span>See More in Gallery</span>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </a>
            <p class="text-xs text-[#6F6F6F] mt-2">Showing 8 of 16 clinical photos and procedural videos</p>
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
                <span id="modalCategory" class="text-[11px] font-bold uppercase tracking-[1px] text-[#ED709E] bg-[#ED709E]/10 px-3 py-1 rounded-full"></span>
                <span id="modalType" class="text-[11px] font-semibold text-gray-400"></span>
            </div>
            <h3 id="modalTitle" class="font-display text-[18px] sm:text-[20px] font-bold text-white mb-2"></h3>
            <p id="modalDescription" class="text-[13.5px] text-[#9E9E9E] leading-[1.65]"></p>
        </div>
    </div>
</div>

<script>
function openMediaModal(item) {
    const modal = document.getElementById('mediaModal');
    const container = document.getElementById('modalMediaContainer');
    const title = document.getElementById('modalTitle');
    const desc = document.getElementById('modalDescription');
    const cat = document.getElementById('modalCategory');
    const type = document.getElementById('modalType');

    title.textContent = item.title || '';
    desc.textContent = item.description || '';
    cat.textContent = item.category || 'Clinic Facility';
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
