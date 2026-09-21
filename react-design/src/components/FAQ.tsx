import { useState } from 'react';

const faqs = [
  {
    q: 'When should I consult a fertility specialist?',
    a: 'If you have been trying to conceive for 12 months (or 6 months if you are over 35), or if you have known conditions that may affect fertility such as PCOS, endometriosis or irregular cycles, consulting a specialist early can be beneficial.',
  },
  {
    q: 'What fertility tests may be recommended?',
    a: 'Fertility assessment typically includes hormonal blood tests, an ultrasound scan, and a semen analysis for your partner. Further investigations may be recommended based on your individual circumstances.',
  },
  {
    q: 'What is IVF?',
    a: 'In vitro fertilization (IVF) is an assisted reproductive technique in which eggs are collected from the ovaries, fertilized in a laboratory setting, and the resulting embryo is transferred into the uterus.',
  },
  {
    q: 'Who may benefit from IVF?',
    a: 'IVF may be recommended for couples with tubal factor infertility, male factor infertility, unexplained infertility, endometriosis, or after unsuccessful simpler treatments such as IUI.',
  },
  {
    q: 'How long does an IVF cycle take?',
    a: 'An IVF cycle typically takes around 4–6 weeks from the start of stimulation to the embryo transfer. The exact timeline varies depending on individual treatment protocols.',
  },
  {
    q: 'Is IVF treatment painful?',
    a: 'Most patients find IVF manageable. The injections are mild, and the egg retrieval procedure is carried out under sedation. Some discomfort or bloating is possible during stimulation, and our team will guide you throughout.',
  },
  {
    q: 'What factors affect fertility?',
    a: 'Fertility can be affected by age, hormonal conditions, structural issues, sperm health, lifestyle factors, and general health. A thorough assessment helps identify contributing factors.',
  },
  {
    q: 'When should couples consider fertility preservation?',
    a: 'Fertility preservation is worth considering if you wish to delay parenthood, are facing medical treatment that may affect fertility, or have a family history of early menopause.',
  },
  {
    q: 'What should I expect during my first consultation?',
    a: 'Your first visit is an opportunity to discuss your medical history, fertility concerns and goals. Dr. Meetu will listen carefully and recommend appropriate next steps for your evaluation.',
  },
];

export default function FAQ() {
  const [openIndex, setOpenIndex] = useState<number | null>(null);

  return (
    <section className="py-20 lg:py-28 bg-[#FFF4F8]">
      <div className="max-w-[900px] mx-auto px-6 lg:px-8">
        <div className="text-center mb-12">
          <p className="text-[11px] font-600 tracking-[2px] text-[#ED709E] uppercase mb-4">Questions</p>
          <h2
            style={{ fontFamily: 'DM Sans, sans-serif' }}
            className="text-[36px] lg:text-[44px] font-800 text-[#252525] leading-[1.1] tracking-[-1px]"
          >
            Frequently Asked Questions
          </h2>
        </div>

        <div className="space-y-3">
          {faqs.map((faq, i) => (
            <div
              key={i}
              className="bg-white rounded-xl border border-[#EDEDED] overflow-hidden"
            >
              <button
                className="w-full text-left flex items-center justify-between gap-4 px-6 py-5"
                onClick={() => setOpenIndex(openIndex === i ? null : i)}
              >
                <span
                  style={{ fontFamily: 'DM Sans, sans-serif' }}
                  className="text-[15px] font-600 text-[#252525] pr-4"
                >
                  {faq.q}
                </span>
                <span
                  className={`flex-shrink-0 w-7 h-7 rounded-full border border-[#EDEDED] flex items-center justify-center transition-all duration-200 ${
                    openIndex === i ? 'bg-[#ED709E] border-[#ED709E]' : 'bg-white'
                  }`}
                >
                  <svg
                    width="12"
                    height="12"
                    viewBox="0 0 12 12"
                    fill="none"
                    className={`transition-transform duration-200 ${openIndex === i ? 'rotate-180' : ''}`}
                  >
                    <path
                      d="M2 4l4 4 4-4"
                      stroke={openIndex === i ? '#fff' : '#6F6F6F'}
                      strokeWidth="1.5"
                      strokeLinecap="round"
                      strokeLinejoin="round"
                    />
                  </svg>
                </span>
              </button>
              {openIndex === i && (
                <div className="px-6 pb-5">
                  <p className="text-[14px] text-[#6F6F6F] leading-[1.75]">{faq.a}</p>
                </div>
              )}
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
