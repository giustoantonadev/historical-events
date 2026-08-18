import { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import "../styles/eventlist.css";

export default function EventList() {
  const [events, setEvents] = useState([]);

  useEffect(() => {
    fetch("http://localhost:8000/api/events")
      .then(res => res.json())
      .then(data => setEvents(data));
  }, []);

  return (
    <div className="container eventlist-wrapper">

      {/* HEADER */}
      <h1 className="eventlist-title">Eventi Storici</h1>
      <p className="eventlist-subtitle">
        Una selezione dei momenti che hanno segnato la storia.
      </p>

      {/* GRID */}
      <div className="row g-4">
        {events.map(event => (
          <div key={event.id} className="col-md-6 col-lg-4">

            <div className="event-card">

              {/* ICONA */}
              <div className="event-icon">
                <i className="bi bi-hourglass-split"></i>
              </div>

              {/* TITOLO */}
              <h4 className="event-title">{event.title}</h4>

              {/* ANNO */}
              <p className="event-year">
                <strong>Anno:</strong> {event.year}
              </p>

              {/* BUTTON */}
              <Link
                to={`/events/${event.id}`}
                className="event-btn"
              >
                Dettagli
              </Link>

            </div>

          </div>
        ))}
      </div>
    </div>
  );
}
