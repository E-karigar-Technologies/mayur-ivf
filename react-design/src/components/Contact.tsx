export default function Contact() {
  return (
    <section id="contact" className="py-20 lg:py-28 bg-[#FFF4F8]">
      <div className="max-w-[1280px] mx-auto px-6 lg:px-8">
        <div className="text-center mb-12">
          <p className="text-[11px] font-600 tracking-[2px] text-[#ED709E] uppercase mb-4">Find Us</p>
          <h2
            style={{ fontFamily: 'DM Sans, sans-serif' }}
            className="text-[36px] lg:text-[44px] font-800 text-[#252525] leading-[1.1] tracking-[-1px]"
          >
            Contact &amp; Location
          </h2>
        </div>

        <div className="grid lg:grid-cols-2 gap-10">
          {/* Contact cards */}
          <div className="grid sm:grid-cols-2 gap-5 content-start">
            {[
              {
                icon: (
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="#ED709E" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round">
                    <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                  </svg>
                ),
                label: 'Clinic Address',
                value: 'Clinic Address\nCity, State — PIN Code',
              },
              {
                icon: (
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="#ED709E" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round">
                    <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V17a2 2 0 01-2 2h-1C9.716 19 3 12.284 3 4V3z"/>
                  </svg>
                ),
                label: 'Phone',
                value: '+91 XXXXX XXXXX',
              },
              {
                icon: (
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="#ED709E" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round">
                    <path d="M3 8l7-5 7 5M5 6.5v9a2 2 0 002 2h6a2 2 0 002-2v-9"/>
                  </svg>
                ),
                label: 'Email',
                value: 'info@drmeetu.com',
              },
              {
                icon: (
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="#ED709E" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round">
                    <circle cx="10" cy="10" r="7"/>
                    <path d="M10 7v3l2 2"/>
                  </svg>
                ),
                label: 'Working Hours',
                value: 'Mon – Sat: 9 AM – 7 PM\nSunday: By Appointment',
              },
            ].map((item, i) => (
              <div key={i} className="bg-white rounded-xl p-5 border border-[#EDEDED]">
                <div className="w-10 h-10 rounded-full bg-[#FFF4F8] flex items-center justify-center mb-3">
                  {item.icon}
                </div>
                <div style={{ fontFamily: 'DM Sans, sans-serif' }} className="text-[13px] font-700 text-[#252525] mb-1">{item.label}</div>
                <div className="text-[13px] text-[#6F6F6F] whitespace-pre-line leading-[1.6]">{item.value}</div>
              </div>
            ))}
          </div>

          {/* Map placeholder */}
          <div className="rounded-2xl overflow-hidden bg-[#FCEAF2] h-[380px] flex items-center justify-center border border-[#EDEDED]">
            <div className="text-center">
              <svg width="48" height="48" viewBox="0 0 48 48" fill="none" className="mx-auto mb-3 opacity-40">
                <path d="M24 4C16.268 4 10 10.268 10 18c0 11.25 14 26 14 26s14-14.75 14-26c0-7.732-6.268-14-14-14zm0 19a5 5 0 110-10 5 5 0 010 10z" fill="#ED709E"/>
              </svg>
              <p style={{ fontFamily: 'DM Sans, sans-serif' }} className="text-[14px] font-600 text-[#6F6F6F]">Google Maps will appear here</p>
              <p className="text-[12px] text-[#6F6F6F] mt-1">Embed your clinic location</p>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
