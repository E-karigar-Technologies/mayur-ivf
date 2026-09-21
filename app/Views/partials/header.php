<?php
$navLinks = [
    ['label' => 'Home', 'href' => '#home'],
    ['label' => 'About Dr. Meetu', 'href' => '#about'],
    ['label' => 'Fertility Treatments', 'href' => '#services'],
    ['label' => 'IVF Journey', 'href' => '#ivf-journey'],
    ['label' => 'Patient Stories', 'href' => '#testimonials'],
    ['label' => 'Blog', 'href' => '#blog'],
    ['label' => 'Contact', 'href' => '#contact'],
];
?>

<header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-white/95 backdrop-blur-md">
    <div class="max-w-[1280px] mx-auto px-6 lg:px-8">
        <div class="flex items-center justify-between h-[72px]">
            <!-- Logo -->
            <a href="#home" class="flex items-center gap-2 group py-1">
                <img
                    src="<?= base_url('images/logo.png') ?>"
                    alt="Mayor's IVF — A Unit Of Mayors Eye Clinic & Fertility Centre"
                    class="h-[44px] sm:h-[48px] w-auto object-contain transition-transform duration-200 group-hover:scale-[1.02]"
                />
            </a>

            <!-- Desktop Nav -->
            <nav class="hidden lg:flex items-center gap-7">
                <?php foreach ($navLinks as $link): ?>
                    <a
                        href="<?= $link['href'] ?>"
                        class="text-[13.5px] font-medium text-[#6F6F6F] hover:text-[#ED709E] transition-colors duration-200 font-display"
                    >
                        <?= esc($link['label']) ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <!-- Desktop CTA -->
            <a
                href="#book"
                class="hidden lg:inline-flex items-center gap-2 bg-[#ED709E] hover:bg-[#e05a8a] text-white text-[13.5px] font-semibold px-5 py-2.5 rounded-full transition-all duration-200 shadow-sm hover:shadow-md font-display"
            >
                Book Consultation
            </a>

            <!-- Mobile Hamburger Button -->
            <button
                id="mobile-menu-btn"
                class="lg:hidden flex flex-col gap-1.5 p-2 focus:outline-none"
                aria-label="Toggle navigation menu"
            >
                <span class="block w-6 h-0.5 bg-[#252525] transition-all duration-200 origin-center"></span>
                <span class="block w-6 h-0.5 bg-[#252525] transition-all duration-200"></span>
                <span class="block w-6 h-0.5 bg-[#252525] transition-all duration-200 origin-center"></span>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Drawer Navigation -->
<div
    id="mobile-menu"
    class="fixed inset-0 z-40 lg:hidden opacity-0 pointer-events-none transition-all duration-300"
>
    <!-- Backdrop -->
    <div id="mobile-menu-backdrop" class="absolute inset-0 bg-black/20 backdrop-blur-xs"></div>
    
    <!-- Drawer Panel -->
    <div class="mobile-drawer absolute top-0 right-0 w-[290px] h-full bg-white shadow-2xl flex flex-col pt-6 pb-8 px-6 translate-x-full transition-transform duration-300 overflow-y-auto">
        <div class="pb-4 mb-2 border-b border-[#EDEDED]">
            <img
                src="<?= base_url('images/logo.png') ?>"
                alt="Mayor's IVF"
                class="h-[40px] w-auto object-contain"
            />
        </div>
        <nav class="flex flex-col gap-1">
            <?php foreach ($navLinks as $link): ?>
                <a
                    href="<?= $link['href'] ?>"
                    class="mobile-nav-link text-[15px] font-medium text-[#252525] hover:text-[#ED709E] py-3 border-b border-[#EDEDED] transition-colors font-display"
                >
                    <?= esc($link['label']) ?>
                </a>
            <?php endforeach; ?>
            <a
                href="#book"
                class="mobile-nav-link mt-6 inline-flex justify-center bg-[#ED709E] hover:bg-[#e05a8a] text-white text-[14px] font-semibold py-3 rounded-full font-display transition-colors"
            >
                Book Appointment
            </a>
        </nav>
    </div>
</div>

<!-- Mobile Floating CTA Button -->
<a
    href="#book"
    class="fixed bottom-6 right-6 z-40 lg:hidden bg-[#ED709E] text-white text-[13px] font-semibold px-5 py-3 rounded-full shadow-lg hover:bg-[#e05a8a] transition-all font-display"
>
    Book Appointment
</a>
