import { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import "../styles/eventlist.css";
import EventCard from "../components/EventCard";

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
          <EventCard key={event.id} event={event} />
        ))}

      </div>
    </div>
  );
}
