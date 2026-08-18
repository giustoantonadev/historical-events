import { useEffect, useState } from "react";
import { useParams, Link } from "react-router-dom";
import "../styles/perioddetail.css";

export default function PeriodDetail() {
  const { id } = useParams();
  const [period, setPeriod] = useState(null);

  useEffect(() => {
    fetch(`http://localhost:8000/api/periods/${id}`)
      .then(res => res.json())
      .then(data => {
        console.log("PERIOD JSON:", data); // utile per debug
        setPeriod(data);
      });
  }, [id]);

  if (!period) return <p>Caricamento...</p>;

  return (
    <div className="container perioddetail-wrapper">

      <div className="perioddetail-box">

        {/* TITOLO */}
        <h1 className="perioddetail-title">{period.name}</h1>

        {/* DESCRIZIONE */}
        <h3 className="section-title">Descrizione</h3>
        <p>{period.description}</p>

        {/* EVENTI COLLEGATI */}
        <h3 className="section-title">Eventi del Periodo</h3>

        {period.historical_events?.length === 0 && (
          <p>Nessun evento registrato.</p>
        )}

        <ul className="event-list">
          {period.historical_events?.map(event => (
            <li key={event.id}>
              <Link to={`/events/${event.id}`} className="event-link">
                {event.title} ({event.year})
              </Link>
            </li>
          ))}
        </ul>

        {/* TORNA INDIETRO */}
        <Link to="/periods" className="back-btn">
          Torna ai periodi
        </Link>

      </div>
    </div>
  );
}
