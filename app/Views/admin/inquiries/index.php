<?= $this->extend('admin/layouts/admin') ?>

<?= $this->section('content') ?>

<div class="bg-white rounded-3xl p-6 lg:p-8 border border-[#EDEDED] shadow-2xs">
    <!-- Header & Filter Tabs -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-[#EDEDED]">
        <div>
            <h3 class="font-display text-[20px] font-bold text-[#252525]">Patient Consultations &amp; Queries</h3>
            <p class="text-[13px] text-[#6F6F6F] mt-0.5">Manage appointment requests and follow-ups submitted through the website</p>
        </div>

        <!-- Status Filter Pills -->
        <div class="flex flex-wrap items-center gap-1.5 bg-[#FBFBFB] p-1.5 rounded-2xl border border-[#EDEDED]">
            <?php
            $tabs = [
                'All'       => $counts['total'] ?? 0,
                'New'       => $counts['new'] ?? 0,
                'Contacted' => $counts['contacted'] ?? 0,
                'Scheduled' => $counts['scheduled'] ?? 0,
                'Completed' => $counts['completed'] ?? 0,
            ];
            ?>
            <?php foreach ($tabs as $status => $count): ?>
                <a
                    href="<?= base_url('admin/inquiries?status=' . $status) ?>"
                    class="px-3.5 py-1.5 rounded-xl text-[12.5px] font-semibold font-display transition-all flex items-center gap-1.5 <?= ($activeStatus ?? 'All') === $status ? 'bg-white text-[#ED709E] shadow-xs border border-[#EDEDED]' : 'text-[#6F6F6F] hover:text-[#252525]' ?>"
                >
                    <span><?= esc($status) ?></span>
                    <span class="text-[11px] px-1.5 py-0.2 rounded-full <?= ($activeStatus ?? 'All') === $status ? 'bg-[#FFF4F8] text-[#ED709E]' : 'bg-gray-200/70 text-gray-700' ?>">
                        <?= $count ?>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Inquiries Table -->
    <?php if (empty($inquiries)): ?>
        <div class="py-20 text-center text-[#6F6F6F]">
            <div class="w-14 h-14 rounded-full bg-[#FFF4F8] text-[#ED709E] flex items-center justify-center mx-auto mb-3">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                </svg>
            </div>
            <h4 class="font-display text-[16px] font-bold text-[#252525] mb-1">No inquiries found</h4>
            <p class="text-[13px]">There are no inquiries matching the "<?= esc($activeStatus) ?>" filter.</p>
        </div>
    <?php else: ?>
        <div class="overflow-x-auto mt-4">
            <table class="w-full text-left text-[13.5px]">
                <thead>
                    <tr class="border-b border-[#EDEDED] text-[11.5px] font-bold uppercase tracking-[0.5px] text-[#6F6F6F] font-display">
                        <th class="py-3 px-3">ID</th>
                        <th class="py-3 px-3">Patient Name</th>
                        <th class="py-3 px-3">Contact Details</th>
                        <th class="py-3 px-3">Treatment Type</th>
                        <th class="py-3 px-3">Preferred Date</th>
                        <th class="py-3 px-3">Status</th>
                        <th class="py-3 px-3">Submitted</th>
                        <th class="py-3 px-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#EDEDED]/70">
                    <?php foreach ($inquiries as $inq): ?>
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="py-4 px-3 font-semibold text-[#6F6F6F]">#<?= esc($inq['id']) ?></td>
                            <td class="py-4 px-3">
                                <div class="font-bold text-[#252525]"><?= esc($inq['name']) ?></div>
                                <div class="text-[12px] text-[#6F6F6F]"><?= $inq['age'] ? esc($inq['age']) . ' yrs' : 'Age not provided' ?></div>
                            </td>
                            <td class="py-4 px-3">
                                <div class="text-[#252525] font-medium"><?= esc($inq['phone']) ?></div>
                                <div class="text-[12px] text-[#6F6F6F]"><?= esc($inq['email']) ?></div>
                            </td>
                            <td class="py-4 px-3">
                                <span class="inline-block text-[11px] font-bold text-[#ED709E] bg-[#FFF4F8] px-2.5 py-0.5 rounded-full border border-[#FCEAF2]">
                                    <?= esc($inq['consultation_type'] ?: 'General Consultation') ?>
                                </span>
                            </td>
                            <td class="py-4 px-3 text-[#252525]">
                                <?= $inq['appointment_date'] ? date('M d, Y', strtotime($inq['appointment_date'])) : '<span class="text-[#6F6F6F]">Flexible</span>' ?>
                            </td>
                            <td class="py-4 px-3">
                                <form action="<?= base_url('admin/inquiries/update-status/' . $inq['id']) ?>" method="POST" class="inline-block">
                                    <?= csrf_field() ?>
                                    <select
                                        name="status"
                                        onchange="this.form.submit()"
                                        class="text-[11.5px] font-bold rounded-full px-2.5 py-1 border cursor-pointer focus:outline-none transition-colors <?php
                                            switch($inq['status']) {
                                                case 'New': echo 'bg-amber-50 text-amber-700 border-amber-200'; break;
                                                case 'Contacted': echo 'bg-blue-50 text-blue-700 border-blue-200'; break;
                                                case 'Scheduled': echo 'bg-purple-50 text-purple-700 border-purple-200'; break;
                                                case 'Completed': echo 'bg-green-50 text-green-700 border-green-200'; break;
                                                default: echo 'bg-gray-50 text-gray-700 border-gray-200'; break;
                                            }
                                        ?>"
                                    >
                                        <?php foreach (['New', 'Contacted', 'Scheduled', 'Completed', 'Cancelled'] as $opt): ?>
                                            <option value="<?= $opt ?>" <?= $inq['status'] === $opt ? 'selected' : '' ?>><?= $opt ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </form>
                            </td>
                            <td class="py-4 px-3 text-[12px] text-[#6F6F6F]">
                                <?= date('M d, Y', strtotime($inq['created_at'])) ?>
                            </td>
                            <td class="py-4 px-3 text-right">
                                <div class="flex items-center justify-end gap-1.5">
                                    <!-- View Message Modal Trigger -->
                                    <button
                                        type="button"
                                        onclick="openInquiryModal(<?= htmlspecialchars(json_encode($inq), ENT_QUOTES, 'UTF-8') ?>)"
                                        class="p-2 text-[#6F6F6F] hover:text-[#ED709E] hover:bg-[#FFF4F8] rounded-xl transition-colors"
                                        title="View Message Details"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>

                                    <!-- WhatsApp Trigger -->
                                    <a
                                        href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $inq['phone']) ?>?text=Hello%20<?= urlencode($inq['name']) ?>%2C%20greetings%20from%20Mayor%27s%20IVF%20Clinic."
                                        target="_blank"
                                        class="p-2 text-green-600 hover:bg-green-50 rounded-xl transition-colors"
                                        title="WhatsApp"
                                    >
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.316 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.818-.981z"/>
                                        </svg>
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="<?= base_url('admin/inquiries/delete/' . $inq['id']) ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this inquiry?');" class="inline-block">
                                        <?= csrf_field() ?>
                                        <button
                                            type="submit"
                                            class="p-2 text-red-500 hover:bg-red-50 rounded-xl transition-colors"
                                            title="Delete"
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

