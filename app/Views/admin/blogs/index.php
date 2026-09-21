<?= $this->extend('admin/layouts/admin') ?>

<?= $this->section('content') ?>

<div class="bg-white rounded-3xl p-6 lg:p-8 border border-[#EDEDED] shadow-2xs">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-[#EDEDED]">
        <div>
            <h3 class="font-display text-[20px] font-bold text-[#252525]">Blog &amp; Knowledge Articles</h3>
            <p class="text-[13px] text-[#6F6F6F] mt-0.5">Manage educational guides, IVF insights, and patient resources</p>
        </div>

        <a
            href="<?= base_url('admin/blogs/create') ?>"
            class="inline-flex items-center gap-2 bg-[#ED709E] hover:bg-[#e05a8a] text-white text-[13.5px] font-semibold px-5 py-2.5 rounded-full transition-all shadow-xs font-display self-start sm:self-auto"
        >
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            <span>Add New Article</span>
        </a>
    </div>

    <!-- Blogs Table -->
    <?php if (empty($blogs)): ?>
        <div class="py-20 text-center text-[#6F6F6F]">
            <div class="w-14 h-14 rounded-full bg-[#FFF4F8] text-[#ED709E] flex items-center justify-center mx-auto mb-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
            </div>
            <h4 class="font-display text-[16px] font-bold text-[#252525] mb-1">No articles published yet</h4>
            <p class="text-[13px] mb-5">Click below to create your very first blog article.</p>
            <a
                href="<?= base_url('admin/blogs/create') ?>"
                class="inline-flex items-center gap-2 bg-[#ED709E] text-white text-[13px] font-semibold px-5 py-2.5 rounded-full font-display"
            >
                Create Article
            </a>
        </div>
    <?php else: ?>
        <div class="overflow-x-auto mt-4">
            <table class="w-full text-left text-[13.5px]">
                <thead>
                    <tr class="border-b border-[#EDEDED] text-[11.5px] font-bold uppercase tracking-[0.5px] text-[#6F6F6F] font-display">
                        <th class="py-3 px-3">Article</th>
                        <th class="py-3 px-3">Category</th>
                        <th class="py-3 px-3">Author</th>
                        <th class="py-3 px-3">Status</th>
                        <th class="py-3 px-3">Date</th>
                        <th class="py-3 px-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#EDEDED]/70">
                    <?php foreach ($blogs as $b): ?>
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="py-4 px-3 max-w-[320px]">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-xl overflow-hidden bg-[#FCEAF2] shrink-0 border border-[#EDEDED]">
                                        <img
                                            src="<?= esc($b['img']) ?>"
                                            alt="<?= esc($b['title']) ?>"
                                            class="w-full h-full object-cover"
                                        />
                                    </div>
                                    <div class="overflow-hidden">
                                        <div class="font-bold text-[#252525] line-clamp-1 hover:text-[#ED709E] transition-colors">
                                            <a href="<?= base_url('admin/blogs/edit/' . $b['id']) ?>">
                                                <?= esc($b['title']) ?>
                                            </a>
                                        </div>
                                        <div class="text-[12px] text-[#6F6F6F] truncate"><?= esc($b['slug']) ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-3">
                                <span class="inline-block text-[11px] font-bold text-[#ED709E] bg-[#FFF4F8] px-2.5 py-0.5 rounded-full border border-[#FCEAF2]">
                                    <?= esc($b['category']) ?>
                                </span>
                            </td>
                            <td class="py-4 px-3 text-[#252525] font-medium">
                                <?= esc($b['author'] ?? 'Dr. Meetu Bhushan') ?>
                            </td>
                            <td class="py-4 px-3">
                                <a
                                    href="<?= base_url('admin/blogs/toggle-status/' . $b['id']) ?>"
                                    class="inline-block text-[11.5px] font-bold px-2.5 py-0.5 rounded-full border transition-colors <?= $b['is_published'] ? 'bg-green-50 text-green-700 border-green-200 hover:bg-green-100' : 'bg-amber-50 text-amber-700 border-amber-200 hover:bg-amber-100' ?>"
                                    title="Click to toggle status"
                                >
                                    <?= $b['is_published'] ? '✓ Published' : 'Draft' ?>
                                </a>
                            </td>
                            <td class="py-4 px-3 text-[12px] text-[#6F6F6F]">
                                <?= !empty($b['created_at']) ? date('M d, Y', strtotime($b['created_at'])) : 'N/A' ?>
                            </td>
                            <td class="py-4 px-3 text-right">
                                <div class="flex items-center justify-end gap-1.5">
                                    <!-- View on Website -->
                                    <a
                                        href="<?= base_url('blog/' . $b['slug']) ?>"
                                        target="_blank"
                                        class="p-2 text-[#6F6F6F] hover:text-[#ED709E] hover:bg-[#FFF4F8] rounded-xl transition-colors"
                                        title="Preview on Website"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                        </svg>
                                    </a>

                                    <!-- Edit Button -->
                                    <a
                                        href="<?= base_url('admin/blogs/edit/' . $b['id']) ?>"
                                        class="p-2 text-[#6F6F6F] hover:text-[#ED709E] hover:bg-[#FFF4F8] rounded-xl transition-colors"
                                        title="Edit Article"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                        </svg>
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="<?= base_url('admin/blogs/delete/' . $b['id']) ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?');" class="inline-block">
                                        <?= csrf_field() ?>
                                        <button
                                            type="submit"
                                            class="p-2 text-red-500 hover:bg-red-50 rounded-xl transition-colors"
                                            title="Delete Article"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>
