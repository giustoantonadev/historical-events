import { useEffect, useState } from "react";
import { useParams, Link } from "react-router-dom";
import { useTranslation } from "react-i18next";
import "../styles/persondetail.css";
import { API_BASE } from "../api/api";

export default function PersonDetail() {
  const { id } = useParams();

  const [person, setPerson] = useState(null);
  const [imageOpen, setImageOpen] = useState(false);

  const { t, i18n } = useTranslation();

  const lang = (i18n.language || "it").split("-")[0];

  useEffect(() => {
    fetch(`${API_BASE}/api/people/${id}?lang=${lang}`)
      .then((res) => {
        if (!res.ok) {
          throw new Error(`Errore HTTP: ${res.status}`);
        }

        return res.json();
      })
      .then((data) => setPerson(data))
      .catch((err) => {
        console.error("Errore caricamento personaggio:", err);
      });
  }, [id, lang]);

  if (!person) {
    return <p>{t("loading", { defaultValue: "Caricamento..." })}</p>;
  }

  const personImage = person.portrait
    ? `${API_BASE}/storage/${person.portrait}`
    : null;

  return (
    <div className="container persondetail-wrapper">

      <div className="persondetail-box row">

        {/* COLONNA IMMAGINE */}
        <div className="col-md-5">

          {personImage && (
            <img
              src={personImage}
              alt={person.name}
              className="persondetail-img"
              onClick={() => setImageOpen(true)}
              role="button"
              tabIndex={0}
              onKeyDown={(e) => {
                if (e.key === "Enter" || e.key === " ") {
                  setImageOpen(true);
                }
              }}
            />
          )}

        </div>

        {/* COLONNA TESTO */}
        <div className="col-md-7">

          <h1 className="persondetail-title">
            {person.name}
          </h1>

          <p className="persondetail-year">
            <strong>
              {t("person.birth", { defaultValue: "Nascita" })}:
            </strong>{" "}
            {person.birth_year}
          </p>

          <h3 className="section-title">
            {t("person.biography", {
              defaultValue: "Biografia",
            })}
          </h3>

          <p>{person.biography}</p>

          <h3 className="section-title">
            {t("person.relatedEvents", {
              defaultValue: "Eventi Collegati",
            })}
          </h3>

          {person.historical_events?.length === 0 && (
            <p>
              {t("person.noEvents", {
                defaultValue: "Nessun evento collegato.",
              })}
            </p>
          )}

          <ul className="event-list">

            {person.historical_events?.map((event) => (
              <li key={event.id}>

                <Link
                  to={`/events/${event.id}`}
                  className="event-link"
                >
                  {event.title} ({event.year})
                </Link>

              </li>
            ))}

          </ul>

          <Link to="/people" className="back-btn">
            {t("person.back", {
              defaultValue: "Torna ai personaggi",
            })}
          </Link>

        </div>

      </div>


      {/* IMAGE LIGHTBOX */}
      {imageOpen && personImage && (

        <div
          className="image-lightbox"
          onClick={() => setImageOpen(false)}
          role="dialog"
          aria-modal="true"
        >

          <img
            src={personImage}
            alt={person.name}
            className="image-lightbox-img"
          />

        </div>

      )}

    </div>
  );
}