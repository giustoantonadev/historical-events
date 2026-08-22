import { useEffect, useState } from "react";
import { useParams, Link } from "react-router-dom";
import { useTranslation } from "react-i18next";
import "../styles/eventdetail.css";

export default function EventDetail() {
  const { id } = useParams();
  const { t } = useTranslation();
  const [event, setEvent] = useState(null);
  const [imgLoaded, setImgLoaded] = useState(false);
  const [selectedPerson, setSelectedPerson] = useState(null);

  const { i18n } = useTranslation();
  const lang = (i18n.language || 'it').split('-')[0];

  useEffect(() => {
    fetch(`http://localhost:8000/api/events/${id}?lang=${lang}`)
      .then(res => res.json())
      .then(data => setEvent(data));
  }, [id, lang]);

  if (!event) return <p>{t("loading")}</p>;

  return (
    <div className="container eventdetail-wrapper">

      <div className="event-box">

        {/* IMAGE PANEL (left) */}
        <aside className="event-image-panel">
          <div className="event-img-wrap">
            <img
              src={event.image ? `http://localhost:8000/storage/${event.image}` : `/images/events/placeholder.svg`}
              alt={event.title}
              className={`event-img ${imgLoaded ? 'loaded' : 'loading'}`}
              onLoad={() => setImgLoaded(true)}
              loading="lazy"
            />
          </div>
        </aside>

        {/* CONTENT (right) */}
        <div className="event-content">

          <h1 className="eventdetail-title">{event.title}</h1>

          <p className="eventdetail-year">
            <strong>{t("event.year")}:</strong> {event.year}
          </p>

          <h3 className="section-title">{t("event.description")}</h3>
          <p>{event.description}</p>

          <h3 className="section-title">{t("sections.periods")}</h3>
          <p>{event.period?.name}</p>

          <h3 className="section-title">{t("event.people")}</h3>

          <div className="person-list">
            {event.historical_people.length === 0 && (
              <p>{t("event.noPeople")}</p>
            )}

            {event.historical_people.map(person => (
              <div
                key={person.id}
                className="person-card"
                role="button"
                tabIndex={0}
                onClick={() => setSelectedPerson(person)}
                onKeyDown={(e) => { if (e.key === 'Enter' || e.key === ' ') setSelectedPerson(person); }}
              >
                <span className="person-name only-name">{person.name}</span>
              </div>
            ))}
          </div>

          <Link to="/" className="back-btn">
            {t("event.back")}
          </Link>

        </div>

      </div>
      {selectedPerson && (
        <div className="person-modal" role="dialog" aria-modal="true">
          <div className="person-modal-backdrop" onClick={() => setSelectedPerson(null)}></div>
          <div className="person-modal-inner">
            <button className="person-modal-close" aria-label="Close" onClick={() => setSelectedPerson(null)}>×</button>
            <div className="person-modal-grid">
              <div className="person-modal-left">
                {selectedPerson.image ? (
                  <img src={`http://localhost:8000/storage/${selectedPerson.image}`} alt={selectedPerson.name} className="person-modal-avatar" />
                ) : (
                  <div className="person-modal-avatar placeholder" />
                )}
                {selectedPerson.birth_year && (
                  <div className="person-modal-year">{selectedPerson.birth_year < 0 ? `${Math.abs(selectedPerson.birth_year)} a.C.` : `${selectedPerson.birth_year} d.C.`}</div>
                )}
              </div>
              <div className="person-modal-right">
                <h3 className="person-modal-title">{selectedPerson.name}</h3>
                {selectedPerson.biography ? (
                  <p className="person-modal-bio">{selectedPerson.biography}</p>
                ) : (
                  <p className="person-modal-bio muted">Nessuna biografia disponibile.</p>
                )}

                <div className="person-modal-actions">
                  <Link to={`/people/${selectedPerson.id}`} className="person-modal-view-btn" onClick={() => setSelectedPerson(null)}>
                    {t("person.viewProfile", { defaultValue: 'Open full profile' })}
                  </Link>
                </div>
              </div>
            </div>
          </div>
        </div>
      )}
    </div>
  );
}
