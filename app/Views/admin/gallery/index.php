<?= $this->extend('admin/layouts/admin') ?>

<?= $this->section('content') ?>
<div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-gray-900 flex items-center gap-2 font-display">
            <svg class="w-7 h-7 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            Photo &amp; Video Gallery
        </h1>
        <p class="text-sm text-gray-500 mt-1">Manage clinical photographs, procedure videos, and patient success moments displayed on the website.</p>
    </div>

    <div class="flex items-center gap-3">
        <a href="<?= base_url('admin/gallery/create') ?>" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-white font-semibold text-sm shadow-md transition-all duration-200 hover:opacity-95 font-display" style="background: linear-gradient(135deg, #ED709E 0%, #D84E80 100%);">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Upload New Media
        </a>
    </div>
</div>

<!-- Stats Strip -->
<div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-8">
    <div class="bg-white rounded-2xl p-4 border border-[#EDEDED] shadow-2xs">
        <div class="text-xs text-[#6F6F6F] font-bold uppercase font-display mb-1">Total Media</div>
        <div class="text-2xl font-extrabold text-[#252525] font-display"><?= $stats['total'] ?? count($items) ?></div>
    </div>
    <div class="bg-white rounded-2xl p-4 border border-[#EDEDED] shadow-2xs">
        <div class="text-xs text-[#6F6F6F] font-bold uppercase font-display mb-1">Photographs</div>
        <div class="text-2xl font-extrabold text-pink-600 font-display"><?= $stats['images'] ?? 0 ?></div>
    </div>
    <div class="bg-white rounded-2xl p-4 border border-[#EDEDED] shadow-2xs">
        <div class="text-xs text-[#6F6F6F] font-bold uppercase font-display mb-1">Videos</div>
        <div class="text-2xl font-extrabold text-purple-600 font-display"><?= $stats['videos'] ?? 0 ?></div>
    </div>
    <div class="bg-white rounded-2xl p-4 border border-[#EDEDED] shadow-2xs">
        <div class="text-xs text-[#6F6F6F] font-bold uppercase font-display mb-1">Live On Website</div>
        <div class="text-2xl font-extrabold text-emerald-600 font-display"><?= $stats['active'] ?? 0 ?></div>
    </div>
</div>

<!-- Filter Tabs -->
<div class="flex items-center gap-2 mb-6 border-b border-gray-200 pb-3">
    <a href="<?= base_url('admin/gallery') ?>" class="px-4 py-2 rounded-xl text-xs font-bold font-display transition-all <?= ($typeFilter === 'all') ? 'bg-[#FFF4F8] text-[#ED709E] border border-[#FCEAF2]' : 'text-[#6F6F6F] hover:bg-gray-100' ?>">
        All Media (<?= $stats['total'] ?>)
    </a>
    <a href="<?= base_url('admin/gallery?type=image') ?>" class="px-4 py-2 rounded-xl text-xs font-bold font-display transition-all <?= ($typeFilter === 'image') ? 'bg-[#FFF4F8] text-[#ED709E] border border-[#FCEAF2]' : 'text-[#6F6F6F] hover:bg-gray-100' ?>">
        📷 Photos Only (<?= $stats['images'] ?>)
    </a>
    <a href="<?= base_url('admin/gallery?type=video') ?>" class="px-4 py-2 rounded-xl text-xs font-bold font-display transition-all <?= ($typeFilter === 'video') ? 'bg-[#FFF4F8] text-[#ED709E] border border-[#FCEAF2]' : 'text-[#6F6F6F] hover:bg-gray-100' ?>">
        🎬 Videos Only (<?= $stats['videos'] ?>)
    </a>
</div>

<!-- Media Cards Grid -->
<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php if (empty($items)): ?>
        <div class="col-span-full bg-white rounded-2xl p-12 text-center border border-[#EDEDED]">
            <svg class="w-16 h-16 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <h3 class="text-base font-bold text-gray-900 mb-1">No media items found</h3>
            <p class="text-xs text-gray-500 mb-5">Start by uploading photos or videos to showcase your clinic &amp; results.</p>
            <a href="<?= base_url('admin/gallery/create') ?>" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-[#ED709E] text-white text-xs font-semibold">
                + Upload Media
            </a>
        </div>
    <?php else: ?>
        <?php foreach ($items as $item): ?>
            <div class="bg-white rounded-2xl border border-[#EDEDED] overflow-hidden shadow-2xs hover:shadow-md transition-all flex flex-col group">
                <!-- Preview Thumbnail / Video Badge -->
                <div class="relative aspect-[16/10] bg-gray-100 overflow-hidden">
                    <img
                        src="<?= esc($item['thumbnail_url'] ?: $item['file_url']) ?>"
                        alt="<?= esc($item['title']) ?>"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        loading="lazy"
                    />

                    <!-- Type Badge -->
                    <div class="absolute top-3 left-3">
                        <?php if ($item['type'] === 'video'): ?>
                            <span class="inline-flex items-center gap-1 bg-purple-600/90 backdrop-blur-xs text-white text-[11px] font-bold px-2.5 py-1 rounded-full shadow-sm">
                                <svg class="w-3 h-3 fill-current" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                                Video
                            </span>
                        <?php else: ?>
                            <span class="inline-flex items-center gap-1 bg-pink-600/90 backdrop-blur-xs text-white text-[11px] font-bold px-2.5 py-1 rounded-full shadow-sm">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Photo
                            </span>
                        <?php endif; ?>
                    </div>

                    <!-- Status Pill -->
                    <div class="absolute top-3 right-3">
                        <span class="px-2.5 py-0.5 rounded-full text-[10.5px] font-bold shadow-xs <?= $item['is_active'] ? 'bg-emerald-500 text-white' : 'bg-gray-700/80 text-gray-200' ?>">
                            <?= $item['is_active'] ? 'Live' : 'Hidden' ?>
                        </span>
                    </div>

                    <!-- Category Overlay -->
                    <div class="absolute bottom-3 left-3">
                        <span class="bg-black/60 backdrop-blur-xs text-white text-[11px] font-medium px-2.5 py-0.5 rounded-md">
                            <?= esc($item['category']) ?>
                        </span>
                    </div>
                </div>

                <!-- Info Body -->
                <div class="p-5 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="font-display font-bold text-gray-900 text-[15px] mb-1.5 leading-snug line-clamp-2">
                            <?= esc($item['title']) ?>
                        </h3>
                        <?php if (!empty($item['description'])): ?>
                            <p class="text-xs text-gray-500 line-clamp-2 mb-4 leading-relaxed">
                                <?= esc($item['description']) ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <!-- Card Actions -->
                    <div class="pt-4 border-t border-gray-100 flex items-center justify-between gap-2 mt-3">
                        <a href="<?= base_url('admin/gallery/toggle-status/' . $item['id']) ?>"
                           class="text-xs font-semibold px-2.5 py-1.5 rounded-lg border transition-colors <?= $item['is_active'] ? 'border-amber-200 text-amber-700 hover:bg-amber-50' : 'border-emerald-200 text-emerald-700 hover:bg-emerald-50' ?>"
                           title="Toggle visibility">
                            <?= $item['is_active'] ? 'Hide' : 'Activate' ?>
                        </a>

                        <div class="flex items-center gap-1.5">
                            <a href="<?= base_url('admin/gallery/edit/' . $item['id']) ?>" class="p-1.5 text-gray-600 hover:text-pink-600 hover:bg-pink-50 rounded-lg transition-colors" title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>

                            <form action="<?= base_url('admin/gallery/delete/' . $item['id']) ?>" method="POST" class="inline" onsubmit="return confirm('Delete this media item permanently?');">
                                <?= csrf_field() ?>
                                <button type="submit" class="p-1.5 text-gray-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-colors" title="Delete">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
