<?= $this->extend('admin/layouts/admin') ?>

<?= $this->section('content') ?>

<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-3xl p-6 lg:p-8 border border-[#EDEDED] shadow-2xs">
        <!-- Header -->
        <div class="flex items-center justify-between pb-6 mb-6 border-b border-[#EDEDED]">
            <div>
                <h3 class="font-display text-[20px] font-bold text-[#252525]">Create New Article</h3>
                <p class="text-[13px] text-[#6F6F6F] mt-0.5">Publish a new fertility guide or IVF insight</p>
            </div>
            <a
                href="<?= base_url('admin/blogs') ?>"
                class="text-[13px] font-semibold text-[#6F6F6F] hover:text-[#ED709E] font-display"
            >
                ← Back to Articles
            </a>
        </div>

        <!-- Validation Errors -->
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-700 text-[13.5px]">
                <div class="font-bold mb-1">Please correct the following errors:</div>
                <ul class="list-disc list-inside space-y-0.5">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('admin/blogs/store') ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
            <?= csrf_field() ?>

            <!-- Title & Slug -->
            <div class="space-y-4">
                <div>
                    <label for="title" class="block text-[13px] font-bold text-[#252525] mb-2 font-display">Article Title *</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="<?= old('title') ?>"
                        required
                        placeholder="e.g. Understanding IVF: Complete Step-by-Step Guide"
                        class="w-full border border-[#EDEDED] rounded-xl px-4 py-3 text-[14.5px] text-[#252525] focus:outline-none focus:border-[#ED709E] focus:ring-3 focus:ring-[#ED709E]/10 transition-all font-display font-semibold"
                        oninput="generateSlug(this.value)"
                    />
                </div>

                <div>
                    <label for="slug" class="block text-[12.5px] font-bold text-[#6F6F6F] mb-1 font-display">URL Slug</label>
                    <div class="flex items-center gap-2">
                        <span class="text-[13px] text-[#6F6F6F] font-mono hidden sm:inline">/blog/</span>
                        <input
                            type="text"
                            id="slug"
                            name="slug"
                            value="<?= old('slug') ?>"
                            placeholder="understanding-ivf-complete-guide"
                            class="w-full border border-[#EDEDED] rounded-xl px-3.5 py-2 text-[13px] text-[#252525] font-mono bg-gray-50/50 focus:outline-none focus:border-[#ED709E] transition-all"
                        />
                    </div>
                </div>
            </div>

            <!-- Category, Author, Read Time -->
            <div class="grid sm:grid-cols-3 gap-4">
                <div>
                    <label for="category" class="block text-[13px] font-bold text-[#252525] mb-2 font-display">Category *</label>
                    <select
                        id="category"
                        name="category"
                        required
                        class="w-full border border-[#EDEDED] rounded-xl px-3.5 py-2.5 text-[13.5px] text-[#252525] focus:outline-none focus:border-[#ED709E] transition-all"
                    >
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= esc($cat) ?>" <?= old('category') === $cat ? 'selected' : '' ?>><?= esc($cat) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label for="author" class="block text-[13px] font-bold text-[#252525] mb-2 font-display">Author Name</label>
                    <input
                        type="text"
                        id="author"
                        name="author"
                        value="<?= old('author', 'Dr. Meetu Bhushan') ?>"
                        class="w-full border border-[#EDEDED] rounded-xl px-3.5 py-2.5 text-[13.5px] text-[#252525] focus:outline-none focus:border-[#ED709E] transition-all"
                    />
                </div>

                <div>
                    <label for="read_time" class="block text-[13px] font-bold text-[#252525] mb-2 font-display">Estimated Read Time</label>
                    <input
                        type="text"
                        id="read_time"
                        name="read_time"
                        value="<?= old('read_time', '5 min read') ?>"
                        placeholder="e.g. 5 min read"
                        class="w-full border border-[#EDEDED] rounded-xl px-3.5 py-2.5 text-[13.5px] text-[#252525] focus:outline-none focus:border-[#ED709E] transition-all"
                    />
                </div>
            </div>

            <!-- Featured Image -->
            <div>
                <label class="block text-[13px] font-bold text-[#252525] mb-2 font-display">Featured Image</label>
                <div class="grid sm:grid-cols-2 gap-4">
                    <div>
                        <span class="text-[12px] text-[#6F6F6F] block mb-1">Image URL (Unsplash or direct link)</span>
                        <input
                            type="url"
                            name="img_url"
                            value="<?= old('img_url') ?>"
                            placeholder="https://images.unsplash.com/..."
                            class="w-full border border-[#EDEDED] rounded-xl px-3.5 py-2.5 text-[13px] text-[#252525] focus:outline-none focus:border-[#ED709E] transition-all"
                        />
                    </div>
                    <div>
                        <span class="text-[12px] text-[#6F6F6F] block mb-1">Or Upload Image file</span>
                        <input
                            type="file"
                            name="img_file"
                            accept="image/*"
                            class="w-full border border-[#EDEDED] rounded-xl px-3.5 py-2 text-[12.5px] text-[#252525] file:mr-3 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-[12px] file:font-semibold file:bg-[#FFF4F8] file:text-[#ED709E] hover:file:bg-[#FCEAF2] cursor-pointer"
                        />
                    </div>
                </div>
            </div>

            <!-- Excerpt / Short Summary -->
            <div>
                <label for="desc" class="block text-[13px] font-bold text-[#252525] mb-2 font-display">Short Excerpt / Summary *</label>
                <textarea
                    id="desc"
                    name="desc"
                    rows="2"
                    required
                    placeholder="Brief 1-2 sentence overview of the article shown in previews..."
                    class="w-full border border-[#EDEDED] rounded-xl px-4 py-3 text-[13.5px] text-[#252525] focus:outline-none focus:border-[#ED709E] focus:ring-3 focus:ring-[#ED709E]/10 transition-all resize-none"
                ><?= old('desc') ?></textarea>
            </div>

            <!-- Full Article Content -->
            <div>
                <label for="content" class="block text-[13px] font-bold text-[#252525] mb-2 font-display">Full Article Content *</label>
                <textarea
                    id="content"
                    name="content"
                    rows="10"
                    required
                    placeholder="Write your article content here (supports Markdown paragraphs, headings like ### Step 1, and bullet points)..."
                    class="w-full border border-[#EDEDED] rounded-xl px-4 py-3 text-[14px] text-[#252525] focus:outline-none focus:border-[#ED709E] focus:ring-3 focus:ring-[#ED709E]/10 transition-all font-mono leading-[1.6]"
                ><?= old('content') ?></textarea>
            </div>

            <!-- Toggles: Featured & Published -->
            <div class="flex flex-wrap items-center gap-6 pt-4 border-t border-[#EDEDED]">
                <label class="flex items-center gap-2.5 cursor-pointer">
                    <input
                        type="checkbox"
                        name="is_published"
                        value="1"
                        checked
                        class="w-4 h-4 rounded text-[#ED709E] focus:ring-[#ED709E] accent-[#ED709E]"
                    />
                    <span class="text-[13.5px] font-bold text-[#252525] font-display">Publish immediately</span>
                </label>

                <label class="flex items-center gap-2.5 cursor-pointer">
                    <input
                        type="checkbox"
                        name="is_featured"
                        value="1"
                        class="w-4 h-4 rounded text-[#ED709E] focus:ring-[#ED709E] accent-[#ED709E]"
                    />
                    <span class="text-[13.5px] font-semibold text-[#6F6F6F] font-display">Mark as Featured Guide</span>
                </label>
            </div>

            <!-- Action Buttons -->
            <div class="pt-4 flex items-center justify-end gap-3 border-t border-[#EDEDED]">
                <a
                    href="<?= base_url('admin/blogs') ?>"
                    class="px-6 py-2.5 rounded-full border border-[#EDEDED] text-[13.5px] font-semibold text-[#6F6F6F] hover:bg-gray-50 transition-colors font-display"
                >
                    Cancel
                </a>
                <button
                    type="submit"
                    class="bg-[#ED709E] hover:bg-[#e05a8a] text-white font-display font-semibold text-[14px] px-7 py-2.5 rounded-full transition-all shadow-sm hover:shadow-md cursor-pointer"
                >
                    Publish Article
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function generateSlug(text) {
    const slugInput = document.getElementById('slug');
    if (slugInput && !slugInput.dataset.manual) {
        slugInput.value = text.toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-+|-+$/g, '');
    }
}
</script>

<?= $this->endSection() ?>