<!-- Modal for Viewing Inquiry Details -->
<div id="inquiry-modal" class="fixed inset-0 z-50 bg-black/40 backdrop-blur-xs hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-lg w-full p-6 lg:p-8 shadow-2xl relative border border-[#EDEDED] animate-in fade-in zoom-in duration-200">
        <button
            type="button"
            onclick="closeInquiryModal()"
            class="absolute top-6 right-6 p-2 rounded-full text-[#6F6F6F] hover:bg-gray-100 transition-colors"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <div class="flex items-center gap-3 mb-5">
            <div class="w-12 h-12 rounded-2xl bg-[#FFF4F8] text-[#ED709E] flex items-center justify-center font-bold text-[16px] font-display" id="modal-initials">
                P
            </div>
            <div>
                <h4 class="font-display text-[18px] font-bold text-[#252525]" id="modal-name">Patient Name</h4>
                <div class="text-[12.5px] text-[#6F6F6F]" id="modal-subtitle">Consultation Type</div>
            </div>
        </div>

        <div class="space-y-4 py-4 border-y border-[#EDEDED] text-[13.5px]">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <span class="text-[11.5px] uppercase font-bold text-[#6F6F6F] block">Phone Number</span>
                    <span class="text-[#252525] font-semibold" id="modal-phone">+91 00000 00000</span>
                </div>
                <div>
                    <span class="text-[11.5px] uppercase font-bold text-[#6F6F6F] block">Email Address</span>
                    <span class="text-[#252525] font-semibold truncate block" id="modal-email">patient@example.com</span>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <span class="text-[11.5px] uppercase font-bold text-[#6F6F6F] block">Preferred Date</span>
                    <span class="text-[#252525] font-semibold" id="modal-date">Flexible</span>
                </div>
                <div>
                    <span class="text-[11.5px] uppercase font-bold text-[#6F6F6F] block">Patient Age</span>
                    <span class="text-[#252525] font-semibold" id="modal-age">30 yrs</span>
                </div>
            </div>

            <div>
                <span class="text-[11.5px] uppercase font-bold text-[#6F6F6F] block mb-1">Patient Concern / Note</span>
                <div class="bg-[#FFF4F8] p-4 rounded-2xl border border-[#EDEDED] text-[#252525] leading-[1.6]" id="modal-message">
                    No message provided.
                </div>
            </div>
        </div>

        <!-- Modal Action Footer -->
        <div class="pt-6 flex items-center justify-end gap-3">
            <a
                id="modal-wa-link"
                href="#"
                target="_blank"
                class="inline-flex items-center gap-2 bg-[#25D366] hover:bg-[#20ba59] text-white text-[13.5px] font-semibold px-5 py-2.5 rounded-full transition-all font-display"
            >
                <span>WhatsApp Patient</span>
            </a>
            <a
                id="modal-call-link"
                href="#"
                class="inline-flex items-center gap-2 bg-[#ED709E] hover:bg-[#e05a8a] text-white text-[13.5px] font-semibold px-5 py-2.5 rounded-full transition-all font-display"
            >
                <span>Call Directly</span>
            </a>
        </div>
    </div>
