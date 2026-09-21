const posts = [
  {
    img: 'https://images.unsplash.com/photo-1631217868264-e5b90bb7e133?w=600&h=360&fit=crop&auto=format',
    category: 'IVF',
    title: 'Understanding IVF: A Complete Guide',
    desc: 'What to expect at every stage of an IVF cycle — from ovarian stimulation to embryo transfer and beyond.',
  },
  {
    img: 'https://images.unsplash.com/photo-1758691461935-202e2ef6b69f?w=600&h=360&fit=crop&auto=format',
    category: 'Fertility',
    title: 'When to See a Fertility Specialist',
    desc: 'Key signs and timelines that indicate when professional fertility evaluation may be the right next step.',
  },
  {
    img: 'https://images.unsplash.com/photo-1705746402014-a3f53dc61638?w=600&h=360&fit=crop&auto=format',
    category: 'Preservation',
    title: 'Fertility Preservation: Your Options',
    desc: 'Egg freezing, embryo banking and other preservation approaches — what they are and who they are for.',
  },
  {
    img: 'https://images.unsplash.com/photo-1673865641073-4479f93a7776?w=600&h=360&fit=crop&auto=format',
    category: 'PCOS',
    title: 'PCOS and Fertility: What You Need to Know',
    desc: 'How polycystic ovarian syndrome affects fertility and the treatment options available for conception.',
  },
  {
    img: 'https://images.unsplash.com/photo-1438962136829-452260720431?w=600&h=360&fit=crop&auto=format',
    category: 'Infertility',
    title: 'Understanding Unexplained Infertility',
    desc: 'When investigations return normal results, here is how fertility specialists approach the next steps.',
  },
  {
    img: 'https://images.unsplash.com/photo-1758691463198-dc663b8a64e4?w=600&h=360&fit=crop&auto=format',
    category: 'IVF',
    title: 'IVF: What to Expect at Your First Appointment',
    desc: 'A reassuring guide to your very first fertility consultation and how to prepare for the conversation ahead.',
  },
];

export default function Blog() {
  return (
    <section id="blog" className="py-20 lg:py-28 bg-white">
      <div className="max-w-[1280px] mx-auto px-6 lg:px-8">
        <div className="flex flex-col sm:flex-row sm:items-end justify-between gap-5 mb-12">
          <div>
            <p className="text-[11px] font-600 tracking-[2px] text-[#ED709E] uppercase mb-4">Education</p>
            <h2
              style={{ fontFamily: 'DM Sans, sans-serif' }}
              className="text-[36px] lg:text-[44px] font-800 text-[#252525] leading-[1.1] tracking-[-1px]"
            >
              Fertility &amp; IVF Insights
            </h2>
          </div>
          <a
            href="#"
            className="inline-flex items-center gap-2 text-[#ED709E] text-[14px] font-600 hover:gap-3 transition-all"
            style={{ fontFamily: 'DM Sans, sans-serif' }}
          >
            View all articles
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/></svg>
          </a>
        </div>

        <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
          {posts.map((post, i) => (
            <article key={i} className="group cursor-pointer">
              <div className="rounded-2xl overflow-hidden aspect-[16/9] bg-[#FCEAF2] mb-4">
                <img
                  src={post.img}
                  alt={post.title}
                  className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                />
              </div>
              <div className="inline-block text-[11px] font-600 tracking-[1px] text-[#ED709E] bg-[#FFF4F8] px-3 py-1 rounded-full mb-3">
                {post.category}
              </div>
              <h3
                style={{ fontFamily: 'DM Sans, sans-serif' }}
                className="text-[17px] font-700 text-[#252525] mb-2 group-hover:text-[#ED709E] transition-colors leading-[1.35]"
              >
                {post.title}
              </h3>
              <p className="text-[13.5px] text-[#6F6F6F] leading-[1.65] mb-3">{post.desc}</p>
              <span className="text-[13px] font-600 text-[#ED709E] flex items-center gap-1.5">
                Read more
                <svg width="13" height="13" viewBox="0 0 13 13" fill="none"><path d="M2 6.5h9M8 3l3.5 3.5L8 10" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/></svg>
              </span>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
}
