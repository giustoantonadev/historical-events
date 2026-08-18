import { Link } from "react-router-dom";
import TimelinePerson from "./TimelinePerson";
import "../styles/timeline.css";

function getIconForEvent(event) {
  const title = event.title.toLowerCase();

  if (title.includes("battaglia")) return "⚔️";
  if (title.includes("fondazione")) return "🏛️";
  if (title.includes("regno")) return "👑";
  if (title.includes("campagne")) return "⚔️";
  if (title.includes("conquista")) return "⚔️";
  if (title.includes("scoperta")) return "🧭";
  if (title.includes("filosofia")) return "📜";

  return "📜"; // default epico
}

export default function TimelineEvent({ event, position }) {
  const icon = getIconForEvent(event);

  return (
    <div className={`timeline-event ${position}`}>
      <div className="timeline-content">

        {/* IMMAGINE EVENTO */}
        {event.image && (
          <img
            src={`http://localhost:8000/storage/${event.image}`}
            alt={event.title}
            className="timeline-img"
          />
        )}

        {/* ANNO */}
        <h3 className="timeline-year">{event.year}</h3>

        {/* TITOLO + ICONA EPICA */}
        <h2 className="timeline-title">
          <span className="timeline-icon">{icon}</span>
          {event.title}
        </h2>

        {/* DESCRIZIONE */}
        <p className="timeline-description">{event.description}</p>

        {/* PERSONAGGI COLLEGATI */}
        {event.people && event.people.length > 0 && (
          <div className="timeline-people">
            <h4>Personaggi coinvolti:</h4>
            {event.people.map(person => (
              <TimelinePerson key={person.id} person={person} />
            ))}
          </div>
        )}

        {/* LINK ALL'EVENTO */}
        <Link to={`/events/${event.id}`} className="timeline-link">
          Vai all'evento →
        </Link>
      </div>
    </div>
  );
}
