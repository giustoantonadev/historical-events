import { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import "../styles/personlist.css";

export default function PersonList() {
  const [people, setPeople] = useState([]);

  useEffect(() => {
    fetch("http://localhost:8000/api/people")
      .then(res => res.json())
      .then(data => setPeople(data));
  }, []);

  return (
    <div className="container personlist-wrapper">

      {/* HEADER */}
      <h1 className="personlist-title">Personaggi Storici</h1>
      <p className="personlist-subtitle">
        Le figure che hanno influenzato gli eventi e segnato la storia.
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
                <strong>Nascita:</strong> {person.birth_year}
              </p>

              {/* Pulsante */}
              <Link
                to={`/people/${person.id}`}
                className="person-btn"
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
