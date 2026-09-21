const services = [
  {
    icon: (
      <svg width="28" height="28" viewBox="0 0 28 28" fill="none" stroke="#ED709E" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round">
        <path d="M14 2C7.373 2 2 7.373 2 14s5.373 12 12 12 12-5.373 12-12S20.627 2 14 2z"/>
        <path d="M14 9v5l3 3"/>
      </svg>
    ),
    title: 'IVF Treatment',
    desc: 'Advanced assisted reproductive treatment with personalized protocols and expert monitoring throughout your cycle.',
  },
  {
    icon: (
      <svg width="28" height="28" viewBox="0 0 28 28" fill="none" stroke="#ED709E" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round">
        <path d="M12 2a10 10 0 100 20A10 10 0 0012 2z"/>
        <path d="M8 12s1.5-2 4-2 4 2 4 2"/>
        <path d="M9 9h.01M15 9h.01"/>
      </svg>
    ),
    title: 'IUI Treatment',
    desc: 'A minimally invasive fertility treatment option for suitable candidates seeking assisted conception.',
  },
  {
    icon: (
      <svg width="28" height="28" viewBox="0 0 28 28" fill="none" stroke="#ED709E" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round">
        <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/>
        <rect x="9" y="3" width="10" height="4" rx="2"/>
        <path d="M9 12h6M9 16h4"/>
      </svg>
    ),
    title: 'Fertility Assessment',
    desc: 'Comprehensive evaluation to understand your fertility profile and the most suitable treatment pathway.',
  },
  {
    icon: (
      <svg width="28" height="28" viewBox="0 0 28 28" fill="none" stroke="#ED709E" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round">
        <path d="M20 7l-8 8-4-4"/>
        <path d="M5 21h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z"/>
      </svg>
    ),
    title: 'Fertility Preservation',
    desc: 'Options for preserving reproductive potential — egg, sperm or embryo freezing for the future.',
  },
  {
    icon: (
      <svg width="28" height="28" viewBox="0 0 28 28" fill="none" stroke="#ED709E" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round">
        <circle cx="14" cy="14" r="10"/>
        <path d="M14 10v4l2.5 2.5"/>
      </svg>
    ),
    title: 'PCOS & Infertility',
    desc: 'Specialized fertility guidance for patients experiencing PCOS-related hormonal and ovulatory challenges.',
  },
  {
    icon: (
      <svg width="28" height="28" viewBox="0 0 28 28" fill="none" stroke="#ED709E" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round">
        <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
      </svg>
    ),
    title: 'Reproductive Health',
    desc: 'Complete gynecological and reproductive health support for women at every stage of life.',
  },
];

export default function Services() {
  return (
    <section id="services" className="py-20 lg:py-28 bg-[#FFF4F8]">
      <div className="max-w-[1280px] mx-auto px-6 lg:px-8">
        <div className="text-center mb-14">
          <p className="text-[11px] font-600 tracking-[2px] text-[#ED709E] uppercase mb-4">What We Offer</p>
          <h2
            style={{ fontFamily: 'DM Sans, sans-serif' }}
            className="text-[36px] lg:text-[44px] font-800 text-[#252525] leading-[1.1] tracking-[-1px] mb-4"
          >
            Comprehensive Fertility Care
          </h2>
          <p className="text-[16px] text-[#6F6F6F] max-w-[500px] mx-auto">
            Personalized treatment pathways designed around your individual fertility needs.
          </p>
        </div>

        <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
          {services.map((s, i) => (
            <div
              key={i}
              className="group bg-white rounded-2xl p-7 border border-[#EDEDED] hover:border-[#ED709E] hover:shadow-lg transition-all duration-300 cursor-pointer"
            >
              <div className="w-12 h-12 rounded-xl bg-[#FFF4F8] flex items-center justify-center mb-5 group-hover:bg-[#FCEAF2] transition-colors">
                {s.icon}
              </div>
              <h3 style={{ fontFamily: 'DM Sans, sans-serif' }} className="text-[18px] font-700 text-[#252525] mb-2.5">
                {s.title}
              </h3>
              <p className="text-[14px] text-[#6F6F6F] leading-[1.65] mb-5">{s.desc}</p>
              <div className="flex items-center gap-2 text-[#ED709E] text-[13px] font-600">
                Learn more
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" className="group-hover:translate-x-1 transition-transform">
                  <path d="M2.5 7h9M8 3.5l3.5 3.5L8 10.5" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/>
                </svg>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
