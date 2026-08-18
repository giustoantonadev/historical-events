import { useEffect, useState } from "react";
import { useParams, Link } from "react-router-dom";
import { useTranslation } from "react-i18next";
import "../styles/perioddetail.css";

export default function PeriodDetail() {
  const { id } = useParams();
  const { t } = useTranslation();
  const [period, setPeriod] = useState(null);

  useEffect(() => {
    fetch(`http://localhost:8000/api/periods/${id}`)
      .then(res => res.json())
      .then(data => setPeriod(data));
  }, [id]);

  if (!period) return <p>{t("loading")}</p>;

  return (
    <div className="container perioddetail-wrapper">

      <div className="period-box">

        {/* TITOLO */}
        <h1 className="perioddetail-title">{period.name}</h1>

        {/* DESCRIZIONE */}
        <h3 className="section-title">{t("period.description")}</h3>
        <p className="period-description">{period.description}</p>

        {/* EVENTI DEL PERIODO */}
        <h3 className="section-title mt-4">{t("period.events")}</h3>

        <div className="row g-4">

          {period.events.length === 0 && (
            <p>{t("event.noPeople")}</p>
          )}

          {period.events.map(event => (
            <div key={event.id} className="col-md-6 col-lg-4">

              <div className="event-card">

                {/* Icona */}
                <div className="event-icon">
                  <i className="bi bi-flag"></i>
                </div>

                {/* Titolo */}
                <h4 className="event-title">{event.title}</h4>

                {/* Anno */}
                <p className="event-year">
                  <strong>{t("event.year")}:</strong> {event.year}
                </p>

                {/* Pulsante */}
                <Link
                  to={`/events/${event.id}`}
                  className="event-btn"
                >
                  {t("event.details")}
                </Link>

              </div>

            </div>
          ))}

        </div>

        {/* TORNA INDIETRO */}
        <Link to="/periods" className="back-btn mt-4">
          {t("period.back")}
        </Link>

      </div>
    </div>
  );
}
