import { useEffect, useState } from "react";
import { useParams, Link } from "react-router-dom";
import { useTranslation } from "react-i18next";
import "../styles/eventdetail.css";

export default function EventDetail() {
  const { id } = useParams();
  const { t } = useTranslation();
  const [event, setEvent] = useState(null);

  useEffect(() => {
    fetch(`http://localhost:8000/api/events/${id}`)
      .then(res => res.json())
      .then(data => setEvent(data));
  }, [id]);

  if (!event) return <p>{t("loading")}</p>;

  return (
    <div className="container eventdetail-wrapper">

      <div className="event-box">

        {/* TITOLO */}
        <h1 className="eventdetail-title">{event.title}</h1>

        {/* ANNO */}
        <p className="eventdetail-year">
          <strong>{t("event.year")}:</strong> {event.year}
        </p>

        {/* DESCRIZIONE */}
        <h3 className="section-title">{t("event.description")}</h3>
        <p>{event.description}</p>

        {/* PERIODO STORICO */}
        <h3 className="section-title">{t("sections.periods")}</h3>
        <p>{event.period?.name}</p>

        {/* PERSONAGGI */}
        <h3 className="section-title">{t("event.people")}</h3>

        <div className="person-list">

          {event.historical_people.length === 0 && (
            <p>{t("event.noPeople")}</p>
          )}

          {event.historical_people.map(person => (
            <div key={person.id} className="person-card">

              {/* Icona */}
              <div className="person-icon">
                <i className="bi bi-person"></i>
              </div>

              {/* Nome */}
              <div className="person-name">{person.name}</div>

              {/* Anno */}
              <div className="person-year">
                {t("person.born")} {person.birth_year}
              </div>

              {/* Biografia */}
              {person.biography && (
                <p className="person-bio">{person.biography}</p>
              )}

            </div>
          ))}

        </div>

        {/* TORNA INDIETRO */}
        <Link to="/" className="back-btn">
          {t("event.back")}
        </Link>

      </div>
    </div>
  );
}
