import { useState, useEffect } from 'react';

const navLinks = [
  { label: 'Home', href: '#home' },
  { label: 'About Dr. Meetu', href: '#about' },
  { label: 'Fertility Treatments', href: '#services' },
  { label: 'IVF Journey', href: '#ivf-journey' },
  { label: 'Patient Stories', href: '#testimonials' },
  { label: 'Blog', href: '#blog' },
  { label: 'Contact', href: '#contact' },
];

export default function Header() {
  const [scrolled, setScrolled] = useState(false);
  const [menuOpen, setMenuOpen] = useState(false);

  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 20);
    window.addEventListener('scroll', onScroll);
    return () => window.removeEventListener('scroll', onScroll);
  }, []);

  return (
    <>
      <header
        className={`fixed top-0 left-0 right-0 z-50 transition-all duration-300 ${
          scrolled ? 'bg-white shadow-sm border-b border-[#EDEDED]' : 'bg-white/95 backdrop-blur-md'
        }`}
      >
        <div className="max-w-[1280px] mx-auto px-6 lg:px-8">
          <div className="flex items-center justify-between h-[72px]">
            {/* Logo */}
            <a href="#home" className="flex flex-col leading-tight">
              <span style={{ fontFamily: 'DM Sans, sans-serif' }} className="text-[18px] font-700 text-[#252525] tracking-[-0.3px]">
                Dr. Meetu Bhushan
              </span>
              <span className="text-[11px] font-400 text-[#ED709E] tracking-[0.5px] uppercase">
                IVF Specialist · Fertility Consultant
              </span>
            </a>

            {/* Desktop Nav */}
            <nav className="hidden lg:flex items-center gap-7">
              {navLinks.map((link) => (
                <a
                  key={link.label}
                  href={link.href}
                  className="text-[13.5px] font-500 text-[#6F6F6F] hover:text-[#ED709E] transition-colors duration-200"
                  style={{ fontFamily: 'DM Sans, sans-serif' }}
                >
                  {link.label}
                </a>
              ))}
            </nav>

            {/* CTA */}
            <a
              href="#book"
              className="hidden lg:inline-flex items-center gap-2 bg-[#ED709E] hover:bg-[#e05a8a] text-white text-[13.5px] font-600 px-5 py-2.5 rounded-full transition-all duration-200 shadow-sm hover:shadow-md"
              style={{ fontFamily: 'DM Sans, sans-serif' }}
            >
              Book Consultation
            </a>

            {/* Mobile hamburger */}
            <button
              className="lg:hidden flex flex-col gap-1.5 p-2"
              onClick={() => setMenuOpen(!menuOpen)}
              aria-label="Toggle menu"
            >
              <span className={`block w-6 h-0.5 bg-[#252525] transition-all duration-200 ${menuOpen ? 'rotate-45 translate-y-2' : ''}`} />
              <span className={`block w-6 h-0.5 bg-[#252525] transition-all duration-200 ${menuOpen ? 'opacity-0' : ''}`} />
              <span className={`block w-6 h-0.5 bg-[#252525] transition-all duration-200 ${menuOpen ? '-rotate-45 -translate-y-2' : ''}`} />
            </button>
          </div>
        </div>
      </header>

      {/* Mobile Menu */}
      <div
        className={`fixed inset-0 z-40 lg:hidden transition-all duration-300 ${
          menuOpen ? 'opacity-100 pointer-events-auto' : 'opacity-0 pointer-events-none'
        }`}
      >
        <div className="absolute inset-0 bg-black/20" onClick={() => setMenuOpen(false)} />
        <div
          className={`absolute top-0 right-0 w-[280px] h-full bg-white shadow-2xl flex flex-col pt-[72px] transition-transform duration-300 ${
            menuOpen ? 'translate-x-0' : 'translate-x-full'
          }`}
        >
          <nav className="flex flex-col px-6 py-6 gap-1">
            {navLinks.map((link) => (
              <a
                key={link.label}
                href={link.href}
                onClick={() => setMenuOpen(false)}
                className="text-[15px] font-500 text-[#252525] hover:text-[#ED709E] py-3 border-b border-[#EDEDED] transition-colors"
                style={{ fontFamily: 'DM Sans, sans-serif' }}
              >
                {link.label}
              </a>
            ))}
            <a
              href="#book"
              onClick={() => setMenuOpen(false)}
              className="mt-6 inline-flex justify-center bg-[#ED709E] text-white text-[14px] font-600 py-3 rounded-full"
              style={{ fontFamily: 'DM Sans, sans-serif' }}
            >
              Book Appointment
            </a>
          </nav>
        </div>
      </div>

      {/* Mobile floating CTA */}
      <a
        href="#book"
        className="fixed bottom-6 right-6 z-40 lg:hidden bg-[#ED709E] text-white text-[13px] font-600 px-5 py-3 rounded-full shadow-lg hover:bg-[#e05a8a] transition-all"
        style={{ fontFamily: 'DM Sans, sans-serif' }}
      >
        Book Appointment
      </a>
    </>
  );
}
