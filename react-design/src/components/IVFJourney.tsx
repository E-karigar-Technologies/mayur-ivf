const steps = [
  {
    num: '01',
    title: 'Initial Consultation',
    desc: 'Understanding your medical history, fertility goals and treatment options in a warm, unhurried setting.',
  },
  {
    num: '02',
    title: 'Fertility Assessment',
    desc: 'Recommended investigations and evaluation tailored to your individual reproductive profile.',
  },
  {
    num: '03',
    title: 'Personalized Treatment Plan',
    desc: 'A treatment approach designed specifically around your circumstances, goals and medical findings.',
  },
  {
    num: '04',
    title: 'IVF Treatment',
    desc: 'Carefully monitored fertility treatment using advanced reproductive techniques and close medical support.',
  },
  {
    num: '05',
    title: 'Embryo Transfer',
    desc: 'The appropriate embryo transfer procedure following your treatment cycle, with ongoing clinical care.',
  },
  {
    num: '06',
    title: 'Pregnancy Support',
    desc: 'Continued guidance, monitoring and support through the next stage of your journey toward parenthood.',
  },
];

export default function IVFJourney() {
  return (
    <section id="ivf-journey" className="py-20 lg:py-28 bg-white">
      <div className="max-w-[1280px] mx-auto px-6 lg:px-8">
        <div className="text-center mb-14">
          <p className="text-[11px] font-600 tracking-[2px] text-[#ED709E] uppercase mb-4">The Process</p>
          <h2
            style={{ fontFamily: 'DM Sans, sans-serif' }}
            className="text-[36px] lg:text-[44px] font-800 text-[#252525] leading-[1.1] tracking-[-1px]"
          >
            Your IVF Journey,{' '}
            <span className="text-[#ED709E]">Step by Step</span>
          </h2>
        </div>

        <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
          {steps.map((step, i) => (
            <div key={i} className="relative group">
              <div className="bg-[#FFF4F8] rounded-2xl p-7 h-full border border-transparent group-hover:border-[#FCEAF2] transition-all duration-300">
                <div
                  style={{ fontFamily: 'DM Sans, sans-serif' }}
                  className="text-[40px] font-800 text-[#ED709E] opacity-20 leading-none mb-4"
                >
                  {step.num}
                </div>
                <div className="flex items-center gap-3 mb-3">
                  <div className="w-8 h-8 rounded-full bg-[#ED709E] flex items-center justify-center text-white text-[12px] font-700 flex-shrink-0">
                    {step.num}
                  </div>
                  <h3 style={{ fontFamily: 'DM Sans, sans-serif' }} className="text-[16px] font-700 text-[#252525]">
                    {step.title}
                  </h3>
                </div>
                <p className="text-[14px] text-[#6F6F6F] leading-[1.7]">{step.desc}</p>
              </div>
              {/* Connector line for desktop (except last in row) */}
              {i % 3 !== 2 && i < steps.length - 1 && (
                <div className="hidden lg:block absolute top-10 -right-3 w-6 h-px bg-[#EDEDED] z-10" />
              )}
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
