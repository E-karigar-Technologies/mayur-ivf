<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

    <!-- 1. Hero Section -->
    <?= $this->include('sections/hero') ?>

    <!-- 2. Trust Strip -->
    <?= $this->include('sections/trust_strip') ?>

    <!-- 3. About Section -->
    <?= $this->include('sections/about') ?>

    <!-- 4. Services / Treatments -->
    <?= $this->include('sections/services') ?>

    <!-- 5. IVF Journey -->
    <?= $this->include('sections/ivf_journey') ?>

    <!-- 6. Why Choose Us -->
    <?= $this->include('sections/why_choose') ?>

    <!-- 7. Statistics -->
    <?= $this->include('sections/stats') ?>

    <!-- 8. Testimonials -->
    <?= $this->include('sections/testimonials') ?>

    <!-- 9. Frequently Asked Questions -->
    <?= $this->include('sections/faq') ?>

    <!-- 10. Book Appointment Form -->
    <?= $this->include('sections/book_appointment') ?>

    <!-- 11. Blog & Insights -->
    <?= $this->include('sections/blog') ?>

    <!-- 12. Contact & Location -->
    <?= $this->include('sections/contact') ?>

<?= $this->endSection() ?>
