const stats = [
  { value: '17+', label: 'Years of Experience', sub: 'Dedicated clinical practice in fertility medicine' },
  { value: 'IVF & Fertility', label: 'Specialized Expertise', sub: 'Advanced assisted reproductive technology' },
  { value: 'Personalized', label: 'Care Plans', sub: 'Every patient receives an individualized approach' },
  { value: 'Patient-Centered', label: 'Approach', sub: 'Compassionate guidance throughout your journey' },
];

export default function Stats() {
  return (
    <section className="py-16 lg:py-20 bg-white border-y border-[#EDEDED]">
      <div className="max-w-[1280px] mx-auto px-6 lg:px-8">
        <div className="grid grid-cols-2 lg:grid-cols-4 gap-8">
          {stats.map((s, i) => (
            <div key={i} className="text-center">
              <div
                style={{ fontFamily: 'DM Sans, sans-serif' }}
                className="text-[28px] lg:text-[36px] font-800 text-[#ED709E] leading-none mb-2"
              >
                {s.value}
              </div>
              <div style={{ fontFamily: 'DM Sans, sans-serif' }} className="text-[15px] font-700 text-[#252525] mb-1">
                {s.label}
              </div>
              <div className="text-[12px] text-[#6F6F6F] leading-[1.5]">{s.sub}</div>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
