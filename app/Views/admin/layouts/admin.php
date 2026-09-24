<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Admin Panel | Mayor\'s IVF') ?></title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: '#ED709E',
              'primary-hover': '#e05a8a',
              blush: '#FFF4F8',
              'light-pink': '#FCEAF2',
              charcoal: '#252525',
              'gray-muted': '#6F6F6F',
              border: '#EDEDED',
            },
            fontFamily: {
              display: ['"DM Sans"', 'sans-serif'],
              body: ['Inter', 'sans-serif'],
            }
          }
        }
      }
    </script>
</head>
<body class="bg-[#FBFBFB] text-[#252525] font-body min-h-screen flex antialiased">

    <!-- Left Sidebar -->
    <aside id="admin-sidebar" class="fixed inset-y-0 left-0 z-40 w-64 bg-white border-r border-[#EDEDED] flex flex-col transition-transform duration-300 -translate-x-full lg:translate-x-0 shadow-sm">
        <!-- Logo Area -->
        <div class="h-[76px] flex items-center px-6 border-b border-[#EDEDED]">
            <a href="<?= base_url('admin/dashboard') ?>" class="flex items-center gap-2">
                <img
                    src="<?= base_url('images/logo.png') ?>"
                    alt="Mayor's IVF"
                    class="h-[42px] w-auto object-contain"
                />
            </a>
        </div>

        <!-- Navigation Links -->
        <?php
        $uri = service('uri');
        $segments = $uri->getSegments();
        $segment2 = $segments[1] ?? 'dashboard';
        $segment3 = $segments[2] ?? '';
        ?>
        <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
            <div class="px-3 pb-2 text-[11px] font-bold tracking-[1px] text-[#6F6F6F] uppercase font-display">
                Main Menu
            </div>

            <!-- Dashboard -->
            <a
                href="<?= base_url('admin/dashboard') ?>"
                class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-display text-[14px] font-semibold transition-all <?= ($segment2 === 'dashboard' || $segment2 === '') ? 'bg-[#FFF4F8] text-[#ED709E] border border-[#FCEAF2]' : 'text-[#6F6F6F] hover:bg-gray-50 hover:text-[#252525]' ?>"
            >
                <svg class="w-5 h-5 <?= ($segment2 === 'dashboard' || $segment2 === '') ? 'text-[#ED709E]' : 'text-[#6F6F6F]' ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span>Dashboard</span>
            </a>

            <!-- Inquiries -->
            <a
                href="<?= base_url('admin/inquiries') ?>"
                class="flex items-center justify-between px-3.5 py-2.5 rounded-xl font-display text-[14px] font-semibold transition-all <?= ($segment2 === 'inquiries') ? 'bg-[#FFF4F8] text-[#ED709E] border border-[#FCEAF2]' : 'text-[#6F6F6F] hover:bg-gray-50 hover:text-[#252525]' ?>"
            >
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 <?= ($segment2 === 'inquiries') ? 'text-[#ED709E]' : 'text-[#6F6F6F]' ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>Inquiries</span>
                </div>
            </a>

            <div class="pt-4 px-3 pb-2 text-[11px] font-bold tracking-[1px] text-[#6F6F6F] uppercase font-display">
                Content Management
            </div>

            <!-- Blogs List -->
            <a
                href="<?= base_url('admin/blogs') ?>"
                class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-display text-[14px] font-semibold transition-all <?= ($segment2 === 'blogs' && $segment3 !== 'create') ? 'bg-[#FFF4F8] text-[#ED709E] border border-[#FCEAF2]' : 'text-[#6F6F6F] hover:bg-gray-50 hover:text-[#252525]' ?>"
            >
                <svg class="w-5 h-5 <?= ($segment2 === 'blogs' && $segment3 !== 'create') ? 'text-[#ED709E]' : 'text-[#6F6F6F]' ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
                <span>Blog Articles</span>
            </a>

            <!-- Gallery Media -->
            <a
                href="<?= base_url('admin/gallery') ?>"
                class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-display text-[14px] font-semibold transition-all <?= ($segment2 === 'gallery') ? 'bg-[#FFF4F8] text-[#ED709E] border border-[#FCEAF2]' : 'text-[#6F6F6F] hover:bg-gray-50 hover:text-[#252525]' ?>"
            >
                <svg class="w-5 h-5 <?= ($segment2 === 'gallery') ? 'text-[#ED709E]' : 'text-[#6F6F6F]' ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>Gallery Media</span>
            </a>

            <!-- Categories -->
            <a
                href="<?= base_url('admin/categories') ?>"
                class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-display text-[14px] font-semibold transition-all <?= ($segment2 === 'categories') ? 'bg-[#FFF4F8] text-[#ED709E] border border-[#FCEAF2]' : 'text-[#6F6F6F] hover:bg-gray-50 hover:text-[#252525]' ?>"
            >
                <svg class="w-5 h-5 <?= ($segment2 === 'categories') ? 'text-[#ED709E]' : 'text-[#6F6F6F]' ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                </svg>
                <span>Categories</span>
            </a>

            <!-- Add Blog -->
            <a
                href="<?= base_url('admin/blogs/create') ?>"
                class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-display text-[14px] font-semibold transition-all <?= ($segment2 === 'blogs' && $segment3 === 'create') ? 'bg-[#FFF4F8] text-[#ED709E] border border-[#FCEAF2]' : 'text-[#6F6F6F] hover:bg-gray-50 hover:text-[#252525]' ?>"
            >
                <svg class="w-5 h-5 <?= ($segment2 === 'blogs' && $segment3 === 'create') ? 'text-[#ED709E]' : 'text-[#6F6F6F]' ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Add New Article</span>
            </a>

            <div class="pt-4 px-3 pb-2 text-[11px] font-bold tracking-[1px] text-[#6F6F6F] uppercase font-display">
                Quick Shortcuts
            </div>

            <!-- View Live Site -->
            <a
                href="<?= base_url('/') ?>"
                target="_blank"
                class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl font-display text-[14px] font-semibold text-[#6F6F6F] hover:bg-gray-50 hover:text-[#252525] transition-all"
            >
                <svg class="w-5 h-5 text-[#6F6F6F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                <span>Live Website</span>
            </a>
        </nav>

        <!-- User Profile & Logout Box in Sidebar Footer -->
        <div class="p-4 border-t border-[#EDEDED] bg-gray-50/50">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-[#ED709E] text-white flex items-center justify-center font-bold text-[13px] font-display">
                        MB
                    </div>
                    <div class="overflow-hidden">
                        <div class="font-display text-[13px] font-bold text-[#252525] truncate">
                            <?= esc(session()->get('admin_name') ?? 'Administrator') ?>
                        </div>
                        <div class="text-[11px] text-[#6F6F6F] truncate">
                            <?= esc(session()->get('admin_email') ?? 'admin@mayurivf.com') ?>
                        </div>
                    </div>
                </div>
                <a
                    href="<?= base_url('admin/logout') ?>"
                    title="Logout"
                    class="p-2 text-[#6F6F6F] hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                </a>
            </div>
        </div>
    </aside>

    <!-- Mobile Backdrop -->
    <div id="sidebar-backdrop" class="fixed inset-0 z-30 bg-black/20 backdrop-blur-xs hidden lg:hidden"></div>

    <!-- Main Content Wrapper -->
    <div class="flex-1 lg:pl-64 flex flex-col min-h-screen">
        <!-- Top Navigation Bar -->
        <header class="h-[76px] bg-white border-b border-[#EDEDED] sticky top-0 z-20 px-6 flex items-center justify-between shadow-2xs">
            <div class="flex items-center gap-4">
                <!-- Mobile Menu Button -->
                <button
                    id="sidebar-toggle-btn"
                    type="button"
                    class="lg:hidden p-2 rounded-xl border border-[#EDEDED] text-[#252525] hover:bg-gray-50 focus:outline-none"
                    aria-label="Toggle sidebar"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <h2 class="font-display text-[18px] font-bold text-[#252525]">
                    <?= esc($title ?? 'Admin Dashboard') ?>
                </h2>
            </div>

            <!-- Top Actions -->
            <div class="flex items-center gap-3">
                <a
                    href="<?= base_url('/') ?>"
                    target="_blank"
                    class="hidden sm:inline-flex items-center gap-1.5 text-[13px] font-semibold text-[#6F6F6F] hover:text-[#ED709E] px-3.5 py-1.5 rounded-full border border-[#EDEDED] hover:border-[#ED709E] transition-colors font-display"
                >
                    <span>View Site</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                </a>

                <a
                    href="<?= base_url('admin/logout') ?>"
                    class="inline-flex items-center gap-1.5 bg-red-50 hover:bg-red-100 text-red-600 text-[13px] font-semibold px-3.5 py-1.5 rounded-full transition-colors font-display"
                >
                    <span>Logout</span>
                </a>
            </div>
        </header>

        <!-- Main Body Area -->
        <main class="flex-1 p-6 lg:p-8">
            <!-- Flash Message Banner -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="mb-6 p-4 rounded-2xl bg-green-50 border border-green-200 text-green-800 text-[14px] flex items-center justify-between shadow-2xs">
                    <div class="flex items-center gap-2.5">
                        <svg class="w-5 h-5 text-green-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span><?= session()->getFlashdata('success') ?></span>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-800 text-[14px] flex items-center justify-between shadow-2xs">
                    <div class="flex items-center gap-2.5">
                        <svg class="w-5 h-5 text-red-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span><?= session()->getFlashdata('error') ?></span>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Render Section -->
            <?= $this->renderSection('content') ?>
        </main>
    </div>

    <!-- Mobile Sidebar JavaScript -->
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const toggleBtn = document.getElementById('sidebar-toggle-btn');
        const sidebar = document.getElementById('admin-sidebar');
        const backdrop = document.getElementById('sidebar-backdrop');

        const toggle = () => {
            const isOpen = !sidebar.classList.contains('-translate-x-full');
            if (isOpen) {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.add('hidden');
            } else {
                sidebar.classList.remove('-translate-x-full');
                backdrop.classList.remove('hidden');
            }
        };

        toggleBtn?.addEventListener('click', toggle);
        backdrop?.addEventListener('click', toggle);
    });
    </script>
</body>
</html>
