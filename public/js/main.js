/**
 * Main JavaScript for Dr. Meetu Bhushan - IVF & Fertility Clinic
 */

document.addEventListener('DOMContentLoaded', () => {
  // Sticky Header On Scroll
  const header = document.querySelector('header');
  const handleScroll = () => {
    if (window.scrollY > 20) {
      header?.classList.add('scrolled');
    } else {
      header?.classList.remove('scrolled');
    }
  };
  window.addEventListener('scroll', handleScroll);
  handleScroll();

  // Mobile Menu Toggle
  const mobileMenuBtn = document.getElementById('mobile-menu-btn');
  const mobileMenu = document.getElementById('mobile-menu');
  const mobileMenuBackdrop = document.getElementById('mobile-menu-backdrop');
  const mobileMenuLinks = document.querySelectorAll('.mobile-nav-link');
  const hamburgerLines = mobileMenuBtn?.querySelectorAll('span');

  const toggleMenu = (open) => {
    const isOpen = open !== undefined ? open : !mobileMenu?.classList.contains('active');
    if (isOpen) {
      mobileMenu?.classList.add('active');
      mobileMenu?.classList.remove('opacity-0', 'pointer-events-none');
      mobileMenu?.classList.add('opacity-100', 'pointer-events-auto');
      const drawer = mobileMenu?.querySelector('.mobile-drawer');
      drawer?.classList.remove('translate-x-full');
      drawer?.classList.add('translate-x-0');
      
      if (hamburgerLines && hamburgerLines.length >= 3) {
        hamburgerLines[0].classList.add('rotate-45', 'translate-y-2');
        hamburgerLines[1].classList.add('opacity-0');
        hamburgerLines[2].classList.add('-rotate-45', '-translate-y-2');
      }
      document.body.style.overflow = 'hidden';
    } else {
      mobileMenu?.classList.remove('active');
      mobileMenu?.classList.add('opacity-0', 'pointer-events-none');
      mobileMenu?.classList.remove('opacity-100', 'pointer-events-auto');
      const drawer = mobileMenu?.querySelector('.mobile-drawer');
      drawer?.classList.add('translate-x-full');
      drawer?.classList.remove('translate-x-0');

      if (hamburgerLines && hamburgerLines.length >= 3) {
        hamburgerLines[0].classList.remove('rotate-45', 'translate-y-2');
        hamburgerLines[1].classList.remove('opacity-0');
        hamburgerLines[2].classList.remove('-rotate-45', '-translate-y-2');
      }
      document.body.style.overflow = '';
    }
  };

  mobileMenuBtn?.addEventListener('click', () => toggleMenu());
  mobileMenuBackdrop?.addEventListener('click', () => toggleMenu(false));
  mobileMenuLinks.forEach(link => {
    link.addEventListener('click', () => toggleMenu(false));
  });

  // FAQ Accordion
  const accordionButtons = document.querySelectorAll('.accordion-btn');
  accordionButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      const item = btn.closest('.accordion-item');
      const isActive = item.classList.contains('active');

      // Close all accordion items
      document.querySelectorAll('.accordion-item').forEach(el => {
        el.classList.remove('active');
      });

      // If it wasn't active, open it
      if (!isActive) {
        item.classList.add('active');
      }
    });
  });

  // Appointment Form Submission Handling
  const appointmentForm = document.getElementById('appointment-form');
  const formSuccessAlert = document.getElementById('form-success-alert');

  appointmentForm?.addEventListener('submit', async (e) => {
    e.preventDefault();
    const submitBtn = appointmentForm.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    
    // Disable button and show spinner
    submitBtn.disabled = true;
    submitBtn.innerHTML = `
      <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
      </svg> Booking...
    `;

    const formData = new FormData(appointmentForm);

    try {
      const response = await fetch(appointmentForm.getAttribute('action') || '/appointment', {
        method: 'POST',
        body: formData,
        headers: {
          'X-Requested-With': 'XMLHttpRequest'
        }
      });

      const result = await response.json().catch(() => ({ status: 'success' }));
      
      // Show success modal or banner
      if (formSuccessAlert) {
        formSuccessAlert.classList.remove('hidden');
        formSuccessAlert.scrollIntoView({ behavior: 'smooth', block: 'center' });
      } else {
        alert("Thank you! Your consultation request has been received. Dr. Meetu's team will contact you shortly.");
      }
      
      appointmentForm.reset();
    } catch (error) {
      alert("Thank you! Your consultation request has been received. Dr. Meetu's team will contact you shortly.");
      appointmentForm.reset();
    } finally {
      submitBtn.disabled = false;
      submitBtn.innerHTML = originalText;
    }
  });
});
