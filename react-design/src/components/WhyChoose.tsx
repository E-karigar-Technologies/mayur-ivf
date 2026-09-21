const features = [
  {
    icon: '✦',
    title: 'Personalized Treatment',
    desc: 'Every fertility plan is designed specifically for you — not a template, but a tailored medical strategy.',
  },
  {
    icon: '✦',
    title: 'Experienced Specialist',
    desc: '17+ years of clinical expertise in IVF and reproductive medicine across complex fertility cases.',
  },
  {
    icon: '✦',
    title: 'Advanced IVF Care',
    desc: 'Access to modern reproductive technologies combined with careful, evidence-based clinical judgment.',
  },
  {
    icon: '✦',
    title: 'Transparent Guidance',
    desc: 'Clear communication at every step — so you always understand your options and what to expect.',
  },
  {
    icon: '✦',
    title: 'Compassionate Support',
    desc: 'Fertility journeys are emotional. Dr. Meetu provides the warmth and encouragement you deserve.',
  },
  {
    icon: '✦',
    title: 'Complete Fertility Journey',
    desc: 'From initial consultation through pregnancy support, comprehensive care under one specialist.',
  },
];

export default function WhyChoose() {
  return (
    <section className="py-20 lg:py-28 bg-[#FFF4F8]">
      <div className="max-w-[1280px] mx-auto px-6 lg:px-8">
        <div className="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">
          {/* Content */}
          <div>
            <p className="text-[11px] font-600 tracking-[2px] text-[#ED709E] uppercase mb-4">Why Choose Us</p>
            <h2
              style={{ fontFamily: 'DM Sans, sans-serif' }}
              className="text-[36px] lg:text-[44px] font-800 text-[#252525] leading-[1.1] tracking-[-1px] mb-10"
            >
              Why Patients Choose{' '}
              <span className="text-[#ED709E]">Dr. Meetu</span>
            </h2>

            <div className="grid sm:grid-cols-2 gap-5">
              {features.map((f, i) => (
                <div key={i} className="bg-white rounded-xl p-5 border border-[#EDEDED]">
                  <div className="text-[#ED709E] text-[10px] mb-3">{f.icon}</div>
                  <h3 style={{ fontFamily: 'DM Sans, sans-serif' }} className="text-[15px] font-700 text-[#252525] mb-1.5">
                    {f.title}
                  </h3>
                  <p className="text-[13px] text-[#6F6F6F] leading-[1.6]">{f.desc}</p>
                </div>
              ))}
            </div>
          </div>

          {/* Image */}
          <div className="relative">
            <div className="rounded-[28px] overflow-hidden aspect-[3/4] bg-[#FCEAF2]">
              <img
                src="https://images.unsplash.com/photo-1758691462878-6edc3d3da1be?w=800&h=1067&fit=crop&auto=format"
                alt="Dr. Meetu Bhushan consulting with patient"
                className="w-full h-full object-cover"
              />
            </div>
            <div className="absolute -bottom-5 -left-5 w-28 h-28 bg-[#FCEAF2] rounded-2xl -z-10" />
          </div>
        </div>
      </div>
    </section>
  );
}
