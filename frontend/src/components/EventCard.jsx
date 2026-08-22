import { Link } from "react-router-dom";
import { useState } from "react";
import "../styles/eventCard.css";

function getIconForEvent(title) {
  const t = title.toLowerCase();
  if (t.includes("battaglia")) return "⚔️";
  if (t.includes("fondazione")) return "🏛️";
  if (t.includes("regno")) return "👑";
  if (t.includes("campagne")) return "⚔️";
  if (t.includes("assassinio")) return "🗡️";
  return "📜";
}

export default function EventCard({ event }) {
  const icon = getIconForEvent(event.title);
  // Prefer thumbnail, then image, then placeholder. If value is already a full URL, use it.
  const resolveStorage = (path) => {
    if (!path) return null;
    if (path.startsWith('http')) return path;
    // ensure images stored under storage/events are referenced correctly
    const normalized = path.startsWith('events/') ? path : `events/${path}`;
    return `http://localhost:8000/storage/${normalized}`;
  };
  const imgSrc = resolveStorage(event.thumbnail) || resolveStorage(event.image) || `/images/events/placeholder.svg`;
  const [loaded, setLoaded] = useState(false);

  function formatYear(y) {
    if (y === null || y === undefined) return '';
    const yearNum = Number(y);
    if (Number.isNaN(yearNum)) return y;
    if (yearNum < 0) return `${Math.abs(yearNum)} a.C.`;
    return `${yearNum} d.C.`;
  }

  return (
    <div className="event-card">

      {/* IMMAGINE */}
      <div className="event-img-wrap">
        <img
          src={imgSrc}
          alt={event.title}
          className={`event-img ${loaded ? 'loaded' : 'loading'}`}
          onLoad={() => setLoaded(true)}
          onError={(e) => {
            const img = e.currentTarget;
            if (!img.dataset.retry) {
              img.dataset.retry = '1';
              const src = img.getAttribute('src') || '';
              if (src.endsWith('.jpg')) {
                img.src = src.replace(/\.jpg$/, '.png');
                return;
              }
              if (src.endsWith('.png')) {
                img.src = src.replace(/\.png$/, '.jpg');
                return;
              }
            }
            img.src = '/images/events/placeholder.svg';
          }}
          loading="lazy"
        />
      </div>

      {/* TITOLO + ICONA */}
      <div className="event-card-header">
        <span className="event-icon">{icon}</span>
        <h3 className="event-title">{event.title}</h3>
      </div>

      {/* ANNO */}
      <div className="event-year">{formatYear(event.year)}</div>

      {/* DESCRIZIONE BREVE */}
      {event.description && (
        <p className="event-desc">
          {event.description.substring(0, 80)}...
        </p>
      )}

      {/* PERSONAGGI */}
      {event.people && event.people.length > 0 && (
        <div className="event-people">
          {event.people.map(person => (
            <span key={person.id} className="event-person">
              {person.name}
            </span>
          ))}
        </div>
      )}

      {/* LINK */}
      <Link to={`/events/${event.id}`} className="event-cta">
        Scopri l'evento →
      </Link>
    </div>
  );
}
