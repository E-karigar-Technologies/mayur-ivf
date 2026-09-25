<?= $this->extend('admin/layouts/admin') ?>

<?= $this->section('content') ?>

<!-- Metric Stat Cards -->
<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Inquiries -->
    <div class="bg-white rounded-3xl p-6 border border-[#EDEDED] shadow-2xs">
        <div class="flex items-center justify-between mb-4">
            <span class="text-[12px] font-bold tracking-[0.5px] uppercase text-[#6F6F6F] font-display">Total Inquiries</span>
            <div class="w-10 h-10 rounded-2xl bg-[#FFF4F8] text-[#ED709E] flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                </svg>
            </div>
        </div>
        <div class="font-display text-[30px] font-extrabold text-[#252525] leading-none mb-2">
            <?= esc($inquiryCounts['total'] ?? 0) ?>
        </div>
        <div class="text-[12px] text-[#6F6F6F]">
            Form leads received
        </div>
    </div>

    <!-- New / Unread Queries -->
    <div class="bg-white rounded-3xl p-6 border border-[#EDEDED] shadow-2xs">
        <div class="flex items-center justify-between mb-4">
            <span class="text-[12px] font-bold tracking-[0.5px] uppercase text-[#ED709E] font-display">New Queries</span>
            <div class="w-10 h-10 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
        </div>
        <div class="font-display text-[30px] font-extrabold text-[#ED709E] leading-none mb-2">
            <?= esc($inquiryCounts['new'] ?? 0) ?>
        </div>
        <div class="text-[12px] text-[#6F6F6F]">
            Awaiting response
        </div>
    </div>

    <!-- Scheduled Appointments -->
    <div class="bg-white rounded-3xl p-6 border border-[#EDEDED] shadow-2xs">
        <div class="flex items-center justify-between mb-4">
            <span class="text-[12px] font-bold tracking-[0.5px] uppercase text-[#6F6F6F] font-display">Scheduled</span>
            <div class="w-10 h-10 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
        </div>
        <div class="font-display text-[30px] font-extrabold text-[#252525] leading-none mb-2">
            <?= esc($inquiryCounts['scheduled'] ?? 0) ?>
        </div>
        <div class="text-[12px] text-[#6F6F6F]">
            Confirmed visits
        </div>
    </div>

    <!-- Published Articles -->
    <div class="bg-white rounded-3xl p-6 border border-[#EDEDED] shadow-2xs">
        <div class="flex items-center justify-between mb-4">
            <span class="text-[12px] font-bold tracking-[0.5px] uppercase text-[#6F6F6F] font-display">Articles</span>
            <div class="w-10 h-10 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
            </div>
        </div>
        <div class="font-display text-[30px] font-extrabold text-[#252525] leading-none mb-2">
            <?= esc($totalBlogs ?? 0) ?>
        </div>
        <div class="text-[12px] text-[#6F6F6F]">
            Published blogs
        </div>
    </div>
</div>

