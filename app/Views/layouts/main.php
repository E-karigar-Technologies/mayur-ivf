<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Dr. Meetu Bhushan | IVF Specialist & Fertility Consultant') ?></title>
    <meta name="description" content="Personalized fertility care and advanced IVF solutions with Dr. Meetu Bhushan. 17+ years experience in reproductive medicine and gynecological care.">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS (Play CDN for full Tailwind utility support) -->
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

    <!-- Custom Style Sheet -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body class="min-h-screen bg-white text-[#252525] antialiased">
    <!-- Header Navigation -->
    <?= $this->include('partials/header') ?>

    <!-- Main Content -->
    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <?= $this->include('partials/footer') ?>

    <!-- Scripts -->
    <script src="<?= base_url('js/main.js') ?>"></script>
</body>
</html>
