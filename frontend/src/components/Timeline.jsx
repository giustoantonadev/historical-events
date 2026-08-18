import TimelineEvent from "./TimelineEvent";
import "../styles/timeline.css";

export default function Timeline({ events }) {
  if (!events || events.length === 0) {
    return <p>Nessun evento disponibile.</p>;
  }

  return (
    <div className="timeline-container">
      <div className="timeline-line"></div>

      {events.map((event, index) => (
        <TimelineEvent
          key={event.id}
          event={event}
          position={index % 2 === 0 ? "left" : "right"}
        />
      ))}
    </div>
  );
}
