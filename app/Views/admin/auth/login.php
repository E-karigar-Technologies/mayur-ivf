<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Admin Login | Mayor\'s IVF') ?></title>
    
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
<body class="min-h-screen bg-[#FFF4F8] font-body flex items-center justify-center p-6 relative overflow-hidden">
    <!-- Decorative background elements -->
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#FCEAF2] rounded-full filter blur-3xl opacity-70 -z-10 pointer-events-none"></div>
    <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-[#ED709E]/10 rounded-full filter blur-3xl opacity-70 -z-10 pointer-events-none"></div>

    <div class="w-full max-w-[440px]">
        <!-- Brand Logo -->
        <div class="text-center mb-8">
            <a href="<?= base_url('/') ?>" class="inline-block bg-white p-3 rounded-2xl shadow-sm border border-[#EDEDED] mb-4 hover:shadow-md transition-shadow">
                <img
                    src="<?= base_url('images/logo.png') ?>"
                    alt="Mayor's IVF"
                    class="h-[46px] w-auto object-contain mx-auto"
                />
            </a>
            <h1 class="font-display text-[24px] font-bold text-[#252525]">Administration Portal</h1>
            <p class="text-[13.5px] text-[#6F6F6F] mt-1">Sign in to manage consultations &amp; published content</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-3xl p-8 shadow-xl border border-[#EDEDED]">
            <!-- Flash Notifications -->
            <?php if (session()->getFlashdata('error')): ?>
                <div class="mb-5 p-3.5 rounded-xl bg-red-50 border border-red-200 text-red-700 text-[13.5px] flex items-center gap-2">
                    <svg class="w-4 h-4 shrink-0 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span><?= session()->getFlashdata('error') ?></span>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="mb-5 p-3.5 rounded-xl bg-green-50 border border-green-200 text-green-700 text-[13.5px] flex items-center gap-2">
                    <svg class="w-4 h-4 shrink-0 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span><?= session()->getFlashdata('success') ?></span>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('admin/authenticate') ?>" method="POST" class="space-y-5">
                <?= csrf_field() ?>

                <div>
                    <label for="email" class="block text-[13px] font-semibold text-[#252525] mb-2 font-display">Email Address</label>
                    <div class="relative">
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="<?= old('email', 'admin@mayurivf.com') ?>"
                            required
                            placeholder="admin@mayurivf.com"
                            class="w-full border border-[#EDEDED] rounded-xl px-4 py-3 pl-11 text-[14px] text-[#252525] focus:outline-none focus:border-[#ED709E] focus:ring-3 focus:ring-[#ED709E]/10 transition-all"
                        />
                        <svg class="w-5 h-5 text-[#6F6F6F] absolute left-3.5 top-3.5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-[13px] font-semibold text-[#252525] mb-2 font-display">Password</label>
                    <div class="relative">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            value="admin123"
                            required
                            placeholder="••••••••"
                            class="w-full border border-[#EDEDED] rounded-xl px-4 py-3 pl-11 text-[14px] text-[#252525] focus:outline-none focus:border-[#ED709E] focus:ring-3 focus:ring-[#ED709E]/10 transition-all"
                        />
                        <svg class="w-5 h-5 text-[#6F6F6F] absolute left-3.5 top-3.5 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                </div>

                <div class="flex items-center justify-between text-[12.5px]">
                    <label class="flex items-center gap-2 text-[#6F6F6F] cursor-pointer">
                        <input type="checkbox" name="remember" checked class="rounded text-[#ED709E] focus:ring-[#ED709E] accent-[#ED709E]" />
                        <span>Remember credentials</span>
                    </label>
                    <span class="text-[#ED709E] font-medium">Secured Session</span>
                </div>

                <button
                    type="submit"
                    class="w-full bg-[#ED709E] hover:bg-[#e05a8a] text-white font-display font-semibold text-[14.5px] py-3.5 rounded-xl transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2 cursor-pointer"
                >
                    <span>Sign In to Dashboard</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </button>
            </form>

            <!-- Quick Demo Credentials Hint -->
            <div class="mt-6 pt-5 border-t border-[#EDEDED] text-center">
                <p class="text-[12px] text-[#6F6F6F]">
                    Default access: <span class="font-semibold text-[#252525]">admin@mayurivf.com</span> / <span class="font-semibold text-[#252525]">admin123</span>
                </p>
            </div>
        </div>

        <div class="text-center mt-6">
            <a href="<?= base_url('/') ?>" class="inline-flex items-center gap-1.5 text-[13px] text-[#6F6F6F] hover:text-[#ED709E] transition-colors font-display">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span>Back to main website</span>
            </a>
        </div>
    </div>
</body>
</html>
