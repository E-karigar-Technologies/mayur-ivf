import { useState } from 'react';

export default function BookAppointment() {
  const [form, setForm] = useState({
    name: '', phone: '', email: '', age: '', date: '', type: '', message: '',
  });

  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLSelectElement | HTMLTextAreaElement>) => {
    setForm({ ...form, [e.target.name]: e.target.value });
  };

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    alert('Thank you! Your consultation request has been received. Dr. Meetu\'s team will contact you shortly.');
  };

  const inputClass =
    'w-full border border-[#EDEDED] rounded-xl px-4 py-3 text-[14px] text-[#252525] bg-white placeholder-[#6F6F6F] focus:outline-none focus:border-[#ED709E] focus:ring-2 focus:ring-[#ED709E]/10 transition-all';

  return (
    <section id="book" className="py-20 lg:py-28 bg-[#FFF4F8]">
      <div className="max-w-[1280px] mx-auto px-6 lg:px-8">
        <div className="grid lg:grid-cols-2 gap-14 items-start">
          {/* Left */}
          <div>
            <p className="text-[11px] font-600 tracking-[2px] text-[#ED709E] uppercase mb-4">Get Started</p>
            <h2
              style={{ fontFamily: 'DM Sans, sans-serif' }}
              className="text-[36px] lg:text-[44px] font-800 text-[#252525] leading-[1.1] tracking-[-1px] mb-5"
            >
              Take the First Step Toward{' '}
              <span className="text-[#ED709E]">Parenthood</span>
            </h2>
            <p className="text-[16px] text-[#6F6F6F] leading-[1.7] mb-10">
              Schedule a consultation with Dr. Meetu Bhushan and begin your fertility journey with personalized medical guidance.
            </p>

            {/* Contact options */}
            <div className="space-y-4">
              <a href="tel:+91XXXXXXXXXX" className="flex items-center gap-4 bg-white rounded-xl p-5 border border-[#EDEDED] hover:border-[#ED709E] transition-colors group">
                <div className="w-11 h-11 rounded-full bg-[#FFF4F8] flex items-center justify-center group-hover:bg-[#FCEAF2] transition-colors">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="#ED709E" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round">
                    <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V17a2 2 0 01-2 2h-1C9.716 19 3 12.284 3 4V3z"/>
                  </svg>
                </div>
                <div>
                  <div style={{ fontFamily: 'DM Sans, sans-serif' }} className="text-[13px] font-700 text-[#252525]">Call Us</div>
                  <div className="text-[13px] text-[#6F6F6F]">+91 XXXXX XXXXX</div>
                </div>
              </a>

              <a href="https://wa.me/91XXXXXXXXXX" className="flex items-center gap-4 bg-white rounded-xl p-5 border border-[#EDEDED] hover:border-[#25D366] transition-colors group">
                <div className="w-11 h-11 rounded-full bg-[#F0FFF4] flex items-center justify-center group-hover:bg-[#dcfce7] transition-colors">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="#25D366">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                  </svg>
                </div>
                <div>
                  <div style={{ fontFamily: 'DM Sans, sans-serif' }} className="text-[13px] font-700 text-[#252525]">WhatsApp</div>
                  <div className="text-[13px] text-[#6F6F6F]">Chat with us directly</div>
                </div>
              </a>
            </div>
          </div>

          {/* Form */}
          <div className="bg-white rounded-2xl p-8 border border-[#EDEDED] shadow-sm">
            <h3 style={{ fontFamily: 'DM Sans, sans-serif' }} className="text-[20px] font-700 text-[#252525] mb-6">
              Book a Consultation
            </h3>
            <form onSubmit={handleSubmit} className="space-y-4">
              <div className="grid sm:grid-cols-2 gap-4">
                <input name="name" value={form.name} onChange={handleChange} type="text" placeholder="Full Name" required className={inputClass} />
                <input name="phone" value={form.phone} onChange={handleChange} type="tel" placeholder="Mobile Number" required className={inputClass} />
              </div>
              <div className="grid sm:grid-cols-2 gap-4">
                <input name="email" value={form.email} onChange={handleChange} type="email" placeholder="Email Address" required className={inputClass} />
                <input name="age" value={form.age} onChange={handleChange} type="number" placeholder="Age" className={inputClass} />
              </div>
              <div className="grid sm:grid-cols-2 gap-4">
                <input name="date" value={form.date} onChange={handleChange} type="date" className={inputClass} />
                <select name="type" value={form.type} onChange={handleChange} className={inputClass}>
                  <option value="">Consultation Type</option>
                  <option>IVF Consultation</option>
                  <option>Fertility Assessment</option>
                  <option>IUI Consultation</option>
                  <option>Fertility Preservation</option>
                  <option>General Gynecology</option>
                  <option>PCOS Consultation</option>
                </select>
              </div>
              <textarea
                name="message"
                value={form.message}
                onChange={handleChange}
                placeholder="Your message or specific concerns (optional)"
                rows={3}
                className={`${inputClass} resize-none`}
              />
              <button
                type="submit"
                className="w-full bg-[#ED709E] hover:bg-[#e05a8a] text-white text-[15px] font-600 py-3.5 rounded-xl transition-all duration-200 shadow-sm hover:shadow-md"
                style={{ fontFamily: 'DM Sans, sans-serif' }}
              >
                Book Consultation
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>
  );
}
