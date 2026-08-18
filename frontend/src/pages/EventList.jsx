import { useEffect, useState } from "react";
import { useTranslation } from "react-i18next";
import "../styles/eventlist.css";
import EventCard from "../components/EventCard";

export default function EventList() {
  const [events, setEvents] = useState([]);
  const { t } = useTranslation();

  useEffect(() => {
    fetch("http://localhost:8000/api/events")
      .then(res => res.json())
      .then(data => setEvents(data));
  }, []);

  return (
    <div className="container eventlist-wrapper">

      {/* HEADER */}
      <h1 className="eventlist-title">{t("sections.events")}</h1>

      <p className="eventlist-subtitle">
        {t("home.subtitle")}
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
