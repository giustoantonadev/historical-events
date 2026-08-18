import { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import "../styles/periodlist.css";

export default function PeriodList() {
  const [periods, setPeriods] = useState([]);

  useEffect(() => {
    fetch("http://localhost:8000/api/periods")
      .then(res => res.json())
      .then(data => setPeriods(data));
  }, []);

  return (
    <div className="container periodlist-wrapper">

      {/* HEADER */}
      <h1 className="periodlist-title">Periodi Storici</h1>
      <p className="periodlist-subtitle">
        Le grandi epoche che hanno segnato la storia dell’umanità.
      </p>

      {/* GRID */}
      <div className="row g-4">
        {periods.map(period => (
          <div key={period.id} className="col-md-6 col-lg-4">

            <div className="period-card">

              {/* Icona */}
              <div className="period-icon">
                <i className="bi bi-hourglass-split"></i>
              </div>

              {/* Nome */}
              <h4 className="period-name">{period.name}</h4>

              {/* Pulsante */}
              <Link
                to={`/periods/${period.id}`}
                className="period-btn"
              >
                Esplora
              </Link>

            </div>

          </div>
        ))}
      </div>
    </div>
  );
}
