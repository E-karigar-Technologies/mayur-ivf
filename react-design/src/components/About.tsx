const credentials = [
  { label: 'MBBS', sub: 'Bachelor of Medicine & Surgery' },
  { label: 'MS (OBG)', sub: 'Obstetrics & Gynaecology' },
  { label: 'IVF Specialist', sub: 'Assisted Reproductive Technology' },
  { label: '17+ Years', sub: 'Clinical Experience' },
  { label: 'Reproductive Health', sub: 'Complete Gynecological Care' },
  { label: 'Advanced Fertility', sub: 'Personalized Treatment' },
];

export default function About() {
  return (
    <section id="about" className="py-20 lg:py-28 bg-white">
      <div className="max-w-[1280px] mx-auto px-6 lg:px-8">
        <div className="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">
          {/* Image */}
          <div className="relative">
            <div className="rounded-[28px] overflow-hidden aspect-[3/4] max-w-[440px] bg-[#FCEAF2]">
              <img
                src="https://images.unsplash.com/photo-1758691463198-dc663b8a64e4?w=800&h=1067&fit=crop&auto=format"
                alt="Dr. Meetu Bhushan in consultation"
                className="w-full h-full object-cover"
              />
            </div>
            {/* Accent elements */}
            <div className="absolute -bottom-6 -right-6 w-36 h-36 bg-[#FFF4F8] rounded-[20px] -z-10" />
            <div className="absolute -top-4 -left-4 w-20 h-20 bg-[#FCEAF2] rounded-full -z-10" />
          </div>

          {/* Content */}
          <div>
            <p className="text-[11px] font-600 tracking-[2px] text-[#ED709E] uppercase mb-4">
              Meet Dr. Meetu Bhushan
            </p>
            <h2
              style={{ fontFamily: 'DM Sans, sans-serif' }}
              className="text-[36px] lg:text-[44px] font-800 text-[#252525] leading-[1.1] tracking-[-1px] mb-6"
            >
              Expertise With a{' '}
              <span className="text-[#ED709E]">Human Touch</span>
            </h2>
            <p className="text-[16px] text-[#6F6F6F] leading-[1.75] mb-8">
              Dr. Meetu Bhushan is an experienced IVF specialist, fertility consultant and gynecologist dedicated to helping individuals and couples navigate their fertility journey with clarity, compassion and personalized medical care.
            </p>

            {/* Credentials grid */}
            <div className="grid grid-cols-2 gap-3 mb-8">
              {credentials.map((c, i) => (
                <div key={i} className="flex items-start gap-3 bg-[#FFF4F8] rounded-xl p-3.5">
                  <div className="w-1.5 h-1.5 rounded-full bg-[#ED709E] mt-2 flex-shrink-0" />
                  <div>
                    <div style={{ fontFamily: 'DM Sans, sans-serif' }} className="text-[13.5px] font-700 text-[#252525]">{c.label}</div>
                    <div className="text-[11.5px] text-[#6F6F6F]">{c.sub}</div>
                  </div>
                </div>
              ))}
            </div>

            <a
              href="#contact"
              className="inline-flex items-center gap-2 border-2 border-[#ED709E] text-[#ED709E] hover:bg-[#ED709E] hover:text-white text-[14px] font-600 px-7 py-3 rounded-full transition-all duration-200"
              style={{ fontFamily: 'DM Sans, sans-serif' }}
            >
              Know More About Dr. Meetu
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/></svg>
            </a>
          </div>
        </div>
      </div>
    </section>
  );
}
