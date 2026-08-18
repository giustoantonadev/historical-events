import { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import { useTranslation } from "react-i18next";
import "../styles/personlist.css";

export default function PersonList() {
  const [people, setPeople] = useState([]);
  const { t } = useTranslation();

  useEffect(() => {
    fetch("http://localhost:8000/api/people")
      .then(res => res.json())
      .then(data => setPeople(data));
  }, []);

  return (
    <div className="container personlist-wrapper">

      {/* HEADER */}
      <h1 className="personlist-title">{t("sections.people")}</h1>
      <p className="personlist-subtitle">
        {t("people.subtitle")}
      </p>

      {/* GRID */}
      <div className="row g-4">
        {people.map(person => (
          <div key={person.id} className="col-md-6 col-lg-4">

            <div className="person-card">

              {/* IMMAGINE */}
              {person.portrait ? (
                <img
                  src={`http://localhost:8000/storage/${person.portrait}`}
                  alt={person.name}
                  className="person-img"
                />
              ) : (
                <div className="person-img placeholder">
                  <i className="bi bi-person"></i>
                </div>
              )}

              {/* Nome */}
              <h4 className="person-name">{person.name}</h4>

              {/* Anno */}
              <p className="person-year">
                <strong>{t("person.born")}:</strong> {person.birth_year}
              </p>

              {/* Pulsante */}
              <Link
                to={`/people/${person.id}`}
                className="person-btn"
              >
                {t("event.details")}
              </Link>

            </div>

          </div>
        ))}
      </div>
    </div>
  );
}
