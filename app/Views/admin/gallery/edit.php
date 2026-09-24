<?= $this->extend('admin/layouts/admin') ?>

<?= $this->section('content') ?>
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-8 flex items-center justify-between">
        <div>
            <div class="flex items-center gap-2 text-xs font-semibold text-[#6F6F6F] mb-1 font-display">
                <a href="<?= base_url('admin/gallery') ?>" class="hover:text-[#ED709E] transition-colors">Gallery</a>
                <span>/</span>
                <span class="text-[#252525]">Edit Item</span>
            </div>
            <h1 class="text-2xl font-bold text-gray-900 font-display">Edit Gallery Media</h1>
        </div>

        <a href="<?= base_url('admin/gallery') ?>" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl border border-gray-200 text-xs font-semibold text-gray-700 hover:bg-gray-50 transition-colors">
            ← Back to Gallery
        </a>
    </div>

    <!-- Edit Form Card -->
    <div class="bg-white rounded-3xl border border-[#EDEDED] shadow-sm p-6 sm:p-8">
        <form action="<?= base_url('admin/gallery/update/' . $item['id']) ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
            <?= csrf_field() ?>

            <!-- Current Preview Strip -->
            <div class="p-4 rounded-2xl bg-gray-50 border border-gray-200 flex items-center gap-4">
                <div class="w-24 h-16 rounded-xl overflow-hidden bg-gray-200 flex-shrink-0 relative">
                    <img src="<?= esc($item['thumbnail_url'] ?: $item['file_url']) ?>" alt="Preview" class="w-full h-full object-cover">
                    <?php if ($item['type'] === 'video'): ?>
                        <div class="absolute inset-0 bg-black/40 flex items-center justify-center text-white">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="overflow-hidden">
                    <span class="inline-block text-[11px] font-bold uppercase px-2 py-0.5 rounded <?= $item['type'] === 'video' ? 'bg-purple-100 text-purple-700' : 'bg-pink-100 text-pink-700' ?> mb-1">
                        Current <?= ucfirst($item['type']) ?>
                    </span>
                    <div class="text-xs text-gray-600 truncate"><?= esc($item['file_url']) ?></div>
                </div>
            </div>

            <!-- Media Type Selector -->
            <div>
                <label class="block text-sm font-bold text-gray-900 mb-3 font-display">Media Type</label>
                <div class="grid grid-cols-2 gap-4">
                    <label class="relative flex items-center gap-3 p-4 rounded-2xl border-2 cursor-pointer transition-all <?= $item['type'] === 'image' ? 'border-pink-500 bg-pink-50/40' : 'border-gray-200' ?>" id="label-type-image">
                        <input type="radio" name="type" value="image" <?= $item['type'] === 'image' ? 'checked' : '' ?> onchange="switchMediaType('image')" class="accent-pink-500 w-4 h-4">
                        <div>
                            <div class="font-bold text-sm text-gray-900 font-display">📷 Photo / Image</div>
                        </div>
                    </label>

                    <label class="relative flex items-center gap-3 p-4 rounded-2xl border-2 cursor-pointer transition-all <?= $item['type'] === 'video' ? 'border-purple-500 bg-purple-50/40' : 'border-gray-200' ?>" id="label-type-video">
                        <input type="radio" name="type" value="video" <?= $item['type'] === 'video' ? 'checked' : '' ?> onchange="switchMediaType('video')" class="accent-purple-600 w-4 h-4">
                        <div>
                            <div class="font-bold text-sm text-gray-900 font-display">🎬 Video</div>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Title & Category -->
            <div class="grid sm:grid-cols-3 gap-4">
                <div class="sm:col-span-2">
                    <label for="title" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2 font-display">Title / Caption *</label>
                    <input type="text" id="title" name="title" value="<?= old('title', $item['title']) ?>" required
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-pink-500 text-sm">
                </div>

                <div>
                    <label for="category" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2 font-display">Category *</label>
                    <select id="category" name="category" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-pink-500 text-sm">
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= esc($cat) ?>" <?= (old('category', $item['category']) === $cat) ? 'selected' : '' ?>><?= esc($cat) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- SECTION: Image Replacement -->
            <div id="section-image" class="<?= $item['type'] === 'image' ? '' : 'hidden' ?> space-y-4 p-5 rounded-2xl bg-[#FFF4F8] border border-[#FCEAF2]">
                <h3 class="font-bold text-sm text-gray-900 font-display">Replace Image (Optional)</h3>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1.5">Upload New Image File</label>
                    <input type="file" name="image_file" accept="image/*"
                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-white text-sm file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-pink-100 file:text-pink-700">
                </div>

                <div>
                    <label for="image_url" class="block text-xs font-semibold text-gray-700 mb-1.5">Or Image URL</label>
                    <input type="url" id="image_url" name="image_url" value="<?= old('image_url', $item['type'] === 'image' ? $item['file_url'] : '') ?>"
                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-pink-500 text-sm">
                </div>
            </div>

            <!-- SECTION: Video Replacement -->
            <div id="section-video" class="<?= $item['type'] === 'video' ? '' : 'hidden' ?> space-y-4 p-5 rounded-2xl bg-purple-50/50 border border-purple-100">
                <h3 class="font-bold text-sm text-gray-900 font-display">Replace Video (Optional)</h3>

                <div>
                    <label for="video_url" class="block text-xs font-semibold text-gray-700 mb-1.5">YouTube / Video URL</label>
                    <input type="url" id="video_url" name="video_url" value="<?= old('video_url', $item['type'] === 'video' ? $item['file_url'] : '') ?>"
                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-purple-500 text-sm">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1.5">Or Upload New Video File (.mp4, .webm)</label>
                    <input type="file" name="video_file" accept="video/mp4,video/webm,video/quicktime"
                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-white text-sm file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-purple-100 file:text-purple-700">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1.5">New Video Poster / Thumbnail (Optional)</label>
                    <input type="file" name="thumbnail_file" accept="image/*"
                           class="w-full px-4 py-2 rounded-xl border border-gray-200 bg-white text-sm">
                </div>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2 font-display">Description</label>
                <textarea id="description" name="description" rows="3"
                          class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-pink-500 text-sm"><?= old('description', $item['description']) ?></textarea>
            </div>

            <!-- Settings -->
            <div class="grid sm:grid-cols-2 gap-4 pt-2 border-t border-gray-100 items-center">
                <div>
                    <label for="sort_order" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1 font-display">Display Order</label>
                    <input type="number" id="sort_order" name="sort_order" value="<?= old('sort_order', $item['sort_order']) ?>" min="0"
                           class="w-32 px-4 py-2 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-pink-500 text-sm">
                </div>

                <div class="sm:text-right">
                    <label class="inline-flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" <?= $item['is_active'] ? 'checked' : '' ?> class="w-4 h-4 accent-pink-500 rounded">
                        <span class="text-sm font-bold text-gray-900 font-display">Publish Live on Website</span>
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-4 border-t border-gray-100 flex items-center justify-end gap-3">
                <a href="<?= base_url('admin/gallery') ?>" class="px-5 py-2.5 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-100 transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-7 py-3 rounded-xl text-white font-semibold text-sm shadow-md transition-all duration-200 hover:opacity-95 font-display" style="background: linear-gradient(135deg, #ED709E 0%, #D84E80 100%);">
                    Update Media
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function switchMediaType(type) {
    const secImage = document.getElementById('section-image');
    const secVideo = document.getElementById('section-video');
    const lblImage = document.getElementById('label-type-image');
    const lblVideo = document.getElementById('label-type-video');

    if (type === 'image') {
        secImage.classList.remove('hidden');
        secVideo.classList.add('hidden');
        lblImage.classList.add('border-pink-500', 'bg-pink-50/40');
        lblImage.classList.remove('border-gray-200');
        lblVideo.classList.remove('border-purple-500', 'bg-purple-50/40');
        lblVideo.classList.add('border-gray-200');
    } else {
        secImage.classList.add('hidden');
        secVideo.classList.remove('hidden');
        lblVideo.classList.add('border-purple-500', 'bg-purple-50/40');
        lblVideo.classList.remove('border-gray-200');
        lblImage.classList.remove('border-pink-500', 'bg-pink-50/40');
        lblImage.classList.add('border-gray-200');
    }
}
</script>
<?= $this->endSection() ?>