<!-- Main Sections Grid: Recent Inquiries + Recent Articles -->
<div class="grid lg:grid-cols-12 gap-8">
    <!-- Left Column: Recent Inquiries -->
    <div class="lg:col-span-8 bg-white rounded-3xl p-6 lg:p-8 border border-[#EDEDED] shadow-2xs">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h3 class="font-display text-[18px] font-bold text-[#252525]">Recent Consultation Inquiries</h3>
                <p class="text-[13px] text-[#6F6F6F] mt-0.5">Latest leads and appointment requests from website</p>
            </div>
            <a
                href="<?= base_url('admin/inquiries') ?>"
                class="text-[13px] font-semibold text-[#ED709E] hover:underline font-display"
            >
                View All Inquiries →
            </a>
        </div>

        <?php if (empty($recentInquiries)): ?>
            <div class="py-12 text-center text-[#6F6F6F]">
                <p class="text-[14px]">No consultation inquiries received yet.</p>
            </div>
        <?php else: ?>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-[13.5px]">
                    <thead>
                        <tr class="border-b border-[#EDEDED] text-[11.5px] font-bold uppercase tracking-[0.5px] text-[#6F6F6F] font-display">
                            <th class="pb-3">Patient</th>
                            <th class="pb-3">Contact</th>
                            <th class="pb-3">Type</th>
                            <th class="pb-3">Status</th>
                            <th class="pb-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#EDEDED]/60">
                        <?php foreach ($recentInquiries as $inq): ?>
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="py-3.5 pr-3">
                                    <div class="font-bold text-[#252525]"><?= esc($inq['name']) ?></div>
                                    <div class="text-[12px] text-[#6F6F6F]"><?= $inq['age'] ? esc($inq['age']) . ' yrs' : 'Age N/A' ?></div>
                                </td>
                                <td class="py-3.5 pr-3">
                                    <div class="text-[#252525] font-medium"><?= esc($inq['phone']) ?></div>
                                    <div class="text-[12px] text-[#6F6F6F] truncate max-w-[140px]"><?= esc($inq['email']) ?></div>
                                </td>
                                <td class="py-3.5 pr-3">
                                    <span class="inline-block text-[11px] font-bold text-[#ED709E] bg-[#FFF4F8] px-2.5 py-0.5 rounded-full border border-[#FCEAF2]">
                                        <?= esc($inq['consultation_type'] ?: 'General') ?>
                                    </span>
                                </td>
                                <td class="py-3.5 pr-3">
                                    <?php
                                    $statusClasses = [
                                        'New'       => 'bg-amber-50 text-amber-700 border-amber-200',
                                        'Contacted' => 'bg-blue-50 text-blue-700 border-blue-200',
                                        'Scheduled' => 'bg-purple-50 text-purple-700 border-purple-200',
                                        'Completed' => 'bg-green-50 text-green-700 border-green-200',
                                    ];
                                    $cls = $statusClasses[$inq['status']] ?? 'bg-gray-100 text-gray-700 border-gray-200';
                                    ?>
                                    <span class="inline-block text-[11.5px] font-bold px-2.5 py-0.5 rounded-full border <?= $cls ?>">
                                        <?= esc($inq['status']) ?>
                                    </span>
                                </td>
                                <td class="py-3.5 text-right">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <!-- WhatsApp Trigger -->
                                        <a
                                            href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $inq['phone']) ?>?text=Hello%20<?= urlencode($inq['name']) ?>%2C%20greetings%20from%20Mayor%27s%20IVF%20Clinic."
                                            target="_blank"
                                            title="Chat on WhatsApp"
                                            class="p-1.5 text-green-600 hover:bg-green-50 rounded-lg transition-colors"
                                        >
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.316 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.818-.981z"/>
                                            </svg>
                                        </a>
                                        <!-- Call Trigger -->
                                        <a
                                            href="tel:<?= esc($inq['phone']) ?>"
                                            title="Call"
                                            class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V17a2 2 0 01-2 2h-1C9.716 19 3 12.284 3 4V3z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <!-- Right Column: Recent Articles & Quick Actions -->
    <div class="lg:col-span-4 space-y-6">
        <!-- Quick Action Box -->
        <div class="bg-gradient-to-br from-[#ED709E] to-[#e05a8a] rounded-3xl p-6 text-white shadow-md">
            <h4 class="font-display text-[18px] font-bold mb-2">Publish New Article</h4>
            <p class="text-[13px] text-white/90 mb-5 leading-[1.6]">
                Share fertility insights, treatment updates, and patient advice directly on the website.
            </p>
            <a
                href="<?= base_url('admin/blogs/create') ?>"
                class="inline-flex items-center gap-2 bg-white text-[#ED709E] hover:bg-white/95 font-display font-semibold text-[13.5px] px-5 py-2.5 rounded-full transition-all shadow-xs"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                <span>Add New Post</span>
            </a>
        </div>

        <!-- Recent Blog Posts -->
        <div class="bg-white rounded-3xl p-6 border border-[#EDEDED] shadow-2xs">
            <div class="flex items-center justify-between mb-4">
                <h4 class="font-display text-[16px] font-bold text-[#252525]">Recent Blogs</h4>
                <a href="<?= base_url('admin/blogs') ?>" class="text-[12px] font-semibold text-[#ED709E] hover:underline font-display">Manage</a>
            </div>

            <div class="divide-y divide-[#EDEDED]/70">
                <?php foreach ($recentBlogs as $b): ?>
                    <div class="py-3 flex items-center justify-between gap-3">
                        <div class="overflow-hidden">
                            <div class="font-display text-[13.5px] font-bold text-[#252525] truncate">
                                <?= esc($b['title']) ?>
                            </div>
                            <div class="text-[11.5px] text-[#6F6F6F] flex items-center gap-2 mt-0.5">
                                <span><?= esc($b['category']) ?></span>
                                <span>•</span>
                                <span><?= $b['is_published'] ? '<span class="text-green-600 font-semibold">Published</span>' : '<span class="text-amber-600 font-semibold">Draft</span>' ?></span>
                            </div>
                        </div>
                        <a
                            href="<?= base_url('admin/blogs/edit/' . $b['id']) ?>"
                            class="p-1.5 text-[#6F6F6F] hover:text-[#ED709E] hover:bg-[#FFF4F8] rounded-lg transition-colors shrink-0"
                            title="Edit"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                            </svg>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
