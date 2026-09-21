const footerLinks = [
  { label: 'Home', href: '#home' },
  { label: 'About', href: '#about' },
  { label: 'Treatments', href: '#services' },
  { label: 'IVF Journey', href: '#ivf-journey' },
  { label: 'Patient Stories', href: '#testimonials' },
  { label: 'Blog', href: '#blog' },
  { label: 'Contact', href: '#contact' },
  { label: 'Privacy Policy', href: '#' },
  { label: 'Terms & Conditions', href: '#' },
];

export default function Footer() {
  return (
    <footer className="bg-[#252525] text-white">
      <div className="max-w-[1280px] mx-auto px-6 lg:px-8 py-14">
        <div className="grid lg:grid-cols-3 gap-10 mb-10">
          {/* Brand */}
          <div>
            <div style={{ fontFamily: 'DM Sans, sans-serif' }} className="text-[18px] font-700 mb-1">Dr. Meetu Bhushan</div>
            <div className="text-[12px] text-[#ED709E] tracking-[0.5px] uppercase mb-4">
              IVF Specialist · Fertility Consultant · Gynecologist
            </div>
            <p className="text-[13.5px] text-[#9E9E9E] leading-[1.75] max-w-[300px]">
              Dedicated to helping individuals and couples navigate their fertility journey with compassionate, personalized care.
            </p>

            {/* Socials */}
            <div className="flex gap-3 mt-6">
              {[
                { label: 'Instagram', href: '#', icon: 'M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z' },
                { label: 'Facebook', href: '#', icon: 'M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z' },
                { label: 'YouTube', href: '#', icon: 'M23.495 6.205a3.007 3.007 0 00-2.088-2.088c-1.87-.501-9.396-.501-9.396-.501s-7.507-.01-9.396.501A3.007 3.007 0 00.527 6.205a31.247 31.247 0 00-.522 5.805 31.247 31.247 0 00.522 5.783 3.007 3.007 0 002.088 2.088c1.868.502 9.396.502 9.396.502s7.506 0 9.396-.502a3.007 3.007 0 002.088-2.088 31.247 31.247 0 00.5-5.783 31.247 31.247 0 00-.5-5.805zM9.609 15.601V8.408l6.264 3.602z' },
              ].map((s) => (
                <a
                  key={s.label}
                  href={s.href}
                  aria-label={s.label}
                  className="w-9 h-9 rounded-full bg-white/10 hover:bg-[#ED709E] flex items-center justify-center transition-colors duration-200"
                >
                  <svg width="15" height="15" viewBox="0 0 24 24" fill="white">
                    <path d={s.icon} />
                  </svg>
                </a>
              ))}
            </div>
          </div>

          {/* Links */}
          <div>
            <div style={{ fontFamily: 'DM Sans, sans-serif' }} className="text-[13px] font-700 text-white mb-5 uppercase tracking-[1px]">Quick Links</div>
            <div className="grid grid-cols-2 gap-x-4 gap-y-2">
              {footerLinks.map((link) => (
                <a
                  key={link.label}
                  href={link.href}
                  className="text-[13.5px] text-[#9E9E9E] hover:text-[#ED709E] transition-colors"
                >
                  {link.label}
                </a>
              ))}
            </div>
          </div>

          {/* Services */}
          <div>
            <div style={{ fontFamily: 'DM Sans, sans-serif' }} className="text-[13px] font-700 text-white mb-5 uppercase tracking-[1px]">Treatments</div>
            <div className="space-y-2">
              {['IVF Treatment', 'IUI Treatment', 'Fertility Assessment', 'Fertility Preservation', 'PCOS & Infertility', 'Reproductive Health'].map((t) => (
                <a key={t} href="#services" className="block text-[13.5px] text-[#9E9E9E] hover:text-[#ED709E] transition-colors">
                  {t}
                </a>
              ))}
            </div>
          </div>
        </div>

        <div className="border-t border-white/10 pt-7 flex flex-col sm:flex-row items-center justify-between gap-4">
          <p className="text-[12.5px] text-[#9E9E9E]">
            © 2026 Dr. Meetu Bhushan. All Rights Reserved.
          </p>
          <p className="text-[12px] text-[#9E9E9E]">
            IVF Specialist · Fertility Consultant · Gynecologist
          </p>
        </div>
      </div>
    </footer>
  );
}
