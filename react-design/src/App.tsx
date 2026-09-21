import Header from './components/Header';
import Hero from './components/Hero';
import TrustStrip from './components/TrustStrip';
import About from './components/About';
import Services from './components/Services';
import IVFJourney from './components/IVFJourney';
import WhyChoose from './components/WhyChoose';
import Stats from './components/Stats';
import Testimonials from './components/Testimonials';
import FAQ from './components/FAQ';
import BookAppointment from './components/BookAppointment';
import Blog from './components/Blog';
import Contact from './components/Contact';
import Footer from './components/Footer';

export default function App() {
  return (
    <div className="min-h-screen bg-white">
      <Header />
      <main>
        <Hero />
        <TrustStrip />
        <About />
        <Services />
        <IVFJourney />
        <WhyChoose />
        <Stats />
        <Testimonials />
        <FAQ />
        <BookAppointment />
        <Blog />
        <Contact />
      </main>
      <Footer />
    </div>
  );
}