</div>

<script>
function openInquiryModal(inq) {
    document.getElementById('modal-name').textContent = inq.name;
    document.getElementById('modal-subtitle').textContent = (inq.consultation_type || 'Consultation') + ' • ' + (inq.status || 'New');
    document.getElementById('modal-phone').textContent = inq.phone;
    document.getElementById('modal-email').textContent = inq.email;
    document.getElementById('modal-date').textContent = inq.appointment_date || 'Flexible / Not specified';
    document.getElementById('modal-age').textContent = inq.age ? inq.age + ' years old' : 'Not specified';
    document.getElementById('modal-message').textContent = inq.message || 'No additional notes provided by patient.';
    document.getElementById('modal-initials').textContent = (inq.name.charAt(0) || 'P').toUpperCase();

    const cleanPhone = (inq.phone || '').replace(/[^0-9]/g, '');
    document.getElementById('modal-wa-link').href = `https://wa.me/${cleanPhone}?text=Hello%20${encodeURIComponent(inq.name)}%2C%20greetings%20from%20Mayor%27s%20IVF%20Clinic.`;
    document.getElementById('modal-call-link').href = `tel:${inq.phone}`;

    document.getElementById('inquiry-modal').classList.remove('hidden');
}

function closeInquiryModal() {
    document.getElementById('inquiry-modal').classList.add('hidden');
}
</script>

<?= $this->endSection() ?>
