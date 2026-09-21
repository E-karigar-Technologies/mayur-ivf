const testimonials = [
  {
    quote:
      'After years of trying, we finally found the guidance and support we needed. Dr. Meetu made every step feel clear and manageable. We are forever grateful.',
    label: 'IVF Patient',
    tag: 'Successful IVF Journey',
  },
  {
    quote:
      "Dr. Meetu's patience and compassion through our fertility journey was unlike anything we had experienced before. She truly cared about our wellbeing, not just our treatment.",
    label: 'Fertility Consultation Patient',
    tag: 'Personalized Care',
  },
  {
    quote:
      'From the first consultation, we felt heard and understood. The entire experience with Dr. Meetu was professional, warm and deeply reassuring.',
    label: 'IVF Patient',
    tag: 'First Consultation',
  },
  {
    quote:
      'We had many questions and concerns before beginning IVF. Dr. Meetu walked us through everything with such clarity. We trusted her completely.',
    label: 'Fertility Patient',
    tag: 'IVF Guidance',
  },
];

export default function Testimonials() {
  return (
    <section id="testimonials" className="py-20 lg:py-28 bg-white">
      <div className="max-w-[1280px] mx-auto px-6 lg:px-8">
        <div className="text-center mb-14">
          <p className="text-[11px] font-600 tracking-[2px] text-[#ED709E] uppercase mb-4">Patient Stories</p>
          <h2
            style={{ fontFamily: 'DM Sans, sans-serif' }}
            className="text-[36px] lg:text-[44px] font-800 text-[#252525] leading-[1.1] tracking-[-1px]"
          >
            Stories of <span className="text-[#ED709E]">Hope</span>
          </h2>
          <p className="text-[13px] text-[#6F6F6F] mt-3 italic">
            Placeholder testimonials — real patient stories to be added.
          </p>
        </div>

        <div className="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
          {testimonials.map((t, i) => (
            <div key={i} className="bg-[#FFF4F8] rounded-2xl p-6 border border-[#EDEDED] flex flex-col">
              <div className="text-[36px] text-[#ED709E] font-serif leading-none mb-4 opacity-60">"</div>
              <p className="text-[14px] text-[#252525] leading-[1.7] flex-1 mb-5">{t.quote}</p>
              <div className="pt-4 border-t border-[#EDEDED]">
                <div style={{ fontFamily: 'DM Sans, sans-serif' }} className="text-[13px] font-600 text-[#252525]">
                  — {t.label}
                </div>
                <div className="inline-block mt-2 text-[11px] font-600 text-[#ED709E] bg-white px-3 py-1 rounded-full border border-[#FCEAF2]">
                  {t.tag}
                </div>
              </div>
            </div>
          ))}
        </div>

        {/* Supporting image */}
        <div className="mt-12 rounded-[24px] overflow-hidden h-[280px] lg:h-[360px] bg-[#FCEAF2]">
          <img
            src="https://images.unsplash.com/photo-1528218635780-5952720c9729?w=1400&h=400&fit=crop&auto=format"
            alt="Couple celebrating pregnancy journey"
            className="w-full h-full object-cover object-center"
          />
        </div>
      </div>
    </section>
  );
}
