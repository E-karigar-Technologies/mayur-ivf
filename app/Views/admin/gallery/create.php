<?= $this->extend('admin/layouts/admin') ?>

<?= $this->section('content') ?>
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-8 flex items-center justify-between">
        <div>
            <div class="flex items-center gap-2 text-xs font-semibold text-[#6F6F6F] mb-1 font-display">
                <a href="<?= base_url('admin/gallery') ?>" class="hover:text-[#ED709E] transition-colors">Gallery</a>
                <span>/</span>
                <span class="text-[#252525]">Upload Media</span>
            </div>
            <h1 class="text-2xl font-bold text-gray-900 font-display">Add Media to Gallery</h1>
        </div>

        <a href="<?= base_url('admin/gallery') ?>" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl border border-gray-200 text-xs font-semibold text-gray-700 hover:bg-gray-50 transition-colors">
            ← Back to Gallery
        </a>
    </div>

    <!-- Upload Form Card -->
    <div class="bg-white rounded-3xl border border-[#EDEDED] shadow-sm p-6 sm:p-8">
        <form action="<?= base_url('admin/gallery/store') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
            <?= csrf_field() ?>

            <!-- Media Type Selector -->
            <div>
                <label class="block text-sm font-bold text-gray-900 mb-3 font-display">Select Media Type *</label>
                <div class="grid grid-cols-2 gap-4">
                    <label class="relative flex items-center gap-3 p-4 rounded-2xl border-2 cursor-pointer transition-all border-pink-500 bg-pink-50/40" id="label-type-image">
                        <input type="radio" name="type" value="image" checked onchange="switchMediaType('image')" class="accent-pink-500 w-4 h-4">
                        <div>
                            <div class="font-bold text-sm text-gray-900 font-display flex items-center gap-1.5">
                                <span>📷 Photo / Image</span>
                            </div>
                            <div class="text-xs text-gray-500">Upload clinic photos, team pictures, equipment</div>
                        </div>
                    </label>

                    <label class="relative flex items-center gap-3 p-4 rounded-2xl border-2 cursor-pointer transition-all border-gray-200 hover:border-purple-300" id="label-type-video">
                        <input type="radio" name="type" value="video" onchange="switchMediaType('video')" class="accent-purple-600 w-4 h-4">
                        <div>
                            <div class="font-bold text-sm text-gray-900 font-display flex items-center gap-1.5">
                                <span>🎬 Video</span>
                            </div>
                            <div class="text-xs text-gray-500">YouTube link, Vimeo embed, or MP4 video upload</div>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Title & Category -->
            <div class="grid sm:grid-cols-3 gap-4">
                <div class="sm:col-span-2">
                    <label for="title" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2 font-display">Title / Caption *</label>
                    <input type="text" id="title" name="title" value="<?= old('title') ?>" required placeholder="e.g. Advanced Embryology Lab Suite"
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-pink-500 text-sm">
                </div>

                <div>
                    <label for="category" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2 font-display">Category *</label>
                    <select id="category" name="category" required class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-pink-500 text-sm">
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= esc($cat) ?>" <?= old('category') === $cat ? 'selected' : '' ?>><?= esc($cat) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <!-- SECTION: Image Source (Visible when type === image) -->
            <div id="section-image" class="space-y-4 p-5 rounded-2xl bg-[#FFF4F8] border border-[#FCEAF2]">
                <h3 class="font-bold text-sm text-gray-900 font-display flex items-center gap-2">
                    <span>📷 Image File &amp; Source</span>
                </h3>

                <div>
                    <label class="block text-xs font-semibold text-gray-700 mb-1.5">Upload Image File (JPG, PNG, WEBP)</label>
                    <input type="file" name="image_file" accept="image/*"
                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-white text-sm file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-pink-100 file:text-pink-700 hover:file:bg-pink-200">
                    <p class="text-[11.5px] text-gray-500 mt-1">Recommended resolution: 1200x800 px or 16:9 ratio.</p>
                </div>

                <div class="relative flex py-1 items-center">
                    <div class="flex-grow border-t border-gray-200"></div>
                    <span class="flex-shrink mx-3 text-xs text-gray-400 font-medium uppercase">OR paste direct image link</span>
                    <div class="flex-grow border-t border-gray-200"></div>
                </div>

                <div>
                    <label for="image_url" class="block text-xs font-semibold text-gray-700 mb-1.5">External Image URL</label>
                    <input type="url" id="image_url" name="image_url" value="<?= old('image_url') ?>" placeholder="https://images.unsplash.com/photo-..."
                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-pink-500 text-sm">
                </div>
            </div>

            <!-- SECTION: Video Source (Visible when type === video) -->
            <div id="section-video" class="hidden space-y-4 p-5 rounded-2xl bg-purple-50/50 border border-purple-100">
                <h3 class="font-bold text-sm text-gray-900 font-display flex items-center gap-2">
                    <span>🎬 Video File &amp; Embed Source</span>
                </h3>

                <!-- Video input type toggle -->
                <div class="flex items-center gap-4 text-xs font-semibold text-gray-700 mb-2">
                    <label class="inline-flex items-center gap-1.5 cursor-pointer">
                        <input type="radio" name="video_input_type" value="youtube" checked onchange="switchVideoSource('youtube')" class="accent-purple-600">
                        <span>YouTube / Vimeo Link (Recommended)</span>
                    </label>
                    <label class="inline-flex items-center gap-1.5 cursor-pointer">
                        <input type="radio" name="video_input_type" value="upload" onchange="switchVideoSource('upload')" class="accent-purple-600">
                        <span>Upload Video File (MP4/WebM)</span>
                    </label>
                </div>

                <!-- YouTube URL Input -->
                <div id="video-source-youtube">
                    <label for="video_url" class="block text-xs font-semibold text-gray-700 mb-1.5">YouTube / Vimeo Video URL</label>
                    <input type="url" id="video_url" name="video_url" value="<?= old('video_url') ?>" placeholder="https://www.youtube.com/watch?v=... or https://youtu.be/..."
                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:outline-none focus:ring-2 focus:ring-purple-500 text-sm">
                    <p class="text-[11.5px] text-gray-500 mt-1">Embed link and video cover thumbnail are generated automatically.</p>
                </div>

                <!-- Video File Upload -->
                <div id="video-source-upload" class="hidden">
                    <label class="block text-xs font-semibold text-gray-700 mb-1.5">Upload Video File (.mp4, .webm, .mov)</label>
                    <input type="file" name="video_file" accept="video/mp4,video/webm,video/quicktime"
                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-white text-sm file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-purple-100 file:text-purple-700 hover:file:bg-purple-200">
                </div>

                <!-- Custom Thumbnail for video -->
                <div class="pt-3 border-t border-purple-100">
                    <label class="block text-xs font-semibold text-gray-700 mb-1.5">Custom Video Poster / Thumbnail (Optional)</label>
                    <input type="file" name="thumbnail_file" accept="image/*"
                           class="w-full px-4 py-2 rounded-xl border border-gray-200 bg-white text-sm file:mr-4 file:py-1.5 file:px-3 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-gray-100 file:text-gray-700">
                </div>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2 font-display">Description / Story Details (Optional)</label>
                <textarea id="description" name="description" rows="3" placeholder="Brief note about the facility, technique, patient story, or equipment shown..."
                          class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-pink-500 text-sm"><?= old('description') ?></textarea>
            </div>

            <!-- Settings: Sort order & Active status -->
            <div class="grid sm:grid-cols-2 gap-4 pt-2 border-t border-gray-100 items-center">
                <div>
                    <label for="sort_order" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1 font-display">Display Order</label>
                    <input type="number" id="sort_order" name="sort_order" value="<?= old('sort_order', 0) ?>" min="0"
                           class="w-32 px-4 py-2 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-pink-500 text-sm">
                    <span class="text-[11.5px] text-gray-400 ml-2">Lower numbers appear first</span>
                </div>

                <div class="sm:text-right">
                    <label class="inline-flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" checked class="w-4 h-4 accent-pink-500 rounded">
                        <span class="text-sm font-bold text-gray-900 font-display">Publish Live on Website</span>
                    </label>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-4 border-t border-gray-100 flex items-center justify-end gap-3">
                <a href="<?= base_url('admin/gallery') ?>" class="px-5 py-2.5 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-100 transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-7 py-3 rounded-xl text-white font-semibold text-sm shadow-md transition-all duration-200 hover:opacity-95 font-display flex items-center gap-2" style="background: linear-gradient(135deg, #ED709E 0%, #D84E80 100%);">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Save &amp; Publish Media
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

function switchVideoSource(source) {
    const srcYoutube = document.getElementById('video-source-youtube');
    const srcUpload = document.getElementById('video-source-upload');

    if (source === 'upload') {
        srcUpload.classList.remove('hidden');
        srcYoutube.classList.add('hidden');
    } else {
        srcYoutube.classList.remove('hidden');
        srcUpload.classList.add('hidden');
    }
}
</script>
<?= $this->endSection() ?>
