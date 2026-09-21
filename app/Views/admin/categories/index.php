<?= $this->extend('admin/layouts/admin') ?>

<?= $this->section('content') ?>
<div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-gray-900 flex items-center gap-2">
            <svg class="w-7 h-7 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
            </svg>
            Categories Management
        </h1>
        <p class="text-sm text-gray-500 mt-1">Add, update, or remove dynamic blog and article categories.</p>
    </div>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="mb-6 bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-r-xl flex items-center gap-3">
        <svg class="w-5 h-5 text-emerald-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
        </svg>
        <span class="text-sm font-medium text-emerald-800"><?= session()->getFlashdata('success') ?></span>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="mb-6 bg-rose-50 border-l-4 border-rose-500 p-4 rounded-r-xl flex items-center gap-3">
        <svg class="w-5 h-5 text-rose-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
        </svg>
        <span class="text-sm font-medium text-rose-800"><?= session()->getFlashdata('error') ?></span>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('errors')): ?>
    <div class="mb-6 bg-rose-50 border-l-4 border-rose-500 p-4 rounded-r-xl">
        <p class="text-sm font-semibold text-rose-800 mb-1">Please fix the following errors:</p>
        <ul class="list-disc list-inside text-sm text-rose-700">
            <?php foreach (session()->getFlashdata('errors') as $err): ?>
                <li><?= esc($err) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
    <!-- Left Column: Add Category Form -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center gap-2 mb-4 pb-3 border-b border-gray-100">
            <div class="w-8 h-8 rounded-lg bg-pink-50 flex items-center justify-center text-pink-600 font-bold text-lg">+</div>
            <h2 class="text-lg font-bold text-gray-900">Add New Category</h2>
        </div>

        <form action="<?= base_url('admin/categories/store') ?>" method="POST" class="space-y-4">
            <?= csrf_field() ?>

            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-1">Category Name <span class="text-rose-500">*</span></label>
                <input type="text" id="name" name="name" value="<?= old('name') ?>" required placeholder="e.g. Laparoscopy, Genetics"
                       class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent text-sm">
            </div>

            <div>
                <label for="slug" class="block text-sm font-semibold text-gray-700 mb-1">Slug <span class="text-xs font-normal text-gray-400">(Optional, auto-generated)</span></label>
                <input type="text" id="slug" name="slug" value="<?= old('slug') ?>" placeholder="e.g. laparoscopy"
                       class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent text-sm">
            </div>

            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Description <span class="text-xs font-normal text-gray-400">(Optional)</span></label>
                <textarea id="description" name="description" rows="3" placeholder="Brief details about what articles belong here..."
                          class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent text-sm"><?= old('description') ?></textarea>
            </div>

            <button type="submit" class="w-full py-3 px-4 rounded-xl text-white font-semibold text-sm shadow-md transition-all duration-200 flex items-center justify-center gap-2 hover:opacity-95" style="background: linear-gradient(135deg, #ED709E 0%, #D84E80 100%);">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Create Category
            </button>
        </form>
    </div>

    <!-- Right Column: Existing Categories List Table -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-bold text-gray-900">Existing Categories</h2>
                <p class="text-xs text-gray-500 mt-0.5">Total <?= count($categories) ?> categories available</p>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="bg-gray-50 text-xs uppercase font-semibold text-gray-500 tracking-wider">
                    <tr>
                        <th class="py-3.5 px-6">Category</th>
                        <th class="py-3.5 px-6">Description</th>
                        <th class="py-3.5 px-6 text-center">Articles</th>
                        <th class="py-3.5 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php if (empty($categories)): ?>
                        <tr>
                            <td colspan="4" class="py-8 text-center text-gray-400">
                                No categories found. Add your first category using the form on the left.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($categories as $cat): ?>
                            <tr class="hover:bg-pink-50/20 transition-colors">
                                <td class="py-4 px-6">
                                    <div class="font-bold text-gray-900"><?= esc($cat['name']) ?></div>
                                    <span class="inline-block mt-0.5 px-2 py-0.5 text-xs bg-gray-100 text-gray-500 rounded font-mono">
                                        <?= esc($cat['slug']) ?>
                                    </span>
                                </td>
                                <td class="py-4 px-6 max-w-xs text-xs text-gray-500 truncate">
                                    <?= esc($cat['description'] ?? '-') ?: '-' ?>
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold <?= ($cat['posts_count'] ?? 0) > 0 ? 'bg-pink-100 text-pink-700' : 'bg-gray-100 text-gray-500' ?>">
                                        <?= $cat['posts_count'] ?? 0 ?> post<?= ($cat['posts_count'] ?? 0) === 1 ? '' : 's' ?>
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-right space-x-2">
                                    <button type="button" 
                                            onclick="openEditModal(<?= $cat['id'] ?>, '<?= esc($cat['name'], 'js') ?>', '<?= esc($cat['slug'], 'js') ?>', '<?= esc($cat['description'] ?? '', 'js') ?>')"
                                            class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg border border-gray-200 text-xs font-medium text-gray-700 hover:bg-gray-50 hover:text-pink-600 transition-colors">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Edit
                                    </button>

                                    <form action="<?= base_url('admin/categories/delete/' . $cat['id']) ?>" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete \'<?= esc($cat['name'], 'js') ?>\'? Any existing articles will be assigned to General.');">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-lg border border-rose-200 text-xs font-medium text-rose-600 hover:bg-rose-50 transition-colors">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Edit Category Modal -->
<div id="editModal" class="fixed inset-0 z-50 hidden bg-black/40 backdrop-blur-sm items-center justify-center p-4 flex">
    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 w-full max-w-md p-6 relative animate-in fade-in zoom-in duration-150">
        <div class="flex items-center justify-between pb-3 border-b border-gray-100 mb-4">
            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                <svg class="w-5 h-5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                Edit Category
            </h3>
            <button type="button" onclick="closeEditModal()" class="text-gray-400 hover:text-gray-600 text-2xl leading-none">&times;</button>
        </div>

        <form id="editCategoryForm" method="POST" class="space-y-4">
            <?= csrf_field() ?>

            <div>
                <label for="edit_name" class="block text-sm font-semibold text-gray-700 mb-1">Category Name <span class="text-rose-500">*</span></label>
                <input type="text" id="edit_name" name="name" required
                       class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent text-sm">
            </div>

            <div>
                <label for="edit_slug" class="block text-sm font-semibold text-gray-700 mb-1">Slug</label>
                <input type="text" id="edit_slug" name="slug"
                       class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent text-sm">
            </div>

            <div>
                <label for="edit_description" class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
                <textarea id="edit_description" name="description" rows="3"
                          class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent text-sm"></textarea>
            </div>

            <div class="flex items-center justify-end gap-3 pt-3 border-t border-gray-100">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-100 transition-colors">
                    Cancel
                </button>
                <button type="submit" class="px-5 py-2 rounded-xl text-white font-semibold text-sm shadow transition-all duration-200 hover:opacity-95" style="background: linear-gradient(135deg, #ED709E 0%, #D84E80 100%);">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openEditModal(id, name, slug, description) {
    document.getElementById('edit_name').value = name;
    document.getElementById('edit_slug').value = slug;
    document.getElementById('edit_description').value = description;
    document.getElementById('editCategoryForm').action = '<?= base_url('admin/categories/update') ?>/' + id;
    
    const modal = document.getElementById('editModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeEditModal() {
    const modal = document.getElementById('editModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// Close modal on click outside
window.onclick = function(event) {
    const modal = document.getElementById('editModal');
    if (event.target === modal) {
        closeEditModal();
    }
}
</script>
<?= $this->endSection() ?>
