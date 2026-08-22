import { useEffect, useState } from "react";
import { useParams, Link } from "react-router-dom";
import { useTranslation } from "react-i18next";
import "../styles/persondetail.css";

export default function PersonDetail() {
  const { id } = useParams();
  const [person, setPerson] = useState(null);
  const { t, i18n } = useTranslation();
  const lang = (i18n.language || 'it').split('-')[0];

  useEffect(() => {
    fetch(`http://localhost:8000/api/people/${id}?lang=${lang}`)
      .then(res => res.json())
      .then(data => setPerson(data));
  }, [id, lang]);

  if (!person) return <p>{t ? t('loading') : 'Caricamento...'}</p>;

  return (
    <div className="container persondetail-wrapper">

      <div className="persondetail-box row">

        {/* COLONNA IMMAGINE */}
        <div className="col-md-5">
          {person.portrait && (
            <img
              src={`http://localhost:8000/storage/${person.portrait}`}
              alt={person.name}
              className="persondetail-img"
            />
          )}
        </div>

        {/* COLONNA TESTO */}
        <div className="col-md-7">

          <h1 className="persondetail-title">{person.name}</h1>

          <p className="persondetail-year">
            <strong>Nascita:</strong> {person.birth_year}
          </p>

          <h3 className="section-title">{t('person.biography', { defaultValue: 'Biografia' })}</h3>
          <p>{person.biography}</p>

          <h3 className="section-title">Eventi Collegati</h3>

          {person.historical_events?.length === 0 && (
            <p>{t('person.noEvents', { defaultValue: 'Nessun evento collegato.' })}</p>
          )}

          <ul className="event-list">
            {person.historical_events?.map(event => (
              <li key={event.id}>
                <Link to={`/events/${event.id}`} className="event-link">
                  {event.title} ({event.year})
                </Link>
              </li>
            ))}
          </ul>

          <Link to="/people" className="back-btn">
            Torna ai personaggi
          </Link>

        </div>

      </div>
    </div>
  );
}
