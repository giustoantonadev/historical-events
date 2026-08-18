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
    <div className="container py-5">

      {/* HEADER */}
      <div className="text-center mb-5">
        <h1 className="display-5 fw-bold text-dark">Eventi Storici</h1>
        <p className="text-muted fs-5">
          Una selezione dei momenti che hanno cambiato il corso della storia.
        </p>
      </div>

      {/* GRID */}
      <div className="row g-4">
        {events.map(event => (
          <div key={event.id} className="col-md-6 col-lg-4">

            <div className="event-card shadow-lg rounded-4 p-4">

              {/* ICONA */}
              <div className="event-icon mb-3">
                <i className="bi bi-hourglass-split"></i>
              </div>

              {/* TITOLO */}
              <h4 className="fw-bold mb-2">{event.title}</h4>

              {/* ANNO */}
              <p className="text-muted mb-4">
                <strong>Anno:</strong> {event.year}
              </p>

              {/* BUTTON */}
              <Link
                to={`/events/${event.id}`}
                className="btn btn-dark w-100 rounded-pill py-2"
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
