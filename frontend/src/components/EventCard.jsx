import { Link } from "react-router-dom";
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
  const imgSrc = event.image ? `http://localhost:8000/storage/${event.image}` : `/images/events/placeholder.svg`;

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
      <img src={imgSrc} alt={event.title} className="event-img" />

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
