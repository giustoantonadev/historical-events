import { useEffect, useState } from "react";
import { useParams } from "react-router-dom";

export default function EventDetails() {
  const { id } = useParams();
  const [event, setEvent] = useState(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    fetch(`http://localhost:8000/api/events/${id}`)
      .then(res => res.json())
      .then(data => {
        setEvent(data);
        setLoading(false);
      });
  }, [id]);

  if (loading) {
    return <p>Caricamento...</p>;
  }

  if (!event) {
    return <p>Evento non trovato.</p>;
  }

  return (
    <div style={{ padding: "20px" }}>
      <h1>{event.title}</h1>
      <p><strong>Anno:</strong> {event.year}</p>

      {/* DESCRIZIONE */}
      <h3>Descrizione</h3>
      <p>{event.description}</p>

      {/* PERIODO */}
      <h3>Periodo Storico</h3>
      <p>{event.period?.name}</p>

      {/* PERSONAGGI COLLEGATI */}
      <h3>Personaggi Coinvolti</h3>
      {event.historical_people.length > 0 ? (
        <ul>
          {event.historical_people.map(person => (
            <li key={person.id}>
              {person.name} ({person.birth_year})
            </li>
          ))}
        </ul>
      ) : (
        <p>Nessun personaggio collegato.</p>
      )}
    </div>
  );
}
