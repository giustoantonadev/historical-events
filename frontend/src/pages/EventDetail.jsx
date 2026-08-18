import { useEffect, useState } from "react";
import { useParams, Link } from "react-router-dom";
import "../styles/eventdetail.css";

export default function EventDetail() {
  const { id } = useParams();
  const [event, setEvent] = useState(null);

  useEffect(() => {
    fetch(`http://localhost:8000/api/events/${id}`)
      .then(res => res.json())
      .then(data => setEvent(data));
  }, [id]);

  if (!event) return <p>Caricamento...</p>;

  return (
    <div className="container eventdetail-wrapper">

      <div className="event-box">

        {/* TITOLO */}
        <h1 className="eventdetail-title">{event.title}</h1>

        {/* ANNO */}
        <p className="eventdetail-year">
          <strong>Anno:</strong> {event.year}
        </p>

        {/* DESCRIZIONE */}
        <h3 className="section-title">Descrizione</h3>
        <p>{event.description}</p>

        {/* PERIODO STORICO */}
        <h3 className="section-title">Periodo Storico</h3>
        <p>{event.period?.name}</p>

        {/* PERSONAGGI */}
        <h3 className="section-title">Personaggi Coinvolti</h3>

        {event.historical_people.length === 0 && (
          <p>Nessun personaggio registrato.</p>
        )}

        {event.historical_people.map(person => (
          <div key={person.id} className="person-card">
            <div className="person-name">{person.name}</div>
            <div className="person-year">Nato nel {person.birth_year}</div>
            {person.biography && <p>{person.biography}</p>}
          </div>
        ))}

        {/* TORNA INDIETRO */}
        <Link to="/" className="back-btn">
          Torna agli eventi
        </Link>

      </div>
    </div>
  );
}
