export default function Hero() {
  return (
    <section id="home" className="pt-[72px] min-h-screen flex items-center bg-white relative overflow-hidden">
      {/* Soft blush accent blob */}
      <div className="absolute top-0 right-0 w-[55%] h-full bg-[#FFF4F8] rounded-bl-[80px] hidden md:block" />

      <div className="max-w-[1280px] mx-auto px-6 lg:px-8 w-full relative z-10">
        <div className="grid md:grid-cols-2 gap-12 lg:gap-16 items-center py-16 lg:py-24">
          {/* Left content */}
          <div className="order-2 md:order-1">
            <p className="text-[11px] font-600 tracking-[2px] text-[#ED709E] uppercase mb-5">
              IVF Specialist · Fertility Consultant · Gynecologist
            </p>
            <h1
              style={{ fontFamily: 'DM Sans, sans-serif' }}
              className="text-[44px] lg:text-[56px] font-800 text-[#252525] leading-[1.08] tracking-[-1.5px] mb-6"
            >
              Your Journey to{' '}
              <span className="text-[#ED709E]">Parenthood</span>{' '}
              Starts Here
            </h1>
            <p className="text-[16px] lg:text-[17px] text-[#6F6F6F] leading-[1.7] mb-9 max-w-[480px]">
              Compassionate, personalized fertility care backed by experience, advanced reproductive medicine and a commitment to every family's unique journey.
            </p>

            <div className="flex flex-wrap gap-4 mb-10">
              <a
                href="#book"
                className="inline-flex items-center gap-2 bg-[#ED709E] hover:bg-[#e05a8a] text-white text-[15px] font-600 px-7 py-3.5 rounded-full transition-all duration-200 shadow-sm hover:shadow-lg"
                style={{ fontFamily: 'DM Sans, sans-serif' }}
              >
                Book a Consultation
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/></svg>
              </a>
              <a
                href="#services"
                className="inline-flex items-center gap-2 border border-[#EDEDED] hover:border-[#ED709E] text-[#252525] hover:text-[#ED709E] text-[15px] font-600 px-7 py-3.5 rounded-full transition-all duration-200"
                style={{ fontFamily: 'DM Sans, sans-serif' }}
              >
                Explore Treatments
              </a>
            </div>

            {/* Trust indicators */}
            <div className="flex flex-wrap gap-6 pt-6 border-t border-[#EDEDED]">
              {[
                { value: '17+', label: 'Years of Experience' },
                { value: '✦', label: 'Personalized Fertility Care' },
                { value: '✦', label: 'Advanced IVF Solutions' },
              ].map((item, i) => (
                <div key={i} className="flex items-center gap-2">
                  {i === 0 ? (
                    <span style={{ fontFamily: 'DM Sans, sans-serif' }} className="text-[22px] font-800 text-[#ED709E]">{item.value}</span>
                  ) : (
                    <span className="text-[#ED709E] text-[10px]">{item.value}</span>
                  )}
                  <span className="text-[13px] text-[#6F6F6F]">{item.label}</span>
                </div>
              ))}
            </div>
          </div>

          {/* Right image */}
          <div className="order-1 md:order-2 flex justify-center">
            <div className="relative w-full max-w-[480px]">
              <div className="relative rounded-[32px] overflow-hidden aspect-[4/5] bg-[#FCEAF2]">
                <img
                  src="https://images.unsplash.com/photo-1631217868264-e5b90bb7e133?w=800&h=1000&fit=crop&auto=format"
                  alt="Dr. Meetu Bhushan — IVF Specialist in consultation"
                  className="w-full h-full object-cover"
                />
              </div>
              {/* Floating badge */}
              <div className="absolute -bottom-4 -left-4 bg-white rounded-2xl p-4 shadow-xl border border-[#EDEDED]">
                <div style={{ fontFamily: 'DM Sans, sans-serif' }} className="text-[28px] font-800 text-[#ED709E] leading-none">17+</div>
                <div className="text-[12px] text-[#6F6F6F] mt-0.5 leading-tight">Years of<br/>Experience</div>
              </div>
              {/* Floating accent dot */}
              <div className="absolute -top-3 -right-3 w-12 h-12 bg-[#ED709E] rounded-full opacity-20" />
              <div className="absolute top-6 -right-6 w-5 h-5 bg-[#ED709E] rounded-full opacity-40" />
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
