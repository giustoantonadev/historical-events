import { useEffect, useState, useRef } from "react";
import { useTranslation } from "react-i18next";
import "../styles/eventlist.css";
import EventCard from "../components/EventCard";

export default function EventList() {
  const [events, setEvents] = useState([]);
  const [era, setEra] = useState('all');
  const { t, i18n } = useTranslation();
  const heroRef = useRef(null);

  const lang = (i18n.language || 'it').split('-')[0];

  useEffect(() => {
    fetch(`http://localhost:8000/api/events?lang=${lang}`)
      .then(res => res.json())
      .then(data => setEvents(data));
  }, [lang]);

  useEffect(() => {
    const el = heroRef.current;
    if (!el) return;
    const onScroll = () => {
      const rect = el.getBoundingClientRect();
      const speed = 0.22; // parallax intensity
      const translate = Math.max(0, -rect.top * speed);
      el.style.setProperty('--parallax', `${translate}px`);
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll);
    return () => {
      window.removeEventListener('scroll', onScroll);
      window.removeEventListener('resize', onScroll);
    };
  }, []);

  function getEraFromYear(y) {
    if (y === null || y === undefined) return 'unknown';
    const n = Number(y);
    if (Number.isNaN(n)) return 'unknown';
    if (n < 0) return 'antichita';
    if (n <= 500) return 'antichita';
    if (n <= 1491) return 'medioevo';
    if (n <= 1799) return 'eta_moderna';
    return 'eta_contemporanea';
  }

  const eras = [
    { key: 'all', label: t('filters.all', { defaultValue: 'Tutti' }) },
    { key: 'antichita', label: t('filters.antichita', { defaultValue: 'Antichità' }) },
    { key: 'medioevo', label: t('filters.medioevo', { defaultValue: 'Medioevo' }) },
    { key: 'eta_moderna', label: t('filters.eta_moderna', { defaultValue: 'Età moderna' }) },
    { key: 'eta_contemporanea', label: t('filters.eta_contemporanea', { defaultValue: 'Età contemporanea' }) }
  ];

  const filteredEvents = events.filter(ev => {
    if (era === 'all') return true;
    return getEraFromYear(ev.year) === era;
  });

  return (
    <div className="container eventlist-wrapper">

      {/* HERO */}
      <section className="hero" ref={heroRef}>
        <div className="hero-bg" aria-hidden="true"></div>
        <div className="hero-inner container">
          <h1 className="hero-title">{t("sections.events")}</h1>
          <p className="hero-subtitle">{t("home.subtitle")}</p>
          <a href="#events" className="hero-cta">{t('hero.cta', { defaultValue: 'Esplora la timeline' })}</a>
        </div>
      </section>

      {/* GRID */}
      <div className="content-panel">
        <div className="filters container" aria-hidden={false}>
          {eras.map(e => (
            <button
              key={e.key}
              className={`filter-btn ${era === e.key ? 'active' : ''}`}
              onClick={() => setEra(e.key)}
              aria-pressed={era === e.key}
            >
              {e.label}
            </button>
          ))}
        </div>

        <div id="events" className="row g-4 container">
          {filteredEvents.map(event => (
            <div key={event.id} className="col-sm-12 col-md-6 col-lg-4">
              <EventCard event={event} />
            </div>
          ))}
        </div>
      </div>

    </div>
  );
}
